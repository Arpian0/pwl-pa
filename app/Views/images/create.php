<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Masukkan Gambar Baru
                    <a href="<?php echo base_url('image'); ?>" class="btn btn-success btn-sm float-right">
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php foreach (session()->getFlashdata('error') as $field => $error) : ?>
                                <p><?= $error ?></p>
                            <?php endforeach ?>
                        </div>

                    <?php } ?>

                    <?= form_open_multipart('image'); ?>
                    <div class="form-group">
                        <label for="image">Masukkan Gambar Barang</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM / NIK</label>
                        <input type="text" name="nim" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">No.Hp</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="location">Lokasi Barang Yang di Temukan</label>
                        <input type="text" name="location" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="caption">Keterangan</label>
                        <textarea name="caption" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Submit</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>