@extends('client.layouts.admins')

@section('title')
    <title>Tìm kiếm</title>
@endsection

@section('content')
    <section class="details">
        <!-- Slides -->
        <div class="details-banner" style="background-image: url({{asset('RouteBus/assets/images/details/backBanner.png')}})">
            <div class="container-xl">
                <div class="details-banner__wrapper">
                    <div class="details-banner__info">
                        <div class="details-banner__top">
                            <div class="details-banner__header">
                                <h2 class="details-banner__title">
                                    {{$route->route_name}}
                                </h2>
                                <div class="search-header__lines"></div>
                            </div>
                            <nav class="nav flex-column details-banner__list">
                                @foreach($des as $element)
                                <a class="nav-link" href="#">
                                    <svg id="arrow-right" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                         viewBox="0 0 26 26">
                                        <rect id="Rectangle_18" data-name="Rectangle 18" width="26" height="26"
                                              transform="translate(26 26) rotate(180)" fill="#fff" opacity="0" />
                                        <path id="Path_26" data-name="Path 26"
                                              d="M10.46,20a1.966,1.966,0,0,1-.91-.233A2.087,2.087,0,0,1,8.5,17.912V8.089A2.087,2.087,0,0,1,9.55,6.234a1.861,1.861,0,0,1,2.21.3l5.1,4.912a2.2,2.2,0,0,1,0,3.1l-5.1,4.912A1.887,1.887,0,0,1,10.46,20Z"
                                              transform="translate(1.133)" fill="#fff" />
                                    </svg>
                                    <p>{{$element}}</p>
                                </a>
                                @endforeach

                            </nav>
                        </div>

                        <div class="details-banner__bottom">
                            <div class="details-banner__phone">
                                <svg id="phone" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                     viewBox="0 0 36 36">
                                    <rect id="Rectangle_21" data-name="Rectangle 21" width="36" height="36" fill="#fff"
                                          opacity="0" />
                                    <path id="Path_29" data-name="Path 29"
                                          d="M26.622,34A24.663,24.663,0,0,1,2,9.36,7.357,7.357,0,0,1,9.354,2a6.3,6.3,0,0,1,1.231.112,6.056,6.056,0,0,1,1.151.288,1.6,1.6,0,0,1,1.039,1.2l2.19,9.6a1.6,1.6,0,0,1-.416,1.472c-.208.224-.224.24-2.19,1.264a15.85,15.85,0,0,0,7.786,7.824c1.039-1.984,1.055-2,1.279-2.208a1.6,1.6,0,0,1,1.471-.416l9.593,2.192a1.6,1.6,0,0,1,1.151,1.04,6.948,6.948,0,0,1,.3,1.168,7.637,7.637,0,0,1,.1,1.216A7.357,7.357,0,0,1,26.622,34Z"
                                          transform="translate(0 0)" fill="#fff" />
                                </svg>
                                <p>{{optional(\App\Models\Info::first())->phone}}</p>
                            </div>
                            <button class="btn btn-button details-banner__btn" data-bs-toggle="modal"
                                    data-bs-target="#booking">
                                Đặt vé ngay
                            </button>
                        </div>
                    </div>

                    <div class="details-banner__slide">
                        <div class="details-banner__slide-child">
                            <div class="details-banner__slide-cover">
                                <div class="swiper detailsSwiper">
                                    <div class="swiper-wrapper">
                                        @foreach($route->images as $element)
                                        <div class="swiper-slide">
                                            <a href="#">
                                                <img src="{{$element->image}}" alt="Image Banner">
                                            </a>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Range of vehicle -->
        <div class="details-main" style="background-image: url({{asset('RouteBus/assets/images/details/ImageBack.png')}})">
            <div class="container-xl">
                <div class="details-main__wrapper">
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="details-main__distance">
                                <h3 class="details-main__heading">
                                    Lộ trình chạy
                                </h3>

                                <ul class="details-main__list">
                                    @foreach($route->detail as $element)
                                    <li class="details-main__item active">
                                        {{$element}}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-9">
                            <div class="details-main__lines">
                                <h3 class="details-main__heading">
                                    Dòng xe
                                </h3>
                                <div class="swiper lineSwiper details-main__lines-slide">
                                    <div class="swiper-wrapper">
                                        @foreach($vehicles as $element)
                                            @if($element->vehicle_slots== 9)
                                                <div class="swiper-slide">
                                                    <p class="details-main__lines-text">{{$element->vehicle_name}}</p>
                                                    <img src="{{asset('RouteBus/assets/images/position/Tầng 1.png')}}" alt="Image"
                                                         class="details-main__lines-img">
                                                </div>
                                            @elseif($element->vehicle_slots == 11)
                                                <div class="swiper-slide">
                                                    <p class="details-main__lines-text">{{$element->vehicle_name}}</p>
                                                    <img src="{{asset('RouteBus/assets/images/position/step2.png')}}" alt="Image"
                                                         class="details-main__lines-img">
                                                </div>
                                            @elseif($element->vehicle_slots == 18)
                                                <div class="swiper-slide">
                                                    <p class="details-main__lines-text">{{$element->vehicle_name}}</p>
                                                    <img src="{{asset('RouteBus/assets/images/position/step3.png')}}" alt="Image"
                                                         class="details-main__lines-img">
                                                </div>
                                            @elseif($element->vehicle_slots == 22)
                                                <div class="swiper-slide">
                                                    <p class="details-main__lines-text">{{$element->vehicle_name}}</p>
                                                    <img src="{{asset('RouteBus/assets/images/position/step4.png')}}" alt="Image"
                                                         class="details-main__lines-img">
                                                </div>
                                            @elseif($element->vehicle_slots == 44)
                                                <div class="swiper-slide">
                                                    <p class="details-main__lines-text">{{$element->vehicle_name}}</p>
                                                    <img src="{{asset('RouteBus/assets/images/position/step5.png')}}" alt="Image"
                                                         class="details-main__lines-img">
                                                </div>
                                            @elseif($element->vehicle_slots == 66)
                                                <div class="swiper-slide">
                                                    <p class="details-main__lines-text">{{$element->vehicle_name}}</p>
                                                    <img src="{{asset('RouteBus/assets/images/position/step6.png')}}" alt="Image"
                                                         class="details-main__lines-img">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <!-- <div class="swiper-pagination"></div> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Information Routes -->
        <div class="details-info" style="background-image: url({{asset('RouteBus/assets/images/details/Rectangle.png')}})">
            <div class="container-xl">

                <div class="details-info__header">
                    <h2 class="details-info__title">
                        Thông tin tuyến
                    </h2>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="time-tab" data-bs-toggle="tab"
                                    data-bs-target="#timeStart" type="button" role="tab" aria-selected="true">
                                Giờ xuất bến
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="prices-tab"
                                    type="button" role="tab" aria-selected="false">
                                Giá vé
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="LinesVehicle-tab" type="button" role="tab" aria-selected="false">
                                Dòng xe
                            </button>
                        </li>
                    </ul>
                </div>

                <div class="tab-content details-info__tabs">
                    <div class="tab-pane fade show active" id="timeStart" role="tabpanel">

                        <table class="table details-info__table">
                            <tbody>
                            @foreach($routes as $element)
                            <tr>
                                <td>
                                    <div class="details-info__table-route">
                                        <p>{{$element->route_name}}</p>
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="80.75" height="20"--}}
{{--                                             viewBox="0 0 80.75 20">--}}
{{--                                            <g id="arrow-back" transform="translate(60.75)">--}}
{{--                                                <rect id="Rectangle_14" data-name="Rectangle 14" width="20"--}}
{{--                                                      height="20" transform="translate(20) rotate(90)" fill="#3a3938"--}}
{{--                                                      opacity="0" />--}}
{{--                                                <path id="Path_23" data-name="Path 23"--}}
{{--                                                      d="M4.75,9.286h8.9L10.923,6.171a.692.692,0,0,1,.1-1.007.777.777,0,0,1,1.058.093l3.75,4.286a.843.843,0,0,1,.068.107c0,.036,0,.057.052.093a.656.656,0,0,1,0,.514c0,.036,0,.057-.052.093a.843.843,0,0,1-.068.107l-3.75,4.286a.78.78,0,0,1-1.057.093.7.7,0,0,1-.268-.484.692.692,0,0,1,.171-.523l2.722-3.114H4.75a.715.715,0,1,1,0-1.429Z"--}}
{{--                                                      transform="translate(0 0)" fill="#777" />--}}
{{--                                                <path id="Path_54" data-name="Path 54" d="M63,0H0"--}}
{{--                                                      transform="translate(-60 10)" fill="none" stroke="#707070"--}}
{{--                                                      stroke-linecap="round" stroke-width="1.5"--}}
{{--                                                      stroke-dasharray="5 5" />--}}
{{--                                            </g>--}}
{{--                                        </svg>--}}
{{--                                        <p>Đà Lạt</p>--}}
                                    </div>
                                </td>
                                <td>
                                    <div class="details-info__table-route-time">
                                        <span>{{$element->depart_time .'-' .$element->close_time}}</span>
                                        <span>
                                                ({{$element->frequency}})
                                            </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="details-info__table-position">
                                        <p>{{$element->price}}</p>

                                    </div>
                                </td>
                                <td>{{$element->vehicle_name}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="details-info__action">
                    <button class="btn-button btn details-info__btn" data-bs-toggle="modal"
                            data-bs-target="#booking">
                        Đặt vé ngay
                    </button>

                    <a href="#" class="details-info__phone">
                        <svg id="phone" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 36 36">
                            <rect id="Rectangle_21" data-name="Rectangle 21" width="36" height="36" fill="#f12711"
                                  opacity="0" />
                            <path id="Path_29" data-name="Path 29"
                                  d="M26.622,34A24.663,24.663,0,0,1,2,9.36,7.357,7.357,0,0,1,9.354,2a6.3,6.3,0,0,1,1.231.112,6.056,6.056,0,0,1,1.151.288,1.6,1.6,0,0,1,1.039,1.2l2.19,9.6a1.6,1.6,0,0,1-.416,1.472c-.208.224-.224.24-2.19,1.264a15.85,15.85,0,0,0,7.786,7.824c1.039-1.984,1.055-2,1.279-2.208a1.6,1.6,0,0,1,1.471-.416l9.593,2.192a1.6,1.6,0,0,1,1.151,1.04,6.948,6.948,0,0,1,.3,1.168,7.637,7.637,0,0,1,.1,1.216A7.357,7.357,0,0,1,26.622,34Z"
                                  transform="translate(0 0)" fill="#f12711" />
                        </svg>

                        <p>{{optional(\App\Models\Info::first())->phone}}</p>
                    </a>
                </div>
            </div>
        </div>

        <!-- Instruction -->
        <div class="details-instruction" style="background-image: url({{asset('RouteBus/assets/images/details/backMedia.png')}})">
            <div class="container-xl">
                <div class="details-instruction__wrapper">
                    <div class="details-instruction__img">
                        <img src="{{asset('RouteBus/assets/images/details/Youtube.png')}}" alt="Image">
                    </div>

                    <div class="details-instruction__info">
                        <h3 class="details-instruction__title">
                            HOW GOOD ARE WE?
                        </h3>

                        <p class="details-instruction__text">
                            We are the top author of Themeforest, Power Elite Author. There are not much authors who hit
                            power eilite level and with 5 years of expereinces.
                        </p>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                Over 140,000 Sales
                            </li>
                            <li class="nav-item">
                                More than 50 WordPress Themes
                            </li>
                            <li class="nav-item">
                                Dedicated Support Team
                            </li>
                            <li class="nav-item">
                                Delivered Projects
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade details-booking" id="booking" tabindex="-1" aria-hidden="true">


            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
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

                        <div class="details-booking__route">
                            <label for="exampleFormControlInput1" class="form-label">
                                Tuyến đường <sup class="color-red">*</sup>
                            </label>
                            <select class="form-select" aria-label="Default select example" id="route">
                                @foreach($related as $element)
                                    <option value="{{$element->id}}">{{$element->route_name}}</option>
                                @endforeach
                            </select>
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
@endsection

@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // ==================== Slide Details Image ================
        var swiper = new Swiper(".detailsSwiper", {
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: ".details-banner__slide-cover>.swiper-pagination",
                clickable: true,
            },
            // Navigation arrows
            // navigation: {
            //     nextEl: '.banner-slide>.swiper-button-next',
            //     prevEl: '.banner-slide>.swiper-button-prev',
            // },
            direction: 'horizontal',
            autoplay: {
                delay: 5000,
            },
        });

        var swiper = new Swiper(".lineSwiper", {
            slidesPerView: "auto",
            // centeredSlides: true,
            spaceBetween: 38,
            slidesPerView: 3,
            breakpoints: {
                640: {
                    slidesPerView: 5,
                },
            },
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
        });

        function submitForm(event) {
            let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let note=$('#note').val();
            let destination=$('#destination').val();
            let depart_addr=$('#depart_addr').val();
            let time=$('#timeInput').val();
            let day=$('#dayInput').val();
            let route=$('#route').val();
            let guest=$('#numGuestInput').val();
            let email=$('#emailInput').val();
            let phone=$('#phoneInput').val();
            let name=$('#nameInput').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('postTR')}}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: { 'note':note,'destination':destination,'depart_addr':depart_addr,'time':time,'day':day,'route':route,'guest':guest,'email':email,'phone':phone,'name':name},

                /* remind that 'data' is the response of the AjaxController */
                beforeSend:function () {
                    Swal.showLoading();
                },
                success: function (data) {
                    Swal.fire(
                        'Đặt vé thành công!',
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
