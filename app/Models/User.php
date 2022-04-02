<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
	use HasFactory, Notifiable;
	protected $table    = 'users';
	protected $fillable = [
		'id',
		'admin_id',
		'first_name',
		'middle_name',
		'last_name',
		'name',
		'email',
		'email_verify',
		'main_department',
		'sub_department',
		'mobile',
		'mobile_verify',

		'email_verify_code',
		'mobile_verify_code',
		'photo_profile',
		'rate_overall',
		'membership_type',

		'account_type',

		'id_number',
		'id_type',

		'id_status',

		'unseen_msg',
		'unseen_notification',
		'country_id',
		'city_id',
		'address',
		'lng',
		'lat',
		'bio',
		'birth_date',
		'account_status',

		'ban_reason',
		'refused_reason',
		'ban_end_at',
		'system_comment',
		'subscribe_end_at',
		'company_id',

		'add_offer',

		'disable_adding_offer_reason',
		'add_request',

		'disable_adding_request_reason',
		'gender',

		'password',
		'current_balance',
		'suspended_balance',
		'created_at',
		'updated_at',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Get the identifier that will be stored in the subject claim of the JWT.
	 *
	 * @return mixed
	 */


    public function getJWTIdentifier() {
		return $this->getKey();
	}
	public function negotiations(){
	    return $this->belongsToMany(Negotiate::class,'negotiate_users','user_id','negotiate_id');
    }


	/**
	 * Return a key value array, containing any custom claims to be added to the JWT.
	 *
	 * @return array
	 */
	public function getJWTCustomClaims() {
		return [];
	}

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
	 * company_id relation method
	 * @param void
	 * @return object data
	 */
	public function company_id() {
		return $this->hasOne(\App\Models\User::class , 'id', 'company_id');
	}

	/**
	 * city_id relation method
	 * @param void
	 * @return object data
	 */
	public function city() {
		return $this->belongsTo(City::class);
	}
	public function country() {
		return $this->belongsTo(Country::class);
	}

	/**
	 * user_job relation method
	 * @param void
	 * @return object data
	 */
	public function user_job() {
		return $this->hasMany(\App\Models\UserJob::class , 'user_id', 'id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($user) {
				//$user->company_id()->delete();
			});
	}
	public function specialties(){
	    return $this->belongsToMany(Specialtie::class,'user_specialties','user_id','specialty_id');
    }
	public function occupations(){
	    return $this->belongsToMany(Occupation::class,'user_occupations','user_id','occupation_id');
    }
}