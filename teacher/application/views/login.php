<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/f8eb04634c.js" crossorigin="anonymous"></script>
<!--Main layout-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/f8eb04634c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/loginregister/loginregister.css">
<main>
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div class="row" style="height:100vh;">
	<div class="col-md-5 col-12 div_bg">
		<img src="<?= base_url()?>assets/img/signup/bgloginnew2.png" alt="Hyouman login" class="img_bg">
	</div>
	<div class="col-md-7 col-12 div_input d-flex justify-content-center align-items-center">
		<!-- <form> -->
		<?= form_open('login/login', 'id="form_login"') ?>
			<p class="login mb-0">Log In</p>
			<p class="login_marks">Welcome to SUGI, your Ultimate Teaching Partner!</p>
			<!-- Email -->
			<div class="form-group">
				<label>Email</label>
				<div class="input-group">
					<input
						type="text" 
						placeholder="Email"
						id="email" 
						name="email" 
						class="form-control" />
				</div>
				<div class="error mt-1" id="div_error_email">
					<span id='error_email'></span>
				</div>
			</div>
			<!-- Password -->
			<div class="form-group">
				<label>Password</label>
				<div class="wrapper">
					<input type="password" pattern="[0-9]*" inputmode="numeric" placeholder="******" name="password" id="password" maxlength="6" class="form-control"/>
					<span><i toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i></span>
				</div>
				<div class="error mt-1" id="div_error_password">
					<span id='error_password'></span>
				</div>
			</div>
			<div class="d-flex justify-content-end">
				<a href="<?= base_url() ?>login/forgot_password/">I forgot my password</a>
			</div>

			<!-- Notif -->
			<?php if ($this->session->flashdata('category_success')) { ?>
				<div class="alert hide alert-success mt-3"> <?= $this->session->flashdata('category_success') ?> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('category_error')) { ?>
				<div class="alert hide alert-danger mt-3"> <?= $this->session->flashdata('category_error') ?> </div>
			<?php } ?>
			<button class="mt-3" type="submit" id="login">Sign In</button>
			<p class="text_register mt-3">If <b style="color: #3D6586;font-weight: 500;">your school is subscribed</b> but you don't have an account yet, don't worry!
			<a href="<?= base_url(); ?>Register/">Register Here</a>!</p>
			<p class="text_register mt-3">If <b style="color: #3D6586;font-weight: 500;">your school is not subscribed</b> yet, <a href="https://wa.me/+6281280007961" target="_blank">Contact Us</a> now!</p>

		<?= form_close() ?>
	</div>
</div>
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";	
</script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>
</main>
<!--Main layout-->