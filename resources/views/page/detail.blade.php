@extends('layouts.page.app')
    @section('content')
        @foreach($paquete as $paquetes)
        <header class="header-detail">
            <div class="overlay"></div>
            {{--            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
            {{--                <source src="{{asset('media/Secuencia 06.mp4')}}" type="video/mp4">--}}
            {{--            </video>--}}
            <div class="homepage-video">
                @foreach($paquetes->imagen_paquetes->take(1) as $imagen)
                    <img src="{{$imagen->nombre}}" alt="{{$paquetes->titulo}}" loading="lazy">
                @endforeach

            </div>
            <div class="container h-100">
                <div class="row d-flex h-100 text-center align-items-center">
                    <div class="col w-100 text-white mt-5">
                        <h1 class="font-weight-lighter h2 mt-5">{{$paquetes->titulo}}</h1>
                        <div>
                            <div class="tl-1"></div>
                            <div class="tl-2"><img src="{{asset('images/logo-andes-ave-white.png')}}" alt="" class="w-100" loading="lazy"></div>
                            <div class="tl-3"></div>
                        </div>
                        <div class="mt-4">
                            <a href="#detalle" class="text-white">Detalle</a> |
                            <a href="#itinerario" class="text-white">Itinerario</a> |
                            <a href="#precios" class="text-white">Precios</a> |
                            <a href="#consulte" class="text-g-yellow font-weight-bold">Consulte Ahora</a>
                        </div>
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

        <section>
            <div class="nav-fixed">
                <div id="navbar-scroll" class="list-group list-group-detail sticky-top">
                    <a class="list-group-item list-group-item-detail list-group-item-action" href="#detalle" data-toggle="tooltip" data-placement="right" title="Detalle"><i data-feather="book-open" stroke-width="1"></i></a>
                    <a class="list-group-item list-group-item-detail list-group-item-action" href="#incluye" data-toggle="tooltip" data-placement="right" title="Incluye"><i data-feather="check" stroke-width="1"></i></a>
                    <a class="list-group-item list-group-item-detail list-group-item-action" href="#itinerario" data-toggle="tooltip" data-placement="right" title="Itinerario"><i data-feather="list" stroke-width="1"></i></a>
                    <a class="list-group-item list-group-item-detail list-group-item-action" href="#destinos" data-toggle="tooltip" data-placement="right" title="Destinos"><i data-feather="map" stroke-width="1"></i></a>
                    <a class="list-group-item list-group-item-detail list-group-item-action" href="#precios" data-toggle="tooltip" data-placement="right" title="Precios"><i data-feather="dollar-sign" stroke-width="1"></i></a>
                    <a class="list-group-item list-group-item-detail list-group-item-action" href="#opcional" data-toggle="tooltip" data-placement="right" title="Opcional"><i data-feather="file-plus" stroke-width="1"></i></a>
                    <a class="list-group-item list-group-item-detail list-group-item-action bg-g-yellow" href="#consulte" data-toggle="tooltip" data-placement="right" title="Consulte Ahora"><i data-feather="edit-2" stroke-width="1"></i></a>
                </div>
            </div>
        </section>

        <section class="my-5" id="title_section">
            <div id="detalle">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <div class="col">
                                    <p class="m-0">{!! $paquetes->descripcion !!}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    @foreach($paquetes->paquetes_categoria as $categoria)
                                    <h6 class="font-weight-bold text-secondary mt-4"><span class="text-g-yellow">Categoría</span>: <mark>{{ucwords(strtolower($categoria->categoria->nombre))}}</mark></h6>
                                    {!! $categoria->categoria->descripcion !!}
                                    @endforeach

                                        @foreach($dificultad->where('idpaquetes', $paquetes->id) as $dificultades)
                                    <h6 class="font-weight-bold text-secondary mt-4"><span class="text-g-yellow">Demanda física</span>: <mark>{{$dificultades->dificultad->nombre}}</mark></h6>
                                    <p>{!! $dificultades->dificultad->descripcion !!}</p>
                                        @endforeach


                                </div>
                            </div>

                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card">
                                <div class="p-3">

                                    <b class="h1 text-secondary font-weight-bold">{{$paquetes->duracion}} días</b>
                                    <div class="text-center mb-2">
                                        @foreach($paquetes->precio_paquetes->where('estrellas', 2)->sortBy('estrellas') as $precio)
                                            @if($precio->precio_d > 0)
                                                <small class="text-secondary">Desde</small>
                                                <b class="h1 text-center font-weight-bold text-danger"><sup>$</sup>{{number_format($precio->precio_d, 0, ',', '.')}}</b>
                                                <small class="small text-secondary">usd</small>
                                            @else
                                                <span class="text-danger">
                                                    Inquire
                                                </span>
                                            @endif
                                        @endforeach
                                    </div>
                                    <p class="m-0 text-g-yellow"><b>Código: {{$paquetes->codigo}}</b></p>
                                </div>
                                <a  href="#consulte" class="btn btn-dark font-weight-bold">
                                    Consulte Ahora
                                </a>
                            </div>

                            <div class="mt-5 bg-white p-3 text-center rounded shadow-sm">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3">
                                        <img src="{{asset('images/icons/whatsapp-i.png')}}" alt="" class="w-100" loading="lazy">
                                    </div>
                                    <div class="col">
                                        <h6 class="font-weight-bold text-secondary">Consulte ahora por Whatsapp</h6>
                                        <a href="https://api.whatsapp.com/send?phone=51980565849" target="_blank" class="text-secondary h4 font-weight-bold stretched-link">+51 980 565 849</a>
                                    </div>
                                </div>
{{--                                <h5 class="font-weight-bold text-secondary">Tour highligh</h5>--}}
{{--                                <ul class="list-unstyled">--}}
{{--                                    <li><i class="fas fa-chevron-right"></i> Arequipa</li>--}}
{{--                                    <li><i class="fas fa-chevron-right"></i> Cusco</li>--}}
{{--                                    <li><i class="fas fa-chevron-right"></i> Machu picchu</li>--}}
{{--                                </ul>--}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="text-center py-5 bg-white">--}}
{{--                <div class="tl-1"></div>--}}
{{--                <div class="tl-2"><img src="{{asset('images/logo-ave-grey.png')}}" alt="" class="w-100" loading="lazy"></div>--}}
{{--                <div class="tl-3"></div>--}}
{{--            </div>--}}
            <div id="incluye">
                <div class="position-relative py-5 mt-4">
                    <div class="offer-banner">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <h2>{{$paquetes->titulo}}</h2>
                                </div>
{{--                                <div class="col-4 text-center">--}}
{{--                                    <img width="110" height="75" src="https://backpacktraveler.mikado-themes.com/wp-content/uploads/2018/09/beach-category.png" class="attachment-full size-full" alt="o" loading="lazy"/>--}}
{{--                                    <h4>Tours</h4>--}}
{{--                                    <p class="mkdf-pcli-count">4 destinations</p>--}}
{{--                                </div>--}}
{{--                                <div class="col-4 text-center">--}}
{{--                                    <img width="110" height="75" src="https://backpacktraveler.mikado-themes.com/wp-content/uploads/2018/09/dog-category.png" class="attachment-full size-full" alt="o" loading="lazy" />--}}
{{--                                    <h4>Beaches</h4>--}}
{{--                                    <p class="mkdf-pcli-count">4 destinations</p>--}}
{{--                                </div>--}}

{{--                                <div class="col-4 text-center">--}}
{{--                                    <img width="110" height="75" src="https://backpacktraveler.mikado-themes.com/wp-content/uploads/2018/09/restorant-category.png" class="attachment-full size-full" alt="o" loading="lazy"/>--}}
{{--                                    <h4>Restaurants</h4>--}}
{{--                                    <p class="mkdf-pcli-count">4 destinations</p>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="text-center py-5 bg-white">--}}
{{--                <div class="tl-1"></div>--}}
{{--                <div class="tl-2"><img src="{{asset('images/logo-ave-grey.png')}}" alt="" class="w-100" loading="lazy"></div>--}}
{{--                <div class="tl-3"></div>--}}
{{--            </div>--}}

            <div id="itinerario">
                <div class="container-fluid px-0 d-none d-md-block">
                    @php $day = 1; @endphp
                    @foreach($paquetes->paquete_itinerario as $itinerario)
                        @if( $day%2 == 0)
                            <div class="row no-gutters align-items-center align-items-resumen" id="align-items-resumen-{{$itinerario->itinerarios->id}}">

                                <div class="col-12 col-md-6">
                                    <div class="swiper-container swiper-container-gallery">
                                        <div class="swiper-wrapper">
                                            @foreach($itinerario->itinerarios->itinerario_imagen as $imagen)
                                                <a class="venobox swiper-slide" data-gall="myGallery" href="{{$imagen->nombre}}"><img src="{{$imagen->nombre}}" class="w-100" loading="lazy"></a>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="p-5" id="box-resumen-{{$itinerario->itinerarios->id}}">
                                        <h4>Dia {{$day}}</h4>
                                        <div class="line-subtitle"></div>
                                        <p><mark class="font-weight-bold">{{$itinerario->itinerarios->titulo}}.</mark></p>
                                        {!! $itinerario->itinerarios->resumen !!}
                                        <button type="button" class="btn btn-link p-0 text-secondary font-weight-lighter" onclick="view_itinerary({{$itinerario->itinerarios->id}})">LEER MÁS</button>
                                    </div>
                                    <div class="invisible position-absolute-top bg-white" id="box-detail-{{$itinerario->itinerarios->id}}">
                                        <div class="swiper-container swiper-container-detail">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <h4>Dia {{$day}} <mark class="font-weight-bold">{{$itinerario->itinerarios->titulo}}.</mark></h4>
                                                    <div class="line-subtitle"></div>
                                                    {!! $itinerario->itinerarios->descripcion !!}
                                                </div>
                                            </div>
                                            <!-- Add Scroll Bar -->
                                            <div class="swiper-scrollbar"></div>
                                            <div class="position-absolute-bottom text-center m-3">
                                                <button type="button" class="btn btn-sm btn-dark shadow-sm" onclick="view_itinerary_resumen({{$itinerario->itinerarios->id}})">Ver Resumen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @else
                            <div class="row no-gutters align-items-center align-items-resumen" id="align-items-resumen-{{$itinerario->itinerarios->id}}">
                                <div class="col-12 col-md-6">
                                    <div class="p-5" id="box-resumen-{{$itinerario->itinerarios->id}}">
                                        <h4>Dia {{$day}}</h4>
                                        <div class="line-subtitle"></div>
                                        <p><mark class="font-weight-bold">{{$itinerario->itinerarios->titulo}}.</mark></p>
                                        {!! $itinerario->itinerarios->resumen !!}
                                        <button type="button" class="btn btn-link p-0 text-secondary font-weight-lighter" onclick="view_itinerary({{$itinerario->itinerarios->id}})">LEER MÁS</button>
                                    </div>
                                    <div class="invisible position-absolute-top bg-white" id="box-detail-{{$itinerario->itinerarios->id}}">
                                        <div class="swiper-container swiper-container-detail">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <h4>Dia {{$day}} <mark class="font-weight-bold">{{$itinerario->itinerarios->titulo}}.</mark></h4>
                                                    <div class="line-subtitle"></div>
                                                    {!! $itinerario->itinerarios->descripcion !!}
                                                </div>
                                            </div>
                                            <!-- Add Scroll Bar -->
                                            <div class="swiper-scrollbar"></div>
                                            <div class="position-absolute-bottom text-center m-3">
                                                <button type="button" class="btn btn-sm btn-dark shadow-sm" onclick="view_itinerary_resumen({{$itinerario->itinerarios->id}})">Ver Resumen</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="swiper-container swiper-container-gallery">
                                        <div class="swiper-wrapper">
                                            @foreach($itinerario->itinerarios->itinerario_imagen as $imagen)
                                                <a class="venobox swiper-slide" data-gall="myGallery" href="{{$imagen->nombre}}"><img src="{{$imagen->nombre}}" class="w-100" loading="lazy"></a>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>



                            </div>
                        @endif
                        @php $day++; @endphp
                    @endforeach


                </div>
                <div class="container-fluid px-0 d-md-none">
                    @php $day = 1; @endphp
                    @foreach($paquetes->paquete_itinerario as $itinerario)

                            <div class="row no-gutters align-items-center align-items-resumen" id="align-items-resumen-{{$itinerario->itinerarios->id}}">

                                <div class="col-12 col-md-6">
                                    <div class="p-5" id="box-resumen-{{$itinerario->itinerarios->id}}">
                                        <h4>Dia {{$day}}</h4>
                                        <div class="line-subtitle"></div>
                                        <p><mark class="font-weight-bold">{{$itinerario->itinerarios->titulo}}.</mark></p>
                                        {!! $itinerario->itinerarios->resumen !!}
{{--                                        <button type="button" class="btn btn-link p-0 text-secondary font-weight-lighter" onclick="view_itinerary({{$itinerario->itinerarios->id}})">LEER MÁS</button>--}}
                                    </div>

                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="swiper-container swiper-container-gallery">
                                        <div class="swiper-wrapper">
                                            @foreach($itinerario->itinerarios->itinerario_imagen as $imagen)
                                                <a class="venobox swiper-slide" data-gall="myGallery" href="{{$imagen->nombre}}"><img src="{{$imagen->nombre}}" class="w-100" loading="lazy"></a>
                                            @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        @php $day++; @endphp
                    @endforeach


                </div>
            </div>

            <div id="destinos">
                <div id="incluye">
                    <div class="position-relative py-5">
                        <div class="offer-banner">
                            <div class="container">
                                <div class="row mt-3 justify-content-around">

                                    @foreach($paquete_destinos->where('idpaquetes',$paquetes->id) as $paquete_destino)
                                        <div class="col-auto text-center">
                                            <a href="{{route('destination_show_path', $paquete_destino->destinos->url)}}" class="text-dark">
                                                <img src="{{$paquete_destino->destinos->imagen}}" alt="" width="80" height="80" class="rounded-circle" data-toggle="tooltip" data-placement="top" title="{{ucwords(strtolower($paquete_destino->destinos->nombre))}}" loading="lazy">
                                                <small class="d-block font-weight-bold">{{ucwords(strtolower($paquete_destino->destinos->nombre))}}</small>
                                            </a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="precios">
                <div class="container">
                    <div class="row mt-5">
                        <div class="col">

                            <h6 class="font-weight-bold text-secondary mt-4"><span class="text-g-yellow">Precios:</span></h6>
                            <p>Los precios estan basados en doble acomodación.</p>
                            <div class="table-responsive">
                            <table class="table table-borderless border">
                                <thead class="thead-dark">
                                    <tr class="text-center">
                                        <th scope="col">2 Estrellas</th>
                                        <th scope="col">3 Estrellas</th>
                                        <th scope="col">4 Estrellas</th>
                                        <th scope="col">5 Estrellas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        @foreach($paquetes->precio_paquetes->sortBy('estrellas') as $precio)
                                            @if($precio->precio_d > 0)
                                                <td>$ {{number_format($precio->precio_d, 0, ',', '.')}} <small>usd</small></td>
                                            @else
                                                <td class="font-weight-bold text-danger">Inquire</td>
                                            @endif
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="alert alert-primary">
                                <p class="m-0">*Si tiene algún hotel en especifico con gusto lo prepararemos una cotización personalizada.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="opcional">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6 class="font-weight-bold text-secondary mt-4"><span class="text-g-yellow">Opcional</span></h6>
                            <p>Disfrute de lo mas importante de Cusco con los expertos, en cantidad de dias que se adaptan a su itinerario. Los esperamos!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="consulte">
            <div class="container-fluid">
                <div class="row justify-content-center my-4">
                    <div class="col-6 col-md-2">
                        <img src="{{asset('images/logo-gotoperu-black.png')}}" alt="" class="w-100" loading="lazy">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-7">
                        <h5 class="font-weight-bold text-center">CONSULTA DE VIAJES</h5>
                        <form-inquire-detail :paquetes-id="{{$paquetes->id}}"></form-inquire-detail>
                    </div>
                </div>
            </div>
        </section>

        @endforeach
    @endsection

@push('scripts')
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

        function view_itinerary($id) {
            $('#box-resumen-'+$id).addClass('d-none');
            $('#box-detail-'+$id).removeClass('invisible');
            $('#align-items-resumen-'+$id).removeClass('align-items-center');
            // $('#box-resumen').addClass('d-none');
            // $('#box-resumen').removeClass('d-block');
            // $('#box-detail').addClass('d-block');
            // $('#box-detail').removeClass('d-none');
            // $('.box-detail').show();
        }

        function view_itinerary_resumen($id) {
            $('#box-resumen-'+$id).removeClass('d-none');
            $('#box-detail-'+$id).addClass('invisible');
            $('#align-items-resumen-'+$id).addClass('align-items-center');
        }

    </script>
@endpush
