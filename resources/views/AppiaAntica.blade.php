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


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Usando Vite -->
        @vite(['resources/js/app.js'])

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    </head>

    <body>
        <div id="map" class="mx-auto mt-4" style="width: 1200px; height: 500px">
        </div>
    </body>
    <script type="text/javascript">
        var map = L.map('map').setView([41.8992, 12.5450], 8);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var marker = L.marker([41.890210, 12.492231]).addTo(map); /* Roma */
        var marker = L.marker([41.87082985, 12.501164662]).addTo(map); /* Porta San Sebastiano */
        var marker = L.marker([41.6729700, 12.6940300]).addTo(map); /* Lanuvio */
        var marker = L.marker([41.55, 12.983333]).addTo(map); /* Sermoneta */
        var marker = L.marker([41.283333, 13.25]).addTo(map); /* Terracina */
        var marker = L.marker([41.2636741, 13.4271414]).addTo(map); /* Sperlonga */

        var popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                /* .setContent("Tappa n.1. Qui sei a Roma") */
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script>

    </html>
@endsection
