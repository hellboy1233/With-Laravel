@extends('admin/layout')
@section('title','Manage color')
@section('color_select','active')
@section('container')
<h1>Manage color</h1>
<a href="{{url('admin/color')}}" class="m-b-10 m-t-10 btn-link">Back</a>
<div class="">
<div class="">
                                <div class="card">
                                    
                                    <div class="card-body">
                                        
                                        <hr>
                                        <form action="{{route('color-insert')}}" method="post" novalidate="novalidate">
                                        @csrf
                                            <div class="form-group">
                                                <label for="cc-payment" class="control-label mb-1" name="color">color</label>
                                                <input id="cc-pament" type="text" name="color" value="{{$color}}" class="form-control" aria-required="true" aria-invalid="false" required>
                                                @error('color')
                                                        {{$message}}
                                                @enderror
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