<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Update Categories 
                </div>
                <div class="card-body">
                    <?= form_error("nama"); ?>
                    <?= form_error("harga"); ?>
                    <?php foreach($categories as $row){ ?>
                    <form action="<?= base_url(); ?>admin/category/edit" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row->category_id ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" value="<?php echo $row->nama ?>" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" id="harga" name="harga" value="<?php echo $row->harga ?>" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>