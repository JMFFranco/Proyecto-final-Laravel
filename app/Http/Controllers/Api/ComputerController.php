<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreComputerRequest;
use App\Http\Requests\UpdateComputerRequest;

class ComputerController extends Controller
{
    /**
     * Muestra todas las computadoras.
     */
    public function index()
    {
        // Puedes usar with('category') si quieres incluir información de la categoría
        $computers = Computer::with('category')->get();
        return response()->json($computers);
    }

    /**
     * Crea una nueva computadora.
     */
    public function store(StoreComputerRequest  $request)
    {
        $computer = Computer::create($request->validated());
        return response()->json($computer, 201);
    }

    /**
     * Muestra una computadora específica por su slug.
     */
    public function show(Computer $computer)
    {
        return response()->json($computer->load('category'));
    }

    /**
     * Actualiza una computadora.
     */
    public function update(UpdateComputerRequest  $request, Computer $computer)
    {
        $computer->update($request->validated());
        return response()->json($computer);
    }

    /**
     * Elimina una computadora.
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();

        return response()->json(['message' => 'Computadora eliminada correctamente.']);
    }
}
