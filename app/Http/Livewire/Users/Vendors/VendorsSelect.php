<?php

namespace App\Http\Livewire\Users\Vendors;

use Livewire\Component;
use App\Models\User;

class VendorsSelect extends Component
{
    public function render()
    {
        return view('livewire.users.vendors.vendors-select', [
            'users' => User::where('membership_type', 'vendor')->get(),
        ]);
    }
}
