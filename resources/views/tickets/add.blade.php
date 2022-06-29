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
                              action="{{route('createTicket')}}"
                              method="post" novalidate >
                            @csrf

                            <div class="col-md-2" >
                                <label for="validationCustom04" class="form-label">Tuyến đường</label>
                                <select class="form-control" id="route"  name="route">

                                    @foreach($routes as $index=>$element)
                                        <option  value="{{$element->id}}">{{$element->route_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2" >
                                <label for="validationCustom04" class="form-label">Hãng xe</label>
                                <select class="form-control" id="comp"  name="comp">

                                    @foreach($comps as $index=>$element)
                                        <option  value="{{$element->id}}">{{$element->comp_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2" style="position: relative">
                                <label for="validationCustom02" class="form-label">Tên người đặt</label>
                                <input type="text" class=" form-control" id="name"  placeholder="Nhập tên người đặt" required autocomplete="off"
                                       name="name">
                                <div class="valid-feedback">
                                    Hợp lệ
                                </div>

                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom01" class="form-label">Email</label>
                                <input type="email" class=" form-control" id="country" placeholder="Nhập email" required
                                       name="email">
                                <div class="valid-feedback">
                                    Hợp lệ
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Số điện thoại</label>
                                <input type="number" class=" form-control" id="phone" placeholder="Nhập số điện thoại" required
                                       name="phone_number">
                                <div class="valid-feedback">
                                    Hợp lệ
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Số lượng khách</label>
                                <input type="number" class=" form-control" id="guest" placeholder="Nhập số lượng khách" required
                                       name="guest">
                                <div class="valid-feedback">
                                    Hợp lệ
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Ngày giờ đi</label>
                                <input type="datetime-local" class=" form-control" id="depart_time" placeholder="Nhập ngày giờ đi" required
                                       name="depart_time">
                                <div class="valid-feedback">
                                    Hợp lệ
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Địa chỉ đón</label>
                                <input type="text" class=" form-control" id="depart_time" placeholder="Nhập địa chỉ đón" required
                                       name="depart_address">
                                <div class="valid-feedback">
                                    Hợp lệ
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustom05" class="form-label">Địa chỉ trả</label>
                                <input type="text" class=" form-control" id="depart_time" placeholder="Nhập địa chỉ trả" required
                                       name="destination">
                                <div class="valid-feedback">
                                    Hợp lệ
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Ghi chú</label>
                                <textarea  class=" form-control" placeholder=""
                                          name="note"></textarea>
                                <div class="valid-feedback">
                                    Hợp lệ
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
                                <button class="btn btn-primary" type="submit">Thêm mới</button>
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
      $('#route').change(function () {
          let route = $("#route").val();
          $.ajax({
              type: "GET",
              data: {'route':route},
              url: '{{route("searchComps")}}',
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
    </script>
@endsection
