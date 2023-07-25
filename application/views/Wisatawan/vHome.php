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
<section class="feature-area section_gap_bottom_custom">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<a href="#" class="title">
						<i class="flaticon-money"></i>
						<h3>"Belajarlah dari alam karena alam bisa memberikan pembelajaran dan keindahan yang tak ternilai."</h3>
					</a>
					<p>Shall open divide a one</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<a href="#" class="title">
						<i class="flaticon-truck"></i>
						<h3>"Jika kamu belum pernah terdampar pada sebuah lembah rimbun, itu tandanya kamu belum pernah melihat bagaimana megahnya bumi yang kau injak."</h3>
					</a>
					<p>KEBUN RAYA KUNINGAN</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<a href="#" class="title">
						<i class="flaticon-support"></i>
						<h3>"Setiap kali kamu merenungi keajaiban alam semesta, kamu akan bersyukur atas nikmat-nikmat yang telah diberikan."</h3>
					</a>
					<p>KEBUN RAYA KUNINGAN</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="single-feature">
					<a href="#" class="title">
						<i class="flaticon-blockchain"></i>
						<h3>"Kebahagiaan yang kita rasakan belum sempurna sebelum kita merasakan kebahagiaan yang timbul karena merasakan keindahan alam."</h3>
					</a>
					<p>KEBUN RAYA KUNINGAN</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End feature Area -->
<!--================ Feature Product Area =================-->
<section class="feature_product_area section_gap_bottom_custom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="main_title">
					<h2><span>Tiket Favorite Anda</span></h2>
					<p>"Lupakan semua masalahmu dan nikmatilah indahnya alam ini."</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php
			foreach ($tiket_favorite as $key => $value) {
			?>
				<div class="col-lg-4 col-md-6">
					<form action="<?= base_url('Wisatawan/cHome/add_to_cart') ?>" method="POST">
						<input type="hidden" name="name" value="<?= $value->nama_tiket ?>">
						<input type="hidden" name="qty" value="1">
						<input type="hidden" name="id" value="<?= $value->id_tiket ?>">
						<div class="single-product">
							<div class="product-img">
								<img class="img-fluid w-100" src="<?= base_url('asset/tiket.png') ?>" alt="" />

							</div>
							<div class="product-btm">
								<a href="#" class="d-block">
									<h4><?= $value->nama_tiket ?></h4>
									<small class="text-success">Total Pembelian: <strong><?= $value->qty ?></strong></small>
								</a>
								<div class="mt-3">
									<?php
									if ($value->qty >= '5' && $value->member == '1') {
									?>
										<input type="hidden" name="price" value="<?= $value->harga - (5 / 100 * $value->harga) ?>">
										<span class="mr-4">Rp. <?= number_format($value->harga - (5 / 100 * $value->harga)) ?></span>
										<del>Rp. <?= number_format($value->harga) ?></del>
									<?php
									} else {
									?>
										<input type="hidden" name="price" value="<?= $value->harga - ($value->diskon / 100 * $value->harga) ?>">
										<span class="mr-4">Rp. <?= number_format($value->harga) ?></span>
									<?php
									}
									?>

									<br>
									<button type="submit" class="btn btn-info"><i class="ti-shopping-cart"></i></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			<?php
			}
			?>


		</div>
	</div>
</section>
<!--================ End Feature Product Area =================-->
<!--================Category Product Area =================-->
<section class="cat_product_area section_gap">
	<div class="container">
		<div class="row flex-row-reverse">
			<div class="col-lg-9">
				<div class="latest_product_inner">
					<div class="row">
						<?php
						foreach ($tiket as $key => $value) {
						?>
							<div class="col-lg-4 col-md-6">
								<form action="<?= base_url('Wisatawan/cHome/add_to_cart') ?>" method="POST">
									<input type="hidden" name="name" value="<?= $value->nama_tiket ?>">
									<input type="hidden" name="qty" value="1">
									<input type="hidden" name="id" value="<?= $value->id_tiket ?>">
									<div class="single-product">
										<div class="product-img">
											<img class="card-img" src="<?= base_url('asset/tiket.png') ?>" alt="" />
											<?php if ($value->diskon != '0') {
											?>
												<div class="p_icon">
													<span class="text-light"><?= $value->nama_diskon ?> <?= $value->diskon ?>%</span>
												</div>
											<?php
											}
											?>
										</div>
										<div class="product-btm">
											<a href="#" class="d-block">
												<h4><?= $value->nama_tiket ?></h4>
											</a>
											<div class="mt-3">
												<span class="mr-4">
													<input type="hidden" name="price" value="<?= $value->harga - ($value->diskon / 100 * $value->harga) ?>">
													Rp. <?= number_format($value->harga - ($value->diskon / 100 * $value->harga)) ?>
													<?php if ($value->diskon != '0') {
													?>
														<del>Rp. <?= number_format($value->harga)  ?></del>
													<?php } ?>
												</span>

												<br>
												<small><?= $value->deskripsi ?></small>
												<br>
												<button type="submit" class="btn btn-info"><i class="ti-shopping-cart"></i></button>
											</div>
										</div>
									</div>
								</form>
							</div>

						<?php
						}
						?>
					</div>
				</div>
			</div>

			<div class="col-lg-3">
				<div class="left_sidebar_area">
					<aside class="left_widgets p_filter_widgets">
						<div class="l_w_title">
							<h3>Tiket Masuk</h3>
						</div>
						<div class="widgets_inner">
							<ul class="list">
								<?php
								foreach ($tiket as $key => $value) {
								?>
									<li>
										<a href="#"><?= $value->nama_tiket ?></a>
									</li>
								<?php
								}
								?>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Category Product Area =================-->

<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>Ulasan Kritik dan Saran</h2>
					<p>Very us move be blessed multiply night</p>
				</div>
				<div class="page_link">
					<a href="#">Ulasan</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 posts-list">
				<div class="comments-area">
					<h4>Ulasan Kritik dan Saran Wisatawan</h4>
					<?php
					foreach ($ulasan as $key => $value) {
					?>
						<div class="comment-list">
							<div class="single-comment justify-content-between d-flex">
								<div class="user justify-content-between d-flex">
									<div class="thumb">
										<img src="<?= base_url('asset/eiser-master/') ?>img/instagram/i6.jpg" alt="">
									</div>
									<div class="desc">
										<p class="comment">
											<?= $value->ulasan ?></p>

										<div class="d-flex justify-content-between">
											<div class="d-flex align-items-center">
												<h5>
													<a href="#"><?= $value->nama_wisatawan ?></a>
												</h5>
												<p class="date"><?= $value->time ?></p>
											</div>

											<div class="reply-btn">
												<a href="#" class="btn-reply text-uppercase">reply</a>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>


				</div>

			</div>

		</div>
	</div>
</section>
<!--================Blog Area =================-->