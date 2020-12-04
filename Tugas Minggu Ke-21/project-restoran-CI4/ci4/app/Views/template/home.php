<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/bootstrap/css/bootstrap.min.css') ?>">
    <title>GreenPeel Resto | Aplikasi Restoran</title>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <h2 class="ml-5">GreenPeel Restoran</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto text-light">
                            <?php if (!empty(session()->get('email')) && !empty(session()->get('pelanggan'))) { ?>
                                <li class="nav-item mt-2 ml-4"> Pelanggan : <?= session()->get('email') ?> </li>

                                <li class="nav-item ml-2">
                                    <a href="<?= base_url('/Front/KeranjangBelanja/index/') ?>"><img style="width: 40px;" src="<?= base_url('/icon/shopping-basket.svg') ?>"></a>
                                </li>

                                <li class="nav-item  ml-3"><a class="btn btn-light" href="<?= base_url('/front/homepage/histori/') ?>"> Histori </a></li>

                                <li class="nav-item ml-3">
                                    <a class="btn btn-danger" href="<?= base_url('/login/logout/') ?>" class="btn btn-danger"> Logout </a>
                                </li>

                            <?php } else { ?>
                                <li class="nav-item ml-3">
                                    <a class="btn btn-primary" href="<?= base_url('/front/homepage/create/') ?>" class="btn btn-danger"> Daftar </a>
                                </li>

                                <li class="nav-item ml-3 mr-3">
                                    <a class="btn btn-success" href="<?= base_url('/login') ?>" class="btn btn-danger"> Login </a>
                                </li>
                            <?php } ?>

                        </ul>

                    </div>
                </nav>
            </div>
        </div>



        <div class="row mt-5 ml-2">
            <div class="col-md-2">
                <h3>Kategori</h3>
                <hr>
                <?php if (!empty($kategori)) { ?>
                    <ul class="nav flex-column">
                        <?php foreach ($kategori as $r) : ?>
                            <li class="nav-item"><a class="nav-link" href="<?= base_url('/Front/HomePage/read/' . $r['idkategori'] . '') ?>">
                                    <?= $r['kategori'] ?></a></li>
                        <?php endforeach ?>
                    </ul>
                <?php } ?>
            </div>
            <div class="col-8 px-2">
                <?= $this->renderSection('content') ?></div>
        </div>


    </div>


    <div class="row mt-5">
        <div class="col">
            <p class="text-center">2020 - GreenPeel@gmail.com</p>
        </div>
    </div>

</body>

</html>