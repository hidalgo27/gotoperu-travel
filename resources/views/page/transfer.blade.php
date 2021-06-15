@extends('layouts.page.default')

@section('content')
    <header class="header-video-default position-relative">
        @include('layouts.page.menu')
        <div id="overlay">
            <video class="" id="hero-vid" poster="{{asset('images/slider/package-1.jpg')}}" autoplay loop muted>
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
                <div class="row content-header-row align-items-center">
                    <div class="col text-center">
                        <h3 class="text-white text-center h1">{{strtoupper(str_replace('-', ' ', $title))}}</h3>
                        <i class="fa fa-chevron-down text-white h1"></i>
                    </div>

                </div>

            </div>
        </div>
    </header>
    @include('layouts.page.menu-mobil')


    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h1 class="font-montserrat text-g-green font-weight-bold">{{strtoupper(str_replace('-', ' ', $title))}}</h1>
                    {{--<p class="h3 my-3 font-weight-bold ">Lorem elit. Accusamus asperiores commodi</p>--}}
                    {{--<p class="lead">L orem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad assumenda blanditiis consectetur cumque, debitis enim eveniet id <b>labore nam necessitatibus</b> repellat? Consectetur doloremque harum necessitatibus quis repellendus sit veniam.</p>--}}
                </div>
            </div>
        </div>
    </section>
    @foreach($transfer as $transfer)
    @endforeach
    <section class="bg-white">
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm">
                    <div class="row">
                        <div class="col">
                            {{--<h3 class="font-weight-bold mt-4">Itinerario:</h3>--}}

                            <h4 class="font-weight-bold text-g-yellow">{{ucwords(strtolower($transfer->titulo))}}</h4>
                            @php echo $transfer->descripcion; @endphp

                        </div>
                    </div>


                </div>
                <div class="col-12 col-sm d-none d-lg-inline-block">

                    <div class="row">
                        <div class="col-12 col-sm">
                            <div class="">
                                <table class="table table-sm table-bordered m-0">
                                    <tr>
                                        <td><b>Duração</b></td>
                                        <td>{{$transfer->duracion}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Origem</b></td>
                                        <td>{{$transfer->origen}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Destino</b></td>
                                        <td>{{$transfer->destino}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Preço por pessoa (GRUPO)</b></td>
                                        <td><sup>$</sup>{{$transfer->precio_g}} <small>USD</small></td>
                                    </tr>
                                    <tr>
                                        <td><b>Preço por pessoa (PRIVADO)</b></td>
                                        <td><i class="text-danger">Solicite um orçamento</i></td>
                                    </tr>
                                </table>
                                {{--<a  href="#book-now" type="button" class="btn btn-primary btn-lg btn-avalavility btn-block">--}}
                                    {{--Consultas--}}
                                {{--</a>--}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    @push('scripts')

    @endpush

@stop