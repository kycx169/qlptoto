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
                <div class="col-md-8">
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
                                <th>Hình sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Tình trạng</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                            @foreach($all_product as $pro)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td><img src="{{url($pro->avatar)}}" alt="anh san pham" width="50px" height="50px"></td>
                                    <td>{{$pro->name}}</td>
                                    <td>{{$pro->number}}</td>
                                    <td class="prod-hide"><span class="label label-{{$pro->status == 'Còn hàng' ? 'success' : 'danger' }}">{{$pro->status}}</span></td>
                                    <td><a href="{{url(route('addToCart',$pro->id))}}" class="btn btn-success"><i class="fa fa-cart-plus"></i>  Thêm vào giỏ hàng</a></td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-4">
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
                                <th>Thành tiền</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Session::has('cart'))
                                <?php $i=0; ?>
                                @foreach($cartProducts as $prod)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$prod['item']->name}}</td>
                                    <td><input type="number" name="quality" value="{{$prod['qty']}}" min="0" disabled></td>
                                    <td>{{$prod['price']}}</td>
                                    <td><a href="{{route('delCart',$prod['item']->id)}}"><span class="label label-warning">Hủy</span></a></td>
                                </tr>
                                @endforeach
                            @else
                                <td colspan="5">Chưa có sản phẩm nào</td>
                            @endif
                            </tbody>
                            @if(isset($totalPrice))
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">Tổng tiền: </td>
                                    <td>{{$totalPrice}}</td>
                                </tr>
                            </tfoot>
                            @endif
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