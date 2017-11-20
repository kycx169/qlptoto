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
                            <a href="{{route('product-create')}}"><h3 class="box-title">Thêm sản phẩm</h3></a>
                        </div>
                        <!-- /.box-header -->
                        <form class="form-horizontal">
                            <div class="form-group product">
                                <label class="control-label col-sm-2" >Tên sản phẩm:</label>
                                <div class="col-sm-5">
                                    {{--<input type="text" class="form-control" id="" placeholder=" " name="product_name">--}}
                                    <select name="product_id" class="form-control">
                                        @foreach($all_product as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label>Số lượng</label>
                                    <input type="number" name="number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn add-row" id="" style="margin-left: 150px"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
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