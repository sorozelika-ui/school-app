<?php

namespace App\Http\Controllers;
use App\Models\Annee;
use Illuminate\Http\Request;

class AnneeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $Annee = Annee::with(['periodes', 'professeurs', 'educateurs'])->get();
        return response()->json($Annee, 200);

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
            'libelle' => 'required|string|max:255|unique:annees,libelle',
        ]);

        $Annee = Annee::create([
            'libelle' => $request->libelle,
        ]);

        return response()->json([
            'message' => 'Annee créée avec succès',
            'data' => $Annee
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Annee $Annee)
    {
       return response()->json(
            $Annee->load(['periodes', 'professeurs', 'educateurs']),
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
    public function update(Request $request, Annee $Annee)
    {
       $request->validate([
            'libelle' => 'sometimes|required|string|max:255|unique:annees,libelle,' . $Annee->id,
        ]);

        $Annee->update($request->only('libelle'));

        return response()->json([
            'message' => 'Annee modifiée avec succès',
            'data' => $Annee
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annee $Annee)
    {
           // Sécurité : empêcher suppression si la Annee contient des élèves
        if ($Annee->eleves()->count() > 0) {
            return response()->json([
                'message' => 'Impossible de supprimer une Annee contenant des élèves'
            ], 400);
        }

        $Annee->delete();

        return response()->json([
            'message' => 'Annee supprimée avec succès'
        ], 200);

    }
}
