<!-- Main layout-->
<main>
<style>
.main{
	margin-top: -64px;
}
.view_details {
	color: #28557B;
}
.view_details:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.imgsamping{
	width: 10%;
	margin-right: 2%;
}
.imgsamping2{
	width: 8%;
	margin-right: 4%;	
}
.imgkanan{
	width: 40%;	
}
.judul_kiri{
	font-weight: 700;
	font-size: 13pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
	margin-bottom: 10%;
	margin-top: 15%;
}
.judul_kanan{
	font-weight: 700;
	font-size: 18pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
}
.judul_kanan2{
	font-weight: 500;
	font-size: 16pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
}
.judul_kanan3{
	font-weight: 700;
	font-size: 18pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
}
.judul_kanan4{
	font-weight: 700;
	font-size: 16pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
}
.subtitle{
	margin-bottom: 3.5%;
}
.detail_info_samping{
	padding-left: 15%;
	padding-right: 10%;
	font-weight: 600;
	font-size: 10pt;
	margin-bottom: 10%;
}
.close_modal:hover {
	cursor:pointer
}
.div_buy_class{
	background-image: url("<?= base_url() ?>assets/img/class/buyclass.png") !important;
	background-repeat: no-repeat;
	background-position: auto;
	background-size: 100%;
	height: 50%;
	border-radius: 10px;
	margin-left:0px;
	margin-right:5%;
	padding-left: 2%;
}
#loading-overlay,#loading-overlay-modal {
    position: fixed;
	min-height: 100% !important;
    width: 100%;
	overflow: auto;
	display:none;
    left: 0;
    top: 0;
    align-items: center;
    background-color: #000;
    z-index: 999;
    opacity: 0.5;
}

.loading-icon,.loading-icon-modal{ 
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
	.judul_kiri{
		font-weight: 700;
		font-size: 13pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
		margin-bottom: 10%;
	}
}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
	.judul_kiri{
		font-weight: 700;
		font-size: 13pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
		margin-bottom: 10%;
		margin-top: -3%;
	}
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
	.judul_kiri{
		font-weight: 700;
		font-size: 13pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
		margin-bottom: 10%;
		margin-top: -3%;
	}
}
</style>
<div class="main">
	<div id="loading-overlay">
		<div class="loading-icon"></div>
	</div>
	<div class="row" style="height: 100vh;">
		<div class="col-md-3" style="background-color:#e8e8e8;padding:35px 10px 10px 50px;">
			<p class="text_bold"><a href="<?=base_url()?>classes/"><img src="<?= base_url() ?>assets/img/icon/previous.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;&nbsp;&nbsp;All Class</a></p><br>

			<p class="judul_kiri">Class Introduction</p>

			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/keyobjective.png" class="imgsamping" alt="Responsive image">&nbsp;&nbsp;Key Objective</p>

			<div class="detail_info_samping"><p><?= $detail->class_description ?></p></div>

<!-- 			<p><img src="<?= base_url() ?>assets/img/icon/linkmeet.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;Google Meet Link</p>

			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $detail->google_meet_link ?></p>

			<p><img src="<?= base_url() ?>assets/img/icon/meetpassword.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;Google Meet Password</p>

			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $detail->google_meet_password ?></p> -->

			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/virtualworld.png" class="imgsamping2" alt="Responsive image">&nbsp;&nbsp;Virtual World</p>

			<div class="detail_info_samping"><p><?= $detail->virtual_world?></p></div>
			
			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/meetingtime.png" class="imgsamping2" alt="Responsive image">&nbsp;&nbsp;Meeting Period</p>

			<div class="detail_info_samping"><p><?= $detail->meeting_period?></p></div>
		</div>
		<input 
			type="hidden" 
			class="form-control input"
			style="color: black;"
			id="class_id"
			value="<?= $detail->class_id?>"/>
		<div class="col-md-9" style="padding:35px 10px 10px 50px;">
			<p class="judul_kanan"><?= $detail->class_name?></p>
			<p class="subtitle"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
			<!-- <div class="row div_buy_class" style="margin-top: -3%;"> -->
			<div class="row mt-3">
				<!--<div class="col-md-12 col-12">
					<p></p>
				</div>
				<div class="judul_kanan2 col-md-2 col-3" style="margin-top: -3%;">
					<p>My Coins</p>
				</div>
				<div class="judul_kanan2 col-md-2 col-3" style="margin-top: -3%;">
					<p>Class Fee</p>
				</div>
				<div class="col-md-8 col-6">
				</div>
				<div class="col-md-2 col-3" style="margin-top: -9%;">
					<p class="judul_kanan3"><img src="<?= base_url() ?>assets/img/icon/coinclass.png" class="imgkanan" alt="Responsive image">&nbsp;&nbsp;<?=$user_detail->user_points?></p>
				</div>
				<div class="col-md-2 col-3" style="margin-top: -9%;">
					<p class="judul_kanan3"><img src="<?= base_url() ?>assets/img/icon/coinclass.png" class="imgkanan" alt="Responsive image">&nbsp;&nbsp;<?=$detail->class_points?></p>
				</div> -->
				<div class="col-md-8 col-6">
					<button
					type="button"
					class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
					style="background-color:white;width:130px;margin-left:0px;"
					data-toggle="modal" data-target="#modal_buy_class">Join Class</button>
				</div>
			</div>
			<div class="row mt-3">
				<div class="judul_kanan4 col-md-8 col-6" style="text-align:left;"><p class="text_bold">Goal Checklist</p></div>
			</div>
			<div class="row">
				<div class="col-md-5 col-6">
					<p>Government Checklist</p>
					<ul>
						<?php
						if (! empty($class_government_checklist)) {
							foreach ($class_government_checklist as $cgc) {
						?>
							<li><?=$cgc->content?></li>
						<?php }
						}
						?>
					</ul>
				</div>
				<div class="col-md-5 col-6">
					<p>SDG Indicator</p>
					<ul>
						<?php
						if (! empty($class_sdg_indicator)) {
							foreach ($class_sdg_indicator as $csi) {
						?>
							<li><?=$csi->sdg_indicator_name?></li>
						<?php }
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Buy Class -->
<div class="modal fade" id="modal_buy_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mx-3">
				<div id="loading-overlay-modal">
					<div class="loading-icon-modal"></div>
				</div>
				<div class="p-4 text-center">
					<p class="text_bold"><?= $detail->class_name?></p>
					<p style="color:grey;"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
					<!-- <p class="text_bold"><img src="<?= base_url() ?>assets/img/icon/coinclass.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;<?=$detail->class_points?></p> -->
					<p>Are you sure want to join this class ?</p>
				</div>
				<div class="modal-footer d-flex justify-content-center mt-3">
					<p class="close_modal" style="color:red" data-dismiss="modal">Cancel</p>
					<button 
						type="button" 
						class="btn remove_outline btn_outline_blue text15 text_medium" 
						id="buy_class">Join Class</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/.Modal Buy Class-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	console.log(<?= json_encode($detail) ?>);
</script>
<script src="<?= base_url(); ?>assets/js/detail_class_view.js"></script>
</main>
<!--Main layout -->