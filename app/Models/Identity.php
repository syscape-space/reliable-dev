<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;

    public $fillable = [
        'front_side',
        'back_side',
        'selfie',
        'user_id',
        'comment',
    ];
}
