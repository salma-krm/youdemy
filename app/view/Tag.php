



            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">

                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">

                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">

                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">

                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Applications</h5>
                        </div>
                        <div class=" users-container table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">name</th>
                                        <th scope="col">description</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <div class="d-flex flex-column">
                                    <?php foreach ($tags as $tag): ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo ($tag->name); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($tag->description); ?>
                                                </td>

                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-square btn-neutral text-danger-hover"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal<?= ($tag->id); ?>">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <a href="?route=deletetag&id=<?= ($tag->id); ?>"
                                                    
                                                        class="btn btn-sm btn-square btn-neutral text-danger-hover"
                                                        onclick="showSweetAlert()"
                                                        class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                </div>
                            </table>
                            <?php
                            foreach ($tags as $tag) {
                                ?>
                                <div class="modal fade" id="exampleModal<?= ($tag->id); ?>" tabindex="-1"
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
                                                    action="http://localhost:8081/youdemy/index.php?id=<?= ($tag->id); ?>">
                                                    <div class="bg-light p-4 rounded shadow-sm">
                                                        <h2 class="mb-4">Add categorie</h2>
                                                        <input type="hidden" name="id" value="<?=$tag->id?>" >
                                                        <div class="mb-3">
                                                            <label for="name" class="form-label">Name</label>
                                                            <input type="text" value="<?= ($tag->name); ?>" name="name"
                                                                id="name" class="form-control"
                                                                placeholder="Enter votre name" required />
                                                            <!-- <div id="nameErr" class="text-danger"></div> -->
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="rating" class="form-label">description</label>
                                                            <input type="text" name="description" id="description"
                                                                value="<?= ($tag->description); ?>" class="form-control"
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
                
    <!--  ajouter une categories -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter categorie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method='POST' action="./?route=addtag">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom"
                                aria-describedby="nomUtilisateur">
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">description</label>
                            <input type="text" class="form-control" name="description" id="description"
                                aria-describedby="nomUtilisateur">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class=" btn btn-success">Ajouter Categorie</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </main>
  