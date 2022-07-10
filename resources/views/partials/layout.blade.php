<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso Laravel | @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<div class="container-fluid">

    @include('partials.nav')

</div>
{{--Muestra la clase active si esta en el home, después de la ? es true : false, ACTIVA
    MENU EN VERDE MIENTRAS SE ESTE EN ESA VIEWS--}}
{{--<h1>{{request()->is('/') ? 'active' : ''}} </h1>--}}
<div class="container">
    @yield('contenido')

</div>
<footer>Copyright {{date('Y')}}</footer>
</div>
</body>
</html>
