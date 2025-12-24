<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Editorial;
use App\Models\Autor;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libros = Libro::with('editorial','autores')->get();
        return view('libros.index', compact('libros'));
    }

    public function create()
    {
        $editoriales = Editorial::all();
        $autores     = Autor::all();
        return view('libros.create', compact('editoriales','autores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'isbn'        => 'required|unique:libros',
            'paginas'     => 'required|integer|min:1',
            'editorial_id'=> 'required|exists:editorials,id',
            'autores'     => 'required|array|min:1',
            'autores.*'   => 'exists:autors,id',
        ]);

        $libro = Libro::create($request->only('titulo','isbn','paginas','editorial_id'));
        $libro->autores()->attach($request->autores);

        return redirect()->route('libros.index')->with('success','Libro creado.');
    }

    public function edit(Libro $libro)
    {
        $editoriales = Editorial::all();
        $autores     = Autor::all();
        return view('libros.edit', compact('libro','editoriales','autores'));
    }

    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo'      => 'required|string|max:255',
            'isbn'        => 'required|unique:libros,isbn,'.$libro->id,
            'paginas'     => 'required|integer|min:1',
            'editorial_id'=> 'required|exists:editorials,id',
            'autores'     => 'required|array|min:1',
            'autores.*'   => 'exists:autors,id',
        ]);

        $libro->update($request->only('titulo','isbn','paginas','editorial_id'));
        $libro->autores()->sync($request->autores);

        return redirect()->route('libros.index')->with('success','Libro actualizado.');
    }

    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index')->with('success','Libro eliminado.');
    }
}
