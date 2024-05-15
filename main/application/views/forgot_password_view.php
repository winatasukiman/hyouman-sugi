<!--Main layout-->
<main>
<style>
	body {
	  background: url('<?= base_url() ?>/assets/img/bglogin.svg') no-repeat center center fixed;
	  -webkit-background-size: cover;
	  -moz-background-size: cover;
	  background-size: cover;
	  -o-background-size: cover;
	}
	
	.kotaklogin {
		background: url('<?= base_url() ?>/assets/img/kotakputihlogin.svg') no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}
	
	.masuk, .notelp, .katasandi, .lupakatasandi, .belumpunyaakun, .daftar, .btnmasuk, {
		color: white;
		/*font-family: 'Montserrat';*/
	}
	.form-control, .input-group-text{
		/*font-family: 'Montserrat';*/
		font-size: 13px;
		font-weight: 400;
	}
	.btnmasuk {
		font-size: 12px;
		font-weight: 400;
	}
	.masuk {
		color: #002448;
		font-size: 30px;
		font-weight: 700;
	}
	
	.notelp, .katasandi, .lupakatasandi, .belumpunyaakun{
		color: #707070;
		font-size: 12px;
		font-weight: 200;
	}
	
	.daftar {
		color: #FFB24A;
		font-size: 12px;
		font-weight: 400;
	}

	a:hover {
	  color:  #707070;
	}
	#forgot_password{
		margin: 65px 0 0 0;
	}
	.add_shadow {
		box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2);
	}
	#error_phone_number, #error_password, #error_confirm_password {
		font-size: 13px;
		font-weight: 400;
	}
	.input-group>.form-control:focus {
		z-index: 0;
	}
    .main {
        size:50vw;
    }
</style>
<!--Section: Forgot Password-->
<section id="forgot_password">

	<div class="main p-5">
	<div class="container text-left" style="margin-top:10px;">
		<div class="row add_shadow">
			<div class="col-12 col-md-12 kotaklogin">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('category_success')) { ?>
					<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p> </div>
				<?php } ?>
				<?php if ($this->session->flashdata('category_error')) { ?>
					<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
				<?php } ?>
			</div>
					<?php if ($flag == 1) { ?>
				<?= form_open('login/request_forgot_password', 'class="px-5" id="form_forgot_password"') ?>
				
					<p class="h4 mt-5 mb-4down masuk">Lupa Kata Sandi</p>
				  	<!-- Phone -->
				    <div class="form-group mb-3up">
						<p class="notelp mb-2">Email</p>
					    <div class="input-group">
							<div class="input-group-prepend">
					    		<span class="input-group-text" style="font-size: 13px; font-weight: 400;">
									<i class="fas fa-envelope"></i>
					    		</span>
					    	</div>
					    	<input
					    		type="email" 
					    		placeholder="hyouman@hyouman.com" 
						    	style="color: black;" 
					    		name="email" 
					    		id="email" 
					    		class="form-control" required/>
					    </div>
					    <div class="text-center error" id="div_error_email">
					    	<span id='error_email'></span>
			            </div>
		            </div>
					<?php } else if ($flag == 2) { ?>
				<?= form_open('login/change_password', 'class="px-5" id="form_forgot_password"') ?>
				
					<p class="h4 mt-5 mb-4down masuk">Change Password</p>
				  	<!-- Password -->
				    <div class="form-group mb-3up">
						<p class="katasandi mb-2">Kata Sandi ( 6 Digit Angka )</p>
				    	<div class="input-group">
					    	<input 
						    	type="password" 
								pattern="[0-9]*" inputmode="numeric"
						    	placeholder="Masukkan kata sandi di sini" 
						    	style="color: black;" 
				            	name="password"
						    	id="password" 
						    	class="form-control" required/>

							<div class="input-group-append">
					    		<span class="input-group-text">
									<i toggle="#password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
								</span>
							</div> 
						</div>

				    	<div class="text-center error" id="div_error_password">
					    	<span id='error_password'></span>
			            </div>
				    </div>

				    <!-- Confirm Password -->
				    <div class="form-group mb-3up">
						<p class="katasandi mb-2">Ulangi Kata Sandi</p>
				    	<div class="input-group">
						    <input 
						    	type="password" 
								pattern="[0-9]*" inputmode="numeric"
						    	placeholder="Masukkan kata sandi di sini" 
						    	style="color: black;" 
				            	name="confirm_password"
						    	id="confirm_password" 
						    	class="form-control" required/>

							<div class="input-group-append">
					    		<span class="input-group-text">
									<i toggle="#confirm_password" class="fa fa-fw fa-eye-slash field-icon toggle-password"></i>
								</span>
							</div> 
						</div>
					    
			            <div class="text-center error" id="div_error_confirm_password">
					    	<span id='error_confirm_password'></span>
			            </div>
				    </div>
					<?php } ?> 
					<?php if ($flag == 1) { ?>
					<div class="row p-1">
					<button 
						class="btn btn-secondary btn-block btnmasuk" 
						type="submit" 
						id="forgot_button_submit" 
						name="forgot_button_submit"
						style="background-color: #002448;border: none;border-radius: 10px;">Lanjut</button>
					</div>
					<div class="d-flex mb-3up mt-2">
					<div class="d-flex mb-5 mt-0">
					<div class="d-flex mb-5">
					<div class="d-flex mb-5">
						<a href="<?= base_url() ?>login/" class="lupakatasandi">Ingat Kata Sandi?</a>
					</div>
					</div>
					</div>
					</div>
					<?php } else if ($flag == 2) { ?>
					<!-- Button -->
					<div class="row p-1 mb-5">
						<button 
							class="btn btn-secondary btn-block btnmasuk" 
							type="submit" 
							id="forgot_button_submit" 
							name="forgot_button_submit"
							style="background-color: #002448;border: none;border-radius: 10px;">Ganti Kata Sandi</button>
					</div>
					<?php if (isset($unique_code)) { ?>
					<input type="hidden" name="unique_code" id="unique_code" value= '<?php echo $unique_code ?>'  />
					<?php } ?>
					<?php } ?> 

				<?= form_close() ?>
			</div>
    	</div>
	</div>
  	</div>

</section>
<!--/.Section: Forgot Password-->

</main>
<!--Main layout