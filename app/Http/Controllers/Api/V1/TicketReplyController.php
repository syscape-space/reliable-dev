<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\TicketReplay;
use Illuminate\Http\Request;

class TicketReplyController extends Controller
{
    public function getAllReplysOfThisTicket($id){
        $ticketReplys = TicketReplay::join('tickets' , 'tickets.id' , '=' , 'ticket_replays.ticket_id')
                ->join('users' , 'users.id' , '=' , 'tickets.user_id')
                ->where('ticket_replays.ticket_id' , '=' , $id)
                ->get(['ticket_replays.*' , 'users.name' ]);

        return response()->json([
            "ticketReplys" => $ticketReplys 
        ] , 200) ;
    }
}
