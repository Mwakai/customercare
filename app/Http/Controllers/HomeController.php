<?php

namespace App\Http\Controllers;

use App\Models\ClosedTicket;
use Illuminate\Http\Request;
use DB;
use App\Models\Ticket;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query=Ticket::all();
        $total=count($query);

        $query=ClosedTicket::all();
        $count=count($query);
        return view('admin.dashboard', compact('total','count'));
    }

   

    
}
