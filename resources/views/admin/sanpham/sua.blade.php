@extends('admin.layout.index')

@section('title')
	Sửa sản phẩm {{$product->name}} - Quản trị Website
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản Phẩm
                            <small>Sửa: {{$product->name}}</small>
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
                        <form action="admin/san-pham/{{$product->id}}/sua-san-pham.html" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label>Tên Sản Phẩm</label>
                                <input class="form-control" name="name" value="{{$product->name}}" placeholder="Nhập Tên Sản Phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" name="id_cate">
                                    @foreach($cate as $ca)
                                        @if($ca->paren_id != 0)
                                            <option 
                                            @if($product->id_cate == $ca->id)
                                                selected="selected" 
                                            @endif
                                            value="{{$ca->id}}">{{$ca->name}}</option>
                                        @endif    
                                    @endforeach
                                  
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Giá Sản Phẩm</label>
                                <input type="number" min="0" value="{{$product->gia}}" class="form-control" name="gia" placeholder="Nhập giá Sản Phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Chi Tiết Sản Phẩm</label>
                                <textarea  class="form-control ckeditor" name="chiTiet" rows="3">{{$product->chiTiet}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Sản Phẩm</label>
                                <input type="file" min="0" class="form-control" name="hinh"  />
                                <img src="upload/product/{{$product->hinh}}" width="200px" height="100px">
                            </div>
                            <input type="hidden" value="{{csrf_token()}}" name="_token">
                            <button type="submit" class="btn btn-default">Sửa Sản Phẩm</button>
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