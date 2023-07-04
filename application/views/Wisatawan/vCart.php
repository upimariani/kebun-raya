<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>Cart</h2>
					<p>Very us move be blessed multiply night</p>
				</div>
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="cart.html">Cart</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<?php echo form_open('Wisatawan/cCart/update_cart'); ?>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Tiket</th>
							<th scope="col">Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($this->cart->contents() as $key => $value) {
						?>

							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											<img style="width: 150px;" src="<?= base_url('asset/tiket.png') ?>" alt="" />
										</div>
										<div class="media-body">
											<p><?= $value['name'] ?></p>
										</div>
									</div>
								</td>
								<td>
									<h5>Rp. <?= number_format($value['price']) ?></h5>
								</td>
								<td>
									<div class="product_count">
										<input type="text" name="<?= $i . '[qty]' ?>" id="sst" value="<?= $value['qty'] ?>" title="Quantity:" class="input-text qty" />
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" type="button">
											<i class="lnr lnr-chevron-up"></i>
										</button>
										<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )  > 1 ) result.value--;return false;" class="reduced items-count" type="button">
											<i class="lnr lnr-chevron-down"></i>
										</button>
									</div>
								</td>
								<td>
									<h5><?= number_format($value['price'] * $value['qty']) ?></h5>
								</td>
							</tr>
						<?php
							$i++;
						}
						?>

						<tr class="bottom_button">
							<td>
								<button type="submit" class="gray_btn" href="#">Update Cart</button>
							</td>
							<td></td>
							<td></td>
							<td>

							</td>
						</tr>
						<?php echo form_close(); ?>
						<tr>
							<td></td>
							<td></td>
							<td>
								<h5>Subtotal</h5>
							</td>
							<td>
								<h5><?= number_format($this->cart->total()) ?></h5>
							</td>
						</tr>
						<form action="<?= base_url('Wisatawan/cCart/checkout') ?>" method="POST">
							<tr class="shipping_area">
								<td></td>
								<td></td>
								<td>
									<h5>Shipping</h5>
								</td>
								<td>
									<div class="shipping_box">

										<h6>
											Silahkan Isi Tanggal Boking Tiket
											<i class="fa fa-caret-down" aria-hidden="true"></i>
										</h6>

										<input type="date" name="date" placeholder="Postcode/Zipcode" required />
									</div>
								</td>
							</tr>
							<tr class="out_button_area">
								<td></td>
								<td></td>
								<td></td>
								<td>
									<div class="checkout_btn_inner">
										<a class="gray_btn" href="<?= base_url('Wisatawan/cHome') ?>">Continue Shopping</a>
										<button type="submit" class="main_btn" href="#">Proceed to checkout</button>
									</div>
								</td>
							</tr>
						</form>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</section>
<!--================End Cart Area =================-->