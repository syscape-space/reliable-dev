<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\UsersRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class UsersApi extends Controller{
	protected $selectColumns = [
		"id",
		"first_name",
		"middle_name",
		"last_name",
		"name",
		"email",
		"email_verify",
		"mobile",
		"mobile_verify",
		"email_verify_code",
		"mobile_verify_code",
		"photo_profile",
		"rate_overall",
		"membership_type",
		"account_type",
		"id_number",
		"id_type",
		"id_status",
		"unseen_msg",
		"unseen_notification",
		"address",
		"lng",
		"lat",
		"bio",
		"birth_date",
		"account_status",
		"ban_reason",
		"refused_reason",
		"ban_end_at",
		"system_comment",
		"subscribe_end_at",
		"company_id",
		"add_offer",
		"disable_adding_offer_reason",
		"add_request",
		"disable_adding_request_reason",
		"gender",
		"password",
		"current_balance",
		"suspended_balance",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.37]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['company_id',];
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$User = User::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$User]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(UsersRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
                $data["photo_profile"] = "";
        $User = User::create($data); 
               if(request()->hasFile("photo_profile")){
              $User->photo_profile = it()->upload("photo_profile","users/".$User->id);
              $User->save();
              }

		  $User = User::with($this->arrWith())->find($User->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$User
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
                $User = User::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($User) || empty($User)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $User
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new UsersRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(UsersRequest $request,$id)
            {
            	$User = User::find($id);
            	if(is_null($User) || empty($User)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
               if(request()->hasFile("photo_profile")){
              it()->delete($User->photo_profile);
              $data["photo_profile"] = it()->upload("photo_profile","users/".$User->id);
               }
              User::where("id",$id)->update($data);

              $User = User::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $User
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $users = User::find($id);
            	if(is_null($users) || empty($users)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($users->photo_profile)){
               it()->delete($users->photo_profile);
              }
               it()->delete("user",$id);

               $users->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $users = User::find($id);
	            	if(is_null($users) || empty($users)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($users->photo_profile)){
                    	it()->delete($users->photo_profile);
                    	}
                    	it()->delete("user",$id);
                    	$users->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $users = User::find($data);
	            	if(is_null($users) || empty($users)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($users->photo_profile)){
                    	it()->delete($users->photo_profile);
                    	}
                    	it()->delete("user",$data);

                    $users->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}