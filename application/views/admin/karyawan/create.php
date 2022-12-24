<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Create Karyawan
                </div>
                <div class="card-body">
                    <?= form_error("user_id"); ?>
                    <?= form_error("nama_karyawan"); ?>
                    <?= form_error("jeniskelamin"); ?>
                    <?= form_error("alamat"); ?>
                    <?= form_error("no_hp"); ?>
                    <form action="<?= base_url(); ?>admin/karyawan/create" method="POST">
                        <div class="mb-3">
                            <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                            <input type="text" id="nama_karyawan" name="nama_karyawan" class="form-control" id="nama_karyawan">
                        </div>
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jeniskelamin">
                                <option selected>Pilih Jenis Kelamin</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control" id="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No Hp</label>
                            <input type="number" id="no_hp" name="no_hp" class="form-control" id="no_hp" >
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pilih Userid</label>
                            <select class="form-control" name="user_id">
                                <option selected>Pilih User id</option>
                                <?php foreach ($user as $row) { ?>
                                    <option value="<?php echo $row->user_id ?>"><?php echo $row->firstname ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>