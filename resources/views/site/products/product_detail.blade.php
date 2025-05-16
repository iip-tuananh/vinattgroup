@extends('site.layouts.master')
@section('title')
    {{ $product->name }}
@endsection
@section('description')
    {{ strip_tags($product->intro) }}
@endsection
@section('image')
    {{ $product->image ? $product->image->path : $product->galleries[0]->image->path }}
@endsection

@section('css')
    <style>
        .product-attributes {
            margin-bottom: 0 !important;
        }

        .product-attributes label {
            font-weight: 600;
            margin-bottom: 0 !important;
        }

        .product-attribute-values {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .product-attribute-values .badge,
        .product-attribute-values .badge+.badge {
            width: auto;
            border: 1px solid #0974ba;
            padding: 2px 10px;
            border-radius: 5px;
            font-size: 14px;
            color: #0974ba;
            height: 30px;
            cursor: pointer;
            pointer-events: auto;
        }

        .product-attribute-values .badge:hover {
            background-color: #0974ba;
            color: #fff;
        }

        .product-attribute-values .badge.active {
            background-color: #0974ba;
            color: #fff;
        }
    </style>
@endsection

@section('content')
    <div id="content" class="site-content">
        <div class="page-header dtable text-center header-transparent pheader-faq">
            <div class="dcell">
                <div class="container">
                    <h1 class="page-title">{{ $product->name }}</h1>
                    <ul id="breadcrumbs" class="breadcrumbs none-style">
                        <li><a href="{{ route('front.home-page') }}">Home</a></li>
                        <li><a href="javascript:void(0)">Shop</a></li>
                        <li class="active">{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="shop-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0 text-center align-self-center">
                    <div class="product-slide">
                        <div class="single-product owl-carousel owl-theme">
                            @foreach ($product->galleries as $key => $item)
                                <div class="item" data-hash="{{ $key + 1 }}">
                                    <img src="{{ $item->image->path ?? '' }}" alt="">
                                    <a href="{{ $item->image->path ?? '' }}" class="link-image-action"><i
                                            class="ot-flaticon-search"></i></a>
                                </div>
                            @endforeach
                            <div class="item" data-hash="0">
                                <img src="{{ $product->image->path ?? '' }}" alt="">
                                <a href="{{ $product->image->path ?? '' }}" class="link-image-action"><i
                                        class="ot-flaticon-search"></i></a>
                            </div>
                        </div>
                        <div class="nav-img">
                            @foreach ($product->galleries as $key => $item)
                                <div class="item">
                                    <div>
                                        <a class="" href="#{{ $key }}">
                                            <img src="{{ $item->image->path ?? '' }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            <div class="item">
                                <div>
                                    <a class="" href="#0">
                                        <img src="{{ $product->image->path ?? '' }}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="summary entry-summary">
                        <h2 class="single-product-title">Grey Velvet Chair</h2>
                        <div class="single-product-rating">
                            <div class="star-rating">
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(customer review)</a>
                            </div>
                        </div>
                        <span class="single-price price-product"><span
                                class="amount"><span>$</span>{{ formatCurrency($product->price) }}</span></span>
                        @if (isset($product->attributes) && count($product->attributes) > 0)
                            @foreach ($product->attributes as $index => $attribute)
                                <div class="mt-2 product-attributes">
                                    <label>{{ $attribute['name'] }}</label>
                                    <div class="product-attribute-values">
                                        @foreach ($attribute['values'] as $value)
                                            <div class="badge badge-primary" data-value="{{ $value }}"
                                                data-name="{{ $attribute['name'] }}" data-index="{{ $index }}">
                                                {{ $value }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <form class="cart">
                            <div class="single-quantity">
                                <label class="screen-reader-text">Boost Your Business quantity</label>
                                <input type="number" id="quantity" class="input-text qty text" step="1"
                                    min="1" name="quantity" value="1" title="Qty" placeholder="">
                            </div>
                            <button type="submit" name="add-to-cart"
                                class="octf-btn single_add_to_cart_button button alt">Add to cart</button>
                        </form>
                        <div class="product_meta">
                            <span class="sku_wrapper">SKU: <span class="sku">{{ $product->sku }}</span></span>
                            <span class="posted_in">Category: <a href="#">{{ $product->category->name }}</a></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-70"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="ot-tabs tab-single-product text-center">
                        <ul class="tabs-heading unstyle">
                            <li class="tab-link current" data-tab="tab-1">Description</li>
                            <li class="tab-link" data-tab="tab-2">Information details</li>
                        </ul>
                        <div id="tab-1" class="tab-content current">
                            {!! $product->intro !!}
                        </div>
                        <div id="tab-2" class="tab-content">
                            {!! $product->body !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center mb-2">
                    <h2 class="relate-product-title">Related Products</h2>
                </div>
                @foreach ($productsRelated as $relatedProduct)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        @include('site.products.product_item', ['product' => $relatedProduct])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        // Plus number quantiy product detail
        var plusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal)) {
                    jQuery('input[name="quantity"]').val(currentVal + 1);
                } else {
                    jQuery('input[name="quantity"]').val(1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        // Minus number quantiy product detail
        var minusQuantity = function() {
            if (jQuery('input[name="quantity"]').val() != undefined) {
                var currentVal = parseInt(jQuery('input[name="quantity"]').val());
                if (!isNaN(currentVal) && currentVal > 1) {
                    jQuery('input[name="quantity"]').val(currentVal - 1);
                }
            } else {
                console.log('error: Not see elemnt ' + jQuery('input[name="quantity"]').val());
            }
        }
        app.controller('ProductDetailController', function($scope, $http, $interval, cartItemSync, $rootScope, $compile) {
            $scope.product = @json($product);
            $scope.form = {
                quantity: 1
            };

            $scope.selectedAttributes = [];
            jQuery('.product-attribute-values .badge').click(function() {
                if (!jQuery(this).hasClass('active')) {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).addClass('active');
                    if ($scope.selectedAttributes.length > 0 && $scope.selectedAttributes.find(item => item
                            .index == jQuery(this).data('index'))) {
                        $scope.selectedAttributes.find(item => item.index == jQuery(this).data('index'))
                            .value = jQuery(this).data('value');
                    } else {
                        let index = jQuery(this).data('index');
                        $scope.selectedAttributes.push({
                            index: index,
                            name: jQuery(this).data('name'),
                            value: jQuery(this).data('value'),
                        });
                    }
                } else {
                    jQuery(this).parent().find('.badge').removeClass('active');
                    jQuery(this).removeClass('active');
                    $scope.selectedAttributes = $scope.selectedAttributes.filter(item => item.index !=
                        jQuery(this).data('index'));
                }
                $scope.$apply();
            });

            $scope.addToCartFromProductDetail = function() {
                let quantity = $('.section-product-detail input[name="quantity"]').val();

                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.addToCartCheckoutFromProductDetail = function() {
                let quantity = $('.section-product-detail input[name="quantity"]').val();
                url = "{{ route('cart.add.item', ['productId' => 'productId']) }}";
                url = url.replace('productId', $scope.product.id);

                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: {
                        'qty': parseInt(quantity),
                        'attributes': $scope.selectedAttributes
                    },
                    success: function(response) {
                        if (response.success) {
                            if (response.count > 0) {
                                $scope.hasItemInCart = true;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function() {
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                            toastr.success('Thao tác thành công !')
                            window.location.href = "{{ route('cart.checkout') }}";
                        }
                    },
                    error: function() {
                        toastr.error('Thao tác thất bại !')
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }
        });
    </script>
@endpush
