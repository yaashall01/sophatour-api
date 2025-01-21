<?php

namespace App\Http\Controllers;

use App\Services\UtilisateurService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UtilisateurController extends Controller
{
    protected $utilisateurService;

    public function __construct(UtilisateurService $utilisateurService)
    {
        $this->utilisateurService = $utilisateurService;
    }

    public function index()
    {
        $utilisateurs = $this->utilisateurService->getUtilisateurs();
        return response()->json($utilisateurs);
    }

    public function show($id)
    {
        $utilisateur = $this->utilisateurService->getUtilisateur($id);
        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur not found'], 404);
        }
        return response()->json($utilisateur);
    }

    public function store(Request $request)
    {
        try {
            $utilisateur = $this->utilisateurService->createUtilisateur($request->all());
            return response()->json(['message' => 'Utilisateur created successfully', 'utilisateur' => $utilisateur], 201);
        } catch (ValidationException $e) {
            return response()->json($e->errors(), 422);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $utilisateur = $this->utilisateurService->updateUtilisateur($id, $request->all());
            if (!$utilisateur) {
                return response()->json(['message' => 'Utilisateur not found'], 404);
            }
            return response()->json(['message' => 'Utilisateur updated successfully', 'utilisateur' => $utilisateur]);
        } catch (ValidationException $e) {
            return response()->json($e->errors(), 422);
        }
    }

    public function destroy($id)
    {
        $result = $this->utilisateurService->deleteUtilisateur($id);
        if (!$result) {
            return response()->json(['message' => 'Utilisateur not found'], 404);
        }
        return response()->json(['message' => 'Utilisateur deleted successfully']);
    }
}