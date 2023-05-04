@extends('admin/layout')
@section('title','Coupon')
@section('coupon_select','active')
@section('container')
<h1>Coupon</h1>
<a href="coupon/manage_coupon" class="m-b-10 m-t-10 btn-link" >Manage_coupon</a>
<div class="row">
<div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                {{session('err')}}
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Code</th>
                                                <th>Value</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result as $throw)
                                                <tr>
                                                    <td>{{$throw->id}}</td>
                                                    <td>{{$throw->title}}</td>
                                                    <td>{{$throw->code}}</td>
                                                    <td>{{$throw->value}}</td>
                                                    <td>
                                                    <a href="coupon/manage_coupon/{{$throw->id}}"><button type="button" class="btn btn-info">Edit</button></a>
                                                    <a href="coupon/delete/{{$throw->id}}"><button type="button" class="btn btn-success">Delete</button></a>
                                                    @if($throw->status==1)
                                                        <a href="coupon/status/0/{{$throw->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                                    @elseif($throw->status==0)
                                                    <a href="coupon/status/1/{{$throw->id}}"><button type="button" class="btn btn-success">Deactive</button></a>

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