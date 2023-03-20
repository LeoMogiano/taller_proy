@extends('adminlte::page')

@section('title', 'PROSALUD+')


@section('content_header')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <center>
        <h1>Bienvenidos a PROSALUD</h1>
    </center>

@stop

@section('content')

    <div class="carta">
        <img src="{{ asset('img/portada.png') }}" alt="Descripción de la imagen">
        <div class="contenido">
            <h2> 37 AÑOS ESTANDO CONTIGO!</h2>
            <p>Estamos felices por compartir 37 años con ustedes y poder entregar un serveicio de excelencia en la atención
                médica. Gracias por cuidar de nuestra salud y bienestar, y por seguir brindando servicios de calidad a
                nuestra comunidad</p>
        </div>
    </div>



    <p>Somos una organización Boliviana, privada sin fines de lucro, que nace un 21 de agosto de 1985 que desarrolla sus
        actividades en el marco de la Política Nacional de Salud, contribuyendo en la tarea de extender el acceso, la
        cobertura y mejorar la calidad de los servicios de salud al alcance de todos los bolivianos.</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


@stop

@section('js')
    <script src="asset('js/app.js')"></script>
    <script>
        // Ocultar alerta después de 5 segundos
        setTimeout(function() {
            $(".alert").alert('close');
        }, 3000);
    </script>
@stop
