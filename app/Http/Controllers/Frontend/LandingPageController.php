<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\NewRegisterUserNotification;
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
    function messageNonReception(Request $request)
    {

        $userEmail = $request->input('user');

        $user = User::where('email', $userEmail)->first();

        if ($user && !$user->email_verified_at) {
            $message = 'Veuillez vérifier votre email pour confirmer votre inscription! Nous avons envoyé un email à l\'adresse que vous avez fournie.';
        } else {
            $message = 'Votre inscription est confirmée. Vous pouvez vous connecter.';
        }
        return view('non-reception-message', compact('message', 'user'))->with('success', 'Un email de validation a été envoyé.');
    }

    public function resendValidationEmail($email)
    {
        // Vérifiez si l'utilisateur existe et que l'email n'est pas déjà vérifié
        $user = User::where('email', $email)->first();

        if ($user && is_null($user->email_verified_at)) {
            // Si l'utilisateur existe et n'est pas vérifié, renvoyer l'email de validation
            $user->notify(new NewRegisterUserNotification($user));

            return redirect()->route('landing.messageNonReception', ['user' => $user->email])
                ->with('success', 'Un nouvel email de validation a été envoyé.');
        }

        return redirect()->route('landing.messageNonReception', ['user' => $email])
            ->with('error', 'L\'utilisateur n\'existe pas ou est déjà vérifié.');
    }

    function new_inscription_form_landing_page(NewInscriptionFromLanginPageRequest $request)
    {
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
            $user->notify(new NewRegisterUserNotification($user));

            Log::info("Email de confirmation envoyé à : {$user->email}");
            
            DB::commit();

            return redirect()->route('landing.messageNonReception', ["user"=> $user->email])->with('success', 'Votre compte a été créé !');

        } catch (\Exception $e) {

            DB::rollBack();

            Log::error("Erreur lors de l'envoi de l'email de confirmation : " . $e->getMessage());

            return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function verifyEmail($email)
    {
        // Vérifier si l'utilisateur existe avec l'email passé dans l'URL
        $user = User::where('email', $email)->first();

        // Si l'utilisateur existe et que l'email n'est pas encore validé
        if ($user && is_null($user->email_verified_at)) {
            // Valider l'email en enregistrant la date actuelle dans l'attribut email_verified_at
            $user->email_verified_at = now();
            $user->save();

            // Vous pouvez ajouter une notification ou un message flash ici si nécessaire
            return redirect()->route('admin.dashboard')->with('success', 'Votre email a été validé avec succès!');
        }

        // Si l'utilisateur n'existe pas ou si l'email est déjà validé
        return redirect()->route('login')->with('error', 'L\'email de validation est invalide ou l\'utilisateur est déjà vérifié.');
    }
}
