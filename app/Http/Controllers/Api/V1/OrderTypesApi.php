<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\OrderType;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\OrderTypesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class OrderTypesApi extends Controller{
	protected $selectColumns = [
		"id",
		"type_name_ar",
		"type_name_en",
		"type_desc_ar",
		"type_desc_en",
		"type_icon",
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
            	$OrderType = OrderType::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
               return successResponseJson(["data"=>$OrderType]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(OrderTypesRequest $request)
    {
    	$data = $request->except("_token");
    	
              $data["user_id"] = auth()->id(); 
                $data["type_icon"] = "";
        $OrderType = OrderType::create($data); 
               if(request()->hasFile("type_icon")){
              $OrderType->type_icon = it()->upload("type_icon","ordertypes/".$OrderType->id);
              $OrderType->save();
              }

		  $OrderType = OrderType::with($this->arrWith())->find($OrderType->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$OrderType
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
                $OrderType = OrderType::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($OrderType) || empty($OrderType)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $OrderType
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new OrderTypesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(OrderTypesRequest $request,$id)
            {
            	$OrderType = OrderType::find($id);
            	if(is_null($OrderType) || empty($OrderType)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              $data["user_id"] = auth()->id(); 
               if(request()->hasFile("type_icon")){
              it()->delete($OrderType->type_icon);
              $data["type_icon"] = it()->upload("type_icon","ordertypes/".$OrderType->id);
               }
              OrderType::where("id",$id)->update($data);

              $OrderType = OrderType::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $OrderType
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $ordertypes = OrderType::find($id);
            	if(is_null($ordertypes) || empty($ordertypes)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


              if(!empty($ordertypes->type_icon)){
               it()->delete($ordertypes->type_icon);
              }
               it()->delete("ordertype",$id);

               $ordertypes->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $ordertypes = OrderType::find($id);
	            	if(is_null($ordertypes) || empty($ordertypes)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	if(!empty($ordertypes->type_icon)){
                    	it()->delete($ordertypes->type_icon);
                    	}
                    	it()->delete("ordertype",$id);
                    	$ordertypes->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $ordertypes = OrderType::find($data);
	            	if(is_null($ordertypes) || empty($ordertypes)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	if(!empty($ordertypes->type_icon)){
                    	it()->delete($ordertypes->type_icon);
                    	}
                    	it()->delete("ordertype",$data);

                    $ordertypes->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}