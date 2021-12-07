<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $filable =[
        'name',
        'location'
    ];


 protected $dates = ['deleted_at'];

}
