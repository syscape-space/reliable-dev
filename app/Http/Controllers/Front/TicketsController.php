<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TicketDepartment;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=auth()->user()->tickets()->orderBy('created_at','DESC')->paginate(10);
        return view('front.tickets.index', compact('tickets'));
    }
    public function create()
    {
        $ticket_departments = TicketDepartment::where('department_status', 'show')->select('id', 'department_name_ar')->get();
        return view('front.tickets.create', compact('ticket_departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ticket_title' => ['required', 'string'],
            'ticket_department_id' => ['required', 'exists:ticket_departments,id'],
            'ticket_linked' => ['required', 'in:order,offer,charge,received_money,account,other'],
            'ticket_content' => ['required', 'string']
        ]);
        
        $ticket=Ticket::create($request->all());
        if($request->hasFile('ticket_file')){
            it()->upload($request->file('ticket_file'), 'tickets/' . auth()->id(),'tickets',$ticket->id,auth()->id());
        }
        return redirect()->route('front.tickets.index')->with(['success'=>'تم إضافة التذكرة بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
