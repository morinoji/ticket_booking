@extends('client.layouts.admins')

@section('title')
    <title>Thuê xe hợp đồng</title>
@endsection

@section('content')
    <!-- End Header -->

    <!-- Begin Banner -->
    <section class="banner">
        <div class="swiper mySwiper banner-slide">
            <div class="swiper-wrapper">
                <!-- slider image -->
                @foreach($sliders as $slider)
                    @if($slider->is_contract==1)
                        <div class="swiper-slide banner-slide__item">
                            <a href="#" class="banner-slide__link">
                                <img src="{{$slider->image}}" alt="Image Banner"
                                     class="banner-slide__img">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- <div class="swiper-pagination"></div> -->
            <div class="swiper-button-next banner-slide__button">
                <svg id="arrow-back" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50">
                    <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                          transform="translate(50) rotate(90)" fill="#3a3938" opacity="0"/>
                    <path id="Path_23" data-name="Path 23"
                          d="M6.625,22.144H37.757L28.229,9.688a3.037,3.037,0,0,1,.341-4.028,2.485,2.485,0,0,1,3.7.371L45.4,23.173a3.474,3.474,0,0,1,.236.429.372.372,0,0,0,.184.371,2.97,2.97,0,0,1,0,2.057.372.372,0,0,1-.184.371,3.474,3.474,0,0,1-.236.429L32.271,43.971A2.545,2.545,0,0,1,30.25,45a2.5,2.5,0,0,1-1.68-.657,2.941,2.941,0,0,1-.939-1.937,3.03,3.03,0,0,1,.6-2.091l9.529-12.456H6.625a2.867,2.867,0,0,1,0-5.714Z"
                          transform="translate(0 0)" fill="#3a3938"/>
                </svg>
            </div>
            <div class="swiper-button-prev banner-slide__button">
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

    </section>
    <!-- End Banner -->

    <!-- Begin Service -->
    <section class="service service-rent">
        <div class="container-xl">
            <div class="service-wrapper">
                <div class="service-title">
                    <h4 class="service-title__description">
                        DỊCH VỤ THUÊ XE HỢP ĐỒNG UY TÍN VÀ CHUYÊN NGHIỆP
                    </h4>
                    <h2 class="service-title__domain">
                        Hàng đầu việt nam
                    </h2>
                </div>

                <div class="service-option">
                    <div class="service-option__item">
                        <div class="service-option__icon">
                            <img src="{{asset('RouteBus/assets/images/service/megre.svg')}}" alt="Image Icon">
                        </div>

                        <div class="service-rent__info">
                            <h4 class="service-rent__title">Hơn 100 đối tác</h4>

                            <p class="service-option__text">
                                Đáp ứng đa dạng dòng xe theo nhu cầu của khách
                            </p>
                        </div>
                    </div>

                    <div class="service-option__item">
                        <div class="service-option__icon">
                            <img src="{{asset('RouteBus/assets/images/service/Team.svg')}}" alt="Image Icon">
                        </div>

                        <div class="service-rent__info">
                            <h4 class="service-rent__title">Đội ngũ nhân viên</h4>

                            <p class="service-option__text">
                                Hỗ trợ tận tình chuyên nghiệp, giải đáp mọi thắc mắc 24/7
                            </p>
                        </div>
                    </div>

                    <div class="service-option__item">
                        <div class="service-option__icon">
                            <img src="{{asset('RouteBus/assets/images/service/saveMoney.svg')}}" alt="Image Icon">
                        </div>

                        <div class="service-rent__info">
                            <h4 class="service-rent__title">Tiết kiệm ngân sách</h4>

                            <p class="service-option__text">
                                Nhiều dòng xe, phù hợp với ngân sách và nhu cầu
                            </p>
                        </div>
                    </div>

                    <div class="service-option__item">
                        <div class="service-option__icon">
                            <img src="{{asset('RouteBus/assets/images/service/3.svg')}}" alt="Image Icon">
                        </div>

                        <div class="service-rent__info">
                            <h4 class="service-rent__title">Thanh toán tiện lợi</h4>

                            <p class="service-option__text">
                                Nhiều hình thức thanh toán linh hoạt để lựa chọn
                            </p>
                        </div>
                    </div>
                </div>

                <div class="service-rent__img">
                    <img src="{{asset('RouteBus/assets/images/service/multiple-car.png')}}" alt="Image">
                </div>
            </div>
        </div>
    </section>
    <section class="travel" style="background-image: url({{asset('RouteBus/assets/images/Banner/bannerPosition.png')}})">

        <div class="travel-wrapper">
            <h3 class="popular-heading travel-heading">
                các điểm du lịch hot
            </h3>

            <div class="travel-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="north-tab" data-bs-toggle="tab" data-bs-target="#north"
                                type="button" role="tab" aria-controls="north" aria-selected="true">
                            Miền Bắc
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="central-tab" data-bs-toggle="tab" data-bs-target="#central"
                                type="button" role="tab" aria-controls="central" aria-selected="false">
                            Miền Trung
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="south-tab" data-bs-toggle="tab" data-bs-target="#south"
                                type="button" role="tab" aria-controls="south" aria-selected="false">
                            Miền Nam
                        </button>
                    </li>
                </ul>

                <div class="container-xl">
                    <div class="tab-content" id="myTabContent">
                        <!-- Slider Travel North -->
                        <div class="tab-pane fade show active" id="north" role="tabpanel" aria-labelledby="north-tab">

                            <div class="swiper travelSwiper travel-slide">
                                <div class="swiper-wrapper">
                                    <!-- slider image -->
                                    @foreach($locs as $element)
                                        @if($element->area=='Miền Bắc')
                                            <div class="swiper-slide travel-slide__item">
                                                <a href="#">
                                                    <!-- <div class="popular-slide__right-cover"> -->
                                                    <div class="travel-slide__img">
                                                        <img src="{{$element->image}}" alt="Image located">
                                                    </div>
                                                    <!-- </div> -->
                                                    <div class="popular-slide__text">
{{--                                                        <p class="travel-slide__place">TP.HCM - Đà Lạt</p>--}}
                                                        <span class="travel-slide__position">
                                                    <svg id="Layer_2" data-name="Layer 2"
                                                         xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 20 20">
                                                        <g id="pin">
                                                            <rect id="Rectangle_2" data-name="Rectangle 2" width="20"
                                                                  height="20" fill="#c4c4c4" opacity="0" />
                                                            <path id="Path_3" data-name="Path 3"
                                                                  d="M10.667,2A6.667,6.667,0,0,0,4,8.6c0,4.566,5.875,9.65,6.125,9.866a.833.833,0,0,0,1.083,0c.292-.217,6.125-5.3,6.125-9.867A6.667,6.667,0,0,0,10.667,2Zm0,14.708c-1.392-1.325-5-5-5-8.108a5,5,0,0,1,10,0C15.667,11.683,12.058,15.383,10.667,16.708Z"
                                                                  transform="translate(-0.667 -0.333)" fill="#c4c4c4" />
                                                            <path id="Path_4" data-name="Path 4"
                                                                  d="M11.417,6a2.917,2.917,0,1,0,2.917,2.917A2.917,2.917,0,0,0,11.417,6Zm0,4.167a1.25,1.25,0,1,1,1.25-1.25A1.25,1.25,0,0,1,11.417,10.167Z"
                                                                  transform="translate(-1.417 -1)" fill="#c4c4c4" />
                                                        </g>
                                                    </svg>
                                                    <p>{{$element->location_name}}</p>
                                                </span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                            <div class="swiper-button-next travel-slide__button">
                                <svg id="arrow-back" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                     viewBox="0 0 50 50">
                                    <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                          transform="translate(50) rotate(90)" fill="#fff" opacity="0" />
                                    <path id="Path_23" data-name="Path 23"
                                          d="M6.625,22.144H37.757L28.229,9.688a3.037,3.037,0,0,1,.341-4.028,2.485,2.485,0,0,1,3.7.371L45.4,23.173a3.474,3.474,0,0,1,.236.429.372.372,0,0,0,.184.371,2.97,2.97,0,0,1,0,2.057.372.372,0,0,1-.184.371,3.474,3.474,0,0,1-.236.429L32.271,43.971A2.545,2.545,0,0,1,30.25,45a2.5,2.5,0,0,1-1.68-.657,2.941,2.941,0,0,1-.939-1.937,3.03,3.03,0,0,1,.6-2.091l9.529-12.456H6.625a2.867,2.867,0,0,1,0-5.714Z"
                                          transform="translate(0 0)" fill="#fff" />
                                </svg>
                            </div>
                            <div class="swiper-button-prev travel-slide__button">
                                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="40"
                                     height="40" viewBox="0 0 50 50">
                                    <g id="arrow-back">
                                        <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                              transform="translate(50) rotate(90)" fill="#fff" opacity="0" />
                                        <path id="Path_23" data-name="Path 23"
                                              d="M43.375,22.144H12.243L21.771,9.688a3.037,3.037,0,0,0-.341-4.028,2.485,2.485,0,0,0-3.7.371L4.6,23.173a3.474,3.474,0,0,0-.236.429.372.372,0,0,1-.184.371,2.97,2.97,0,0,0,0,2.057.372.372,0,0,0,.184.371,3.474,3.474,0,0,0,.236.429L17.729,43.971A2.545,2.545,0,0,0,19.75,45a2.5,2.5,0,0,0,1.68-.657,2.941,2.941,0,0,0,.939-1.937,3.03,3.03,0,0,0-.6-2.091L12.243,27.858H43.375a2.867,2.867,0,0,0,0-5.714Z"
                                              fill="#fff" />
                                    </g>
                                </svg>
                            </div>

                        </div>

                        <!-- Slider Travel Central -->
                        <div class="tab-pane fade" id="central" role="tabpanel" aria-labelledby="central-tab">
                            <div class="swiper travelCentralSwiper travel-slide">
                                <div class="swiper-wrapper">
                                    <!-- slider image -->
                                    @foreach($locs as $element)
                                        @if($element->area=='Miền Trung')
                                            <div class="swiper-slide travel-slide__item">
                                                <a href="#">
                                                    <!-- <div class="popular-slide__right-cover"> -->
                                                    <div class="travel-slide__img">
                                                        <img src="{{$element->image}}" alt="Image located">
                                                    </div>
                                                    <!-- </div> -->
                                                    <div class="popular-slide__text">
{{--                                                        <p class="travel-slide__place">TP.HCM - Đà Lạt</p>--}}
                                                        <span class="travel-slide__position">
                                                    <svg id="Layer_2" data-name="Layer 2"
                                                         xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 20 20">
                                                        <g id="pin">
                                                            <rect id="Rectangle_2" data-name="Rectangle 2" width="20"
                                                                  height="20" fill="#c4c4c4" opacity="0" />
                                                            <path id="Path_3" data-name="Path 3"
                                                                  d="M10.667,2A6.667,6.667,0,0,0,4,8.6c0,4.566,5.875,9.65,6.125,9.866a.833.833,0,0,0,1.083,0c.292-.217,6.125-5.3,6.125-9.867A6.667,6.667,0,0,0,10.667,2Zm0,14.708c-1.392-1.325-5-5-5-8.108a5,5,0,0,1,10,0C15.667,11.683,12.058,15.383,10.667,16.708Z"
                                                                  transform="translate(-0.667 -0.333)" fill="#c4c4c4" />
                                                            <path id="Path_4" data-name="Path 4"
                                                                  d="M11.417,6a2.917,2.917,0,1,0,2.917,2.917A2.917,2.917,0,0,0,11.417,6Zm0,4.167a1.25,1.25,0,1,1,1.25-1.25A1.25,1.25,0,0,1,11.417,10.167Z"
                                                                  transform="translate(-1.417 -1)" fill="#c4c4c4" />
                                                        </g>
                                                    </svg>
                                                    <p>{{$element->location_name}}</p>
                                                </span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                            <div class="swiper-button-next travel-slide__button">
                                <svg id="arrow-back" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                     viewBox="0 0 50 50">
                                    <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                          transform="translate(50) rotate(90)" fill="#fff" opacity="0" />
                                    <path id="Path_23" data-name="Path 23"
                                          d="M6.625,22.144H37.757L28.229,9.688a3.037,3.037,0,0,1,.341-4.028,2.485,2.485,0,0,1,3.7.371L45.4,23.173a3.474,3.474,0,0,1,.236.429.372.372,0,0,0,.184.371,2.97,2.97,0,0,1,0,2.057.372.372,0,0,1-.184.371,3.474,3.474,0,0,1-.236.429L32.271,43.971A2.545,2.545,0,0,1,30.25,45a2.5,2.5,0,0,1-1.68-.657,2.941,2.941,0,0,1-.939-1.937,3.03,3.03,0,0,1,.6-2.091l9.529-12.456H6.625a2.867,2.867,0,0,1,0-5.714Z"
                                          transform="translate(0 0)" fill="#fff" />
                                </svg>
                            </div>
                            <div class="swiper-button-prev travel-slide__button">
                                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="40"
                                     height="40" viewBox="0 0 50 50">
                                    <g id="arrow-back">
                                        <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                              transform="translate(50) rotate(90)" fill="#fff" opacity="0" />
                                        <path id="Path_23" data-name="Path 23"
                                              d="M43.375,22.144H12.243L21.771,9.688a3.037,3.037,0,0,0-.341-4.028,2.485,2.485,0,0,0-3.7.371L4.6,23.173a3.474,3.474,0,0,0-.236.429.372.372,0,0,1-.184.371,2.97,2.97,0,0,0,0,2.057.372.372,0,0,0,.184.371,3.474,3.474,0,0,0,.236.429L17.729,43.971A2.545,2.545,0,0,0,19.75,45a2.5,2.5,0,0,0,1.68-.657,2.941,2.941,0,0,0,.939-1.937,3.03,3.03,0,0,0-.6-2.091L12.243,27.858H43.375a2.867,2.867,0,0,0,0-5.714Z"
                                              fill="#fff" />
                                    </g>
                                </svg>
                            </div>
                        </div>

                        <!-- Slider Travel South -->
                        <div class="tab-pane fade" id="south" role="tabpanel" aria-labelledby="south-tab">

                            <div class="swiper travelSouthSwiper travel-slide">
                                <div class="swiper-wrapper">
                                    <!-- slider image -->
                                    @foreach($locs as $element)
                                        @if($element->area=='Miền Nam')
                                            <div class="swiper-slide travel-slide__item">
                                                <a href="#">
                                                    <!-- <div class="popular-slide__right-cover"> -->
                                                    <div class="travel-slide__img">
                                                        <img src="{{$element->image}}" alt="Image located">
                                                    </div>
                                                    <!-- </div> -->
                                                    <div class="popular-slide__text">
{{--                                                        <p class="travel-slide__place">TP.HCM - Đà Lạt</p>--}}
                                                        <span class="travel-slide__position">
                                                    <svg id="Layer_2" data-name="Layer 2"
                                                         xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                         viewBox="0 0 20 20">
                                                        <g id="pin">
                                                            <rect id="Rectangle_2" data-name="Rectangle 2" width="20"
                                                                  height="20" fill="#c4c4c4" opacity="0" />
                                                            <path id="Path_3" data-name="Path 3"
                                                                  d="M10.667,2A6.667,6.667,0,0,0,4,8.6c0,4.566,5.875,9.65,6.125,9.866a.833.833,0,0,0,1.083,0c.292-.217,6.125-5.3,6.125-9.867A6.667,6.667,0,0,0,10.667,2Zm0,14.708c-1.392-1.325-5-5-5-8.108a5,5,0,0,1,10,0C15.667,11.683,12.058,15.383,10.667,16.708Z"
                                                                  transform="translate(-0.667 -0.333)" fill="#c4c4c4" />
                                                            <path id="Path_4" data-name="Path 4"
                                                                  d="M11.417,6a2.917,2.917,0,1,0,2.917,2.917A2.917,2.917,0,0,0,11.417,6Zm0,4.167a1.25,1.25,0,1,1,1.25-1.25A1.25,1.25,0,0,1,11.417,10.167Z"
                                                                  transform="translate(-1.417 -1)" fill="#c4c4c4" />
                                                        </g>
                                                    </svg>
                                                    <p>{{$element->location_name}}</p>
                                                </span>
                                                    </div>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>

                            <div class="swiper-button-next travel-slide__button">
                                <svg id="arrow-back" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                     viewBox="0 0 50 50">
                                    <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                          transform="translate(50) rotate(90)" fill="#fff" opacity="0" />
                                    <path id="Path_23" data-name="Path 23"
                                          d="M6.625,22.144H37.757L28.229,9.688a3.037,3.037,0,0,1,.341-4.028,2.485,2.485,0,0,1,3.7.371L45.4,23.173a3.474,3.474,0,0,1,.236.429.372.372,0,0,0,.184.371,2.97,2.97,0,0,1,0,2.057.372.372,0,0,1-.184.371,3.474,3.474,0,0,1-.236.429L32.271,43.971A2.545,2.545,0,0,1,30.25,45a2.5,2.5,0,0,1-1.68-.657,2.941,2.941,0,0,1-.939-1.937,3.03,3.03,0,0,1,.6-2.091l9.529-12.456H6.625a2.867,2.867,0,0,1,0-5.714Z"
                                          transform="translate(0 0)" fill="#fff" />
                                </svg>
                            </div>
                            <div class="swiper-button-prev travel-slide__button">
                                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="40"
                                     height="40" viewBox="0 0 50 50">
                                    <g id="arrow-back">
                                        <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                              transform="translate(50) rotate(90)" fill="#fff" opacity="0" />
                                        <path id="Path_23" data-name="Path 23"
                                              d="M43.375,22.144H12.243L21.771,9.688a3.037,3.037,0,0,0-.341-4.028,2.485,2.485,0,0,0-3.7.371L4.6,23.173a3.474,3.474,0,0,0-.236.429.372.372,0,0,1-.184.371,2.97,2.97,0,0,0,0,2.057.372.372,0,0,0,.184.371,3.474,3.474,0,0,0,.236.429L17.729,43.971A2.545,2.545,0,0,0,19.75,45a2.5,2.5,0,0,0,1.68-.657,2.941,2.941,0,0,0,.939-1.937,3.03,3.03,0,0,0-.6-2.091L12.243,27.858H43.375a2.867,2.867,0,0,0,0-5.714Z"
                                              fill="#fff" />
                                    </g>
                                </svg>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="brand brand-rent" style="background-image: url({{asset('RouteBus/assets/images/back.png')}})">
        <div class="container-xl">
            <div class="brand-wrapper">
                <h3 class="popular-heading">Đa dạng dòng xe cho thuê</h3>

                <div class="brand-slide">
                    <div class="swiper brandRentSwiper">

                        <div class="swiper-wrapper">
                            <!-- slider image -->
                            @foreach($vehicles as $element)
                            <div class="swiper-slide brand-rent__item">
                                <a href="#" class="brand-rent__cover">
                                    <img src="{{$element->image}}" alt="Image Brand"
                                         class="brand-rent__img">

                                    <div class="brand-rent__title">
                                        {{$element->vehicle_name}}
                                    </div>

                                    <p class="brand-rent__text">
                                        {{$element->vehicle_slots}} ghế
                                    </p>
                                </a>
                            </div>
                            @endforeach


                        </div>
                    </div>

                    <!-- <div class="swiper-pagination"></div> -->
                    <div class="swiper-button-next brand-slide__button">
                        <svg id="arrow-back" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                             viewBox="0 0 50 50">
                            <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                  transform="translate(50) rotate(90)" fill="#3a3938" opacity="0" />
                            <path id="Path_23" data-name="Path 23"
                                  d="M6.625,22.144H37.757L28.229,9.688a3.037,3.037,0,0,1,.341-4.028,2.485,2.485,0,0,1,3.7.371L45.4,23.173a3.474,3.474,0,0,1,.236.429.372.372,0,0,0,.184.371,2.97,2.97,0,0,1,0,2.057.372.372,0,0,1-.184.371,3.474,3.474,0,0,1-.236.429L32.271,43.971A2.545,2.545,0,0,1,30.25,45a2.5,2.5,0,0,1-1.68-.657,2.941,2.941,0,0,1-.939-1.937,3.03,3.03,0,0,1,.6-2.091l9.529-12.456H6.625a2.867,2.867,0,0,1,0-5.714Z"
                                  transform="translate(0 0)" fill="#3a3938" />
                        </svg>
                    </div>

                    <div class="swiper-button-prev brand-slide__button">
                        <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                             viewBox="0 0 50 50">
                            <g id="arrow-back">
                                <rect id="Rectangle_14" data-name="Rectangle 14" width="50" height="50"
                                      transform="translate(50) rotate(90)" fill="#3a3938" opacity="0" />
                                <path id="Path_23" data-name="Path 23"
                                      d="M43.375,22.144H12.243L21.771,9.688a3.037,3.037,0,0,0-.341-4.028,2.485,2.485,0,0,0-3.7.371L4.6,23.173a3.474,3.474,0,0,0-.236.429.372.372,0,0,1-.184.371,2.97,2.97,0,0,0,0,2.057.372.372,0,0,0,.184.371,3.474,3.474,0,0,0,.236.429L17.729,43.971A2.545,2.545,0,0,0,19.75,45a2.5,2.5,0,0,0,1.68-.657,2.941,2.941,0,0,0,.939-1.937,3.03,3.03,0,0,0-.6-2.091L12.243,27.858H43.375a2.867,2.867,0,0,0,0-5.714Z"
                                      fill="#3a3938" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="booking" style="background-image: url({{asset('RouteBus/assets/images/backBooking.png')}})">
        <div class="container-xl">
            <div class="booking-wrapper">
                <h3 class="popular-heading">Đa dạng dòng xe cho thuê</h3>
                <p class="booking-text">
                    ( Nhân viên sẽ xác nhận trong vong 30 phút )
                </p>

                <div class="booking-form">
                    <div class="details-booking">
                        <div class="modal-body">
                            <div class="details-booking__cover">
                                <div class="row gx-4">
                                    <div class="col-lg-8 col-md-12 col-sm-12">
                                        <div class="form-floating name">
                                            <input type="text" class="form-control" id="nameInput" placeholder="Họ và tên">
                                            <label for="name">Họ và tên <sup class="color-red">*</sup></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 col-sm-12">
                                        <div class="form-floating phone">
                                            <input type="tel" class="form-control" id="phoneInput" placeholder="Số điện thoại">
                                            <label for="phone">Số điện thoại <sup class="color-red">*</sup></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-booking__cover">
                                <div class="row gx-4">
                                    <div class="col-lg-9 col-md-12 col-sm-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="emailInput" placeholder="Địa chỉ Email">
                                            <label for="email">Địa chỉ Email</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-12 col-sm-12">
                                        <div class="form-floating">
                                            <input type="tel" class="form-control" id="numGuestInput"
                                                   placeholder="Số lượng khách">
                                            <label for="guest">Số lượng khách <sup class="color-red">*</sup></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="details-booking__cover">
                                <div class="row gx-4">
                                    <div class="col-lg-5 col-md-12 col-sm-12">
                                        <div class="form-floating">
                                            <input type="time" class="form-control" id="timeInput" placeholder="Giờ đi">
                                            <label for="time">Giờ đi <sup class="color-red">*</sup></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-12 col-sm-12">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" id="dayInput" placeholder="Ngày đi">
                                            <label for="day">Ngày đi <sup class="color-red">*</sup></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-floating single">
                                <input type="tel" class="form-control" id="depart_addr" placeholder="Địa chỉ đón">
                                <label for="depart_address">Địa chỉ đón <sup class="color-red">*</sup></label>
                            </div>

                            <div class="form-floating single">
                                <input type="tel" class="form-control" id="destination" placeholder="Địa chỉ tra">
                                <label for="destination">Địa chỉ trả <sup class="color-red">*</sup></label>
                            </div>

                            <div class="form-floating single area">
                        <textarea class="form-control" placeholder="Leave a comment here" id="note"
                                  style="height: 150px" name="note"></textarea>
                                <label for="floatingTextarea2">Ghi chú</label>
                            </div>

                            <div class="details-booking__sent">
                                <button onclick="submitForm(event)" class="details-booking__btn btn btn-button">
                                    Gửi yêu cầu
                                </button>
                                <p>
                                    ( Nhân viên sẽ xác nhận trong vòng 15 phút )
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var swiper = new Swiper(".travelSwiper", {
            spaceBetween: 16,
            // loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: false,
            direction: 'horizontal',
            navigation: {
                nextEl: '#north>.swiper-button-next',
                prevEl: '#north>.swiper-button-prev',
            },
            breakpoints: {
                325: {
                    slidesPerView: 1.5,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
                1280: {
                    slidesPerView: 5,
                },
            }
            // autoplay: {
            //     delay: 5000,
            // },
        });

        // Slide Travel Central
        var swiper = new Swiper(".travelCentralSwiper", {
            spaceBetween: 16,
            // loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: false,
            direction: 'horizontal',
            navigation: {
                nextEl: '#central>.swiper-button-next',
                prevEl: '#central>.swiper-button-prev',
            },
            breakpoints: {
                325: {
                    slidesPerView: 1.5,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
                1280: {
                    slidesPerView: 5,
                },
            }
            // autoplay: {
            //     delay: 5000,
            // },
        });

        // Slide Travel South
        var swiper = new Swiper(".travelSouthSwiper", {
            spaceBetween: 16,
            // loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: false,
            direction: 'horizontal',
            navigation: {
                nextEl: '#south>.swiper-button-next',
                prevEl: '#south>.swiper-button-prev',
            },
            breakpoints: {
                325: {
                    slidesPerView: 1.5,
                },
                768: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 4,
                },
                1280: {
                    slidesPerView: 5,
                },
            }
            // autoplay: {
            //     delay: 5000,
            // },
        });

        // Slide Brand Rent
        var swiper = new Swiper(".brandRentSwiper", {
            slidesPerView: 1,
            spaceBetween: 22,
            // loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            navigation: {
                nextEl: '.brand-slide>.swiper-button-next',
                prevEl: '.brand-slide>.swiper-button-prev',
            },
            direction: 'horizontal',
            autoplay: {
                delay: 7000,
            },
            breakpoints: {
                1440: {
                    slidesPerView: 4,
                },

                1280: {
                    slidesPerView: 3,
                },
                1024: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 2,
                },
                325: {
                    slidesPerView: 1.2,
                },
            }
        })
        function submitForm(event) {
            let note=$('#note').val();
            let destination=$('#destination').val();
            let depart_addr=$('#depart_addr').val();
            let time=$('#timeInput').val();
            let day=$('#dayInput').val();
            let guest=$('#numGuestInput').val();
            let email=$('#emailInput').val();
            let phone=$('#phoneInput').val();
            let name=$('#nameInput').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('postRental')}}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: { 'note':note,'destination':destination,'depart_addr':depart_addr,'time':time,'day':day,'guest':guest,'email':email,'phone':phone,'name':name},

                /* remind that 'data' is the response of the AjaxController */
                beforeSend:function () {
                    Swal.showLoading();
                },
                success: function (data) {
                    Swal.fire(
                        'Đăng ký đặt xe thành công!',
                        '',
                        'success'
                    )
                    console.log(data);
                    // $(".writeinfo").append(data.msg);
                },

            });
        }
    </script>
@endsection
