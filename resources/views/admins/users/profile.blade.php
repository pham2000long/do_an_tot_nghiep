@extends('admins.layouts.main')

@section('content')
    <!-- Page Headings Start -->
    <div class="row justify-content-between align-items-center mb-10">

        <!-- Page Heading Start -->
        <div class="col-12 col-lg-auto mb-20">
            <div class="page-heading">
                <h3>Thông tin cá nhân</h3>
            </div>
        </div><!-- Page Heading End -->

    </div><!-- Page Headings End -->

    <div class="row mbn-50">

        <div class="col-12 mb-50">
            <div class="author-top">
                <div class="inner">
                    <div class="author-profile">
                        <div class="image">
                            <img src="{{ !empty($user->avatar) ? asset('images/avatars/'.$user->avatar) : asset('images/avatars/user.jpg') }}"
                                 class=""
                                 alt="{{ $user->name }}"
                            >
                        </div>
                        <div class="info">
                            <h5>{{ $user->name }}</h5>
                            <span>{{ $user->email }}</span>
                            <a href="#" class="edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
{{--                            <a href="" class="edit" data-toggle="modal" data-target="#exampleModal3"><i class="zmdi zmdi-edit"></i></a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Timeline / Activities Start-->
        <div class="col-xlg-8 col-12 mb-50">
            <div class="box">
                <div class="box-head">
                    <h3 class="title">Lịch sử mua hàng</h3>
                </div>

                <div class="box-body">
                    <div class="timeline-wrap row mbn-50">

                        <div class="col-12 mb-50"><span class="timeline-date">13 february 2018</span></div>

                        <div class="col-12 mb-50">
                            <ul class="timeline-list">

                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>
                                        <div class="content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id dolores, assumenda quaerat inventore atque dolore sapiente doloribus iusto quisquam ullam autem labore, laborum beatae repudiandae! Recusandae ullam cumque, non temporibus?</p>
                                        </div>
                                        <span class="time">5 min ago</span>
                                    </div>
                                </li>

                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>
                                        <div class="gallery">
                                            <div class="row mbn-30">

                                                <div class="col-md-4 col-sm-6 col-12 mb-30"><a href="#"><img src="assets/images/gallery/profile-gallery-1.jpg" alt=""></a></div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-30"><a href="#"><img src="assets/images/gallery/profile-gallery-2.jpg" alt=""></a></div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-30"><a href="#"><img src="assets/images/gallery/profile-gallery-3.jpg" alt=""></a></div>

                                            </div>
                                        </div>
                                        <span class="time">65 min ago</span>
                                    </div>
                                </li>

                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>
                                        <div class="video">
                                            <a href="#"><i class="zmdi zmdi-play"></i></a>
                                        </div>
                                        <span class="time">3 hour ago</span>
                                    </div>
                                </li>

                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>
                                        <div class="content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id dolores, assumenda quaerat inventore atque dolore sapiente doloribus iusto quisquam ullam autem labore, laborum beatae repudiandae! Recusandae ullam cumque, non temporibus?</p>
                                        </div>
                                        <span class="time">17 hour ago</span>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class="col-12 mb-50"><span class="timeline-date">12 february 2018</span></div>

                        <div class="col-12 mb-50">
                            <ul class="timeline-list">
                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>
                                        <div class="content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id dolores, assumenda quaerat inventore atque dolore sapiente doloribus iusto quisquam ullam autem labore, laborum beatae repudiandae! Recusandae ullam cumque, non temporibus?</p>
                                        </div>
                                        <span class="time">at 7pm</span>
                                    </div>
                                </li>

                                <li>
                                    <span class="icon"><i class="zmdi zmdi-receipt"></i></span>
                                    <div class="details">
                                        <h5 class="title"><a href="#">Create New Task for New Marketing</a></h5>
                                        <div class="gallery">
                                            <div class="row mbn-30">
                                                <div class="col-12 mb-30"><a href="#"><img src="assets/images/gallery/profile-gallery-4.jpg" alt=""></a></div>
                                            </div>
                                        </div>
                                        <span class="time">at 12:30pm</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Timeline / Activities End-->

        <!--Right Sidebar Start-->
        <div class="col-xlg-4 col-12 mb-50">
            <div class="row mbn-30">
                <div class="col-xlg-12 col-lg-6 col-12 mb-30">
                    <div class="box">
                        <div class="box-head">
                            <h3 class="title">Thông tin cơ bản</h3>
                        </div>
                        <div class="box-body">
                            <div class="form">
                                <form action="#" method="POST">
                                    <div class="row row-10 mbn-20">
                                        <div class="col-sm-6 col-12 mb-20">
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                        </div>
                                        <div class="col-sm-6 col-12 mb-20">
                                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" data-mask="(999) 999-9999">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <input type="email" disabled class="form-control" value="{{ $user->email }}">
                                        </div>
                                        <div class="col-sm-6 col-12 mb-20">
                                            <input type="password" name="password" class="form-control" value="">
                                        </div>
                                        <div class="col-sm-6 col-12 mb-20">
                                            <input type="password" name="re_password" class="form-control" value="">
                                        </div>
                                        <div class="col-12 mt-10 mb-20">
                                            <input type="submit" class="button button-primary button-outline" value="Cập nhật">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--Right Sidebar End-->

    </div>



@endsection
