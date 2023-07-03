<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Detail Gambar
                    <a href="<?= base_url('image') ?>" class="btn btn-success btn-sm float-right">
                        Kembali
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="<?= base_url('uploads/' . $image['path']) ?>" class="img-fluid" alt="Image">
                        </div>
                        <div class="col-md-6">
                            <h4>Nama Penemu</h4>
                            <p><?= $image['name'] ?></p>
                            <h4>NIM Penemu</h4>
                            <p><?= $image['nim'] ?></p>
                            <h4>No.Hp Penemu Barang</h4>
                            <p><?= $image['phone'] ?></p>
                            <h4>Lokasi Barang di Temukan</h4>
                            <p><?= $image['location'] ?></p>
                            <h4>Keterangan</h4>
                            <p><?= $image['caption'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>