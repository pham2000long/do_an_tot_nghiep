@include('admins.layouts.header')
@include('admins.layouts.slider')
<!-- Content Body Start -->
<div class="content-body">
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">
        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3 class="title">{{ isset($title) ? $title : '' }}</h3>
            </div>
        </div><!-- Page Heading End -->
        @include('admins.layouts.alert')
    </div><!-- Page Headings End -->
    @yield('content')
</div>
@include('admins.layouts.footer')
