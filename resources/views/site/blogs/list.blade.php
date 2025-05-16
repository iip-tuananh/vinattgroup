@extends('site.layouts.master')
@section('title')
    {{ $cate_title }}
@endsection
@section('description')
    {{ $cate_des ?? '' }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" media="screen" href="/site/css/home.css?v=1.74" />
    <style>
        .text-limit-3-line {
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="page-header dtable text-center header-transparent">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">{{ $cate_title }}</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li class="active">{{ $cate_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="entry-content">
        <div class="container">
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="post-box masonry-post post-item">
                            <div class="post-inner">
                                <div class="entry-media post-cat-abs">
                                    <a href="{{ route('front.detail-blog', $blog->slug) }}"><img
                                            src="{{ $blog->image->path ?? '' }}" alt=""></a>
                                    <div class="post-cat">
                                        <div class="posted-in"><a href="#">{{ $blog->category->name }}</a></div>
                                    </div>
                                </div>
                                <div class="inner-post">
                                    <div class="entry-header">
                                        <div class="entry-meta">
                                            <span class="posted-on"><a
                                                    href="#">{{ $blog->created_at->format('M d, Y') }}</a></span>
                                            <span class="byline">
                                                <span class="author vcard"><a class="url fn n" href="#">By
                                                        Admin</a></span>
                                            </span>
                                        </div>
                                        <!-- .entry-meta -->
                                        <h5 class="entry-title">
                                            <a class="title-link"
                                                href="{{ route('front.detail-blog', $blog->slug) }}">{{ $blog->name }}</a>
                                        </h5>
                                    </div>
                                    <!-- .entry-header -->
                                    <div class="the-excerpt">
                                        {!! $blog->intro !!}
                                    </div>
                                    <!-- .entry-content -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <ul class="page-pagination none-style">
                    {{ $blogs->links() }}
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
