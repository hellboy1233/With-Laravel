@extends('admin/layout')
@section('title','customer')
@section('customer_select','active')
@section('container')
<h1>customer</h1>
<a href="customer/manage_customer" class="m-b-10 m-t-10 btn-link" >Manage_customer</a>
<div class="row">
<div class="col-md-12">
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
    {{session('err')}}
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    
                    <th>Name </th>
                    <th>email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $throw)
                    <tr>
                        
                        <td>{{$throw->name}}</td>
                        <td>{{$throw->email}}</td>
                        <td>
                        <a href="customer/show_customer_detail/{{$throw->id}}"><button type="button" class="btn btn-info">show more</button></a>
                        <a href="customer/manage_customer/{{$throw->id}}"><button type="button" class="btn btn-info">Edit</button></a>
                        <a href="customer/delete/{{$throw->id}}"><button type="button" class="btn btn-success">Delete</button></a>
                        @if($throw->status==1)
                            <a href="customer/status/0/{{$throw->id}}"><button type="button" class="btn btn-success">Active</button></a>
                        @elseif($throw->status==0)
                        <a href="customer/status/1/{{$throw->id}}"><button type="button" class="btn btn-success">Deactive</button></a>

                        @endif
                        </td>
                    </tr>



                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE-->
</div>
</div>
@endsection