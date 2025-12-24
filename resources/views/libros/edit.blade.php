@extends('layouts.app')
@section('titulo','Editar Libro')
@section('content')
<div class="card shadow">
    <div class="card-header bg-warning text-dark"><i class="bi bi-pencil-square"></i> Editar Libro</div>
    <div class="card-body">
        <form action="{{ route('libros.update', $libro) }}" method="POST">
            @csrf @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6"><label class="form-label">Título</label><input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo) }}" required></div>
                <div class="col-md-3"><label class="form-label">ISBN</label><input type="text" name="isbn" class="form-control" value="{{ old('isbn', $libro->isbn) }}" required></div>
                <div class="col-md-3"><label class="form-label">Páginas</label><input type="number" name="paginas" class="form-control" value="{{ old('paginas', $libro->paginas) }}" required></div>
            </div>
            <div class="mb-3"><label class="form-label">Editorial</label>
                <select name="editorial_id" class="form-select" required>
                    @foreach($editoriales as $ed)
                        <option value="{{ $ed->id }}" @if($ed->id == $libro->editorial_id) selected @endif>{{ $ed->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"><label class="form-label">Autores</label>
                <select name="autores[]" class="form-select" multiple required>
                    @foreach($autores as $au)
                        <option value="{{ $au->id }}" @if(in_array($au->id, $libro->autores->pluck('id')->toArray())) selected @endif>{{ $au->nombre_real }}</option>
                    @endforeach
                </select>
                <small class="text-muted">Ctrl+ clic para varios</small>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Actualizar</button>
            <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
