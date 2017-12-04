<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url(Session::get('avatar'))}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Session::get('name')}}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>



            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Chức năng</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="{{route('product-import')}}"><i class="fa fa-shopping-basket"></i> <span>Nhập hàng</span></a></li>
                <li><a href="{{route('product-release')}}"><i class="fa fa-shopping-cart"></i> <span>Xuất hàng</span></a></li>
                {{--<li><a href="{{route('product-index')}}"><i class="fa fa-truck"></i> <span>Quản lý kho hàng</span></a></li>--}}
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Quản lý kho hàng</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('product-index')}}">Quản lý sản phẩm</a></li>
                        <li><a href="{{url(route('index'))}}">Quản lý loại sản phẩm</a></li>
                        <li><a href="{{url(route('xuat_nhap_ton'))}}">Quản lý xuất-nhập-tồn</a></li>
                    </ul>
                </li>
                <li class="hide-nhanvien"><a href="{{url(route('qlnv'))}}"><i class="fa fa-user"></i> <span>Quản lý nhân viên</span></a></li>
                <li class="hide-nhanvien"><a href="{{url(route('getListBill'))}}"><i class="fa fa-address-card"></i> <span>Danh sách hóa đơn</span></a></li>
                {{--<li class="hide-nhanvien"><a href="{{url(route('index'))}}"><i class="fa fa-product-hunt"></i> <span>Danh sách loại hàng</span></a></li>--}}
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>