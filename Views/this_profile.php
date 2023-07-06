<?= $this->extend('components/layout') ?>
		<?= $this->section('content') ?>
          <!-- hasil validasi success -->
		<?php
		if (session()->getFlashData('success')) {
		?>
		    <div class="alert alert-success alert-dismissible fade show" role="alert">
		        <?= session()->getFlashData('success') ?>
		        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		    </div>
		<?php
		}
		?>
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

		<div class="row align-items-top">
		        <div class="col-lg-12">
                    <p class="fw-bold">Account Information</p>
                    <hr>
                    <form action="<?= base_url('profile') ?>" method="post"><?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                        <input type="text" readonly class="form-control" name="username"  value="<?= session()->get('username');?>">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-3">
                        <input type="password" class="form-control" id="currentpass" name="currentpass" placeholder="Current password">
                      
                        
                        </div>
                        <div class="col-sm-3">
                        <input type="password" class="form-control" id="newpass" name="newpass" placeholder="New password">
                 
                       
                        </div>
                        <div class="col-sm-3">
                        <button type="submit" class="btn btn-dark">Change Password</button>
                        </div>
                    </div>

                    </form>
				</div> 
		        
		        </div>
		
		</div>
		<?= $this->endSection() ?>