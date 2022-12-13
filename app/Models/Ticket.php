<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Ticket extends Model
{
    use HasFactory;
    use Sortable;
    

    protected $table='tickets';
    protected $fillable=[
        'name',
        'email',
        'title',
        'issue',
        'image'

    ];

    public $sortable = ['id', 'name', 'title'];

}
