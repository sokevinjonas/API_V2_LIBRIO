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
        .container a:hover {
            background-color: #0056b3;
        }
        .container .secondary-text {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #777;
        }
        .container .secondary-text a {
            color: #639edd;
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="color: green">Validez votre inscription</h1>
        <p>
            Merci de vous être inscrit ! Nous avons envoyé un email à l'adresse que vous avez fournie. 
            Veuillez vérifier votre boîte mail pour valider votre inscription.
        </p>
        <p>
            Si vous ne recevez pas l'email :
        </p>
        <ul style="text-align: left; padding-left: 20px;">
            <li>Vérifiez votre boîte de spam.</li>
            <li>Assurez-vous que l'adresse email fournie est correcte.</li>
        </ul>
        <a href="#" class="btn">Renvoyer l'email de validation</a>
        <p class="secondary-text">
            Toujours pas reçu ? Contactez notre <a href="#">support technique</a>.
        </p>
    </div>
</body>
</html>
