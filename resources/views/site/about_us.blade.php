@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="page-header dtable text-center header-transparent pheader-about">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">About Us</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="about-company">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 align-self-center text-center mb-5 mb-lg-0">
                    <div class="about-img">
                        <img src="{{ $about->image->path ?? '' }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 align-self-center">
                    <div class="about-detail">
                        <div class="ot-heading is-dots">
                            <span>[ about company ]</span>
                            <h2 class="main-heading">{{ $title }}</h2>
                        </div>
                        <p>{!! $content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-it-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 mb-5 mb-lg-0 align-self-center">
                    <div class="work-content">
                        <div class="ot-heading is-dots">
                            <span>[ our process ]</span>
                            <h2 class="main-heading">We are a team of professionals</h2>
                        </div>
                        <div class="ot-accordions">
                            {!! $about->production_process_content !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="work-img">
                        <img src="{{ $about->galleries[0]->image->path ?? '' }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-testi" id="catalogue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center theratio-align-center">
                    <div class="ot-heading is-dots">
                        <span>[ catalogue ]</span>
                        <h2 class="main-heading">Can See Our Catalogue</h2>
                    </div>
                </div>
                <div class="col-lg-12 iframe-catalog">
                    {{-- <div class="ot-testimonials v-light">
                        <div id="flipbook">
                            <div class="page">Trang 1</div>
                            <div class="page">Trang 2</div>
                            <div class="page">Trang 3</div>
                            <div class="page">Trang 4</div>
                        </div>
                        <style>
                            #flipbook {
                                width: 800px;
                                height: 500px;
                                margin: auto;
                            }

                            #flipbook .page {
                                width: 400px;
                                height: 500px;
                                background-color: white;
                                border: 1px solid #ccc;
                                background-size: cover;
                                background-position: center;
                            }
                        </style>
                    </div> --}}
                    <a href="https://9ca80976-trial.flowpaper.com/CATALOGVINATT2025review/#PreviewMode=Miniature" class="fp-embed" data-fp-width="100%" data-fp-height="100%" style="max-width: 100%"></a>
                    <script async defer src="https://cdn-online.flowpaper.com/zine/3.8.5/js/embed.min.js"></script>
                </div>
            </div>
            <style>
                .iframe-catalog {
                    height: 500px;
                }
            </style>
        </div>
    </section>
@endsection

@push('script')
@endpush
