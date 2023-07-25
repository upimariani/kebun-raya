<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Transaksi Langsung Wisatawan</h1>
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
				<!-- left column -->
				<div class="col-md-5">
					<!-- general form elements -->
					<div class="card card-warning">
						<div class="card-header">
							<h3 class="card-title">Form Transaksi Langsung</h3>

						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="<?= base_url('Admin/cTransaksiLangsung/addtocart') ?>" method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Tiket</label>
									<select id="tiket" name="id" class="form-control" required>
										<option value="">---Pilih Nama Tiket---</option>
										<?php
										foreach ($tiket as $key => $value) {
										?>
											<option data-deskripsi="<?= $value->deskripsi ?>" data-harga="<?= $value->harga ?>" data-nama="<?= $value->nama_tiket ?>" value="<?= $value->id_tiket ?>"><?= $value->nama_tiket ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Nama Tiket</label>
											<input type="text" name="nama" class="nama form-control" id="exampleInputPassword1" placeholder="Nama Tiket" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Harga</label>
											<input type="text" name="harga" class="harga form-control" id="exampleInputPassword1" placeholder="Harga" readonly>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Deskripsi</label>
									<textarea type="text" rows="6" class="deskripsi form-control" id="exampleInputPassword1" placeholder="Deskripsi" readonly></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Quantity</label>
									<input type="number" min="1" name="qty" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Nama Quantity" required>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-warning">Add Cart</button>
							</div>
						</form>
					</div>
				</div>
				<?php
				$qty = 0;
				foreach ($this->cart->contents() as $key => $value) {
					$qty += $value['qty'];
				}
				if ($qty != '0') {
				?>
					<div class="col-md-7">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Informasi Keranjang Transaksi Langsung</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th style="width: 10px">#</th>
											<th>Nama Tiket</th>
											<th>Harga Tiket</th>
											<th style="width: 40px">Quantity</th>
											<th>Subtotal</th>
											<th style="width: 40px">Hapus</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($this->cart->contents() as $key => $value) {
										?>
											<tr>
												<td><?= $no++ ?>.</td>
												<td><?= $value['name'] ?></td>
												<td>
													Rp.<?= number_format($value['price']) ?>

												</td>
												<td class="text-center"><span class="badge bg-danger"><?= $value['qty'] ?></span></td>
												<td>Rp. <?= number_format($value['qty'] * $value['price']) ?></td>
												<td class="text-center"><a class="btn btn-danger" href="<?= base_url('Admin/cTransaksiLangsung/deletecart/' . $value['rowid']) ?>"><i class="fas fa-trash-restore-alt"></i></a></td>
											</tr>
										<?php
										}
										?>
										<tr>

											<td colspan="3" class="text-right">Total</td>
											<td colspan="3"><strong>Rp. <?= number_format($this->cart->total()) ?></strong></td>
										</tr>

									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
							<div class="card-footer clearfix">
								<a href="<?= base_url('Admin/cTransaksiLangsung/selesai') ?>" class="btn btn-success"><i class="fas fa-save"></i> Selesai</a>
							</div>
						</div>
					</div>
				<?php
				}
				?>

				<!-- /.card -->
			</div>
			<div class="row">
				<div class="col-12 col-sm-12">

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
										<th class="text-center">Total Bayar</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($transaksi as $key => $value) {
										if ($value->type_po == '1') {
									?>
											<tr>
												<td class="text-center"><?= $no++ ?></td>
												<td class="text-center"><?= $value->tgl_po_tiket ?></td>
												<td class="text-center">Rp. <?= number_format($value->total_bayar) ?></td>
												<td class="text-center">
													<div class="btn-group">
														<a href="<?= base_url('Admin/cTransaksiLangsung/detail_transaksi/' . $value->id_po_tiket) ?>" class="btn btn-info"><i class="fas fa-info"></i></a>

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
										<th class="text-center">Total Bayar</th>
										<th class="text-center">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>

		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>