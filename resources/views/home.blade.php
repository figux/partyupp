@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    @isset($mensaje)
                        <h2>{{$mensaje}}</h2>
                    @endisset
                    
                    <button onclick="getLocation();">Buscar Bares</button>
                    <button onclick="calificar();">Calificar</button>

                </div>
            </div>
        </div>



        <div class="col-md-8" id="divBares" style="display: none">
            <div class="card">
                <div class="card-header">Bares</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <ul id="demo"></ul>


                </div>
            </div>
        </div>


        <div class="col-md-8" id="divDonde" style="display: none">
            <div class="card">
                <div class="card-header">Calificar</div>

                <div class="card-body">

                    <!-- Si hay mas de un bar mostrar opciones y el usuario debe seleccionar donde esta...  -->
                    <!-- Validar que el usuario no pueda escribir mas de un comentario por dia... -->
                   
                    <form name="rateForm" method="post" action="{{ URL::to('actualizarBar') }}" >

                        <h2 id="barName"></h2>

                        @csrf

                        <input name="idBar" id="idBar" type="hidden" />

                        <input name="rate" type="radio" value="1" />1
                        <input name="rate" type="radio" value="2" />2
                        <input name="rate" type="radio" value="3" />3
                        <input name="rate" type="radio" value="4" />4
                        <input name="rate" type="radio" value="5" />5

                        <br /><br />

                        <textarea name="comentario"></textarea>

                        <br /><br />

                        <button type="submit" name="rateButton">Calificar</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        
        

        function getLocation() {
            if (navigator.geolocation) {
                $('#divBares').show();
                $('#divDonde').hide();

                //navigator.geolocation.getCurrentPosition(showPosition);
                showPosition(null);
            } else { 
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            var coor = {};
            //coor.latitude = position.coords.latitude;
            //coor.longitude = position.coords.longitude;

            coor.latitude = 4.7514133;
            coor.longitude = -74.0908737;

            // We use Axios to perform a POST request.
            axios.post('{{ URL::to("search") }}', {
                latitude: coor.latitude,
                longitude: coor.longitude
            })
            .then(function(response) {

                var data = response.data;
                var bar = {};
                for (var i = data.length - 1; i >= 0; i--) {
                    bar = data[i];
                    $('#demo').append('<li>'+bar.name+' ('+ bar.rate +') Distancia: '+bar.distancia+' metros</li>');
                };
                
            })
            .catch(function(error) {
                console.log(error);
            });


        }

        function calificar(){
            if (navigator.geolocation) {
                $('#divDonde').show();
                $('#divBares').hide();

                //navigator.geolocation.getCurrentPosition(showPosition);
                rateBar(null);
            } else { 
                alert("Geolocation is not supported by this browser.");
            }
        }

        function rateBar(position) {
            var coor = {};
            //coor.latitude = position.coords.latitude;
            //coor.longitude = position.coords.longitude;

            coor.latitude = 4.7514133;
            coor.longitude = -74.0908737;

            // We use Axios to perform a POST request.
            axios.post('{{ URL::to("rate") }}', {
                latitude: coor.latitude,
                longitude: coor.longitude
            })
            .then(function(response) {

                var data = response.data;
                var bar = {};

                if(data.length == 1){


                    $('#barName').html(data[0].name);
                    $('#idBar').val(data[0].id);
                    


                }else if(data.length > 1){
                    for (var i = data.length - 1; i >= 0; i--) {
                        bar = data[i];
                        $('#demo').append('<li>'+bar.name+' ('+ bar.rate +') Distancia: '+bar.distancia+' metros</li>');
                    };    
                }

                
                
            })
            .catch(function(error) {
                console.log(error);
            });

        }


    </script>
@endsection
