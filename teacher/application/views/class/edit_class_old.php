<script src="<?= base_url()?>assets/js/ckeditor/ckeditor.js"></script>
<link href="<?= base_url()?>assets/third_party/bower-select2/css/select2.min.css" rel="stylesheet" />
<script src="<?= base_url()?>assets/third_party/bower-select2/js/select2.min.js"></script>
<!--Main layout-->
<main>
<style>
input,textarea{
    color: red;
}
.main{
	margin-top: -40px;
}
.judul_kanan{
	font-weight: 700;
	font-size: 18pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
}
.judul_kanan2{
	font-weight: 700;
	font-size: 15pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
}
.imgsamping{
	width: 7%;
	margin-right: 2%;
	margin-top: -1%;
}
.imgkanan{
	width: 3%;
	margin-right: 2%;
}
.imgkanan2{
	width: 3.5%;
	margin-right: 2%;
	margin-left: -2px;
}
.imgkanan3{
	width: 2.5%;
	margin-right: 2%;
	margin-left: -3px;
}
.detail_info_kanan{
	font-size: 10pt;
	color: #A5A3A3;
}
.detail_info_kanan2{
	font-size: 10pt;
	color: #A5A3A3;
}
#save_changes{
	margin-bottom: 4%
}
.active{
	font-weight: 700;
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
.view_less, .div_sdg_indicator, .div_boc, .div_lo, .div_la, .div_assessment, .div_resources, .div_se, .div_ta, .div_pps, .div_cc{
	display:none;
}
#add_mission:hover{
	cursor:pointer;
	font-weight: 700;
}
#goal_checklist:hover{
	cursor:pointer;
	font-weight: 700;
}
#class_introduction:hover{
	cursor:pointer;
	font-weight: 700;
}
.mission:hover{
	cursor:pointer;
	font-weight: 700;
}
#div_goal_checklist,#div_mission,#div_class_setting{
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
/* medium screen - for TABLET 991px or less */
@media screen and (max-width: 991px) {
	.judul_kanan{
		font-weight: 700;
		font-size: 15pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
	}
	.imgkanan{
		width: 5%;
		margin-right: 2%;
	}
	.imgkanan2{
		width: 6%;
		margin-right: 2%;
	}
	.imgkanan3{
		width:4%;
		margin-right: 2%;
		margin-left: 3px;
	}
	.detail_info_kanan{
		font-size: 9pt;
		color: #A5A3A3;
	}

}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
	.judul_kanan{
		font-weight: 700;
		font-size: 15pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
	}
	.imgkanan{
		width: 7%;
		margin-right: 2%;
	}
	.imgkanan2{
		width: 8.5%;
		margin-right: 2%;
	}
	.imgkanan3{
		width:6%;
		margin-right: 2%;
		margin-left: 3px;
	}
	.detail_info_kanan{
		font-size: 9pt;
		color: #A5A3A3;
	}
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
	.judul_kanan{
		font-weight: 700;
		font-size: 15pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
	}
	.imgkanan{
		width: 7%;
		margin-right: 2%;
	}
	.imgkanan2{
		width: 8.5%;
		margin-right: 2%;
	}
	.imgkanan3{
		width:6%;
		margin-right: 2%;
		margin-left: 3px;
	}
	.detail_info_kanan{
		font-size: 9pt;
		color: #A5A3A3;
	}
}
</style>

<div class="row" style="height:100vh;">
	<div id="loading-overlay">
		<div class="loading-icon"></div>
	</div>
	<!-- Left Side -->
	<div class="col-md-3" style="background-color:#e8e8e8;padding:35px 10px 10px 40px;">
		<p class="text_bold"><a href="<?=base_url()?>classes/details/<?=$detail->class_id?>/1"><img src="<?= base_url() ?>assets/img/icon/previous.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;&nbsp;&nbsp;<?= $detail->grade_name?>, <?= $detail->subject_name?></a></p><br>

		<p class="active" id="class_introduction">Class Introduction</p>

		<!-- <p id="goal_checklist">Goal Checklist</p> -->

		<?php
			$i = 1;
			foreach ($class_mission as $cm) {
		?>

		<p class="mission" id="mission<?=$cm->mission_id?>" onclick="mission(<?=$cm->mission_id?>)">Meeting&nbsp;<?=$i?></p>
		<?php $i++; } ?>
		<?php if($detail->status != 2 && $detail->status != 3){?>

		<p id="add_mission" onclick="add_mission(<?= $detail->class_id ?>)"><img src="<?= base_url() ?>assets/img/icon/addbiru.png" class="imgsamping" alt="Responsive image">&nbsp;&nbsp;Add Meeting</p>
		<?php }?>

		<p class="view_details" id="class_setting"><img src="<?= base_url() ?>assets/img/icon/setting.png" class="imgsamping" alt="Responsive image">&nbsp;&nbsp;Class settings</p>
	</div>

	<!-- Right Side -->
	<!-- Edit Class General -->
	<div class="col-md-9" id="div_class_introduction" style="padding:27px 10px 10px 50px;">
		<p class="judul_kanan" style="margin-bottom: 3%;margin-top: 1%;">Edit class</p>
		<?php if ($detail->subject_id == 1 || $detail->subject_id == 2) { ?>
		<div class="row">
			<div class="col-md-6 col-6">
				<!-- Project User -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/project_user.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Project User(*Not Required)</p>
						<select class="browser-default custom-select input" style="color: black;" id="project_user" name="project_user">
							<option disabled selected>Choose Project User</option>
							<option value="Personal" <?=$detail->project_user == 'Personal' ? ' selected' : ''; ?>>Personal</option>
							<option value="Neighborhood" <?=$detail->project_user == 'Neighborhood' ? ' selected' : ''; ?>>Neighborhood</option>
							<option value="Private Sector" <?=$detail->project_user == 'Private Sector' ? ' selected' : ''; ?>>Private Sector</option>
							<option value="Community" <?=$detail->project_user == 'Community' ? ' selected' : ''; ?>>Community</option>
							<option value="Public Services" <?=$detail->project_user == 'Public Services' ? ' selected' : ''; ?>>Public Services</option>
						</select>
					</div>
				</div>
				<!--End of Project User -->
			</div>
			<div class="col-md-6 col-6">
				<!-- Project Member -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/project_user.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Project Member(*Not Required)</p>
						<select class="browser-default custom-select input" style="color: black;" id="project_member" name="project_member">
							<option disabled selected>Choose Project Member</option>
							<option value="Individual" <?=$detail->project_member == 'Individual' ? ' selected' : ''; ?>>Individual</option>
							<option value="Team" <?=$detail->project_member == 'Team' ? ' selected' : ''; ?>>Team</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-6">
				<!-- Project Style -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/project_style.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Project Style(*Not Required)</p>
						<select class="browser-default custom-select input" style="color: black;" id="project_style" name="project_style">
							<option disabled selected>Choose Project Style</option>
							<option value="Product" <?=$detail->project_style == 'Product' ? ' selected' : ''; ?>>Product</option>
							<option value="System" <?=$detail->project_style == 'System' ? ' selected' : ''; ?>>System</option>
						</select>
					</div>
				</div>
				<!--End of Project User -->
			</div>
			<div class="col-md-6 col-6">
				<!-- Class Description -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/project_user.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Class goal(*Not Required)</p>
						<textarea 
						class="form-control input"
						id="description"
						name="description" 
						rows="3"
						placeholder="Enter class goal"><?= $detail->class_description?></textarea>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<!--<p><img src="<?= base_url() ?>assets/img/icon/virtualworld.png" class="imgkanan" alt="Responsive image">
		<div class="detail_info_kanan">Virtual World</div></p>
		<p>
			<div class="col-md-6 col-10" style="margin-left:35px;margin-bottom: 3%;">
				<input 
				type="text" 
				class="form-control input"
				id="virtual_world" 
				name="virtual_world" 
				placeholder="Virtual World Link"
				value="<?=  $detail->virtual_world ?>"/>
			</div>
		</p>-->
		<div class="row">
			<div class="col-md-6 col-6">
				<!-- Grade Subject -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/description.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Grade Subject</p>
						<select class="browser-default custom-select input" style="color: black;" id="grade_subject" name="grade_subject">
							<?php foreach($grade_subject as $gs) { ?>
								<option value="<?= $gs->grade_subject_id ?>" <?php if($detail->grade_subject_id == $gs->grade_subject_id) { echo "selected"; } ?>>
									<?= $gs->grade_name ?>&nbsp;<?= $gs->subject_name ?>&nbsp;<?= $gs->subject_parent_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-6">
				<!-- Curicullum -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/description.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Curicullum</p>
						<select class="browser-default custom-select input" style="color: black;" id="curicullum" name="curicullum">
							<?php
							foreach($curicullum as $c) {
							?>
								<option
									value="<?= $c->curicullum_id ?>" <?php if($detail->curicullum_id == $c->curicullum_id) { echo "selected"; } ?>>
									<?= $c->name ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-6 col-6">
				<!-- ACADEMY YEAR -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/description.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Academic year</p>
						<select class="browser-default custom-select input" style="color: black;" id="academy_year" name="academy_year">
							<?php foreach($academy_year as $ay) { ?>
								<option value="<?= $ay->academy_year_id ?>" <?php if($detail->academy_year_id == $ay->academy_year_id) { echo "selected"; } ?>>
									<?= $ay->academy_year_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-6">
				<!-- Semester -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/description.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Semester</p>
						<select class="browser-default custom-select input" style="color: black;" id="semester" name="semester">
							<?php
							foreach($semester as $s) {
							?>
								<option
									value="<?= $s->semester_id ?>" <?php if($detail->semester_id == $s->semester_id) { echo "selected"; } ?>>
									<?= $s->semester_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-md-6 col-6">
				<!-- Term -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/description.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Term</p>
						<select class="browser-default custom-select input" style="color: black;" id="term" name="term" >
							<?php
							foreach($term as $t){
							?>
								<option
									value="<?= $t->term_id ?>" <?php if($detail->term_id == $t->term_id) { echo "selected"; } ?>>
									<?= $t->term_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-6">
				<!-- meeting period -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/meetingtime.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Meeting Period</p>
						<select class="browser-default custom-select input" style="color: black;" id="meeting_period">
							<option disabled selected>Choose Meeting Period</option>
							<option value="Monthly" <?=$detail->meeting_period == 'Monthly' ? ' selected' : ''; ?>>Monthly</option>
							<option value="Weekly" <?=$detail->meeting_period == 'Weekly' ? ' selected' : ''; ?>>Weekly</option>
							<option value="Daily" <?=$detail->meeting_period == 'Daily' ? ' selected' : ''; ?>>Daily</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-12">
				<!-- class start -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/meetingtime.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Class Start</p>
						<input 
						type="text" 
						class="form-control input dt_picker"
						id="class_start_time" 
						name="class_start_time" 
						placeholder="District"
						value="<?=  $detail->class_start_date ?> - <?=  $detail->class_start_time ?>"
						readonly="true"/>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-12">
				<!-- class finish -->
				<div class="row mt-3">
					<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="padding:0;">
						<img src="<?= base_url() ?>assets/img/icon/meetingtime.png" alt="Responsive image" style="max-width:100%;height:auto;">
					</div>
					<div class="col-md-10 col-10">
						<p class="detail_info_kanan">Class Finish</p>
						<input 
						type="text" 
						class="form-control input dt_picker"
						id="class_finish_time" 
						name="class_finish_time"
						placeholder="District"
						value="<?=  $detail->class_finish_date ?> - <?=  $detail->class_finish_time ?>"
						readonly="true"/>
					</div>
				</div>
			</div>
		</div>
		<input 
			type="hidden" 
			class="form-control input"
			id="class_id" 
			name="class_id" 
			value="<?= $detail->class_id ?>"/>
		<p class="mt-5">
			<button
			class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
			style="background-color:white;width: 200px;margin-left:0px;"
			id="save_changes">Save Changes</button>
		</p>
	</div>

	<!-- Edit Class Goal Checklist -->
	<!-- <div class="col-md-9" id="div_goal_checklist" style="padding:15px 10px 10px 50px;">
		<p class="judul_kanan" style="margin-top:1.3%;margin-bottom: 3%;">Edit Class</p>
		<p class="detail_info_kanan2">Government Checklist</p>
		<div class="card col-md-6 col-10" style="padding-top:20px;">
			<?php
			if (! empty($grade_government_checklist)) {
			foreach ($grade_government_checklist as $ggc) {
				$checked = "";
				if (! empty($class_government_checklist)) {
					foreach ($class_government_checklist as $cgc) {
						if($ggc->government_checklist_id == $cgc->government_checklist_id){
							$checked = "checked";
						}
					}
				// Another way to get checked if array like $class_government_checklist = array("1");
				// $checked = (in_array($ggc->government_checklist_id, $class_government_checklist)) ? 'checked="checked"' : '';
				}
			?>
			<p><input type="checkbox" name="government_checklist_id[]" value="<?php echo $ggc->government_checklist_id;?>" size="15" <?php echo $checked;?>>&nbsp;<?php echo $ggc->content;?></p>
			<?php }
			}
			?>
		</div>
		<p class="detail_info_kanan2 mt-3">SDG Indicator</p>
		<div class="card col-md-6 col-10" style="padding-top:20px;">
			<?php
			if (! empty($grade_sdg_indicator)) {
			foreach ($grade_sdg_indicator as $sdg) {
				$checked = "";
				if (! empty($class_sdg_indicator)) {
					foreach ($class_sdg_indicator as $csi) {
						if($sdg->sdg_indicator_id == $csi->sdg_indicator_id){
							$checked = "checked";
						}
					}
				}
			?>
			<p><input type="checkbox" name="sdg_indicator_id[]" value="<?php echo $sdg->sdg_indicator_id;?>" size="15" <?php echo $checked;?>>&nbsp;<?php echo $sdg->sdg_indicator_name;?></p>
			<?php }
			}
			?>
		</div>
		<p class="mt-5">
			<button
			class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
			style="background-color:white;width: 200px;margin-left:0px;margin-bottom: 4%;"
			id="save_changes_goal_checklist">Save Changes</button>
		</p>
	</div> -->

	<!--Mission-->
	<div class="col-md-9" id="div_mission" style="padding:15px 10px 10px 50px;">
		<?php
			$j = 1;
			foreach ($class_mission as $cm) {
		?>
			<div id="div_mission<?=$cm->mission_id?>" style="display:none;">
				<p class="judul_kanan" style="margin-top:1.3%;margin-bottom: 3%;">Edit meeting</p>
				<p class="text_bold">General Information</p>
				<div class="row mt-2">
					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						<p class="detail_info_kanan2">Topic</p>
						<input 
							type="text" 
							class="form-control input"
							id="mission_title<?=$cm->class_mission_id?>" 
							name="mission_title<?=$cm->class_mission_id?>" 
							placeholder="Meeting topic"
							value="<?=$cm->mission_title?>"/>
					</div>

					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						<!-- <p class="detail_info_kanan2">Project Number</p>
						<input 
							type="text" 
							class="form-control input"
							id="project_number<?=$cm->class_mission_id?>" 
							name="project_number<?=$cm->class_mission_id?>" 
							placeholder="Project number"
							value="<?= $detail->class_id ?>"
							readonly="true"/> -->
						<p class="detail_info_kanan2">Sub Topic</p>
						<input 
							type="text" 
							class="form-control input"
							id="sub_topic<?=$cm->class_mission_id?>" 
							name="sub_topic<?=$cm->class_mission_id?>" 
							placeholder="Meeting sub topic"
							value="<?=$cm->sub_topic?>"/>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						<p class="detail_info_kanan2">Meeting Date Time</p>
						<div class="input-group date" data-provide="datepicker">
							<input 
							type="text" 
							class="form-control input dt_picker"
							id="publish_datetime<?=$cm->class_mission_id?>" 
							name="publish_datetime<?=$cm->class_mission_id?>" 
							placeholder="Schedule"
							value="<?=$cm->publish_date?>-<?=$cm->publish_time?>"
							readonly="true"/>
							<div class="input-group-append text-center">
								<span class="input-group-text">
									<img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg" 
										style="width:20px;"/>
								</span>
							</div>
						</div>		
					</div>
					
					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						<p class="detail_info_kanan2">Assessment Deadline(*Not Required)</p>
						<div class="input-group date" data-provide="datepicker">
							<input 
							type="text"
							class="form-control input dt_picker"
							id="task_deadline<?=$cm->class_mission_id?>" 
							name="task_deadline<?=$cm->class_mission_id?>"
							placeholder="Deadline"
							value="<?=$cm->deadline_date?>-<?=$cm->deadline_time?>"
							readonly="true"/>
							<div class="input-group-append text-center">
								<span class="input-group-text">
									<img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg" style="width:20px;"/>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						<!-- <p class="detail_info_kanan2">Google Meet Password</p>
							<input 
							type="text" 
							class="form-control input"
							id="google_meet_password<?=$cm->class_mission_id?>" 
							name="google_meet_password<?=$cm->class_mission_id?>" 
							placeholder="Google Meet Password"
							value="<?= $cm->google_meet_password ?>"/> -->
						<p class="detail_info_kanan2">Face to Face</p>
						<!-- <input 
						class="form-check-input"
						style="margin-left:1%;"                                    
						type="checkbox"
						id="face_to_face<?=$cm->class_mission_id?>"<?php if($cm->face_to_face == 1) {
							echo "checked";
						} ?>>&nbsp;
						<label class="form-check-label labelsk" for="invalidCheck" style="margin-left:5%;">
						Face to Face                                
						</label> -->
						<select class="browser-default custom-select input" style="color: black;" id="face_to_face<?=$cm->class_mission_id?>" onclick="f2f(<?=$cm->class_mission_id?>)">
							<option disabled selected>Choose meeting style</option>
							<option onclick="f2f_1(<?=$cm->class_mission_id?>)" value=1 <?=$cm->face_to_face == 1 ? ' selected' : ''; ?>>On Site</option>
							<option onclick="f2f_1(<?=$cm->class_mission_id?>)" value=0 <?=$cm->face_to_face == 0 ? ' selected' : ''; ?>>Off Site</option>
						</select>
					</div>
					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						<div id="meet_link<?=$cm->class_mission_id?>" style="<?php if($cm->face_to_face == 0) { echo "display:block;"; }else{ echo "display:none;";} ?>">
							<p class="detail_info_kanan2">Meeting Link</p>
							<input 
							type="text" 
							class="form-control input"
							id="google_meet_link<?=$cm->class_mission_id?>" 
							name="google_meet_link<?=$cm->class_mission_id?>" 
							placeholder="Meeting Link"
							value="<?= $cm->google_meet_link ?>"/>
						</div>
						<div id="location_f2f_<?=$cm->class_mission_id?>" style="<?php if($cm->face_to_face == 1) { echo "display:block;"; }else{ echo "display:none;";} ?>">
							<p class="detail_info_kanan2">Location</p>
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
					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						<p class="detail_info_kanan2">Week</p>
						<select class="browser-default custom-select input" style="width:100%;color: black;" id="week<?=$cm->class_mission_id?>">
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
						</select>	
						<!-- coba2 -->
						<!-- <select class="js-example-placeholder-multiple js-states form-control" style="width:100%;color: black;" id="core_skill<?=$cm->class_mission_id?>" multiple="multiple">
						<?php foreach ($core_skill as $cs) { ?>
							<option value=<?= $cs->core_skill_id ?> <?php foreach($cm->class_mission_core_skill as $cmck){ if($cmck->core_skill_id == $cs->core_skill_id) echo 'selected'; } ?>><?= $cs->name ?></option>
						<?php } ?>	
						</select>
						<select class="js-example-placeholder-multiple js-states form-control" style="width:100%;color: black;" id="class_activity<?=$cm->class_mission_id?>" multiple="multiple">
						<?php foreach ($class_activity as $ca) { ?>
							<option value=<?= $ca->class_activity_id ?> <?php foreach($cm->class_mission_class_activity as $cmca){ if($cmca->class_activity_id == $ca->class_activity_id) echo 'selected'; } ?>><?= $ca->name ?></option>
						<?php } ?>	
						</select> -->
					</div>
					
					<div class="col-md-5 col-10" style="margin-bottom: 1%;">
						
					</div>
				</div>

				<!-- <div class="row mt-2">
					<div class="col-md-10 col-10" style="margin-bottom: 2%;">
						<p class="detail_info_kanan2">Face to Face</p>
						<input 
						class="form-check-input"
						style="margin-left:1%;"                                    
						type="checkbox"
						id="face_to_face<?=$cm->class_mission_id?>"<?php if($cm->face_to_face == 1) {
							echo "checked";
						} ?>>&nbsp;
						<label class="form-check-label labelsk" for="invalidCheck" style="margin-left:5%;">
						Face to Face                                
						</label>
					</div>
				</div> -->
				<div class="row mt-3">
					<div class="col-md-10 col-10 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<p class="text_bold" style="margin-top: 3%;">Goal Checklist</p>
				<!-- SDG INDICATOR -->
				<!-- <div class="row mt-2">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-3">SDG Indicator</p>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_si<?=$cm->class_mission_id?>" onclick="view_detail_si(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_si<?=$cm->class_mission_id?>" onclick="view_less_si(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="row div_sdg_indicator" id="div_sdg_indicator<?=$cm->class_mission_id?>">
					<div class="card col-md-11 col-11" style="padding-top:20px;">
						<?php
							if (! empty($grade_sdg_indicator)) {
								foreach ($grade_sdg_indicator as $gsi) { ?>
									<p>
										<input 
										class="form-check-input"
										style="margin-left:1%"
										type="checkbox"
										id="checkbox_cmsi<?=$cm->class_mission_id?><?= $gsi->sdg_indicator_id ?>"
										onclick="check_cmsi(<?=$cm->class_mission_id?>,<?= $gsi->sdg_indicator_id ?>)"
										<?php if(!empty($cm->class_mission_sdg_indicator)){ foreach($cm->class_mission_sdg_indicator as $cmsi){ 
											if($cmsi->sdg_indicator_id == $gsi->sdg_indicator_id && $cmsi->is_true == 1){ 	echo "checked";
											}
										}
										}?>
										>&nbsp;
										<label class="form-check-label labelsk" for="invalidCheck" style="margin-left:3%;">
										<?= $gsi->sdg_indicator_name?>                               
										</label>
									</p>
						<?php 	}
							}
						?>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-10 col-10 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div> -->
				<!-- Profile Pembelajaran Pancasila -->
				<div class="row mt-2">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-1">Profil Pelajar Pancasila ( Character of Pancasila )</p>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_pps<?=$cm->class_mission_id?>" onclick="view_detail_pps(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_pps<?=$cm->class_mission_id?>" onclick="view_less_pps(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="div_pps" id="div_pps<?=$cm->class_mission_id?>">
					<div class="row mt-2">
						<div class="col-md-10 col-10" style="margin-bottom: 2%;">
							<textarea 
							class="form-control input"
							id="profil_pembelajaran_pancasila<?=$cm->class_mission_id?>"
							name="profil_pembelajaran_pancasila<?=$cm->class_mission_id?>" 
							rows="3"
							placeholder="Enter Profil Pelajar Pancasila ( Character of Pancasila )"><?=$cm->profil_pembelajaran_pancasila?></textarea>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<!-- COMPETENCIES IF KI -->
				<!-- CAPAIAN PEMBELAJARAN IF MERDEKA -->
				<div class="row mt-2">
					<div class="col-md-6 col-6">
						<?php if($detail->curicullum_id == 1){ ?>
							<p class="detail_info_kanan2 mt-1">Competencies</p>
						<?php }else if($detail->curicullum_id == 2){ ?>
							<p class="detail_info_kanan2 mt-1">Learning Achievement</p>
						<?php }?>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_boc<?=$cm->class_mission_id?>" onclick="view_detail_boc(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_boc<?=$cm->class_mission_id?>" onclick="view_less_boc(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="row div_boc" id="div_boc<?=$cm->class_mission_id?>">
					<div class="card col-md-11 col-11" style="padding:20px;">
					<textarea id="editor1_<?=$cm->class_mission_id?>" class="form-control" placeholder="Add Competencies"><?=$cm->bank_of_competencies?></textarea>
					<!-- <?php $bocname = "";
					$subject = "";
						foreach ($bank_of_competencies_detail as $bocd) { 
							if($bocd->subject_name != $subject){ ?>
								<p><?= $bocd->subject_name ?></p>
						<?php }$subject = $bocd->subject_name;
						if($bocd->name != $bocname){ ?>
								<p><?= $bocd->name ?></p>
						<?php }$bocname = $bocd->name; ?>
								<p>
									<input 
									class="form-check-input"
									style="margin-left:1%"
									type="checkbox"
									id="checkbox_cmboc<?=$cm->class_mission_id?><?= $bocd->bank_of_competencies_detail_id ?>"
									onclick="check_cmboc(<?=$cm->class_mission_id?>,<?= $bocd->bank_of_competencies_detail_id ?>)"
									<?php if(!empty($cm->class_mission_bank_of_competencies)){ 
											foreach($cm->class_mission_bank_of_competencies as $cmboc) {
												if($cmboc->bank_of_competencies_detail_id == $bocd->bank_of_competencies_detail_id && $cmboc->is_true == 1){ echo "checked";}
											}
										}
									?>
									>&nbsp;
									<label class="form-check-label labelsk" for="invalidCheck" style="margin-left:3%;display:inline;">
									<?= $bocd->no?>&nbsp;<?= $bocd->indicator?>                               
									</label>
								</p>
						<?php } ?> -->
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-10 col-10 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<!-- Learning Objectives IF KI -->
				<!-- Tujuan Pembelajaran IF MERDEKA -->
				<div class="row mt-2">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-1">Learning Objectives</p>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_lo<?=$cm->class_mission_id?>" onclick="view_detail_lo(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_lo<?=$cm->class_mission_id?>" onclick="view_less_lo(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="row div_lo" id="div_lo<?=$cm->class_mission_id?>">
					<div class="col-md-10 col-10" style="margin-bottom: 2%;">
					<!-- <?php foreach ($learning_objectives as $lo) { ?>
						<p>
							<input 
							class="form-check-input"
							style="margin-left:1%;"                                    
							type="checkbox"
							id="checkbox_cmlo<?=$cm->class_mission_id?><?= $lo->learning_objectives_id ?>"
							onclick="check_cmlo(<?=$cm->class_mission_id?>,<?= $lo->learning_objectives_id ?>)"
							<?php if(!empty($cm->class_mission_learning_objectives)){ foreach($cm->class_mission_learning_objectives as $cmlo) if((int)$cmlo->content == $lo->learning_objectives_id && $cmlo->is_manual == 0){ echo "checked";}}?>
							>&nbsp;
							<label class="form-check-label labelsk" for="invalidCheck" style="margin-left:3%;">
							<?= $lo->learning_objectives_name ?>   
							</label>
						</p>
						<?php } ?> -->
					</div>
					<div class="col-md-10 col-10" style="margin-bottom: 2%;">
						<div id="div_class_mission_learning_objectives<?=$cm->class_mission_id?>">
							<?php
							$i = 0;
							foreach($class_mission_learning_objectives as $cmlo){
								foreach($cmlo as $res){
									if($res->class_mission_id == $cm->class_mission_id && $res->is_manual == 1){
							?>
							<input 
								type="text mt-2" 
								class="form-control input"
								id="content<?=$cm->class_mission_id?><?=$i?>" 
								name="content" 
								placeholder="content"
								value="<?= htmlspecialchars($res->content) ?>"/>
							<?php	$i++;}
								}
							}
							?>
						</div>
						<div class="row mt-2">
							<div class="col-md-12 col-12">
								<p class="mission" onclick="add_class_mission_learning_objectives(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/insertlink.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-10 col-10 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<!-- Core Concepts -->
				<!-- <div class="row mt-2">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-1">Core Concept</p>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_cc<?=$cm->class_mission_id?>" onclick="view_detail_cc(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_cc<?=$cm->class_mission_id?>" onclick="view_less_cc(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="row div_cc" id="div_cc<?=$cm->class_mission_id?>">
					<div class="col-md-10 col-10" style="margin-bottom: 2%;">
						<div id="div_class_mission_core_concept<?=$cm->class_mission_id?>">
							<?php
							$i = 0;
							foreach($cm->class_mission_core_concept as $cmcc){
							?>
							<input 
								type="text mt-2" 
								class="form-control input"
								id="content<?=$cm->class_mission_id?><?=$i?>" 
								name="content" 
								placeholder="content"
								value="<?=$cmcc->content?>"/>
							<?php	$i++;
							}
							?>
						</div>
						<div class="row mt-2">
							<div class="col-md-12 col-12">
								<p class="mission" onclick="add_class_mission_core_concept(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/insertlink.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
					</div>
				</div> 
				<div class="row mt-3">
					<div class="col-md-10 col-10 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>-->
				<!--<p class="text_bold" style="margin-top: 3%;">Introduction and Reference</p>-->
				<!--<div class="row mt-2">
					<div class="col-md-10 col-10" style="margin-bottom: 2%;">
						<p class="detail_info_kanan2">Mission <?=$j?> Description</p>
						<textarea 
						class="form-control input"
						id="mission_description<?=$cm->class_mission_id?>"
						name="mission_description<?=$cm->class_mission_id?>" 
						rows="3"
						placeholder="Enter Class Description"><?=$cm->mission_description?></textarea>
					</div>
				</div>-->
				<!-- LESSON ACTIVIY IF KI -->
				<!-- MATERI ESENSIAL IF MERDEKA -->
				<div class="row mt-2">
					<div class="col-md-6 col-6">
						<?php if($detail->curicullum_id == 1){ ?>
							<p class="detail_info_kanan2 mt-1">Lesson Activity</p>
						<?php }else if($detail->curicullum_id == 2){ ?>
							<p class="detail_info_kanan2 mt-1">Essential Matery</p>
						<?php }?>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_la<?=$cm->class_mission_id?>" onclick="view_detail_la(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_la<?=$cm->class_mission_id?>" onclick="view_less_la(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="row div_la"  id="div_la<?=$cm->class_mission_id?>">
					<div class="col-md-10 col-10" id="div_class_mission_lesson_activities<?=$cm->class_mission_id?>" style="margin-bottom: 2%;">
						<?php $i = 0;
						foreach($class_mission_lesson_activities as $cmla){
							foreach($cmla as $res){
								if($res->class_mission_id == $cm->class_mission_id){
						?>
						<?php if($detail->curicullum_id == 1){ ?>
							<p class="detail_info_kanan2 mt-1">Lesson Activities <?= $i+1 ?></p>
						<?php }else if($detail->curicullum_id == 2){ ?>
							<p class="detail_info_kanan2 mt-1">Materi Esensial <?= $i+1 ?></p>
						<?php }?>
						<textarea 
							type="text mt-2" 
							class="form-control input mt-2"
							id="title<?=$cm->class_mission_id?><?=$i?>" 
							name="title" 
							placeholder="Opening Activity"
							rows="5"><?=$res->title?></textarea>
						<textarea 
							type="text" 
							class="form-control input mt-2"
							id="desc<?=$cm->class_mission_id?><?=$i?>" 
							name="description" 
							placeholder="Main Activity"
							rows="5"><?=$res->description?></textarea>
						<textarea 
							type="text mt-2" 
							class="form-control input mt-2"
							id="desc_2<?=$cm->class_mission_id?><?=$i?>" 
							name="description_2" 
							placeholder="Closing activity"
							rows="5"><?=$res->description_2?></textarea>
						<?php	$i++;}
							}
						}
						?>
						<div class="row mt-2">
							<div class="col-md-12 col-12">
								<p class="mission" onclick="add_class_mission_lesson_activity(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/insertlink.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<!-- ASSESSMENT -->
				<div class="row mt-2">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-1">Assessment</p>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_assessment<?=$cm->class_mission_id?>" onclick="view_detail_assessment(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_assessment<?=$cm->class_mission_id?>" onclick="view_less_assessment(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="div_assessment" id="div_assessment<?=$cm->class_mission_id?>">
					<!-- ASSESMENT DESCRIPTION -->
					<div class="row">
						<div class="col-md-10 col-10" style="margin-bottom: 2%;">
							<p class="detail_info_kanan2">Assessment Description</p>
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
						<div class="col-md-10 col-10" style="margin-bottom: 2%;">
							<p class="detail_info_kanan2">Assessment</p>
							<div id="div_class_mission_link<?=$cm->class_mission_id?>">
							<div class="row mt-2">
								<?php
								$i = 0;
								foreach($class_mission_link as $cml){
									foreach($cml as $res){
										if($res->class_mission_id == $cm->class_mission_id){
								?>
								<div class="col-md-3 col-6 mt-2" style="margin-bottom: 2%;">
									<input 
										type="text" 
										class="form-control input"
										id="name<?=$cm->class_mission_id?><?=$i?>" 
										name="name" 
										placeholder="Link Name"
										value="<?= htmlspecialchars($res->name)?>"/>
								</div>
								<div class="col-md-9 col-6 mt-2" style="margin-bottom: 2%;">
									<input 
										type="text" 
										class="form-control input"
										id="link<?=$cm->class_mission_id?><?=$i?>" 
										name="link" 
										placeholder="Reference Link"
										value="<?= htmlspecialchars($res->link) ?>"/>
								</div>
								<?php	$i++;}
									}
								}
								?>
							</div>
							</div>
							<div class="row mt-2">
								<div class="col-md-12 col-12">
									<p class="mission" onclick="add_link(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/insertlink.png" class="img-fluid" alt="Responsive image"></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END OF ASSESSMENT -->
				<div class="row mt-3">
					<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<!-- RESOURCES -->
				<div class="row mt-2">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-1">Resources</p>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_resources<?=$cm->class_mission_id?>" onclick="view_detail_resources(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_resources<?=$cm->class_mission_id?>" onclick="view_less_resources(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="div_resources" id="div_resources<?=$cm->class_mission_id?>">
				<div class="row mt-3">
					<div class="col-md-10 col-10">
						<div id="div_class_mission_res<?=$cm->class_mission_id?>">
							<div class="row mt-2">
								<?php
								$i = 0;
								foreach($class_mission_res as $cml){
									foreach($cml as $res){
										if($res->class_mission_id == $cm->class_mission_id){
								?>
								<div class="col-md-3 col-6 mt-2" style="margin-bottom: 2%;">
									<input 
										type="text" 
										class="form-control input"
										id="name_res<?=$cm->class_mission_id?><?=$i?>" 
										name="name" 
										placeholder="Link Name"
										value="<?= htmlspecialchars($res->name) ?>"/>
								</div>
								<div class="col-md-9 col-6 mt-2" style="margin-bottom: 2%;">
									<input 
										type="text" 
										class="form-control input"
										id="link_res<?=$cm->class_mission_id?><?=$i?>" 
										name="link" 
										placeholder="Reference Link"
										value="<?= htmlspecialchars($res->link) ?>"/>
								</div>
								<?php	$i++;}
									}
								}
								?>
							</div>
						</div>
						<div class="row mt-2">
							<div class="col-md-12 col-12">
								<p class="mission" onclick="add_res(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/insertlink.png" class="img-fluid" alt="Responsive image"></p>
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<!-- TIME ALLOCATION -->
				<div class="row mt-2">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-1">Time Allocation</p>
					</div>
					<div class="col-md-6 col-6">
						<p class="view_details" id="view_details_ta<?=$cm->class_mission_id?>" onclick="view_detail_ta(<?=$cm->class_mission_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_ta<?=$cm->class_mission_id?>" onclick="view_less_ta(<?=$cm->class_mission_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="div_ta" id="div_ta<?=$cm->class_mission_id?>">
					<div class="row mt-3">
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
				<div class="row mt-3">
					<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<!-- SAVE / DELETE -->
				<div class="row mt-3">
					<?php if($cm->status != 2){ //can edit mission if status == 2?>
						<div class="col-md-3 col-10 mt-2">
							<button class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" style="background-color:white;width: 200px;margin-left:0px;" onclick="save_mission(<?= $detail->class_id ?>,<?=$cm->class_mission_id?>)">Save Meeting</button>
						</div>
						<?php if($j != 1){ ?>
						<div class="col-md-3 col-10" style="margin-top:12px; margin-left: 2%;">
							<p class="mission" onclick="delete_mission(<?= $detail->class_id ?>,<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/trash.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;Delete Meeting</p>
						</div>
						<?php } ?>
					<?php } ?>
				</div>
				<div class="row mt-3">
					<div class="col-md-3 col-10 mt-2" >
						<button class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" style="background-color:white;width: 200px;margin-left:0px;" onclick="copy_mission(<?= $detail->class_id ?>,<?=$cm->class_mission_id?>)">Copy Meeting</button>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-10 col-10">
						<p class="text_bold" style="margin-top: 2%;">Status Meeting</p>
					</div>
				</div>
				<div class="row mt-3" style="margin-bottom: 5%">
					<?php if($cm->status == 0){ ?>
					<div class="col-md-3 col-10 mt-2">
						<button
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
						style="background-color:white;width: 200px;margin-left:0px;"
						onclick="start_mission(<?=$cm->class_mission_id?>)">Start Meeting</button>
					</div>
					<?php }else if($cm->status == 1){ ?>
					<div class="col-md-3 col-10" style="margin-top:12px;">
						<button
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
						style="background-color:white;width: 200px;margin-left:0px;"
						onclick="finish_mission(<?=$cm->class_mission_id?>)">Finish Meeting</button>
					</div>
					<?php }else if($cm->status == 2){ ?>
						<p> Meeting Finished </p>
					<?php } ?>
				</div>
				<div class="row mt-3" style="margin-bottom: 4%;">
					<div class="col-md-10 col-10 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>
			</div>
		<?php $j++;} ?>
	</div>

	<!-- Class Settings -->
	
	<div class="col-md-9" id="div_class_setting" style="padding:35px 10px 10px 50px;">
		<?= form_open_multipart('classes/update_class_thumbnail', 'id="form_class_setting"') ?>
		<p class="judul_kanan">Class settings</p>
		<p class="judul_kanan2">Thumbnail</p>
		<input type="hidden" class="form-control input" id="class_id" name="class_id" value="<?= $detail->class_id ?>"/>
		<div class="form-group file-upload-wrapper">
			<label for="thumbnail"><img src="<?= base_url() ?>assets/img/uploads/user/<?= $detail->class_image ?>" class="img-fluid" id="thumbnail_preview_image" name="preview_image" alt="Responsive image" style="margin-left: 5%;margin-top: 3%;width: 80%;cursor: pointer;">
			</label>
			<input type="file" class="custom-file-input form-control file-upload" style="visibility: hidden;" id="thumbnail" name="thumbnail" />
			<div class="text-center error" id="div_error_thumbnail" style="margin-top: -35px;">
				<span id='error_thumbnail'></span>
			</div>
		</div>
		<p class="judul_kanan2" style="margin-top: 2%;">Status Class</p>
		<p class="mt-2">
			<div class="div_status_class">
				<div class="row">
					<?php if($detail->status == 0){?>
						<div class="col-md-3 col-3">
							<button type="button" class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" style="background-color:white;width: 150px;margin-left:0px;" data-toggle="modal" data-target="#modal_start_class">Start Class</button>
						</div>
						<div class="col-md-3 col-3">
							<button type="button" class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" style="background-color:white;width: 150px;margin-left:0px;" data-toggle="modal" data-target="#modal_cancel_class">Delete Class</button>
						</div>
					<?php }else if($detail->status == 1){?>
						<div class="col-md-3 col-3">
							<button
							type="button"
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width: 150px;margin-left:0px;"
							data-toggle="modal" data-target="#modal_finish_class">Finish Class</button>
						</div>
					<?php }else if($detail->status == 2){?>
						<div class="col-md-3 col-3">
							<p>Finish Class</p>
						</div>
					<?php }else if($detail->status == 3){?>
						<div class="col-md-3 col-3">
							<p>Class Cancel</p>
						</div>
					<?php } ?>
				</div>
				<div class="row mt-3">
					<div class="col-md-3 col-3">
						<button type="button" class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" style="background-color:white;width: 150px;margin-left:0px;" data-toggle="modal" data-target="#modal_copy_class">Copy Class</button>
					</div>
				</div>
				<div class="row mt-4">
					<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
					</div>
				</div>

				<div class="row mt-4">
					<div class="col-md-3 col-3">
						<button
							type="submit"
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width: 200px;margin-left:0px; margin-bottom: 100%;">Save Changes</button>
					</div>
				</div>
			</div>
		</p>
		<?= form_close() ?>
	</div>
	
</div>

<!-- Modal Start Class -->
<div class="modal fade" id="modal_start_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mx-3">
				<div id="loading-overlay-modal-start">
					<div class="loading-icon"></div>
				</div>
				<div class="p-4 text-center">
					<p class="judul_kanan"><?= $detail->class_name?></p>
					<p style="color:grey;"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
					<p style="margin-bottom: -3%;">Are you sure you would like to publish this class for the students ?</p>
				</div>
				<div class="modal-footer d-flex justify-content-center mt-3">
					<p class="close_modal" style="color:red;margin-left: 5%;cursor: pointer;" data-dismiss="modal">Cancel</p>
					<button 
						type="button" 
						class="btn remove_outline btn_outline_blue text15 text_medium" 
						id="start_class"
						style="margin-left: 8%;">Start Class</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Finish Class -->
<div class="modal fade" id="modal_finish_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mx-3">
				<div id="loading-overlay-modal-finish">
					<div class="loading-icon"></div>
				</div>
				<div class="p-4 text-center">
					<p class="judul_kanan"><?= $detail->class_name?></p>
					<p style="color:grey;"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
					<p style="margin-bottom: -3%;">Do you want to confirm this class is completed ?</p>
				</div>
				<div class="modal-footer d-flex justify-content-center mt-3">
					<p class="close_modal" style="color:red;margin-left: 5%;cursor:pointer;" data-dismiss="modal">Cancel</p>
					<button 
						type="button" 
						class="btn remove_outline btn_outline_blue text15 text_medium" 
						id="finish_class"
						style="margin-left: 8%;">Finish Class</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Cancel Class -->
<div class="modal fade" id="modal_cancel_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mx-3">
				<div id="loading-overlay-modal-cancel">
					<div class="loading-icon"></div>
				</div>
				<div class="p-4 text-center">
					<p class="judul_kanan"><?= $detail->class_name?></p>
					<p style="color:grey;"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
					<p style="margin-bottom: -3%;">Do you really want to delete class ?</p>
				</div>
				<div class="modal-footer d-flex justify-content-center mt-3">
					<p class="close_modal" style="color:red;margin-left: 5%;cursor: pointer;" data-dismiss="modal">Cancel</p>
					<button 
						type="button" 
						class="btn remove_outline btn_outline_blue text15 text_medium" 
						id="cancel_class"
						style="margin-left: 8%;">Delete Class</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Copy Class -->
<div class="modal fade" id="modal_copy_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mx-3">
				<div id="loading-overlay-modal-copy">
					<div class="loading-icon"></div>
				</div>
				<div class="p-4 text-center">
					<p class="judul_kanan"><?= $detail->class_name?></p>
					<p style="color:grey;"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
					<p class="detail_info_kanan text-left">Academic year</p>
					<select class="browser-default custom-select input" style="color: black;" id="academy_year_from_modal_copy" name="academy_year_from_modal_copy">
						<?php foreach($academy_year as $ay) { ?>
							<option value="<?= $ay->academy_year_id ?>">
								<?= $ay->academy_year_name ?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div class="modal-footer d-flex justify-content-center mt-3">
					<p class="close_modal" style="color:red;margin-left: 5%;cursor: pointer;" data-dismiss="modal">Cancel</p>
					<button 
						type="button" 
						class="btn remove_outline btn_outline_blue text15 text_medium" 
						id="copy_class"
						style="margin-left: 8%;">Copy Class</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	var class_mission = <?= json_encode($class_mission) ?>;
	var mission_id = <?= $mission_id ?>;
</script>
<script src="<?= base_url(); ?>assets/js/edit_class.js?v=0007"></script>
</main>
<!--Main layout -->