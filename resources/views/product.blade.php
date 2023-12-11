@extends('layouts.layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('frontend-content')
    <!-- site__body -->
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">{{__('user.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('user.Our Products')}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{__('user.Our Products')}}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shop-layout shop-layout--sidebar--start">
                <div class="shop-layout__sidebar">
                    <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                        <div class="block-sidebar__backdrop"></div>
                        <div class="block-sidebar__body">
                            <div class="block-sidebar__header">
                                <div class="block-sidebar__title">Filters</div>
                                <button class="block-sidebar__close" type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                                    <h4 class="widget-filters__title widget__title">Filters</h4>
                                    <div class="widget-filters__list">
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Categories
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-categories">
                                                            <ul class="filter-categories__list">
                                                                @foreach ($categories as $category)
                                                                    @php
                                                                        $total_product = App\Models\Product::where(['status' => 1, 'category_id'=>$category->id])->count();
                                                                    @endphp
                                                                    <li class="filter-categories__item filter-categories__item--parent">
                                                                        <i class="filter-categories__arrow"></i>
                                                                        <a href="javascript:;" onclick="getCatSlug('{{ $category->slug }}')">{{ $category->catlangfrontend->name }}</a>
                                                                        <div class="filter-categories__counter">{{ $total_product }}</div>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened" data-collapse-item>
                                                <button type="button" class="filter__title" data-collapse-trigger>
                                                    Price
                                                    <svg class="filter__arrow" width="12px" height="7px">
                                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                                    </svg>
                                                </button>
                                                <div class="filter__body" data-collapse-content>
                                                    <div class="filter__container">
                                                        <div class="filter-price" data-min="0" data-max="1000" data-from="0" data-to="1000">
                                                            <div class="filter-price__slider"></div>
                                                            <div class="filter-price__title">{{__('user.Price')}}: $<span class="filter-price__min-value">0</span> – $<span class="filter-price__max-value">1000</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="filter_min_price" name="min_price" value="0">
                                                <input type="hidden" id="filter_max_price" name="max_price" value="1000">
                                                <input type="hidden" id="get_min_price" value="{{ $min_price }}">
                                                <input type="hidden" id="get_max_price" value="{{ $max_price }}">
                                                <input type="hidden" id="product_max_price" value="{{ $product_max_price }}">
                                                <input type="hidden" id="session_currency_rate" value="{{ session()->get('currency_rate') }}">
                                                <button class="common_btn mt-3 w-100" onclick="priceFilter()" type="submit">{{__('user.Filter')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__list products-list" data-layout="grid-3-sidebar" data-with-features="false" data-mobile-grid-columns="2">
                                <div class="products-list__body">
                                    @forelse ($products as $product)
                                        <div class="products-list__item">
                                            <div class="product-card product-card--hidden-actions ">
                                                <button class="product-card__quickview" type="button">
                                                    <i class="fas fa-eye"></i>
                                                    <span class="fake-svg-icon"></span>
                                                </button>
                                                <div class="product-card__badges-list">
                                                    <div class="product-card__badge product-card__badge--new">New</div>
                                                </div>
                                                <div class="product-card__image product-image">
                                                    <a href="{{ route('product-detail', $product->slug) }}" class="product-image__body">
                                                        <img class="product-image__img" src="{{ asset($product->thumbnail_image) }}" alt="gallery">
                                                    </a>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__name">
                                                        <a href="{{ route('product-detail', $product->slug) }}">{{ html_decode($product->productlangfrontend->name) }}</a>
                                                    </div>
                                                    <div class="product-card__rating">
                                                        <div class="product-card__rating-stars">
                                                            @php
                                                                $review=App\Models\Review::where(['product_id' => $product->id, 'status' => 1])->get()->average('rating');
                                                                $sale=App\Models\OrderItem::where(['product_id' => $product->id])->get()->count();
                                                            @endphp
                                                            <div class="rating">
                                                                <div class="rating__body">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        @if ($review > $i)
                                                                            <i class="fas fa-star"></i>
                                                                        @else
                                                                            <i class="far fa-star"></i>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-card__rating-legend">{{ $sale }} {{__('user.Sale')}}</div>
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
                                                            <i class="fas fa-chart-bar"></i>
                                                            <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="products-list__item">
                                            <div class="alert alert-danger text-center">
                                                {{__('user.No Products Found')}}
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="products-view__pagination">
                                {{ $products->links('custom_pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
@endsection
@push('frontend_js')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function () {

                $("#sorting").on("change", function(){
                    $("#search_sorting").val($(this).val());
                    $("#productSearchForm").submit();

                });

                $("#search_form").on("submit", function(e){
                    e.preventDefault();

                    $("#keyword").val($("#search_keyword").val());
                    $("#productSearchForm").submit();
                });
            });
        })(jQuery);
        function getCatSlug(slug){
            $("#search_category_slug").val(slug);
            $("#productSearchForm").submit();
        }

        function priceFilter(){
            let filter_min_price = $('#filter_min_price').val();
            let filter_max_price = $('#filter_max_price').val();
            $('#search_min_price').val(filter_min_price);
            $('#search_max_price').val(filter_max_price);
            $("#productSearchForm").submit();
        }
    </script>
@endpush
