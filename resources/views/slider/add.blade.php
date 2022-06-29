@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Thêm mới slide
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('sliders.upload') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label>Tên slide</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Nhập tên slide">
                                    </div>

                                </div>
                                <div class="col-1"></div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Ảnh</label>
                                        <div class="col-md-12 mb-2">
                                            <img id="blah" src="#" style="height: 150px;width: auto"/>
                                        </div>
                                        <input type="file"
                                               class="form-control-file"
                                               onchange="readURL(this)"
                                               name="image">
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
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('admins/index/list.js') }}"></script>
@endsection
