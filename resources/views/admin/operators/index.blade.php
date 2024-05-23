@extends('layouts.app')

@section('page-title', 'Tutti gli operatori')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-uppercase fw-bold ">
                        Operatori
                    </h1>

                    {{-- <div class="mb-3">
                        <a href="{{ route('admin.operators.create') }}" class="btn btn-success w-100">
                            + Aggiungi
                        </a>
                    </div> --}}

                    <table id="operatorsTable" class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Aggiunto il</th>
                                <th scope="col">Alle</th>
                                <th scope="col">Disponibilità</th>
                                {{-- <th scope="col">Azioni</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operators as $operator)
                                <tr>
                                    <th scope="row">{{ $operator->id }}</th>
                                    <td>{{ $operator->name }}</td>
                                    {{-- Come formattare una data: https://www.php.net/manual/en/datetime.format.php --}}
                                    <td>{{ $operator->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $operator->created_at->format('H:i') }}</td>
                                    <td>
                                        <span class="badge {{ $operator->is_busy == 0 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $operator->is_busy == 0 ? 'Libero' : 'Occupato' }}
                                        </span>
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('admin.operators.show', ['operator' => $operator->id]) }}" class="btn btn-xs btn-primary">
                                            Vedi
                                        </a>
                                        <a href="{{ route('admin.operators.edit', ['operator' => $operator->id]) }}" class="btn btn-xs btn-warning">
                                            Modifica
                                        </a>
                                        <form class="d-inline-block" action="{{ route('admin.operators.destroy', ['operator' => $operator->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questa categoria?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Elimina
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#operatorsTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Italian.json"
                },
                "order": [[4, "asc"]],
                "pageLength": 25
            });
        });
    </script>
@endsection
