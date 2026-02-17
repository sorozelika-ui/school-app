<?php

namespace App\Http\Controllers;

use App\Models\Eleve_Parent;
use Illuminate\Http\Request;

class EleveParentController extends Controller
{
    /**
     * Liste des relations élève-parent
     */
    public function index()
    {
        return response()->json(Eleve_Parent::all(), 200);
    }

    /**
     * Associer un élève à un parent
     */
    public function store(Request $request)
    {
        $request->validate([
            'eleves_id' => 'required|exists:eleves,id',
            'parent_id' => 'required|exists:parent_eleves,id',
        ]);

        $relation = Eleve_Parent::create([
            'eleves_id' => $request->eleves_id,
            'parent_id' => $request->parent_id,
        ]);

        return response()->json([
            'message' => 'Relation élève-parent créée avec succès',
            'data' => $relation
        ], 201);
    }

    /**
     * Supprimer une relation
     */
    public function destroy(Eleve_Parent $eleve_parent)
    {
        $eleve_parent->delete();

        return response()->json([
            'message' => 'Relation supprimée avec succès'
        ], 200);
    }
}
