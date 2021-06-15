@extends('layouts.page.default')

@section('content')
    <header class="header-video-default position-relative">
        @include('layouts.page.menu')
        <div id="overlay">
            <video class="" id="hero-vid" poster="{{asset('images/sliders/package-1.jpg')}}" autoplay loop muted>
                <source src="{{asset('media/video6.mp4')}}" />
                <source src="{{asset('media/video6.m4v')}}" type="video/mp4" />
                <source src="{{asset('media/video6.webm')}}" type="video/webm" />
                <source  src="{{asset('media/video6.ogv')}}" type="video/ogg" />
            </video>

            <img src="{{asset('images/logos/logo-expedia2.png')}}" alt="" class="header-expedia" loading="lazy">
        </div>
        <div class="position-absolute bottom-n-1">
            <img src="{{asset('images/pce.png')}}" alt="" class="img-fluid" loading="lazy">
        </div>

        <div class="content-header">
            <div class="container">
                <div class="row content-header-row align-items-center no-gutters">
                    <div class="col text-center">
                        <h3 class="text-white text-center h1">{{strtoupper(str_replace('-', ' ', $title))}}</h3>
                        {{--<i class="fa fa-chevron-down text-white h1"></i>--}}
                    </div>
                    {{--<div class="col col-md-6 col-lg-4 col-xl-3 bg-rgba-white rounded">--}}
                        {{--<h4 class="text-g-yellow pt-2 pl-2 m-0"><i class="fa fa-map-marker-alt"></i> Resumo</h4>--}}

                        {{--<div class="pb-4 position-relative">--}}
                            {{--@foreach($paquete_iti as $paquete_itinerary)--}}
                                {{--@foreach($paquete_itinerary->itinerario->sortBy('dia')->take(6) as $itinerario)--}}
                                    {{--<p class="m-0 p-2">--}}
                                        {{--<b class="font-weight-bold">Dia {{$itinerario->dia}}: </b> {{ucwords(strtolower($itinerario->titulo))}}--}}
                                    {{--</p>--}}
                                {{--@endforeach--}}
                            {{--@endforeach--}}

                            {{--@if($paquete_itinerary->duracion > 6)--}}
                                {{--<div class="gradient-destinations"></div>--}}
                                {{--<a href="#" class="btn-link font-weight-normal b-routes p-2" data-toggle="modal" data-target="#route-modal">Esboço Completo <i class="fa fa-chevron-right"></i></a>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<!-- Modal -->--}}
                        {{--<div class="modal fade" id="route-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
                            {{--<div class="modal-dialog modal-lg" role="document">--}}
                                {{--<div class="modal-content">--}}
                                    {{--<div class="modal-header">--}}
                                        {{--<h5 class="modal-title" id="exampleModalLabel">Resumo</h5>--}}
                                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                                            {{--<span aria-hidden="true">&times;</span>--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                    {{--<div class="modal-body">--}}
                                        {{--<div class="row">--}}
                                            {{--<div class="col box-route-ininerary p-4">--}}

                                                {{--@foreach($paquete_itinerary->itinerario as $itinerario)--}}
                                                    {{--<p class="m-0 p-2">--}}
                                                        {{--<b class="font-weight-bold">Dia {{$itinerario->dia}}: </b> {{ucwords(strtolower($itinerario->titulo))}}--}}
                                                    {{--</p>--}}
                                                {{--@endforeach--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>

            </div>
        </div>
    </header>
    @include('layouts.page.menu-mobil')

    <section class="bg-white m-0">
        <div class="container">
            <div class="row">
                <div class="col">
                    {{Breadcrumbs::render('paquetes-show', $title)}}
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    @foreach($paquete_iti as $paquete_i)
                        @if($paquete_i->duracion == 1)
                            <h1 class="font-montserrat text-g-green font-weight-bold">PACOTES NO PERU {{$paquete_i->duracion}} DIA: {{strtoupper(str_replace('-', ' ', $title))}}</h1>
                            @php $s_none = 'd-none'; @endphp
                        @else
                            <h1 class="font-montserrat text-g-green font-weight-bold">PACOTES NO PERU {{$paquete_i->duracion}} DIAS: {{strtoupper(str_replace('-', ' ', $title))}}</h1>
                            @php $s_none = ''; @endphp
                        @endif
                    @endforeach

                    {{--@foreach($paquete_categoria->where('idpaquetes', $paquete_i->id) as $categoria)--}}
                        {{--@if($categoria)--}}
                                {{--@php $s_none = 'd-none'; @endphp--}}
                            {{--@else--}}
                                {{--@php $s_none = ''; @endphp--}}
                            {{--@endif--}}
                    {{--@endforeach--}}
                    {{--<p class="h3 my-3 font-weight-bold ">Lorem elit. Accusamus asperiores commodi</p>--}}
                    {{--<p class="lead">L orem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad assumenda blanditiis consectetur cumque, debitis enim eveniet id <b>labore nam necessitatibus</b> repellat? Consectetur doloremque harum necessitatibus quis repellendus sit veniam.</p>--}}
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-4 d-none d-lg-inline-block">
                    <div class="row">
                        <div class="col">
                            <div class="d-none d-sm-block">
                                {{--<h3 class="text-secondary pt-5 pb-4 h4"><strong>Paquetes</strong></h3>--}}
                                <div class="alert alert-g-green py-2 mb-1" role="alert">
                                    <h5 class="font-weight-bold m-0">Pacotes</h5>
                                </div>
                                <p class="text-secondary"><i class="fa fa-chevron-right"></i> <b>Incluso:</b> Hotéis, passeios, traslados, ingressos, café da manha, trenes.</p>
                                <div class="list-group">
                                    @foreach($paquete->where('estado', 1)->sortBy('duracion')->take(6) as $paquetes)
                                        <a href="{{route('home_show_path', str_replace(' ','-',strtolower($paquetes->titulo)))}}" class="list-group-item list-group-item-action text-primary">
                                            {{$paquetes->duracion}} Dias {{ucwords(strtolower($paquetes->titulo))}}. <b class="text-g-green">Visite</b>:

                                            @php
                                                $i = 1;
                                                $num_des = count($paquete_destinos->where('idpaquetes',$paquetes->id));
                                            @endphp
                                            @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                                {{ucwords(strtolower($paquete_destino->destinos->nombre))}}@if($i < $num_des),@endif
                                                @php $i++; @endphp
                                            @endforeach
                                        </a>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col text-right">
                            <a href="{{route('paquetes_path')}}" class="btn-link font-weight-normal">Veja todos os pacotes <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="d-none d-sm-block pt-5">
                                {{--<h3 class="text-secondary pt-5 pb-4 h4"><strong>Paquetes</strong></h3>--}}
                                <div class="alert alert-danger py-2 mb-1" role="alert">
                                    <h5 class="font-weight-bold m-0">Pacotes sem Hotel</h5>
                                </div>
                                <p class="text-secondary"><i class="fa fa-chevron-right"></i> <b>Incluso:</b> Passeios, traslados, ingressos, café da manha, trenes.</p>

                                @foreach($paquete->where('s_precio', 1)->sortBy('duracion')->take(6) as $paquetes)
                                    <a href="{{route('sin_hotel_show_path', str_replace(' ','-',strtolower($paquetes->titulo)))}}" class="list-group-item list-group-item-action text-primary">
                                        {{$paquetes->duracion}} Dias {{ucwords(strtolower($paquetes->titulo))}}. <b class="text-danger">Visite</b>:

                                        @php
                                            $i = 1;
                                            $num_des = count($paquete_destinos->where('idpaquetes',$paquetes->id));
                                        @endphp
                                        @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                            {{ucwords(strtolower($paquete_destino->destinos->nombre))}}@if($i < $num_des),@endif
                                            @php $i++; @endphp
                                        @endforeach
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col text-right">
                            <a href="{{route('paquetes_path')}}" class="btn-link font-weight-normal">Veja todos os pacotes <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm">
                    <div class="row">
                        <div class="col-12 col-sm-7 d-none d-sm-block">
                            @foreach($paquete_iti as $paquete_i)
                                <img src="{{asset('images/packages/'.$paquete_i->codigo.'.jpg')}}" alt="{{ucwords(strtolower($title))}}" class="img-fluid w-100 rounded" loading="lazy">
                            @endforeach
                        </div>
                        <div class="col-12 col-sm">
                            <div class="card">
                                <div class="p-3">
                                    @foreach($paquete_iti as $paquete_i)
                                        <p class="h1 text-secondary "><b>{{$paquete_i->duracion}} <small>dias</small></b></p>
                                    @endforeach
                                        <h5 class="h1 text-center"><sup class="h3 text-secondary">De</sup> <b class="text-g-yellow">
                                                @foreach($paquete_iti as $paquetes)
                                                    @foreach($paquetes->precio_paquetes->sortBy('estrellas') as $precio)
                                                        @if($precio->estrellas == 2)
                                                            @if($precio->precio == 0)
                                                                Pida una cotización
                                                            @else
                                                                ${{$precio->precio}}
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </b> <span class="h6 text-secondary">USD</span></h5>
                                        @foreach($paquete_iti as $paquete_i)
                                    <p class="m-0"><b>Código de viagem: {{$paquete_i->codigo}}</b></p>
                                        @endforeach

                                    {{--<a href="" class="btn btn-primary btn-lg btn-avalavility margin-top-10">Check Availability</a>--}}
                                </div>
                                <a  href="#book-now" type="button" class="btn btn-primary btn-lg btn-avalavility margin-top-10">
                                    Consultas
                                </a>
                            </div>
                            <h5 class="my-2">Destinos:</h5>
                            @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                {{--<p class="font-weight-bold text-secondary"><i class="fa fa-check"></i> {{ucwords(strtolower($paquete_destino->destinos->nombre))}}</p>--}}
                                <a href="{{route('destinations_show_path', str_replace(' ', '-', strtolower($paquete_destino->destinos->nombre)))}}"><img src="{{asset('images/destinations/destinations/'.str_replace(' ','-', strtolower($paquete_destino->destinos->nombre)).'.jpg')}}" alt="" width="60" height="60" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="{{ucwords(strtolower($paquete_destino->destinos->nombre))}}" loading="lazy"></a>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3 class="font-weight-bold mt-4">Roteiro:</h3>
                            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#resumen" role="tab" aria-controls="resumen" aria-selected="true">Resumen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#detalle" role="tab" aria-controls="detalle" aria-selected="false">Detallado</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="resumen" role="tabpanel" aria-labelledby="home-tab">
                                    @foreach($paquete_iti as $paquete_itinerary)
                                        @foreach($paquete_itinerary->itinerario->sortBy('dia') as $itinerario)
                                            <h4 class="font-weight-bold mt-4 text-g-yellow"><b>Dia {{$itinerario->dia}}: </b> {{ucwords(strtolower($itinerario->titulo))}}</h4>
                                            @php echo $itinerario->resumen; @endphp
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="detalle" role="tabpanel" aria-labelledby="profile-tab">
                                    @foreach($paquete_iti as $paquete_itinerary)
                                        @foreach($paquete_itinerary->itinerario->sortBy('dia') as $itinerario)
                                            <h4 class="font-weight-bold mt-4 text-g-yellow"><b>Dia {{$itinerario->dia}}: </b> {{ucwords(strtolower($itinerario->titulo))}}</h4>
                                            @php echo $itinerario->descripcion; @endphp
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($paquete_iti as $paquete_i)
                        @if($paquete_i->duracion == 1)
                            <div class="row d-none">
                        @else

                            <div class="row">
                        @endif
                    @endforeach


                        <div class="col">
                            <h3 class="font-weight-bold mt-4">Preços:</h3>
                            <table class="table table-bordered mb-0">
                                {{--<caption>Price per person</caption>--}}
                                <thead>
                                <tr>
                                    <th colspan="5">Preco por pessoa tendo em conta acomodacao quarto duplo</th>
                                </tr>
                                <tr class="bg-primary text-white">
                                    <th class="text-center w-25">Económico  <span class="d-block text-warning">2 <i class="fa fa-star" aria-hidden="true"></i></span></th>
                                    {{--<th class="text-center">Tourista 3 <i class="fa fa-star text-warning" aria-hidden="true"></i></th>--}}
                                    <th class="text-center w-25">Turista <span class="d-block text-warning">3 <i class="fa fa-star text-warning" aria-hidden="true"></i></span></th>
                                    <th class="text-center w-25">Superior <span class="d-block text-warning">4 <i class="fa fa-star text-warning" aria-hidden="true"></i></span></th>
                                    <th class="text-center w-25">Luxo <span class="d-block text-warning">5 <i class="fa fa-star text-warning" aria-hidden="true"></i></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="bg-light">
                                    @foreach($paquete_iti as $paquetes)
                                        @foreach($paquetes->precio_paquetes->sortBy('estrellas') as $precio)
                                            @if($precio->precio == 0)
                                                <td>Pida una cotización</td>

                                                @else
                                                <td class="text-center h5">USD ${{$precio->precio}}</td>

                                            {{--@elseif($precio->estrellas == 2)--}}
                                                    {{--<td>USD ${{$precio->precio}}</td>--}}
                                                    {{--<td>Pida una cotización</td>--}}
                                            {{--@elseif($precio->estrellas > 2)--}}
                                                {{--<td>USD ${{$precio->precio}}</td>--}}
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                                {{--<tr>--}}
                                    {{--@foreach($paquete_iti as $paquetes)--}}
                                        {{--@foreach($paquetes->precio_paquetes->sortBy('estrellas') as $precio)--}}
                                            {{--<td>--}}
                                                {{--@foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)--}}
                                                    {{--@foreach($hoteles_destinos->where('iddestinos', $paquete_destino->destinos->id) as $hoteles_destino)--}}
                                                        {{--@foreach($hoteles->where('id', $hoteles_destino->hotel->id)->where('estrellas', $precio->estrellas) as $hotel)--}}
                                                            {{--<a href="{{$hoteles_destino->hotel->url}}" target="_blank" data-toggle="tooltip" data-placement="top" title="{{$hotel->servicios}}"><small class="d-block"><i class="fas fa-angle-right"></i> {{ucwords(strtolower($hotel->nombre))}} <i class="text-secondary">({{ucwords(strtolower($paquete_destino->destinos->nombre))}})</i></small></a>--}}
                                                        {{--@endforeach--}}
                                                    {{--@endforeach--}}
                                                {{--@endforeach--}}
                                            {{--</td>--}}
                                        {{--@endforeach--}}
                                    {{--@endforeach--}}
                                {{--</tr>--}}
                                </tbody>
                            </table>
                            <small>*Se você tem um hotel específico, teremos o prazer de preparar uma cotação personalizada.
                                <a href="#book-now">Pregunte aquí.</a></small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h3 class="font-weight-bold mt-4">Incluso:</h3>
                            @php echo $paquetes->incluye; @endphp
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3 class="font-weight-bold mt-4">Não Incluso:</h3>
                            @php echo $paquetes->noincluye; @endphp
                        </div>
                    </div>
                    @if(isset($paquetes->opcional))
                        @php
                            $hide_op = '';
                        @endphp
                        @else
                        @php
                            $hide_op = 'd-none';
                        @endphp
                    @endif
                    <div class="row {{$hide_op}}">
                        <div class="col">
                            <h3 class="font-weight-bold mt-4">Opcional:</h3>
                            @php echo $paquetes->opcional; @endphp
                        </div>
                    </div>

                    {{--<div class="row">--}}
                        {{--<div class="col">--}}
                            {{--<h3 class="font-weight-bold mt-4"><strong>Hotels</strong></h3>--}}
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores at distinctio eos error minus, perspiciatis praesentium sint suscipit ullam voluptatum. Ab, aliquid architecto atque consequuntur expedita hic inventore non repudiandae!</p>--}}
                            {{--<div class="alert alert-primary text-center mt-3" role="alert">|--}}
                                {{--@foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)--}}
                                    {{--<a href="#{{$paquete_destino->destinos->id}}-hotel" class="font-weight-bold">{{$paquete_destino->destinos->nombre}} HOTEL</a> |--}}
                                {{--@endforeach--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)--}}
                        {{--<h5 class="text-g-yellow pt-4 m-0" id="{{$paquete_destino->destinos->id}}-hotel"><i class="fa fa-check"></i> {{$paquete_destino->destinos->nombre}} HOTEL</h5>--}}
                        {{--@foreach($hoteles_destinos->where('iddestinos', $paquete_destino->destinos->id) as $hoteles_destino)--}}
                            {{--<div class="row pt-3 pb-4">--}}
                                {{--<div class="col-auto d-none d-sm-block">--}}
                                    {{--<img src="{{$hoteles_destino->hotel->imagen}}" alt="" class=" rounded-circle" width="100" height="100">--}}
                                {{--</div>--}}
                                {{--<div class="col">--}}
                                    {{--<h3>{{$hoteles_destino->hotel->nombre}}</h3>--}}
                                    {{--@for($i=0; $i < $hoteles_destino->hotel->estrellas; $i++)--}}
                                        {{--<i class="fa fa-star text-g-yellow"></i>--}}
                                    {{--@endfor--}}
                                    {{--<p class="pt-2"><i class="fa fa-map-marker-alt"></i> {{$hoteles_destino->hotel->direccion}}</p>--}}
                                    {{--@php $services = explode(',', $hoteles_destino->hotel->servicios); @endphp--}}
                                    {{--<p class="lead"><b>Services:</b>--}}
                                        {{--@foreach($services as $service)--}}
                                            {{--<i class="fa fa-check text-secondary"></i> {{$service}}--}}
                                        {{--@endforeach--}}
                                    {{--</p>--}}
                                    {{--<a href="{{$hoteles_destino->hotel->url}}" class="btn btn-outline-secondary" target="_blank">{{$hoteles_destino->hotel->nombre}}</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<hr>--}}
                        {{--@endforeach--}}
                    {{--@endforeach--}}

                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light" id="book-now">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-9 col-lg-8 text-center">
                    <span class="text-secondary font-weight-bold">PACOTE DE VIAGEM</span>
                    <h2 class="text-primary font-weight-bold">{{$paquetes->titulo}} {{$paquetes->duracion}} DIAS</h2>
                    {{--<h5 class="text-secondary">{{$paquetes->duracion}} Days</h5>--}}
                    <hr>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-9 col-lg-8">
                    <form id="i_form" role="form">
                        {{csrf_field()}}
                        <h3 class="text-secondary mt-4">Acomodação</h3>

                        <div class="row">
                            <div class="col-6 col-sm btn-group-toggle" data-toggle="buttons">
                                <label class="col btn btn-outline-secondary text-secondary number-hover">
                                    <input type="checkbox" autocomplete="off" name="accommodation[]" value="Econômico"> Económico
                                    <div class="d-block text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </label>
                            </div>
                            <div class="col-6 col-sm btn-group-toggle" data-toggle="buttons">
                                <label class="col btn btn-outline-secondary text-secondary number-hover">
                                    <input type="checkbox" autocomplete="off" name="accommodation[]" value="Turista"> Turista
                                    <div class="d-block text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </label>
                            </div>
                            <div class="col-6 col-sm btn-group-toggle" data-toggle="buttons">
                                <label class="col btn btn-outline-secondary text-secondary number-hover">
                                    <input type="checkbox" autocomplete="off" name="accommodation[]" value="Superior"> Superior
                                    <div class="d-block text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </label>
                            </div>
                            <div class="col-6 col-sm btn-group-toggle" data-toggle="buttons">
                                <label class="col btn btn-outline-secondary text-secondary number-hover">
                                    <input type="checkbox" autocomplete="off" name="accommodation[]" value="Luxo"> Luxo
                                    <div class="d-block text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <h3 class="text-secondary mt-4">Numero de Passageiros</h3>

                        <div class="row no-gutters btn-group-toggle" data-toggle="buttons">
                            <label class="btn col btn-outline-primary">
                                <input type="radio" name="number" class="number" autocomplete="off" value="1"> 1 <i class="fa fa-male"></i>
                            </label>
                            <label class="btn col mx-2 btn-outline-primary">
                                <input type="radio" name="number" class="number" autocomplete="off" value="2"> 2 <i class="fa fa-male"></i>
                            </label>
                            <label class="btn col btn-outline-primary">
                                <input type="radio" name="number" class="number" autocomplete="off" value="3"> 3 <i class="fa fa-male"></i>
                            </label>
                            <label class="btn col mx-2 btn-outline-primary">
                                <input type="radio" name="number" class="number" autocomplete="off" value="4"> 4 <i class="fa fa-male"></i>
                            </label>
                            <label class="btn col btn-outline-primary">
                                <input type="radio" name="number" class="number" autocomplete="off" value="5+"> 5+ <i class="fa fa-male"></i>
                            </label>
                            <label class="btn col ml-2 btn-outline-primary">
                                <input type="radio" name="number" class="number" autocomplete="off" value="Undecided"><small>Indeciso</small>
                            </label>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <h3 class="text-secondary mt-4">Data de Viagem</h3>
                                <input type="text" class="form-control" id="i_date" placeholder="Data de Viagem">
                                <input type="hidden" id="i_package" value="{{$paquetes->codigo}}: {{$paquetes->titulo}} {{$paquetes->duracion}} DAYS">
                            </div>
                            <div class="col-2">
                                <h3 class="text-secondary mt-4">DDD</h3>
                                <input type="tel" class="form-control" id="i_ddd" placeholder="DDD">
                            </div>
                            <div class="col">
                                <h3 class="text-secondary mt-4">Telefone</h3>
                                <input type="tel" class="form-control" id="i_tel" placeholder="Telefone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3 class="text-secondary mt-4">Nome</h3>
                                <input type="text" class="form-control" id="i_name" placeholder="Nome completo">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3 class="text-secondary mt-4">Email</h3>
                                <input type="email" class="form-control" id="i_email" placeholder="Digite seu email">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h3 class="text-secondary mt-4">Dúvidas?</h3>
                                <textarea class="form-control" id="i_comment" rows="3" placeholder="Como você imagina uma viagem inesquecivel ao Perú, sugestões especiais, perguntas, comentários"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col my-3 text-center">

                                <button class="btn btn-g-green btn-block btn-lg btn-next" id="i_send" type="button" onclick="inquire()">Enviar
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                                <div class="text-center d-none text-primary" id="loader_sin">
                                    <div class="fa-3x">
                                        <i class="fas fa-spinner fa-pulse"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-success alert-dismissible fade d-none" id="i_alert" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Muito obrigado</strong> por entrar em contato com a GOTOPERU, um agente de viagens entrará em contato com você nas próximas 24 horas para ajudá-lo a planejar sua viagem. :)
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function inquire(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('[name="_token"]').val()
                    }
                });

                $("#i_send").attr("disabled", true);

                var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+.[A-Za-z0-9_.]+[A-za-z]$/;



                var s_accommodation = document.getElementsByName('accommodation[]');
                var $accommodation = "";
                for (var i = 0, l = s_accommodation.length; i < l; i++) {
                    if (s_accommodation[i].checked) {
                        $accommodation += s_accommodation[i].value+' , ';
                    }
                }
                s_accommodation = $accommodation.substring(0,$accommodation.length-3);


                var s_number = $(".number:checked").val();

                var s_date = $('#i_date').val();
                var s_ddd = $('#i_ddd').val();
                var s_tel = $('#i_tel').val();
                var s_name = $('#i_name').val();
                var s_email = $('#i_email').val();
                var s_package = $('#i_package').val();


                var s_comment = $('#i_comment').val();


                if (filter.test(s_email)){
                    sendMail = "true";
                } else{
                    $('#i_email').css("border-bottom", "2px solid #FF0000");
                    sendMail = "false";
                }
                if (s_name.length == 0 ){
                    $('#i_name').css("border-bottom", "2px solid #FF0000");
                    var sendMail = "false";
                }

                if(sendMail == "true"){
                    var datos = {

                        "txt_accommodation" : s_accommodation,
                        "txt_number" : s_number,

                        "txt_date" : s_date,
                        "txt_ddd" : s_ddd,
                        "txt_tel" : s_tel,
                        "txt_name" : s_name,
                        "txt_email" : s_email,
                        "txt_package" : s_package,
                        "txt_comment" : s_comment,

                    };
                    $.ajax({
                        data:  datos,
                        url:   "{{route('inquire_path')}}",
                        type:  'post',

                        beforeSend: function () {

                            $('#i_send').removeClass('show');
                            $("#i_send").addClass('d-none');

                            $("#loader_sin").removeClass('d-none');
                            $("#loader_sin").addClass('show');
                        },
                        success:  function (response) {
                            $('#i_form')[0].reset();
                            $('#i_send').removeClass('d-none');
                            $('#i_send').addClass('show');
                            $("#loader_sin").removeClass('show');
                            $("#loader_sin").addClass('d-none');
                            $('#i_alert').removeClass('d-none');
                            $("#i_alert").addClass('show');
                            $("#i_alert b").html(response);
                            $("#i_alert").fadeIn('slow');
                            $("#i_send").removeAttr("disabled");
                        }
                    });
                } else{
                    $("#i_send").removeAttr("disabled");
                }
            }

            $('#i_date').datepicker({
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true,
            });

        </script>
    @endpush

@stop