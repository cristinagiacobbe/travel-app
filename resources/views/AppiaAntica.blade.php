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

        {{-- Ho visto un esempio con tailwind, quindi per ora uso questo --}}
        <script src="https://cdn.tailwindcss.com"></script>


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
            <div id="map" class="mt-4" style="width: 1200px; height: 500px"></div>

            {{-- Modale --}}
            <div id="modal" class="w-[500px] h-[500px] bg-white rounded-xl p-3 hidden">
                <button id="close-modal" class="float-right">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
                <h1></h1>
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
    <script type="text/javascript">
        var map = L.map('map').setView([41.8992, 12.5450], 8);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        /* var marker = L.marker([41.890210, 12.492231]).addTo(map); */
        /* Roma */
        /* var marker = L.marker([41.87082985, 12.501164662]).addTo(map); */
        /* Porta San Sebastiano */
        /* var marker = L.marker([41.55, 12.983333]).addTo(map); */
        /* Sermoneta */
        /* var marker = L.marker([41.283333, 13.25]).addTo(map); */
        /* Terracina */
        /* var marker = L.marker([41.2636741, 13.4271414]).addTo(map); */
        /* Sperlonga */

        const openModalMap = document.getElementById("map")
        const closeModalBtn = document.getElementById("close-modal")
        const modal = document.getElementById("modal")

        function openModal() {
            console.log("apro Modal");
            modal.classList.remove("hidden")
        }

        function closeModal() {
            console.log("chiudo Modal");
            modal.classList.add("hidden")
        }


        @foreach ($travels as $travel)
            if ({{ $travel->completed = 0 }}) {
                var circle = L.circle([{{ $travel->latitude }}, {{ $travel->longitude }}], {
                    color: 'red',
                    /* fillColor: '#f03', */
                    fillOpacity: 0.6,
                    radius: 5000
                }).addTo(map);
            } else {
                var circle = L.circle([{{ $travel->latitude }}, {{ $travel->longitude }}], {
                    color: 'green',
                    /* fillColor: '#f03', */
                    fillOpacity: 0.6,
                    radius: 5000
                }).addTo(map); //l'espressione condizionale non funziona correttamente
            }

            openModalMap.addEventListener("click", openModal)
            closeModalBtn.addEventListener("click", closeModal)
        @endforeach
    </script>



    </html>
@endsection
