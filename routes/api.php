<?php
use App\Http\Controllers\EleveController;

use App\Http\Controllers\ClasseController;

// Route::apiResource('eleves', EleveController::class);

// Lister tous les élèves
Route::get('/eleves', [EleveController::class, 'index']);

// Ajouter un élève
Route::post('/eleves', [EleveController::class, 'store']);

// Voir un élève spécifique
Route::get('/eleves/{eleve}', [EleveController::class, 'show']);

// Modifier un élève
Route::put('/eleves/{eleve}', [EleveController::class, 'update']);
Route::patch('/eleves/{eleve}', [EleveController::class, 'update']);

// Supprimer un élève
Route::delete('/eleves/{eleve}', [EleveController::class, 'destroy']);

    Route::get('/', [ClasseController::class, 'index']);
    Route::post('/', [ClasseController::class, 'store']);
    Route::get('/{classe}', [ClasseController::class, 'show']);
    Route::put('/{classe}', [ClasseController::class, 'update']);
    Route::patch('/{classe}', [ClasseController::class, 'update']);
    Route::delete('/{classe}', [ClasseController::class, 'destroy']);

