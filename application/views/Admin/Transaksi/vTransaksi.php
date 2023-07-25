<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Transaksi Wisatawan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Transaksi</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if ($this->session->userdata('success')) {
		?>
			<div class="alert alert-success alert-dismissible mt-3">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-check"></i> Alert!</h5>
				<?= $this->session->userdata('success') ?>
			</div>
		<?php
		} ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12">
					<div class="card card-info card-outline card-tabs">
						<div class="card-header p-0 pt-1 border-bottom-0">
							<ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
								<li class="nav-item">
									<a class="btn btn-danger nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Pesanan Masuk</a>
								</li>
								<li class="nav-item">
									<a class="btn btn-warning nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Menunggu Konfirmasi</a>
								</li>
								<li class="nav-item">
									<a class="btn btn-info nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Konfirmasi Datang</a>
								</li>
								<li class="nav-item">
									<a class="btn btn-success nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Selesai</a>
								</li>
							</ul>
						</div>
						<div class="card-body">
							<div class="tab-content" id="custom-tabs-three-tabContent">
								<div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Wisatawan</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_order == '0') {
													?>

															<tr>
																<td class="text-center"><?= $no++ ?></td>
																<td class="text-center"><?= $value->tgl_po_tiket ?></td>
																<td class="text-center"><?= $value->tgl_boking ?></td>
																<td class="text-center"><?= $value->nama_wisatawan ?></td>
																<td class="text-center">Rp. <?= number_format($value->total_bayar) ?></td>
																<td class="text-center"><?php
																						if ($value->status_order == '0') {
																						?>
																		<span class="badge badge-danger">Belum Bayar!</span>
																	<?php
																						} else if ($value->status_order == '1') {

																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																						} else {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																						}
																	?>

																</td>

																<td class="text-center">
																	<div class="btn-group">
																		<a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_po_tiket . '/' . $value->member) ?>" class="btn btn-info"><i class="fas fa-info"></i></a>
																		<?php
																		if ($value->status_order == '1') {
																		?>
																			<a href="<?= base_url('Admin/cTransaksi/konfirmasi/' . $value->id_po_tiket) ?>" class="btn btn-warning"><i class="fas fa-thumbs-up"></i></a>

																		<?php
																		}
																		?>
																	</div>
																</td>
															</tr>
														<?php
														}
														?>
													<?php
													}
													?>

												</tbody>

												<tfoot>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Wisatawan</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_order == '1') {
													?>
															<tr>
																<td class="text-center"><?= $no++ ?></td>
																<td class="text-center"><?= $value->tgl_po_tiket ?></td>
																<td class="text-center"><?= $value->tgl_boking ?></td>
																<td class="text-center"><?= $value->nama_wisatawan ?></td>
																<td class="text-center">Rp. <?= number_format($value->total_bayar) ?></td>
																<td class="text-center"><?php
																						if ($value->status_order == '0') {
																						?>
																		<span class="badge badge-danger">Belum Bayar!</span>
																	<?php
																						} else if ($value->status_order == '1') {

																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																						} else {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																						}
																	?>

																</td>

																<td class="text-center">
																	<div class="btn-group">
																		<a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_po_tiket . '/' . $value->member) ?>" class="btn btn-info"><i class="fas fa-info"></i></a>
																		<?php
																		if ($value->status_order == '1') {
																		?>
																			<a href="<?= base_url('Admin/cTransaksi/konfirmasi/' . $value->id_po_tiket) ?>" class="btn btn-warning"><i class="fas fa-thumbs-up"></i></a>

																		<?php
																		}
																		?>
																	</div>
																</td>
															</tr>
													<?php
														}
													}
													?>

												</tbody>

												<tfoot>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Wisatawan</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_order == '2') {
													?>
															<tr>
																<td class="text-center"><?= $no++ ?></td>
																<td class="text-center"><?= $value->tgl_po_tiket ?></td>
																<td class="text-center"><?= $value->tgl_boking ?></td>
																<td class="text-center"><?= $value->nama_wisatawan ?></td>
																<td class="text-center">Rp. <?= number_format($value->total_bayar) ?></td>
																<td class="text-center"><?php
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
																		<span class="badge badge-info">Konfirmasi Datang</span>
																	<?php
																						} else {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																						}
																	?>

																</td>

																<td class="text-center">
																	<div class="btn-group">
																		<a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_po_tiket . '/' . $value->member) ?>" class="btn btn-info"><i class="fas fa-info"></i></a>

																		<a href="<?= base_url('Admin/cTransaksi/konfirmasi_datang/' . $value->id_po_tiket) ?>" class="btn btn-info"><i class="fas fa-thumbs-up"></i></a>


																	</div>
																</td>
															</tr>
													<?php
														}
													}
													?>

												</tbody>

												<tfoot>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
								<div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
									<div class="card">
										<div class="card-header">
											<h3 class="card-title">Informasi Transaksi Wisatawan</h3>
										</div>
										<!-- /.card-header -->
										<div class="card-body">
											<table class="example1 table table-bordered table-striped">
												<thead>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$no = 1;
													foreach ($transaksi as $key => $value) {
														if ($value->status_order == '3') {
													?>
															<tr>
																<td class="text-center"><?= $no++ ?></td>
																<td class="text-center"><?= $value->tgl_po_tiket ?></td>
																<td class="text-center"><?= $value->tgl_boking ?></td>
																<td class="text-center"><?= $value->nama_wisatawan ?></td>
																<td class="text-center">Rp. <?= number_format($value->total_bayar) ?></td>
																<td class="text-center"><?php
																						if ($value->status_order == '0') {
																						?>
																		<span class="badge badge-danger">Belum Bayar!</span>
																	<?php
																						} else if ($value->status_order == '1') {

																	?>
																		<span class="badge badge-warning">Menunggu Konfirmasi</span>
																	<?php
																						} else {
																	?>
																		<span class="badge badge-success">Selesai</span>
																	<?php
																						}
																	?>

																</td>

																<td class="text-center">
																	<div class="btn-group">
																		<a href="<?= base_url('Admin/cTransaksi/detail_transaksi/' . $value->id_po_tiket . '/' . $value->member) ?>" class="btn btn-info"><i class="fas fa-info"></i></a>
																		<?php
																		if ($value->status_order == '1') {
																		?>
																			<a href="<?= base_url('Admin/cTransaksi/konfirmasi/' . $value->id_po_tiket) ?>" class="btn btn-warning"><i class="fas fa-thumbs-up"></i></a>

																		<?php
																		}
																		?>
																	</div>
																</td>
															</tr>
													<?php
														}
													}
													?>

												</tbody>

												<tfoot>
													<tr>
														<th class="text-center">No</th>
														<th class="text-center">Tanggal Transaksi</th>
														<th class="text-center">Tanggal Boking</th>
														<th class="text-center">Atas Nama</th>
														<th class="text-center">Total Bayar</th>
														<th class="text-center">Status Order</th>
														<th class="text-center">Action</th>
													</tr>
												</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
								</div>
							</div>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>

			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>