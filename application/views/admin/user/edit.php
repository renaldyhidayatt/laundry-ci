<main class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <span><i class="bi bi-table me-2"></i></span> Create User
                </div>
                <div class="card-body">
                    <?= form_error("firstname"); ?>
                    <?= form_error("lastname"); ?>
                    <?= form_error("email"); ?>
                    <?= form_error("password"); ?>
                    <?php foreach($user as $row){ ?>
                    <form action="<?= base_url(); ?>admin/user/update" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row->user_id ?>">
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Firstname</label>
                            <input type="text" name="firstname" value="<?php echo $row->firstname ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Lastname</label>
                            <input type="text" name="lastname" value="<?php echo $row->lastname ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" value="<?php echo $row->email ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" value="<?php echo $row->password ?>" class="form-control" id="nama" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>