@extends('master')
@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Xuất Hàng
            </h1>
            <ol class="breadcrumb">

            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-12">

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
                                <th>Hình sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá bán</th>
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
                                    {{--<td class="prod-hide"><span class="label label-{{$pro->status == 'Còn hàng' ? 'success' : 'danger' }}">{{$pro->status}}</span></td>--}}
                                    <td>{{$pro->dongia}}</td>
                                    <td>
                                        @if($pro->number>0)
                                             <a href="{{url(route('addToCart',$pro->id))}}" class="btn btn-success"><i class="fa fa-cart-plus"></i> Thêm sản phẩm</a>
                                        @else
                                             <span class="label label-danger">Hết hàng</span>
                                        @endif
                                    </td>
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
                                <th>Giá bán</th>
                                <th>Tổng tiền</th>
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
                                    <td>{{$prod['qty']}}</td>
                                    <td>{{$prod['item']->dongia}}</td>
                                    <td>{{$prod['price']}}</td>
                                    <td><a href="{{route('delCart',$prod['item']->id)}}"><span class="label label-warning">Hủy</span></a></td>
                                </tr>
                                @endforeach
                            @else
                                <td colspan="5">Chưa có sản phẩm nào</td>
                            @endif
                            </tbody>
                            @if(isset($totalPrice))
                                @if($totalPrice >0)
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right">Thành tiền: </td>
                                            <td>{{$totalPrice}}</td>
                                        </tr>
                                    </tfoot>
                                @endif
                            @endif
                        </table>
                        @if(isset($totalPrice))
                        <button class="btn btn-danger pull-right" style="color: #ffffff; margin-left: 10px"><a href="{{url(route('xoasession'))}}" aria-hidden="true">Hủy đơn hàng</a></button>
                        <button type="submit" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-print" aria-hidden="true"></i>Thanh toán</button>
                        @endif
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (right) -->
            </div>
        </section>
        <!-- /.content -->
        <div class="bill-contents" hidden>
            <div class="text-center">Hoá đơn</div>
            <p>Tên công ty</p>
            <p>Địa chỉ</p>
            <p>Số điện thoại</p><br>
            <p class="cus-name">Tên khách hàng: </p>
            Ngày giờ xuất kho: <span class="datetime"></span>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn vị tính</th>
                    <th>Giá bán</th>
                    <th>Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
                @if(Session::has('cart'))
                    <?php $i=0; ?>
                    @foreach($cartProducts as $prod)
                        <tr>
                            <td>{{$prod['item']->name}}</td>
                            <td>{{$prod['qty']}}</td>
                            <td>Chiếc</td>
                            <td>{{$prod['item']->dongia}}</td>
                            <td>{{$prod['price']}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <p>Thành tiền:
                @if(isset($totalPrice))
                    @if($totalPrice >0)
                        <span>{{$totalPrice}}</span>
                    @endif
                @endif
            </p>
            <p>Nhân viên xuất kho <br>
                <span style="margin-left: 10px">{{Session::get('name')}}</span>
            </p><br>
            <p style="margin-left: 15px">Xin cảm ơn</p>
        </div>

    </div>
    <!-- /.content-wrapper -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Điền thông tin</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-3">Tên khách hàng:</label>
                        <div class="col-sm-9">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="text" class="form-control" id="customername" placeholder="Tên khách hàng">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success print-bill">In hoá đơn</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

    </div>
</div>
<script type="text/javascript">
    // console.log(getdatetime());
    function getdatetime(){
        var d = new Date();
        var gio = d.getHours();
        var phut = d.getMinutes();
        var giay = d.getSeconds();
        var ngay = d.getDate();
        var thang = d.getMonth()+1;
        var nam = d.getFullYear();
        return gio+":"+phut+":"+giay+" "+ngay+"/"+thang+"/"+nam;
    }
    $(function () {
        var name = $('#customername').val();
        $('.print-bill').click(function () {
            $('#myModal').modal('hide');
            var name = $('#customername').val();
            var time = getdatetime();
            $('.cus-name').append(name);
            $('.datetime').append(time);
            var contents = $(".bill-contents").html();
            var frame1 = $('<iframe />');
            frame1[0].name = "frame1";
            frame1.css({ "position": "absolute", "top": "-1000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            //Create a new HTML document.
            frameDoc.document.write('<html><head><title></title>');
            frameDoc.document.write('</head><body>');
            //Append the external CSS file.
            frameDoc.document.write('<link href="{{url('css/print_style.css')}}" rel="stylesheet" type="text/css" />');
            //Append the DIV contents.
            frameDoc.document.write(contents);
            frameDoc.document.write('</body></html>');
            frameDoc.document.close();
            setTimeout(function () {
                window.frames["frame1"].focus();
                window.frames["frame1"].print();
                frame1.remove();
                $.ajax({
                    url:'bill?name='+name+'&time='+time,
                    success:function(data){
                        window.location.reload();
                    }
                });
            }, 500);
        });
    });
</script>
@endsection