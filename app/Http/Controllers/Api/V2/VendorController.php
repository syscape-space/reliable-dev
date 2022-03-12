<?php
namespace App\Http\Controllers\Api\V2;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\CareerRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Prophecy\Call\Call;
use Validator;
// use App\Http\Controllers\ValidationsApi\V1\UserJobsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class VendorController extends Controller{
	protected $selectColumns = [
		"id",
        "name",
        "bio",
        "photo_profile"
	];

    public function arrWith(){
        return ['user_job',];
    }

    public function index()
    {
        $vendors = User::where('membership_type', 'vendor')->select($this->selectColumns)->with($this->arrWith())->orderBy("id","desc")->paginate(15);
        return successResponseJson(["data" => $vendors]);
    }

    public function show($id)
    {
        $vendor = User::with($this->arrWith())->find($id, $this->selectColumns);
        if(is_null($vendor) || empty($vendor)){
            
            return errorResponseJson([
                "message" => trans("admin.undefinedRecord")
            ]);

        }
        
         return successResponseJson([
            "data"=> $vendor
        ]);  ;
    }
}