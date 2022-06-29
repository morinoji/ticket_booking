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
                                            <input type="text" class="form-control input_search" id="" placeholder="Nhập tên hoặc số điện thoại"
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
                                        <label for="validationCustom04" class="form-label">Trạng thái đơn đặt</label>
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
                                        <div class="col-md-12"><a type="button" href="{{route('addVehRes')}}" class="btn btn-success waves-effect waves-light float-end">Thêm mới đơn đặt xe</a></div>
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
                                        <th style="font-weight: bold">Tên khách hàng</th>
                                        <th style="font-weight: bold">Số điện thoại</th>
                                        <th style="font-weight: bold">Số lượng khách</th>
                                        <th style="font-weight: bold">Ngày giờ khởi hành</th>
                                        <th style="font-weight: bold">Xe phù hợp</th>
                                        <th style="font-weight: bold">Ghi chú</th>
                                        <th style="font-weight: bold">Trạng thái</th>
                                        <th style="font-weight: bold;width: 110px">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $index=>$element)
                                    <tr>
                                        <td>{{$element->id}}</td>
                                        <td>{{$element->full_name}}</td>
                                        <td>{{$element->phone}}</td>
                                        <td>{{$element->guest_number}}</td>
                                        <td>{{$element->depart_datetime}}</td>
                                        <td>{{$element->comp_name. ' - '. $element->vehicle_name . "(".$element->vehicle_slots." chỗ)" }}</td>
                                        <td><i class=" text-muted font-size-20"></i>{{$element->note}}</td>
                                        <td>
                                            @foreach($statuses as $elementStatus)
                                            <span id="statusInfo" onclick="changeStatusFunction(event,{{$element->id}},{{$elementStatus}})" style="font-size: 12px;width: auto;cursor: pointer; background-color:{{$element->status_id == $elementStatus->id? $elementStatus->color:config('constants.colors.light') }};color: {{$element->status_id == $elementStatus->id? config('constants.colors.light'):config('constants.colors.dark')}} " class="badge ms-1 me-1" >{{$elementStatus->name}}</span>
                                            @endforeach
                                        </td>
                                        <td>

                                            <a href="{{route('updateVehRes',['id'=>$element->id])}}" class="me-3 text-muted mt-2 mb-2"><button  class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Chỉnh sửa</button></a>
                                            <a href="javascript:void(0);" onclick="deleteTicket(event,{{$element->id}})" class="text-muted"><button  class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Xóa</button></a>
                                        </td>
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
                url: '{{route("addVehicleStatus")}}',
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
                title: 'Xóa đơn đặt hàng?',
                text: "Bạn xác nhận xóa đơn đặt hàng!",
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
                        url: '{{route("deleteVehRes")}}',
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
                                'Đơn đặt hàng đã được xóa.',
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
