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
                Quản lý loại sản phẩm
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
                    <a class="btn btn-primary pull-right" href="{{url(route('addType'))}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="row">
                            <div class="box-header with-border col-md-6">
                                <h3 class="box-title"><a href="{{route('product-index')}}">Danh sách sản phẩm</a></h3>
                            </div>
                            <div class="box-header with-border col-md-6">
                                <h3 class="box-title">Danh sách loại sản  phẩm</h3>
                            </div>

                        </div>
                        @if(session('thongbao'))
                            <div class="alert alert-success thongbao"> 
	                           {{session('thongbao')}}
                            </div>
	                    @endif
                        <!-- /.box-header -->
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên loại sản phẩm</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                        	<?php $i=0;?>
                        	@foreach($types as $type)
                            <tr>
                                <td>{{++$i}}</td>
                                <td class="pull-left">{{$type->name}}</td>
                                <td>
                                	<a href="{{url(route('updateType',$type->id))}}"><span class="label label-warning">Sửa</span> </a>|
                                	<a href="{{url(route('deleteType',$type->id))}}" onclick="return confirm('Bạn chắc chắn muốn xóa bản ghi này?')"><span class="label label-danger"> Xóa</span></a>
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