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
			<form class="row tracking_form" action="<?= base_url('Wisatawan/cAuth') ?>" method="post" novalidate="novalidate">
				<div class="col-md-12 form-group">
					<input type="text" class="form-control" id="order" name="username" placeholder="Username">
					<?= form_error('username', '<small class="text-danger">', '</small>') ?>
				</div>
				<div class="col-md-12 form-group">
					<input type="password" class="form-control" id="email" name="password" placeholder="Password">
					<?= form_error('password', '<small class="text-danger">', '</small>') ?>

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