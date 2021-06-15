@extends('layouts.page.default')
@section('content')
    <header class="header-video-default position-relative">
        @include('layouts.page.menu')
        <div id="overlay" class="overlay-img">
            <img src="{{asset('images/destinations/puno.jpg')}}" alt="" id="hero-vid" loading="lazy">
        </div>
        <div class="position-absolute bottom-n-1">
            <img src="{{asset('images/pce.png')}}" alt="" class="img-fluid" loading="lazy">
        </div>

        <div class="content-header">
            <div class="container">
                <div class="row content-header-row align-items-center">
                    <div class="col text-center">
                        <h3 class="text-white text-center h1">DESTINOS NA TERRA DOS INCAS</h3>
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
                    {{Breadcrumbs::render('destino')}}
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-g-yellow">DESTINOS DE VIAGEM NO PERU</h1>
                    {{--<p class="h2 text-secondary pt-3">USTED TENDRÁ UNA EXPERIENCIA INIMAGINABLE</p>--}}
                    {{--<p class="h4"></p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="mb-0 lead text-secondary text-center"><b>Entre nossos roteiros estão: Machu Picchu, Maravilha do Mundo, Cusco, capital do império Inca; As linhas de Nazca, um mistério a ser desvendado; Paracas, o encanto da vida marinha, Lago Titicaca, o lago das ilhas flutuantes; Lima, imponentes construções coloniais, Arequipa, a famosa cidade branca.</b></p>
                </div>

            </div>
        </div>
    </section>


    <section class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-3 mb-5 sticky-top text-center bg-white">
                    @foreach($destinos->where('estado', 1)->sortBy('nombre') as $destino)
                        <a href="{{route('destinations_show_path', str_replace(' ', '-', strtolower($destino->nombre)))}}"><img src="{{asset('images/destinations/destinations/'.str_replace(' ','-', strtolower($destino->nombre)).'.jpg')}}" alt="" width="60" height="60" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="{{ucwords(strtolower($destino->nombre))}}" loading="lazy"></a>
                    @endforeach
                </div>

                <div class="col-12">
                    <div class="alert alert-primary text-center h3" role="alert">
                        <a href="#tours">Passeios em Perú</a> | <a href="#paquetes">Pacotes de Viagem</a>
                    </div>
                </div>
                {{--<div class="col-12 col-sm-4 mb-4">--}}
                    {{--<h3 class="font-weight-bold text-g-green" id="ofertas">Destinos Perú</h3>--}}
                    {{--<div class="list-group position-relative">--}}
                        {{--@foreach($destinos->where('region', 'sur')->sortBy('nombre')->take(4) as $destino)--}}
                            {{--<a href="{{route('destinations_show_path', str_replace(' ', '-', strtolower($destino->nombre)))}}" class="list-group-item list-group-item-action">--}}
                                {{--<div class="media">--}}
                                    {{--<img src="{{asset('images/destinations/destinations/'.str_replace(' ','-', strtolower($destino->nombre)).'')}}.jpg" alt="" width="60" height="60" class="rounded-circle align-self-center mr-3" data-toggle="tooltip" data-placement="top" title="{{ucwords(strtolower($destino->nombre))}}" loading="lazy">--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h5 class="mt-0">{{ucwords(strtolower($destino->nombre))}}</h5>--}}
                                        {{--<p class="text-success">Región {{ucwords(strtolower($destino->region))}} del Perú</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--@endforeach--}}
                        {{--<div class="gradient-destinations"></div>--}}
                    {{--</div>--}}
                    {{--<div class="list-group position-relative">--}}
                        {{--@foreach($destinos->where('region', 'centro')->sortBy('nombre')->take(4) as $destino)--}}
                            {{--<a href="{{route('destinations_show_path', str_replace(' ', '-', strtolower($destino->nombre)))}}" class="list-group-item list-group-item-action">--}}
                                {{--<div class="media">--}}
                                    {{--<img src="{{asset('images/destinations/destinations/'.str_replace(' ','-', strtolower($destino->nombre)).'')}}.jpg" alt="" width="60" height="60" class="rounded-circle align-self-center mr-3" data-toggle="tooltip" data-placement="top" title="{{ucwords(strtolower($destino->nombre))}}" loading="lazy">--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h5 class="mt-0">{{ucwords(strtolower($destino->nombre))}}</h5>--}}
                                        {{--<p class="text-danger">Región {{ucwords(strtolower($destino->region))}} del Perú</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}

                    {{--<div class="list-group position-relative">--}}
                        {{--@foreach($destinos->where('region', 'norte')->sortBy('nombre')->take(4) as $destino)--}}
                            {{--<a href="{{route('destinations_show_path', str_replace(' ', '-', strtolower($destino->nombre)))}}" class="list-group-item list-group-item-action">--}}
                                {{--<div class="media">--}}
                                    {{--<img src="{{asset('images/destinations/destinations/'.str_replace(' ','-', strtolower($destino->nombre)).'')}}.jpg" alt="" width="60" height="60" class="rounded-circle align-self-center mr-3" data-toggle="tooltip" data-placement="top" title="{{ucwords(strtolower($destino->nombre))}}" loading="lazy">--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h5 class="mt-0">{{ucwords(strtolower($destino->nombre))}}</h5>--}}
                                        {{--<p class="text-info">Región {{ucwords(strtolower($destino->region))}} del Perú</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</a>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-12">
                    <h3 class="font-weight-bold text-g-green pt-4" id="tours">Passeios em Perú</h3>
                    @foreach($tours as $tour)
                        <a href="{{route('itinerario_tours_show_path', str_replace(' ','-',strtolower($tour->titulo)))}}" class="list-group-item list-group-item-action">
                            <div class="row no-gutters">
                                <div class="col-5 text-primary">
                                    <b>{{$tour->titulo}}</b>
                                </div>

                                <div class="col">
                                    <i class="fa fa-clock text-info"></i> {{$tour->duracion}}
                                </div>
                                <div class="col">
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
                                <div class="col-2 text-right">
                                    <b>
                                        @if($tour->precio < 0)
                                            <span class="text-danger">Solicite um Orçamento</span>
                                        @else
                                            <sup>$</sup>{{$tour->precio_g}}<small>USD</small>
                                        @endif
                                        {{--@if($paquetes->precio == 0 OR $paquetes->precio == NULL)--}}
                                        {{--@foreach($paquetes->precio_paquetes as $precio)--}}
                                        {{--@if($precio->estrellas == 2)--}}
                                        {{--@if($precio->precio == 0)--}}
                                        {{--<span class="text-danger">Solicite um Orçamento</span>--}}
                                        {{--@else--}}
                                        {{--<sup>$</sup>{{$precio->precio}}<small>USD</small>--}}
                                        {{--@endif--}}
                                        {{--@endif--}}
                                        {{--@endforeach--}}
                                        {{--@else--}}
                                        {{--@if($paquetes->precio < 0)--}}
                                        {{--<span class="text-danger">Solicite um Orçamento</span>--}}
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



                <div class="col-12 pt-4">
                    <h3 class="font-weight-bold text-g-green" id="paquetes">Pacotes de viagens no Peru</h3>
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
                                                    <span class="text-danger">Solicite um Orçamento</span>
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

@stop