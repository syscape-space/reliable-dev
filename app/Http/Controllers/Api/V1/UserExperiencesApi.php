<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\UserExperience;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\UserExperiencesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class UserExperiencesApi extends Controller{
	protected $selectColumns = [
		"id",
		"experience_name",
		"experience_file",
		"user_id",
		"comment",
        "status",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.37]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return ['user_id'];
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$UserExperience = UserExperience::select($this->selectColumns)
                    ->whereUserId(auth('api')->id())
                    ->with($this->arrWith())->orderBy("id","desc")->get();
               return successResponseJson(["data"=>$UserExperience]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(UserExperiencesRequest $request)
    {
    	$data = $request->except("_token");
    	
                $data["experience_file"] = "";
        $UserExperience = UserExperience::create($data); 
               if(request()->hasFile("experience_file")){
              $UserExperience->experience_file = it()->upload("experience_file","userexperiences/".$UserExperience->id);
              $UserExperience->save();
              }

		  $UserExperience = UserExperience::with($this->arrWith())->find($UserExperience->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$UserExperience
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
                $UserExperience = UserExperience::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($UserExperience) || empty($UserExperience)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $UserExperience
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new UserExperiencesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(UserExperiencesRequest $request,$id)
            {
            	$UserExperience = UserExperience::find($id);
            	if(is_null($UserExperience) || empty($UserExperience)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
               if(request()->hasFile("experience_file")){
              it()->delete($UserExperience->experience_file);
              $data["experience_file"] = it()->upload("experience_file","userexperiences/".$UserExperience->id);
               }
              UserExperience::where("id",$id)->update($data);

              $UserExperience = UserExperience::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $UserExperience
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $userexperiences = UserExperience::find($id);
            	if(is_null($userexperiences) || empty($userexperiences)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($userexperiences->experience_file)){
               it()->delete($userexperiences->experience_file);
              }
               it()->delete("userexperience",$id);

               $userexperiences->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $userexperiences = UserExperience::find($id);
	            	if(is_null($userexperiences) || empty($userexperiences)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($userexperiences->experience_file)){
                    	it()->delete($userexperiences->experience_file);
                    	}
                    	it()->delete("userexperience",$id);
                    	$userexperiences->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $userexperiences = UserExperience::find($data);
	            	if(is_null($userexperiences) || empty($userexperiences)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($userexperiences->experience_file)){
                    	it()->delete($userexperiences->experience_file);
                    	}
                    	it()->delete("userexperience",$data);

                    $userexperiences->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}