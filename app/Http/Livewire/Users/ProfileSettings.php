<?php

namespace App\Http\Livewire\Users;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\Occupation;
use App\Models\Specialtie;
use App\Models\User;
use App\Models\UserCommercial;
use App\Models\UserExperience;
use App\Models\UserJob;
use App\Models\UserLicense;
use App\Models\UserQualification;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileSettings extends Component
{
    use WithFileUploads;
    public $user_id, $id_number, $name, $email, $email_verify, $mobile_verify, $mobile, $membership_type,$account_type, $gender, $main_department, $sub_department, $user_specialties, $country_id, $city_id, $address, $commercial_end_at, $commercial_file, $commercial_id, $license_name, $license_file, $license_end_at, $qualification_file, $qualification_name, $experience_name, $experience_file, $bio, $current = 1, $sub_departments, $cities, $specialties,$consulting,$photo_profile,$profile_img;

    protected function rules()
    {
        return [
            'name' => ['required', 'string'],
            'id_number' => ['required', 'unique:users,id_number,' . $this->user_id],
            'gender' => ['in:male,female', 'required'],
            'main_department' => ['nullable', 'exists:departments,id'],
            'sub_department' => ['nullable', 'exists:departments,id'],
            'country_id' => ['exists:countries,id', 'nullable'],
            'city_id' => ['exists:cities,id', 'nullable'],
            'address' => ['nullable', 'string'],
            'commercial_id' => ['required_if:commercial_end_at,commercial_file'],
            'commercial_end_at' => ['required_if:commercial_id,commercial_file'],
            'commercial_file' => ['required_if:commercial_end_at,commercial_id'],
            'license_file' => '',
            'license_name' => '',
            'license_end_at' => '',
            'qualification_name' => '',
            'qualification_file' => '',
            'experience_name' => '',
            'experience_file' => '',
            'bio' => '',
            'consulting'=>'nullable',
            'photo_profile'=>'nullable',
            'user_specialties'=>''
        ];
    }
    protected $messages = [
        'name.required' => '?????? ?????????? ??????????',
        'id_number.required' => '?????? ?????????? ?????? ????????????',
        'name.string' => '?????? ???? ???????? ?????????? ??????',
        'gender.required' => '???????? ???????????? ??????????',
    ];

    public function update() 
    {
        $data = $this->validate();
        $data['user_id'] = $this->user_id;
        if ($this->photo_profile) {
            $data['photo_profile'] = it()->upload($data['photo_profile'], 'users/' . auth()->id());
        }else{
            $data['photo_profile']=$this->profile_img;
        }
        auth()->user()->update($data);
        auth()->user()->third_departments()->sync($this->user_specialties);
        
        if ($this->commercial_file && $this->commercial_id && $this->commercial_end_at) {
            $data['commercial_file'] = it()->upload($data['commercial_file'], 'userCommercial/' . auth()->id());
            UserCommercial::create($data);
        }
        if ($this->license_file && $this->license_name  && $this->license_end_at) {
            $data['license_file'] = it()->upload($data['license_file'], 'userLicense/' . auth()->id());
            UserLicense::create($data);
        }
        if ($this->qualification_name && $this->qualification_file) {
            $data['qualification_file'] = it()->upload($data['qualification_file'], 'userqualifications/' . auth()->id());
            UserQualification::create($data);
        }
        if ($this->experience_name && $this->experience_file) {
            $data['experience_file'] = it()->upload($data['experience_file'], 'userexperience/' . auth()->id());
            UserExperience::create($data);
        }
        $this->reset(['commercial_file', 'commercial_id', 'commercial_end_at', 'license_file', 'license_name', 'license_end_at', 'experience_file', 'experience_name', 'qualification_file', 'qualification_name','photo_profile']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => '???? ?????????? ?????????????????? ??????????']);
    }


    public function mount()
    {
        /* dd(cloudUrl(auth()->user()->photo_profile)); */
        $user = User::findOrFail(auth()->id());
        $this->user_id = $user->id;
        $this->id_number = $user->id_number;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->email_verify = $user->email_verify;
        $this->mobile = $user->mobile;
        $this->mobile_verify = $user->mobile_verify;
        $this->gender = $user->gender;
        $this->membership_type = $user->membership_type;
        $this->account_type = $user->account_type;
        $this->main_department = $user->main_department;
        $this->sub_department = $user->sub_department;
        $this->country_id = $user->country_id;
        $this->city_id = $user->city_id;
        $this->address = $user->address;
        $this->bio = $user->bio;
        $this->consulting = $user->consulting;
        $this->profile_img = $user->photo_profile;
        $this->user_specialties=$user->third_departments()->pluck('departments.id');
        $this->sub_departments = $this->main_department ? Department::whereParent($this->main_department)->get() : collect();
        $this->cities = $this->country_id ? City::select('id', 'city_name_ar')->where('country_id', $this->country_id)->get() : collect();
        $this->specialties = $this->sub_department ? Department::whereParent($this->sub_department)->get() : collect();

    }

    public function updatedUserSpecialties()
    {
        $this->specialties = Department::whereParent($this->sub_department)->get();
    }

    public function updatedMainDepartment()
    {
        $this->sub_departments = Department::whereParent($this->main_department)->get();
    }
public function updatedSubDepartment()
    {
        $this->specialties = Department::whereParent($this->sub_department)->get();
    }

    public function updatedCountryId()
    {
        $this->cities = $this->country_id ? City::select('id', 'city_name_ar')->where('country_id', $this->country_id)->get() : collect();
    }

    public function render()
    {
        $main_departments = Department::whereNull('parent')->get();
        /* $sub_departments = $this->main_department?Department::whereParent($this->main_department)->get():collect(); */
        $countries = Country::select('id', 'country_name_ar')->get();
        $cities = $this->country_id ? City::select('id', 'city_name_ar')->where('country_id', $this->country_id)->get() : collect();
        /* $occupations=Occupation::select('id','occupation_name_ar')->get();
        $specialties=$this->occupation_id?Specialtie::where('occupation_id',$this->occupation_id)->get():collect();
        if($this->user_id && $this->occupation_id && $this->specialtie_id){
            $user_jobs=UserJob::where(['user_id'=>$this->user_id , 'occupation_id'=>$this->occupation_id, 'specialtie_id'=>$this->specialtie_id])->get();
        }else{
            $user_jobs=collect();
        } */
        return view('livewire.front.users.profile-settings', compact('main_departments', 'countries', 'cities'))->extends('front.layout.index')->section('content');
    }
}
