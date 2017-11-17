@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Xuất hàng
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
                    <button class="btn btn-success pull-right"><i class="fa fa-print" aria-hidden="true"></i> In Hóa Đơn</button>
                </div>
            </div>
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary" style="height: 500px">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tình trạng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Lốp xe</td>
                                <td>20</td>
                                <td><span class="label label-success">Còn hàng</span></td>
                                <td><i class="fa fa-forward"></i></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Lốp xe</td>
                                <td>20</td>
                                <td><span class="label label-success">Còn hàng</span></td>
                                <td><i class="fa fa-forward"></i></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Lốp xe</td>
                                <td>20</td>
                                <td><span class="label label-danger">Hết hàng</span></td>
                                <td><i class="fa fa-forward"></i></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Lốp xe</td>
                                <td>20</td>
                                <td><span class="label label-success">Còn hàng</span></td>
                                <td><i class="fa fa-forward"></i></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Lốp xe</td>
                                <td>20</td>
                                <td><span class="label label-danger">Hết hàng</span></td>
                                <td><i class="fa fa-forward"></i></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Horizontal Form -->
                    <div class="box box-info" style="height: 500px">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách xuất hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <table id="example2" class="table table-bordered table-striped" style="padding-top: 33px">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Lốp xe</td>
                                <td><input type="number" name="quality" value="0" min="0"></td>
                                <td><span class="label label-warning">Hủy</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Lốp xe</td>
                                <td><input type="number" name="quality" value="0" min="0"></td>
                                <td><span class="label label-warning">Hủy</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Lốp xe</td>
                                <td><input type="number" name="quality" value="0" min="0"></td>
                                <td><span class="label label-warning">Hủy</span></td>
                            </tr>
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection