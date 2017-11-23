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
                    <input type="button" id="btnPrint" value="Print" />
                    <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-print" aria-hidden="true"></i> In Hóa Đơn</button>
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
                                <th>Đơn giá</th>
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
                                             <a href="{{url(route('addToCart',$pro->id))}}" class="btn btn-success"><i class="fa fa-cart-plus"></i>  Thêm vào giỏ hàng</a>
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
                                <th>Đơn giá</th>
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
            Ngày giờ xuất kho: {{date('Y-m-d H:i:s')}}
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn vị tính</th>
                    <th>Đơn giá</th>
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
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var name = $('#customername').val();
        $('.print-bill').click(function () {
            $('#myModal').modal('hide');
            var name = $('#customername').val();
            $('.cus-name').append(name);
            var contents = $(".bill-contents").html();
            var frame1 = $('<iframe />');
            frame1[0].name = "frame1";
            frame1.css({ "position": "absolute", "top": "-1000000px" });
            $("body").append(frame1);
            var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
            frameDoc.document.open();
            //Create a new HTML document.
            frameDoc.document.write('<html><head><title>DIV Contents</title>');
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
            }, 500);
        });

        $.ajax({
            type: 'POST',
            url: "/bill?name="+name,
            data:'_token = <?php echo csrf_token() ?>',
            success: function(msg){
                alert('wow' + msg);
            }
        });
        {{--$("#btnPrint").click(function () {--}}
            {{--var contents = $(".bill-contents").html();--}}
            {{--var frame1 = $('<iframe />');--}}
            {{--frame1[0].name = "frame1";--}}
            {{--frame1.css({ "position": "absolute", "top": "-1000000px" });--}}
            {{--$("body").append(frame1);--}}
            {{--var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;--}}
            {{--frameDoc.document.open();--}}
            {{--//Create a new HTML document.--}}
            {{--frameDoc.document.write('<html><head><title>DIV Contents</title>');--}}
            {{--frameDoc.document.write('</head><body>');--}}
            {{--//Append the external CSS file.--}}
            {{--frameDoc.document.write('<link href="{{url('css/print_style.css')}}" rel="stylesheet" type="text/css" />');--}}
            {{--//Append the DIV contents.--}}
            {{--frameDoc.document.write(contents);--}}
            {{--frameDoc.document.write('</body></html>');--}}
            {{--frameDoc.document.close();--}}
            {{--setTimeout(function () {--}}
                {{--window.frames["frame1"].focus();--}}
                {{--window.frames["frame1"].print();--}}
                {{--frame1.remove();--}}
            {{--}, 500);--}}
        {{--});--}}
    });
</script>
@endsection