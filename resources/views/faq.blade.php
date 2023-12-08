@extends('layouts.layout')
@section('title')
    <title>{{__('user.FAQ')}}</title>
@endsection

@section('frontend-content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">{{__('user.Home')}}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:;">{{__('user.FAQ')}}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>{{__('user.FAQ')}}</h1>
                </div>
            </div>
        </div>
        <div class="block faq">
            <div class="container">
                @foreach ($faqs as $index=>$faq)
                <div class="faq__section">
                    <div class="faq__section-body">
                        <div class="row">
                            <div class="faq__section-column col-12 col-lg-6">
                                <div class="typography">
                                    <h6>{{ $faq->faqlangfrontend->question }}</h6>
                                    <p>
                                        {!! clean($faq->faqlangfrontend->answer) !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
