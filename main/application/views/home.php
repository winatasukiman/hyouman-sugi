<!--Main layout-->
<main>
<style>
	body{
		width:100%;
		margin:0px;
	}
	main{
		padding-top: 0px;
	}
	.bg{
		background-image: url("<?= base_url('assets/img/home/bg.png'); ?>");
		height: 120vh;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}
	.login {
		color: #28557B;
		font-size: 40px;
		font-weight: 700;
		font-family: Quicksand;
		margin-top: 3vh;
	}

	.isi {
		color: #28557B;
		font-size: 20px;
		line-height: 35px;
		font-family: Quicksand;
	}

	.isi2 {
		color: #28557B;
		font-size: 17px;
		line-height: 35px;
		font-family: Quicksand;
	}

	.babi1{
		width: 30vh;
		margin: 0 auto;
		display: block;
		max-width: 100vw;
		height: auto;
		margin-top: 6vh;
	}

	.babi2{
		width: 17vh;
		margin: 0 auto;
		display: block;
		max-width: 100vw;
		height: auto;
		margin-top: -3vh;
	}

/*	.wrapper{
		display: flex;
		flex-direction: row;
		font-size: 30px;
		text-align: center;
	}

	.flexkiri .flexkanan{
		flex: 45%;
	}

	.flextengah{
		flex: 10%;
	}*/
	
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
		.babi1{
			width: 18vh;
			margin: 0 auto;
			display: block;
			max-width: 100vw;
			height: auto;
			margin-top: 6vh;
		}

		.babi2{
			width: 11vh;
			margin: 0 auto;
			display: block;
			max-width: 100vw;
			height: auto;
			margin-top: -3vh;
		}

		.login {
			color: #28557B;
			font-size: 30px;
			font-weight: 700;
			font-family: Quicksand;
			margin-top: 3vh;
		}

		.isi {
			color: #28557B;
			font-size: 15px;
			line-height: 35px;
			font-family: Quicksand;
		}

		.isi2 {
			color: #28557B;
			font-size: 12px;
			line-height: 35px;
			font-family: Quicksand;
		}

	}

	/* medium screen - for TABLET 767px or less */
	@media screen and (max-width: 767px) {
		.babi1{
			width: 18vh;
			margin: 0 auto;
			display: block;
			max-width: 100vw;
			height: auto;
			margin-top: 6vh;
		}

		.babi2{
			width: 11vh;
			margin: 0 auto;
			display: block;
			max-width: 100vw;
			height: auto;
			margin-top: -3vh;
		}

		.login {
			color: #28557B;
			font-size: 33px;
			font-weight: 700;
			font-family: Quicksand;
			margin-top: 3vh;
		}

		.isi {
			color: #28557B;
			font-size: 18px;
			line-height: 35px;
			font-family: Quicksand;
		}

		.isi2 {
			color: #28557B;
			font-size: 15px;
			line-height: 35px;
			font-family: Quicksand;
		}

	}

	/* small screen - for MOBILE 414px or less  */
	@media screen and (max-width: 414px) {
		.babi1{
			width: 15vh;
			margin: 0 auto;
			display: block;
			max-width: 100vw;
			height: auto;
			margin-top: 6vh;
		}

		.babi2{
			width: 12vh;
			margin: 0 auto;
			display: block;
			max-width: 100vw;
			height: auto;
			margin-top: -4vh;
		}

		.login {
			color: #28557B;
			font-size: 30px;
			font-weight: 700;
			font-family: Quicksand;
			margin-top: 3vh;
		}

		.isi {
			color: #28557B;
			font-size: 15px;
			line-height: 35px;
			font-family: Quicksand;
		}

		.isi2 {
			color: #28557B;
			font-size: 12px;
			line-height: 35px;
			font-family: Quicksand;
		}
	}
	
</style>
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div class="bg">
	<div class="row">
		<div class="col-3 col-md-3"></div>
		<div class="col-6 col-md-6">
				<img src="<?= base_url('assets/img/home/logomerlion.png'); ?>" class="babi1">
				<br>
				<p class="isi2 text-center">Powered by :</p>
				<br>
				<img src="<?= base_url('assets/img/home/logohyoumankecil.png'); ?>" class="babi2">

				<p class="login text-center">Welcome</p>

				<p class="isi text-center">Merlions Schools in Collaboration with The Hyouman<br>present <b>INNOVATORS CAMP HOLIDAY PROGRAMME</b></p>

				<br>

				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-4 col-12 mt-2">
						<a class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center" 
							href="<?= base_url(); ?>Login/home/1">P1 until P6</a>
						<p class="isi2 text-center">Virtual World</p>
					</div>
					<div class="col-md-4 col-12 mt-2">
						<a class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center" 
							href="<?= base_url(); ?>Login/home/">Sec 1 until Pre-U2</a>
							<p class="isi2 text-center">Discovering You</p>
					</div>
					<div class="col-md-2">
					</div>
				</div>
		</div>
		<div class="col-3 col-md-3"></div>
	</div>
</div>
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";	
</script>
<script src="<?= base_url('assets/js/login.js'); ?>"></script>
</main>
<!--Main layout-->