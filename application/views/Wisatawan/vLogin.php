<!--================End Home Banner Area =================-->
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>KEBUN RAYA KUNINGAN</h2>
					<p>"Mereka yang menemukan keindahan di seluruh alam akan menemukan diri mereka menyatu dengan rahasia kehidupan itu sendiri."</p>
				</div>
				<div class="page_link">
					<a href="index.html">Katalog Tiket Masuk</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->
<!--================ Start Blog Area =================-->
<section class="blog-area section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">

			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="<?= base_url('asset/foto-bg/2.jpg') ?>" alt="">
					</div>
					<div class="short_details">

						<a class="d-block" href="#">
							<h4>Letak Geografis Kebun Raya Kuningan</h4>
						</a>
						<div class="text-wrap">
							<p>
								Secara Geografis Kebun Raya Kuningan memiliki luas area 154 Hektar baerada di Desa Padabeunghar,
								Kecamatan Pasawahan Kabupaten Kuningan.

							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="<?= base_url('asset/foto-bg/1.jpeg') ?>" alt="">
					</div>
					<div class="short_details">

						<a class="d-block" href="#">
							<h4>Tanaman Koleksi</h4>
						</a>
						<div class="text-wrap">
							<p>
								Kebun Raya Kuningan Memiliki tanaman koleksi sejumlah 52 Famili, 177 marga, 292 jenis dan 1956 Spesimen
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="<?= base_url('asset/foto-bg/3.jpg') ?>" alt="">
					</div>
					<div class="short_details">

						<a class="d-block" href="#">
							<h4>Sarana dan Prasarana</h4>
						</a>
						<div class="text-wrap">
							<p>
								Kebun Raya Kuningan memiliki 2 situ, 10 unit Guest House 1 buah gedung pusat informasi, area camping yang luas,
								publik eks taman kuning, 2 buah rumah anggrek , 1 buah rumah kaktus dan sekulen, area pembibitand dll.

							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Blog Area =================-->
<!-- Start feature Area -->
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>LOGIN WISATAWAN</h2>
				</div>
				<div class="page_link">
					<a href="index.html">Home</a>
					<a href="tracking.html">Login</a>
				</div>
			</div>
		</div>
	</div>
</section>
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
			<form class="row tracking_form" action="<?= base_url('Wisatawan/cAuth') ?>" method="post" novalidate="novalidate">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" id="order" name="username" placeholder="Username">
					<?= form_error('username', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-12 form-group">
					<input type="password" class="form-control" id="email" name="password" placeholder="Password">
					<?= form_error('password', '<small class="text-danger">', '</small>') ?>

				</div>
				<div class="col-lg-12 form-group">
					<select class="select-control" name="hak_akses">
						<option value="">---Pilih Hak Akses---</option>
						<option value="1">Wisatawan</option>
						<option value="2">Staff dan Pengelola</option>
					</select>
					<?= form_error('hak_akses', '<small class="text-danger">', '</small>') ?>
				</div>


				<div class="col-md-12 form-group">
					<p class="mb-3">Apakah anda belum memiliki akun? <a class="text-info" href="<?= base_url('Wisatawan/cAuth/registrasi') ?>">Register Disini!!!</a></p>

					<button type="submit" value="submit" class="btn submit_btn">Sign In</button>
				</div>
			</form>
		</div>
	</div>
</section>
<!--================End Tracking Box Area =================-->