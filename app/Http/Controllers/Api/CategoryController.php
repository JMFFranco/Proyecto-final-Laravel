<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Muestra todas las categorías.
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Crea una nueva categoría.
     */
    public function store(StoreCategoryRequest  $request)
    {
        $category = Category::create($request->validated());
        return response()->json($category, 201);
    }

    /**
     * Muestra una categoría específica según su slug.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Actualiza una categoría existente.
     */
    public function update(UpdateCategoryRequest  $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    /**
     * Elimina una categoría.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Categoría eliminada correctamente.']);
    }
}
