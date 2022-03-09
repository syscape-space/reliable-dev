<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Validations\CareerRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Career;
use Prophecy\Call\Call;
use Validator;
// use App\Http\Controllers\ValidationsApi\V1\UserJobsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class CareerApi extends Controller{
	protected $selectColumns = [
		"id",
		"address",
		"qualification",
        "experience",
		"description",
        "start_at",
        "end_at"
	];

    public function index()
    {
        $careers = Career::select($this->selectColumns)->orderBy("id","desc")->paginate(15);
        return successResponseJson(["data" => $careers]);
    }    
}