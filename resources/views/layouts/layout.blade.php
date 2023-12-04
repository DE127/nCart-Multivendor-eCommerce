<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="_token" content="{{ csrf_token() }}">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    @php
        $setting = App\Models\Setting::with('settinglangfrontend')->first();
        $languages = App\Models\Language::where('status', 1)->get();
        $currencies = App\Models\MultiCurrency::where('status', 1)->get();
        $front_lang = Session::get('front_lang');
        $language = App\Models\Language::where('is_default', 'Yes')->first();
        if($front_lang == ''){
        $front_lang = Session::put('front_lang', $language->lang_code);
        }
        $lang_direction = App\Models\Language::where('lang_code', $front_lang)->first();
    
        $currency_code = Session::get('currency_code');
        $currency_icon = Session::get('currency_icon');
        $currency_rate = Session::get('currency_rate');
        $currency_position = Session::get('currency_position');
    
        $default_currency = App\Models\MultiCurrency::where('is_default', 'Yes')->first();
    
        if($currency_code == ''){
        $currency_code = Session::put('currency_code', $default_currency->currency_code);
        }
    
        if($currency_icon == ''){
        $currency_icon = Session::put('currency_icon', $default_currency->currency_icon);
        }
    
        if($currency_rate == ''){
        $currency_rate = Session::put('currency_rate', $default_currency->currency_rate);
        }
    
        if($currency_position == ''){
        $currency_position = Session::put('currency_position', $default_currency->currency_position);
        }

    @endphp
    <link rel="icon" type="image/png" href="{{ asset($setting->favicon) }}">
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/photoswipe/photoswipe.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/photoswipe/default-skin/default-skin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- font - fontawesome -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css') }}">
    <!-- font - stroyka -->
    <link rel="stylesheet" href="{{ asset('frontend/fonts/stroyka/stroyka.css') }}">

    <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}">

    <style>
        .tox .tox-promotion,
        .tox-statusbar__branding {
            display: none !important;
        }
    </style>
</head>

<body>
    <!-- site -->
    <div class="site">
        <!-- mobile site__header -->
        @include('partials.header')
        <!-- desktop site__header / end -->
        <!-- site__body -->
        @yield('frontend-content')
        <!-- site__body / end -->
        <!--=============================
        SUBSCRIBE END
    ==============================-->
        @endif


        @php
            $footer = App\Models\Footer::first();
            $item_sold = App\Models\OrderItem::get()->count();
            $total_earning = App\Models\OrderItem::get()->sum('price');
            $total_user = App\Models\User::where(['email_verified' => 1, 'status' => 1])->get()->count();
            $social_links=App\Models\FooterSocialLink::get();
            $setting = App\Models\Setting::with('settinglangfrontend')->first();
        @endphp

        <!--=============================
        FOOTER START
        ==============================-->
        <!-- site__footer -->
        @include('partials.footer')
        <!-- site__footer / end -->
    </div>
    <!-- site / end -->
    <!-- quickview-modal -->
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <!-- quickview-modal / end -->
    <!-- mobilemenu -->
    @include('partials.mobilemenu')
    <!-- mobilemenu / end -->
    <!-- photoswipe -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--<button class="pswp__button pswp__button&#45;&#45;share" title="Share"></button>-->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- photoswipe / end -->
    <!-- js -->
    <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/photoswipe/photoswipe-ui-default.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/number.js') }}"></script>
    <script src="{{ asset('frontend/js/main1.js') }}"></script>
    <script src="{{ asset('frontend/js/header.js') }}"></script>
    <script src="{{ asset('frontend/vendor/svg4everybody/svg4everybody.min.js') }}"></script>
    <script>
        svg4everybody();
    </script>
    <!--jquery library js-->
    <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
    <!--countup js-->
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
    <!--slick js-->
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <!--nice select js-->
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <!--wow js-->
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <!--price range js-->
    <script src="{{ asset('frontend/js/price_range_script.js') }}"></script>
    <script src="{{ asset('frontend/js/price_range_ui.min.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <!--summernote js-->
    <script src="{{ asset('frontend/js/summernote.min.js') }}"></script>

    <script src="{{ asset('frontend/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('backend/js/select2.min.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('backend/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('messege') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
        @endif
    </script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error('{{ $error }}');
    </script>
    @endforeach
    @endif

    @stack('frontend_js')

    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#fsubscriberForm").on('submit', function(e) {
                    e.preventDefault();
                    $('#fsubShowSpain').removeClass('d-none');
                    $('#fsubSubmitBtn').addClass('d-none');
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    let loading = "{{__('user.Processing...')}}"

                    $("#fsubscribe_btn").html(loading);
                    $("#fsubscribe_btn").attr('disabled', true);

                    $.ajax({
                        type: 'POST',
                        data: $('#fsubscriberForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function(response) {
                            if (response.status == 1) {
                                toastr.success(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#fsubscribe_btn").html(subscribe);
                                $("#fsubscribe_btn").attr('disabled', false);
                                $("#fsubscriberForm").trigger("reset");
                                $('#fsubShowSpain').addClass('d-none');
                                $('#fsubSubmitBtn').removeClass('d-none');
                            }

                            if (response.status == 0) {
                                toastr.error(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#fsubscribe_btn").html(subscribe);
                                $("#fsubscribe_btn").attr('disabled', false);
                                $("#fsubscriberForm").trigger("reset");
                                $('#fsubShowSpain').addClass('d-none');
                                $('#fsubSubmitBtn').removeClass('d-none');
                            }
                        },
                        error: function(err) {
                            $('#fsubShowSpain').addClass('d-none');
                            $('#fsubSubmitBtn').removeClass('d-none');
                            toastr.error('Something went wrong');
                            let subscribe = "{{__('user.Subscribe')}}"
                            $("#fsubscribe_btn").html(subscribe);
                            $("#fsubscribe_btn").attr('disabled', false);
                            $("#fsubscriberForm").trigger("reset");
                        }
                    });
                });


                $("#footerTopSubscriberForm").on('submit', function(e) {
                    e.preventDefault();
                    $('#footerTopSubShowSpain').removeClass('d-none');
                    $('#footerTopSubSubmitBtn').addClass('d-none');
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    let loading = "{{__('user.Processing...')}}"

                    $("#fsubscribe_btn").html(loading);
                    $("#fsubscribe_btn").attr('disabled', true);

                    $.ajax({
                        type: 'POST',
                        data: $('#footerTopSubscriberForm').serialize(),
                        url: "{{ route('subscribe-request') }}",
                        success: function(response) {
                            if (response.status == 1) {
                                toastr.success(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#fsubscribe_btn").html(subscribe);
                                $("#fsubscribe_btn").attr('disabled', false);
                                $("#footerTopSubscriberForm").trigger("reset");
                                $('#footerTopSubShowSpain').addClass('d-none');
                                $('#footerTopSubSubmitBtn').removeClass('d-none');
                            }

                            if (response.status == 0) {
                                toastr.error(response.message);
                                let subscribe = "{{__('user.Subscribe')}}"
                                $("#fsubscribe_btn").html(subscribe);
                                $("#fsubscribe_btn").attr('disabled', false);
                                $("#footerTopSubscriberForm").trigger("reset");
                                $('#footerTopSubShowSpain').addClass('d-none');
                                $('#footerTopSubSubmitBtn').removeClass('d-none');
                            }
                        },
                        error: function(err) {
                            $('#footerTopSubShowSpain').addClass('d-none');
                            $('#footerTopSubSubmitBtn').removeClass('d-none');
                            toastr.error('Something went wrong');
                            let subscribe = "{{__('user.Subscribe')}}"
                            $("#fsubscribe_btn").html(subscribe);
                            $("#fsubscribe_btn").attr('disabled', false);
                            $("#footerTopSubscriberForm").trigger("reset");
                        }
                    });
                });

                $("#country_id").on("change", function() {
                    var countryId = $("#country_id").val();
                    if (countryId) {
                        $.ajax({
                            type: "get",
                            url: "{{url('/state-by-country/')}}" + "/" + countryId,
                            success: function(response) {
                                $("#state_id").html(response.states);
                            },
                            error: function(err) {

                            }
                        })
                    } else {
                        var response = "<option value=''>{{__('user.Select a State')}}</option>";
                        $("#state_id").html(response);
                    }

                });

                $("#state_id").on("change", function() {
                    var stateId = $("#state_id").val();
                    if (stateId) {
                        $.ajax({
                            type: "get",
                            url: "{{url('/city-by-state/')}}" + "/" + stateId,
                            success: function(response) {
                                $("#city_id").html(response.cities);
                            },
                            error: function(err) {

                            }
                        })
                    } else {
                        var response = "<option value=''>{{__('user.Select a city')}}</option>";
                        $("#state_id").html(response);
                    }

                });

                $('.select2').select2();
                tinymce.init({
                    selector: '#editor',
                    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
                    mergetags_list: [{
                            value: 'First.Name',
                            title: 'First Name'
                        },
                        {
                            value: 'Email',
                            title: 'Email'
                        },
                    ]
                });
            });
        })(jQuery);
    </script>

    <script>
        "use strict";
        //wishlist start
        function addWishlist(product_id) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ url('/add/wishlist/') }}/" + product_id,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.success);
                    } else {
                        toastr.error(response.error);
                    }
                }
            })
        };
        //wishlist end
        //cart start
        function addToCard(product_id) {
            let product_type = $('#product_type').val();
            let regular_price = $('#script_regular_price').val();
            let extend_price = $('#script_extend_price').val();
            let price = $('#image_price').val();
            let variant_id = $('#variant_id option:selected').val();
            let variant_name = $('#variant_id option:selected').text();
            let price_type = $('#price_type option:selected').val();
            let product_name = $('#product_name').val();
            let slug = $('#slug').val();
            let category_name = $('#category_name').val();
            let category_id = $('#category_id').val();
            let product_image = $('#product_image').val();
            let author_name = $('#author_name').val();
            let author_id = $('#author_id').val();
            $.ajax({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                type: "POST",
                dataType: "json",
                data: {
                    product_type: product_type,
                    regular_price: regular_price,
                    extend_price: extend_price,
                    price: price,
                    variant_id: variant_id,
                    variant_name: variant_name,
                    price_type: price_type,
                    product_name: product_name,
                    slug: slug,
                    category_name: category_name,
                    category_id: category_id,
                    product_image: product_image,
                    author_name: author_name,
                    author_id: author_id,
                },
                url: "{{ url('/add-to-cart') }}" + "/" + product_id,
                success: function(response) {
                    miniCart();
                    if (response.status == 1) {
                        toastr.success(response.message);
                    }
                    if (response.status == 0) {
                        toastr.error(response.message);
                    }
                }
            });
        };
        //add to cart function end
        //mini cart function start
        function miniCart() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ url('/mini-cart') }}",
                success: function(response) {
                    $('#cartQty').text(response.cartQty);
                }
            });
        }
        miniCart();
        //mini cart function end

        //cart item  function start
        function cartItem() {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ url('/cart-item') }}",
                success: function(response) {
                    let cartItem = "";
                    $('#cartTotal').text(response.cartTotal);
                    $.each(response.carts, function(key, value) {
                        cartItem += `<tr>
                                    <td class="img">
                                        <a href="{{ url('/product/${value.options.slug}') }}">
                                            <img src="${ value.options.image }" alt="cart item"
                                                class="img-fluid w-100">
                                        </a>
                                    </td>
                                    <td class="description">
                                        <h3><a href="{{ url('/product/${value.options.slug}') }}">${value.name}</a></h3>
                                        <p>
                                            <span>{{__('user.Item by')}}</span> ${value.options.author}
                                            <b class="${value.options.variant_name!=null?'':'d-none'}">${value.options.variant_name!=null?value.options.variant_name:''}</b>
                                            <b class="${value.options.price_type!=null?'':'d-none'}">${value.options.price_type!=null?value.options.price_type:''}</b>
                                        </p>

                                    </td>
                                    <td class="price">
                                        <p>${response.setting.currency_icon+value.price}</p>
                                    </td>
                                    <td class="discount">
                                        <p>${value.options.category}</p>
                                    </td>
                                    <td class="action">
                                        <a href="javascript:;" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="far fa-times"></i></a>
                                    </td>
                            </tr>`;
                    });
                    $('#cartItem').html(cartItem);
                }
            });
        }
        cartItem();

        function cartRemove(rowId) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "{{ url('/cart-remove') }}" + "/" + rowId,
                success: function(response) {
                    miniCart();
                    cartItem();
                    couponCalculation();
                    if (response.status == 1) {
                        toastr.success(response.message);
                    }
                }
            });
        };
        //cart item function end
        //coupon start
        function couponApply() {
            let coupon_name = $('#coupon_name').val();
            if (coupon_name) {
                $.ajax({
                    headers: {
                        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                    },
                    type: "POST",
                    dataType: "json",
                    data: {
                        coupon_name: coupon_name,
                    },
                    url: "{{ url('/coupon-apply') }}",
                    success: function(response) {
                        if (response.status == 1) {
                            $('#coupon_name').val('');
                            couponCalculation();
                            toastr.success(response.message);
                        }
                        if (response.status == 0) {
                            $('#coupon_name').val('');
                            toastr.error(response.message);
                        }
                    }
                });
            } else {
                let coupon_valid = $('#coupon_valid').val();
                toastr.error(coupon_valid);
            }
        };

        function couponCalculation() {
            $.ajax({
                type: "GET",
                url: "{{ url('/coupon-calculation') }}",
                dataType: 'json',
                success: function(data) {
                    if (data.total) {
                        $('#calprice').html(`
                        <p class="subtotal">{{__('user.Subtotal')}} <span>${data.setting.currency_icon}<span id="cartTotal">${data.total}</span></span></p>
                        <p class="discount">{{__('user.Discount')}} <span>(-)${data.setting.currency_icon} 0</span></p>
                        <p class="total">{{__('user.Total')}} <span><span>${data.setting.currency_icon}<span>${data.total}</span></span></p>
                        <a class="common_btn" href="{{ route('checkout') }}">{{__('user.Proceed to Checkout')}}</a>
                    `);
                    } else {
                        $('#calprice').html(`
                        <p class="subtotal">{{__('user.Subtotal')}} <span>${data.setting.currency_icon}<span id="cartTotal">${data.sub_total}</span></span></p>
                        <p class="subtotal">{{__('user.Coupon')}} <span>${data.coupon_name} <button type="submit" class="btn btn-danger btn-sm" onclick="couponRemove()"><i class="fa fa-times"></i></button></span></p>
                        <p class="discount">{{__('user.Discount')}} <span>(-)${data.setting.currency_icon} ${data.discount_amount}</span></p>
                        <p class="total">{{__('user.Total')}} <span><span>${data.setting.currency_icon}</span>${data.total_amount}</span></p>
                        <a class="common_btn" href="{{ route('checkout') }}">{{__('user.Proceed to Checkout')}}</a>
                    `);
                    }
                }
            });
        };
        couponCalculation();

        function couponRemove() {
            $.ajax({
                type: "GET",
                url: "{{ url('/coupon-remove') }}",
                dataType: 'json',
                success: function(response) {
                    $('#coupon_name').val('');
                    couponCalculation();
                    if (response.status == 1) {
                        toastr.success(response.message);
                    }
                }
            })
        }
        //coupon end
    </script>
</body>

</html>