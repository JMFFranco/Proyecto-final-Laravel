<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Inertia\Inertia;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    // Listado de categorías
    public function index()
    {
        $categories = Category::orderBy('category_priority')->get();

        return Inertia::render('Categories/Index', [
            'categories' => Category::all(),
            'message' => session('message'),
        ]);
    }

    // Formulario de creación
    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    // Guardar nueva categoría
    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')
            ->with('message', 'Categoría creada correctamente.');
    }

        // Ver una categoría
    public function show(Category $category)
    {
        return Inertia::render('Categories/Show', [
            'category' => $category
        ]);
    }

    // Formulario de edición
    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', [
            'category' => $category,
        ]);
    }

    // Actualizar categoría
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')
            ->with('message', 'Categoría actualizada correctamente.');
    }

    // Eliminar categoría
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
            ->with('message', 'Categoría eliminada correctamente.');
    }
}
