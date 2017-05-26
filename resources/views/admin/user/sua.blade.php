@extends('admin.layout.index')

@section('title')
	Sửa User - {{$user->name}} Quản trị Website
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Sửa User - {{$user->name}}</small>
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
                        <form action="admin/user/{{$user->id}}/sua-user.html" method="POST">
                            <div class="form-group">
                                <label>Tên User</label>
                                <input class="form-control" name="name" value="{{$user->name}}" placeholder="Nhập Tên Thành Viên" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" disabled="" value="{{$user->email}}" placeholder="Nhập Email Thành Viên" />
                            </div>
                            <div class="form-group">
                                <label>PassWord</label>
                                <input type="password" class="form-control" name="password" value="" placeholder="Nhập PassWord Thành Viên" />
                            </div>
                            <div class="form-group">
                                <label>Quền User</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1"
                                    @if($user->quyen == 1)
                                     checked="" 
                                    @endif
                                     type="radio">Quản trị viên
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0"
                                    @if($user->quyen == 0)
                                     checked="" 
                                    @endif
                                     type="radio">Thành Viên
                                </label>
                            </div>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <button type="submit" class="btn btn-default">Sửa User</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection