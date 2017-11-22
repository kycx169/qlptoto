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
                                <?php $i=0; ?>
                            @foreach($all_product as $pro)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td hidden="true">{{$pro->id}}</td>
                                    <td>{{$pro->name}}</td>
                                    <td>{{$pro->number}}</td>
                                    <td class="prod-hide"><span class="label label-{{$pro->status == 'Còn hàng' ? 'success' : 'danger' }}">{{$pro->status}}</span></td>
                                    <td><i class="fa fa-forward sell"></i></td>
                                </tr>
                            @endforeach
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
                            <tbody class="prod">
                            {{-- <tr>
                                <td>1</td>
                                <td>{{}}</td>
                                <td><input type="number" name="quality" value="0" min="0"></td>
                                <td class="cancel"><span class="label label-warning">Hủy</span></td>
                            </tr>
                             --}}
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
    <script type="text/javascript">
        $('.sell').click(function(){
            var tr= $(this).parents().parents().parents().html();
            var index=tr.lastIndexOf('<td><i class="fa fa-forward sell"></i></td>');
            var new_tr=tr.slice(0,index)+'<td class="cancel"><span class="label label-warning">Hủy</span></td>';
            $('.prod').append(new_tr);
            $('.prod .prod-hide').hide();
            $('.cancel').click(function(){
               $(this).closest('.prod').removeChild();
            });
        });
       
    </script>
@endsection