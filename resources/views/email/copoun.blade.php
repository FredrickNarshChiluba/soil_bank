<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>@yield('title') - E-SOIL DATA BANK</title>
    <!-- SOIL_DATA_BANK -->
    @include('site.partials.styles')
</head>
<body>
<h1>{{$detail['title']}}</h1>
<p>{{$detail['body']}}</p>
<p>thanks</p>
</body>
</html>
