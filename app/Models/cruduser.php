<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class cruduser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'dob'
    ];

}
