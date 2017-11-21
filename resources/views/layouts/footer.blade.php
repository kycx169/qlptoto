<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{url('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{url('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{url('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{url('js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('js/buttons.flash.min.js')}}"></script>
<script src="{{url('js/jszip.min.js')}}"></script>
<script src="{{url('js/buttons.html5.min.js')}}"></script>
<script src="{{url('js/buttons.print.min.js')}}"></script>
<script src="{{url('js/pdfmake.min.js')}}"></script>
<script src="{{url('js/vfs_fonts.js')}}"></script>

<!-- SlimScroll -->
<script src="{{url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable();
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excel',
                    title: 'Thống kê sản phẩm',
                    exportOptions: {
                        columns: [ 0, 1 ]
                    }
                },
                {
                    extend: 'print',
                    title: 'Thống kê sản phẩm',
                    exportOptions: {
                        columns: [ 0, 1 ]
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Thống kê sản phẩm',
                    exportOptions: {
                        columns: [ 0, 1 ]
                    }
                }
            ]
        });
        $('#pdf').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                extend: 'excel',
                title: 'Thống kê sản phẩm',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 5 ]
                }
                },
                {
                extend: 'print',
                title: 'Thống kê sản phẩm',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 5 ]
                }
                },
                {
                extend: 'pdf',
                title: 'Thống kê sản phẩm',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 5 ]
                }
                }
            ]
        } );
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
        })
    })
</script>
<script type="text/javascript">
        setTimeout(function(){ $(".thongbao").hide(); }, 3000);
</script>
</body>
</html>