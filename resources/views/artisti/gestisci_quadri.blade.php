<!-- resources/views/artisti/gestisci_quadri.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestisci Quadri di {{ $artista->nome }} {{ $artista->cognome }}</h1>
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addQuadroModal">Aggiungi Quadro</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Anno</th>
                <th>Genere</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quadros as $quadro)
                <tr>
                    <td>{{ $quadro->titolo }}</td>
                    <td>{{ $quadro->anno }}</td>
                    <td>{{ $quadro->genere }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addQuadroModal" tabindex="-1" role="dialog" aria-labelledby="addQuadroModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addQuadroModalLabel">Aggiungi Quadro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('quadros.store') }}">
                    @csrf
                    <input type="hidden" name="artista_id" value="{{ $artista->id }}">
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
                    <button type="submit" class="btn btn-primary">Salva</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
