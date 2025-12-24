<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    public function index()
    {
        $autores = Autor::with('seudonimo')->get();
        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'email'       => 'required|email|unique:autors,email',
            'pais'        => 'required|string|max:255',
            'seudonimo.nombre_pluma' => 'nullable|string|max:255'
        ]);

        $autor = Autor::create($request->only('nombre_real', 'email', 'pais'));

        if ($request->filled('seudonimo.nombre_pluma')) {
            $autor->seudonimo()->create([
                'nombre_pluma' => $request->input('seudonimo.nombre_pluma')
            ]);
        }

        return redirect()->route('autores.index')->with('success', 'Autor creado con éxito.');
    }

    /* --------------------  IMPORTANTE  -------------------- */
    /* Usamos el mismo nombre de parámetro que la ruta resource: "autore" */
    /* ------------------------------------------------------ */
    public function edit(Autor $autore)
    {
        return view('autores.edit', compact('autore'));
    }

    public function update(Request $request, Autor $autore)
    {
        $request->validate([
            'nombre_real' => 'required|string|max:255',
            'email'       => 'required|email|unique:autors,email,' . $autore->id,
            'pais'        => 'required|string|max:255',
            'seudonimo.nombre_pluma' => 'nullable|string|max:255'
        ]);

        $autore->update($request->only('nombre_real', 'email', 'pais'));

        if ($request->filled('seudonimo.nombre_pluma')) {
            $autore->seudonimo()->updateOrCreate(
                ['autor_id' => $autore->id],
                ['nombre_pluma' => $request->input('seudonimo.nombre_pluma')]
            );
        } else {
            $autore->seudonimo()->delete();
        }

        return redirect()->route('autores.index')->with('success', 'Autor actualizado con éxito.');
    }

    public function destroy(Autor $autore)
    {
        $autore->delete();
        return redirect()->route('autores.index')->with('success', 'Autor eliminado con éxito.');
    }
}
