<?php

namespace App\Http\Livewire\Users\Vendors;

use App\Models\Department;
use App\Models\User;
use Livewire\Component;

class VendorSettings extends Component
{
    public $name,$gender,$main_department,$sub_department ;
    public function mount(){
        $user=User::findOrFail(auth()->id());
        $this->name=$user->name;
        $this->gender=$user->gender;
        $this->main_department=$user->main_department;
        $this->sub_department=$user->sub_department;
    }
    public function render()
    {
        $main_departments=Department::whereNull('parent')->get();
        $sub_departments=Department::whereNotNull('parent')->get();
        return view('livewire.front.users.vendors.vendor-settings',compact('main_departments','sub_departments'))->extends('front.layout.index')->section('content');
    }
}
