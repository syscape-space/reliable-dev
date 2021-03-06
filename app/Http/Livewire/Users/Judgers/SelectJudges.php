<?php

namespace App\Http\Livewire\Users\Judgers;

use Livewire\Component;
use App\Models\User;

class SelectJudges extends Component
{
    public function render()
    {
        return view('livewire.front.users.judgers.select-judges', [
            'users' => User::where('membership_type', 'judger')->get(),
        ])->extends('front.layout.index')->section('content');
    }
}
