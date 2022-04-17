<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class UserExperience extends Model {

	protected $table    = 'user_experiences';
	protected $fillable = [
		'id',
		'admin_id',
		'experience_name',
		'experience_file',
		'user_id',

		'comment',
		'specialtie_id',
		'created_at',
		'updated_at',

        'status',
        'refuse_message',
	];

	/**
	 *
	 * user_job_id relation method
	 * @param void
	 * @return object data
	 */
    public function specialtie() {
        return $this->belongsTo(\App\Models\Specialtie::class , 'specialtie_id','id');
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
		static ::deleting(function ($userexperience) {
				//$userexperience->user_id()->delete();
			});
	}

}
