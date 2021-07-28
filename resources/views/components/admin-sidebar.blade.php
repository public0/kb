<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ route('front.home') }}">
            <img src="{{ url('/th/assets/images/brand/logo.png') }}" class="header-brand-img desktop-lgo" alt="{{ config('app.name') }}">
            <img src="{{ url('/th/assets/images/brand/logo1.png') }}" class="header-brand-img dark-logo" alt="{{ config('app.name') }}">
            <img src="{{ url('/th/assets/images/brand/favicon.png') }}" class="header-brand-img mobile-logo" alt="{{ config('app.name') }}">
            <img src="{{ url('/th/assets/images/brand/favicon1.png') }}" class="header-brand-img darkmobile-logo" alt="{{ config('app.name') }}">
        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="@if($user->avatar){{ $user->avatar }}@else{{ url('/th/assets/images/users/account.png') }}@endif" alt="user-img" class="avatar-xl rounded-circle mb-1" />
            </div>
            <div class="user-info">
                <h5 class=" mb-1">{{ $user->full_name }} <i class="ion ion-checkmark-circled text-success fs-12"></i></h5>
                <span class="text-muted app-sidebar__user-name text-sm">{{ $user->role_name }}</span>
            </div>
        </div>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4"></li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('admin.home') }}">
                <span class="side-menu__icon"><i class="fe fe-home"></i></span>
                <span class="side-menu__label">{{ __('Dashboard') }}</span>
            </a>
        </li>
        @if(!empty($adminModules))
            @php
            foreach ($adminModules as $group => $items) {
                foreach ($items as $k => $item) {
                    if (!in_array($item['id'], $user->permissions_data)) {
                        unset($adminModules[$group][$k]);
                    }
                }
            }
            @endphp
            @foreach($adminModules as $group => $items)
                @if($items)
                <li class="side-item side-item-category">{{ $group }}</li>
                @foreach($items as $item)
                <li class="slide">
                    <a class="side-menu__item" href="@if(isset($item['url'])){{ url($item['url']) }}@elseif(isset($item['route'])){{ route($item['route']) }}@else#@endif">
                        <span class="side-menu__icon">@if(!empty($item['icon']))<i class="{{ $item['icon'] }}"></i>@endif</span>
                        <span class="side-menu__label">{{ __($item['name']) }}</span>
                        @if(!empty($item['badge']))<span class="badge badge-danger side-badge">{{ eval('return ' . $item['badge'] . ';') }}</span>@endif
                    </a>
                </li>
                @endforeach
                @endif
            @endforeach
        @endif
    </ul>
</aside>
