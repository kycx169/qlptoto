<style>
    .box-body {
        /*border-left-width: 45px !important;*/
        padding-left: 32px !important;
        padding-top: 30px !important;
    }
</style>
@extends('master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Nhập Hàng
            </h1>
        </section>
        <!-- Main content -->
        <section class="content container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('product-add')}}"><h4 class=""><span>Thêm sản phẩm</span></h4></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Horizontal Form -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Danh sách nhập hàng</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <form class="form-horizontal" id="">
                                      <div class="box-body">
                                          <div class="form-group">
                                              <label>Người nhập:</label>
                                              <input type="text" style="width: 30%" class="form-control text-center"  value="{{Session::get('name')}}" name="user-name" readonly>
                                          </div>
                                          <div class="form-group">
                                                  <label>Số lượng</label>
                                                  <input type="number" name="number" required>
                                          </div>
                                          <div class="form-group">
                                              <label>Tên sản phẩm:</label>
                                                  <select name="product_id" class="form-control" style="text-transform: capitalize;">
                                                      @foreach($all_product as $item)
                                                          <option value="{{$item->id}}">{{$item->name}}</option>
                                                      @endforeach
                                                  </select>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-sm-offset-2 col-sm-10">
                                                  <button type="submit" class="btn btn-default">Xác nhận</button>
                                              </div>
                                          </div>
                                      </div>
                                    </form>
                                </div>
                                <!-- /.box -->
                            </div>
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="box box-primary" style="height: 500px">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Danh sách sản phẩm</h3>
                                    </div>
                                    @if(session('loi'))
                                        <div class="alert alert-danger thongbao">
                                            {{session('loi')}}
                                        </div>
                                @endif
                                <!-- /.box-header -->
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình sản phẩm</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá nhập</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=0; ?>
                                        @foreach($all_product as $pro)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td><img src="{{url($pro->avatar)}}" alt="anh san pham" width="50px" height="50px"></td>
                                                <td style="text-transform: capitalize;">{{$pro->name}}</td>
                                                <td>{{$pro->number}}</td>
                                                {{--<td class="prod-hide"><span class="label label-{{$pro->status == 'Còn hàng' ? 'success' : 'danger' }}">{{$pro->status}}</span></td>--}}
                                                <td>{{$pro->gianhap}}</td>
                                                <td><span class="label label-{{$pro->status == 'Còn hàng' ? 'success' : 'danger' }}">{{$pro->status}}</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
