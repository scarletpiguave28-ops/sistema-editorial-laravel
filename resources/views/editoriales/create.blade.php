@extends('layouts.app')
@section('titulo','Crear Editorial')
@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white"><i class="bi bi-plus-circle"></i> Crear Editorial</div>
    <div class="card-body">
        <form action="{{ route('editoriales.store') }}" method="POST">
            @csrf
            <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" class="form-control" required></div>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Guardar</button>
            <a href="{{ route('editoriales.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
