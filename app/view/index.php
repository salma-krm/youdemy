<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Plateforme d'apprentissage en ligne</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: #2c3e50;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        .nav-center {
            flex: 1;
            max-width: 600px;
            margin: 0 2rem;
        }

        .search-bar {
            width: 100%;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 2rem;
        }

        .hero {
            background-color: #34495e;
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .cta-button {
            background-color: #e74c3c;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
        }

        .courses {
            padding: 3rem 2rem;
            text-align: center;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 2rem;
        }

        .course-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-image {
            width: 100%;
            height: 150px;
            background-color: #bdc3c7;
        }

        .course-info {
            padding: 1rem;
        }

        .course-info h3 {
            margin-bottom: 0.5rem;
        }

        .course-info p {
            color: #666;
        }

        footer {
            background-color: #2c3e50;
            color: white;
            text-align: center;
            padding: 2rem;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">Youdemy</div>
        <div class="nav-center">
            <input type="search" class="search-bar" placeholder="Rechercher un cours...">
        </div>
        <div class="nav-links">
            
            <a href="./?route=login">s'inscrire</a>
            <a href="./?route=home">Connexion</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Apprenez à votre rythme</h1>
        <p>Des milliers de cours en ligne pour développer vos compétences</p>
        <button class="cta-button">Commencer maintenant</button>
    </section>

    <section class="courses">
        <h2>Cours populaires</h2>
        <div class="course-grid">
            <div class="course-card">
                <div class="course-image"></div>
                <div class="course-info">
                    <h3>HTML & CSS pour débutants</h3>
                    <p>Apprenez les bases du développement web</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image"></div>
                <div class="course-info">
                    <h3>JavaScript Moderne</h3>
                    <p>Maîtrisez JavaScript ES6+</p>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image"></div>
                <div class="course-info">
                    <h3>Python Avancé</h3>
                    <p>Développement backend avec Python</p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
    </footer>
</body>
</html>