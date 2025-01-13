<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
</head>
<body>
    <h1>Bonjour {{ $user->name }},</h1>
    <p>Félicitations ! Votre compte a bien été créé sur notre plateforme.</p>
    <p>Nous vous avons envoyé ce message pour confirmer votre inscription. Avant de pouvoir accéder à votre compte, veuillez cliquer sur le lien ci-dessous pour valider votre email.</p>
    <p><a href="#">Valider mon email</a></p>
    {{-- <p><a href="{{ route('account.verify', ['email' => $user->email]) }}">Valider mon email</a></p> --}}
    <p>Si vous ne trouvez pas notre message dans votre boîte de réception, veuillez vérifier votre dossier de spam.</p>
    <p>Cordialement,</p>
    <p>L'équipe de {{ config('app.name') }}</p>
</body>
</html>
