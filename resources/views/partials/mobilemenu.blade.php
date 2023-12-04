<div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="{{ route('home') }}" class="mobile-links__item-link">{{__('user.Home')}}</a>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="{{ route('products') }}" class="mobile-links__item-link">{{__('user.Product')}}</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="{{ route('about-us') }}" class="mobile-links__item-link">{{__('user.About Us')}}</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="{{ route('contact-us') }}" class="mobile-links__item-link">{{__('user.Contact')}}</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="{{ route('blogs') }}" class="mobile-links__item-link">{{__('user.Blog')}}</a>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item>
                        <div class="mobile-links__item-title">
                            <a href="javascript:;" class="mobile-links__item-link">{{__('user.Pages')}}</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content>
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="{{ route('become-author-page') }}" class="mobile-links__item-link">{{__('user.Become an Author')}}</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="{{ route('faq') }}" class="mobile-links__item-link">{{__('user.FAQ')}}</a>
                                    </div>
                                </li>
                                <li class="mobile-links__item" data-collapse-item>
                                    <div class="mobile-links__item-title">
                                        <a href="{{ route('privacy-policy') }}" class="mobile-links__item-link">{{__('user.Terms and Condition')}}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
