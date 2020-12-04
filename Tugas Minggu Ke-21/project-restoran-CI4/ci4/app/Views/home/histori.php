<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>


<div class="row mt-2">
    <div class="col ml-5">
        <h3><?= $judul ?></h3>
    </div>
</div>

<?php $no = 1 + $mulai; ?>

<div class="row mt-2">
    <div class="col ml-5">
        <table class="table table-bordered w-50 mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal Order</th>
                    <th>Total</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($vorder)) { ?>
                    <?php foreach ($vorder as $r) : ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $r['tglorder'] ?></td>
                            <td><?php echo $r['total'] ?></td>
                            <td><a href="<?= base_url('/front/homepage/detail/' . $r['idorder'] . '')  ?>">Detail</a></td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </tbody>

        </table>

        <?= $pager->makeLinks(1, $banyak, $total, 'bootstrap') ?>

    </div>
</div>




<?= $this->endSection() ?>