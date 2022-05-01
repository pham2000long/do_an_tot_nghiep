@extends('admins.layouts.main')

@section('content')
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Author Profile</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-50">

        <!--Author Top Start-->
        <div class="col-12 mb-50">
            <div class="author-top">
                <div class="inner">
                    <div class="author-profile">
                        <div class="image">
                            <img src="assets/images/avatar/profile.jpg" class="d-none" alt="">
                            <h2>MH</h2>
                            <button class="edit"><i class="zmdi zmdi-cloud-upload"></i>Change Image</button>
                        </div>
                        <div class="info">
                            <h5>Madison Howard</h5>
                            <span>UI UX Designer</span>
                            <a href="#" class="edit"><i class="zmdi zmdi-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Author Top End-->
    </div>
@endsection
