<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserCommercial extends Model {

	protected $table    = 'user_commercials';
	protected $fillable = [
		'id',
		'admin_id',
		'commercial_id',
		'commercial_file',
		'commercial_end_at',
		'user_id',

		'comment',
		/* 'user_job_id', */
		/* 'occupation_id', */
		/* 'specialtie_id', */
		'created_at',
		'updated_at',
	];

	/**
	 *
	 * user_job_id relation method
	 * @param void
	 * @return object data
	 */
	public function user_job_id() {
		return $this->hasOne(\App\Models\UserJob::class , 'id', 'user_job_id');
	}

	/**
	 *
	 * occupation_id relation method
	 * @param void
	 * @return object data
	 */
	public function occupation_id() {
		return $this->hasOne(\App\Models\Occupation::class , 'id', 'occupation_id');
	}
	/**
	 *
	 * specialtie_id relation method
	 * @param void
	 * @return object data
	 */
	public function specialtie_id() {
		return $this->hasOne(\App\Models\Specialtie::class , 'id', 'specialtie_id');
	}

	/**
	 *
	 * user_id relation method
	 * @param void
	 * @return object data
	 */
	public function user_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'user_id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($usercommercial) {
				//$usercommercial->user_id()->delete();
			});
	}

}
