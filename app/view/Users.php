
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
                                        <th>statut</th>
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
                                                    <span class="badge badge-lg badge-dot">
                                                        <?php echo ($userr->roledescription); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php echo ($userr->status); ?>
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
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
    