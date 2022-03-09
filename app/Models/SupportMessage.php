<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $with = ['department'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }  



}
