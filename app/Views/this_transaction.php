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
		    <?php foreach ($transactions as $index => $transaction) : ?>
		        <div class="col-lg-12">
		            <div class="card">
					<div class="card-body">
                        <div class="card-mb-3">
						<div class="row m-2">
							<div class="col-md-10">
								<h5 class="card-title fs-5 pb-0">Transaction ID: <?php echo $transaction['id'] ?> </h5>
								<p class="text-danger fw-bold p-0">
								<?php 
								$status = $transaction['status'];
									if($status == 1){
										?>
                                    <p class="text-success fw-bold p-0">
										Status: Completed
									</p>
										<?php
									}else{
										?>
                                        <p class="text-danger fw-bold p-0">
										Status: Incomplete
										</p>
										<?php
									}
								?>
								
							
								<!-- <hr> -->
							</div> 
							<div class="col-md-2">
							<div class="card-title pb-0 m-0 text-small">Order Date</div> 
								<p class="text-secondary">
								<?php echo $transaction['created_date'] ?> <br>
								</p>
							</div>
							<hr>
							<div class="row pb-0">
									
									<div class="col-md-3">
										<div class="card-title p-0 m-0 text-small">Name</div> 
										<p class="text-secondary"><?php echo $transaction['created_by'] ?></p>
									</div>
									<div class="col-md-3">
										<div class="card-title p-0 m-0 text-small">Address</div> 
										<p class="text-secondary">
										<?php echo $transaction['alamat'] ?> <br>
										</p>
									</div>
									<div class="col-md-3">
										<div class="card-title p-0 m-0 text-small">Shipping Fee</div> 
										<p class="fw-bold">Rp<?php echo number_format($transaction['ongkir'], 0, ',', '.')  ?></p>
									</div>
									<div class="col-md-3">
									<div class="card-title p-0 m-0 text-small">Grand Total</div> 
										<p class="fw-bold">Rp<?php echo number_format($transaction['total_harga'], 0, ',', '.') ?></p><br>
									</div>
								
								</div>
								<hr>
                               
						</div>
                    <div class="m-3">
                        <p class="fw-bold">Change Status</p>
                        <a href="<?php echo base_url('transaction/completed/'.$transaction['id']) ?>" class="btn btn-success">Completed <i class="bi bi-check-lg"></i></a>
                        <a href="<?php echo base_url('transaction/incompleted/'.$transaction['id']) ?>"class="btn btn-danger">Incompleted <i class="bi bi-x-lg"></i></a>
                    </div>
                
							
						
                            <div class="m-3">
								<p class="fw-bold pt-0">Order Details</p>
							<table class="table table-border">
								<thead>
									<tr>
									<th >Product ID</th>
									<th >Name</th>
									<th >Photo</th>
									<th >Qty</th>
									<th >Discount</th>	
									<th >Sub Total</th>	
									</tr>
								</thead>

								<tbody>
								<?php foreach ($transactionDetails as $index => $transactionDetail) : ?>
									<?php
									$id = $transaction['id'];
									$idTransaksi = $transactionDetail['id_transaksi'];
									$id_barang = $transactionDetail['id_barang'];?>
								<tr>
									<?php
									if($id==$idTransaksi){
										?>
										<th scope="row"><?php echo $id_barang?></th>

										<?php foreach ($products as $index => $product) : ?>
											<?php
											$idbrg =  $product['id'];
											if($idbrg == $id_barang){?>

											<td><?php echo $product['nama'];?></td>
											<td><img src="<?php echo base_url() . "public/img/" . $product['foto'] ?>" width="100px">
											</td>
											<?php }
											?>	
										<?php endforeach ?>
										<td><?php echo $transactionDetail['jumlah'];?></td>
										<td><?php echo $transactionDetail['diskon'];?></td>
										<td>Rp<?php echo number_format($transactionDetail['subtotal_harga'], 0, ',', '.');?></td>
										</tr>
										
										
										
										<?php
									}
									?>
									<?php endforeach ?>
									
								</tbody>
								</table>
							
                            </div>
							
                        </div>
                    </div>
				</div> 
		            <?= form_close() ?>
		        </div>
		    <?php endforeach ?>
		</div>
		<?= $this->endSection() ?>