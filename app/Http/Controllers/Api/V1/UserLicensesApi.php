<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UserLicense;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\UserLicensesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class UserLicensesApi extends Controller{
	protected $selectColumns = [
		"id",
		"license_name",
		"license_file",
		"user_id",
		"license_end_at",
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
            	$UserLicense = UserLicense::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$UserLicense]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(UserLicensesRequest $request)
    {
    	$data = $request->except("_token");
    	
                $data["license_file"] = "";
        $UserLicense = UserLicense::create($data); 
               if(request()->hasFile("license_file")){
              $UserLicense->license_file = it()->upload("license_file","userlicenses/".$UserLicense->id);
              $UserLicense->save();
              }

		  $UserLicense = UserLicense::with($this->arrWith())->find($UserLicense->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$UserLicense
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
                $UserLicense = UserLicense::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($UserLicense) || empty($UserLicense)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $UserLicense
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new UserLicensesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(UserLicensesRequest $request,$id)
            {
            	$UserLicense = UserLicense::find($id);
            	if(is_null($UserLicense) || empty($UserLicense)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile("license_file")){
              it()->delete($UserLicense->license_file);
              $data["license_file"] = it()->upload("license_file","userlicenses/".$UserLicense->id);
               }
              UserLicense::where("id",$id)->update($data);

              $UserLicense = UserLicense::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $UserLicense
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $userlicenses = UserLicense::find($id);
            	if(is_null($userlicenses) || empty($userlicenses)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($userlicenses->license_file)){
               it()->delete($userlicenses->license_file);
              }
               it()->delete("userlicense",$id);

               $userlicenses->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $userlicenses = UserLicense::find($id);
	            	if(is_null($userlicenses) || empty($userlicenses)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($userlicenses->license_file)){
                    	it()->delete($userlicenses->license_file);
                    	}
                    	it()->delete("userlicense",$id);
                    	$userlicenses->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $userlicenses = UserLicense::find($data);
	            	if(is_null($userlicenses) || empty($userlicenses)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($userlicenses->license_file)){
                    	it()->delete($userlicenses->license_file);
                    	}
                    	it()->delete("userlicense",$data);

                    $userlicenses->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}