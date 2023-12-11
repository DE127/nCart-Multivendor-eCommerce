@extends('layouts.layout')
@section('title')
    <title>{{__('user.Login')}}</title>
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
                                <a href="index.html">Home</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="">Breadcrumb</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">My Account</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title">
                    <h1>My Account</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex flex-column">
                        <div class="card flex-grow-1 mb-md-0">
                            <div class="card-body">
                                <h3 class="card-title">Login</h3>
                                <form action="{{ route('store-login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="passowrd_input" class="form-control" placeholder="Password">
                                        <small class="form-text text-muted">
                                            <a href="{{ route('forget-password') }}">{{__('user.Forget Password')}}</a>
                                        </small>
                                    </div>
                                    @if($recaptchaSetting->status==1)
                                        <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>
                                            </div>
                                    @endif
                                    <div class="form-group">
                                        <div class="form-check">
                                                <span class="form-check-input input-check">
                                                    <span class="input-check__body">
                                                        <input class="input-check__input" type="checkbox" value="" id="flexCheckDefault" name="remember">
                                                        <span class="input-check__box"></span>
                                                        <i class="input-check__icon fas fa-check"></i>
                                                    </span>
                                                </span>
                                            <label class="form-check-label" for="login-remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Login</button>
                                </form>
                                @if ($socialLogin->is_gmail == 1)
                                            <a href="{{ route('login-google') }}">
                                                <span><img src="{{ asset('frontend/images/google_icon.png') }}" alt="google" class="img-fluid w-100"></span>
                                                {{__('user.Sign In with Google')}}
                                            </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column mt-4 mt-md-0">
                        <div class="card flex-grow-1 mb-0">
                            <div class="card-body">
                                <h3 class="card-title">Register</h3>
                                <form action="{{ route('store-register') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>{{__('user.Name')}}</label>
                                        <input class="form-control" type="text" name="name" placeholder="{{__('user.Name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" name="email" placeholder="{{__('user.Email')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="r_passowrd_input" name="password" placeholder="Password">
                                        <span id="r_show_password"><i class="fas fa-eye-slash"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" class="form-control" name="c_password" id="c_passowrd_input" placeholder="Password">
                                        <span id="c_show_password"><i class="fas fa-eye-slash"></i></span>
                                    </div>
                                    @if($recaptchaSetting->status==1)
                                        <div class="form-group">
                                                <div class="g-recaptcha" data-sitekey="{{ $recaptchaSetting->site_key }}"></div>

                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary mt-4">Register</button>
                                </form>
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
    "use strict";
    let password_show = false;
    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#show_password").on("click", function(){
                password_show = !password_show;
                if(password_show){
                    $(this).html('<i class="fas fa-eye"></i>')

                    $('#passowrd_input').prop('type', 'text');

                }else{
                    $(this).html('<i class="fas fa-eye-slash"></i>')
                    $('#passowrd_input').prop('type', 'password');
                }
            })
        });
    })(jQuery);

    let r_password_show = false;
    let c_password_show = false;
    (function($) {
        "use strict";
        $(document).ready(function () {
            $("#r_show_password").on("click", function(){
                password_show = !password_show;
                if(password_show){
                    $(this).html('<i class="fas fa-eye"></i>')

                    $('#r_passowrd_input').prop('type', 'text');

                }else{
                    $(this).html('<i class="fas fa-eye-slash"></i>')
                    $('#r_passowrd_input').prop('type', 'password');
                }
            });

            $("#c_show_password").on("click", function(){
                c_password_show = !c_password_show;
                if(c_password_show){
                    $(this).html('<i class="fas fa-eye"></i>')

                    $('#c_passowrd_input').prop('type', 'text');

                }else{
                    $(this).html('<i class="fas fa-eye-slash"></i>')
                    $('#c_passowrd_input').prop('type', 'password');
                }
            })
        });
    })(jQuery);
</script>
@endpush
