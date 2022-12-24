<main class="mt-5 pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Edit Pelanggan
                </div>
                <div class="card-body">
                    <?= form_error("user_id"); ?>
                    <?= form_error("nama_karyawan"); ?>
                    <?= form_error("jeniskelamin"); ?>
                    <?= form_error("alamat"); ?>
                    <?= form_error("no_hp"); ?>
                    <?php foreach ($karyawan as $row) { ?>
                        <form action="<?= base_url(); ?>admin/karyawan/edit" method="POST">
                            <input type="hidden" value="<?php echo $row->karyawan_id ?>" name="id" />
                            <div class="mb-3">
                                <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                <input type="text" id="nama_karyawan" value="<?php echo $row->nama_karyawan; ?>" name="nama_karyawan" class="form-control" id="nama" aria-describedby="emailHelp">
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

                                <input type="text" id="alamat" name="alamat" value="<?php echo $row->alamat ?>" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No Hp</label>
                                <input type="number" id="no_hp" name="no_hp" value="<?php echo $row->no_hp; ?>" class="form-control" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">Pilih Userid</label>
                                <select class="form-control" name="user_id">
                                    <option value="---">Pilih User id</option>
                                    
                                    <?php foreach ($user as $row) { ?>
                                        <option value="<?php echo $row->user_id ?>"><?php echo $row->firstname ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_berhenti" class="form-label">Tanggal berhenti</label>

                                <input type="date" id="tgl_berhenti" name="tgl_berhenti"  class="form-control">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>