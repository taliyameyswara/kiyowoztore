<?= $this->extend('components/layout_clear') ?>
<?= $this->section('content') ?>

		<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
		    <div class="container">
		        <div class="row justify-content-center">
		            <div class="col-lg-4 col-md-8 d-flex flex-column align-items-center justify-content-center">

		                <div class="d-flex justify-content-center py-3">
							<img src="<?php echo base_url() ?>public/NiceAdmin/assets/img/logo1.png" width="40px">
		                    <a href="" class="logo d-flex align-items-center w-auto ms-1">
		                        <span class="d-none d-lg-block mt-2">KiyowoStore</span>
		                    </a>
							<img src="<?php echo base_url() ?>public/NiceAdmin/assets/img/logo1.png" width="40px">
		                </div><!-- End Logo -->

		                <div class="card mb-3">

		                    <div class="card-body">

		                        <div class="pt-4 pb-2">
		                            <h5 class="card-title text-center pb-0 fs-4">Register Here</h5>
		                            <p class="text-center small">Fill in this form to register</p>
		                        </div>

                                <!-- hasil validasi failed -->
		                        <?php
		                        if (session()->getFlashData('failed')) {
		                        ?>
		                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashData('failed') ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
		                        <?php
		                        }
		                        ?>

                                <!-- hasil validasi success -->
                                   <?php
                                        if(session()->getFlashData('success')){
                                        ?> 
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            <?= session()->getFlashData('success') ?>
                                            Login <a href="<?php echo base_url()?>login">here</a>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <?php
                                        }
                                        ?>     

		                       <form method="post" class="row g-4 needs-validation" action="<?= base_url(); ?>register/create"><?= csrf_field(); ?>
		                        <div class="col-12">
		                            <label for="username" class="form-label">Username</label>
		                            <div class="input-group has-validation">
                                        <input type="text" class="form-control" id="username" name="username">
		                                <div class="invalid-feedback">Please enter your username!</div>
		                            </div>
		                        </div>
		                        <div class="col-12">
		                            <label for="password" class="form-label">Password</label>
		                            <div class="input-group has-validation">
                                        <input type="password" class="form-control" id="password" name="password">
		                                <div class="invalid-feedback">Please enter your password!</div>
		                            </div>
		                        </div>
								<input type="hidden" class="form-control" id="role" name="role" value="guest">
		                        <div class="col-12">
		                            <button type="submit" class="btn btn-primary w-100 mt-1" data-target="#exampleModal" data-toggle="modal">Register</button>
		                        </div>


                                </form>

                            <div class="col-12">
								<p class="small mb-0 mt-3 text-center">Already have an account? <a href="<?php echo base_url()?>login">Log in</a></p>
								</div>
		        
		                    </div>
		                </div>

		                <div class="credits">
		                    <!-- All the links in the footer should remain intact. -->
		                    <!-- You can delete the links only if you purchased the pro version. -->
		                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
		                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
		                    Designed by <a href="">Kiyowoz</a>
		                </div>

		            </div>
		        </div>
		    </div>

		</section>
		<?= $this->endSection() ?>