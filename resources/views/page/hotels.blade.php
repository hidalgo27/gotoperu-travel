@extends('layouts.page.default')
@section('content')
    <header class="header-video-default position-relative">
        @include('layouts.page.menu')
        <div id="overlay" class="overlay-img">
            <img src="{{asset('images/hotels.jpg')}}" alt="" id="hero-vid" loading="lazy">
        </div>
        <div class="position-absolute bottom-n-1">
            <img src="{{asset('images/pce.png')}}" alt="" class="img-fluid" loading="lazy">
        </div>

        <div class="content-header">
            <div class="container">
                <div class="row content-header-row align-items-center">
                    <div class="col text-center">
                        <h3 class="text-white text-center h1">HOTÉIS</h3>
                        <i class="fa fa-chevron-down text-white h1"></i>
                    </div>

                </div>

            </div>
        </div>
    </header>
    @include('layouts.page.menu-mobil')
    <section class="bg-white m-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    {{Breadcrumbs::render('hotel')}}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="container">
            {{--@foreach($hoteles as $hotel)--}}
                {{--<div class="row pb-5">--}}
                    {{--<div class="col-12 col-md-3">--}}
                        {{--<img src="{{$hotel->imagen}}" alt="" class="w-100 rounded" loading="lazy">--}}
                    {{--</div>--}}
                    {{--<div class="col">--}}
                        {{--<h3>{{$hotel->nombre}}</h3>--}}
                        {{--@for($i=0; $i < $hotel->estrellas; $i++)--}}
                            {{--<i class="fa fa-star text-g-yellow"></i>--}}
                        {{--@endfor--}}
                        {{--<p class="pt-2"><i class="fa fa-map-marker-alt"></i> {{$hotel->direccion}}</p>--}}
                        {{--<hr>--}}
                        {{--@php $services = explode(',', $hotel->servicios); @endphp--}}
                        {{--<p class="lead"><b>Services:</b>--}}
                            {{--@foreach($services as $service)--}}
                                {{--<i class="fa fa-check text-secondary"></i> {{$service}}--}}
                            {{--@endforeach--}}
                        {{--</p>--}}
                        {{--<hr>--}}
                        {{--<a href="{{$hotel->url}}" class="btn btn-outline-secondary" target="_blank">{{$hotel->nombre}}</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}


            @foreach($destinos as $destino)
                <?php $i = 0; ?>
                @foreach($hoteles_destinos->where('iddestinos', $destino->id) as $num)
                        <?php $i++; ?>
                @endforeach

                    <?php
                        if ($i > 0){
                            $d_estado = "";
                        }else{
                            $d_estado = "d-none";
                        }
                    ?>

                <div class="col-12">
                    <h6 class="text-secondary pt-2 m-0 font-weight-bold {{$d_estado}}" id="{{$destino->id}}-hotel"><i class="fas fa-angle-right text-primary"></i> {{$destino->nombre}} HOTEL</h6>
                    <div class="row p-2 pb-4 {{$d_estado}}">
                        @foreach($hoteles_destinos->where('iddestinos', $destino->id) as $hoteles_destino)
                            <div class="col-4 d-flex my-2">
                                <div class="row">
                                    <div class="col-auto d-none d-sm-block">
                                    <img src="{{$hoteles_destino->hotel->imagen}}" alt="" class=" rounded-circle" width="50" height="50" loading="lazy">
                                    </div>
                                    <div class="col">
                                        <a href="{{$hoteles_destino->hotel->url}}" class="text-secondary align-middle"><i class="fas fa-h-square"></i> {{ucwords(strtolower($hoteles_destino->hotel->nombre))}}</a>
                                        @for($i=0; $i < $hoteles_destino->hotel->estrellas; $i++)
                                            <small><i class="fa fa-star text-g-yellow"></i></small>
                                        @endfor
                                        <small class="d-block text-secondary"><i class="fa fa-map-marker-alt"></i> {{$hoteles_destino->hotel->direccion}}</small>
                                        {{--@php $services = explode(',', $hoteles_destino->hotel->servicios); @endphp--}}
                                        {{--<p class="pt-2"><b>Services:</b>--}}
                                        {{--@foreach($services as $service)--}}
                                        {{--<i class="fa fa-check text-secondary"></i> {{$service}}--}}
                                        {{--@endforeach--}}
                                        {{--</p>--}}
                                        {{--                                                        <a href="{{$hoteles_destino->hotel->url}}" class="btn btn-outline-secondary" target="_blank">{{$hoteles_destino->hotel->nombre}}</a>--}}
                                    </div>
                                </div>
                                {{--<hr>--}}
                            </div>
                        @endforeach
                    </div>

                </div>
            @endforeach
        </div>
    </section>

    @stop