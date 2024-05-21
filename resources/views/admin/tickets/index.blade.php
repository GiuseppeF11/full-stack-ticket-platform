@extends('layouts.app')

@section('page-title', 'Tutti i ticket')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti i ticket
                    </h1>

                    <div class="mb-3">
                        <a href="{{ route('admin.tickets.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div>

                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">N. Ticket</th>
                                <th scope="col">Operatore</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Apertura</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <th scope="row">{{ $ticket->id}}</th>
                                    <td>{{-- {{ $ticket->operator}} --}}Nome Operatore </td>
                                    <td>{{ $ticket->title}}</td>
                                    <td>{{ $ticket->description}}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>
                                        <span class="badge {{ $ticket->is_busy == 0 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $ticket->is_busy == 0 ? 'Libero' : 'Occupato' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.tickets.show', ['ticket' => $ticket->id]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.tickets.edit', ['ticket' => $ticket->id]) }}" class="btn btn-xs btn-warning">
                                            Modifica
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.tickets.destroy', ['ticket' => $ticket->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Elimina
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
