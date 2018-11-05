<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bar;
use App\Comentario;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $latitude;
    private $longitude;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }

    public function search(Request $request){

        //ToDo: Refactoring...
        $bares = Bar::where('state', 1)->get();

        $this->latitude = $request->latitude * 111;
        $this->longitude = $request->longitude * 111;

        $baresRadio = [];

        foreach ($bares as $bar) {
            $distancia = $this->dentroRadio($bar->lat, $bar->lng);
            if($distancia !== false){
                $bar->distancia = $distancia;
                $baresRadio[] = $bar;
            }
        }

        return json_encode($baresRadio);
    }

    public function rate(Request $request){

        //ToDo: Refactoring...
        $bares = Bar::where('state', 1)->get();

        $this->latitude = $request->latitude * 111;
        $this->longitude = $request->longitude * 111;

        $baresRadio = [];

        foreach ($bares as $bar) {
            $distancia = $this->dentroRadio($bar->lat, $bar->lng, 0.01);
            if($distancia !== false){
                $bar->distancia = $distancia;
                $baresRadio[] = $bar;
            }
        }

        return json_encode($baresRadio);
    }

    public function actualizar(Request $request){

        $comentario = new Comentario();
        $comentario->user_id = Auth::user()->id;
        $comentario->comentario = $request->comentario;
        $comentario->rate = $request->rate;
        $comentario->bar_id = $request->idBar;
        $comentario->save();

        $comentarios = Comentario::where('bar_id', $request->idBar)->get();
        $promedio = $comentarios->avg('rate');

        $bar = Bar::find($request->idBar);
        $bar->rate = $promedio;
        $bar->save();

        return view('home', ['mensaje' => 'Gracias por tu colaboración']);
    }

    private function dentroRadio($lat, $lng, $metros = 1){
        //Kilometros
        $lat = $lat * 111;
        $lng = $lng * 111;
        $sebas = pow(($lat - $this->latitude), 2) + pow(($lng - $this->longitude), 2);

        $return = false;
        if($sebas <= $metros){
            $return = floor($sebas * 1000);
        }

        return $return;

    }

}
