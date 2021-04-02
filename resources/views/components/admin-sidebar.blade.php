<aside class="app-sidebar">
    <div class="app-sidebar__logo">
        <a class="header-brand" href="{{ route('front.home') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/logo.png'); ?>" class="header-brand-img desktop-lgo" alt="{{ env('APP_NAME') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/logo1.png'); ?>" class="header-brand-img dark-logo" alt="{{ env('APP_NAME') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/favicon.png'); ?>" class="header-brand-img mobile-logo" alt="{{ env('APP_NAME') }}">
            <img src="<?php echo URL::to('/th/assets/images/brand/favicon1.png'); ?>" class="header-brand-img darkmobile-logo" alt="{{ env('APP_NAME') }}">
        </a>
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                <img src="<?php echo URL::to('/th/assets/images/users/2.jpg'); ?>" alt="user-img" class="avatar-xl rounded-circle mb-1" />
            </div>
            <div class="user-info">
                <h5 class=" mb-1">{{$current_user_name}} <i class="ion-checkmark-circled text-success fs-12"></i></h5>
            </div>
        </div>
    </div>
    <ul class="side-menu app-sidebar3">
        <li class="side-item side-item-category mt-4">Main</li>
        <li class="slide">
            <a class="side-menu__item" href="<?php echo route('admin.home'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Dashboard</span></a>
        </li>
        <li class="side-item side-item-category">Users</li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo URL::to('/admin/users'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Users</span><span class="badge badge-danger side-badge">{{$users}}</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo URL::to('/admin/groups'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Users Groups</span><span class="badge badge-danger side-badge">{{$users_groups}}</span></a>
        </li>
        <li class="side-item side-item-category">Articles</li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo URL::to('/admin/article'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Articles</span><span class="badge badge-danger side-badge">{{$articles}}</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo URL::to('/admin/categories'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Categories</span><span class="badge badge-danger side-badge">{{$categories}}</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo URL::to('/admin/comments'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Comments</span><span class="badge badge-danger side-badge">{{$comments}}</span></a>
        </li>
        <li class="side-item side-item-category">Newsletter</li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo URL::to('/admin/newsletter'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                <span class="side-menu__label">Subscribers</span><span class="badge badge-danger side-badge">{{$subscribers}}</span></a>
        </li>
        <li class="side-item side-item-category">Templates</li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo route('admin.tpl.types'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 22C6.49 22 2 17.51 2 12S6.49 2 12 2s10 4.04 10 9c0 3.31-2.69 6-6 6h-1.77c-.28 0-.5.22-.5.5 0 .12.05.23.13.33.41.47.64 1.06.64 1.67 0 1.38-1.12 2.5-2.5 2.5zm0-18c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7z"></path><circle cx="6.5" cy="11.5" r="1.5"></circle><circle cx="9.5" cy="7.5" r="1.5"></circle><circle cx="14.5" cy="7.5" r="1.5"></circle><circle cx="17.5" cy="11.5" r="1.5"></circle></svg>
                <span class="side-menu__label">Types</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item"  href="<?php echo route('admin.tpl.place.group'); ?>">
                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"></path><path d="M12 22C6.49 22 2 17.51 2 12S6.49 2 12 2s10 4.04 10 9c0 3.31-2.69 6-6 6h-1.77c-.28 0-.5.22-.5.5 0 .12.05.23.13.33.41.47.64 1.06.64 1.67 0 1.38-1.12 2.5-2.5 2.5zm0-18c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7z"></path><circle cx="6.5" cy="11.5" r="1.5"></circle><circle cx="9.5" cy="7.5" r="1.5"></circle><circle cx="14.5" cy="7.5" r="1.5"></circle><circle cx="17.5" cy="11.5" r="1.5"></circle></svg>
                <span class="side-menu__label">Placeholders</span></a>
        </li>
    </ul>
</aside>
