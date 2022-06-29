@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Thông tin chung
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="float:left">
                        <form action="{{ route('infor.upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="form-group mb-3">
                                        <label>Tên công ty</label>
                                        <input name="name" type="text" class="form-control"
                                               value="{{$infor->name??''}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Địa chỉ hiện tại</label>
                                        <input name="address" type="text" class="form-control"
                                               value="{{$infor->address??''}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Địa chỉ đăng ký kinh doanh</label>
                                        <input name="enterprise_addr" type="text" class="form-control"
                                               value="{{$infor->enterprise_addr??''}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Giấy chứng nhận ĐKKD số</label>
                                        <input name="dkkd" type="text" class="form-control"
                                               value="{{$infor->dkkd??''}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Số điện thoại</label>
                                        <input name="phone" type="text" class="form-control"
                                               value="{{$infor->phone??''}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control"
                                               value="{{$infor->email??''}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Giờ hoạt động</label>
                                        <input name="working_hour" type="text" class="form-control"
                                               value="{{$infor->working_hour??''}}">
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="btn btn-outline-primary col-md-12 mb-3" data-toggle="collapse"
                                                 data-target="#noidungcard2" aria-expanded="false"
                                                 aria-controls="collapseExample">
                                                Footer
                                            </div>
                                            <div class="collapse in" id="noidungcard2" data-toggle="collapse">
                                                <div class='card'>
                                                    <div class="card-body">
                                                        <label for='validationCustom01' class='form-label'>Danh sách
                                                            thông tin chính sách góc phải</label>
                                                        <div id="formchecklist">
                                                            @foreach($list as $element)
                                                                <div class="row">
                                                                    <div class='col-md-4 mb-3'>
                                                                        <label>Title</label><input type='text'
                                                                                                   class='form-control'
                                                                                                   placeholder='title'
                                                                                                   value="{{$element->title}}"
                                                                                                   required
                                                                                                   name='titles[]'>
                                                                        <div class='valid-feedback'>Hợp lệ</div>
                                                                    </div>
                                                                    <div class='col-md-4 mb-3'><label>Title (Tiếng
                                                                            Anh)</label><input type='text'
                                                                                               class='form-control'
                                                                                               placeholder='title'
                                                                                               value="{{$element->title_eng}}"
                                                                                               required
                                                                                               name='title_engs[]'>
                                                                        <div class='valid-feedback'>Hợp lệ</div>
                                                                    </div>
                                                                    <div class='col-md-4 mb-3'><label>Link</label><input
                                                                            type='text' class='form-control'
                                                                            placeholder='Link'
                                                                            value="{{$element->link}}" name='links[]'>
                                                                        <div class='valid-feedback'>Hợp lệ</div>
                                                                    </div>
                                                                    <div class='col-md-3 mb-3'>

                                                                        <button class="btn btn-outline-danger mb-3"
                                                                                type="button" id="checkListDetailButton"
                                                                                onclick="deleteCheckList(event)">Xóa
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="btn btn-primary" type="button"
                                                                    id="checkListButton">Thêm
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Logo</label> <br>
                                        <img src="{{$infor->logo??asset('bg-2.jpg')}}" id="blah" class="img-fluid"
                                             style="max-width: 300px; margin-bottom: 10px">
                                        <input type="file"
                                               class="form-control-file"
                                               onchange="readURL(this)"
                                               name="logo">
                                        <br>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light me-1">Lưu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script>
        $('#checkListButton').click(function () {
            // let randomStr = (Math.random() + 1).toString(36).substring(7);
            // console.log(randomStr);
            let form = `
                  <div class="row">
                  <div class='col-md-4 mb-3'><label>Title (Tiếng Việt)</label><input type='text' class='form-control' placeholder='title' required name='titles[]'>
                        <div class='valid-feedback'>Hợp lệ</div>
                    </div>
                    <div class='col-md-4 mb-3'><label>Title (Tiếng Anh)</label><input type='text' class='form-control' placeholder='title' required name='title_engs[]'>
                        <div class='valid-feedback'>Hợp lệ</div>
                    </div>
                    <div class='col-md-4 mb-3'><label>Link</label><input type='text' class='form-control' placeholder='Link'  name='links[]'>
                        <div class='valid-feedback'>Hợp lệ</div>
                    </div>
                    <div class='col-md-3 mb-3'>

                    <button class="btn btn-outline-danger mb-3"  type="button" id="checkListDetailButton" onclick="deleteCheckList(event)">Xóa
                     </button>
</div>
                   </div>
               `;
            $('#formchecklist').append(form);

        });

        function deleteCheckList(event) {
            let CheckListElement = event.currentTarget.parentNode.parentNode;
            CheckListElement.remove();
        }
    </script>
@endsection
