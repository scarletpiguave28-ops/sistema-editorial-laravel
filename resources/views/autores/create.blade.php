@extends('layouts.app')
@section('titulo', 'Crear Autor')
@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <i class="bi bi-plus-circle"></i> Crear Autor
    </div>
    <div class="card-body">
        <form action="{{ route('autores.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-4"><label class="form-label">Nombre Real</label>
                    <input type="text" name="nombre_real" class="form-control" required></div>
                <div class="col-md-4"><label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required></div>
                <div class="col-md-4"><label class="form-label">País</label>
                    <input type="text" name="pais" class="form-control" required></div>
            </div>
            <div class="mb-3"><label class="form-label">Seudónimo</label>
                <input type="text" name="seudonimo[nombre_pluma]" class="form-control" placeholder="Opcional"></div>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Guardar</button>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
