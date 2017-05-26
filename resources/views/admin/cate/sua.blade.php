@extends('admin.layout.index')

@section('title')
	{{$cat->name}} - Quản trị Website
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Sửa Category: {{$cat->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $loi)
                                    {{$loi}}<br/>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        <form action="admin/cate/{{$cat->id}}/sua-cate.html" method="POST">
                            <div class="form-group">
                                <label>Tên Category</label>
                                <input class="form-control" name="name" value="{{$cat->name}}" placeholder="Nhập Tên Category" />
                            </div>
                            @if($cat->paren_id != 0)
                                <div class="form-group">
                                    <label>Level</label>
                                    <select class="form-control" name="paren_id">
                                        <option value="0">Category Chính</option>
                                        @foreach($cate as $ca)
                                            <option 
                                            @if($ca->id == $cat->paren_id)
                                                selected="" 
                                            @endif
                                            value="{{$ca->id}}" >{{$ca->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Sửa Category</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection