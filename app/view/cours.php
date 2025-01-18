<?php
require dirname(__DIR__, 2) . '/vendor/autoload.php';
use app\controller\CoursControllers;
$cours = new CoursControllers();
$courses = $cours->findAll();
use app\controller\CategorieControllers;
$cat = new CategorieControllers();
$cats = $cat->findAll();
use app\controller\TagControllers;
$tags = new TagControllers();
$tags = $tags->findAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Bootstrap Dashboard and Admin Template - ByteWebster</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        :root {
            --gradient: linear-gradient(to left top, rgb(36, 138, 221) 10%, rgb(78, 47, 255) 90%) !important;
        }

        body {
            background: #f4f7fc;
            font-family: Arial, sans-serif;
        }

        .card {
            color: rgba(250, 250, 250, 0.8);
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
            height: 180px;
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
    </style>
</head>
<body>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
            id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                    <h3 class="text-success"><img src="" width="40"><span class="text-info">YOU</span>Demy</h3>
                </a>
                <!-- User menu (mobile) -->
                <div class="navbar-user d-lg-none">
                    <div class="dropdown">
                        <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <div class="avatar-parent-child">
                                <img alt="Image Placeholder"
                                    src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80"
                                    class="avatar avatar-sm rounded-circle me-2">
                                <span class="avatar-child avatar-badge bg-success"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                            <a href="#" class="dropdown-item">Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Billing</a>
                            <hr class="dropdown-divider">
                            <a href="./index.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-bar-chart"></i> Analytics
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-chat"></i> Messages
                                <span
                                    class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./cours.php">
                                <i class="bi bi-bookmarks"></i> Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./users.php">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Tag.php">
                                <i class="bi bi-globe-americas"></i> Tag
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Categorie.php">
                                <i class="bi bi-file-text"></i> Categorie
                            </a>
                        </li>
                    </ul>
                    <hr class="navbar-divider my-5 opacity-20">
                    <div class="mt-auto"></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <h1 class="h2 mb-0 ls-tight">YouDemy Application</h1>
                            </div>
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <button class="btn d-inline-flex btn-sm btn-primary mx-1" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Create</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">All files</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Shared</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">File requests</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0"></div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0"></div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0"></div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0"></div>
                        </div>
                    </div>

                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Applications</h5>
                        </div>
                        <div class="users-container table-responsive">
                            <!-- Display courses dynamically -->
                            <div class="container mx-auto mt-4">
                                <div class="container-fluid mt-5">
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
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal for adding a course -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Cours</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method='POST' action="../../index.php">
                     <div class="mb-3">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="titre" id="titre"
                            aria-describedby="titreCours">
                    </div>
                    <div class="mb-3">
                            <label for="nom" class="form-label">Contenu</label>
                            <input type="text" class="form-control" name="contenu" id="contenu"
                                aria-describedby="nomUtilisateur">
                        </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description"
                            rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="imageUrl" class="form-label">URL de l'image</label>
                        <input type="url" class="form-control" name="imageUrl" id="imageUrl"
                            placeholder="https://exemple.com/image.jpg">
                    </div>

                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <select class="form-select" name="categorie" id="categorie">
                            <option value="" selected disabled>Sélectionnez une catégorie</option>
                            <?php foreach ($cats as $categorie): ?>
                                <option value="<?php echo $categorie->id; ?>"><?php echo ($categorie->name); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tags</label>
                        <div class="border rounded p-3">
                            <div class="d-flex flex-wrap gap-2">
                                <?php foreach ($tags as $tag): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]" value="<?php echo $tag->id; ?>" id="tag<?php echo $tag->id; ?>">
                                        <label class="form-check-label" for="tag<?php echo $tag->id; ?>"><?php echo ($tag->name); ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-success">Ajouter Cours</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
 <script src="script.js"></script>

</body>
</html>


