@extends('client.layouts.admins')

@section('title')
    <title>Tìm kiếm</title>
@endsection

@section('content')

    @include('client.components.bannerNsearch')
    <section class="search popular">
        <div class="container-xl">
            <div class="search-header">
                <h2 class="popular-heading">
                    Kết quả tìm kiếm: {{$search}}
                </h2>

                <div class="search-header__lines">

                </div>
            </div>

            <div class="search-list">
                @if($is_route)
                @foreach($results as $result)
                    <div class="popular-page__mobile-item">
                        <a href="#" class="popular-page__mobile-link">
                            <!-- <div class="popular-slide__right-cover"> -->
                            <img src="{{$result->image}}" alt="Image located">
                            <!-- </div> -->
                            <span class="popular-slide__text">{{$result->route_name?? $result->comp_name}}</span>
                        </a>
                    </div>
                @endforeach
                @else
                    @foreach($results as $result)
                    <div class="swiper-slide brand-slide__item">
                        <div class="brand-slide__cover">
                            <img src="{{$result->thumb_image}}" alt="Image Brand" style="border-radius: 16px;"
                                 class="brand-slide__img">
                            <div class="brand-slide__info">
                                <img src="{{$result->image}}" alt="Image Logo">
                                <p class="brand-slide__text">
                                    {{$result->comp_name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>

@endsection
