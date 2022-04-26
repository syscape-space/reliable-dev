<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Register extends Component
{
    public $current;
    public function render()
    {
        return view('auth.register')->extends('auth.register');
    }
}
