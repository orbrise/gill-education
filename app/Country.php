<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable =  [

    	'name','flag',

    ];

    public function CountUnis()
    {
    	return $this->hasMany(University::class, 'country_id', 'id');
    }
    
    public static function getCountryNameByID($id)
    {
        $find = Country::find($id);
        return $find->name;
    }
    
    public static function getCountryFlag($id)
    {
        $find = Country::find($id);
        return $find->flag;
    }
    
    public function CountryDetail()
    {
        return $this->hasOne(Countrydetail::class, 'country_id','id');
    }
}
