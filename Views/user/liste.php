<!-- page content -->
<?php
require_once __DIR__ . '/../../app/Controllers/notificationController.php';
$notifier = new notificationController();
$notifier->sendSMS("+22391000000", "Votre demande est validée !");
?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Liste des utilisateurs</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <!-- 
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">

                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Ceci est la liste de tous les agents du pays.
                                    </p>
                                    <div id="datatable-buttons_wrapper"
                                        class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                                        <table id="datatable-buttons"
                                            class="table table-striped table-bordered dataTable no-footer dtr-inline collapsed"
                                            style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="datatable-buttons" rowspan="1" colspan="1"
                                                        style="width: 41.4667px;" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending">
                                                        Nom</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 52.4667px;"
                                                        aria-label="Position: activate to sort column ascending">
                                                        Prenom</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 38.4667px;"
                                                        aria-label="Office: activate to sort column ascending">
                                                        Adresse</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 25.4667px;"
                                                        aria-label="Age: activate to sort column ascending">
                                                        Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 46.4667px; display: none;"
                                                        aria-label="Start date: activate to sort column ascending">
                                                        Telephone</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                        rowspan="1" colspan="1" style="width: 48px; display: none;"
                                                        aria-label="Salary: activate to sort column ascending">
                                                        Action</th>
                                                </tr>
                                            </thead>


                                            <tbody>

                                                <tr role="row" class="odd">
                                                    <td tabindex="0" class="sorting_1">Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td style="display: none;">2008/11/28</td>
                                                    <td style="display: none;">$162,700</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="dataTables_info" id="datatable-buttons_info" role="status"
                                            aria-live="polite">Showing 1 to 10 of 57 entries
                                        </div>
                                        <div class="dataTables_paginate paging_simple_numbers"
                                            id="datatable-buttons_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled"
                                                    id="datatable-buttons_previous"><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="0"
                                                        tabindex="0">Previous</a></li>
                                                <li class="paginate_button active"><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="1"
                                                        tabindex="0">1</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="2"
                                                        tabindex="0">2</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="3"
                                                        tabindex="0">3</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="4"
                                                        tabindex="0">4</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="5"
                                                        tabindex="0">5</a></li>
                                                <li class="paginate_button "><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="6"
                                                        tabindex="0">6</a></li>
                                                <li class="paginate_button next" id="datatable-buttons_next"><a href="#"
                                                        aria-controls="datatable-buttons" data-dt-idx="7"
                                                        tabindex="0">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container mt-5">
            <h2 class="mb-4">Gestion des Utilisateurs</h2>

            <!-- Tableau des utilisateurs -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['nom']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td>
                            <button class="btn btn-sm btn-primary"
                                onclick="editUser(<?= $user['id'] ?>, '<?= $user['role'] ?>')">Modifier Rôle</button>
                            <button class="btn btn-sm btn-info"
                                onclick="viewDetails(<?= $user['id'] ?>)">Détails</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Modal Modifier Rôle -->
        <div class="modal fade" id="editRoleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modifier le Rôle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editRoleForm" method="post" action="update_role.php">
                            <input type="hidden" id="userId" name="user_id">
                            <label for="role" class="form-label">Nouveau Rôle :</label>
                            <select name="role" id="role" class="form-control">
                                <option value="citoyen">Citoyen</option>
                                <option value="admin">Admin</option>
                                <option value="superAdmin">Super Admin</option>
                            </select>
                            <div class="mt-3 text-end">
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function editUser(userId, userRole) {
    document.getElementById('userId').value = userId;
    document.getElementById('role').value = userRole;
    new bootstrap.Modal(document.getElementById('editRoleModal')).show();
}
</script>