<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Diskon Tiket Masuk Objek Wisata Kebun Raya Kuningan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Diskon Tiket</li>
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
						<i class="fas fa-user-plus"></i> Tambah Data Diskon Tiket
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Diskon</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama Tiket</th>
										<th class="text-center">Nama Diskon</th>
										<th class="text-center">Diskon</th>
										<th class="text-center">Member</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($diskon as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_tiket ?></td>
											<td class="text-center"><?= $value->nama_diskon ?></td>
											<td class="text-center"><?= $value->diskon ?> %</td>
											<td class="text-center"><?php if ($value->stat_member == '1') {
																	?>
													<span class="badge badge-success">Member</span>
												<?php
																	} else {
												?>
													<span class="badge badge-danger">Non Member</span>
												<?php
																	}  ?>
											</td>

											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cKelolaData/deletediskon/' . $value->id_diskon) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_diskon ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Nama Tiket</th>
										<th class="text-center">Nama Diskon</th>
										<th class="text-center">Diskon</th>
										<th class="text-center">Member</th>
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
		<form action="<?= base_url('admin/ckeloladata/creatediskon') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data Diskon</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Tiket</label>
						<select class="form-control" name="tiket">
							<option>---Pilih Tiket---</option>
							<?php
							foreach ($tiket as $key => $value) {
							?>
								<option value="<?= $value->id_tiket ?>"><?= $value->nama_tiket ?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Diskon</label>
						<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Diskon" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Besar Diskon</label>
						<div class="row">
							<div class="col-lg-8">
								<input type="text" name="besar" class="form-control" id="exampleInputEmail1" placeholder="Besar Diskon" required>
							</div>
							<div class="col-lg-4">%</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Status Member</label>
						<select class="form-control" name="member">
							<option value="">---Pilih Member---</option>
							<option value="1">Member</option>
							<option value="0">Non Member</option>

						</select>
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
foreach ($diskon as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_diskon ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/ckeloladata/updatediskon/' . $value->id_diskon) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Data Diskon</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Tiket</label>
							<select class="form-control" name="tiket">
								<option>---Pilih Tiket---</option>
								<?php
								foreach ($tiket as $key => $data) {
								?>
									<option value="<?= $data->id_tiket ?>" <?php if ($data->id_tiket == $value->id_tiket) {
																				echo 'selected';
																			} ?>><?= $data->nama_tiket ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Diskon</label>
							<input type="text" name="nama" value="<?= $value->nama_diskon ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama Diskon" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Besar Diskon</label>
							<div class="row">
								<div class="col-lg-8">
									<input type="text" name="besar" value="<?= $value->diskon ?>" class="form-control" id="exampleInputEmail1" placeholder="Besar Diskon" required>
								</div>
								<div class="col-lg-4">%</div>
							</div>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Status Member</label>
							<select class="form-control" name="member">
								<option value="">---Pilih Member---</option>
								<option value="1" <?php if ($value->stat_member == '1') {
														echo 'selected';
													} ?>>Member</option>
								<option value="0" <?php if ($value->stat_member == '0') {
														echo 'selected';
													} ?>>Non Member</option>

							</select>
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