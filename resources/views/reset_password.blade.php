@extends('layouts.layout')
@section('title')
    <title>{{__('user.Reset Password')}}</title>
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
                                <form>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                        <small class="form-text text-muted">
                                            <a href="">Forgotten Password</a>
                                        </small>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                                <span class="form-check-input input-check">
                                                    <span class="input-check__body">
                                                        <input class="input-check__input" type="checkbox" id="login-remember">
                                                        <span class="input-check__box"></span>
                                                        <svg class="input-check__icon" width="9px" height="7px">
                                                            <use xlink:href="images/sprite.svg#check-9x7"></use>
                                                        </svg>
                                                    </span>
                                                </span>
                                            <label class="form-check-label" for="login-remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex flex-column mt-4 mt-md-0">
                        <div class="card flex-grow-1 mb-0">
                            <div class="card-body">
                                <h3 class="card-title">Register</h3>
                                <form>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
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
    let c_password_show = false;
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
