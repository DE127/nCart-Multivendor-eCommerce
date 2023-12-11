@extends('layouts.layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('frontend-content')
    <div class="site__body">
        <!-- .block-slideshow -->
        <div class="block-slideshow block-slideshow--layout--with-departments block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block"></div>
                    <div class="col-12 col-lg-9">
                        <div class="block-slideshow__body">
                            <div class="owl-carousel">
                                <a class="block-slideshow__slide" href="">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-1.jpg')"></div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-1-mobile.jpg')"></div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">Big choice of<br>Plumbing products</div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Shop Now</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="block-slideshow__slide" href="">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-2.jpg')"></div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-2-mobile.jpg')"></div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">Screwdrivers<br>Professional Tools</div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Shop Now</span>
                                        </div>
                                    </div>
                                </a>
                                <a class="block-slideshow__slide" href="">
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-3.jpg')"></div>
                                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile" style="background-image: url('images/slides/slide-3-mobile.jpg')"></div>
                                    <div class="block-slideshow__slide-content">
                                        <div class="block-slideshow__slide-title">One more<br>Unique header</div>
                                        <div class="block-slideshow__slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>Etiam pharetra laoreet dui quis molestie.</div>
                                        <div class="block-slideshow__slide-button">
                                            <span class="btn btn-primary btn-lg">Shop Now</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-slideshow / end -->
        <!-- .block-features -->
        <div class="block block-features block-features--layout--classic">
            <div class="container">
                <div class="block-features__list">
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="images/sprite.svg#fi-free-delivery-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Free Shipping</div>
                            <div class="block-features__subtitle">For orders from $50</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="images/sprite.svg#fi-24-hours-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Support 24/7</div>
                            <div class="block-features__subtitle">Call us anytime</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="images/sprite.svg#fi-payment-security-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">100% Safety</div>
                            <div class="block-features__subtitle">Only secure payments</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="images/sprite.svg#fi-tag-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Hot Offers</div>
                            <div class="block-features__subtitle">Discounts up to 90%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .block-features / end -->
        <!-- .block-products-carousel -->
        @if ($featured_section->visibility)
        <div class="block block-products-carousel" data-layout="grid-4" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Featured Products</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        @foreach ($featured_section->products as $product)
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <i class="fas fa-search-plus"></i>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--hot">HOT</div>
                                    </div>
                                    <div class="product-card__image product-image">
                                        <a href="{{ route('product-detail', $product->slug) }}" class="product-image__body">
                                            <img class="product-image__img" src="{{ asset($product->thumbnail_image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->productlangfrontend->name) }}</a>
                                        </div>
                                        @php
                                            $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                            $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
                                        @endphp
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($i <= $review)
                                                                <i class="fas fa-star rating__star rating__star--active"></i>
                                                            @else
                                                                <i class="fas fa-star rating__star"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">({{ $review == 0 ? 0 : $review }} Reviews)</div>
                                        </div>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            @if (session()->get('currency_position') == 'right')
                                                {{ html_decode($product->regular_price * session()->get('currency_rate')) }}{{ session()->get('currency_icon') }}
                                            @else
                                                {{ session()->get('currency_icon') }}{{ html_decode($product->regular_price * session()->get('currency_rate')) }}
                                            @endif
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button" onclick="addToCard({{ $product->id }})">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button" onclick="addToCard({{ $product->id }})">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button" onclick="addWishlist({{ $product->id }})">
                                                <i class="fas fa-heart"></i>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <i class="fas fa-random"></i>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- .block-products-carousel / end -->
        <!-- .block-banner -->
        <div class="block block-banner">
            <div class="container">
                <a href="" class="block-banner__body">
                    <div class="block-banner__image block-banner__image--desktop" style="background-image: url('images/banners/banner-1.jpg')"></div>
                    <div class="block-banner__image block-banner__image--mobile" style="background-image: url('images/banners/banner-1-mobile.jpg')"></div>
                    <div class="block-banner__title">Hundreds <br class="block-banner__mobile-br"> Hand Tools</div>
                    <div class="block-banner__text">Hammers, Chisels, Universal Pliers, Nippers, Jigsaws, Saws</div>
                    <div class="block-banner__button">
                        <span class="btn btn-sm btn-primary">Shop Now</span>
                    </div>
                </a>
            </div>
        </div>
        <!-- .block-banner / end -->
        <!-- .block-products -->
        @if ($trending_section->visibility)
        <div class="block block-products block-products--layout--large-first" data-mobile-grid-columns="2">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Trending</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-products__body">
                    <div class="block-products__featured">
                        @php
                        $first_product = $featured_section->products->shift();
                        @endphp
                        <div class="block-products__featured-item">
                            <div class="product-card product-card--hidden-actions ">
                                <button class="product-card__quickview" type="button">
                                    <i class="fas fa-search-plus"></i>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--hot">Hot</div>
                                </div>
                                <div class="product-card__image product-image">
                                    <a href="{{ route('product-detail', $first_product->slug) }}" class="product-image__body">
                                        <img class="product-image__img" src="{{ asset($first_product->thumbnail_image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <a href="{{ route('product-detail', $first_product->slug) }}">{{ html_entity_decode($first_product->productlangfrontend->name) }}</a>
                                    </div>
                                    @php
                                        $review=App\Models\Review::where(['product_id' => $first_product->id, 'status' => 1])->get()->average('rating');
                                        $sale=App\Models\OrderItem::where(['product_id' => $first_product->id])->get()->count();
                                    @endphp
                                    <div class="product-card__rating">
                                        <div class="product-card__rating-stars">
                                            <div class="rating">
                                                <div class="rating__body">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review)
                                                            <i class="fas fa-star rating__star rating__star--active"></i>
                                                        @else
                                                            <i class="fas fa-star rating__star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">({{ $review == 0 ? 0 : $review }} Reviews)</div>
                                    </div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">
                                        Availability: <span class="text-success">In Stock</span>
                                    </div>
                                    <div class="product-card__prices">
                                        @if (session()->get('currency_position') == 'right')
                                            {{ html_entity_decode($first_product->regular_price * session()->get('currency_rate')) }}{{ session()->get('currency_icon') }}
                                        @else
                                            {{ session()->get('currency_icon') }}{{ html_entity_decode($first_product->regular_price * session()->get('currency_rate')) }}
                                        @endif
                                    </div>
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart" type="button" onclick="addToCard({{ $first_product->id }})">Add To Cart</button>
                                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button" onclick="addToCard({{ $first_product->id }})">Add To Cart</button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button" onclick="addWishlist({{ $first_product->id }})">
                                            <i class="fas fa-heart"></i>
                                            <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                        </button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                            <i class="fas fa-random"></i>
                                            <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products__list">
                        @foreach ($featured_section->products as $product)
                        <div class="block-products__list-item">
                            <div class="product-card product-card--hidden-actions ">
                                <button class="product-card__quickview" type="button">
                                    <i class="fas fa-search-plus"></i>
                                    <span class="fake-svg-icon"></span>
                                </button>
                                <div class="product-card__image product-image">
                                    <a href="{{ route('product-detail', $product->slug) }}" class="product-image__body">
                                        <img class="product-image__img" src="{{ asset($product->thumbnail_image) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <a href="{{ route('product-detail', $product->slug) }}">{{ html_entity_decode($product->productlangfrontend->name) }}</a>
                                    </div>
                                    @php
                                        $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                        $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
                                    @endphp
                                    <div class="product-card__rating">
                                        <div class="product-card__rating-stars">
                                            <div class="rating">
                                                <div class="rating__body">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review)
                                                            <i class="fas fa-star rating__star rating__star--active"></i>
                                                        @else
                                                            <i class="fas fa-star rating__star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__rating-legend">({{ $review == 0 ? 0 : $review }} Reviews)</div>
                                    </div>
                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">
                                        Availability: <span class="text-success">In Stock</span>
                                    </div>
                                    <div class="product-card__prices">
                                        @if (session()->get('currency_position') == 'right')
                                            {{ html_entity_decode($product->regular_price * session()->get('currency_rate')) }}{{ session()->get('currency_icon') }}
                                        @else
                                            {{ session()->get('currency_icon') }}{{ html_entity_decode($product->regular_price * session()->get('currency_rate')) }}
                                        @endif
                                    </div>
                                    <div class="product-card__buttons">
                                        <button class="btn btn-primary product-card__addtocart" type="button" onclick="addToCard({{ $product->id }})">Add To Cart</button>
                                        <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button" onclick="addToCard({{ $product->id }})">Add To Cart</button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button" onclick="addWishlist({{ $product->id }})">
                                            <i class="fas fa-heart"></i>
                                            <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                        </button>
                                        <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                            <i class="fas fa-random"></i>
                                            <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- .block-products / end -->
        <!-- .block-categories -->
        @if ($category_visibility)
        <div class="block block--highlighted block-categories block-categories--layout--classic">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Popular Categories</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-categories__list">
                    @foreach ($category_section->categories as $key=>$category)
                    @if ($key < 6)
                    <div class="block-categories__item category-card category-card--layout--classic">
                        <div class="category-card__body">
                            <div class="category-card__image">
                                <a href="{{ route('products', ['category' => $category->slug]) }}"><img src="{{ asset($category->thumbnail_image) }}" alt=""></a>
                            </div>
                            <div class="category-card__content">
                                <div class="category-card__name">
                                    <a href="{{ route('products', ['category' => $category->slug]) }}">{{ $category->catlangfrontend->name }}</a>
                                </div>
                                @php
                                    $product = App\Models\Product::where('category_id', $category->id)->get();
                                @endphp
                                <div class="category-card__products">
                                    {{ $product->count() }} Products
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <!-- .block-categories / end -->
        <!-- .block-posts -->
        @if ($home1_blog_section->visibility)
        <div class="block block-posts" data-layout="list" data-mobile-columns="1">
            <div class="container">
                <div class="block-header">
                    <h3 class="block-header__title">Latest News</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
                <div class="block-posts__slider">
                    <div class="owl-carousel">
                        @foreach ($home1_blog_section->blogs as $blog)
                        <div class="post-card  ">
                            <div class="post-card__image">
                                <a href="">
                                    <img src="{{ asset($blog->image) }}" alt="blog">
                                </a>
                            </div>
                            <div class="post-card__info">
                                <div class="post-card__category">
                                    <a href="">Special Offers</a>
                                </div>
                                <div class="post-card__name">
                                    <a href="{{ route('blog', $blog->slug) }}">{{ $blog->bloglanguagefrontend->title }}</a>
                                </div>
                                <div class="post-card__date">{{ \Carbon\Carbon::parse($blog->created_at)->format('d M') }}</div>
                                <div class="post-card__content">
                                    {{ $blog->bloglanguagefrontend->short_description }}
                                </div>
                                <div class="post-card__read-more">
                                    <a href="{{ route('blog', $blog->slug) }}" class="btn btn-secondary btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- .block-posts / end -->
    </div>
@endsection
