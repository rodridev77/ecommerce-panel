<?php $this->loadView("template/", "header_page", array("title" => "Staff")); ?>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="table-responsive justify-content-center">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Staff</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staffs as $staff): ?>
                        <?php extract($staff); ?>
                        <tr>
                            <td data-name="" ><?php echo $name; ?></td>
                            <td>
                                <a class="btn btn-outline-warning btn-block" href="javascript:" onclick='staff_updform(<?php echo json_encode($staff); ?>);' >
                                    Editar
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger btn-block" href="javascript:"
                                   id="remove-brand" value="" onclick="staff_del(<?php echo $id; ?>);" >
                                    Remover
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <nav class="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:" onclick='staff_addform();'>Novo Staff</a>
                </li>
            </ul>
        </nav>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<?php $this->loadView("forms/", "staff_add"); ?>
<?php $this->loadView("forms/", "staff_update"); ?>
<?php $this->loadView("alerts/", "staff_alert"); ?>

<script src="<?php echo BASE_URL ?>app/libs/js/staff.js"></script>