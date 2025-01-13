<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\NewInscriptionFromLanginPageRequest;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    
    function inscription()
    {
        return view('inscription');
    }

    function condition()
    {
        return view('conditions_d_utilisation');
    }

    function politique()
    {
        return view('politique');
    }
    function messageNonReception()
    {
        return view('non-reception-message');
    }

    function new_inscription_form_landing_page(NewInscriptionFromLanginPageRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $data = $request->validated();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'country' => $data['country'],
                'role' => 'vendeur', // par défaut pour un vendeur
                'accountType' => $data['accountType'],
                'terms' => $data['terms'],
            ]);
            // Envoi d'un email de confirmation

            DB::commit();
            
            return redirect()->route('landing.messageNonReception')->with('success', 'Votre compte a été créé !');
            //code...
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }
}
