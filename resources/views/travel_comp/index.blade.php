@extends('layouts.admins')

@section('title')
    <title>Home</title>
@endsection
@section('title_header')
    Các hãng xe
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
                                    <div style="display: flex;justify-content: center;align-items: center;">
                                        <label>Tuyến đường</label>
                                        <select class="form-control route m-lg-2"
                                                style="width: 50%" onchange=""
                                                {{--                                    data-url="{{route('products.index')}}"--}}
                                                name="route">
                                            <option value="0">Tất cả</option>
                                            @foreach($routes as $route)
                                                <option value="{{$route->id}}">{{$route->route_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="add_style">
                                        <a href="{{route('addComp')}}" class="btn btn-success float-right m-2">Thêm</a>
                                    </div>
                                </div>
                                <table id="datatable"
                                       class="table mt-3"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th class="heading_text">Ảnh</th>
                                        <th class="heading_text">Tên Hãng Xe</th>
                                        <th class="heading_text" style="width: 200px" >Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comps as $comp)
                                        <tr>
                                            <td>
                                                <img src="{{$comp->image}}" style="height: 100px;width: auto;object-fit: cover;border-radius: 5px;">
                                            </td>
                                            <td >
                                                <h6 class="mt-0 mb-1">{{$comp->comp_name}}</h6>
                                            </td>
<td>
                                                <a
                                                    href="{{ route('updateComp',['id'=>$comp->id]) }}"
                                                   class="me-3 text-muted">
                                                    <button  class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Chỉnh sửa</button>
                                                </a>
                                                <a
{{--                                                    data-url="{{ route('deleteVeh',['id'=>$vehicle->id]) }}"--}}
                                                   href="{{route('deleteComp',['id'=>$comp->id])}}"
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
                    {{ $comps->links() }}
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
