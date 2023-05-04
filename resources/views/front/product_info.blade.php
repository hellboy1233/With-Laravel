@extends('front/layout')

@section('container')



  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                      
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('storage/images/'.$prod_info[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('storage/images/'.$prod_info[0]->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a data-big-image="{{asset('storage/images/'.$prod_info[0]->image)}}" data-lens-image="{{asset('storage/images/'.$prod_info[0]->image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{asset('storage/images/'.$prod_info[0]->image)}}">
                          </a> 
                      @foreach($images as $img)
                          <a data-big-image="{{asset('storage/images/'.$img->images)}}" data-lens-image="{{asset('storage/images/'.$img->images)}}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{asset('storage/images/'.$img->images)}}">
                          </a>                                    
                      @endforeach    
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$product[0]->product_name}}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">$34.99</span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                    <h4>Size</h4>
                    @php 
                    $sizearr=[];
                    foreach($sizeacol as $list)
                    {
                      $sizearr[]=$list->size_id;
                    }
                    $unarrsize=array_unique( $sizearr);
                    
                    @endphp
                    
                   
                    <div class="aa-prod-view-size">
                    @foreach($unarrsize as $list)
                      <a href="javascript:void(0)" id="size_{{$list}}" class="size_link" onclick="color_size('{{$list}}')" >{{$list}}</a>
                      @endforeach
                    </div>
                    
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                    @foreach($sizeacol as $list)
                    
                    <a href="javascript:void(0)" onclick="color_image('{{asset('storage/images/'.$list->image)}}','{{$list->color_id}}','{{$sizeacol[0]->color_id}}')" class="aa-color-{{$list->color_id}} product_color {{$list->size_id}}"></a>
                      
                    @endforeach
                      
                                          
                    </div>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="quantt{{$category[0]->id}}" name="">
                          @for($i=1;$i<=10;$i++)
                          <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Category: <a href="#">{{$category[0]->category_name}}</a>
                      </p>
                    </div>
                    <div class="colorinput"></div>
                    <div class="sizeinput"></div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart('{{$category[0]->id}}','{{$sizeacol[0]->size_id}}','{{$sizeacol[0]->color_id}}')">Add To Cart</a>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                  <ul>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
                  </ul>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum voluptates autem esse molestiae ipsam, atque quam amet similique ducimus aliquid voluptate perferendis, distinctio!</p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas! Aliquam facere quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos, fugiat, minima quaerat necessitatibus? Optio adipisci ab, obcaecati, porro unde accusantium facilis repudiandae.</p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @if(!isset($relatedprod))
                    
                @foreach($relatedprod as $related)
                
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="{{asset('storage/images/'.$related->image)}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#">{{$related->product_name}}</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endforeach
                @else

                <li>
                <h2>no data found</h2>
                </li>
                
                @endif
                 <!-- start single product item -->
                                                                                                   
              </ul>
              <!-- quick view modal -->                  
              
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <form id="from_cart">
    <input type="hidden" id="color_id" name="color_id">
    <input type="hidden" id="size_id" name="size_id">
    <input type="hidden" id="product_id" value="{{$product[0]->id}}" name="product_id">
    <input type="text" id="pqty" name="pqty">
    @csrf
  </form>
  

  <!-- / product category -->

@endsection