<?= $this->extend('Template/home') ?>

<?= $this->section('content') ?>

<div class="col">
    <?php
    if (!empty(session()->getFlashdata('info'))) {
        echo '<div class="alert alert-danger" role="alert">';
        $error = session()->getFlashdata('info');
        foreach ($error as $key => $value) {
            echo $key . '->' . $value;
            echo '<br>';
        }
        echo '</div>';
    }
    ?>
</div>

<div class="row mt-2">
    <div class="col ml-5">
        <h3><?= $judul ?></h3>
    </div>
</div>

<div class="row mt-2">
    <div class="col ml-5">
        <div class="form-group w-75 mx-auto">

            <form action="<?= base_url('/front/homepage/daftar') ?>" method="post">
                <div class="form-group ">
                    <label for="">Pelanggan</label>
                    <input type="text" name="pelanggan" id="" required placeholder="Isi Pelanggan" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" id="" required placeholder="Isi Alamat" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="">Telp</label>
                    <input type="text" name="telp" id="" required placeholder="Isi Telp" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" required placeholder="Isi Email" class="form-control">
                </div>

                <div class="form-group ">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" required placeholder="Isi Password" class="form-control">
                </div>

                <div>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
            </form>

        </div>

    </div>
</div>




<?= $this->endSection() ?>