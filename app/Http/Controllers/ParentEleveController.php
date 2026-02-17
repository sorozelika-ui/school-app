<?php

namespace App\Http\Controllers;

use App\Models\ParentEleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentEleveController extends Controller
{
    /**
     * Liste de tous les parents
     */
    public function index()
    {
        return response()->json(ParentEleve::all(), 200);
    }

    /**
     * Enregistrer un parent
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_pere' => 'required|string|max:255',
            'prenom_pere' => 'required|string|max:255',
            'contact_pere' => 'required|string|max:20',
            'email_pere' => 'required|email|unique:parent_eleves,email_pere',
            'pass_pere' => 'required|min:6',
            'quartier_pere' => 'nullable|string|max:255',
            'profession_pere' => 'nullable|string|max:255',

            'nom_mere' => 'required|string|max:255',
            'prenom_mere' => 'required|string|max:255',
            'contact_mere' => 'required|string|max:20',
            'email_mere' => 'required|email|unique:parent_eleves,email_mere',
            'pass_mere' => 'required|min:6',
            'quartier_mere' => 'nullable|string|max:255',
            'profession_mere' => 'nullable|string|max:255',
        ]);

        $parent = ParentEleve::create([
            'nom_pere' => $request->nom_pere,
            'prenom_pere' => $request->prenom_pere,
            'contact_pere' => $request->contact_pere,
            'email_pere' => $request->email_pere,
            'pass_pere' => Hash::make($request->pass_pere),

            'quartier_pere' => $request->quartier_pere,
            'profession_pere' => $request->profession_pere,

            'nom_mere' => $request->nom_mere,
            'prenom_mere' => $request->prenom_mere,
            'contact_mere' => $request->contact_mere,
            'email_mere' => $request->email_mere,
            'pass_mere' => Hash::make($request->pass_mere),

            'quartier_mere' => $request->quartier_mere,
            'profession_mere' => $request->profession_mere,
        ]);

        return response()->json([
            'message' => 'Parent enregistré avec succès',
            'data' => $parent
        ], 201);
    }

    /**
     * Afficher un parent spécifique
     */
    public function show(ParentEleve $parentEleve)
    {
        return response()->json($parentEleve, 200);
    }

    /**
     * Modifier un parent
     */
    public function update(Request $request, ParentEleve $parentEleve)
    {
        $data = $request->only([
            'nom_pere',
            'prenom_pere',
            'contact_pere',
            'email_pere',
            'quartier_pere',
            'profession_pere',
            'nom_mere',
            'prenom_mere',
            'contact_mere',
            'email_mere',
            'quartier_mere',
            'profession_mere',
        ]);

        if ($request->filled('pass_pere')) {
            $data['pass_pere'] = Hash::make($request->pass_pere);
        }

        if ($request->filled('pass_mere')) {
            $data['pass_mere'] = Hash::make($request->pass_mere);
        }

        $parentEleve->update($data);

        return response()->json([
            'message' => 'Parent modifié avec succès',
            'data' => $parentEleve
        ], 200);
    }

    /**
     * Supprimer un parent
     */
    public function destroy(ParentEleve $parentEleve)
    {
        $parentEleve->delete();

        return response()->json([
            'message' => 'Parent supprimé avec succès'
        ], 200);
    }
}
