<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\OrderArbitrator;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\OrderArbitratorsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]
class OrderArbitratorsApi extends Controller{
	protected $selectColumns = [
		"id",
		"order_id",
		"arbitrator_id",
		"notify_arbitrator",
		"arbitrator_amount",
		"arbitrator_add_amount",
		"user_accept_amount",
		"vendor_accept_amount",
		"arbitrator_decision",
		"user_accept_decision",
		"vendor_accept_decision",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.38]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['order_id','arbitrator_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$OrderArbitrator = OrderArbitrator::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$OrderArbitrator]);
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(OrderArbitratorsRequest $request)
    {
    	$data = $request->except("_token");
    	
        $OrderArbitrator = OrderArbitrator::create($data); 

		  $OrderArbitrator = OrderArbitrator::with($this->arrWith())->find($OrderArbitrator->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$OrderArbitrator
        ]);
    }


            /**
             * Display the specified resource.
             * Baboon Api Script By [it v 1.6.38]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $OrderArbitrator = OrderArbitrator::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($OrderArbitrator) || empty($OrderArbitrator)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $OrderArbitrator
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new OrderArbitratorsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(OrderArbitratorsRequest $request,$id)
            {

            	$OrderArbitrator = OrderArbitrator::find($id);
            	if(is_null($OrderArbitrator) || empty($OrderArbitrator)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
              OrderArbitrator::where("id",$id)->update($data);

              $OrderArbitrator = OrderArbitrator::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $OrderArbitrator
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.38]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $orderarbitrators = OrderArbitrator::find($id);
            	if(is_null($orderarbitrators) || empty($orderarbitrators)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("orderarbitrator",$id);

               $orderarbitrators->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $orderarbitrators = OrderArbitrator::find($id);
	            	if(is_null($orderarbitrators) || empty($orderarbitrators)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("orderarbitrator",$id);
                    	$orderarbitrators->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $orderarbitrators = OrderArbitrator::find($data);
	            	if(is_null($orderarbitrators) || empty($orderarbitrators)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("orderarbitrator",$data);

                    $orderarbitrators->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}