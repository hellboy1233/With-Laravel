@extends('admin/layout')
@section('title','tax')
@section('tax_select','active')
@section('container')
<h1>color</h1>
<a href="tax/manage_tax" class="m-b-10 m-t-10 btn-link" >Manage_tax</a>
<div class="row">
<div class="col-md-12">
    <!-- DATA TABLE-->
    <div class="table-responsive m-b-40">
    {{session('err')}}
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>tax_desc</th>
                    <th>tax_value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $throw)
                    <tr>
                        <td>{{$throw->id}}</td>
                        <td>{{$throw->tax_desc}}</td>
                        <td>{{$throw->tax_value}}</td>
                        
                        <td>
                        <a href="tax/manage_tax/{{$throw->id}}"><button type="button" class="btn btn-info">Edit</button></a>
                        <a href="tax/delete/{{$throw->id}}"><button type="button" class="btn btn-success">Delete</button></a>
                        @if($throw->status==1)
                            <a href="tax/status/0/{{$throw->id}}"><button type="button" class="btn btn-success">Active</button></a>
                        @elseif($throw->status==0)
                        <a href="tax/status/1/{{$throw->id}}"><button type="button" class="btn btn-success">Deactive</button></a>

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