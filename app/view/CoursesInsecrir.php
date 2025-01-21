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
                            <th>photo</th>
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
                                <td><?= ($cours->getPhoto()) ?></td>

                                <td><?= ($cours->cat) ?></td>
                                <td>
                                    <?php

                                    if (!empty($cours->getTag())): ?>
                                        <?php foreach ($cours->getTag() as $tag): ?>
                                            <span class="badge bg-primary"><?= ($tag->getName()) ?></span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span>Aucun Tag</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= ($cours->user) ?></td>
                                <td class="text-end">
                                    <!-- Actions -->
                                    <button class="btn d-inline-flex btn-sm btn-primary mx-1" type="button"
                                        data-bs-toggle="modal" data-bs-target="#editModal_<?= $cours->getId() ?>">
                                        <span class="pe-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
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


                <!--modal modif cours-->

                <?php
                foreach ($courses as $cours): ?>
                    <div class="modal fade" id="editModal_<?= $cours->getId() ?>" tabindex="-1"
                        aria-labelledby="editModalLabel_<?= $cours->getId() ?>" aria-hidden="true">
                        <div class="modal-dialog">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalLabel_<?= $cours->getId() ?>">
                                        Modifier le Cours:
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post"
                                        action="http://localhost:8081/youdemy/?route=updateCours&id=<?= $cours->getId() ?>">
                                        <div class="mb-3">
                                            <label for="titre" class="form-label">Titre</label>
                                            <input type="text" class="form-control" name="titre" id="titre"
                                                value="<?= $cours->getTitre() ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="contenu" class="form-label">Contenu</label>
                                            <input type="text" class="form-control" name="contenu" id="contenu"
                                                value="<?= $cours->getcontenu() ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">description</label>
                                            <textarea class="form-control" name="imageUrl" id="description" rows="3"
                                                required><?= $cours->getPhoto() ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">photo</label>
                                            <textarea class="form-control" name="description" id="description" rows="3"
                                                required><?= $cours->getDescription() ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categorie_<?= $cours->getId() ?>"
                                                class="form-label">Catégorie</label>
                                            <select class="form-select" name="categorie_id" id="categorie" required>
                                                <?php foreach ($cats as $categorie): ?>
                                                    <option value="<?= $categorie->id ?>"><?= $categorie->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Tags</label>
                                            <select class="form-multi-select form-select" name="tags[]" multiple>
                                                <?php foreach ($tags as $tag): ?>
                                                    <option value="<?= $tag->id ?>" <?= in_array($tag->id, array_map(fn($t) => $t->id, $cours->getTag())) ? 'selected' : '' ?>>
                                                        <?= $tag->name ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-success">Modifier</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

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
                            <textarea class="form-control" name="description" id="description" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="imageUrl" class="form-label">URL de l'image</label>
                            <input type="url" class="form-control" name="imageUrl" id="imageUrl"
                                placeholder="https://exemple.com/image.jpg" required>
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




</main>