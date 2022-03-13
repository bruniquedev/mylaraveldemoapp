<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

  //un comment if it's necessary for change or modify your table and after changing comment them out   
//To change table name just replace posts below with my_posts or any other related name
//protected $table = 'posts';
//To change primaryKey just replace id below with item_id or any other related name
//public $primaryKey ='id';
//We can decide not to include timestamps like create at or updatedat by setting timestamps to false
//public $timestamps =false;

public function user(){
  //this means we are establishing a relationship between posts table
  //and users table
  return $this->belongsTo('App\Models\User');
}


}
