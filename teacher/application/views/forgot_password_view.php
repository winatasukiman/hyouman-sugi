<!--Main layout-->
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/f8eb04634c.js" crossorigin="anonymous"></script>
<!--Main layout-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/f8eb04634c.js" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/loginregister/loginregister.css">
<style>
	body{
		background: #D8E0E7 !important;
	}
	.card_content{
		padding: 32px;
		background: #F5F5F5 !important;
		border-radius: 16px;
	}
	form{
		margin:0;
	}
	.label{
		font-weight: 500;
		font-size: 14px;
		color: #1E3243;
	}
</style>
<div class="container h-100">
	<div class="row h-100 justify-content-center align-items-center">
		<div class="col-11 col-md-8 col-lg-6 card_content">
			<?php if ($this->session->flashdata('category_success')) { ?>
				<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('category_error')) { ?>
				<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
			<?php } ?>
			<?php if ($flag == 1) { ?>
				<?= form_open('login/request_forgot_password', 'id="form_forgot_password"') ?>
				<p class="login mb-0">Password Recovery</p>
				<p class="login_marks">No worries, we’ll send you the reset instructions!</p>
				<!-- Phone -->
				<div class="form-group mb-4">
					<p class="label mb-2">Enter the email you use for sugi.thehyouman.com</p>
					<div class="input-group">
						<input
							type="email" 
							placeholder="hyouman@hyouman.com"
							name="email" 
							id="email" 
							class="form-control" required/>
					</div>
					<div class="error" id="div_error_email">
						<span id='error_email'></span>
					</div>
				</div>
			<?php } else if ($flag == 2) { ?>
				<?= form_open('login/change_password', 'id="form_forgot_password"') ?>
				<p class="login mb-0">Setting a new password</p>
				<p class="login_marks">Your password must be different from the previously used password.</p>
				<!-- Password -->
				<div class="form-group mb-3up">
					<p class="label mb-2">New Password</p>
					<div class="input-group">
						<input 
							type="password" 
							pattern="[0-9]*" inputmode="numeric"
							placeholder="Password ( 6 Digit Number )"
							name="password"
							id="password" 
							class="form-control"
							maxlength="6" required/>
					</div>
					<div class="error" id="div_error_password">
						<span id='error_password'></span>
					</div>
				</div>

				<!-- Confirm Password -->
				<div class="form-group mb-3up">
					<p class="label mb-2">Confirm New Password</p>
					<div class="input-group">
						<input 
							type="password" 
							pattern="[0-9]*" inputmode="numeric"
							placeholder="Confirm your password"
							name="confirm_password"
							id="confirm_password" 
							class="form-control" required/>
					</div>
					<div class="error" id="div_error_confirm_password">
						<span id='error_confirm_password'></span>
					</div>
				</div>
			<?php } ?> 
			<?php if ($flag == 1) { ?>
				<button
					class="mt-3"
					type="submit" 
					id="forgot_button_submit" 
					name="forgot_button_submit">Send</button>
				<?php } else if ($flag == 2) { ?>
				<!-- Button -->
					<button class="mt-3"
						type="submit" 
						id="forgot_button_submit" 
						name="forgot_button_submit">Send</button>
				<?php if (isset($unique_code)) { ?>
				<input type="hidden" name="unique_code" id="unique_code" value= '<?php echo $unique_code ?>'  />
				<?php } ?>
				<?php } ?> 
				<p class="d-flex align-items-center mt-3"><a href="<?= base_url() ?>login/" style="font-weight:600;"><img src="<?=base_url()?>assets/img/icon/icon_back_blue.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Back to login</a></p>

			<?= form_close() ?>
		</div>
	</div>
</div>
<!--Main layout-->