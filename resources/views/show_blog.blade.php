@extends('layouts.layout')
@section('title')
    <title>{{ $blog->bloglanguagefrontend->title }}</title>
    <meta name="title" content="{{ $blog->bloglanguagefrontend->seo_title }}">
    <meta name="description" content="{{ $blog->bloglanguagefrontend->seo_description }}">
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:;">{{__('user.blog details')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="block post post--layout--classic">
                        <div class="post__header post-header post-header--layout--classic">

                            <h1 class="post-header__title">{{ $blog->bloglanguagefrontend->title }}</h1>
                            <div class="post-header__meta">
                                <div class="post-header__meta-item"><i class="far fa-user"></i> {{__('user.By')}} {{ $blog->admin->name }}</div>
                                <div class="post-header__meta-item"><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</div>
                                <div class="post-header__meta-item"><i class="far fa-comment-lines"></i> {{ $blog_comments->count() }} {{__('user.Comments')}}</div>
                            </div>
                        </div>
                        <div class="post__featured">
                            <a href="">
                                <img src="{{ asset($blog->image) }}" alt="">
                            </a>
                        </div>
                        <div class="post__content typography ">
                            {!! clean($blog->bloglanguagefrontend->description) !!}
                        </div>
                        <div class="post__footer">
                            <div class="post__tags-share-links">
                                @php
                                    $tag_arr=[];
                                    $tags=explode(', ', $blog->bloglanguagefrontend->tag);
                                    foreach($tags as $tag){
                                        $tag_arr[]=$tag;
                                    }
                                    array_pop($tag_arr);
                                @endphp
                                <div class="post__tags tags">
                                    <div class="tags__list">
                                        @foreach ($tag_arr as $tag)
                                           <a href="{{ route('blogs', ['keyword' => strtolower($tag)]) }}">#{{ $tag }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="post__share-links share-links">
                                    <ul class="share-links__list">
                                        <li><span>{{__('user.share')}}:</span></li>
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog', $blog->slug) }}&t={{ $blog->title }}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('blog', $blog->slug) }}&title={{ $blog->title }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="https://twitter.com/share?text={{ $blog->title }}&url={{ route('blog', $blog->slug) }}"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-author">
                                <div class="post-author__avatar">
                                    <img src="{{ asset($blog->admin->image) }}" alt="">
                                </div>
                                <div class="post-author__info">
                                    <div class="post-author__name">
                                        <a href="">{{ $blog->admin->name }}</a>
                                    </div>
                                    <div class="post-author__about">
                                        {{ $blog->admin->description }}
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur suscipit suscipit mi, non
                                        tempor nulla finibus eget. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="post__section">
                            <h4 class="post__section-title">Comments ({{ $blog_comments->count() }} {{__('user.Comments')}})</h4>
                            <ol class="comments-list comments-list--level--0">
                                @if ($blog_comments->count()>0)
                                    @foreach ($blog_comments as $comment)
                                        <li class="comments-list__item">
                                    <div class="comment">
                                        <div class="comment__avatar">
                                            <a href=""><img src="{{ asset($setting->default_avatar) }}" alt="useer" class="img-fluid w-50"></a>
                                        </div>
                                        <div class="comment__content">
                                            <div class="comment__header">
                                                <div class="comment__author">
                                                    <a href="">{{ html_decode($comment->name) }}</a>
                                                    <p>{{ '@'.html_decode(strtolower(str_replace(' ', '_', $comment->name))) }}</p>
                                                </div>
                                            </div>
                                            <div class="comment__text">{{ html_decode($comment->comment) }}</div>
                                            <div class="comment__date"><i class="far fa-calendar-alt"></i> {{ Carbon\Carbon::parse($comment->created_at)->format('F d,Y') }} {{__('user.At')}} {{ Carbon\Carbon::parse($comment->created_at)->format('h:i A') }}</div>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                                        @if ($blog_comments->hasPages())
                                            <div class="row">
                                                {{ $blog_comments->links('custom_pagination') }}
                                            </div>
                                        @endif
                                @endif
                            </ol>
                        </section>
                        <section class="post__section">
                            <h4 class="post__section-title">{{__('user.Leave a Comment')}}</h4>
                            <form id="blogCommentForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="comment-last-name">{{__('user.name')}}*</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="{{__('user.Name')}}">
                                        <input type="hidden" name="blog_id" id="blog_id" value="{{ $blog->id }}">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="comment-email">{{__('user.email')}}*</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="{{__('user.Email')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="comment-content">{{__('user.message')}}*</label>
                                    <textarea class="form-control" name="comment" id="comment" rows="6" placeholder="{{__('user.Type your comment here')}}"></textarea>
                                </div>
                                @if($recaptchaSetting->status==1)
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                    </div>
                                @endif
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">{{__('user.Submit Comment')}}</button>
                                    <button type="submit" class="btn btn-primary btn-lg d-none" id="showspin"><i class="fas fa-spinner fa-spin"></i></button>
                                </div>
                            </form>
                        </section>
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
                                        @php
                                            $popular_tags=explode(', ', $blog->bloglanguagefrontend->tag);
                                            array_pop($popular_tags);
                                        @endphp
                                        @foreach ($popular_tags as $popular_tag)
                                            <a href="{{ $popular_tag }}">{{ $popular_tag }}</a>
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
        (function($) {
            "use strict";
            $(document).ready(function () {
                $("#blogCommentForm").on('submit', function(e){
                    e.preventDefault();
                    $('#showspin').removeClass('d-none');
                    $('#submitBtn').addClass('d-none');
                    submitBtn
                    var isDemo = "{{ env('APP_MODE') }}"
                    if(isDemo == 'DEMO'){
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }
                    $.ajax({
                        type: 'POST',
                        data: $('#blogCommentForm').serialize(),
                        url: "{{ route('blog-comment') }}",
                        success: function (response) {
                            if(response.status == 1){
                                toastr.success(response.message)
                                $("#blogCommentForm").trigger("reset");
                                $('#showspin').addClass('d-none');
                                $('#submitBtn').removeClass('d-none');
                            }
                        },
                        error: function(response) {
                            $('#showspin').addClass('d-none');
                            $('#submitBtn').removeClass('d-none');
                            if(response.responseJSON.errors.name)toastr.error(response.responseJSON.errors.name[0])
                            if(response.responseJSON.errors.email)toastr.error(response.responseJSON.errors.email[0])
                            if(response.responseJSON.errors.comment)toastr.error(response.responseJSON.errors.comment[0])

                            if(!response.responseJSON.errors.name && !response.responseJSON.errors.email && !response.responseJSON.errors.comment){
                                toastr.error("{{__('user.Please complete the recaptcha to submit the form')}}")
                            }
                        }
                    });
                });


                $("#subscriberForm").on('submit', function(e){
                    e.preventDefault();
                    $('#subShowSpain').removeClass('d-none');
                    $('#subSubmitBtn').addClass('d-none');
                    var isDemo = "{{ env('APP_MODE') }}"
                    if(isDemo == 'DEMO'){
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    let loading = "{{__('user.Processing...')}}"

                    $("#subscribe_btn").html(loading);
                    $("#subscribe_btn").attr('disabled',true);

                    $.ajax({
                        type: 'POST',
                        data: $('#subscriberForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function (response) {
                            if(response.status == 1){
                                toastr.success(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#subscribe_btn").html(subscribe);
                                $("#subscribe_btn").attr('disabled',false);
                                $("#subscriberForm").trigger("reset");
                                $('#subShowSpain').addClass('d-none');
                                $('#subSubmitBtn').removeClass('d-none');
                            }

                            if(response.status == 0){
                                toastr.error(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#subscribe_btn").html(subscribe);
                                $("#subscribe_btn").attr('disabled',false);
                                $("#subscriberForm").trigger("reset");
                                $('#subShowSpain').addClass('d-none');
                                $('#subSubmitBtn').removeClass('d-none');
                            }
                        },
                        error: function(err) {
                            $('#subShowSpain').addClass('d-none');
                            $('#subSubmitBtn').removeClass('d-none');
                            toastr.error('Something went wrong');
                            let subscribe = "{{__('user.Subscribe')}}"
                            $("#subscribe_btn").html(subscribe);
                            $("#subscribe_btn").attr('disabled',false);
                            $("#subscriberForm").trigger("reset");
                        }
                    });
                })


            });
        })(jQuery);

    </script>
@endpush
