@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea Quadro</h1>
        <form action="{{ route('quadros.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titolo">Titolo</label>
                <input type="text" class="form-control" id="titolo" name="titolo" required>
            </div>
            <div class="form-group">
                <label for="anno">Anno</label>
                <input type="number" class="form-control" id="anno" name="anno" required>
            </div>
            <div class="form-group">
                <label for="genere">Genere</label>
                <input type="text" class="form-control" id="genere" name="genere" required>
            </div>
            <div class="form-group">
                <label for="artista_id">Artista</label>
                <select class="form-control" id="artista_id" name="artista_id" required>
                    @foreach ($artisti as $artista)
                        <option value="{{ $artista->id }}">{{ $artista->nome }} {{ $artista->cognome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
