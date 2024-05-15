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
.grade_subject{
	font-size: 20px;
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
	font-size: 20px;
	color: #1E3243;
}
.modal_head{
	font-weight: 600;
	font-size: 18px;
	color: #1E3243;
}
.modal_title{
	font-weight: 400;
	font-size: 16px;
	color: #1E3243;
}
.modal_subtitle{
	font-weight: 400;
	font-size: 16px;
	color: #1E3243;
}
.meeting_title{
	color: #3D6586;
}
.head_meeting_table{
	font-weight: 500;
	font-size: 18px;
	color: #1E3243;
	margin:0;
}
.datetime{
	font-weight: 400;
	font-size: 16px;
	color: #1E3243;
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
.grade_subject{
	font-weight: 500;
	font-size: 20px;
	color: #1E3243;
	margin: 0;
}
.academy_year{
	font-weight: 500;
	font-size: 16px;
	color: #1E3243;
}
.term{
	font-weight: 500;
	font-size: 16px;
	color: #3D6586;
}
.class_goal{
	font-weight: 600;
	font-size: 16px;
	color: #1E3243;
	margin: 0;
}
.class_desc{
	font-size: 16px;
	color: #1E3243;
}
.list_meeting{
	padding: 16px 29px 16px 16px;
	border: 1px solid #3D658633;
	border-radius: 8px;
	font-weight: 400;
	font-size: 16px;
	color: #1E3243;
	margin:0;
	width:100%;
}
.meeting_title:hover{
	cursor: pointer;
	text-decoration: underline;
}
.create_new_class, .create_new_class:hover{
	font-weight: 500;
	font-size: 20px;
	color: #1E3243;
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
#loading-overlay, #loading-overlay-modal-start, #loading-overlay-modal-finish, #loading-overlay-modal-cancel, #loading-overlay-modal-copy,#loading-overlay-modal-delete-meeting{
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
		<input type="hidden" id="class_id" value="<?= $detail->class_id ?>"/>
		<p class="class">Class</p>
		<a href="<?= base_url(); ?>user/">
			<?php if($this->session->userdata('user_image') != NULL) { ?>
				<img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="35" height="35" class="rounded-circle">
			<?php } else { ?>
				<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="35" height="35" class="rounded-circle">
			<?php } ?>
		</a>
	</div>
	<a class="create_new_class" href="<?= base_url(); ?>/classes"><img src="<?=base_url()?>assets/img/icon/icon_back.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;All Class</a>
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
		<!-- detail class -->
		<div class="row">
			<div class="col-2 col-md-2 d-flex align-items-center p-0">
				<img src="<?=base_url()?>assets/img/uploads/user/<?=$detail->class_image?>" style="height: 50%;width: 100%;background-position: center;background-repeat: no-repeat;background-size: cover;">
			</div>
			<div class="col-7 col-md-7">
				<?php if($detail->subject_parent_id == 4){ ?>
					<p class="grade_subject"><?=$detail->subject_parent_name?> : <?= $detail->subject_name?> - <?= $detail->grade_name?></p>
				<?php }else{ ?>
					<p class="grade_subject"><?= $detail->subject_name?> - <?= $detail->grade_name?> <?php if($detail->curicullum_id == 2){ echo " - Phase ".$detail->phase_name;}?></p>
				<?php } ?>
				<p class="academy_year">(<?= $detail->academy_year_name?>)</p>
				<p class="class_goal">Class Objectives</p>
				<p class="class_desc"><?= $detail->class_description ?></p>
				<p class="term m-0"><?= $detail->term_name?></p>
				<?php if (! empty($class_mission)) { ?>
				<div class="row mt-1">
					<div class="col-6 col-md-6 pr-0">
						<p class="d-flex align-items-center datetime"><img src="<?=base_url()?>assets/img/icon/icon_calendar_black.png" style="max-width:100%;height:auto;margin-right:5px;"><?= $detail->class_start_datetime?></p>
					</div>
					<div class="col-6 col-md-6 pr-0">
						<p class="d-flex align-items-center datetime"><img src="<?=base_url()?>assets/img/icon/icon_calendar_red.png" style="max-width:100%;height:auto;margin-right:5px;"><?= $detail->class_finish_datetime?></p>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="col-3 col-md-3">
				<!-- <div style="position:absolute;top:0;">
					<?php if($detail->status == 0){?>
							<button type="button" class="btn_create_class" data-toggle="modal" data-target="#modal_start_class">Start Class</button>
					<?php }else if($detail->status == 1){?>
							<button type="button" class="btn_create_class" data-toggle="modal" data-target="#modal_finish_class">Finish Class</button>
					<?php }else if($detail->status == 2){?>
							<p class="academy_year">Finish Class</p>
					<?php }else if($detail->status == 3){?>
							<p class="academy_year">Class Cancel</p>
					<?php } ?>
				</div> -->
				<div >
					<!--Navbar-->
					<nav class="navbar">

						<!-- Collapse button -->
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent15"
						aria-controls="navbarSupportedContent15" aria-expanded="false" aria-label="Toggle navigation"><img src="<?= base_url() ?>assets/img/icon/three-dots-vertical.png" style="max-width:100%;height:auto;"></button>

						<!-- Collapsible content -->
						<div class="collapse navbar-collapse" id="navbarSupportedContent15">

						<!-- Links -->
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" type="button" href="#" data-toggle="modal" data-target="#modal_copy_class"><img src="<?= base_url() ?>assets/img/icon/copy-class.png" style="max-width:100%;height:auto;margin-right: 5px;">Copy Class</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url()?>classes/details/<?=$detail->class_id?>/0"><img src="<?= base_url() ?>assets/img/icon/edit-class.png" style="max-width:100%;height:auto;margin-right: 5px;">Edit Class</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" type="button" data-toggle="modal" data-target="#modal_cancel_class"><img src="<?= base_url() ?>assets/img/icon/delete-class.png" style="max-width:100%;height:auto;margin-right: 5px;">Delete Class</a>
							</li>
						</ul>
						<!-- Links -->

						</div>
						<!-- Collapsible content -->

					</nav>
					<!-- /.Navbar -->
				</div>
			</div>
		</div>
	</div>
	<!-- list meeting -->
	<div class="div_class mt-5">
		<div class="d-flex justify-content-between align-items-center">
			<p class="my_class m-0">Meeting</p>
			<a href="<?=base_url()?>meeting/edit/0/<?= $detail->class_id ?>"><button class="btn_create_class">Add meeting</button></a>
		</div>
		<!-- header meeting table -->
		<div class="row head_meeting_table" style="margin-top:32px;">
			<div class="col-2 col-md-1">
				No
			</div>
			<div class="col-3 col-md-3">
				Topic
			</div>
			<div class="col-3 col-md-3">
				Meeting Date & Time
			</div>
			<div class="col-4 col-md-3">
				Link / Location
			</div>
			<div class="col-12 col-md-2">
				Action
			</div>
		</div>
		<?php $i = 1; if (! empty($class_mission)) {
				foreach ($class_mission as $cm) { ?>
		<div class="row mt-3 list_meeting">
			<div class="col-2 col-md-1 d-flex align-items-center p-0">
				<p class="m-0 text-center"><?=$i?></p>
			</div>
			<div class="col-3 col-md-3 d-flex align-items-center p-0">
				<a href="<?=base_url()?>meeting/details/<?=$cm->class_mission_id?>" class="meeting_title m-0">
					<?php if($cm->mission_title == ""){?>
						Meeting <?=$i?>
					<?php }else{ ?>
						<?=$cm->mission_title?>
					<?php } ?>
					</a>
			</div>
			<div class="col-3 col-md-3 d-flex align-items-center">
				<p class="m-0 datetime"><?=$cm->publish_datetime?></p>
			</div>
			<div class="col-4 col-md-3">
				<p class="m-0">
					<?php if($cm->face_to_face == 1){?>
						<?=$cm->meeting_location?>
					<?php }else{ ?>
						<a class="meeting_title" href="<?=$cm->google_meet_link?>"><?=$cm->google_meet_link?></a>
					<?php } ?>
				</p>
			</div>
			<div class="col-12 col-md-2 d-flex justify-content-center">
				<!--Navbar-->
				<nav class="navbar">

					<!-- Collapse button -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent<?=$cm->class_mission_id?>"
					aria-controls="navbarSupportedContent<?=$cm->class_mission_id?>" aria-expanded="false" aria-label="Toggle navigation"><img src="<?= base_url() ?>assets/img/icon/three-dots-vertical.png" style="max-width:100%;height:auto;"></button>

					<!-- Collapsible content -->
					<div class="collapse navbar-collapse" id="navbarSupportedContent<?=$cm->class_mission_id?>" style="width: 170px;">

						<!-- Links -->
						<ul class="navbar-nav mr-auto">
							<li class="nav-item active">
								<a class="nav-link" href="#"  onclick="copy_mission(<?= $cm->class_id ?>,<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/copy-class.png" style="max-width:100%;height:auto;margin-right: 5px;">Copy Meeting</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=base_url()?>meeting/edit/<?=$cm->class_mission_id?>"><img src="<?= base_url() ?>assets/img/icon/edit-class.png" style="max-width:100%;height:auto;margin-right: 5px;">Edit Meeting</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#" onclick="delete_mission(<?=$cm->class_mission_id?>)"><img src="<?= base_url() ?>assets/img/icon/delete-class.png" style="max-width:100%;height:auto;margin-right: 5px;">Delete Meeting</a>
							</li>
						</ul>
						<!-- Links -->

					</div>
					<!-- Collapsible content -->

				</nav>
				<!-- /.Navbar -->
			</div>
		</div>
		<?php $i++;}
		}?>
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
				<div class="row mt-3 d-flex align-items-center" style="margin:0;">
					<div class="col-3 col-md-3">
						<p class="close_modal m-0" data-dismiss="modal">Cancel</p>
					</div>
					<div class="col-9 col-md-9">
						<button type="button" class="btn_create_class" id="start_class">Start Class</button>
					</div>
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
				<div class="row mt-3 d-flex align-items-center" style="padding-top:20px;margin:0;">
					<div class="col-3 col-md-3">
						<p class="close_modal m-0" data-dismiss="modal">Cancel</p>
					</div>
					<div class="col-9 col-md-9">
						<button type="button" class="btn_create_class" id="finish_class">Finish Class</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Cancel Class -->
<div class="modal fade" id="modal_cancel_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="loading-overlay-modal-cancel">
					<div class="loading-icon"></div>
				</div>
				<p class="modal_head m-0">Delete class ?</p>
				<p class="modal_title">Are you sure you want to delete this class?</p>
				<div class="row p-3 mt-3 d-flex align-items-center">
					<div class="col-6 col-md-6 pl-0">
						<p class="m-0 text-center" data-dismiss="modal" style="background: #E8E8E8;border-radius: 8px;padding: 10px;font-weight: 500;font-size: 16px;color: #1E3243;cursor: pointer;">No, keep it</p>
					</div>
					<div class="col-6 col-md-6 pr-0">
						<button type="button" class="btn_create_class" id="cancel_class">Yes, delete it</button>
					</div>
				</div>
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
				<input type="hidden" id="class_mission_id" value="<?= $detail->class_id ?>"/>
				<p class="modal_head">Delete meeting ?</p>
				<p class="modal_title">Are you sure you want to delete this meeting?</p>
				<div class="row mt-3 d-flex align-items-center" style="padding-top:20px;width:100%;margin:0;">
					<div class="col-6 col-md-6 pl-0">
						<p class="m-0 text-center" data-dismiss="modal" style="background: #E8E8E8;border-radius: 8px;padding: 10px;font-weight: 500;font-size: 16px;color: #1E3243;cursor: pointer;">No, keep it</p>
					</div>
					<div class="col-6 col-md-6 p-0">
						<button type="button" class="btn_create_class" id="delete_meeting">Yes, delete it</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Copy Class -->
<div class="modal fade" id="modal_copy_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="loading-overlay-modal-copy">
					<div class="loading-icon"></div>
				</div>
				<p class="modal_head m-0">Are you sure you want to copy this class?</p>
				<p class="modal_subtitle"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
				<p class="term">Academic year</p>
				<select class="browser-default custom-select input form-control" id="academy_year_from_modal_copy" name="academy_year_from_modal_copy">
					<?php foreach($academy_year as $ay) { ?>
						<option value="<?= $ay->academy_year_id ?>">
							<?= $ay->academy_year_name ?>
						</option>
					<?php } ?>
				</select>
				<div class="row mt-3 d-flex align-items-center" style="padding-top:20px;width:100%;margin:0;">
					<div class="col-4 col-md-4 pl-0">
						<p class="close_modal m-0" data-dismiss="modal">Cancel</p>
					</div>
					<div class="col-8 col-md-8 pr-0">
						<button type="button" id="copy_class">Copy Class</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal Confirmation Class -->
<div class="modal fade" id="modal_confirmation_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div id="loading-overlay-modal-copy">
					<div class="loading-icon"></div>
				</div>
				<p class="modal_head m-0">Please Complete the Class Information</p>
				<p class="modal_subtitle">Are you ready to complete the information ?</p>
				<div class="row mt-3 d-flex align-items-center" style="padding-top:20px;width:100%;margin:0;">
					<div class="col-6 col-md-6 pl-0">
						<a href="<?=base_url()?>classes/details/<?=$detail->class_id?>/1"><p class="m-0 text-center"  style="background: #E8E8E8;border-radius: 8px;padding: 10px;font-weight: 500;font-size: 16px;color: #1E3243;cursor: pointer;">Skip</p></a>
					</div>
					<div class="col-6 col-md-6 pr-0">
						<a href="<?=base_url()?>classes/details/<?=$detail->class_id?>/0"><button type="button" id="copy_class">Yes</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    const base_url = "<?= base_url() ?>";
	const mode = <?= $mode ?>;
	if(mode == 2){
		$('#modal_confirmation_class').modal('show');
	}
	console.log(mode);
</script>
<script src="<?= base_url(); ?>assets/js/detail_class_view.js?v=003"></script>
</main>
<!--Main layout -->