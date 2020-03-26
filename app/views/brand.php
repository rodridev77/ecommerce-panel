<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Brands</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active"><a href="#">Page Down</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="table-responsive justify-content-center">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Qtd. Produtos</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brands as $brand): ?>
                        <tr>
                            <td data-name="" >Brand Name</td>
                            <td data-name="" >Brand Item Quantity</td>
                            <td><a class="btn btn-outline-warning btn-block edit" href="javascript:" onclick="edit_brand();" >Editar</a></td>
                            <td>
                                <a class="btn btn-outline-danger btn-block" href="javascript:"
                                   id="remove-brand" value="" onclick="remove_brand();" >
                                    Remover
                                </a>
                            </td >
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <nav class="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:" onclick="brand_add();">Adicionar Marca</a>
                </li>
            </ul>
        </nav>
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<?php $this->loadView("forms/", "brand_add"); ?>