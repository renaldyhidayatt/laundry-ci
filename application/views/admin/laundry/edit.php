<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Update Laundry
                    </div>
                    <div class="card-body">
                        <?= form_error("pelanggan_id"); ?>
                        <?= form_error("status"); ?>
                        <?= form_error("berat"); ?>
                        <?= form_error("jumlah_total"); ?>
                        <?= form_error("status_pembayaran"); ?>
                        <?= form_error("category_id"); ?>
                        <?= form_error("keterangan"); ?>
                        <?php foreach ($laundry as $laundry_row) { ?>
                            <form action="<?= base_url(); ?>admin/laundry/edit"  method="POST">
                            <input type="hidden" name="id" value="<?php echo $laundry_row->laundry_id ?>">
                                <div class="mb-3">
                                    <label for="pelanggan_id" class="form-label">Pilih Pelanggan id</label>
                                    <select class="form-control" name="pelanggan_id">
                                        <option value="---">Pilih Pelanggan id</option>
                                        <?php foreach ($pelanggan as $pelanggan_row) { ?>
                                            <option value="<?php echo $pelanggan_row->pelanggan_id ?>"><?php echo $pelanggan_row->nama_pelanggan ?></option>
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
                                    <input type="number" name="berat" class="form-control" id="berat" value="<?php echo $laundry_row->berat ?>">
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
                                        <?php foreach ($category as $cat_row) { ?>
                                            <option value="<?php echo $cat_row->category_id ?>"><?php echo $cat_row->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"><?php echo $laundry_row->keterangan ?></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Info Laundry
                    </div>
                    <div class="card-body">
                        <?php foreach($laundry as $laundry_info){ ?>
                        <form action="#">
                            <div class="mb-3">
                                <label for="pelanggan_id" class="form-label">Pelanggan id</label>
                                <input type="disabled" name="pelanggan_id" class="form-control" id="pelanggan_id" value="<?php echo $laundry_info->pelanggan_id ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <input type="disabled" name="status" class="form-control" id="status" value="<?php echo $laundry_info->status ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="berat" class="form-label">Berat</label>
                                <input type="disabled" name="pberatlanggan_id" class="form-control" id="berat" value="<?php echo $laundry_info->berat ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_total" class="form-label">Jumlah Total</label>
                                <input type="disabled" name="jumlah_total" class="form-control" id="jumlah_total" value="<?php echo $laundry_info->jumlah_total ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                <input type="disabled" name="status_pembayaran" class="form-control" id="status_pembayaran" value="<?php echo $laundry_info->status_pembayaran ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category id</label>
                                <input type="disabled" name="category_id" class="form-control" id="category_id" value="<?php echo $laundry_info->category_id ?>" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">keterangan</label>
                                <input type="disabled" name="keterangan" class="form-control" id="keterangan" value="<?php echo $laundry_info->keterangan ?>" disabled readonly>
                            </div>
                        </form>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>