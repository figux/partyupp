@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Dashboard
 	            </div>

                <div class="card-body">
                    <form name="bar" method="POST" action="{{ route('barSave') }}">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea">Descripcion</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3" name="description"></textarea>
                      </div>
                     <div class="form-group">
                        <label for="exampleTextarea">Cover</label>  
                        <input type="number" id="exampleTextarea" rows="3" name="cover"></textarea>
                      </div>

                        <input type="hidden" name="state" value="1">

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection