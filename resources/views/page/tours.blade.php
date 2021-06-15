@extends('layouts.page.default')
@section('content')
    <header class="header-video-default position-relative">
        @include('layouts.page.menu')
        <div id="overlay" class="overlay-img">
            <img src="{{asset('images/destinations/machu-picchu.jpg')}}" alt="" id="hero-vid" loading="lazy">
        </div>
        <div class="position-absolute bottom-n-1">
            <img src="{{asset('images/pce.png')}}" alt="" class="img-fluid" loading="lazy">
        </div>

        <div class="content-header">
            <div class="container">
                <div class="row content-header-row align-items-center">
                    <div class="col text-center">
                        <h3 class="text-white text-center h1">SÓ PASSEIOS</h3>
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
                    {{Breadcrumbs::render('tours')}}
                </div>
            </div>
        </div>
    </section>
    <section class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    {{--<ul class="page-breadcrumb">--}}
                        {{--<li>--}}
                            {{--<i class="fa fa-home"></i>--}}
                            {{--<a href="{{route('home_path')}}">Home</a>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</li>--}}
                        {{--@for($i = 0; $i <= count(Request::segments()); $i++)--}}
                            {{--<li>--}}
                                {{--<a href="">{{Request::segment($i)}}</a>--}}
                                {{--@if($i < count(Request::segments()) & $i > 0)--}}
                                    {{--{!!'<i class="fa fa-angle-right"></i>'!!}--}}
                                {{--@endif--}}
                            {{--</li>--}}
                        {{--@endfor--}}
                    {{--</ul>--}}
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-g-yellow">PASSEIOS EM PERU</h1>
                    {{--<p class="h2 text-secondary pt-3">USTED TENDRÁ UNA EXPERIENCIA INIMAGINABLE</p>--}}
                    {{--<p class="h4"></p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="mb-0 lead text-secondary text-center"><b>Nossos passeios mais populares no Peru. Estes Tours podem ser usados como referência para personalizar sua própria viagem. Na GOTOPERU nos especializamos em criar experiências personalizadas de acordo com suas preferências; Convidamos você a rever esses programas para ter uma idéia dos destinos mais importantes, por exemplo: Cusco, Machu Picchu, Lago Titicaca, Nazca e Amazônia.</b></p>
                </div>

            </div>
        </div>
    </section>

    <section class="pb-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div id="tours" class="d-sm-block pt-5">
                        <div class="alert alert-info py-2 mb-1" role="alert">
                            <h5 class="font-weight-bold m-0">Passeios Individuais</h5>
                        </div>
                        {{--<h5 class="text-secondary py-2"><i class="fa fa-chevron-right"></i> <b>Incluye:</b> hoteles, tours, traslados, entradas, desayunos, trenes.</h5>--}}

                        @foreach($tours as $tour)
                            <a href="{{route('itinerario_tours_show_path', str_replace(' ','-',strtolower($tour->titulo)))}}" class="list-group-item list-group-item-action">
                                <div class="row no-gutters">
                                    <div class="col-7 col-sm-5 text-primary">
                                        <b>{{$tour->titulo}}</b>
                                    </div>

                                    <div class="col d-none d-md-inline">
                                    <i class="fa fa-clock text-info"></i> {{ucwords(strtolower($tour->duracion))}}
                                    </div>
                                    <div class="col d-none d-sm-inline">
                                        <i class="fa fa-map-marker-alt text-info"></i>
                                        @php
                                            $i = 1;
                                            $num_des = count($tours_destinos->where('idtours',$tour->id));
                                        @endphp
                                        @foreach($tours_destinos->where('idtours',$tour->id) as $tour_destino)
                                            {{$tour_destino->destinos->nombre}}@if($i < $num_des),@endif
                                            @php $i++; @endphp
                                        @endforeach
                                    </div>
                                    <div class="col col-sm-2 text-right">
                                        <b>
                                            @if($tour->precio < 0)
                                                <span class="text-danger">Pida una cotización</span>
                                            @else
                                                <sup>$</sup>{{$tour->precio_g}}<small>USD</small>
                                            @endif
                                            {{--@if($paquetes->precio == 0 OR $paquetes->precio == NULL)--}}
                                            {{--@foreach($paquetes->precio_paquetes as $precio)--}}
                                            {{--@if($precio->estrellas == 2)--}}
                                            {{--@if($precio->precio == 0)--}}
                                            {{--<span class="text-danger">Pida una cotización</span>--}}
                                            {{--@else--}}
                                            {{--<sup>$</sup>{{$precio->precio}}<small>USD</small>--}}
                                            {{--@endif--}}
                                            {{--@endif--}}
                                            {{--@endforeach--}}
                                            {{--@else--}}
                                            {{--@if($paquetes->precio < 0)--}}
                                            {{--<span class="text-danger">Pida una cotización</span>--}}
                                            {{--@else--}}
                                            {{--<sup>$</sup>{{$paquetes->precio}}<small>USD</small>--}}
                                            {{--@endif--}}
                                            {{--@endif--}}
                                        </b>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@stop