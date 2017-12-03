@extends('master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý kho hàng
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
                    <a class="btn btn-primary pull-right" href="{{url(route('product-add'))}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm</a>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        {{--<div class="row">--}}
                            {{--<div class="box-header with-border col-md-6">--}}
                                <h3 class="box-title">Danh sách sản phẩm</h3>
                            {{--</div>--}}
                            {{--<div class="box-header with-border col-md-6">--}}
                                {{--<h3 class="box-title"><a href="{{route('index')}}">Danh sách loại sản phẩm</a></h3>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        @if(session('thongbao'))
                            <div class="alert alert-success thongbao">
                                {{session('thongbao')}}
                            </div>
                         @endif
                        <!-- /.box-header -->
                        <table id="pdf" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 5px" >STT</th>
                                <th>Mã sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng hàng xuất</th>
                                <th>Số lượng hàng nhập</th>
                                <th>Số lượng hàng tồn</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($product as $p)
                            <tr>
                                <td style="width: 5px" >{{$i++}}</td>
                                <td>{{$p->masp}}</td>
                                <td><img src="{{url($p->avatar)}}" alt="noimage" border=3 height=100 width=100></td>
                                <td style="text-transform: capitalize;">{{$p->name}}</td>
                                <td>{{$p->sohangxuat}}</td>
								<td>{{$p->sohangnhap}}</td>
								<td>{{$p->number}}</td>
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