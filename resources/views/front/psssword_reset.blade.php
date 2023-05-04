@extends('front/layout')

@section('container')

<form class="aa-login-form"  id="reset_new_password">
          @csrf
            
            <label for="">New Password<span>*</span></label>
            <input type="password" name="npassword"  id="npassword" placeholder="New Password">
            <label for="">Confirm Password<span>*</span></label>
            <input type="password" name="cpassword"  id="cpassword" placeholder="Confirm Password">
            <button class="aa-browse-btn" type="submit"  >Reset</button>
            
          </form>
  
@endsection