<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @property string $first_name
 * @property string $last_name
 * @property string $referral_link
 * @property string $referral_id
 * @property Carbon $created_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'status',
        'referral_id',
        'referred_by',
        'balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'username' => 'string',
    ];

    protected $appends = ['referral_link', 'sponsored_by'];

    public function username(): Attribute
    {
        return Attribute::make(
            get: fn () => ucfirst($this->first_name .' '. $this->last_name)
        );
    }

    public function getCreatedAtAttribute(string $value): string
    {
        return Carbon::parse($value)->isoFormat('MMMM Do YYYY');
    }

    public function getReferralLinkAttribute(): string
    {
        return $this->referral_link = route('register', ['ref' => $this->referral_id]);
    }

    public function getSponsoredByAttribute()
    {
        return self::query()
            ->select('first_name', 'last_name', 'referral_id')
            ->where('referral_id', $this->referred_by)
            ->first();
    }

    public function deductBalance($amount)
    {
        $this->decrement('balance', $amount);
        return $this;
    }

    public function addBalance($amount)
    {
        $this->increment('balance', $amount);
        return $this;
    }

    public function scopeCheckWithdrawValidity()
    {
        $activeReferralCount = 0;
        $referrals = UserReferrel::query()
            ->where('user_id', $this->id)
            ->where('generation', 'first')
            ->each(function ($referral) use (&$activeReferralCount) {
                if ($referral->associate->status === 'active'){
                    $activeReferralCount++;
                }
            });
        return $activeReferralCount >= 5;
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(UserReferrel::class, 'user_id', 'id');
    }

    public function avatar(): MorphOne
    {
        return $this->morphOne(Media::class, 'parent');
    }

    public function activation(): HasOne
    {
        return $this->hasOne(UserRequest::class);
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'user_task')->withTimestamps();
    }
}
