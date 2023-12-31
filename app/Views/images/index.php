<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<section class="jumbotron text-center bg-info">
    <div class="container">
        <h1 class="jumbotron-heading">Gallery Amikom</h1>
        <p class="lead text-heading" style="color: wheat;">
            Barang Kamu Ketinggalan di Amikom Atau Kamu Menemukan Barang Milik Orang Lain? Saling Membantu Sesama Manusia, Membantu Sedikit Saja Bisa Mendapatkan Pahala Yang Begitu Besar
        </p>
        <p>
            <a href="<?php echo base_url('image/create'); ?>" class="btn btn-primary btn-sm my-2">
                Masukkan Gambar Disini
            </a>
        </p>
    </div>
    <div style="text-align: right;">
        <form class="btn btn-danger" action="logout"><a style="color: white;" href="logout" onclick="return confirm('Apakah kah kamu yakin mau keluar dari pengguna ini?')">Keluar</a></form>
    </div>
</section>


<section class="gallery py-5 bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <?php if (session()->getFlashdata('success')) { ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php } ?>

                <?php if (session()->getFlashdata('error')) { ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php } ?>

            </div>

            <?php if (!empty($images) && is_array($images)) { ?>
                <?php foreach ($images as $row) { ?>
                    <div class="col-md-4">
                        <h6 style="text-align: center;">Klik Gambar Untuk Melihat Lebih Lanjut</h6>
                        <div class="card mb-4 shadow">
                            <a href="<?php echo base_url('image/show/' . $row['id']); ?>">
                                <img src="<?php echo base_url('uploads/' . $row['path']); ?>" class="card-img-top" style="height: 500px; width:100%; object-fit: cover;">
                            </a>
                            <div class="card-body">
                                <p class="card-text">
                                    <?php echo $row['caption']; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        Tanggal Dan Waktu <div style="color: blue;"><?php echo $row['created_at']; ?></div>
                                    </small>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <a class="btn btn-warning" href="<?php echo base_url('image/delete/' . $row['id']); ?>" onclick="return confirm('Are you sure you want to delete this image?')">Hapus</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            <?php } else { ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-muted text-center">
                                Tidak ada gambar yang ditemukan
                            </h2>
                            <p class="text-center">
                                <a href="<?php echo base_url('image/create'); ?>" class="btn btn-secondary btn-sm my-2">
                                    Siap menambahkan beberapa gambar?
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php } ?>
            <div class="col-md-12">
                <?= $pager->links(); ?>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section('extra-js') ?>
<script>
    $(document).ready(function() {
        $('.pagination li').addClass('page-item');
        $('.pagination li a').addClass('page-link');
    })
</script>
<?= $this->endSection() ?>