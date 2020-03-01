<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramDetail extends Model
{
    protected $fillable = [

    	'program_id','university_id','university_name','degree', 'discipline','duration','uni_web','description',
    ];
}
