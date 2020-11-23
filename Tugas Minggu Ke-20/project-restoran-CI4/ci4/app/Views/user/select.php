<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

    <?php 
        if (isset($_GET['page_page'])) {
            $page = $_GET['page_page'];
            $jumlah = 3;
            $no = ($jumlah * $page) - $jumlah + 1;
        }else {
            $no = 1;
        }
    
    ?>


<div class="row">

    <div class="col-4">
        <a class="btn btn-primary" href="<?= base_url('/Admin/User/create') ?>" role="button">TAMBAH DATA</a>
    </div>

    <div class="col">
        <h2> <?= $judul; ?> </h2>
    </div>

</div>

<div class="row mt-2">
    <div class="col">
        <table class="table thead-dark">
            <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Email</th>
                <th>Level</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php $no = $no ?>
            <?php foreach($user as $key => $value): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['user'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['level'] ?></td>
            <?php 
                if ($value['aktif'] == 1) {
                    $aktif = "AKTIF";
                } else {
                    $aktif = "BANNED";
                }
            ?>
                <td><a class="btn btn-success" href="<?= base_url() ?>/Admin/User/update/<?= $value['iduser'] ?>/<?= $value['aktif'] ?>"><?= $aktif ?></a></td>
                <td><a class="btn btn-danger" href="<?= base_url() ?>/Admin/User/delete/<?= $value['iduser'] ?>"><img src="<?=base_url('/icon/trash.svg')?>"></a>
                <a class="btn btn-warning" href="<?= base_url() ?>/Admin/User/find/<?= $value['iduser'] ?>"><img src="<?=base_url('/icon/pencil.svg')?>"></a></td>
            </tr>
            <?php endforeach; ?>

        </table>
        

        <?= $pager->links('page','bootstrap') ?>

    </div>
</div>

<?= $this->endSection() ?>