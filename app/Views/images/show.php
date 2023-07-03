<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title"><?= $image['caption'] ?></h6>
                    <img src="<?= base_url('uploads/' . $image['path']) ?>" class="img-fluid mb-3" alt="<?= $image['caption'] ?>">
                    <p class="card-text">Uploaded on: <?= $image['created_at'] ?></p>
                    <a href="<?= base_url('image') ?>" class="btn btn-secondary">Back to Gallery</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('extra-css') ?>
<style>
    .caption {
        white-space: pre-line;
        overflow-wrap: break-word;
    }
</style>
<?= $this->endSection() ?>