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
		<i class="bi bi-plus-lg"></i>Add Item
		</button>
		<!-- Table with stripped rows -->
		<table class="table datatable">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Price</th>
			<th scope="col">Stock</th> 
			<th scope="col">Photo</th> 
			<th scope="col">Action</th> 
			</tr>
		</thead>
		<tbody>
			<?php foreach($products as $index=>$product): ?>
			<tr>
			<th scope="row"><?php echo $index+1?></th>
			<td><?php echo $product['nama'] ?></td> 
			<td>Rp<?php echo number_format($product['hrg'], 0, ',', '.') ?></td> 
			<td><?php echo $product['jml'] ?></td> 
			<td><img src="<?php echo base_url()."public/img/".$product['foto'] ?>" width="100px"></td> 
			<td>
				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal-<?= $product['id'] ?>">
				<i class="bi bi-pencil-fill"></i>
				</button>
				<a href="<?= base_url('products/delete/'.$product['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this item?')">
				<i class="bi bi-trash-fill"></i>
				</a>
			</td>
			</tr>
			<!-- Edit Modal Begin -->
			<div class="modal fade" id="editModal-<?= $product['id'] ?>" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<form action="<?= base_url('products/edit/'.$product['id']) ?>" method="post" enctype="multipart/form-data">
					<?= csrf_field(); ?>
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="nama" class="form-control" id="nama" value="<?= $product['nama'] ?>" placeholder="Nama Barang" required>
						</div>
						<div class="form-group">
							<label for="name">Price</label>
							<input type="text" name="harga" class="form-control" id="harga" value="<?= $product['hrg'] ?>" placeholder="Harga Barang" required>
						</div>
						<div class="form-group">
							<label for="name">Stock</label>
							<input type="text" name="jumlah" class="form-control" id="jumlah" value="<?= $product['jml'] ?>" placeholder="Jumlah Barang" required>
						</div>
						<div class="form-group">
							<label for="name">Description</label>
							<input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $product['keterangan'] ?>" placeholder="Keterangan Barang" required>
						</div>
						<img src="<?php echo base_url()."public/img/".$product['foto'] ?>" width="100px">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="check" name="check" value="1">
							<label class="form-check-label" for="check">
							Fill the check for change the photo
							</label>
						</div>
						<div class="form-group">
							<label for="name">Foto</label>
							<input type="file" class="form-control" id="foto" name="foto">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save change</button>
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
					<h5 class="modal-title">Add Item</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?= base_url('products') ?>" method="post" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="nama" class="form-control" id="nama" placeholder="Name" required>
					</div>
					<div class="form-group">
						<label for="name">Price</label>
						<input type="text" name="harga" class="form-control" id="harga" placeholder="Price" required>
					</div>
					<div class="form-group">
						<label for="name">Stock</label>
						<input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Stock" required>
					</div>
					<div class="form-group">
						<label for="name">Description</label>
						<input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Description" required>
					</div>
					<div class="form-group">
						<label for="name">Photo</label>
						<input type="file" class="form-control" id="foto" name="foto">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save change</button>
				</div>
				</form>
				</div>
			</div>
		</div>
		<!-- Add Modal End -->
		<?= $this->endSection() ?>