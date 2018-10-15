<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Bar;

class BaresController extends Controller
{
    public function index(){
    	$bares = Bar::all();
    	return view('bares.list', ['bares'=>$bares]);


    	
    }
    public function new(){
    	$bar = new Bar();
    	return view('bares.form',['bar'=>$bar]);
    }

    public function store(Request $request){
    	$bar = new Bar();
    	$bar->name=$request->name;
    	$bar->description=$request->description;
    	$bar->cover=$request->cover;
    	$bar->state=$request->state;
    	$bar->save();

    	return redirect('bares');
    }
}
