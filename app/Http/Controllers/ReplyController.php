<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class ReplyController extends Controller
{
    //

    public function reply() {

        
        return view('admin.reply');
    }
}
