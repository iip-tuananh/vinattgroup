<div class="header-top">
    <div class="container-fluid px-0 px-xl-90">
        <div class="row">
            <div class="col-md-12">
                <div class="header-top-content d-flex justify-content-end" style="gap: 20px;">
                    <div class="header-top-item"><i class="fa fa-user"></i> Log In</div>
                    <div class="header-top-item"><i class="fa fa-user-plus"></i> Sign Up</div>
                    <div class="header-top-item language-item" data-toggle="dropdown"><i class="fa fa-language"></i> Languages
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)" onclick="translateheader('en')"><img width="18" height="18" src="/site/images/english.svg" alt="">  English</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="translateheader('fr')"><img width="18" height="18" src="/site/images/french.svg" alt="">  French</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="translateheader('de')"><img width="18" height="18" src="/site/images/germany.svg" alt="">  German</a>
                            <a class="dropdown-item" href="javascript:void(0)" onclick="translateheader('ru')"><img width="18" height="18" src="/site/images/russia.svg" alt="">  Russian</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .header-top {
        background-color: #000;
        color: #fff;
        padding: 10px 0;
    }

    .header-top-item {
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        font-family: "Titillium Web", sans-serif;
    }

    .header-top-item:last-child {
        margin-right: 30px;
    }

    .language-item {
        position: relative;
    }

    .language-item .dropdown-menu {
        position: absolute;
        top: 98%;
        left: 0;
        z-index: 1000;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        min-width: 150px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: none;
    }

    .language-item:hover .dropdown-menu {
        display: block;
    }

</style>
<header id="site-header" class="site-header {{ Route::is('front.home-page') ? 'header-transparent' : '' }}" ng-cloak>
    <!-- Main Header start -->
    <div class="octf-main-header {{ Route::is('front.home-page') ? ' main-header-slight' : '' }} main-header-s3 is-fixed">
        <div class="octf-area-wrap">
            <div class="container-fluid octf-mainbar-container">
                <div class="octf-mainbar">
                    <div class="octf-mainbar-row octf-row">
                        <div class="octf-col logo-col no-padding">
                            <div id="site-logo" class="site-logo">
                                <a href="{{ route('front.home-page') }}">
                                    <img src="{{ $config->image->path ?? '' }}" alt="{{ $config->web_title ?? '' }}"
                                        class="logo-h3" loading="lazy">
                                </a>
                            </div>
                        </div>
                        <div class="octf-col menu-col no-padding">
                            <nav id="site-navigation" class="main-navigation nav-text-dark">
                                <ul class="menu">
                                    <li class="{{ Route::is('front.home-page') ? 'current-menu-item current-menu-ancestor' : '' }}">
                                        <a href="{{ route('front.home-page') }}">Home</a>
                                    </li>
                                    <li class="menu-item-has-children {{ Route::is('front.about-us') ? 'current-menu-item current-menu-ancestor' : '' }}">
                                        <a href="{{ route('front.about-us') }}">Pages</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('front.about-us') }}">About Us</a></li>
                                            <li><a href="{{ route('front.about-us') }}#catalogue">Catalogue</a></li>
                                            <li><a href="{{ route('front.video-gallery') }}">Video</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children {{ Route::is('front.service-list') ? 'current-menu-item current-menu-ancestor' : '' }}">
                                        <a href="javascript:void(0)">Services</a>
                                        <ul class="sub-menu">
                                            @foreach ($services as $service)
                                                <li><a
                                                        href="{{ route('front.service-detail', $service->slug) }}">{{ $service->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children mega-dropdown {{ Route::is('front.product-list') ? 'current-menu-item current-menu-ancestor' : '' }}">
                                        <a href="javascript:void(0)">Products</a>
                                        <ul class="mega-sub-menu">
                                            <li class="row">
                                                @foreach ($productCategories as $category)
                                                    <ul class="col">
                                                        <li class="menu-title">{{ $category->name }}
                                                        </li>
                                                        @foreach ($category->childs as $child)
                                                            <li><a
                                                                    href="{{ route('front.show-product-category', $child->slug) }}">{{ $child->name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children {{ Route::is('front.list-blog') ? 'current-menu-item current-menu-ancestor' : '' }}">
                                        <a href="javascript:void(0)">Blog</a>
                                        <ul class="sub-menu">
                                            @foreach ($postCategories as $category)
                                                <li><a
                                                        href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('front.contact-us') }}" {{ Route::is('front.contact-us') ? 'current-menu-item current-menu-ancestor' : '' }}>Contacts</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="octf-col cta-col text-right no-padding">
                            <!-- Call To Action -->
                            <div class="octf-btn-cta">
                                <div class="octf-cart octf-cta-header">
                                    <a class="cart-contents" href="javascript:void(0)" title="View your shopping cart">
                                        <i class="ot-flaticon-shopping-bag"></i>
                                        <span class="count"><% cart.count || 0 %></span>
                                    </a>
                                    <div class="site-header-cart">
                                        <div class="widget woocommerce widget_shopping_cart">
                                            <div class="widget_shopping_cart_content">
                                                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                                    <li class="woocommerce-mini-cart-item mini_cart_item"
                                                        ng-repeat="item in cart.items">
                                                        <a class="remove remove_from_cart_button" href="#">×</a>
                                                        <a href="/san-pham/<% item.attributes.slug %>.html"><img
                                                                ng-src="<% item.attributes.image %>" class=""
                                                                alt=""><% item.name %></a>
                                                        <span class="quantity">1 × <span
                                                                class="amount"><bdi><span>$</span><% item.price | number %></bdi></span></span>
                                                    </li>
                                                </ul>
                                                <p class="woocommerce-mini-cart__total total">
                                                    <strong>Subtotal:</strong> <span
                                                        class="amount"><bdi><span>$</span><% cart.total | number %></bdi></span>
                                                </p>
                                                <p class="woocommerce-mini-cart__buttons buttons">
                                                    <a href="{{ route('cart.checkout') }}"
                                                        class="button checkout wc-forward">Checkout</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="octf-search octf-cta-header">
                                    <div class="toggle_search octf-cta-icons">
                                        <i class="ot-flaticon-search"></i>
                                    </div>
                                    <!-- Form Search on Header -->
                                    <div class="h-search-form-field collapse">
                                        <div class="h-search-form-inner">
                                            <form role="search" method="get" class="search-form">
                                                <input type="search" class="search-field" placeholder="SEARCH..."
                                                    value="" name="s">
                                                <button type="submit" class="search-submit"><i
                                                        class="ot-flaticon-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="octf-sidepanel octf-cta-header">
                                    <div class="site-overlay panel-overlay"></div>
                                    <div id="panel-btn" class="panel-btn octf-cta-icons">
                                        <i class="ot-flaticon-menu"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_mobile header-mobile-s3">
        <div class="container-fluid">
            <div class="octf-mainbar-row octf-row">
                <div class="octf-col">
                    <div class="mlogo_wrapper clearfix">
                        <div class="mobile_logo">
                            <a href="{{ route('front.home-page') }}">
                                <img src="{{ $config->image->path ?? '' }}" alt="{{ $config->web_title ?? '' }}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="octf-col justify-content-end">
                    <div class="octf-search octf-cta-header">
                        <div class="toggle_search octf-cta-icons">
                            <i class="ot-flaticon-search"></i>
                        </div>
                        <!-- Form Search on Header -->
                        <div class="h-search-form-field collapse">
                            <div class="h-search-form-inner">
                                <form role="search" method="get" class="search-form">
                                    <input type="search" class="search-field" placeholder="SEARCH..."
                                        value="" name="s">
                                    <button type="submit" class="search-submit"><i
                                            class="ot-flaticon-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="octf-menu-mobile octf-cta-header">
                        <div id="mmenu-toggle" class="mmenu-toggle">
                            <button><i class="ot-flaticon-menu"></i></button>
                        </div>
                        <div class="site-overlay mmenu-overlay"></div>
                        <div id="mmenu-wrapper" class="mmenu-wrapper on-right">
                            <div class="mmenu-inner">
                                <a class="mmenu-close" href="#"><i class="ot-flaticon-right-arrow"></i></a>
                                <div class="mobile-nav">
                                    <ul id="menu-main-menu" class="mobile_mainmenu none-style">
                                        <li class="menu-item-has-children current-menu-item current-menu-ancestor">
                                            <a href="{{ route('front.home-page') }}">Home</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="{{ route('front.about-us') }}">About Us</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)">Services</a>
                                            <ul class="sub-menu">
                                                @foreach ($services as $service)
                                                    <li><a
                                                            href="{{ route('front.service-detail', $service->slug) }}">{{ $service->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)">Products</a>
                                            <ul class="sub-menu">
                                                @foreach ($productCategories as $category)
                                                    <li class="menu-item-has-children">
                                                        <a
                                                            href="{{ route('front.show-product-category', $category->slug) }}">{{ $category->name }}</a>
                                                        <ul class="sub-menu">
                                                            @foreach ($category->childs as $child)
                                                                <li><a
                                                                        href="{{ route('front.show-product-category', $child->slug) }}">{{ $child->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="javascript:void(0)">Blog</a>
                                            <ul class="sub-menu">
                                                @foreach ($postCategories as $category)
                                                    <li><a
                                                            href="{{ route('front.list-blog', $category->slug) }}">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('front.contact-us')}}">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="side-panel" class="side-panel" ng-cloak>
    <a href="#" class="side-panel-close"><i class="ot-flaticon-close-1"></i></a>
    <div class="side-panel-block">
        <div class="side-panel-wrap">
            <div class="the-logo">
                <a href="index-html">
                    <img src="{{$config->image->path ?? ''}}" alt="{{$config->web_title ?? ''}}">
                </a>
            </div>
            <div class="ot-heading">
                <h2 class="main-heading">Our Gallery</h2>
            </div>
            <div class="image-gallery">
                <div id="gallery-1" class="gallery galleryid-102 gallery-columns-3 gallery-size-thumbnail">
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="8701e24"
                                data-elementor-lightbox-title="p4-gallery1"
                                href="https://templates.thememodern.com/theratio/images/gallery1.jpg">
                                <img src="https://templates.thememodern.com/theratio/images/gallery-small-1.jpg"
                                    class="" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="8701e24"
                                data-elementor-lightbox-title="p4-gallery1"
                                href="https://templates.thememodern.com/theratio/images/gallery2.jpg">
                                <img src="https://templates.thememodern.com/theratio/images/gallery-small-2.jpg"
                                    class="" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="8701e24"
                                data-elementor-lightbox-title="p4-gallery1"
                                href="https://templates.thememodern.com/theratio/images/gallery3.jpg">
                                <img src="https://templates.thememodern.com/theratio/images/gallery-small-3.jpg"
                                    class="" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="8701e24"
                                data-elementor-lightbox-title="p4-gallery1"
                                href="https://templates.thememodern.com/theratio/images/gallery4.jpg">
                                <img src="https://templates.thememodern.com/theratio/images/gallery-small-4.jpg"
                                    class="" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="8701e24"
                                data-elementor-lightbox-title="p4-gallery1"
                                href="https://templates.thememodern.com/theratio/images/gallery5.jpg">
                                <img src="https://templates.thememodern.com/theratio/images/gallery-small-5.jpg"
                                    class="" alt="">
                            </a>
                        </div>
                    </figure>
                    <figure class="gallery-item">
                        <div class="gallery-icon landscape">
                            <a data-elementor-open-lightbox="yes" data-elementor-lightbox-slideshow="8701e24"
                                data-elementor-lightbox-title="p4-gallery1"
                                href="https://templates.thememodern.com/theratio/images/gallery6.jpg">
                                <img src="https://templates.thememodern.com/theratio/images/gallery-small-6.jpg"
                                    class="" alt="">
                            </a>
                        </div>
                    </figure>
                </div>
            </div>
            <div class="ot-heading ">
                <h2 class="main-heading">Contact Info</h2>
            </div>
            <div class="side-panel-cinfo">
                <ul class="panel-cinfo">
                    <li class="panel-list-item">
                        <span class="panel-list-icon"><i class="ot-flaticon-place"></i></span>
                        <span class="panel-list-text">{{$config->address_company ?? ''}}</span>
                    </li>
                    <li class="panel-list-item">
                        <span class="panel-list-icon"><i class="ot-flaticon-mail"></i></span>
                        <span class="panel-list-text">{{$config->email ?? ''}}</span>
                    </li>
                    <li class="panel-list-item">
                        <span class="panel-list-icon"><i class="ot-flaticon-phone-call"></i></span>
                        <span class="panel-list-text">{{$config->hotline ?? ''}}</span>
                    </li>
                </ul>
            </div>
            <div class="side-panel-social">
                <ul>
                    <li><a href="{{$config->twitter ?? ''}}" target="_self"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{$config->facebook ?? ''}}" target="_self"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li><a href="{{$config->linkedin ?? ''}}" target="_self"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li><a href="{{$config->instagram ?? ''}}" target="_self"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
