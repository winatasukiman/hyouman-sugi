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
				<p class="login mb-0">Check your email!</p>
				<p class="login_marks">If an account exists for your email, we have sent the instructions for resetting your password.</p>
                <a href="<?= base_url(); ?>login/"><button class="mt-3">Back to login</button></a>
				<p class="text_register mt-3"> Didn’t get it? Check the email address or click <a href="<?= base_url(); ?>login/forgot_password">here</a>  to resend the instructions.</p>
		</div>
	</div>
</div>
<!--Main layout-->