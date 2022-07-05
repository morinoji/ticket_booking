@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('css')
    <link href="{{ asset('admins/add/add.css') }}" rel="stylesheet">
    <link href="{{ asset('spinner.css') }}" rel="stylesheet">
    <link href="{{asset('daterange/daterangepicker.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('title_header')
    Quản lý đơn đặt vé
@endsection

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-md-2">
                                        <div class="" >
                                            <label for="validationCustom04" class="form-label">Tìm kiếm</label>
                                            <input type="text" class="form-control input_search" id="" placeholder="Nhập tên hoặc mã hóa đơn"
                                                   style="width: auto" onkeydown="search(this)" autocomplete="off" value="{{$searchText}}">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="">
                                            <label for="validationCustom04" class="form-label">Thời gian</label>
                                            <input type="text" readonly name="dateRangePicker" style="background-color: #FFFFFF;width: auto" class="form-control" value="{{$datePicked}}" />
                                        </div>
                                    </div>
                                    <div class="col-md-2" >
                                        <label for="validationCustom04" class="form-label">Tình trạng đơn hàng</label>
                                        <select class="form-select" id="status_select" name="status">
                                            <option  value="">Tất cả</option>
                                            @foreach($statuses as $element1)
                                            <option {{$statusText==$element1->id ? 'selected':""}} value="{{$element1->id}}">{{$element1->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="validationCustom04" style="color: #ffffff" class="form-label">Tình </label>
                                        <button class="btn btn-success" onclick="searchButton()">Tìm kiếm</button>
                                    </div>
                                    <div class="col">
                                        <div class="col-md-12"><a type="button" href="{{route('addTicket')}}" class="btn btn-success waves-effect waves-light float-end">Thêm mới đơn đặt hàng</a></div>
                                        <div class="col-md-12"><a type="button" data-bs-toggle="modal" data-bs-target="#statusModal" class="btn btn-success waves-effect waves-light float-end me-2">Thêm mới trạng thái</a></div>
                                        <div id="statusModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog " style="max-width: 50%;" role="document">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#statusModal" class="btn btn-danger" >X</button>
                                                        <h4 class="modal-title">Thêm mới trạng thái</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="mb-3">
                                                                        <label>Tên trạng thái</label>
                                                                        <input type="text" class="form-control"
                                                                               name="name"
                                                                               id="statusText"
                                                                               oninput="previewTextStatus(event)"
                                                                               placeholder="Nhập tên trạng thái">
                                                                    </div>
                                                                    <div class="mb-3" style="width: 30%">
                                                                        <label>Màu trạng thái</label>
                                                                        <input type="color" step="0.01" class="form-control"
                                                                               style="cursor: pointer"
                                                                               name="color"
                                                                               id="statusColor"
                                                                               oninput="previewTextStatusColor(event)"
                                                                               placeholder="Nhập giá">
                                                                    </div>


                                                                </div>
                                                                <div class="col-md-1"></div>
                                                                <div class="col-sm-4" >
                                                                    <span id="statusPreview"  style="user-select: none; background-color:{{config('constants.colors.dark')}};color: {{config('constants.colors.light')}}; font-size: large " class="badge ms-4 me-4 mt-4 mb-4" >Testing</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn btn-success float-end" onclick="addNewStatus()" >Thêm mới</button>
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#statusModal" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <table id="datatable" class="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;table-layout: fixed;">
                                    <thead>
                                    <tr>
                                        <th style="font-weight: bold">Mã đơn</th>
                                        <th style="font-weight: bold">Tuyến đường</th>
                                        <th style="font-weight: bold">Tên khách hàng</th>
                                        <th style="font-weight: bold">Số điện thoại</th>
                                        <th style="font-weight: bold">Số lượng khách</th>
                                        <th style="font-weight: bold">Ngày giờ khởi hành</th>
                                        <th style="font-weight: bold">Ghi chú</th>
                                        <th style="font-weight: bold">Trạng thái</th>
                                        <th style="font-weight: bold;width: 110px">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $index=>$element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->route_name }}</td>
                                        <td>{{$element->full_name}}</td>
                                        <td>{{$element->phone}}</td>
                                        <td>{{$element->guest_number}}</td>
                                        <td>{{$element->depart_datetime}}</td>
                                        <td><i class=" text-muted font-size-20"></i>{{$element->note}}</td>
                                        <td>
                                            @foreach($statuses as $elementStatus)
                                            <span id="statusInfo" onclick="changeStatusFunction(event,{{$element->id}},{{$elementStatus}})" style="font-size: 12px;width: auto;cursor: pointer; background-color:{{$element->status_id == $elementStatus->id? $elementStatus->color:config('constants.colors.light') }};color: {{$element->status_id == $elementStatus->id? config('constants.colors.light'):config('constants.colors.dark')}} " class="badge ms-1 me-1" >{{$elementStatus->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a  data-target="#myModal" type="button" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#myModal{{$index}}" class="text-muted"><button  class="btn btn-success btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Xem</button></a>
                                            <a href="{{route('updateTicket',['id'=>$element->id])}}" class="me-3 text-muted mt-2 mb-2"><button  class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Chỉnh sửa</button></a>
                                            <a href="javascript:void(0);" onclick="deleteTicket(event,{{$element->id}})" class="text-muted"><button  class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Xóa</button></a>
                                        </td>
                                        <div id="myModal{{$index}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog modal-lg" style="max-width: 70%;" role="document">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#myModal{{$index}}" class="btn btn-danger" >X</button>
                                                        <h4 class="modal-title">Thông tin đơn đặt hàng</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="row g-3 needs-validation "
                                                              method="post" novalidate >
<div class="row">
    <div class="col-md-2" >
        <label for="validationCustom04" class="form-label">Tuyến đường</label>
        <select class="form-control" id="route"  name="route">

                <option  value="{{$element->route_id}}">{{$element->route_name}}</option>

        </select>
    </div>
    <div class="col-md-2" >
        <label for="validationCustom04" class="form-label">Hãng xe</label>
        <select class="form-control" id="comp"  name="comp">

                <option  value="{{$element->comp_id}}">{{$element->comp_name}}</option>

        </select>
    </div>
    <div class="col-md-2" style="position: relative">
        <label for="validationCustom02" class="form-label">Tên người đặt</label>
        <input type="text" class=" form-control" id="name"  placeholder="Nhập tên người đặt" value="{{$element->full_name}}"  autocomplete="off"
               name="name">
        <div class="valid-feedback">
            Hợp lệ
        </div>

    </div>
    <div class="col-md-2">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" class=" form-control" id="country" placeholder="Nhập email" value="{{$element->email}}"
               name="email">
        <div class="valid-feedback">
            Hợp lệ
        </div>
    </div>
    <div class="col-md-2">
        <label for="validationCustom05" class="form-label">Số điện thoại</label>
        <input type="number" class=" form-control" id="phone" placeholder="Nhập số điện thoại" value="{{$element->phone_number}}"
               name="phone_number">
        <div class="valid-feedback">
            Hợp lệ
        </div>
    </div>
    <div class="col-md-2">
        <label for="validationCustom05" class="form-label">Số lượng khách</label>
        <input type="number" class=" form-control" id="guest" placeholder="Nhập số lượng khách" value="{{$element->guest_number}}"
               name="guest">
        <div class="valid-feedback">
            Hợp lệ
        </div>
    </div>
    <div class="col-md-2">
        <label for="validationCustom05" class="form-label">Ngày giờ đi</label>
        <input type="datetime-local" class=" form-control" id="depart_time" placeholder="Nhập ngày giờ đi" value="{{str_replace(" ","T",$element->depart_datetime)}}"
               name="depart_time">
        <div class="valid-feedback">
            Hợp lệ
        </div>
    </div>
    <div class="col-md-2">
        <label for="validationCustom05" class="form-label">Địa chỉ đón</label>
        <input type="text" class=" form-control" id="depart_time" placeholder="Nhập địa chỉ đón" value="{{$element->depart_address}}"
               name="depart_address">
        <div class="valid-feedback">
            Hợp lệ
        </div>
    </div>
    <div class="col-md-2">
        <label for="validationCustom05" class="form-label">Địa chỉ trả</label>
        <input type="text" class=" form-control" id="depart_time" placeholder="Nhập địa chỉ trả" value="{{$element->destination}}"
               name="destination">
        <div class="valid-feedback">
            Hợp lệ
        </div>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Ghi chú</label>
        <textarea  class=" form-control" placeholder=""
                   name="note">{{$element->note}}</textarea>
        <div class="valid-feedback">
            Hợp lệ
        </div>
    </div>
</div>
                                                            <div style="width: auto" class="mt-2">
                                                                <label for="validationCustom01" class="form-label">Tình trạng</label>
                                                                <div class="card" style="width: auto">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            @foreach($statuses as $elementStatus)
                                                                                <span id="statusInfo"  style="width: auto; background-color:{{$element->status_id == $elementStatus->id? $elementStatus->color:config('constants.colors.light') }};color: {{$element->status_id == $elementStatus->id? config('constants.colors.light'):config('constants.colors.dark')}} " class="badge ms-1 me-1" >{{$elementStatus->name}}</span>
                                                                            @endforeach
                                                                             </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#myModal{{$index}}" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="col-md-12 ">
                                    <div style="float: right;">{{$data->links('pagination::bootstrap-4')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
    </div>
        <!-- End Page-content -->




@endsection
@section('js')
    <script type="text/javascript" src="{{ asset('admins/index/list.js') }}"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert2@11.js')}}"></script>
    <script src="{{ asset('admins/index/list.js') }}"></script>
    <script src="{{asset('daterange/moment.min.js')}}"></script>
    <script src="{{asset('daterange/daterangepicker.js')}}"></script>

    <script>
        $('input[name="dateRangePicker"]').daterangepicker({
            locale: {
                "format": "DD/MM/YYYY",
                "separator": " - ",
                "applyLabel": "Xác Nhận",
                "cancelLabel": "Hủy",
                "fromLabel": "Từ",
                "toLabel": "Tới",
                "customRangeLabel": "Tùy chọn",
                "weekLabel": "Tuần",
                "daysOfWeek": [
                    "CN",
                    "T2",
                    "T3",
                    "T4",
                    "T5",
                    "T6",
                    "T7"
                ],
                "monthNames": [
                    "Tháng 1",
                    "Tháng 2",
                    "Tháng 3",
                    "Tháng 4",
                    "Tháng 5",
                    "Tháng 6",
                    "Tháng 7",
                    "Tháng 8",
                    "Tháng 9",
                    "Tháng 10",
                    "Tháng 11",
                    "Tháng 12"
                ],
                "firstDay": 1
            },
            ranges: {
                'Hôm nay': [moment(), moment()],
                'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
        // $('input[name="dateRangePicker"]').on('apply.daterangepicker', function(ev, picker) {
        //     let searchParams;
        //     if (!searchParams) {
        //         searchParams = new URLSearchParams(window.location.search)
        //     }
        //     searchParams.set('date_range', $('input[name="dateRangePicker"]').val());
        //     window.location.search = searchParams.toString()
        // });
        function addNewStatus(event) {
            let color=$('#statusColor').val();
            let text=$('#statusText').val();
            console.log($('#statusText').val())
            $.ajax({
                type: "GET",
                data: {'name':text,'color':color},
                url: '{{route("addOrderStatus")}}',
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
                            title: 'Thêm trạng thái mới thành công!',
                        }
                    );

                    document.location.reload()
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

        function search() {
            if (event.key === 'Enter') {
                searchButton()
            }
        }

        function searchButton(searchParams) {
            if (!searchParams) {
                searchParams = new URLSearchParams(window.location.search)
            }
            searchParams.set('status',$('#status_select').val());
            searchParams.set('date_range', $('input[name="dateRangePicker"]').val());
            searchParams.set('search_query', $('.input_search').val())
            window.location.search = searchParams.toString()
        }


        function previewTextStatus(event) {
            $('#statusPreview').text(event.currentTarget.value);
        }
        function previewTextStatusColor(event) {
            $('#statusPreview').css({'background-color': event.currentTarget.value, 'color': '#ffffff'});
        }

        function toggleModal(){

            $('#myModal').modal('toggle')
        }
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

        function deleteTicket(event,id){
            // let id=event.currentTarget.parentNode.parentNode.querySelector('#order_id').innerText;
           let row= event.currentTarget.parentNode.parentNode;

            Swal.fire({
                title: 'Xóa đơn đặt vé?',
                text: "Bạn xác nhận xóa đơn đặt vé!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xác nhận xóa!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "GET",
                        data: {'id':id},
                        url: '{{route("deleteTicket")}}',
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
                            row.remove();
                            Swal.fire(
                                'Đã xóa!',
                                'Đơn đặt vé đã được xóa.',
                                'Thành công!'
                            )
                        },
                        error:function (e) {
                            Swal.fire(
                                {
                                    icon: 'error',
                                    title: 'Xóa thất bại!',
                                }
                            );

                        }
                    })

                }
            })


        }

    </script>
@endsection
