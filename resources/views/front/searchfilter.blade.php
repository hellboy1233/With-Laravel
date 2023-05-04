@extends('front/layout')
@section('container')
<section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <div class="aa-blog-content">
                  <div class="row">
                     
                      <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                
              @if(isset($data))
                      @foreach($data as $list)
                    <li>
                    
                      <figure>
                        <a class="aa-product-img" href="product/{{$list->id}}"><img src="{{asset('storage/images/'.$list->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="javascript:void(0)"><span class="fa fa-shopping-cart"onclick="add_to_cart2('{{$list->id}}','{{$list->size_id}}','{{$list->color_id}}','{{$list->qty}}')" ></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="product/{{$list->id}}">{{$list->product_name}}</a></h4>
                          <span class="aa-product-price">{{$list->price}}</span>
                          <span class="aa-product-price"><del>{{$list->mrp}}</del></span>
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
                    
                    
              <form id="from_cart2">
                  <input type="hidden" id="color_id" name="color_id">
                  <input type="hidden" id="size_id" name="size_id">
                  <input type="hidden" id="product_id"  name="product_id">
                  <input type="hidden" id="pqty" name="pqty" >
                  @csrf
                </form>
              
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection