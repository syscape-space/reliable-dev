<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
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
		'badge',
		'badge_condition',
		'badge_icon',
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

		'main_department',
		'sub_department',
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
	public function getLicenseSubmittedAttribute()
	{
		return $this->licenses()->where('status', 1)->count() > 0;
	}
	public function getCommercialSubmittedAttribute()
	{
		return $this->comericals()->where('status', 1)->count() > 0;
	}
	public function licenses()
	{
		return $this->hasMany(UserLicense::class, 'user_id', 'id');
	}

	public function comericals()
	{
		return $this->hasMany(UserCommercial::class, 'user_id', 'id');
	}
	/**
	 * Get the identifier that will be stored in the subject claim of the JWT.
	 *
	 * @return mixed
	 */
	public function mainDepartment()
	{
		return $this->belongsTo(Department::class, 'main_department', 'id');
	}

	// public function main_departments()
	// {
	// 	return $this->belongsToMany(Department::class, 'main_department_user');
	// }

	// public function subDepartment()
	// {
	// 	return $this->belongsTo(Department::class, 'sub_department', 'id');
	// }

	public function sub_departments()
	{
		return $this->belongsToMany(Department::class, 'sub_department_user');
	}

	public function getJWTIdentifier()
	{
		return $this->getKey();
	}
	public function negotiations()
	{
		return $this->belongsToMany(Negotiate::class, 'negotiate_users', 'user_id', 'negotiate_id');
	}


	/**
	 * Return a key value array, containing any custom claims to be added to the JWT.
	 *
	 * @return array
	 */
	public function getJWTCustomClaims()
	{
		return [];
	}

	/**
	 * admin id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function admin_id()
	{
		return $this->hasOne(\App\Models\Admin::class, 'id', 'admin_id');
	}

	/**
	 * company_id relation method
	 * @param void
	 * @return object data
	 */
	public function company_id()
	{
		return $this->hasOne(\App\Models\User::class, 'id', 'company_id');
	}

	/**
	 * city_id relation method
	 * @param void
	 * @return object data
	 */
	public function city()
	{
		return $this->belongsTo(City::class);
	}

	public function cities()
	{
		return $this->belongsToMany(\App\Models\City::class);
	}
	public function country()
	{
		return $this->belongsTo(Country::class);
	}

	/**
	 * user_job relation method
	 * @param void
	 * @return object data
	 */
	public function user_job()
	{
		return $this->hasMany(\App\Models\UserJob::class, 'user_id', 'id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot()
	{
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static::deleting(function ($user) {
			//$user->company_id()->delete();
		});
	}
	public function specialties(){
	    return $this->belongsToMany(Specialtie::class,'user_specialties','user_id','specialty_id');
    }
	public function occupations(){
	    return $this->belongsToMany(Occupation::class,'user_occupations','user_id','occupation_id');
    }
    public function packageRequests(){
	    return $this->hasMany(PackageRequest::class,'user_id','id');
    }
    public function getCurrentSubscriptionAttribute(){
	    return $this->packageRequests()->with('package')
            ->where('request_status','approved')
            ->get()
            ->filter(function ($d){
                return Carbon::today() <= Carbon::parse($d->updated_at)->addDays($d->package->duration_package_days);
            })
            ->first();
    }
    public function getPhotoProfileAttribute($value){
	    if ($value){
	        if (Storage::disk('cloud')->exists($value)){
	            return $value;
            }
        }
	    return 'default-user-icon.jpg';
    }
    public function orders(){
	    return $this->hasMany(Order::class,'user_id','id');
    }
    public function getMyAllOrdersAttribute(){
	    return $this->membership_type === 'user' ? [
	        'all'   =>  $this->orders()->count(),
	        'under_review'   =>  $this->orders()->whereOrderStatus('under_review')->count(),
	        'refused'   =>  $this->orders()->whereOrderStatus('refused')->count(),
	        'done'   =>  $this->orders()->get()->where('order_step',3)->count(),
	        'ongoing'   =>  $this->orders()->get()->where('order_step',2)->count(),
	        'closed'   =>  $this->orders()->whereOrderStatus('closed')->count(),
	        'open'   =>  $this->orders()->whereOrderStatus('open')->count(),
	        'archived'   =>  $this->orders()->whereOrderStatus('archived')->count(),
        ] : [
            'ongoing'   =>  Order::all()->where('order_status','ongoing')->filter(function ($item){
                if ($item->active_vendor)
                return $item->active_vendor->id == $this->id;
            })->count(),
            'offered'   =>  OrderOffer::query()->where('vendor_id',$this->id)->count(),
            'completed'  =>  Order::all()->where('order_status','ongoing')->filter(function ($item){
                return $item->active_vendor->id == $this->id;
            })->count(),
            'all'   =>  OrderOffer::query()->where('vendor_id',$this->id)->count(),
        ];
    }
    public function offer_favorites(){
	    return $this->belongsToMany(OrderOffer::class,'offer_favorites','user_id','order_offer_id');
    }
    public function triggerOfferFavorite($offer_id){
	    if ($this->offer_favorites()->where('id',$offer_id)->count()){
            $this->offer_favorites()->where('id',$offer_id)->delete();
        }else{
            $this->offer_favorites()->attach($offer_id);
        }
    }

}

