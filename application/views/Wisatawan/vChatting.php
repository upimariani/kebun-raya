<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content d-md-flex justify-content-between align-items-center">
				<div class="mb-3 mb-md-0">
					<h2>Chatting</h2>
					<p>Very us move be blessed multiply night</p>
				</div>
				<div class="page_link">
					<a href="#">Home</a>
					<a href="#">Chatting</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">

		<div class="tab-content" id="myTabContent">


			<div class="row">
				<div class="col-lg-6">
					<?php
					if ($this->session->userdata('success')) {
					?>
						<div class="alert alert-success" role="alert">
							<?= $this->session->userdata('success') ?>
						</div>
					<?php
					}
					?>
					<div class="comment_list">
						<?php
						foreach ($chatting as $key => $value) {

							if ($value->pelanggan_send != null) {
						?>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="<?= base_url('asset/eiser-master/') ?>img/instagram/i6.jpg" alt="" />
										</div>
										<div class="media-body">
											<h4><?= $value->nama_wisatawan ?></h4>
											<h5><?= $value->time ?></h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>
										<?= $value->pelanggan_send ?>
									</p>
								</div>

							<?php
							} else if ($value->staff_send != null) {
							?>

								<div class="review_item reply">
									<div class="media">
										<div class="d-flex">
											<img src="<?= base_url('asset/eiser-master/') ?>img/instagram/i2.jpg" alt="" />
										</div>
										<div class="media-body">
											<h4>Admin</h4>
											<h5><?= $value->time ?></h5>
											<a class="reply_btn" href="#">Reply</a>
										</div>
									</div>
									<p>
										<?= $value->staff_send ?>
									</p>
								</div>
							<?php
							}
							?>
						<?php
						}
						?>



					</div>
				</div>
				<div class="col-lg-6">
					<div class="review_box">
						<h4>Post a message</h4>
						<form class="row contact_form" action="<?= base_url('wisatawan/cChatting/insert') ?>" method="post" id="contactForm" novalidate="novalidate">

							<div class="col-md-12">
								<div class="form-group">
									<textarea rows="7" class="form-control" name="message" id="message" rows="1" placeholder="Message..."></textarea>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<button type="submit" value="submit" class="btn submit_btn">
									Send
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!--================End Product Description Area =================-->