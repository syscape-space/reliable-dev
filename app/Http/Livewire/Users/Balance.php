<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;

class Balance extends Component
{
    public function render()
    {
        return view('livewire.front.users.balance')->extends('front.layout.index')->section('content');
    }
}
