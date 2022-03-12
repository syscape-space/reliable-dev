<?php
namespace App\Http\Controllers\Api\V2;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidationsApi\V1\UsersRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Prophecy\Call\Call;
use Validator;
// use App\Http\Controllers\ValidationsApi\V1\UserJobsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class UpdateUserProfileController extends Controller{
	protected $selectColumns = [
		"id",
		"first_name",
		"middle_name",
		"last_name",
		"name",
		"email",
		"email_verify",
		"mobile",
		"mobile_verify",
		"email_verify_code",
		"mobile_verify_code",
		"photo_profile",
		"rate_overall",
		"membership_type",
		"account_type",
		"id_number",
		"id_type",
		"id_status",
		"unseen_msg",
		"unseen_notification",
		"address",
		"lng",
		"lat",
		"bio",
		"birth_date",
		"account_status",
		"ban_reason",
		"refused_reason",
		"ban_end_at",
		"system_comment",
		"subscribe_end_at",
		"company_id",
		"add_offer",
		"disable_adding_offer_reason",
		"add_request",
		"disable_adding_request_reason",
		"gender",
		"password",
		"current_balance",
		"suspended_balance",
	];

    public function arrWith(){
        return ['company_id',];
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=>'required|string',
            'middle_name'=>'required|string',
            'last_name'=>'required|string',
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email,' . $id,
            'mobile'=>'sometimes|nullable|numeric',
            'mobile_verify'=>'required|string|in:pending,verified',
            'email_verify_code'=>'sometimes|nullable|numeric',
            'mobile_verify_code'=>'sometimes|nullable|numeric',
            'photo_profile'=>'sometimes|nullable|file|image',
            'rate_overall'=>'sometimes|nullable|numeric',
            'membership_type'=>'sometimes|nullable|string|in:user,vendor,employee',
            'account_type'=>'sometimes|nullable|integer|in:individual,company',
            'id_number'=>'sometimes|nullable|numeric',
            'id_type'=>'sometimes|nullable|string|in:national_id,iqama,passport',
            'id_status'=>'sometimes|nullable|string|in:pending,verified,refused',
            'unseen_msg'=>'sometimes|nullable|numeric',
            'unseen_notification'=>'sometimes|nullable|numeric',
            'address'=>'sometimes|nullable|string',
            'lng'=>'sometimes|nullable|string',
            'lat'=>'sometimes|nullable|string',
            'bio'=>'sometimes|nullable|string',
            'birth_date'=>'sometimes|nullable|date',
            'account_status'=>'sometimes|nullable|string|in:pending,active,refused,ban',
            'ban_reason'=>'sometimes|nullable|string',
            'refused_reason'=>'sometimes|nullable|string',
            'ban_end_at'=>'sometimes|nullable|date',
            'system_comment'=>'sometimes|nullable|string',
            'subscribe_end_at'=>'sometimes|nullable|date',
            'company_id'=>'sometimes|nullable|integer|exists:users,id',
            'add_offer'=>'required|string|in:enable,disable',
            'disable_adding_offer_reason'=>'sometimes|nullable|string',
            'add_request'=>'sometimes|nullable|string|in:enable,disable',
            'disable_adding_request_reason'=>'',
            'gender'=>'sometimes|nullable|string|in:male,female',
            'password'=>'sometimes|nullable|string',
            'current_balance'=>'sometimes|nullable|numeric',
            'suspended_balance'=>'sometimes|nullable|numeric',
        ]);

        if($validator->fails()){
            return errorResponseJson([
                "errors" => $validator->errors()->all(),
                'message' => 'البيانات غير كاملة'
            ]);
        }

        $user = User::find($id);
        if(is_null($user) || empty($user)){
            return errorResponseJson([
                "message"=>trans("admin.undefinedRecord")
            ]);
        }

        $data = $validator->valid();
    
        $data["user_id"] = auth()->id();

        if($request->hasFile('photo_profile')){
            if(file_exists(public_path('photo_profile/' . $user->photo_profile)))
                unlink(public_path('photo_profile/' . $user->photo_profile));
            $file = request()->file('photo_profile');
            $fileMime = $file->getClientOriginalExtension();
            $fileUrl = Str::random(16) . ".$fileMime";
            request()->file('photo_profile')->move('photo_profile', $fileUrl);
            $data['photo_profile'] = $fileUrl;
        }

        User::where("id", $id)->update($data);

        $user = User::with($this->arrWith())->find($id, $this->selectColumns);
        return successResponseJson([
            "message"=>trans("admin.updated"),
            "data"=> $user
        ]);
    }
}