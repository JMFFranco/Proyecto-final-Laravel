<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Inertia\Inertia;
use App\Http\Requests\StoreComputerRequest;
use App\Http\Requests\UpdateComputerRequest;
use App\Models\Category;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Computers/Index', [
            'computers' => Computer::with('category')->get(),
            'categories' => Category::all(),
            'message' => session('message')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Computers/Create', [
            'categories' => Category::all(),
            'selectedComputer' => request('category_id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComputerRequest $request)
    {
        Computer::create($request->validated());

        return redirect()->route('computers.index')
            ->with('message', 'Computador creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
        return Inertia::render('Computers/Show', [
            'computer' => $computer->load('category')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Computer $computer)
    {
        return Inertia::render('Computers/Edit', [
            'computer' => $computer,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComputerRequest $request, Computer $computer)
    {
        $computer->update($request->validated());

/*         return redirect()->route('computers.index')
            ->with('message', 'Computador actualizado correctamente.'); */
        return redirect()->route('computers.index')
            ->with('message', 'Computador actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();

        return redirect()->route('computers.index')
            ->with('message', 'Computador eliminado correctamente.');
    }
}
