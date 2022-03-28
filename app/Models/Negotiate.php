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
    public function users(){
        return $this->belongsToMany(User::class,'negotiate_users','negotiate_id','user_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
