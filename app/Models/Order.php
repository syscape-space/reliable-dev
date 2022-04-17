<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]

class Order extends Model {

	protected $table    = 'orders';
	protected $fillable = [
		'id',
		'admin_id',
		'user_id',
		'show_order_data',
		'linked_order',
		'main_order_id',
		'order_title',
		'order_content',
		'order_type_id',
		'department_id',
		'choose_service_provider',
		'country_id',
		'city_id',
		'execution_time',
		'negotiable',
		'amount',
		'refunded',
		'order_status',
		'receive_offers',
		'assigning_arbitration',
		'decisions_status',
		'decisions_refused_reason',
		'reason',
		'created_at',
		'updated_at',
        'hash_code',
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
	public function negotiations(){
	    return $this->hasMany(Negotiate::class,'order_id','id');
    }
    public function entities(){
	    return $this->hasMany(OrderCaseAgainst::class,'order_id','id');
    }

	/**
	 * main_order_id relation method to get how add this data
	 * @type hasOne
	 * @param void
	 * @return object data
	 */
	public function main_order_id() {
		return $this->hasOne(\App\Models\Order::class , 'id', 'main_order_id');
	}

	/**
	 * department_id relation method
	 * @param void
	 * @return object data
	 */
	public function department_id() {
		return $this->hasOne(\App\Models\Department::class , 'id', 'department_id');
	}

	/**
	 * country_id relation method
	 * @param void
	 * @return object data
	 */
	public function country_id() {
		return $this->hasOne(\App\Models\Country::class , 'id', 'country_id');
	}

	/**
	 * city_id relation method
	 * @param void
	 * @return object data
	 */
	public function city_id() {
		return $this->hasOne(\App\Models\City::class , 'id', 'city_id');
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
	 * order_type_id relation method
	 * @param void
	 * @return object data
	 */
	public function order_type_id() {
		return $this->hasOne(\App\Models\OrderType::class , 'id', 'order_type_id');
	}

	/**
	 * order_vendors relation method
	 * @param void
	 * @return object data
	 */
	public function order_vendors() {
		return $this->hasMany(\App\Models\OrderVendors::class , 'order_id', 'id');
	}

	/**
	 * order_case_againsts relation method
	 * @param void
	 * @return object data
	 */
	public function order_case_againsts() {
		return $this->hasMany(\App\Models\OrderCaseAgainst::class , 'order_id', 'id');
	}

	/**
	 * offers relation method
	 * @param void
	 * @return object data
	 */
	public function offers() {
		return $this->hasMany(\App\Models\OrderOffer::class , 'order_id', 'id');
	}

	/**
	 * invoices relation method
	 * @param void
	 * @return object data
	 */
	public function invoices() {
		return $this->hasMany(\App\Models\OrderOfferInvoice::class , 'order_id', 'id');
	}

	/**
	 * arbitrators relation method
	 * @param void
	 * @return object data
	 */
	public function arbitrators() {
		return $this->hasMany(\App\Models\OrderArbitrator::class , 'order_id', 'id');
	}

	/**
	 * arbitrators relation method
	 * @param void
	 * @return object data
	 */
	public function arbitratorInvoices() {
		return $this->hasMany(\App\Models\OrderArbitratorInvoice::class , 'order_id', 'id');
	}

	/**
	 * Static Boot method to delete or update or sort Data
	 * @param void
	 * @return void
	 */
	protected static function boot() {
		parent::boot();
		// if you disable constraints should by run this static method to Delete children data
		static ::deleting(function ($order) {
				//$order->department_id()->delete();
				//$order->department_id()->delete();
				//$order->department_id()->delete();
				//$order->department_id()->delete();
			});
		static::retrieved(function (Order $order){
		    if (is_null($order->hash_code)){
		        $order->update(['hash_code'=>Str::random(50)]);
            }
        });
	}

	public function getCreatedAtAttribute($date)
	{
		return Carbon::parse($date)->format('d-M-Y H:i:s');
	}
	public function getOrderStepAttribute()
	{
	    switch ($this->order_status){
            case 'under_review':
            case 'open':
                return 1;
        }
	    $temp = 0;
	    if($this->order_status != "under_review")
            $temp++;
	    if ($this->offers()->where('offer_status','approved')->count())
	        $temp++;
	    if ($this->order_status == "closed" || $this->order_status == "done")
	        $temp+=3;
		return $temp;
	}
	public function judgers(){
	    return $this->belongsToMany(Judger::class,'order_arbitrators','order_id','arbitrator_id')
            ->withPivot('vendor_status','vendor_refused_message','id');
    }
	public function judger_requests(){
	    return $this->hasMany(JudgerRequest::class,'order_id','id');
    }
	public function files(){
	    return $this->hasMany(OrderFile::class,'order_id','id');
    }
    public function getActiveVendorAttribute(){
	    if ($this->active_offer)
	    return $this->active_offer->vendor;
	    return null;
    }
    public function getActiveOfferAttribute(){
	    return $this->offers()->firstWhere('offer_status','approved');
    }
    public function getActiveNegotiationAttribute(){
	    if ($this->order_step >= 2){
            $user = User::query()->find(auth('api')->id()??auth()->id());
            if ($user and $user->membership_type == 'vendor'){
                return $user->negotiations()->with(['users','messages','order'])->firstWhere('order_id',$this->id);
            }else{
                return $this->negotiations()->with(['users','messages','order'])
                    ->get()->filter(function ($item){
                        return $item->users->contains($this->active_vendor);
                    })->first();
            }
        }
	    return null;
    }


}
