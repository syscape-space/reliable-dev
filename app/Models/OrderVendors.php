<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderVendors extends Model {
	use HasFactory;
	protected $table    = 'order_vendors';
	protected $fillable = [
		'id',
		'order_id',
		'user_id',
		'notify_user',
		'created_at',
		'updated_at',
	];

	/**
	 * user_id relation method
	 * @param void
	 * @return object data
	 */
	public function user_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'user_id');
	}
}
