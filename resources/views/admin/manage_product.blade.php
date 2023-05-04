@extends('admin/layout')
@section('title','Manage product')
@section('product_select','active')
@section('container')


<h1>Manage product</h1>
<a href="{{url('admin/product')}}" class="m-b-10 m-t-10 btn-link">Back</a>

<form action="{{route('product-insert')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
   <div class="card">
      <div class="card-body">
         <hr>
         @csrf
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="product_name">product Name</label>
            <input id="cc-pament" type="text" name="product_name" value="{{$product_name}}" class="form-control" aria-required="true" aria-invalid="false" required>
            @error('product_name')
            {{$message}}
            @enderror
         </div>
         <div class="form-group ">
            <div class="row">
               <div class="col-md-4 ">
                  <label  class="control-label mb-1" name="category" aria-required="true" aria-invalid="false" >category</label><br>
                  <select class="control-label mb-1" name="category" aria-required="true" aria-invalid="false" >
                     <option value="select category">select category</option>
                     @foreach($category_list as $num)
                     @if($category==$num->id)
                     <option selected value="{{$num->id}}">{{$num->category_name}}</option>
                     @else
                     <option  value="{{$num->id}}">{{$num->category_name}}</option>
                     @endif
                     @endforeach
                  </select>
                  @error('category')
                  {{$message}}
                  @enderror
               </div>
               <div class="col-md-4 ">
                  <label for="cc-payment" class="control-label mb-1" name="product_brand">product Brand</label>
                  <br>
                  <select class="control-label mb-1" name="product_brand" aria-required="true" aria-invalid="false" >
                     <option value="select brand">Brand</option>
                     @foreach($brand as $num)
                     @if($id==$num->id)
                     <option selected value="{{$num->name}}">{{$num->name}}</option>
                     @else
                     <option  value="{{$num->name}}">{{$num->name}}</option>
                     @endif
                     @endforeach
                  </select>
                  @error('product_brand')
                  {{$message}}
                  @enderror
               </div>
               <div class="col-md-4 ">
                  <label for="cc-payment" class="control-label mb-1" name="product_model">product Model</label>
                  <input id="cc-pament" type="text" name="product_model" value="{{$product_model}}" class="form-control" aria-required="true" aria-invalid="false" required>
                  @error('product_model')
                  {{$message}}
                  @enderror
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="short_desc">Short Desc</label>
            <textarea class="form-control" id="short_desc" name="short_desc"></textarea>
         </div>
         <div class="form-group">
         <label for="cc-payment" class="control-label mb-1" name="desc">Description</label>
            <textarea class="form-control" id="desc" name="desc"></textarea>
            @error('desc')
            {{$message}}
            @enderror
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="keywords">keywords</label>
            <input id="cc-pament" type="text" name="keywords" value="{{$keywords}}" class="form-control" aria-required="true" aria-invalid="false" required>
            @error('keywords')
            {{$message}}
            @enderror
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="technical_specification">technical_specification</label>
            <input id="cc-pament" type="text" name="technical_specification" value="{{$technical_specification}}" class="form-control" aria-required="true" aria-invalid="false" required>
            @error('technical_specification')
            {{$message}}
            @enderror
         </div>
         <div class="form-group ">
            <div class="row">
               <div class="col-md-4 ">
               <label for="cc-payment" class="control-label mb-1" name="lead_time">Lead_time</label>
                  <input id="cc-pament" type="text" name="lead_time" value="{{$lead_time}}" class="form-control" aria-required="true" aria-invalid="false">
               </div>
               <div class="col-md-4 ">
                  <label for="cc-payment" class="control-label mb-1" name="tax">Tax</label>
                  <input id="cc-pament" type="text" name="tax" value="{{$taxy}}" class="form-control" aria-required="true" aria-invalid="false">
               </div>
               <div class="col-md-4 ">
                  <label for="cc-payment" class="control-label mb-1" name="tax_type">Tax_type</label>
                  <br>
                  <select class="control-label mb-1" name="tax_type" aria-required="true" aria-invalid="false" >
                     <option value="select tax">select tax</option>
                     @foreach($tax as $num)
                     @if($tax_value==$num->tax_value)
                     <option selected value="{{$num->tax_value}}">{{$num->tax_value}}</option>
                     @else
                     <option  value="{{$num->tax_value}}">{{$num->tax_value}}</option>
                     @endif
                     @endforeach
                  </select>
                  
               </div>
            </div>
         </div>
         <div class="form-group ">
            <div class="row">
               <div class="col-md-3 ">
                  <label for="cc-payment" class="control-label mb-1" name="is_promo">is_promo</label>
                  <select class="control-label mb-1" name="is_promo" aria-required="true" aria-invalid="false" >
                     
                     @if($is_promo=='0')
                     <option  value="0" selected>No</option>
                     <option  value="1">Yes</option>
                     
                     @elseif($is_promo=='1')
                     
                     <option  value="0">No</option>
                     <option  value="1" selected>Yes</option>
                     @else
                     
                     <option  value="0">No</option>
                     <option  value="1">Yes</option>
                     @endif
                  </select>
               </div>
               <div class="col-md-3 ">
                  <label for="cc-payment" class="control-label mb-1" name="is_featured">is_featured</label>
                  <select class="control-label mb-1" name="is_featured" aria-required="true" aria-invalid="false" >
                  @if($is_featured=='0')
                     <option  value="0" selected>No</option>
                     <option  value="1">Yes</option>
                     
                     @elseif($is_promo=='1')
                     
                     <option  value="0">No</option>
                     <option  value="1" selected>Yes</option>
                     @else
                     
                     <option  value="0">No</option>
                     <option  value="1">Yes</option>
                     @endif
                  </select>
               </div>
               <div class="col-md-3 ">
                  <label for="cc-payment" class="control-label mb-1" name="is_discounted">is_discounted</label>
                  <select class="control-label mb-1" name="is_discounted" aria-required="true" aria-invalid="false" >
                  @if($is_discounted=='0')
                     <option  value="0" selected>No</option>
                     <option  value="1">Yes</option>
                     
                     @elseif($is_promo=='1')
                     
                     <option  value="0">No</option>
                     <option  value="1" selected>Yes</option>
                     @else
                     
                     <option  value="0">No</option>
                     <option  value="1">Yes</option>
                     @endif
                  </select>
               </div>
               <div class="col-md-3 ">
                  <label for="cc-payment" class="control-label mb-1" name="is_trading">is_trading</label>
                  <select class="control-label mb-1" name="is_trading" aria-required="true" aria-invalid="false" >
                  @if($is_trading=='0')
                     <option  value="0" selected>No</option>
                     <option  value="1">Yes</option>
                     
                     @elseif($is_promo=='1')
                     
                     <option  value="0">No</option>
                     <option  value="1" selected>Yes</option>
                     @else
                     
                     <option  value="0">No</option>
                     <option  value="1">Yes</option>
                     @endif
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="uses">uses</label>
            <input id="cc-pament" type="text" name="uses" value="{{$uses}}" class="form-control" aria-required="true" aria-invalid="false" required>
            @error('uses')
            {{$message}}
            @enderror
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="warranty">warranty</label>
            <input id="cc-pament" type="text" name="warranty" value="{{$warranty}}" class="form-control" aria-required="true" aria-invalid="false" required>
            @error('warranty')
            {{$message}}
            @enderror
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="slug">slug</label>
            <input id="cc-pament" type="text" name="slug" value="{{$slug}}" class="form-control" aria-required="true" aria-invalid="false" required>
            @error('slug')
            {{$message}}
            @enderror
         </div>
         <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" name="image">Images</label>
            <input id="cc-pament" type="file" name="image" value="{{$image}}" class="form-control" aria-required="true" aria-invalid="false" required>
            @error('image')
            {{$message}}
            @enderror
            <img style="height:100px;" src="{{url('storage/images/'.$image)}}" >
         </div>
      </div>
   </div>
   <!-- product images section-->
   <h2>Product Images</h2>
   <div id="imageappend" >
  
   
      @php
      
      $loop_count=1
      @endphp
      @foreach($productimgarr as $key=>$val)
      
      @php
      
      $loop_prev=$loop_count
      @endphp
      <?php
      
         $paarr=(array)$val;
        print_r($paarr);
        
         ?>
         <input type="text" value="{{$paarr['id']}}" name="imgid[]">
         <input type="text" value="{{$paarr['product_id']}}" name="primgid">
      <div class="card" id="removingimg{{$loop_count++}}" >
         <div class="card-body">
            <hr>
            <div class="form-row align-items-center" >
               <div class="col-sm-3 my-2">
                  <label class="control-label mb-1" name="primage">Images</label>
                  <input type="file" name="primage[]" >
                  <img style="height:100px;" src="{{url('storage/images/'.$paarr['images'])}}" >

               </div>
               @if($loop_count==2)
               <div class="col-sm-3 my-2" style="color: white;">
                  <a  onclick="add_more()" class="btn btn-lg btn-success btn-block">
                  <i class="fa fa-solid fa-plus"></i>&nbsp;
                  <span >Add</span>
                  </a>
               </div>
               @else
               {{$loop_count}}
               {{$loop_prev}}
               <div class="col-sm-3 my-2" style="color: white;">
                  <a href="{{url('admin/product_images_delete')}}/{{$paarr['id']}}/{{$paarr['product_id']}}"  onclick="remove_moreimg({{$loop_prev}})" class="btn btn-lg btn-danger btn-block">
                  <i class="fa fa-solid fa-minus"></i>&nbsp;
                  <span >Remove</span>
                  </a>
               </div>
               @endif
            </div>
         </div>
      </div>
      @endforeach
      <?php
      $in=$paarr['id'];
          $pi=$key;
         $pi++;
         echo $pi;
      ?>
   </div>
   <!-- product images section ends-->
   <h2>Product Attributes</h2>
   <div class="appending" id="appending">
   
      @php
      $loop_count=1
      @endphp
      @foreach($productarr as $key=>$val)
      @php
      $loop_prev=$loop_count
      @endphp
      <?php
         $paarr=(array)$val;
         
         ?>
      @error('sku.*')
      {{$message}}
      @enderror
      @error('paimage.*')
      {{$message}}
      @enderror
      @error('mrp.*')
      {{$message}}
      @enderror
      @error('price.*')
      {{$message}}
      @enderror
      @error('qty.*')
      {{$message}}
      @enderror
      <input type="text" value="{{$paarr['sku']}}" name="hid" id="hid">
      <input type="text" value="{{$paarr['id']}}" name="patid[]" id="patid[]">
      
      <div class="card" id="removing{{$loop_count++}}" >
         <div class="card-body">
            <hr>
            @csrf
            <div class="form-row align-items-center">
               <div class="col-sm-3 my-1">
                  <label name="sku" for="sku">Sku</label>
                  <input type="text" name="sku[]" value="{{$paarr['sku']}}" class="form-control" id="sku[]" >
               </div>
               <div class="col-sm-3 my-1">
                  <label name="mrp" for="sku">Mrp</label>
                  <input type="number" name="mrp[]" value="{{$paarr['mrp']}}" class="form-control" id="mrp" >
               </div>
               <div class="col-sm-3 my-1">
                  <label name="price" for="sku">price</label>
                  <input type="number" name="price[]" value="{{$paarr['price']}}" class="form-control" id="price" >
               </div>
               <div class="col-sm-3 my-1">
                  <label name="qty" for="sku">qty</label>
                  <input type="number" name="qty[]" value="{{$paarr['qty']}}" class="form-control" id="qty" >
               </div>
               <div class="col-sm-3 my-1">
                  <label for="color">color</label><br>
                  <select for="color" name="color[]" >
                     <option value="">select</option>
                     @foreach($color as $s)
                     @if($paarr['color_id']==$s->color)
                     <option selected value="{{$s->color}}">{{$s->color}}</option>
                     @else
                     <option value="{{$s->color}}">{{$s->color}}</option>
                     @endif
                     @endforeach
                  </select>
               </div>
               <div class="col-sm-3 my-1">
                  <label for="size">size</label><br>
                  <select for="size" name="size[]" >
                     <option value="">select</option>
                     @foreach($size as $s)
                     @if($paarr['size_id']==$s->size)
                     <option selected value="{{$s->size}}">{{$s->size}}</option>
                     @else
                     <option value="{{$s->size}}">{{$s->size}}</option>
                     @endif                     
                     @endforeach
                  </select>
               </div>
               <div class="col-sm-3 my-2">
                  <label class="control-label mb-1" name="paimage">Images</label>
                  <input type="file" name="paimage[]" >
               </div>
               @if($loop_count==2)
               <div class="col-sm-3 my-2" style="color: white;">
                  <a  onclick="adding()" class="btn btn-lg btn-success btn-block">
                  <i class="fa fa-solid fa-plus"></i>&nbsp;
                  <span >Add</span>
                  </a>
               </div>
               @else
               {{$loop_count}}
               <div class="col-sm-3 my-2" style="color: white;">
                  <a href="{{url('admin/product_attr_delete')}}/{{$paarr['id']}}/{{$id}}"  onclick="remove_more({{$loop_prev}})" class="btn btn-lg btn-danger btn-block">
                  <i class="fa fa-solid fa-minus"></i>&nbsp;
                  <span >Remove</span>
                  </a>
               </div>
               @endif
            </div>
         </div>
      </div>
      @endforeach
      <?php
      
         $t=$key;
         $t++;
         
         
         ?> 
   </div>
   <div>
      <input type="hidden" value="{{$id}}" name="id">
      <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
      <i class="fa fa-lock fa-lg"></i>&nbsp;
      <span id="payment-button-amount">submit</span>
      <span id="payment-button-sending" style="display:none;">Submitting…</span>
      </button>
   </div>
</form>
@endsection

<script>
 
   var total="<?php echo $t ?>";
   var pimg="<?php echo $pi ?>";
   var inn="<?php echo $in ?>";
   console.log(total);
      const adding=()=>{
         
       total++;
       
           
            var html = '<div class="card" id="removing'+total+'"><div class="card-body"><hr><div class="form-row align-items-center">';
            html+='<div class="col-sm-3 my-1"><label name="sku" for="sku">Sku</label><input type="text"name="sku[]" class="form-control" id="sku" ></div>';
            html+='<div class="col-sm-3 my-1"><label name="mrp" for="sku">Mrp</label><input type="number"name="mrp[]" class="form-control" id="mrp" ></div>';
            html+='<div class="col-sm-3 my-1"><label name="price" for="sku">price</label><input type="number" name="price[]" class="form-control" id="price" ></div>';
            html+='<div class="col-sm-3 my-1"><label name="qty" for="sku">qty</label><input type="number"name="qty[]" class="form-control" id="qty" ></div>';
            html+='<div class="col-sm-3 my-1"><label for="color">color</label><br><select for="color" name="color[]" ><option value="color">select</option>@foreach($color as $s)<option value="{{$s->color}}">{{$s->color}}</option>@endforeach</select></div>';
            html+='<div class="col-sm-3 my-1"><label for="size">size</label><br><select for="size" name="size[]" ><option value="size">select</option>@foreach($size as $s)<option value="{{$s->size}}">{{$s->size}}</option>@endforeach</select></div>';
            html+='<div class="col-sm-3 my-2"><label class="control-label mb-1" name="paimage">Images</label><input type="file" name="paimage[]" ></div>';
            html+='<div class="col-sm-3 my-2" style="color: white;"><a  onclick=remove_more('+total+') class="btn btn-lg btn-danger btn-block"><i class="fa fa-solid fa-minus"></i>&nbsp;<span >Remove</span></a></div>';
            html+='</div></div></div>';
            
            jQuery('#appending').append(html);
     
      }
      function remove_more(count){
               
               jQuery('#removing'+count).remove();
            }
      const add_more=()=>{
         
         pimg++;
         
        
         imghtml='<input type="text" value="khgk" name="imgid[]">';
         imghtml = '<div class="card" id="removingimg'+pimg+'" ><div class="card-body"><hr><div class="form-row align-items-center">';
         
         imghtml+='<div class="col-sm-3 my-2"><label class="control-label mb-1" name="primage">Images</label><input type="file" name="primage[]" ><input type="text" value="hdbdj" name="imgid[]"></div>';
         imghtml+='<div class="col-sm-3 my-2" style="color: white;"><a  onclick=remove_moreimg('+pimg+') class="btn btn-lg btn-danger btn-block"><i class="fa fa-solid fa-minus"></i>&nbsp;<span >Remove</span></a></div>';
         imghtml+='</div></div></div>';
        
         jQuery('#imageappend').append(imghtml);
      }
      const remove_moreimg=(count)=>{
         
         jQuery('#removingimg'+count).remove();
      }
      
</script>

