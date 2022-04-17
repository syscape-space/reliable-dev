<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Judger extends User
{
    use HasFactory;
    protected $table = 'users';
    public static function query()
    {
        return parent::query()->where('membership_type','=','judger');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class,'order_arbitrators','arbitrator_id','order_id');
    }
}
