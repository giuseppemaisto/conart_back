<!-- resources/views/artisti/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Artista</h1>
    <form method="POST" action="{{ route('artisti.update', $artista->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $artista->nome) }}" required>
        </div>
        <div class="form-group">
            <label for="cognome">Cognome</label>
            <input type="text" class="form-control" id="cognome" name="cognome" value="{{ old('cognome', $artista->cognome) }}" required>
        </div>
        <div class="form-group">
            <label for="data_nascita">Data di Nascita</label>
            <input type="date" class="form-control" id="data_nascita" name="data_nascita" value="{{ old('data_nascita', $artista->data_nascita->format('Y-m-d')) }}" required>
        </div>
        <div class="form-group">
            <label for="descrizione">Descrizione</label>
            <textarea class="form-control" id="descrizione" name="descrizione">{{ old('descrizione', $artista->descrizione) }}</textarea>
        </div>

        <div id="quadri-container">
            <h4>Quadri</h4>
            @foreach($quadros as $index => $quadro)
                <div class="quadro-form">
                    <div class="form-group">
                        <label for="titolo">Titolo</label>
                        <input type="text" class="form-control" name="quadri[{{ $index }}][titolo]" value="{{ $quadro->titolo }}">
                        <input type="hidden" name="quadri[{{ $index }}][id]" value="{{ $quadro->id }}">
                    </div>
                    <div class="form-group">
                        <label for="anno">Anno</label>
                        <input type="number" class="form-control" name="quadri[{{ $index }}][anno]" value="{{ $quadro->anno }}">
                    </div>
                    <div class="form-group">
                        <label for="genere">Genere</label>
                        <input type="text" class="form-control" name="quadri[{{ $index }}][genere]" value="{{ $quadro->genere }}">
                    </div>
                </div>
            @endforeach
            <button type="button" class="btn btn-secondary" id="add-quadro">Aggiungi Quadro</button>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
</div>

<script>
    document.getElementById('add-quadro').addEventListener('click', function () {
        const container = document.getElementById('quadri-container');
        const index = container.querySelectorAll('.quadro-form').length;
        const newQuadroForm = `
            <div class="quadro-form">
                <div class="form-group">
                    <label for="titolo">Titolo</label>
                    <input type="text" class="form-control" name="quadri[${index}][titolo]">
                </div>
                <div class="form-group">
                    <label for="anno">Anno</label>
                    <input type="number" class="form-control" name="quadri[${index}][anno]">
                </div>
                <div class="form-group">
                    <label for="genere">Genere</label>
                    <input type="text" class="form-control" name="quadri[${index}][genere]">
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newQuadroForm);
    });
</script>
@endsection
