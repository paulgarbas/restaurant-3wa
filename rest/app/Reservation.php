<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['name', 'surname', 'email', 'numberOfPeople', 'date', 'time', 'message', 'phone'];

}
