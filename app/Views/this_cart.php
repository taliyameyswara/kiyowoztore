<?= $this->extend('components/layout') ?>
		<?= $this->section('content') ?>
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
		<?php echo form_open('cart/edit') ?>
		<?php
		        $i = 1;
		        if (!empty($items)) {
					?>
		<!-- Table with stripped rows -->
		<div class="text-end">
		<button type="submit" class="btn btn-success">
		<i class="bi bi-arrow-clockwise"></i>
			Refresh Cart
		</button>
		<a class="btn btn-danger" href="<?php echo base_url() ?>cart/clear">
		<i class="bi bi-cart-x-fill"></i>
		Clear Cart</a>
		</div>

		<table class="table datatable">
		    <thead>
		        <tr>
		            <th scope="col">Name</th>
		            <th scope="col">Photo</th>
		            <th scope="col">Price</th>
		            <th scope="col">Qty</th>
		            <th scope="col">Subtotal</th>
		            <th scope="col">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		       <?php
		            foreach ($items as $index => $item) :
		        ?>
		                <tr>
		                    <td><?php echo $item['name'] ?></td>
		                    <td><img src="<?php echo base_url() . "public/img/" . $item['options']['foto'] ?>" width="100px"></td>
		                    <td><?php echo number_to_currency($item['price'], 'IDR') ?></td>
		                    <td><input type="number" min="1" name="qty<?php echo $i++ ?>" class="form-control" value="<?php echo $item['qty'] ?>"></td>
		                    <td><?php echo number_to_currency($item['subtotal'], 'IDR') ?></td>
		                    <td>
		                        <a href="<?php echo base_url('cart/delete/' . $item['rowid'] . '') ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
		                    </td>
		                </tr>
						<?php
					endforeach;
					?>
		    </tbody>
		</table>
		<!-- End Table with stripped rows -->
		<div class="text-end fw-bold">
		<a class="btn btn-dark fw-bold text-white" href="<?php echo base_url() ?>checkout">
		<?php echo "Total: " . number_to_currency($total, 'IDR') . "<br>Continue to Checkout" ?>
		</a>
		</div>
		<?php
		            
		        }else{?>
					<div class="text-center text-secondary fw-bold">Cart Empty</div>
					<?php
				}
		        ?>


		<div class="text-end">
		</div>
		<?php echo form_close() ?>
		<?= $this->endSection() ?>
		