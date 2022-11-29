<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedTicket extends Model
{
    use HasFactory;

    protected $table='closed_tickets';
    protected $fillable=[
        'name',
        'email',
        'title',
        'issue',
        'image'

    ];
}
