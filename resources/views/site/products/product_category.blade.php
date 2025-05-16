@extends('site.layouts.master')
@section('title')
    {{ $title }}
@endsection
@section('description')
    {{ $short_des }}
@endsection
@section('css')
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="page-header dtable text-center header-transparent pheader-faq">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">{{ $title }}</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li class="active">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-catalog">
        <div class="container">
            <div class="row">
                <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12">
                    <aside id="search-2" class="widget widget_search">
                        <form role="search" method="get" id="search-form" class="search-form">
                            <input type="search" class="search-field" placeholder="Search…" value="" name="s">
                            <button class="search-submit" type="submit" value="Search"><i
                                    class="ot-flaticon-search"></i></button>
                        </form>
                    </aside>
                    <aside class="widget widget_categories">
                        <h5 class="widget-title">Categories</h5>
                        <ul>
                            <li><a href="#">Accessories</a> <span class="count">(2)</span></li>
                            <li><a href="#">Furniture</a> <span class="count">(6)</span></li>
                            <li><a href="#">Lightingh</a> <span class="count">(5)</span></li>
                        </ul>
                    </aside>
                    <aside class="widget woocommerce widget_price_filter">
                        <h5 class="widget-title">Filter by price</h5>
                        <form method="get">
                            <div class="price_slider_wrapper">
                                <div
                                    class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all move"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all"></span>
                                </div>
                                <div class="price_slider_amount">
                                    <div class="ot-button">
                                        <a href="#" class="octf-btn octf-btn-dark "> Filter</a>
                                    </div>
                                    <div class="price_label">
                                        Price: <span class="from">$80 </span> — <span class="to">$530</span>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </form>
                    </aside>
                </div>
                <div class="col-lg-9 col-md-12 order-first order-lg-last mb-lg-0 mb-5">
                    <p class="woocommerce-result-count">Showing {{ $products->count() }} of {{ $products->total() }}
                        results</p>
                    <form class="woocommerce-ordering" method="get">
                        <select name="orderby" class="orderby" aria-label="Shop order">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                        <input type="hidden" name="paged" value="1">
                    </form>
                    <div class="product">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 co-md-6 col-sm-6 first">
                                    @include('site.products.product_item', ['product' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <ul class="page-pagination text-center mt-3 none-style">
                        {{ $products->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        app.controller('ProductCategoryController', function($scope, $http) {
            $scope.category = @json($category ?? null);
            $scope.filter_sort = 'asc';
            $scope.filterSort = function(sort) {
                $scope.filter_sort = sort;
                $scope.filter();
            }

            $scope.filter_price = [];

            $scope.priceRanges = [{
                    id: 'price13',
                    value: '0:200000',
                    label: 'Dưới 200k',
                    checked: false
                },
                {
                    id: 'price14',
                    value: '200000:350000',
                    label: 'Từ 200k đến 350k',
                    checked: false
                },
                {
                    id: 'price15',
                    value: '350000:500000',
                    label: 'Từ 350k đến 500k',
                    checked: false
                },
                {
                    id: 'price16',
                    value: '500000:800000',
                    label: 'Từ 500k đến 800k',
                    checked: false
                },
                {
                    id: 'price17',
                    value: '800000:1000000',
                    label: 'Từ 800k đến 1 triệu',
                    checked: false
                },
                {
                    id: 'price18',
                    value: '1000000:100000000',
                    label: 'Trên 1 triệu',
                    checked: false
                }
            ];

            $scope.onChangeFilterPrice = function() {
                $scope.filter_price = $scope.priceRanges
                    .filter(function(item) {
                        return item.checked;
                    })
                    .map(function(item) {
                        return item.value;
                    });

                $scope.filter();
            };

            $scope.filter = function() {
                $.ajax({
                    url: '{{ route('front.filter-product') }}',
                    type: 'GET',
                    data: {
                        sort: $scope.filter_sort,
                        category: $scope.category.id,
                        cate_slug: $scope.category.slug,
                        price: $scope.filter_price
                    },
                    success: function(response) {
                        $('#product-list').html(response.html);
                    },
                    error: function(response) {
                        console.log(response);
                    },
                    complete: function() {}
                });
            }

            $scope.filterCategory = function(slug) {
                url = '{{ route('front.show-product-category', ['categorySlug' => ':categorySlug']) }}'.replace(
                    ':categorySlug', slug);
                window.location.href = url;
            }
        });
    </script>
@endpush
