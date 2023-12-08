@extends('layouts.layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{{ $seo_setting->seo_description }}">
@endsection

@section('frontend-content')
    <!-- site__body -->
    <div class="site__body">
        <div class="block-map block">
            <div class="block-map__body">
                {!! $contact->map !!}
            </div>
        </div>
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">{{__('user.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:;">{{__('user.Contact Us')}}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="card mb-0">
                    <div class="card-body contact-us">
                        <div class="contact-us__container">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <h4 class="contact-us__header card-title">Our Address</h4>
                                    <div class="contact-us__address">
                                        <p>
                                            <a>{!! nl2br($contact->contactlangfrontend->address) !!}</a><br>
                                            Email: <a>{!! nl2br($contact->email) !!}</a><br>
                                            Phone Number: <a>{!! nl2br($contact->contactlangfrontend->phone) !!}</a>
                                        </p>
                                        <p>
                                            <strong>{{ $contact->contactlangfrontend->title2 }}</strong><br>
                                            Support time: {{ $contact->contactlangfrontend->time }}<br>
                                            Off day: {{ $contact->contactlangfrontend->off_day }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="contact-us__header card-title">{{ $contact->contactlangfrontend->title1 }}</h4>
                                    <form action="{{ route('send-contact-message') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">{{__('user.Name')}}*</label>
                                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="{{__('user.Name')}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">{{__('user.Phone')}}</label>
                                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="{{__('user.Phone')}}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="form-name">{{__('user.Email')}}*</label>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{__('user.Email')}}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="form-email">{{__('user.Subject')}}*</label>
                                                <input type="text" class="form-control" name="subject" value="{{ old('subject') }}" placeholder="{{__('user.Subject')}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="form-message">{{__('user.Message')}}*</label>
                                            <textarea class="form-control" rows="4" name="message" placeholder="{{__('user.Write a Message')}}">{{ old('message') }}</textarea>
                                        </div>
                                        @if($recaptchaSetting->status==1)
                                            <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                            </div>
                                        @endif
                                        <button type="submit" class="btn btn-primary">{{__('user.Send Message')}}</button>
                                    </form>
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
