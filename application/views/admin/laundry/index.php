<br />
<main class="mt-5 pt-3">
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
                                    <th>Pelanggan ID</th>
                                    <th>Status</th>
                                    <th>Berat</th>
                                    <th>Jumlah Total</th>
                                    <th>Status Pembayaran</th>
                                    <th>Category ID</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (!empty($laundry)) {
                                    foreach ($laundry as $row) {

                                ?>
                                        <tr>
                                            <td><?php echo $row->laundry_id ?></td>
                                            <td><?php echo $row->pelanggan_id ?></td>
                                            <td><?php echo $row->status ?></td>
                                            <td><?php echo $row->berat ?></td>
                                            <td><?php echo $row->jumlah_total ?></td>
                                            <td><?php echo $row->status_pembayaran ?></td>
                                            <td><?php echo $row->category_id ?></td>
                                            <td><?php echo $row->keterangan ?></td>
                                            <td width="250">
                                                <a href="<?php echo site_url('admin/laundry/generatepdf/').$row->laundry_id; ?>" class="btn btn-primary">generatepdf</a>
                                                <a href="<?php echo site_url('admin/laundry/edit/').$row->laundry_id; ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Are you sure you want to delete this record?');" href="<?php echo site_url('admin/laundry/delete/' . $row->laundry_id); ?>" class="btn btn-danger">Delete</a>
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