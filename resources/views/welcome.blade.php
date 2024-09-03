@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <div class="container py-5">
            <div>
                <h1 class="display-5 fw-bold text-danger">
                    Diario di viaggio <i class="fa-solid fa-book-open" style="color: #0a9608;"></i>
                </h1>
            </div>
            <h2 class="display-7 fw-bold text-secondary">
                I miei tour in bicicletta <i class="fa-solid fa-person-biking" style="color: #74C0FC;"></i>
            </h2>

            <p class="col-md-8 fs-4 text-dark">
                Benvenuto tra le pagine del mio diario di viaggio.
                Qui troverai traccia dei miei viaggi, realizzati o progettati, ma tutti esclusivamente in sella alla mia
                e-bike.
                Spero possa esserti di ispirazione !! 😉
            </p>
            <ul>
                <li>
                    <a href="{{ route('appia') }}">La Via Appia antica (Roma) </a>
                </li>
                <li>
                    <p class="text-dark">Tour nelle Langhe</p>
                </li>
                <li>
                    <p class="text-dark">Tour Dela del Po</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Realizzato da Cristina Giacobbe - Boolean's student</p>
        </div>
    </div>
@endsection
