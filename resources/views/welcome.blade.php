<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librio - Partagez des livres numériques</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #F5A623;
            --light-bg: #F5F5F5;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
        }

        .logo {
            height: 40px;
            width: auto;
        }
        
        .btn {
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 500;
            transition: transform 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            box-shadow: 0 4px 6px rgba(74, 144, 226, 0.2);
        }
        
        .btn-primary:hover {
            background-color: #3A80D2;
        }
        
        .btn-secondary {
            background-color: var(--secondary-color);
            border: none;
            box-shadow: 0 4px 6px rgba(245, 166, 35, 0.2);
        }
        
        .btn-secondary:hover {
            background-color: #E59612;
        }

        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, var(--light-bg) 100%);
            padding: 8rem 0 6rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: #2C3E50;
        }

        .feature-card {
            background: white;
            border: none;
            border-radius: 16px;
            transition: transform 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .testimonial-card {
            background: white;
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .testimonial-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        .avatar {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, #2980b9 100%);
            padding: 5rem 0;
        }

        footer {
            background: #000000;
            padding: 4rem 0;
            color: #ffffff;
        }

        .footer-link {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-link:hover {
            color: white;
        }

        .navbar {
            padding: 1rem 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .nav-link {
            font-weight: 500;
            color: #2C3E50;
            padding: 0.5rem 1rem;
            margin: 0 0.5rem;
            transition: color 0.2s ease;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 6rem 0 4rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Librio" class="logo">
                Librio
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('landing.inscription')}}">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Téléchargement</a>
                    </li>
                </ul>
                <button class="btn btn-secondary"><a href="{{route('landing.inscription')}}"> Commencer </a></button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">
                        Partagez des livres, Gagnez de l'argent
                    </h1>
                    <p class="lead mb-5">
                        Découvrez une nouvelle façon de partager votre passion pour la lecture tout en générant des revenus.
                    </p>
                    <div class="d-flex gap-3">
                        <button class="btn btn-secondary"> <a href=" {{route('landing.inscription')}} ">Devenir partenaire</a></button>
                        <button class="btn btn-primary">Télécharger</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="https://placehold.co/600x400" alt="Librio App" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features for Sellers -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Une nouvelle façon de monétiser</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card p-4">
                        <i class="fas fa-dollar-sign feature-icon"></i>
                        <h3 class="h4 mb-3">Revenus passifs</h3>
                        <p class="text-muted">Transformez votre bibliothèque numérique en source de revenus réguliers.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card p-4">
                        <i class="fas fa-chart-line feature-icon"></i>
                        <h3 class="h4 mb-3">Suivi en temps réel</h3>
                        <p class="text-muted">Visualisez vos performances et optimisez vos revenus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card p-4">
                        <i class="fas fa-users feature-icon"></i>
                        <h3 class="h4 mb-3">Large audience</h3>
                        <p class="text-muted">Accédez à une communauté grandissante de lecteurs passionnés.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features for Readers -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://placehold.co/600x800" alt="App Interface" class="img-fluid rounded-4 shadow-lg mb-4 mb-lg-0">
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <h2 class="section-title">Lecture simplifiée</h2>
                    <div class="mb-4">
                        <h3 class="h5 mb-3">Bibliothèque intelligente</h3>
                        <p class="text-muted">Accédez à vos livres favoris en un clic, même hors connexion.</p>
                    </div>
                    <div class="mb-4">
                        <h3 class="h5 mb-3">Recherche avancée</h3>
                        <p class="text-muted">Trouvez rapidement les livres qui vous intéressent.</p>
                    </div>
                    <div>
                        <h3 class="h5 mb-3">Recommandations personnalisées</h3>
                        <p class="text-muted">Découvrez de nouveaux livres adaptés à vos goûts.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Témoignages</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <p class="testimonial-text mb-4">
                            "Librio a transformé ma façon de partager mes livres. Les revenus générés dépassent mes attentes !"
                        </p>
                        <div class="d-flex align-items-center">
                            <img src="https://placehold.co/60x60" alt="Avatar" class="avatar rounded-circle me-3">
                            <div>
                                <h4 class="h6 mb-1">Marie D.</h4>
                                <p class="small text-muted">Contributrice depuis 2024</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <p class="testimonial-text mb-4">
                            "Une application intuitive qui a révolutionné ma façon de découvrir de nouveaux livres."
                        </p>
                        <div class="d-flex align-items-center">
                            <img src="https://placehold.co/60x60" alt="Avatar" class="avatar rounded-circle me-3">
                            <div>
                                <h4 class="h6 mb-1">Thomas L.</h4>
                                <p class="small text-muted">Lecteur passionné</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center text-white">
            <h2 class="h1 mb-4">Prêt à commencer ?</h2>
            <p class="lead mb-5">Rejoignez notre communauté de passionnés de lecture</p>
            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-secondary btn-lg"><a href="{{route('landing.inscription')}}">Devenir partenaire</a></button>
                <button class="btn btn-light btn-lg">Télécharger l'app</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <img src="https://placehold.co/120x40" alt="Librio" class="logo mb-4">
                    <p>La nouvelle façon de partager et découvrir des livres numériques.</p>
                </div>
                <div class="col-lg-2 offset-lg-2">
                    <h5 class="mb-4">Navigation</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="footer-link">Accueil</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Fonctionnalités</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Inscription</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="mb-4">Légal</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="footer-link">Confidentialité</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Conditions</a></li>
                        <li class="mb-2"><a href="#" class="footer-link">Mentions légales</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="mb-4">Contact</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="mailto:contact@librio.com" class="footer-link">contact@librio.com</a></li>
                    </ul>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="footer-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="footer-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="footer-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>