@extends('layouts.app')
@section('titulo','Editar Editorial')
@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark"><i class="bi bi-pencil-square"></i> Editar Editorial</div>
    <div class="card-body">
        <form action="{{ route('editoriales.update', $editoriale) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" class="form-control" value="{{ old('nombre', $editoriale->nombre) }}" required></div>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Actualizar</button>
            <a href="{{ route('editoriales.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
