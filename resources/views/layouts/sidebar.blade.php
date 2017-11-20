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
                <li><a href="{{route('product-index')}}"><i class="fa fa-truck"></i> <span>Quản lý kho hàng</span></a></li>
                <li><a href="{{url(route('qlnv'))}}"><i class="fa fa-user"></i> <span>Quản lý nhân viên</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>