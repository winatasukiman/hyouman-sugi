<body>
<style>
.navbar {
	/*background:#6ab446;*/
	z-index: 1050;
	position: fixed;
	background-image: url("<?= base_url() ?>assets/img/bgheader2.svg") !important;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	width: 100%;
}
.menu .menu-list {
	background-image: url("<?= base_url() ?>assets/img/bgheader2.svg") !important;
}
.nav-link,
.navbar-brand {
	color: #fff;
	cursor: pointer;
}
.nav-link {
	margin: 0 1.5em !important;
}
.nav-link:hover {
	color: white;
}
.navbar-collapse {
	justify-content: flex-end;
}
 /*.navbar-dark .nav-link-on.active {*/
.navbar-dark .nav-item > .nav-link.active {
	color: white !important;
	margin: 0!important;
	padding: 20px 15px;
	background-color: #466787 !important;
	background-image: url("<?= base_url() ?>assets/img/turnamen/lineheader.svg") !important;
	background-repeat: no-repeat;
	background-position: center bottom;
}
</style>
<!-- partial:index.partial.html -->
<header class="header">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar navbarhome">
	<a class="navbar-brand mr-auto text-uppercase" href="<?= base_url(); ?>home/"><img src="<?= base_url(); ?>assets/img/icon/logo_desktop.svg"></a>
	<div class="toggle navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="toggle-btn"></span>
	</div>
    <div class="container">
      
	  <div class="menu">
			<ul class="menu-list">
			
			<!-- Turnamen -->
			<li class="menu-item nav-item nav-link-on" style="align-self: center;">
				<a class="nav-link nav_tourn <?= (strpos($_SERVER['PHP_SELF'], 'tournament') || strpos($_SERVER['PHP_SELF'], 'tourn_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>tournament/">Turnamen</a>
			</li>
			
			<!-- Hadiah -->
			<li class="menu-item nav-item nav-link-on" style="align-self: center;">
				<a class="nav-link nav_store <?= (strpos($_SERVER['PHP_SELF'], 'store') || strpos($_SERVER['PHP_SELF'], 'store_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>store/">Hadiah</a>
			</li>
				
			<!-- Poin -->
			<?php 
				if ($this->session->userdata('user_id') == NULL) { // if not login yet
			?>
			<?php 
				}
				else { // if logged in
					if($this->session->userdata('user_name') == NULL) {
			?>
				<li class=" menu-itemnav-item nav-link-on" style="align-self: center;" >
					<a class="nav-link nav_tourn <?= (strpos($_SERVER['PHP_SELF'], 'tournament') || strpos($_SERVER['PHP_SELF'], 'tourn_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>user/edit_profile/" onclick="add_username_first()">Poin</a>
				</li>
			<?php
					} else{
			?>
				<li class="menu-item nav-item nav-link-on" style="align-self: center;">
					<a class="nav-link nav_points <?= (strpos($_SERVER['PHP_SELF'], 'points') == true)? "active" : ""; ?>" href="<?= base_url() ?>points/">Poin</a>
				</li>
			<?php
					}
				}
			?>  
				<?php 
					if($this->session->userdata('logged_in') == 1) {
				?>
						<li class="menu-item nav-item avatar dropdown" style="align-self: center;">

							<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								
								<?php 
									if($this->session->userdata('user_image') != NULL) {
								?>

								<img src="<?= base_url() ?>assets/uploads/user/<?= $this->session->userdata('user_image') ?>" width="30" height="30" class="rounded-circle">&nbsp;

								<?php 	
									} else {
								?>

								<img src="<?= base_url() ?>assets/img/icon/user-90.png" width="30" height="30" class="rounded-circle">&nbsp;

								<?php 	
									}
								?>
								
							</a>

							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="<?= base_url(); ?>user">Profile</a>
								<a class="dropdown-item" 
									href="<?php echo site_url('login/logout'); ?>">
										Log Out
								</a>
							</div>
						</li>   
				<?php 	
					} else {
				?>
				<li class="menu-item nav-item" style="align-self: center;">
					<a class="nav-link" href="<?= base_url(); ?>login/">
						Masuk/Daftar
					</a>
				</li>
				<?php 	
					}
				?>

			</ul>

		</div>
    </div>
  </nav>
</header>
<!-- partial -->
<script src="<?= base_url(); ?>/assets/js/scriptNavbar.js"></script>
</body>
</html>
