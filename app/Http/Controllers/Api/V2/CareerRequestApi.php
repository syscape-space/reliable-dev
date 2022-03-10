<?php
namespace App\Http\Controllers\Api\V2;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CareerRequest;
use Prophecy\Call\Call;
use Ahmedjoda\JodaResources\JodaResource;
use Validator, Str;
// use App\Http\Controllers\ValidationsApi\V1\UserJobsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class CareerRequestApi extends Controller{
	
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile' => 'required|max:10',
            'attached_url' => 'required|max:20000|mimes:doc,docx,pdf,jpg,jpeg,png'
        ]);

        if($validator->fails()){
            return errorResponseJson([
                "errors" => $validator->errors()->all(),
                'message' => 'البيانات غير كاملة'
            ]);
        }

        $data = $validator->valid();

        if($request->hasFile('attached_url')){
            $file = request()->file('attached_url');
            $fileMime = $file->getClientOriginalExtension();
            $fileUrl = Str::random(16) . ".$fileMime";
            request()->file('attached_url')->move('career_requests', $fileUrl);
            $data['attached_url'] = $fileUrl;
        }

        CareerRequest::create($data);

        return successResponseJson([
            'message' => trans('main.successfully_sent'),
        ]);

    }

}