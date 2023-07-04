<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>User</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User</li>
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
						<i class="fas fa-user-plus"></i> Tambah Data User
					</button>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi User</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Nama User</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Alamat</th>
										<th class="text-center">Username</th>
										<th class="text-center">Password</th>
										<th class="text-center">Level Member</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($user as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?></td>
											<td class="text-center"><?= $value->nama_user ?></td>
											<td class="text-center"><?= $value->no_hp_user ?></td>
											<td class="text-center"><?= $value->alamat_user ?></td>
											<td class="text-center"><?= $value->username_user ?></td>
											<td class="text-center"><?= $value->password_user ?></td>
											<td class="text-center"><?php
																	if ($value->level_user == '1') {
																	?>
													<span class="badge badge-success">Staff</span>
												<?php
																	} else if ($value->level_user == '2') {

												?>
													<span class="badge badge-warning">Pengelola</span>
												<?php
																	}
												?>

											</td>
											<td class="text-center">
												<div class="btn-group">
													<a href="<?= base_url('Admin/cKelolaData/deleteuser/' . $value->id_user) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
													<button type="button" data-toggle="modal" data-target="#edit<?= $value->id_user ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
										<th class="text-center">Nama User</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Alamat</th>
										<th class="text-center">Username</th>
										<th class="text-center">Password</th>
										<th class="text-center">Level Member</th>
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
		<form action="<?= base_url('admin/ckeloladata/createuser') ?>" method="POST">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Data User</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama User</label>
						<input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama User" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">No Telepon</label>
						<input type="text" name="no_hp" class="form-control" maxlength="13" minlength="11" id="exampleInputEmail1" placeholder="No Telepon" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Alamat</label>
						<input type="text" name="alamat" class="form-control" id="exampleInputEmail1" placeholder="Alamat" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Username</label>
						<input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Password</label>
						<input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Level User</label>
						<select class="form-control" name="level" required>
							<option value="">--Pilih Level User---</option>
							<option value="1">Staff</option>
							<option value="2">Pengelola</option>
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
foreach ($user as $key => $value) {
?>
	<div class="modal fade" id="edit<?= $value->id_user ?>">
		<div class="modal-dialog">
			<form action="<?= base_url('admin/ckeloladata/updateuser/' . $value->id_user) ?>" method="POST">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Update Data User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama User</label>
							<input type="text" name="nama" value="<?= $value->nama_user ?>" class="form-control" id="exampleInputEmail1" placeholder="Nama User" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">No Telepon</label>
							<input type="text" name="no_hp" value="<?= $value->no_hp_user ?>" class="form-control" maxlength="13" minlength="11" id="exampleInputEmail1" placeholder="No Telepon" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Alamat</label>
							<input type="text" name="alamat" value="<?= $value->alamat_user ?>" class="form-control" id="exampleInputEmail1" placeholder="Alamat" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Username</label>
							<input type="text" name="username" value="<?= $value->username_user ?>" class="form-control" id="exampleInputEmail1" placeholder="Username" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Password</label>
							<input type="text" name="password" value="<?= $value->password_user ?>" class="form-control" id="exampleInputEmail1" placeholder="Password" required>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Level User</label>
							<select class="form-control" name="level" required>
								<option value="">--Pilih Level User---</option>
								<option value="1" <?php if ($value->level_user == '1') {
														echo 'selected';
													} ?>>Staff</option>
								<option value="2" <?php if ($value->level_user == '2') {
														echo 'selected';
													} ?>>Pengelola</option>

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