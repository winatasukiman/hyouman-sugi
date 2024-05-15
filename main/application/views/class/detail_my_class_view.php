<!--Main layout-->
<script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
<main>
<style>
.main{
	margin-top: -40px;
}
.imgsamping{
	width: 10%;
	margin-right: 2%;
}
.imgsamping2{
	width: 8%;
	margin-right: 4%;	
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
.tanggal{
	margin-bottom: -25%;
}
.angkamission{
	width: 100%;
	margin-top: 15%;
}
.isiankanan{
	font-weight: 600;
}
.bintang{
	margin-top: -0.5%;
	margin-left: 10%;
}
.view_details {
	color: #28557B;
}
.view_details:hover{
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.view_less {
	color: #28557B;
}
.view_less:hover{
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.mission_title{
	font-weight:700;
}
.label{ color: grey;}
.div_goal_checklist{
	display:none;
}
.div_mission_detail,#view_less,.view_less,.graph_overall_boc{
	display:none;
}
#div_task,.mission,#div_input_review,#div_progress_report,#div_bsteams,#div_strength_capture_bsteams_from_teacher{
	display:none;
}
.show-result {
  margin: 10px;
  padding: 10px;
  color: green;
  font-size: 20px;
}
.star{
	color:orange;
}

.star-rating s,.star-rating-b s,.star-rating-s1 s,.star-rating-t s ,.star-rating-e s ,.star-rating-a s ,.star-rating-m s ,.star-rating-s2 s,.star-rating-s-strength s,.star-rating-t1-strength s,.star-rating-r-strength s,.star-rating-e-strength s,.star-rating-n-strength s,.star-rating-g-strength s,.star-rating-t2-strength s,.star-rating-h-strength s {
    color: grey;
    font-size: 30px;
    cursor: default;
    text-decoration: none;
    line-height: 50px;
}

.star-rating,.star-rating-b,.star-rating-s1,.star-rating-t,.star-rating-e ,.star-rating-a,.star-rating-m ,.star-rating-s2,.star-rating-s-strength,.star-rating-t1-strength,.star-rating-r-strength,.star-rating-e-strength,.star-rating-n-strength,.star-rating-g-strength,.star-rating-t2-strength,.star-rating-h-strength {
    padding: 2px;
}
.star-rating s:hover:before,
.star-rating s.rated:before,
.star-rating s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-b s:hover:before,
.star-rating-b s.rated:before,
.star-rating-b s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-s1 s:hover:before,
.star-rating-s1 s.rated:before,
.star-rating-s1 s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-t s:hover:before,
.star-rating-t s.rated:before,
.star-rating-t s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-e s:hover:before,
.star-rating-e s.rated:before,
.star-rating-e s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-a s:hover:before,
.star-rating-a s.rated:before,
.star-rating-a s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-m s:hover:before,
.star-rating-m s.rated:before,
.star-rating-m s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-s2 s:hover:before,
.star-rating-s2 s.rated:before,
.star-rating-s2 s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-s-strength s:hover:before,
.star-rating-s-strength s.rated:before,
.star-rating-s-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-t1-strength s:hover:before,
.star-rating-t1-strength s.rated:before,
.star-rating-t1-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-r-strength s:hover:before,
.star-rating-r-strength s.rated:before,
.star-rating-r-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-e-strength s:hover:before,
.star-rating-e-strength s.rated:before,
.star-rating-e-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-n-strength s:hover:before,
.star-rating-n-strength s.rated:before,
.star-rating-n-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-g-strength s:hover:before,
.star-rating-g-strength s.rated:before,
.star-rating-g-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-t2-strength s:hover:before,
.star-rating-t2-strength s.rated:before,
.star-rating-t2-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-h-strength s:hover:before,
.star-rating-h-strength s.rated:before,
.star-rating-h-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating s:before ,.star-rating-b s:before ,.star-rating-s1 s:before ,.star-rating-t s:before ,.star-rating-e s:before ,.star-rating-a s:before ,.star-rating-m s:before ,.star-rating-s2 s:before,.star-rating-s-strength s:before,.star-rating-t1-strength s:before,.star-rating-r-strength s:before,.star-rating-e-strength s:before,.star-rating-n-strength s:before,.star-rating-g-strength s:before,.star-rating-t2-strength s:before,.star-rating-h-strength s:before {
    content: "\2606";
}
.sidenav {
	z-index: 1;
	left: 0;
	top:0;
	right:0;
	overflow-x: hidden;
	overflow: hidden;
	height:100px;
	background-color: white !important;
	/*border-right: 2px solid grey;*/
	background:#e8e8e8;
}
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
	cursor:pointer;
}
.sn-item.active {
	position: relative;
	/*color: #ffb24a !important;*/
	/*background-color: white !important;*/
	background-image: url("<?= base_url() ?>assets/img/navbar/gariskecil.png") !important;
	background-repeat: no-repeat;
	background-position: center 9vh;
	text-align:center;
	/*margin-left: -5px;*/
	/*position: absolute;*/
	/*z-index: -1;*/
	color: #28557B;
	font-weight: 700;
}
#loading-overlay{
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
.div_after_topnav{
	margin-top:100px;
	margin-left:90px;
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
	.div_status_mission,.div_view_detail_less{
		margin-top:1%;
	}
}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
	.sn-item.active {
		background-position: 70px 100px;
	}
	.judul_kiri{
		font-weight: 700;
		font-size: 13pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
		margin-bottom: 10%;
		margin-top: -3%;
	}
	.div_status_mission,.div_view_detail_less{
		margin-top:5%;
  }
	.subtitle{
		margin-bottom: 15%;
	}
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
	.sn-item.active {
		background-position: 70px 100px;
	}
	.div_after_topnav{
		margin-left:30px;
	}
	.judul_kiri{
		font-weight: 700;
		font-size: 13pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
		margin-bottom: 10%;
		margin-top: -3%;
	}
	.angkamission{
		width: 40%;
		margin-top: 15%;
	}
	.div_status_mission,.div_view_detail_less{
		margin-top:10%;
  }
	.subtitle{
		margin-bottom: 15%;
	}
}
</style>
<div class="main">
	<div id="loading-overlay">
		<div class="loading-icon"></div>
	</div>
	<div class="row" style="margin-top:-2px;">
		<div class="col-md-3" style="background-color:#e8e8e8;padding:35px 10px 10px 50px;">
			<p class="text_bold"><a href="<?=base_url()?>classes/"><img src="<?= base_url() ?>assets/img/icon/previous.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;&nbsp;&nbsp;My Classes</a></p><br>

			<p class="judul_kiri">Class Introduction</p>

			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/keyobjective.png" class="imgsamping" alt="Responsive image">&nbsp;&nbsp;Class Goal</p>

			<div class="detail_info_samping"><p><?= $detail->class_description ?></p></div>

			<!-- <p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/virtualworld.png" class="imgsamping2" alt="Responsive image">&nbsp;&nbsp;Virtual World</p>
			<div class="detail_info_samping"><a href="<?= $detail->virtual_world?>"><p><?= $detail->virtual_world?></p></a></div> -->
			
			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/meetingtime.png" class="imgsamping2" alt="Responsive image">&nbsp;&nbsp;Meeting Period</p>
			<div class="detail_info_samping"><p><?= $detail->meeting_period?></p></div>
			
			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/meetingtime.png" class="imgsamping2" alt="Responsive image">&nbsp;&nbsp;Class Start</p>
			<div class="detail_info_samping"><p><?= $detail->class_start_date?>, <?= $detail->class_start_time?></p></div>
			
			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/meetingtime.png" class="imgsamping2" alt="Responsive image">&nbsp;&nbsp;Class Finish</p>
			<div class="detail_info_samping"><p><?= $detail->class_finish_date?>, <?= $detail->class_finish_time?></p></div>
		</div>

		<div class="col-md-9" id="div_mission" style="padding:35px 10px 10px 50px;">
			<p class="judul_kanan"><?= $detail->class_name?></p>
			<p class="subtitle"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
			<!-- <div class="row">
				<div class="col-md-5 col-6" style="text-align:left;"><p class="text_bold text19">Goal Checklist</p></div>

				<div class="col-md-6 col-5" style="text-align:right;"><p class="view_details" id="view_details" onclick="view_detail_goal_checklist()">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_details" id="view_less" onclick="view_less_goal_checklist()">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p></div>
			</div> -->
			<!-- <div class="row">
				<div class="col-md-5 col-6 div_goal_checklist">
					<?php if (! empty($class_government_checklist)) { ?>
					<p class="label">Government Checklist</p>
					<ul>
						<?php foreach ($class_government_checklist as $cgc) { ?>
							<li><?=$cgc->content?></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
				<div class="col-md-5 col-6 div_goal_checklist">
					<?php if (! empty($class_sdg_indicator)) { ?>
					<p class="label">SDG Indicator</p>
					<ul>
						<?php foreach ($class_sdg_indicator as $csi) { ?>
							<li><?=$csi->sdg_indicator_name?></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
			</div> -->
			<div class="row">
				<div class="col-md-5 col-6 div_goal_checklist">
					<?php if ($detail->project_user != null) { ?>
					<p class="label">Project User</p>
					<p class="isiankanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$detail->project_user?></p>
					<?php } ?>
				</div>
				<!-- <div class="col-md-5 col-6 div_goal_checklist">
					<?php if ($detail->project_style != null) { ?>
					<p class="label">Project Style</p>
					<p class="isiankanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$detail->project_style?>
					<?php } ?>
				</div> -->
				<div class="col-md-5 col-6 div_goal_checklist">
					<?php if ($detail->project_member != null) { ?>
					<p class="label">Project Member</p>
					<p class="isiankanan">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$detail->project_member?></p>
					<?php } ?>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
				</div>
			</div>
			<?php
				$i=1;	
				if (! empty($class_mission)) {
					foreach ($class_mission as $cm) {
			?>
			<div class="row mt-3">
				<div class="col-md-1 col-4">
					<img src="<?= base_url() ?>assets/img/icon/<?=$i?>pasif.png" class="angkamission" alt="Responsive image">
				</div>
				<div class="col-md-4 col-7">
					<p class="mission_title text19"><?php if($cm->mission_title == ""){?>Mission <?=$i?>
					<?php }else{ ?>
					<?=$cm->mission_title?>
					<?php } ?></p>
					<?php if($cm->face_to_face == 1){?>
						<p class="mission_title text19">On Site at <?=$cm->meeting_location?></p>
					<?php }else{ ?>
						<p class="mission_title text19">Off Site <br><a class="text15" href="<?=$cm->google_meet_link?>"><?=$cm->google_meet_link?></a></p>	
					<?php } ?>
					<p class="label" style="margin-bottom: -5%;"><?=$cm->publish_date?>, <?=$cm->publish_time?></p>
				</div>
				<div class="col-md-3 col-4 div_status_mission">
					<?php
						if($cm->status_task == 0) {	
							if($this->session->userdata('user_type') == 3){
					?>
						<button
							type="button"
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width:150px;margin-left:0px;margin-top: 4%;"
							onclick="mission(<?=$cm->class_mission_id?>)">Upload Task</button>
					<?php
							}else{echo "<p>your child has not submitted the assignment</p>";}
						}else if($cm->status_task == 2) {
					?>
						<p class="view_details" onclick="mission(<?=$cm->class_mission_id?>)">Uploaded&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/check.png" class="img-fluid" alt="Responsive image"></p>
					<?php
						}else if($cm->status_task == 3) {
					?>
						<p class="view_details" onclick="mission(<?=$cm->class_mission_id?>)">Assessed&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/assessed.png" class="img-fluid" alt="Responsive image"></p>
					<?php
						}
					?>
				</div>
				<div class="col-md-3 col-7 div_view_detail_less" style="text-align:right;margin-top: 2%;">
					<p class="view_details" id="view_details<?=$i?>" onclick="view_detail_mission(<?=$i?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less<?=$i?>" onclick="view_less_mission(<?=$i?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1 div_mission_detail div_mission_detail<?=$i?>">
				</div>
				<div class="col-md-10 div_mission_detail div_mission_detail<?=$i?>">
					<br>
					<div class="row mt-3">
						<div class="col-md-3 col-6">
							<p class="label">Project Number</p>
						</div>
						<div class="col-md-9 col-6">
							<p class="isiankanan"><?=$cm->class_id?></p>
						</div>
					</div>
					<?php if (! empty($cm->class_mission_sdg_indicator)) { ?>
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">SDG Indicator</p>
							<p class="isiankanan">
							
								<ul>
									<?php foreach ($cm->class_mission_sdg_indicator as $cmsi) {
										if($cmsi->is_true == 1){
									?>
										<li><?=$cmsi->sdg_indicator_name?></li>
									<?php }
									}
									?>
								</ul>
							
							</p>
						</div>
					</div>
					<?php } ?>
					<!-- <?php if (! empty($cm->class_mission_participants_bank_of_competencies)) { ?>
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Bank of Competencies</p>
							<p class="isiankanan" style="margin-top:-2%;">
								<ul>
									<?php $boc_name = "";
									foreach ($cm->class_mission_participants_bank_of_competencies as $cmpboc) {
										if($boc_name != $cmpboc->name){ echo "<br>".$cmpboc->name."<br>";}
										if($cmpboc->is_true == 1){
									?>
										<li><?=$cmpboc->no?> - <?=$cmpboc->indicator?></li>
									<?php } $boc_name = $cmpboc->name;
									}
									?>
								</ul>
							</p>
						</div>
					</div>
					<?php } ?> -->
					<?php if (! empty($cm->class_mission_bank_of_competencies)) { ?>
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Bank of Competencies</p>
							<p class="isiankanan" style="margin-top:-2%;">
								<ul>
									<?php $boc_name = "";
									foreach ($cm->class_mission_bank_of_competencies as $cmpboc) {
										if($boc_name != $cmpboc->name){ echo "<br>".$cmpboc->name."<br>";}
										if($cmpboc->is_true == 1){
									?>
										<li><?=$cmpboc->no?> - <?=$cmpboc->indicator?></li>
									<?php } $boc_name = $cmpboc->name;
									}
									?>
								</ul>
							</p>
						</div>
					</div>
					<?php } ?> 
					<?php if (! empty($cm->class_mission_learning_objectives)) {?>
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Learning Objectives</p>
							<p class="isiankanan" style="margin-top:-2%;">
								<ul>
									<?php foreach ($cm->class_mission_learning_objectives as $cmlo) {
										if($cmlo->name != ""){
									?>
										<li><?=$cmlo->name?></li>
									<?php }
									}
									?>
								</ul>
							</p>
						</div>
					</div>
					<?php } ?> 
					<!-- <div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Mission&nbsp;<?=$i?>&nbsp;Description</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-12">
							<p class="isiankanan"><?=$cm->mission_description?></p>
						</div>
					</div> -->
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Lesson Activities</p>
						</div>
					</div>
					<div class="row">
					<?php
					foreach($class_mission_lesson_activities as $cmla){
						foreach($cmla as $res){
							if($res->class_mission_id == $cm->class_mission_id){
								if($res->title != ""){
					?>
						<div class="col-md-3 col-3">
							<div class="card" style="padding: 5px;">
								<p class="isiankanan"><?=$res->title?></p>
								<p class="isiankanan"><?php echo nl2br($res->description); ?></p>
							</div>
						</div>
					<?php }
							}
						}
					}
					?>
					</div>
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Reference</p>
						</div>
					</div>
					<?php
					if(!empty ($class_mission_link)){
						foreach($class_mission_link as $cml){
						foreach($cml as $res){
							if($res->class_mission_id == $cm->class_mission_id){
					?>
					<div class="row">
						<div class="col-md-3 col-6">
							<p class="isiankanan"><?=$res->name?></p>
						</div>
						<div class="col-md-9 col-6">
							<p class="isiankanan"><a href="<?=$res->link?>"><?=$res->link?></a></p>
						</div>
					</div>
					<?php 	}
							}
						}
					}
					?>
					<!-- <div class="row mt-3">
						<div class="col-md-3 col-6">
							<p class="label">Google Meet Link</p>
						</div>
						<div class="col-md-9 col-6">
							<p class="isiankanan"><?=$cm->google_meet_link?></p>
						</div>
					</div> 
					<div class="row mt-3">
						<div class="col-md-3 col-6">
							<p class="label">Google Meet Password</p>
						</div>
						<div class="col-md-9 col-6">
							<p class="isiankanan"><?=$cm->google_meet_password?></p>
						</div>
					</div> -->
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Assessment Description</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-12">
							<p class="isiankanan"><?=$cm->task_description?></p>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Resource</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-12">
							<p class="isiankanan"><?=$cm->resource?></p>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-12 col-12">
							<p class="label">Time Allocation</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-12">
							<p class="isiankanan"><?=$cm->time_allocation_a?>x<?=$cm->time_allocation_b?> minutes</p>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-3 col-6">
							<p class="label">Due Date</p>
						</div>
						<div class="col-md-9 col-6">
							<p class="isiankanan"><?=$cm->deadline_date?>, <?=$cm->deadline_time?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
				</div>
			</div>
			<?php
					$i++;}
				}
			?>
			<div class="row mt-3">
				<div class="col-md-5 col-6" style="text-align:left;">
					<p class="text_bold text19">Overall Bank of Competencies</p></div>
				<div class="col-md-6 col-5" style="text-align:right;">
					<p class="view_details" id="view_details_graph_overall_boc" onclick="view_detail_graph_overall_boc()">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_graph_overall_boc" onclick="view_less_graph_overall_boc()">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
				</div>
				<div class="col-md-12 col-12 graph_overall_boc text-center">
					<div id="container"></div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
				</div>
			</div>
			<!-- <div class="row mt-3">
				<div class="col-md-6 col-12">
					<p class="text_bold text19" style="margin-top: 3%;margin-bottom:-1%">Strength Capture & BSTEAMS</p>
				</div>
				<div class="col-md-5 col-12">
					<button
						type="button"
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium float-right"
						style="background-color:white;width:145px;margin-right:0;margin-top: 2%;"
						id="input_review">Input Review</button>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-md-6 col-12">
					<p class="text_bold text19" style="margin-top: 3%;margin-bottom:-1%">Strength Capture & BSTEAMS from Teacher</p>
				</div>
				<div class="col-md-5 col-12">
					<button
						type="button"
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium float-right"
						style="background-color:white;width:145px;margin-right:0;margin-top: 2%;"
						id="strength_capture_from_teacher">View Review</button>
				</div>
			</div> -->
		</div>

		<!-- Upload Task -->

		<div class="col-md-9" id="div_task" style="padding:35px 10px 10px 60px;">
			<div class="row">
				<div class="row">
					<div class="col-md-12 col-12">
						<p class="judul_kanan"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
						<p><?= $detail->class_name?></p>
					</div>
				</div>
			</div>
			<?php
				$i=1;
				if (! empty($class_mission)) {
					foreach ($class_mission as $cm) {
			?>
			<div class="row mt-3 mission" id="mission<?=$cm->class_mission_id?>">
				<div class="row">
					<div class="col-md-11">
						<p class="judul_kanan">Mission <?=$i?></p>
						<p class="label">Assessment Description</p>
						<p class="isiankanan"><?=$cm->task_description?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<p class="label">Due Date</p>
					</div>
					<div class="col-md-3">
						<p class="isiankanan"><?=$cm->deadline_date?>, <?=$cm->deadline_time?></p>
					</div>
					<div class="col-md-2">
						<p class="label">Date Submitted</p>
					</div>
					<div class="col-md-3">
						<?php if($cm->status_task2 != 0){?>
						<p class="isiankanan"><?=$cm->status_date2?>,<?=$cm->status_time2?></p>
						<?php } else {?>
						<p class="isiankanan">-</p>
						<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<p class="label">Status</p>
					</div>
					<div class="col-md-3">
						<?php
						if($cm->status_task == 0) {
						?>
							<p class="isiankanan">Not Upload Yet</p>
						<?php
							}else if($cm->status_task == 2) {
						?>
							<p class="isiankanan">Not Checked Yet</p>
						<?php
							}else if($cm->status_task == 3) {
						?>
							<p class="isiankanan">Assessed&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/assessed.png" class="img-fluid" alt="Responsive image"></p>
						<?php
							}
						?>
					</div>
					<div class="col-md-2">
						<p class="label">Date Assessed</p>
					</div>
					<div class="col-md-3">
						<?php if($cm->status_task3 != 0){?>
						<p class="isiankanan"><?=$cm->status_date3?>,<?=$cm->status_time3?></p>
						<?php } else {?>
						<p class="isiankanan">-</p>
						<?php }?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-2">
						<p class="label">Reference</p>
					</div>
				</div>

				<div class="row">
						<?php
						if(!empty ($class_mission_link)){
							foreach($class_mission_link as $cml){
							foreach($cml as $res){
								if($res->class_mission_id == $cm->class_mission_id){
						?>

						<div class="col-md-2 col-2">
							<p class="isiankanan"><?=$res->name?></p>
						</div>
						<div class="col-md-10 col-10">
							<p class="isiankanan"><a href="<?=$res->link?>"><?=$res->link?></a></p>
						</div>
					
						<?php 	}
								}
							}
						}	
						?>
				</div>	

				<div class="row">
					<div class="col-md-11 col-11">
						<textarea 
							class="form-control input" 
							style="color: black; margin-top: 3%;" 
							id="task<?=$cm->class_mission_id?>"
							name="task<?=$cm->class_mission_id?>" 
							rows="4"
							placeholder="Enter Your Assessment Here"
							<?php if($cm->status_task != 0){?>
							readonly="true"
							<?php } ?>><?=$cm->task?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-6">
						<ul class="list-group" id="task_file_list_<?=$cm->class_mission_participants_id?>">
						</ul>
					</div>
				</div>
				<?php if($cm->status_task == 0){?>
				<div class="row">
					<div class="col-md-11 col-11">
						<button class="btn btn-secondary btn_remove_outline btn_outline_blue mt-3 mb-5" id="btn_upload_file_<?=$cm->class_mission_participants_id?>" type="button" data-toggle="modal" data-target="#modal_upload_file_task"><span style="margin-right:8px" class="fa fa-plus"></span>Add a file</button>
					</div>
				</div>
				<?php } ?>

				<div class="row">
					<div class="col-md-3">
						<p class="label" style="margin-top: 15%;">Student's Excitement
						<?php if($cm->status_task != 0){?>
						<?=$cm->rating?>
						<?php } ?>&nbsp;&nbsp;<span class="star fa fa-star"></span></p>
					</div>
					<?php if($cm->status_task == 0){?>
					<div class="col-md-9"  style="margin-top: 2%;">
						<div class="star-rating"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<?php } ?>
				</div>
				<?php if($cm->status_task == 3){?>
				<div class="row">
					<div class="col-md-11 col-11">
						<p>Teacher Review</p>
						<textarea 
						class="form-control input" 
						style="color: black;" 
						rows="4"
						placeholder="Enter Your Assessment Here"
						readonly="true"><?=$cm->task_review?></textarea>
					</div>
				</div>
				<?php } ?>
				<input 
					type="text" 
					class="custom-control-input input" 
					id="rating_star<?=$cm->class_mission_id?>" 
					name="rating_star"
					/>
				<div class="row mt-3" style="margin-bottom: 8%;">
					<div class="col-md-12">
						<?php if($cm->status_task == 0){?>
						<button
							type="button"
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width:150px;margin-left:0px;"
							onclick="submit_task(<?=$detail->class_id?>,<?=$cm->class_mission_id?>,<?=$cm->class_mission_participants_id?>)">Submit Assessment</button>
						<?php } ?>
					</div>
				</div>
			</div>
			<?php
					$i++;}
				}
			?>
		</div>

		<!-- Strength Capture -->

		<div class="col-md-9" id="div_input_review" style="padding:8px 10px 10px 50px;">
			<div class="sidenav row text-center">
				<a class="col-md-3 col-6 sn-item active" id="strength_capture"><p style="margin-top:15px;">Strength Capture</p></a>
				<a class="col-md-3 col-6 sn-item" id="bsteams"><p style="margin-top:15px;">BSTEAMS</p></a>
			</div>

			<br>

			<div class="row" id="div_strength_capture" style="padding-left:25px;float: left; clear: left;">
				<div class="row">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">S</p>
					</div>
					<div class="col-md-11">
						<p>Servicing</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="s_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->s_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-s-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->s_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>

				

				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">T</p>
					</div>
					<div class="col-md-11">
						<p>Thinking</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="t1_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->t1_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-t1-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->t1_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>



				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">R</p>
					</div>
					<div class="col-md-11">
						<p>Reasoning</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="r_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->r_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-r-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->r_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>



				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">E</p>
					</div>
					<div class="col-md-11">
						<p>Elementary</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="e_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->e_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-e-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->e_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>



				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">N</p>
					</div>
					<div class="col-md-11">
						<p>Networking</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="n_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->n_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-n-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->n_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>



				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">G</p>
					</div>
					<div class="col-md-11">
						<p>Generating Idea</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="g_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->g_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-g-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->g_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>

				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">T</p>
					</div>
					<div class="col-md-11">
						<p>Technical</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="t2_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->t2_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-t2-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->t2_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>



				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">H</p>
					</div>
					<div class="col-md-11">
						<p>Headman</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="h_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->h_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-h-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->h_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<button
						type="button"
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
						style="background-color:white; width:180px; margin-top: 5%; margin-left: 10%; margin-bottom: 15%;"
						onclick="submit_strength(<?=$detail->class_id?>)">Submit Review</button>
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-11">
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-11">
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-9">
					</div>
				</div>
			</div>

			<!-- BSTREAM -->

			<div class="row" id="div_bsteams" style="padding-left:25px;float: left; clear: left;">
				<div class="row" >
					<div class="col-md-1" style="margin-top: -9px;">
						<p class="judul_kanan">B</p>
					</div>
					<div class="col-md-11">
						<p>Business</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_b"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->b_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-b"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->b_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">S</p>
					</div>
					<div class="col-md-11">
						<p>Sciences</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_s1"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->s1_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-s1"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->s1_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">T</p>
					</div>
					<div class="col-md-11">
						<p>Technology</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_t"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->t_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-t"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->t_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">E</p>
					</div>
					<div class="col-md-11">
						<p>Engineering</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_e"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->e_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-e"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->e_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">A</p>
					</div>
					<div class="col-md-11">
						<p>Arts</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_a"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->a_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-a"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture!=null){ echo $class_strength_capture->a_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>	
					</div>
				</div>


				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">M</p>
					</div>
					<div class="col-md-11">
						<p>Mathematics</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_m"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->m_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-m"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						&nbsp;&nbsp;<?php if($class_strength_capture!=null){ echo $class_strength_capture->m_rating;}?><span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 2%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">S</p>
					</div>
					<div class="col-md-11">
						<p>Social Awareness</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_s2"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture!=null){ echo $class_strength_capture->s2_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement</p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-s2"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
					<div class="bintang">
						<p>
						&nbsp;&nbsp;<?php if($class_strength_capture!=null){ echo $class_strength_capture->s2_rating;}?><span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 2%;">
					<div class="col-md-12">
						<button
						type="button"
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
						style="background-color:white;width:180px;margin-top: 2%; margin-left: 10%; margin-bottom: 8%;"
						onclick="submit_bsteams(<?=$detail->class_id?>)">Submit Review</button>
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-11">
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-11">
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-9">
					</div>
				</div>
			</div>
		</div>


		<!-- Strength Capture dari Guru -->

		<div class="col-md-9" id="div_strength_capture_bsteams_from_teacher" style="padding:13px 10px 10px 50px;">
			<div class="sidenav row text-center">
				<a class="col-md-3 col-6 sn-item active" id="strength_capture_from_teacher"><p style="margin-top:15px;">Strength Capture</p></a>
				<a class="col-md-3 col-6 sn-item" id="bsteams_from_teacher"><p style="margin-top:15px;">BSTEAMS</p></a>
			</div>

			<br>

			<div class="row" id="div_strength_capture_from_teacher" style="padding-left:25px;float: left; clear: left;">
				<div class="row">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">S</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="s_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->s_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->s_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>



				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">T</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="t1_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->t1_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->t1_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">R</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="r_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->r_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
						<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->r_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">E</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="e_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->e_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->e_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">N</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="n_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->n_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->n_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">G</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="g_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->g_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->g_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">T</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="t2_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->t2_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->t2_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">H</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="h_strength"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->h_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang" style="margin-bottom: 6%;">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->h_strength_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>
			</div>


			<!-- BSTEAMS dari Guru -->

			<div class="row" id="div_bsteams_from_teacher" style="padding-left:25px;float: left; clear: left;">
				<div class="row">
					<div class="col-md-1" style="margin-top: -9px;">
						<p class="judul_kanan">B</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_b"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->b_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->b_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">S</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_s1"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->s1_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->s1_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">T</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_t"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->t_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->t_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">E</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_e"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->e_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->e_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">A</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_a"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->a_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->a_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">M</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_m"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->m_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->m_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>


				<div class="row" style="margin-top: 4%;">
					<div class="col-md-1" style="margin-top: -6px;">
						<p class="judul_kanan">S</p>
					</div>
					<div class="col-md-11">
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="reflection_s2"
							rows="2"
							placeholder="Insert Reflection"
							readonly="true"><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->s2_reflection;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-12">
						<p style="margin-top:5px; margin-left: 8%;">Excitement</p>
					</div>
					<div class="bintang" style="margin-bottom: 3%;">
						<p>
							<?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->s2_rating;}?>&nbsp;&nbsp;<span class="star fa fa-star"></span>
						</p>
					</div>
				</div>
			</div>
			<div class="row" id="div_progress_report" style="padding-left:10px;">
				<p><?php if($class_strength_capture_teacher!=null){ echo $class_strength_capture_teacher->progress_report;}?></p>
			</div>
		</div>
	</div>
</div>
<!-- Modal Upload File Task-->
<div class="modal fade" id="modal_upload_file_task" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text30 text_bold mb-0">Upload File Here</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('classes/upload_task_file/', 'id="form_modal_upload_file_task" class="dragdrop" method="post" enctype="multipart/form-data"') ?>
				<input type="hidden" id="class_mission_participants_id" name="class_mission_participants_id" value="">
				<div class="md-form mx-auto px-3up">
					<div class="form-group">
						<div class="box__input">
							<svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z" /></svg>
							<input type="file" name="files" id="file" class="box__file"/>
							<label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
						</div>
						<div class="box__uploading">Uploading&hellip;</div>
						<div class="box__success">Done! <a href="#" class="box__restart" role="button">Upload more?</a></div>
						<div class="box__error">Error! <span></span>. <a href="#" class="box__restart" role="button">Try again!</a></div>
					</div>
				</div>
				<?= form_close() ?>						
			</div>
		</div>
	</div>
</div>
<!--/.Modal Upload File Task-->
<script type="text/javascript">
    const base_url = "<?= base_url() ?>";
	const class_mission = <?= json_encode($class_mission) ?>;
	const bank_of_competencies = <?= json_encode($bank_of_competencies) ?>;
	const bank_of_competencies_detail = <?= json_encode($bank_of_competencies_detail) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/detail_my_class_view.js"></script>
<script src="<?= base_url(); ?>assets/js/dragdrop.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/dragdrop.css">
</main>
<!--Main layout -->