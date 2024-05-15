<!--Main layout-->
<main>
<style>
	.divkanan{
		padding:3% 4.5% 0% 4%;
	}
	.login {
		color: #28557B;
		font-size: 40px;
		font-weight: 700;
		margin-bottom: 40px;
		font-family: Quicksand;
	}
	.register{
		margin-top:10px;
		font-family: Quicksand;
	}
	.buatakun {
		font-size: 12px;
		font-weight: 400;
	}
	.new_to_hyouman,.forgot_password {
		font-size: 12px;
		font-weight: 300;
	}
	.forgot_password {
		margin-left:10px;
		color:#28557B;;
		margin-top: 10px;
		font-family: Quicksand;
		font-weight: 500;
	}
	.new_to_hyouman{
		color:  #707070;
	}
	
	a:hover { color: #28557B; font-weight: 700; }
	
	#loading-overlay {
		position: absolute;
		min-height: 100% !important;
		width: 100%;
		height: 100%;
		overflow: auto;
		left: 0;
		top: 0;
		display: none;
		align-items: center;
		background-color: #000;
		z-index: 999;
		opacity: 0.5;
	}
	#loading-overlay-modal {
		position: absolute;
		min-height: 100% !important;
		width: 100%;
		height: 100%;
		overflow: auto;
		left: 0;
		top: 0;
		display: none;
		align-items: center;
		background-color: #000;
		z-index: 999;
		opacity: 0.5;
	}

	.loading-icon{ 
		position:absolute;
		border-top:2px solid #fff;
		border-right:2px solid #fff;
		border-bottom:2px solid #fff;
		border-left:2px solid #767676;
		border-radius:25px;
		width:25px;
		height:25px;
		margin:0 auto;
		position:absolute;
		left:50%;
		margin-left:-20px;
		top:50%;
		margin-top:-20px;
		z-index:500;
		-webkit-animation:spin 1s linear infinite;
		-moz-animation:spin 1s linear infinite;
		animation:spin 1s linear infinite;
	}
	@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
	@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
	@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
	/* medium screen - for TABLET 991px or less */
	@media screen and (max-width: 991px) {
	}

	/* medium screen - for TABLET 767px or less */
	@media screen and (max-width: 767px) {
	}
	/* small screen - for MOBILE 414px or less  */
	@media screen and (max-width: 414px) { 
		.divkanan{
		padding:15% 3% 0% 3%;
		}
		hr{
			display:none;
		}
		.new_to_hyouman{
			padding-top:26px;
		}
		.register{
			margin-top:-10px;
		}
		img{
			display: none;
		}
	}
	
</style>
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div class="main" style="margin-top:-110px;">
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
							class="form-control" />
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
				<?php if(False) { ?>
				<div class="mt-2 text-center" style="margin-bottom: 35px;">
					<hr align="left" style="border: 1px solid  silver;width:170px;margin-left:-15px;margin-top:35px;">
						<p class="new_to_hyouman" style="margin-top:-25px;">
							New to Hyouman ?
						</p>
					<hr align="right" style="border: 1px solid  silver;width:170px;margin-top:-26px;margin-right:-15px;">
				</div>
				
				<div class="row p-1 register">
					<a class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center" 
					href="<?= base_url(); ?>Register/">Create Account</a>
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