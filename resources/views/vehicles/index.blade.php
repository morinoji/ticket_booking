@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Các dòng xe
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                @include('components.search')
                                <div class="col">
                                    <div class="add_style">
                                        <a href="{{route('addVeh')}}" class="btn btn-success float-right m-2">Thêm</a>
                                    </div>
                                </div>
                                <table id="datatable"
                                       class="table mt-3"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th class="heading_text">Ảnh</th>
                                        <th class="heading_text">Tên dòng xe</th>
                                        <th class="heading_text">Số ghế</th>
                                        <th class="heading_text" style="width: 200px" >Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vehicles as $vehicle)
                                        <tr>
                                            <td>
                                                <img src="{{ $vehicle->image }}" style="height: 100px;width: auto;object-fit: cover;border-radius: 5px;">
                                            </td>
                                            <td >
                                                <h6 class="mt-0 mb-1">{{$vehicle->vehicle_name}}</h6>
                                            </td>
                                            <td>
                                                <p class="mt-0 mb-1">{{$vehicle->vehicle_slots}}</p>
                                            </td>
                                            <td>
                                                <a href="{{ route('updateVeh',['id'=>$vehicle->id]) }}"
                                                   class="me-3 text-muted">
                                                    <button  class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Chỉnh sửa</button>
                                                </a>
                                                <a data-url="{{ route('deleteVeh',['id'=>$vehicle->id]) }}"
                                                   href=""
                                                   class="text-muted action_delete">
                                                    <button  class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 align-bottom mt-5">
                    {{ $vehicles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/index/list.js') }}" type="text/javascript"></script>
@endsection

@section('css')
    <link href="{{ asset('admins/index/list.css') }}" rel="stylesheet">
@endsection
