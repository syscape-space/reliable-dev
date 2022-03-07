<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UserQualification;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\UserQualificationsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class UserQualificationsApi extends Controller{
	protected $selectColumns = [
		"id",
		"qualification_name",
		"qualification_file",
		"user_id",
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
            	$UserQualification = UserQualification::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$UserQualification]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(UserQualificationsRequest $request)
    {
    	$data = $request->except("_token");
    	
                $data["qualification_file"] = "";
        $UserQualification = UserQualification::create($data); 
               if(request()->hasFile("qualification_file")){
              $UserQualification->qualification_file = it()->upload("qualification_file","userqualifications/".$UserQualification->id);
              $UserQualification->save();
              }

		  $UserQualification = UserQualification::with($this->arrWith())->find($UserQualification->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$UserQualification
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
                $UserQualification = UserQualification::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($UserQualification) || empty($UserQualification)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $UserQualification
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new UserQualificationsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(UserQualificationsRequest $request,$id)
            {
            	$UserQualification = UserQualification::find($id);
            	if(is_null($UserQualification) || empty($UserQualification)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile("qualification_file")){
              it()->delete($UserQualification->qualification_file);
              $data["qualification_file"] = it()->upload("qualification_file","userqualifications/".$UserQualification->id);
               }
              UserQualification::where("id",$id)->update($data);

              $UserQualification = UserQualification::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $UserQualification
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $userqualifications = UserQualification::find($id);
            	if(is_null($userqualifications) || empty($userqualifications)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($userqualifications->qualification_file)){
               it()->delete($userqualifications->qualification_file);
              }
               it()->delete("userqualification",$id);

               $userqualifications->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $userqualifications = UserQualification::find($id);
	            	if(is_null($userqualifications) || empty($userqualifications)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($userqualifications->qualification_file)){
                    	it()->delete($userqualifications->qualification_file);
                    	}
                    	it()->delete("userqualification",$id);
                    	$userqualifications->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $userqualifications = UserQualification::find($data);
	            	if(is_null($userqualifications) || empty($userqualifications)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($userqualifications->qualification_file)){
                    	it()->delete($userqualifications->qualification_file);
                    	}
                    	it()->delete("userqualification",$data);

                    $userqualifications->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}