@extends('admin/layout')
@section('title','product')
@section('product_select','active')
@section('container')
<h1>product</h1>
<a href="product/manage_product" class="m-b-10 m-t-10 btn-link" >Manage_product</a>
<div class="row">
<div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                @if(session()->has('err'))
                                
                                <div class="alert alert-primary" role="alert">
                                {{session('err')}}
                                </div>
                                
                                
                                @endif
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>product Name </th>
                                                <th>product_Brand</th>
                                                <th>slug</th>
                                                <th>Image</th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result as $throw)
                                                <tr>
                                                    <td>{{$throw->id}}</td>
                                                    <td>{{$throw->product_name}}</td>
                                                    <td>{{$throw->product_brand}}</td>
                                                    <td>{{$throw->slug}}</td>
                                                    <td><img src="{{url('storage/images/'.$throw->image)}}" ></td>

                                                   
                                                    <td>
                                                    <a href="product/manage_product/{{$throw->id}}"><button type="button" class="btn btn-info">Edit</button></a>
                                                    <a href="product/delete/{{$throw->id}}"><button type="button" class="btn btn-success">Delete</button></a>
                                                    @if($throw->status==1)
                                                        <a href="product/status/0/{{$throw->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                                    @elseif($throw->status==0)
                                                    <a href="product/status/1/{{$throw->id}}"><button type="button" class="btn btn-success">Deactive</button></a>

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