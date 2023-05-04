@extends('front/layout')

@section('container')

<section id="aa-product-category">

    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  
                  <select name="sorting" id="sorting" onchange="sort_by()">
                    <option value=""  selected="Default">Default</option>
                    <option value="name">Name</option>
                    <option value="price_asc">Price_asc</option>
                    <option value="price_desc">Price_desc</option>
                    <option value="date">Date</option>
                  </select>{{$default}}
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
           
            
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                
              @if(isset($prod_list))
                      @foreach($prod_list as $list)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="product/{{$list->id}}"><img src="{{asset('storage/images/'.$list->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="\cart"><span class="fa fa-shopping-cart" ></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product/{{$list->id}}">{{$list->product_name}}</a></h4>
                          <span class="aa-product-price">{{$prod_attr_list[ $list->id][0]->price}}</span>
                          <span class="aa-product-price"><del>{{$prod_attr_list[ $list->id][0]->price}}</del></span>
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
              <!-- quick view modal -->                  
              
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              @foreach($category_data as $category)
              @if($category->category_slug==$slug)
                <li><a href="{{url('category/'.$category->category_slug)}}" class="activate_categry">{{$category->category_name}}</a></li>
                @else
                <li><a href="{{url('category/'.$category->category_slug)}}">{{$category->category_name}}</a></li>
                @endif
                @endforeach
              </ul>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                
                <a href="#">Pen Drive</a>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val"></span>
                 <span id="skip-value-upper" class="example-val"></span>
                 <button class="aa-filter-btn" type="button" onclick="price_filter()" >Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                @foreach($colors_list as $color)
                @if(in_array($color->color,$colorarr))
                <a class="aa-color-{{$color->color}} active_color" href="javascript:void(0)" onclick="color_filter('{{$color->color}}',1)" ></a>
                @else
                <a class="aa-color-{{$color->color}}" href="javascript:void(0)" onclick="color_filter('{{$color->color}}',0)" ></a>
                @endif
                @endforeach
              </div>                            
            </div>
            
            <!-- single sidebar -->
            
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <form id="category_filter">
    <input type="text" id="sort_value" name="sort_value">
    <input type="text" id="starting_price" name="starting_price" value=" {{$starting_price}}">
    <input type="text" id="ending_price" name="ending_price" value=" {{$ending_price}}">
    <input type="text" id="color_f" name="color_f" value="{{$coloring}}">
  </form>
@endsection