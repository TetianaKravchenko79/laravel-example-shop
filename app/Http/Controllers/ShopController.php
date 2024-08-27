<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ {
    Repositories\ShopRepository,
    Models\Product
 };
 use App\Models\Count;
 use App\Models\Cart;
 use App\Models\Comment;
 use App\Http\Requests\CartRequest;
 use App\Http\Requests\CommentRequest;
 use App\Services\Mail;

class ShopController extends Controller
{


    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ShopRepository $repository)
    {
        // $this->middleware('auth');

        $this->repository = $repository;
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, ShopRepository $repository)
    {
        $products = $repository->funcSelect($request);

         // Ajax response
         if ($request->ajax()) {
            return response()->json([
                'table' => view("shop.brick-standard", ['products' => $products])->render(),
            ]);
        } 

        return view('shop.index', ['products' => $products]);
    }
     /**
     * Show the Product page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function product(Request $request, Product $model_product)
    {

        $product = $model_product->with('counts')->find($request->id);
        $rating = $this->repository->funcGetRating($request);
        $sizes = $this->repository->funcSelectSize($request);
        if ($product == null) { //!!!
            return view('404');
         } else {
            return view('shop.product', ['product' => $product, 'rating' => $rating, 'sizes' => $sizes]);
         }


                // return view('shop.product', ['product' => $product]);
    }

       /**
     * Show the comment-page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function comment(Request $request)
    {
        $product = $this->repository->funcSelectComment($request); 

        if ($product == null) {
            return view('404');
        } else {
            return view('shop.comment', ['product' => $product]);
        }
    } 
        /**
     * Store item to comment.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addcomment(CommentRequest $request)
    {
        $this->repository->funcStoreComment($request);

        return $this->repository->funcSelectComment($request);
    }


 /**
     * Show the Cart page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cart(Request $request)
    {
        $carts = $this->repository->fromCart();

          // Ajax response
          if ($request->ajax()) {
            return response()->json([
                'table' => view("shop.cart-standard", ['carts' => $carts])->render(),
            ]);
        } 
        
        return view('shop.cart', compact('carts'));
    }

      /**
     * Store thing to cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function tocart(CartRequest $request, ShopRepository $repository)
    {
        $repository->store($request);
        
        return redirect(route('cart'));
    } 
    
        /**
     * Destroy all cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearall(Request $request, Cart $cart)
    {
        // $cart->truncate();
        $cart
          ->where('user_id', \Auth::user()->id) //!!! where \Auth::user()->id
          ->delete(); //!!!delete(not truncat)
        

          
       foreach ($request->carts as $cart) {   
        
        $this->repository->countDecrementIncrement(json_decode(json_encode($cart)), 'increment');
        // return redirect(route('cart'));
        
    }   return $this->repository->fromCart();
    
}
     /**
     * Destroy one from cart.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function clearone(Request $request, Cart $cart)
    {
        $clearone =  $cart
                ->find($request->id);
                $this->authorize('manage', $clearone);
                $clearone->delete();
                
              $countSizeProduct = Count::where('product_id', $request->product_id)
                ->where('size_id', $request->size_id)
                ->first();

                  
                
 $countSizeProduct->count = $countSizeProduct->count + $request->qty; //!!! + 1
   $countSizeProduct->save();     

//   $this->repository->countDecrementIncrement($request, 'increment'); 

        // return $this->cart($request); //!!!$request -> if ($request->ajax()) {...
        return $this->repository->fromCart();
    }  
    
    
    /**
     * Clear one item from comment.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function removecomment(Request $request)
    {
       $removeone = Comment::find($request->commentId); //!!!commentId: commentId
       $this->authorize('manage', $removeone);
       $removeone->delete();

       return $this->repository->funcSelectComment($request); //!!!id: product.id
    } 

    
       /**
     * Mailer for message from user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mailer(Request $request, Mail $mailer)
    {
        return $mailer->funcSend($request->email);
    }  



}
