<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable =  [

    	'name','desig','profilepic','created_at','updated_at',

    ];

}
