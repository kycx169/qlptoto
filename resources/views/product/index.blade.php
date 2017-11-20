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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary" style="height: 500px">
                        <div class="box-header with-border">
                            <h3 class="box-title">Danh sách sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <table id="example" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Ảnh minh họa</th>
                                <th>Tình trạng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($product as $p)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->number}}</td>
                                <td>{{$p->dongia}}</td>
                                <td><img src="./img/A.jpg" alt="" border=3 height=70 width=70></td>
                                <td><span class="label label-success">{{$p->status}}</span></td>
                                <td><i class="fa fa-forward"></i></td>
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