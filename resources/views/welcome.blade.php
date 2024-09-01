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
            <a href="{{ route('appia') }}">La Via Appia antica (Roma) </a>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi
                deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis
                accusamus dolores!</p>
        </div>
    </div>
@endsection
