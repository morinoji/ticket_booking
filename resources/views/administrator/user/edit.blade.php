@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('name')
    <h4 class="page-title">Finder</h4>
@endsection

@section('css')
    <link href="{{asset('admins/products/index/list.css')}}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('vendor/datetimepicker/daterangepicker.css')}}"/>

@endsection

@include('administrator.user.active_slidebar')

@section('content')
    <div class="col-md-9">

        <div class="card">

            <div class="card-header">
                Danh sách Finder > {{$user->real_name}}
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Câu hỏi</th>
                            <th>Câu trả lời</th>
                            <th>Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Tên đầy đủ của bạn</td>
                            <td>{{$user->real_name}}</td>
                            <td>
                                <input data-field="note_real_name" type="text" class="note form-control"
                                       value="{{$user->note_real_name}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Tên hiển thị trên App</td>
                            <td>{{$user->display_name}}</td>
                            <td>
                                <input data-field="note_display_name" type="text" class="note form-control"
                                       value="{{$user->note_display_name}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <input data-field="note_phone" type="text" class="note form-control"
                                       value="{{$user->note_phone}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>{{ optional($user->gender)->name}}</td>
                            <td>
                                <input data-field="note_gender" type="text" class="note form-control"
                                       value="{{$user->note_gender}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Bạn có dùng Zalo với số điện thoại này không?</td>
                            <td>{{$user->isPhoneZalo()}}</td>
                            <td>
                                <input data-field="note_phone_zalo" type="text" class="note form-control"
                                       value="{{$user->note_phone_zalo}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Email của bạn</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <input data-field="note_email" type="text" class="note form-control"
                                       value="{{$user->note_email}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày sinh của bạn</td>
                            <td>{{\App\Models\Formatter::getOnlyDate($user->date_of_birth)}}</td>
                            <td>
                                <input data-field="note_date_of_birth" type="text" class="note form-control"
                                       value="{{$user->note_date_of_birth}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Quê của bạn</td>
                            <td>{{ optional($user->addressBorn)->name}}</td>
                            <td>
                                <input data-field="note_address_born" type="text" class="note form-control"
                                       value="{{$user->note_address_born}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Trường đại học của bạn</td>
                            <td>{{$user->university}}</td>
                            <td>
                                <input data-field="note_university" type="text" class="note form-control"
                                       value="{{$user->note_university}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Nơi bạn đang sống và làm việc</td>
                            <td>{{$user->address_working}}</td>
                            <td>
                                <input data-field="note_address_working" type="text" class="note form-control"
                                       value="{{$user->note_address_working}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Tôn giáo của bạn</td>
                            <td>{{ optional($user->religion)->name}}</td>
                            <td>
                                <input data-field="note_religion" type="text" class="note form-control"
                                       value="{{$user->note_religion}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Giấy tờ tùy thân</td>
                            <td>
                                @foreach($user->identificationImages($user->id)->get() as $item)
                                    <a style="cursor: pointer" data-bs-toggle="modal"
                                       data-bs-target="#imageModal{{$item->id}}" data-bs-whatever="@mdo">
                                        <img src="{{$item->image_path}}" alt="{{$item->image_name}}"
                                             style="height: 100px;">
                                    </a>

                                    <div class="modal fade" id="imageModal{{$item->id}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ảnh</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>

                                                <img src="{{$item->image_path}}" alt="{{$item->image_name}}">
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </td>
                            <td>
                                <input data-field="note_identification_images" type="text" class="note form-control"
                                       value="{{$user->note_identification_images}}">
                            </td>
                        </tr>
                        <tr>
                            <td>Liên kết tài khoản facebook</td>
                            <td><a href="{{$user->facebook_link}}">{{$user->facebook_link}}</a></td>
                            <td></td>
                        </tr>

                        @foreach(\App\Models\TopicQuestionProfileDating::all() as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>
                                    <ul>
                                        @foreach($user->topicQuestionProfileDatingUser($user->id, $item->id) as $question)
                                            <li>
                                                {{ optional($question->questionProfileDating)->name}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">

            <div class="card-header">
                Đánh giá của Finder
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th class="w-50">Số sao</th>
                            <th class="w-50">Cảm nhận</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->dateRatings as $index => $item)
                            <tr>
                                <td>{{$item->star}}</td>
                                <td>{{$item->message}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="card">

            <div class="card-header">
                Đánh giá của Agent về Finder
            </div>

            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th class="w-50">Số sao</th>
                            <th class="w-50">Cảm nhận</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->dateRatingsByAgent() as $index => $item)
                            <tr>
                                <td>{{$item->star}}</td>
                                <td>{{$item->message}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="card">

            <div class="card-header">
                Trạng thái ghép đôi
            </div>

            <div class="card-body">

                @if($user->is_lover)
                    <div>
                        <label>
                            Finder đã thành đôi với: <a
                                href="{{route('administrator.candidates.accepted.edit' , ['id'=>optional($user->lover())->id])}}">{{ optional($user->lover())->nickName()}}</a>
                        </label>
                    </div>
                @else
                    <div>
                        <label>
                            Finder chưa có đôi
                        </label>
                    </div>
                @endif

            </div>
        </div>

    </div>

    <div class="col-md-3">
        <form action="{{route('administrator.users.status.update' , ['id' => $user->id])}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="bg-white p-3">

                <div class="d-flex mt-4 align-items-center">
                    <div class="flex-1">
                        Gói dịch vụ:
                    </div>
                    <div class="flex-1 text-end">
                        <select name="package_service_id" class="form-select">
                            <option value="0">Chưa có dịch vụ</option>
                            @foreach(\App\Models\PackageService::all() as $item)
                                <option
                                    value="{{$item->id}}" {{optional($user->packageService)->id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex mt-3">
                    <div class="flex-1">
                        <strong>Trạng thái duyệt hồ sơ:</strong>
                    </div>
                    <div class="flex-1 text-center">
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input name="user_status_id" class="note_right form-check-input"
                                   type="checkbox" {{$user->isActive($user->id) ? 'checked' : ''}}>
                        </div>
                        <p>Thay đổi sẽ khiến tài khoản trở về trạng thái chưa duyệt, không thể sử dụng dịch vụ</p>
                    </div>
                </div>

                <div class="d-flex mt-3" style="display: none !important;">
                    <div class="flex-1">
                        <strong>Thêm vào danh sách gợi ý cho Agent:</strong>
                    </div>
                    <div class="flex-1 text-center">
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input name="user_suggestion_id" class="note_right form-check-input"
                                   type="checkbox" {{$user->isSuggestion($user->id) ? 'checked' : ''}}>
                        </div>
                        <p>Giúp Finder xuất hiện trong danh sách gợi ý trên trang chính của Agent</p>
                    </div>
                </div>

                <div class="d-flex mt-3" style="display: none !important;">
                    <div class="flex-1">
                        <strong>Không xuất hiện trên trang tìm kiếm của Agent:</strong>
                    </div>
                    <div class="flex-1 text-center">
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input name="user_agent_find_id" class="note_right form-check-input"
                                   type="checkbox" {{!$user->isAgentFind($user->id) ? 'checked' : ''}}>
                        </div>
                        <p>Agent không thể tìm kiếm thấy Finder này</p>
                    </div>
                </div>

                <div class="text-end mt-3 container-save">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>

            </div>

        </form>
    </div>
@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>

    <script type="text/javascript" src="{{asset('vendor/datetimepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/datetimepicker/daterangepicker.js')}}"></script>

    <script>

        $('.container-save').hide()

        $('select').on('change', function () {
            $('.container-save').show()
        })

        $('.note_right').on('change', function () {
            $('.container-save').show()
        })

        $('.note').on('change', function () {
            const value = this.value
            const field = $(this).data('field')

            $.ajax({
                type: 'PUT',
                url: "{{route('administrator.users.update', ['id' => $user->id])}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    [field]: value,
                },
                success: function (response) {
                    console.log(response)
                },
                error: function (err) {
                    console.log(err)
                },
            })
        })
    </script>
@endsection
