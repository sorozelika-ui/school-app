<?php

namespace App\Http\Controllers;
use App\Models\Eleve;

use Illuminate\Http\Request;

class EleveController extends Controller
{
    public function index()
    { 
        // a revoir a cause de la classe
       $eleves = Eleve::with('classe')->get();

        return response()->json($eleves, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|string|unique:eleves,matricule',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'email' => 'nullable|email|unique:eleves,email',
            'contact' => 'nullable|string|max:20',
            'quartier' => 'nullable|string|max:255',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $eleve = Eleve::create($request->all());

        return response()->json([
            'message' => 'Élève ajouté avec succès',
            'data' => $eleve
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        return response()->json($eleve->load('classe'), 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eleve $eleve)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eleve $eleve)
    {
        $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|required|string|max:255',
            'date_naissance' => 'sometimes|required|date',
            'email' => 'sometimes|nullable|email|unique:eleves,email,' . $eleve->id,
            'contact' => 'sometimes|nullable|string|max:20',
            'quartier' => 'sometimes|nullable|string|max:255',
            'classe_id' => 'sometimes|required|exists:classes,id',
        ]);

        // On protège le matricule (non modifiable)
        $eleve->update($request->except('matricule'));

        return response()->json([
            'message' => 'Élève modifié avec succès',
            'data' => $eleve
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
       $eleve->delete();

        return response()->json([
            'message' => 'Élève supprimé avec succès'
        ], 200);
    }
}
