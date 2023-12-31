<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReferrel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function associate()
    {
        return $this->belongsTo(User::class, 'referrel_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
