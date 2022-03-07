<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderCaseAgainst extends Model {
	use HasFactory;

	protected $table    = 'order_case_againsts';
	protected $fillable = [
		'id',
		'order_id',
		'name',
		'id_number',
		'nationality',
		'created_at',
		'updated_at',
	];

}
