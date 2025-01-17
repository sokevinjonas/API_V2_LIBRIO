<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getProfile(){
        $userId = Auth::user()->id;
        return User::where('id', $userId)->first();
    }
    public function updateProfile(array $data, $user): bool
    {
        if (isset($data['profile_picture'])) {
            // Supprimer l'ancienne image si elle existe
            if ($user->profile_picture && Storage::exists('public/' . $user->profile_picture)) {
                Storage::delete('public/' . $user->profile_picture);
            }

            // Stocker la nouvelle image
            $data['profile_picture'] = $data['profile_picture']->store('avatars', 'public');
        }
        // dd($data);
        // Mise à jour de l'utilisateur
        return $user->update($data);
    }

    public function updatePassword($user, string $password): bool
    {
        // Hacher le nouveau mot de passe et sauvegarder
        $user->password = Hash::make($password);
        // dd("Hasher du new password ok:", $user);
        return $user->save();
    }
}
