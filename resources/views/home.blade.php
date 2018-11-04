@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <p id="demo"></p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script>
        var x = document.getElementById("demo");
        getLocation();

        function getLocation() {
            if (navigator.geolocation) {
                //navigator.geolocation.getCurrentPosition(showPosition);
                showPosition(null);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
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
                console.log(response);
                resultEl.innerHTML = generateSuccessHTMLOutput(response);
            });


        }


    </script>
@endsection
