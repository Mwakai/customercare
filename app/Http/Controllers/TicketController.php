<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    //

    public function ticket(Request $request){
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|string|min:3',
            'title'=>'required|string|min:3',
            'issue'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpg,png,jpeg'
        ]);

        /*
            CREATE TIMESTAMPS FOR THE IMAGES 
            MOVE THE IMAGES TO THE PUBLIC FOLDER\TICKET
        */
        $image=time().'.'.$request->image->extension();
        $request->image->move(public_path('ticket'),$image);

        Ticket::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'title'=>$request->title,
            'issue'=>$request->issue,
            'image'=>$image
        ]);

        return redirect()->back()->with('success','Message has been sent');
    }
}
