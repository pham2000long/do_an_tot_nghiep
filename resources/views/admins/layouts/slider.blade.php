<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}"><i class="ti-home"></i> <span>Trang quản lý</span></a></li>
                <li><a href="{{ route('statistic.index') }}"><i class="fa fa-area-chart"></i> <span>Thống kê</span></a></li>
                <li><a href="{{ route('slides.index') }}"><i class="fa fa-file-image-o"></i> <span>Slides</span></a></li>
                <li><a href="{{ route('categories.index') }}"><i class="zmdi zmdi-assignment"></i> <span>Danh mục sản phẩm</span></a></li>
                <li><a href="{{ route('productTypes.index') }}"><i class="ti-package"></i> <span>Loại sản phẩm</span></a></li>
                <li><a href="{{ route('suppliers.index') }}"><i class="ti-truck"></i> <span>Nhà cung cấp</span></a></li>
                <li class="has-sub-menu"><a href="{{ route('products.index') }}"><i class="fa fa-archive"></i> <span>Sản phẩm</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="{{ route('products.index') }}"><span>Danh sách sản phẩm</span></a></li>
                        <li><a href="{{ route('products.inventory') }}"><span>Tồn kho</span></a></li>
                    </ul>
                </li>
                <li><a href="{{ route('promotions.index') }}"><i class="fa fa-bullhorn"></i> <span>Khuyến mãi</span></a></li>
                <li><a href="{{ route('orders.index') }}"><i class="fa fa-cart-plus"></i> <span>Quản lý đơn hàng</span></a></li>
                <li><a href="{{ route('users.index') }}"><i class="fa fa-user-o"></i> <span>Quản lý tài khoản</span></a></li>
            </ul>
        </nav>
    </div><!-- Side Header Inner End -->
</div><!-- Side Header End -->
