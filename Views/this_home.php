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
		<div class="row align-items-top">
		    <?php foreach ($products as $index => $product) : ?>
		        <div class="col-lg-12">
		            <?= form_open('cart') ?>
		            <?php
		            echo form_hidden('id', $product['id']);
		            echo form_hidden('nama', $product['nama']);
		            echo form_hidden('hrg', $product['hrg']);
		            echo form_hidden('foto', $product['foto']);
		            ?>
		            <div class="card">
					<div class="card-body">
                        <div class="card-mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?php echo base_url()."public/img/".$product['foto'] ?>" alt="..." class="img-fluid rounded-start">
                                </div>

                                <div class="col-md-8">
                                   <div class="card-body">
                                    <h5 class="card-title fs-3 mt-3 pb-0"><?php echo $product['nama'] ?></h5>
                                        <p class="card-text text-secondary"><?php echo $product['keterangan']?>
                                        <p class="card-text"><b>Rp<?php echo number_format($product['hrg'], 0, ',', '.')?></b></p>
                                        <button type="submit" class="btn btn-dark ">
                                        <i class="bi bi-cart-fill"></i>  
                                         Add to Cart</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div> 
		            <?= form_close() ?>
		        </div>
		    <?php endforeach ?>
		</div>
		<?= $this->endSection() ?>