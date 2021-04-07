<!-- Header -->
<div class="hor-header header top-header">
    <div class="container">
        <div class="d-flex">
            <a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a>
            <a class="header-brand" href="{{ route('procesio.home') }}">
                <img src="https://procesio.com/wp-content/uploads/2020/08/Logo-Procesio-80_Navi.png" alt="Procesio" class="header-brand-img desktop-lgo" />
                <img src="https://procesio.com/wp-content/uploads/2020/08/Logo-Procesio-80_Navi.png" alt="Procesio" class="header-brand-img dark-logo" />
            </a>
            <div class="mt-1">
                <form class="form-inline" method="get" action="{{ route('procesio.search') }}">
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
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated">
                        @foreach($languages as $lng)
                        @if($selectedLanguage != $lng->abv)<a class="dropdown-item d-flex" href="javascript:void(0)" onclick="changeLang('{{ $lng->abv }}')">{{ $lng->name }}</a>@endif
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- // Header -->
