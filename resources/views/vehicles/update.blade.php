@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Chỉnh sửa dòng xe
@endsection
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('editVeh',['id'=>$vehicle->id])}}" method="post"
                                      class="needs-validation" novalidate
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group ">
                                                <label>Tên dòng xe</label>
                                                <input type="text" class="form-control"
                                                       style="width: 50%"
                                                       value="{{$vehicle->vehicle_name}}"
                                                       name="name" required
                                                       placeholder="Nhập tên dòng xe">
                                            </div>
                                            <div class="form-group  mt-4">
                                                <label>Số ghế</label>
                                                <input type="number" class="form-control"
                                                       style="width: 50%"
                                                       value="{{$vehicle->vehicle_slots}}"
                                                       name="slots" required
                                                       placeholder="Nhập số ghế">
                                            </div>
                                        </div>

                                        <div class="row col-md-4 mb-4">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Thumbnail</label>
                                                    <div class="col-md-12 mb-2 mt-2">
                                                        <img id="blah"   style="height: 11rem;width: 11rem;object-fit: cover" onerror="this.style.display='none'" alt="" src="{{$vehicle->image}}"/>
                                                    </div>
                                                    <input type="file"
                                                           class="form-control"
                                                           onchange="readURL(this)"
                                                           name="thumb">
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
    <script src=" {{ asset('admins/add/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admins/index/list.js') }}"></script>
    <script src=" {{ asset('admins/add/add.js') }}"></script>
@endsection
