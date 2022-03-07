<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Specialtie extends Model {

	protected $table    = 'specialties';
	protected $fillable = [
		'id',
		'admin_id',
		'specialty_name_ar',
		'specialty_name_en',
		'occupation_id',
		'created_at',
		'updated_at',
	];

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function admin_id() {
		return $this->hasOne(\App\Models\Admin::class , 'id', 'admin_id');
	}

	/**
	 * occupation_id relation method
	 * @param void
	 * @return object data
	 */
	public function occupation_id() {
		return $this->hasOne(\App\Models\Occupation::class , 'id', 'occupation_id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($specialtie) {
				//$specialtie->occupation_id()->delete();
			});
	}

}
