@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar
                </div>

                <div class="card-body">

                    <form name="bar" method="POST" action="{{ route('barUpdate', ['id'=>$bar->id])}}">
                        
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" name="name" value="{{$bar->name}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Descripcion</label>
                            <textarea class="form-control"  rows="3" name="description" >{{$bar->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Cover</label>  
                            <input type="number" rows="3" name="cover" value="{{$bar->cover}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleText">Estado</label>  
                            <input type="numbre" name="state" value="{{$bar->state}}">
                        </div>
                        <div class="form-group">
                            <label >Lat</label>
                            <input type="text" class="form-control" id="lat" name="lat" value="{{$bar->lat}}">
                            <label>Lng</label>
                            <input type="text" class="form-control" id="lng" name="lng" value="{{$bar->lng}}">
                          </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection