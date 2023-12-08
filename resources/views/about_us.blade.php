@extends('layouts.layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('frontend-content')
    <!-- site__body -->
    <div class="site__body">
        <div class="block about-us">
            <div class="about-us__image" style="background: url({{ asset($about_us->banner_image) }});"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-10">
                        <div class="about-us__body">
                            <h1 class="about-us__title">{{ $about_us->aboutlangfrontend->title }}</h1>
                            <div class="about-us__text typography">
                                {!! clean($about_us->aboutlangfrontend->about_us ) !!}
                            </div>
                            <div class="about-us__team">
                                <h2 class="about-us__team-title">{{ $about_us->aboutlangfrontend->header1 }}</h2>
                                <div class="about-us__team-subtitle text-muted">{{ $about_us->aboutlangfrontend->header2 }}<br>{{ $about_us->aboutlangfrontend->header3 }}</div>
                                <div class="about-us__teammates teammates">
                                    <div class="">
                                        <div style="margin: 0 auto;">
                                        <div class="teammates__item teammate">
                                            <div class="teammate__avatar">
                                                <img src="{{ asset($about_us->image) }}" alt="{{ $about_us->aboutlangfrontend->name }}" class="img-fluid w-10">
                                            </div>
                                            <div class="teammate__name">{{ $about_us->aboutlangfrontend->name }}</div>
                                            <div class="teammate__position text-muted">{{ $about_us->aboutlangfrontend->desgination }}</div>
                                            <div class="teammate__avatar">
                                                <img src="{{ asset($about_us->signature) }}" alt="about" class="img-fluid w-40">
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
@endsection
