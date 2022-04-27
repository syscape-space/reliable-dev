<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FormRegister extends Component
{
    public $currentStep =1,$membership_type,$account_type,$name,$id_number,$mobile,$email,$password;


    public function firstStepSubmit()
    {
        $this->validate([
            'membership_type' => 'required',
            'account_type' => 'required',
        ]);
        $this->currentStep = 2;
    }
    public function secondStepSubmit()
    {
        $data=$this->validate([
            'name' => 'required|alpha',
			'email' => 'required|email|unique:users,email',
			'mobile' => 'required|unique:users,mobile',
			'id_number' => 'required|unique:users',
			'password' => [
				'required',
				'string',
//                Password::min(6)->mixedCase()->numbers()->symbols()->uncompromised(),
			],
        ]);
        dd($data);
        User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'mobile' => $data['mobile'],
			'id_number' => $data['id_number'],
			'password' => bcrypt($data['password']),
			'membership_type' => $this->membership_type,
			'account_type' => $this->account_type,
		]);
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.form-register');
    }
}
