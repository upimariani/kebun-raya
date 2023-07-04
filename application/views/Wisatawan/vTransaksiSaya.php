<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>Transaksi Saya</h2>
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
		<div class="tracking_box_inner">
			<?php
			if ($this->session->userdata('success')) {
			?>
				<div class="alert alert-success" role="alert">
					<strong>Sukses!</strong>
					<?= $this->session->userdata('success') ?>
				</div>
			<?php
			}
			?>
			<table class="table border-dark">
				<thead class="table-success">
					<tr>
						<th>No</th>
						<th>Tanggal Transaksi</th>
						<th>Tanggal Boking</th>
						<th>Total Pembayaran</th>
						<th>Status Transaksi</th>
						<th>Detail</th>
					</tr>

				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($transaksi as $key => $value) {
					?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $value->tgl_po_tiket ?></td>
							<td><?= $value->tgl_boking ?></td>
							<td>Rp. <?= number_format($value->total_bayar)  ?></td>
							<td><?php
								if ($value->status_order == '0') {
								?>
									<span class="badge badge-danger">Belum Bayar!</span>
								<?php
								} else if ($value->status_order == '1') {

								?>
									<span class="badge badge-warning">Menunggu Konfirmasi</span>
								<?php
								} else if ($value->status_order == '2') {
								?>
									<span class="badge badge-success">Selesai</span>
								<?php
								}
								?>
							</td>
							<td><a href="<?= base_url('Wisatawan/cTransaksi/detail_transaksi/' . $value->id_po_tiket) ?>" class="btn btn-info"><i class="ti-info"></i></a></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<!--================End Tracking Box Area =================-->