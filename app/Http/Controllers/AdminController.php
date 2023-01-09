<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //

    public function admin() {

        $query=User::all();
        $total=count($query);

        $users=User::latest()->paginate(5);


        return view('admin.admin', compact('total', 'users'));
    }
}
