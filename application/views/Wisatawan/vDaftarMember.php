<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>Profile Wisatawan</h2>
					<p>Very us move be blessed multiply night</p>
				</div>
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="contact.html">Profile</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!-- ================ contact section start ================= -->
<section class="section_gap">
	<div class="container">
		<div class="row">
			<div class="col-12">
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
				if ($profile->member == '0') {
				?>
					<div class="alert alert-warning" role="alert">
						<strong>Warning!</strong> Silahkan anda untuk mendaftarkan sebagai member dan nikmati diskon yang diberikan!
					</div>
				<?php
				}
				?>
				<?php
				if ($profile->member == '1') {
				?>
					<div class="alert alert-success" role="alert">
						<strong>Berhasil!</strong> Anda saat ini sebagai member!
					</div>
				<?php
				}
				?>
			</div>
			<div class="col-lg-8 mb-4 mb-lg-0">
				<form class="form-contact contact_form" action="<?= base_url('Wisatawan/cProfile/update/' . $profile->id_wisatawan) ?>" method="post" id="contactForm" novalidate="novalidate">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" name="nama" value="<?= $profile->nama_wisatawan ?>" id="name" type="text" placeholder="Enter your name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" name="no_hp" value="<?= $profile->no_hp_wisatawan ?>" id="email" type="number" placeholder="Enter email address">
							</div>
						</div>

						<br>
						<div class="col-12">
							<div class="form-group">
								<input class="form-control" value="<?= $profile->alamat ?>" name="alamat" id="subject" type="text" placeholder="Enter Subject">
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" name="tempat" value="<?= $profile->tempat_lahir ?>" id="name" type="text" placeholder="Enter your name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" name="tgl" id="email" value="<?= $profile->tgl_lahir ?>" type="date" placeholder="Enter email address">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" name="username" id="name" value="<?= $profile->username ?>" type="text" placeholder="Enter your name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<input class="form-control" name="password" id="email" value="<?= $profile->password ?>" type="text" placeholder="Enter email address">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<select class="form-select" name="jk">
									<option value="Perempuan" <?php if ($profile->jk == 'Perempuan') {
																	echo 'selected';
																} ?>>Perempuan</option>
									<option value="Laki - Laki" <?php if ($profile->jk == 'Laki - Laki') {
																	echo 'selected';
																} ?>>Laki - Laki</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group mt-lg-3">
						<button type="submit" class="main_btn">Update Data</button>
						<?php
						if ($profile->member == '0') {
						?>
							<a href="<?= base_url('Wisatawan/cProfile/daftar_member/' . $profile->id_wisatawan) ?>" class="main_btn">Daftar Member</a>
						<?php
						}
						?>

					</div>
				</form>


			</div>

			<div class="col-lg-4">
				<div class="media contact-info">
					<span class="contact-info__icon"><i class="ti-home"></i></span>
					<div class="media-body">
						<h3>Alamat Wisatawan</h3>
						<p><?= $profile->alamat ?></p>
					</div>
				</div>
				<div class="media contact-info">
					<span class="contact-info__icon"><i class="ti-tablet"></i></span>
					<div class="media-body">
						<h3><a href="tel:454545654">Nomor Telepon</a></h3>
						<p><?= $profile->no_hp_wisatawan ?></p>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- ================ contact section end ================= -->