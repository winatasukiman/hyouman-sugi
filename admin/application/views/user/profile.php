<!--Main layout-->
<main>
<style>
/* Navbar */
/* Left Navbar*/
.sidenav {
	height: 100%;
	position: fixed;
	z-index: 1;
	left: 0;
	top:0;
	overflow-x: hidden;
	padding-top: 107px;
	padding-right:10px;
	background-image: none;
	/*border-right: 2px solid grey;*/
	background:#e8e8e8;
}
.grade {
	font-size: 15px;
	font-weight: 700;
}
.isi{
	font-size: 14px;
	font-weight: 300;
	text-align: left;
}
.label{ color:grey; }
.sidenav a {
	padding: 12px 25px;
	text-decoration: none;
	font-weight: 500;
	color: #28557B;
	display: block;
}
.sidenav a:hover {
	color: #28557B;
	font-weight: 700;
}
.edit_profile {
	font-weight: 500;
	font-size: 15px;
}
.edit_profile:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.sn-item{
	margin-bottom: 10%;
	cursor: pointer;
}
.sn-item.active {
	position: relative;
	/*color: #ffb24a !important;*/
	/*background-color: white !important;*/
	/*background-image: url("../img/turnamen/linekategori.svg") !important;*/
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-position: -83px 0;
	/*margin-left: -5px;*/
	/*position: absolute;*/
	/*z-index: -1;*/
	color: #28557B;
	font-weight: 700;
}
#div_profile,#div_report{
	margin-left:190px;
}
.text_judul{
	font-family: Quicksand;
	font-weight: 700;
	font-size: 20px;
}

.text_judul2{
	font-family: Quicksand;
	font-weight: 400;
	font-size: 15px;
}

#div_report{
	display:none;
}
#help{
    position: absolute; 
	bottom: 60px; 
}
#logout{
    position: absolute; 
	bottom: 0px; 
}
/* medium screen - for TABLET 991px or less */
@media screen and (max-width: 991px) {
	.name_id{
		margin-left:17px;
	}
}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
	/* Left Navbar*/
	.sidenav{
		display:none;
	}
	.sn-item.active {
		background-position: -79px 0;
	}
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) { 
	/* Left navbar */
	.sidenav{
		display:none;
	}
	#div_profile,#div_report{
		margin-left:25px;
	}
}
</style>
<div class="main">
	<div class="sidenav">
		<a class="sn-item active" id="profile"><img src="<?= base_url() ?>assets/img/profile/profile.png" class="img-fluid" alt="Responsive image">&nbsp;Profile</a>
		<a class="sn-item" id="help"><img src="<?= base_url() ?>assets/img/profile/help.png" class="img-fluid" alt="Responsive image">&nbsp;Help</a>
		<a class="sn-item" id="logout" href="<?= base_url()?>login/logout"><img src="<?= base_url() ?>assets/img/profile/logout.png" class="img-fluid" alt="Responsive image">&nbsp;Logout</a>
	</div>
	<div id="div_profile">
		<div class="row">
			<div class="col-md-11">
				<?php if ($this->session->flashdata('category_success')) { ?>
					<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
				<?php } ?>
				<?php if ($this->session->flashdata('category_error')) { ?>
					<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4" style="margin-bottom: 25px; ">
				<div class="row">
					<div class="col-3 col-md-4" style="padding-top:5px;margin-right: -25px;">
						<?php 
							if($user_detail->user_image != NULL) {
						?>
							<img src="<?= base_url() ?>assets/img/uploads/user/<?= $user_detail->user_image ?>" width="70" height="70" class="rounded-circle">
						<?php 	
							} else {
						?>
							<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="70" height="70" class="rounded-circle">
						<?php 	
							}
						?>
					</div>
					<div class="col-8 col-md-7 name_id">
						<p class="text_judul" style="width: 350px;"><?= $user_detail->full_name ?></p>
						<p class="text_judul2" style="margin-top: -12px; margin-bottom: 20%"><a class="edit_profile" href="<?= base_url() ?>user/edit_profile">Edit Profile</a></p>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 8px;">
						Short Profile
					</div>
					<div class="col-md-12">
						<?= $user_detail->short_profile ?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 8px;">
						Phone Number
					</div>
					<div class="col-md-12">
						+<?= $user_detail->country_code ?>&nbsp;<?= $user_detail->phone_number ?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 8px;">
						Email
					</div>
					<div class="col-md-12">
						<?= $user_detail->email ?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 8px;">
						Institution
					</div>
					<div class="col-md-12">
						<?php 
							if($user_detail->institution_id != NULL) {
						?>
							<?= $user_detail->institution_name ?>
						<?php 	
							}
						?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label">
						Address
					</div>
					<div class="col-md-12">
						<?= $user_detail->address ?>
					</div>
				</div>
			</div>
			<div class="col-md-7 ml-0">
			</div>
		</div>
	</div>
	<div id="div_report">
		Report
	</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	console.log(<?= json_encode($user_detail) ?>);
</script>
<script src="<?= base_url(); ?>assets/js/profile.js"></script>
</main>
<!--Main layout -->