<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $categories = Category::all();
        return view('admin.categorie.index', ['categories' => $categories]);
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
    public function store(StoreCategoryRequest $request)
    {
        // Transaction pour assurer l'intégrité des données
        DB::beginTransaction();
        try
        {
            $validated = $request->validated();
            // Crée une nouvelle catégorie
            Category::create([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
            ]);

            DB::commit(); // Valide la transaction
            return redirect()->back()->with('success', 'Catégorie mise à jour avec succès.');
        } catch (\Exception $e){
            DB::rollBack(); // Annule la transaction en cas d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Transaction pour assurer l'intégrité des données
        DB::beginTransaction();

        try {
            $validated = $request->validated();

            // Met à jour la catégorie
            $category->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? $category->description,
            ]);

            DB::commit(); // Valide la transaction

            return redirect()->back()->with('success', 'Catégorie mise à jour avec succès.');
        } catch (\Exception $e) {
            DB::rollBack(); // Annule la transaction en cas d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Transaction pour assurer l'intégrité des données
        DB::beginTransaction();

        try {
            $category->delete();

            DB::commit(); // Valide la transaction

            return redirect()->back()->with('success', 'Catégorie supprimée avec succès.');
        } catch (\Exception $e) {
            DB::rollBack(); // Annule la transaction en cas d'erreur
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression.');
        }
            
    }
}
