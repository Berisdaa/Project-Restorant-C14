<?= $this->extend('template/admin') ?>

<?= $this->section('content') ?>

    <?php 
        if (isset($_GET['page_page'])) {
            $page = $_GET['page_page'];
            $jumlah = 4;
            $no = ($jumlah * $page) - $jumlah + 1;
        }else {
            $no = 1;
        }
    
    ?>

<div class="row">
    <div class="col-12">
    <form action="<?= base_url('/admin/orderdetail/cari') ?>" method="post">
        <div class="form-group col-6 float-left">
            <label for="Awal">Awal</label> 
            <input type="date" name="awal" required class="form-control">
        </div>
        <div class="form-group col-6 float-left">
            <label for="Sampai">Sampai</label> 
            <input type="date" name="sampai" required class="form-control">
        </div>
        <div class="form-group ml-3 ">
            <input class="btn btn-dark" type="submit" name="cari" value="CARI">
        </div>
    </form>
    </div>
</div>


<div class="row">

    <div class="col">
        <h2> <?= $judul; ?> </h2>
    </div>

</div>

<div class="row mt-2">
    <div class="col">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
            </thead>
            <?php $no = $no ?>
            <?php foreach($orderdetail as $key => $value): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['tglorder'] ?></td>
                <td><?= $value['menu'] ?></td>
                <td><?= $value['harga'] ?></td>
                <td><?= $value['jumlah'] ?></td>
                <td><?= $value['jumlah']*$value['harga'] ?></td>
            </tr>
            <?php endforeach; ?>

        </table>
        

        <?= $pager->links('page','bootstrap') ?>

    </div>
</div>

<?= $this->endSection() ?>