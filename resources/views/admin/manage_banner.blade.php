@extends('admin/layout')
@section('title','Manage banner')
@section('banner_select','active')
@section('container')
<h1>Manage banner</h1>

<a href="{{url('admin/banner')}}" class="m-b-10 m-t-10 btn-link">Back</a>

<div class="">
    <div class="card">
        
        <div class="card-body">
            
            <hr>
            <form action="{{route('banner-insert')}}" enctype="multipart/form-data" method="post" novalidate="novalidate">
            @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="btn_link">btn_link</label>
                            <input id="cc-pament" type="text" name="btn_link" value="{{$btn_link}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            
                        </div>
                        
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="btn_txt">btn_txt</label>
                            <input id="cc-pament" type="text" name="btn_txt" value="{{$btn_txt}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            
                        </div>
                        <div class="col-md-4">
                            <label  class="control-label mb-1" name="b_image">Images</label>
                                <input  type="file" name="b_image" value="{{$b_image}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('b_image')
                                {{$message}}
                                @enderror
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