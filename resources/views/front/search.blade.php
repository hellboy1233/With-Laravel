@extends('front/layout')

@section('container')

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
</div>

@endsection