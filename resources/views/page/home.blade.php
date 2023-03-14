@extends('layouts.page.app')
@section('content')
    <header>
        <div class="overlay"></div>
        {{--            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
        {{--                <source src="{{asset('media/Secuencia 06.mp4')}}" type="video/mp4">--}}
        {{--            </video>--}}
        <div class="homepage-video">
            {{--                <iframe title="GotoPeru background video" src="https://player.vimeo.com/video/361847703?background=1" width="100%" height="100" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>--}}
            <iframe src="https://player.vimeo.com/video/361847703?background=1&autoplay=1&loop=1&title=0&byline=0&portrait=0&muted=1"  frameborder="0" allow="autoplay; fullscreen"></iframe>
        </div>
        <div class="container h-100">
            <div class="row d-flex h-100 text-center align-items-center">
                <div class="col w-100 text-white mt-5">
                    <h1 class="font-weight-lighter h2 mt-5">Top en Recomendaciones y Testimonios, sede central en Cusco</h1>
                    <a href="#consulte" class="btn btn-outline-g-yellow btn-lg h2 font-weight-normal mt-3">Diseña tu Viaje</a>
                    {{--                        <p class="lead mb-0">With HTML5 Video and Bootstrap 4</p>--}}
                </div>
            </div>
        </div>
        <div class="position-absolute-bottom p-2">
            <div class="row justify-content-center">
                <div class="col-auto text-center">
                    <a href="https://www.facebook.com/GOTOPERUcom/" target="_blank" class="mx-2">
                        <i data-feather="facebook" class="text-white" stroke-width="1"></i>
                    </a>
                    <a href="https://twitter.com/GOTOPERUCOM" target="_blank" class="mx-2">
                        <i data-feather="twitter" class="text-white" stroke-width="1"></i>
                    </a>
                    <a href="https://www.youtube.com/channel/UCWjJ10j-_BfNTDnmjBug8Ng" target="_blank" class="mx-2">
                        <i data-feather="youtube" class="text-white" stroke-width="1"></i>
                    </a>
                    <a href="https://www.instagram.com/go.to.peru/" target="_blank" class="mx-2">
                        <i data-feather="instagram" class="text-white" stroke-width="1"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="my-5">
        <div class="container">
            <div class="row align-items-center">
                {{--                    <div class="col d-none d-md-inline">--}}
                {{--                        <img src="{{asset('images/about.jpg')}}" alt="" class="w-100 rounded img-lazy" loading="lazy">--}}
                {{--                    </div>--}}
                <div class="col text-center">
                    <h1 class="font-weight-bold display-4 text-g-yellow">Paquetes de <strong class="text-g-green">viajes en Perú</strong></h1>
                    <p class="lead font-weight-normal text-muted">Expertos operadores de viajes locales. Nuestros guías, conductores y representantes estarán muy contentos en compartir lo mejor de nuestro Perú. Tenemos 10 años de experiencia diseñando viajes inolvidable a la tierra de los Incas! Incluyendo Socios Globales como Expedia, Travelocity, Tripadvisor, que nos reconocen como Operador Top en Perú. Cotize el dia de hoy un viaje inolvidable para conocer MachuPicchu !</p>
{{--                    <div class="row align-items-center">--}}
{{--                        <div class="col-12 text-center">--}}
{{--                            <h6 class="text-secondary">--}}
{{--                                <img src="{{asset('images/logo-andes-bc.png')}}" alt="" width="120" loading="lazy">--}}
{{--                                <span class="mt-1">é a divisão de</span>--}}
{{--                                <img src="{{asset('images/logo-gotoperu.png')}}" alt="" width="100" loading="lazy">--}}
{{--                            </h6>--}}

{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>

    <search-package></search-package>

    <section class="position-relative my-5">
        <div class="offer py-5">
            <div class="container">
                <div class="col text-center">
                    <h2 class="h1 font-weight-bold text-white">Porque escoger Gotoperu</h2>
                </div>
                <div class="row mt-5">
                    <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-2 text-center">
                        <i data-feather="users" class="text-white d-block mx-auto" width="45" height="45" stroke-width="1"></i>
                        <span class="text-white small mt-3 d-block">Grupos pequeños y personalizados.</span>
                    </div>
                    <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-2 text-center">
                        <i data-feather="clock" class="text-white d-block mx-auto" width="45" height="45" stroke-width="1"></i>
                        <span class="text-white small mt-3 d-block">Nosotros vivimos aquí, somos locales 100%.</span>
                    </div>
                    <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-2 text-center">
                        <i data-feather="pen-tool" class="text-white d-block mx-auto" width="45" height="45" stroke-width="1"></i>
                        <span class="text-white small mt-3 d-block">Reserve ahora o Diseña tu Viaje!</span>
                    </div>
                    <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-2 text-center">
                        <i data-feather="map-pin" class="text-white d-block mx-auto" width="45" height="45" stroke-width="1"></i>
                        <span class="text-white small mt-3 d-block">Sin intermediarios, sede en Perú.</span>
                    </div>
                    <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-2 text-center">
                        <i data-feather="thumbs-up" class="text-white d-block mx-auto" width="45" height="45" stroke-width="1"></i>
                        <span class="text-white small mt-3 d-block">Estamos orgullosos de nuestros recomendaciones!</span>
                    </div>
                    <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-2 text-center">
                        <i data-feather="calendar" class="text-white d-block mx-auto" width="45" height="45" stroke-width="1"></i>
                        <span class="text-white small mt-3 d-block">Nos adaptamos a cualquier hora de llegada.</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-white text-white text-center">
                        <p class="font-weight-light">Desde 2009</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col text-white text-white text-center">
                        <a href="#" class="btn btn-lg btn-g-yellow font-weight-bold text-white">Consulte ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-4">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2 class="font-weight-bold">Conoce a nuestros epecialiastas en viajes</h2>
                    <p class="lead font-weight-normal">Nuestro equipo está integrado por expertos profesionales en cada área, desde un experto team de consejeros de viajes hasta los mejores guías locales en cada destino que operamos, lo que garantiza un conocimiento total de los destinos que conforman nuestra programación; deseando transmitir esos conocimientos a todos aquellos posibles viajeros, que confían en nosotros esos importantes momentos de sus vidas: como son sus viajes. ¡Bienvenidos al mágico e histórico Perú!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="box16">
                        <img src="{{asset('images/team/franklin.jpg')}}" loading="lazy">
                        <div class="box-content">
                            <h3 class="title">Franklin</h3>
                            <span class="post">Guia Senior</span>
                            <ul class="social">
                                <li><a class="venobox" data-gall="myGallery" data-autoplay="true" data-vbtype="video" href="https://youtu.be/kAHrfcy20bI"><i class="fas fa-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box16">
                        <img src="{{asset('images/team/katy.jpg')}}" loading="lazy">
                        <div class="box-content">
                            <h3 class="title">Katy</h3>
                            <span class="post">Guia</span>
                            <ul class="social">
                                <li><a class="venobox" data-gall="myGallery" data-autoplay="true" data-vbtype="video" href="https://youtu.be/586i_znr4VQ"><i class="fas fa-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="box16">
                        <img src="{{asset('images/team/da.jpg')}}" loading="lazy">
                        <div class="box-content">
                            <h3 class="title">Daniel</h3>
                            <span class="post">Travel Advisor</span>
                            <ul class="social">
                                <li><a class="venobox" data-gall="myGallery" data-autoplay="true" data-vbtype="video" href="https://youtu.be/HFJyuC_euRk"><i class="fas fa-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            {{--                <div class="row mt-4">--}}
            {{--                    <div class="col text-center">--}}
            {{--                        <a href="" class="btn font-weight-bold btn-lg btn-info">Vea más sonbre nuestro equipo</a>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
        </div>
    </section>

    <section class="position-relative mt-5">
        <div class="offer-banner">
            <div class="container">
                <div class="row align-items-center pt-5 pt-md-0">
                    <div class="col-12 col-md-6">
                        <h2 class="h5">NOSOTROS SOMOS</h2>
                        <h4 class="font-weight-bold h1">GOTOPERU</h4>
                        <p>El compromiso de GOTOPERU es ofrecer una experiencia personalizada y de calidad que cumpla las expectativas de nuestros clientes . El modelo de Gestión de GOTOPERU está basado en la mejora continua y sus principales actuaciones son: Difundir las riquezas de nuestro país el Peru, sus costumbres, gastronomía, su patrimonio natural y cultural, ayudando a fomentar un turismo sostenible.</p>
                        <ul class="pl-3">
                            <li>Cede Central: Cusco, Perú</li>
                            <li>Company: 25 miembros</li>
                            <li>Fundado: 2009</li>
                            <li>Oficinas: Lima, Perú / New York, Usa</li>
                        </ul>
                        <div class="row mt-4">
                            <div class="col text-center">
                                <a href="{{route('sobre_nosotros_path')}}" class="btn font-weight-bold btn-dark">Vea más sonbre nuestro equipo</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="{{asset('images/gotoperu-banner-rgba.png')}}" alt="" class="w-100" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row py-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold display-5 text-g-green">Testimonios de nuestros pasajeros</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4 mb-md-0 col-md">
                    <a class="venobox" data-gall="myGallery" data-autoplay="true" data-vbtype="video" href="https://youtu.be/iWqyeyUVruE">
                        <div class="position-relative">
                            <img src="{{asset('images/video-testimonial/1.jpg')}}" alt="" class="w-100" loading="lazy">
                            <div class="position-absolute-bottom text-white p-3 icon-play">
                                <i class="fas fa-play fa-2x"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 mb-4 mb-md-0 col-md">
                    <a class="venobox" data-gall="myGallery" data-autoplay="true" data-vbtype="video" href="https://youtu.be/tbET_aKa0Zg">
                        <div class="position-relative">
                            <img src="{{asset('images/video-testimonial/2.jpg')}}" alt="" class="w-100" loading="lazy">
                            <div class="position-absolute-bottom text-white p-3 icon-play">
                                <i class="fas fa-play fa-2x"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 mb-4 mb-md-0 col-md">
                    <a class="venobox" data-gall="myGallery" data-autoplay="true" data-vbtype="video" href="https://youtu.be/NSA_ij7rxuI">
                        <div class="position-relative">
                            <img src="{{asset('images/video-testimonial/3.jpg')}}" alt="" class="w-100" loading="lazy">
                            <div class="position-absolute-bottom text-white p-3 icon-play">
                                <i class="fas fa-play fa-2x"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col text-center">
                    <p class="lead font-weight-bold text-muted">Nuestra mejor satisfacción son los cientos de clientes satisfechos compartiendo sus experiencias con nosotros. Debajo encontrara algunos de ellos! te gustaría ser el siguiente. Luces, cámara, acción!</p>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-4 text-center">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <a href="https://www.tripadvisor.com.pe/Attraction_Review-g294314-d15202262-Reviews-Gotoperu-Cusco_Cusco_Region.html" target="_blank">
                                <img src="{{asset('images/icons/tripadvisor.png')}}" alt="" class="w-100" loading="lazy">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-truncate">
                            <i class="fa fa-quote-left"></i>
                            <span class="small">Nuestro Guía Franklin fue un experto no pudimos pedir un guía mejor, pudimos aprender mucho de la cultura e historia Inca!</span>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <small class="text-g-yellow font-weight-bold">Jhon X2 feb 2019, USA</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-4 text-center">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <a href="https://www.yelp.com/biz/gotoperu-washington?osq=gotoperu.com" target="_blank">
                                <img src="{{asset('images/icons/yelp.png')}}" alt="" class="w-100" loading="lazy">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-truncate">
                            <i class="fa fa-quote-left"></i>
                            <span class="small">Mi experiencia con la Agencia fue perfecta, yo la recomendaría para cualquier.</span>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <small class="text-g-yellow font-weight-bold">Boon C. Jan 2019 Tampa, FL</small>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-3 col-sm-4 mb-md-0 col-md-4 text-center">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <a href="https://www.trustpilot.com/review/gotoperu.com" target="_blank">
                                <img src="{{asset('images/icons/trust.png')}}" alt="" class="w-100" loading="lazy">
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-truncate">
                            <i class="fa fa-quote-left"></i>
                            <span class="small">No dude en recomendar GoToPeru para ayudar a diseñar su viaje. Martin como representante de primera línea</span>
                            <i class="fa fa-quote-right"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <small class="text-g-yellow font-weight-bold">jeanette Pan feb 2019, USA</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <a href="https://www.tripadvisor.com/ShowTopic-g294311-i818-k5867868-Has_anyone_booked_a_tour_with_GOTOPERU_www_gotoperu_org-Peru.html" target="_blank" class="btn btn-outline-g-green font-weight-bold btn-sm">TripAdvisor 1</a>
                    <a href="https://www.tripadvisor.com/ShowTopic-g294311-i818-k6509104-Gotoperu_Travel_Agency-Peru.html" target="_blank" class="btn btn-outline-g-green font-weight-bold btn-sm">TripAdvisor 2</a>
                    <a href="https://www.tripadvisor.com/ShowTopic-g294311-i818-k5657518-GOTOPERU_online_tour_operator-Peru.html" target="_blank" class="btn btn-outline-g-green font-weight-bold btn-sm">TripAdvisor 3</a>
                    <a href="https://www.tripadvisor.com/ShowTopic-g294311-i818-k6934201-Trip_Report_Two_glorious_weeks_in_Peru_with_GOTOPERU_ORG-Peru.html" target="_blank" class="btn btn-outline-g-green font-weight-bold btn-sm">TripAdvisor 4</a>
                    <a href="https://www.tripadvisor.co.za/ShowTopic-g294311-i818-k7362487-o10-GotoPeru_or_David_Expeditions-Peru.html" target="_blank" class="btn btn-outline-g-green font-weight-bold btn-sm">TripAdvisor 5</a>
                </div>
            </div>

{{--            <div class="row mt-5">--}}
{{--                <div class="col text-center">--}}
{{--                    <button type="button" class="btn-lg btn btn-primary text-white font-weight-bold">Más de nuestros testimonios</button>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row pb-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold">¿Buscas un estilo de viaje?</h2>
                </div>
            </div>
            <div class="row">
                @foreach($categoria as $categorias)
                    <div class="col-12 col-md-4">
                        <div class="transperent_block">
                            <img src="{{$categorias->imagen}}" class="img-responsive" alt="" loading="lazy">
                            <div class="black_hover_block">
                                <div class="blur"></div>
                                <div class="black_hover_block_text">
                                    <ul class="text-center bg_black m-0 p-0">
                                        <li>{{$categorias->nombre}}</li>
                                        <div class="clearfix"></div>
                                    </ul>
                                    <h5 class="titl-h5">{{$categorias->nombre}}</h5>
                                    <p>{!! $categorias->descripcion !!}</p>
                                    <a class="btn btn-g-yellow btn-sm" href="{{route('category_show_path', $categorias->url)}}">+ Paquetes de categoria {{$categorias->nombre}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
{{--                <div class="col">--}}
{{--                    <div class="transperent_block">--}}
{{--                        <img src="{{asset('images/category/family.jpg')}}" class="img-responsive" alt="" loading="lazy">--}}
{{--                        <div class="black_hover_block">--}}
{{--                            <div class="blur"></div>--}}
{{--                            <div class="black_hover_block_text">--}}
{{--                                <ul class="text-center bg_black m-0 p-0">--}}
{{--                                    <li>Familiares</li>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </ul>--}}
{{--                                <h5 class="titl-h5">Familia</h5>--}}
{{--                                <p>Para grupo o familia</p>--}}
{{--                                <a class="btn btn-g-yellow btn-sm" href="{{route('category_show_path', 'titulo')}}">Ver viajes familiares o grupos</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="transperent_block ">--}}
{{--                        <img src="{{asset('images/category/recommended.jpg')}}" class="img-responsive" alt="" loading="lazy">--}}
{{--                        <div class="black_hover_block">--}}
{{--                            <div class="blur"></div>--}}
{{--                            <div class="black_hover_block_text">--}}
{{--                                <ul class="text-center bg_black m-0 p-0">--}}
{{--                                    <li> Recomendados</li>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </ul>--}}
{{--                                <h5 class="titl-h5">Recomendados</h5>--}}
{{--                                <p>Recomendados por nuestros viajeros</p>--}}
{{--                                <a class="btn btn-g-yellow btn-sm" href="{{route('category_show_path', 'titulo')}}">Ver viajes recomendados</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col">--}}
{{--                    <div class="transperent_block">--}}
{{--                        <img src="{{asset('images/category/cultural.jpg')}}" class="img-responsive" alt="" loading="lazy">--}}
{{--                        <div class="black_hover_block">--}}
{{--                            <div class="blur"></div>--}}
{{--                            <div class="black_hover_block_text">--}}
{{--                                <ul class="text-center bg_black m-0 p-0">--}}
{{--                                    <li>Cultural</li>--}}
{{--                                    <div class="clearfix"></div>--}}
{{--                                </ul>--}}
{{--                                <h5 class="titl-h5">Cultural</h5>--}}
{{--                                <p>Explore la diversidad de culturas peruanas</p>--}}
{{--                                <a class="btn btn-g-yellow btn-sm" href="{{route('category_show_path', 'titulo')}}">Ver viajes culturales</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="lead font-weight-bold text-muted">No importa el tipo de aventura que estés buscando, GOTOPERU tiene un viaje para ti. ¿Esperamos su llama? ¿Quieres un viaje de senderismo por el Camino Inca? ¡Llámenos!, ¿Qué tal un ceviche en Lima? ¡Llámenos!, ¿Qué tal un viaje para usted, sus hijos, la abuela y el abuelo? ¡Llámenos!</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="{{route('category_path')}}" class="btn btn-lg btn-g-green font-weight-bold text-white mt-4">Más categorías de Paquetes</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row pb-4">
                <div class="col text-center">
                    <h2 class="font-weight-bold">Destinos recomendados</h2>
                </div>
            </div>
            <div class="row">
                @foreach($destino as $destinos)
                <div class="col-12 col-md-4">
                    <div class="home-banner-destinations">
                        <figure class="cc-imagewrapper">
                            <a href="{{route('destination_show_path', $destinos->url)}}" class="text-center">
                                <img src="{{$destinos->imagen}}" alt="" class="w-100" loading="lazy">
                            </a>
                            <figcaption>
                                <small class="d-block">{{$destinos->pais}}</small>
                                {{$destinos->nombre}}
                            </figcaption>
                        </figure>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col text-center">
                    <a href="{{route('destination_path')}}" class="btn btn-lg btn-g-yellow font-weight-bold text-white my-4">Ver todos nuestros destinos en Perú</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
                <div class="row pb-4">
                    <div class="col text-center">
                        <h2 class="font-weight-bold text-g-green pb-2">Nuestro blog</h2>
                        <p class="lead font-weight-bold text-muted">Entérate de las últimas noticias e información de Cusco y Perú</p>
                    </div>
                </div>
            <div class="row blog card-deck">
                @foreach ($posts as $post)
                    <div class="col-12 col-md-4 d-flex">
                        <div class="card">
                            <div class="card-img-top">
                            <a class="img-card" href="/blog/{{$post['url']}}">
                                <div  id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        @foreach ($post['imagenes'] as $photo)
                                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                        @foreach ($post['imagenes'] as $photo)
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                                <img class="d-block img-fluid" src="{{$photo['nombre']}}" alt="{{$post['titulo']}}" loading="lazy">
                                                <div class="tag bg-rgba-dark-3 text-center text-white">
                                                    <p class="m-2 font-weight-bold">{{$post['categoria']['nombre']}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <a class="carousel-control-prev" data-target="#carouselExampleControls" role="button" data-slide="prev">
                                        <span><i class="carousel-control-prev-icon fa-3x" aria-hidden="true"></i></span>
                                        <span class="sr-only">Anterior</span>
                                    </a>
                                    <a class="carousel-control-next" data-target="#carouselExampleControls" role="button" data-slide="next">
                                        <span><i class="carousel-control-next-icon fa-3x" aria-hidden="true"></i></span>
                                        <span class="sr-only">Siguiente</span>
                                    </a>
                                </div>
                            </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/blog/{{$post['url']}}" class="text-g-yellow">
                                        {{$post['titulo']}}
                                    </a>
                                </h5>
                                <div class="row text-secondary small">
                                    <div class="col">
                                        <i class="fa fa-user pr-2 text-primary"></i>{{$post['user']['name']}}
                                    </div>
                                    <div class="col">
                                        <i class="fa fa-calendar pr-2 text-primary"></i>{{date('d/m/Y', strtotime($post['updated_at']))}}
                                    </div>
                                </div>
{{--                                <div class="text-justify pt-3">--}}
{{--                                    {!!Str::limit($post['detalle'], 150,$end='...')!!}--}}
{{--                                </div>--}}
                            </div>
                            <div class="card-footer">

                                    <a class="btn btn-outline-g-green font-weight-bold btn-sm m-2" href="/blog/{{$post['url']}}">
                                        Leer más
                                    </a>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col text-center">
                    <a href="/blog" class="btn btn-lg btn-g-green font-weight-bold text-white mt-4">Ver más</a>
                </div>
            </div>
        </div>
    </section>

{{--    <section>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    <form action="https://api.rd.services/platform/contacts/{identifier}:{value}" method="post">--}}
{{--                        @csrf--}}
{{--                        <input type="text" name="email" placeholder="email">--}}
{{--                        <input type="text" name="nombre" placeholder="nombre">--}}
{{--                        <input type="submit" value="enviar">--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section id="consulte" class="pt-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
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
