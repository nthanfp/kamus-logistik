<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Kamus Logistik adalah sebuah aplikasi kamus yang menyediakan daftar istilah-istilah yang umum digunakan dalam bidang logistik, termasuk definisi dan penjelasan singkatnya.">
    <meta name="keywords"
        content="logistik, transportasi, gudang, distribusi, rantai pasok, pengiriman, penyimpanan, pengelolaan persediaan">
    <meta name="author" content="The Axe">
    <title>{{ config('app.name', 'Kamus Logistik') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logistics.png') }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logistics.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                {{ config('app.name', 'Kamus Logistik') }}
              </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Indonesia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inggris</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
