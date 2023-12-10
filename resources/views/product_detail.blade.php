@extends('layouts.layout')

@section('title')
    <title>{{ $product->productlangfrontend->name }}</title>
    <meta name="title" content="{{ $product->productlangfrontend->seo_title }}">
    <meta name="description" content="{{ $product->productlangfrontend->seo_description }}">
@endsection

@section('frontend-content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">{{__('user.home')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="javascript:;">{{__('user.Our Products')}}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{__('user.Our Products')}}</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="product product--layout--standard" data-layout="standard">
                    <div class="product__content">
                        <!-- .product__gallery -->
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <button class="product-gallery__zoom">
                                        <i class="fa fa-search-plus"></i>
                                    </button>
                                    <div class="owl-carousel owl-loaded owl-drag" id="product-image">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 2205px;">
                                                <div class="owl-item active" style="width: 441px;">
                                                    <div class="product-image product-image--location--gallery">
                                                        <a href="{{ asset($product->thumbnail_image) }}" data-width="700"
                                                           data-height="700" class="product-image__body"
                                                           target="_blank">
                                                            <img class="product-image__img"
                                                                 src="{{ asset($product->thumbnail_image) }}" alt="product">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 441px;">
                                                    <div class="product-image product-image--location--gallery">
                                                        <a href="images/products/product-16-1.jpg" data-width="700"
                                                           data-height="700" class="product-image__body"
                                                           target="_blank">
                                                            <img class="product-image__img"
                                                                 src="images/products/product-16-1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 441px;">
                                                    <div class="product-image product-image--location--gallery">
                                                        <a href="images/products/product-16-2.jpg" data-width="700"
                                                           data-height="700" class="product-image__body"
                                                           target="_blank">
                                                            <img class="product-image__img"
                                                                 src="images/products/product-16-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 441px;">
                                                    <div class="product-image product-image--location--gallery">
                                                        <a href="images/products/product-16-3.jpg" data-width="700"
                                                           data-height="700" class="product-image__body"
                                                           target="_blank">
                                                            <img class="product-image__img"
                                                                 src="images/products/product-16-3.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="owl-item" style="width: 441px;">
                                                    <div class="product-image product-image--location--gallery">
                                                        <a href="images/products/product-16-4.jpg" data-width="700"
                                                           data-height="700" class="product-image__body"
                                                           target="_blank">
                                                            <img class="product-image__img"
                                                                 src="images/products/product-16-4.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-nav disabled">
                                            <button type="button" role="presentation" class="owl-prev"><span
                                                    aria-label="Previous">‹</span></button>
                                            <button type="button" role="presentation" class="owl-next"><span
                                                    aria-label="Next">›</span></button>
                                        </div>
                                        <div class="owl-dots disabled"></div>
                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel owl-loaded owl-drag" id="product-carousel">
                                        <div class="owl-stage-outer">
                                            <div class="owl-stage"
                                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 569px;">
                                                <div class="owl-item active"
                                                     style="width: 103.75px; margin-right: 10px;"><a
                                                        href="images/products/product-16.jpg"
                                                        class="product-image product-gallery__carousel-item product-gallery__carousel-item--active">
                                                        <div class="product-image__body">
                                                            <img
                                                                class="product-image__img product-gallery__carousel-image"
                                                                src="images/products/product-16.jpg" alt="">
                                                        </div>
                                                    </a></div>
                                                <div class="owl-item active"
                                                     style="width: 103.75px; margin-right: 10px;"><a
                                                        href="images/products/product-16-1.jpg"
                                                        class="product-image product-gallery__carousel-item">
                                                        <div class="product-image__body">
                                                            <img
                                                                class="product-image__img product-gallery__carousel-image"
                                                                src="images/products/product-16-1.jpg" alt="">
                                                        </div>
                                                    </a></div>
                                                <div class="owl-item active"
                                                     style="width: 103.75px; margin-right: 10px;"><a
                                                        href="images/products/product-16-2.jpg"
                                                        class="product-image product-gallery__carousel-item">
                                                        <div class="product-image__body">
                                                            <img
                                                                class="product-image__img product-gallery__carousel-image"
                                                                src="images/products/product-16-2.jpg" alt="">
                                                        </div>
                                                    </a></div>
                                                <div class="owl-item active"
                                                     style="width: 103.75px; margin-right: 10px;"><a
                                                        href="images/products/product-16-3.jpg"
                                                        class="product-image product-gallery__carousel-item">
                                                        <div class="product-image__body">
                                                            <img
                                                                class="product-image__img product-gallery__carousel-image"
                                                                src="images/products/product-16-3.jpg" alt="">
                                                        </div>
                                                    </a></div>
                                                <div class="owl-item" style="width: 103.75px; margin-right: 10px;"><a
                                                        href="images/products/product-16-4.jpg"
                                                        class="product-image product-gallery__carousel-item">
                                                        <div class="product-image__body">
                                                            <img
                                                                class="product-image__img product-gallery__carousel-image"
                                                                src="images/products/product-16-4.jpg" alt="">
                                                        </div>
                                                    </a></div>
                                            </div>
                                        </div>
                                        <div class="owl-nav disabled">
                                            <button type="button" role="presentation" class="owl-prev"><span
                                                    aria-label="Previous">‹</span></button>
                                            <button type="button" role="presentation" class="owl-next"><span
                                                    aria-label="Next">›</span></button>
                                        </div>
                                        <div class="owl-dots disabled"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .product__gallery / end -->
                        <!-- .product__info -->
                        <div class="product__info">
                            <div class="product__wishlist-compare">
                                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                        data-placement="right" title="" data-original-title="Compare">
                                    <i class="fas fa-chart-bar"></i>
                                </button>
                            </div>
                            <h1 class="product__name">Brandix Screwdriver SCREW1500ACC</h1>
                            <div class="product__rating">
                                <div class="product__rating-stars">
                                    <div class="rating">
                                        <div class="rating__body">
                                            <i class="fas fa-star rating__star"></i>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <i class="fas fa-star rating__star"></i>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <i class="fas fa-star rating__star"></i>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <i class="fas fa-star rating__star"></i>
                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <i class="far fa-star rating__star"></i>
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
                                <div class="product__rating-legend">
                                    <a href="">{{ $productReviews->count() }} Reviews</a><span>/</span><a href="">Write A Review</a>
                                </div>
                            </div>
                            <div class="product__description">
                                {!! clean(html_decode($product->productlangfrontend->description), 50) !!}
                            </div>
                        </div>
                        <!-- .product__info / end -->
                        <!-- .product__sidebar -->
                        <div class="product__sidebar">

                            <!-- .product__options -->
                            <form class="product__options">
                                <div class="form-group product__option">
                                    <label class="product__option-label">Price</label>
                                    <div class="product__prices">
                                        $1,499.00
                                    </div>
                                <div class="form-group product__option">
                                    <label class="product__option-label" for="product-quantity">Quantity</label>
                                    <div class="product__actions">
                                        <div class="product__actions-item">
                                            <div class="input-number product__quantity">
                                                <input id="product-quantity"
                                                       class="input-number__input form-control form-control-lg"
                                                       type="number" min="1" value="1">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </div>
                                        <div class="product__actions-item product__actions-item--addtocart">
                                            <button class="btn btn-primary btn-lg">Add to cart</button>
                                        </div>
                                        <div class="product__actions-item product__actions-item--wishlist">
                                            <button type="button" onclick="addWishlist({{ $product->id }})" class="btn btn-secondary btn-svg-icon btn-lg"
                                                    data-toggle="tooltip" title="" data-original-title="Wishlist">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </div>
                                        <div class="product__actions-item product__actions-item--compare">
                                            <button type="button" class="btn btn-secondary btn-svg-icon btn-lg"
                                                    data-toggle="tooltip" title="" data-original-title="Compare">
                                                <i class="fas fa-chart-bar"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- .product__options / end -->

                        </div>
                        <!-- .product__end -->
                        <div class="product__footer">
                            <div class="product__tags tags">
                                <div class="tags__list">
                                    <a href="">Mounts</a>
                                    <a href="">Electrodes</a>
                                    <a href="">Chainsaws</a>
                                </div>
                            </div>
                            <div class="product__share-links share-links">
                                <ul class="share-links__list">
                                    <li class="share-links__item share-links__item--type--like"><a href="">Like</a></li>
                                    <li class="share-links__item share-links__item--type--tweet"><a href="">Tweet</a>
                                    </li>
                                    <li class="share-links__item share-links__item--type--pin"><a href="">Pin It</a>
                                    </li>
                                    <li class="share-links__item share-links__item--type--counter"><a href="">4K</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tabs product-tabs--sticky">
                    <div class="product-tabs__list">
                        <div class="product-tabs__list-body">
                            <div class="product-tabs__list-container container">
                                <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a>
                                <a href="#tab-reviews" class="product-tabs__item">Reviews</a>
                                <a href="#tab-comments" class="product-tabs__item">Comments</a>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs__content">
                        <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                            <div class="typography">
                                <h3>Product Full Description</h3>
                                {!! clean(html_decode($product->productlangfrontend->description)) !!}
                            </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-reviews">
                            <div class="reviews-view">
                                <div class="reviews-view__list">
                                    <h3 class="reviews-view__header">{{__('user.Reviews')}}</h3>
                                    <div class="reviews-list">
                                        <ol class="reviews-list__content">
                                            @foreach ($productReviews as $productReview)
                                            <li class="reviews-list__item">
                                                <div class="review">
                                                    @if($productReview->user->image!=null)
                                                    <div class="review__avatar"><img src="{{ asset($productReview->user->image) }}"
                                                                                     alt="useer"></div>
                                                    @elseif($productReview->user->provider=='google')
                                                        <div class="review__avatar"><img src="{{ asset($productReview->user->provider_avatar) }}"
                                                                                         alt="useer"></div>
                                                    @else
                                                        <div class="review__avatar"><img src="{{ asset($setting->default_avatar) }}"
                                                                                         alt="useer"></div>
                                                    @endif
                                                    <div class="review__content">
                                                        <div class="review__author">{{ html_decode($productReview->user->name) }}</div>
                                                        <div class="review__rating">
                                                            <div class="rating">
                                                                <div class="rating__body">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= $productReview->rating)
                                                                            <i class="fas fa-star"></i>
                                                                        @else
                                                                            <i class="far fa-star"></i>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="review__text">{{ html_decode($productReview->review) }}</div>
                                                        <div class="review__date"><i class="far fa-calendar-alt"></i>
                                                            {{ Carbon\Carbon::parse($productReview->created_at)->format('F d,Y') }} {{__('user.At')}} {{  Carbon\Carbon::parse($productReview->created_at)->format('h:ia') }} </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                        <div class="reviews-list__pagination">
                                            <ul class="pagination justify-content-center">
                                                @if ($productReviews->hasPages())
                                                    <div class="row">
                                                        {{ $productReviews->links('custom_pagination') }}
                                                    </div>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <form class="reviews-view__form" id="productReviewForm" method="POST">
                                    @csrf
                                    <h3 class="reviews-view__header">{{__('user.Write Your Reviews')}}</h3>
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-xl-8">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="review-stars">Review Stars</label>
                                                    <select id="review-stars" class="form-control" name="rating">
                                                        <option>5 Stars Rating</option>
                                                        <option>4 Stars Rating</option>
                                                        <option>3 Stars Rating</option>
                                                        <option>2 Stars Rating</option>
                                                        <option>1 Stars Rating</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" id="author_id" name="author_id" value="{{ $product->author->id }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="review-text">{{__('user.comment')}}*</label>
                                                <textarea class="form-control" name="review" id="review-text" rows="6" placeholder="{{__('user.Type here')}}.."></textarea>
                                            </div>
                                            @if($recaptchaSetting->status==1)
                                                <div class="form-group">
                                                    <div class="g-recaptcha mt-2" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                                </div>
                                            @endif
                                            <div class="form-group mb-0">
                                                <button type="submit" id="reviewSubmitBtn" class="btn btn-primary btn-lg">{{__('user.Submit Review')}}
                                                </button>
                                                <button type="submit" id="reviewShowSpain" class="btn btn-primary btn-lg d-none"><i class="fas fa-spinner fa-spin"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-comments">
                            <div class="comments">
                                <div class="comments-view__list">
                                    <h3 class="reviews-view__header">{{__('user.Comments')}}</h3>
                                    <div class="reviews-list">
                                        <ol class="reviews-list__content">
                                            @foreach ($productComments as $productComment)
                                            <li class="reviews-list__item">
                                                <div class="review">
                                                    @if($productComment->user->image!=null)
                                                    <div class="review__avatar"><img src="{{ asset($productComment->user->image) }}"
                                                                                     alt="useer"></div>
                                                    @elseif($productComment->user->provider=='google')
                                                        <div class="review__avatar"><img src="{{ asset($productComment->user->provider_avatar) }}"
                                                                                         alt="useer"></div>
                                                    @else
                                                        <div class="review__avatar"><img src="{{ asset($setting->default_avatar) }}"
                                                                                         alt="useer"></div>
                                                    @endif
                                                    <div class="review__content">
                                                        <div class="review__author">{{ html_decode($productComment->name) }}</div>

                                                        <div class="review__text">{!! html_decode($productComment->comment) !!}
                                                        </div>
                                                        <div class="review__date"><i class="far fa-calendar-alt"></i>
                                                            {{ Carbon\Carbon::parse($productComment->created_at)->format('F d,Y') }} {{__('user.At')}}
                                                            {{  Carbon\Carbon::parse($productComment->created_at)->format('h:ia') }} </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ol>
                                        <div class="reviews-list__pagination">
                                            <ul class="pagination justify-content-center">
                                                @if ($productReviews->hasPages())
                                                    <div class="row">
                                                        {{ $productReviews->links('custom_pagination') }}
                                                    </div>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <form class="comments-view__form" id="productCommentForm" method="POST">
                                    @csrf
                                    <h3 class="reviews-view__header">{{__('user.Leave a Comment')}}</h3>
                                    <div class="row">
                                        <div class="col-12 col-lg-9 col-xl-8">
                                            <div class="form-group">
                                                <label for="review-text">{{__('user.Comment')}}*</label>
                                                <textarea class="form-control" id="review-text" rows="6" name="comment" placeholder="{{__('user.Type here')}}.."></textarea>
                                            </div>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            @if($recaptchaSetting->status==1)
                                                <div class="form-group">
                                                    <div class="g-recaptcha mt-2" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                                </div>
                                            @endif
                                            <div class="form-group mb-0">
                                                <button type="submit" id="submitBtn" class="btn btn-primary btn-lg">{{__('user.Submit Comment')}}
                                                </button>
                                                <button type="submit" id="showSpain" class="btn btn-primary btn-lg d-none"><i class="fas fa-spinner fa-spin"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @if ($productReviews->hasPages())
                                    <div class="row">
                                        {{ $productReviews->links('custom_pagination') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('frontend_js')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $("#contactWithAuthor").on("submit", function (e) {
                    e.preventDefault();

                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
                    $('#submitBtnn').addClass('d-none');
                    $('#showSpainn').removeClass('d-none');
                    $.ajax({
                        url: "{{ route('contact-with-author') }}",
                        type: "post",
                        data: $('#contactWithAuthor').serialize(),
                        success: function (response) {
                            if (response.status == 1) {
                                toastr.success(response.message)
                                $("#contactWithAuthor").trigger("reset");
                                $('#submitBtnn').removeClass('d-none');
                                $('#showSpainn').addClass('d-none');
                                $('#cancelBtn').click();
                            }

                            if (response.status == 0) {
                                toastr.error(response.message)
                                $("#contactWithAuthor").trigger("reset");
                                $('#submitBtnn').removeClass('d-none');
                                $('#showSpainn').addClass('d-none');
                            }
                        },
                        error: function (response) {
                            if (response.status == 403) {
                                toastr.error(response.responseJSON.message);
                                $('#submitBtnn').removeClass('d-none');
                                $('#showSpainn').addClass('d-none');
                            } else {
                                if (response.responseJSON.errors.message) toastr.error(response.responseJSON.errors.message[0])
                                $('#submitBtnn').removeClass('d-none');
                                $('#showSpainn').addClass('d-none');
                                if (!response.responseJSON.errors.message) {
                                    toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                                }
                            }
                        }
                    });
                });

                $("#productCommentForm").on('submit', function (e) {
                    e.preventDefault();
                    $('#showSpain').removeClass('d-none');
                    $('#submitBtn').addClass('d-none');
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
                    $.ajax({
                        type: 'POST',
                        data: $('#productCommentForm').serialize(),
                        url: "{{ route('product-comment') }}",
                        success: function (response) {
                            if (response.status == 1) {
                                toastr.success(response.message)
                                $("#productCommentForm").trigger("reset");
                                $('#showSpain').addClass('d-none');
                                $('#submitBtn').removeClass('d-none');
                            }
                            if (response.status == 0) {
                                toastr.error(response.message);
                                $('#showSpain').addClass('d-none');
                                $('#submitBtn').removeClass('d-none');
                            }
                        },
                        error: function (response) {
                            $('#showSpain').addClass('d-none');
                            $('#submitBtn').removeClass('d-none');
                            if (response.responseJSON.errors.comment) toastr.error(response.responseJSON.errors.comment[0])
                            if (!response.responseJSON.errors.comment) {
                                toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                            }
                        }
                    });
                });

                $("#productReviewForm").on('submit', function (e) {
                    e.preventDefault();
                    $('#reviewShowSpain').removeClass('d-none');
                    $('#reviewSubmitBtn').addClass('d-none');
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
                    $.ajax({
                        type: 'POST',
                        data: $('#productReviewForm').serialize(),
                        url: "{{ route('product-review') }}",
                        success: function (response) {
                            if (response.status == 1) {
                                toastr.success(response.message)
                                $("#productReviewForm").trigger("reset");
                                $('#reviewShowSpain').addClass('d-none');
                                $('#reviewSubmitBtn').removeClass('d-none');
                            }
                            if (response.status == 0) {
                                toastr.error(response.message);
                                $('#reviewShowSpain').addClass('d-none');
                                $('#reviewSubmitBtn').removeClass('d-none');
                            }
                        },
                        error: function (response) {
                            $('#reviewShowSpain').addClass('d-none');
                            $('#reviewSubmitBtn').removeClass('d-none');
                            if (response.responseJSON.errors.rating) toastr.error(response.responseJSON.errors.rating[0])
                            if (response.responseJSON.errors.review) toastr.error(response.responseJSON.errors.review[0])
                            if (!response.responseJSON.errors.comment) {
                                toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                            }
                        }
                    });
                });

                $('#send_message_btn').on('click', function () {
                    toastr.error('Please login your account');
                });

                $("#variant_id").on("change", function () {
                    let variant_id = $(this).val();

                    $.ajax({
                        url: "{{ url('/variant-price') }}" + "/" + variant_id,
                        type: "get",
                        success: function (response) {
                            if (response) {
                                let variant_price = response.variant.price;
                                let currency_rate = $('#currency_rate').val();
                                $('#price').text(variant_price * currency_rate);
                                $('#image_price').val(variant_price);
                            }
                        }
                    });

                });

                $("#price_type").on("change", function () {
                    let price_type = $(this).val();
                    if (price_type == 'extend price') {
                        $('#reg_price').addClass('d-none');
                        $('#ext_price').removeClass('d-none');
                        $('#extend_content').removeClass('d-none');
                        $('#regular_content').addClass('d-none');
                    } else if (price_type == 'regular price') {
                        $('#reg_price').removeClass('d-none');
                        $('#ext_price').addClass('d-none');
                        $('#regular_content').removeClass('d-none');
                        $('#extend_content').addClass('d-none');
                    }
                });
            });
        })(jQuery);

    </script>

    <script>
        "use strict";
        $(document).ready(function () {
            $('.s1').on('click', function () {
                $('.s2, .s3, .s4, .s5').removeClass('fas fa-star text-warning');
                $('.s2, .s3, .s4, .s5').addClass('fas fa-star');
                $('.s1').removeClass('fas fa-star');
                $('.s1').addClass('fas fa-star text-warning');
                $('.star').val('');
                $('.star').val(1);
                $('.total_star').text('');
                $('.total_star').text('(' + 1 + '.0)');
            });
            $('.s2').on('click', function () {
                $('.s3, .s4, .s5').removeClass('fas fa-star text-warning');
                $('.s3, .s4, .s5').addClass('fas fa-star');
                $('.s1, .s2').removeClass('fas fa-star');
                $('.s1, .s2').addClass('fas fa-star text-warning');
                $('.star').val('');
                $('.star').val(2);
                $('.total_star').text('');
                $('.total_star').text('(' + 2 + '.0)');
            });
            $('.s3').on('click', function () {
                $('.s4, .s5').removeClass('fas fa-star text-warning');
                $('.s4, .s5').addClass('fas fa-star');
                $('.s1, .s2, .s3').removeClass('fas fa-star');
                $('.s1, .s2, .s3').addClass('fas fa-star text-warning');
                $('.star').val('');
                $('.star').val(3);
                $('.total_star').text('');
                $('.total_star').text('(' + 3 + '.0)');
            });
            $('.s4').on('click', function () {
                $('.s5').removeClass('fas fa-star text-warning');
                $('.s5').addClass('fas fa-star ');
                $('.s1, .s2, .s3, .s4').removeClass('fas fa-star');
                $('.s1, .s2, .s3, .s4').addClass('fas fa-star text-warning');
                $('.star').val('');
                $('.star').val(4);
                $('.total_star').text('');
                $('.total_star').text('(' + 4 + '.0)');
            });
            $('.s5').on('click', function () {
                $('.s1, .s2, .s3, .s4, .s5').removeClass('fas fa-star');
                $('.s1, .s2, .s3, .s4, .s5').addClass('fas fa-star text-warning');
                $('.star').val('');
                $('.star').val(5);
                $('.total_star').text('');
                $('.total_star').text('(' + 5 + '.0)');
            });
        })
    </script>
@endpush
