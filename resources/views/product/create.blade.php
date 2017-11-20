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
                <div class="col-md-12">
                    <button class="btn btn-success pull-right"><i class="fa fa-print" aria-hidden="true"></i> In Hóa Đơn</button>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary" style="height: 500px">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <form class="form-horizontal" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Tên sản phẩm:</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="" placeholder=" " name="product_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Loại sản phẩm:</label>
                                <div class="col-sm-5">
                                    <input type="" class="form-control" id="" placeholder="Loại sản phẩm" name="type">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Số lượng:</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" id="" placeholder=" " name="number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Ảnh minh họa:</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" id="" placeholder="" name="avatar">
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