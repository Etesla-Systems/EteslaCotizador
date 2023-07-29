<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>@yield('window')</title>
</head>

<body id="body-pd">
<div class="container-fluid">
    @include('cotizador.includes.navbar')
    @include('cotizador.includes.sidebar')
    <main>
        @yield('content')
    </main>
</div>

<!-- Loading Spinner -->
<div class="loading-spinner"></div>
<!-- Fin Loading Spinner -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/alert-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/index.js') }}"></script> <!-- Este archivo es necesario para el CP y buscador -->
<script src="{{ asset('js/log.js') }}"></script>
<script src="{{ asset('js/cotizador/cliente.js') }}"></script>
<script src="{{ asset('js/cotizador/individual.js') }}"></script>
<script src="{{ asset('js/cotizador/bajaTension.js') }}"></script>
<script src="{{ asset('js/cotizador/mediaTension.js') }}"></script>
<script src="{{ asset('js/cotizador/cotizador.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        myAlert();
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

<script type="text/javascript">
    $("#switch-2").change(function () {
        if ($('#switch-2').prop('checked')) {

            for (var count = 2; count <= 12; count++) {
                $("#men-val-" + count).attr("readonly", "readonly");
                $("#men-val-" + count + "a").attr("readonly", "readonly");

                var value1 = $("#men-val-1").val();
                var value2 = $("#men-val-1a").val();

                $("#men-val-" + count).val(value1);
                $("#men-val-" + count + "a").val(value2);
            }
        } else {
            for (var count = 2; count <= 12; count++) {
                $("#men-val-" + count).removeAttr("readonly", "readonly");
                $("#men-val-" + count + "a").removeAttr("readonly", "readonly");
            }
        }
    });

    // Función invocada por el input, agrega su valor a los demás.
    $("#men-val-1").keyup(function () {
        if ($('#switch-2').prop('checked')) {
            for (var count = 2; count <= 12; count++) {
                var value = $(this).val();

                $("#men-val-" + count).val(value);
            }
        }
    });

    $("#men-val-1a").keyup(function () {
        if ($('#switch-2').prop('checked')) {
            for (var count = 2; count <= 12; count++) {
                var value = $(this).val();

                $("#men-val-" + count + "a").val(value);
            }
        }
    });
</script>

</body>

</html>
