@extends('site.layouts.master')
@section('title')
    {{ $blog_title }}
@endsection
@section('description')
    {{ strip_tags($blog->intro) }}
@endsection
@section('image')
    {{ $blog->image->path }}
@endsection

@section('css')
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="page-header dtable text-center header-transparent">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">{{ $blog_title }}</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li><a href="javascript:void(0)">Blog</a></li>
                        <li class="active">{{ $blog_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="content-area col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <article class="blog-post post-box">
                        <div class="entry-media post-cat-abs">
                            <img src="{{ $blog->image->path ?? '' }}" alt="">
                            <div class="post-cat">
                                <div class="posted-in"><a href="#">{{ $blog->category->name ?? '' }}</a></div>
                            </div>
                        </div>
                        <div class="inner-post">
                            <div class="entry-summary the-excerpt">
                                {!! $blog->body !!}
                            </div>
                            <div class="entry-footer clearfix">
                                <div class="share-post">
                                    <a class="twit" target="_blank" href="javascript:void(0)" title="Twitter"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="face" target="_blank" href="javascript:void(0)" title="Facebook"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="pint" target="_blank" href="javascript:void(0)" title="Pinterest"><i
                                            class="fab fa-pinterest-p"></i></a>
                                    <a class="linked" target="_blank" href="javascript:void(0)" title="LinkedIn"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            @if ($other_blogs->count() > 0)
                                <div class="related-posts">
                                    <h3>Related Posts</h3>
                                    <div class="row">
                                        @foreach ($other_blogs as $item)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="post-box post-item">
                                                    <div class="post-inner">
                                                        <div class="entry-media post-cat-abs">
                                                            <a href="{{ route('front.detail-blog', $item->slug) }}"><img
                                                                    src="{{ $item->image->path ?? '' }}" alt=""></a>
                                                            <div class="post-cat">
                                                                <div class="posted-in"><a
                                                                        href="#">{{ $item->category->name ?? '' }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="inner-post">
                                                            <div class="entry-header">
                                                                <div class="entry-meta">
                                                                    <span class="posted-on"><a
                                                                            href="#">{{ $item->created_at->format('M d, Y') }}</a></span>
                                                                    <span class="byline">
                                                                        <span class="author vcard"><a class="url fn n"
                                                                                href="#">By Admin</a></span>
                                                                    </span>
                                                                </div>
                                                                <!-- .entry-meta -->
                                                                <h5 class="entry-title">
                                                                    <a class="title-link"
                                                                        href="{{ route('front.detail-blog', $item->slug) }}">{{ $item->name }}</a>
                                                                </h5>
                                                            </div>
                                                            <!-- .entry-header -->
                                                            <div class="the-excerpt">
                                                                {!! $item->intro !!}
                                                            </div>
                                                            <!-- .entry-content -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </article>
                </div>
                <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <aside id="search-2" class="widget widget_search">
                        <form role="search" method="get" id="search-form" class="search-form">
                            <input type="search" class="search-field" placeholder="Search…" value="" name="s">
                            <button type="submit" class="search-submit"><i class="ot-flaticon-search"></i></button>
                        </form>
                    </aside>
                    <aside class="widget widget_recent_news">
                        <h6 class="widget-title">Recent Posts</h6>
                        <ul class="recent-news clearfix">
                            @foreach ($newBlogs as $item)
                                <li class="clearfix">
                                    <div class="thumb">
                                        <a href="{{ route('front.detail-blog', $item->slug) }}"><img
                                                src="{{ $item->image->path ?? '' }}" alt=""></a>
                                    </div>
                                    <div class="entry-header">
                                        <h6><a href="{{ route('front.detail-blog', $item->slug) }}">{{ $item->name }}</a></h6>
                                        <span class="post-on"><span class="entry-date">{{ $item->created_at->format('M d, Y') }}</span></span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="widget widget_media_image text-center">
                        <a href="contact.html"><img src="images/widget-banner.jpg" alt=""></a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
