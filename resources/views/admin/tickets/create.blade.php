@extends('layouts.app')

@section('page-title', 'tickets Create')

@section('main-content')
<h1>
    Tickets Create
</h1>

<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('admin.tickets.index') }}" class="btn btn-primary">
                Torna all'index dei post
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.tickets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Inserisci il titolo..." maxlength="255" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione <span class="text-danger">*</span></label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci il contenuto del ticket..." maxlength="10000" required>{{ old('content') }}</textarea>
            </div>


            <div>
                <button type="submit" class="btn btn-success w-100">
                    + Aggiungi
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
