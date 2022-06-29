<header class="header">
    <div class="container-xl">
        <div class="header-wrapper">
            <div class="header-nav">
                <div class="header-img">
                    <a href="{{route('indexHome')}}" class="header-img__link">
                        <img src="{{ \App\Info::first()->logo?? asset('RouteBus/assets/images/Logo.png')}}" alt="Image Logo">
                    </a>
                </div>

                <nav class="nav header-list hide-on-mobile-tablet">
                    <a class="nav-link active" aria-current="page" href="#">
                        {{trans('home.route')}}
                    </a>
                    <a class="nav-link" href="#">
                        {{trans('home.carrier')}}
                    </a>
                    <a class="nav-link" href="#">
                        {{trans('home.rental')}}
                    </a>
                </nav>
            </div>

            <div class="header-language hide-on-mobile-tablet">
                <a href="{{route('changeLanguage',['language'=>'vi'])}}">
                    <img src="{{asset('RouteBus/assets/images/header/VietNam.png')}}" alt="Image Language" class="header-language__img">
                </a>

                <a href="{{route('changeLanguage',['language'=>'en'])}}">
                    <img src="{{asset('RouteBus/assets/images/header/USA.png')}}" alt="Image language" class="header-language__img">
                </a>
            </div>

            <div class="header-mobile">
                <div class="header-mobile__tabs" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>
