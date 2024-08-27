
@extends('shop.layout')

@section('css')
<style>
.single-products-catagory {
  float: left;    
}
</style>    
@endsection


@section('main')
 <!-- Product Catagories Area Start -->
 <div class="products-catagories-area clearfix">
          

    @php
    //print_r($products);
  @endphp
   
         <div class="amado-pro-catagory clearfix">

 
  @include('shop.brick-standard')


        </div>
</div>
@endsection

@section('js')

<script src="{{ asset('js/mainIndex.js') }}"></script>
<script>
$(document).ready(function(){
   $('.search-content button').click(function(){
   	  BaseRecord.search($('#search').val());
   });
   $('.search-content').on("keypress", function(event){
       if(event.keyCode == 13)
   	  BaseRecord.search($('#search').val());
   });
});   
</script>

@endsection