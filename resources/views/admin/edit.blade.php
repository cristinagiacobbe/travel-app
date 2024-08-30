@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Stai modificando la tappa n.{{ $travel->id }}</h1>

        @include('partials.errors')

        <form action="{{ route('admintravels.update', $travel) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label"><strong>Titolo</strong></label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title"
                    aria-describedby="helptitle" placeholder="Modifica il nome della tappa"
                    value="{{ old('title') ?: $travel->title }}" />
            </div>

            <div class="mb-3">
                <label for="date" class="form-label"><strong>Data</strong></label>
                <input type="date" class="form-control @error('date')is-invalid @enderror" name="date" id="date"
                    aria-describedby="helpdate" placeholder="Modifica la data di percorrenza della tappa"
                    value="{{ old('title') ?: $travel->date }}" />
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label"><strong>Immagine</strong></label>
                <div>
                    @include('partials.image_snippet')
                </div>

                <div class="d-flex gap-3">
                    <img width="140" src="{{ asset('storage/' . $travel->image) }}" alt="">
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Modifica l'immagine della tappa</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image"
                            placeholder="cover_image" aria-describedby="ImageHelper" />
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label"><strong>Description</strong></label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') ?: $travel->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="valutation" class="form-label"><strong>Voto alla tappa</strong></label>
                <input type="valutation" class="form-control @error('valutation')is-invalid @enderror" name="valutation"
                    id="valutation" aria-describedby="helpvalutation" placeholder="Modifica il voto alla tappa (max 5)"
                    value="{{ old('valutation') ?: $travel->valutation }}" />
            </div>

            <div class="mb-3">
                <label for="people" class="form-label"><strong>Persone incontrate/conosciute</strong></label>
                <textarea class="form-control" name="people" id="people" rows="3">{{ old('people') ?: $travel->people }}</textarea>
            </div>

            <div class="mb-3">
                <label for="additional_notes" class="form-label"><strong>Note aggiuntive</strong></label>
                <textarea class="form-control" name="additional_notes" id="additional_notes" rows="3">{{ old('additional_notes') ?: $travel->additional_notes }}</textarea>
            </div>

            <div class="mb-3">
                <label for="latitude" class="form-label"><strong>Latitudine</strong></label>
                <input type="text" class="form-control @error('latitude')is-invalid @enderror" name="latitude"
                    id="latitude" aria-describedby="helplatitude" placeholder="Modifica la latitudine della tappa"
                    value="{{ old('latitude') ?: $travel->latitude }}" />
            </div>

            <div class="mb-3">
                <label for="longitude" class="form-label"><strong>Longitudine</strong></label>
                <input type="text" class="form-control @error('longitude')is-invalid @enderror" name="longitude"
                    id="longitude" aria-describedby="helplongitude" placeholder="Modifica la longitudine della tappa"
                    value="{{ old('longitude') ?: $travel->longitude }}" />
            </div>

            <div class="mb-3 d-flex gap-3">
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" value="completed" id="completed" name="completed"
                        {{ old('completed', $travel->completed) ? 'checked' : '' }} />

                    <label class="form-check-label" for="completed">Tappa completata?</label>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Conferma le modifiche</button>

        </form>
    </div>
@endsection
