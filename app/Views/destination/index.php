<!-- XII RPL B_09_Faiq Varian -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-2">
    <div class="row">
        <div class="col">
            <a href="/destinations/create" class="btn btn-primary my-3">Add Destination</a>
            <h1>Destination List</h1>
            <?php if (session()->getFlashdata('message')) :  ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('message'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="row justify-content-start">
                <?php foreach ($destination as $dest) : ?>
                    <div class="col-lg-3 my-3 d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                            <img src="/img/uploaded/<?= $dest['img']; ?>" class="card-img-top img-sz" alt="<?= $dest['city']; ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $dest['city']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Rp<?= $dest['price']; ?>,00</h6>
                                <a href="/destinations/<?= $dest['slug']; ?>" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>