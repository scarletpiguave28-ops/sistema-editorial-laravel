@extends('layouts.app')
@section('titulo','Libros')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-book"></i> Libros</h2>
    <a href="{{ route('libros.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Crear Libro</a>
</div>
<div class="row">
@forelse($libros as $libro)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $libro->titulo }}</h5>
                <p class="mb-1"><strong>ISBN:</strong> {{ $libro->isbn }}</p>
                <p class="mb-1"><strong>Páginas:</strong> {{ $libro->paginas }}</p>
                <p class="mb-1"><strong>Editorial:</strong> {{ $libro->editorial->nombre }}</p>
                <p class="mb-3"><strong>Autores:</strong>
                    {{ $libro->autores->pluck('nombre_real')->join(', ') }}</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('libros.edit', $libro) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                    <form action="{{ route('libros.destroy', $libro) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12"><div class="alert alert-info">No hay libros registrados.</div></div>
@endforelse
</div>
@endsection
