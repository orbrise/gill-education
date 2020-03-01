<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
   protected $fillable = [
       'name','countries','detail','link1name','link1url','link2name','link2url','delstatus',
       ];
       
       public static function getsectionname($id)
       {
           $get = Section::find($id);
           return $get->name;
       }
}