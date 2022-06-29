<section class="banner">
    <div class="swiper mySwiper banner-slide">
        <div class="swiper-wrapper">
            <!-- slider image -->
            @foreach($sliders as $slider)
                <div class="swiper-slide banner-slide__item">
                    <a href="#" class="banner-slide__link">
                        <img src="{{$slider->image}}" alt="Image Banner"
                             class="banner-slide__img">
                    </a>
                </div>
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
<section class="tabs">
    <div class="container-xl">
        <div class="tabs-wrapper">
            <div class="tabs-search">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">
                            {{trans('home.route')}}
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="brand-tab" data-bs-toggle="tab" data-bs-target="#brand"
                                type="button" role="tab" aria-controls="brand" aria-selected="false">
                            {{trans('home.carrier')}}
                        </button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="input-group tabs-search__group">
                            <input type="text" class="form-control" id="searchRoute" placeholder=" {{trans('home.search.route.holder')}}">

                            <button class="btn btn-button" onclick="searchRoute()">
                                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24"
                                     height="24" viewBox="0 0 24 24">
                                    <g id="search">
                                        <rect id="Rectangle_23" data-name="Rectangle 23" width="24" height="24"
                                              fill="#fff" opacity="0"/>
                                        <path id="Path_31" data-name="Path 31"
                                              d="M20.71,19.29l-3.4-3.39A7.92,7.92,0,0,0,19,11a8,8,0,1,0-8,8,7.92,7.92,0,0,0,4.9-1.69l3.39,3.4a1,1,0,1,0,1.42-1.42ZM5,11a6,6,0,1,1,6,6,6,6,0,0,1-6-6Z"
                                              fill="#fff"/>
                                    </g>
                                </svg>

                                <p class="hide-on-mobile">Tìm kiếm</p>
                            </button>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="brand" role="tabpanel" aria-labelledby="brand-tab">
                        <div class="input-group tabs-search__group">
                            <input type="text" class="form-control" id="searchComp" placeholder=" {{trans('home.search.carrier.holder')}}">

                            <button class="btn btn-button" onclick="searchComp()">
                                <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24"
                                     height="24" viewBox="0 0 24 24">
                                    <g id="search">
                                        <rect id="Rectangle_23" data-name="Rectangle 23" width="24" height="24"
                                              fill="#fff" opacity="0"/>
                                        <path id="Path_31" data-name="Path 31"
                                              d="M20.71,19.29l-3.4-3.39A7.92,7.92,0,0,0,19,11a8,8,0,1,0-8,8,7.92,7.92,0,0,0,4.9-1.69l3.39,3.4a1,1,0,1,0,1.42-1.42ZM5,11a6,6,0,1,1,6,6,6,6,0,0,1-6-6Z"
                                              fill="#fff"/>
                                    </g>
                                </svg>

                                <p class="hide-on-mobile"> {{trans('home.search.button')}}</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
