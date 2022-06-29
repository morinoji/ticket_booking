@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('css')
    <link href="{{ asset('admins/add/add.css') }}" rel="stylesheet">
    <link href="{{ asset('spinner.css') }}" rel="stylesheet">
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
@section('title_header')
    Thêm mới order
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="row g-3 needs-validation mt-2"
                                      action="{{route('editVehRes',['id'=>$data->id])}}"
                                      method="post" novalidate >
                                    @csrf


                                    <div class="col-md-2" style="position: relative">
                                        <label for="validationCustom02" class="form-label">Tên người đặt</label>
                                        <input type="text" class=" form-control" id="name" value="{{$data->full_name}}" placeholder="Nhập tên người đặt" required autocomplete="off"
                                               name="name">
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom01" class="form-label">Email</label>
                                        <input type="email" class=" form-control" id="country" placeholder="Nhập email" required value="{{$data->email}}"
                                               name="email">
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom05" class="form-label">Số điện thoại</label>
                                        <input type="number" class=" form-control" id="phone" placeholder="Nhập số điện thoại" required value="{{$data->phone}}"
                                               name="phone_number">
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom05" class="form-label">Số lượng khách</label>
                                        <input type="number" class=" form-control" id="guest" placeholder="Nhập số lượng khách" required value="{{$data->guest_number}}"
                                               name="guest">
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom05" class="form-label">Ngày giờ đi</label>
                                        <input type="datetime-local" class=" form-control" id="depart_time" placeholder="Nhập ngày giờ đi" required value="{{str_replace(" ","T",$data->depart_datetime)}}"
                                               name="depart_time">
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom05" class="form-label">Địa chỉ đón</label>
                                        <input type="text" class=" form-control" id="depart_time" placeholder="Nhập địa chỉ đón" required value="{{$data->depart_address}}"
                                               name="depart_address">
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom05" class="form-label">Địa chỉ trả</label>
                                        <input type="text" class=" form-control" id="depart_time" placeholder="Nhập địa chỉ trả" required value="{{$data->destination}}"
                                               name="destination">
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Ghi chú</label>
                                        <textarea  class=" form-control" placeholder=""
                                                   name="note">{{$data->note}}</textarea>
                                        <div class="valid-feedback">
                                            Hợp lệ
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <label for="validationCustom04" class="form-label">Dòng xe</label>
                                        <select class="form-control" id="vehicle"  name="vehicle">
                                            <option value="0">Tất cả</option>
                                            @foreach($vehicles as $index=>$element)
                                                <option {{$element->id==$data->vehicle_id? 'selected':''}} value="{{$element->id}}">{{$element->vehicle_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2" >
                                        <label for="validationCustom04" class="form-label">Hãng xe</label>
                                        <select class="form-control" id="comp"  name="comp">
                                            <option value="0">Tất cả</option>
                                            @foreach($comps as $index=>$element)
                                                <option {{$element->id==$data->comp_id? 'selected':''}} value="{{$element->id}}">{{$element->comp_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <div style="width: auto">
                                            <label for="validationCustom01" class="form-label">Trạng thái</label>
                                            <div class="card" style="width: auto">
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach($statuses as $elementStatus)
                                                            <span id="statusInfo" onclick="changeStatusFunction(event,{{$data->id}},{{$elementStatus}})" style="width: auto;cursor: pointer; background-color:{{$data->status_id == $elementStatus->id? $elementStatus->color:config('constants.colors.light') }};color: {{$data->status_id == $elementStatus->id? config('constants.colors.light'):config('constants.colors.dark')}} " class="badge ms-1 me-1" >{{$elementStatus->name}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{--                            <div class="col-md-4">--}}
                                    {{--                                <label for="validationCustom02" class="form-label">Tìm sản phẩm</label>--}}
                                    {{--                                <input type="text" oninput="searchProduct(event)" class=" form-control" placeholder="Nhập tên sản phẩm"--}}
                                    {{--                                       name="search">--}}
                                    {{--                                <div id="searchBox" style="width: 100%;">--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="valid-feedback">--}}
                                    {{--                                    Hợp lệ--}}
                                    {{--                                </div>--}}
                                    {{--                            </div>--}}


                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Chỉnh sửa</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
    </div>
        <!-- End Page-content -->


        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Admiria.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        @endsection
        @section('js')
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            {{--    <script src="{{ asset('admins/index/list.js') }}"></script>--}}
            {{--    <script src="{{asset('admins/assets/libs/jquery/jquery.min.js')}}"></script>--}}
            {{--    <script src="{{asset('vendor/select2/select2.min.js')}}" ></script>--}}
            {{--    <script src="{{asset('admins/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
            {{--    <script src="{{asset('admins/assets/libs/metismenu/metisMenu.min.js')}}"></script>--}}
            {{--    <script src="{{asset('admins/assets/libs/simplebar/simplebar.min.js')}}"></script>--}}
            {{--    <script src="{{asset('admins/assets/libs/node-waves/waves.min.js')}}"></script>--}}
            {{--    <script src="{{asset('admins/assets/libs/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>--}}
            {{--    <script src="{{asset('admins/assets/js/pages/form-mask.init.js')}}"></script>--}}
            {{--    <script src="{{asset('admins/assets/libs/parsleyjs/parsley.min.js')}}"></script>--}}
            {{--    <script src="{{asset('admins/assets/js/pages/form-validation.init.js')}}"></script>--}}
            {{--    <script type="text/javascript" src="{{ asset('admins/index/list.js') }}"></script>--}}
            <script>
                $('#vehicle').change(function () {
                    let vehicle = $("#vehicle").val();
                    console.log(vehicle);
                    $.ajax({
                        type: "GET",
                        data: {'id':vehicle},
                        url: '{{route("searchCompsVeh")}}',
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Vui lòng đợi !',
                                html: 'Loading...',// add html attribute if you want or remove
                                allowOutsideClick: false,
                            });
                            Swal.showLoading()
                        },
                        success: function(data)
                        {
                            Swal.close();
                            console.log(data);
                            $('#comp').empty();
                            for (let i=0;i<data.length;i++){
                                $('#comp').append(`<option  value="`+data[i]['id']+`">`+data[i]['comp_name']+`</option>`);
                            }


                        },
                        error:function (e) {
                            Swal.fire(
                                {
                                    icon: 'error',
                                    title: 'Lưu thất bại!',
                                }
                            );
                        }
                    })
                })




                function changeStatusFunction(event,id,idStatus) {
                    let light='{{config('constants.colors.light')}}';
                    let dark='{{config('constants.colors.dark')}}';
                    let current=event.currentTarget.innerText;
                    let currentElement=event.currentTarget;
                    $.ajax({
                        type: "GET",
                        data: {'status':idStatus.id,'id':id},
                        url: '{{route("changeStatus")}}',
                        beforeSend:function () {
                            Swal.fire({
                                title: 'Vui lòng đợi !',
                                html: 'Loading...',// add html attribute if you want or remove
                                allowOutsideClick: false,
                            });
                            Swal.showLoading()
                        },
                        success: function(data)
                        {
                            Swal.fire(
                                {
                                    icon: 'success',
                                    title: 'Thay đổi tình trạng đơn thành công!',
                                }
                            );
                            currentElement.parentNode.querySelectorAll('span').forEach(function (element) {
                                if(element != currentElement){
                                    element.style.background=light;
                                    element.style.color=dark;

                                }else{
                                    element.style.background=idStatus.color;
                                    element.style.color=light;
                                }
                            });

                        },
                        error:function (e) {
                            Swal.fire(
                                {
                                    icon: 'error',
                                    title: 'Lưu thất bại!',
                                }
                            );
                        }
                    });

                }
            </script>
@endsection
