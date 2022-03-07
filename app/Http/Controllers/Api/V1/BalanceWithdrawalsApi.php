<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BalanceWithdrawal;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\BalanceWithdrawalsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]
class BalanceWithdrawalsApi extends Controller{
	protected $selectColumns = [
		"id",
		"user_id",
		"amount",
		"receipt_via",
		"transfer_picture",
		"withdrawal_status",
		"reason",
		"system_notes",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.38]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['user_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$BalanceWithdrawal = BalanceWithdrawal::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$BalanceWithdrawal]);
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(BalanceWithdrawalsRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
                $data["transfer_picture"] = "";
        $BalanceWithdrawal = BalanceWithdrawal::create($data); 
               if(request()->hasFile("transfer_picture")){
              $BalanceWithdrawal->transfer_picture = it()->upload("transfer_picture","balancewithdrawals/".$BalanceWithdrawal->id);
              $BalanceWithdrawal->save();
              }

		  $BalanceWithdrawal = BalanceWithdrawal::with($this->arrWith())->find($BalanceWithdrawal->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$BalanceWithdrawal
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
                $BalanceWithdrawal = BalanceWithdrawal::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($BalanceWithdrawal) || empty($BalanceWithdrawal)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $BalanceWithdrawal
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new BalanceWithdrawalsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(BalanceWithdrawalsRequest $request,$id)
            {
            	$BalanceWithdrawal = BalanceWithdrawal::find($id);
            	if(is_null($BalanceWithdrawal) || empty($BalanceWithdrawal)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
               if(request()->hasFile("transfer_picture")){
              it()->delete($BalanceWithdrawal->transfer_picture);
              $data["transfer_picture"] = it()->upload("transfer_picture","balancewithdrawals/".$BalanceWithdrawal->id);
               }
              BalanceWithdrawal::where("id",$id)->update($data);

              $BalanceWithdrawal = BalanceWithdrawal::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $BalanceWithdrawal
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.38]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $balancewithdrawals = BalanceWithdrawal::find($id);
            	if(is_null($balancewithdrawals) || empty($balancewithdrawals)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($balancewithdrawals->transfer_picture)){
               it()->delete($balancewithdrawals->transfer_picture);
              }
               it()->delete("balancewithdrawal",$id);

               $balancewithdrawals->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $balancewithdrawals = BalanceWithdrawal::find($id);
	            	if(is_null($balancewithdrawals) || empty($balancewithdrawals)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($balancewithdrawals->transfer_picture)){
                    	it()->delete($balancewithdrawals->transfer_picture);
                    	}
                    	it()->delete("balancewithdrawal",$id);
                    	$balancewithdrawals->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $balancewithdrawals = BalanceWithdrawal::find($data);
	            	if(is_null($balancewithdrawals) || empty($balancewithdrawals)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($balancewithdrawals->transfer_picture)){
                    	it()->delete($balancewithdrawals->transfer_picture);
                    	}
                    	it()->delete("balancewithdrawal",$data);

                    $balancewithdrawals->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}