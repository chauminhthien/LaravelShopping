@extends('admin.layout.index')

@section('title')
	Quản trị Website - Liên hệ
@endsection

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Liên Hệ
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Nội Dung</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lienhe as $lh)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$lh->id}}</td>
                                    <td>{{$lh->name}}</td>
                                    <td>{{$lh->email}}</td>
                                    <td>{{$lh->noiDung}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/lien-he/xoa/{{$lh->id}}"> Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection