<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>Detail Transaksi Saya</h2>
					<p>Very us move be blessed multiply night</p>
				</div>
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="tracking.html">Informasi Transaksi Saya</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Tracking Box Area =================-->
<section class="tracking_box_area section_gap">
	<div class="container">

		<div class="cart_inner">

			<table class="table">
				<tr>
					<td>
						<h5>Tanggal Transaksi</h5>
					</td>
					<td><?= $detail['transaksi']->tgl_po_tiket ?></td>
				</tr>
				<?php
				if ($detail['transaksi']->stat_bayar == '1') {
				?>
					<tr>
						<td>
							<h5>Bukti Pembayaran</h5>
						</td>
						<td><img style="width: 100px;" src="<?= base_url('asset/bukti-pembayaran/' . $detail['transaksi']->bukti_bayar) ?>"></td>

					</tr>
				<?php
				}
				?>


				<tr>
					<th>No</th>
					<th>Nama Tiket</th>
					<th>Harga</th>
					<th>Qty</th>
					<th>Subtotal</th>
				</tr>
				<tbody>
					<?php
					$no = 1;
					$total = 0;
					foreach ($detail['tiket'] as $key => $value) {
					?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->nama_tiket ?></td>
							<?php
							if ($profile->member == $value->stat_member) {
							?>
								<td>Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga)) ?></td>
							<?php
							} else {
							?>
								<td>Rp. <?= number_format($value->harga) ?></td>
							<?php
							}
							?>

							<td><?= $value->qty ?></td>
							<?php
							if ($profile->member == $value->stat_member) {
								$total += ($value->qty * ($value->harga - ($value->diskon / 100 * $value->harga)));
							?>
								<td>Rp. <?= number_format($value->qty * ($value->harga - ($value->diskon / 100 * $value->harga)))  ?></td>

							<?php
							} else {
								$total += ($value->qty * $value->harga);
							?>
								<td>Rp. <?= number_format($value->qty * $value->harga) ?></td>
							<?php
							}
							?>

						</tr>
					<?php
					}
					?>

					<?php echo form_close(); ?>
					<tr>
						<td><button onclick="window.print()" class="btn btn-success">Cetak</button></td>
						<td></td>
						<td></td>
						<td>
							<h5>Diskon Favorite</h5>
						</td>
						<td>
							<?php
							$fav = $total - $detail['transaksi']->total_bayar;
							?>
							<h5>Rp. <?= number_format($fav) ?></h5>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>
							<h5>Subtotal</h5>
						</td>
						<td>
							<h5>Rp. <?= number_format($detail['transaksi']->total_bayar) ?></h5>
							<?php
							$fav = $total - $detail['transaksi']->total_bayar;
							?>
						</td>
					</tr>
					<tr class="shipping_area">
						<td></td>
						<td></td>
						<td></td>
						<td>
						</td>
						<td>
							<?php
							if ($detail['transaksi']->status_order == '0') {
							?>
								<?php echo form_open_multipart('Wisatawan/cTransaksi/bayar/' . $id) ?>
								<div class="shipping_box">
									<h5 class="mb-2">
										Silahkan Melakukan Pembayaran<br>
										Via Transfer Bank BRI<br>
										No. Rekening 0113-02988-012982-12<br>
										Atas Nama. Kebun Raya Kuningan<br>
									</h5>

									<input type="file" name="gambar" placeholder="Postcode/Zipcode" required />
									<div class="checkout_btn_inner">
										<button type="submit" class="main_btn" href="#">Kirim Pembayaran</button>
									</div>
								</div>
								</form>
							<?php
							}
							?>
							<?php
							if ($detail['transaksi']->status_order == '2' && $detail['transaksi']->ulasan == NULL) {
							?>
								<?php echo form_open_multipart('Wisatawan/cTransaksi/ulasan/' . $value->id_po_tiket) ?>
								<div class="shipping_box">
									<h4 class="mb-2">
										Silahkan untuk memberikan kritik dan saran anda...
									</h4>
									<textarea rows="5" class="form-control mb-3" name="ulasan" placeholder="Ketik Kritik dan Saran disini..." required></textarea>
									<div class="checkout_btn_inner">
										<button type="submit" class="main_btn" href="#">Kirim Kritik dan Saran</button>
									</div>
								</div>
								</form>
							<?php
							}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>
<!--================End Tracking Box Area =================-->