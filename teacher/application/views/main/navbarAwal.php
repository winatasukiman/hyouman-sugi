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

.nav-link,
.navbar-brand {
	color: #fff;
	cursor: pointer;
}
.nav-link {
	margin: 0 1.5em !important;
}
.nav-link:hover {
	color: #000;
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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T7TX4GV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- <body class="fixed-sn mdb-skin"> -->
<body class="fixed-sn mdb-skin h-100">
<!-- <body class="fixed-sn deep-purple-skin"> -->
<!-- <body class="mdb-skin bg-skin-lp"> -->

<!-- Main Navigation -->
<header>

<!-- Navbar -->
<div id="topheader">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark scrolling-navbar navbarhome">
			<a class="navbar-brand mr-auto text-uppercase" href="<?= base_url(); ?>home/"><img src="<?= base_url(); ?>assets/img/icon/logo_desktop.svg"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav justify-content-end ml-auto smooth-scroll">

					<!-- <?php if ($page == 'home') {echo 'active';} ?> -->
					<!-- <li class="nav-item nav-link-on" style="align-self: center;">-->
						<!-- <a class="nav-link nav_home <?= (strpos($_SERVER['PHP_SELF'], 'home') == true)? "active" : ""; ?>" href="<?= base_url() ?>home/">Home</a>-->
						<!-- nav-link-on -->
					<!-- </li> -->
				
				<!-- Turnamen -->
				<li class="nav-item nav-link-on" style="align-self: center;">
					<a class="nav-link nav_tourn <?= (strpos($_SERVER['PHP_SELF'], 'tournament') || strpos($_SERVER['PHP_SELF'], 'tourn_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>tournament/">Turnamen</a>
				</li>
				<!-- <?php 
					if ($this->session->userdata('user_id') == NULL) { // if not login yet
				?> 
					<li class="nav-item nav-link-on" style="align-self: center;" >
						<a class="nav-link nav_tourn <?= (strpos($_SERVER['PHP_SELF'], 'tournament') || strpos($_SERVER['PHP_SELF'], 'tourn_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>login/" onclick="login_first()">Turnamen</a>
					</li>
					<script type='text/javascript'>
						function login_first() {
							alert('Please login first!');
						}
					</script>
				<?php 
					}
					else { // if logged in
						if($this->session->userdata('user_name') == NULL) {
						
				?>
						<li class="nav-item nav-link-on" style="align-self: center;" >
							<a class="nav-link nav_tourn <?= (strpos($_SERVER['PHP_SELF'], 'tournament') || strpos($_SERVER['PHP_SELF'], 'tourn_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>user/edit_profile/" onclick="add_username_first()">Turnamen</a>
						</li>
						<script type='text/javascript'>
							function add_username_first() {
								alert('Sorry, add your user_name first before go to tournament!');
							}
						</script>
				<?php 	
						} else {
				?>
						<li class="nav-item nav-link-on" style="align-self: center;">
							<a class="nav-link nav_tourn <?= (strpos($_SERVER['PHP_SELF'], 'tournament') || strpos($_SERVER['PHP_SELF'], 'tourn_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>tournament/">Turnamen</a>
						</li>
				<?php
						} 	
					}
				?> -->

				<!-- <li class="nav-item nav-link-on" style="align-self: center;">
					<a class="nav-link nav_news <?= (strpos($_SERVER['PHP_SELF'], 'news') || strpos($_SERVER['PHP_SELF'], 'news_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>news/">Berita</a>
				</li> -->
				
				<!-- Hadiah -->
				<li class="nav-item nav-link-on" style="align-self: center;">
					<a class="nav-link nav_store <?= (strpos($_SERVER['PHP_SELF'], 'store') || strpos($_SERVER['PHP_SELF'], 'store_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>store/">Hadiah</a>
				</li>
					
				<!-- Poin -->
				<?php 
					if ($this->session->userdata('user_id') == NULL) { // if not login yet
				?>
					<!-- <li class="nav-item nav-link-on" style="align-self: center;">
						<a class="nav-link nav_points <?= (strpos($_SERVER['PHP_SELF'], 'points') == true)? "active" : ""; ?>" href="<?= base_url() ?>login/" onclick="login_first()">Poin</a>
					</li> -->
				<?php 
					}
					else { // if logged in
						if($this->session->userdata('user_name') == NULL) {
				?>
					<li class="nav-item nav-link-on" style="align-self: center;" >
						<a class="nav-link nav_tourn <?= (strpos($_SERVER['PHP_SELF'], 'tournament') || strpos($_SERVER['PHP_SELF'], 'tourn_details') == true)? "active" : ""; ?>" href="<?= base_url() ?>user/edit_profile/" onclick="add_username_first()">Poin</a>
					</li>
				<?php
						} else{
				?>
					<li class="nav-item nav-link-on" style="align-self: center;">
						<a class="nav-link nav_points <?= (strpos($_SERVER['PHP_SELF'], 'points') == true)? "active" : ""; ?>" href="<?= base_url() ?>points/">Poin</a>
					</li>
				<?php
						}
					}
				?>  
					<?php 
						if($this->session->userdata('logged_in') == 1) {
					?>
					<!-- <div class="collapse navbar-collapse" id="navbar-list-4"> -->
						<!-- <ul class="navbar-nav"> -->
							<li class="nav-item avatar dropdown" style="align-self: center;">

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
						<!-- </ul> -->
					<!-- </div> -->
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



					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Dropdown
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link disabled" href="#">Disabled</a>
					</li> -->

				</ul>

				<!-- <ul class="navbar-nav ml-auto nav-flex-icons">
					<li class="nav-item">
						<a class="nav-link waves-effect waves-light">1
							<i class="fas fa-envelope"></i>
						</a>
					</li>
					<li class="nav-item avatar dropdown">
						<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
							<img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0" height="35" alt="avatar image">
						</a>
						<div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
						aria-labelledby="navbarDropdownMenuLink-55">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
				</ul> -->

				<!-- <div>
					<a href="" data-toggle="modal" data-target="#modalLoginForm" style="color: white;">Login</a>
					&ensp;/&ensp;
					<a href="register.php">Signup</a>
				</div> -->

			</div>
	</nav>
</div>
<!-- /Navbar -->


<!--Modal Login-->
	<div class="modal modal-signin fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-dark p-3">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-bold mt-3">Login</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">&times;</button>
				</div>
				<div class="modal-body mx-5">
					<div class="md-form mb-4">
						<!-- <i class="fas fa-envelope prefix grey-text"></i>
						<input type="text" id="login_phone" name="login_phone" class="form-control validate">
						<label data-error="wrong" data-success="right" for="login_phone" class="grey-text">Phone Number</label> -->
						<input
						    	type="text"
						    	class="form-control validate"
						    	placeholder="Phone Number *"
						    	style="color: black; margin-bottom: 0;"
				            	name="login_phone"
						    	id="login_phone" required/>

						<!-- <div class="input-group">
					    	<input
						    	type="text"
						    	class="form-control validate"
						    	placeholder="Phone Number *"
						    	style="color: black; margin-bottom: 0;"
				            	name="login_phone"
						    	id="login_phone" required/>

					    	<div class="input-group-append">
					    		<span class="input-group-text">
									<i toggle="#register_password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
								</span>
							</div>
						</div> -->
					</div>

					<div class="md-form mb-3">
						<!-- <i class="fas fa-lock prefix grey-text"></i>
						<input type="password" id="login_password" name="login_password" class="form-control validate">
						<label data-error="wrong" data-success="right" for="login_password" class="grey-text">Your password</label>
						<span id="login_password_eye" class="fa fa-eye-slash field-icon" aria-hidden="true" onClick="viewPassword()"></span> -->

						<div class="input-group">
					    	<input
						    	type="password"
						    	class="form-control validate"
						    	placeholder="Password *"
						    	style="color: black; margin-bottom: 0;"
				            	name="login_password"
						    	id="login_password" required/>

					    	<div class="input-group-append">
					    		<span class="input-group-text">
									<i toggle="#login_password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
								</span>
							</div>
						</div>
					</div>

					<div class="d-flex mb-3">
						<a href="">Forgot password?</a>
					</div>

					<!-- <div class="d-flex justify-content-around">
						<div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="loginRemember">
								<label class="custom-control-label" for="loginRemember">Remember me</label>
							</div>
						</div>
						<div>
							<a href="">Forgot password?</a>
						</div>
					</div>
 -->

					<div class="modal-footer d-flex justify-content-center mb-3">
						<button class="btn btn-secondary" type="submit">Login</button>
					</div>

					<div class="text-center">
						<a href="<?= base_url(); ?>register/">
							<p>Not a member yet?
								<b><u>Register</u></b>
							</p>
						</a>

						<!-- <p>or sign in with:</p>

						<a href="#" class="mx-2" role="button">
							<i class="fab fa-facebook-f light-blue-text"></i>
						</a>
						<a href="#" class="mx-2" role="button">
							<i class="fab fa-twitter light-blue-text"></i>
						</a>
						<a href="#" class="mx-2" role="button">
							<i class="fab fa-linkedin-in light-blue-text"></i>
						</a>
						<a href="#" class="mx-2" role="button">
							<i class="fab fa-github light-blue-text"></i>
						</a> -->
					</div>

				</div>
			</div>
		</div>
	</div>
<!-- /.Modal Login -->

</header>
<!-- /Main Navigation
