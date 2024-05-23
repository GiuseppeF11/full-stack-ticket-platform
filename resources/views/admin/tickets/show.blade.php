@extends('layouts.app')

@section('page-title', $ticket->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 >
                        {{ $ticket->title }}
                    </h4>

                    <p>
                       - {{ $ticket->description }}
                    </p>
                    @isset($ticket->operator)
                        <p><strong>Operatore:</strong> {{$ticket->operator->name }} </p>
                    @endisset
                    
                    <div class="text-uppercase">
                        @if ($ticket->status == 'in attesa')
                            <span class="badge bg-success">
                                {{ $ticket->status}}
                            </span>
                        @elseif ($ticket->status == 'aperto')
                            <span class="badge bg-warning">
                                {{ $ticket->status}}
                            </span>
                        @elseif ($ticket->status == 'in lavorazione')
                            <span class="badge bg-secondary">
                                {{ $ticket->status}}
                            </span>
                        @elseif ($ticket->status == 'chiuso')
                            <span class="badge bg-primary">
                                {{ $ticket->status}}
                            </span>
                        @endif
                    </div>
                    <div class="text-end">
                        {{ $ticket->date }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
