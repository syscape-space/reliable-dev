<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function getMyTickets ($id){
        // $tickets = Ticket::where('user_id' , '=' , $id);

        $tickets = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
                ->where('tickets.user_id' , '=' , $id)
                ->get(['users.*', 'tickets.*']);

        $relevantTickets = Ticket::where('user_id', '=', $id)->get();
        $ticketsCount = $relevantTickets->count();

    return response()->json([
        "tickets" => $tickets , 
        "myTicketsCount" => $ticketsCount
    ] , 200) ;
    }
}
