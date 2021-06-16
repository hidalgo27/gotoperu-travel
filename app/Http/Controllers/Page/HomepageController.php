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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
//use Illuminate\Support\Facades\Http;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
class HomepageController extends Controller
{
    protected $urlGeneral="https://blog.gotoperu.com.mx";
    public function index(){
        $paquete = TPaquete::with('paquetes_destinos.destinos','paquetes_categoria.categoria', 'precio_paquetes')->get();
        $tours = TTour::with('tours_destinos.destinos')->get();

        $categoria = TCategoria::all();
        $destino = TDestino::where('estado', 1)->get();

        //$res=Http::get('http://jsonplaceholder.typicode.com/posts');
        //$posts=$res->json();
        $client = new Client;
        $posts=$this->consulta_posts_recientes($client);

        return view('page.home',
            compact(
                'paquete',
                'tours',
                'categoria',
                'destino',
                'posts'
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

        $from = 'info@gotoperu.co';

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

        $travellers_all = '';
        if ($request->pasajeros_d){
            foreach ($request->pasajeros_d as $pasajeros){
                if (isset($pasajeros)){
                    $travellers_all.=$pasajeros.',';
                }
            }
        }

        $duration_all = '';
        if ($request->duracion_d){
            foreach ($request->duracion_d as $duracion){
                if (isset($duracion)){
                    $duration_all.=$duracion.',';
                }
            }
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

        $comentario = '';
        if ($request->el_textarea){
            $comentario = $request->el_textarea;
        }

        $inquire = new TInquire();
        $inquire->hotel = $category_all;
        $inquire->destinos = $destination_all;
        $inquire->pasajeros = $travellers_all;
        $inquire->duracion = $duration_all;
        $inquire->nombre = $nombre;
        $inquire->email = $email;
        $inquire->fecha = $fecha;
        $inquire->telefono = $telefono;
        $inquire->comentario = $comentario;
//        $inquire->save();

        if ($inquire->save()){
            try {
                Mail::send(['html' => 'notifications.page.client-form-design'], ['nombre' => $nombre], function ($messaje) use ($email, $nombre) {
                    $messaje->to($email, $nombre)
                        ->subject('GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.co', 'GotoPeru');
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

                ], function ($messaje) use ($from) {
                    $messaje->to($from, 'GotoPeru')
                        ->subject('GotoPeru')
//                    ->cc($from2, 'GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.co', 'GotoPeru');
                });

                return 'Thank you.';
            }
            catch (Exception $e){
                return $e;
            }
        }

    }

    public function formulario_detail(Request $request)
    {

        $from = 'info@gotoperu.co';

        $category_all = '';
        if ($request->category_d){
            foreach ($request->category_d as $categorias){
                if (isset($categorias)){
                    $category_all.=$categorias.',';
                }
            }
        }

        $travellers_all = '';
        if ($request->pasajeros_d){
            foreach ($request->pasajeros_d as $pasajeros){
                if (isset($pasajeros)){
                    $travellers_all.=$pasajeros.',';
                }
            }
        }

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

        $comentario = '';
        if ($request->el_textarea){
            $comentario = $request->el_textarea;
        }

        $inquire = new TInquire();
        $inquire->hotel = $category_all;
        $inquire->pasajeros = $travellers_all;
        $inquire->duracion = $duration_all;
        $inquire->nombre = $nombre;
        $inquire->email = $email;
        $inquire->fecha = $fecha;
        $inquire->telefono = $telefono;
        $inquire->comentario = $comentario;

        if ($inquire->save()){
            try {
                Mail::send(['html' => 'notifications.page.client-form-design'], ['nombre' => $nombre], function ($messaje) use ($email, $nombre) {
                    $messaje->to($email, $nombre)
                        ->subject('GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.co', 'GotoPeru');
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

                ], function ($messaje) use ($from) {
                    $messaje->to($from, 'GotoPeru')
                        ->subject('GotoPeru')
//                    ->cc($from2, 'GotoPeru')
                        /*->attach('ruta')*/
                        ->from('info@gotoperu.co', 'GotoPeru');
                });

                return 'Thank you.';
            }
            catch (Exception $e){
                return $e;
            }
        }
    }

    public function packages(){
        return view('page.packages');
    }


    public function detail($url){

        $paquete = TPaquete::where('url', $url)->get();
        $dificultad = TPaqueteDificultad::all();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
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

        return view('page.packages-category-show', compact('categoria', 'categoria_all', 'all_category'));

    }

    public function destination(){

//        $destinos_id = TDestino::with('destino_imagen')->where('nombre', $ciudad)->get();

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

        return view('page.destinations-show', compact('paquetes_de', 'destino', 'paquete', 'paquete_destinos', 'ubicacion', 'destinos_all'));
    }

    public function sobre_nosotros(){
        $team = TTeam::all();

        return view('page.about', compact('team'));
    }
    public function faq(){
        return view('page.social');
    }
    public function testimonios(){
        return view('page.dicas');
    }
    public function responsabilidad(){
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
        $client = new Client;
        $posts=$this->consulta_posts($client);
        $categorias=$this->consulta_categoria($client);
        $recentPosts=$this->consulta_posts_recientes($client);
        //
        $collection=collect($posts);
        $data = $this->paginate($collection)->setPath(request()->url());
        return view('page.blog',compact('posts','categorias','recentPosts','data'));
    }
    public function paginate($items, $perPage = 5, $page =null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function blog_categoria($categoria){
        $client = new Client;
        $posts = $this->consulta_posts_por_categoria($categoria,$client);
        $categorias=$this->consulta_categoria($client);
        $recentPosts=$this->consulta_posts_recientes($client);
        //
        $a=collect($posts);
        $data = $this->paginate($a);
        return view('page.blog',compact('posts','categorias','recentPosts','data'));
    }
    public function blog_detail($url){
        $client = new Client;
        $post = $this->consulta_post($url,$client);
        $categorias=$this->consulta_categoria($client);
        $recentPosts=$this->consulta_posts_recientes($client);
        $postsRelacionados = $this->consulta_posts_relacionados($url,$client);
        return view('page.blogDetail', compact('post','categorias','recentPosts','postsRelacionados'));
    }
    public function buscar(Request $request){
        return 'hello';
    }
    public function consulta_categoria($client){
        $request2 = $client->get($this->urlGeneral.'/api/v1/categorias-post');
        $response2 = $request2->getBody();
        $categorias = json_decode($response2, true);
        return $categorias;
    }
    public function consulta_posts_recientes($client){
        $request3 = $client->get($this->urlGeneral.'/api/v1/lastPost');
        $response3 = $request3->getBody();
        $recentPosts = json_decode($response3, true);
        return $recentPosts;
    }
    public function consulta_posts_relacionados($url,$client){
        $request4 = $client->get($this->urlGeneral.'/api/v1/post-relacionados/'.$url);
        $response4 = $request4->getBody();
        $postsRelacionados = json_decode($response4, true);
        return $postsRelacionados;
    }
    public function consulta_posts($client){
        $request = $client->get($this->urlGeneral.'/api/v1/posts/');
        $response = $request->getBody();
        $posts = json_decode($response, true);
        return $posts;
    }
    public function consulta_posts_por_categoria($categoria,$client){
        $request = $client->get($this->urlGeneral.'/api/v1/posts/'.$categoria);
        $response = $request->getBody();
        $posts = json_decode($response, true);
        return $posts;
    }
    public function consulta_post($url,$client){
        $request = $client->get($this->urlGeneral.'/api/v1/post/'.$url);
        $response = $request->getBody();
        $post = json_decode($response, true);
        return $post;
    }

    public function yourtrip($id)
    {
//        dd(Crypt::encrypt($id));

        $id = Crypt::decrypt($id);

        $inquire = TPasajero::find($id);

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

        return view('page.yourtrip', compact('paquete_destinos','paquete_iti','hoteles','hoteles_destinos','dificultad','imagen','inquire'));
    }
}
