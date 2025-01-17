<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\ProfileRepository;
use App\Http\Requests\Users\ChangePasswordRequest;
use App\Http\Requests\Users\UpdateProfileUserRequest;

class ProfileController extends Controller
{
    protected $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.index', ['user'=> $this->profileRepository->getProfile()]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileUserRequest $request)
    {
        DB::beginTransaction();

        try {
            // Validation des données
            $data = $request->validated();

            // Récupérer l'utilisateur connecté
            $user = Auth::user();

            // Mise à jour via le repository
            $this->profileRepository->updateProfile($data, $user);

            DB::commit();

            return redirect()->back()->with('success', 'Profil mis à jour avec succès !');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        // Vérification du mot de passe actuel
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with(['error' => 'Le mot de passe actuel est incorrect.']);
        }
        // Mise à jour du mot de passe via le repository
        $isUpdated = $this->profileRepository->updatePassword($user, $request->password);

        if ($isUpdated) {
            return redirect()->back()->with('success', 'Mot de passe modifié avec succès.');
        }

        return back()->with(['error' => 'Une erreur est survenue lors de la mise à jour du mot de passe.']);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
