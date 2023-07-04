<body>
	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="float-left">
							<p>Phone: +01 256 25 235</p>
							<p>email: info@eiser.com</p>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="float-right">
							<ul class="right_side">
								<li>
									<a href="cart.html">
										gift card
									</a>
								</li>
								<li>
									<a href="tracking.html">
										track order
									</a>
								</li>
								<li>
									<a href="contact.html">
										Contact Us
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<div class="container">
				<nav class="navbar navbar-expand-lg navbar-light w-100">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<img src="img/logo.png" alt="" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
						<div class="row w-100 mr-0">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">


									<?php
									if ($this->session->userdata('id_wisatawan') != '') {
									?>
										<li class="nav-item <?php if ($this->uri->segment(1) == 'Wisatawan' && $this->uri->segment(2) == 'cHome') {
																echo 'active';
															}  ?>">
											<a class="nav-link" href="<?= base_url('Wisatawan/cHome') ?>">Home</a>
										</li>
										<li class="nav-item <?php if ($this->uri->segment(1) == 'Wisatawan' && $this->uri->segment(2) == 'cProfile') {
																echo 'active';
															}  ?>">
											<a class="nav-link" href="<?= base_url('Wisatawan/cProfile') ?>">Profile</a>
										</li>
										<li class="nav-item <?php if ($this->uri->segment(1) == 'Wisatawan' && $this->uri->segment(2) == 'cTransaksi') {
																echo 'active';
															}  ?>">
											<a class="nav-link" href="<?= base_url('Wisatawan/cTransaksi') ?>">Tiket Saya</a>
										</li>
										<li class="nav-item <?php if ($this->uri->segment(1) == 'Wisatawan' && $this->uri->segment(2) == 'cChatting') {
																echo 'active';
															}  ?>">
											<a class="nav-link" href="<?= base_url('Wisatawan/cChatting') ?>">Chatting</a>
										</li>
									<?php
									}
									?>
								</ul>
							</div>

							<div class="col-lg-5 pr-0">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">

									<?php
									if ($this->session->userdata('id_wisatawan') != '') {


										$qty = 0;
										foreach ($this->cart->contents() as $key => $value) {
											$qty += $value['qty'];
										}
									?>
										<li class="nav-item">
											<a href="<?= base_url('Wisatawan/cCart') ?>" class="icons">
												<i class="ti-shopping-cart"></i><span class="badge badge-success"><?php if ($qty != '0') {
																														echo $qty;
																													} ?></span>
											</a>
										</li>
									<?php
									}
									?>

									<li class="nav-item">

										<?php
										if ($this->session->userdata('id_wisatawan') != '') {
										?>
											<a href="<?= base_url('Wisatawan/cAuth/logout') ?>" class="icons">
												<i class="ti-user" aria-hidden="true"></i>
												Selamat Datang, <strong><?= $this->session->userdata('nama_wisatawan') ?></strong>
											<?php
										} else {
											?>
												<a href="<?= base_url('Wisatawan/cAuth') ?>" class="icons">
													<i class="ti-user" aria-hidden="true"></i>
												<?php
											}
												?>

												</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<!--================Header Menu Area =================-->