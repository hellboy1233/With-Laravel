@extends('admin/layout')
@section('title','size')
@section('size_select','active')
@section('container')
<h1>size</h1>
<a href="size/manage_size" class="m-b-10 m-t-10 btn-link" >Manage_size</a>
<div class="row">
<div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                {{session('err')}}
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>size </th>
                                               <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($result as $throw)
                                                <tr>
                                                    <td>{{$throw->id}}</td>
                                                    <td>{{$throw->size}}</td>
                                                   
                                                    <td>
                                                    <a href="size/manage_size/{{$throw->id}}"><button type="button" class="btn btn-info">Edit</button></a>
                                                    <a href="size/delete/{{$throw->id}}"><button type="button" class="btn btn-success">Delete</button></a>
                                                    @if($throw->status==1)
                                                        <a href="size/status/0/{{$throw->id}}"><button type="button" class="btn btn-success">Active</button></a>
                                                    @elseif($throw->status==0)
                                                    <a href="size/status/1/{{$throw->id}}"><button type="button" class="btn btn-success">Deactive</button></a>

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