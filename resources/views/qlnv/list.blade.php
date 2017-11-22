@extends('master')
@section('content')
<style type="text/css">
	.table td:nth-child(2) {
		vertical-align: middle;
		text-align: center;
	}
	.table td {
		vertical-align: middle;
	}
	.table a span {
		font-size: 12px;
	}
</style>
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý nhân viên
                <!-- <small>Optional description</small> -->
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-primary pull-right" href="{{url(route('addUser'))}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách nhân viên</h3>
                        </div>
                        @if(session('thongbao'))
                            <div class="alert alert-success thongbao"> 
	                           {{session('thongbao')}}
                            </div>
	                    @endif
                        <!-- /.box-header -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên đăng nhập</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Vai trò</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        	<?php $i=0;?>
                        	@foreach($users as $user)
                            <tr>
                                <td>{{++$i}}</td>
                                <td><img src="{{url($user->avatar)}}" alt="avatar" class="img-circle" height="34px" width="34px"></td>
                                <td>{{$user->user}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->birth_day}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{($user->role) ==1 ? "Quản trị viên" : "Nhân viên"}}</td>
                                <td>
                                	<a href="{{url(route('modifyUser',$user->id))}}"><span class="label label-warning">Sửa</span> </a>|
                                	<a href="{{url(route('deleteUser',$user->id))}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này?')"><span class="label label-danger"> Xóa</span></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection