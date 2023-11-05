<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * @package App\Models
 * @property string $first_name
 * @property string $last_name
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

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('MMMM Do YYYY');
    }

    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->referral_id]);
    }

    public function getSponsoredByAttribute()
    {
        return User::query()
            ->select('first_name', 'last_name', 'referral_id')
            ->where('referral_id', $this->referred_by)
            ->first();
    }

    public function referrels()
    {
        return $this->hasMany(UserReferrel::class);
    }

    public function avatar()
    {
        return $this->morphOne(Media::class, 'parent')->withDefault([
            'name' => 'https://demo.activeitzone.com/ecommerce/public/assets/img/avatar-place.png'
        ]);
    }

    public function activation(): HasOne
    {
        return $this->hasOne(UserRequest::class);
    }
}
