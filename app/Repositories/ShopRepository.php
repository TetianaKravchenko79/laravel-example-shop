<?php

namespace App\Repositories;

use App\Models\ {
    Product,
    Cart,
    Comment,
    Size,
    Count,
};

class ShopRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $modelProduct;
    protected $modelCart;
    protected $modelComment;
    protected $modelSize;

    /**
     * Create a new ProductRepository instance.
     *
     * @param  \App\Models\Product $product
     */
    public function __construct(Product $product, Cart $cart, Comment $comment, Size $size)
    {
        $this->modelProduct = $product;
        $this->modelCart = $cart;   
        $this->modelComment = $comment; 
        $this->modelSize = $size;    
    }

    /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($request)
    {
        $query = $this->modelProduct
            ->select('id', 'name', 'price', 'image')
            ->orderBy('price', 'asc');

            if(isset($request->search)) $query->where('name', 'like', '%' . $request->search . '%');
             
        
        return $query->get();
    }

    public function store($request)
    {
        // Cart::create($request->all());

        $this->modelCart->product_id = $request->product_id; 
        $this->modelCart->size_id = $request->size_id;
        $this->modelCart->qty = $request->qty;
        $this->modelCart->user_id = auth()->user()->id; //!!! or \Auth::user()->id
        $this->modelCart->save();    

//         $countSizeProduct = Count::where('product_id', $request->product_id)
//         ->where('size_id', $request->size_id)
//         ->first();

// $countSizeProduct->count = $countSizeProduct->count - 1;
// $countSizeProduct->save(); 

$this->countDecrementIncrement($request, 'decrement');   
    }  
    
    
      /**
     * Create a query for Cart.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function fromCart()
    {
        $query = $this->modelCart
                        ->where('user_id', auth()->user()->id)
                        ->with('product')
                        ->with('size');

        return $query->get();
      

    }


     /**
     * Get items from size.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function funcSelectSize($request)
    {
        return $this->modelSize
                    ->get();
    }
  /**
     * Get items from comment.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function funcSelectComment($request)
    {
        return $this->modelProduct
                    ->with('comments.user') //!!!
                    ->find($request->id);
    }  



    /**
     * Store item to comment.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function funcStoreComment($request)
    {
       $this->modelComment->product_id = $request->id;
       $this->modelComment->user_id = auth()->user()->id;
       $this->modelComment->comment = $request->comment;
       $this->modelComment->rating = $request->rating;
       $this->modelComment->save();
    }


      /**
     * Get rating product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function funcGetRating($request)
    {
       $product = $this->funcSelectComment($request);

       $countComments = $product->comments->count();

       $sumRating = 0;
       foreach ($product->comments as $comment) {
          $sumRating += $comment->rating;   
       }

       if ($countComments) $ratingComments = $sumRating / $countComments; 
       else $ratingComments = 0;

       return ['ratingComments' => $ratingComments, 'countComments' => $countComments];
    }


    /**
     * Decrement-Increment count
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function countDecrementIncrement($request, $operation)
    {
       $countSizeProduct = Count::where('product_id', $request->product_id)
                     ->where('size_id', $request->size_id)
                     ->first();

       if ($operation == 'decrement') $countSizeProduct->count = $countSizeProduct->count - $request->qty;
       if ($operation == 'increment') $countSizeProduct->count = $countSizeProduct->count + $request->qty;
       $countSizeProduct->save(); 
    }  


}
