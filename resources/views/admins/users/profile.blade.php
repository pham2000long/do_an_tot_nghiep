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

        <!--Author Top Start-->
        <div class="col-12 mb-50">
            <div class="author-top">
                <div class="inner">
                    <div class="author-profile">
                        <div class="image">
                            @if (Auth::user()->avatar)
                                <img src="{{ asset('images/avatars/' . Auth::user()->avatar) }}" class="" alt="">
                            @else
                                <img src="{{ asset('images/avatars/user.jpg') }}" class="" alt="">
                            @endif
                        </div>
                        <div class="info">
                            <h5>{{ Auth::user()->name }}</h5>
                            <a href="" class="edit" data-toggle="modal" data-target="#exampleModal3"><i class="zmdi zmdi-edit"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Author Top End-->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal3">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sửa thông tin cá nhân</h5>
                    <button class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!--Author Information Start-->
                    <div class="col-xlg-12 col-lg-6 col-12 mb-30">
                        <div class="box">
                            {{-- <div class="box-head">
                                <h3 class="title">Author Information</h3>
                            </div> --}}
                            <div class="box-body">
                                <div class="form">
                                    <form action="#">
                                        <div class="row row-10 mbn-20">
                                            <div class="col-sm-6 col-12 mb-20"><input type="text" class="form-control" value="Madison"></div>
                                            <div class="col-sm-6 col-12 mb-20"><input type="text" class="form-control" value="Howard"></div>
                                            <div class="col-sm-6 col-12 mb-20"><input type="text" class="form-control input-date-single" value="02/13/2018"></div>
                                            <div class="col-sm-6 col-12 mb-20"><input type="text" class="form-control" value="(012) 345-6789" data-mask="(999) 999-9999"></div>
                                            <div class="col-12 mb-20"><input type="email" class="form-control" value="domain@mail.com"></div>
                                            <div class="col-12 mb-20"><input type="text" class="form-control" value="https//: www.domain.com"></div>
                                            <div class="col-sm-6 col-12 mb-20"><input type="password" class="form-control" value="password"></div>
                                            <div class="col-sm-6 col-12 mb-20"><input type="password" class="form-control" value="password"></div>
                                            <div class="col-12 mt-10 mb-20">
                                                <input type="submit" class="button button-primary button-outline" value="Save Changes">
                                                <input type="submit" class="button button-danger button-outline" value="Delete Changes">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--Author Information End-->
                </div>
                <div class="modal-footer">
                    <button class="button button-danger" data-dismiss="modal">Close</button>
                    {{-- <button class="button button-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
