<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
<style>

.navbar-toggler{
	margin-right:30px;
}
.navbar-collapse{
	margin-right:5px;
}
.navbar {
	z-index: 1050;
	position: fixed;
	/*background-image: url("<?= base_url() ?>assets/img/bgheader2.svg") !important;*/
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	width: 100%;
	font-family: 'Quicksand', sans-serif;
	font-weight: 400;
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
	color: #28557B !important;
	font-weight: 700;
}
.navbar-collapse {
	justify-content: flex-end;
}
.active_navbar {
	color: #28557B !important;
	margin: 0!important;
	padding: 10px 15px;
	/*background-color: black !important;*/
	background-image: url("<?= base_url() ?>assets/img/navbar/garispanjang.png") !important;
	background-repeat: no-repeat;
	background-position: center bottom;
	font-weight: 700;
}
</style>
<header>
<!-- Navbar -->
<div id="topheader">
	<nav class="navbar navbar-light bg-light navbar-expand-lg scrolling-navbar navbarhome" style="height: 70px;padding-top: 5px;padding-bottom: 5px;">
		<a class="navbar-brand mr-auto text-uppercase" href="<?= base_url(); ?>home/"><img src="<?= base_url(); ?>assets/img/navbar/logokecil.png" style="height: 50px;margin-left: 35%;"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="nav navbar-nav justify-content-end ml-auto smooth-scroll">
				<li class="nav-item nav-link-on" style="align-self: center;">
					<a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'Admin') || strpos($_SERVER['PHP_SELF'], 'Admin') == true)? "active_navbar" : ""; ?>" href="<?= base_url() ?>Admin/">admin</a>
					<!--<?php 
						if($this->session->userdata('is_verified') == 1) {
					?>
					<a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'classes') || strpos($_SERVER['PHP_SELF'], 'classes') == true)? "active_navbar" : ""; ?>" href="<?= base_url() ?>classes/">Classes</a>
					<?php 
						}else if($this->session->userdata('is_verified') == 0) {
					?>
					<a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'classes') || strpos($_SERVER['PHP_SELF'], 'classes') == true)? "active_navbar" : ""; ?>" href="<?= base_url() ?>user/edit_profile" onclick="verified_email()">Classes</a>
					<script>
					function verified_email(){
						alert("Please verified your email");
					}
					</script>
					<?php 
						}
					?>-->
				</li>
				<?php 
					if($this->session->userdata('logged_in') == 1) {
				?>
					<li class="nav-item avatar dropdown" style="align-self: center;">
						<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							
							<?php 
								if($this->session->userdata('user_image') != NULL) {
							?>
								<img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="50" height="50" class="rounded-circle">
							<?php 	
								} else {
							?>
								<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="35" height="35" class="rounded-circle">
							<?php 	
								}
							?>
							
						</a>

						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?= base_url(); ?>user/"><img src="<?= base_url() ?>assets/img/profile/profile.png" class="img-fluid" alt="Responsive image">&nbsp;Profile</a>
							<a class="dropdown-item" href="<?= base_url(); ?>user/"><img src="<?= base_url() ?>assets/img/profile/report.png" class="img-fluid" alt="Responsive image">&nbsp;Report</a>
							<a class="dropdown-item" href="<?= base_url(); ?>user/"><img src="<?= base_url() ?>assets/img/profile/theme.png" class="img-fluid" alt="Responsive image">&nbsp;Theme</a>
							<a class="dropdown-item" href="<?= base_url(); ?>user/"><img src="<?= base_url() ?>assets/img/profile/help.png" class="img-fluid" alt="Responsive image">&nbsp;Help</a>
							<a class="dropdown-item" href="<?= base_url()?>login/logout">
									<img src="<?= base_url() ?>assets/img/profile/logout.png" class="img-fluid" alt="Responsive image">&nbsp;Log Out
							</a>
						</div>
					</li>
				<?php 	
					} else {
				?>
				<li class="nav-item" style="align-self: center;">
					<a class="nav-link" href="<?= base_url(); ?>login/">
						Masuk/Daftar
					</a>
				</li>
				<?php 	
					}
				?>
			</ul>
		</div>
	</nav>
</div>
</header>
<!--Navbar-->