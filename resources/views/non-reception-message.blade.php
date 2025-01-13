<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation de votre inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .container h1 {
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        .container p {
            color: #555;
            line-height: 1.5;
            margin-bottom: 1.5rem;
        }
        .container a {
            display: inline-block;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .container .btn-custom {
            display: inline-block;
            text-decoration: none;
            background-color: #333;
            color: #007bff;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .container .btn-co {
            display: inline-block;
            text-decoration: none;
            background-color: green;
            color: #ffffff;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .container a:hover {
            background-color: #4a77a7;
        }
        .container .secondary-text {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #777;
        }
        .container .secondary-text a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <h2 style="color: green">{{ session('success') }}</h2>
        @elseif (session('error'))
            <h2 style="color: red">{{ session('error') }}</h2>
        @endif
        
        <!-- Affichage du message dynamique -->
        <p>{{ $message }}</p>
    
        <p>Si vous ne recevez pas l'email :</p>
        <ul style="text-align: left; padding-left: 20px;">
            <li>Vérifiez votre boîte de spam.</li>
            <li>Assurez-vous que l'adresse email fournie est correcte.</li>
        </ul>
    
        <!-- Ajoutez une condition pour afficher le lien pour renvoyer l'email uniquement si nécessaire -->
        @if($message === 'Veuillez vérifier votre email pour confirmer votre inscription! Nous avons envoyé un email à l\'adresse que vous avez fournie.')
            <a href="{{ route('landing.resendValidationEmail', ['email' => $user->email]) }}" class="btn">Renvoyer l'email de validation</a>
        @elseif($message === 'Votre inscription est confirmée. Vous pouvez vous connecter.')
            <a href="{{ route('login') }}" class="btn-co">Se connecter</a>
        @endif
    
        <p class="secondary-text">
            Toujours pas reçu ? Contactez notre <a class="btn-custom" href="#">support technique</a>.
        </p>
    </div>    
    
</body>
</html>
