@extends('layouts.admins')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('theme/assets/css/vendors/select2.css')}}">

    @endsection


@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Chỉnh sửa tuyến đường
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('editRoute',['id'=>$route->id]) }}" method="post"
                                      class="needs-validation" novalidate
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group ">
                                                <label>Tên Tuyến đường</label>
                                                <input type="text" class="form-control"
                                                       style="width: 50%"
                                                       value="{{$route->route_name}}"
                                                       name="name" required
                                                       placeholder="Nhập tên tuyến đường">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Mô tả</label>
                                                <textarea class="form-control"
                                                          style="width: 50%"
                                                          name="description" required
                                                >{{$route->description}}</textarea>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label>Quãng đường dự kiến (km)</label>
                                                <input type="text" class="form-control"
                                                       style="width: 50%"
                                                       value="{{$route->distance}}"
                                                       name="distance" required
                                                       placeholder="Nhập quãng đường dự kiến">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label>Thời gian dự tính</label>
                                                <input type="text" class="form-control"
                                                       style="width: 50%"
                                                       value="{{$route->time}}"
                                                       name="time" required
                                                       placeholder="Nhập thời gian dự tính">
                                            </div>
                                            <div class="form-check mb-2 mt-3">
                                                <input class="form-check-input" id="validationFormCheck1" type="checkbox" name="is_pop" {{$route->is_pop == 0? '':'checked' }}>
                                                <label class="form-check-label" for="validationFormCheck1">Phổ biến</label>
                                            </div>
                                            <div class='card'>
                                                <div class="card-body">
                                                    <label for='validationCustom01' class='form-label'>Lộ trình chạy</label>
                                                    <div id="routes">
                                                        @foreach($detail as $element)
                                                            <div class="row">
                                                                <div class='col-md-4 mb-3'><input type='text' class='form-control' placeholder='Nhập chi tiết lộ trình' value="{{$element}}" required name='routes[]'>
                                                                    <div class='valid-feedback'>Hợp lệ</div>
                                                                </div>
                                                                <div class='col-md-3 mb-3'>
                                                                    <button class="btn btn-outline-danger ms-3 mb-3"  type="button" id="checkListDetailButton" onclick="deleteCheckList(event)">Xóa chi tiết
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary" type="button" id="routeButton">Thêm chi tiết lộ trình
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="card">
                                            <div class="card-body">

                                                    <label class="col-form-label">Tuyến đường liên quan</label>
                                                    <select class="js-example-basic-multiple" name="relatedRoutes[]" multiple="multiple">
                                                        @foreach($routes as $element)
                                                            <option {{in_array($element->id, $array)? 'selected':''}} value="{{$element->id}}">{{$element->route_name}}</option>
                                                        @endforeach
                                                    </select>
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-5">--}}
{{--                                                        <label>Tuyến đường liên quan</label>--}}
{{--                                                        <select  class="form-control"--}}

{{--                                                        >--}}
{{--                                                            @foreach($routes as $element)--}}
{{--                                                                <option value="{{$element->id}}">{{$element->route_name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}

{{--                                                    </div>--}}
{{--                                                    <div class="col-md-3">--}}
{{--                                                        <label style="color: transparent">Tuyến đường liên quan</label>--}}
{{--                                                        <button class="btn btn-primary" type="button" id="addRelatedRouteButton">Thêm tuyến đường--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}


{{--                                                <div class="mt-2" id="relatedBound">--}}

{{--                                                </div>--}}
                                            </div>
                                        </div>
                                        </div>

                                        <div class="row col-md-4 mb-4">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Ảnh (có thể chọn nhiều ảnh)</label>
                                                    <div class=" flex-row" id="imageBound">
                                                        @foreach($images as $element)
                                                            <img src="{{$element->image}}" class="rounded avatar-xl"
                                                                 style="object-fit: cover; margin-right: 2%;height: 8.5rem;width: 8.5rem"
                                                                 alt="">
                                                        @endforeach
                                                    </div>
                                                    <input type="file"
                                                           id="imagePicker"
                                                           multiple
                                                           class="form-control"
                                                           onchange="changeImages()"
                                                           name="images[]" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('admins/index/list.js') }}"></script>
    <script src=" {{ asset('admins/add/add.js') }}"></script>
    <script src="{{asset('theme/assets/js/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('theme/assets/js/select2/select2-custom.js')}}"></script>
    <script>
        function changeImages() {
            $('#imageBound').empty();
            let files = $('#imagePicker').prop("files")
            let names = $.map(files, function (val) {
                return val;
            });
            // console.log($('#imagePicker'+index).val());
            for (let i = 0; i < names.length; i++) {
                $('#imageBound').append(`<img  src="` + URL.createObjectURL(names[i]) + `" class="rounded avatar-xl"  style="object-fit: cover; margin-right: 2%;height: 8.5rem;width: 8.5rem"  alt="">`)
            }
        }


        $('#routeButton').click(function () {
            // let randomStr = (Math.random() + 1).toString(36).substring(7);
            // console.log(randomStr);
            let form = `
                  <div class="row">
                  <div class='col-md-4 mb-3'><input type='text' class='form-control' placeholder='Nhập chi tiết lộ trình' required name='routes[]'>
                        <div class='valid-feedback'>Hợp lệ</div>
                    </div>
                    <div class='col-md-3 mb-3'>
                    <button class="btn btn-outline-danger ms-3 mb-3"  type="button" id="checkListDetailButton" onclick="deleteCheckList(event)">Xóa chi tiết
                     </button>
</div>
                   </div>
               `;
            $('#routes').append(form);
        });

        function deleteCheckList(event) {
            let CheckListElement=event.currentTarget.parentNode.parentNode;
            CheckListElement.remove();
        }
    </script>
@endsection
