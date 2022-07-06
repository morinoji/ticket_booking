@extends('administrator.layouts.master')

@section('title')
    <title>Home page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('name')
    <h4 class="page-title">Finder</h4>
@endsection

@section('css')

@endsection

@include('administrator.user.active_slidebar')

@section('content')
    <div class="col-md-9">

        <div class="card">

            <div class="card-header">
                Danh sách Finder
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                        <tr>
                            <th>Tên đầy dủ</th>
                            <th>Tên hiển thị trên App</th>
                            <th>Số điện thoại</th>
                            <th>Ngày sinh</th>
                            <th>Ngày đăng ký tài khoản</th>
                            <th>Giới tính</th>
                            <th>Thời gian đăng ký</th>
                            <th>Zalo số này?</th>
                            <th>Trạng thái gọi Sale</th>
                            <th>Tư vấn gói nào?</th>
                            <th>Note gọi Sale</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $userItem)
                            <tr data-url="{{route('administrator.users.update', ['id' => $userItem->id])}}">
                                <td>
                                    <a href="{{route('administrator.users.edit' , ['id' => $userItem->id])}}">{{$userItem->real_name}}</a>
                                </td>
                                <td>{{$userItem->display_name}}</td>
                                <td>{{$userItem->phone}}</td>
                                <td>{{$userItem->date_of_birth}}</td>
                                <td>{{\App\Models\Formatter::getOnlyDate($userItem->created_at)}}</td>
                                <td>{{ optional($userItem->gender)->name}}</td>
                                <td>{{\App\Models\Formatter::getOnlyTime($userItem->created_at)}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div>
            {{ $users->links('pagination::bootstrap-4') }}
        </div>

    </div>

    <div class="col-md-3">
        @include('administrator.user.input_search')
    </div>

@endsection

@section('js')
    <script src="{{asset('vendor/sweet-alert-2/sweetalert2@11.js')}}"></script>
    <script src="{{asset('admins/products/index/list.js')}}"></script>

    <script type="text/javascript" src="{{asset('vendor/datetimepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('vendor/datetimepicker/daterangepicker.js')}}"></script>

    <script>
        $('.status_sale_id').on('change', function () {

            let urlRequest = $(this).parent().parent().data('url')

            const value = this.value
            $.ajax({
                type: 'PUT',
                url: urlRequest,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'package_service_advise_id': value,
                },
                success: function (response) {
                    console.log(response)
                },
                error: function (err) {
                    console.log(err)
                },
            })
        });

        $('.package_service_advise_id').on('change', function () {

            let urlRequest = $(this).parent().parent().data('url')

            const value = this.value
            $.ajax({
                type: 'PUT',
                url: urlRequest,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'package_service_advise_id': value,
                },
                success: function (response) {
                    console.log(response)
                },
                error: function (err) {
                    console.log(err)
                },
            })
        });


        var timeout = null;

        function doDelayedSearch(urlRequest, value) {
            if (timeout) {
                clearTimeout(timeout);
            }
            timeout = setTimeout(function () {
                $.ajax({
                    type: 'PUT',
                    url: urlRequest,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'note_by_sale': value,
                    },
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (err) {
                        console.log(err)
                    },
                })
            }, 1000);
        }

        $('.note_by_sale').on('input', function () {
            const urlRequest = $(this).parent().parent().data('url')
            const value = this.value
            doDelayedSearch(urlRequest, value)
        });
    </script>
@endsection
