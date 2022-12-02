<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="login-form bg-light mt-4 p-4">
            <?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>
 
				<?php 
				if($this->session->flashdata('success_register') !='')
				{
					echo '<div class="alert alert-info" role="alert">';
					echo $this->session->flashdata('success_register');
					echo '</div>';
				}
				?>
                <?= form_error("email"); ?>
                <?= form_error("password"); ?>
                <form action="<?= base_url(); ?>auth/login" method="POST" class="row g-3">
                    <h4>Welcome Back, Login</h4>
                    <div class="col-12">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Username">
                    </div>
                    <div class="col-12">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe"> Remember me</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="submit" class="btn btn-dark float-end">Login</button>
                    </div>
                    <div class="text-center pt-2">
                        <div class="text-center pt-2">
                            <a href="<?php echo site_url('auth/register'); ?>" class="btn text-primary">Signup Now !</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>