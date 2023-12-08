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
                                <a href="{{ route('home') }}">{{__('user.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="javascript:;">{{__('user.Blog')}}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{__('user.Blog')}}</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="block">
                        <div class="posts-view">
                            <div class="posts-view__list posts-list posts-list--layout--grid2">
                                <div class="posts-list__body">
                                    @forelse ($blogs as $blog)
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--grid post-card--size--nl">
                                                <div class="post-card__image">
                                                    <a href="{{ route('blog', $blog->slug) }}">
                                                        <img src="{{ asset($blog->image) }}" alt="blog">
                                                    </a>
                                                </div>
                                                <div class="post-card__info"
                                                <div class="post-card__name">
                                                    <a href="{{ route('blog', $blog->slug) }}">{{ $blog->bloglanguagefrontend->title }}</a>
                                                </div>
                                                <div
                                                    class="post-card__date">{{ Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</div>
                                                <div class="post-card__content">
                                                    {{ $blog->bloglanguagefrontend->short_description }}
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12 text-center mt-5">
                                            <h2 class="text-danger">{{__('user.Blog Not Found')}}</h2>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="wsus__pagination mt_25">
                                <div class="row">
                                    {{ $blogs->links('custom_pagination') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="block block-sidebar block-sidebar--position--end">
                        <div class="block-sidebar__item">
                            <div class="widget-search">
                                <form class="widget-search__body" id="search_form">
                                    <input class="widget-search__input" name="keyword" id="keyword" value="{{ request()->get('keyword') }}" placeholder="{{__('user.Search')}}" type="text"
                                           autocomplete="off" spellcheck="false">
                                    <button class="widget-search__button" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="block-sidebar__item">
                            <div class="widget-aboutus widget">
                                <h4 class="widget__title">About Blog</h4>
                                <!-- social-links -->
                                <div class="social-links widget-aboutus__socials social-links--shape--rounded">
                                    <ul class="social-links__list">
                                        @php
                                            $social_links=App\Models\FooterSocialLink::get()
                                        @endphp
                                        @foreach ($social_links as $link)
                                            <li class="social-links__item">
                                                <a class="social-links__link social-links__link--type--rss" href="{{ $link->link }}"
                                                   target="_blank">
                                                    <i class="{{ $link->icon }}"></i>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- social-links / end -->
                            </div>
                        </div>
                        <div class="block-sidebar__item">
                            <div class="widget-categories widget-categories--location--blog widget">
                                <h4 class="widget__title">{{__('user.Categories')}}</h4>
                                <ul class="widget-categories__list" data-collapse
                                    data-collapse-opened-class="widget-categories__item--open">
                                    @foreach ($categories as $category)
                                        @php
                                            $total_blog = App\Models\Blog::where(['blog_category_id' => $category->id, 'status' => 1])->count();
                                        @endphp
                                        <li class="widget-categories__item" data-collapse-item>
                                            <div class="widget-categories__row">
                                                <a href="{{ $category->slug }}">
                                                    {{ $category->blogcategorylanguagefrontend->category_name }}
                                                </a>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="block-sidebar__item">
                            <div class="widget-posts widget">
                                <h4 class="widget__title">{{__('user.Popular Post')}}</h4>
                                <div class="widget-posts__list">
                                    @foreach ($popular_blogs as $blog)
                                    <div class="widget-posts__item">
                                        <div class="widget-posts__image">
                                            <a href="{{ route('blog', $blog->slug) }}">
                                                <img src="{{ asset($blog->image) }}" alt="blog">
                                            </a>
                                        </div>
                                        <div class="widget-posts__info" style="margin: 10px">
                                            <div class="widget-posts__name">
                                                <a href="{{ route('blog', $blog->slug) }}">{{ $blog->bloglanguagefrontend->title }}</a>
                                            </div>
                                            <div class="widget-posts__date"><i class="fas fa-calendar-alt"></i> {{ Carbon\Carbon::parse($blog->created_at)->format('d-m-Y') }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="block-sidebar__item">
                            <div class="widget-newsletter widget">
                                <h4 class="widget-newsletter__title">{{ $subscriber->title }}</h4>
                                <div class="widget-newsletter__text">
                                    {!! clean($subscriber->description) !!}
                                </div>
                                <form id="subscriberForm" class="widget-newsletter__form">
                                    @csrf
                                    <label for="widget-newsletter-email" class="sr-only">Email Address</label>
                                    <input id="widget-newsletter-email" type="text" name="email" class="form-control"
                                           placeholder="{{__('user.Enter Your Email Address')}}">
                                    <button type="submit" class="btn btn-primary mt-3" id="subSubmitBtn">{{__('user.Subscribe')}}</button>
                                    <button type="submit" class="btn btn-primary mt-3 d-none" id="subShowSpain"><i class="fas fa-spinner fa-spin"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="block-sidebar__item">
                            <div class="widget-tags widget">
                                <h4 class="widget__title">{{__('user.Popular Tags')}}</h4>
                                <div class="tags tags--lg">
                                    <div class="tags__list">
                                        @foreach ($popular_tags as $popular_tag)
                                            <a href="{{ $popular_tag->tag_name }}">{{ $popular_tag->tag_name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('blogs') }}" id="blogSearchForm">

        @if (request()->has('keyword'))
            <input type="hidden" name="keyword" value="{{ request()->get('keyword') }}" id="keyword_form">
        @else
            <input type="hidden" name="keyword" value="" id="keyword_form">
        @endif

        @if (request()->has('category'))
            <input type="hidden" name="category" value="{{ request()->get('category') }}" id="category_form">
        @else
            <input type="hidden" name="category" value="" id="category_form">
        @endif

    </form>
    <!-- site__body / end -->
@endsection
@push('frontend_js')
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $("#blogCommentForm").on('submit', function (e) {
                    e.preventDefault();
                    $('#showspin').removeClass('d-none');
                    $('#submitBtn').addClass('d-none');
                    submitBtn
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
                    $.ajax({
                        type: 'POST',
                        data: $('#blogCommentForm').serialize(),
                        url: "{{ route('blog-comment') }}",
                        success: function (response) {
                            if (response.status == 1) {
                                toastr.success(response.message)
                                $("#blogCommentForm").trigger("reset");
                                $('#showspin').addClass('d-none');
                                $('#submitBtn').removeClass('d-none');
                            }
                        },
                        error: function (response) {
                            $('#showspin').addClass('d-none');
                            $('#submitBtn').removeClass('d-none');
                            if (response.responseJSON.errors.name) toastr.error(response.responseJSON.errors.name[0])
                            if (response.responseJSON.errors.email) toastr.error(response.responseJSON.errors.email[0])
                            if (response.responseJSON.errors.comment) toastr.error(response.responseJSON.errors.comment[0])

                            if (!response.responseJSON.errors.name && !response.responseJSON.errors.email && !response.responseJSON.errors.comment) {
                                toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                            }
                        }
                    });
                });


                $("#subscriberForm").on('submit', function (e) {
                    e.preventDefault();
                    $('#subShowSpain').removeClass('d-none');
                    $('#subSubmitBtn').addClass('d-none');
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    let loading = "{{__('user.Processing...')}}"

                    $("#subscribe_btn").html(loading);
                    $("#subscribe_btn").attr('disabled', true);

                    $.ajax({
                        type: 'POST',
                        data: $('#subscriberForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function (response) {
                            if (response.status == 1) {
                                toastr.success(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#subscribe_btn").html(subscribe);
                                $("#subscribe_btn").attr('disabled', false);
                                $("#subscriberForm").trigger("reset");
                                $('#subShowSpain').addClass('d-none');
                                $('#subSubmitBtn').removeClass('d-none');
                            }

                            if (response.status == 0) {
                                toastr.error(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#subscribe_btn").html(subscribe);
                                $("#subscribe_btn").attr('disabled', false);
                                $("#subscriberForm").trigger("reset");
                                $('#subShowSpain').addClass('d-none');
                                $('#subSubmitBtn').removeClass('d-none');
                            }
                        },
                        error: function (err) {
                            $('#subShowSpain').addClass('d-none');
                            $('#subSubmitBtn').removeClass('d-none');
                            toastr.error('Something went wrong');
                            let subscribe = "{{__('user.Subscribe')}}"
                            $("#subscribe_btn").html(subscribe);
                            $("#subscribe_btn").attr('disabled', false);
                            $("#subscriberForm").trigger("reset");
                        }
                    });
                });

                $("#search_form").on("submit", function (e) {
                    e.preventDefault();
                    $("#keyword_form").val($("#keyword").val());
                    $("#blogSearchForm").submit();
                });

            });
        })(jQuery);

        function getCatSlug(slug) {
            $("#category_form").val(slug);
            $("#blogSearchForm").submit();
        }

        function getCatTag(tag) {
            $("#keyword_form").val(tag);
            $("#blogSearchForm").submit();
        }

    </script>
@endpush
