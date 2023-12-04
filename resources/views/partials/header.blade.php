<header class="site__header d-lg-none">
    <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
    <div class="mobile-header mobile-header--sticky" data-sticky-mode="pullToShow">
        <div class="mobile-header__panel">
            <div class="container">
                <div class="mobile-header__body">
                    <button class="mobile-header__menu-button" style="padding: 5px; margin: 10px">
                        <i class="fas fa-bars" style="color: white"></i>
                    </button>
                    <a class="mobile-header__logo" href="{{ route('home') }}">
                        <!-- mobile-logo -->
                        <img src="{{ asset($setting->logo) }}" style="height: 40px; margin: auto 40px auto auto">
                        <!-- mobile-logo / end -->
                    </a>
                    <div class="search search--location--mobile-header mobile-header__search">
                        <div class="search__body">
                            <form class="search__form" action="{{ route('products') }}" method="GET">
                                <input class="search__input" name="keyword" placeholder="{{__('user.Search your products')}}..."
                                       aria-label="Site search" type="text" autocomplete="off">
                                <button class="search__button search__button--type--submit"
                                        type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="search__button search__button--type--close" type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="search__border"></div>
                            </form>
                            <div class="search__suggestions suggestions suggestions--location--mobile-header"></div>
                        </div>
                    </div>
                    <div class="mobile-header__indicators" style="margin-left: auto;margin-right: 0;">
                        <div class="indicator indicator--mobile-search indicator--mobile d-md-none">
                            <button class="indicator__button">
                                        <span class="indicator__area">
                                            <i class="fas fa-search"></i>
                                        </span>
                            </button>
                        </div>
{{--                        <div class="indicator indicator--mobile d-sm-flex d-none">--}}
{{--                            <a href="wishlist" class="indicator__button">--}}
{{--                                        <span class="indicator__area">--}}
{{--                                            <svg width="20px" height="20px">--}}
{{--                                                <use xlink:href="images/sprite.svg#heart-20"></use>--}}
{{--                                            </svg>--}}
{{--                                            <span class="indicator__value">0</span>--}}
{{--                                        </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="indicator indicator--mobile">
                            <a href="{{ route('cart-view') }}" class="indicator__button">
                                        <span class="indicator__area">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span class="indicator__value">3</span>
                                        </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- mobile site__header / end -->
<!-- desktop site__header -->
<header class="site__header d-lg-block d-none">
    <div class="site-header">
        <!-- .topbar -->
        <div class="site-header__topbar topbar">
            <div class="topbar__container container">
                <div class="topbar__row">
                    @php
                        $discount =  App\Models\ProductDiscount::first();
                        $today = Carbon\Carbon::now();
                        $end_time = $discount->end_time;
                        $end_year = date('Y', strtotime($end_time));
                        $end_month = date('m', strtotime($end_time));
                        $end_day = date('d', strtotime($end_time));
                    @endphp
                    <div class="topbar__item topbar__item--link" style="margin-left: 4px; padding: 2px 8px;">
                        <a class="topbar-link" href="{{ $discount->link }}"><span style="font-weight: bolder">{{ $discount->offer }}% </span> {{ $discount->discountlangfrontend->title }}
                        </a>
                    </div>
                    <div class="topbar__item topbar__item--link"
                         style="margin-left: 4px; padding: 2px 8px; border: 1px solid black; border-radius: 5px">
                        <a class="topbar-link" href="#">{{ $end_year }}</a>
                    </div>
                    <div class="topbar__item topbar__item--link"
                         style="margin-left: 4px; padding: 2px 8px; border: 1px solid black; border-radius: 5px">
                        <a class="topbar-link" href="#">{{ $end_month }}</a>
                    </div>
                    <div class="topbar__item topbar__item--link"
                         style="margin-left: 4px; padding: 2px 8px; border: 1px solid black; border-radius: 5px">
                        <a class="topbar-link" href="#">{{ $end_day }}</a>
                    </div>
                    <div class="topbar__spring"></div>
                    <div class="topbar__item">
                        <div class="topbar-dropdown">
                            <button class="topbar-dropdown__btn" type="button">
                                My Account
                                <svg width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg>
                            </button>
                            <div class="topbar-dropdown__body">
                                <!-- .menu -->
                                <div class="menu menu--layout--topbar ">
                                    <div class="menu__submenus-container"></div>
                                    <ul class="menu__list">
                                        <li class="menu__item">
                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                            <div class="menu__item-submenu-offset"></div>
                                            <a class="menu__item-link" href="{{ route('dashboard') }}">
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="menu__item">
                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                            <div class="menu__item-submenu-offset"></div>
                                            <a class="menu__item-link" href="{{ route('dashboard') }}">
                                                {{__('user.Overview')}}
                                            </a>
                                        </li>
                                        <li class="menu__item">
                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                            <div class="menu__item-submenu-offset"></div>
                                            <a class="menu__item-link" href="{{ route('select-product-type') }}">
                                                {{__('user.Start Selling')}}
                                            </a>
                                        </li>
                                        <li class="menu__item">
                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                            <div class="menu__item-submenu-offset"></div>
                                            <a class="menu__item-link" href="{{ route('portfolio') }}">
                                                {{__('user.Portfolio')}}
                                            </a>
                                        </li>
                                        <li class="menu__item">
                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                            <div class="menu__item-submenu-offset"></div>
                                            <a class="menu__item-link" href="{{ route('download') }}">
                                                {{__('user.Download File')}}
                                            </a>
                                        </li>
                                        <li class="menu__item">
                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                            <div class="menu__item-submenu-offset"></div>
                                            <a class="menu__item-link" href="{{ route('collection') }}">
                                                {{__('user.Collection')}}
                                            </a>
                                        </li>
                                        <li class="menu__item">
                                            <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                            <div class="menu__item-submenu-offset"></div>
                                            <a class="menu__item-link" href="{{ route('edit-profile') }}">
                                                {{__('user.Edit profile')}}
                                            </a>
                                        </li>
                                        @if (Auth::guard('web')->check())
                                            <li class="menu__item">
                                                <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                <div class="menu__item-submenu-offset"></div>
                                                <a class="menu__item-link" href="{{ route('change-password') }}">
                                                    {{__('user.Change Password')}}
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                <div class="menu__item-submenu-offset"></div>
                                                <a class="menu__item-link" href="{{ route('user.logout') }}">
                                                    {{__('user.Logout')}}
                                                </a>
                                            </li>
                                        @else
                                            <li class="menu__item">
                                                <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                <div class="menu__item-submenu-offset"></div>
                                                <a class="menu__item-link" href="{{ route('login') }}">
                                                    {{__('user.Login')}}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <!-- .menu / end -->
                            </div>
                        </div>
                    </div>
                    <div class="topbar__item" style="margin: auto 10px">
                        <div class="topbar-dropdown">
                            <button class="topbar-dropdown__btn" type="button">
                                <span
                                    class="topbar__item-value">{{ $currencies->first()->currency_name }} - {{ $currencies->first()->currency_code }}</span>
                                <svg width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="topbar__item">
                        <div class="topbar-dropdown">
                            <button class="topbar-dropdown__btn" type="button">
                                Language: <span class="topbar__item-value">{{ $language->first()->lang_name }}</span>
                                <svg width="7px" height="5px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .topbar / end -->
    <div class="site-header__nav-panel">
        <!-- data-sticky-mode - one of [pullToShow, alwaysOnTop] -->
        <div class="nav-panel nav-panel--sticky" data-sticky-mode="pullToShow">
            <div class="nav-panel__container container">
                <div class="nav-panel__row">
                    <div class="nav-panel__logo">
                        <a href="{{ route('home') }}">
                            <!-- logo -->
                            <img src="{{ asset($setting->logo) }}" style="height: 40px; margin: auto 40px auto auto">
                            <!-- logo / end -->
                        </a>
                    </div>
                    <!-- .nav-links -->
                    <div class="nav-panel__nav-links nav-links">
                        <ul class="nav-links__list">
                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                @php($route = route('home',['theme' => 1]))
                                <a class="nav-links__item-link" href="{{ route('home') }}">
                                    <div class="nav-links__item-body">
                                        {{__('user.Home')}}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                <a class="nav-links__item-link" href="{{ route('products') }}">
                                    <div class="nav-links__item-body">
                                        {{__('user.Product')}}
                                    </div>
                                </a>
                                {{--                                    <div--}}
                                {{--                                        class="nav-links__submenu nav-links__submenu--type--megamenu nav-links__submenu--size--nl">--}}
                                {{--                                        <!-- .megamenu -->--}}
                                {{--                                        <div class="megamenu ">--}}
                                {{--                                            <div class="megamenu__body">--}}
                                {{--                                                <div class="row">--}}
                                {{--                                                    <div class="col-6">--}}
                                {{--                                                        <ul class="megamenu__links megamenu__links--level--0">--}}
                                {{--                                                            <li class="megamenu__item  megamenu__item--with-submenu ">--}}
                                {{--                                                                <a href="">Power Tools</a>--}}
                                {{--                                                                <ul class="megamenu__links megamenu__links--level--1">--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Engravers</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Wrenches</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Wall--}}
                                {{--                                                                            Chaser</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Pneumatic--}}
                                {{--                                                                            Tools</a></li>--}}
                                {{--                                                                </ul>--}}
                                {{--                                                            </li>--}}
                                {{--                                                            <li class="megamenu__item  megamenu__item--with-submenu ">--}}
                                {{--                                                                <a href="">Machine Tools</a>--}}
                                {{--                                                                <ul class="megamenu__links megamenu__links--level--1">--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Thread--}}
                                {{--                                                                            Cutting</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Chip--}}
                                {{--                                                                            Blowers</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Sharpening--}}
                                {{--                                                                            Machines</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Pipe--}}
                                {{--                                                                            Cutters</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Slotting--}}
                                {{--                                                                            machines</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Lathes</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                </ul>--}}
                                {{--                                                            </li>--}}
                                {{--                                                        </ul>--}}
                                {{--                                                    </div>--}}
                                {{--                                                    <div class="col-6">--}}
                                {{--                                                        <ul class="megamenu__links megamenu__links--level--0">--}}
                                {{--                                                            <li class="megamenu__item  megamenu__item--with-submenu ">--}}
                                {{--                                                                <a href="">Hand Tools</a>--}}
                                {{--                                                                <ul class="megamenu__links megamenu__links--level--1">--}}
                                {{--                                                                    <li class="megamenu__item"><a--}}
                                {{--                                                                            href="">Screwdrivers</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Handsaws</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Knives</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Axes</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Multitools</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Paint--}}
                                {{--                                                                            Tools</a></li>--}}
                                {{--                                                                </ul>--}}
                                {{--                                                            </li>--}}
                                {{--                                                            <li class="megamenu__item  megamenu__item--with-submenu ">--}}
                                {{--                                                                <a href="">Garden Equipment</a>--}}
                                {{--                                                                <ul class="megamenu__links megamenu__links--level--1">--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Motor--}}
                                {{--                                                                            Pumps</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Chainsaws</a>--}}
                                {{--                                                                    </li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Electric--}}
                                {{--                                                                            Saws</a></li>--}}
                                {{--                                                                    <li class="megamenu__item"><a href="">Brush--}}
                                {{--                                                                            Cutters</a></li>--}}
                                {{--                                                                </ul>--}}
                                {{--                                                            </li>--}}
                                {{--                                                        </ul>--}}
                                {{--                                                    </div>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                        <!-- .megamenu / end -->--}}
                                {{--                                    </div>--}}
                            </li>
                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                <a class="nav-links__item-link" href="{{ route('about-us') }}">
                                    <div class="nav-links__item-body">
                                        {{__('user.About Us')}}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                <a class="nav-links__item-link" href="{{ route('contact-us') }}">
                                    <div class="nav-links__item-body">
                                        {{__('user.Contact')}}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                <a class="nav-links__item-link" href="{{ route('blogs') }}">
                                    <div class="nav-links__item-body">
                                        {{__('user.Blog')}}
                                    </div>
                                </a>
                            </li>
                            <li class="nav-links__item  nav-links__item--has-submenu ">
                                <a class="nav-links__item-link" href="javascript:;">
                                    <div class="nav-links__item-body">
                                        {{__('user.Pages')}}
                                    </div>
                                </a>
                                <div class="nav-links__submenu nav-links__submenu--type--menu">
                                    <!-- .menu -->
                                    <div class="menu menu--layout--classic ">
                                        <div class="menu__submenus-container"></div>
                                        <ul class="menu__list">
                                            <li class="menu__item">
                                                <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                <div class="menu__item-submenu-offset"></div>
                                                <a class="menu__item-link" href="{{ route('become-author-page') }}">
                                                    {{__('user.Become an Author')}}
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                <div class="menu__item-submenu-offset"></div>
                                                <a class="menu__item-link" href="{{ route('faq') }}">
                                                    {{__('user.FAQ')}}
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                <div class="menu__item-submenu-offset"></div>
                                                <a class="menu__item-link" href="{{ route('privacy-policy') }}">
                                                    {{__('user.Privacy Policy')}}
                                                </a>
                                            </li>
                                            <li class="menu__item">
                                                <!-- This is a synthetic element that allows to adjust the vertical offset of the submenu using CSS. -->
                                                <div class="menu__item-submenu-offset"></div>
                                                <a class="menu__item-link" href="{{ route('terms-and-conditions') }}">
                                                    {{__('user.Terms and Condition')}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- .menu / end -->
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- .nav-links / end -->
                    <div class="nav-panel__indicators" style="margin-left: auto;margin-right: 0;">
                        <div class="indicator indicator--trigger--click">
                            <button type="button" class="indicator__button">
                                            <span class="indicator__area">
                                                    <i class="fas fa-search"></i>
                                            </span>
                            </button>
                            <div class="indicator__dropdown">
                                <div class="search search--location--indicator ">
                                    <div class="search__body">
                                        <form class="search__form" action="{{ route('products') }}" method="GET">
                                            <input class="search__input" name="keyword" placeholder="{{__('user.Search your products')}}..."
                                                   aria-label="Site search" type="text" autocomplete="off">
                                            <button class="search__button search__button--type--submit"
                                                    type="submit">
                                                <i class="fas fa-search"></i>
                                            </button>
                                            <div class="search__border"></div>
                                        </form>
                                        <div
                                            class="search__suggestions suggestions suggestions--location--indicator"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="indicator">--}}
{{--                            <a href="wishlist" class="indicator__button">--}}
{{--                                            <span class="indicator__area">--}}
{{--                                                <svg width="20px" height="20px">--}}
{{--                                                    <use xlink:href="images/sprite.svg#heart-20"></use>--}}
{{--                                                </svg>--}}
{{--                                                <span class="indicator__value">0</span>--}}
{{--                                            </span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
                        <div class="indicator indicator--trigger--click">
                            <a href="{{ route('cart-view') }}" class="indicator__button">
                                            <span class="indicator__area">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span class="indicator__value" id="cartQty">0</span>
                                            </span>
                            </a>
                            <div class="indicator__dropdown">
                                <!-- .dropcart -->
                                <div class="dropcart dropcart--style--dropdown">
                                    <div class="dropcart__body">
                                        <div class="dropcart__products-list">
                                            <div class="dropcart__product">
                                                <div class="product-image dropcart__product-image">
                                                    <a href="product.html" class="product-image__body">
                                                        <img class="product-image__img"
                                                             src="images/products/product-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="dropcart__product-info">
                                                    <div class="dropcart__product-name"><a href="product.html">Electric
                                                            Planer Brandix KL370090G 300 Watts</a></div>
                                                    <ul class="dropcart__product-options">
                                                        <li>Color: Yellow</li>
                                                        <li>Material: Aluminium</li>
                                                    </ul>
                                                    <div class="dropcart__product-meta">
                                                        <span class="dropcart__product-quantity">2</span> ×
                                                        <span class="dropcart__product-price">$699.00</span>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                        class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                    <svg width="10px" height="10px">
                                                        <use xlink:href="images/sprite.svg#cross-10"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="dropcart__product">
                                                <div class="product-image dropcart__product-image">
                                                    <a href="product.html" class="product-image__body">
                                                        <img class="product-image__img"
                                                             src="images/products/product-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="dropcart__product-info">
                                                    <div class="dropcart__product-name"><a href="product.html">Undefined
                                                            Tool IRadix DPS3000SY 2700 watts</a></div>
                                                    <div class="dropcart__product-meta">
                                                        <span class="dropcart__product-quantity">1</span> ×
                                                        <span class="dropcart__product-price">$849.00</span>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                        class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                    <svg width="10px" height="10px">
                                                        <use xlink:href="images/sprite.svg#cross-10"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="dropcart__product">
                                                <div class="product-image dropcart__product-image">
                                                    <a href="product.html" class="product-image__body">
                                                        <img class="product-image__img"
                                                             src="images/products/product-5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="dropcart__product-info">
                                                    <div class="dropcart__product-name"><a href="product.html">Brandix
                                                            Router Power Tool 2017ERXPK</a></div>
                                                    <ul class="dropcart__product-options">
                                                        <li>Color: True Red</li>
                                                    </ul>
                                                    <div class="dropcart__product-meta">
                                                        <span class="dropcart__product-quantity">3</span> ×
                                                        <span class="dropcart__product-price">$1,210.00</span>
                                                    </div>
                                                </div>
                                                <button type="button"
                                                        class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                    <svg width="10px" height="10px">
                                                        <use xlink:href="images/sprite.svg#cross-10"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="dropcart__totals">
                                            <table>
                                                <tr>
                                                    <th>Subtotal</th>
                                                    <td>$5,877.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>$25.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>$5,902.00</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="dropcart__buttons">
                                            <a class="btn btn-secondary" href="cart.html">View Cart</a>
                                            <a class="btn btn-primary" href="checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- .dropcart / end -->
                            </div>
                        </div>
                        <div class="indicator indicator--trigger--click">
                            @if (Auth::guard('web')->check())
                            <a href="{{ route('dashboard') }}" class="indicator__button">
                                            <span class="indicator__area">
                                                <i class="fas fa-user"></i>
                                            </span>
                            </a>
                            @else
                            <a href="{{ route('login') }}" class="indicator__button">
                                            <span class="indicator__area">
                                                <i class="fas fa-user"></i>
                                            </span>
                            </a>
                                <div class="indicator__dropdown">
                                    <div class="account-menu">
                                        <form class="account-menu__form">
                                            <div class="account-menu__form-title">Log In to Your Account</div>
                                            <div class="form-group">
                                                <label for="header-signin-email" class="sr-only">Email address</label>
                                                <input id="header-signin-email" type="email"
                                                       class="form-control form-control-sm" placeholder="Email address">
                                            </div>
                                            <div class="form-group">
                                                <label for="header-signin-password" class="sr-only">Password</label>
                                                <div class="account-menu__form-forgot">
                                                    <input id="header-signin-password" type="password"
                                                           class="form-control form-control-sm" placeholder="Password">
                                                    <a href="" class="account-menu__form-forgot-link">Forgot?</a>
                                                </div>
                                            </div>
                                            <div class="form-group account-menu__form-button">
                                                <button type="submit" class="btn btn-primary btn-sm">Login</button>
                                            </div>
                                            <div class="account-menu__form-link"><a href="account-login.html">Create An
                                                    Account</a></div>
                                        </form>
                                        <div class="account-menu__divider"></div>
                                        <a href="account-dashboard.html" class="account-menu__user">
                                            <div class="account-menu__user-avatar">
                                                <img src="images/avatars/avatar-3.jpg" alt="">
                                            </div>
                                            <div class="account-menu__user-info">
                                                <div class="account-menu__user-name">Helena Garcia</div>
                                                <div class="account-menu__user-email">stroyka@example.com</div>
                                            </div>
                                        </a>
                                        <div class="account-menu__divider"></div>
                                        <ul class="account-menu__links">
                                            <li><a href="account-profile.html">Edit Profile</a></li>
                                            <li><a href="account-orders.html">Order History</a></li>
                                            <li><a href="account-addresses.html">Addresses</a></li>
                                            <li><a href="account-password.html">Password</a></li>
                                        </ul>
                                        <div class="account-menu__divider"></div>
                                        <ul class="account-menu__links">
                                            <li><a href="account-login.html">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</header>
