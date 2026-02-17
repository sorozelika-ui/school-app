<?php

namespace App\Http\Controllers;
use App\Models\Notes;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Notes::with(['matiere', 'prof', 'elev'])->get();

        return response()->json($notes, 200);
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
            'note' => 'required|numeric|min:0|max:20',
            'periode' => 'required|string|max:50',
            'matiere_id' => 'required|exists:matieres,id',
            'professeur_id' => 'required|exists:professeurs,id',
            'eleve_id' => 'required|exists:eleves,id',
        ]);

        $note = Notes::create($request->all());

        return response()->json([
            'message' => 'Note enregistrée avec succès',
            'data' => $note->load(['matiere', 'prof', 'elev'])
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Notes $note)
    {
        return response()->json(
            $note->load(['matiere', 'prof', 'elev']),
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
     public function update(Request $request, Notes $note)
    {
        $request->validate([
            'note' => 'sometimes|required|numeric|min:0|max:20',
            'periode' => 'sometimes|required|string|max:50',
        ]);

        $note->update($request->only(['note', 'periode']));

        return response()->json([
            'message' => 'Note modifiée avec succès',
            'data' => $note->load(['matiere', 'prof', 'elev'])
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notes $note)
    {
        $note->delete();

        return response()->json([
            'message' => 'Note supprimée avec succès'
        ], 200);
    }
}
