<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Tiket Masuk Objek Wisata Kebun Raya Kuningan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Tiket</li>
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
				<div class="col-12  ">
					<button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
						<i class="fas fa-user-plus"></i> Tambah Data Tiket
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Tiket</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Kategori</th>
										<th class="text-center">Nama Tiket</th>
										<th class="text-center">Deskripsi</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Gambar</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($tiket as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_kategori ?></td>
											<td class="text-center"><?= $value->nama_tiket ?></td>
											<td class="text-center"><?= $value->deskripsi ?></td>
											<td class="text-center">Rp. <?= number_format($value->harga)  ?></td>
											<td class="text-center"><img width="150px" src="<?= base_url('asset/tiket.png') ?>"></td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cKelolaData/deletetiket/' . $value->id_tiket) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_tiket ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
												</div>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>

								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Kategori</th>
										<th class="text-center">Nama Tiket</th>
										<th class="text-center">Deskripsi</th>
										<th class="text-center">Harga</th>
										<th class="text-center">Gambar</th>
										<th class="text-center">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<form action="<?= base_url('admin/ckeloladata/createtiket') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Tiket</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Kategori</label>
						<select class="form-control" name="kategori" required>
							<option value="">---Pilih Kategori---</option>
							<?php
							foreach ($kategori as $key => $value) {
							?>
								<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Tiket</label>
						<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Tiket" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Deskripsi</label>
						<input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Harga</label>
						<input type="number" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Harga" required>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</form>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($tiket as $key => $data) {
?>
	<div class="modal fade" id="edit<?= $data->id_tiket ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/ckeloladata/updatetiket/' . $data->id_tiket) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Data Tiket</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Kategori</label>
							<select class="form-control" name="kategori" required>
								<option value="">---Pilih Kategori---</option>
								<?php
								foreach ($kategori as $key => $value) {
								?>
									<option value="<?= $value->id_kategori ?>" <?php if ($data->id_kategori == $value->id_kategori) {
																					echo 'selected';
																				} ?>><?= $value->nama_kategori ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Tiket</label>
							<input type="text" name="nama" value="<?= $data->nama_tiket ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama Tiket" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Deskripsi</label>
							<input type="text" name="deskripsi" value="<?= $data->deskripsi ?>" class="form-control" id="exampleInputEmail1" placeholder="Deskripsi" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Harga</label>
							<input type="number" name="harga" value="<?= $data->harga ?>" class="form-control" id="exampleInputEmail1" placeholder="Harga" required>
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</form>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
<?php
}
?>