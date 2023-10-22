<?= $this->extend('components/layout') ?>
		<?= $this->section('content') ?>
		<?php
		if(session()->getFlashData('success')){
		?> 
		<div class="alert alert-info alert-dismissible fade show" role="alert">
			<?= session()->getFlashData('success') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php
		}
		?>
		<?php
		if(session()->getFlashData('failed')){
		?> 
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<?= session()->getFlashData('failed') ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php
		}
		?>
		<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">
		<i class="bi bi-plus-lg"></i>Add User
		</button>
		<!-- Table with stripped rows -->
		<table class="table datatable">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Username</th>
			<th scope="col">Password</th>
			<th scope="col">Role</th> 
			<th scope="col">Action</th> 
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $index=>$user): ?>
               
			<tr>
			<th scope="row"><?php echo $index+1?></th>
			<td><?php echo $user['username'] ?></td> 
			<td><?php echo $user['password'] ?></td> 
			<td><?php echo $user['role'] ?></td> 
			<td>
				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $user['id'] ?>">
				<i class="bi bi-pencil"></i>
				</button>
				<a href="<?= base_url('user/delete/'.$user['id']) ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data ini ?')">
				<i class="bi bi-trash-fill"></i>
				</a>
			</td>
			</tr>
			<!-- Edit Modal Begin -->
			<div class="modal fade" id="editModal-<?= $user['id'] ?>" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="<?= base_url('user/edit/'.$user['id']) ?>" method="post" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<div class="modal-body">
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" name="username" class="form-control" id="username" value="<?= $user['username'] ?>" placeholder="username" required>
						</div>
						<div class="form-group mt-2">
							<label for="password" class="">Password</label>
							<input type="text" name="password" class="form-control" id="password" value="<?= $user['password'] ?>" placeholder="password" required>
						</div>
						<div class="form-group mt-2">
						<label for="role" class="me-2">Role</label>
						<div class="form-check-inline">
						<input class="form-check-input" type="radio" name="role" id="role" value="admin" <?php echo ($user['role']=='admin')?'checked':''?>>
						<label class="form-check-label" for="admin">
							Admin
						</label>
						</div>
						<div class="form-check-inline">
						<input class="form-check-input" type="radio" name="role" id="role" value="guest" <?php echo ($user['role']=='guest')?'checked':''?>>
						<label class="form-check-label" for="guest">
							Guest
						</label>
						</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
					</form>
					</div>
				</div>
			</div>
			<!-- Edit Modal End -->
			<?php endforeach ?>   
		</tbody>
		</table>
		<!-- End Table with stripped rows -->
		<!-- Add Modal Begin -->
		<div class="modal fade" id="addModal" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?= base_url('user/create') ?>" method="post">
					<?= csrf_field(); ?>
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Username</label>
							<input type="text" name="username" class="form-control" id="username" placeholder="username" required>
						</div>
						<div class="form-group  mt-2">
							<label for="name">Password</label>
							<input type="text" name="password" class="form-control" id="password" placeholder="password" required>
						</div>
						<div class="form-group mt-2">
							<label for="name">Role</label>
							<div class="form-check-inline">
							<input class="form-check-input" type="radio" name="role" id="role" value="admin">
							<label class="form-check-label" for="admin">
								Admin
							</label>
							</div>
							<div class="form-check-inline">
							<input class="form-check-input" type="radio" name="role" id="role" value="guest">
							<label class="form-check-label" for="guest">
								Guest
							</label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
				</div>
			</div>
		</div>
		<!-- Add Modal End -->
		<?= $this->endSection() ?>