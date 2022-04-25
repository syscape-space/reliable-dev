<?php

namespace App\Http\Livewire\Users\Vendors;

use App\Models\City;
use App\Models\Country;
use App\Models\Department;
use App\Models\User;
use App\Models\UserCommercial;
use Livewire\Component;
use Livewire\WithFileUploads;
class VendorSettings extends Component
{
    use WithFileUploads;
    public $user_id, $name, $email, $email_verify, $mobile_verify, $mobile, $gender, $main_department, $sub_department, $country_id, $city_id, $address,$commercial_end_at,$commercial_file,$commercial_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string'],
            'gender' => ['in:male,female', 'required'],
            'main_department' => ['nullable', 'exists:departments,id'],
            'sub_department' => ['nullable', 'exists:departments,id'],
            'country_id' => ['exists:countries,id', 'nullable'],
            'city_id' => ['exists:cities,id', 'nullable'],
            'address' => ['nullable', 'string'],
            'commercial_id'=>['required_if:commercial_end_at,commercial_file'],
            'commercial_end_at'=>['required_if:commercial_id,commercial_file'],
            'commercial_file'=>['required_if:commercial_end_at,commercial_id']
        ];
    }
    protected $messages = [
        'name.required' => 'يجب ادخال الاسم',
        'name.string' => 'يجب أن يكون الاسم نصا',
        'gender.required' => 'يرجى اختيار الجنس',
    ];

    public function update()
    {
        $data = $this->validate();
        $data['user_id']=$this->user_id;
        auth()->user()->update($data);
        if($this->commercial_file){
            $data['commercial_file']=$this->commercial_file->storeAs('attachments/commercial','commercial'.time(),'local');
            UserCommercial::create($data);
        }
        $this->reset(['commercial_file','commercial_id','commercial_end_at']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل الإعدادات بنجاح']);
    }


    public function mount()
    {
        $user = User::findOrFail(auth()->id());
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->email_verify = $user->email_verify;
        $this->mobile = $user->mobile;
        $this->mobile_verify = $user->mobile_verify;
        $this->gender = $user->gender;
        $this->main_department = $user->main_department;
        $this->sub_department = $user->sub_department;
        $this->sub_department = $user->sub_department;
        $this->sub_department = $user->sub_department;
        $this->country_id = $user->country_id;
        $this->city_id = $user->city_id;
        $this->address = $user->address;
    }
    public function render()
    {
        $main_departments = Department::whereNull('parent')->get();
        $sub_departments = $this->main_department?Department::whereParent($this->main_department)->get():collect();
        $countries = Country::select('id', 'country_name_ar')->get();
        $cities = $this->country_id?City::select('id', 'city_name_ar')->where('country_id',$this->country_id)->get():collect();
        return view('livewire.users.vendors.vendor-settings', compact('main_departments', 'sub_departments', 'countries', 'cities'))->extends('front.layout.index')->section('content');
    }
}
