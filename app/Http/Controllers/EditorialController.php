<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        $editoriales = Editorial::withCount('libros')->get();
        return view('editoriales.index', compact('editoriales'));
    }

    public function create()
    {
        return view('editoriales.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        Editorial::create($request->only('nombre'));
        return redirect()->route('editoriales.index')->with('success','Editorial creada.');
    }

    public function edit(Editorial $editoriale)
    {
        return view('editoriales.edit', compact('editoriale'));
    }

    public function update(Request $request, Editorial $editoriale)
    {
        $request->validate(['nombre' => 'required|string|max:255']);
        $editoriale->update($request->only('nombre'));
        return redirect()->route('editoriales.index')->with('success','Editorial actualizada.');
    }

    public function destroy(Editorial $editoriale)
    {
        $editoriale->delete();
        return redirect()->route('editoriales.index')->with('success','Editorial eliminada.');
    }
}
