@extends('admin/layout')
@section('title','Manage brand')
@section('brand_select','active')
@section('container')
<h1>Manage brand</h1>
<a href="{{url('admin/brand')}}" class="m-b-10 m-t-10 btn-link" >Back</a>
<div class="">
<div class="">
    <div class="card">
        
        <div class="card-body">
            
            <hr>
            <form action="{{route('brand-insert')}}" method="post" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
                <div class="form-group">
                <input type="hidden" value="{{$id}}" name="id">
                    <label  class="control-label mb-1" name="name">brand</label>
                    <input  type="text" name="name" value="{{$name}}" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('name')
                            {{$message}}
                    @enderror
                </div>
                <div class="form-group">
                    <label  class="control-label mb-1" name="image">Image</label>
                    <input type="file" name="image" >
                    
                            <label for="is_home" name="is_home" id="is_home">show_in_home_page</label>
                            <input type="checkbox" name="is_home" {{$is_home_checked}}>
                        
                </div>
                @error('image')
                    {{$message}}
                @enderror
                
                <div>
                <input type="hidden" value="{{$id}}" name="id">
                    <button  type="submit" class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Submit</span>
                        
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection