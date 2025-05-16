<div class="product-item">
    <div class="product-media">
        <a href="{{ route('front.show-product-detail', $product->slug) }}">
            <img src="{{ $product->image->path ?? '' }}" class="" alt="">
        </a>
        <div class="wrapper-add-to-cart">
            <div class="add-to-cart-inner">
                <a href="cart-page.html" class="octf-btn octf-btn-dark">Add to cart </a>
            </div>
        </div>
    </div>
    <h2 class="woocommerce-loop-product__title"><a href="{{ route('front.show-product-detail', $product->slug)}}">{{$product->name}}</a></h2>
    <div class="star-rating">
        <span><i class="fa fa-star"></i></span>
        <span><i class="fa fa-star"></i></span>
        <span><i class="fa fa-star"></i></span>
        <span><i class="fa fa-star"></i></span>
        <span><i class="fa fa-star"></i></span>
    </div>
    <span class="price-product"><span class="amount"><span>$</span>{{formatCurrency($product->price)}}</span></span>
</div>