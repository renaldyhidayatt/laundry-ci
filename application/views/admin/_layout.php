<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />
    <title>Kelompok 1</title>
</head>

<body>
    <?php $this->load->view('admin/components/navbar'); ?>
    <?php $this->load->view('admin/components/sidebar'); ?>

    

    <?php $this->load->view($subview); ?>
    
    <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url(); ?>/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/script.js"></script>
</body>

</html>