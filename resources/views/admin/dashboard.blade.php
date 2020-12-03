<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Admitro - Admin Panel HTML template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="admin panel ui, user dashboard template, web application templates, premium admin templates, html css admin templates, premium admin templates, best admin template bootstrap 4, dark admin template, bootstrap 4 template admin, responsive admin template, bootstrap panel template, bootstrap simple dashboard, html web app template, bootstrap report template, modern admin template, nice admin template"/>

    <!-- Title -->
    <title>Admitro - Admin Panel HTML template</title>

    <!--Favicon -->
    <link rel="icon" href="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon.ico" type="image/x-icon"/>

    <!--Bootstrap css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/dark.css" rel="stylesheet" />
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/skin-modes.css" rel="stylesheet" />

    <!-- Animate css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/animated.css" rel="stylesheet" />

    <!--Sidemenu css -->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/closed-sidemenu.css" rel="stylesheet">

    <!-- P-scroll bar css-->
    <link href="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scrollbar.css" rel="stylesheet" />

    <!---Icons css-->
    <link href="<?php echo URL::to('/'); ?>/th/assets/css/icons.css" rel="stylesheet" />

    <!-- Simplebar css -->
    <link rel="stylesheet" href="<?php echo URL::to('/'); ?>/th/assets/plugins/simplebar/css/simplebar.css">

    <!-- INTERNAL Select2 css -->
    <link href="<?php echo URL::to('/'); ?>/<?php echo URL::to('/'); ?>/th/assets/plugins/select2/select2.min.css" rel="stylesheet" />

    <!-- Color Skin css -->
    <link id="theme" href="<?php echo URL::to('/'); ?>/<?php echo URL::to('/'); ?>/th/assets/colors/color1.css" rel="stylesheet" type="text/css"/>

</head>

<body class="app sidebar-mini dark-mode dark-sidebar">

<!---Global-loader-->
<div id="global-loader" >
    <img src="<?php echo URL::to('/'); ?>/th/assets/images/svgs/loader.svg" alt="loader">
</div>
<!--- End Global-loader-->

<!-- Page -->
<div class="page">
    <div class="page-main">

        <!--aside open-->
        <aside class="app-sidebar">
            <div class="app-sidebar__logo">
                <a class="header-brand" href="index.html">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Admitro logo">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo1.png" class="header-brand-img dark-logo" alt="Admitro logo">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Admitro logo">
                    <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Admitro logo">
                </a>
            </div>
            <div class="app-sidebar__user">
                <div class="dropdown user-pro-body text-center">
                    <div class="user-pic">
                        <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/2.jpg" alt="user-img" class="avatar-xl rounded-circle mb-1">
                    </div>
                    <div class="user-info">
                        <h5 class=" mb-1">Jessica <i class="ion-checkmark-circled  text-success fs-12"></i></h5>
                        <span class="text-muted app-sidebar__user-name text-sm">Web Designer</span>
                    </div>
                </div>
                <div class="sidebar-navs">
                    <ul class="nav nav-pills-circle">
                        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Support">
                            <a class="icon" href="#" >
                                <i class="las la-life-ring header-icons"></i>
                            </a>
                        </li>
                        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Documentation">
                            <a class="icon" href="#">
                                <i class="las  la-file-alt header-icons"></i>
                            </a>
                        </li>
                        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Projects">
                            <a href="#" class="icon">
                                <i class="las la-project-diagram header-icons"></i>
                            </a>
                        </li>
                        <li class="nav-item" data-placement="top" data-toggle="tooltip" title="Settings">
                            <a class="icon" href="#">
                                <i class="las la-cog header-icons"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="side-menu app-sidebar3">
                <li class="side-item side-item-category mt-4">Main</li>
                <li class="slide">
                    <a class="side-menu__item"  href="index.html">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Dashboard</span><span class="badge badge-danger side-badge">Hot</span></a>
                </li>
                <li class="side-item side-item-category">Users</li>
                <li class="slide">
                    <a class="side-menu__item"  href="index.html">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Users List</span><span class="badge badge-danger side-badge">102</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="index.html">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Users Groups</span><span class="badge badge-danger side-badge">3</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="index.html">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Groups Rights</span></a>
                </li>
                <li class="side-item side-item-category">Articles</li>
                <li class="slide">
                    <a class="side-menu__item"  href="index.html">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Articles List</span><span class="badge badge-danger side-badge">102</span></a>
                </li>
                <li class="side-item side-item-category">Newsslater</li>
                <li class="slide">
                    <a class="side-menu__item"  href="index.html">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Newsslater List</span><span class="badge badge-danger side-badge">3</span></a>
                </li>
                <li class="slide">
                    <a class="side-menu__item"  href="index.html">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
                        <span class="side-menu__label">Abonates List</span><span class="badge badge-danger side-badge">3</span></a>
                </li>

            </ul>
        </aside>
        <!--aside closed-->

        <!-- App-Content -->
        <div class="app-content main-content">
            <div class="side-app">

                <!--app header-->
                <div class="app-header header top-header">
                    <div class="container-fluid">
                        <div class="d-flex">
                            <a class="header-brand" href="index.html">
                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo.png" class="header-brand-img desktop-lgo" alt="Admitro logo">
                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/logo1.png" class="header-brand-img dark-logo" alt="Admitro logo">
                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon.png" class="header-brand-img mobile-logo" alt="Admitro logo">
                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/brand/favicon1.png" class="header-brand-img darkmobile-logo" alt="Admitro logo">
                            </a>
                            <div class="app-sidebar__toggle" data-toggle="sidebar">
                                <a class="open-toggle" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-left header-icon mt-1"><line x1="17" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="17" y1="18" x2="3" y2="18"></line></svg>
                                </a>
                            </div>
                            <div class="mt-1">
                                <form class="form-inline">
                                    <div class="search-element">
                                        <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
                                        <button class="btn btn-primary-color" type="submit">
                                            <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"  height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                                <path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div><!-- SEARCH -->
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
                                <div class="dropdown header-message">
                                    <a class="nav-link icon" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M20,2H4C2.897,2,2,2.897,2,4v12c0,1.103,0.897,2,2,2h3v3.767L13.277,18H20c1.103,0,2-0.897,2-2V4C22,2.897,21.103,2,20,2z M20,16h-7.277L9,18.233V16H4V4h16V16z"/><path d="M7 7H17V9H7zM7 11H14V13H7z"/></svg>
                                        <span class="badge badge-success side-badge">3</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
                                        <div class="dropdown-header">
                                            <h6 class="mb-0">Messages</h6>
                                            <span class="badge badge-pill badge-primary ml-auto">View all</span>
                                        </div>
                                        <div class="header-dropdown-list message-menu" id="message-menu">
                                            <a class="dropdown-item border-bottom" href="#">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo URL::to('/'); ?>/th/assets/images/users/1.jpg"></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="pl-3">
                                                            <h6 class="mb-1">Jack Wright</h6>
                                                            <p class="fs-13 mb-1">All the best your template awesome</p>
                                                            <div class="small text-muted">
                                                                3 hours ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item border-bottom">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo URL::to('/'); ?>/th/assets/images/users/2.jpg"></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="pl-3">
                                                            <h6 class="mb-1">Lisa Rutherford</h6>
                                                            <p class="fs-13 mb-1">Hey! there I'm available</p>
                                                            <div class="small text-muted">
                                                                5 hour ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item border-bottom">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo URL::to('/'); ?>/th/assets/images/users/3.jpg"></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="pl-3">
                                                            <h6 class="mb-1">Blake Walker</h6>
                                                            <p class="fs-13 mb-1">Just created a new blog post</p>
                                                            <div class="small text-muted">
                                                                45 mintues ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item border-bottom">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo URL::to('/'); ?>/th/assets/images/users/4.jpg"></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="pl-3">
                                                            <h6 class="mb-1">Fiona Morrison</h6>
                                                            <p class="fs-13 mb-1">Added new comment on your photo</p>
                                                            <div class="small text-muted">
                                                                2 days ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item border-bottom">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo URL::to('/'); ?>/th/assets/images/users/6.jpg"></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="pl-3">
                                                            <h6 class="mb-1">Stewart Bond</h6>
                                                            <p class="fs-13 mb-1">Your payment invoice is generated</p>
                                                            <div class="small text-muted">
                                                                3 days ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a class="dropdown-item border-bottom">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <span class="avatar avatar-md brround align-self-center cover-image" data-image-src="<?php echo URL::to('/'); ?>/th/assets/images/users/7.jpg"></span>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="pl-3">
                                                            <h6 class="mb-1">Faith Dickens</h6>
                                                            <p class="fs-13 mb-1">Please check your mail....</p>
                                                            <div class="small text-muted">
                                                                4 days ago
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class=" text-center p-2 border-top">
                                            <a href="#" class="">See All Messages</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown header-notify">
                                    <a class="nav-link icon" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon" width="24" height="24" viewBox="0 0 24 24"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707C3.105 15.48 3 15.734 3 16v2c0 .553.447 1 1 1h16c.553 0 1-.447 1-1v-2c0-.266-.105-.52-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707C6.895 14.52 7 14.266 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zM12 22c1.311 0 2.407-.834 2.818-2H9.182C9.593 21.166 10.689 22 12 22z"/></svg>
                                        <span class="pulse "></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow  animated">
                                        <div class="dropdown-header">
                                            <h6 class="mb-0">Notifications</h6>
                                            <span class="badge badge-pill badge-primary ml-auto">View all</span>
                                        </div>
                                        <div class="notify-menu">
                                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                                <div class="notifyimg bg-info-transparent text-info"> <i class="ti-comment-alt"></i> </div>
                                                <div>
                                                    <div class="font-weight-normal1">Message Sent.</div>
                                                    <div class="small text-muted">3 hours ago</div>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                                <div class="notifyimg bg-primary-transparent text-primary"> <i class="ti-shopping-cart-full"></i> </div>
                                                <div>
                                                    <div class="font-weight-normal1"> Order Placed</div>
                                                    <div class="small text-muted">5  hour ago</div>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                                <div class="notifyimg bg-warning-transparent text-warning"> <i class="ti-calendar"></i> </div>
                                                <div>
                                                    <div class="font-weight-normal1"> Event Started</div>
                                                    <div class="small text-muted">45 mintues ago</div>
                                                </div>
                                            </a>
                                            <a href="#" class="dropdown-item border-bottom d-flex pl-4">
                                                <div class="notifyimg bg-success-transparent text-success"> <i class="ti-desktop"></i> </div>
                                                <div>
                                                    <div class="font-weight-normal1">Your Admin launched</div>
                                                    <div class="small text-muted">1 daya ago</div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class=" text-center p-2 border-top">
                                            <a href="#" class="">View All Notifications</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown profile-dropdown">
                                    <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
												<span>
													<img src="<?php echo URL::to('/'); ?>/th/assets/images/users/2.jpg" alt="img" class="avatar avatar-md brround">
												</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                                        <div class="text-center">
                                            <a href="#" class="dropdown-item text-center user pb-0 font-weight-bold">Jessica</a>
                                            <span class="text-center user-semi-title">Web Designer</span>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                        <a class="dropdown-item d-flex" href="#">
                                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
                                            <div class="">Profile</div>
                                        </a>
                                        <a class="dropdown-item d-flex" href="#">
                                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19.43 12.98c.04-.32.07-.64.07-.98 0-.34-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.09-.16-.26-.25-.44-.25-.06 0-.12.01-.17.03l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.06-.02-.12-.03-.18-.03-.17 0-.34.09-.43.25l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98 0 .33.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.09.16.26.25.44.25.06 0 .12-.01.17-.03l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.06.02.12.03.18.03.17 0 .34-.09.43-.25l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zm-1.98-1.71c.04.31.05.52.05.73 0 .21-.02.43-.05.73l-.14 1.13.89.7 1.08.84-.7 1.21-1.27-.51-1.04-.42-.9.68c-.43.32-.84.56-1.25.73l-1.06.43-.16 1.13-.2 1.35h-1.4l-.19-1.35-.16-1.13-1.06-.43c-.43-.18-.83-.41-1.23-.71l-.91-.7-1.06.43-1.27.51-.7-1.21 1.08-.84.89-.7-.14-1.13c-.03-.31-.05-.54-.05-.74s.02-.43.05-.73l.14-1.13-.89-.7-1.08-.84.7-1.21 1.27.51 1.04.42.9-.68c.43-.32.84-.56 1.25-.73l1.06-.43.16-1.13.2-1.35h1.39l.19 1.35.16 1.13 1.06.43c.43.18.83.41 1.23.71l.91.7 1.06-.43 1.27-.51.7 1.21-1.07.85-.89.7.14 1.13zM12 8c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 6c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/></svg>
                                            <div class="">Settings</div>
                                        </a>
                                        <a class="dropdown-item d-flex" href="#">
                                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 4h16v12H5.17L4 17.17V4m0-2c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4zm2 10h12v2H6v-2zm0-3h12v2H6V9zm0-3h12v2H6V6z"/></svg>
                                            <div class="">Messages</div>
                                        </a>
                                        <a class="dropdown-item d-flex" href="#">
                                            <svg class="header-icon mr-3" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24"><g><rect fill="none" height="24" width="24"/></g><g><path d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z"/></g></svg>
                                            <div class="">Sign Out</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/app header-->

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title mb-0">Hi! Welcome Back</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fe fe-home mr-2 fs-14"></i>Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="#">Sales Dashboard</a></li>
                        </ol>
                    </div>
                    <div class="page-rightheader">
                        <div class="btn btn-list">
                            <a href="#" class="btn btn-info"><i class="fe fe-settings mr-1"></i> General Settings </a>
                            <a href="#" class="btn btn-danger"><i class="fe fe-printer mr-1"></i> Print </a>
                            <a href="#" class="btn btn-warning"><i class="fe fe-shopping-cart mr-1"></i> Buy Now </a>
                        </div>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row-1 -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden dash1-card border-0">
                            <div class="card-body">
                                <p class=" mb-1 ">Total Sales</p>
                                <h2 class="mb-1 number-font">$3,257</h2>
                                <small class="fs-12 text-muted">Compared to Last Month</small>
                                <span class="ratio bg-warning">76%</span>
                                <span class="ratio-text text-muted">Goals Reached</span>
                            </div>
                            <div id="spark1"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden dash1-card border-0">
                            <div class="card-body">
                                <p class=" mb-1 ">Total User</p>
                                <h2 class="mb-1 number-font">1,678</h2>
                                <small class="fs-12 text-muted">Compared to Last Month</small>
                                <span class="ratio bg-info">85%</span>
                                <span class="ratio-text text-muted">Goals Reached</span>
                            </div>
                            <div id="spark2"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden dash1-card border-0">
                            <div class="card-body">
                                <p class=" mb-1 ">Total Income</p>
                                <h2 class="mb-1 number-font">$2,590</h2>
                                <small class="fs-12 text-muted">Compared to Last Month</small>
                                <span class="ratio bg-danger">62%</span>
                                <span class="ratio-text text-muted">Goals Reached</span>
                            </div>
                            <div id="spark3"></div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                        <div class="card overflow-hidden dash1-card border-0">
                            <div class="card-body">
                                <p class=" mb-1">Total Tax</p>
                                <h2 class="mb-1 number-font">$1,954</h2>
                                <small class="fs-12 text-muted">Compared to Last Month</small>
                                <span class="ratio bg-success">53%</span>
                                <span class="ratio-text text-muted">Goals Reached</span>
                            </div>
                            <div id="spark4"></div>
                        </div>
                    </div>
                </div>
                <!-- End Row-1 -->

                <!-- Row-2 -->
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Sales Analysis</h3>
                                <div class="card-options">
                                    <div class="btn-group p-0">
                                        <button class="btn btn-outline-light btn-sm" type="button">Week</button>
                                        <button class="btn btn-light btn-sm" type="button">Month</button>
                                        <button class="btn btn-outline-light btn-sm" type="button">Year</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-xl-3 col-6">
                                        <p class="mb-1">Total Sales</p>
                                        <h3 class="mb-0 fs-20 number-font1">$52,618</h3>
                                        <p class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down"></i>0.9%</span>this month</p>
                                    </div>
                                    <div class="col-xl-3 col-6 ">
                                        <p class=" mb-1">Maximum Sales</p>
                                        <h3 class="mb-0 fs-20 number-font1">$26,197</h3>
                                        <p class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up"></i>0.15%</span>this month</p>
                                    </div>
                                    <div class="col-xl-3 col-6">
                                        <p class=" mb-1">Total Units Sold</p>
                                        <h3 class="mb-0 fs-20 number-font1">13,876</h3>
                                        <p class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down"></i>0.8%</span>this month</p>
                                    </div>
                                    <div class="col-xl-3 col-6">
                                        <p class=" mb-1">Maximum Units Sold</p>
                                        <h3 class="mb-0 fs-20 number-font1">5,876</h3>
                                        <p class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up"></i>0.06%</span>this month</p>
                                    </div>
                                </div>
                                <div id="echart1" class="chart-tasks chart-dropshadow text-center"></div>
                                <div class="text-center mt-2">
                                    <span class="mr-4"><span class="dot-label bg-primary"></span>Total Sales</span>
                                    <span><span class="dot-label bg-secondary"></span>Total Units Sold</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recent Activity</h3>
                                <div class="card-options">
                                    <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="latest-timeline scrollbar3" id="scrollbar3">
                                    <ul class="timeline mb-0">
                                        <li class="mt-0">
                                            <div class="d-flex"><span class="time-data">Task Finished</span><span class="ml-auto text-muted fs-11">09 June 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Joseph Ellison</span> finished task on<a href="#" class="font-weight-semibold"> Project Management</a></p>
                                        </li>
                                        <li>
                                            <div class="d-flex"><span class="time-data">New Comment</span><span class="ml-auto text-muted fs-11">05 June 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Elizabeth Scott</span> Product delivered<a href="#" class="font-weight-semibold"> Service Management</a></p>
                                        </li>
                                        <li>
                                            <div class="d-flex"><span class="time-data">Target Completed</span><span class="ml-auto text-muted fs-11">01 June 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Sonia Peters</span> finished target on<a href="#" class="font-weight-semibold"> this month Sales</a></p>
                                        </li>
                                        <li>
                                            <div class="d-flex"><span class="time-data">Revenue Sources</span><span class="ml-auto text-muted fs-11">26 May 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Justin Nash</span> source report on<a href="#" class="font-weight-semibold"> Generated</a></p>
                                        </li>
                                        <li>
                                            <div class="d-flex"><span class="time-data">Dispatched Order</span><span class="ml-auto text-muted fs-11">22 May 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Ella Lambert</span> ontime order delivery <a href="#" class="font-weight-semibold">Service Management</a></p>
                                        </li>
                                        <li>
                                            <div class="d-flex"><span class="time-data">New User Added</span><span class="ml-auto text-muted fs-11">19 May 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Nicola	Blake</span> visit the site<a href="#" class="font-weight-semibold"> Membership allocated</a></p>
                                        </li>
                                        <li>
                                            <div class="d-flex"><span class="time-data">Revenue Sources</span><span class="ml-auto text-muted fs-11">15 May 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Richard	Mills</span> source report on<a href="#" class="font-weight-semibold"> Generated</a></p>
                                        </li>
                                        <li class="mb-0">
                                            <div class="d-flex"><span class="time-data">New Order Placed</span><span class="ml-auto text-muted fs-11">11 May 2020</span></div>
                                            <p class="text-muted fs-12"><span class="text-info">Steven Hart</span> is proces the order<a href="#" class="font-weight-semibold"> #987</a></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row-2 -->

                <!-- Row-3 -->
                <div class="row">
                    <div class="col-xl-4 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recent Customers</h3>
                                <div class="card-options">
                                    <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="list-card">
                                    <span class="bg-warning list-bar"></span>
                                    <div class="row align-items-center">
                                        <div class="col-9 col-sm-9">
                                            <div class="media mt-0">
                                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/1.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                                <div class="media-body">
                                                    <div class="d-md-flex align-items-center mt-1">
                                                        <h6 class="mb-1">Lisa Marshall</h6>
                                                    </div>
                                                    <span class="mb-0 fs-13 text-muted">User ID:#2342<span class="ml-2 text-success fs-13 font-weight-semibold">Paid</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3">
                                            <div class="text-right">
                                                <span class="font-weight-semibold fs-16 number-font">$558</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-card">
                                    <span class="bg-info list-bar"></span>
                                    <div class="row align-items-center">
                                        <div class="col-9 col-sm-9">
                                            <div class="media mt-0">
                                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/9.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                                <div class="media-body">
                                                    <div class="d-md-flex align-items-center mt-1">
                                                        <h6 class="mb-1">John Chapman</h6>
                                                    </div>
                                                    <span class="mb-0 fs-13 text-muted">User ID:#6720<span class="ml-2 text-danger fs-13 font-weight-semibold">Pending</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3">
                                            <div class="text-right">
                                                <span class="font-weight-semibold fs-16 number-font">$458</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-card">
                                    <span class="bg-danger list-bar"></span>
                                    <div class="row align-items-center">
                                        <div class="col-9 col-sm-9">
                                            <div class="media mt-0">
                                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/2.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                                <div class="media-body">
                                                    <div class="d-md-flex align-items-center mt-1">
                                                        <h6 class="mb-1">Sonia Smith </h6>
                                                    </div>
                                                    <span class="mb-0 fs-13 text-muted">User ID:#8763<span class="ml-2 text-success fs-13 font-weight-semibold">Paid</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3">
                                            <div class="text-right">
                                                <span class="font-weight-semibold fs-16 number-font">$358</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-card">
                                    <span class="bg-success list-bar"></span>
                                    <div class="row align-items-center">
                                        <div class="col-9 col-sm-9">
                                            <div class="media mt-0">
                                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/11.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                                <div class="media-body">
                                                    <div class="d-md-flex align-items-center mt-1">
                                                        <h6 class="mb-1">Joseph Abraham</h6>
                                                    </div>
                                                    <span class="mb-0 fs-13 text-muted">User ID:#1076<span class="ml-2 text-danger fs-13 font-weight-semibold">Pending</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3">
                                            <div class="text-right">
                                                <span class="font-weight-semibold fs-16 number-font">$796</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-card">
                                    <span class="bg-primary list-bar"></span>
                                    <div class="row align-items-center">
                                        <div class="col-9 col-sm-9">
                                            <div class="media mt-0">
                                                <img src="<?php echo URL::to('/'); ?>/th/assets/images/users/3.jpg" alt="img" class="avatar brround avatar-md mr-3">
                                                <div class="media-body">
                                                    <div class="d-md-flex align-items-center mt-1">
                                                        <h6 class="mb-1">Joseph Abraham</h6>
                                                    </div>
                                                    <span class="mb-0 fs-13 text-muted">User ID:#986<span class="ml-2 text-success fs-13 font-weight-semibold">Paid</span></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3">
                                            <div class="text-right">
                                                <span class="font-weight-semibold fs-16 number-font">$867</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Revenue by customers in Countries</h3>
                                <div class="card-options">
                                    <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="country-card">
                                    <div class="mb-5">
                                        <div class="d-flex">
                                            <span class=""><img src="<?php echo URL::to('/'); ?>/th/assets/images/flags/us.svg" class="w-5 h-5 mr-2" alt="">United States</span>
                                            <div class="ml-auto"><span class="text-success mr-1"><i class="fe fe-trending-up"></i></span><span class="number-font">$45,870</span> (86%)</div>
                                        </div>
                                        <div class="progress h-2  mt-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="d-flex">
                                            <span class=""><img src="<?php echo URL::to('/'); ?>/th/assets/images/flags/in.svg" class="w-5 h-5 mr-2" alt="">India</span>
                                            <div class="ml-auto"><span class="text-danger mr-1"><i class="fe fe-trending-down"></i></span><span class="number-font">$32,879</span> (65%)</div>
                                        </div>
                                        <div class="progress h-2  mt-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="d-flex">
                                            <span class=""><img src="<?php echo URL::to('/'); ?>/th/assets/images/flags/ru.svg" class="w-5 h-5 mr-2" alt="">Russia</span>
                                            <div class="ml-auto"><span class="text-success mr-1"><i class="fe fe-trending-up"></i></span><span class="number-font">$22,710</span> (55%)</div>
                                        </div>
                                        <div class="progress h-2  mt-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 50%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="d-flex">
                                            <span class=""><img src="<?php echo URL::to('/'); ?>/th/assets/images/flags/ca.svg" class="w-5 h-5 mr-2" alt="">Canada</span>
                                            <div class="ml-auto"><span class="text-danger mr-1"><i class="fe fe-trending-down"></i></span><span class="number-font">$56,291</span> (69%)</div>
                                        </div>
                                        <div class="progress h-2  mt-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: 80%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="d-flex">
                                            <span class=""><img src="<?php echo URL::to('/'); ?>/th/assets/images/flags/ge.svg" class="w-5 h-5 mr-2" alt="">Germany</span>
                                            <div class="ml-auto"><span class="text-success mr-1"><i class="fe fe-trending-up"></i></span><span class="number-font">$67,357</span> (73%)</div>
                                        </div>
                                        <div class="progress h-2  mt-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-teal" style="width: 70%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                        <div class="d-flex">
                                            <span class=""><img src="<?php echo URL::to('/'); ?>/th/assets/images/flags/br.svg" class="w-5 h-5 mr-2" alt="">Brazil</span>
                                            <div class="ml-auto"><span class="text-success mr-1"><i class="fe fe-trending-up"></i></span><span class="number-font">$34,209</span> (60%)</div>
                                        </div>
                                        <div class="progress h-2  mt-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-indigo" style="width: 60%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <div class="d-flex">
                                            <span class=""><img src="<?php echo URL::to('/'); ?>/th/assets/images/flags/au.svg" class="w-5 h-5 mr-2" alt="">Australia</span>
                                            <div class="ml-auto"><span class="text-success mr-1"><i class="fe fe-trending-up"></i></span><span class="number-font">$12,876</span> (46%)</div>
                                        </div>
                                        <div class="progress h-2  mt-1">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" style="width: 40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4  col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <p class=" mb-1 fs-14">Users</p>
                                        <h2 class="mb-0"><span class="number-font1">12,769</span><span class="ml-2 text-muted fs-11"><span class="text-danger"><i class="fa fa-caret-down"></i> 43.2</span> this month</span></h2>

                                    </div>
                                    <span class="text-primary fs-35 dash1-iocns bg-primary-transparent border-primary"><i class="las la-users"></i></span>
                                </div>
                                <div class="d-flex mt-4">
                                    <div>
                                        <span class="text-muted fs-12 mr-1">Last Month</span>
                                        <span class="number-font fs-12"><i class="fa fa-caret-up mr-1 text-success"></i>10,876</span>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="text-muted fs-12 mr-1">Last Year</span>
                                        <span class="number-font fs-12"><i class="fa fa-caret-down mr-1 text-danger"></i>88,345</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <p class=" mb-1 fs-14">Sales</p>
                                        <h2 class="mb-0"><span class="number-font1">$34,789</span><span class="ml-2 text-muted fs-11"><span class="text-success"><i class="fa fa-caret-up"></i> 19.8</span> this month</span></h2>
                                    </div>
                                    <span class="text-secondary fs-35 dash1-iocns bg-secondary-transparent border-secondary"><i class="las la-hand-holding-usd"></i></span>
                                </div>
                                <div class="d-flex mt-4">
                                    <div>
                                        <span class="text-muted fs-12 mr-1">Last Month</span>
                                        <span class="number-font fs-12"><i class="fa fa-caret-up mr-1 text-success"></i>$12,786</span>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="text-muted fs-12 mr-1">Last Year</span>
                                        <span class="number-font fs-12"><i class="fa fa-caret-down mr-1 text-danger"></i>$89,987</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div>
                                        <p class=" mb-1 fs-14">Subscribers</p>
                                        <h2 class="mb-0"><span class="number-font1">4,876</span><span class="ml-2 text-muted fs-11"><span class="text-success"><i class="fa fa-caret-up"></i> 0.8%</span> this month</span></h2>
                                    </div>
                                    <span class="text-info fs-35 bg-info-transparent border-info dash1-iocns"><i class="las la-thumbs-up"></i></span>
                                </div>
                                <div class="d-flex mt-4">
                                    <div>
                                        <span class="text-muted fs-12 mr-1">Last Month</span>
                                        <span class="number-font fs-12"><i class="fa fa-caret-up mr-1 text-success"></i>1,034</span>
                                    </div>
                                    <div class="ml-auto">
                                        <span class="text-muted fs-12 mr-1">Last Year</span>
                                        <span class="number-font fs-12"><i class="fa fa-caret-down mr-1 text-danger"></i>8,610</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row-3 -->

                <!--Row-->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Top Product Sales Overview</h3>
                                <div class="card-options">
                                    <a href="#" class="option-dots" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe fe-more-horizontal fs-20"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Last Week</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter text-nowrap mb-0 table-striped table-bordered border-top">
                                        <thead class="">
                                        <tr>
                                            <th>Product</th>
                                            <th>Sold</th>
                                            <th>Record point</th>
                                            <th>Stock</th>
                                            <th>Amount</th>
                                            <th>Stock Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="<?php echo URL::to('/'); ?>/th/assets/images/orders/7.jpg" alt="media1"> New Book</td>
                                            <td><span class="badge badge-primary">18</span></td>
                                            <td>05</td>
                                            <td>112</td>
                                            <td class="number-font">$ 2,356</td>
                                            <td><i class="fa fa-check mr-1 text-success"></i> In Stock</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="<?php echo URL::to('/'); ?>/th/assets/images/orders/8.jpg" alt="media1"> New Bowl</td>
                                            <td><span class="badge badge-info">10</span></td>
                                            <td>04</td>
                                            <td>210</td>
                                            <td class="number-font">$ 3,522</td>
                                            <td><i class="fa fa-check text-success"></i> In Stock</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="<?php echo URL::to('/'); ?>/th/assets/images/orders/9.jpg" alt="media1"> Modal Car</td>
                                            <td><span class="badge badge-secondary">15</span></td>
                                            <td>05</td>
                                            <td>215</td>
                                            <td class="number-font">$ 5,362</td>
                                            <td><i class="fa fa-check text-success"></i> In Stock</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="<?php echo URL::to('/'); ?>/th/assets/images/orders/10.jpg" alt="media1"> Headset</td>
                                            <td><span class="badge badge-primary">21</span></td>
                                            <td>07</td>
                                            <td>102</td>
                                            <td class="number-font">$ 1,326</td>
                                            <td><i class="fa fa-check text-success"></i> In Stock</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="<?php echo URL::to('/'); ?>/th/assets/images/orders/12.jpg" alt="media1"> Watch</td>
                                            <td><span class="badge badge-danger">34</span></td>
                                            <td>10</td>
                                            <td>325</td>
                                            <td class="number-font">$ 5,234</td>
                                            <td><i class="fa fa-check text-success"></i> In Stock</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="<?php echo URL::to('/'); ?>/th/assets/images/orders/13.jpg" alt="media1"> Branded Shoes</td>
                                            <td><span class="badge badge-success">11</span></td>
                                            <td>04</td>
                                            <td>0</td>
                                            <td class="number-font">$ 3,256</td>
                                            <td><i class="fa fa-exclamation-triangle text-warning"></i> Out of stock</td>
                                        </tr>
                                        <tr class="mb-0">
                                            <td class="font-weight-bold"><img class="w-7 h-7 rounded shadow mr-3" src="<?php echo URL::to('/'); ?>/th/assets/images/orders/11.jpg" alt="media1"> New EarPhones</td>
                                            <td><span class="badge badge-warning">60</span></td>
                                            <td>10</td>
                                            <td>0</td>
                                            <td class="number-font">$ 7,652</td>
                                            <td><i class="fa fa-exclamation-triangle text-danger"></i> Out of stock</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End row-->

            </div>
        </div>
        <!-- End app-content-->
    </div>


    <!--Footer-->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-md-12 col-sm-12 text-center">
                    Copyright © 2020 <a href="#">Admitro</a>. Designed by <a href="#">Spruko Technologies Pvt.Ltd</a> All rights reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer-->

</div>
<!-- End Page -->

<!-- Back to top -->
<a href="#top" id="back-to-top"><i class="fe fe-chevrons-up"></i></a>

<!-- Jquery js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/jquery-3.5.1.min.js"></script>

<!-- Bootstrap4 js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/bootstrap/popper.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Othercharts js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/othercharts/jquery.sparkline.min.js"></script>

<!-- Circle-progress js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/circle-progress.min.js"></script>

<!-- Jquery-rating js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/rating/jquery.rating-stars.js"></script>

<!--Sidemenu js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- P-scroll js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scrollbar.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scroll1.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/p-scrollbar/p-scroll.js"></script>

<!--INTERNAL Peitychart js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/peitychart/jquery.peity.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/peitychart/peitychart.init.js"></script>

<!--INTERNAL Apexchart js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/apexcharts.js"></script>

<!--INTERNAL ECharts js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/echarts/echarts.js"></script>

<!--INTERNAL Chart js -->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/chart/chart.bundle.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/chart/utils.js"></script>

<!-- INTERNAL Select2 js -->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo URL::to('/'); ?>/th/assets/js/select2.js"></script>

<!--INTERNAL Moment js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/moment/moment.js"></script>

<!--INTERNAL Index js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/index1.js"></script>

<!-- Simplebar JS -->
<script src="<?php echo URL::to('/'); ?>/th/assets/plugins/simplebar/js/simplebar.min.js"></script>

<!-- Custom js-->
<script src="<?php echo URL::to('/'); ?>/th/assets/js/custom.js"></script>

</body>
</html>
