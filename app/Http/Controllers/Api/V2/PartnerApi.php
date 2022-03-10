<?php
namespace App\Http\Controllers\Api\V2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Partner;
use Prophecy\Call\Call;
use Validator;
// use App\Http\Controllers\ValidationsApi\V1\UserJobsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class PartnerApi extends Controller{
	protected $selectColumns = [
		"id",
		"name",
		"logo",
        "link"
	];

    public function index()
    {
        $careers = Partner::select($this->selectColumns)->orderBy("id","desc")->paginate(15);
        return successResponseJson(["data" => $careers]);
    }  
}