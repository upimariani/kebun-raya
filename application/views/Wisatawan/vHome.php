<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>KEBUN RAYA KUNINGAN</h2>
					<p>Very us move be blessed multiply night</p>
				</div>
				<div class="page_link">
					<a href="index.html">Katalog Tiket Masuk</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->
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

<!--================ Start Blog Area =================-->
<section class="blog-area section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="main_title">
					<h2><span>latest blog</span></h2>
					<p>Bring called seed first of third give itself now ment</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="img/b1.jpg" alt="">
					</div>
					<div class="short_details">
						<div class="meta-top d-flex">
							<a href="#">By Admin</a>
							<a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
						</div>
						<a class="d-block" href="single-blog.html">
							<h4>Ford clever bed stops your sleeping
								partner hogging the whole</h4>
						</a>
						<div class="text-wrap">
							<p>
								Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
								Forth.
							</p>
						</div>
						<a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="img/b2.jpg" alt="">
					</div>
					<div class="short_details">
						<div class="meta-top d-flex">
							<a href="#">By Admin</a>
							<a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
						</div>
						<a class="d-block" href="single-blog.html">
							<h4>Ford clever bed stops your sleeping
								partner hogging the whole</h4>
						</a>
						<div class="text-wrap">
							<p>
								Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
								Forth.
							</p>
						</div>
						<a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="img/b3.jpg" alt="">
					</div>
					<div class="short_details">
						<div class="meta-top d-flex">
							<a href="#">By Admin</a>
							<a href="#"><i class="ti-comments-smiley"></i>2 Comments</a>
						</div>
						<a class="d-block" href="single-blog.html">
							<h4>Ford clever bed stops your sleeping
								partner hogging the whole</h4>
						</a>
						<div class="text-wrap">
							<p>
								Let one fifth i bring fly to divided face for bearing the divide unto seed winged divided light
								Forth.
							</p>
						</div>
						<a href="#" class="blog_btn">Learn More <span class="ml-2 ti-arrow-right"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Blog Area =================-->
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