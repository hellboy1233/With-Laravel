@extends('front/layout')

@section('container')
<h1>Registration</h1>

<div class="">
<div class="">
    <div class="card">
        
        <div class="card-body">
            
            <hr>
            <form id="submit_register" method="post" novalidate="novalidate">
            @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="name">Name</label>
                            <input  type="text" name="name" value="" class="form-control" aria-required="true" aria-invalid="false" required>
                            <span class="regname"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1" name="email">email</label>
                            <input  type="text" name="email" value="" class="form-control" aria-required="true" aria-invalid="false" required>
                            <span class="regemail"></span>
                        </div>
                        <div class="col-md-6">
                        <label for="cc-payment" class="control-label mb-1" name="mobile">mobile</label>
                            <input  type="text" name="mobile" value="" class="form-control" aria-required="true" aria-invalid="false" required>
                            <span class="regmobile"></span>
                        </div>
                        <div class="col-md-6">
                        <label for="cc-payment" class="control-label mb-1" name="password">password</label>
                            <input  type="text" name="password" value="" class="form-control" aria-required="true" aria-invalid="false" required>
                            <span class="regpassword"></span>
                        </div>
                        
                        
                    </div>
                    
                    
                </div>
                
                
                <div>
                
                    <button id="payment-button" type="submit"   class="btn btn-lg btn-info btn-block">
                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                        <span id="payment-button-amount">Submit</span>
                        
                    </button>
                </div>
            </form>
            <div id="success_msg"></div>
        </div>
    </div>
</div>
</div>
@endsection