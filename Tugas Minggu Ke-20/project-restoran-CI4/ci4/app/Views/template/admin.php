<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url('/bootstrap/css/bootstrap.min.css')?>">
    <title>Admin Page</title>
</head>
<body>

<div class="container">

    <div class="row mt-2 mb-3">
        <div class="col">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?= base_url('/Admin') ?>">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item mt-2 ml-5"> User : </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" href="#">
                        <?php 
                        if (!empty(session()->get('user'))) {
                            echo session()->get('user');
                        }
                        ?><span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item mt-2 ml-5">Email  :</li>
                    <li class="nav-item mt-2 ml-1">
                        <?php 
                        if (!empty(session()->get('email'))) {
                            echo session()->get('email');
                        }
                        ?>
                    </li>

                    <li class="nav-item mt-2 ml-5 ">Level  :</li>
                    <li class="nav-item mt-2 ml-1 ">
                        <?php 
                        if (!empty(session()->get('level'))) {
                            echo session()->get('level');
                            $level = session()->get('level');
                        }
                        ?>
                    </li>

                    <li class="nav-item ml-5">
                        <a class="btn btn-info" href="<?=base_url('admin/login/logout')?>">Log Out</a>
                    </li>

                </ul>
            </div>
            </nav>

           
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-4">
            <div class="card" style="width: 15rem;">
                <ul class="list-group list-group-flush">
                        <?php if ($level === "Admin") :?>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Kategori') ?>">Kategori</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Menu') ?>">Menu</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Pelanggan') ?>">Pelanggan</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Order') ?>">Order</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/OrderDetail') ?>">Order Detail</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/User') ?>">User</a></li>
                        <?php endif; ?>

                        <?php if ($level === "Kasir") :?>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Order') ?>">Order</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/OrderDetail') ?>">Order Detail</a></li>
                        <?php endif; ?>

                        <?php if ($level === "Koki") :?>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/OrderDetail') ?>">Order Detail</a></li>
                        <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="col-8 px-2">
            <?= $this->renderSection('content') ?>
        </div>

    </div>

</div>
    
    

</body>
</html>