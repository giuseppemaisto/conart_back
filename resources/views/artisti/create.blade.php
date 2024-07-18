@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea Artista</h1>
    <form method="POST" action="{{ route('artisti.store') }}">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="cognome">Cognome</label>
            <input type="text" class="form-control" id="cognome" name="cognome" required>
        </div>
        <div class="form-group">
            <label for="data_nascita">Data di Nascita</label>
            <input type="date" class="form-control" id="data_nascita" name="data_nascita" required>
        </div>
        <div class="form-group">
            <label for="descrizione">Descrizione</label>
            <textarea class="form-control" id="descrizione" name="descrizione"></textarea>
        </div>
        
        <h3>Quadri</h3>
        <div id="quadri">
            <div class="form-group quadro">
                <label for="titolo">Titolo</label>
                <input type="text" class="form-control" name="quadri[0][titolo]" required>
                <label for="anno">Anno</label>
                <input type="number" class="form-control" name="quadri[0][anno]" required>
                <label for="genere">Genere</label>
                <input type="text" class="form-control" name="quadri[0][genere]" required>
            </div>
        </div>
        <button type="button" class="btn btn-secondary" onclick="addQuadro()">Aggiungi Quadro</button>
        
        <button type="submit" class="btn btn-primary mt-3">Salva</button>
    </form>
</div>

<script>
let quadroIndex = 1;
function addQuadro() {
    const quadroDiv = document.createElement('div');
    quadroDiv.classList.add('form-group', 'quadro');
    quadroDiv.innerHTML = `
        <label for="titolo">Titolo</label>
        <input type="text" class="form-control" name="quadri[${quadroIndex}][titolo]" required>
        <label for="anno">Anno</label>
        <input type="number" class="form-control" name="quadri[${quadroIndex}][anno]" required>
        <label for="genere">Genere</label>
        <input type="text" class="form-control" name="quadri[${quadroIndex}][genere]" required>
    `;
    document.getElementById('quadri').appendChild(quadroDiv);
    quadroIndex++;
}
</script>
@endsection
