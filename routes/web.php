<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.form');
});

Auth::routes();

//ROUTE TO ADMIN PAGE
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ROUTE TO SEND DATA TO THE DATABASE
Route::post('/pages/form','TicketController@ticket')->name('pages.form');

//ROUTE TO OPEN TICKET
Route::get('pages/admin/openticket','TicketController@openticket')->name('admin.openticket');
Route::get('pages/admin/closedticket','TicketController@closedticket')->name('admin.closedticket');
//ROUTE TO REPLY MAILS
Route::get('pages/admin/reply','ReplyController@reply')->name('admin.reply');
Route::post('/pages/admin/deleteTicket','TicketController@deleteTicket')->name('admin.deleteTicket');

Route::get('/pages/admin/homeSearch','TicketController@homeSearch')->name('admin.homeSearch');
