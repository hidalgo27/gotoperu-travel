@extends('layouts.page.default')
@section('content')
    <header class="header-video-default position-relative">
        @include('layouts.page.menu')
        {{--<div id="overlay">--}}
            {{--<video class="" id="hero-vid" poster="{{asset('images/slider/package-1.jpg')}}" autoplay loop muted>--}}
                {{--<source src="{{asset('media/video6.mp4')}}" />--}}
                {{--<source src="{{asset('media/video6.m4v')}}" type="video/mp4" />--}}
                {{--<source src="{{asset('media/video6.webm')}}" type="video/webm" />--}}
                {{--<source  src="{{asset('media/video6.ogv')}}" type="video/ogg" />--}}
            {{--</video>--}}

            {{--<img src="{{asset('images/logos/logo-expedia2.png')}}" alt="" class="header-expedia" loading="lazy">--}}
        {{--</div>--}}
        <div id="overlay" class="overlay-img">
            <img src="{{asset('images/sliders/cusco.jpg')}}" alt="" id="hero-vid" loading="lazy">
        </div>
        <div class="position-absolute bottom-n-1">
            <img src="{{asset('images/pce.png')}}" alt="" class="img-fluid" loading="lazy">
        </div>

        <div class="content-header">
            <div class="container">
                <div class="row content-header-row align-items-center">
                    <div class="col text-center">
                        <h3 class="text-white text-center h1">PACOTES & PASSEIOS </h3>
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
                    {{Breadcrumbs::render('paquetes')}}
                </div>
            </div>
        </div>
    </section>

    <section class="pt-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-g-yellow">PACOTES DE VIAGEM PARA O PERU</h1>
                    {{--<p class="h2 text-secondary pt-3">USTED TENDRÁ UNA EXPERIENCIA INIMAGINABLE</p>--}}
                    {{--<p class="h4"></p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="mb-0 lead text-secondary text-center"><b>
                            Nossos pacotes turísticos mais populares para o Peru. Esses pacotes podem ser usados como referência para personalizar sua própria viagem. Na ANDESVIAGENS nos especializamos em criar experiências personalizadas de acordo com suas preferências; Convidamos você a rever esses programas para ter uma idéia dos destinos mais importantes, por exemplo, Machu Picchu, Lago Titicaca, Nazca e Amazônia.</b>
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class="alert alert-light text-center h3" role="alert">
                        <a href="#con-hoteles" class="text-g-green">Pacotes com <b>*Hotels</b></a> | <a href="#sin-hoteles" class="text-danger">Pacotes <b>*sem hotéis</b></a>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="py-5 bg-white" id="con-hoteles">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="alert alert-g-green py-2 mb-1" role="alert">
                        <h5 class="font-weight-bold m-0">Todos os nossos pacotes para o Peru <small><b>(*com hotéis incluídos)</b></small></h5>
                    </div>
                    {{--<h5 class="text-secondary py-2"><i class="fa fa-chevron-right"></i> <b>Incluye:</b> ---.</h5>--}}

                    @foreach($paquete->sortBy('duracion') as $paquetes)
                        <a href="{{route('home_show_path', str_replace(' ','-',strtolower($paquetes->titulo)))}}" class="list-group-item list-group-item-action">
                            <div class="row no-gutters">
                                <div class="col-5 text-primary">
                                    <b>{{$paquetes->duracion}} Días</b> {{ucwords(strtolower($paquetes->titulo))}}
                                </div>
                                <div class="col">
                                    <i class="fa fa-map-marker-alt text-g-green"></i>
                                    @php
                                        $i = 1;
                                        $num_des = count($paquete_destinos->where('idpaquetes',$paquetes->id));
                                    @endphp
                                    @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                        {{$paquete_destino->destinos->nombre}}@if($i < $num_des),@endif
                                        @php $i++; @endphp
                                    @endforeach
                                </div>
                                <div class="col-2 text-right">
                                    <b>
                                        @foreach($paquetes->precio_paquetes as $precio)
                                            @if($precio->estrellas == 2)
                                                @if($precio->precio == 0)
                                                    <span class="text-danger">Pida una cotización</span>
                                                @else
                                                    <sup>$</sup>{{$precio->precio}}<small>USD</small>
                                                @endif
                                            @endif
                                        @endforeach

                                    </b>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="py-5 bg-white" id="sin-hoteles">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger py-2 mb-1" role="alert">
                        <h5 class="font-weight-bold m-0">Todos os nossos pacotes para o Peru <small><b>(*sem hotéis incluídos)</b></small></h5>
                    </div>
                    {{--<h5 class="text-secondary py-2"><i class="fa fa-chevron-right"></i> <b>Incluye:</b> ---.</h5>--}}

                    @foreach($paquete->where('s_precio', 1)->sortBy('duracion') as $paquetes)
                        <a href="{{route('sin_hotel_show_path', str_replace(' ','-',strtolower($paquetes->titulo)))}}" class="list-group-item list-group-item-action">
                            <div class="row no-gutters">
                                <div class="col-5 text-primary">
                                    <b>{{$paquetes->duracion}} Días</b> {{ucwords(strtolower($paquetes->titulo))}}
                                </div>
                                <div class="col">
                                    <i class="fa fa-map-marker-alt text-danger"></i>
                                    @php
                                        $i = 1;
                                        $num_des = count($paquete_destinos->where('idpaquetes',$paquetes->id));
                                    @endphp
                                    @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                        {{$paquete_destino->destinos->nombre}}@if($i < $num_des),@endif
                                        @php $i++; @endphp
                                    @endforeach
                                </div>
                                <div class="col-2 text-right">
                                    <b>
                                        <sup>$</sup>{{$paquetes->precio}}<small>USD</small>
                                    </b>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@stop