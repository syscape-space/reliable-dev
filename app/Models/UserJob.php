<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserJob extends Model {

	protected $table    = 'user_jobs';
	protected $fillable = [
		'id',
		'admin_id',
		'occupation_id',
		'specialtie_id',
		'user_id',
		'created_at',
		'updated_at',
	];

	/**
	 * occupation_id relation method
	 * @param void
	 * @return object data
	 */
	public function occupation_id() {
		return $this->hasOne(\App\Models\Occupation::class , 'id', 'occupation_id');
	}

	/**
	 * specialtie_id relation method
	 * @param void
	 * @return object data
	 */
	public function specialtie_id() {
		return $this->hasOne(\App\Models\Specialtie::class , 'id', 'specialtie_id');
	}

	/**
	 * user_commercials relation method
	 * @param void
	 * @return object data
	 */
	public function user_commercials() {
		return $this->hasMany(\App\Models\UserCommercial::class , 'user_job_id', 'id');
	}

	/**
	 * user_qualifications relation method
	 * @param void
	 * @return object data
	 */
	public function user_qualifications() {
		return $this->hasMany(\App\Models\UserQualification::class , 'user_job_id', 'id');
	}

	/**
	 * user_experiences relation method
	 * @param void
	 * @return object data
	 */
	public function user_experiences() {
		return $this->hasMany(\App\Models\UserExperience::class , 'user_job_id', 'id');
	}

	/**
	 * user_licenses relation method
	 * @param void
	 * @return object data
	 */
	public function user_licenses() {
		return $this->hasMany(\App\Models\UserLicense::class , 'user_job_id', 'id');
	}

	/**
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
		static ::deleting(function ($userjob) {
				//$userjob->occupation_id()->delete();
				//$userjob->occupation_id()->delete();
				//$userjob->occupation_id()->delete();
			});
	}

}
