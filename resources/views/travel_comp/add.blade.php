@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Thêm hãng xe
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('createComp') }}" method="post"
                                      class="needs-validation" novalidate
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group mb-2">
                                                <label>Tên hãng xe</label>
                                                <input type="text" class="form-control"
                                                       style="width: 50%"
                                                       name="name" required
                                                       placeholder="Nhập tên hãng xe">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Mô tả</label>
                                                <textarea class="form-control"
                                                          style="width: 50%"
                                                          name="description" required
                                                ></textarea>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label>Mô tả</label>
                                                <textarea  class="form-control"
                                                       style="width: 50%"
                                                       name="description" required
                                                ></textarea>
                                            </div>
                                            <div class="form-group ">
                                                <label>Màu hãng xe</label>
                                                <input type="color" class="form-control"
                                                       style="width: 20%"
                                                       name="color" required
                                                       placeholder="Nhập màu dòng xe">
                                            </div>
                                            <div class='card'>
                                                <div class="card-body">
                                                    <label for='validationCustom01' class='form-label'>Khu vực hoạt động</label>
                                                    <div  id="workingArea"></div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary" type="button" id="areaButton">Thêm khu vực
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='card'>
                                                <div class="card-body">
                                                    <label for='validationCustom01' class='form-label'>Các tuyến đường</label>
                                                    <div  id="activeRoute"></div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary" onclick="addRoute({{$routes}},{{$vehicles}})" type="button" id="routeButton">Thêm tuyến đường
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group mb-3">
                                                <label>Logo hãng xe</label>
                                                <div>
                                                    <img

                                                        id="logo" src="{{$comp->image}}" class="rounded avatar-xl"
                                                        style="object-fit: cover; margin-right: 2%;height: 8.5rem;width: 8.5rem; border: 7px solid #fff;border-radius: 50%;"
                                                        alt=""></div>

                                                <input type="file"
                                                       id="logoPicker"
                                                       class="form-control mt-3"
                                                       onchange="changeLogo()"
                                                       name="logo" >
                                            </div>
                                            <div class="form-group">
                                                <label>Ảnh (có thể chọn nhiều ảnh)</label>
                                                <div class=" flex-row" id="imageBound" ></div>
                                                <input type="file"
                                                       id="imagePicker"
                                                       multiple
                                                       class="form-control"
                                                       onchange="changeImages()"
                                                       name="images[]" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
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
    <script src=" {{ asset('admins/add/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/index/list.js') }}"></script>
    <script src=" {{ asset('admins/add/add.js') }}"></script>

    <script>
        function changeImages() {
            $('#imageBound').empty();
            let files = $('#imagePicker').prop("files")
            let names = $.map(files, function(val) { return val; });
            // console.log($('#imagePicker'+index).val());
            for(let i=0;i<names.length;i++){
                $('#imageBound').append(`<img  src="`+URL.createObjectURL(names[i]) +`" class="rounded avatar-xl"  style="object-fit: cover; margin-right: 2%;height: 8.5rem;width: 8.5rem"  alt="">`)
            }
        }

        function changeLogo() {

            let files = $('#logoPicker').prop("files")
            let names = $.map(files, function (val) {
                return val;
            });
            // console.log($('#imagePicker'+index).val());
            for (let i = 0; i < names.length; i++) {
                $('#logo').attr('src', URL.createObjectURL(names[i]))
            }
        }

        function addRoute(routes,vehicles) {

            let options='';
            let optionVehs='';
            for (let i=0;i<routes.length;i++){
                options+="<option value='" + routes[i]['id'] + "'>" + routes[i]['route_name'] + "</option>"
            }
            for (let i=0;i<vehicles.length;i++){
                optionVehs+="<option value='" + vehicles[i]['id'] + "'>" + vehicles[i]['vehicle_name'] + "</option>"
            }
            let form = `
                    <div class="card">
                   <div class="card-body">
                  <div class="row">
                    <div class='col-md-4 mb-3'><label>Tuyến đường</label><select type='text' class='form-control'  name='routes[]'>`+options+`

</select>

                    </div>
                  <div class='col-md-4 mb-3'><label>Giờ xuất bến</label><input type='time' class='form-control'  required name='times[]'>

                    </div>
<div class='col-md-4 mb-3'><label>Giờ kết thúc</label><input type='time' class='form-control'  required name='close_times[]'>

                    </div>
<div class='col-md-4 mb-3'><label>Tần suất chuyến</label><input type='text' class='form-control' placeholder="Nhập tuần suất chuyến" required name='frequencies[]'>

                    </div>
<div class='col-md-4 mb-3'><label>Giá vé</label><textarea type='text' class='form-control'  required name='prices[]'></textarea>

                    </div>
<div class='col-md-4 mb-3'><label>Dòng xe</label><select type='text' class='form-control'  name='vehicles[]'>`+optionVehs+`

</select>

                    </div>

</div>
<div class='col-md-3 mb-3'>
                    <button class="btn btn-outline-danger mt-3"  type="button" id="checkListDetailButton" onclick="deleteCheckList(event)">Xóa tuyến đường
                     </button>
                   </div>
</div>
</div>
               `;
            $('#activeRoute').append(form);
        }

        $('#areaButton').click(function () {
            // let randomStr = (Math.random() + 1).toString(36).substring(7);
            // console.log(randomStr);
            let form = `
                  <div class="row">
                  <div class='col-md-4 mb-3'><input type='text' class='form-control' placeholder='Nhập mô tả' required name='areas[]'>
                        <div class='valid-feedback'>Hợp lệ</div>
                    </div>
<div class='col-md-4 mb-3'><input type='text' class='form-control' placeholder='Nhập chi tiết' required name='descrs[]'>
                        <div class='valid-feedback'>Hợp lệ</div>
                    </div>
                    <div class='col-md-3 mb-3'>
                    <button class="btn btn-outline-danger ms-3 mb-3"  type="button" id="checkListDetailButton" onclick="deleteCheckList(event)">Xóa khu vực
                     </button>
</div>
                   </div>
               `;
            $('#workingArea').append(form);
        });

        function deleteCheckList(event) {
            let CheckListElement=event.currentTarget.parentNode.parentNode;
            CheckListElement.remove();
        }
    </script>
@endsection
