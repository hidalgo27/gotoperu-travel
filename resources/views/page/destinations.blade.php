@extends('layouts.page.app')
@section('seo')
    <title>Viajes a Perú 2021 y Tours Todo Incluido a Machu Picchu</title>
	<meta name="description" content="Encuentra Tu Paquete Turístico Todo Incluido y Reserva Tu Próximo Viaje en Perú 2021/2022 Desde México ¡ Reservas Online GoTo Perú !"/>
@endsection
@section('content')
    <header class="header-detail">
        <div class="overlay"></div>
        {{--            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
        {{--                <source src="{{asset('media/Secuencia 06.mp4')}}" type="video/mp4">--}}
        {{--            </video>--}}
        <div class="homepage-video">
            <img src="{{asset('images/packages/slider/AV1000-2.jpg')}}" alt="" loading="lazy">

        </div>
        <div class="container h-100">
            <div class="row d-flex h-100 text-center align-items-center">
                <div class="col w-100 text-white mt-5">
                    <h1 class="font-weight-lighter h2 mt-5">LOS MEJORES DESTINOS EN PERÚ</h1>
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

    <section class="py-4" id="title_section">
        <div class="container">
            <div class="row pt-4">
                <div class="col">
                    <h2 class="font-weight-bold display-4 text-g-yellow text-center">Destinos en <span class="text-g-green">Perú</span></h2>

                    <p class="lead text-center">Le ofrecemos una experiencia de viaje auténtica y mágica en Perú, lo invitamos a explorar los numerosos paquetes de viaje totalmente personalizados que tenemos y que se adaptan a cada presupuesto. Permítanos planear su inolvidable viaje a nuestro majestuoso Machu Picchu y al resto de nuestra patria... ¡Perú!</p>
                    <div class="alert alert-primary text-center rounded-0 m-0" role="alert">
                        <h4>Trabajaremos de acuerdo con su agenda y sus intereses de viaje para construir juntos los planes de viaje más exclusivos.</h4>
                    </div>



                </div>
            </div>
        </div>
    </section>

    <section class="my-">
        <div class="container">
            @foreach($destino as $destinos)
            <div class="row mb-4 no-gutters align-items-center align-items-resumen shadow-sm bg-white">
                <div class="col-12 col-md-6">
                    <div class="p-5" id="box-resumen">
                        {{--                        <div class="exp-unica">--}}
                        {{--                            <div class="buton">--}}
                        {{--                                <div class="arrow">--}}
                        {{--                                    <span class="icon-estrella"></span>--}}
                        {{--                                </div>--}}
                        {{--                                <span>hola</span>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <h4>{{$destinos->nombre}}</h4>
                        <div class="line-subtitle"></div>
                        {!! $destinos->descripcion !!}
                        <div class="row mt-4">
                            <div class="col">
                                <button type="button" class="btn btn-link p-0 text-secondary d-none d-md-inline float-left font-weight-lighter">SABER MÁS SOBRE {{mb_strtoupper($destinos->nombre)}}</button>
                                <a href="{{route('destination_show_path', $destinos->url)}}" class="btn btn-g-green text-white rounded-0 float-md-right">VER PAQUETES</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="swiper-container swiper-container-gallery">
                        <div class="swiper-wrapper">
                            @foreach($destinos->destino_imagen as $imagen_destinos)
                            <a class="venobox swiper-slide" data-gall="myGallery" href="{{$imagen_destinos->nombre}}"><img src="{{$imagen_destinos->nombre}}" class="w-100" loading="lazy"></a>
                            @endforeach
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            @endforeach
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

    </script>
@endpush
