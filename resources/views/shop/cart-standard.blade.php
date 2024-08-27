


                            @foreach($carts as $cart)
                                
                              <div class="row">  
                                <div class="col-xl-3 border cart_product_img text-center p-2">

                              

                                   <img src="{{ asset('img/' . $cart->product->image) }}" alt="Product" />
                                </div>    
                                <div class="col-xl-2 border cart_product_name p-2">
                                 
                                   <h5>{{$cart->product->name}}</h5>  
                                </div>
                                <div class="col-xl-2 border cart_product_price p-2">
                                   <h5>${{$cart->product->price}}</h5>    
                                </div>

                                
                                <div class="col-xl-2 border text-center p-5">
                                    <button class="btn btn-danger listbuttonremove"   id="{{$cart->id}}">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </div>   
                              </div>
                              
                                    
                              @endforeach
                              
                           