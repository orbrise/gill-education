<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    public function countryName()
    {
    	return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function UniDetail()
    {
    	return $this->hasOne(Unidetail::class, 'uni_id', 'id');
    }

    public function Countpro()
    {
    	return $this->hasMany(Unidetail::class, 'uni_id', 'id');
    }

}
