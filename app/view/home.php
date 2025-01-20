<?php
require dirname(__DIR__, 2) . '/vendor/autoload.php';
use app\controller\CoursControllers;
$cours = new CoursControllers();
$courses = $cours->findAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Plateforme d'apprentissage en ligne</title>
    <style>

<>
        :root {
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

        .card .card-img-top {
            object-fit: cover;
            height: 120px;
            transition: transform 0.3s ease;
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
            
            <a href="./?route=login">s'inscrire</a>
            <a href="./?route=home">Connexion</a>
        </div>
    </nav>

    <section class="hero">
        <h1>Apprenez à votre rythme</h1>
        <p>Des milliers de cours en ligne pour développer vos compétences</p>
        <button class="cta-button">Commencer maintenant</button>
    </section>

    <section class="courses" >
        <h2>Cours populaires</h2>
        <div class="course-grid d-flex justify-content-arround">
        <div class="row g-4 d-flex justify-content-around w-50">
                                        <?php foreach ($courses as $cours): ?>
                                            <div class="col-md-4 " style=" width:300px;">
                                                <div class="card shadow border-0">
                                                    <img src="<?php echo ($cours->getPhoto()); ?>" class="card-img-top"
                                                        alt="Course Image">
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
                                                        <!-- Buttons with Icons -->
                                                        <a href="#" class="btn btn-primary"><i class="bi bi-pencil"></i></a>
                                                        <a href="#" class="btn btn-danger" onclick="showSweetAlert()"><i
                                                                class="bi bi-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Youdemy. Tous droits réservés.</p>
    </footer>
    <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="script.js"></script>
</body>
</html>