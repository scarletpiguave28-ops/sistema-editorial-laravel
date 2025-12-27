@extends('layouts.app')
@section('titulo', 'Editar Autor')
@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark">
        <i class="bi bi-pencil-square"></i> Editar Autor
    </div>
    <div class="card-body">
        <form action="{{ route('autores.update', $autore) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Nombre Real</label>
                    <input type="text" name="nombre_real" class="form-control"
                           value="{{ old('nombre_real', $autore->nombre_real) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ old('email', $autore->email) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">País</label>
                    <input type="text" name="pais" class="form-control"
                           value="{{ old('pais', $autore->pais) }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Seudónimo</label>
                <input type="text" name="nombre_pluma" class="form-control"
                       value="{{ old('nombre_pluma', $autore->nombre_pluma ?? '') }}" placeholder="Opcional">
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-check-circle"></i> Actualizar
            </button>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
