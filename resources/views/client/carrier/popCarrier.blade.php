@extends('client.layouts.admins')

@section('title')
    <title>Hãng xe uy tín</title>
@endsection

@section('content')
    <section class="popular page">
        <div class="container-xl">
            <h2 class="popular-heading">
                Hãng xe phổ biến
            </h2>

            <div class="popular-brand">
                @foreach($carriers as $element)
                <div class="brand-slide__item">
                    <a href="{{route('findCarrier',['id'=>$element->id])}}" class="brand-slide__cover">
                        <img src="{{$element->thumb_nail?? asset('RouteBus/assets/images/Brand/SaoViet.png')}}" alt="Image Brand" class="brand-slide__img">

                        <div class="brand-slide__info">
                            <img src="{{$element->image ?? asset('RouteBus/assets/images/Brand/logo1.png')}}" alt="Image Logo">
                            <p class="brand-slide__text">
                                {{$element->comp_name}}
                            </p>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
            <div style="align-items: center" class="mt-3">
                {{$carriers->links('pagination::webPagination')}}
            </div>



        </div>
    </section>
@endsection
