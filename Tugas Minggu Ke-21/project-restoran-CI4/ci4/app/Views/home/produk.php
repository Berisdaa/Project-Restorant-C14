<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="row mt-2">
    <div class="col">
    <h2 class="text-center"><?=$judul?></h2>
        <?php if (!empty($menu)){ ?>
            <?php foreach($menu as $key): ?>
                <div class="card" style="width: 13rem; float:left; margin:10px;">
                    <img style="height:160px" src="<?= base_url('upload/'. $key['gambar'])?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $key['menu'] ?></h5>
                        <p class="card-text">Rp.<?= number_format($key['harga']) ?></p>
                        <a class="btn btn-success" href="<?=base_url('/Front/KeranjangBelanja/index/' . $key['idmenu'].'')?>" role="button">Beli</a>
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