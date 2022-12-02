<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Create Laundry
                </div>
                <div class="card-body">
                    <?= form_error("pelanggan_id"); ?>
                    <?= form_error("status"); ?>
                    <?= form_error("berat"); ?>
                    <?= form_error("jumlah_total"); ?>
                    <?= form_error("status_pembayaran"); ?>
                    <?= form_error("category_id"); ?>
                    <?= form_error("keterangan"); ?>
                    <form action="<?= base_url(); ?>admin/laundry/create" method="POST">
                        <div class="mb-3">
                            <label for="pelanggan_id" class="form-label">Pilih Pelanggan id</label>
                            <select class="form-control" name="pelanggan_id">
                                <option value="---">Pilih Pelanggan id</option>
                                <?php foreach ($pelanggan as $row) { ?>
                                    <option value="<?php echo $row->pelanggan_id ?>"><?php echo $row->nama_pelanggan ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="---">Pilih Status</option>
                                <option value="pending">Pending</option>
                                <option value="ongoing">Ongoing</option>
                                <option value="ready">Ready</option>
                                <option value="claimed">Claimed</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="berat" class="form-label">Berat</label>
                            <input type="number" name="berat" class="form-control" id="nama">
                        </div>
                        <div class="mb-3">
                            <label for="status_pembayaran" class="form-label">Status pembayaran</label>
                            <select class="form-control" name="status_pembayaran">
                                <option value="---">Pilih Status pembayaran</option>
                                <option value="cash">Cash</option>
                                <option value="rekber">Rekber</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Pilih Category id</label>
                            <select class="form-control" name="category_id">
                                <option value="---">Pilih Category id</option>
                                <?php foreach ($category as $row) { ?>
                                    <option value="<?php echo $row->category_id ?>"><?php echo $row->nama ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>