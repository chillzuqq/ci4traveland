<!-- XII RPL B_09_Faiq Varian -->
<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-2">
    <div class="row">
        <div class="col-8">
            <h1>Edit Destination Data</h1>
            <form action="/destinations/update/<?= $destinations['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $destinations['slug']; ?>">
                <input type="hidden" name="oldImg" value="<?= $destinations['img']; ?>">
                <div class="row mb-3">
                    <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('city')) ? 'is-invalid' : ''; ?>" id="inputCity" name="city" value="<?= (old('city')) ? old('city') : $destinations['city'] ?>" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('city'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPrice" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= ($validation->hasError('price')) ? 'is-invalid' : ''; ?>" id="inputPrice" name="price" value="<?= (old('price')) ? old('price') : $destinations['price'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('price'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputDetails" class="col-sm-2 col-form-label">Details</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('details')) ? 'is-invalid' : ''; ?>" id="inputDetails" name="details" value="<?= (old('details')) ? old('details') : $destinations['details'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('details'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-2">
                        <img src="/img/uploaded/<?= $destinations['img']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <input type="file" class="form-control <?= ($validation->hasError('img')) ? 'is-invalid' : ''; ?>" id="img" name="img" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <?= $validation->getError('img'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>