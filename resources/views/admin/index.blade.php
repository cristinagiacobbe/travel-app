@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.success')

        <div class="table-responsive">
            <table class="table table-primary px-3">
                <a class="btn btn-info m-2" href="{{ route('admintravels.create') }}">Aggiungi una nuova tappa del
                    viaggio</a>
                <thead>
                    <tr>
                        <th scope="col">Tappa n.</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Data</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Valutazione</th>
                        <th scope="col">Persone</th>
                        <th scope="col">Note aggiuntive</th>
                        <th scope="col">Latitudine</th>
                        <th scope="col">Longitudine</th>
                        <th scope="col">Completata?</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($travels as $travel)
                        <tr class="">
                            <td scope="row">{{ $travel->id }}</td>
                            <td>{{ $travel->title }}</td>
                            <td>{{ $travel->date }}</td>

                            {{-- Check for image --}}
                            <td>
                                @include('partials.image_snippet')
                            </td>

                            <td>{{ $travel->description }}</td>
                            <td>{{ $travel->valutation }}</td>
                            <td>{{ $travel->people }}</td>
                            <td>{{ $travel->additional_notes }}</td>
                            <td>{{ $travel->latitude }}</td>
                            <td>{{ $travel->longitude }}</td>
                            <td>{{ $travel->completed }}</td>

                            <td>
                                {{-- <a href="{{ route('admintravels.show', $travel) }}" class="btn btn-primary ">
                                    <i class="fa-solid fa-binoculars"></i>
                                </a> --}}
                                <a href="{{ route('admintravels.edit', $travel) }}" class="btn btn-dark m-1 ">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $travel->id }}"><i class="fa-solid fa-ban"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $travel->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitle-{{ $travel->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-white" id="modalTitle-{{ $travel->id }}">
                                                    Cancellare la tappa n.{{ $travel->id }} ?
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-white">Sicuro di voler cancellare? 🧐</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <form action="{{ route('admintravels.destroy', $travel) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td scope="row" colspan="5">No stage travel found</td>

                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

    </div>

    {{--  {{ $travel->links('pagination::bootstrap-5') }} --}}
@endsection
