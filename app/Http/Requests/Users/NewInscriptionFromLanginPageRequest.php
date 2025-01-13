<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class NewInscriptionFromLanginPageRequest extends FormRequest
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
        // dd($this->all());
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'terms' => 'required|accepted', 
            'country' => 'required|string|max:100',
            'accountType' => 'required|in:personal,business,admin',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', 
            'bio' => 'nullable|string|max:500', 
        ];
        // dd($this->all());
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.email' => 'Veuillez fournir une adresse e-mail valide.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            // 'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'terms.accepted' => 'Vous devez accepter les conditions générales.',
            'country.required' => 'Le pays est obligatoire.',
            'accountType.required' => 'Le champ type de compte est obligatoire.',
            'accountType.in' => 'Le type de compte sélectionné est invalide.',
            'profile_picture.image' => 'Le fichier doit être une image.',
            'profile_picture.mimes' => 'L\'image doit être au format jpg, jpeg ou png.',
            'profile_picture.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'bio.max' => 'La bio ne peut pas dépasser 500 caractères.',
        ];
    }
}
