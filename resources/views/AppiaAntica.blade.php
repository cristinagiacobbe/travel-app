@extends('layouts.app')
@section('content')
    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Usando Vite -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    </head>

    <body>

        <div class="container">
            <h1>Mappa di Roma</h1>

            {{-- Mi creo a mano una simil-modale con display none --}}
            <div class="position-relative">
                <div id="modal" style="width: 200px; height:200px;"
                    class="bg-secondary text-white d-none position-absolute top-50 start-50 translate-middle z-1">
                    Modale artigianale
                    <button>Chiudi</button>
                </div>

                <div id="map" class="mt-4 z-0" style="width: 1200px; height: 500px"></div>
            </div>

            @foreach ($travels as $travel)
                <ul class="mt-2">
                    <li>
                        <a href="{{ route('appia.show', $travel) }}">{{ $travel->id }}: {{ $travel->title }}</a>
                    </li>
                </ul>
            @endforeach
        </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script type="text/javascript">
        var map = L.map('map').setView([41.8992, 12.5450], 8);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const modal = document.getElementById("modal")

        function openModal() {
            modal.classList.remove("d-none")

        }

        @foreach ($travels as $travel)

            var circle = L.circle([{{ $travel->latitude }}, {{ $travel->longitude }}], {
                color: 'red',
                /* fillColor: '#f03', */
                fillOpacity: 0.6,
                radius: 5000
            }).addTo(map);
            circle.bindPopup(openModal);
        @endforeach
    </script>



    </html>
@endsection
