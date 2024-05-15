<!--Main layout-->
<main>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/login/login.min.css">
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div class="main">
	<div class="row">
		<div class="img col-md-6">
			<img src="<?= base_url() ?>assets/img/signup/bgawal.png" class="img-fluid" alt="Responsive image" style="width: 100%">
		</div>
		<div class="col-12 col-md-6 divkanan">
			<!-- <form> -->
			<?= form_open('login/login', 'class="px-5" id="form_login"') ?>
				<p class="login mt-5 text-center">Login</p>
				<!-- Email -->
				<div class="form-group mb-3">
					<div class="input-group" style="margin-bottom: 50px;">
						<input
							type="text" 
							placeholder="Email"
							id="email" 
							name="email" 
							class="form-control"/>
					</div>
					<div class="text-center error" id="div_error_email" style="margin-top: -28px;">
						<span id='error_email'></span>
					</div>
				</div>

				<!-- Password -->
				<div class="form-group mb-2">
					<div class="input-group">
						<input 
							type="password" 
							pattern="[0-9]*" inputmode="numeric"
							placeholder="Password" 
							style="color: black;" 
							name="password"
							id="password" 
							class="form-control"/>

						<div class="input-group-append">
							<span class="input-group-text">
								<i toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
							</span>
						</div> 
					</div>

					<div class="text-center error" id="div_error_password"style="margin-top: 15px;">
						<span id='error_password'></span>
					</div>
				</div>

				<div class="d-flex mb-2">
					<p style="font-size: 12px;margin-top: 10px;margin-left: 15px;">Forget Password ?</p><a href="<?= base_url() ?>login/forgot_password/" class="forgot_password">Click Here</a>
				</div>

				<!-- Notif -->
				<?php if ($this->session->flashdata('category_success')) { ?>
					<div class="alert hide alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
				<?php } ?>
				<?php if ($this->session->flashdata('category_error')) { ?>
					<div class="alert hide alert-danger"> <?= $this->session->flashdata('category_error') ?> </div>
				<?php } ?>
				
				<!-- Button -->
				<div class="row p-1">
					<button 
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center" 
						type="submit"
						id="login"
						style="background-color: #002448;border: none;border-radius: 8px;height:45px;font-family: Quicksand;">Sign In</button>
				</div>

				<div class="mt-2 text-center" style="margin-bottom: 35px;">
					<hr align="left" style="border: 1px solid  silver;width:25%;margin-left:-15px;margin-top:35px;">
						<p class="new_to_hyouman" style="margin-top:-25px;">
							New to Hyouman ?
						</p>
					<hr align="right" style="border: 1px solid  silver;width:25%;margin-top:-26px;margin-right:-15px;">
				</div>
				
				<div class="row p-1 register">
					<a class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center" 
					href="<?= base_url(); ?>Register/">Create Account</a>
				</div>
				<?php if( isset($link_vertu)) { ?>
				<div class="row p-1 register">
					<a class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center" 
					href="http://innovatorscamp.virtu.co.id/">Virtual World</a>
				</div>
				<?php } ?>
			<?= form_close() ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";	
</script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>
</main>
<!--Main layout-->