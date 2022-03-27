<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negotiate extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function messages(){
        return $this->hasMany(NegotiateMessage::class,'negotiate_id','id');
    }
}
