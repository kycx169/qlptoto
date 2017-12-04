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
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sửa sản phẩm</h3>
                        </div>
                        <!-- form start -->
			            <form action="{{ url(route('editProduct',$product->id)) }}" enctype="multipart/form-data" method="POST">
		            	{{ csrf_field() }}
			              <div class="box-body">
			                <div class="form-group">
			                  <label>Tên sản phẩm: </label>
			                  <input type="text" class="form-control" id="user" value="{{$product->name}}" name="name" required>
                              <label class="err1 label label-danger"></label>
			                </div>
			                <div class="form-group">
			                  <label>Mã sản phẩm: </label>
			                  <input type="text" class="form-control" value="{{$product->masp}}" name="masp" required>
                              <label class="err1 label label-danger"></label>
			                </div>
			                <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Giá nhập: </label>
                                    <div class="col-md-6">
                                    <input type="number" class="form-control" id="user" value="{{$product->gianhap}}" name="gianhap" required>
                                    </div>
                                    <div class="col-md-3">
                                        <span> VNĐ</span>
                                    </div>
                                </div>
                              <label class="err1 label label-danger"></label>
			                </div>
                              <div class="form-group">
                                <div class="row">
                                    <label class="col-md-3">Giá bán: </label>
                                    <div class="col-md-6">
                                    <input type="number" class="form-control" id="user" value="{{$product->dongia}}" name="dongia" required>
                                    </div>
                                    <div class="col-md-3">
                                        <span> VNĐ</span>
                                    </div>
                                </div>
                              <label class="err1 label label-danger"></label>
			                </div>

                              <img id="imgloaded" src="{{url($product->avatar)}}" style="width: 100px; height: 100px;">
                              <div class="form-group">
                                  <label>Chọn hình ảnh mới: </label>
                                  <input style="width: 70%" type="file" id="exampleInputFile" name="avatar" accept="image/*" >
                              </div>
			                {{--<div class="form-group">--}}
                              {{--<label>Trạng thái: </label>--}}
                              {{--<input type="text" class="form-control" id="user" value="{{$product->status}}" name="status" readonly>--}}
                              {{--<label class="err1 label label-danger"></label>--}}
                          {{--</div>--}}
			              </div>
			              <!-- /.box-body -->

			              <div class="box-footer">
			                <button type="submit" class="btn btn-primary">Hoàn thành</button>
			              </div>
			            </form>
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