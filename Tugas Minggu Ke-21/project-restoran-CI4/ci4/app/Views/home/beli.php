<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>


<h2 class="text-center"><?= $judul ?></h2>

<div class="row ml-4">
    <div class="col">
        <table class="table table-bordered w-70 mt-2">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Hapus</th>
                </tr>
            </thead>

            <?php foreach ($menu as $p => $m) { ?>
                <?php foreach ($m as $value => $r) { ?>
                    <tr>
                        <td><?= $r['menu'] ?></td>
                        <td class="text-center"><?= $r['harga'] ?></td>
                        <td><a href="<?= base_url('/front/KeranjangBelanja/tambah/' . $r['idmenu'])  ?>">[+]</a> &nbsp; &nbsp;<?= $jumlah[$p] ?>&nbsp; &nbsp; <a href="<?= base_url('/front/KeranjangBelanja/kurang/' . $r['idmenu'])  ?>">[-]</a></td>
                        <td class="text-center"><?= $jumlah[$p] * $r['harga'] ?></td>
                        <td class="text-center"><a href="<?= base_url('/front/keranjangbelanja/delete/' . $r['idmenu'] . '') ?>">Hapus</a></td>
                        <?php $total = $total + ($jumlah[$p] * $r['harga']); ?>
                    </tr>
                <?php } ?>
            <?php } ?>

            <tr>
                <td colspan=3>
                    <h3>GRAND TOTAL :</h3>
                </td>
                <td colspan=2 class="text-center">
                    <h3><?= $total ?></h3>
                </td>
            </tr>

        </table>


        <?php if ($total > 0) { ?>
            <a href="<?= base_url('/front/KeranjangBelanja/checkout/' . $total) ?>" role="button" class="btn btn-warning font-weight-bold">CHECKOUT</a>
        <?php } ?>



    </div>
</div>



<?= $this->endSection() ?>