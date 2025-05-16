@extends('site.layouts.master')
@section('title')
    Video Gallery
@endsection
@section('description')
    Video Gallery
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
<style>
    .about-company .projects-grid .projects-box .projects-thumbnail .vid-icon {
        transform: translate(-100%, -50%);
    }
</style>
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="page-header dtable text-center header-transparent pheader-about">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">Video Gallery</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li class="active">Video Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="about-company">
        <div class="container">
            <div class="row projects-grid">
                @foreach ($videos as $video)
                    <div class="col-lg-4 col-md-12 align-self-center text-center mb-5 mb-lg-0">
                        <div class="project-items category-19 ">
                            <div class="projects-box">
                                <div class="projects-thumbnail">
                                    <a href="{{ $video->message }}" class="popup-youtube">
                                        <img src="{{ $video->image->path ?? '' }}" alt="">
                                    </a>
                                    <div class="overlay">
                                        <h5>{{ $video->name }}</h5>
                                        <i class="ot-flaticon-add"></i>
                                    </div>
                                    <div class="vid-icon">
                                        <a class="play-button vid popup-youtube" href="{{ $video->message }}">
                                            <svg class="circle-fill">
                                                <circle cx="43" cy="43" r="39" stroke="#fff"
                                                    stroke-width=".5"></circle>
                                            </svg>
                                            <svg class="circle-track">
                                                <circle cx="43" cy="43" r="39" stroke="none" stroke-width="1"
                                                    fill="none"></circle>
                                            </svg> <span class="polygon">
                                                <i class="ti-control-play"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="portfolio-info">
                                    <div class="portfolio-info-inner">
                                        <h5><a class="title-link popup-youtube"
                                                href="{{ $video->message }}">{{ $video->name }}</a>
                                        </h5>
                                    </div>
                                    <a class="overlay popup-youtube" href="{{ $video->message }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        $('.popup-youtube').magnificPopup({
            type: 'iframe'
        });
    });
</script>
@endpush
