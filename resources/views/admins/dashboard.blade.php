@extends('admins.layouts.main')

@section('content')
<!--HTML5 Video Start-->
<div class="col-md-12 col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h4 class="title">Chào mừng bạn đến với trang quản trị!</h4>
        </div>
        <div class="box-body">
            <video poster="{{ asset('backend/assets/images/bg/video-1-poster.jpg') }}" class="plyr-video" playsinline controls>
                <source src="{{ asset('backend/assets/media/video-1-576p.mp4') }}" type="video/mp4" data-res="576" />
                <source src="{{ asset('backend/assets/media/video-1-720p.mp4') }}" type="video/mp4" data-res="720" />
                <source src="{{ asset('backend/assets/media/video-1-1080p.mp4') }}" type="video/mp4" data-res="1080" />
            </video>
        </div>
    </div>
</div>
<!--HTML5 Video Start-->
@endsection
