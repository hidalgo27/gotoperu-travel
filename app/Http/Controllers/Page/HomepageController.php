<?php

namespace App\Http\Controllers\Page;

use App\TCategoria;
use App\TDestino;
use App\THotel;
use App\THotelDestino;
use App\TInquire;
use App\TItinerarioImagen;
use App\TPaquete;
use App\TPaqueteCategoria;
use App\TPaqueteDestino;
use App\TPaqueteDificultad;
use App\TPasajero;
use App\TTeam;
use App\TTour;
use App\TBlog_post;
use App\TBlog_categoria;
use App\TSeo;
use App\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
//use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Jenssegers\Agent\Agent;

class HomepageController extends Controller
{

    public function index(){
        SEOMeta::setTitle('Paquetes de Viajes y Tour a Machu Picchu en Perú 2021');
        SEOMeta::setDescription('¡Reserva! Viajes y Paquetes Turísticos a Machu Picchu, Nuestros Expertos Operadores de Tours el Ayudaran a Planificar los Mejores Paquetes y Destinos en Perú');
        SEOMeta::setCanonical('https://gotoperu.co/');

        OpenGraph::setDescription('¡Reserva! Viajes y Paquetes Turísticos a Machu Picchu, Nuestros Expertos Operadores de Tours el Ayudaran a Planificar los Mejores Paquetes y Destinos en Perú');
        OpenGraph::setTitle('Paquetes de Viajes y Tour a Machu Picchu en Perú 2021');
        OpenGraph::setUrl('https://gotoperu.co/');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage('https://gotoperu.co/images/destinos-y-paquetes-en-peru.jpg' , ['height' => 741, 'width' => 810]);

        $paquete = TPaquete::with('paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')->get();
        $tours = TTour::with('tours_destinos.destinos')->get();

        $categoria = TCategoria::all();
        $destino = TDestino::where('estado', 1)->get();

        $agent = new Agent();

        $posts=TBlog_post::latest()
        ->take(3)
        ->with(['user','categoria','imagenes'])
        ->get();

        return view('page.home',
            compact(
                'paquete',
                'tours',
                'categoria',
                'destino',
                'posts',
                'agent'
            ));
    }

    public function agregar(Request $request){
        $var = ''; $var2 = ''; $var3 = '';
        if ($request->destinoSelected){
            foreach ($request->destinoSelected as $destinos){
                if (isset($destinos)){
                    $var.=$destinos.',';
                }
            }
        }else{
            $var = 0;
        }

        $nombre2 = explode(',',$var);

        if (($request->categoriaSelected)){
            foreach ($request->categoriaSelected as $categoria){
                if (isset($categoria)){
                    $var2.=$categoria.',';
                }
            }
        }else{
            $var2 = 0;
        }
        $category_arr = explode(',',$var2);

        if (($request->tiempoSelected)){
            foreach ($request->tiempoSelected as $duration){
                if (isset($duration)){
                    $var3.=$duration;
                }
            }
            $duration_e = explode('-', $var3);
            $duration1 = $duration_e[0];
            $duration2 = $duration_e[1];
        }else{
            $var3 = 0;
        }

        if ($var AND $var2 == 0 AND $var3 == 0){
            $paquetes = TPaquete::with([
                'precio_paquetes',
                'paquetes_destinos'
                =>function ($query) use ($nombre2) {
                    $query->whereIn('iddestinos', $nombre2);
                }])->get();
        }

        if ($var == 0 AND $var2 AND $var3 == 0){
            $paquetes = TPaquete::with([
                'precio_paquetes',
                "paquetes_categoria"=>function ($query) use ($category_arr) {
                    $query->whereIn('idcategoria', $category_arr);
                }
            ])->get();
        }

        if ($var == 0 AND $var2 == 0 AND $var3){
            $paquetes = TPaquete::whereBetween('duracion', [$duration1, $duration2])->get();
        }

        if ($var == 0 AND $var2 == 0 AND $var3 == 0){
            $paquetes = 0;
        }

        if ($var AND $var2 AND $var3 == 0){
            $paquetes = TPaquete::with([
                'precio_paquetes',
                "paquetes_categoria"=>function ($query) use ($category_arr) {
                    $query->where('idcategoria', $category_arr);
                },
                'paquetes_destinos'
                =>function ($query) use ($nombre2) {
                    $query->whereIn('iddestinos', $nombre2);
                }])->get();
        }

        if ($var AND $var2 == 0 AND $var3){
            $paquetes = TPaquete::with([
                'precio_paquetes',
                'paquetes_destinos'
                =>function ($query) use ($nombre2) {
                    $query->whereIn('iddestinos', $nombre2);
                }])->whereBetween('duracion', [$duration1, $duration2])->get();
        }

        if ($var == 0 AND $var2 AND $var3){
            $paquetes = TPaquete::with([
                'precio_paquetes',
                "paquetes_categoria"=>function ($query) use ($category_arr) {
                    $query->where('idcategoria', $category_arr);
                }])->whereBetween('duracion', [$duration1, $duration2])->get();
        }

        if ($var AND $var2 AND $var3){
            $paquetes = TPaquete::with([
                'precio_paquetes',
                "paquetes_categoria"=>function ($query) use ($category_arr) {
                    $query->where('idcategoria', $category_arr);
                },
                'paquetes_destinos'
                =>function ($query) use ($nombre2) {
                    $query->whereIn('iddestinos', $nombre2);
                }])->whereBetween('duracion', [$duration1, $duration2])->get();
        }


//        $paquetes = TPaqueteDestino::with('paquetes','destinos')->whereIn('iddestinos', $nombre2)->get();

        $destinations = TPaqueteDestino::with('destinos')->get();
        $category = TPaqueteCategoria ::with('categoria')->get();


        return response()->json(
            [
                'all_package' => [
                    'package' => $paquetes,
                    'destinations' => $destinations,
                    'category' => $category
                ]
        ]);

//        return "ok";

//            return Response::json($request->destinosNueva, 200);
//        $nota = new Nota();
//        $nota->nombre = $request->nombre;
//        $nota->descripcion = $request->descripcion;
//        $nota->user_id = auth()->id();
//        $nota->save();
    }
    public function load(Request $request){
        $paquetes = TPaquete::with('precio_paquetes')->where('estado',1)->get();
        $destinations = TPaqueteDestino::with('destinos')->get();
        $category = TPaqueteCategoria ::with('categoria')->get();
        return response()->json(
            [
                'all_package' => [
                    'package' => $paquetes,
                    'destinations' => $destinations,
                    'category' => $category
                ]
            ]);

    }

    public function load_all(Request $request){
        $paquetes = TPaquete::with('precio_paquetes')->get();
        $destinations = TPaqueteDestino::with('destinos')->get();
        $category = TPaqueteCategoria ::with('categoria')->get();
        return response()->json(
            [
                'all_package' => [
                    'package' => $paquetes,
                    'destinations' => $destinations,
                    'category' => $category
                ]
            ]);

    }

    public function formulario_diseno(Request $request)
    {

        $from = 'info@gotoperu.com';

        $category_all = '';
        if ($request->category_d){
            foreach ($request->category_d as $categorias){
                if (isset($categorias)){
                    $category_all.=$categorias.',';
                }
            }
        }

        $destination_all = '';
        if ($request->destino_d){
            foreach ($request->destino_d as $destinos){
                if (isset($destinos)){
                    $destination_all.=$destinos.',';
                }
            }
        }

//        $travellers_all = '';
//        if ($request->pasajeros_d){
//            foreach ($request->pasajeros_d as $pasajeros){
//                if (isset($pasajeros)){
//                    $travellers_all.=$pasajeros.',';
//                }
//            }
//        }

//        $travellers = $request->pasajeros_d; // Suponiendo que este es el array
//
//        if (is_array($travellers) && count($travellers) === 1) {
//            $travellers = intval($travellers[0]);
//        } else {
//            $travellers = null; // O un valor predeterminado si no cumple las condiciones
//        }

        $duration_all = '';
        if ($request->duracion_d){
            foreach ($request->duracion_d as $duracion){
                if (isset($duracion)){
                    $duration_all.=$duracion.',';
                }
            }
        }

        $travellers_all = '';
        if ($request->pasajeros_d){
            $travellers_all = $request->pasajeros_d;
        }

        $nombre = '';
        if ($request->el_nombre){
            $nombre = $request->el_nombre;
        }

        $email = '';
        if ($request->el_email){
            $email = $request->el_email;
        }

        $fecha = '';
        if ($request->el_fecha){
            $fecha = $request->el_fecha;
        }

        $telefono = '';
        if ($request->el_telefono){
            $telefono = $request->el_telefono;
        }

        $country = '';
        if ($request->country){
            $country = $request->country;
        }

        $comentario = '';
        if ($request->el_textarea){
            $comentario = $request->el_textarea;
        }

//        $inquire = new TInquire();
//        $inquire->hotel = $category_all;
//        $inquire->destinos = $destination_all;
//        $inquire->pasajeros = $travellers_all;
//        $inquire->duracion = $duration_all;
//        $inquire->nombre = $nombre;
//        $inquire->email = $email;
//        $inquire->fecha = $fecha;
//        $inquire->telefono = $telefono;
//        $inquire->comentario = $comentario;
//        $inquire->save();

        try {
            $travelDay = Carbon::parse($request->el_fecha);
            $formattedDate = $travelDay->format('Y-m-d H:i:s');
            $inquireDate = Carbon::now('America/Lima')->format('Y-m-d H:i:s');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Fecha inválida.'], 400);
        }


        $agent = new Agent();
        $device = $agent->isMobile() ? 'Móvil' : ($agent->isTablet() ? 'Tablet' : 'Desktop');
        $browser = $agent->browser();

        $data = [
            "category_d" => $request->category_d,
            "destino_d" => $request->destino_d, // Aquí puedes agregar los destinos si los tienes
            "pasajeros_d" => $request->pasajeros_d,
            "duracion_d" => $request->duracion_d,
            "el_nombre" => $request->el_nombre,
            "el_email" => $request->el_email,
            "el_fecha" => $formattedDate, // O puedes usar $this->travel_day si es relevante
            "el_telefono" => $request->el_telefono,
            "el_textarea" => $request->el_textarea,
            'codigo_pais' => $request->country_code,
            'country' => $request->country,
            'device' => $device,
            'browser' => $browser,
            'origen' => "Web",
            'producto' => "gotoperu.tours",
            'inquire_date' => $inquireDate
        ];

        $data2 = [
            "product_id" => 4,
            "package"=>'',
            "hotel_category" => array_values($request->category_d),
            "destinations" => array_values($request->destino_d),
            "passengers" => $request->pasajeros_d,
            "duration" => array_values($request->duracion_d),
            "travel_date"=>$formattedDate,
            "country"=>$request->country,
            "country_code"=>$request->country_code,
            "device"=>$device,
            "origin"=>"Web",
            "browser"=>$browser,
            "name"=>$request->el_nombre,
            "email"=>$request->el_email,
            "phone"=>$request->el_telefono,
            "comment"=>$request->el_textarea,
            "initial_price"=>0,
            "inquiry_date"=>$inquireDate,
            "dialCode"=>'',

        ];

//        dd($data);
//        $response = Http::post('https://api.gotoecuador.com/api/store/inquire', $data);

        try {
            $client = new Client();
            $response = $client->post('https://api.gotoecuador.com/api/store/inquire', [
                'json' => $data
            ]);
            $responseData = json_decode($response->getBody(), true);

            $response2 = $client->post('https://app.g1.agency/api/v1/leads/', [
                'json' => $data2
            ]);
            $responseData2 = json_decode($response2->getBody(), true);

            if ($responseData AND $responseData2){
                try {
                    Mail::send(['html' => 'notifications.page.client-form-design'], ['nombre' => $nombre], function ($messaje) use ($email, $nombre) {
                        $messaje->to($email, $nombre)
                            ->subject('GotoPeru')
                            /*->attach('ruta')*/
                            ->from('info@gotoperu.com', 'GotoPeru');
                    });
                    Mail::send(['html' => 'notifications.page.admin-form-contact'], [
                        'category_all' => $category_all,
                        'destination_all' => $destination_all,
                        'travellers_all' => $travellers_all,
                        'duration_all' => $duration_all,

                        'nombre' => $nombre,
                        'email' => $email,
                        'fecha' => $fecha,
                        'telefono' => $telefono,
                        'comentario' => $comentario,

                        'country' => $country

                    ], function ($messaje) use ($from) {
                        $messaje->to($from, 'GotoPeru')
                            ->subject('GotoPeru')
//                    ->cc($from2, 'GotoPeru')
                            /*->attach('ruta')*/
                            ->from('info@gotoperu.com', 'GotoPeru');
                    });

                    return 'Thank you.';
                }
                catch (Exception $e){
                    return response()->json(['error' => 'Error al enviar correos: ' . $e->getMessage()], 500);
                }
            }else{
                return response()->json(['error' => 'Hubo un problema enviando la información al servicio.'], 500);

            }
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $errorResponse = $e->getResponse()->getBody()->getContents();
                return response()->json(['error' => $errorResponse], 500);
            }
            return response()->json(['error' => 'Error al conectar con el servicio.'], 500);
        }



    }


    public function formulario_detail(Request $request)
    {

        $from = 'info@gotoperu.com';

        $category_all = '';
        if ($request->category_d){
            foreach ($request->category_d as $categorias){
                if (isset($categorias)){
                    $category_all.=$categorias.',';
                }
            }
        }

//        $travellers_all = '';
//        if ($request->pasajeros_d){
//            foreach ($request->pasajeros_d as $pasajeros){
//                if (isset($pasajeros)){
//                    $travellers_all.=$pasajeros.',';
//                }
//            }
//        }

//        $travellers = $request->pasajeros_d; // Suponiendo que este es el array
//
//        if (is_array($travellers) && count($travellers) === 1) {
//            $travellers = intval($travellers[0]);
//        } else {
//            $travellers = null; // O un valor predeterminado si no cumple las condiciones
//        }

        $duration_all = '';
        if ($request->duracion_d){
            foreach ($request->duracion_d as $duracion){
                if (isset($duracion)){
                    $duration_all.=$duracion.',';
                }
            }
        }

        $titulo_package = '';
        if ($request->paquete_id){
            $titulo_p = TPaquete::find($request->paquete_id);
            $titulo_package = $titulo_p->titulo;
        }

        $travellers_all = '';
        if ($request->pasajeros_d){
            $travellers_all = $request->pasajeros_d;
        }

        $nombre = '';
        if ($request->el_nombre){
            $nombre = $request->el_nombre;
        }

        $email = '';
        if ($request->el_email){
            $email = $request->el_email;
        }

        $fecha = '';
        if ($request->el_fecha){
            $fecha = $request->el_fecha;
        }

        $telefono = '';
        if ($request->el_telefono){
            $telefono = $request->el_telefono;
        }

        $country = '';
        if ($request->country){
            $country = $request->country;
        }

        $comentario = '';
        if ($request->el_textarea){
            $comentario = $request->el_textarea;
        }

        // Parsear la fecha recibida de Livewire, que probablemente esté en un formato legible como "9 Oct 2024"
        $travelDay = Carbon::parse($request->el_fecha);

        // Formatear la fecha a ISO 8601 ("Y-m-d\TH:i:s.v\Z"), que es el formato deseado
//        $formattedDate = $travelDay->format('Y-m-d\TH:i:s.v\Z');
        $formattedDate = $travelDay->format('Y-m-d H:i:s');

        $inquireDate = Carbon::now('America/Lima')->format('Y-m-d H:i:s');


        $agent = new Agent();
        $device = $agent->isMobile() ? 'Móvil' : ($agent->isTablet() ? 'Tablet' : 'Desktop');
        $browser = $agent->browser();

        $data = [
            "package" => $titulo_package,
            "category_d" => $request->category_d,
            "destino_d" => [], // Aquí puedes agregar los destinos si los tienes
            "pasajeros_d" => $request->pasajeros_d,
            "duracion_d" => [],
            "el_nombre" => $request->el_nombre,
            "el_email" => $request->el_email,
            "el_fecha" => $formattedDate, // O puedes usar $this->travel_day si es relevante
            "el_telefono" => $request->el_telefono,
            "el_textarea" => $request->el_textarea,
            'codigo_pais' => $request->country_code,
            'country' => $request->country,
            'device' => $device,
            'browser' => $browser,
            'origen' => "Web",
            'producto' => "gotoperu.tours",
            'inquire_date' => $inquireDate
        ];

        $data2 = [
            "product_id" => 4,
            "package"=>$titulo_package,
            "hotel_category" => array_values($request->category_d),
            "destinations" => [],
            "passengers" => $request->pasajeros_d,
            "duration" => [],
            "travel_date"=>$formattedDate,
            "country"=>$request->country,
            "country_code"=>$request->country_code,
            "device"=>$device,
            "origin"=>"Web",
            "browser"=>$browser,
            "name"=>$request->el_nombre,
            "email"=>$request->el_email,
            "phone"=>$request->el_telefono,
            "comment"=>$request->el_textarea,
            "initial_price"=>0,
            "inquiry_date"=>$inquireDate,
            "dialCode"=>'',
        ];

//        $response = Http::post('https://api.gotoecuador.com/api/store/inquire', $data);

        $client = new Client();
        $response = $client->post('https://api.gotoecuador.com/api/store/inquire', [
            'json' => $data
        ]);
        $responseData = json_decode($response->getBody(), true);

//        $inquire = new TInquire();
//        $inquire->hotel = $category_all;
//        $inquire->pasajeros = $travellers_all;
//        $inquire->duracion = $duration_all;
//        $inquire->nombre = $nombre;
//        $inquire->email = $email;
//        $inquire->fecha = $fecha;
//        $inquire->telefono = $telefono;
//        $inquire->comentario = $comentario;

        $response2 = $client->post('https://app.g1.agency/api/v1/leads/', [
            'json' => $data2
        ]);
        $responseData2 = json_decode($response2->getBody(), true);

        if ($responseData AND $responseData2){
            try {
                Mail::send(['html' => 'notifications.page.client-form-design'], ['nombre' => $nombre], function ($messaje) use ($email, $nombre) {
                    $messaje->to($email, $nombre)
                        ->subject('GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru');
                });
                Mail::send(['html' => 'notifications.page.admin-form-contact-detail'], [
                    'category_all' => $category_all,
                    'travellers_all' => $travellers_all,
                    'duration_all' => $duration_all,

                    'titulo_p' => $titulo_package,
                    'nombre' => $nombre,
                    'email' => $email,
                    'fecha' => $fecha,
                    'telefono' => $telefono,
                    'comentario' => $comentario,
                    'country' => $country

                ], function ($messaje) use ($from) {
                    $messaje->to($from, 'GotoPeru')
                        ->subject('GotoPeru')
//                    ->cc($from2, 'GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.com', 'GotoPeru');
                });

                return 'Thank you.';
            }
            catch (Exception $e){
                return $e;
            }
        }else{
            return response()->json(['error' => 'Hubo un problema enviando la información al servicio.'], 500);

        }
    }

    public function packages(){
        SEOMeta::setTitle('Paquetes Turísticos a Machu Picchu 2021/2022 | Go To Perú');
        SEOMeta::setDescription('Elige los Mejores Paquetes Turísticos a Machu Picchu, Montañas de Colores y Paquetes de Viaje Para Parejas. Encuentra tu Paquete Turístico en ¡Cusco 2021!⛱');
        SEOMeta::setCanonical('https://gotoperu.co/packages');

        OpenGraph::setDescription('Elige los Mejores Paquetes Turísticos a Machu Picchu, Montañas de Colores y Paquetes de Viaje Para Parejas. Encuentra tu Paquete Turístico en ¡Cusco 2021!⛱');
        OpenGraph::setTitle('Paquetes Turísticos a Machu Picchu 2021/2022 - Go To Perú');
        OpenGraph::setUrl('https://gotoperu.co/packages');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage('https://gotoperu.co/images/destinos-y-paquetes-en-peru.jpg' , ['height' => 741, 'width' => 810]);

        return view('page.packages');
    }


    public function detail($url){

        $paquete = TPaquete::where('url', $url)->get();
        $dificultad = TPaqueteDificultad::all();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
        //SEO
        $seo=TSeo::where('estado','1')->where('id_t',$paquete->first()->id)->get();
        //seo etiquetas
        if($seo->count()>0){
            SEOMeta::setTitle($seo->first()->titulo);
            SEOMeta::setDescription($seo->first()->descripcion);
            SEOMeta::setCanonical($seo->first()->url);
            if($seo->first()->keywords){
                SEOMeta::addKeyword([$seo->first()->keywords]);
            }

            OpenGraph::setDescription($seo->first()->descripcion);
            OpenGraph::setTitle($seo->first()->titulo);
            OpenGraph::setUrl($seo->first()->url);
            OpenGraph::addProperty('type', $seo->first()->og_tipo);
            OpenGraph::addProperty('locale', $seo->first()->localizacion);
            OpenGraph::setSiteName($seo->first()->nombre_sitio);
            OpenGraph::addImage($seo->first()->imagen, ['height' => $seo->first()->imagen_height, 'width' => $seo->first()->imagen_width]);

            if($seo->first()->microdata){
                JsonLd::setTitle($seo->first()->microdata);
            }
        }else{
            SEOMeta::setTitle($paquete->first()->titulo);
            SEOMeta::setCanonical("https://gotoperu.co/paquetes/".$url);

            OpenGraph::setTitle($paquete->first()->titulo);
            OpenGraph::setUrl("https://gotoperu.co/paquetes/".$url);
            OpenGraph::addImage($paquete->first()->imagen, ['height' => 280, 'width' => 420]);
        }
        return view('page.detail', compact('paquete', 'dificultad', 'paquete_destinos'));

    }

    public function category(){

        $categoria = TCategoria::all()->sortBy('nombre');
        return view('page.packages-category', compact('categoria'));

    }
    public function category_show($url){
        $categoria = TCategoria::where('url', $url)->get();

        foreach ($categoria as $c_s) {
            $categoria_all = TPaqueteCategoria::with('paquete', 'categoria')->where('idcategoria', $c_s->id)->get();
        }

        $all_category = TCategoria::all();
        //SEO
        $seo=TSeo::where('estado','3')->where('id_t',$categoria->first()->id)->get();
        //seo etiquetas
        if($seo->count()>0){
            SEOMeta::setTitle($seo->first()->titulo);
            SEOMeta::setDescription($seo->first()->descripcion);
            SEOMeta::setCanonical($seo->first()->url);
            if($seo->first()->keywords){
                SEOMeta::addKeyword([$seo->first()->keywords]);
            }

            OpenGraph::setDescription($seo->first()->descripcion);
            OpenGraph::setTitle($seo->first()->titulo);
            OpenGraph::setUrl($seo->first()->url);
            OpenGraph::addProperty('type', $seo->first()->og_tipo);
            OpenGraph::addProperty('locale', $seo->first()->localizacion);
            OpenGraph::setSiteName($seo->first()->nombre_sitio);
            OpenGraph::addImage($seo->first()->imagen, ['height' => $seo->first()->imagen_height, 'width' => $seo->first()->imagen_width]);

            if($seo->first()->microdata){
                JsonLd::setTitle($seo->first()->microdata);
            }
        }else{
            SEOMeta::setTitle("Paquetes o Tours ".$categoria->first()->nombre);
            SEOMeta::setCanonical("https://gotoperu.co/category/".$url);
        }
        return view('page.packages-category-show', compact('categoria', 'categoria_all', 'all_category'));

    }

    public function destination(){

//        $destinos_id = TDestino::with('destino_imagen')->where('nombre', $ciudad)->get();

        SEOMeta::setTitle('Tours, Destinos Turísticos en Perú 2021/2022 | GoToPeru');
        SEOMeta::setDescription('Tours destacados y Los mejores Destinos en Perú. ¡GotoPeru! Realiza Operaciones Turísticas en los  Atractivos mas Icónicos del Perú.');
        SEOMeta::setCanonical('https://gotoperu.co/destination');

        OpenGraph::setDescription('Tours destacados y Los mejores Destinos en Perú. ¡GotoPeru! Realiza Operaciones Turísticas en los  Atractivos mas Icónicos del Perú.');
        OpenGraph::setTitle('Tours, Destinos Turísticos en Perú 2021/2022 | GoToPeru');
        OpenGraph::setUrl('https://gotoperu.co/destination');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage('http://gotoperu.com.mx/images/destinos-y-paquetes-en-peru.jpg' , ['height' => 741, 'width' => 810]);

        $destino = TDestino::all()->sortBy('nombre');
        return view('page.destinations', compact('destino'));

    }


    public function destination_show($url){
        $destino = TDestino::where('url', $url)->get();
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'paquetes_categoria.categoria')->get();
        $paquetes_de = TPaqueteDestino::with(['destinos'=>function($query) use ($url) { $query->where('url', $url);}])->get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();

        $destinos_all = TDestino::all();

        $ubicacion = \GoogleMaps::load('geocoding')
            ->setParam (['address' =>''.$url.''])
            ->get();
        $ubicacion = json_decode($ubicacion);

//        dd($ubicacion);
        //SEO
        //seo
        $seo=TSeo::where('estado','2')->where('id_t',$destino->first()->id)->get();
        //seo etiquetas
        if($seo->count()>0){
            SEOMeta::setTitle($seo->first()->titulo);
            SEOMeta::setDescription($seo->first()->descripcion);
            SEOMeta::setCanonical($seo->first()->url);
            if($seo->first()->keywords){
                SEOMeta::addKeyword([$seo->first()->keywords]);
            }

            OpenGraph::setDescription($seo->first()->descripcion);
            OpenGraph::setTitle($seo->first()->titulo);
            OpenGraph::setUrl($seo->first()->url);
            OpenGraph::addProperty('type', $seo->first()->tipo);
            OpenGraph::setSiteName($seo->first()->nombre_sitio);
            OpenGraph::addImage($seo->first()->imagen, ['height' => $seo->first()->imagen_height, 'width' => $seo->first()->imagen_width]);

            if($seo->first()->microdata){
                JsonLd::setTitle($seo->first()->microdata);
            }
        }else{
            SEOMeta::setTitle($destino->first()->nombre);
            SEOMeta::setCanonical("https://gotoperu.co/destination/".$url);

            OpenGraph::setTitle($destino->first()->nombre);
            OpenGraph::setUrl("https://gotoperu.co/destination/".$url);
            OpenGraph::addImage($destino->first()->imagen, ['height' => 900, 'width' => 800]);
        }
        return view('page.destinations-show', compact('paquetes_de', 'destino', 'paquete', 'paquete_destinos', 'ubicacion', 'destinos_all'));
    }

    public function sobre_nosotros(){
        $team = TTeam::all();
        //SEO
        $titulo="Agencia de Viajes y Turismo a Machu Picchu Desde México | GoToPeru";
        $descripcion="En GoToPeru⛱ Somos una Agencia de Viajes y Especialistas en Paquetes Turísticos en Perú.";
        $url="https://gotoperu.co/sobre-nosotros";

        SEOMeta::setTitle($titulo);
        SEOMeta::setDescription($descripcion);
        SEOMeta::setCanonical($url);

        OpenGraph::setDescription($descripcion);
        OpenGraph::setTitle($titulo);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage('http://gotoperu.com.mx/images/destinos-y-paquetes-en-peru.jpg' , ['height' => 741, 'width' => 810]);

        return view('page.about', compact('team'));
    }
    public function faq(){
        return view('page.social');
    }
    public function testimonios(){
        return view('page.dicas');
    }
    public function responsabilidad(){
        $titulo="Responsabilidad Social | GotoPeru 2021/2022";
        $descripcion="En GotoPeru estamos Comprometidos con la Responsabilidad Social y Parte de Nuestra Actividad Turística nos Identifica Con Nuestra Gente en Cusco y Peru.";
        $url="https://gotoperu.co/responsabilidad-social";

        SEOMeta::setTitle($titulo);
        SEOMeta::setDescription($descripcion);
        SEOMeta::setCanonical($url);

        OpenGraph::setDescription($descripcion);
        OpenGraph::setTitle($titulo);
        OpenGraph::setUrl($url);
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addImage('http://gotoperu.com.mx/images/destinos-y-paquetes-en-peru.jpg' , ['height' => 741, 'width' => 810]);

        return view('page.responsabilidad');
    }

    public function callback(Request $request){
        return $request;
    }

    public function rdstation(Request $request){

        $email = $request->input('email');
        $nombre = $request->input('nombre');
        return "hola";
    }
    //blog
    public function blog(){
        //seo
        SEOMeta::setTitle("Blog");
        SEOMeta::setCanonical("https://gotoperu.co/blog");

        $posts=TBlog_post::with(['user','categoria','imagenes'])->paginate(5);
        $categorias_aux = TBlog_categoria::get();
        $categorias = collect();
        foreach ($categorias_aux as $cat) {
            $idCat = $cat->id;
            $consulta = TBlog_post::where('categoria_id',$idCat)->count();
            $categorias->push([$cat->nombre,$consulta]);
        }
        $recentPosts=TBlog_post::latest()->take(3)
            ->with(['user','categoria','imagenes'])
            ->get();
        return view('page.blog',compact('posts','categorias','recentPosts'));
    }
    public function blog_categoria($categoria){
        //seo
        SEOMeta::setTitle("Artículos de ".$categoria);
        SEOMeta::setCanonical("https://gotoperu.co/blog/categoria/".$categoria);

        $categoria_aux=TBlog_categoria::where('nombre',$categoria)->first();
        $posts = TBlog_post::with(['user', 'imagenes', 'categoria'])
            ->where('categoria_id',$categoria_aux->id)->paginate(5);

        $categorias_aux = TBlog_categoria::get();
        $categorias = collect();
        foreach ($categorias_aux as $cat) {
            $idCat = $cat->id;
            $consulta = TBlog_post::where('categoria_id',$idCat)->count();
            $categorias->push([$cat->nombre,$consulta]);
        }
        $recentPosts=TBlog_post::latest()->take(3)
        ->with(['user','categoria','imagenes'])
        ->get();
        //
        return view('page.blog',compact('posts','categorias','recentPosts'));
    }
    public function blog_detail($url){
        $post = TBlog_post::where('url',$url)
            ->with(['user','categoria','imagenes'])
            ->first();

        //SEO
        $seo=TSeo::where('estado','0')->where('id_t',$post->id)->get();
        //seo etiquetas
        if($seo->count()>0){
            SEOMeta::setTitle($seo->first()->titulo);
            SEOMeta::setDescription($seo->first()->descripcion);
            SEOMeta::setCanonical($seo->first()->url);
            if($seo->first()->keywords){
                SEOMeta::addKeyword([$seo->first()->keywords]);
            }

            OpenGraph::setDescription($seo->first()->descripcion);
            OpenGraph::setTitle($seo->first()->titulo);
            OpenGraph::setUrl($seo->first()->url);
            OpenGraph::addProperty('type', $seo->first()->og_tipo);
            OpenGraph::addProperty('locale', $seo->first()->localizacion);
            OpenGraph::setSiteName($seo->first()->nombre_sitio);
            OpenGraph::addImage($seo->first()->imagen, ['height' => $seo->first()->imagen_height, 'width' => $seo->first()->imagen_width]);

            if($seo->first()->microdata){
                JsonLd::setTitle($seo->first()->microdata);
            }
        }
        else{
            SEOMeta::setTitle($post->titulo);
            SEOMeta::setCanonical("https://gotoperu.co/paquetes/".$url);

            OpenGraph::setTitle($post->titulo);
            OpenGraph::setUrl("https://gotoperu.co/blog/".$url);
            OpenGraph::addImage($post->imagen_miniatura, ['height' => 280, 'width' => 420]);
        }

        $categorias_aux = TBlog_categoria::get();
        $categorias = collect();
        foreach ($categorias_aux as $cat) {
            $idCat = $cat->id;
            $consulta = TBlog_post::where('categoria_id',$idCat)->count();
            $categorias->push([$cat->nombre,$consulta]);
        }
        $recentPosts=TBlog_post::latest()->take(3)
            ->with(['user','categoria','imagenes'])
            ->get();

        $categoria=TBlog_post::select('categoria_id')
            ->where('url',$url)
            ->get();
        $postsRelacionados=TBlog_post::where('categoria_id',$categoria[0]->categoria_id)
            ->latest()
            ->take(3)
            ->with(['user','categoria','imagenes'])
            ->get();

        return view('page.blogDetail', compact('post','categorias','recentPosts','postsRelacionados'));
    }


    public function yourtrip($id)
    {
//        dd(Crypt::encrypt($id));

        $id = base64_decode($id);

        $inquire = TPasajero::find($id);

        $t_advisor = User::find($inquire->id_usuario);

        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes', 'imagen_paquetes', 'paquete_incluye', 'paquete_no_incluye')->where('estado', 0)->get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
        $paquete_iti = TPaquete::with('paquete_itinerario','paquetes_destinos', 'precio_paquetes', 'paquetes_categoria')->where('id', $inquire->id_paquete)->get();

        $hoteles = THotel::all();
        $hoteles_destinos = THotelDestino::all();

//        $vuelo = TVuelo::all();
//        $paquete_vuelo = TPaqueteVuelo::with('vuelos')->get();

        $dificultad = TPaqueteDificultad::all();
//        $comentario = TComentario::with('itinerario')->get();

        $imagen = TItinerarioImagen::with('itinerario')->get();

        return view('page.yourtrip', compact('paquete_destinos','paquete_iti','hoteles','hoteles_destinos','dificultad','imagen','inquire', 't_advisor'));
    }
}
