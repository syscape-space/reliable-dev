<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\OrderArbitratorInvoice;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\OrderArbitratorInvoicesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]
class OrderArbitratorInvoicesApi extends Controller{
	protected $selectColumns = [
		"id",
		"order_id",
		"arbitrator_id",
		"order_arbitrator_id",
		"vendor_id",
		"user_id",
		"vendor_amount",
		"amount_deduction_from_vendor",
		"amount_deduction_from_user",
		"total_amount",
		"system_tax",
		"inovice_status",
		"user_amount",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.38]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['order_id','arbitrator_id','order_arbitrator_id','vendor_id','user_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$OrderArbitratorInvoice = OrderArbitratorInvoice::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$OrderArbitratorInvoice]);
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(OrderArbitratorInvoicesRequest $request)
    {
    	$data = $request->except("_token");
    	
        $OrderArbitratorInvoice = OrderArbitratorInvoice::create($data); 

		  $OrderArbitratorInvoice = OrderArbitratorInvoice::with($this->arrWith())->find($OrderArbitratorInvoice->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$OrderArbitratorInvoice
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
                $OrderArbitratorInvoice = OrderArbitratorInvoice::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($OrderArbitratorInvoice) || empty($OrderArbitratorInvoice)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $OrderArbitratorInvoice
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new OrderArbitratorInvoicesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(OrderArbitratorInvoicesRequest $request,$id)
            {
            	$OrderArbitratorInvoice = OrderArbitratorInvoice::find($id);
            	if(is_null($OrderArbitratorInvoice) || empty($OrderArbitratorInvoice)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              OrderArbitratorInvoice::where("id",$id)->update($data);

              $OrderArbitratorInvoice = OrderArbitratorInvoice::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $OrderArbitratorInvoice
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.38]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
            	if(is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("orderarbitratorinvoice",$id);

               $orderarbitratorinvoices->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $orderarbitratorinvoices = OrderArbitratorInvoice::find($id);
	            	if(is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("orderarbitratorinvoice",$id);
                    	$orderarbitratorinvoices->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $orderarbitratorinvoices = OrderArbitratorInvoice::find($data);
	            	if(is_null($orderarbitratorinvoices) || empty($orderarbitratorinvoices)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("orderarbitratorinvoice",$data);

                    $orderarbitratorinvoices->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}