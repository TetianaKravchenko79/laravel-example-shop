<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    protected $fillable = [
        'product_id'
   ];       
   public function product()
   {
       //return $this->belongsTo('App\Models\Product'); //join
       return $this->belongsTo(Product::class);
   }

   public function user()
   {
       return $this->belongsTo(User::class);
   } 

   public function size()
   {
       return $this->belongsTo(Size::class);
   } 

   public static function countCart()
    {
        return self::where('user_id', auth()->user()->id)->count();
    } 

}
