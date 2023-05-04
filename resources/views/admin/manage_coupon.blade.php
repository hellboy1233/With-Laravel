@extends('admin/layout')
@section('title','Manage Coupon')
@section('coupon_select','active')
@section('container')
<h1>Manage Coupon</h1>
<a href="{{url('admin/coupon')}}" class="m-b-10 m-t-10 btn-link">Back</a>
<div class="">
<div class="">
    <div class="card">
        
        <div class="card-body">
            
            <hr>
            <form action="{{route('coupon-insert')}}" method="post" novalidate="novalidate">
            @csrf
                <div class="form-group " >
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="title">Title</label>
                            <input id="cc-pament" type="text" name="title" value="{{$title}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('title')
                                    {{$message}}
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="code">Code</label>
                            <input id="cc-pament" type="text" name="code" value="{{$code}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('code')
                                    {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="value">Value</label>
                            <input id="cc-pament" type="text" name="value" value="{{$value}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('value')
                                    {{$message}}
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <label for="cc-payment" class="control-label mb-1" name="value_type">Value Type</label>
                            <br>
                            <select name="value_type" id="value_type">
                                @if($value_type=='per')
                                <option value="select">select</option>
                                <option value="value">value</option>
                                <option value="per" selected>per</option>
                                @elseif($value_type=='value')
                                <option value="select">select</option>
                                <option value="value" selected>value</option>
                                <option value="per" >per</option>
                                @else
                                <option value="select">select</option>
                                <option value="value">value</option>
                                <option value="per" >per</option>

                                @endif
                                
                                
                            </select>
                            
                        </div>
                        <div class="col-md-3">
                            <label for="cc-payment" class="control-label mb-1" name="is_one_time">IS one TIme</label>
                            <br>
                            <select name="is_one_time" id="is_one_time">
                                @if($is_one_time=='1')
                                <option value="select">select</option>
                                <option value="0">no</option>
                                <option value="1" selected>yes</option>
                                @elseif($is_one_time=='0')
                                <option value="select">select</option>
                                <option value="0" selected>no</option>
                                <option value="1">yes</option>
                                @else
                                <option value="select">select</option>
                                <option value="0">no</option>
                                <option value="1">yes</option>

                                @endif
                                
                                
                            </select>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="minimum_order_amt">minimum_order_amt</label>
                            <input id="cc-pament" type="text" name="minimum_order_amt" value="{{$minimum_order_amt}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            
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
</div>
@endsection