@extends('layouts.app')
@section('titulo','Crear Libro')
@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white"><i class="bi bi-plus-circle"></i> Crear Libro</div>
    <div class="card-body">
        <form action="{{ route('libros.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label">Título</label><input type="text" name="titulo" class="form-control" required></div>
                <div class="col-md-3"><label class="form-label">ISBN</label><input type="text" name="isbn" class="form-control" required></div>
                <div class="col-md-3"><label class="form-label">Páginas</label><input type="number" name="paginas" class="form-control" required></div>
            </div>
            <div class="mb-3"><label class="form-label">Editorial</label>
                <select name="editorial_id" class="form-select" required>
                    <option value="">— Seleccione —</option>
                    @foreach($editoriales as $ed)
                        <option value="{{ $ed->id }}">{{ $ed->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Autores</label>
                <select name="autores[]" class="form-select" multiple required>
                    @foreach($autores as $au)
                        <option value="{{ $au->id }}">{{ $au->nombre_real }}</option>
                    @endforeach
                </select>
                <small class="text-muted">Ctrl+ clic para varios</small>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Guardar</button>
            <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
