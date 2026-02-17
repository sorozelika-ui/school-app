<?php

namespace App\Http\Controllers;
use App\Models\Educateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EducateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return response()->json(Educateur::all(), 200);
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
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|unique:educateurs,email',
        'pass_educ' => 'required|min:6',
        'contact' => 'nullable|string|max:20',
    ]);

    $educateur = Educateur::create([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'pass_educ' => Hash::make($request->pass_educ), // 🔐 HASH
        'contact' => $request->contact,
    ]);

    return response()->json([
        'message' => 'Educateur créé avec succès',
        'data' => $educateur
    ], 201);
    }

    /**
     * Display the specified resource.
     */
   public function show(Educateur $educateur)
    {
        return response()->json($educateur, 200);
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
    public function update(Request $request, Educateur $educateur)
    {
        $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'prenom' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:educateurs,email,' . $educateur->id,
            'pass_educ' => 'sometimes|required|string|min:6',
            'contact' => 'sometimes|nullable|string|max:20',
        ]);

        $data = $request->only([
            'nom',
            'prenom',
            'email',
            'contact'
        ]);

        // Si on veut modifier le mot de passe
        if ($request->filled('pass_educ')) {
            $data['pass_educ'] = Hash::make($request->pass_educ);
        }

        $educateur->update($data);

        return response()->json([
            'message' => 'Educateur modifié avec succès',
            'data' => $educateur
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Educateur $educateur)
    {
        $educateur->delete();

        return response()->json([
            'message' => 'Educateur supprimé avec succès'
        ], 200);
    }
}
