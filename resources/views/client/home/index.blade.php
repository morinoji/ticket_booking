@extends('client.layouts.admins')


@section('title')
    <title>Home</title>
@endsection


@section('content')
    @include('client.components.bannerNsearch')


    <!-- Begin Service -->
    <section class="service">
        <div class="container-xl">
            <div class="service-wrapper">
                <div class="service-title">
                    <h2 class="service-title__domain">
                        PROBUS.VN
                    </h2>
                    <h4 class="service-title__description">
                        {{trans('home.best')}}
                    </h4>
                </div>

                <div class="service-option">
                    <div class="service-option__item">
                        <div class="service-option__icon">
                            <img src="{{asset('RouteBus/assets/images/service/1.svg')}}" alt="Image Icon">
                        </div>
                        <p class="service-option__text">
                            {{trans('home.trusted')}}
                        </p>
                    </div>

                    <div class="service-option__item">
                        <div class="service-option__icon">
                            <img src="{{asset('Routebus/assets/images/service/3.svg')}}" alt="Image Icon">
                        </div>
                        <p class="service-option__text">
                            {{trans('home.payment')}}
                        </p>
                    </div>

                    <div class="service-option__item">
                        <div class="service-option__icon">
                            <img src="{{asset('Routebus/assets/images/service/2.svg')}}" alt="Image Icon">
                        </div>

                        <p class="service-option__text">
                            {{trans('home.book')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service -->

    <!-- Begin Popular -->
    <section class="popular" style="background-image: url({{asset('RouteBus/assets/images/backRoute.png')}})">
        <div class="container-xl">
            <h2 class="popular-heading">
                {{trans('home.pop.route')}}
            </h2>
            <div class="popular-wrapper hide-on-mobile-tablet">


                <div class="popular-slide">
                    <div class="swiper popularSwiper ">
                        <div class="swiper-wrapper">
                            <!-- slider image -->
                            @for($i=0;$i<count($popRoutes);$i=$i+4)
                            <div class="swiper-slide popular-slide__item">
                                <div class="popular-slide__left">
                                    <a href="{{isset($popRoutes[$i]->route_name) ? route('findRoute',['id'=>$popRoutes[$i]->id ?? 0]):'#'}}" class="popular-slide__large">
                                        <img src="{{$popRoutes[$i]->image?? asset('RouteBus/assets/images/Banner/Mask Group 1.png')}}"
                                             style="object-fit: cover"
                                             alt="Image located">
                                        <span class="popular-slide__text">{{$popRoutes[$i]->route_name ?? ''}}</span>
                                    </a>

                                    <div class="popular-slide__bottom">
                                        <a href="{{isset($popRoutes[$i+1]->route_name) ?  route('findRoute',['id'=>$popRoutes[$i+1]->id ?? 0]):'#'}}" class="popular-slide__small">
                                            <img src="{{$popRoutes[$i+1]->image??asset('RouteBus/assets/images/Banner/Mask Group 3.png')}}"
                                                 style="object-fit: cover"
                                                 alt="Image located">
                                            <span class="popular-slide__text">{{$popRoutes[$i+1]->route_name ?? ''}}</span>
                                        </a>

                                        <a href="{{isset($popRoutes[$i+2]->route_name) ? route('findRoute',['id'=>$popRoutes[$i+2]->id ?? 0]):'#'}}" class="popular-slide__medium">
                                            <img src="{{$popRoutes[$i+2]->image??asset('RouteBus/assets/images/Banner/Mask Group 4.png')}}"
                                                 style="object-fit: cover"
                                                 alt="Image located">
                                            <span class="popular-slide__text">{{$popRoutes[$i+2]->route_name ?? ''}}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="popular-slide__right">
                                    <a href="{{isset($popRoutes[$i+3]->route_name) ? route('findRoute',['id'=>$popRoutes[$i+3]->id ?? 0]):'#'}}">
                                        <!-- <div class="popular-slide__right-cover"> -->
                                        <img src="{{$popRoutes[$i+3]->image?? asset('RouteBus/assets/images/Banner/Mask Group 2.png')}}"
                                             style="object-fit: cover"
                                             alt="Image located">
                                        <!-- </div> -->
                                        <span class="popular-slide__text">{{$popRoutes[$i+3]->route_name ?? ''}}</span>
                                    </a>
                                </div>
                            </div>
                            @endfor


{{--                            <div class="swiper-slide popular-slide__item">--}}

{{--                                <div class="popular-slide__left">--}}
{{--                                    <a href="#" class="popular-slide__large">--}}

{{--                                        <!-- <div class="popular-slide__cover"> -->--}}
{{--                                        <img src="./assets/images/Banner/Mask Group 1.png" alt="Image located">--}}
{{--                                        <!-- </div> -->--}}

{{--                                        <span class="popular-slide__text">Hà Nội - TP. Hồ Chí Minh</span>--}}
{{--                                    </a>--}}

{{--                                    <div class="popular-slide__bottom">--}}
{{--                                        <a href="#" class="popular-slide__small">--}}
{{--                                            <!-- <div class="popular-slide__cover"> -->--}}
{{--                                            <img src="./assets/images/Banner/Mask Group 3.png" alt="Image located">--}}
{{--                                            <!-- </div> -->--}}
{{--                                            <span class="popular-slide__text">Hải Phòng - Hà Nội</span>--}}
{{--                                        </a>--}}

{{--                                        <a href="#" class="popular-slide__medium">--}}
{{--                                            <!-- <div class="popular-slide__cover"> -->--}}
{{--                                            <img--}}
{{--                                                src="https://i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk"--}}
{{--                                                alt="Image located">--}}
{{--                                            <!-- </div> -->--}}
{{--                                            <span class="popular-slide__text">TP.HCM - Vũng Tàu</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="popular-slide__right">--}}
{{--                                    <a href="#">--}}
{{--                                        <!-- <div class="popular-slide__cover-right"> -->--}}
{{--                                        <img src="./assets/images/Banner/Mask Group 2.png" alt="Image located">--}}
{{--                                        <!-- </div> -->--}}
{{--                                        <span class="popular-slide__text">TP.HCM - Đà Lạt</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>

                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-next popular-slide__button">
                        <svg id="arrow-back" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                             viewBox="0 0 50 50">
                            <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                  transform="translate(50) rotate(90)" fill="#3a3938" opacity="0"/>
                            <path id="Path_23" data-name="Path 23"
                                  d="M6.625,22.144H37.757L28.229,9.688a3.037,3.037,0,0,1,.341-4.028,2.485,2.485,0,0,1,3.7.371L45.4,23.173a3.474,3.474,0,0,1,.236.429.372.372,0,0,0,.184.371,2.97,2.97,0,0,1,0,2.057.372.372,0,0,1-.184.371,3.474,3.474,0,0,1-.236.429L32.271,43.971A2.545,2.545,0,0,1,30.25,45a2.5,2.5,0,0,1-1.68-.657,2.941,2.941,0,0,1-.939-1.937,3.03,3.03,0,0,1,.6-2.091l9.529-12.456H6.625a2.867,2.867,0,0,1,0-5.714Z"
                                  transform="translate(0 0)" fill="#3a3938"/>
                        </svg>
                    </div>

                    <div class="swiper-button-prev popular-slide__button">
                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                             viewBox="0 0 50 50">
                            <g id="arrow-back">
                                <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                      transform="translate(50) rotate(90)" fill="#3a3938" opacity="0"/>
                                <path id="Path_23" data-name="Path 23"
                                      d="M43.375,22.144H12.243L21.771,9.688a3.037,3.037,0,0,0-.341-4.028,2.485,2.485,0,0,0-3.7.371L4.6,23.173a3.474,3.474,0,0,0-.236.429.372.372,0,0,1-.184.371,2.97,2.97,0,0,0,0,2.057.372.372,0,0,0,.184.371,3.474,3.474,0,0,0,.236.429L17.729,43.971A2.545,2.545,0,0,0,19.75,45a2.5,2.5,0,0,0,1.68-.657,2.941,2.941,0,0,0,.939-1.937,3.03,3.03,0,0,0-.6-2.091L12.243,27.858H43.375a2.867,2.867,0,0,0,0-5.714Z"
                                      fill="#3a3938"/>
                            </g>
                        </svg>
                    </div>
                </div>

                <a href="{{route('listingPop')}}"><button class="btn btn-button popular-btn">
                        {{trans('home.seemore')}}
                    </button></a>
            </div>

            <div class="popular-mobile">
                <div class="swiper popularMbSwiper ">

                        <div class="swiper-wrapper">
                            <!-- slider image -->
                            @for($i=0;$i<count($popRoutes);$i++)
                            <div class="swiper-slide popular-mobile__item">
                                <a href="{{route('findRoute',['id'=>$popRoutes[$i]->id])}}">
                                    <!-- <div class="popular-slide__right-cover"> -->
                                    <img src="{{$popRoutes[$i]->image??asset('RouteBus/assets/images/Banner/Mask Group 2.png')}}"  style="object-fit: cover" alt="Image located">
                                    <!-- </div> -->
                                    <span class="popular-slide__text">{{$popRoutes[$i]->route_name ?? ''}}</span>
                                </a>
                            </div>

{{--                            <div class="swiper-slide popular-mobile__item">--}}
{{--                                <a href="#">--}}
{{--                                    <!-- <div class="popular-slide__right-cover"> -->--}}
{{--                                    <img src="{{$popRoutes[$i+1]->image??asset('RouteBus/assets/images/Banner/Mask Group 1.png')}}"  style="object-fit: cover" alt="Image located">--}}
{{--                                    <!-- </div> -->--}}
{{--                                    <span class="popular-slide__text">TP.HCM - Đà Lạt</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div class="swiper-slide popular-mobile__item">--}}
{{--                                <a href="#">--}}
{{--                                    <!-- <div class="popular-slide__right-cover"> -->--}}
{{--                                    <img src="{{$popRoutes[$i+2]->image??asset('RouteBus/assets/images/Banner/Mask Group 2.png')}}"  style="object-fit: cover" alt="Image located">--}}
{{--                                    <!-- </div> -->--}}
{{--                                    <span class="popular-slide__text">TP.HCM - Đà Lạt</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div class="swiper-slide popular-mobile__item">--}}
{{--                                <a href="#">--}}
{{--                                    <!-- <div class="popular-slide__right-cover"> -->--}}
{{--                                    <img src="{{$popRoutes[$i+3]->image??asset('RouteBus/assets/images/Banner/Mask Group 3.png')}}"  style="object-fit: cover" alt="Image located">--}}
{{--                                    <!-- </div> -->--}}
{{--                                    <span class="popular-slide__text">TP.HCM - Đà Lạt</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}

{{--                            <div class="swiper-slide popular-mobile__item">--}}
{{--                                <a href="#">--}}
{{--                                    <!-- <div class="popular-slide__right-cover"> -->--}}
{{--                                    <img src="{{asset('RouteBus/assets/images/Banner/Mask Group 4.png')}}" style="object-fit: cover" alt="Image located">--}}
{{--                                    <!-- </div> -->--}}
{{--                                    <span class="popular-slide__text">TP.HCM - Đà Lạt</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                            @endfor
                        </div>



                </div>

                <a href="{{route('listingPop')}}"> <button class="btn btn-button popular-btn" >
                        {{trans('home.seemore')}}
                </button></a>
            </div>
        </div>
    </section>
    <img src="{{asset('RouteBus/assets/images/Line.png')}}" alt="image back" class="popular-bottom">
    <!-- End Popular -->

    <!-- Begin Brand -->
    <section class="brand">
        <div class="container-xl">
            <div class="brand-wrapper">
                <h3 class="popular-heading"> {{trans('home.pop.carrier')}}</h3>

                <div class="brand-slide">
                    <div class="swiper brandSwiper">

                        <div class="swiper-wrapper">
                            <!-- slider image -->
                            @foreach($comps as $comp)

                            <div class="swiper-slide brand-slide__item">
                                <a href="{{route('findCarrier',['id'=>$comp->id])}}">
                                    <div class="brand-slide__cover">
                                        <img src="{{$comp->getImages[0]->image}}" alt="Image Brand" style="border-radius: 16px;"
                                             class="brand-slide__img">

                                        <div class="brand-slide__info">
                                            <img src="{{$comp->image}}" alt="Image Logo">
                                            <p class="brand-slide__text">
                                                {{$comp->comp_name}}
                                            </p>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            @endforeach
{{--                            <div class="swiper-slide brand-slide__item">--}}
{{--                                <div class="brand-slide__cover">--}}
{{--                                    <img src="{{asset('RouteBus/assets/images/Brand/SaoViet.png')}}" alt="Image Brand"--}}
{{--                                         class="brand-slide__img">--}}

{{--                                    <div class="brand-slide__info">--}}
{{--                                        <img src="{{asset('RouteBus/assets/images/Brand/logo2.png')}}" alt="Image Logo">--}}
{{--                                        <p class="brand-slide__text">--}}
{{--                                            Taxi Hoa Mai--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="swiper-slide brand-slide__item">--}}
{{--                                <div class="brand-slide__cover">--}}
{{--                                    <img src="{{asset('RouteBus/assets/images/Brand/SaoViet.png')}}" alt="Image Brand"--}}
{{--                                         class="brand-slide__img">--}}

{{--                                    <div class="brand-slide__info">--}}
{{--                                        <img src="{{asset('RouteBus/assets/images/Brand/logo3.png')}}" alt="Image Logo">--}}
{{--                                        <p class="brand-slide__text">--}}
{{--                                            Hạ Long Travel--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="swiper-slide brand-slide__item">--}}
{{--                                <div class="brand-slide__cover">--}}
{{--                                    <img src="{{asset('RouteBus/assets/images/Brand/SaoViet.png')}}" alt="Image Brand"--}}
{{--                                         class="brand-slide__img">--}}

{{--                                    <div class="brand-slide__info">--}}
{{--                                        <img src="{{asset('RouteBus/assets/images/Brand/logo4.png')}}" alt="Image Logo">--}}
{{--                                        <p class="brand-slide__text">--}}
{{--                                            Thanh Bình Xanh--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="swiper-slide brand-slide__item">--}}
{{--                                <div class="brand-slide__cover">--}}
{{--                                    <img src="{{asset('RouteBus/assets/images/Brand/SaoViet.png')}}" alt="Image Brand"--}}
{{--                                         class="brand-slide__img">--}}

{{--                                    <div class="brand-slide__info">--}}
{{--                                        <img src="{{asset('RouteBus/assets/images/Brand/logo5.png')}}" alt="Image Logo">--}}
{{--                                        <p class="brand-slide__text">--}}
{{--                                            Thiện Thành--}}
{{--                                        </p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-next brand-slide__button">
                        <svg id="arrow-back" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                             viewBox="0 0 50 50">
                            <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                  transform="translate(50) rotate(90)" fill="#3a3938" opacity="0"/>
                            <path id="Path_23" data-name="Path 23"
                                  d="M6.625,22.144H37.757L28.229,9.688a3.037,3.037,0,0,1,.341-4.028,2.485,2.485,0,0,1,3.7.371L45.4,23.173a3.474,3.474,0,0,1,.236.429.372.372,0,0,0,.184.371,2.97,2.97,0,0,1,0,2.057.372.372,0,0,1-.184.371,3.474,3.474,0,0,1-.236.429L32.271,43.971A2.545,2.545,0,0,1,30.25,45a2.5,2.5,0,0,1-1.68-.657,2.941,2.941,0,0,1-.939-1.937,3.03,3.03,0,0,1,.6-2.091l9.529-12.456H6.625a2.867,2.867,0,0,1,0-5.714Z"
                                  transform="translate(0 0)" fill="#3a3938"/>
                        </svg>
                    </div>
                    <div class="swiper-button-prev brand-slide__button">
                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                             viewBox="0 0 50 50">
                            <g id="arrow-back">
                                <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                      transform="translate(50) rotate(90)" fill="#3a3938" opacity="0"/>
                                <path id="Path_23" data-name="Path 23"
                                      d="M43.375,22.144H12.243L21.771,9.688a3.037,3.037,0,0,0-.341-4.028,2.485,2.485,0,0,0-3.7.371L4.6,23.173a3.474,3.474,0,0,0-.236.429.372.372,0,0,1-.184.371,2.97,2.97,0,0,0,0,2.057.372.372,0,0,0,.184.371,3.474,3.474,0,0,0,.236.429L17.729,43.971A2.545,2.545,0,0,0,19.75,45a2.5,2.5,0,0,0,1.68-.657,2.941,2.941,0,0,0,.939-1.937,3.03,3.03,0,0,0-.6-2.091L12.243,27.858H43.375a2.867,2.867,0,0,0,0-5.714Z"
                                      fill="#3a3938"/>
                            </g>
                        </svg>
                    </div>
                </div>

                <button class="btn btn-button popular-btn">
                    {{trans('home.seemore')}}
                </button>
            </div>
        </div>
    </section>
@endsection
