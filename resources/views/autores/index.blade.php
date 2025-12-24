@extends('layouts.app')
@section('titulo', 'Autores')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-people"></i> Autores</h2>
    <a href="{{ route('autores.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Crear Autor
    </a>
</div>

<div class="row">
@forelse($autores as $autor)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $autor->nombre_real }}</h5>
                <p class="mb-1"><strong>Email:</strong> {{ $autor->email }}</p>
                <p class="mb-1"><strong>País:</strong> {{ $autor->pais }}</p>
                <p class="mb-3"><strong>Seudónimo:</strong> {{ $autor->seudonimo->nombre_pluma ?? '—' }}</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('autores.edit', $autor) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                    <form action="{{ route('autores.destroy', $autor) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info">No hay autores registrados.</div>
    </div>
@endforelse
</div>
@endsection
