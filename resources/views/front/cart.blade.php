@extends('front/layout')

@section('container')
<section id="aa-catg-head-banner">
   
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                   @if(isset($carting[0]))
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($carting as $list)
                      <tr id="cart_box{{$list->id}}">
                        <td><a class="remove" href="javascript:void(0)" onclick="deleteprod('{{$list->id}}','{{$list->size_id}}','{{$list->color_id}}')"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{url('storage/images/'.$list->image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">
                            {{$list->product_name}}<br>
                            {{$list->size_id}}<br>
                            {{$list->color_id}}<br>

                        </a></td>
                        <td>Rs{{$list->price}}</td>
                        <td><input class="aa-cart-quantity" id="quantt{{$list->id}}" onchange="fun_cart('{{$list->id}}','{{$list->size_id}}','{{$list->color_id}}','{{$list->qty}}','{{$list->price}}')" type="number" value="{{$list->qty}}"></td>
                        <td id="total_price{{$list->id}}">Rs{{$list->price*$list->qty}}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                      </tbody>
                  </table>
                  @else
                  <h2>no data found</h2>
                  @endif
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$450</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>$450</td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <input type="text" id="pricr_tot" name="pricr_tot">
 
 <form id="from_cart">
    <input type="text" id="pqty" name="pqty">
    
    <input type="text" id="color_id" name="color_id">
    <input type="text" id="size_id" name="size_id">
    <input type="text" id="product_id"  name="product_id">
    
   @csrf
</form>

 <!-- / Cart view section -->



@endsection