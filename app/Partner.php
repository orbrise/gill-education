<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public function countryname()
    {
        return $this->hasOne(Country::class, 'id', 'country');
    }
}