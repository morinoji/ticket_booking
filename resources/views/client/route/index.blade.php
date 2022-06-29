@extends('client.layouts.admins')

@section('title')
    <title>Tìm kiếm</title>
@endsection

@section('content')
    @include('client.components.bannerNsearch')
    <section class="popular page">
    <div class="container-xl">
        <h2 class="popular-heading">
            {{trans('home.pop.route')}}
        </h2>

        <div class="popular-page hide-on-mobile-tablet">
            <div class="popular-slide__item">
                <div class="popular-slide__left">
                    <a href="#" class="popular-slide__large">
                        <img src="{{$routes[0]->image?? asset('RouteBus/assets/images/Banner/Mask Group 1.png')}}" alt="Image located">
                        <span class="popular-slide__text">{{$routes[0]->route_name?? ''}}</span>
                    </a>

                    <div class="popular-slide__bottom">
                        <a href="#" class="popular-slide__small">
                            <img src="{{$routes[1]->image?? asset('RouteBus/assets/images/Banner/Mask Group 3.png')}}" alt="Image located">
                            <span class="popular-slide__text">{{$routes[1]->route_name?? ''}}</span>
                        </a>

                        <a href="#" class="popular-slide__medium">
                            <img src="{{$routes[2]->image?? asset('RouteBus/assets/images/Banner/Mask Group 4.png')}}" alt="Image located">
                            <span class="popular-slide__text">{{$routes[2]->route_name?? ''}}</span>
                        </a>
                    </div>
                </div>

                <div class="popular-slide__right">
                    <a href="#">
                        <!-- <div class="popular-slide__right-cover"> -->
                        <img src="{{$routes[3]->image?? asset('RouteBus/assets/images/Banner/Mask Group 2.png')}}" alt="Image located">
                        <!-- </div> -->
                        <span class="popular-slide__text">{{$routes[3]->route_name?? ''}}</span>
                    </a>
                </div>
            </div>

            <div class="popular-slide__item">
                <div class="popular-slide__right">
                    <a href="#">
                        <!-- <div class="popular-slide__right-cover"> -->
                        <img src="{{$routes[4]->image?? asset('RouteBus/assets/images/Banner/Mask Group 2.png')}}" alt="Image located">
                        <!-- </div> -->
                        <span class="popular-slide__text">{{$routes[4]->route_name?? ''}}</span>
                    </a>
                </div>

                <div class="popular-slide__left">
                    <a href="#" class="popular-slide__large">
                        <img src="{{$routes[5]->image?? asset('RouteBus/assets/images/Banner/Mask Group 1.png')}}" alt="Image located">
                        <span class="popular-slide__text">{{$routes[5]->route_name?? ''}}</span>
                    </a>

                    <div class="popular-slide__bottom">
                        <a href="#" class="popular-slide__small">
                            <img src="{{$routes[6]->image ?? asset('RouteBus/assets/images/Banner/Mask Group 3.png')}}" alt="Image located">
                            <span class="popular-slide__text">{{$routes[6]->route_name?? ''}}</span>
                        </a>

                        <a href="#" class="popular-slide__medium">
                            <img src="{{$routes[7]->image ?? asset('RouteBus/assets/images/Banner/Mask Group 4.png')}}" alt="Image located">
                            <span class="popular-slide__text">{{$routes[7]->route_name?? ''}}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="popular-page__mobile">
            @foreach($routes as $route)
            <div class="popular-page__mobile-item">
                <a href="#" class="popular-page__mobile-link">
                    <!-- <div class="popular-slide__right-cover"> -->
                    <img src="{{$route->image ?? asset('RouteBus/assets/images/Banner/Mask Group 2.png')}}" alt="Image located">
                    <!-- </div> -->
                    <span class="popular-slide__text">{{$route->route_name?? ''}}</span>
                </a>
            </div>
            @endforeach
        </div>

        <div style="align-items: center" class="mt-3">
            {{$routes->links('pagination::webPagination')}}
        </div>

{{--        <div class="pagination" id="patigation__search_page">--}}
{{--            <ul class="pagination">--}}
{{--                <!-- 1 -->--}}
{{--                <li class="pagination-item pagination-item--active">--}}
{{--                    <a href="#" class="pagination-item__link">1</a>--}}
{{--                </li>--}}
{{--                <!-- 2 -->--}}
{{--                <li class="pagination-item">--}}
{{--                    <a href="#" class="pagination-item__link">2</a>--}}
{{--                </li>--}}
{{--                <!-- 3 -->--}}
{{--                <li class="pagination-item">--}}
{{--                    <a href="#" class="pagination-item__link">3</a>--}}
{{--                </li>--}}
{{--                <!-- 4 -->--}}
{{--                <li class="pagination-item">--}}
{{--                    <a href="#" class="pagination-item__link">4</a>--}}
{{--                </li>--}}
{{--                <!-- 5 -->--}}
{{--                <!-- <li class="pagination-item">--}}
{{--                    <a href="#" class="pagination-item__link">5</a>--}}
{{--                </li> -->--}}
{{--                <!-- ... -->--}}
{{--                <li class="pagination-item">--}}
{{--                    <a href="#" class="pagination-item__link dots">...</a>--}}
{{--                </li>--}}
{{--                <!-- 14 -->--}}
{{--                <li class="pagination-item">--}}
{{--                    <a href="#" class="pagination-item__link">7</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>
</section>
@endsection
