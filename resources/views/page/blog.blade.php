@extends('layouts.page.app')
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
                <h1 class="font-weight-lighter h2 mt-5">BLOG</h1>
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


                    <li class="breadcrumb-item active">Blog</li>


                </ol>


            </div>
        </div>
    </div>
</section>
<section id="title_section" class="bg-white py-5">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2 class="font-weight-bold display-4 text-g-yellow">Descubre <strong class="text-g-green">Perú</strong></h2>
                <p class="lead">Descubre todas las noticias, recomendaciones, lugares turísticos e información útil que necesitas saber viajar.</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-8 col-md-12 mr-5">
{{--                <div class="alert alert-primary text-center mb-5">--}}
{{--                    <p class="font-weight-bold lead text-muted">Descubre todas las noticias, recomendaciones, lugares turísticos e información útil que necesitas saber viajar.</p>--}}
{{--                </div>--}}
                <hr class="mb-4">
                @foreach ($posts as $post)
                    <div class="row py-4">
                        <div class="col-12 pb-2">
                            <h3 class="font-weight-bold">
                                <a href="/blog/{{$post['url']}}" class="text-g-green">{{$post['titulo']}}</a>
                            </h3>
                        </div>
                        <div class="col-md-5">
                            <a href="/blog/{{$post['url']}}">
                                <div  id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        @foreach ($post['imagenes'] as $photo)
                                            <div class="carousel-item blog {{ $loop->first ? 'active' : '' }}">
                                                <img class="text-center align-self-center w-100" src="{{$photo['nombre']}}" alt="{{$post['titulo']}}" loading="lazy">
                                                <div class="tag bg-rgba-dark-3 text-center text-white">
                                                    <p class="m-2 font-weight-bold">{{$post['categoria']['nombre']}}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <a class="carousel-control-prev" data-target="#carouselExampleControls" role="button" data-slide="prev">
                                            <span><i class="carousel-control-prev-icon fa-3x" aria-hidden="true"></i></span>
                                            <span class="sr-only">Anterior</span>
                                        </a>
                                        <a class="carousel-control-next" data-target="#carouselExampleControls" role="button" data-slide="next">
                                            <span><i class="carousel-control-next-icon fa-3x" aria-hidden="true"></i></span>
                                            <span class="sr-only">Siguiente</span>
                                        </a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-7">
{{--                            <div class="row text-primary text-center">--}}
{{--                                <div class="col-4">--}}
{{--                                    <i class="fa fa-user pr-2"></i>{{$post['user']['name']}}--}}
{{--                                </div>--}}
{{--                                <div class="col-4">--}}
{{--                                    <i class="fa fa-calendar pr-2"></i>{{date('d/m/Y', strtotime($post['updated_at']))}}--}}
{{--                                </div>--}}
{{--                                <div class="col-4">--}}
{{--                                    <i class="fa fa-tags pr-2"></i>{{$post['categoria']['nombre']}}--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <span><i class="fa fa-user pr-2 text-g-dark-light small"></i><small class="text-g-dark-light">{{$post['user']['name']}}</small></span>
                            <span class="mx-4"><i class="fa fa-calendar pr-2 text-g-dark-light small"></i><small class="text-g-dark-light">{{date('d/m/Y', strtotime($post['updated_at']))}}</small></span>
                            <span><i class="fa fa-tags pr-2 text-g-dark-light small"></i><small class="text-g-dark-light">{{$post['categoria']['nombre']}}</small></span>
                            <p class="text-justify">
                                {!!Str::limit($post['detalle'],250,$end='...')!!}
                            </p>
                        </div>
                        <div class="col-12 text-center">
                            <a class="btn btn-outline-g-yellow font-weight-bold btn-sm m-2" href="/blog/{{$post['url']}}">
                                Leer mas
                            </a>
                        </div>
                    </div>
                    <hr class="mb-4">
                @endforeach
                <div class="d-flex px-3 pt-4">
                    <div class="mx-auto">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 p-0 m-0">
{{--                <hr class="hr-warning mt-0">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <p class="h4 text-g-yellow font-weight-bold pb-2">Buscar</p>--}}
{{--                        <form method="POST" action='{{route('buscar_path')}}' >--}}
{{--                            @csrf--}}
{{--                            <div class="input-group">--}}
{{--                                <input type="text" class="form-control" name="buscar" placeholder="Buscar en el blog">--}}
{{--                                <span class="input-group-btn">--}}
{{--                                    <button class="btn btn-g-green" type="submit"><i class="fa fa-search"></i></button>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <hr class="hr-warning">--}}
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
                                        <a href="/blog/{{$post['url']}}">
                                            <img src="{{$post['imagen_miniatura']}}" alt="{{$post['titulo']}}" class="img-fluid float-left miniatura" loading="lazy">
                                        </a>
                                    </div>
                                    <div class="col pl-2">
                                        <a href="/blog/{{$post['url']}}">
                                            <h6 class="mb-1 small text-g-dark-light font-weight-bold">{{$post['titulo']}}</h6>
                                        </a>
                                        <small class="text-primary"><i class="fa fa-calendar pr-2"></i>{{date('d/m/Y', strtotime($post['updated_at']))}}</small>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
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
