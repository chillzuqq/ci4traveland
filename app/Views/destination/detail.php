<!-- XII RPL B_09_Faiq Varian -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-2">
    <div class="row">
        <div class="col">
            <h1><?= $destination['city']; ?></h1>
            <div class="clearfix">
                <img class="img-det-sz col-md-6 float-md-start mb-3 me-md-3 img-thumbnail" src="/img/uploaded/<?= $destination['img']; ?>" alt="<?= $destination['city']; ?>">
                <h2>Rp<?= $destination['price']; ?>,00</h2>
                <p><?= $destination['details']; ?></p>

                <a href="/destinations/edit/<?= $destination['slug']; ?>" class="btn btn-warning">Edit</a>

                <form action="/destinations/<?= $destination['id']; ?>" method="POST" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this data?');">Delete</button>
                </form>
                <br><br>

                <a href="/destinations">Back to list</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>