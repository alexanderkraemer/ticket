<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = DB::table('ticket')
                    ->select('ticket.id', 'ticket.created_at', 'ticket.creator', 'ticket.name as title', 'priority.title as priority', 'status.title as status')
                    ->leftJoin('status', 'status.id', '=', 'ticket.status_id')
                    ->leftJoin('users', 'users.id', '=', 'ticket.user_id')
                    ->leftJoin('priority', 'priority.id', '=', 'ticket.priority_id');

        if(!isset($_COOKIE['showall']) OR $_COOKIE['showall'] != 'true')
        {
            $tickets = $tickets->where('status_id', '!=', '3');
        }

        $tickets = $tickets->paginate(15);



        return view('home', compact('tickets'));
    }
}
