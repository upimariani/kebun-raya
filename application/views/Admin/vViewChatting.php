<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Pesan Wisatawan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pesan</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<div class="col-md-12">
					<!-- MAP & BOX PANE -->

					<!-- DIRECT CHAT -->
					<div class="card direct-chat direct-chat-primary">
						<div class="card-header">
							<h3 class="card-title">Direct Chat</h3>

							<div class="card-tools">
								<span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
								<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
								</button>
								<button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
									<i class="fas fa-comments"></i>
								</button>
								<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<?php
							foreach ($view_chatting as $key => $value) {

								if ($value->pelanggan_send != null) {
							?>
									<div class="direct-chat-messages">
										<!-- Message. Default to the left -->
										<div class="direct-chat-msg">
											<div class="direct-chat-infos clearfix">
												<span class="direct-chat-name float-left"><?= $value->nama_wisatawan ?></span>
												<span class="direct-chat-timestamp float-right"><?= $value->time ?></span>
											</div>
											<img class="direct-chat-img" src="<?= base_url('asset/AdminLTE/') ?>dist/img/user1-128x128.jpg" alt="message user image">

											<div class="direct-chat-text">
												<?= $value->pelanggan_send ?>
											</div>
										</div>

									<?php
								} else if ($value->staff_send != null) {
									?>

										<div class="direct-chat-msg right">
											<div class="direct-chat-infos clearfix">
												<span class="direct-chat-name float-right">Admin</span>
												<span class="direct-chat-timestamp float-left"><?= $value->time ?></span>
											</div>
											<!-- /.direct-chat-infos -->
											<img class="direct-chat-img" src="<?= base_url('asset/AdminLTE/') ?>dist/img/user3-128x128.jpg" alt="message user image">
											<!-- /.direct-chat-img -->
											<div class="direct-chat-text">
												<?= $value->staff_send ?>
											</div>
											<!-- /.direct-chat-text -->
										</div>
										<!-- /.direct-chat-msg -->
									<?php
								}
									?>
								<?php
							}
								?>
									</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<form action="<?= base_url('Admin/cDashboard/kirim_pesan/' . $id_wisatawan) ?>" method="post">
								<div class="input-group">
									<input type="text" name="message" placeholder="Type Message ..." class="form-control" required>
									<span class="input-group-append">
										<button type="submit" class="btn btn-primary">Send</button>
										<a href="<?= base_url('Admin/cDashboard') ?>" class="btn btn-danger">Kembali</a>
									</span>
								</div>
							</form>
						</div>
					</div>
					<!--/.direct-chat -->
				</div>

			</div>
			<!-- /.row -->
		</div>
		<!--/. container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->