<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderArbitratorDecision extends Model {
	use HasFactory;
	protected $table    = 'order_arbitrator_decisions';
	protected $fillable = [
		'id',
		'order_id',
		'user_id',
		'decision',
		'created_at',
		'updated_at',
	];
}
