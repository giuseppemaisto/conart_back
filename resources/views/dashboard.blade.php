@extends('layouts.app')

@section('content')
    <h2>Dashboard</h2>

    <div>
        <h3>Operazioni sugli Artisti</h3>
        <a href="{{ route('artisti.index') }}" class="btn btn-primary">Gestisci Artisti</a>
        
        <a href="{{ route('artisti.create') }}" class="btn btn-success">Nuovo Artista</a>
    </div>

    <div>
        <h3>Operazioni sui Quadri</h3>
        <a href="{{ route('quadri.index') }}" class="btn btn-primary">Gestisci Quadri</a>
        <a href="{{ route('quadri.create') }}" class="btn btn-success">Nuovo Quadro</a>
    </div>
@endsection
