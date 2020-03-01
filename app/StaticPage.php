<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
   protected $fillable = [
       'page','content','delstatus','created_at','updated_at',
       ];   
       
       public static function aboutus()
       {
           $about = StaticPage::where('page', 'about')->first();
           return $about->content;
         
       }
}
