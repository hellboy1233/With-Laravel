@extends('admin/layout')
@section('title','Manage customer')
@section('customer_select','active')
@section('container')
<h1>Manage customer</h1>
<a href="{{url('admin/customer')}}" class="m-b-10 m-t-10 btn-link">Back</a>
<div class="">
<div class="">
    <div class="card">
        
        <div class="card-body">
            
            <hr>
            <form action="{{route('customer-insert')}}" method="post" novalidate="novalidate">
            @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="name">Name</label>
                            <input  type="text" name="name" value="{{$name}}" class="form-control" aria-required="true" aria-invalid="false" required>
                    
                        </div>
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="name">email</label>
                            <input  type="text" name="email" value="{{$email}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1" name="mobile">mobile</label>
                            <input  type="text" name="mobile" value="{{$mobile}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1" name="password">password</label>
                            <input  type="text" name="password" value="{{$password}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1" name="address">address</label>
                            <input  type="text" name="address" value="{{$address}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1" name="city">city</label>
                            <input  type="text" name="city" value="{{$city}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1" name="state">state</label>
                            <input  type="text" name="state" value="{{$state}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="zip">zip</label>
                            <input  type="text" name="zip" value="{{$zip}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        </div>
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1" name="company">company</label>
                            <input  type="text" name="company" value="{{$company}}" class="form-control" aria-required="true" aria-invalid="false" required>
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