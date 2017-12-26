@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Quản lý kho hàng
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
                    <a class="btn btn-primary pull-right" href="{{url(route('index'))}}">Loại sản phẩm</a>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm sản phẩm</h3>
                        </div>
                        @if(session('loi'))
                            <div class="alert alert-danger thongbao">
                                {{session('loi')}}
                            </div>
                        @endif
                        <!-- /.box-header -->
                        {{--<form class="form-horizontal" action="{{ url(route('product-create')) }}" enctype="multipart/form-data" method="POST">--}}
                            <form action="{{ url(route('product-create')) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Tên sản phẩm:</label>
                                    <input type="text" class="form-control" id="" placeholder=" " name="product_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Mã sản phẩm:</label>
                                    <input type="text" class="form-control" id="" placeholder=" " name="product_code" required>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Loại sản phẩm: </label>
                                        <div class="col-md-6">
                                            <select name="type" required>
                                                @foreach($product_type as $pt)
                                                    <option>{{$pt->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh sản phẩm:</label>
                                    <input type="file" class="form-control" accept="image/*" name="avatar">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Giá nhập: </label>
                                        <div class="col-md-6">
                                            <input type="number" step="1000" min="1000" class="form-control" id="" placeholder="VNĐ" name="gianhap" required>
                                        </div>
                                        <div class="col-md-3">
                                            {{--<input readonly value="Đơn vị">--}}
                                            <span> VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Giá bán: </label>
                                        <div class="col-md-6">
                                            <input type="number" min="1000" class="form-control" id="" placeholder="VNĐ" name="dongia" required>
                                        </div>
                                        <div class="col-md-3">
                                            {{--<input readonly value="Đơn vị">--}}
                                            <span> VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default">Xác nhận</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection