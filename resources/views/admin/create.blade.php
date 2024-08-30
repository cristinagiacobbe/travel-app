@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-3">Crea una unova tappa del viaggio</h1>

        @include('partials.errors')

        <form action="{{ route('admintravels.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label"><strong>Titolo</strong></label>
                <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" id="title"
                    aria-describedby="helptitle" placeholder="Inserisci i luoghi di partenza e di arrivo della tappa"
                    value="{{ old('title') }}" />
            </div>

            <div class="mb-3">
                <label for="date" class="form-label"><strong>Data</strong></label>
                <input type="date" class="form-control @error('date')is-invalid @enderror" name="date" id="date"
                    aria-describedby="helpdate" placeholder="Inserisci giorno/mese/anno di percorrenza della tappa"
                    value="{{ old('date') }}" />
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label"><strong>Immagine</strong></label>
                <input type="file" class="form-control @error('cover_image')is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="helpcover_image"
                    placeholder="Inserisci un'immagine rappresentativa della tappa" />
            </div>

            <div class="mb-3">
                <label for="description" class="form-label"><strong>Descrizione</strong></label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="valutation" class="form-label"><strong>Voto alla tappa</strong></label>
                <input type="valutation" class="form-control @error('valutation')is-invalid @enderror" name="valutation"
                    id="valutation" aria-describedby="helpvalutation"
                    placeholder="Dai un voto a questa tappa con un numero da 1 a 5" value="{{ old('valutation') }}" />
            </div>

            <div class="mb-3">
                <label for="people" class="form-label"><strong>Persone incontrate/conosciute</strong></label>
                <textarea class="form-control" name="people" id="people" rows="3">{{ old('people') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="additional_notes" class="form-label"><strong>Note aggiuntive</strong></label>
                <textarea class="form-control" name="additional_notes" id="additional_notes" rows="3">{{ old('additional_notes') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="latitude" class="form-label"><strong>Latitudine</strong></label>
                <input type="text" class="form-control @error('latitude')is-invalid @enderror" name="latitude"
                    id="latitude" aria-describedby="helplatitude" placeholder="Inserisci la latitudine della tappa"
                    value="{{ old('latitude') }}" />
            </div>

            <div class="mb-3">
                <label for="longitude" class="form-label"><strong>Longitudine</strong></label>
                <input type="text" class="form-control @error('longitude')is-invalid @enderror" name="longitude"
                    id="longitude" aria-describedby="helplongitude" placeholder="Inserisci la longitudine della tappa"
                    value="{{ old('longitude') }}" />
            </div>

            <div class="mb-3 d-flex gap-3">
                <div class="form-check ">
                    <input class="form-check-input" type="checkbox" value="completed" id="completed" name="completed"
                        {{ old('completed') ? 'checked' : '' }} />
                    <label class="form-check-label" for="completed">Tappa completata?</label>
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Create</button>
            <button class="btn btn-danger">Torna alla lista delle tappe</button>

        </form>
    </div>
@endsection
