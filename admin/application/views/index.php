<!--Main layout-->
<main>
<style>
#homemain{
	background-image: url("<?= base_url() ?>assets/img/bgnew.png") !important;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
    color: black!important;
}
.homecontent1{
	margin-top:3%;
	padding-left:30px;
	padding-right:30px;
}
.hcontent {
	color:#002448;
	margin-top:20px;
}
.homecontent2{
	margin-top:25%;
	padding-bottom:20%;
	padding-left:30px;
	padding-right:30px;
}
.scontent2 {
	color:#002448;
	margin-left:70px;
	margin-top:-50px;
}
.hcontent2 {
	color:#002448;
	margin-top:-50px;
}
.homecontent3{
	margin-top:5%;
	padding-bottom:20%;
	padding-left:30px;
	padding-right:30px;
}
.scontent3 {
	color:#002448;
}
.hcontent3 {
	color:#002448;
	margin-top:-160px;
}
.homecontent4{
	margin-top:15%;
	padding-bottom:2%;
	padding-left:30px;
	padding-right:30px;
}
.scontent4 {
	color:#002448;
	margin:auto;
	margin-left:10px;
}
.scontent4left{
	border-right: 2px solid grey;
	padding:40px;
}
.scontent4right{
	padding:40px;
}
.imggratisgold{
	width:700px;
	height:100px;
	margin-top:-250px;
}
.imggratisgoldmobile{
	display:none;
}
.btnjointurnamen{
	width:470px;
	height:50px;
}
.imgarrow{
	width:375px;
}
.everyoneisa{
	font-size: 63px !important;
	color:#002448;
	margin-top:50px;
}
.champion{
	font-size: 92px !important;
	color:#002448;
	margin-left:-2px;
	margin-top:-10px;
}
.gratis{
	font-size: 25px !important;
	font-weight: 600 !important;
}
.kuotaterbatas{
	font-size: 15px !important;
	font-weight: 600 !important;
	margin-top:10px;
}
@media screen and (max-width: 718px) {
	#home2{
		margin-top: -50px;
	}
	#home3{
		margin-top: 50px;
	}
	.everyoneisa{
		font-size: 40px !important;
	}
	.champion{
		font-size: 50px !important;
	}
	.btnjointurnamen{
		width:350px;
		height:50px;
	}
	.imgarrow{
		width:335px;
	}
	.imggratisgold{
		width:700px;
		height:100px;
		margin-top:-250px;
		display:none;
	}
	.imggratisgoldmobile{
		margin-top:-100px;
		margin-left:60px;
		margin-bottom:20px;
		display:block;
	}
	.hcontent2{
		margin:0px;
	}
	.hcontent4{
		margin-top:35px;
	}
	.scontent2{
		margin:0px;
	}
	.scontent4left{
		border-right: none;
		padding:3px;
		padding-right:10px;
	}
	.scontent4right{
		padding:3px;
		padding-right:10px;
	}
	.hcontent3{
		margin-top:-60px;
		margin-left:3px;
	}
	.scontent3{
		margin-left:3px;
	}
}
@media screen and (max-width: 414px) {
	#home2{
		margin-top: -50px;
	}
	#home3{
		margin-top: 20px;
	}
	#imghome2{
		max-height: 120px;
		max-width: 120px;
	}
	.everyoneisa{
		font-size: 40px !important;
	}
	.champion{
		font-size: 50px !important;
	}
	.btnjointurnamen{
		width:320px;
		height:50px;
	}
	.imgarrow{
		width:335px;
	}
	.imggratisgold{
		width:700px;
		height:100px;
		margin-top:-250px;
		display:none;
	}
	.imggratisgoldmobile{
		margin-top:-100px;
		margin-left:20px;
		margin-bottom:20px;
		display:block;
	}
	.kuotaterbatas{
		margin-left:0;
	}
	.hcontent2{
		margin-top:35px;
	}
	.hcontent4{
		margin-top:35px;
	}
	.scontent2{
		margin:0px;
		padding:0px;
	}
	.btnscontent{
		margin-left:1px;
	}
	.hcontent3{
		margin-left:1px;
	}
	.scontent3{
		margin-left:1px;
	}
	.homecontent3{
		margin-top:30px;
	}
	.homecontent2{
		margin-top:100px;
	}
	.scontent4left{
		border-right: none;
		padding:3px;
		padding-right:5px;
	}
	.scontent4right{
		padding:3px;
		padding-right:5px;
	}
}
</style>
	<!--Section: About-->
	
	<div class="main text-left" id="homemain">
		<div class="row homecontent1">
			<div class="col-md-5">
			</div>
			<div class="col-md-6">
				<div class="row hcontent">
					<div class="col-md-10">
						<p class="everyoneisa text_bold">Everyone is a</p>
						<p class="champion text_bold">CHAMPION</p>
						<p id="checkOnline"></p>
						<!--<p class="everyoneisa text_bold">MABAR</p>
						<p class="champion text_bold">DIBAYAR</p> -->
					</div>
				</div>
				<div class="row scontent">
					<div class="col-md-10">
							<a class="btn btn_remove_outline btn_outline_blue text15 text_medium" type="button" href="<?= base_url() ?>tournament/" style="margin-left:0%;color:black;margin-top:10px;">Join Turnamen Sekarang</a>
							<a type="button" class="btn btn_remove_outline btn_outline_blue text15 text_medium" style="margin-left:0%;color:black;margin-top:10px;"  onclick="go_to_varena_form()">Jadi Turnamen Organizer
							</a>
							<script type='text/javascript'>
								function go_to_varena_form() {
									window.open('https://forms.gle/jFsWG2tB2fFn7yd67');
								}
							</script>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-1">
					</div>
					<div class="col-md-9" style="padding-bottom:50px;">
						<img src="<?= base_url(); ?>assets/img/arrow.png" class="imgarrow img-fluid" alt="Responsive image">
					</div>
				</div>
			</div>
		</div>
		<div class="row homecontent4">
			<div class="col-md-12">
				<div class="row hcontent4">
				</div>
				<div class="row scontent4 text_regular">
					<div class="col-md-6 scontent4left">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/EIcCYQNZnyE" allowfullscreen=""></iframe>
						</div>
						<div class="d-flex justify-content-center">
							<p class="text_bold text22" style="margin-top:15px;">
								Bikin Turnamen<br>
								gampang banget tau
							</p>
						</div>
					</div>
					<div class="col-md-6 scontent4right">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/-zfCbsTKyq0" allowfullscreen=""></iframe>
						</div>
						<div class="d-flex justify-content-center">
							<p class="text_bold text22" style="margin-top:15px;">
								Apalagi<br>
								Join Turnamennya
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row homecontent2">
			<div class="col-md-12">
				<div class="row hcontent2">
					<div class="col-12 col-md-12 d-flex justify-content-center">
						<img src="<?= base_url(); ?>assets/img/text.png" class="imggratisgold img-fluid" alt="Responsive image">
						<img src="<?= base_url(); ?>assets/img/textmobile.png" class="imggratisgoldmobile img-fluid" alt="Responsive image">
					</div>
				</div>
				<div class="row scontent2 text_regular">
					<div class="col-md-6">
						<div class="embed-responsive embed-responsive-16by9">
							<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Wef68sxd3wE" allowfullscreen=""></iframe>
						</div>
					</div>
					<div class="col-md-6 mt-2">
						<p>Ayo Daftarin & Lengkapi profil game favoritmu. SEKARANG!<br>
						Masukkin kode kupon dari Varena Leaders dan<br>
						dapetin 1.000 Varena Points
						<b class="gratis">GRATIS</b><b class="kuotaterbatas">&nbsp;&nbsp;&nbsp;Kuota terbatas</b><br>
						Join Turnamen dan Menangkan Ratusan Hadiah Keren Tiap Hari!
						#VarenaesportsforALL </p>
						<a type="button" class="btn btn_remove_outline btn_outline_blue text15 text_medium" style="margin-left:0%;color:black;margin-top:-5px;" href="<?= base_url(); ?>register/">Buat Akun</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row homecontent3">
			<div class="col-md-12">
				<div class="row hcontent3">
					<div class="col-md-2">
					</div>
					<div class="col-md-10 text_bold text30">
						Turnamen Baru
					</div>
				</div>
				<div class="row scontent3 text_regular">
					<div class="col-md-2">
					</div>
					<div class="col-md-10">
						<p>Daftar <b>SEKARANG</b> dan jadilah	<b>VARENA LEADERS!</b><br>
						Buat Turnamen dan ajak semua temenmu join VARENA<br>
						*Dapatkan BONUS & HADIAH sampai PULUHAN JUTA RUPIAH!<br>
						Hanya 20 Orang pertama.<br>
						#Varenacreatormentality</p>
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-10">
						<a type="button" class="btn btn_remove_outline btn_outline_blue text15 text_medium" style="margin-left:0%;color:black;margin-top:10px;" href="<?= base_url(); ?>login/">Buat Turnamen
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script type="text/javascript">
setInterval(function(){ 
  var ifConnected = window.navigator.onLine;
  //alert(ifConnected);
    if (ifConnected) {
      document.getElementById("checkOnline").innerHTML = "Your device is connected to the internet";
      document.getElementById("checkOnline").style.color = "green";
    } else {
      document.getElementById("checkOnline").innerHTML = "Your device is lost connection";
      document.getElementById("checkOnline").style.color = "red";
    }
 }, 3000);
</script>
<!--Main layout-->