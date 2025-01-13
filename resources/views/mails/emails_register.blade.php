<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo img {
            max-width: 200px;
            height: auto;
        }
        .header {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content {
            color: #555;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            font-weight: bold;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            color: #777;
            font-size: 14px;
        }
        .note {
            background-color: #f8f8f8;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/img/logo.png') }}" alt="{{ config('app.name') }} Logo">
        </div>
        
        <div class="content">
            <p>Bonjour {{ $user->name }},</p>
            
            <p><strong>Félicitations !</strong> Votre compte a bien été créé sur notre plateforme.</p>
            
            <p>Nous vous avons envoyé ce message pour confirmer votre inscription. Avant de pouvoir accéder à votre compte, veuillez cliquer sur le bouton ci-dessous pour valider votre email.</p>
            
            <center>
                <a href="{{ route('landing.account.verify', ['email' => $user->email]) }}" class="button">Valider mon compte</a>
            </center>
            
            <div class="note">
                Si vous ne trouvez pas notre message dans votre boîte de réception, veuillez vérifier votre dossier de spam.
            </div>
        </div>
        
        <div class="footer">
            <p>Cordialement,<br>
            L'équipe de {{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>