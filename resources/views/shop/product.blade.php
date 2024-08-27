
@extends ('shop.layout')


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('styles/product.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('styles/qty.css') }}">
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('styles/product_responsive.css') }}"> -->
@endsection

@section('main')
<div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

<!-- 
            @php
print_r($product);
@endphp -->


@if ($errors->any())
                    @component('shop.components.alert')
                        @slot('type')
                            danger
                        @endslot
                      @foreach ($errors->all() as $error)
                          {{ $error }}<br>
                      @endforeach
                    @endcomponent
                @endif




                <div class="row">
                    <div class="col-12 col-lg-7">

                        <img src="{{ asset('img/' . $product->image) }}" alt="" />


                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">{{$product->price}}</p>
                                
                                
                                <a href="#">
                                    <h6>{{$product->name}}</h6>
                                </a>

                                
                                <!-- Ratings & Review -->
                                <!-- <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div> -->

                                <!-- Ratings & Review -->
<div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
    

<div class="rating_r rating_r_{{ceil($rating['ratingComments'])}} product_rating"><i></i><i></i><i></i><i></i><i></i></div>
<div class="product_reviews">{{ceil($rating['ratingComments'])}} из ({{$rating['countComments']}})</div>
                                    <div class="review">
                                    <a href="{{route('comment', [$product->id])}}">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>
                            <div class="product_size">

                            @if ($product->counts->count())
	<div class="product_size_title">Select Size</div>
	<ul class="d-flex flex-row align-items-start justify-content-start">
		

        @foreach ($product->counts as $count)
								    <li>
									    @if ($count->size->default)

                                        @php
                                                  $sizeDefault = $count->size->id;
                                               @endphp
										<input type="radio" id="radio_{{$count->size->id}}" checked name="product_radio" class="regular_radio radio_{{$count->size->id}}" value="{{$count->size->id}}">
                                        @else
										<input type="radio" id="radio_{{$count->size->id}}" name="product_radio" class="regular_radio radio_{{$count->size->id}}" value="{{$count->size->id}}">
										@endif
										<label for="radio_{{$count->size->id}}">{{$count->size->name}}</
									</li>

                                    
									@endforeach
  


	</ul>
    
                                <div class="cart clearfix">
                                    <div class="cart-btn d-flex mb-50">
                                        <p>Qty</p>
                                        <div class="quantity">
                                            <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;  $('[name=\'qty\']').attr('value', effect.value); return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                            <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++; $('[name=\'qty\']').attr('value', effect.value); return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            
                                @else
								<div class="product_size_title">Сейчас товар отсутствует</div>
								@endif

							
<!-- </div> -->
</div>

                            <div class="short_overview my-5">

                            
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid quae eveniet culpa officia quidem mollitia impedit iste asperiores nisi reprehenderit consequatur, autem, nostrum pariatur enim?</p>
                            </div>

                            <!-- Add to Cart Form -->

                            @if ($product->counts->count())
	
                            <form class="cart clearfix" name="form_tocart" method="post" action="{{route('tocart')}}">

                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{$product->id}}" />

                            <input type="hidden" name="size_id" value="@php if(isset($sizeDefault)) echo $sizeDefault; @endphp" /> 
                            <input type="hidden" name="qty" value="1" />
                            
                                <button type="submit" name="addtocart" value="" class="btn amado-btn">Add to cart</button>
                            </form>

                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

@endsection

@section('js')

<script src="{{ asset('js/qty.js') }}"></script>

<script>
$(document).ready(function(){
    $('.product_button.product_cart').click(function(){
      form_tocart.submit();   
   });
   
$('.product_size input').click(function(){
      form_tocart.size_id.value = $(this).attr('value');   
   });   
});
</script>	
@endsection