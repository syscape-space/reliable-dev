<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ValidationsApi\V1\TicketsRequest;
use App\Models\Files;
use App\Models\TicketReplay;

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

    public function getAllDepts (){
        $depts = TicketDepartment::get();
        
        return response()->json([
            "depts" => $depts
        ] , 200) ;
    }

    public function addNewTicket(Request $request ){
        $validated = $request->validate([
            'ticket_title' => 'required',
            'ticket_linked' => 'required',
            'ticket_department_id' => 'required',
            'ticket_content' => 'required',
        ]);

        $newTicket = new Ticket();
        $newTicket->ticket_title = $request->ticket_title ;
        $newTicket->ticket_linked = $request->ticket_linked ;
        $newTicket->user_id = $request->user_id ;
        $newTicket->ticket_department_id  = $request->ticket_department_id ;
        $newTicket->ticket_content = $request->ticket_content ;
        $newTicket->ticket_status = "opened" ;
        $newTicket->save();

        

        return response()->json([
                    "depts" => "saved" 
                ] , 200) ;

        
    }

    public function getSpecificTicket($id){
        $tickets = Ticket::join('users', 'tickets.user_id', '=', 'users.id')
                ->join('ticket_departments' , 'ticket_departments.id' , '=' , 'tickets.ticket_department_id' )
                ->where('tickets.id' , '=' , $id)
                ->get(['users.*', 'tickets.*' , 'ticket_departments.department_name_ar']);

        return response()->json([
            "tickets" => $tickets 
        ] , 200) ;
    }

    public function addCommentForThisTicket(Request $request , $id){
        $validated = $request->validate([
            'replay' => 'required'
        ]);
        if (\request()->hasFile('replay')){
            $mime = \request()->file('replay')->getMimeType();
            if(strstr($mime, "video/")){
                $data["type"] = "video";
            }else if(strstr($mime, "image/")){
                $data["type"] = "image";
            }else{
                $data['type'] = 'text';
            }
            $data['replay'] = it()->upload('replay','messages');
        }

        $newComment = new TicketReplay();
        $newComment->ticket_id = $request->ticket_id ;
        $newComment->user_id = $request->user_id ;
        $newComment->admin_id = $request->admin_id ;
        $newComment->replay  = $data['replay'] ;
        $newComment->type  = $data['type'] ;
        $newComment->save();

        return response()->json([
            "depts" => "saved"  
        ] , 200) ;
    }
}

