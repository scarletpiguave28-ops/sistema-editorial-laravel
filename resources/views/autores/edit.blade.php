@extends('layouts.app')
@section('titulo', 'Editar Autor')
@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark">
        <i class="bi bi-pencil-square"></i> Editar Autor
    </div>
    <div class="card-body">
     <form action="{{ route('autores.update', $autore) }}" method="POST">
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Nombre Real</label>
                    <input type="text" name="nombre_real" class="form-control" value="{{ old('nombre_real', $autor->nombre_real) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $autor->email) }}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">País</label>
                    <input type="text" name="pais" class="form-control" value="{{ old('pais', $autor->pais) }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Seudónimo</label>
                <input type="text" name="seudonimo[nombre_pluma]" class="form-control"
                       value="{{ old('seudonimo.nombre_pluma', $autor->seudonimo->nombre_pluma ?? '') }}" placeholder="Opcional">
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Actualizar</button>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
