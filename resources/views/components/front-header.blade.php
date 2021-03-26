<!-- Header -->
<div class="hor-header header top-header">
    <div class="container">
        <div class="d-flex">
            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
            <a class="header-brand" href="{{ route('front.home') }}">
                <img src="<?php echo URL::to('/th/assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-lgo" alt="{{ env('APP_NAME') }}">
                <img src="<?php echo URL::to('/th/assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-logo" alt="{{ env('APP_NAME') }}">
                <img src="<?php echo URL::to('/th/assets/images/brand/favicon.png'); ?>" class="header-brand-img mobile-logo" alt="{{ env('APP_NAME') }}">
                <img src="<?php echo URL::to('/th/assets/images/brand/favicon1.png'); ?>" class="header-brand-img darkmobile-logo" alt="{{ env('APP_NAME') }}">
            </a>
            <div class="mt-1">
                <form class="form-inline" method="get" action="{{ route('front.search') }}">
                    @csrf
                    <div class="search-element">
                        <input type="search" class="form-control header-search" placeholder="{{ __('labels.search') }}..." aria-label="{{ __('labels.search') }}" tabindex="1" name="q" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false" value="{{ request()->input('q') }}" />
                        <button class="btn btn-primary-color" type="submit">
                            <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="d-flex order-lg-2 ml-auto">
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
                    <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg>
                </a>
                @if(!empty($languages))
                <div class="dropdown profile-dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown" aria-expanded="false"> <span> <img src="<?php echo URL::to('/th/assets/images/langs/' . strtolower($selectedLanguage) . '.png'); ?>" alt="img" class="avatar-md brround" style="background-position:cover"> </span> </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated" style="">
                        @foreach($languages as $lng)
                        @if($selectedLanguage != $lng->abv)<a class="dropdown-item d-flex" href="javascript:void(0)" onclick="changeLang('{{ $lng->abv }}')">{{ $lng->name }}</a>@endif
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="dropdown profile-dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown" aria-expanded="false"><img src="<?php echo URL::to('/th/assets/images/users/account.png'); ?>" alt="img" class="avatar-md brround"></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated" style="">
                        @if($user)
                        <div class="text-center">
                            <a href="#" class="dropdown-item text-center user pb-0 font-weight-bold">{{ $user->full_name }}</a><span class="text-center user-semi-title">{{ $user->email }}</span>
                            <div class="dropdown-divider"></div>
                        </div>
                        @if($admin)
                        <a class="dropdown-item d-flex" href="{{ route('admin.home') }}">
                            <span class="header-icon" style="display:inline-block;line-height:25px"><i class="fe fe-settings"></i></span>
                            Admin
                        </a>
                        @endif
                        <a class="dropdown-item d-flex" href="{{ route('admin.home') }}">
                            <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-aperture"></i></span>
                            Configurator
                        </a>
                        <a class="dropdown-item d-flex" href="{{ route('auth.logout') }}">
                            <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-log-out"></i></span>
                            Sign Out
                        </a>
                        @else
                        <a class="dropdown-item d-flex" href="{{ route('auth.login') }}">
                            <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-log-in"></i></span>
                            Sign In
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // Header -->
@auth
<!-- Menubar -->
<div class="sticky" style="margin-bottom: -60px;">
    <div class="horizontal-main hor-menu clearfix">
        <div class="horizontal-mainwrapper container clearfix">
            <!--Nav-->
            <nav class="horizontalMenu clearfix">
                <div class="horizontal-overlapbg active"></div>
                <ul class="horizontalMenu-list">
                    <li aria-haspopup="true" class="active">
                        <a href="{{ route('front.home') }}" class="sub-icon active">
                            <span class="hor-icon" style="display:inline-block;font-size:18px;line-height:normal"><i class="fe fe-home"></i></span>
                            {{ __('labels.home') }}
                        </a>
                    </li>
                    @php
                    // Recursive function to generate the menu
                    function createHeader($categories)
                    {
                        echo '<ul class="sub-menu">';
                        foreach ($categories as $k => $category) {
                            $hasChild = !empty($category['child']);
                            echo '<li aria-haspopup="true"' . ($hasChild ? ' class="sub-menu-sub"' : '') . '>';
                            if ($hasChild) echo '<span class="horizontalMenu-click02"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span>';
                            echo '<a href="' . route('front.category', ['id' => $category['id']]) . '">' . $category['name'] . '</a>';
                            if ($hasChild) echo createHeader($category['child']);
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    @endphp
                    @if(!empty($headerCategories))
                    <li aria-haspopup="true">
                        <span class="horizontalMenu-click"><i class="horizontalMenu-arrow fa fa-angle-down"></i></span>
                        <a href="#" class="sub-icon">
                            <span class="hor-icon" style="display:inline-block;font-size:18px;line-height:normal"><i class="fe fe-list"></i></span>
                            {{ __('labels.category') }} <i class="fa fa-angle-down horizontal-icon"></i>
                        </a>
                        {{ createHeader($headerCategories) }}
                    </li>
                    @endif
                </ul>
            </nav>
            <!--Nav-->
        </div>
    </div>
</div>
<!-- // Menubar -->
<div class="jumps-prevent" style="padding-top: 60px;"></div>
@endauth
