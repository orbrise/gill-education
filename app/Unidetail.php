<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidetail extends Model
{
    protected $fillable = [

    	'uni_name','slug','uni_id','featured_img','short_desc','long_desc','ranking','video_url',
    ];
}
