<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="row mt-2">
    <div class="col ml-5">
        <h3><?= $judul ?></h3>
    </div>
</div>

<?php $no = 1 + $mulai; ?>

<div class="row mt-3">
    <div class="col">
        <table class="table table-bordered w-60 mt-3">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal Order</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($detail)) { ?>
                    <?php foreach ($detail as $r => $value) : ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td><?php echo $value['tglorder'] ?></td>
                            <td><?php echo $value['menu'] ?></td>
                            <td><?php echo $value['harga'] ?></td>
                            <td><?php echo $value['jumlah'] ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php } ?>
            </tbody>

        </table>

        <?= $pager->makeLinks(1, $banyak, $total, 'bootstrap') ?>

    </div>
</div>


<?= $this->endSection() ?>