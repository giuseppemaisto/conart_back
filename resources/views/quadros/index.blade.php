@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista Quadri</h1>
        <a href="{{ route('quadros.create') }}" class="btn btn-primary">Aggiungi Quadro</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Titolo</th>
                    <th>Anno</th>
                    <th>Genere</th>
                    <th>Artista</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quadros as $quadro)
                    <tr>
                        <td>{{ $quadro->titolo }}</td>
                        <td>{{ $quadro->anno }}</td>
                        <td>{{ $quadro->genere }}</td>
                        <td>{{ $quadro->artista->nome }} {{ $quadro->artista->cognome }}</td>
                        <td>
                            <a href="{{ route('quadros.show', $quadro->id) }}" class="btn btn-info">Visualizza</a>
                            <a href="{{ route('quadros.edit', $quadro->id) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('quadros.destroy', $quadro->id) }}" method="POST" style="display: inline;">
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
