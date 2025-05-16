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
        <div class="page-header dtable text-center header-transparent pheader-service-detail1">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">{{ $title }}</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li><a href="javascript:void(0)">Our Services</a></li>
                        <li class="active">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="services-single">
        <div class="container">
            <div class="row">
                <div class="widget-area col-lg-3 col-md-12">
                    <div class="widget widget_nav_menu">
                        <ul class="services-menu">
                            @foreach ($services as $key => $item)
                                <li class="{{ $item->slug == $service->slug ? 'current-menu-item' : '' }}"><a href="{{ route('front.service-detail', $item->slug) }}"><span>{{ $key + 1 }}.</span> {{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="services-detail-content">
                        <div class="ot-heading ">
                            <span>[ our services ]</span>
                            <h2 class="main-heading">{{ $service->name }}</h2>
                        </div>
                        <p>{!! $service->description !!}</p>
                        <div>
                            {!! $service->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
@endpush
