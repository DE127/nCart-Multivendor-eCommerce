@php
    $footer = App\Models\Footer::first();
    $item_sold = App\Models\OrderItem::get()->count();
    $total_earning = App\Models\OrderItem::get()->sum('price');
    $total_user = App\Models\User::where(['email_verified' => 1, 'status' => 1])->get()->count();
    $social_links=App\Models\FooterSocialLink::get();
    $setting = App\Models\Setting::with('settinglangfrontend')->first();
@endphp
<footer class="site__footer">
    <div class="site-footer">
        <div class="container">
            <div class="site-footer__widgets">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="site-footer__widget footer-contacts">
                            <h5 class="footer-contacts__title">Contact Us</h5>
                            <div class="footer-contacts__text">
                                {{ $footer->footerlangfrontend->description }}
                            </div>
{{--                            <ul class="footer-contacts__contacts">--}}
{{--                                <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street, New--}}
{{--                                    York 10021 USA--}}
{{--                                </li>--}}
{{--                                <li><i class="footer-contacts__icon far fa-envelope"></i> stroyka@example.com</li>--}}
{{--                                <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730, (800)--}}
{{--                                    060-0730--}}
{{--                                </li>--}}
{{--                                <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</li>--}}
{{--                            </ul>--}}
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">{{__('user.Support')}}</h5>
                            <ul class="footer-links__list">
                                <li class="footer-links__item"><a href="{{ route('contact-us') }}">{{__('user.Contact Us')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('blogs') }}">{{__('user.Our Blog')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('faq') }}">{{__('user.FAQ')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('privacy-policy') }}">{{__('user.Privacy Policy')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('terms-and-conditions') }}">{{__('user.Terms & Conditions')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="site-footer__widget footer-links">
                            <h5 class="footer-links__title">{{__('user.Quick Link')}}</h5>
                            <ul class="footer-links__list">
                                <li class="footer-links__item"><a href="{{ route('dashboard') }}">{{__('user.My Profile')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('about-us') }}">{{__('user.About Us')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('login') }}">{{__('user.Login')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('register') }}">{{__('user.Registration')}}</a></li>
                                <li class="footer-links__item"><a href="{{ route('cart-view') }}">{{__('user.Cart page')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="site-footer__widget footer-newsletter">
                            @php
                                $setting = App\Models\Setting::with('settinglangfrontend')->first();
                            @endphp
                            <h5 class="footer-newsletter__title">{{ $setting->settinglangfrontend->subscriber_title }}</h5>
                            <div class="footer-newsletter__text">
                                {{ $setting->settinglangfrontend->subscriber_description }}
                            </div>
                            <form id="footerTopSubscriberForm" class="footer-newsletter__form">
                                @csrf
                                <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                <input type="text" name="email" class="footer-newsletter__form-input form-control"
                                       id="footer-newsletter-address" placeholder="{{__('user.Enter your email address')}}">
                                <button class="footer-newsletter__form-button btn btn-primary" id="footerTopSubSubmitBtn" type="submit">{{__('user.Subscribe')}}</button>
                                <button class="footer-newsletter__form-button btn btn-primary d-none" id="footerTopSubShowSpain" type="submit"><i class="fas fa-spinner fa-spin"></i></button>
                            </form>
                            <div class="footer-newsletter__text footer-newsletter__text--social">
                                Follow us on social networks
                            </div>
                            <!-- social-links -->
                            <div class="social-links footer-newsletter__social-links social-links--shape--circle">
                                <ul class="social-links__list">
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
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="site-footer__copyright">
                    <!-- copyright -->
                    Powered by <a href="https://notstudio.co/" target="_blank">notStudio</a>
                    <!-- copyright / end -->
                </div>
                <div class="site-footer__payments">
                    <img src="images/payments.png" alt="">
                </div>
            </div>
        </div>
        <div class="totop">
            <div class="totop__body">
                <div class="totop__start"></div>
                <div class="totop__container container"></div>
                <div class="totop__end">
                    <button type="button" class="totop__button">
                        <i class="fas fa-angle-up"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>
