<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'contact';

    public $fillable = ['full_name', 'email', 'message', 'phone'];
}
