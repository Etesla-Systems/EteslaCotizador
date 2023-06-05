<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>¡Bienvenidos!</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/login.css" rel="stylesheet">
    </head>

    <body>
        <section id="contenidoLogin" class="login">
            <div class="cont">
                @yield('content')

                <div>
                    <img src="{{asset('assets/img/etesla_planta.png')}}" class="pequeña">
                </div>
            </div>
        </section>
    </body>
</html>
