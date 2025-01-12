<?php

namespace App\Http\Requests\Livres;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Image max 2MB
            'category_id' => 'required|exists:categories,id',
            'has_digital_version' => 'nullable|boolean',
            'langage' => 'required|in:Francais,Anglais',
            'nbr_page' => 'nullable|integer|min:1',
            'bio_author' => 'nullable|string',
            'author' => 'required|string|max:255',
            'url' => 'required|file|mimes:pdf|max:50120',
            'price' => 'nullable|numeric|min:0',
        ];
    }

    /**
     * Messages d'erreur personnalisés.
     */
    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
            'description.required' => 'La description est obligatoire.',
            'description.string' => 'La description doit être une chaîne de caractères.',
            'cover_image.image' => 'La couverture doit être une image.',
            'cover_image.mimes' => 'La couverture doit être au format jpeg, png ou jpg.',
            'cover_image.max' => 'La couverture ne peut pas dépasser 2 Mo.',
            'category_id.required' => 'La catégorie est obligatoire.',
            'category_id.exists' => 'La catégorie sélectionnée est invalide.',
            'langage.required' => 'Le langage est obligatoire.',
            'langage.in' => 'Le langage doit être soit Français, soit Anglais.',
            'nbr_page.integer' => 'Le nombre de pages doit être un entier.',
            'nbr_page.min' => 'Le nombre de pages doit être supérieur ou égal à 1.',
            'author.required' => 'L’auteur est obligatoire.',
            'author.string' => 'L’auteur doit être une chaîne de caractères.',
            'author.max' => 'Le nom de l’auteur ne peut pas dépasser 255 caractères.',
            'url.required' => 'Le fichier PDF est obligatoire.',
            'url.file' => 'Le champ doit contenir un fichier.',
            'url.mimes' => 'Le fichier doit être un PDF.',
            'url.max' => 'Le fichier PDF ne peut pas dépasser 50 Mo.',
            'price.numeric' => 'Le prix doit être un nombre.',
            'price.min' => 'Le prix doit être supérieur ou égal à 0.',
        ];
    }
}
