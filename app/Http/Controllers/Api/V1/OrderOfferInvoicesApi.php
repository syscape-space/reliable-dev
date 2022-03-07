<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\OrderOfferInvoice;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\OrderOfferInvoicesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class OrderOfferInvoicesApi extends Controller{
	protected $selectColumns = [
		"id",
		"order_id",
		"offer_id",
		"offer_amount",
		"system_tax",
		"remaining_amount_to_vendor",
		"amount_deduction_from_user",
		"added_amount_to_vendor_balance",
		"added_amount_to_vendor_balance_at",
		"inovice_status",
		"system_note",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.37]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['order_id','offer_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$OrderOfferInvoice = OrderOfferInvoice::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$OrderOfferInvoice]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(OrderOfferInvoicesRequest $request)
    {
    	$data = $request->except("_token");
    	
        $OrderOfferInvoice = OrderOfferInvoice::create($data); 

		  $OrderOfferInvoice = OrderOfferInvoice::with($this->arrWith())->find($OrderOfferInvoice->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$OrderOfferInvoice
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
                $OrderOfferInvoice = OrderOfferInvoice::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($OrderOfferInvoice) || empty($OrderOfferInvoice)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $OrderOfferInvoice
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new OrderOfferInvoicesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(OrderOfferInvoicesRequest $request,$id)
            {
            	$OrderOfferInvoice = OrderOfferInvoice::find($id);
            	if(is_null($OrderOfferInvoice) || empty($OrderOfferInvoice)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              OrderOfferInvoice::where("id",$id)->update($data);

              $OrderOfferInvoice = OrderOfferInvoice::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $OrderOfferInvoice
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $orderofferinvoices = OrderOfferInvoice::find($id);
            	if(is_null($orderofferinvoices) || empty($orderofferinvoices)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("orderofferinvoice",$id);

               $orderofferinvoices->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $orderofferinvoices = OrderOfferInvoice::find($id);
	            	if(is_null($orderofferinvoices) || empty($orderofferinvoices)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("orderofferinvoice",$id);
                    	$orderofferinvoices->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $orderofferinvoices = OrderOfferInvoice::find($data);
	            	if(is_null($orderofferinvoices) || empty($orderofferinvoices)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("orderofferinvoice",$data);

                    $orderofferinvoices->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}