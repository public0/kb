<div class="app-header header top-header">
    <div class="container-fluid">
        <div class="d-flex">
            {{-- <a class="header-brand" href="index.html">
                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Admitro logo">
                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo1.png" class="header-brand-img dark-logo" alt="Admitro logo">
                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Admitro logo">
                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Admitro logo">
            </a> --}}
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left header-icon mt-1"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                </a>
            </div>

            <div class="d-flex order-lg-2 ml-auto">
                <a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch">
                    <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                        <path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                </a>
                <div class="dropdown   header-fullscreen" >
                    <a  class="nav-link icon full-screen-link p-0"  id="fullscreen-button">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M10 4L8 4 8 8 4 8 4 10 10 10zM8 20L10 20 10 14 4 14 4 16 8 16zM20 14L14 14 14 20 16 20 16 16 20 16zM20 8L16 8 16 4 14 4 14 10 20 10z"/></svg>
                    </a>
                </div>
                <div class="dropdown profile-dropdown">
                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown"><img src="<?php echo URL::to('/th/assets/images/users/account.png'); ?>" alt="img" class="avatar-md brround"></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                        <div class="text-center">
                            <a href="<?php echo URL::to('/admin/profile'); ?>" class="dropdown-item text-center user pb-0 font-weight-bold">{{$current_user_name}}</a>
                            <span class="text-center user-semi-title">{{$current_user_email}}</span>
                            <div class="dropdown-divider"></div>
                        </div>
                        <a class="dropdown-item d-flex" href="<?php echo URL::to('/admin/profile'); ?>">
                            <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-users"></i></span>
                            Profile
                        </a>
                        <a class="dropdown-item d-flex" href="{{ route('auth.logout') }}">
                            <span class="header-icon" style="display:inline-block; line-height:25px"><i class="fe fe-log-out"></i></span>
                            Sign Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
