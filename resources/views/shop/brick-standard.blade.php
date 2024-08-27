



  
@foreach($products as $product)
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{route('product', [$product->id])}}">
                        <img src="{{ asset('img/' . $product->image) }}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>{{$product->price}}</p>
                            <h4>{{$product->name}}</h4>
                        </div>
                    </a>
                </div>

                
        
        <!-- Product Catagories Area End -->
    

@endforeach
