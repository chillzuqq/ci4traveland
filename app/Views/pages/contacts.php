<!-- XII RPL B_09_Faiq Varian -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-2">
    <div class="row">
        <div class="col">
            <h1>Contact Us</h1>
            <?php foreach ($contacts as $dest) : ?>
                <ul>
                    <li><?= $dest['city']; ?></li>
                    <li><?= $dest['phone']; ?></li>
                    <li><?= $dest['address']; ?></li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>