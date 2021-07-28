<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ route('front.home') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-lgo" alt="{{ config('app.name') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-logo" alt="{{ config('app.name') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/favicon.png'); ?>" class="header-brand-img mobile-logo" alt="{{ config('app.name') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/favicon1.png'); ?>" class="header-brand-img darkmobile-logo" alt="{{ config('app.name') }}">
        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="<?php echo URL::to('/th/assets/images/users/2.jpg'); ?>" alt="user-img" class="avatar-xl rounded-circle mb-1" />
            </div>
            <div class="user-info">
                <h5 class=" mb-1">Test Utils {{$current_user_name}} <i class="ion-checkmark-circled text-success fs-12"></i></h5>
            </div>
        </div>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4">Clienti</li>
        
        @if(!empty($clients))
        	 @foreach($clients as $client)
        		<li class="slide">
                    <a class="side-menu__item"  href="<?php echo URL::to('/utils?client_id='.$client->id); ?>">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">{{$client->name}}</span><span class="badge badge-danger side-badge">{{$client->instances_number}}</span></a>
                </li>
        	 @endforeach
        @endif
        
    </ul>
</aside>
