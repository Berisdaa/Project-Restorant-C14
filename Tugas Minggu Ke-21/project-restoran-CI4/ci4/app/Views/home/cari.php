<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="row mt-2">
    <div class="col">

    <?php if (!empty($kategori)){ ?>
            <?php foreach($kategori as $r): ?>
                <?php if($id == $r['idkategori']) { ?>
                    <h2 class="text-center"><?= $judul . '' . $r['kategori']?></h2>
                <?php } ?>
            <?php endforeach ?>
        <?php } ?>

        <?php if (!empty($menu)){ ?>
            <?php foreach($menu as $r): ?>
                <div class="card" style="width: 13rem; float:left; margin:10px;">
                    <img style="height:160px" src="<?= base_url('upload/'. $r['gambar'])?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $r['menu'] ?></h5>
                        <p class="card-text">Rp.<?= number_format($r['harga']) ?></p>
                        <a class="btn btn-success" href="<?=base_url('/Front/KeranjangBelanja/index/' . $r['idmenu'].'')?>" role="button">Beli</a>
                    </div>
                </div>
            <?php endforeach ?>
        <?php } ?>
        <div style="clear:both;" class="ml-2">
            <?= $pager->links('page', 'bootstrap')?>
        </div>
    </div>
</div>

        

<?= $this->endSection() ?>