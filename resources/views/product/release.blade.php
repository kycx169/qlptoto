@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Nhập Hàng
            </h1>
            <ol class="breadcrumb">

            </ol>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary" style="height: 500px ;width: 600px">
                        <div class="box-header with-border">
                            <a href="{{route('product-add')}}"><h3 class="box-title">Thêm sản phẩm</h3></a>
                        </div>
                        <!-- /.box-header -->
                        <form class="form-horizontal">

                            <div class="form-group product">
                                <label class="control-label col-sm-2" >Tên nhân viên:</label>
                                <div class="col-sm-5">
                                        <input style="width: 230px" required    >
                                </div>
                                <div class="col-md-5">
                                    <label>Ngày lập</label>
                                    <input  name="number" value="{{date('d/m/Y')}}" readonly>
                                </div>
                            </div>
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