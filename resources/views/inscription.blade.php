{{-- @dump($errors->all()) --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librio - Inscription</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #F5A623;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        .signup-container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }

        .logo {
            height: 40px;
            width: auto;
            margin-bottom: 2rem;
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #2C3E50;
            margin-bottom: 1.5rem;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #3A80D2;
        }

        .account-type-selector {
            margin-bottom: 1.5rem;
        }

        .form-check-label {
            cursor: pointer;
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e0e0e0;
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="signup-container">
            <!-- Logo -->
            <div class="text-center">
                <img src="{{ asset('assets/img/logo.png') }}" width="120px" height="40px" alt="Librio" class="logo">
            </div>

            <!-- Titre du formulaire -->
            <h1 class="form-title text-center">Créer votre compte</h1>

            <!-- Formulaire -->
            <form action="{{route('landing.new_inscription')}}" method="POST">
                @csrf
                <!-- Type de compte -->
                <div class="account-type-selector">
                    <label class="form-label">Type de compte</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="accountType" value="personal" id="personal" {{ old('accountType') == 'personal' ? 'checked' : '' }}>
                            <label class="form-check-label" for="personal">
                                Particulier
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="accountType" value="business" id="business"  {{ old('accountType') == 'business' ? 'checked' : '' }}>
                            <label class="form-check-label" for="business">
                                Entreprise
                            </label>
                        </div>
                    </div>
                    @error('accountType')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nom complet -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"  required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"  required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pays -->
                <div class="mb-3">
                    <label for="country" class="form-label">Pays d'origine</label>
                    <select class="form-select" id="country" name="country" required>
                        <option value="">Sélectionnez votre pays</option>
                        <option value="FR" {{ old('country') == 'FR' ? 'selected' : '' }}>France</option>
                        <option value="BE" {{ old('country') == 'BE' ? 'selected' : '' }}>Belgique</option>
                        <option value="CH" {{ old('country') == 'CH' ? 'selected' : '' }}>Suisse</option>
                        <option value="CA" {{ old('country') == 'CA' ? 'selected' : '' }}>Canada</option>
                    </select>
                    @error('country')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                    <div class="form-text">8 caractères minimum, incluant une majuscule et un chiffre</div>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- CGU -->
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms"  name="terms" value="1" required>
                        <label class="form-check-label" for="terms">
                            J'accepte les <a href="{{route('landing.condition')}}" target="_target" class="text-decoration-none">conditions d'utilisation</a> et la <a target="_target" href="{{route('landing.politique')}}" class="text-decoration-none">politique de confidentialité</a>
                        </label>
                    </div>
                    @error('terms')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton de soumission -->
                <button type="submit" class="btn btn-primary">
                    Créer mon compte
                </button>

                <!-- Lien de connexion -->
                <div class="login-link">
                    Déjà membre ? <a href="{{route('login')}}">Se connecter</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>