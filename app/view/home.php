<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Plateforme d'apprentissage en ligne</title>
    <style>
        :root {
            --gradient: linear-gradient(to left top, rgb(36, 138, 221) 10%, rgb(78, 47, 255) 90%) !important;
        }

        body {
            background: #f4f7fc;
            font-family: Arial, sans-serif;
        }

        .courses {
            padding: 3rem 2rem;
            text-align: center;
        }

        .course-grid {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 2rem;
            padding: 2rem;
            scroll-behavior: smooth;
        }

        .course-grid::-webkit-scrollbar {
            height: 8px;
        }

        .course-grid::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .course-grid::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .col-md-4 {
            min-width: 300px;
            flex: 0 0 auto;
        }

        .card {
            position: relative;
            background: white;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 1rem;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
        }

        .card .card-img-top {
            height: 250px;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .tag {
            display: inline-block;
            background: var(--gradient);
            color: white;
            padding: 5px 15px;
            margin: 3px;
            border-radius: 20px;
            font-size: 0.85em;
            transition: transform 0.3s ease;
        }

        .tag:hover {
            transform: translateY(-2px);
        }

        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: var(--gradient);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 47, 255, 0.3);
        }

        .btn-danger {
            background: linear-gradient(to left top, #ff4b4b, #ff6b6b);
            border: none;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 75, 75, 0.3);
        }

        @media (max-width: 768px) {
            .course-grid {
                padding: 1rem;
                gap: 1rem;
            }
        }

        <> :root {
            --gradient: linear-gradient(to left top, rgb(36, 138, 221) 10%, rgb(78, 47, 255) 90%) !important;
        }

        body {
            background: #f4f7fc;
            font-family: Arial, sans-serif;
        }

        .card {
            /* color: rgba(250, 250, 250, 0.8); */
            margin-bottom: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }



        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .card-subtitle {
            font-size: 1rem;
            color: #555;
            margin-top: 5px;
        }

        .tag {
            display: inline-block;
            background-color: #007BFF;
            color: white;
            padding: 5px 10px;
            margin: 3px;
            border-radius: 20px;
            font-size: 0.9em;
        }

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
            /* display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); */
            display: flex;
            flex-direction: row;
            justify-content: space-around;
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
            <?php
                if(isset($_SESSION["authUser"])){
            ?>
            <a href="./?route=logout">logout</a>
            <a href="./?route=mycours">my cours</a>
            

            <?php
                } else{
            ?>
            <a href="./?route=login">s'inscrire</a>
            <a href="./?route=home">Connexion</a>

            <?php
                }
                ?>

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
            <?php foreach ($courses as $cours): ?>
                <div class="col-md-4">
                    <div class="card shadow">
                        <img src="<?php echo ($cours->getPhoto()); ?>" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo ($cours->getTitre()); ?></h5>
                            <h6 class="card-subtitle"><?php echo ($cours->getcontenu()); ?></h6>
                            <p class="card-subtitle"><?php echo ($cours->getDescription()); ?></p>
                            <p>Category: <strong><?php echo ($cours->cat); ?></strong></p>
                            <h6>Tags: </h6>
                            <?php if (!empty($cours->getTag())): ?>
                                <?php foreach ($cours->getTag() as $key): ?>
                                    <span class="tag"><?php echo $key->getName(); ?></span>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <span>No Tags</span>
                            <?php endif; ?>
                            <p>Instructor: <strong><?php echo ($cours->user); ?></strong></p>
                            <?php
                            if (isset($_SESSION["authUser"])){
                                ?>
                                <form method="post" action="./?route=inscrire" class="mt-3">
                                    <input type="hidden" name="cours_id" value="<?= $cours->getId() ?>">
                                    <button class="btn btn-primary w-100">S'inscrire</button>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>

</html>