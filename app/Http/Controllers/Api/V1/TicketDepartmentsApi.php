<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TicketDepartment;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\TicketDepartmentsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class TicketDepartmentsApi extends Controller{
	protected $selectColumns = [
		"id",
		"department_name_ar",
		"department_name_en",
		"dep_icon",
		"department_desc_ar",
		"department_desc_en",
		"department_status",
	];

            /**
             * Display the specified releationshop.
             * Baboon Api Script By [it v 1.6.37]
             * @return array to assign with index & show methods
             */
            public function arrWith(){
               return [];
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
            	$TicketDepartment = TicketDepartment::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$TicketDepartment]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(TicketDepartmentsRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
                $data["dep_icon"] = "";
        $TicketDepartment = TicketDepartment::create($data); 
               if(request()->hasFile("dep_icon")){
              $TicketDepartment->dep_icon = it()->upload("dep_icon","ticketdepartments/".$TicketDepartment->id);
              $TicketDepartment->save();
              }

		  $TicketDepartment = TicketDepartment::with($this->arrWith())->find($TicketDepartment->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$TicketDepartment
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
                $TicketDepartment = TicketDepartment::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($TicketDepartment) || empty($TicketDepartment)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $TicketDepartment
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new TicketDepartmentsRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(TicketDepartmentsRequest $request,$id)
            {
            	$TicketDepartment = TicketDepartment::find($id);
            	if(is_null($TicketDepartment) || empty($TicketDepartment)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
               if(request()->hasFile("dep_icon")){
              it()->delete($TicketDepartment->dep_icon);
              $data["dep_icon"] = it()->upload("dep_icon","ticketdepartments/".$TicketDepartment->id);
               }
              TicketDepartment::where("id",$id)->update($data);

              $TicketDepartment = TicketDepartment::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $TicketDepartment
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $ticketdepartments = TicketDepartment::find($id);
            	if(is_null($ticketdepartments) || empty($ticketdepartments)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($ticketdepartments->dep_icon)){
               it()->delete($ticketdepartments->dep_icon);
              }
               it()->delete("ticketdepartment",$id);

               $ticketdepartments->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $ticketdepartments = TicketDepartment::find($id);
	            	if(is_null($ticketdepartments) || empty($ticketdepartments)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($ticketdepartments->dep_icon)){
                    	it()->delete($ticketdepartments->dep_icon);
                    	}
                    	it()->delete("ticketdepartment",$id);
                    	$ticketdepartments->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $ticketdepartments = TicketDepartment::find($data);
	            	if(is_null($ticketdepartments) || empty($ticketdepartments)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($ticketdepartments->dep_icon)){
                    	it()->delete($ticketdepartments->dep_icon);
                    	}
                    	it()->delete("ticketdepartment",$data);

                    $ticketdepartments->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}