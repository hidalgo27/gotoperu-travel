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
                    <h1 class="font-weight-lighter h2 mt-5">NUESTRO EQUIPO GOTOPERU</h1>
                    {{--                        <p class="lead mb-0">With HTML5 Video and Bootstrap 4</p>--}}
                </div>
            </div>
        </div>
        <div class="position-absolute-bottom p-2">
            <div class="row justify-content-center">
                <div class="col-auto text-center">
                    <a href="" class="mx-2">
                        <i data-feather="facebook" class="text-white" stroke-width="1"></i>
                    </a>
                    <a href="" class="mx-2">
                        <i data-feather="twitter" class="text-white" stroke-width="1"></i>
                    </a>
                    <a href="" class="mx-2">
                        <i data-feather="youtube" class="text-white" stroke-width="1"></i>
                    </a>
                    <a href="" class="mx-2">
                        <i data-feather="instagram" class="text-white" stroke-width="1"></i>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-g-yellow font-weight-bold display-4 text-center">Quiénes Somos y <span class="text-g-green">por qué Amamos Viajar</span></h1>
                    {{--<p class="h2 text-secondary pt-3">USTED TENDRÁ UNA EXPERIENCIA INIMAGINABLE</p>--}}
                    {{--<p class="h4"></p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="mb-0 lead text-secondary text-center"><b>En GOTOPERU creemos en la excelencia, seguridad, atención personalizada y calidad de los servicios, es nuestro compromiso con nuestros pasajeros. Por eso, nos esforzamos en satisfacer las necesidades de nuestros clientes al máximo.</b></p>
                </div>

            </div>

            <div class="row mt-5 align-items-center">

                <div class="col-6">
                    <div class="bg-light shadow-sm p-4 border-left border-g-green">
                        <h5 class="font-weight-bold text-secondary">NUESTRO COMPROMISO</h5>
                        <p class="align-middle">No dejar escapar la oportunidad de que nuestros turistas descubran los encantos de Perú y vivir una aventura inolvidable.</p>
                    </div>
                </div>

                <div class="col-6">
                    <div class="bg-light shadow-sm p-4 border-left border-g-yellow">
                        <h5 class="font-weight-bold text-secondary">MISIÓN</h5>
                        <p class="align-middle">Ofrecer a nuestros clientes los mejores recursos peruanos para una aventura inolvidable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 position-relative">
        <div class="offer-banner">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h2 class="font-weight-bold">Conoce a nuestro equipo</h2>
                    </div>
                </div>

                <div class="row justify-content-center mt-4">
                    @foreach($team as $teams)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-5">
                        <div class="card">
                            <a class="venobox position-relative" data-gall="myGallery" href="{{$teams->imagen_portada}}">
                                <img src="{{$teams->imagen_portada}}" alt="image alt" class="card-img-top" loading="lazy">
                                <span class="position-absolute-top text-white">
                                    <i data-feather="image" stroke-width="1"></i>
                                </span>
                            </a>
                            <div class="card-body text-center">
                                <a class="venobox position-relative" href="{{$teams->imagen_perfil}}">
                                    <img src="{{$teams->imagen_perfil}}" alt="image alt" class="avatar rounded-circle" loading="lazy">
                                    <span class="position-absolute-bottom text-white">
                                        <i data-feather="image" stroke-width="2"></i>
                                    </span>
                                </a>
                                <h4 class="card-title">{{$teams->nombre}}</h4>
                                <h6 class="card-subtitle mb-2 text-g-yellow font-weight-bold">{{$teams->cargo}}</h6>
                                <p class="small">{{$teams->frase}}</p>
                                <p class="font-weight-bold small text-secondary"><i data-feather="thumbs-up" stroke-width="2"></i> <b>Actividad Favorita:</b> {{$teams->actividad}}</p>
                                <p class="small m-0"><i data-feather="mail" stroke-width="1"></i> {{$teams->email}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>

    <section class="position-relative">
        <div class="offer-banner">
            <div class="container">
                <div class="row align-items-center pt-5 pt-md-0">
                    <div class="col-12 col-md-6">
                        <h2 class="h5">NOSOTROS SOMOS</h2>
                        <h4 class="font-weight-bold h1">GOTOPERU</h4>
                        <p>El compromiso de GOTOPERU es ofrecer una experiencia personalizada y de calidad que cumpla las expectativas de nuestros clientes. El modelo de Gestión de GOTOPERU está basado en la mejora continua y sus principales actuaciones son: Difundir las riquezas de nuestro país el Peru, sus costumbres, gastronomía, su patrimonio natural y cultural, ayudando a fomentar un turismo sostenible.</p>
                        <ul class="pl-3">
                            <li>Cede Central: Cusco, Perú</li>
                            <li>Company: 25 miembros</li>
                            <li>Fundado: 2009</li>
                            <li>Oficinas: Lima, Perú / New York, Usa</li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="{{asset('images/gotoperu-banner-rgba.png')}}" alt="" class="w-100" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="my-5">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col text-center">--}}
{{--                    <h2 class="font-weight-bold">Porque Nos Importa</h2>--}}
{{--                    <p class="lead font-weight-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, ad aliquam animi at blanditiis dolor facilis fuga fugit harum, iste mollitia natus quisquam ratione saepe sit tenetur veniam voluptatem. Quasi!</p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    sd--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@stop
