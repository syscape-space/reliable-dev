<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplates extends Model
{
    use HasFactory;
    protected $fillable=['content','title'];
}
