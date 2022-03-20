<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function getMyTickets (){
        // $tickets = Ticket::where('user_id' , '=' , $id);
        $tickets = Ticket::all();

    return response()->json([
        "tickets" => $tickets , 
    ] , 200) ;
    }
}
