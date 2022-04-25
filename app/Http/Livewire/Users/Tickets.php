<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\Ticket;

class Tickets extends Component
{
    public function render()
    {
        $tickets = Ticket::where('user_id', 1)->get();
        return view('livewire.users.tickets', [
            'tickets' => $tickets,
        ]);
    }
}
