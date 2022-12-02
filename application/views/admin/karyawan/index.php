<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Data Table
                </div>
                <div class="card-body">
                    <?php
                    if ($this->session->flashdata('error_laundry') != '') {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('error_laundry');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>

                    <?php
                    if ($this->session->flashdata('success_laundry') != '') {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';

                        echo $this->session->flashdata('success_laundry');
                        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        echo '</div>';
                    }
                    ?>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>User ID</th>
                                    <th>Tanggal bergabung</th>
                                    <th>Tanggal berhenti</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($karyawan)) {
                                    foreach ($karyawan as $row) {

                                ?>
                                        <tr>
                                            <td><?php echo $row->karyawan_id ?></td>
                                            <td><?php echo $row->nama_karyawan ?></td>
                                            <td><?php echo $row->jeniskelamin ?></td>
                                            <td><?php echo $row->alamat ?></td>
                                            <td><?php echo $row->no_hp ?></td>
                                            <td><?php echo $row->user_id ?></td>
                                            <td><?php echo $row->tgl_bergabung ?></td>
                                            <td><?php echo $row->tgl_berhenti ?></td>
                                            <td width="250">
                                                <a href="<?php echo site_url('admin/karyawan/edit/') . $row->karyawan_id; ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/karyawan/delete/' . $row->karyawan_id); ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>