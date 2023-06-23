<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>¡Bienvenidos!</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

        <link href="/css/login.css" rel="stylesheet">
    </head>

    <body>
<<<<<<< HEAD
        @if (session('status-success'))
            <div class="alert alert-success alert-dismissible fade show myAlert" role="alert">
                <strong>¡Correcto!</strong> {{ session('status-success') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session('status-fail'))
            <div class="alert alert-danger alert-dismissible fade show myAlert" role="alert">
                <strong>¡Error!</strong> {{ session('status-fail') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
       @endif

        <!--Sección que contiene la vista "Login"-->
        <section id="contenidoLogin" class="login">
            <div class="cont">
                @yield('content')
=======
        <section id="contenidoLogin" class="login">
            <div class="cont">
                @yield('content')

>>>>>>> 0cc3c4e0559b0fedf25ddace971f0509df7f8d5c
                <div>
                    <img src="{{asset('assets/img/etesla_planta.png')}}" class="pequeña">
                </div>
            </div>
        </section>
<<<<<<< HEAD
        <!--Fin sección que contiene la vista "Login"-->
    </body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <!--==========================================================================================================-->
    <script src="js/log.js"></script>
    <script src="{{ asset('js/alert-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        window.onload = function() {
            myAlert();

            ///
            sessionStorage.removeItem("tarifaMT");
        };

        $(document).ready(function(){
            var height = $(window).height();
            $('#full-screen').height(height);

            $("#vmasbtn").click(function(){
                $("#vmas").hide();
            });

            $("#vmenosbtn").click(function(){
                setTimeout(function() {
                    $("#vmas").show();
                }, 175);
            });
        });
    </script>
</html>


=======
    </body>
</html>
>>>>>>> 0cc3c4e0559b0fedf25ddace971f0509df7f8d5c
