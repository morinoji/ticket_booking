@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Sliders
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row mb-2">
                    @include('components.search')
                    <div class="col">
                        <div class="add_style">
                            <a href="{{route('sliders.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="datatable" class="table" style="border-collapse: collapse; border-spacing: 0; width: 100%;table-layout: fixed;">
                                    <thead>
                                    <tr>

                                        <th class="heading_text">Tên slide</th>
                                        <th class="heading_text">Ảnh</th>
                                        <th class="heading_text">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>

                                            <td style="width: 20%">
                                                <h6 class="mt-0 mb-1">{{$slider->name}}</h6>
                                            </td>
                                            <td>
                                                <img src="{{ $slider->image }}" style="height: 100px;width: auto;object-fit: cover">
                                            </td>
                                            <td>
                                                <a href="{{ route('sliders.find',['id'=>$slider->id]) }}"
                                                   class="me-3 text-muted">
                                                    <button  class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Chỉnh sửa</button>
                                                </a>
                                                <a data-url="{{ route('sliders.delete',['id'=>$slider->id]) }}"
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
            </div>
            <div class="col-md-12 align-bottom mt-5">
                {{ $sliders->links() }}
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('admins/add/add.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/index/list.css') }}" rel="stylesheet">
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admins/index/list.js') }}"></script>
@endsection
