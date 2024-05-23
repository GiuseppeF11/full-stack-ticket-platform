@extends('layouts.app')

@section('page-title', $ticket->title.' Edit')

@section('main-content')
<div class="container">
    <h1>Edit Ticket</h1>

    <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                @foreach($statusOptions as $status)
                    <option value="{{ $status }}" {{ $ticket->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
