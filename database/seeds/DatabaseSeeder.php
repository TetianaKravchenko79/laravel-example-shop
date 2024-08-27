<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Count;
use App\Models\Comment;
use App\Models\Size;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        /*
         
        Product::create(
            [
                'name' => 'Костюм "Лора"',
                'price' => '19.99',
                'image' => 'product_1.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Костюм "Кимоно"',
                'price' => '22.99',
                'image' => 'product_2.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Блуза "Бриз"',
                'price' => '7.99',
                'image' => 'product_3.jpg',
                'top9' => 1,
            ]
        ); 
        */

        
        Comment::create(
            [
                'user_id' => 1, //!!!see real id
                'product_id' => 3,
                'comment' => "admin's comment of product_3",
            ]
        ); 
        Comment::create(
            [
                'user_id' => 2, //!!!see real id
                'product_id' => 3,
                'comment' => "user's comment of product_3",
            ]
        );  
        Comment::create(
            [
                'user_id' => 1, //!!!see real id
                'product_id' => 8,
                'comment' => "admin's comment of product_8",
            ]
        ); 
        
        
        
       
        Size::create(
            [
                'name' => 'S',
                'default' => '1',
            ]
        );   
        Size::create(
            [
                'name' => 'M',
                'default' => '0',
            ]
        ); 
        Size::create(
            [
                'name' => 'L',
                'default' => '0',
            ]
        ); 
       
        
        
        Count::create(
            [
                'product_id' => 3,
                'size_id' => 1,
                'count' => 7,
            ]
        ); 
        Count::create(
            [
                'product_id' => 3,
                'size_id' => 2,
                'count' => 5,
            ]
        ); 
        Count::create(
            [
                'product_id' => 3,
                'size_id' => 3,
                'count' => 6,               
            ]
        );
        Count::create(
            [
                'product_id' => 8,
                'size_id' => 1,
                'count' => 7,
            ]
        ); 
        Count::create(
            [
                'product_id' => 8,
                'size_id' => 2,
                'count' => 5,
            ]
        ); 
        Count::create(
            [
                'product_id' => 8,
                'size_id' => 3,
                'count' => 6,               
            ]
        );
        Count::create(
            [
                'product_id' => 6,
                'size_id' => 1,
                'count' => 7,
            ]
        ); 
        Count::create(
            [
                'product_id' => 6,
                'size_id' => 2,
                'count' => 5,
            ]
        ); 
        Count::create(
            [
                'product_id' => 6,
                'size_id' => 3,
                'count' => 6,               
            ]
        );          

        //Products        
        Product::create(
            [
                'name' => 'Modern Chair',
                'price' => 180,
                'image' => 'bg-img/1.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Minimalistic Plant Pot',
                'price' => 180,
                'image' => 'bg-img/2.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Modern Chair',
                'price' => 180,
                'image' => 'bg-img/3.jpg',
                'top9' => 1,
            ]
        );   
        Product::create(
            [
                'name' => 'Night Stand',
                'price' => 180,
                'image' => 'bg-img/4.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Plant Pot',
                'price' => 18,
                'image' => 'bg-img/5.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Small Table',
                'price' => 320,
                'image' => 'bg-img/6.jpg',
                'top9' => 1,
            ]
        );          
        Product::create(
            [
                'name' => 'Metallic Chair',
                'price' => 318,
                'image' => 'bg-img/7.jpg',
                'top9' => 1,
            ]
        ); 
        Product::create(
            [
                'name' => 'Modern Rocking Chair',
                'price' => 318,
                'image' => 'bg-img/8.jpg',
                'top9' => 1,
            ]
        );  
        Product::create(
            [
                'name' => 'Home Deco',
                'price' => 318,
                'image' => 'bg-img/9.jpg',
                'top9' => 1,
            ]
        );                                 
    }
}
