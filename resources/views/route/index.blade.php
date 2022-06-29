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
                                        <label>Hãng xe</label>
                                        <select class="form-control comp m-lg-2"
                                                style="width: 50%" onchange=""
                                                {{--                                    data-url="{{route('products.index')}}"--}}
                                                name="comp">
                                            <option value="0">Tất cả</option>
                                            @foreach($comps as $comp)
                                                <option value="{{$comp->id}}">{{$comp->comp_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="add_style">
                                        <a href="{{route('addRoute')}}" class="btn btn-success float-right m-2">Thêm</a>
                                    </div>
                                </div>
                                <table id="datatable"
                                       class="table mt-3"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th class="heading_text">Ảnh</th>
                                        <th class="heading_text">Tên tuyến đường</th>
                                        <th class="heading_text" style="width: 200px" >Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @for($i=0;$i<count($routes);$i++)
                                        @if($i>0 && $routes[$i-1]->id != $routes[$i]->id || $i==0)
                                        <tr>
                                            <td>
                                                <img src="{{ $routes[$i]->thumb_image }}" style="height: 100px;width: 130px;object-fit: cover;border-radius: 5px;">
                                            </td>
                                            <td>
                                                <h6 class="mt-0 mb-1">{{$routes[$i]->route_name}}</h6>
                                            </td>
                                            <td>
                                                <a href="{{ route('updateRoute',['id'=>$routes[$i]->id]) }}"
                                                   class="me-3 text-muted">
                                                    <button  class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Chỉnh sửa</button>
                                                </a>
                                                <a data-url="{{ route('deleteRoute',['id'=>$routes[$i]->id]) }}"
                                                   href=""
                                                   class="text-muted action_delete">
                                                    <button  class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 align-bottom mt-5">
                    {{ $routes->links() }}
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
