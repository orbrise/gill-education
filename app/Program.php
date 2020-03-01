<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function uniimg()
    {
    	return $this->hasOne(University::class, 'id', 'university');
    }

    public function catname()
    {
    	return $this->hasOne(Category::class, 'id', 'category');
    }

    public function countrynamep()
    {
    	return $this->hasOne(Country::class, "id", 'country');
    }

    public function unidetailsp()
    {
    	return $this->hasOne(Unidetail::class, "uni_id", 'university');
    }

    public static function getprog($cat= '', $type='', $uni = '')
    {
        
        return Program::where(['delstatus' => 1, 'category' => $cat, 'program_type' => $type, 'university' => $uni])->get();
        
    }

    public function prod()
    {
       return $this->hasOne(ProgramDetail::class, 'program_id', 'id');   
    }


}
