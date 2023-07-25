<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="<?= base_url('asset/AdminLTE/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Kebun Raya Kuningan</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Selamat Datang, Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('Admin/cDashboard') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDashboard') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>


				<li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData') {
														echo 'menu-open';
													}  ?>">
					<a href="<?= base_url('Admin/cKelolaData') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-archive"></i>
						<p>
							Data Master
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/kategori') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'kategori') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Kategori Tiket</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/tiket') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'tiket') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Tiket</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/diskon') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'diskon') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Diskon</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('Admin/cKelolaData/user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'user') {
																									echo 'active';
																								}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>User</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('Admin/cTransaksi') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksi') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-shopping-cart"></i>
						<p>
							Transaksi Wisatawan
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cTransaksiLangsung') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cTransaksiLangsung') {
																								echo 'active';
																							}  ?>">
						<i class="nav-icon fas fa-shopping-bag"></i>
						<p>
							Transaksi Langsung
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('Admin/cFavorite') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cFavorite') {
																						echo 'active';
																					}  ?>">
						<i class="nav-icon fas fa-user-check"></i>
						<p>
							Favorite Wisatawan
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cAuth/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>SignOut</p>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>