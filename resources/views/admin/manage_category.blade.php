@extends('admin/layout')
@section('title','Manage Category')
@section('category_select','active')
@section('container')
<h1>Manage Category</h1>

<a href="{{url('admin/category')}}" class="m-b-10 m-t-10 btn-link">Back</a>

<div class="">
    <div class="card">
        
        <div class="card-body">
            
            <hr>
            <form action="{{route('category-insert')}}" enctype="multipart/form-data" method="post" novalidate="novalidate">
            @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="cname">Category Name</label>
                            <input id="cc-pament" type="text" name="category_name" value="{{$category_name}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('category_name')
                                    {{$message}}
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="parent_category_id">Parent Category</label>
                            <br>
                            <select class="control-label mb-1" name="parent_category_id" aria-required="true" aria-invalid="false" >
                                <option value="0">select category</option>
                                @foreach($category as $show)
                                    @if($show->id==$id)
                                        <option value="{{$show->id}}" selected>{{$show->category_name}}</option>
                                    @else
                                        <option value="{{$show->id}}">{{$show->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="cslug">Category Slug</label>
                            <input id="cc-pament" type="text" name="category_slug" value="{{$category_slug}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('category_slug')
                                    {{$message}}
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label  class="control-label mb-1" name="category_img">Images</label>
                                <input  type="file" name="category_img" value="{{$category_img}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('category_img')
                                {{$message}}
                                @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="is_home" name="is_home" id="is_home">show_in_home_page</label>
                            <input type="checkbox" name="is_home" {{$is_home_checked}}>
                        </div>
                    </div>
                </div>        
                <div>
                    <input type="hidden" value="{{$id}}" name="id">
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Submit</span>
                            <span id="payment-button-sending" style="display:none;">Submitting…</span>
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection