<style>
footer {
	color: white;
	background-color: black;
	font-family: "Noto Sans", sans-serif;
	margin-top: 0!important;
	/*padding: 150px 0 0 0;*/
}
.footer_home {
	margin-top: -6%!important;
}
.footer_home > .container .row > a{
	z-index: 2;
}
.footer--copyright {
	margin-top: 50px;
	padding-bottom: 20px;
}

/*--- Sosmed icon ---*/
.circle {
	border: 2px solid #666;
	border-radius: 50%;
	box-shadow: 0 0 1px 0px rgb( 255, 255, 255);
	transition: background-color .5s ease-in-out;
	display:inline-block;
}
.circle:hover {
	background-color: #666;
}
footer.page-footer a {
	color: #c0c0c0;
}

.socialMediaLinks a {
	font-size: 26px;
	margin: 0 10px 0 0;
	text-decoration: none;
	/*display:block;*/
}
.socialMediaLinks a.fa-twitter:hover {
	color: #fff;
	background-color: #08a0e9;
	padding: 10px;
}
.socialMediaLinks a.fa-facebook-f:hover {
	color: #fff;
	background-color: #3b5998;
	padding: 10px;
}
.socialMediaLinks a.fa-pinterest:hover {
	color: #fff;
	background-color: #bd081c;
	padding: 10px;
}
.socialMediaLinks a.fa-instagram:hover {
	/*border-radius: 5px;*/
	color: #fff;
	text-align: center;
	vertical-align: middle;
	background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
	padding: 10px;
}
.socialMediaLinks a.fa-google-plus-g:hover {
	color: #fff;
	background-color: #db4437;
	padding: 10px;
}
.socialMediaLinks a.fa-youtube:hover {
	color: #fff;
	background-color: #e62117;
	padding: 10px;
}
.page-footer{
    height:100%;
	width:100%;
    background: url('<?= base_url() ?>assets/img/bgfooter.png');
	background-size: cover;
	background-repeat: no-repeat;
	background-position: 50% 50%;
}
.button {
  background-color: #002448;
  padding: 10px;
}
#href {
	 color: white;
	 font-family: 'Montserrat';
	 font-size: 17px;
	 cursor:pointer;
}
#copyright {
	 color: white;
	 font-family: 'Montserrat';
	 font-size: 15px;
}
.rowb {
	margin-top:-25px;
}
#socmed {
	margin-top:70px;
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) { 
    #socmed {
        margin-top:-20px;
    }
}
</style>
<!-- Footer -->
<footer class="text-left page-footer bg-dark font-small" style="margin-top:100px;">
	<div class="container text-md-left">
		<div class="row float-right mr-1 rowb">
			<a id="back-to-top" href="#" class="back-to-top" role="button"><span class="rounded-circle button material-icons"><img src="<?= base_url() ?>assets/img/icon/arrow_up.png" class="mx-auto d-block"></span></a>
		</div>
		<div class="row">
			<div class="col-md-1 mt-3"></div>

			<div class="col-10 col-md-3 mt-5 mb-4" style="padding-top:20px;">
				<ul class="navbar-nav ml-auto feature-list-style">
    				<!-- <li class="mb-3up">
    					<a id="href" href="" target="_blank">Tentang kami</a>
    				</li> -->
    				<li class="mb-3up">
						<form id="emailto" action="mailto:customercare@varena.id" method="post" enctype="text/plain">
							<a id="href" onclick="document.getElementById('emailto').submit()">Hubungi kami</a>
						</form>
    				</li>
    				<li class="mb-3up">
    					<a id="href" href="<?= base_url() ?>footer/pertanyaan">Pertanyaan</a>
    				</li>
					<li class="mb-3up">
    					<a id="href" href="<?= base_url() ?>footer/syaratketentuan">Syarat dan ketentuan</a>
    				</li>
					<li class="mb-3up">
    					<a id="href" href="<?= base_url() ?>footer/kebijakanprivasi">Kebijakan Privasi</a>
    				</li>
    			</ul>
			</div>

			<div class="col-6 col-md-3 mb-3">
			</div>

			<!-- Social Media -->
			<div class="col-12 col-md-4" id="socmed">
    			<div class="float-sm-right">
					<div class="socialMediaLinks mt-3 mb-3">
						<a class="navbar-brand mr-auto text-uppercase" href="<?= base_url(); ?>home/"><img src="<?= base_url(); ?>assets/img/icon/logo_desktop.svg"></a>
					</div>
					<a id="href" href="#!">Ikuti media sosial kami</a>
					<div class="socialMediaLinks mt-3 mb-3">
					    <a href="https://www.instagram.com/varenaesports/" target="_blank"><img src="<?= base_url() ?>assets/img/icon/instagram.png" style="width:40px;height:40px;"></a>
					    <a href="https://www.youtube.com/channel/UCtPPuRZzeX_DLmB70fDl8Aw" target="_blank"><img src="<?= base_url() ?>assets/img/icon/youtube.png" style="width:40px;height:40px;"></a>
					</div>
				</div>
			</div>
    	</div>

    	<div class="row pb-4">
    		<div class="col-12">
				<hr style="border-color: white;" />
			</div>
			<div class="col-12 mt-4 text-center">
				<p id="copyright">&copy; 2020 VARENA. All rights reserved.</p>
			</div>
    	</div>
  	</div>

</footer>
<!-- Footer -->