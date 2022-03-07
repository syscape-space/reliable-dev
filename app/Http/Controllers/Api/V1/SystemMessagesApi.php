<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SystemMessage;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\SystemMessagesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.38]
// Copyright Reserved  [it v 1.6.38]
class SystemMessagesApi extends Controller{
	protected $selectColumns = [
		"id",
		"special_for",
		"message_ar",
		"message_en",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.38]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$SystemMessage = SystemMessage::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$SystemMessage]);
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(SystemMessagesRequest $request)
    {
    	$data = $request->except("_token");
    	
        $SystemMessage = SystemMessage::create($data); 

		  $SystemMessage = SystemMessage::with($this->arrWith())->find($SystemMessage->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$SystemMessage
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
                $SystemMessage = SystemMessage::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($SystemMessage) || empty($SystemMessage)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $SystemMessage
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.38]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new SystemMessagesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(SystemMessagesRequest $request,$id)
            {
            	$SystemMessage = SystemMessage::find($id);
            	if(is_null($SystemMessage) || empty($SystemMessage)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              SystemMessage::where("id",$id)->update($data);

              $SystemMessage = SystemMessage::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $SystemMessage
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.38]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $systemmessages = SystemMessage::find($id);
            	if(is_null($systemmessages) || empty($systemmessages)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("systemmessage",$id);

               $systemmessages->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $systemmessages = SystemMessage::find($id);
	            	if(is_null($systemmessages) || empty($systemmessages)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("systemmessage",$id);
                    	$systemmessages->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $systemmessages = SystemMessage::find($data);
	            	if(is_null($systemmessages) || empty($systemmessages)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("systemmessage",$data);

                    $systemmessages->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}