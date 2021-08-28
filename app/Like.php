<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    //いいね機能
    protected $fillable = ['fossil_post_id', 'user_id'];
    
    public function fossil_post()
    {
      return $this->belongsTo(Fossil_post::class);
    }
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}