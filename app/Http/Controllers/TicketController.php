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
    public function deleteTicket(Request $request){
        $row= Ticket::find($request->id);
        $row->delete();

        //CREATE A NEW ROW IN THE OTHER TABLE
        $newRow = new ClosedTicket;
        $newRow->name = $row->name;
        $newRow->email = $row->email;
        $newRow->title = $row->title;
        $newRow->issue = $row->issue;
        $newRow->image = $row->image;
        
        $newRow->save();

        return redirect()->back()->with('success','Data has been deleted successfully');
    }


    /**
     * ADMIN FUNCTION TO SHOW OPEN TICKETS
     */
   public function openticket() {
    $query=Ticket::all();
    $total=count($query);
    
    $tickets=Ticket::latest()->paginate(5);
    return view('admin.openticket', compact('tickets','total',))->with('i',(request()->input('page',1)-1)*5);
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

   //SEARCH FOR OPEN TICKETS
   public function homeSearch(Request $request){
    $search=$request->table_search;
    $tickets = Ticket::where('name','LIKE','%'.$search.'%')->
                orWhere('title','LIKE','%'.$search.'%')->
                latest()->paginate(5);

    $query=Ticket::all();
    $total=count($query);
    

    //$tickets= Ticket::latest()->paginate(5);
    return view('admin.openticket', compact('tickets'))->with('i',(request()->input('page',1)-1)*5);

   }

   //SEARCH FOR CLOSED TICKETS
   public function search(Request $request) {

    $search=$request->table_search;
    $tickets = ClosedTicket::where('name','LIKE','%'.$search.'%')->
                orWhere('title','LIKE','%'.$search.'%')->
                latest()->paginate(5);

    $query=ClosedTicket::all();
    $total=count($query);
    

    //$tickets= Ticket::latest()->paginate(5);
    return view('admin.closedticket', compact('tickets'))->with('i',(request()->input('page',1)-1)*5);
   }

   
}

