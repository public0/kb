<div class="dropdown profile-dropdown">
    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown"><img src="@if($user && $user->avatar){{ $user->avatar }}@else{{ url('/th/assets/images/users/account.png') }}@endif" alt="user-img" class="avatar-md brround"></a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
        @if($user)
        <h5 class="text-center mt-1 mb-1 font-weight-bold">{{ $user->full_name }}</h5>
        <div class="text-center user-semi-title">{{ $user->email }}</div>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item d-flex" href="{{ route('admin.profile') }}">
            <span class="header-icon" style="display:inline-block;line-height:25px"><i class="fe fe-users"></i></span>
            {{ __('Profile') }}
        </a>
        @if(($user->isRole('admin') || $user->isRole('intern')) && $section != 'admin')
        <a class="dropdown-item d-flex" href="{{ route('admin.home') }}">
            <span class="header-icon" style="display:inline-block;line-height:25px"><i class="fe fe-settings"></i></span>
            {{ __('Admin') }}
        </a>
        @endif
        @if(!empty($appsModules))
            @php
            foreach ($appsModules as $group => $items) {
                foreach ($items as $k => $item) {
                    if (!in_array($item['id'], $user->permissions_data)) {
                        unset($appsModules[$group][$k]);
                    }
                }
            }
            @endphp
            @foreach($appsModules as $group => $items)
                @foreach($items as $item)
                <a class="dropdown-item d-flex" href="@if(isset($item['url'])){{ url($item['url']) }}@elseif(isset($item['route'])){{ route($item['route']) }}@else#@endif">
                    @if(!empty($item['icon']))<span class="header-icon" style="display:inline-block;line-height:25px"><i class="{{ $item['icon'] }}"></i></span>@endif
                    {{ __($item['name']) }}
                </a>
                @endforeach
            @endforeach
        @endif
        <a class="dropdown-item d-flex" href="{{ route('swag.home') }}">
            <span class="header-icon" style="display:inline-block;line-height:25px"><i class="fe fe-cloud"></i></span>
            {{ __('Swag Documents') }}
        </a>
        <a class="dropdown-item d-flex" href="{{ route('auth.logout') }}">
            <span class="header-icon" style="display:inline-block;line-height:25px"><i class="fe fe-log-out"></i></span>
            {{ __('Sign Out') }}
        </a>
        @else
        <a class="dropdown-item d-flex" href="{{ route('auth.login') }}">
            <span class="header-icon" style="display:inline-block;line-height:25px"><i class="fe fe-log-in"></i></span>
            {{ __('Sign In') }}
        </a>
        @endif
    </div>
</div>
