<?php

namespace App\Http\Controllers;
use App\Models\Classe;

use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classe::with(['eleves', 'professeurs', 'educateurs'])->get();
        return response()->json($classes, 200);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'libelle' => 'required|string|max:255|unique:classes,libelle',
        ]);

        $classe = Classe::create([
            'libelle' => $request->libelle,
        ]);

        return response()->json([
            'message' => 'Classe créée avec succès',
            'data' => $classe
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
       return response()->json(
            $classe->load(['eleves', 'professeurs', 'educateurs']),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe)
    {
        $request->validate([
            'libelle' => 'sometimes|required|string|max:255|unique:classes,libelle,' . $classe->id,
        ]);

        $classe->update($request->only('libelle'));

        return response()->json([
            'message' => 'Classe modifiée avec succès',
            'data' => $classe
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
               // Sécurité : empêcher suppression si la classe contient des élèves
        if ($classe->eleves()->count() > 0) {
            return response()->json([
                'message' => 'Impossible de supprimer une classe contenant des élèves'
            ], 400);
        }

        $classe->delete();

        return response()->json([
            'message' => 'Classe supprimée avec succès'
        ], 200);

    }
}
