@extends('admin.layout.index')

@section('title')
	Thêm User - Quản trị Website
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Thêm User</small>
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
                        <form action="admin/user/them-user.html" method="POST">
                            <div class="form-group">
                                <label>Tên User</label>
                                <input class="form-control" name="name" placeholder="Nhập Tên Thành Viên" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập Email Thành Viên" />
                            </div>
                            <div class="form-group">
                                <label>PassWord</label>
                                <input type="password" class="form-control" name="password" placeholder="Nhập PassWord Thành Viên" />
                            </div>
                            <div class="form-group">
                                <label>Quền User</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" checked="" type="radio">Quản trị viên
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0" type="radio">Thành Viên
                                </label>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Thêm User</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection