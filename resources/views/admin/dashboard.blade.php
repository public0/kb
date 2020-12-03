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
                <li class="side-item side-item-category">Widgets & Maps</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.66 4.52l2.83 2.83-2.83 2.83-2.83-2.83 2.83-2.83M9 5v4H5V5h4m10 10v4h-4v-4h4M9 15v4H5v-4h4m7.66-13.31L11 7.34 16.66 13l5.66-5.66-5.66-5.65zM11 3H3v8h8V3zm10 10h-8v8h8v-8zm-10 0H3v8h8v-8z"/></svg>
                        <span class="side-menu__label">Widgets</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu ">
                        <li><a href="widgets-2.html" class="slide-item">Chart Widgets</a></li>
                        <li><a href="widgets-1.html" class="slide-item">Widgets</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zM7 9c0-2.76 2.24-5 5-5s5 2.24 5 5c0 2.88-2.88 7.19-5 9.88C9.92 16.21 7 11.85 7 9z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        <span class="side-menu__label">Map</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="maps2.html" class="slide-item">Leaflet Maps</a></li>
                        <li><a href="maps3.html" class="slide-item">Mapel Maps</a></li>
                        <li><a href="maps.html" class="slide-item">Vector Maps</a></li>
                    </ul>
                </li>
                <li class="side-item side-item-category">Components</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/></svg>
                        <span class="side-menu__label">Apps</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu ">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Chat</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="chat.html">Chat 01</a></li>
                                <li><a class="sub-slide-item" href="chat2.html">Chat 02</a></li>
                                <li><a class="sub-slide-item" href="chat3.html">Chat 03</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Contact</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="contact-list.html">Contact list 01</a></li>
                                <li><a class="sub-slide-item" href="contact-list2.html">Contact list 02</a></li>
                            </ul>
                        </li>
                        <li><a href="calendar.html" class="slide-item"> Calendar</a></li>
                        <li><a href="cookies.html" class="slide-item"> Cookies</a></li>
                        <li><a href="counters.html" class="slide-item"> Counters</a></li>
                        <li><a href="dragula.html" class="slide-item"> Dragula Card</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">File Manager</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="file-manager.html">File Manager 01</a></li>
                                <li><a class="sub-slide-item" href="file-manager-list.html">File Manager 02</a></li>
                            </ul>
                        </li>
                        <li><a href="image-comparison.html" class="slide-item"> Image Comparison</a></li>
                        <li><a href="img-crop.html" class="slide-item"> Image Crop</a></li>
                        <li><a href="loaders.html" class="slide-item"> Loaders</a></li>
                        <li><a href="notify.html" class="slide-item"> Notifications</a></li>
                        <li><a href="page-sessiontimeout.html" class="slide-item"> Page-sessiontimeout</a></li>
                        <li><a href="rangeslider.html" class="slide-item"> Range slider</a></li>
                        <li><a href="rating.html" class="slide-item"> Rating</a></li>
                        <li><a href="sweetalert.html" class="slide-item"> Sweet alerts</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Todo List</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="todo-list.html">Todo List 01</a></li>
                                <li><a class="sub-slide-item" href="todo-list2.html">Todo List 02</a></li>
                                <li><a class="sub-slide-item" href="todo-list3.html">Todo List 03</a></li>
                            </ul>
                        </li>
                        <li><a href="time-line.html" class="slide-item"> Time Line</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">User List</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="users-list-1.html">User List 01</a></li>
                                <li><a class="sub-slide-item" href="users-list-2.html">User List 02</a></li>
                                <li><a class="sub-slide-item" href="users-list-3.html">User List 03</a></li>
                                <li><a class="sub-slide-item" href="users-list-4.html">User List 04</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 15v4H5v-4h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1zM7 18.5c-.82 0-1.5-.67-1.5-1.5s.68-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM19 5v4H5V5h14m1-2H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1h16c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1zM7 8.5c-.82 0-1.5-.67-1.5-1.5S6.18 5.5 7 5.5s1.5.68 1.5 1.5S7.83 8.5 7 8.5z"/></svg>
                        <span class="side-menu__label">Elements</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="accordion.html" class="slide-item"> Accordion</a></li>
                        <li><a href="alerts.html" class="slide-item"> Alerts</a></li>
                        <li><a href="avatars.html" class="slide-item"> Avatars</a></li>
                        <li><a href="badge.html" class="slide-item"> Badges</a></li>
                        <li><a href="breadcrumbs.html" class="slide-item"> Breadcrumb</a></li>
                        <li><a href="buttons.html" class="slide-item"> Buttons</a></li>
                        <li><a href="cards.html" class="slide-item"> Cards</a></li>
                        <li><a href="cards-image.html" class="slide-item"> Card Images</a></li>
                        <li><a href="carousel.html" class="slide-item"> Carousel</a></li>
                        <li><a href="dropdown.html" class="slide-item"> Dropdown</a></li>
                        <li><a href="footers.html" class="slide-item"> Footers</a></li>
                        <li><a href="headers.html" class="slide-item"> Headers</a></li>
                        <li><a href="jumbotron.html" class="slide-item"> Jumbotron</a></li>
                        <li><a href="list.html" class="slide-item"> List Group</a></li>
                        <li><a href="media-object.html" class="slide-item"> Media Obejct</a></li>
                        <li><a href="modal.html" class="slide-item"> Modal</a></li>
                        <li><a href="navigation.html" class="slide-item"> Navigation</a></li>
                        <li><a href="pagination.html" class="slide-item"> Pagination</a></li>
                        <li><a href="panels.html" class="slide-item"> Panel</a></li>
                        <li><a href="popover.html" class="slide-item"> Popover</a></li>
                        <li><a href="progress.html" class="slide-item"> Progress</a></li>
                        <li><a href="tabs.html" class="slide-item"> Tabs</a></li>
                        <li><a href="tags.html" class="slide-item"> Tags</a></li>
                        <li><a href="tooltip.html" class="slide-item"> Tooltips</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M17.73 12.02l3.98-3.98c.39-.39.39-1.02 0-1.41l-4.34-4.34c-.39-.39-1.02-.39-1.41 0l-3.98 3.98L8 2.29C7.8 2.1 7.55 2 7.29 2c-.25 0-.51.1-.7.29L2.25 6.63c-.39.39-.39 1.02 0 1.41l3.98 3.98L2.25 16c-.39.39-.39 1.02 0 1.41l4.34 4.34c.39.39 1.02.39 1.41 0l3.98-3.98 3.98 3.98c.2.2.45.29.71.29.26 0 .51-.1.71-.29l4.34-4.34c.39-.39.39-1.02 0-1.41l-3.99-3.98zM12 9c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm-4.71 1.96L3.66 7.34l3.63-3.63 3.62 3.62-3.62 3.63zM10 13c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2 2c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm2-4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2.66 9.34l-3.63-3.62 3.63-3.63 3.62 3.62-3.62 3.63z"/></svg>
                        <span class="side-menu__label">Utilities</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="elements-border.html" class="slide-item"> Border</a></li>
                        <li><a href="element-colors.html" class="slide-item"> Colors</a></li>
                        <li><a href="elements-display.html" class="slide-item"> Display</a></li>
                        <li><a href="element-flex.html" class="slide-item"> Flex Items</a></li>
                        <li><a href="element-height.html" class="slide-item"> Height</a></li>
                        <li><a href="elements-margin.html" class="slide-item"> Margin</a></li>
                        <li><a href="elements-paddning.html" class="slide-item"> Padding</a></li>
                        <li><a href="element-typography.html" class="slide-item"> Typhography</a></li>
                        <li><a href="element-width.html" class="slide-item"> Width</a></li>
                    </ul>
                </li>
                <li class="side-item side-item-category">Forms & Charts </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z"/></svg>
                        <span class="side-menu__label">Forms</span><span class="badge badge-success side-badge">6</span></a>
                    <ul class="slide-menu">
                        <li><a href="form-elements.html" class="slide-item"> Form Elements</a></li>
                        <li><a href="advanced-forms.html" class="slide-item"> Advanced Forms</a></li>
                        <li><a href="form-wizard.html" class="slide-item"> Form Wizard</a></li>
                        <li><a href="form-editor.html" class="slide-item"> Form Editor</a></li>
                        <li><a href="form-sizes.html" class="slide-item"> Form Element Sizes</a></li>
                        <li><a href="form-treeview.html" class="slide-item"> Form Treeview</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14zM7 10h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/></svg>
                        <span class="side-menu__label">Charts</span><span class="badge badge-info side-badge">7</span></a>
                    <ul class="slide-menu">
                        <li><a href="chart-apex.html" class="slide-item"> Apex Charts</a></li>
                        <li><a href="chart-chartist.html" class="slide-item">Chartjs Charts</a></li>
                        <li><a href="chart-echart.html" class="slide-item"> Echart Charts</a></li>
                        <li><a href="chart-flot.html" class="slide-item"> Flot Charts</a></li>
                        <li><a href="chart-morris.html" class="slide-item"> Morris Charts</a></li>
                        <li><a href="chart-peity.html" class="slide-item"> Pie Charts</a></li>
                        <li><a href="chart-c3.html" class="slide-item">C3 Charts</a></li>
                    </ul>
                </li>
                <li class="side-item side-item-category">Tables & Icons </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M20 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h15c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 2v3H5V5h15zm-5 14h-5v-9h5v9zM5 10h3v9H5v-9zm12 9v-9h3v9h-3z"/></svg>
                        <span class="side-menu__label">Tables</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="tables.html" class="slide-item">Default table</a></li>
                        <li><a href="datatable.html" class="slide-item">Data Table</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 22C6.49 22 2 17.51 2 12S6.49 2 12 2s10 4.04 10 9c0 3.31-2.69 6-6 6h-1.77c-.28 0-.5.22-.5.5 0 .12.05.23.13.33.41.47.64 1.06.64 1.67 0 1.38-1.12 2.5-2.5 2.5zm0-18c-4.41 0-8 3.59-8 8s3.59 8 8 8c.28 0 .5-.22.5-.5 0-.16-.08-.28-.14-.35-.41-.46-.63-1.05-.63-1.65 0-1.38 1.12-2.5 2.5-2.5H16c2.21 0 4-1.79 4-4 0-3.86-3.59-7-8-7z"/><circle cx="6.5" cy="11.5" r="1.5"/><circle cx="9.5" cy="7.5" r="1.5"/><circle cx="14.5" cy="7.5" r="1.5"/><circle cx="17.5" cy="11.5" r="1.5"/></svg>
                        <span class="side-menu__label">Icons</span><span class="badge badge-warning side-badge">11</span></a>
                    <ul class="slide-menu">
                        <li><a href="icons.html" class="slide-item"> Font Awesome</a></li>
                        <li><a href="icons2.html" class="slide-item"> Material Design Icons</a></li>
                        <li><a href="icons3.html" class="slide-item"> Simple Line Icons</a></li>
                        <li><a href="icons4.html" class="slide-item"> Feather Icons</a></li>
                        <li><a href="icons5.html" class="slide-item"> Ionic Icons</a></li>
                        <li><a href="icons6.html" class="slide-item"> Flag Icons</a></li>
                        <li><a href="icons7.html" class="slide-item"> pe7 Icons</a></li>
                        <li><a href="icons8.html" class="slide-item"> Themify Icons</a></li>
                        <li><a href="icons9.html" class="slide-item">Typicons Icons</a></li>
                        <li><a href="icons10.html" class="slide-item">Weather Icons</a></li>
                        <li><a href="icons11.html" class="slide-item">Material Svgs</a></li>
                    </ul>
                </li>
                <li class="side-item side-item-category">Pages & E-Commerce</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 18.54l-7.37-5.73L3 14.07l9 7 9-7-1.63-1.27zM12 16l7.36-5.73L21 9l-9-7-9 7 1.63 1.27L12 16zm0-11.47L17.74 9 12 13.47 6.26 9 12 4.53z"/></svg>
                        <span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Profile</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="profile-1.html">Profile 01</a></li>
                                <li><a class="sub-slide-item" href="profile-2.html">Profile 02</a></li>
                                <li><a class="sub-slide-item" href="profile-3.html">Profile 03</a></li>
                            </ul>
                        </li>
                        <li><a href="editprofile.html" class="slide-item"> Edit Profile</a></li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Email</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="email-compose.html">Email Compose</a></li>
                                <li><a class="sub-slide-item" href="email-inbox.html">Email Inbox</a></li>
                                <li><a class="sub-slide-item" href="email-read.html">Email Read</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Pricing</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="pricing.html">Pricing 01</a></li>
                                <li><a class="sub-slide-item" href="pricing-2.html">Pricing 02</a></li>
                                <li><a class="sub-slide-item" href="pricing-3.html">Pricing 03</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Invoice</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="invoice-list.html">Invoice list</a></li>
                                <li><a class="sub-slide-item" href="invoice-1.html">Invoice 01</a></li>
                                <li><a class="sub-slide-item" href="invoice-2.html">Invoice 02</a></li>
                                <li><a class="sub-slide-item" href="invoice-3.html">Invoice 03</a></li>
                                <li><a class="sub-slide-item" href="invoice-add.html">Add Invoice</a></li>
                                <li><a class="sub-slide-item" href="invoice-edit.html">Edit Invoice</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Blog</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="blog.html">Blog 01</a></li>
                                <li><a class="sub-slide-item" href="blog-2.html">Blog 02</a></li>
                                <li><a class="sub-slide-item" href="blog-3.html">Blog 03</a></li>
                                <li><a class="sub-slide-item" href="blog-styles.html">Blog Styles</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.html" class="slide-item"> Gallery</a></li>
                        <li><a href="faq.html" class="slide-item"> FAQS</a></li>
                        <li><a href="terms.html" class="slide-item"> Terms</a></li>
                        <li><a href="search.html" class="slide-item"> Search</a></li>
                        <li><a href="empty.html" class="slide-item"> Empty Page</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                        <span class="side-menu__label">E-Commerce</span><span class="badge badge-secondary side-badge">3</span></a>
                    <ul class="slide-menu">
                        <li><a href="shop.html" class="slide-item"> Products</a></li>
                        <li><a href="shop-des.html" class="slide-item">Product Details</a></li>
                        <li><a href="cart.html" class="slide-item"> Shopping Cart</a></li>
                    </ul>
                </li>
                <li class="side-item side-item-category">Custom  & Error Pages</li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M14.25 2.26l-.08-.04-.01.02C13.46 2.09 12.74 2 12 2 6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10c0-4.75-3.31-8.72-7.75-9.74zM19.41 9h-7.99l2.71-4.7c2.4.66 4.35 2.42 5.28 4.7zM13.1 4.08L10.27 9l-1.15 2L6.4 6.3C7.84 4.88 9.82 4 12 4c.37 0 .74.03 1.1.08zM5.7 7.09L8.54 12l1.15 2H4.26C4.1 13.36 4 12.69 4 12c0-1.85.64-3.55 1.7-4.91zM4.59 15h7.98l-2.71 4.7c-2.4-.67-4.34-2.42-5.27-4.7zm6.31 4.91L14.89 13l2.72 4.7C16.16 19.12 14.18 20 12 20c-.38 0-.74-.04-1.1-.09zm7.4-3l-4-6.91h5.43c.17.64.27 1.31.27 2 0 1.85-.64 3.55-1.7 4.91z"/></svg>
                        <span class="side-menu__label">Custom Pages</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Register</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="register-1.html">Register 01</a></li>
                                <li><a class="sub-slide-item" href="register-2.html">Register 02</a></li>
                                <li><a class="sub-slide-item" href="register-3.html">Register 03</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Login</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="login-1.html">Login 01</a></li>
                                <li><a class="sub-slide-item" href="login-2.html">Login 02</a></li>
                                <li><a class="sub-slide-item" href="login-3.html">Login 03</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Forget Password</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="forgot-password-1.html">Forget Password 01</a></li>
                                <li><a class="sub-slide-item" href="forgot-password-2.html">Forget Password 02</a></li>
                                <li><a class="sub-slide-item" href="forgot-password-3.html">Forget Password 03</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Reset Password</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="reset-password-1.html">Reset Password 01</a></li>
                                <li><a class="sub-slide-item" href="reset-password-2.html">Reset Password 02</a></li>
                                <li><a class="sub-slide-item" href="reset-password-3.html">Reset Password 03</a></li>
                            </ul>
                        </li>
                        <li class="sub-slide">
                            <a class="sub-side-menu__item" data-toggle="sub-slide" href="#"><span class="sub-side-menu__label">Lock Screen</span><i class="sub-angle fe fe-chevron-down"></i></a>
                            <ul class="sub-slide-menu">
                                <li><a class="sub-slide-item" href="lockscreen-1.html">Lock Screen 01</a></li>
                                <li><a class="sub-slide-item" href="lockscreen-2.html">Lock Screen 02</a></li>
                                <li><a class="sub-slide-item" href="lockscreen-3.html">Lock Screen 03</a></li>
                            </ul>
                        </li>
                        <li><a href="construction.html" class="slide-item"> Under Construction</a></li>
                        <li><a href="coming.html" class="slide-item"> Coming Soon</a></li>
                    </ul>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-toggle="slide" href="#">
                        <svg  class="side-menu__icon"  xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 5.99L19.53 19H4.47L12 5.99M12 2L1 21h22L12 2zm1 14h-2v2h2v-2zm0-6h-2v4h2v-4z"/></svg>
                        <span class="side-menu__label">Error Pages</span><i class="angle fa fa-angle-right"></i></a>
                    <ul class="slide-menu">
                        <li><a href="400.html" class="slide-item"> 400</a></li>
                        <li><a href="401.html" class="slide-item"> 401</a></li>
                        <li><a href="403.html" class="slide-item"> 403</a></li>
                        <li><a href="404.html" class="slide-item"> 404</a></li>
                        <li><a href="500.html" class="slide-item"> 500</a></li>
                        <li><a href="503.html" class="slide-item"> 503</a></li>
                    </ul>
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
