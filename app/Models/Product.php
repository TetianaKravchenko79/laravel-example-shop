<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public function comments()
    {
        return $this->hasMany(Comment::class);
    } 

    public function counts()
    {
        return $this->hasMany(Count::class)->where('count', '!=', 0); //!!!'count', '!=', 0
    } 


}
