<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\VendorPackage;

class Subscription extends Component
{
    public function render()
    {
        $packages = VendorPackage::where('package_status', 'show')->get();
        return view('livewire.users.subscription', [
            'packages' => $packages
        ]);
    }
}
