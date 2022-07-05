@extends('client.layouts.admins')

@section('title')
    <title>Chi tiết hãng xe</title>
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
                                {{$comp->comp_name}}
                            </h2>
                            <div class="search-header__lines"></div>
                        </div>
                        <nav class="nav flex-column details-banner__list">
                            @foreach($comp->description as $element)
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
                            <p>{{optional(\App\Info::first())->phone}}</p>
                        </div>

                        <button class="btn btn-button color-yellow details-banner__btn" data-bs-toggle="modal"
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
                                    @foreach($images as $element)
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

    <!-- Area Support -->
    <div class="details-position" style="background-image: url({{asset('RouteBus/assets/images/back-top.png')}})">
        <div class="container-xl">

            <div class="details-position__wrapper">
                <h3 class="details-position__header">
                    Khu vực hỗ trợ trung chuyển
                </h3>

                <div class="details-position__list">
                    @foreach($areas as $element)
                    <div class="details-position__item">
                        <img src="{{asset('RouteBus/assets/images/details/your-location.svg')}}" alt="Image">
                        <div class="details-position__info">
                            <h3 class="details-position__heading">
                                {{$element->area}}
                            </h3>
                            <p class="details-position__text">
                               {{$element->description}}
                            </p>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    <!-- Information Routes -->
    <div class="details-info" style="background-image: url({{asset('RouteBus.assets/images/details/Rectangle.png')}})">
        <div class="container-xl">

            <div class="details-info__header">
                <h2 class="details-info__title">
                    Thông tin tuyến
                </h2>

                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <div class="nav-link">
                            Giờ xuất bến
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            Giá vé
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link">
                            Dòng xe
                        </div>
                    </li>
                </ul>
            </div>

            <div class="tab-content details-info__tabs">

                <table class="table details-info__table">
                    <tbody>
                    @foreach($detail as $element)
                        <tr>
                            <td>
                                <div class="details-info__table-route">
                                    <p>{{$element->route_name}}</p>

                                </div>
                            </td>
                            <td>
                                <div class="details-info__table-route-time">
                                    <span>{{explode(":",$element->depart_time)[0].":".explode(":",$element->depart_time)[1]  . '-'. explode(":",$element->close_time)[0].":".explode(":",$element->close_time)[1]}}</span>
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

            <div class="details-info__action">
                <button class="btn-button btn details-info__btn color-yellow" data-bs-toggle="modal"
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

                    <p>{{optional(\App\Info::first())->phone}}</p>
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
                        @foreach($detail as $element)
                            <option value="{{$element->route_id}}">{{$element->route_name}}</option>
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
                    <button onclick="submitFormCarrier(event)" class="details-booking__btn btn btn-button">
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
        function submitFormCarrier(event) {
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
                url: '{{route('postTRC')}}',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: { 'comp_id':'{{$comp->id}}','note':note,'destination':destination,'depart_addr':depart_addr,'time':time,'day':day,'route':route,'guest':guest,'email':email,'phone':phone,'name':name},
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
                }
            });
        }
    </script>
@endsection
