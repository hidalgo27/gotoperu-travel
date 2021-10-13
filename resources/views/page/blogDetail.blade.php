@extends('layouts.page.app')
@section('seo')
    @if ($seo!=null)
        @if($seo->titulo !=null)
            <title>{{$seo->titulo}}</title>
        @else
            <title>{{$post->titulo}}</title>
        @endif
        @if($seo->descripcion !=null)
            <meta name="description" content="{{$seo->descripcion}}"/>
        @else
            <meta name="description" content="Encuentra Tu Paquete Turístico Todo Incluido y Reserva Tu Próximo Viaje en Perú 2021/2022 Desde México ¡ Reservas Online GoTo Perú !"/>
        @endif
    @else
        <title>{{$post->titulo}}</title>
        <meta name="description" content="Encuentra Tu Paquete Turístico Todo Incluido y Reserva Tu Próximo Viaje en Perú 2021/2022 Desde México ¡ Reservas Online GoTo Perú !"/>
    @endif
@endsection
@section('content')
<header class="header-detail">
    <div class="overlay"></div>
    {{--            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">--}}
    {{--                <source src="{{asset('media/Secuencia 06.mp4')}}" type="video/mp4">--}}
    {{--            </video>--}}
    <div class="homepage-video">
        <img src="{{asset('images/packages/slider/AV1000-2.jpg')}}" alt="">

    </div>
    <div class="container h-100">
        <div class="row d-flex h-100 text-center align-items-center">
            <div class="col w-100 text-white mt-5">
                <h1 class="font-weight-lighter h2 mt-5">BLOG DETALLES</h1>
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
<section class="bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col d-none d-sm-block small font-weight-bold">
                <ol class="breadcrumb bg-white px-0 py-2 m-0">

                    <li class="breadcrumb-item"><a href="/">Home</a></li>


                    <li class="breadcrumb-item"><a href="{{route('blog_path')}}">Blog</a></li>


                    <li class="breadcrumb-item active">{{$post->titulo}}</li>

                </ol>


            </div>
        </div>
    </div>
</section>
<section id="title_section" class="bg-white py-5">
    <div class="container">
        <div class="row mt-2">
            <div class="col-lg-8 col-md-12 mr-5">
                <div class="row pb-2">
                    <div class="col blog">

                        <div id="carouselExampleCaptions" class="carousel slide slider shadow rounded" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($post->imagenes as $item)
                                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($post->imagenes as $item)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{$item['nombre']}}" class="d-block w-100" alt="{{$post[0]['titulo']}}" loading="lazy">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" data-target="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next"  data-target="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div>
                </div>
                <h1 class="h3 font-weight-bold pt-3">{{$post->titulo}}</h1>
                <span><i class="fa fa-user pr-2 text-g-dark-light small"></i><small class="text-g-dark-light">Autor {{$post[0]['user']['name']}}</small></span>
                <span class="mx-4"><i class="fa fa-calendar pr-2 text-g-dark-light small"></i><small class="text-g-dark-light">Fecha {{date('d/m/Y', strtotime($post[0]['updated_at']))}}</small></span>
                <span><i class="fa fa-tags pr-2 text-g-dark-light small"></i><small class="text-g-dark-light">Categoría {{$post[0]['categoria']['nombre']}}</small></span>
                <hr class="mt-4">
                <div class="row py-2">
                    <div class="col text-justify">
                        {!!$post->detalle!!}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 p-0 m-0">
{{--                <hr class="hr-warning mt-0">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <p class="h4 pb-3 text-g-yellow font-weight-bold">Buscar</p>--}}
{{--                        <form method="POST" action="{{route('buscar_path')}}" class="form-inline">--}}
{{--                            <input type="hidden" name="_token" value="ggmY2I1Gjt0wDFRU1ds0cP9H4g5dJaFg7X6wXgXU">--}}
{{--                            <div class="form-group">--}}
{{--                                <input type="text" name="buscar" class="form-control" placeholder="Buscar en el blog">--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="btn btn-g-green"><i class="fa fa-search"></i></button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr class="hr-warning">--}}
                <div class="row">
                    <div class="col">
                        <p class="h4 pb-3 text-g-yellow font-weight-bold">Artículos relacionados</p>
                        @foreach ($postsRelacionados as $post)
                            <div class="row no-gutters mb-4">
                                <div  class="col-auto">
                                    <a href="/blog/{{$post->url}}">
                                        <img src="{{$post->imagen_miniatura}}" alt="{{$post->titulo}}" class="img-fluid float-left miniatura" loading="lazy">
                                    </a>
                                </div>
                                <div class="col pl-2">
                                    <a href="/blog/{{$post->url}}">
                                        <h6 class="mb-1 small text-g-dark-light font-weight-bold">{{$post->titulo}}</h6>
                                    </a>
                                    <small class="text-primary"><i class="fa fa-calendar pr-2"></i>{{date('d/m/Y', strtotime($post->updated_at))}}</small>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col">
                        <p class="h4 pb-3 text-g-yellow font-weight-bold">Categorías</p>
                        @foreach ($categorias as $categoria)
                        <a href="/blog/categoria/{{$categoria[0]}}">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto text-capitalize">
                                            <i class="fa fa-tags mr-2 text-g-dark-light fa h6"></i>{{$categoria[0]}}
                                        </div>
                                        <span class="badge badge-g-green rounded-pill px-3 h6">{{$categoria[1]}}</span>
                                    </li>
                                </ul>
                            </a>
                        @endforeach
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col">
                        <p class="h4 pb-3 text-g-yellow font-weight-bold">Artículos más recientes</p>
                        <div class="row pl-3">
                            @foreach ($recentPosts as $post)
                                <div class="row no-gutters mb-4">
                                    <div  class="col-auto">
                                        <a href="/blog/{{$post->url}}">
                                            <img src="{{$post->imagen_miniatura}}" alt="{{$post->titulo}}" class="img-fluid float-left miniatura" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="col pl-2">
                                        <a href="/blog/{{$post->url}}">
                                            <h6 class="mb-1 small text-g-dark-light font-weight-bold">{{$post->titulo}}</h6>
                                        </a>
                                        <small class="text-primary"><i class="fa fa-calendar pr-2"></i>{{date('d/m/Y', strtotime($post->updated_at))}}</small>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <hr class="mb-4">


{{--                            <p class="h4 pb-3 text-g-yellow font-weight-bold">Síguenos en</p>--}}

                            <div class="row justify-content-center">
                                <div class="col-auto text-center mb-2">
                                    <a href="https://www.facebook.com/GOTOPERUcom/" target="_blank" class="mx-2">
                                        <i data-feather="facebook" class="text-g-dark" stroke-width="1"></i>
                                    </a>
                                    <a href="https://twitter.com/GOTOPERUCOM" target="_blank" class="mx-2">
                                        <i data-feather="twitter" class="text-g-dark" stroke-width="1"></i>
                                    </a>
                                    <a href="https://www.youtube.com/channel/UCWjJ10j-_BfNTDnmjBug8Ng" target="_blank" class="mx-2">
                                        <i data-feather="youtube" class="text-g-dark" stroke-width="1"></i>
                                    </a>
                                    <a href="https://www.instagram.com/go.to.peru/" target="_blank" class="mx-2">
                                        <i data-feather="instagram" class="text-g-dark" stroke-width="1"></i>
                                    </a>
                                </div>
                            </div>


                <hr class="mb-4">
            </div>
        </div>
    </div>
</section>
@endsection
