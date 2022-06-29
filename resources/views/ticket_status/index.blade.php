@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('css')
    <link href="{{ asset('admins/add/add.css') }}" rel="stylesheet">
    <link href="{{ asset('spinner.css') }}" rel="stylesheet">
@endsection
@section('title_header')
    Trạng thái đơn đặt vé
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
                                    <div class="col">
                                        <div class="search_style row" style="align-items: center">
                                            <label style="width: auto">Tìm kiếm: </label>
                                            <input type="text" class="form-control m-lg-2" id="input_search"
                                                   style="width: 50%;height: 36px" onkeydown="search(this)">
                                        </div>
                                    </div>
                                    <div class="col">
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
                                                                           name="color"
                                                                           id="statusColor"
                                                                           oninput="previewTextStatusColor(event)"
                                                                           placeholder="Nhập giá">
                                                                </div>


                                                            </div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-sm-4" >
                                                                <span id="statusPreview"  style="user-select: none;cursor: pointer; background-color:{{config('constants.colors.dark')}};color: {{config('constants.colors.light')}}; font-size: large " class="badge ms-4 me-4 mt-4 mb-4" >Testing</span>
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
                                        <th style="font-weight: bold">STT</th>
                                        <th style="font-weight: bold">Tên trạng thái</th>
                                        <th style="font-weight: bold">Màu trạng thái</th>
                                        <th style="font-weight: bold">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $index=>$element)
                                        <tr>
                                            <td >
                                                <h6 class="mt-0 mb-1">{{$index+1 + ($data->currentPage()-1)*10}}</h6>
                                            </td>
                                            <td>{{$element->name}}</td>
                                            <td><span class="badge" style="background-color: {{$element->color}}">{{$element->name}}</span></td>
                                            <td>
                                                <a data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#statusInfoModal{{$index}}" class="me-3 text-muted"><button  class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Chỉnh sửa</button></a>
                                                <a href="javascript:void(0);" onclick="deleteStatus(event,{{$element->id}})" class="text-muted"><button  class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Xóa</button></a>
                                            </td>
                                            <div id="statusInfoModal{{$index}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog " style="max-width: 50%;" role="document">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#statusInfoModal{{$index}}" class="btn btn-danger" >X</button>
                                                            <h4 class="modal-title">Thay đổi trạng thái</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="mb-3">
                                                                        <label>Tên trạng thái</label>
                                                                        <input type="text" class="form-control"
                                                                               name="name"
                                                                               id="statusUpdateText"
                                                                               value="{{$element->name}}"
                                                                               oninput="previewTextStatus(event)"
                                                                               placeholder="Nhập tên trạng thái">
                                                                    </div>
                                                                    <div class="mb-3" style="width: 30%">
                                                                        <label>Màu trạng thái</label>
                                                                        <input type="color" step="0.01" class="form-control"
                                                                               name="color"
                                                                               style="cursor: pointer"
                                                                               id="statusUpdateColor"
                                                                               value="{{$element->color}}"
                                                                               oninput="previewTextStatusColor(event)"
                                                                               placeholder="Nhập giá">
                                                                    </div>


                                                                </div>
                                                                <div class="col-md-1"></div>
                                                                <div class="col-sm-4" >
                                                                    <span id="statusPreview"  style="user-select: none; background-color:{{$element->color}};color: {{config('constants.colors.light')}}; font-size: large " class="badge ms-4 me-4 mt-4 mb-4" >{{$element->name}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <button class="btn btn-success float-end" onclick="updateStatus(event,{{$element->id}})" >Chỉnh sửa</button>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" data-bs-toggle="modal" style="cursor: pointer" data-bs-target="#statusInfoModal{{$index}}" class="btn btn-default" data-dismiss="modal">Đóng</button>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/index/list.js') }}"></script>
    <script>
        function updateStatus(event,id){
            let color=event.currentTarget.parentNode.parentNode.querySelector('#statusUpdateColor').value;
            let text=event.currentTarget.parentNode.parentNode.querySelector('#statusUpdateText').value;
            $.ajax({
                type: "GET",
                data: {'name':text,'color':color,'id':id},
                url: '{{route("updateOrderStatus")}}',
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
                            title: 'Chỉnh sửa trạng thái thành công!',
                        }
                    );

                    document.location.reload()
                },
                error:function (e) {
                    Swal.fire(
                        {
                            icon: 'error',
                            title: 'Sửa thất bại!',
                        }
                    );
                }
            });
        }
        function addNewStatus(event) {
            let color=$('#statusColor').val();
            let text=$('#statusText').val();

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
        function previewTextStatus(event) {
            event.currentTarget.parentNode.parentNode.parentNode.querySelector('#statusPreview').innerHTML=event.currentTarget.value;

        }
        function previewTextStatusColor(event) {
            event.currentTarget.parentNode.parentNode.parentNode.querySelector('#statusPreview').style.background=event.currentTarget.value;
            event.currentTarget.parentNode.parentNode.parentNode.querySelector('#statusPreview').style.color='#ffffff';
        }
        function deleteStatus(event,id){
            // let id=event.currentTarget.parentNode.parentNode.querySelector('#order_id').innerText;
            let row= event.currentTarget.parentNode.parentNode;
            Swal.fire({
                title: 'Xóa trạng thái?',
                text: "Bạn xác nhận xóa trạng thái!",
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
                        url: '{{route("deleteOrderStatus")}}',
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
                                'Trạng thái đã được xóa.',
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
