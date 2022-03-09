<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SubscriptionFee;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\SubscriptionFeesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class SubscriptionFeesApi extends Controller{
	protected $selectColumns = [
		"id",
		"user_id",
		"amount",
		"payment_method",
		"payment_status",
		"refused_reason",
		"electronic_payment_ref",
		"user_note",
		"comment",
	];

    /**
     * Display the specified releationshop.
     * Baboon Api Script By [it v 1.6.37]
     * @return array to assign with index & show methods
     */
    public function arrWith(){
        return ['user_id',];
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Display a listing of the resource. Api
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SubscriptionFee = SubscriptionFee::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
        return successResponseJson(["data"=>$SubscriptionFee]);
    }


    /**
     * Baboon Api Script By [it v 1.6.37]
     * Store a newly created resource in storage. Api
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriptionFeesRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
        $SubscriptionFee = SubscriptionFee::create($data); 

		  $SubscriptionFee = SubscriptionFee::with($this->arrWith())->find($SubscriptionFee->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$SubscriptionFee
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
        $SubscriptionFee = SubscriptionFee::with($this->arrWith())->find($id,$this->selectColumns);
        if(is_null($SubscriptionFee) || empty($SubscriptionFee)){
            return errorResponseJson([
            "message"=>trans("admin.undefinedRecord")
            ]);
        }

            return successResponseJson([
        "data"=> $SubscriptionFee
        ]);  ;
    }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
                $fillableCols = [];
                foreach (array_keys((new SubscriptionFeesRequest)->attributes()) as $fillableUpdate) {
                if (!is_null(request($fillableUpdate))) {
                    $fillableCols[$fillableUpdate] = request($fillableUpdate);
                }
                }
                return $fillableCols;
            }

            public function update(SubscriptionFeesRequest $request,$id)
            {
            	$SubscriptionFee = SubscriptionFee::find($id);
            	if(is_null($SubscriptionFee) || empty($SubscriptionFee)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
              SubscriptionFee::where("id",$id)->update($data);

              $SubscriptionFee = SubscriptionFee::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $SubscriptionFee
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $subscriptionfees = SubscriptionFee::find($id);
            	if(is_null($subscriptionfees) || empty($subscriptionfees)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("subscriptionfee",$id);

               $subscriptionfees->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $subscriptionfees = SubscriptionFee::find($id);
	            	if(is_null($subscriptionfees) || empty($subscriptionfees)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("subscriptionfee",$id);
                    	$subscriptionfees->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $subscriptionfees = SubscriptionFee::find($data);
	            	if(is_null($subscriptionfees) || empty($subscriptionfees)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("subscriptionfee",$data);

                    $subscriptionfees->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}