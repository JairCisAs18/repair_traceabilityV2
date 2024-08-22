<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url ('styles/header-style.css') }}">
    <link rel="stylesheet" href="{{ url ('styles/content-style.css') }}">
    <title>Reparación</title>
</head>
<header>
    <div id="logo">
        <img src="{{ url('/images/logo.png') }}" alt="">
    </div>
    <div id="title">
        <h2>Sistema de trazabilidad para la reparación de piezas</h2>
    </div>
</header>
<nav>
    <div class="col"><a href="{{ route('main') }}"><h3>Entradas</h3></a></div>
    <div class="col"><a href="{{ route('scrapParts') }}"><h3>Scrap</h3></a></div>
    <div class="col"><a href="{{ route('repairedParts') }}"><h3>Reparadas</h3></a></div>
</nav>
</html>