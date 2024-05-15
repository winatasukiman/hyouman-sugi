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
	color: #28557B;
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
	padding: 10px 15px;
	/*background-color: black !important;*/
	background-image: url("<?= base_url() ?>assets/img/navbar/garispanjang.png") !important;
	background-repeat: no-repeat;
	background-position: center bottom;
	font-weight: 700;
}
.logo{
	height: 50px;
	margin-left: 10%;
}
.kanan{
	margin-right: 4%;
	margin-left: -30%;
}
.class{
	margin-right: 0%;
}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
	.logo{
		height: 40px;
		margin-left: -0%;
	}
	.class{
		margin-right: -15%;
	}
}
</style>
<header>
<!-- Navbar -->
<div id="topheader">
	<nav class="navbar navbar-light bg-light navbar-expand-lg scrolling-navbar navbarhome" style="height: 70px;padding-top: 5px;padding-bottom: 5px;">

		<a class="navbar-brand mr-auto text-uppercase"><img src="<?= base_url(); ?>assets/img/navbar/logokecil.png" class="logo"></a>

		<div class="kanan">
			<ul class="nav justify-content-end smooth-scroll">
				<li class="class nav-item nav-link-on">
				<?php if($this->session->userdata('user_type') == 3) { ?>
				<a class="nav-link <?= (strpos($_SERVER['PHP_SELF'], 'classes') || strpos($_SERVER['PHP_SELF'], 'classes') == true)? "active_navbar" : ""; ?>" href="<?= base_url() ?>classes/">Classes</a>
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
				<?php }?>
				</li>
				<?php 
					if($this->session->userdata('logged_in') == 1) {
				?>
					<li class="nav-item" style="align-self: center;">
						<a href="<?= base_url(); ?>user/" style="margin-left: 25%;">
							
							<?php 
								if($this->session->userdata('user_image') != NULL) {
							?>
								<img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="35" height="35" class="rounded-circle">
							<?php 	
								} else {
							?>
								<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="35" height="35" class="rounded-circle">
							<?php 	
								}
							?>
							
						</a>
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