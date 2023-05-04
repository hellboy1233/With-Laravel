@extends('front/layout')

@section('container')
@php
  $customer
@endphp

<section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form id="user_address">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon totalp">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            If you have registered for the first time use "coupon2" to get 15% discount
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <input type="text" placeholder="Coupon Code" class="aa-coupon-code" id="coupon_code" name="coupon_code">
                          <input type="button" value="Coupon"class="aa-browse-btn" onclick="apply_coupon('{{$customer}}')">
                          
                        </div>
                        
                      </div>
                    </div>
                    <div id="coupon_err"></div>
                    <!-- Login section -->
                   
                   
                       
                  
                    
                    <a href="" data-toggle="modal" data-target="#login-modal" class="{{$user}}">Login</a>
                          

                   
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder=" Name*" id="name" name="name">
                              </div>                             
                            </div> 
                          </div> 
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" placeholder="Email Address*" id="email" name="email">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Mobile*" id="mobile" name="mobile">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3" id="address" name="address">Address*</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Province no." name="province" id="province">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="City / Town*" id="city" name="city">
                              </div>
                            </div>
                          </div>   
                          <div class="row">
                            
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Postcode / ZIP*" id="zip_code" name="zip_code">
                              </div>
                            </div>
                          </div>                                    
                        </div>
                      </div>
                    </div>
                    <!-- Shipping Address -->
                    
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $subtotal=0;
                        @endphp
                        @foreach($data as $show)
                        <tr>
                          <td>{{$show->product_name}} <strong> x {{$show->qty}}</strong></td>
                          <td>Rs{{($show->qty)*($show->price)}}</td>
                        </tr>
                        @php
                        
                        $subtotal=$subtotal+(($show->qty)*($show->price));
                        @endphp
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td>{{$subtotal}}</td>
                        </tr>
                         <tr>
                          <th>Tax</th>
                          <td>Rs35</td>
                        </tr>
                         <tr class="totalp">
                          <th>Total</th>
                          <td>Rs{{$subtotal+35}}</td>
                          <input type="hidden" value="{{$subtotal+35}}" name="tamt" id="tamt">
                        </tr>
                        <tr class="totalpac" style="display :none">
                          <th>Coupon Code <a href="javascript:void(0)" onclick="remove_coupon()">Remove</a></th>
                          <td class="totalpacc"></td>
                        </tr>
                        <tr class="totalpac" style="display :none">
                          <th>Total</th>
                          <td class="totalpacv"></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cod"><input type="radio" id="cod" value="cod"name="optionsRadios"> Cash on Delivery </label>
                    <label for="esewa"><input type="radio" id="esewa" value="gateway" name="optionsRadios" checked> esewa </label>
                        
                    <input type="submit" value="Place Order" onclick="shipping_details()" class="aa-browse-btn">    
                    <span id="show_status"></span>         
                  </div>
                </div>
              </div>
            </div>
            @csrf
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>

@endsection