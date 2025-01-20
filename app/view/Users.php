
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
                                        <th scope="col">firstname</th>
                                        <th scope="col">lastname</th>
                                        <th scope="col">email</th>
                                        <th scope="col">role</th>
                                        <th scope="col">description</th>
                                        <th scope="col">status</th>
                                        <th scope="col"></th>


                                       
                                        <th></th>

                                    </tr>
                                </thead>
                                <div class="d-flex flex-column">
                                    <?php foreach ($users as $userr): ?>
                                        <tbody>

                                            <tr>

                                                <td>
                                                    
                                                    <a class="text-heading font-semibold" href="#">
                                                        <?php echo ($userr->firstname); ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo ($userr->lastname); ?>
                                                </td>
                                                <td>

                                                    <?php echo ($userr->email); ?>
                                                </td>
                                                <td>
                                                    <?php echo ($userr->roleName); ?>
                                                </td>
                                                <td>
                                                    <span class=" badge-lg badge-dot">
                                                        <?php echo ($userr->roledescription); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    
                                                    <td><span class="status-badge  <?= ($userr->status) === 'active' ? 'status-active' : 'status-inactive' ?>"><?= ($userr->status)?></span></td>
                                                </td>
                                                <td class="text-end d-flex">
                                                <button class="btn btn-sm btn-square btn-neutral text-danger-hover"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal<?= $userr->id ?>">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                <form method="post" action="?route=deleteuser">
                                                <input type="hidden" name="id" value="<?= $userr->id ?>">
                                                <button class="btn "><i class="bi bi-trash"></i></button>
                                                 </form>
                                                </td>

                                            </tr>
                                        </tbody>
                                    <?php endforeach; ?>
                                  <?php  foreach ($users as $userr) {
                                ?>
                                <div class="modal fade" id="exampleModal<?= ($userr->id); ?>" tabindex="-1"
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
                                                    action="http://localhost:8081/youdemy/?route=updatestatus&id=<?= ($userr->id); ?>">
                                                    <div class="bg-light p-4 rounded shadow-sm">
                                                        <h2 class="mb-4">Add categorie</h2>
                                                        <input type="hidden" name="id" value="<?=$userr->id?>" >
                                                       
                                                        <div class="mb-3">
                                                            <label for="rating" class="form-label">description</label>
                                                            <input type="text" name="status" id="status"
                                                                value="<?= ($userr->status); ?>" class="form-control"
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
                            </table>
                        </div>
                    </div>
                </div>
            </main>
    