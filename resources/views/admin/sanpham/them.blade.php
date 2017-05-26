@extends('admin.layout.index')

@section('title')
	Thêm Sản Phẩm - Quản trị Website
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Thêm</small>
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
                        <form action="admin/san-pham/them-san-pham.html" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="name" placeholder="Nhập Tên Sản Phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" name="id_cate">
                                    @foreach($cate as $ca)
                                        @if($ca->paren_id != 0)
                                            <option value="{{$ca->id}}">{{$ca->name}}</option>
                                        @endif    
                                    @endforeach
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá Sản Phẩm</label>
                                <input type="number" min="0" class="form-control" name="gia" placeholder="Nhập giá Sản Phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Chi Tiết Sản Phẩm</label>
                                <textarea  class="form-control ckeditor" name="chiTiet" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Sản Phẩm</label>
                                <input type="file" min="0" class="form-control" name="hinh"  />
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" name="_token">
                            <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
                            <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection
@section('script')
<script type="text/javascript" src="ad/ckeditor/ckeditor.js"></script>
@endsection