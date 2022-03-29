<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Order;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\OrdersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class OrdersApi extends Controller{
	protected $selectColumns = [
		"id",
		"order_title",
		"order_content",
		"department_id",
		"choose_service_provider",
		"country_id",
		"city_id",
		"execution_time",
		"amount",
		"order_status",
		"receive_offers",
		"assigning_arbitration",
		"decisions_refused_reason",
		"user_id",
	];

    /**
     * Display the specified releationshop.
     * Baboon Api Script By [it v 1.6.37]
     * @return array to assign with index & show methods
     */
    public function arrWith(){
        return ['department_id','negotiations','country_id','city_id','user_id',];
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Order = Order::select($this->selectColumns)->where(function ($q){
            if (\request()->my){
                $q->where('user_id',auth('api')->id());
            }else{
                $q->where('order_status','open');
            }
        })->with($this->arrWith())->orderBy("id","desc")->paginate(15);
        return successResponseJson(["data"=>$Order]);
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Store a newly created resource in storage. Api
     * @return \Illuminate\Http\Response
     */
    public function store(OrdersRequest $request)
    {
    	$data = $request->except("_token");
        $data["user_id"] = auth('api')->id();
        $Order = Order::create($data);
		$Order = Order::with($this->arrWith())->find($Order->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$Order
        ]);
    }


        /**
     * Display the specified resource.
     * Baboon Api Script By [it v 1.6.37]
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Order = Order::with($this->arrWith())->find($id,$this->selectColumns);
        if(is_null($Order) || empty($Order)){
            return errorResponseJson([
            "message"=>trans("admin.undefinedRecord")
            ]);
        }

            return successResponseJson([
        "data"=> $Order
        ]);  ;
    }       


    /**
     * Baboon Api Script By [it v 1.6.37]
     * update a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function updateFillableColumns() {
            $fillableCols = [];
            foreach (array_keys((new OrdersRequest)->attributes()) as $fillableUpdate) {
            if (!is_null(request($fillableUpdate))) {
                $fillableCols[$fillableUpdate] = request($fillableUpdate);
            }
            }
            return $fillableCols;
    }

        public function update(OrdersRequest $request,$id)
        {
            $Order = Order::find($id);
            if(is_null($Order) || empty($Order)){
                return errorResponseJson([
                "message"=>trans("admin.undefinedRecord")
                ]);
                }

            $data = $this->updateFillableColumns();
                
            $data["user_id"] = auth()->id(); 
            Order::where("id",$id)->update($data);

            $Order = Order::with($this->arrWith())->find($id,$this->selectColumns);
            return successResponseJson([
            "message"=>trans("admin.updated"),
            "data"=> $Order
            ]);
        }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $orders = Order::find($id);
            	if(is_null($orders) || empty($orders)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("order",$id);

               $orders->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $orders = Order::find($id);
	            	if(is_null($orders) || empty($orders)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("order",$id);
                    	$orders->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $orders = Order::find($data);
	            	if(is_null($orders) || empty($orders)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("order",$data);

                    $orders->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
	// Delete Files From Dropzone Library
	public function delete_file() {
		if (request("type_file") && request("type_id")) {
			if (it()->getFile(request("type_file"), request("type_id"))) {
				it()->delete(null, null, request("id"));
				return successResponseJson([]);
			}
		}
	}

	// Multi upload with dropzone
	public function multi_upload() {
			$rules = [];
			if(request()->hasFile("dz_order_attachments")){
				$rules["dz_order_attachments"] = "sometimes|nullable|file";
			}


			$this->validate(request(), $rules, [], [
				 "dz_order_attachments" => trans("admin.dz_order_attachments"),

			]);

			if(request()->hasFile("dz_order_attachments")){
				it()->upload("dz_order_attachments", request("dz_path"), "orders", request("dz_id"));
			}

			return successResponseJson([
				"type" => request("dz_type"),
				"file" => it()->getFile("orders", request("dz_id")),
			]);
	}
}