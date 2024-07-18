<!-- resources/views/artisti/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Artisti</h1>
    <a href="{{ route('artisti.create') }}" class="btn btn-primary">Aggiungi Artista</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Data di Nascita</th>
                <th>Descrizione</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artisti as $artista)
                <tr>
                    <td>{{ $artista->nome }}</td>
                    <td>{{ $artista->cognome }}</td>
                    <td>{{ $artista->data_nascita }}</td>
                    <td>{{ $artista->descrizione }}</td>
                    <td>
                        <a href="{{ route('artisti.edit', $artista->id) }}" class="btn btn-primary">Modifica</a>
                        <form action="{{ route('artisti.destroy', $artista->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

