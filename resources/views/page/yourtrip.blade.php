    @extends('layouts.page.traveller')
@section('seo')
    <title>Viajes a Perú 2021 y Tours Todo Incluido a Machu Picchu</title>
	<meta name="description" content="Encuentra Tu Paquete Turístico Todo Incluido y Reserva Tu Próximo Viaje en Perú 2021/2022 Desde México ¡ Reservas Online GoTo Perú !"/>
@endsection
@section('content')

    @foreach($paquete_iti as $paquetes)
        <header class="header-detail h-75">
            <div class="overlay"></div>
            {{--            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
            {{--                <source src="{{asset('media/Secuencia 06.mp4')}}" type="video/mp4">--}}
            {{--            </video>--}}
            <div class="homepage-video">
                @foreach($paquetes->imagen_paquetes->take(1) as $imagen)
                    <img src="{{$imagen->nombre}}" alt="{{$paquetes->titulo}}" loading="lazy">
                @endforeach

            </div>
            <div class="container h-75">
                <div class="row d-flex h-75 text-center align-items-center">
                    <div class="col w-100 text-white">

                        <div class="row align-items-center">
                            <div class="col">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm-8">
                                        <div class="row justify-content-center">
                                            <div class="col-6 col-md-4 my-5 text-center">
                                                <h5 class="text-white font-weight-bold h1">Ventas</h5>
                                                <img class="w-100"
                                                     src="{{asset('images/logo-gotoperu-white.png')}}"
                                                     alt="logo gotoperu">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-sm col-md-5">
                                        <div class="text-center bg-white mb-3 text-dark rounded shadow py-3">
                                            <h1 class="font-weight-bold"><span class="text-g-green">Hola</span> {{ucwords(strtolower($inquire->nombre))}}</h1>
                                            <p class="h4">Mi nombre es <span class="text-g-yellow">{{$t_advisor->name}}</span>,</p>
                                            <p class="font-weight-bold">Soy tu asesor de viaje personal</p>
                                            <p class="mt-4 text-primary font-weight-bold">¡Empecemos a planificar su viaje ideal!</p>
                                            {{--<a href="#content-page">--}}
                                            {{--<i data-feather="chevron-down" class="d-block mx-auto" width="45" height="45" stroke-width="1"></i>--}}
                                            {{--</a>--}}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="position-absolute-bottom p-2">
                <div class="row justify-content-center">
                    <div class="col-auto text-center">
                        <a href="#title_section" class="mx-2">
                            <i data-feather="chevrons-down" class="text-white" stroke-width="1" height="50" width="50"></i>
                        </a>
                    </div>
                </div>
            </div>
        </header>


        <section class="bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="row pt-4">
                            <div class="col">
                                <h1 class="text-g-yellow font-weight-bold display-4">{{($paquetes->titulo)}}</h1>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                @php
                                    $fecha_i = date($inquire->fecha);
                                    $fecha_inquire = strtotime ( '+'.$paquetes->duracion - 1 .' day' , strtotime ( $fecha_i ) ) ;
                                    $fecha_inquire = date ( 'Y-m-j' , $fecha_inquire );
                                    $fecha_inquire = strftime("%d %B ", strtotime($fecha_inquire));
                                    $fecha_i = strftime("%d %B ", strtotime($fecha_i));
                                @endphp
                                <p class="h5 font-weight-normal"><b>Duration:</b> {{$paquetes->duracion}} days</p>
                                <p class="h5 font-weight-normal"><b>Arrival:</b> {{$fecha_i}}</p>
                                <p class="h5 font-weight-normal"><b>Departure:</b> {{$fecha_inquire}}</p>
                                <p class="h5 font-weight-normal"><b>Destinations:</b></p>
                                @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                    <a href="">
                                        <img src="{{$paquete_destino->destinos->imagen}}" alt="" width="50" height="50" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="{{ucwords(strtolower($paquete_destino->destinos->nombre))}}">
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="row mt-4" id="Itinerary">
                            <div class="col">
                                <div class="row" id="">
                                    <div class="col">
                                        <h2 class="text-danger font-weight-bold display-4 pt-3 pb-4"><strong>Itinerary</strong></h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        @php $day = 1; $sum = 0; @endphp
                                        @foreach($paquetes->paquete_itinerario as $itinerario)
                                            @php
                                                $fecha = date($inquire->fecha);
                                                $nuevafecha = strtotime ( '+'.$sum.' day' , strtotime ( $fecha ) ) ;
                                                $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
                                                $nuevafecha = strftime("%d %B ", strtotime($nuevafecha));
                                            @endphp
                                            <div class="row" id="section-{{$itinerario->itinerarios->id}}">
                                                <div class="col-12 col-md-12 col-lg-8">
                                                    <h5 class="text-g-dark font-weight-bold"><span class="badge badge-danger">{{$nuevafecha}}:</span> <strong>{{ucwords(strtolower($itinerario->itinerarios->titulo))}}</strong>
                                                    </h5>
                                                    @php echo $itinerario->itinerarios->resumen; @endphp
                                                </div>
                                                <div class="col-12 col-md-12 col-lg">
                                                    <div class="box15 float-right rounded">
                                                        @foreach($itinerario->itinerarios->itinerario_imagen->take(1) as $imagen)
                                                            <img src="{{$imagen->nombre}}" alt="" class="rounded">
                                                        @endforeach
{{--                                                        @foreach($imagen->where('iditinerario', $itinerario->itinerarios->id)->take(1) as $img)--}}
{{--                                                            <img src="{{asset('images/itinerario/'.$img->nombre.'')}}" alt="" class="rounded">--}}
{{--                                                        @endforeach--}}
                                                        <div class="box-content text-center">
                                                            <h3 class="title">View Gallery</h3>
                                                            <ul class="icon p-0">
                                                                <li><a href="#" data-toggle="modal" data-target="#modal-img-{{$itinerario->itinerarios->id}}"><i class="fas fa-camera"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal-img-{{$itinerario->itinerarios->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0 rounded">
                                                                    <div id="carouselExampleFade{{$itinerario->itinerarios->id}}" class="carousel slide carousel-fade" data-ride="carousel">
                                                                        <div class="carousel-inner">

                                                                            @php
                                                                                $k = 0;
                                                                            @endphp
                                                                            @foreach($itinerario->itinerarios->itinerario_imagen as $img)
                                                                                @if($k == 0)
                                                                                    @php $act = 'active'; @endphp
                                                                                @else
                                                                                    @php $act = ''; @endphp
                                                                                @endif

                                                                                <div class="carousel-item {{$act}}">
                                                                                    <img class="d-block w-100 rounded" src="{{$img->nombre}}" alt="First slide">
                                                                                </div>

                                                                                @php $k++; @endphp
                                                                            @endforeach
                                                                        </div>
                                                                        <a class="carousel-control-prev" href="#carouselExampleFade{{$itinerario->itinerarios->id}}" role="button" data-slide="prev">
                                                                            <i class="fas fa-angle-left text-white fa-2x"></i>
                                                                            <span class="sr-only">Previous</span>
                                                                        </a>
                                                                        <a class="carousel-control-next" href="#carouselExampleFade{{$itinerario->itinerarios->id}}" role="button" data-slide="next">
                                                                            <i class="fas fa-angle-right text-white fa-2x"></i>
                                                                            <span class="sr-only">Next</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @php $day++; $sum++; @endphp
                                        @endforeach
                                    </div>
                                    <div class="d-none d-sm-inline col-sm-6 d-md-none">
                                        <div class="sticky-top sticky-top-50 mt-5">
                                            <nav id="menu" class="navbar navbar-light nav-goto-side w-100">
                                                <nav class="nav nav-pills flex-column w-100">
                                                    {{--@foreach($paquetes->itinerario->sortBy('dia') as $itinerario)--}}
                                                    {{--<a class="nav-link active font-italic" href="#section-{{$itinerario->id}}"><span class="badge badge-secondary">Day {{$itinerario->dia}}:</span> <small>{{ucwords(strtolower($itinerario->titulo))}}</small></a>--}}
                                                    {{--@endforeach--}}
                                                </nav>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-lg">
                                        <h3 class="text-secondary h4"><strong>Included</strong></h3>
                                        @php echo $paquetes->incluye; @endphp

                                    </div>
                                    <div class="col-12 col-lg">
                                        <h3 class="text-secondary h4"><strong>Not Included</strong></h3>
                                        @php echo $paquetes->noincluye; @endphp
                                    </div>
                                </div>

                                <div class="row" id="Prices">
                                    <div class="col">
                                        {{--<h3 class="text-secondary h4"><strong>Hotels</strong></h3>--}}
                                        <h3 class="text-secondary pt-5 pb-3 display-4 font-weight-bold text-info"><strong>Prices Per Person <small class="text-primary font-weight-bold">($USD)</small></strong></h3>
                                        <div class="row">
                                            <div class="col mb-md-2">
                                                <div class="card border-secondary">
                                                    <p class="card-header bg-dark text-g-yellow">Based on doble / triple occupancy </p>
                                                    <div class="card-body p-0">
                                                        <table class="table m-0">
                                                            <thead class="title-header bg-light">
                                                            <tr>
                                                                <th>2 Stars</th>
                                                                <th>3 Stars</th>
                                                                <th>4 Stars</th>
                                                                <th>5 Stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                @foreach($paquetes->precio_paquetes->sortBy('estrellas') as $precio)
                                                                    @if($precio->precio_d > 0)
                                                                        <td>
                                                                            <sup>$</sup>{{$precio->precio_d}}
                                                                        </td>
                                                                    @else
                                                                        <td class="text-danger">
                                                                            Inquire
                                                                        </td>
                                                                    @endif
                                                                @endforeach

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col mb-md-2">
                                                <div class="card border-secondary">
                                                    <p class="card-header bg-secondary text-white">Based on single occupancy</p>
                                                    <div class="card-body p-0">
                                                        <table class="table m-0">
                                                            <thead class="title-header bg-light">
                                                            <tr>
                                                                <th>2 Stars</th>
                                                                <th>3 Stars</th>
                                                                <th>4 Stars</th>
                                                                <th>5 Stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                @foreach($paquetes->precio_paquetes->sortBy('estrellas') as $precio)
                                                                    @if($precio->precio_s > 0)
                                                                        <td>
                                                                            <sup>$</sup>{{$precio->precio_s}}
                                                                        </td>
                                                                    @else
                                                                        <td class="text-danger">
                                                                            Inquire
                                                                        </td>
                                                                    @endif
                                                                @endforeach

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row my-3">
                                            <div class="col">
                                                <div class="alert alert-success">
                                                    <small>*If you have a preferred hotel in mind feel free to share it with us as we work with most hotels in Peru.</small>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>


                                <div id="Hotels" class="pt-5">
                                    <div class="row">
                                        <div class="col">
                                            <h3 class="text-secondary display-4 font-weight-bold"><strong>Hotels</strong></h3>

                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                            <div class="col-12">
                                                <h5 class="text-danger font-weight-bold pt-2 m-0 font-weight-bold" id="{{$paquete_destino->destinos->id}}-hotel"><i class="fas fa-angle-right text-primary"></i> {{$paquete_destino->destinos->nombre}} HOTEL</h5>
                                                <div class="row p-2 pb-4">
                                                    @foreach($hoteles_destinos->where('iddestinos', $paquete_destino->destinos->id) as $hoteles_destino)
                                                        <div class="col-12 col-lg-4 d-flex my-3">
                                                            <div class="row">
                                                                <div class="col-auto d-none d-sm-block">
                                                                    <img src="{{$hoteles_destino->hotel->imagen}}" alt="" class=" rounded-circle" width="50" height="50">
                                                                </div>

                                                                <div class="col">
                                                                    <a href="{{$hoteles_destino->hotel->url}}" class="text-secondary font-weight-bold align-middle d-block"><i class="fas fa-h-square"></i> {{ucwords(strtolower($hoteles_destino->hotel->nombre))}}</a>
                                                                    @for($i=0; $i < $hoteles_destino->hotel->estrellas; $i++)
                                                                        <small><i class="fa fa-star text-g-yellow small"></i></small>
                                                                    @endfor
                                                                    <small class="d-block text-secondary mt-2"><i class="fa fa-map-marker-alt"></i> {{$hoteles_destino->hotel->direccion}}</small>
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

                                </div>

                                <div class="row py-3">
                                    <div class="col-12 mb-3 mb-lg-0 col-lg d-flex">
                                        @foreach($paquetes->paquetes_categoria as $categoria)
                                            <div class="card p-3 w-100">
                                                <h5 class="text-secondary font-weight-bold"><i class="fas fa-angle-right"></i> Category: <span class="text-primary">{{ucwords(strtolower($categoria->categoria->nombre))}}</span></h5>
                                                <p>{{$categoria->categoria->descripcion}}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-12 mb-3 mb-lg-0 col-lg d-flex">
                                        <div class="card p-3 w-100">
                                            @foreach($dificultad->where('idpaquetes', $paquetes->id) as $dificultades)
                                                <h5 class="text-secondary font-weight-bold"><i class="fas fa-angle-right"></i> Physical demand: <span class="text-primary text-capitalize">{{$dificultades->dificultad->nombre}}</span></h5>
                                                <p>{{$dificultades->dificultad->descripcion}}</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="sticky-top sticky-top-50">
                        <div class="card bg-light mt-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img src="https://gotoperu-mx.s3-us-west-1.amazonaws.com/team/yovana.jpg" alt="" width="80" height="80" class="rounded-circle">
                                    </div>
                                    <div class="col text-truncate">
                                        <h4>{{$t_advisor->name}}</h4>
                                        (202) 996-3000
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col text-center">
                                        <a href="https://m.me/GOTOPERUcom/" class="btn btn-primary" target="_blank"><i class="fab fa-facebook-messenger"></i> Messenger</a>
                                        <a href="https://api.whatsapp.com/send?phone=19294807000" class="btn btn-success" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                                        <a href="" class="btn btn-dark mt-2 w-50"><img src="https://apps.google.com/static/img/meet-logo.svg" alt="" class="w-100"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-sm col-md">
                                <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/OwzqiL4DC6Y">
                                    <div class="position-relative">
                                        <img src="{{asset('images/video-testimonial/1.jpg')}}" alt="" class="w-100 shadow-sm rounded">
                                        <div class="position-absolute-bottom text-white p-3 icon-play">
                                            <i class="fas fa-play fa-2x"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@stop
@push("scripts")
    <script>
        $(document).ready(function(){
            $('.venobox').venobox();
        });
    </script>
@endpush
