@extends('layouts.page.app')
@section('content')
    @foreach($destino as $destinos)
    <header class="header-detail">
        <div class="overlay"></div>
        {{--            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
        {{--                <source src="{{asset('media/Secuencia 06.mp4')}}" type="video/mp4">--}}
        {{--            </video>--}}
        <div class="homepage-video">
            @foreach($destinos->destino_imagen->take(1) as $imagen)
            <img src="{{$imagen->nombre}}" alt="{{$destinos->nombre}}" loading="lazy">
            @endforeach

        </div>
        <div class="container h-100">
            <div class="row d-flex h-100 text-center align-items-center">
                <div class="col w-100 text-white mt-5">
                    <h1 class="font-weight-lighter h2 mt-5">DESTINOS EN {{strtoupper($destinos->nombre)}}</h1>
                    <div>
                        <div class="tl-1"></div>
                        <div class="tl-2"><img src="{{asset('images/logo-andes-ave-white.png')}}" alt="" class="w-100" loading="lazy"></div>
                        <div class="tl-3"></div>
                    </div>
                    {{--                    <div class="mt-4">--}}
                    {{--                        <a href="" class="text-white">Detalle</a> |--}}
                    {{--                        <a href="" class="text-white">Itinerario</a> |--}}
                    {{--                        <a href="" class="text-white">Precios</a> |--}}
                    {{--                        <a href="" class="text-g-yellow font-weight-bold">Consulte Ahora</a>--}}
                    {{--                    </div>--}}
                    {{--                        <a href="#Inquire" class="btn btn-outline-g-yellow btn-lg h2 font-weight-normal mt-3">Diseña tu Viaje</a>--}}
                    {{--                        <p class="lead mb-0">With HTML5 Video and Bootstrap 4</p>--}}
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

    <section class="bg-white py-5" id="title_section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-8 col-xl-9">
                    <div class="row" id="tours">
                        <div class="col-12 mb-4">
                            {{--<h3 class="text-g-yellow font-weight-bold">Tours</h3>--}}
{{--                            <h1 class="text-secondary font-weight-bold">Cusco Tours</h1>--}}
                            {{$destinos->resumen}}
                            <div class="alert alert-primary rounded-0 mt-4 text-center" role="alert">
                                <h5 class="font-weight-normal">Operadores Locales en Perú: Los mejores guias de la región, encantadores hoteles, excursiones únicas, y amistosos representantes.
                                    #gotoperu #TuconexionconPeru</h5>
                            </div>
                        </div>

                        @foreach($paquetes_de as $paquetes_des)
                            @if(isset($paquetes_des->destinos))
                                @foreach($paquete->where('id',$paquetes_des->idpaquetes)->sortBy("duracion") as $paquetes)

                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex mb-3">
                                        <div class="card w-100 shadow-sm">
                                            <div class="header-img-packages position-relative">
                                                <a href="{{route('detail_path', $paquetes->url)}}"><img class="card-img-top" src="{{$paquetes->imagen}}" alt="" loading="lazy"></a>
                                                <div class="position-absolute-bottom bg-rgba-dark-3 px-3 py-2">
                                                    <h5 class="text-white m-0">{{$paquetes->titulo}}</h5>
                                                    <small class="text-white">
                                                    @php
                                                        $i = 1;
                                                        $num_des = count($paquete_destinos->where('idpaquetes',$paquetes->id));
                                                    @endphp
                                                    @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                                        {{ucwords(strtolower($paquete_destino->destinos->nombre))}}@if($i < $num_des),@else.@endif
                                                        @php $i++; @endphp
                                                    @endforeach
                                                    </small>
                                                </div>
                                            </div>
                                            <!--            <div class="card-body">-->

                                            <!--                <span class="font-weight-normal text-secondary">-->
                                            <!--                    <i class="fa fa-map-marker-alt"></i>-->

                                            <!--                </span>-->
                                            <!--            </div>-->
                                            <div class="card-footer bg-white">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <p class="font-weight-bold h5 m-0">{{$paquetes->duracion}} Días</p>
                                                    </div>
                                                    <div class="col-auto">
                                                        @foreach($paquetes->precio_paquetes as $precio)
                                                            @if($precio->estrellas == 2)
                                                                @if($precio->precio_d > 0)
                                                                    {{--                                                                <p class="text-info font-weight-bold m-0 h5"><small><sup>form $</sup></small>{{$precio->precio_d}}<small>USD</small></p>--}}
                                                                    <p class="font-weight-bold text-primary h5 m-0"><sup class="small"><small>desde</small></sup> ${{$precio->precio_d}}<small>USD</small></p>
                                                                @else
                                                                    <span class="text-danger">Consulte</span>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>

{{--                    <div class="row pt-4" id="location">--}}
{{--                        <div class="col-12">--}}
{{--                            <h3 class="text-g-yellow font-weight-bold">Localizacion </h3>--}}
{{--                        </div>--}}
{{--                        <div class="col-12">--}}
{{--                            @foreach($cusco->results as $cuscos)--}}
{{--                                @foreach($cuscos->geometry->location as  $cusco2)--}}
{{--                                    @php $cusco3[] = $cusco2; @endphp--}}
{{--                                @endforeach--}}
{{--                            @endforeach--}}
{{--                            <div id="map"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                        <div class="row pt-4" id="historia">--}}
{{--                            <div class="col-12">--}}
{{--                                <h3 class="font-weight-bold">Historia</h3>--}}
{{--                                <div class="line-subtitle"></div>--}}
{{--                            </div>--}}
{{--                            <div class="col-12">--}}
{{--                                {!! $destinos->descripcion !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="row pt-4" id="maps">
                            <div class="col-12">
                                <h3 class="font-weight-bold">Maps</h3>
                                <div class="line-subtitle"></div>
                            </div>
                            <div class="col-12">

                                @foreach($ubicacion->results as $ubicacions)
                                    @foreach($ubicacions->geometry->location as  $ubicacion2)
                                        @php $ubicacion3[] = $ubicacion2; @endphp
                                    @endforeach
                                @endforeach


                                <div id="map"></div>

                            </div>
                        </div>

{{--                    <div class="row pt-5" id="hotels">--}}

{{--                        <div class="col-12">--}}
{{--                            <h3 class="font-weight-bold">Hoteles</h3>--}}
{{--                            <div class="line-subtitle"></div>--}}
{{--                        </div>--}}
{{--                            <div class="col-6 d-flex my-3">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-auto d-none d-sm-block">--}}
{{--                                        <img src="" alt="hotel cusco" class=" rounded-circle" width="50" height="50">--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <a href="#" class="h5 align-middle">Cusco</a>--}}

{{--                                            <small><i class="fa fa-star text-g-yellow"></i></small>--}}

{{--                                        <small class="d-block text-secondary"><i class="fa fa-map-marker-alt"></i> Av. Cultura</small>--}}

{{--                                        <p class="pt-2"><b>Servicios:</b>--}}

{{--                                                <i class="fa fa-check text-secondary"></i> Wifi--}}

{{--                                        </p>--}}
{{--                                        --}}{{--                                                        <a href="{{$hoteles_destino->hotel->url}}" class="btn btn-outline-secondary" target="_blank">{{$hoteles_destino->hotel->nombre}}</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                --}}{{--<hr>--}}
{{--                            </div>--}}

{{--                    </div>--}}

                    <div class="row pt-5" id="clima">

                        <div class="col-12">
                            <h3 class="font-weight-bold">Clima</h3>
                            <div class="line-subtitle"></div>
                        </div>
                        <div class="col-12">
                            <a class="weatherwidget-io" href="https://forecast7.com/en/n13d53n71d97/cusco/?unit=us" data-label_1="CUSCO" data-label_2="WEATHER" data-theme="original" >Cusco</a>
                        </div>

                    </div>

                    <div class="row" id="photos">

                    </div>

                </div>
                <div class="col-12 col-sm-5 col-md-4 col-xl-3 d-none d-sm-block">
                    <div class="sticky-top">
                        <nav id="navbar-scroll" class="navbar navbar-light nav-goto-side w-100">
                            <nav class="nav nav-pills flex-column w-100">
                                <a class="nav-link active text-capitalize" href="#tours">Cusco Tours</a>
                                <a class="nav-link" href="#maps">Localizacion</a>
                                {{--                                <a class="nav-link {{$h_resumen}}" href="#history">History</a>--}}
                                {{--                                <a class="nav-link {{$h_resumen}}" href="#geography">Geography</a>--}}
{{--                                <a class="nav-link" href="#hotels">Hoteles</a>--}}
                                <a class="nav-link" href="#clima">Clima</a>
                                {{--<a class="nav-link" href="#photos">Photos</a>--}}
                            </nav>
                        </nav>

{{--                        <div clpaquete_p.titul--}}

                        <div>
                            <div class="tl-1"></div>
                            <div class="tl-2"><img src="{{asset('images/logo-ave-grey.png')}}" alt="" class="w-100" loading="lazy"></div>
                            <div class="tl-3"></div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <ul class="list-group list-group-flush">
                                    @foreach($destinos_all as $destinos_alls)
                                    <a href="{{$destinos_alls->url}}" class="list-group-item font-weight-bold text-secondary">
                                        <img src="{{$destinos_alls->imagen}}" alt="" width="40" height="40" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="{{$destinos_alls->nombre}}" loading="lazy">
                                        <span class="pl-3">{{$destinos_alls->nombre}}</span>
                                    </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

    <section class="mb-5 d-none" id="title_section">
        <div class="container">
            <div class="row no-gutters align-items-center align-items-resumen">
                <div class="col-6">
                    <div class="px-5" id="box-resumen">
                        {{--                        <div class="exp-unica">--}}
                        {{--                            <div class="buton">--}}
                        {{--                                <div class="arrow">--}}
                        {{--                                    <span class="icon-estrella"></span>--}}
                        {{--                                </div>--}}
                        {{--                                <span>hola</span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <h4>MACHUPICCHU EXPRESS</h4>
                        <span class="font-weight-bold text-danger"><sup>desde</sup>$450usd</span>
                        <div class="line-subtitle"></div>
                        <div class="row mt-3 justify-content-around">
                            <div class="col-auto text-center">
                                <a href="" class="text-dark">
                                    <img src="{{asset('images/destinations/colca.jpg')}}" alt="" width="50" height="50" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="lima" loading="lazy">
                                    <small class="d-block font-weight-bold">Lima</small>
                                </a>
                            </div>
                            <div class="col-auto text-center">
                                <a href="" class="text-dark">
                                    <img src="{{asset('images/destinations/titicaca.jpg')}}" alt="" width="50" height="50" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="lima" loading="lazy">
                                    <small class="d-block font-weight-bold">Cusco</small>
                                </a>
                            </div>
                            <div class="col-auto text-center">
                                <a href="" class="text-dark">
                                    <img src="{{asset('images/destinations/machu-picchu.jpg')}}" alt="" width="50" height="50" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="lima" loading="lazy">
                                    <small class="d-block font-weight-bold">Cusco</small>
                                </a>
                            </div>
                            <div class="col-auto text-center">
                                <a href="" class="text-dark">
                                    <img src="{{asset('images/destinations/colca.jpg')}}" alt="" width="50" height="50" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="lima">
                                    <small class="d-block font-weight-bold">Machu picchu</small>
                                </a>
                            </div>
                        </div>
                        <div class="row mt-4">
{{--                            <div class="col">--}}
{{--                                5 días desde <sup>$</sup><span class="h2 text-danger">500</span><small>USD</small>--}}
{{--                            </div>--}}
                            <div class="col text-center">
                                <a href="{{route('detail_path', 'hola')}}" class="btn btn-g-yellow text-white rounded-0" onclick="view_itinerary()">DETALLE DEL PAQUETE</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="swiper-container swiper-container-gallery position-relative">
                        <div class="swiper-wrapper">
                            <a class="venobox swiper-slide" data-gall="myGallery" href="{{asset('images/itinerary/15681356773571.2.jpg')}}">
                                <img src="{{asset('images/itinerary/15681356773571.2.jpg')}}" class="w-100" loading="lazy">
                            </a>
                            <a class="venobox swiper-slide" data-gall="myGallery" href="{{asset('images/itinerary/1571243284484Humantay lake.png')}}"><img src="{{asset('images/itinerary/1571243284484Humantay lake.png')}}" class="w-100" loading="lazy"></a>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <div class="position-absolute-top text-danger bg-rgba-dark-3 p-2 text-center">
                            <h5 class="text-white font-weight-bold">15 Days / 14 Nights</h5>
{{--                            <span class="badge badge-danger">Classic</span>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutters align-items-center align-items-resumen">
                <div class="col-6">
                    <div class="swiper-container swiper-container-gallery">
                        <div class="swiper-wrapper">

                            <a class="venobox swiper-slide" data-gall="myGallery" href="{{asset('images/itinerary/1571243284484Humantay lake.png')}}"><img src="{{asset('images/itinerary/1571243284484Humantay lake.png')}}" class="w-100" loading="lazy"></a>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="p-5" id="box-resumen">
                        <h4>Cusco</h4>
                        <div class="line-subtitle"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At blanditiis consequuntur dicta fugit illo in, inventore ipsum iusto officia quasi quo quod, similique tempore temporibus ullam voluptas voluptates, voluptatibus voluptatum.</p>
                        <div class="row mt-4">
                            <div class="col">
                                <button type="button" class="btn btn-link p-0 text-secondary float-left font-weight-lighter" onclick="view_itinerary()">SABER MÁS DE LIMA</button>
                                <a href="" class="btn btn-g-green text-white rounded-0 float-right" onclick="view_itinerary()">VER PAQUETES</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    {{--        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">--}}
    {{--            <h4 id="list-item-1">Item 1</h4>--}}
    {{--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur error eveniet ipsum perferendis quam quos saepe sit soluta! Explicabo facere molestiae quod recusandae voluptatem. Ad assumenda debitis nam natus nihil?</p>--}}
    {{--            <h4 id="list-item-2">Item 2</h4>--}}
    {{--            <p>...</p>--}}
    {{--            <h4 id="list-item-3">Item 3</h4>--}}
    {{--            <p>...</p>--}}
    {{--            <h4 id="list-item-4">Item 4</h4>--}}
    {{--            <p>...</p>--}}
    {{--            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, aliquam architecto corporis dicta error facilis ipsam magni, mollitia necessitatibus odio quasi quo, repudiandae saepe sapiente sed. Cum qui sed veritatis!--}}
    {{--        </div>--}}
    @endforeach
    <section id="consulte" class="pt-5">
        <div class="container-fluid">
            <div class="row justify-content-center my-4">
                <div class="col-6 col-md-2">
                    <img src="{{asset('images/logo-gotoperu-black.png')}}" alt="" class="w-100" loading="lazy">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-7">
                    <h5 class="font-weight-bold text-center">CONSULTA DE VIAJES</h5>
                    <form-inquire></form-inquire>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDf1RN8KKGNdS-iEarIgXpaqa-khw7EmZI&callback=initMap">
    </script>

    <script>
        var swiper = new Swiper('.swiper-container-gallery', {
            spaceBetween: 30,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
        });

        var swiper = new Swiper('.swiper-container-detail', {
            direction: 'vertical',
            slidesPerView: 'auto',
            freeMode: true,
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            mousewheel: true,
        });

        function view_itinerary() {
            $('#box-resumen').addClass('d-none');
            $('#box-detail').removeClass('invisible');
            $('.align-items-resumen').removeClass('align-items-center');
            // $('#box-resumen').addClass('d-none');
            // $('#box-resumen').removeClass('d-block');
            // $('#box-detail').addClass('d-block');
            // $('#box-detail').removeClass('d-none');
            // $('.box-detail').show();
            view_itinerary_resumen
        }

        function view_itinerary_resumen() {
            $('#box-resumen').removeClass('d-none');
            $('#box-detail').addClass('invisible');
            $('.align-items-resumen').addClass('align-items-center');
        }


        function initMap() {
            var lat1 = parseFloat("{{$ubicacion3[0]}}");
            var lng1 = parseFloat("{{$ubicacion3[1]}}");

            var uluru = {lat: lat1, lng: lng1};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 6,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }

        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>
@endpush
