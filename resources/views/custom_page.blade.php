@extends('layouts.layout')
@section('title')
    <title>{{ $page->page_name }}</title>
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascritp:;">{{ $page->customlangfrontend->page_name }}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="document">
                    <div class="document__header">
                        <h1 class="document__title">{{ $page->customlangfrontend->page_name }}</h1>
                    </div>
                    <div class="document__content typography">
                        {!! clean($page->customlangfrontend->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site__body / end -->
@endsection
