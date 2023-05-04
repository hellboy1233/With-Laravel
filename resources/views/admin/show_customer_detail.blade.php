@extends('admin/layout')
@section('title','Manage customer')
@section('customer_select','active')
@section('container')
<h1>Manage customer</h1>

<a href="{{url('admin/customer')}}" class="m-b-10 m-t-10 btn-link">Back</a>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                Name
            </div>
            <div class="col-md-3">
                {{$show[0]->name}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Email
            </div>
            <div class="col-md-3">
                {{$show[0]->email}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Address
            </div>
            <div class="col-md-3">
                {{$show[0]->address}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Zip
            </div>
            <div class="col-md-3">
                {{$show[0]->zip}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Mobile
            </div>
            <div class="col-md-3">
                {{$show[0]->mobile}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                City
            </div>
            <div class="col-md-3">
                {{$show[0]->city}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                password
            </div>
            <div class="col-md-3">
                {{$show[0]->password}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                State
            </div>
            <div class="col-md-3">
                {{$show[0]->state}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Company
            </div>
            <div class="col-md-3">
                {{$show[0]->company}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Created_at
            </div>
            <div class="col-md-3">
                {{Carbon\Carbon::parse($show[0]->created_at)->format('d-m-y')}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                Updated_at
            </div>
            <div class="col-md-3">
                {{Carbon\Carbon::parse($show[0]->updated_at)->format('d-m-y')}}
            </div>
        </div>
    </div>
</div>

@endsection