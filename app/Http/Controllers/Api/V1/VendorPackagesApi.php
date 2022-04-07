<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\VendorPackage;
use Validator;
use App\Http\Controllers\ValidationsApi\V1\VendorPackagesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class VendorPackagesApi extends Controller{
	protected $selectColumns = [
		"id",
		"user_id",
		"package_title",
		"package_content",
		"package_status",
		"number_purchases",
		"duration_package_days",
		"package_end_at",
		"package_price",
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
            	$VendorPackage = VendorPackage::select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->get();
               return successResponseJson(["data"=>$VendorPackage]);
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * Store a newly created resource in storage. Api
             * @return \Illuminate\Http\Response
             */
    public function store(VendorPackagesRequest $request)
    {
    	$data = $request->except("_token");
    	
        $VendorPackage = VendorPackage::create($data); 

		  $VendorPackage = VendorPackage::with($this->arrWith())->find($VendorPackage->id,$this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.added"),
            "data"=>$VendorPackage
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
                $VendorPackage = VendorPackage::with($this->arrWith())->find($id,$this->selectColumns);
            	if(is_null($VendorPackage) || empty($VendorPackage)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}

                 return successResponseJson([
              "data"=> $VendorPackage
              ]);  ;
            }


            /**
             * Baboon Api Script By [it v 1.6.37]
             * update a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				       $fillableCols = [];
				       foreach (array_keys((new VendorPackagesRequest)->attributes()) as $fillableUpdate) {
  				        if (!is_null(request($fillableUpdate))) {
						  $fillableCols[$fillableUpdate] = request($fillableUpdate);
						}
				       }
  				     return $fillableCols;
  	     		}

            public function update(VendorPackagesRequest $request,$id)
            {
            	$VendorPackage = VendorPackage::find($id);
            	if(is_null($VendorPackage) || empty($VendorPackage)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
  			       }

            	$data = $this->updateFillableColumns();
                 
              VendorPackage::where("id",$id)->update($data);

              $VendorPackage = VendorPackage::with($this->arrWith())->find($id,$this->selectColumns);
              return successResponseJson([
               "message"=>trans("admin.updated"),
               "data"=> $VendorPackage
               ]);
            }

            /**
             * Baboon Api Script By [it v 1.6.37]
             * destroy a newly created resource in storage.
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $vendorpackages = VendorPackage::find($id);
            	if(is_null($vendorpackages) || empty($vendorpackages)){
            	 return errorResponseJson([
            	  "message"=>trans("admin.undefinedRecord")
            	 ]);
            	}


               it()->delete("vendorpackage",$id);

               $vendorpackages->delete();
               return successResponseJson([
                "message"=>trans("admin.deleted")
               ]);
            }



 			public function multi_delete()
            {
                $data = request("selected_data");
                if(is_array($data)){
                    foreach($data as $id){
                    $vendorpackages = VendorPackage::find($id);
	            	if(is_null($vendorpackages) || empty($vendorpackages)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}

                    	it()->delete("vendorpackage",$id);
                    	$vendorpackages->delete();
                    }
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }else {
                    $vendorpackages = VendorPackage::find($data);
	            	if(is_null($vendorpackages) || empty($vendorpackages)){
	            	 return errorResponseJson([
	            	  "message"=>trans("admin.undefinedRecord")
	            	 ]);
	            	}
 
                    	it()->delete("vendorpackage",$data);

                    $vendorpackages->delete();
                    return successResponseJson([
                     "message"=>trans("admin.deleted")
                    ]);
                }
            }

            
}