<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsection extends Model
{
   protected $fillable = [
       'name','countries','detail','link1name','link1url','link2name','link2url','delstatus','scholarship',
       ];
       
       public static function getsectionname($id)
       {
           $get = Subsection::find($id);
           return $get->name;
       }
       
      public static function getcountries($id)
      {
       if(!empty($id)){   
          $array = explode(",", $id);
          foreach($array as $country)
          {
              $name = Country::find($country);
              $countryname[] = $name->name;
          }
          
          return $newarray = implode(", ",$countryname);
       }
          
      }
}