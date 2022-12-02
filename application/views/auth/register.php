<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="bg-light mt-4 p-4">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">
                                Welcome To Register
                            </h1>
                        </div>
                        <div class="card-body">
                        <?= form_error("firstname"); ?>
                        <?= form_error("lastname"); ?>
                        <?= form_error("email"); ?>
                        <?= form_error("password"); ?>
                            <form action="<?= base_url(); ?>auth/register" method="POST" class="row g-3">
                                <div class="col-12">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                                </div>
                                <div class="col-12">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                                </div>
                                <div class="col-12">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Username">
                                </div>
                                <div class="col-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-dark float-end">Register</button>
                                </div>
                                <div class="text-center pt-2">
                                    <div class="text-center pt-2">
                                        <a href="<?php echo site_url('auth/login'); ?>" class="btn text-primary">Login Now</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>