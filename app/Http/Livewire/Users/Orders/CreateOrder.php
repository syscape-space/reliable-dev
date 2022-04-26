<?php

namespace App\Http\Livewire\Users\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\Department;

class CreateOrder extends Component
{
 
    public $order; 
    public $main_departments; 
    public $second_department_id; 
    public $second_departments;
    public $third_departments; 


    public function mount(){
        $this->order = Order::first();
        $this->main_departments = Department::where('parent', null)->get();
        $this->second_departments = Department::query()->whereParent($this->main_departments->first()->id)->get();
        $this->third_departments = collect([]);
    }


    public function render()
    {
        return view('livewire.front.users.orders.create-order')->extends('livewire.front.layout.null');
    }


    public function select_second_department($id)
    {
        $this->second_department_id = $id;
        $this->third_departments = Department::query()->whereParent($id)->get();
    }
}
