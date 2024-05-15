<!--Main layout-->
<script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
<main>
<style>
.btn_create_class{
	padding: 8px 16px;
}
.class{
	font-weight: 500;
	font-size: 32px;
	color: #1E3243;
	margin: 0;
}
.title{
	font-weight: 500;
	font-size: 20px;
	color: #3D6586;
}
.sub_title{
	font-weight: 400;
	font-size: 16px;
	color: #181823;
}
.detail_meeting{
	font-weight: 400;
    font-size: 16px;
	color: #181823;
}
.create_new_class{
	font-weight: 500;
	font-size: 20px;
	color: #1E3243;
}
.create_new_class:hover{
	font-weight: 500;
	font-size: 20px;
	color: #1E3243;
}
.preview{
	font-weight: 600;
	font-size: 16px;
	color: #1E3243;
}
.div_class{
	background: #FFFFFF;
	border-radius: 16px;
	margin:0;
	padding:32px 36px 32px 36px;
}
.my_class{
	font-weight: 600;
	font-size: 18px;
	color: #1E3243;
}
.grade_subject{
	font-weight: 400;
	font-size:16px;
	color: #1E3243;
}
.meeting_title{
	font-weight: 500;
	font-size:24px;
	color: #335470;
}
.head_meeting_table{
	font-weight: 500;
	font-size: 17px;
	color: #1E3243;
	margin:0;
}
.navbar{
	padding:0;
	box-shadow:none;
	position: absolute;
	right: 0;
}
.navbar-nav{
	box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.25);
}
.navbar-collapse{
	padding:10px;
	background:#FFFFFF;
	border-radius:16px;
	z-index:2;
}
.navbar-toggler{
	width:100%;
	display: flex;
	justify-content: end;
}
.nav-item{
	padding: 5px 10px 5px 10px;
}
.nav-item:hover{
	color: #000000;
    background-color: #D8E0E7;
}
.nav-link, .nav-link:hover{
	font-size: 14px;
	color: #000000;
}
.navbar-toggler.navbar-toggler:hover,.navbar-toggler:focus{
	background: #FFFFFF !important;
	border:0;
	outline:0;
}
.navbar-toggler .collapsed,.navbar-toggler:focus{
	background: transparent;
}
.navbar-toggler.navbar-toggler:hover{
	background: #FFFFFF !important;
	border:0;
	outline:0;
}
.close_modal{
	border: 2px solid #DC3545;
	border-radius: 8px;
	color: #DC3545;
	padding: 7px 16px;
	cursor: pointer;
	text-align:center;
}
.close_modal:hover{
	background-color: #DC3545;
	color: #FFFFFF !important;
}
#loading-overlay,#loading-overlay-modal-delete-meeting{
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
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
/* custom alert */
.slit-in-vertical {
	-webkit-animation: slit-in-vertical 0.45s ease-out both;
	        animation: slit-in-vertical 0.45s ease-out both;
}
@-webkit-keyframes slit-in-vertical {
  0% {
    -webkit-transform: translateZ(-800px) rotateY(90deg);
            transform: translateZ(-800px) rotateY(90deg);
    opacity: 0;
  }
  54% {
    -webkit-transform: translateZ(-160px) rotateY(87deg);
            transform: translateZ(-160px) rotateY(87deg);
    opacity: 1;
  }
  100% {
    -webkit-transform: translateZ(0) rotateY(0);
            transform: translateZ(0) rotateY(0);
  }
}
@keyframes slit-in-vertical {
  0% {
    -webkit-transform: translateZ(-800px) rotateY(90deg);
            transform: translateZ(-800px) rotateY(90deg);
    opacity: 0;
  }
  54% {
    -webkit-transform: translateZ(-160px) rotateY(87deg);
            transform: translateZ(-160px) rotateY(87deg);
    opacity: 1;
  }
  100% {
    -webkit-transform: translateZ(0) rotateY(0);
            transform: translateZ(0) rotateY(0);
  }
}

/*---------------#region Alert--------------- */

#dialogoverlay{
  opacity: .8;
  position: fixed;
  top: 0px;
  left: 0px;
  background: #707070;
  width: 100%;
  height:100%;
  z-index: 10000;
}

#dialogbox{
  position: fixed;
  transition: 0.3s;
  width: 40%;
  height:100%;
  z-index: 10000;
  top:0;
  left: 0;
  right: 0;
  margin: auto;
}

#dialogbox > div:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.911);
}

#dialogbox > div{ 
  background: #FDEDC8;
  border-radius:7px;
  margin:8px; 
}

#dialogbox > div > #dialogboxhead{ 
  font-weight: 600;
  font-size:18px; 
  padding:10px; 
  color: #1E3243;
}

#dialogbox > div > #dialogboxbody{ 
  font-weight: 400;
  font-size:16px; 
  padding:20px; 
  color: #1E3243;
}

#dialogbox > div > #dialogboxfoot{ 
  padding:10px; 
  text-align:right; 
}

/*#endregion Alert*/
/* end of custom alert */
/* medium screen - for TABLET 991px or less */
@media screen and (max-width: 991px) {
}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
	
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
	
}
</style>
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div id="content" class="p-4 p-md-5 pt-3">
	<div class="d-flex justify-content-between align-items-center mt-3 mb-2">
		<p class="class">Class</p>
		<a href="<?= base_url(); ?>user/">
			<?php if($this->session->userdata('user_image') != NULL) { ?>
				<img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="35" height="35" class="rounded-circle">
			<?php } else { ?>
				<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="35" height="35" class="rounded-circle">
			<?php } ?>
		</a>
	</div>
    <p class="d-flex align-items-center mt-3"><a class="create_new_class" href="<?=base_url()?>classes/details/<?=$class_mission->class_id?>/1"><img src="<?=base_url()?>assets/img/icon/icon_back.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Detail class</a></p>
	<div class="div_class mt-3">
		<!-- detail meeting -->
		<div class="row">
			<div class="col-8 col-md-9">
				<p class="meeting_title m-0"><?= $class_mission->mission_title?></p>
				<p class="sub_title"><?= $class_mission->sub_topic?></p>
			</div>
			<div class="col-4 col-md-3">
				<!-- <div style="position:absolute;top:0;"><button class="btn_create_class">Start Meeting</button></div> -->
					<!--Navbar-->
					<nav class="navbar">

						<!-- Collapse button -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
						aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><img src="<?= base_url() ?>assets/img/icon/three-dots-vertical.png" style="max-width:100%;height:auto;"></button>

						<!-- Collapsible content -->
						<div class="collapse navbar-collapse" id="navbarSupportedContent15">

						<!-- Links -->
						<ul class="detail_meeting navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="#" onclick="copy_mission(<?= $class_mission->class_id ?>,<?=$class_mission->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/copy-class.png" style="max-width:100%;height:auto;margin-right:10px;">Copy Meeting</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url()?>meeting/edit/<?=$class_mission->class_mission_id?>"><img src="<?= base_url() ?>assets/img/icon/edit-class.png" style="max-width:100%;height:auto;margin-right:10px;">Edit Meeting</a>
							</li>
							
							<li class="nav-item">
								<a class="nav-link" href="#" onclick="delete_mission(<?=$class_mission->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/delete-class.png" style="max-width:100%;height:auto;margin-right:10px;">Delete Meeting</a>
							</li>
						</ul>
						<!-- Links -->

						</div>
						<!-- Collapsible content -->

					</nav>
					<!-- /.Navbar -->
			</div>
		</div>
		<div class="row">
			<div class="col-6 col-md-6">
				<!-- week -->
				<p class="detail_meeting d-flex align-items-center"><img src="<?=base_url()?>assets/img/icon/icon_week.png" style="max-width:100%;height:auto;margin-right:10px;">
				<?php if($class_detail->subject_parent_id == 4){ ?>
					Session 
				<?php }else{ ?>
					Week 
				<?php } ?>
				<?= $class_mission->week ?>
				</p>
				<!-- publish datetime -->
				<p class="detail_meeting d-flex align-items-center"><img src="<?=base_url()?>assets/img/icon/icon_calendar_blue.png" style="max-width:100%;height:auto;margin-right:10px;"><?=$class_mission->publish_datetime?></p>
				<!-- time allocation -->
				<p class="detail_meeting d-flex align-items-center"><img src="<?=base_url()?>assets/img/icon/icon_clock.png" style="max-width:100%;height:auto;margin-right:10px;"><?=$class_mission->time_allocation_a?>x<?=$class_mission->time_allocation_b?> minutes</p>
			</div>
			<div class="col-6 col-md-6">
				<!-- on or off site -->
				<p class="detail_meeting d-flex align-items-center">
					<?php if($class_mission->face_to_face == 0){?>
						<img src="<?=base_url()?>assets/img/icon/icon_video.png" style="max-width:100%;height:auto;margin-right:10px;">Online
					<?php }else{ ?>
						<img src="<?=base_url()?>assets/img/icon/icon_incampus.png" style="max-width:100%;height:auto;margin-right:10px;">In campus
					<?php } ?>
				</p>
				<!-- if off site, show the link meeting -->
				<?php if($class_mission->face_to_face == 0){?>
					<p class="detail_meeting d-flex align-items-center" style="margin-right:30px;"><img src="<?=base_url()?>assets/img/icon/icon_link.png" style="max-width:100%;height:auto;margin-right:10px;"><a class="detail_meeting" href="<?=$class_mission->google_meet_link?>" style="width:100%;"><?=$class_mission->google_meet_link?></a></p>
				<?php } ?>
				<!-- if on site, show the site -->
				<?php if($class_mission->face_to_face == 1){?>
					<p class="detail_meeting d-flex align-items-center" style="margin-right:30px;"><img src="<?=base_url()?>assets/img/icon/icon_location.png" style="max-width:100%;height:auto;margin-right:10px;"><?=$class_mission->meeting_location?></p>
				<?php } ?>
			</div>
		</div>
		<!-- line grey -->
		<?php if($class_detail->curicullum_id == 2){?>
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Profil Pelajar Pancasila -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Profil Pelajar Pancasila ( Student Character Development According to the Pancasila )</p>
				<ul class="detail_meeting m-0">
					<?php if ($class_mission->profil_pembelajaran_pancasila != "") {?>
					<li><?= htmlspecialchars($class_mission->profil_pembelajaran_pancasila) ?></li>
					<?php } ?> 
					<?php if ($class_mission_profil_pembelajaran_pancasila != "") {?>
					<?php foreach($class_mission_profil_pembelajaran_pancasila as $res){ ?>
						<li><?= $res->name ?> (<?= $res->english_name ?>)</li>
					<?php } ?>
					<?php } ?> 
				</ul>
			</div>
		</div>
		<?php } ?>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Pencapaian Tujuan Pembelajaran -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Learning Goals</p>
				<ul class="detail_meeting m-0">
				<?php foreach($class_mission_pencapaian_tujuan_pembelajaran as $res){ ?>
					<li><?= $res->name ?></li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Competencies -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">
					<?php if($class_detail->curicullum_id == 1){ ?>
						Competencies
					<?php }else if($class_detail->curicullum_id == 2){ ?>
						Learning Achievement
					<?php }?>
				</p>
				<div class="detail_meeting">
				<?php if ($class_mission->bank_of_competencies != "") {?>
					<p class="detail_meeting m-0"><?= $class_mission->bank_of_competencies ?></p>
				<?php } ?>
				<!-- competencies cambridge -->
				<?php $subject_id = "";
						foreach ($class_mission_competencies_cambridge as $res) {
							if($res->subject_id != $subject_id){ ?>
							<p class="detail_meeting m-0" style="font-weight:500;"><?= $res->subject_name ?></p>
								<ul class="detail_meeting m-0">
								<?php $level_1 = "";
								foreach ($class_mission_competencies_cambridge as $res2) { // echo lv1
									if($res2->subject_id == $res->subject_id){
										if($res2->level_1 != $level_1){ ?>
											<li><?= $res2->level_1 ?></li>
											<ul class="detail_meeting m-0">
											<?php $level_2 = "";
											foreach ($class_mission_competencies_cambridge as $res3) { // echo lv 2
												if($res3->level_1 == $res2->level_1 && $res3->subject_id == $res2->subject_id){
												if($res3->level_2 != $level_2){?>
													<li><?= $res3->level_2 ?></li>
													<ul class="detail_meeting m-0">
													<?php foreach($class_mission_competencies_cambridge as $res4){
														if($res4->subject_id == $res3->subject_id && $res4->level_1 == $res3->level_1 && $res4->level_2 == $res3->level_2){ // echo lv 3 ?>
														<li><?= $res4->level_3 ?></li>
													<?php }
													}?>
													</ul>
											<?php	} $level_2 = $res3->level_2;
												}
											}// end of echo lv 2 ?>
											</ul>
								<?php }$level_1 = $res2->level_1;
									}
								}// end of echo lv 1 ?>
								</ul>
				<?php 		}$subject_id = $res->subject_id;
						} 
				?>
				<?php if($class_detail->curicullum_id == 1){ ?>
					<!-- competencies k13 -->
					<?php $subject_id = "";
							foreach ($class_mission_competencies_k13 as $res) {
								if($res->subject_id != $subject_id){ ?>
								<p class="detail_meeting m-0" style="font-weight:500;"><?= $res->subject_name ?></p>
									<ul class="detail_meeting m-0">
									<?php $core_competencies = "";
									foreach ($class_mission_competencies_k13 as $res2) { // echo lv1
										if($res2->subject_id == $res->subject_id){
											if($res2->core_competencies != $core_competencies){ ?>
												<li><?= $res2->core_competencies ?></li>
												<ul class="detail_meeting m-0">
												<?php $capaian_pembelajaran = "";
												foreach ($class_mission_competencies_k13 as $res3) { // echo lv 2
													if($res3->core_competencies == $res2->core_competencies && $res3->subject_id == $res2->subject_id){ ?>
														<li><?= $res3->basic_competencies ?></li>
												<?php	} 
													}// end of echo lv 2 ?>
												</ul>
									<?php }$core_competencies = $res2->core_competencies;
										}// end of echo lv 1
									} ?>
									</ul>
					<?php 		}$subject_id = $res->subject_id;
							} ?>
				<?php }else if($class_detail->curicullum_id == 2){ ?>
					<!-- competencies merdeka -->
					<?php $subject_id = "";
							foreach ($class_mission_competencies_merdeka as $res) {
								if($res->subject_id != $subject_id){ ?>
								<p class="detail_meeting m-0" style="font-weight:500;"><?= $res->subject_name ?></p>
									<ul class="detail_meeting m-0">
									<?php $elemen = "";
									foreach ($class_mission_competencies_merdeka as $res2) { // echo lv1
										if($res2->subject_id == $res->subject_id){
											if($res2->elemen != $elemen){ ?>
												<li><?= $res2->elemen ?></li>
												<ul class="detail_meeting m-0">
												<?php $capaian_pembelajaran = "";
												foreach ($class_mission_competencies_merdeka as $res3) { // echo lv 2
													if($res3->elemen == $res2->elemen && $res3->subject_id == $res2->subject_id){
													if($res3->capaian_pembelajaran != $capaian_pembelajaran){?>
														<li><?= $res3->capaian_pembelajaran ?></li>
														<?php if($res3->tujuan_pembelajaran != " "){ ?>
														<ul class="detail_meeting m-0">
														<?php foreach($class_mission_competencies_merdeka as $res4){
															if($res4->subject_id == $res3->subject_id && $res4->elemen == $res3->elemen && $res4->capaian_pembelajaran == $res3->capaian_pembelajaran){ // echo lv 3 ?>
															<li><?= $res4->tujuan_pembelajaran ?></li>
														<?php }
														}?>
														</ul>
														<?php }?>
												<?php	} $capaian_pembelajaran = $res3->capaian_pembelajaran;
													}
												}// end of echo lv 2 ?>
												</ul>
									<?php }$elemen = $res2->elemen;
										}
									}// end of echo lv 1 ?>
									</ul>
					<?php 		}$subject_id = $res->subject_id;
							} 
					?>
				<?php }?>
				</div>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Learning objectives / Tujuan pembelajaran -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Learning objectives</p>
				<ul class="detail_meeting m-0">
					<?php foreach ($class_mission_learning_objectives as $cmlo) {
						if($cmlo->content != ""){ ?>
						<li><?= htmlspecialchars($cmlo->content) ?></li>
					<?php }
					} ?>
				</ul>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Lesson activity / Materi Esensial -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Lesson Activities</p>
				<?php $i = 1; foreach($class_mission_lesson_activities as $res){
						if($res->title != ""){ ?>
							<p class="detail_meeting m-0" style="font-weight:500;">Activity <?=$i?></p>
							<ul class="detail_meeting m-0">
								<li><?= nl2br($res->title) ?></li>
								<li><?= nl2br($res->description) ?></li>
								<li><?= nl2br($res->description_2) ?></li>
							</ul>
				<?php	$i++;}
				} ?>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Assessment Description -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Assessment Description</p>
				<p class="detail_meeting m-0"><?= nl2br($class_mission->task_description) ?></p>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Assessment -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Access Assessment Link</p>
				<?php foreach($class_mission_link as $res){
						if($res->name != ""){ ?>
							<div class="row">
								<div class="col-md-3 col-6">
									<p class="detail_meeting m-0"><?=$res->name?></p>
								</div>
								<div class="col-md-9 col-6">
									<a class="detail_meeting" href="<?=$res->link?>"><?=$res->link?></a>
								</div>
							</div>
				<?php 	}
				} ?>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Resources -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Resources</p>
				<?php foreach($class_mission_resource as $res){
						if($res->name != ""){ ?>
						<div class="row">
							<div class="col-md-3 col-6">
								<p class="detail_meeting m-0"><?=$res->name?></p>
							</div>
							<div class="col-md-9 col-6">
								<a class="detail_meeting" href="<?=$res->link?>"><?=$res->link?></a>
							</div>
						</div>
				<?php }
				} ?>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Core Concepts -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Core Concepts</p>
				<ul class="detail_meeting m-0">
				<?php foreach($class_mission_core_concept as $res){
					if($res->content != ""){ ?>
					<li><?= $res->content ?></li>
				<?php }
				} ?>
				</ul>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Core Skills -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Core Skills</p>
				<ul class="detail_meeting m-0">
				<?php foreach($class_mission_core_skill as $res){ ?>
					<li><?= $res->name ?></li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Class Activities -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Class Activities</p>
				<ul class="detail_meeting m-0">
				<?php foreach($class_mission_class_activity as $res){ ?>
					<li><?= $res->name ?></li>
				<?php } ?>
				</ul>
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Assessment Deadline -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Assessment Deadline</p>
				<p class="detail_meeting d-flex align-items-center m-0" style="color:#DC3545;font-weight:500;"><img src="<?=base_url()?>assets/img/icon/icon_calendar_blue.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;<?=$class_mission->deadline_datetime?></p>
			</div>
		</div>
		<?php if($class_detail->curicullum_id == 2){ ?>
		<!-- line grey -->
		<!-- <div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div> -->
		<!-- Phase -->
		<!-- <div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Phase</p>
				<?php if ($class_mission->phase_id != NULL) {?>
					<p class="detail_meeting m-0"><?= $class_mission->phase->name ?></p>
				<?php } ?> 
			</div>
		</div> -->
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Target Peserta Didik -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Student Target</p>
				<?php if ($class_mission->target_peserta_didik_id != NULL) {?>
					<p class="detail_meeting m-0"><?= $class_mission->target_peserta_didik->name ?></p>
				<?php } ?> 
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Jumlah Peserta Didik -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Number of Students</p>
				<?php if ($class_mission->jumlah_peserta_didik != NULL) {?>
					<p class="detail_meeting m-0"><?= $class_mission->jumlah_peserta_didik ?></p>
				<?php } ?> 
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Metode Pembelajaran -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Learning Method</p>
				<?php if ($class_mission->metode_pembelajaran_id != NULL) {?>
					<p class="detail_meeting m-0"><?= $class_mission->metode_pembelajaran->name ?></p>
				<?php } ?> 
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Kata Kunci -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Keywords</p>
				<?php if ($class_mission->kata_kunci != NULL) {?>
					<p class="detail_meeting m-0"><?= htmlspecialchars($class_mission->kata_kunci) ?></p>
				<?php } ?> 
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- keterampilan -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Skills</p>
				<?php if ($class_mission->keterampilan != NULL) {?>
					<p class="detail_meeting m-0"><?= htmlspecialchars($class_mission->keterampilan) ?></p>
				<?php } ?> 
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Pertanyaan Esensial -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Trigger Questions</p>
				<?php if ($class_mission->pertanyaan_esensial != NULL) {?>
					<p class="detail_meeting m-0"><?= htmlspecialchars($class_mission->pertanyaan_esensial) ?></p>
				<?php } ?> 
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Refleksi Guru -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Teacher's Reflection</p>
				<?php if ($class_mission->refleksi_guru != NULL) {?>
					<p class="detail_meeting m-0"><?= htmlspecialchars($class_mission->refleksi_guru) ?></p>
				<?php } ?> 
			</div>
		</div>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<!-- Daftar Pustaka -->
		<div class="row mt-4 mb-4">
			<div class="col-12 col-md-12">
				<p class="title">Bibliography</p>
				<?php if ($class_mission->daftar_pustaka != NULL) {?>
					<p class="detail_meeting m-0"><?= htmlspecialchars($class_mission->daftar_pustaka) ?></p>
				<?php } ?> 
			</div>
		</div>
		<?php } ?>
		<!-- line grey -->
		<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
		<div class="row" style="margin-top:32px;">
			<div class="col-12 col-md-12 d-flex align-items-center justify-content-end">
				<!-- <a href="<?=base_url()?>download_pdf/lesson_plan/<?=$class_detail->class_id?>/<?=$class_mission->class_mission_id?>"><p class="preview d-flex align-items-center m-0 mr-3"><img src="<?=base_url()?>assets/img/icon/icon_polygon.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Preview</p></a> -->
				<a href="<?=base_url()?>download_pdf/lesson_plan/<?=$class_detail->class_id?>/<?=$class_mission->class_mission_id?>" target=”_blank”><button>Convert into Lesson Plan</button></a>
			</div>
		</div>
	</div>
</div>
<!-- Modal Delete Meeting -->
<div class="modal fade" id="modal_delete_meeting" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="loading-overlay-modal-delete-meeting">
					<div class="loading-icon"></div>
				</div>
				<input type="hidden" id="class_mission_id" value=""/>
				<p class="my_class">Delete meeting ?</p>
				<p class="grade_subject">Are you sure you want to delete this meeting?</p>
				<div class="row mt-3 d-flex align-items-center" style="padding-top:20px;width:100%;margin:0;">
					<div class="col-6 col-md-6 pl-0">
						<p class="close_modal m-0 text-center" style="color:red;cursor: pointer;" data-dismiss="modal">No, keep it</p>
					</div>
					<div class="col-6 col-md-6 p-0">
						<button type="button" class="btn_create_class" id="delete_meeting">Yes, delete it</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</main>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
</script>
<script src="<?= base_url(); ?>assets/js/detail_meeting.js"></script>
<!--Main layout -->