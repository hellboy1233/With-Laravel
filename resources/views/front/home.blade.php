@extends('front/layout')

@section('container')
<!-- Start slider -->
<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            @foreach($homebanner as $hb)
            <li>
              <div class="seq-model">
                <img data-seq src="{{url('storage/images/'.$hb->image)}}" alt="Men slide img" />
              </div>
              <div class="seq-title">
               <span data-seq>{{$hb->btn_txt}}</span>                
                <h2 data-seq>Men Collection</h2>                
                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
            <!-- single slide item -->
            @endforeach 
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="{{asset('front_assets/img/promo-banner-1.jpg')}}" alt="img">                    
                    <div class="aa-prom-content">
                      <span>75% Off</span>
                      <h4><a href="#">For Women</a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  
                  @foreach($category as $show)
                  
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('storage/images/'.$show->category_img)}}" alt="img">                      
                      <div class="aa-prom-content">
                        <span>25% Off</span>
                        <h4><a href="#">{{$show->category_name}}</a></h4>                        
                      </div>
                    </div>
                  </div>
                  @endforeach


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                <ul class="nav nav-tabs aa-products-tab">
                  @foreach($category as $list)
                    <li class=""><a href="#{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>
                  @endforeach
                </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    @php 
                    $loop_count=1;
                    $loop_count;
                    @endphp
                    @foreach($category as $list)
                    @php
                    
                      $active_class="";
                      if($loop_count==1){
                        $active_class="in active";
                      }
                      $loop_count++;
                    @endphp
                    
                    <div class="tab-pane fade {{$active_class}}" id="{{$list->id}}">
                        <ul class="aa-product-catg">
                        @foreach($prod_list[$list->id] as $li)
                        <li>
                            <figure>
                            <a class="aa-product-img" href="#"><img src="{{url('storage/images/'.$li->image)}}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                                <h4 class="aa-product-title"><a href="#">{{$li->product_name}}</a></h4>
                                <span class="aa-product-price">Rs{{$prod_at_list[ $li->id][0]->price}}</span>
                            </figcaption>
                            </figure>                         
                            
                            <!-- product badge -->
                            <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                        </li> 
                        @endforeach
                        </ul> 
                    </div>
                    @endforeach
                    <!-- / men product category -->
                    
                    
                </div>                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{asset('front_assets/img/fashion-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#discounted" data-toggle="tab">Discounted</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                                  
                <li><a href="#latest" data-toggle="tab">Latest</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="discounted">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                   
                    
                    @if(isset($prod_at1_list))
                      @foreach($prod_at1_list as $list)
                      
                    <li>
                      <figure>
                        <a class="aa-product-img" href="product/{{$list[0]->id}}"><img src="{{asset('storage/images/'.$list[0]->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="javascript:void(0)" onclick="add_to_cart2('{{$list[0]->id}}','{{$prod_at_list[ $list[0]->id][0]->size_id}}','{{$prod_at_list[ $list[0]->id][0]->color_id}}','{{$prod_at_list[ $list[0]->id][0]->qty}}')"><span class="fa fa-shopping-cart" ></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product/{{$list[0]->id}}">{{$list[0]->product_name}}</a></h4>
                          <span class="aa-product-price">{{$prod_at_list[ $list[0]->id][0]->price}}</span>
                          <span class="aa-product-price"><del>{{$prod_at_list[ $list[0]->id][0]->mrp}}</del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                       @endforeach     
                    @else
                      <li>
                          <h4>no data found</h4>
                      </li>
                    @endif
                                                                                                        
                  </ul>
                  
                </div>
                <form id="from_cart2">
                  <input type="hidden" id="color_id" name="color_id">
                  <input type="hidden" id="size_id" name="size_id">
                  <input type="hidden" id="product_id"  name="product_id">
                  <input type="hidden" id="pqty" name="pqty" >
                  @csrf
                </form>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    @if(isset($prod_at2_list))
                    @foreach($prod_at2_list as $list)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="product/{{$list[0]->id}}"><img src="{{asset('storage/images/'.$list[0]->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="\cart"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product/{{$list[0]->id}}">{{$list[0]->product_name}}</a></h4>
                          <span class="aa-product-price">{{$prod_at_list[ $li->id][0]->price}}</span>
                          <span class="aa-product-price"><del>{{$prod_at_list[ $li->id][0]->price}}</del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                       @endforeach 
                           
                    @else
                      <li>
                          <h4>no data found</h4>
                      </li>
                    @endif                                                                                
                  </ul>
                  
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                    <!-- start single product item -->
                    @if(isset($prod_at3_list))
                    @foreach($prod_at3_list as $list)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="product/{{$list[0]->id}}"><img src="{{asset('storage/images/'.$list[0]->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product/{{$list[0]->id}}">{{$list[0]->product_name}}</a></h4>
                          <span class="aa-product-price">{{$prod_at_list[ $li->id][0]->price}}</span>
                          <span class="aa-product-price"><del>{{$prod_at_list[ $li->id][0]->price}}</del></span>
                        </figcaption>
                      </figure>                     
                      
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                       @endforeach     
                           
                    @else
                      <li>
                          <h4>no data found</h4>
                      </li>
                    @endif                                                                    
                  </ul>
                  
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
 
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="" alt="img"></a>  
                      <!---->
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
            @foreach($brand as $list)
              <li><a href="#"><img src="{{url('storage/images/'.$list->image)}}" alt="java img"></a></li>
            @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

 

@endsection