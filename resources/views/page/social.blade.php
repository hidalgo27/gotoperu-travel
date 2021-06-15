@extends('layouts.page.default')
@section('content')

    <header class="header-video-default position-relative">
        @include('layouts.page.menu')
        <div id="overlay" class="overlay-img">
            <img src="{{asset('images/social.jpg')}}" alt="" id="hero-vid" loading="lazy">
        </div>
        <div class="position-absolute bottom-n-1">
            <img src="{{asset('images/pce.png')}}" alt="" class="img-fluid" loading="lazy">
        </div>

        <div class="content-header">
            <div class="container">
                <div class="row content-header-row align-items-center">
                    <div class="col text-center">
                        <h3 class="text-white text-center h1">RESPONSABILIDADE SOCIAL</h3>
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
                    {{Breadcrumbs::render('social')}}
                </div>
            </div>
        </div>
    </section>

    <section class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="text-g-yellow">PORQUE NOS IMPORTAMOS</h1>
                    <p class="h2 text-secondary">Nós devolvemos às nossas comunidades</p>
                    {{--<p class="h4"></p>--}}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    {{--<blockquote class="blockquote text-center alert-primary py-3">--}}
                        {{--<p class="mb-0">En GOTOPERU creemos en la excelencia, seguridad, atención personalizada y calidad de los servicios, es nuestro compromiso para con nuestros pasajeros. Por eso, nos esforzamos en satisfacer las necesidades de nuestros clientes al máximo.</p>--}}
                        {{--<footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>--}}
                    {{--</blockquote>--}}
                    <p class="lead text-center"><b>Chaullacocha está localizado a duas horas ao noroeste de Cusco.</b></p>
                    <div class="alert alert-primary" role="alert">
                        <p class="lead text-center"><b>A equipe da GOTOPERU se identifica com os filhos da comunidade de Chaullacocha - Cusco. Nós somos claros sobre nossa responsabilidade social com as crianças da comunidade de Chaullacocha-Cusco.</b></p>
                    </div>
                    <p class="lead"><b>Na GOTOPERU, estamos comprometidos em fazer negócios de uma maneira que realmente retorne parte de nossos lucros para nossas comunidades, especialmente para comunidades localizadas em locais remotos. Nosso planejamento e execução de uma das nossas viagens implica uma longa cadeia de abastecimento: a partir de guias locais e operadores para o transporte de fornecedores, hotéis e restaurantes, interagir com muitas organizações em diferentes lugares, mas também sabemos que algumas comunidades particularmente localizado acima do Andes A mais de 15.000 pés, devido ao difícil acesso, eles não recebem a assistência que merecem, por isso organizamos periodicamente viagens a comunidades tão distantes para trazê-los especialmente suéteres e brinquedos para as crianças.</b></p>

                </div>

            </div>
        </div>
    </section>
    
    
    <section class="py-3 bg-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{asset('images/social/care2.jpg')}}" alt="" class="w-100 rounded" loading="lazy">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <img src="{{asset('images/social/care1.jpg')}}" alt="" class="w-100 rounded" loading="lazy">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <img src="{{asset('images/social/care3.jpg')}}" alt="" class="w-100 rounded" loading="lazy">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <img src="{{asset('images/social/care4.jpg')}}" alt="" class="w-100 rounded" loading="lazy">
                </div>
            </div>
        </div>
    </section>
@stop