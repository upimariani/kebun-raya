<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Invoice</h1>
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

					<div class="callout callout-success">
						<h5><i class="fas fa-info"></i> Note:</h5>
						Transaksi Secara Langsung!
					</div>
					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-globe"></i> Obyek Wisata Kebun Raya Kuningan
									<small class="float-right">Date: <?= $detail['transaksi']->tgl_po_tiket ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								From
								<address>
									<strong>Transaksi Wisatawan Secara Langsung</strong><br>



								</address>
							</div>
							<!-- /.col -->

							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Qty</th>
											<th>Tiket</th>
											<th>Harga</th>
											<th>Description</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($detail['tiket'] as $key => $value) {
										?>
											<tr>
												<td><?= $value->qty ?></td>
												<td><?= $value->nama_tiket ?></td>
												<td>Rp. <?= number_format($value->harga) ?></td>
												<td><?= $value->deskripsi ?></td>
												<td>Rp. <?= number_format($value->qty * $value->harga)  ?></td>
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
								<p class="lead">Amount Due 2/22/2014</p>

								<div class="table-responsive">
									<table class="table">

										<tr>
											<th>Total:</th>
											<td>Rp. <?= number_format($detail['transaksi']->total_bayar) ?></td>
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
								<button onclick="window.print()" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
								<a href="<?= base_url('Admin/cTransaksiLangsung') ?>" class="btn btn-danger"><i class="fas fa-reply"></i> Kembali</a>

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