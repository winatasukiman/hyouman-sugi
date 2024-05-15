<script src="<?= base_url()?>assets/js/ckeditor/ckeditor.js"></script>
<link href="<?= base_url()?>assets/third_party/bower-select2/css/select2.min.css" rel="stylesheet" />
<script src="<?= base_url()?>assets/third_party/bower-select2/js/select2.min.js"></script>
<!--Main layout-->
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
	font-weight: 500;
	font-size: 10px;
	color: #DC3545;
	margin: 0;
    margin-left: 5px;
}
#grade_subject_after,#subject_list{
	display:none;
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
#subject_level{
	overflow:hidden;
}
#navbarNavDropdown{
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
    border: 1px solid #BECCD7;
	border-top: 0px!important;
	margin-top:-15px;
	padding: 1.375rem 1.75rem 0.375rem 0.75rem;
}
#navbarDropdownMenuLink{
	color: #1E3243;
    font-weight: 500;
    font-size: 16px;
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
	<a class="create_new_class mt-3" href="<?=base_url()?>classes/details/<?=$detail->class_id?>/1"><img src="<?=base_url()?>assets/img/icon/icon_back.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Class details</a>
	<div class="div_class mt-3">
		<?= form_open_multipart('classes/update_class', 'id="form_edit_class"') ?>
		<input type="hidden" class="form-control input" id="class_id" name="class_id" value="<?= $detail->class_id ?>"/>
		<div class="row">
			<div class="col-md-6">
				<!-- project user -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Project User<p class="optional">*Optional</p></label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="project_user" name="project_user">
							<option value=null>Choose Project User</option>
							<option value="Personal" <?=$detail->project_user == 'Personal' ? ' selected' : ''; ?>>Personal</option>
							<option value="Neighborhood" <?=$detail->project_user == 'Neighborhood' ? ' selected' : ''; ?>>Neighborhood</option>
							<option value="Private Sector" <?=$detail->project_user == 'Private Sector' ? ' selected' : ''; ?>>Private Sector</option>
							<option value="Community" <?=$detail->project_user == 'Community' ? ' selected' : ''; ?>>Community</option>
							<option value="Public Services" <?=$detail->project_user == 'Public Services' ? ' selected' : ''; ?>>Public Services</option>
						</select>
					</div>
					<div class="error" >
						<span id='error_project_user'></span>
					</div>
				</div>
				<!-- project style -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Project Style<p class="optional ">*Optional</p></label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="project_style" name="project_style">
							<option value=null>Choose Project Style</option>
							<option value="Product" <?=$detail->project_style == 'Product' ? ' selected' : ''; ?>>Product</option>
							<option value="System" <?=$detail->project_style == 'System' ? ' selected' : ''; ?>>System</option>
						</select>
					</div>
					<div class="error">
						<span id='error_project_style'></span>
					</div>
				</div>
				<!-- project member -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Project Member<p class="optional ">*Optional</p></label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="project_member" name="project_member">
							<option value=null>Choose Project Member</option>
							<option value="Individual" <?=$detail->project_member == 'Individual' ? ' selected' : ''; ?>>Individual</option>
							<option value="Team" <?=$detail->project_member == 'Team' ? ' selected' : ''; ?>>Team</option>
						</select>
					</div>
					<div class="error">
						<span id='error_project_member'></span>
					</div>
				</div>
				<!-- class objectives -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Class Objectives<p class="optional">*Optional</p></label>
					<div class="input-group">
						<textarea 
							class="form-control input"
							id="description"
							name="description" 
							rows="5"
							placeholder="Enter class objective"><?= $detail->class_description?></textarea>
					</div>
					<div class="error">
						<span id='error_class_goal'></span>
					</div>
				</div>
				<!-- subject and level -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label">Subject and Level</label>
					<input type="hidden" id="grade_subject" name="grade_subject" value=<?= $detail->grade_subject_id?>/>
					<div id=subject_level class="browser-default custom-select input form-control" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						Choose Subject and Level
					</div>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
							<?php $subject_parent = "";$grade = "";
							foreach($grade_subject as $gs) { 
								if($gs->subject_parent_name != $subject_parent){ ?>
									<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?= $gs->subject_parent_name ?>
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<?php $grade = "";foreach($grade_subject as $gs2) {
										if($gs2->subject_parent_name == $gs->subject_parent_name){
											if($gs2->grade_name != $grade){?>
										<li class="dropdown-submenu">
											<a class="dropdown-item dropdown-toggle" href="#"><?= $gs2->grade_name ?></a>
											<ul class="dropdown-menu">
											<?php foreach($grade_subject as $gs3) {
												if($gs3->subject_parent_name == $gs->subject_parent_name && $gs3->grade_name == $gs2->grade_name) { ?>
												<li><a class="dropdown-item" href="#" onclick="setSubjectLevel(<?= $gs3->grade_subject_id ?>)" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><?= $gs3->subject_name?></a></li>
											<?php }
											}?>
											</ul>
										</li>
									<?php }$grade = $gs2->grade_name;
										}
									}?>
									</ul>
							<?php }$subject_parent = $gs->subject_parent_name;
							}?>
							</li>
						</ul>
					</div>
					<div class="error">
						<span id='error_grade_subject'></span>
					</div>
				</div>
				<!-- curicullum -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label">Curicullum</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="curicullum" name="curicullum">
							<?php foreach($curicullum as $c) { ?>
								<option
									value="<?= $c->curicullum_id ?>" <?php if($detail->curicullum_id == $c->curicullum_id) { echo "selected"; } ?>>
									<?= $c->name ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error">
						<span id='error_curicullum'></span>
					</div>
				</div>
				<!-- school name -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label">School Name</label>
					<div class="input-group">
						<input type="text" 
							class="form-control input"
							id="school_name" 
							name="school_name" 
							placeholder="Enter School Name"
							value="<?= $detail->school_name?>" />
					</div>
					<div class="error">
						<span id='error_school_name'></span>
					</div>
				</div>
				<!-- teacher name -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label">Teacher's Name</label>
					<div class="input-group">
						<input type="text" 
							class="form-control input"
							id="teacher_name" 
							name="teacher_name" 
							placeholder="Enter Teacher's Name"
							value="<?= $detail->teacher_name?>" />
					</div>
					<div class="error">
						<span id='error_teacher_name'></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<!-- academy year -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Academy Year</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="academy_year" name="academy_year">
							<?php foreach($academy_year as $ay) { ?>
								<option value="<?= $ay->academy_year_id ?>" <?php if($detail->academy_year_id == $ay->academy_year_id) { echo "selected"; } ?>>
									<?= $ay->academy_year_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error">
						<span id='error_academy_year'></span>
					</div>
				</div>
				<!-- semester -->
				<!-- <div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Semester</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="semester" name="semester">
							<?php foreach($semester as $s) { ?>
								<option value="<?= $s->semester_id ?>" <?php if($detail->semester_id == $s->semester_id) { echo "selected"; } ?>>
									<?= $s->semester_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error" >
						<span id='error_semester'></span>
					</div>
				</div> -->
				<!-- term -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Term & Semester</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="term" name="term" >
							<?php foreach($term as $t){ ?>
								<option value="<?= $t->term_id ?>" <?php if($detail->term_id == $t->term_id) { echo "selected"; } ?>>
									<?= $t->term_name ?> ( <?= $t->semester_name ?> )
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error">
						<span id='error_term'></span>
					</div>
				</div>
				<!-- meeting period -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Meeting Period</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="meeting_period" name="meeting_period">
							<option disabled selected>Choose Meeting Period</option>
							<option value="Monthly" <?=$detail->meeting_period == 'Monthly' ? ' selected' : ''; ?>>Monthly</option>
							<option value="Weekly" <?=$detail->meeting_period == 'Weekly' ? ' selected' : ''; ?>>Weekly</option>
							<option value="Daily" <?=$detail->meeting_period == 'Daily' ? ' selected' : ''; ?>>Daily</option>
						</select>
					</div>
					<div class="error">
						<span id='error_meeting_period'></span>
					</div>
				</div>
				<!-- class start -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Class Start<p class="optional ">*Optional</p></label>
					<div class="wrapperz">
						<input 
							type="text" 
							class="form-control input dt_picker"
							id="class_start_time" 
							name="class_start_time" 
							placeholder="District"
							value="<?=  $detail->class_start_date ?> - <?=  $detail->class_start_time ?>"
							style="padding-left:32px;"
							readonly="true"/>
						<span class="span-left"><i toggle="#confirm_password" class="fa fa-calendar"></i></span>
						<span class="span-right"><img src="<?=base_url()?>assets/img/icon/icon_arrow_down.png" class="img-fluid"></span>
					</div>
					<div class="error" >
						<span id='error_class_start'></span>
					</div>
				</div>
				<!-- class finish -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label d-flex align-items-center">Class Finish<p class="optional ">*Optional</p></label>
					<div class="wrapperz">
						<input 
							type="text" 
							class="form-control input dt_picker"
							id="class_finish_time" 
							name="class_finish_time"
							placeholder="District"
							value="<?=  $detail->class_finish_date ?> - <?=  $detail->class_finish_time ?>"
							style="padding-left:32px;"
							readonly="true"/>
							<span class="span-left"><i toggle="#confirm_password" class="fa fa-calendar"></i></span>
							<span class="span-right"><img src="<?=base_url()?>assets/img/icon/icon_arrow_down.png" class="img-fluid"></span>
					</div>
					<div class="error" >
						<span id='error_class_finish'></span>
					</div>
				</div>
				<!-- thumbnail -->
				<div class="form-group" style="padding-top:10px;">
					<label class="label">Thumbnail</label>
					<div class="form-group file-upload-wrapper">
						<label for="thumbnail"><img src="<?= base_url() ?>assets/img/uploads/user/<?= $detail->class_image ?>" class="img-fluid" id="thumbnail_preview_image" name="preview_image" alt="Responsive image" style="cursor: pointer;">
						</label>
						<input type="file" class="custom-file-input form-control file-upload" style="visibility: hidden;" id="thumbnail" name="thumbnail" />
						<div class="error" id="div_error_thumbnail" style="margin-top: -35px;">
							<span id='error_thumbnail'></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row d-flex justify-content-end mb-3">
			<div class="col-6 col-md-3">
				<button type="submit">Save Changes</button>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	var class_mission = <?= json_encode($class_mission) ?>;
	var teacher_specialty = <?= json_encode($grade_subject) ?>;
	var mission_id = <?= $mission_id ?>;
	var grade_subject_id = <?= json_encode($detail->grade_subject_id)?>;
</script>
<script src="<?= base_url(); ?>assets/js/edit_class.js?v=001"></script>
<!--Main layout -->
</main>