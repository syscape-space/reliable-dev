<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NegotiateMessage extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'created_at'  => 'date:m-d-Y',
        // 'updated_at' => 'datetime:Y-m-d H:00',
    ];
    protected $with = ['user'];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
