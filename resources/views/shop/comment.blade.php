@extends('shop.layout')

@section('css')
<style>
.fa-trash-o {
  font-size:26px;
  color:red;
  cursor: pointer;
}
</style>   

<link rel="stylesheet" type="text/css" href="{{ asset('styles/product.css') }}">

@endsection

@section('main')

<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                  <!-- <div class="col-12 col-lg-8"> -->
                    <div class="col-12 col-lg-12">

                            
                            @php
                            //print_r($product->comments->toArray());
                            @endphp

                            <div class="row">
                                <div class="col-xl-3 cart_product_image p-2">
                                    <img src="{{ asset('img/' . $product->image) }}" alt="">
                                </div>
                                <div class="col-xl-3 cart_product_name p-5">
                                    <a href="{{route('product', [$product->id])}}"><h4>{{$product->name}}</h4></a>
                                </div>  
                            </div>                    

                            <script>
                                  window.user = @json(auth()->user());
                                window.product = @json($product);//... //!!!variable from php to js in blade
                            </script>                              

                            <!-- !!!Comment block -->
                            <div class="comment_block">
                                                               
                            </div>  
                                                      
                    </div>
                </div>
            </div>
        </div> 

@endsection

@section('js')
@section('js')
<script src="{{ mix('js/comment.js') }}"></script>
@endsection