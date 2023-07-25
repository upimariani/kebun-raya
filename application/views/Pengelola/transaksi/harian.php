<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Laporan Harian</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Invoice</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-globe"></i> Laporan
									<small class="float-right">Date: <?= $tanggal ?> / <?= $bulan ?> / <?= $tahun ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->

						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Id Transaksi</th>
											<th>Atas Nama</th>
											<th>Tanggal Order</th>
											<th>Total Bayar</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$total = 0;
										foreach ($laporan as $key => $value) {
											$total += $value->total_bayar;
										?>
											<tr>
												<td><?= $value->id_po_tiket ?></td>
												<?php
												if ($value->nama_wisatawan == NULL) {
												?>
													<td>PO Secara Langsung</td>
												<?php
												} else {
												?>
													<td><?= $value->nama_wisatawan ?></td>
												<?php
												}
												?>

												<td><?= $value->tgl_po_tiket ?></td>
												<td>Rp. <?= number_format($value->total_bayar)  ?></td>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<div class="col-6">

							</div>
							<!-- /.col -->
							<div class="col-6">
								<p class="lead">Amount Due <?= date('d-m-Y') ?></p>

								<div class="table-responsive">
									<table class="table">

										<tr>
											<th>Total:</th>
											<td>Rp. <?= number_format($total) ?></td>
										</tr>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>

							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>