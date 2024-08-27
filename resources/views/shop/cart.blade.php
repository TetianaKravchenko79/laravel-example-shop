
@extends ('shop.layout')


@section('main')

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                  <!-- <div class="col-12 col-lg-8"> -->
                    <div class="col-15 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>
 
                        <div class="cart-table clearfix">
                            <div class="row">
                                <div class="col-xl-3 border font-weight-bold">Image</div>    
                                <div class="col-xl-2 border font-weight-bold">Name</div>
                                <div class="col-xl-2 border font-weight-bold">Price</div>
                                <div class="col-xl-2 border font-weight-bold">Size</div>
                                <div class="col-xl-2 border font-weight-bold">Qty</div>
                                <div class="col-xl-1 border font-weight-bold">Remove one</div>
                            </div>  
                            <script>
                                window.carts = @json($carts); //!!!variable from php to js in blade
                            </script>
                           <div class ="cart_block"></div>
                            <!-- <div id="pannel"></div> -->
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

<script src="{{ mix('js/cartvue.js') }}"></script>

<!-- <script src="{{ asset('js/mainCart.js') }}"></script>

<script>
$(document).ready(function(){
   $('.btn.btn-danger.w-100').click(function(){
      form_clearall.submit();   
   });

   $('body').on('click', '.listbuttonremove', function() {
      BaseRecord.clearone($(this).attr('id'));
      return false;
   });     
});
</script> -->

@endsection