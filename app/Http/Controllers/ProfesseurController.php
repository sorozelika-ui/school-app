<?php

namespace App\Http\Controllers;
use App\Models\Professeur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
            /**
             * Display a listing of the resource.
             */
            public function index()
            {
                return response()->json(Professeur::all(), 200);
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
                    'email' => 'required|email|unique:professeurs,email',
                    'pass_prof' => 'required|min:6',
                    'contact' => 'nullable|string|max:20',
                    'info_prof' => 'nullable|string|max:255',
                    ]);

                $Professeur = Professeur::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'email' => $request->email,
                    'pass_prof' => Hash::make($request->pass_prof), // 🔐 HASH
                    'contact' => $request->contact,
                    'info_prof' =>$request->info_prof,
                ]);

                return response()->json([
                    'message' => 'Professeur créé avec succès',
                    'data' => $Professeur
                ], 201);
                }

                /**
                 * Display the specified resource.
                 */
            public function show(Professeur $Professeur)
                {
                    return response()->json($Professeur, 200);
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
            public function update(Request $request, Professeur $Professeur)
            {
                $request->validate([
                    'nom' => 'sometimes|required|string|max:255',
                    'prenom' => 'sometimes|required|string|max:255',
                    'email' => 'sometimes|required|email|unique:Professeurs,email,' . $Professeur->id,
                    'pass_prof' => 'sometimes|required|string|min:6',
                    'contact' => 'sometimes|nullable|string|max:20',
                    'info_prof' => 'sometimes|nullable|string|max:255',
                ]);

                $data = $request->only([
                    'nom',
                    'prenom',
                    'email',
                    'contact',
                    'info_prof'
                ]);

                // Si on veut modifier le mot de passe
                if ($request->filled('pass_prof')) {
                    $data['pass_prof'] = Hash::make($request->pass_prof);
                }

                $Professeur->update($data);

                return response()->json([
                    'message' => 'Professeur modifié avec succès',
                    'data' => $Professeur
                ], 200);
            }


            /**
             * Remove the specified resource from storage.
             */
            public function destroy(Professeur $Professeur)
            {
                $Professeur->delete();

                return response()->json([
                    'message' => 'Professeur supprimé avec succès'
                ], 200);
            }
}
