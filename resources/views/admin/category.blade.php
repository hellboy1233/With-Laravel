@extends('admin/layout')
@section('title','Category')
@section('category_select','active')
@section('container')
<h1>Category</h1>
<a href="category/manage_category" class="m-b-10 m-t-10 btn-link" >Manage_category</a>
<div class="row">
<div class="col-md-12">
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
    {{session('err')}}
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $throw)
                    <tr>
                        <td>{{$throw->id}}</td>
                        <td>{{$throw->category_name}}</td>
                        <td>{{$throw->category_slug}}</td>
                        <td>
                        <a href="category/manage_category/{{$throw->id}}"><button type="button" class="btn btn-info">Edit</button></a>
                        <a href="category/delete/{{$throw->id}}"><button type="button" class="btn btn-success">Delete</button></a>
                        @if($throw->status==1)
                            <a href="category/status/0/{{$throw->id}}"><button type="button" class="btn btn-success">Active</button></a>
                        @elseif($throw->status==0)
                        <a href="category/status/1/{{$throw->id}}"><button type="button" class="btn btn-success">Deactive</button></a>

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