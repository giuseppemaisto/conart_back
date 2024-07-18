@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica Quadro</h1>
        <form action="{{ route('quadros.update', $quadro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titolo">Titolo</label>
                <input type="text" class="form-control" id="titolo" name="titolo" value="{{ $quadro->titolo }}" required>
            </div>
            <div class="form-group">
                <label for="anno">Anno</label>
                <input type="number" class="form-control" id="anno" name="anno" value="{{ $quadro->anno }}" required>
            </div>
            <div class="form-group">
                <label for="genere">Genere</label>
                <input type="text" class="form-control" id="genere" name="genere" value="{{ $quadro->genere }}" required>
            </div>
            <div class="form-group">
                <label for="artista_id">Artista</label>
                <select class="form-control" id="artista_id" name="artista_id" required>
                    @foreach ($artisti as $artista)
                        <option value="{{ $artista->id }}" @if($artista->id == $quadro->artista_id) selected @endif>{{ $artista->nome }} {{ $artista->cognome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection
