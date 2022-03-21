<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ValidationsApi\V1\UserLicensesRequest;
use App\Http\Controllers\ValidationsApi\V1\UsersRequest;
use App\Models\Specialtie;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserCommercial;
use App\Models\UserJob;
use App\Models\UserLicense;
use Exception;
use Illuminate\Support\Facades\Validator;
use Prophecy\Call\Call;
// use Validator;
// use App\Http\Controllers\ValidationsApi\V1\UserJobsRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.37]
// Copyright Reserved  [it v 1.6.37]
class UpdateUserProfileController extends Controller
{

    public function index(Request $request)
    {
        $user_id = $request->query('id');
        $type = $request->query('type');
        $user = User::find($user_id ?? 0);
        if (is_null($user) || empty($user)) {
            return redirect('/')->with('error', trans("admin.undefinedRecord"));
        }

        $license =  UserLicense::where('user_id', $user_id)->first();
        $commercial = UserCommercial::where('user_id', $user_id)->first();
        $subscribtion_end = $this->isPast($user->subscribe_end_at);

        $license_status = "unset";
        if (!is_null($license) && !empty($license)) {
            $license_status = $this->isPast($license->license_end_at) ? "end" : "active";
        }

        $commercial_status = "unset";
        if (!is_null($commercial) && !empty($commercial)) {
            $commercial_status = $this->isPast($commercial->commercial_end_at) ? "end" : "active";
        }

        //spe
        $specialties = Specialtie::all();
        return view('front.user.profile.mainProfile', [
            "base_url" => 'https://localhost:8000/public/storage/',
            "type" => $type,
            "user" => $user,
            "subscribtion_end" => $subscribtion_end,
            "license_status" => $license_status,
            "commercial_status" => $commercial_status,
            "license" => $license,
            "commercial" => $commercial,
            "specialties" => $specialties,
        ]);
    }

    private function isPast($date)
    {
        return Carbon::parse($date ?? '')->isPast();
    }

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

    public function arrWith()
    {
        return ['company_id',];
    }

    public function update(Request $request)
    {
        $id = $request->query('id');
        $data = request()->except(['_token']);
        $validator = Validator::make($data, [
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'sometimes|nullable|numeric',
            'photo_profile' => 'sometimes|nullable|file|image',
            'rate_overall' => 'sometimes|nullable|numeric',
            'membership_type' => 'sometimes|nullable|string|in:user,vendor,employee',
            'account_type' => 'sometimes|nullable|in:individual,company',
            'id_number' => 'sometimes|nullable|numeric',
            'id_type' => 'sometimes|nullable|string|in:national_id,iqama,passport',
            'id_status' => 'sometimes|nullable|string|in:pending,verified,refused',
            'unseen_msg' => 'sometimes|nullable|numeric',
            'unseen_notification' => 'sometimes|nullable|numeric',
            'address' => 'sometimes|nullable|string',
            'lng' => 'sometimes|nullable|string',
            'lat' => 'sometimes|nullable|string',
            'bio' => 'sometimes|nullable|string',
            'birth_date' => 'sometimes|nullable|date',
            'account_status' => 'sometimes|nullable|string|in:pending,active,refused,ban',
            'ban_reason' => 'sometimes|nullable|string',
            'refused_reason' => 'sometimes|nullable|string',
            'ban_end_at' => 'sometimes|nullable|date',
            'system_comment' => 'sometimes|nullable|string',
            'subscribe_end_at' => 'sometimes|nullable|date',
            'company_id' => 'sometimes|nullable|integer|exists:users,id',
            // 'add_offer' => 'required|string|in:enable,disable',
            'disable_adding_offer_reason' => 'sometimes|nullable|string',
            'add_request' => 'sometimes|nullable|string|in:enable,disable',
            'disable_adding_request_reason' => '',
            'gender' => 'sometimes|nullable|string|in:male,female',
            'password' => 'sometimes|nullable|string',
            'current_balance' => 'sometimes|nullable|numeric',
            'suspended_balance' => 'sometimes|nullable|numeric',
            'country_id' => 'required|numeric',
            'city_id' => 'required|numeric',

        ]);

        if ($validator->fails()) {
            // return redirect()->back()->withInput($data)->with('error', 'البيانات غير كاملة');
            return redirect()->back()->withInput($data)->with('error', join(",", $validator->errors()->all()));
        }

        $user = User::find($id);
        if (is_null($user) || empty($user)) {
            return redirect()->back()->with('error', trans("admin.undefinedRecord"));
        }

        $data = $validator->validated();

        // $data["user_id"] = auth()->id();
        if (\request()->password) {
            $data['password'] = bcrypt(\request()->password);
        }
        if ($request->hasFile('photo_profile')) {
            if (file_exists(public_path('photo_profile/' . $user->photo_profile)))
                unlink(public_path('photo_profile/' . $user->photo_profile));
            $file = request()->file('photo_profile');
            $fileMime = $file->getClientOriginalExtension();
            $fileUrl = Str::random(16) . ".$fileMime";
            request()->file('photo_profile')->move('photo_profile', $fileUrl);
            $data['photo_profile'] = $fileUrl;
        }

        User::where("id", $id)->update($data);

        $user = User::with($this->arrWith())->find($id, $this->selectColumns);

        return redirect()->back()->with('success', trans("admin.updated"));
        // return successResponseJson([
        //     "message" => trans("admin.updated"),
        //     "data" => $user
        // ]);
    }

    public function storeLicense(Request $request)
    {
        $data                 = $request->only("license_name", "license_file", "user_id", 'license_end_at', 'specialtie_id', 'comment');
        $validator = Validator::make($data, [
            'license_name'   => 'required|string',
            'license_file'   => 'required|file',
            'user_id'        => 'required|integer|exists:users,id',
            'license_end_at' => '',
            'specialtie_id'  => 'required|integer|exists:specialties,id',
            'comment'        => 'sometimes|nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($data)->with('error', 'البيانات غير كاملة');
        }
        if ($this->isPast($data['license_end_at'])) {
            return redirect()->back()->withInput($data)->with('error', 'تاريخ انتهاء الرخصة غير صالح');
        }
        $job = UserJob::where('specialtie_id', $data['specialtie_id'])->where('user_id', $data['user_id'])->first();
        if (is_null($job) || empty($job)) {
            return redirect()->back()->withInput($data)->with('error', 'برجاء اضافة وظيفة في هذا التخصص قبل اضافة الرخصة');
        }
        $license              = UserLicense::where('user_id', $data['user_id'])->first();
        $data['license_file'] = "";
        $data['occupation_id'] = $job->occupation_id;
        $data['user_job_id'] = $job->id;
        try {
            if ($license) {
                // update
                if (request()->hasFile('license_file')) {
                    it()->delete($license->license_file);
                    $data['license_file'] = it()->upload('license_file', 'userlicenses/' . $license->user_id);
                }
                UserLicense::where('id', $license->id)->update($data);
                return redirect()->back()->with('success', trans("admin.updated"));
            } else {
                // create
                $userlicenses         = UserLicense::create($data);
                if (request()->hasFile('license_file')) {
                    $userlicenses->license_file = it()->upload('license_file', 'userlicenses/' . $userlicenses->user_id);
                    $userlicenses->save();
                }
                return redirect()->back()->with('success', trans("admin.updated"));
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage()); //trans("admin.undefinedRecord"));
        }
        // return successResponseJson([
        //     "message" => trans("admin.added"),
        //     "data"    => $userlicenses,
        // ]);
    }

    public function storeCommercial(Request $request)
    {
        $data = $request->only("commercial_id", "commercial_file", "user_id", 'commercial_end_at', 'specialtie_id', 'comment');
        $validator = Validator::make($data, [
            'commercial_id'     => 'required|string',
            'commercial_file'   => 'required|file',
            'commercial_end_at' => 'required|date',
            'user_id'           => 'required|integer|exists:users,id',
            'comment'           => 'sometimes|nullable|string',
            'specialtie_id'  => 'required|integer|exists:specialties,id',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput($data)->with('error', 'البيانات غير كاملة');
        }
        if ($this->isPast($data['commercial_end_at'])) {
            return redirect()->back()->withInput($data)->with('error', 'تاريخ انتهاء السجل غير صالح');
        }
        $job = UserJob::where('specialtie_id', $data['specialtie_id'])->where('user_id', $data['user_id'])->first();
        if (is_null($job) || empty($job)) {
            return redirect()->back()->withInput($data)->with('error', 'برجاء اضافة وظيفة في هذا التخصص قبل اضافة السجل');
        }
        $commercial              = UserCommercial::where('user_id', $data['user_id'])->first();
        $data['commercial_file'] = "";
        $data['occupation_id'] = $job->occupation_id;
        $data['user_job_id'] = $job->id;
        try {
            if ($commercial) {
                // update
                if (request()->hasFile('commercial_file')) {
                    it()->delete($commercial->commercial_file);
                    $data['commercial_file'] = it()->upload('commercial_file', 'usercommercials/' . $commercial->user_id);
                }
                UserCommercial::where('id', $commercial->id)->update($data);
                return redirect()->back()->with('success', trans("admin.updated"));
            } else {
                // create
                $userCommercial        = UserCommercial::create($data);
                if (request()->hasFile('commercial_file')) {
                    $userCommercial->commercial_file = it()->upload('commercial_file', 'usercommercials/' . $userCommercial->user_id);
                    $userCommercial->save();
                }
                return redirect()->back()->with('success', trans("admin.updated"));
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
