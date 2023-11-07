<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property double $price
 * @property string $link
 */
class Task extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function thumbnail(): MorphOne
    {
        return $this->morphOne(Media::class, 'parent');
    }

    public function getCreatedAtAttribute(string $value): string
    {
        return Carbon::parse($value)->isoFormat('MMMM Do YYYY');
    }
}
