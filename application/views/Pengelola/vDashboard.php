<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Dashboard</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Info boxes -->
			<div class="row">
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box">
						<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Wisatawan Member</span>
							<span class="info-box-number">
								<?= $jml['wisatawan_member']->jml_wisatawan_member ?>
							</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Wisatawan Non Member</span>
							<span class="info-box-number"> <?= $jml['wisatawan_non_member']->jml_wisatawan_non_member ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix hidden-md-up"></div>

				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-success elevation-1"><i class="fas fa-barcode"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Jenis Tiket</span>
							<span class="info-box-number"> <?= $jml['tiket']->jml_tiket ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-12 col-sm-6 col-md-3">
					<div class="info-box mb-3">
						<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">User</span>
							<span class="info-box-number"> <?= $jml['user']->jml_user ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

			<div class="row">
				<div class="col-6 table-responsive">
					<canvas id="grafik_member" height="150"></canvas>


				</div>
				<div class="col-6 table-responsive">
					<canvas id="grafik_transaksi" height="150"></canvas>


				</div>
				<!-- /.col -->
			</div>

			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<div class="col-md-6">
					<!-- MAP & BOX PANE -->


					<!-- TABLE: LATEST ORDERS -->
					<div class="card">
						<div class="card-header border-transparent">
							<h3 class="card-title">Informasi Status Menunggu Konfirmasi Transaksi</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table m-0">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Tanggal Transaksi</th>
											<th class="text-center">Tanggal Boking</th>
											<th class="text-center">Atas Nama</th>
											<th class="text-center">Total Transaksi</th>

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
												<td><?= $value->nama_wisatawan ?></td>
												<td class="text-center">Rp. <?= number_format($value->total_bayar) ?>
												</td>

											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.card-body -->
						<div class="card-footer clearfix">
							<a href="<?= base_url('Admin/cTransaksi') ?>" class="btn btn-sm btn-info float-left">Lihat Transaksi</a>
						</div>
						<!-- /.card-footer -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
				<div class="col-md-6">
					<!-- MAP & BOX PANE -->


					<!-- TABLE: LATEST ORDERS -->
					<div class="card">
						<div class="card-header border-transparent">
							<h3 class="card-title">Chatting</h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove">
									<i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table m-0">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Nama Wisatawan</th>
											<th class="text-center">Chatting</th>
											<th class="text-center">Time</th>
											<th class="text-center">View</th>

										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($chatting as $key => $value) {

										?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nama_wisatawan ?></td>
												<?php
												if ($value->pelanggan_send != NULL) {
												?>
													<td><?= $value->pelanggan_send ?></td>
												<?php
												} else {
												?>
													<td><?= $value->staff_send ?></td>
												<?php
												}
												?>

												<td><?= $value->time ?></td>
												<td class="text-center"> <a href="<?= base_url('Admin/cDashboard/view_chatting/' . $value->id_wisatawan) ?>" class="btn btn-sm btn-warning float-left"><i class="fas fa-eye"></i></a>

												</td>

											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.card-body -->

						<!-- /.card-footer -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->

		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->