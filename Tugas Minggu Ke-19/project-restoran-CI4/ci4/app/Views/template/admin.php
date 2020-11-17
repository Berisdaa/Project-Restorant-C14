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

    <div class="row mt-2">
        <div class="col">
            <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="<?= base_url('/Admin') ?>">Admin Page</a>
            </nav>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Kategori') ?>">Kategori</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Menu') ?>">Menu</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Pelanggan') ?>">Pelanggan</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/Order') ?>">Order</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/OrderDetail') ?>">Order Detail</a></li>
                    <li class="list-group-item"><a href="<?= base_url('/Admin/user') ?>">User</a></li>
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