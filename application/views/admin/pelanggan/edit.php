<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Create Pelanggan
                </div>
                <div class="card-body">
                    <?= form_error("nama_pelanggan"); ?>
                    <?= form_error("jeniskelamin"); ?>
                    <?= form_error("alamat"); ?>
                    <?= form_error("no_hp"); ?>
                    <?php foreach ($pelanggan as $row) { ?>
                        <form action="<?= base_url(); ?>admin/pelanggan/edit" method="POST">
                            <input type="hidden" name="pelanggan_id" value="<?php echo $row->pelanggan_id ?>" />
                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                <input type="text" id="nama_pelanggan" value="<?php echo $row->nama_pelanggan; ?>" name="nama_pelanggan" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jeniskelamin">
                                    <option value="---">Pilih Jenis Kelamin</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>

                                <input type="text" id="alamat"  name="alamat" value="<?php echo $row->alamat ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="number" id="no_hp" name="no_hp" value="<?php echo $row->no_hp; ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>