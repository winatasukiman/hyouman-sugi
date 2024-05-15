<script src="<?= base_url()?>assets/js/ckeditor/ckeditor.js"></script>
<link href="<?= base_url()?>assets/third_party/bower-select2/css/select2.min.css" rel="stylesheet" />
<script src="<?= base_url()?>assets/third_party/bower-select2/js/select2.min.js"></script>
<main>
<style>
.class{
	font-weight: 500;
	font-size: 32px;
	color: #1E3243;
	margin: 0;
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
.div_class{
	background: #FFFFFF;
	border-radius: 16px;
	margin:0;
	padding:32px 36px 32px 36px;
}
.label {
	font-weight: 500;
	font-size: 14px;
	color: #3D6586;
}
.optional{
	margin-left:2px;
	font-size: 12px;
	color: #DC3545;
	margin: 0;
    margin-left: 5px;
}
.general_information {
	font-weight: 600;
	font-size: 24px;
	color: #3D6586;
}
.view_details {
	color: #28557B;
}
.view_details:hover {
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
.wrapperz {
	position: relative;
}
.wrapper .span-left {
	position: absolute;
	left: 10px;
	top: 0px;
	display:flex;
	align-items:center;
	height:100%;
}
.wrapper .span-right {
	position: absolute;
	right: 10px;
	top: 0px;
	display:flex;
	align-items:center;
	height:100%;
}
.insert_link{
	border-radius: 8px;
	background-color:white;
	font-weight: 500;
	color: #3D6586 !important;
	border: 1px solid #BECCD7;
	display: flex;
	align-items: center;
}
.insert_link:hover{
	background-color: #BECCD7;
}
.detail_meeting{
	font-weight: 400;
    font-size: 16px;
	color: #181823;
}
.select2-container .select2-selection--multiple .select2-selection__rendered {
    display: inline !important;
    list-style: none !important;
    padding: 0 !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #e4e4e4 !important;
    border: 1px solid #aaa !important;
    border-radius: 4px !important;
    box-sizing: border-box !important;
    display: inline-block !important;
    margin-left: 5px !important;
    margin-top: 5px !important;
    padding: 0 !important;
    padding-left: 20px !important;
    position: relative !important;
    max-width: 100% !important;
    overflow: hidden !important;
    text-overflow: ellipsis !important;
    vertical-align: bottom !important;
    white-space: nowrap !important;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    border: none !important;
	
}
.select2-selection__choice__remove span{
	left: 0;
    position: absolute;
    margin-left: 5px;
	color: #28557B !important;
}
.select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
    background-color: #28557B !important;
    color: white;
}
.view_less, .div_sdg_indicator, .div_boc, .div_lo, .div_la, .div_assessment, .div_resources, .div_se, .div_ta, .div_pps, .div_cc, .div_cs, .div_ca, .div_n_close{
	display:none;
}
#loading-overlay, #loading-overlay-modal-start, #loading-overlay-modal-finish, #loading-overlay-modal-cancel, #loading-overlay-modal-copy{
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
<!--Section: User-->
<section id="user">
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
	<p class="d-flex align-items-center mt-3"><a class="create_new_class" href="<?=base_url()?>meeting/details/<?=$class_mission[0]->class_mission_id?>"><img src="<?=base_url()?>assets/img/icon/icon_back.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Detail Meeting</a></p>
	<div class="div_class mt-3">
		<?php if ($this->session->flashdata('category_success')) { ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
			</div>
		</div>
		<?php } ?>
		<?php if ($this->session->flashdata('category_error')) { ?>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
			</div>
		</div>
		<?php } ?>
		<div class="row p-3">
			<!--Mission-->
			<div class="col-md-12 col-12" id="div_mission">
				<?php $j = 1;foreach ($class_mission as $cm) { ?>
					<div id="div_mission<?=$cm->mission_id?>">
						<p class="general_information">General Information</p>
						<div class="row mt-2">
							<!-- topic -->
							<div class="col-md-6 col-6">
								<?php if($detail->subject_parent_id == 4){ ?>
								<label class="label">Module</label>
								<?php }else{ ?>
								<label class="label">Topic</label>
								<?php } ?>
								<div class="input-group">
									<input 
										type="text" 
										class="form-control input"
										id="mission_title<?=$cm->class_mission_id?>" 
										name="mission_title<?=$cm->class_mission_id?>" 
										placeholder="Meeting topic"
										value="<?=$cm->mission_title?>"/>
								</div>
							</div>
							<!-- sub topic -->
							<div class="col-md-6 col-6">
								<?php if($detail->subject_parent_id == 4){ ?>
								<label class="label">Topic</label>
								<?php }else{ ?>
								<label class="label">Sub Topic</label>
								<?php } ?>
								<div class="input-group">
									<input 
										type="text" 
										class="form-control input"
										id="sub_topic<?=$cm->class_mission_id?>" 
										name="sub_topic<?=$cm->class_mission_id?>" 
										placeholder="Meeting sub topic"
										value="<?=$cm->sub_topic?>"/>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<!-- meeting date time -->
							<div class="col-md-6 col-6">
								<label class="label">Meeting Date Time</label>
								<div class="wrapperz">
									<input 
										type="text" 
										class="form-control input dt_picker"
										id="publish_datetime<?=$cm->class_mission_id?>" 
										name="publish_datetime<?=$cm->class_mission_id?>" 
										placeholder="Schedule"
										value="<?=$cm->publish_date?>-<?=$cm->publish_time?>"
										readonly="true"
										style="padding-left:32px;"/>
										<span class="span-left"><i class="fa fa-calendar"></i></span>
										<span class="span-right"><img src="<?=base_url()?>assets/img/icon/icon_arrow_down.png" class="img-fluid"></span>
								</div>
							</div>
							<!-- assesment deadline -->
							<div class="col-md-6 col-6">
								<label class="label d-flex align-items-center">Assesment Deadline<p class="optional ">*Not required</p></label>
								<div class="wrapperz">
									<input 
									type="text"
									class="form-control input dt_picker"
									id="task_deadline<?=$cm->class_mission_id?>" 
									name="task_deadline<?=$cm->class_mission_id?>"
									placeholder="Deadline"
									value="<?=$cm->deadline_date?>-<?=$cm->deadline_time?>"
									readonly="true"
									style="padding-left:32px;"/>
									<span class="span-left"><i class="fa fa-calendar"></i></span>
									<span class="span-right"><img src="<?=base_url()?>assets/img/icon/icon_arrow_down.png" class="img-fluid"></span>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<!-- face to face -->
							<div class="col-md-6 col-6">
								<label class="label">Class setting</label>
								<select class="browser-default custom-select input form-control" id="face_to_face<?=$cm->class_mission_id?>" onclick="f2f(<?=$cm->class_mission_id?>)">
									<option disabled selected>Choose class setting</option>
									<option onclick="f2f_1(<?=$cm->class_mission_id?>)" value=1 <?=$cm->face_to_face == 1 ? ' selected' : ''; ?>>In Campus</option>
									<option onclick="f2f_1(<?=$cm->class_mission_id?>)" value=0 <?=$cm->face_to_face == 0 ? ' selected' : ''; ?>>Online</option>
								</select>
							</div>
							<!-- meeting link / location  -->
							<div class="col-md-6 col-6">
								<div id="meet_link<?=$cm->class_mission_id?>" style="<?php if($cm->face_to_face == 0) { echo "display:block;"; }else{ echo "display:none;";} ?>">
									<label class="label">Meeting Link</label>
									<input type="text" 
									class="form-control input"
									id="google_meet_link<?=$cm->class_mission_id?>" 
									name="google_meet_link<?=$cm->class_mission_id?>" 
									placeholder="Meeting Link"
									value="<?= $cm->google_meet_link ?>"/>
								</div>
								<div id="location_f2f_<?=$cm->class_mission_id?>" style="<?php if($cm->face_to_face == 1) { echo "display:block;"; }else{ echo "display:none;";} ?>">
									<label class="label">Location</label>
									<input 
									type="text" 
									class="form-control input"
									id="location<?=$cm->class_mission_id?>" 
									name="location<?=$cm->class_mission_id?>" 
									placeholder="Meeting location"
									value="<?= htmlspecialchars($cm->meeting_location) ?>"/>
								</div>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-6 col-6">
								<?php if($detail->subject_parent_id == 4){ ?>
								<label class="label">Session</label>
								<?php }else{ ?>
								<label class="label">Week</label>
								<?php } ?>
								<select class="form-control browser-default custom-select input" style="width:100%;" id="week<?=$cm->class_mission_id?>">
									<option disabled selected>Choose Week</option>
									<option value=1 <?=$cm->week == 1 ? ' selected' : ''; ?>>1</option>
									<option value=2 <?=$cm->week == 2 ? ' selected' : ''; ?>>2</option>
									<option value=3 <?=$cm->week == 3 ? ' selected' : ''; ?>>3</option>
									<option value=4 <?=$cm->week == 4 ? ' selected' : ''; ?>>4</option>
									<option value=5 <?=$cm->week == 5 ? ' selected' : ''; ?>>5</option>
									<option value=6 <?=$cm->week == 6 ? ' selected' : ''; ?>>6</option>
									<option value=7 <?=$cm->week == 7 ? ' selected' : ''; ?>>7</option>
									<option value=8 <?=$cm->week == 8 ? ' selected' : ''; ?>>8</option>
									<option value=9 <?=$cm->week == 9 ? ' selected' : ''; ?>>9</option>
									<option value=10 <?=$cm->week == 10 ? ' selected' : ''; ?>>10</option>
									<?php if($detail->subject_parent_id == 4){ ?>
										<option value=11 <?=$cm->week == 11 ? ' selected' : ''; ?>>11</option>
										<option value=12 <?=$cm->week == 12 ? ' selected' : ''; ?>>12</option>
										<option value=13 <?=$cm->week == 13 ? ' selected' : ''; ?>>13</option>
										<option value=14 <?=$cm->week == 14 ? ' selected' : ''; ?>>14</option>
										<option value=15 <?=$cm->week == 15 ? ' selected' : ''; ?>>15</option>
										<option value=16 <?=$cm->week == 16 ? ' selected' : ''; ?>>16</option>
										<option value=17 <?=$cm->week == 17 ? ' selected' : ''; ?>>17</option>
										<option value=18 <?=$cm->week == 18 ? ' selected' : ''; ?>>18</option>
										<option value=19 <?=$cm->week == 19 ? ' selected' : ''; ?>>19</option>
										<option value=20 <?=$cm->week == 20 ? ' selected' : ''; ?>>20</option>
										<option value=21 <?=$cm->week == 21 ? ' selected' : ''; ?>>21</option>
										<option value=22 <?=$cm->week == 22 ? ' selected' : ''; ?>>22</option>
										<option value=23 <?=$cm->week == 23 ? ' selected' : ''; ?>>23</option>
										<option value=24 <?=$cm->week == 24 ? ' selected' : ''; ?>>24</option>
										<option value=25 <?=$cm->week == 25 ? ' selected' : ''; ?>>25</option>
										<option value=26 <?=$cm->week == 26 ? ' selected' : ''; ?>>26</option>
										<option value=27 <?=$cm->week == 27 ? ' selected' : ''; ?>>27</option>
										<option value=28 <?=$cm->week == 28 ? ' selected' : ''; ?>>28</option>
										<option value=29 <?=$cm->week == 29 ? ' selected' : ''; ?>>29</option>
										<option value=30 <?=$cm->week == 30 ? ' selected' : ''; ?>>30</option>
										<option value=31 <?=$cm->week == 31 ? ' selected' : ''; ?>>31</option>
										<option value=32 <?=$cm->week == 32 ? ' selected' : ''; ?>>32</option>
										<option value=33 <?=$cm->week == 33 ? ' selected' : ''; ?>>33</option>
										<option value=34 <?=$cm->week == 34 ? ' selected' : ''; ?>>34</option>
										<option value=35 <?=$cm->week == 35 ? ' selected' : ''; ?>>35</option>
										<option value=36 <?=$cm->week == 36 ? ' selected' : ''; ?>>36</option>
										<option value=37 <?=$cm->week == 37 ? ' selected' : ''; ?>>37</option>
									<?php } ?>
								</select>	
							</div>
						</div>
						<p class="general_information mt-3">Lesson Planning</p>
						<!-- Profile Pembelajaran Pancasila -->
						<?php if($detail->curicullum_id == 2){ ?>
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-10 col-10">
								<label class="label">Profil Pelajar Pancasila (Student Character Development According to the Pancasila)</label>
							</div>
							<div class="col-md-2 col-2 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_pps<?=$cm->class_mission_id?>" onclick="view_detail_n('pps',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_pps<?=$cm->class_mission_id?>" onclick="view_less_n('pps',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_pps<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<select class="js-example-placeholder-multiple js-states form-control" style="width:100%;" id="profil_pembelajaran_pancasila<?=$cm->class_mission_id?>" multiple="multiple">
								<?php foreach ($profil_pembelajaran_pancasila as $ppp) { ?>
									<option value=<?= $ppp->profil_pembelajaran_pancasila_id ?> <?php foreach($cm->class_mission_profil_pembelajaran_pancasila as $cmppp){ if($cmppp->profil_pembelajaran_pancasila_id == $ppp->profil_pembelajaran_pancasila_id) echo 'selected'; } ?>><?= $ppp->name ?> (<?= $ppp->english_name ?>)</option>
								<?php } ?>	
								</select>
							</div>
						</div>
						</div>
						<?php } ?>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Pencapaian Tujuan Pembelajaran -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label>Learning Goals</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_ptp<?=$cm->class_mission_id?>" onclick="view_detail_n('ptp',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_ptp<?=$cm->class_mission_id?>" onclick="view_less_n('ptp',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_ptp<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12" >
								<select class="js-example-placeholder-multiple js-states form-control" style="width:100%;" id="ptp<?=$cm->class_mission_id?>" multiple="multiple">
								<?php foreach ($pencapaian_tujuan_pembelajaran as $ptp) { ?>
									<option value=<?= $ptp->pencapaian_tujuan_pembelajaran_id ?> <?php foreach($cm->class_mission_pencapaian_tujuan_pembelajaran as $cmptp){ if($cmptp->pencapaian_tujuan_pembelajaran_id == $ptp->pencapaian_tujuan_pembelajaran_id) echo 'selected'; } ?>><?= $ptp->name ?></option>
								<?php } ?>	
								</select>
							</div>
						</div> 
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- COMPETENCIES IF KI -->
						<!-- CAPAIAN PEMBELAJARAN IF MERDEKA -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-10 col-10">
								<?php if($detail->curicullum_id == 1){ ?>
									<label class="label">Competencies</label>
								<?php }else if($detail->curicullum_id == 2){ ?>
									<label class="label">Learning Achievements</label>
								<?php }?>
							</div>
							<div class="col-md-2 col-2 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_boc<?=$cm->class_mission_id?>" onclick="view_detail_n('boc',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_boc<?=$cm->class_mission_id?>" onclick="view_less_n('boc',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_boc<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
							<div id="comp_result" class="detail_meeting">
								<?php if ($cm->bank_of_competencies != "") {?>
									<p class="detail_meeting m-0"><?= $cm->bank_of_competencies ?></p>
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
								<?php if($detail->curicullum_id == 1){ ?>
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
								<?php }else if($detail->curicullum_id == 2){ ?>
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
											} ?>
								<?php }?>
								</div>
								<select id="competenciesCambridge" class="form-control browser-default custom-select input mt-2" style="width:100%;" onchange="openModalCompetenciesCambridge(this)">
									<option disabled selected>Cambridge Subject</option>
									<?php $subject_id = "";
									foreach($competencies_cambridge as $cc){
										if($subject_id != $cc->subject_id){ ?>
											<option value=<?=$cc->subject_id?>><?= $cc->subject_name?></option>
										<?php }$subject_id = $cc->subject_id;
									}?>
								</select>
								<?php if($detail->curicullum_id == 1){ ?>
									<select id="competenciesK13" class="form-control browser-default custom-select input mt-2" style="width:100%;" onchange="openModalCompetenciesK13(this)">
										<option disabled selected>Indonesian Curriculum</option>
										<?php $subject_id = "";
										foreach($competencies_k13 as $cc){
											if($subject_id != $cc->subject_id){ ?>
												<option value=<?=$cc->subject_id?>><?= $cc->subject_name?></option>
											<?php }$subject_id = $cc->subject_id;
										}?>
									</select>
								<?php }else if($detail->curicullum_id == 2){ ?>
									<select id="competenciesMerdeka" class="form-control browser-default custom-select input mt-2" style="width:100%;" onchange="openModalCompetenciesMerdeka(this)">
										<option disabled selected>Indonesian Curriculum</option>
										<?php $subject_id = "";
										foreach($competencies_merdeka as $cc){
											if($subject_id != $cc->subject_id){ ?>
												<option value=<?=$cc->subject_id?>><?= $cc->subject_name?></option>
											<?php }$subject_id = $cc->subject_id;
										}?>
										<option>Others</option>
									</select>
								<?php }?>
							</div>
							<div class="col-md-12 col-12 mt-2">
								<textarea id="editor1_<?=$cm->class_mission_id?>" class="form-control" placeholder="Add Competencies"><?=$cm->bank_of_competencies?></textarea>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Learning Objectives IF KI -->
						<!-- Tujuan Pembelajaran IF MERDEKA -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-10 col-10">
								<label class="label">Learning Objectives</label>
							</div>
							<div class="col-md-2 col-2 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_lo<?=$cm->class_mission_id?>" onclick="view_detail_n('lo',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_lo<?=$cm->class_mission_id?>" onclick="view_less_n('lo',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_lo<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<div id="div_class_mission_learning_objectives<?=$cm->class_mission_id?>">
									<?php $i = 0;
									foreach($class_mission_learning_objectives as $cmlo){
										foreach($cmlo as $res){
											if($res->class_mission_id == $cm->class_mission_id && $res->is_manual == 1){ ?>
									<div class="d-flex">
										<input 
										type="text" 
										class="form-control input mt-1"
										id="content<?=$cm->class_mission_id?><?=$i?>" 
										name="content" 
										placeholder="Enter learning objectives"
										value="<?= htmlspecialchars($res->content) ?>"/>
										<i class="fa fa-times" aria-hidden="true" onclick="delete_class_mission_learning_objectives(<?=$res->class_mission_learning_objectives_id?>,<?=$cm->class_mission_id?>,<?=$i?>)"></i>
									</div>
									<?php	$i++;}
										}
									}?>
								</div>
								<div class="row mt-2 mb-3">
									<div class="col-md-12 col-12 d-flex align-items-center justify-content-end">
										<p><button class="insert_link" onclick="add_class_mission_learning_objectives(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/addbiru.png" style="margin-right:10px;width:15px;height:15px;">Insert</button></p>
									</div>
								</div>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- LESSON ACTIVIY -->						
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Lesson Activities</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_la<?=$cm->class_mission_id?>" onclick="view_detail_n('la',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_la<?=$cm->class_mission_id?>" onclick="view_less_n('la',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_la"  id="div_la<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12" id="div_class_mission_lesson_activities<?=$cm->class_mission_id?>">
								<?php $i = 0;
								foreach($class_mission_lesson_activities as $cmla){
									foreach($cmla as $res){
										if($res->class_mission_id == $cm->class_mission_id){
								?>
								<div class="d-flex align-items-center justify-content-between">
									<label class="label m-0 mt-2">Lesson Activity <?= $i+1 ?></label>
									<i class="fa fa-times" aria-hidden="true" onclick="delete_class_mission_lesson_activity(<?=$res->class_mission_lesson_activities_id?>,<?=$cm->class_mission_id?>,<?= $i ?>)"></i>
								</div>
								<textarea 
									type="text" 
									class="form-control input mt-2"
									id="title<?=$cm->class_mission_id?><?=$i?>" 
									name="title" 
									placeholder="Opening Activity"
									rows="3"><?=$res->title?></textarea>
								<textarea 
									type="text" 
									class="form-control input mt-2"
									id="desc<?=$cm->class_mission_id?><?=$i?>" 
									name="description" 
									placeholder="Main Activity"
									rows="3"><?=$res->description?></textarea>
								<textarea 
									type="text mt-2" 
									class="form-control input mt-2"
									id="desc_2<?=$cm->class_mission_id?><?=$i?>" 
									name="description_2" 
									placeholder="Closing activity"
									rows="3"><?=$res->description_2?></textarea>
								<?php	$i++;}
									}
								}
								?>
								<div class="row mt-2 mb-3">
									<div class="col-md-12 col-12 d-flex align-items-center justify-content-end">
										<p><button class="insert_link" onclick="add_class_mission_lesson_activity(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/addbiru.png" style="margin-right:10px;width:15px;height:15px;">Insert</button></p>
									</div>
								</div>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- ASSESSMENT -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Assessment</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_assessment<?=$cm->class_mission_id?>" onclick="view_detail_n('assessment',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_assessment<?=$cm->class_mission_id?>" onclick="view_less_n('assessment',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="div_n_close" id="div_assessment<?=$cm->class_mission_id?>">
							<!-- ASSESMENT DESCRIPTION -->
							<div class="row">
								<div class="col-md-12 col-12">
								<label class="label">Assessment Description</label>
									<textarea 
									class="form-control input"
									id="task_description<?=$cm->class_mission_id?>"
									name="task_description<?=$cm->class_mission_id?>" 
									rows="3"
									placeholder="Enter Assessment Description"><?=$cm->task_description?></textarea>
								</div>
							</div>
							<!-- ASSESSMENT LINK-->
							<div class="row">
								<div class="col-md-12 col-12">
									<label class="label">Access Assessment Link</label>
									<div id="div_class_mission_link<?=$cm->class_mission_id?>">
									<div class="row">
										<?php
										$i = 0;
										foreach($class_mission_link as $cml){
											foreach($cml as $res){
												if($res->class_mission_id == $cm->class_mission_id){ ?>
										<div class="col-md-3 col-6 mt-1">
											<input 
												type="text" 
												class="form-control input"
												id="name<?=$cm->class_mission_id?><?=$i?>" 
												name="name" 
												placeholder="Link Name"
												value="<?= htmlspecialchars($res->name)?>"/>
										</div>
										<div class="col-md-9 col-6 mt-1 d-flex">
											<input 
												type="text" 
												class="form-control input mr-1"
												id="link<?=$cm->class_mission_id?><?=$i?>" 
												name="link" 
												placeholder="Reference Link"
												value="<?= htmlspecialchars($res->link) ?>"/>
											<i class="fa fa-times" aria-hidden="true" onclick="delete_class_mission_link(<?=$res->class_mission_link_id?>,<?=$cm->class_mission_id?>,<?=$i?>)"></i>
										</div>
										<?php	$i++;}
											}
										}?>
									</div>
									</div>
									<div class="row mt-2 mb-3">
										<div class="col-md-12 col-12 d-flex align-items-center justify-content-end">
										<p><button class="insert_link" onclick="add_link(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/addbiru.png" style="margin-right:10px;width:15px;height:15px;">Insert</button></p>
									</div>
									</div>
								</div>
							</div>
						</div>
						</div>
						<!-- END OF ASSESSMENT -->
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- RESOURCES -->
						<div class="mt-4 mb-4">
						<div class="row">
							<div class="col-md-6 col-6">
								<label class="label">Resources</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_resources<?=$cm->class_mission_id?>" onclick="view_detail_n('resources',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_resources<?=$cm->class_mission_id?>" onclick="view_less_n('resources',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_resources<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<div id="div_class_mission_res<?=$cm->class_mission_id?>">
									<div class="row">
										<?php $i = 0;
										foreach($class_mission_res as $cml){
											foreach($cml as $res){
												if($res->class_mission_id == $cm->class_mission_id){ ?>
										<div class="col-md-3 col-6 mt-1">
											<input 
												type="text" 
												class="form-control input"
												id="name_res<?=$cm->class_mission_id?><?=$i?>" 
												name="name" 
												placeholder="Link Name"
												value="<?= htmlspecialchars($res->name) ?>"/>
										</div>
										<div class="col-md-9 col-6 mt-1 d-flex">
											<input 
												type="text" 
												class="form-control input mr-1"
												id="link_res<?=$cm->class_mission_id?><?=$i?>" 
												name="link" 
												placeholder="Reference Link"
												value="<?= htmlspecialchars($res->link) ?>"/>
												<i class="fa fa-times" aria-hidden="true" onclick="delete_class_mission_res(<?=$res->class_mission_resource_id?>,<?=$cm->class_mission_id?>,<?=$i?>)"></i>
										</div>
										<?php	$i++;}
											}
										} ?>
									</div>
								</div>
								<div class="row mt-2 mb-3">
									<div class="col-md-12 col-12 d-flex align-items-center justify-content-end">
										<p><button class="insert_link" onclick="add_res(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/addbiru.png" style="margin-right:10px;width:15px;height:15px;">Insert</button></p>
									</div>
								</div>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Core Skill -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label>Core Skills</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_cs<?=$cm->class_mission_id?>" onclick="view_detail_n('cs',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_cs<?=$cm->class_mission_id?>" onclick="view_less_n('cs',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_cs<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12" >
								<select class="js-example-placeholder-multiple js-states form-control" style="width:100%;" id="core_skill<?=$cm->class_mission_id?>" multiple="multiple">
								<?php foreach ($core_skill as $cs) { ?>
									<option value=<?= $cs->core_skill_id ?> <?php foreach($cm->class_mission_core_skill as $cmck){ if($cmck->core_skill_id == $cs->core_skill_id) echo 'selected'; } ?>><?= $cs->name ?></option>
								<?php } ?>	
								</select>
							</div>
						</div> 
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Core Concepts -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Core Concepts</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_cc<?=$cm->class_mission_id?>" onclick="view_detail_n('cc',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_cc<?=$cm->class_mission_id?>" onclick="view_less_n('cc',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_cc<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<div id="div_class_mission_core_concept<?=$cm->class_mission_id?>">
									<?php $i = 0;foreach($cm->class_mission_core_concept as $cmcc){ ?>
									<textarea type="text " 
										class="form-control input mt-1"
										id="contentcc<?=$cm->class_mission_id?><?=$i?>" 
										name="content" 
										placeholder="Enter core concepts"
										rows="3"><?=$cmcc->content?></textarea>
									<?php $i++;}?>
								</div>
								<div class="row mt-2 mb-3">
									<div class="col-md-12 col-12 d-flex align-items-center justify-content-end">
										<p><button class="insert_link" onclick="add_class_mission_core_concept(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/addbiru.png" style="margin-right:10px;width:15px;height:15px;">Insert</button></p>
									</div>
								</div>
							</div>
						</div> 
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Class Activity -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Class Activities</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_ca<?=$cm->class_mission_id?>" onclick="view_detail_n('ca',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_ca<?=$cm->class_mission_id?>" onclick="view_less_n('ca',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_ca<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12 ">
								<select class="js-example-placeholder-multiple js-states form-control " style="width:100%;" id="class_activity<?=$cm->class_mission_id?>" multiple="multiple">
								<?php foreach ($class_activity as $ca) { ?>
									<option value=<?= $ca->class_activity_id ?> <?php foreach($cm->class_mission_class_activity as $cmca){ if($cmca->class_activity_id == $ca->class_activity_id) echo 'selected'; } ?>><?= $ca->name ?></option>
								<?php } ?>	
								</select>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- TIME ALLOCATION -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Time Allocation</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_ta<?=$cm->class_mission_id?>" onclick="view_detail_n('ta',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_ta<?=$cm->class_mission_id?>" onclick="view_less_n('ta',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_ta<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<input 
									type="number" 
									class="form-control input text-center"
									id="time_allocation_a<?=$cm->class_mission_id?>" 
									name="time_allocation_a<?=$cm->class_mission_id?>" 
									placeholder="1"
									style="width:70px;display:inline;"
									value="<?= $cm->time_allocation_a?>"/>
								<p style="display:inline;">x</p>
								<input 
									type="number" 
									class="form-control input text-center"
									id="time_allocation_b<?=$cm->class_mission_id?>" 
									name="time_allocation_b<?=$cm->class_mission_id?>" 
									placeholder="45"
									style="width:70px;display:inline;"
									value="<?=$cm->time_allocation_b?>"/>
									<p style="display:inline;">Minutes</p>
							</div>
						</div>
						</div>
						<!-- phase, target peserta didik, jumlah peserta didik, metode pembelajaran show if only curicullum merdeka  -->
						<?php if($detail->curicullum_id == 2){ ?>
						<!-- line grey -->
						<!-- <div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div> -->
						<!-- Phase -->
						<!-- <div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label>Phase</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_p<?=$cm->class_mission_id?>" onclick="view_detail_n('p',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_p<?=$cm->class_mission_id?>" onclick="view_less_n('p',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_p<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<select class="browser-default custom-select input form-control" id="phase<?=$cm->class_mission_id?>">
									<option disabled selected>Choose phase</option>
									<?php foreach ($phase as $p) { ?>
									<option value=<?= $p->phase_id ?> <?php if($cm->phase->phase_id == $p->phase_id) { echo 'selected'; } ?>><?= $p->name ?></option>
								<?php } ?>	
								</select>
							</div>
						</div> 
						</div> -->
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Target Peserta Didik -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label>Student Target</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_tpd<?=$cm->class_mission_id?>" onclick="view_detail_n('tpd',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_tpd<?=$cm->class_mission_id?>" onclick="view_less_n('tpd',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_tpd<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<select class="browser-default custom-select input form-control" id="target_peserta_didik<?=$cm->class_mission_id?>">
									<option disabled selected>Choose Student Target</option>
									<?php foreach ($target_peserta_didik as $tpd) { ?>
									<option value=<?= $tpd->target_peserta_didik_id ?> <?php if($cm->target_peserta_didik->target_peserta_didik_id == $tpd->target_peserta_didik_id) { echo 'selected'; } ?>><?= $tpd->name ?> <?= $tpd->description ?></option>
								<?php } ?>	
								</select>
							</div>
						</div> 
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Jumlah Peserta Didik -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Number of Students</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_jpd<?=$cm->class_mission_id?>" onclick="view_detail_n('jpd',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_jpd<?=$cm->class_mission_id?>" onclick="view_less_n('jpd',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_jpd<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<input 
									type="number" 
									class="form-control input"
									id="jumlah_peserta_didik<?=$cm->class_mission_id?>" 
									name="jumlah_peserta_didik<?=$cm->class_mission_id?>" 
									placeholder="15"
									value="<?= $cm->jumlah_peserta_didik?>"/>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Metode Pembelajaran -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label>Learning Method</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_mp<?=$cm->class_mission_id?>" onclick="view_detail_n('mp',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_mp<?=$cm->class_mission_id?>" onclick="view_less_n('mp',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_mp<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<select class="browser-default custom-select input form-control" id="metode_pembelajaran<?=$cm->class_mission_id?>">
									<option disabled selected>Choose learning method</option>
									<?php foreach ($metode_pembelajaran as $mp) { ?>
									<option value=<?= $mp->metode_pembelajaran_id ?> <?php if($cm->metode_pembelajaran->metode_pembelajaran_id == $mp->metode_pembelajaran_id) { echo 'selected'; } ?>><?= $mp->name ?></option>
								<?php } ?>	
								</select>
							</div>
						</div> 
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Kata kunci -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Keywords</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_kk<?=$cm->class_mission_id?>" onclick="view_detail_n('kk',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_kk<?=$cm->class_mission_id?>" onclick="view_less_n('kk',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_kk<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<textarea 
								class="form-control input"
								id="kata_kunci<?=$cm->class_mission_id?>"
								name="kata_kunci<?=$cm->class_mission_id?>" 
								rows="3"
								placeholder="Enter Kata Kunci"><?=$cm->kata_kunci?></textarea>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Keterampilan -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Skills</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_k<?=$cm->class_mission_id?>" onclick="view_detail_n('k',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_k<?=$cm->class_mission_id?>" onclick="view_less_n('k',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_k<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<textarea 
								class="form-control input"
								id="keterampilan<?=$cm->class_mission_id?>"
								name="keterampilan<?=$cm->class_mission_id?>" 
								rows="3"
								placeholder="Enter Skills"><?=$cm->keterampilan?></textarea>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Pertanyaan esensial -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Trigger Questions</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_pe<?=$cm->class_mission_id?>" onclick="view_detail_n('pe',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_pe<?=$cm->class_mission_id?>" onclick="view_less_n('pe',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_pe<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<textarea 
								class="form-control input"
								id="pertanyaan_esensial<?=$cm->class_mission_id?>"
								name="pertanyaan_esensial<?=$cm->class_mission_id?>" 
								rows="3"
								placeholder="Enter questions used in class to trigger students' thinking skills"><?=$cm->pertanyaan_esensial?></textarea>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Refleksi Guru -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Teacher's Reflection</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_rg<?=$cm->class_mission_id?>" onclick="view_detail_n('rg',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_rg<?=$cm->class_mission_id?>" onclick="view_less_n('rg',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_rg<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<textarea 
								class="form-control input"
								id="refleksi_guru<?=$cm->class_mission_id?>"
								name="refleksi_guru<?=$cm->class_mission_id?>" 
								rows="3"
								placeholder="Enter Teacher's Reflection"><?=$cm->refleksi_guru?></textarea>
							</div>
						</div>
						</div>
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<!-- Daftar Pustaka -->
						<div class="mt-4 mb-4">
						<div class="row d-flex align-items-center">
							<div class="col-md-6 col-6">
								<label class="label">Bibliography</label>
							</div>
							<div class="col-md-6 col-6 d-flex justify-content-end">
								<p class="view_details m-0" id="view_details_dp<?=$cm->class_mission_id?>" onclick="view_detail_n('dp',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_dp<?=$cm->class_mission_id?>" onclick="view_less_n('dp',<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
						<div class="row div_n_close" id="div_dp<?=$cm->class_mission_id?>">
							<div class="col-md-12 col-12">
								<textarea 
								class="form-control input"
								id="daftar_pustaka<?=$cm->class_mission_id?>"
								name="daftar_pustaka<?=$cm->class_mission_id?>" 
								rows="3"
								placeholder="Enter Daftar Pustaka"><?=$cm->daftar_pustaka?></textarea>
							</div>
						</div>
						</div>
						<?php } ?>
						<!-- end of input for curicullum merdeka -->
						<!-- line grey -->
						<div class="m-0" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
						<div class="row mt-4">
							<div class="col-md-12 col-12 d-flex align-items-center justify-content-end">
								<p class="m-0"><button onclick="save_mission(<?=$cm->class_mission_id?>)">Save Meeting</button></p>
							</div>
						</div>
					</div>
				<?php $j++;} ?>
			</div>
		</div>
	</div>
</div>
<!-- Modal Competencies Cambridge -->
<?php $subject_id = "";
foreach($competencies_cambridge as $cc){
	if($subject_id != $cc->subject_id){ // echo subject ?>
		<div class="modal fade modal_competencies_cambridge" id="modal_competencies_cambridge<?=$cc->subject_id?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header p-0">
					<h5 class="modal-title">Cambridge Competencies</h5>
					<i class="fa fa-times" aria-hidden="true" data-dismiss="modal" aria-label="Close"></i>
				</div>
				<div class="modal-body">
					<?php $level_1 = "";$i = 0;
					foreach($competencies_cambridge as $cc2){
						if($cc2->subject_id == $cc->subject_id){
							if($cc2->level_1 != $level_1){ // echo lv 1 ?>
								<div class="row d-flex align-items-center">
									<div class="col-md-10 col-10 pl-0">
										<p class="modal_subtitle mt-3"><?= $cc2->level_1 ?></p>
									</div>
									<div class="col-md-2 col-2 d-flex justify-content-end pr-0">
										<p class="view_details m-0" id="view_details_competencies_cambridge_<?=$cc2->subject_id?>_<?=$i?>" onclick="view_detail_modal('competencies_cambridge',<?=$cc2->subject_id?>,<?=$i?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_competencies_cambridge_<?=$cc2->subject_id?>_<?=$i?>" onclick="view_less_modal('competencies_cambridge',<?=$cc2->subject_id?>,<?=$i?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
									</div>
								</div>
								<div class="row div_n_close" id="div_competencies_cambridge_<?=$cc2->subject_id?>_<?=$i?>">
								<?php $level_2 = "";
								foreach($competencies_cambridge as $cc3){
									if($cc3->subject_id == $cc2->subject_id && $cc3->level_1 == $cc2->level_1){
										if($cc3->level_2 != $level_2){// echo lv 2 ?>
											<p class="m-0 mt-2" style="color: #1E3243;font-weight:500;"><?= $cc3->level_2 ?></p>
											<?php foreach($competencies_cambridge as $cc4){
												if($cc4->subject_id == $cc3->subject_id &&$cc4->level_1 == $cc3->level_1 && $cc4->level_2 == $cc3->level_2){ // echo lv 3 ?>
													<div class="d-flex align-items-center mt-2"><input type="checkbox"
													<?php foreach($class_mission[0]->class_mission_competencies_cambridge as $cmcompcamb)
													if( $cmcompcamb->competencies_cambridge_id == $cc4->competencies_cambridge_id ){ echo "checked"; } ?>
													onclick="toggle_competencies_cambridge(<?=$class_mission[0]->class_mission_id?>,<?=$cc4->competencies_cambridge_id?>)" ><p class="term" style="margin:0;margin-left:10px;color: #1E3243;"><?=$cc4->level_3 ?></p></div>
												<?php }
											}?>
										<?php }$level_2 = $cc3->level_2;
									}
								} ?>
								</div>
							<?php $i++;}$level_1 = $cc2->level_1;
						}
					} ?>
				</div>
			</div>
		</div>
	</div>
	<?php }$subject_id = $cc->subject_id;
} ?>
<!-- Modal Competencies k13 -->
<?php $subject_id = "";
foreach($competencies_k13 as $cc){
	if($subject_id != $cc->subject_id){ // echo subject ?>
		<div class="modal fade modal_competencies_k13" id="modal_competencies_k13<?=$cc->subject_id?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header p-0">
					<h5 class="modal-title">K-13 Competencies</h5>
					<i class="fa fa-times" aria-hidden="true" data-dismiss="modal" aria-label="Close"></i>
				</div>
				<div class="modal-body">
					<?php $core_competencies = "";$i=0;
					foreach($competencies_k13 as $cc2){
						if($cc2->subject_id == $cc->subject_id){
							if($cc2->core_competencies != $core_competencies){ // echo lv 1 ?>
								<div class="row d-flex align-items-center">
									<div class="col-md-10 col-10 pl-0">
										<p class="mt-2" style="color: #1E3243;font-weight:500;"><?= $cc2->core_competencies ?></p>
									</div>
									<div class="col-md-2 col-2 d-flex justify-content-end pr-0">
										<p class="view_details m-0" id="view_details_competencies_k13_<?=$cc2->subject_id?>_<?=$i?>" onclick="view_detail_modal('competencies_k13',<?=$cc2->subject_id?>,<?=$i?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_competencies_k13_<?=$cc2->subject_id?>_<?=$i?>" onclick="view_less_modal('competencies_k13',<?=$cc2->subject_id?>,<?=$i?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
									</div>
								</div>
								<div class="row div_n_close" id="div_competencies_k13_<?=$cc2->subject_id?>_<?=$i?>">
								<?php foreach($competencies_k13 as $cc3){
									if($cc3->subject_id == $cc2->subject_id && $cc3->core_competencies == $cc2->core_competencies){ ?>
										<div class="d-flex d-flex align-items-center mt-1"><input type="checkbox"
										<?php foreach($class_mission[0]->class_mission_competencies_k13 as $cmcompk13)
										if( $cmcompk13->competencies_k13_id == $cc3->competencies_k13_id ){ echo "checked"; } ?>
										onclick="toggle_competencies_k13(<?=$class_mission[0]->class_mission_id?>,<?=$cc3->competencies_k13_id?>)" ><p class="term" style="margin:0;margin-left:10px;color: #1E3243;"><?=$cc3->basic_competencies ?></p></div>
								<?php }
								} ?>
								</div>
							<?php $i++;}$core_competencies = $cc2->core_competencies;
						}
					} ?>
				</div>
			</div>
		</div>
	</div>
	<?php }$subject_id = $cc->subject_id;
} ?>
<!-- Modal Competencies Merdeka -->
<?php $subject_id = "";
foreach($competencies_merdeka as $cc){
	if($subject_id != $cc->subject_id){ // echo subject ?>
		<div class="modal fade modal_competencies_merdeka" id="modal_competencies_merdeka<?=$cc->subject_id?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header p-0">
					<h5 class="modal-title">Merdeka Competencies</h5>
					<i class="fa fa-times" aria-hidden="true" data-dismiss="modal" aria-label="Close"></i>
				</div>
				<div class="modal-body">
					<?php $elemen = "";$i = 0;
					foreach($competencies_merdeka as $cc2){
						if($cc2->subject_id == $cc->subject_id){
							if($cc2->elemen != $elemen){ // echo lv 1 ?>
								<div class="row d-flex align-items-center">
									<div class="col-md-6 col-6 pl-0">
										<p class="modal_subtitle mt-2"><?= $cc2->elemen ?></p>
									</div>
									<div class="col-md-6 col-6 d-flex justify-content-end pr-0">
										<p class="view_details m-0" id="view_details_competencies_merdeka_<?=$cc2->subject_id?>_<?=$i?>" onclick="view_detail_modal('competencies_merdeka',<?=$cc2->subject_id?>,<?=$i?>)"><img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less m-0" id="view_less_competencies_merdeka_<?=$cc2->subject_id?>_<?=$i?>" onclick="view_less_modal('competencies_merdeka',<?=$cc2->subject_id?>,<?=$i?>)"><img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
									</div>
								</div>
								<div class="row div_n_close" id="div_competencies_merdeka_<?=$cc2->subject_id?>_<?=$i?>">
								<?php $capaian_pembelajaran = "";
								foreach($competencies_merdeka as $cc3){
									if($cc3->subject_id == $cc2->subject_id && $cc3->elemen == $cc2->elemen){
										if($cc3->capaian_pembelajaran != $capaian_pembelajaran){// echo lv 2 ?>
											<?php if($cc3->tujuan_pembelajaran != " "){ ?>
												<p class="m-0 mt-1" style="color: #1E3243;font-weight:500;"><?= $cc3->capaian_pembelajaran ?></p>
												<?php foreach($competencies_merdeka as $cc4){
													if($cc4->subject_id == $cc3->subject_id &&$cc4->elemen == $cc3->elemen && $cc4->capaian_pembelajaran == $cc3->capaian_pembelajaran){ // echo lv 3 ?>
														<div class="d-flex align-items-center mt-1"><input type="checkbox"
														<?php foreach($class_mission[0]->class_mission_competencies_merdeka as $cmcompcamb)
														if( $cmcompcamb->competencies_merdeka_id == $cc4->competencies_merdeka_id ){ echo "checked"; } ?>
														onclick="toggle_competencies_merdeka(<?=$class_mission[0]->class_mission_id?>,<?=$cc4->competencies_merdeka_id?>)" ><p class="term" style="margin:0;margin-left:10px;color: #1E3243;"><?=$cc4->tujuan_pembelajaran ?></p></div>
													<?php }
												}?>
											<?php }else{ ?>
												<div class="d-flex align-items-center mt-1"><input type="checkbox"
													<?php foreach($class_mission[0]->class_mission_competencies_merdeka as $cmcompcamb)
													if( $cmcompcamb->competencies_merdeka_id == $cc3->competencies_merdeka_id ){ echo "checked"; } ?>
													onclick="toggle_competencies_merdeka(<?=$class_mission[0]->class_mission_id?>,<?=$cc3->competencies_merdeka_id?>)" ><p class="term" style="margin:0;margin-left:10px;color: #1E3243;"><?=$cc3->capaian_pembelajaran ?></p>
												</div>
											<?php } ?>
											
										<?php }$capaian_pembelajaran = $cc3->capaian_pembelajaran;
									}
								} ?>
								</div>
							<?php $i++;}$elemen = $cc2->elemen;
						}
					} ?>
				</div>
			</div>
		</div>
	</div>
	<?php }$subject_id = $cc->subject_id;
} ?>
</section>
<!--/.Section: Personal Profile-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	var class_mission = <?= json_encode($class_mission) ?>;
	var mission_id = <?= $mission_id ?>;
</script>
<script src="<?= base_url(); ?>assets/js/edit_meeting.js?v=004"></script>
</main>
<!--Main layout-->