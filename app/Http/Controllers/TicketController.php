<?php

namespace App\Http\Controllers;

use App\Priority;
use App\Status;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priority = prepareArrayForFormBuilderSelect(Priority::get(), 'title');
        return view('ticket.create', compact('priority'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TicketRequest $request)
    {
        Ticket::create($request->all());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $statusArray = prepareArrayForFormBuilderSelect(Status::get(), 'title');

        $ticket = Ticket::find($id);
        $user = User::find($ticket->user_id);
        $status = Status::find($ticket->status_id);
        $priority = Priority::find($ticket->priority_id);

        
        return view('ticket.view', compact('ticket', 'status', 'priority', 'user', 'statusArray'));
    }

    /**
     * UpdateStatus
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus()
    {
        $ticketId = Input::get('id');
        $ticket = Ticket::find($ticketId);
        $status = Input::get('status_id');

        $ticket->status_id = $status;
        $ticket->save();

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $priorityArray = prepareArrayForFormBuilderSelect(Priority::get(), 'title');
        $priority = Priority::find($ticket->priority_id);
        return view('ticket.edit', compact('ticket', 'priority', 'priorityArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::find($id);
        $ticket->name = Input::get('name');
        $ticket->creator = Input::get('creator');
        $ticket->description = Input::get('description');
        $ticket->priority_id = Input::get('priority_id');
        $ticket->save();

        return redirect()->action('TicketController@show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
