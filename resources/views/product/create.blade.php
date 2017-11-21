@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Nhập Hàng
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary" style="height: 500px">
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
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Tên sản phẩm:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="" placeholder=" " name="product_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Loại sản phẩm:</label>
                                <select name="type" required>
                                    <option value=" " selected>---Chọn---</option>
                                @foreach($product_type as $pt)
                                        <option>{{$pt->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Số lượng:</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" id="" placeholder=" " name="number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Ảnh sản phẩm:</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" accept="image/*" name="avatar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Đơn giá:</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" id="" placeholder="VNĐ" name="dongia">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Submit</button>
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