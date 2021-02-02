@if(!empty($categ))

        <!--ul class="dropdown">
            @foreach($categ as $keyCatas => $categories)
                @if(!empty($categories['name']))
                    <li>
                        <a href="<?php echo URL::to('/') ?>/caregory/{{$keyCatas}}">{{$categories['name']}}</a>
                        @if(!empty($categories['child']))
                            <ul class="submenu">
                                @foreach($categories['child'] as $childrens)
                                    <li><a href="<?php echo URL::to('/') ?>/caregory/{{$childrens['id']}}">{{$childrens['name']}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul--!>

@endif

<nav class="mainNav">
    <div id="JS-headerFixed" class="topHeader__menu u-table u-table--FW gray-border-b">
        <div class="topHeader__container u-tableCell">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-xs-8">
                        <!-- Start menu Navigation -->
                        <div class="topHeader__nav hidden-sm hidden-xs">
                            <ul>
                                <li class="logo"><a href="<?php echo URL::to('/'); ?>"><img src="<?php echo URL::to('/'); ?>/logofront.png" alt="Ringher" /></a></li>
                                </li>
                                @if(!empty($categ))
                                    <li class="menu-item-has-children"><a href="#">{{__('labels.category')}}</a>

                                        <ul class="dropdown">
                                            @foreach($categ as $keyCatas => $categories)
                                                @if(!empty($categories['name']))
                                                    <li>
                                                        <a href="<?php echo URL::to('/') ?>/caregory/{{$keyCatas}}">{{$categories['name']}}</a>
                                                        @if(!empty($categories['child']))
                                                            <ul class="submenu">
                                                                @foreach($categories['child'] as $childrens)
                                                                    <li><a href="<?php echo URL::to('/') ?>/caregory/{{$childrens['id']}}">{{$childrens['name']}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>


                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- End menu Navigation -->
                        <div class="smallDeviceTop visible-sm visible-xs">
                            <div class="buttonArea">
                                <button id="JS-openButton" class="sideMenuTrigger" type="button"><i class="ion-navicon"></i></button>
                            </div>
                            <div class="siteLogo">
                                <a href="#"><img src="<?php echo URL::to('/'); ?>/thf/img/logo-3.png" alt=""></a>
                            </div>
                        </div>
                    </div> <!--// col end-->

                    <div class="col-sm-3 col-xs-4">
                        <div class="topHeader__action">
                            <ul class="pull-right">


                                <li class="JS-searchTrigger topHeader__searchTrigger">
                                    <span class="ion-ios-search-strong"></span>
                                </li> <!--// header search btn end-->

                                @if(!empty($lang))
                                <li>
                                    <select class="langselector" onchange="changeLang(this)">
                                        @foreach($lang as $lng)
                                            <option @if($selLg == $lng->abv) selected="selected" @endif>{{$lng->abv}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                @endif


                                <li class="dropdown__login isLogIn">
                                    <span class="logInCtrl dropdown-toggle" data-toggle="dropdown"><img src="<?php echo URL::to('/'); ?>/thf/img/user.png" alt=""></span>
                                    <div class="dropdown-menu hasUserMenu">
                                        <div class="userMenu">
                                            <ul>
                                                <li><a href="#">Dashboard</a></li>
                                                <li><a href="#">Profile Edite</a></li>
                                                <li><a href="#">Sign out</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="topHeader__searchArea">
    <div class="topHeader__searchForm">
        <button class="formCloseBtn JS-formClose"><span class="ion-close-round"></span></button>
        <form class="topHeader__searchFormWrapper" method="POST" action="<?php echo URL::to('/'); ?>/search">
            @csrf
            <button class="searchAction"><span class="ion-ios-search-strong"></span></button>
            <input class="formInput" name="search" type="text" placeholder="Search here">
        </form>
    </div>
</div>

