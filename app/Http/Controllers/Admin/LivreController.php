<?php

namespace App\Http\Controllers\Admin;

use App\Models\Livre;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Livres\StoreLivreRequest;
use App\Http\Requests\Livres\UpdateLivreRequest;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::all();
        return view('admin.livres.index', ['livres' => $livres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.livres.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivreRequest $request)
    {
        DB::beginTransaction();
        try {
             // Validation des données
        $validated = $request->validated();
        // Formatage du nom du dossier (titre avec espaces remplacés et date ajoutée)
        $formattedTitle = str_replace([' ', '_'], '-', $validated['title']);
        $folderName = $formattedTitle . '_' . now()->format('dmY'); // Ex: Candid_voltaire_120125

        // Chemin du dossier
        $folderPath = public_path("books/{$folderName}");
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true); // Crée le dossier avec permissions
        }

        // Stockage de l'image de couverture
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->storeAs(
                "books/{$folderName}", // Dossier spécifique au livre
                'cover_image.' . $request->file('cover_image')->extension(),
                'public' // Stockage public
            );
        }
        // Stockage du fichier PDF
        $pdfPath = null;
        if ($request->hasFile('url')) {
            $pdfPath = $request->file('url')->storeAs(
                "books/{$folderName}", // Dossier spécifique au livre
                'book_file.' . $request->file('url')->extension(),
                'public' // Stockage public
            );
        }
        Livre::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'cover_image' => $coverImagePath,
        'url' => $pdfPath,
        'category_id' => $validated['category_id'],
        'has_digital_version' => $validated['has_digital_version'] ?? false,
        'langage' => $validated['langage'],
        'nbr_page' => $validated['nbr_page'],
        'bio_author' => $validated['bio_author'],
        'author' => $validated['author'],
        'price' => $validated['price'],
        ]);
            DB::commit(); // Valide la transaction
            return redirect()->back()->with('success', 'Livre créé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error('Erreur lors du téléchargement du fichier PDF : ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivreRequest $request, Livre $livre)
    {
        DB::beginTransaction();

    try {
        // Validation des données
        $validated = $request->validated();

        // Formatage du nom du dossier (titre avec espaces remplacés et date ajoutée)
        $formattedTitle = str_replace([' ', '_'], '-', $validated['title']);
        $folderName = $formattedTitle . '_' . now()->format('dmY'); // Ex: Candid_voltaire_120125

        // Chemin du dossier
        $folderPath = public_path("books/{$folderName}");
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0755, true); // Crée le dossier avec permissions
        }

       // Mise à jour de l'image de couverture
        $coverImagePath = $livre->cover_image;
        if ($request->hasFile('cover_image')) {
            // Nettoyage du nom du fichier
            $originalName = $request->file('cover_image')->getClientOriginalName();
            $cleanedName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
            $extension = $request->file('cover_image')->extension();

            $coverImagePath = $request->file('cover_image')->storeAs(
                "books/{$folderName}",
                $cleanedName . '.' . $extension,
                'public'
            ); 
        }

        // Mise à jour du fichier PDF
        $pdfPath = $livre->url;
        if ($request->hasFile('url')) {
            // Nettoyage du nom du fichier
            $originalName = $request->file('url')->getClientOriginalName();
            $cleanedName = preg_replace('/[^a-zA-Z0-9_\-\.]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
            $extension = $request->file('url')->extension();

            $pdfPath = $request->file('url')->storeAs(
                "books/{$folderName}",
                $cleanedName . '.' . $extension,
                'public'
            );
        }


        // Mise à jour du livre
        $livre->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'cover_image' => $coverImagePath,
            'url' => $pdfPath,
            'category_id' => $validated['category_id'],
            'has_digital_version' => $validated['has_digital_version'] ?? false,
            'langage' => $validated['langage'],
            'nbr_page' => $validated['nbr_page'],
            'bio_author' => $validated['bio_author'],
            'author' => $validated['author'],
            'price' => $validated['price'],
        ]);

        DB::commit();

        return redirect()->back()->with('success', 'Livre mis à jour avec succès.');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->withErrors('Une erreur est survenue : ' . $e->getMessage());
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        
    }
}
