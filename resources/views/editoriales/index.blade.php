@extends('layouts.app')
@section('titulo','Editoriales')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2><i class="bi bi-building"></i> Editoriales</h2>
    <a href="{{ route('editoriales.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Crear Editorial</a>
</div>
<div class="row">
@forelse($editoriales as $ed)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $ed->nombre }}</h5>
                <p class="mb-3"><strong>Libros:</strong> {{ $ed->libros_count }}</p>
                <div class="d-flex gap-2">
                    <a href="{{ route('editoriales.edit', $ed) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                    <form action="{{ route('editoriales.destroy', $ed) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="col-12"><div class="alert alert-info">No hay editoriales registradas.</div></div>
@endforelse
</div>
@endsection
