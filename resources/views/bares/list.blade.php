@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Dashboard
 	
                	<a href="{{route('barCrear')}}" class="btn btn-primary" >Crear Bar</a>
                </div>

                <div class="card-body">
                    <table class="table">

                    	<thead>
                    		<tr>
                    			<td>Nombre</td>
                    			<td>Calificacion</td>
                    			<td>Estado</td>
                    			<td>Reseñas</td>
                    			<td>Opciones</td>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		@foreach ($bares as $bar)
                    		<tr>
                    			<td>
                    				{{ $bar->name }}
                    			</td>
                    			<td>
                    				{{ $bar->rate }}
                    			</td>
                    			<td>
                    				@if ($bar->state == 0)
                    				 	<span class="badge badge-danger">No Activo</span>
                    				@else
                    					<span class="badge badge-success">Activo</span>
                    				@endif
                    			</td>
                    			<td>
                    			<a> Ver</a>                    				
                    			</td>
                    			<td>
                    			<a class="btn btn-secondary" href="{{ route('barEdit', $bar->id) }}" > Editar</a>
                    			<a class="btn btn-warning" href="{{ route('barDelete', $bar->id) }}"> Eliminar</a>                    				
                    			</td>
                    		</tr>
                    		@endforeach

                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection