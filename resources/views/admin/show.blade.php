@extends('layouts.app')

@section('content')
    <div class="container">

        <h2>Tappa n. {{ $travel->id }}</h2>
        <a class="btn btn-sm btn-primary mt-5" href="{{ route('appia') }}">Torna al tour completo</a>
        <div class="card mt-5" style="max-width: 540px;">
            <div class="row g-0">

                <div class="col-md-4">
                    @if (Str::startsWith($travel->cover_image, 'https://'))
                        <img width="150" src="{{ $travel->cover_image }}" alt="">
                    @else
                        <img width="150" src="{{ asset('storage/' . $travel->cover_image) }}" alt="">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><b>Tappa:</b> {{ $travel->title }}</h5>
                        <p class="card-text"><b>Descrzione:</b> {{ $travel->description }}</p>
                        <p class="card-text"><b>Data:</b> {{ $travel->date }}</p>
                        <p class="card-text"><b>Persone conosciute:</b> {{ $travel->people }}</p>
                        <p class="card-text"><b>Note aggiuntive:</b> {{ $travel->additional_notes }}</p>
                        <p class="card-text"><b>Tappa completata?</b> {{ $travel->completed }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
