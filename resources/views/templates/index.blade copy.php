<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    @php
        $setting = App\Models\Setting::with('settinglangfrontend')->first();
        $languages = App\Models\Language::where('status', 1)->get();
        $currencies = App\Models\MultiCurrency::where('status', 1)->get();
        $front_lang = Session::get('front_lang');
        $language = App\Models\Language::where('is_default', 'Yes')->first();
        if($front_lang == ''){
            $front_lang = Session::put('front_lang', $language->lang_code);
        }
        $lang_direction = App\Models\Language::where('lang_code', $front_lang)->first();

        $currency_code = Session::get('currency_code');
        $currency_icon = Session::get('currency_icon');
        $currency_rate = Session::get('currency_rate');
        $currency_position = Session::get('currency_position');

        $default_currency = App\Models\MultiCurrency::where('is_default', 'Yes')->first();

        if($currency_code == ''){
            $currency_code = Session::put('currency_code', $default_currency->currency_code);
        }

        if($currency_icon == ''){
            $currency_icon = Session::put('currency_icon', $default_currency->currency_icon);
        }

        if($currency_rate == ''){
            $currency_rate = Session::put('currency_rate', $default_currency->currency_rate);
        }

        if($currency_position == ''){
            $currency_position = Session::put('currency_position', $default_currency->currency_position);
        }

    @endphp
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css) }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl-carousel/assets/owl.carousel.min.css) }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/photoswipe/photoswipe.css) }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/photoswipe/default-skin/default-skin.css) }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/select2/css/select2.min.css) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css) }}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css) }}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{ asset('frontend/fonts/stroyka/stroyka.css) }}">

    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding{
            display: none !important;
        }
    </style>
</head>

<body>
    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->
        @include('partials.header')
        <!-- desktop site__header / end -->
        <!-- site__body -->
        <div class="site__body">
            <!-- .block-slideshow -->
            <div class="block-slideshow block-slideshow--layout--full block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="block-slideshow__body">
                                <div class="owl-carousel">
                                    <a class="block-slideshow__slide" href="">
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-1-full.jpg')"></div>
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
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-2-full.jpg')"></div>
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
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop" style="background-image: url('images/slides/slide-3-full.jpg')"></div>
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
            <div class="block block-features block-features--layout--boxed">
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
            <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">Featured Products</h3>
                        <div class="block-header__divider"></div>
                        <ul class="block-header__groups-list">
                            <li><button type="button" class="block-header__group  block-header__group--active ">All</button></li>
                            <li><button type="button" class="block-header__group ">Power Tools</button></li>
                            <li><button type="button" class="block-header__group ">Hand Tools</button></li>
                            <li><button type="button" class="block-header__group ">Plumbing</button></li>
                        </ul>
                        <div class="block-header__arrows-list">
                            <button class="block-header__arrow block-header__arrow--left" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg>
                            </button>
                            <button class="block-header__arrow block-header__arrow--right" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="block-products-carousel__slider">
                        <div class="block-products-carousel__preloader"></div>
                        <div class="owl-carousel">
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">New</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $749.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--hot">Hot</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,019.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $850.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--sale">Sale</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                <span class="product-card__new-price">$949.00</span>
                                                <span class="product-card__old-price">$1189.00</span>
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Router Power Tool 2017ERXPK</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,700.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-6.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $3,199.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-7.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Pliers</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $24.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-8.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Water Hose 40cm</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $15.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-9.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Spanner Wrench</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $19.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-10.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Water Tap</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $15.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-11.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Hand Tool Kit</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $149.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-12.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Ash's Chainsaw 3.5kW</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $666.99
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-13.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Angle Grinder KZX3890PQW</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $649.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-14.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Air Compressor DELTAKX500</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,800.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-15.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Electric Jigsaw JIG7000BQ</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $290.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-16.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Screwdriver SCREW1500ACC</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,499.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="block block-products block-products--layout--large-last" data-mobile-grid-columns="2">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">Bestsellers</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-products__body">
                        <div class="block-products__list">
                            <div class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--hot">Hot</div>
                                    </div>
                                    <div class="product-card__image product-image">
                                        <a href="product.html" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">11 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            $1,019.00
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__image product-image">
                                        <a href="product.html" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            $850.00
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--sale">Sale</div>
                                    </div>
                                    <div class="product-card__image product-image">
                                        <a href="product.html" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">7 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            <span class="product-card__new-price">$949.00</span>
                                            <span class="product-card__old-price">$1189.00</span>
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__image product-image">
                                        <a href="product.html" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-5.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">Brandix Router Power Tool 2017ERXPK</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            $1,700.00
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__image product-image">
                                        <a href="product.html" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-6.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">7 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            $3,199.00
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products__list-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__image product-image">
                                        <a href="product.html" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-7.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">Brandix Pliers</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">4 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            $24.00
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products__featured">
                            <div class="block-products__featured-item">
                                <div class="product-card product-card--hidden-actions ">
                                    <button class="product-card__quickview" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#quickview-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon"></span>
                                    </button>
                                    <div class="product-card__badges-list">
                                        <div class="product-card__badge product-card__badge--new">New</div>
                                    </div>
                                    <div class="product-card__image product-image">
                                        <a href="product.html" class="product-image__body">
                                            <img class="product-image__img" src="images/products/product-1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="product-card__rating-stars">
                                                <div class="rating">
                                                    <div class="rating__body">
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge rating__star--active">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                        <svg class="rating__star " width="13px" height="12px">
                                                            <g class="rating__fill">
                                                                <use xlink:href="images/sprite.svg#star-normal"></use>
                                                            </g>
                                                            <g class="rating__stroke">
                                                                <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                            </g>
                                                        </svg>
                                                        <div class="rating__star rating__star--only-edge ">
                                                            <div class="rating__fill">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                            <div class="rating__stroke">
                                                                <div class="fake-svg-icon"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-legend">9 Reviews</div>
                                        </div>
                                        <ul class="product-card__features-list">
                                            <li>Speed: 750 RPM</li>
                                            <li>Power Source: Cordless-Electric</li>
                                            <li>Battery Cell Type: Lithium</li>
                                            <li>Voltage: 20 Volts</li>
                                            <li>Battery Capacity: 2 Ah</li>
                                        </ul>
                                    </div>
                                    <div class="product-card__actions">
                                        <div class="product-card__availability">
                                            Availability: <span class="text-success">In Stock</span>
                                        </div>
                                        <div class="product-card__prices">
                                            $749.00
                                        </div>
                                        <div class="product-card__buttons">
                                            <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                            <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                            </button>
                                            <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                <svg width="16px" height="16px">
                                                    <use xlink:href="images/sprite.svg#compare-16"></use>
                                                </svg>
                                                <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-products / end -->
            <!-- .block-categories -->
            <div class="block block--highlighted block-categories block-categories--layout--compact">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">Popular Categories</h3>
                        <div class="block-header__divider"></div>
                    </div>
                    <div class="block-categories__list">
                        <div class="block-categories__item category-card category-card--layout--compact">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href=""><img src="images/categories/category-1.jpg" alt=""></a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name">
                                        <a href="">Power Tools</a>
                                    </div>
                                    <ul class="category-card__links">
                                        <li><a href="">Screwdrivers</a></li>
                                        <li><a href="">Milling Cutters</a></li>
                                        <li><a href="">Sanding Machines</a></li>
                                        <li><a href="">Wrenches</a></li>
                                        <li><a href="">Drills</a></li>
                                    </ul>
                                    <div class="category-card__all">
                                        <a href="">Show All</a>
                                    </div>
                                    <div class="category-card__products">
                                        572 Products
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-categories__item category-card category-card--layout--compact">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href=""><img src="images/categories/category-2.jpg" alt=""></a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name">
                                        <a href="">Hand Tools</a>
                                    </div>
                                    <ul class="category-card__links">
                                        <li><a href="">Screwdrivers</a></li>
                                        <li><a href="">Hammers</a></li>
                                        <li><a href="">Spanners</a></li>
                                        <li><a href="">Handsaws</a></li>
                                        <li><a href="">Paint Tools</a></li>
                                    </ul>
                                    <div class="category-card__all">
                                        <a href="">Show All</a>
                                    </div>
                                    <div class="category-card__products">
                                        134 Products
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-categories__item category-card category-card--layout--compact">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href=""><img src="images/categories/category-4.jpg" alt=""></a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name">
                                        <a href="">Machine Tools</a>
                                    </div>
                                    <ul class="category-card__links">
                                        <li><a href="">Lathes</a></li>
                                        <li><a href="">Milling Machines</a></li>
                                        <li><a href="">Grinding Machines</a></li>
                                        <li><a href="">CNC Machines</a></li>
                                        <li><a href="">Sharpening Machines</a></li>
                                    </ul>
                                    <div class="category-card__all">
                                        <a href="">Show All</a>
                                    </div>
                                    <div class="category-card__products">
                                        301 Products
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-categories__item category-card category-card--layout--compact">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href=""><img src="images/categories/category-3.jpg" alt=""></a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name">
                                        <a href="">Power Machinery</a>
                                    </div>
                                    <ul class="category-card__links">
                                        <li><a href="">Generators</a></li>
                                        <li><a href="">Compressors</a></li>
                                        <li><a href="">Winches</a></li>
                                        <li><a href="">Plasma Cutting</a></li>
                                        <li><a href="">Electric Motors</a></li>
                                    </ul>
                                    <div class="category-card__all">
                                        <a href="">Show All</a>
                                    </div>
                                    <div class="category-card__products">
                                        79 Products
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-categories__item category-card category-card--layout--compact">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href=""><img src="images/categories/category-5.jpg" alt=""></a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name">
                                        <a href="">Measurement</a>
                                    </div>
                                    <ul class="category-card__links">
                                        <li><a href="">Tape Measure</a></li>
                                        <li><a href="">Theodolites</a></li>
                                        <li><a href="">Thermal Imagers</a></li>
                                        <li><a href="">Calipers</a></li>
                                        <li><a href="">Levels</a></li>
                                    </ul>
                                    <div class="category-card__all">
                                        <a href="">Show All</a>
                                    </div>
                                    <div class="category-card__products">
                                        366 Products
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-categories__item category-card category-card--layout--compact">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href=""><img src="images/categories/category-6.jpg" alt=""></a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name">
                                        <a href="">Clothes and PPE</a>
                                    </div>
                                    <ul class="category-card__links">
                                        <li><a href="">Winter Workwear</a></li>
                                        <li><a href="">Summer Workwear</a></li>
                                        <li><a href="">Helmets</a></li>
                                        <li><a href="">Belts and Bags</a></li>
                                        <li><a href="">Work Shoes</a></li>
                                    </ul>
                                    <div class="category-card__all">
                                        <a href="">Show All</a>
                                    </div>
                                    <div class="category-card__products">
                                        81 Products
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-categories / end -->
            <!-- .block-products-carousel -->
            <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">New Arrivals</h3>
                        <div class="block-header__divider"></div>
                        <ul class="block-header__groups-list">
                            <li><button type="button" class="block-header__group  block-header__group--active ">All</button></li>
                            <li><button type="button" class="block-header__group ">Power Tools</button></li>
                            <li><button type="button" class="block-header__group ">Hand Tools</button></li>
                            <li><button type="button" class="block-header__group ">Plumbing</button></li>
                        </ul>
                        <div class="block-header__arrows-list">
                            <button class="block-header__arrow block-header__arrow--left" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg>
                            </button>
                            <button class="block-header__arrow block-header__arrow--right" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="block-products-carousel__slider">
                        <div class="block-products-carousel__preloader"></div>
                        <div class="owl-carousel">
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">New</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $749.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--hot">Hot</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,019.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $850.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--sale">Sale</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                <span class="product-card__new-price">$949.00</span>
                                                <span class="product-card__old-price">$1189.00</span>
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Router Power Tool 2017ERXPK</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,700.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-6.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $3,199.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-7.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Pliers</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $24.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-8.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Water Hose 40cm</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $15.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-9.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Spanner Wrench</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $19.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-10.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Water Tap</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $15.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-11.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Hand Tool Kit</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $149.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-12.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Ash's Chainsaw 3.5kW</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $666.99
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-13.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Angle Grinder KZX3890PQW</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $649.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-14.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Air Compressor DELTAKX500</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,800.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-15.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Electric Jigsaw JIG7000BQ</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $290.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__column">
                                <div class="block-products-carousel__cell">
                                    <div class="product-card product-card--hidden-actions ">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-16.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Screwdriver SCREW1500ACC</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,499.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-products-carousel / end -->
            <!-- .block-posts -->
            <div class="block block-posts" data-layout="grid-3" data-mobile-columns="1">
                <div class="container">
                    <div class="block-header">
                        <h3 class="block-header__title">Latest News</h3>
                        <div class="block-header__divider"></div>
                        <div class="block-header__arrows-list">
                            <button class="block-header__arrow block-header__arrow--left" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                                </svg>
                            </button>
                            <button class="block-header__arrow block-header__arrow--right" type="button">
                                <svg width="7px" height="11px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="block-posts__slider">
                        <div class="owl-carousel">
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">Special Offers</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">Philosophy That Addresses Topics Such As Goodness</a>
                                    </div>
                                    <div class="post-card__date">October 19, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">Latest News</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">Logic Is The Study Of Reasoning And Argument Part 2</a>
                                    </div>
                                    <div class="post-card__date">September 5, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-3.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">New Arrivals</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">Some Philosophers Specialize In One Or More Historical Periods</a>
                                    </div>
                                    <div class="post-card__date">August 12, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-4.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">Special Offers</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">A Variety Of Other Academic And Non-Academic Approaches Have Been Explored</a>
                                    </div>
                                    <div class="post-card__date">Jule 30, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-5.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">New Arrivals</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">Germany Was The First Country To Professionalize Philosophy</a>
                                    </div>
                                    <div class="post-card__date">June 12, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-6.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">Special Offers</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">Logic Is The Study Of Reasoning And Argument Part 1</a>
                                    </div>
                                    <div class="post-card__date">May 21, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-7.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">Special Offers</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">Many Inquiries Outside Of Academia Are Philosophical In The Broad Sense</a>
                                    </div>
                                    <div class="post-card__date">April 3, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-8.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">Latest News</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">An Advantage Of Digital Circuits When Compared To Analog Circuits</a>
                                    </div>
                                    <div class="post-card__date">Mart 29, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-9.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">New Arrivals</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">A Digital Circuit Is Typically Constructed From Small Electronic Circuits</a>
                                    </div>
                                    <div class="post-card__date">February 10, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-card  ">
                                <div class="post-card__image">
                                    <a href="">
                                        <img src="images/posts/post-10.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__info">
                                    <div class="post-card__category">
                                        <a href="">Special Offers</a>
                                    </div>
                                    <div class="post-card__name">
                                        <a href="">Engineers Use Many Methods To Minimize Logic Functions</a>
                                    </div>
                                    <div class="post-card__date">January 1, 2019</div>
                                    <div class="post-card__content">
                                        In one general sense, philosophy is associated with wisdom,
                                        intellectual culture and a search for knowledge.
                                        In that sense, all cultures...
                                    </div>
                                    <div class="post-card__read-more">
                                        <a href="" class="btn btn-secondary btn-sm">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-posts / end -->
            <!-- .block-brands -->
            <div class="block block-brands">
                <div class="container">
                    <div class="block-brands__slider">
                        <div class="owl-carousel">
                            <div class="block-brands__item">
                                <a href=""><img src="images/logos/logo-1.png" alt=""></a>
                            </div>
                            <div class="block-brands__item">
                                <a href=""><img src="images/logos/logo-2.png" alt=""></a>
                            </div>
                            <div class="block-brands__item">
                                <a href=""><img src="images/logos/logo-3.png" alt=""></a>
                            </div>
                            <div class="block-brands__item">
                                <a href=""><img src="images/logos/logo-4.png" alt=""></a>
                            </div>
                            <div class="block-brands__item">
                                <a href=""><img src="images/logos/logo-5.png" alt=""></a>
                            </div>
                            <div class="block-brands__item">
                                <a href=""><img src="images/logos/logo-6.png" alt=""></a>
                            </div>
                            <div class="block-brands__item">
                                <a href=""><img src="images/logos/logo-7.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-brands / end -->
            <!-- .block-product-columns -->
            <div class="block block-product-columns d-lg-block d-none">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Top Rated Products</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--new">New</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $749.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--hot">Hot</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">11 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,019.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-3.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $850.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Special Offers</h3>
                                <div class="block-header__divider"></div>
                            </div>  
                            <div class="block-product-columns__column">
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__badges-list">
                                            <div class="product-card__badge product-card__badge--sale">Sale</div>
                                        </div>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-4.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                <span class="product-card__new-price">$949.00</span>
                                                <span class="product-card__old-price">$1189.00</span>
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-5.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Router Power Tool 2017ERXPK</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $1,700.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-6.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Drilling Machine DM2019KW4 4kW</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">7 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $3,199.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="block-header">
                                <h3 class="block-header__title">Bestsellers</h3>
                                <div class="block-header__divider"></div>
                            </div>
                            <div class="block-product-columns__column">
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-7.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Brandix Pliers</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $24.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-8.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Water Hose 40cm</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">4 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $15.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-product-columns__item">
                                    <div class="product-card product-card--hidden-actions product-card--layout--horizontal">
                                        <button class="product-card__quickview" type="button">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="images/sprite.svg#quickview-16"></use>
                                            </svg>
                                            <span class="fake-svg-icon"></span>
                                        </button>
                                        <div class="product-card__image product-image">
                                            <a href="product.html" class="product-image__body">
                                                <img class="product-image__img" src="images/products/product-9.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__name">
                                                <a href="product.html">Spanner Wrench</a>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="product-card__rating-stars">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-legend">9 Reviews</div>
                                            </div>
                                            <ul class="product-card__features-list">
                                                <li>Speed: 750 RPM</li>
                                                <li>Power Source: Cordless-Electric</li>
                                                <li>Battery Cell Type: Lithium</li>
                                                <li>Voltage: 20 Volts</li>
                                                <li>Battery Capacity: 2 Ah</li>
                                            </ul>
                                        </div>
                                        <div class="product-card__actions">
                                            <div class="product-card__availability">
                                                Availability: <span class="text-success">In Stock</span>
                                            </div>
                                            <div class="product-card__prices">
                                                $19.00
                                            </div>
                                            <div class="product-card__buttons">
                                                <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                                <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                                </button>
                                                <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                                    <svg width="16px" height="16px">
                                                        <use xlink:href="images/sprite.svg#compare-16"></use>
                                                    </svg>
                                                    <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .block-product-columns / end -->
        </div>
        <!-- site__body / end -->
        <!-- site__footer -->
        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Contact Us</h5>
                                    <div class="footer-contacts__text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in feugiat lorem. Pellentque ac placerat tellus.
                                    </div>
                                    <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street, New York 10021 USA</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> stroyka@example.com</li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730, (800) 060-0730</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Information</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="" class="footer-links__link">About Us</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Delivery Information</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Privacy Policy</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Brands</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Contact Us</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Returns</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Site Map</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">My Account</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Store Location</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Order History</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Wish List</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Newsletter</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Specials</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Gift Certificates</a></li>
                                        <li class="footer-links__item"><a href="" class="footer-links__link">Affiliate</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Newsletter</h5>
                                    <div class="footer-newsletter__text">
                                        Praesent pellentesque volutpat ex, vitae auctor lorem pulvinar mollis felis at lacinia.
                                    </div>
                                    <form action="" class="footer-newsletter__form">
                                        <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                        <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email Address...">
                                        <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button>
                                    </form>
                                    <div class="footer-newsletter__text footer-newsletter__text--social">
                                        Follow us on social networks
                                    </div>
                                    <!-- social-links -->
                                    <div class="social-links footer-newsletter__social-links social-links--shape--circle">
                                        <ul class="social-links__list">
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--rss" href="" target="_blank">
                                                    <i class="fas fa-rss"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--youtube" href="" target="_blank">
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--facebook" href="" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--twitter" href="" target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--instagram" href="" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- social-links / end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="site-footer__bottom">
                        <div class="site-footer__copyright">
                            <!-- copyright -->
                            Powered by HTML — Design by <a href="https://themeforest.net/user/kos9" target="_blank">Kos</a>
                            <!-- copyright / end -->
                        </div>
                        <div class="site-footer__payments">
                            <img src="images/payments.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="totop">
                    <div class="totop__body">
                        <div class="totop__start"></div>
                        <div class="totop__container container"></div>
                        <div class="totop__end">
                            <button type="button" class="totop__button">
                                <svg width="13px" height="8px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-up-13x8"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- site__footer / end -->
    </div>
    <!-- site / end -->
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- mobilemenu -->
    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="images/sprite.svg#cross-20"></use>
                    </svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="index.html" class="mobile-links__item-link">Home</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index.html" class="mobile-links__item-link">Home 1</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index-2.html" class="mobile-links__item-link">Home 2</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index-3.html" class="mobile-links__item-link">Home 1 Finder</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="index-4.html" class="mobile-links__item-link">Home 2 Finder</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="offcanvas-cart.html" class="mobile-links__item-link">Offcanvas Cart</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="" class="mobile-links__item-link">Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Power Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Engravers</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Wrenches</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Wall Chaser</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Pneumatic Tools</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Machine Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Thread Cutting</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Chip Blowers</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Sharpening Machines</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Pipe Cutters</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Slotting machines</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="" class="mobile-links__item-link">Lathes</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop Grid</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">3 Columns Sidebar</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="shop-grid-4-columns-full.html" class="mobile-links__item-link">4 Columns Full</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="shop-grid-5-columns-full.html" class="mobile-links__item-link">5 Columns Full</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="shop-list.html" class="mobile-links__item-link">Shop List</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right Sidebar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="product.html" class="mobile-links__item-link">Product</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content>
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="product.html" class="mobile-links__item-link">Product</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="product-alt.html" class="mobile-links__item-link">Product Alt</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item>
                                                <div class="mobile-links__item-title">
                                                    <a href="product-sidebar.html" class="mobile-links__item-link">Product Sidebar</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="cart.html" class="mobile-links__item-link">Cart</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="cart-empty.html" class="mobile-links__item-link">Cart Empty</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="checkout.html" class="mobile-links__item-link">Checkout</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="order-success.html" class="mobile-links__item-link">Order Success</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="wishlist.html" class="mobile-links__item-link">Wishlist</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="compare.html" class="mobile-links__item-link">Compare</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="track-order.html" class="mobile-links__item-link">Track Order</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="account-login.html" class="mobile-links__item-link">Account</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-login.html" class="mobile-links__item-link">Login</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-dashboard.html" class="mobile-links__item-link">Dashboard</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-profile.html" class="mobile-links__item-link">Edit Profile</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-orders.html" class="mobile-links__item-link">Order History</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-order-details.html" class="mobile-links__item-link">Order Details</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-addresses.html" class="mobile-links__item-link">Address Book</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-edit-address.html" class="mobile-links__item-link">Edit Address</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="account-password.html" class="mobile-links__item-link">Change Password</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="blog-classic.html" class="mobile-links__item-link">Blog</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-classic.html" class="mobile-links__item-link">Blog Classic</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-grid.html" class="mobile-links__item-link">Blog Grid</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-list.html" class="mobile-links__item-link">Blog List</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="blog-left-sidebar.html" class="mobile-links__item-link">Blog Left Sidebar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="post.html" class="mobile-links__item-link">Post Page</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="post-without-sidebar.html" class="mobile-links__item-link">Post Without Sidebar</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="" class="mobile-links__item-link">Pages</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="about-us.html" class="mobile-links__item-link">About Us</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="contact-us.html" class="mobile-links__item-link">Contact Us</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="contact-us-alt.html" class="mobile-links__item-link">Contact Us Alt</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="404.html" class="mobile-links__item-link">404</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="terms-and-conditions.html" class="mobile-links__item-link">Terms And Conditions</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="faq.html" class="mobile-links__item-link">FAQ</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="components.html" class="mobile-links__item-link">Components</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="typography.html" class="mobile-links__item-link">Typography</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Currency</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">€ Euro</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">£ Pound Sterling</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">$ US Dollar</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">₽ Russian Ruble</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a data-collapse-trigger class="mobile-links__item-link">Language</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">English</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">French</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">German</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Russian</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="" class="mobile-links__item-link">Italian</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- mobilemenu / end -->
    <!-- photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- photoswipe / end -->
    <!-- js -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <script src="vendor/photoswipe/photoswipe.min.js"></script>
    <script src="vendor/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
    <script src="js/number.js"></script>
    <script src="js/main.js"></script>
    <script src="js/header.js"></script>
    <script src="vendor/svg4everybody/svg4everybody.min.js"></script>
    <script>
        svg4everybody();
    </script>
</body>

</html>