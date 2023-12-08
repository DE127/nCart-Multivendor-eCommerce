@php
    $maintainance = App\Models\MaintainanceText::first();
@endphp

@extends($active_theme)

@section('title')
    <title>{{__("Maintainance")}}</title>
@endsection

@section('frontend-content')
    <div class="site__body">
        <div class="block">
            <div class="container">
                <div class="not-found">
                    <div class="not-found__404">
                        Page Under Maintainance
                    </div>
                    <div class="not-found__content">
                        <p class="not-found__text">
                            {!! clean(nl2br($maintainance->description)) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
