<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>REGISTRASI WISATAWAN</h2>
				</div>
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="tracking.html">Registrasi</a>
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
					<?= $this->session->userdata('success') ?>
				</div>
			<?php
			}
			?>

			<?php
			if ($this->session->userdata('error')) {
			?>
				<div class="alert alert-danger" role="alert">
					<?= $this->session->userdata('error') ?>
				</div>
			<?php
			}
			?>
			<form class="row tracking_form" action="<?= base_url('Wisatawan/cAuth/registrasi') ?>" method="post" novalidate="novalidate">
				<div class="col-md-6 form-group">
					<label>Nama Wisatawan</label>
					<input type="text" class="form-control" id="order" name="nama" placeholder="Masukkan Nama Anda">
					<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-6 form-group">
					<label>No Telepon</label>
					<input type="text" class="form-control" id="email" name="no_hp" placeholder="Masukkan No Telepon">
					<?= form_error('no_hp', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-12 form-group">
					<label>Alamat</label>
					<input type="text" class="form-control" id="email" name="alamat" placeholder="Masukkan Alamat">
					<?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
				</div>

				<div class="col-md-6 form-group">
					<label>Tempat Lahir</label>
					<input type="text" class="form-control" id="email" name="tempat" placeholder="Masukkan Tempat Lahir">
					<?= form_error('tempat', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-6 form-group">
					<label>Tanggal Lahir</label>
					<input type="date" class="form-control" id="email" name="tgl" placeholder="Password">
					<?= form_error('tgl', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-12 form-group">
					<label>Jenis Kelamin</label><br>
					<select class="shipping_select" name="jk" required>
						<option value="">--Pilih Jenis Kelamin---</option>
						<option value="Perempuan">Perempuan</option>
						<option value="Laki - Laki">Laki - Laki</option>

					</select>
					<?= form_error('jk', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-6 form-group">
					<label>Username</label>
					<input type="text" class="form-control" id="email" name="username" placeholder="Masukkan Username">
					<?= form_error('username', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-6 form-group">
					<label>Password</label>
					<input type="text" class="form-control" id="email" name="password" placeholder="Masukkan Password">
					<?= form_error('password', '<small class="text-danger">', '</small>') ?>
				</div>

				<div class="col-md-12 form-group">
					<p class="mb-3">Apakah anda sudah memiliki akun? <a class="text-info" href="<?= base_url('Wisatawan/cAuth') ?>">Login Disini!!!</a></p>

					<button type="submit" value="submit" class="btn submit_btn">Sign In</button>
				</div>
			</form>
		</div>
	</div>
</section>
<!--================End Tracking Box Area =================-->