@extends('admin/layout')
@section('title','brand')
@section('brand_select','active')
@section('container')
<h1>brand</h1>
<a href="brand/manage_brand" class="m-b-10 m-t-10 btn-link" >Manage_brand</a>
<div class="row">
<div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                {{session('err')}}
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name </th>
                                                <th>Image</th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result as $throw)
                                                <tr>
                                                    <td>{{$throw->id}}</td>
                                                    <td>{{$throw->name}}</td>
                                                    <td><img style="height:100px" src="{{url('storage/images/'.$throw->image)}}" ></td>
                                                   
                                                    <td>
                                                    <a href="brand/manage_brand/{{$throw->id}}"><button type="button" class="btn btn-info">Edit</button></a>
                                                    <a href="brand/delete/{{$throw->id}}"><button type="button" class="btn btn-success">Delete</button></a>
                                                    @if($throw->status==1)
                                                        <a href="brand/status/0/{{$throw->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                                    @elseif($throw->status==0)
                                                    <a href="brand/status/1/{{$throw->id}}"><button type="button" class="btn btn-success">Deactive</button></a>

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