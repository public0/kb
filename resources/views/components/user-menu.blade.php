@if($user)
<div class="text-center">
    <a href="@if($admin){{URL::to('/admin/profile')}}@endif" class="dropdown-item text-center user pb-0 font-weight-bold">{{ $user->full_name }}</a>
    <span class="text-center user-semi-title">{{ $user->email }}</span>
    <div class="dropdown-divider"></div>
</div>
@if($admin)
<a class="dropdown-item d-flex" href="{{ URL::to('/admin/profile') }}">
    <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-users"></i></span>
    Profile
</a>
@if($section != 'admin')
<a class="dropdown-item d-flex" href="{{ route('admin.home') }}">
    <span class="header-icon" style="display:inline-block;line-height:25px"><i class="fe fe-settings"></i></span>
    Admin
</a>
@endif
@endif
@if($section != 'front')
<a class="dropdown-item d-flex" href="{{ route('front.home') }}">
    <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-book"></i></span>
    Knowledge Base
</a>
@endif
<a class="dropdown-item d-flex" href="{{ route('ibd.home') }}">
    <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-aperture"></i></span>
    Configurator
</a>
<a class="dropdown-item d-flex" href="{{ route('swag.home') }}">
    <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-cloud"></i></span>
    Swag Documents
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
