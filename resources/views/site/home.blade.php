@extends('site.layouts.master')
@section('title')
    {{ $config->meta_title ?? $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path) }}
@endsection
@section('css')
    <style>
        .limit-3-lines {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
@endsection
@section('content')
    <div id="content" class="site-content">
        <div class="banner-3">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div id="rev_slider_one_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase"
                data-source="gallery">
                <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                <div id="rev_slider_3" class="rev_slider" style="display:none;" data-version="5.4.1">
                    <ul>
                        @foreach ($banners as $key => $banner)
                            <!-- SLIDE 1 -->
                            <li data-index="rs-7{{ $key }}" data-transition="fade" data-slotamount="default"
                                data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default"
                                data-easeout="default" data-masterspeed="300" data-thumb="{{ $banner->image->path ?? '' }}"
                                data-rotate="0" data-saveperformance="off" data-title="" data-param1="1" data-param2=""
                                data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                                data-param9="" data-param10="" data-description="">
                                <!-- LAYER 1  right image overlay dark-->
                                <img src="" data-bgcolor='transparent' style='' alt=""
                                    data-bgposition="50% 50%" data-bgfit="auto" data-bgrepeat="no-repeat"
                                    data-bgparallax="off" class="rev-slidebg" data-no-retina>
                                <!-- LAYER 2  Thin text title-->
                                <div class="tp-caption tp-resizeme" id="slide-7{{ $key }}-layer-1"
                                    data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']"
                                    data-y="['center','center','center','center']" data-voffset="['0','0','0','0']"
                                    data-width="['868',511','100%','606']" data-height="['860',506','auto','100%']"
                                    data-whitespace="normal" data-type="image" data-responsive_offset="on"
                                    data-frames='[{"delay":200,"speed":1200,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                    data-textAlign="['left','left','left','left']"><img
                                        src="{{ $banner->image->path ?? '' }}" alt=""
                                        style="width: 100% !important; height: 100% !important;">
                                </div>
                                <!-- LAYER 3  Thin text title-->
                                <div class="tp-caption tp-resizeme shape-home-3" id="slide-7{{ $key }}-layer-2"
                                    data-x="['left','left','left','left']" data-hoffset="['155','0','0','0']"
                                    data-y="['top','top','top','top']" data-voffset="['158','50','173','160']"
                                    data-width="['700',468','530','420']" data-height="['500',369','300','240']"
                                    data-whitespace="normal" data-type="shape" data-responsive_offset="on"
                                    data-frames='[{"delay":300,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]'
                                    data-textAlign="['left','left','left','left']">
                                </div>
                                <div class="tp-caption tp-resizeme" id="slide-7{{ $key }}-layer-3"
                                    data-x="['left','left','left','left']" data-hoffset="['613','332','293','183']"
                                    data-y="['top','top','top','top']" data-voffset="['151','56','163','101']"
                                    data-width="['156',91','68','42']" data-height="['142',83','62','38']"
                                    data-whitespace="normal" data-type="image" data-responsive_offset="on"
                                    data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]'
                                    data-textAlign="['left','left','left','left']"><img src="" alt="">
                                </div>
                                <!-- LAYER 4  Thin text title-->
                                <div class="tp-caption tp-resizeme title" id="slide-7{{ $key }}-layer-4"
                                    data-x="['left','left','left','left']" data-hoffset="['155',30','30','20']"
                                    data-y="['center','center','center','center']"
                                    data-voffset="['-108','-100','-70','-83']" data-fontsize="['72',50','46','36']"
                                    data-lineheight="['80','51','46','40']" data-width="['550',379','400','319']"
                                    data-height="['auto',auto','105','86']" data-fontweight="['300','300','300','300']"
                                    data-whitespace="normal" data-type="text" data-responsive_offset="on"
                                    data-frames='[{"delay":400,"speed":1200,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                    data-textAlign="['left','left','left','left']">{{ $banner->title }}
                                </div>
                                <!-- LAYER 5  Paragraph-->
                                <div class="tp-caption tp-resizeme" id="slide-7{{ $key }}-layer-5"
                                    data-x="['left','left','left','left']" data-hoffset="['155','30','30','20']"
                                    data-y="['center','center','center','center']" data-voffset="['30','0','20','-6']"
                                    data-width="['530',460','484','389']" data-height="['auto',auto','auto','auto']"
                                    data-fontweight="['400','400','400','400']" data-fontsize="['18','16','16','14']"
                                    data-lineheight="['32','26','26','23']" data-whitespace="normal" data-type="text"
                                    data-responsive_offset="on"
                                    data-frames='[{"delay":600,"speed":1200,"frame":"0","from":"x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"power3.out"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                    data-textAlign="['left','left','left','left']">{!! $banner->intro !!}
                                </div>
                                <!-- LAYER 6  Read More-->
                                <div class="tp-caption" id="slide-7{{ $key }}-layer-6"
                                    data-x="['left','left','left','left']" data-hoffset="['155','30','30','20']"
                                    data-y="['top','top','top','top']" data-voffset="['541','312','390','335']"
                                    data-lineheight="['18','18','16','16']" data-width="none" data-height="none"
                                    data-whitespace="nowrap" data-responsive_offset="on"
                                    data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"power3.inOut"}]'
                                    data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"><a href="{{ $banner->link }}"
                                        class="octf-btn octf-btn-primary btn-slider btn-large border-hover-dark">View
                                        More</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tp-bannertimer"></div>
                </div>
            </div>
        </div>
        <section class="about-3 p-xl-0 pb-sm-0">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-5 mb-lg-0 align-self-center">
                        <div class="about-img-3">
                            <img src="{{ $about->image->path ?? '' }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 align-self-center">
                        <div class="about-content-3 ml-xl-70">
                            <div class="ot-heading is-dots">
                                <span>[ About Us ]</span>
                                <h2 class="main-heading">{{ $about->title }}</h2>
                            </div>
                            <div class="space-20"></div>
                            <div class="space-5"></div>
                            <p>{{ $about->description }}</p>
                            <div class="space-20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our-skill-3 pb-0">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="our-skill-content-3 mr-xl-70">
                            <div class="ot-heading is-dots">
                                <span>[ our process ]</span>
                                <h2 class="main-heading">Exclusive in Vietnam. The first factory in Vietnam</h2>
                            </div>
                            <div class="space-20"></div>
                            <div class="space-5"></div>
                            <p>{!! $about->production_process_content !!}</p>
                            <div class="space-20"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 align-self-center">
                        <img src="{{ $about->galleries[0]->image->path ?? '' }}" alt="">
                    </div>
                    <div class="space-90"></div>
                </div>
            </div>
            <div class="container-fluid px-0 px-xl-90">
                <div class="bg-dark-1 px-3 py-5 p-sm-5 p-md-80">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="clients-slide owl-theme owl-carousel">
                                @foreach ($about->certificates as $certificate)
                                    <div class="img-item">
                                        <figure><img src="{{ $certificate->image->path ?? '' }}" alt=""></figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-90"></div>
            <div class="container-fluid px-0 px-xl-90">
                <div class="project-slider-4item projects-grid style-2 no-gaps m-0 img-scale owl-theme owl-carousel">
                    @foreach ($reviews as $video)
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
                                                <circle cx="43" cy="43" r="39" stroke="none"
                                                    stroke-width="1" fill="none"></circle>
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
                    @endforeach
                </div>
            </div>
        </section>
        <section class="services-3">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center theratio-align-center">
                        <div class="ot-heading is-dots">
                            <span>[ OUR SERVICES ]</span>
                            <h2 class="main-heading">What Can We Do</h2>
                        </div>
                        <div class="space-50"></div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div
                                class="icon-box icon-box--bg-img icon-box--icon-top icon-box--is-line-hover icon-bg-1 text-center mb-30">
                                <div class="icon-main"><img src="{{ $service->image->path ?? '' }}" alt="">
                                </div>
                                <div class="content-box">
                                    <h5><a href="{{ route('front.service-detail', $service->slug) }}">{{ $service->name }}</a></h5>
                                    <p>{{ $service->description }}</p>
                                </div>
                                <div class="link-box">
                                    <a href="{{ route('front.service-detail', $service->slug) }}"
                                        class="btn-details">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="space-80"></div>
                </div>
            </div>
        </section>
        <div class="no-padding d-none d-xl-block">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container-fluid px-xl-90">
                <img src="/site/images/image1-faq.jpg" alt="">
            </div>
        </div>
        <section class="pt-0 pricing-plan">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container container-custom">
                <div class="row">
                    <div class="col-lg-12 text-center theratio-align-center">
                        <div class="pricing-wrap-title">
                            <div class="ot-heading is-dots">
                                <span>[ products ]</span>
                                <h2 class="main-heading">Choose Your Perfect Product</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="pt-0">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    @foreach ($special_products as $product)
                        <div class="col-lg-3 co-md-6 col-sm-6 first">
                            @include('site.products.product_item', ['product' => $product])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        {{-- <section class="testi-3 py-0">
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container-fluid px-xl-90">
                <div class="row mx-0">
                    <div class="col-lg-6 px-0 align-self-center">
                        <div class="testi-img-3">
                            <img src="https://templates.thememodern.com/theratio/images/image3-home3.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 px-0 mb-5 mb-xl-0">
                        <div class="testi-slide-block-3">
                            <div class="ot-heading is-dots">
                                <span>[ testimonials ]</span>
                                <h2 class="main-heading">What People Say</h2>
                            </div>
                            <div class="space-20"></div>
                            <div class="space-5"></div>
                            <div class="ot-testimonials v-light">
                                <div class="testimonials-slide-2 s2 ot-testimonials-slider-s2 owl-theme owl-carousel">
                                    <div class="testi-item">
                                        <div class="ttext">
                                            “I have very much enjoyed with your services. Lorem ipsum dolor sit
                                            amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                            exercitation ullamco laboris nisi ut aliquip.”
                                        </div>
                                        <div class="t-head flex-middle">
                                            <div class="tinfo">
                                                <h5>Kristina Lee</h5>
                                                <span>Client of Company</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testi-item">
                                        <div class="ttext">
                                            “You will never fake the feeling of being in such a place. The live
                                            minimalism base on the natural materials and alive unprocessed textures
                                            — true, authentic, close to nature. It has memory and appreciates to the
                                            culture, roots, archetypes.”
                                        </div>
                                        <div class="t-head flex-middle">
                                            <div class="tinfo">
                                                <h5>Pablo Gusterio</h5>
                                                <span>Client of Company</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="testi-item">
                                        <div class="ttext">
                                            I’m always impressed with the services. Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                            exercitation ullamco laboris nisi ut aliquip.”
                                        </div>
                                        <div class="t-head flex-middle">
                                            <div class="tinfo">
                                                <h5>Anna Paulina</h5>
                                                <span>Client of Company</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <section>
            <div class="grid-lines grid-lines-vertical">
                <span class="g-line-vertical line-left color-line-default"></span>
                <span class="g-line-vertical line-right color-line-default"></span>
            </div>
            <div class="container">
                <div class="row pb-50">
                    <div class="col-lg-8 col-md-12 mb-4 mb-lg-0">
                        <div class="ot-heading is-dots">
                            <span>[ our blog ]</span>
                            <h2 class="main-heading">Read Our Latest News</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 text-lg-right align-self-center">
                        <div class="ot-button">
                            <a href="javascript:void(0)" class="octf-btn octf-btn-dark border-hover-dark">View all</a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($newBlogs as $blog)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="post-box masonry-post post-item">
                                <div class="post-inner">
                                    <div class="entry-media post-cat-abs">
                                        <a href="{{ route('front.detail-blog', $blog->slug) }}"><img
                                                src="{{ $blog->image->path ?? '' }}" alt=""></a>
                                        <div class="post-cat">
                                            <div class="posted-in"><a href="#">{{ $blog->category->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="inner-post">
                                        <div class="entry-header">
                                            <div class="entry-meta">
                                                <span class="posted-on"><a
                                                        href="#">{{ $blog->created_at->format('M d,Y') }}</a></span>
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
                                        <div class="the-excerpt limit-3-lines">
                                            {{ $blog->intro }}
                                        </div>
                                        <!-- .entry-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
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
