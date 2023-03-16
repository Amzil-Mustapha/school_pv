<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body style="font-family: 'Shantell Sans', cursive" class="flex flex-col h-screen">
<header class="flex bg-emerald-700 h-24 px-10 items-center">
    <img class="h-24" src="{{url('ofppt_logo.png')}}" alt="ofppt_Logo">
    <div class="h-full w-full flex justify-center items-center  text-white text-3xl">
        <h1>Conseil des classes P.V</h1>
    </div>
    <a href="{{Route("Onlogout")}}">logout</a>
</header>
