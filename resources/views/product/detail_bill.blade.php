@extends('master')
@section('content')
<style type="text/css">
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
            Quản lý hóa đơn
            <!-- <small>Optional description</small> -->
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h1 class="box-title">Chi tiết hóa đơn</h1>
                    </div>
                    <!-- /.box-header -->
                    <table id="pdf" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Ngày tạo</th>
                            <th>Tên nhân viên</th>
                            <th>Tên khách hàng</th>
                            <th>Vị trí</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Mã sản phẩm</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=0;?>
                        @foreach($bill_detail as $p)
                        <tr>
                            <td style="width: 5px" >{{$i++}}</td>
                            <td style="text-transform: capitalize;">{{$p->product_name}}</td>
                            <td><img src="{{url($p->avatar)}}" alt="noimage" border=3 height=100 width=100></td>
                            <td>{{date('d-m-Y',strtotime($p->created_date))}}</td>
                            <td>{{$p->employee_name}}</td>
                            <td>{{$p->customer_name}}</td>
                            <td>{{$p->position}}</td>
                            <td>{{$p->number}}</td>
                            <td>{{number_format($p->dongia)}}</td>
                            <td>{{$p->masp}}</td>
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