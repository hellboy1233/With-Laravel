@extends('admin/layout')
@section('title','Manage tax')
@section('tax_select','active')
@section('container')
<h1>Manage tax</h1>
<a href="{{url('admin/tax')}}" class="m-b-10 m-t-10 btn-link">Back</a>
<div class="">
<div class="">
    <div class="card">
        
        <div class="card-body">
            
            <hr>
            <form action="{{route('tax-insert')}}" method="post" novalidate="novalidate">
            @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="tax_value">tax value</label>
                            <input id="cc-pament" type="text" name="tax_value" value="{{$tax_value}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="tax_desc">tax desc</label>
                            <input id="cc-pament" type="text" name="tax_desc" value="{{$tax_desc}}" class="form-control" aria-required="true" aria-invalid="false" required>
                            
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