<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">

    <link href="{{asset('/festLive/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('/festLive/css/bootstrap-icons.css')}}" rel="stylesheet">

    <link href="{{asset('/festLive/css/templatemo-festava-live.css')}}" rel="stylesheet">
    <link>

    @vite(['resources/js/app.js'])


</head>

<body>
    <div id="app">
        <router-view></router-view>
    </div>
</body>

<script src="{{asset('festLive/js/jquery.min.js')}}"></script>
<script src="{{asset('festLive/js/bootstrap.min.js')}}"></script>
<script src="{{asset('festLive/js/jquery.sticky.js')}}"></script>
<script src="{{asset('festLive/js/click-scroll.js')}}"></script>
<script src="{{asset('festLive/js/custom.js')}}"></script>

</html>