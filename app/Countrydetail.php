<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countrydetail extends Model
{
   
    protected $fillable = [
        'long_desc', 'link1name', 'link1url','link2name','link2url','country_id',
    ];

  
}
