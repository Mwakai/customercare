<?php

namespace App\Http\Controllers;

use App\Models\ClosedTicket;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class TicketController extends Controller
{
    //

    public function ticket(Request $request){
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email|min:3',
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

    /**
     * DELETE TICKET 
     * SEND THE TICKET TO CLOSED TICKETS
     */
    public function deleteTicket(){
        DB::transaction(function(Request $request) {
            $id=$request->id;
            DB::table('tickets')->where('id', $id)->delete();

            $image=time().'.'.$request->image->extension();
            $request->image->move(public_path('closed'),$image);
            DB::table('closed_tickets')->insert([
                'name'=> DB::table('tickets')->select('name')->first()->name,
                'email'=> DB::table('tickets')->select('email')->first()->email,
                'title'=> DB::table('tickets')->select('title')->first()->title,
                'issue'=> DB::table('tickets')->select('issue')->first()->issue,
                'image'=> DB::table('tickets')->select('image')->first()->image
            ]);
        });
        
    }


    /**
     * ADMIN FUNCTION TO SHOW OPEN TICKETS
     */
   public function openticket() {

    $query=Ticket::all();
    $total=count($query);
    $tickets=Ticket::latest()->paginate(5);
    return view('admin.openticket', compact('tickets','total'))->with('i',(request()->input('page',1)-1)*5);
   }

   /*
    ADMIN FUNCTION TO SHOW CLOSED TICKETS
   */
   public function closedticket() {

    $query=ClosedTicket::all();
    $total=count($query);
    $tickets=ClosedTicket::latest()->paginate(5);
    return view('admin.closedticket', compact('tickets','total'))->with('i',(request()->input('page',1)-1)*5);
   }

   
}

