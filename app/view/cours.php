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
        
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Contenu</th>
                            <th>Description</th>
                            <th>Catégorie</th>
                            <th>Tags</th>
                            <th>Instructeur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $index => $cours): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= ($cours->getTitre()) ?></td>
                                <td><?= ($cours->getcontenu()) ?></td>
                                <td><?= ($cours->getDescription()) ?></td>
                                <td><?= ($cours->cat) ?></td>
                                <td>
                                    <?php if (!empty($cours->getTag())): ?>
                                        <?php foreach ($cours->getTag() as $tag): ?>
                                            <span class="badge bg-primary"><?= ($tag->getName()) ?></span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span>Aucun Tag</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= ($cours->user) ?></td>
                                <td>
                                    <!-- Actions -->
                                    <button class="btn btn-sm btn-square btn-neutral text-danger-hover"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal<?= ($cours->getId()); ?>">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                    <form method="post" action="?route=deleteCourse" class="d-inline">
                                        <input type="hidden" name="id" value="<?= $cours->getId() ?>">
                                        <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Adding a Course -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un Cours</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="http://localhost:8081/youdemy/?route=coursecreate">
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" name="titre" id="titre" required>
                        </div>
                        <div class="mb-3">
                            <label for="contenu" class="form-label">Contenu</label>
                            <input type="text" class="form-control" name="contenu" id="contenu" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">URL de l'image</label>
                            <input type="url" class="form-control" name="imageUrl" id="imageUrl" placeholder="https://exemple.com/image.jpg" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorie" class="form-label">Catégorie</label>
                            <select class="form-select" name="categorie_id" id="categorie" required>
                                <option value="" disabled selected>Sélectionnez une catégorie</option>
                                <?php foreach ($cats as $categorie): ?>
                                    <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <select class="form-multi-select form-select" name="tags[]" multiple>
                                <?php foreach ($tags as $tag): ?>
                                    <option value="<?= $tag->id ?>"><?= $tag->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--modal modif-->
    <div class="modal fade" id="exampleModal<?= ($cours->getId()); ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">update contact</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form name="player" id="addPlayr" method="post"
                                                    action="http://localhost:8081/youdemy/?route=updateCategorie&id=">
                                                    <div class="bg-light p-4 rounded shadow-sm">
                                                        <h2 class="mb-4">Add categorie</h2>
                                                        <input type="hidden" name="id" value="<?=$categorie->id?>" >
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" value="" name="name"
                                                                id="name" class="form-control"
                                                                placeholder="Enter votre name" required />
                                                            <!-- <div id="nameErr" class="text-danger"></div> -->
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="rating" class="form-label">description</label>
                                                            <input type="text" name="description" id="description"
                                                                value="" class="form-control"
                                                                placeholder="Enter your description" required />
                                                            <!-- <div id="ratingErr" class="text-danger"></div> -->
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
    
    
    
</main>
