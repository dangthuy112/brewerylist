<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <div id="app"></div>
</body>

</html>
