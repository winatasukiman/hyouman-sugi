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
#grade_subject_after,#subject_list{
	display:none;
}
.dropdown-submenu {
  position: relative;
}

.dropdown-submenu a::after {
  transform: rotate(-90deg);
  position: absolute;
  right: 6px;
  top: .8em;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-left: .1rem;
  margin-right: .1rem;
}
#subject_level{
	overflow:hidden;
}
#loading-overlay {
	position: absolute;
	min-height: 100% !important;
	width: 100%;
	height: 100%;
	overflow: auto;
	left: 0;
	top: 0;
	display: none;
	align-items: center;
	background-color: #000;
	z-index: 999;
	opacity: 0.5;
}
#loading-overlay-modal {
	position: absolute;
	min-height: 100% !important;
	width: 100%;
	height: 100%;
	overflow: auto;
	left: 0;
	top: 0;
	display: none;
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
	<a class="create_new_class" href="<?= base_url(); ?>"><img src="<?=base_url()?>assets/img/icon/icon_back.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Create New Class</a>
	<div class="div_class mt-3">
		<?= form_open_multipart('classes/save_class', 'id="form_add_class"') ?>
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
		<div class="row">
			<div class="col-md-6">
				<!-- Grade Subject-->
				<div class="form-group">
					<label class="label" for="grade_subject">Subject and Level</label>
					<input type="hidden" id="grade_subject" name="grade_subject"/>
					<div id=subject_level class="browser-default custom-select input form-control" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						Choose subject and level
					</div>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
							<?php $subject_parent = "";
							foreach($teacher_specialty as $gs) { 
								if($gs->subject_parent_id != $subject_parent){ ?>
									<a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink<?= $gs->subject_parent_id ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?= $gs->subject_parent_name ?>
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<?php $grade = "";foreach($teacher_specialty as $gs2) {
										if($gs2->subject_parent_id == $gs->subject_parent_id){
											if($gs2->grade_id != $grade){?>
										<li class="dropdown-submenu">
											<a class="dropdown-item dropdown-toggle" href="#"><?= $gs2->grade_name ?></a>
											<ul class="dropdown-menu">
											<?php foreach($teacher_specialty as $gs3) {
												if($gs3->subject_parent_id == $gs->subject_parent_id && $gs3->grade_id == $gs2->grade_id) { ?>
												<li><a class="dropdown-item" href="#" onclick="setSubjectLevel(<?= $gs3->grade_subject_id ?>)" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><?= $gs3->subject_name ?></a></li>
											<?php }
											}?>
											</ul>
										</li>
									<?php }$grade = $gs2->grade_id;
										}
									}?>
									</ul>
							<?php }$subject_parent = $gs->subject_parent_id;
							}?>
							</li>
						</ul>
					</div>
					<div class="error" id="div_error_grade_subject">
						<span id='error_grade_subject'></span>
					</div>
				</div>
				<!--  Mata Pelajaran -->
				<!-- <div class="form-group mb-3up" >
					<label class="label" for="mapel">Mata Pelajaran</label>
					<div class="input-group mb-3up">
						<input
							type="text" 
							class="form-control input" 
							style="color: black;" 
							id="mapel" 
							name="mapel" 
							placeholder="Enter Elemen Mata Pelajaran" />
					</div>
					<div class="error" id="div_error_mapel">
						<span id='error_mapel'></span>
					</div>
				</div>  -->
				<!-- Sub Elemen -->
				<!-- <div class="form-group mb-3up" >
					<label class="label" for="mapel">Sub Elemen</label>
					<div class="input-group mb-3up">
						<textarea
							type="text" 
							class="form-control input" 
							style="color: black;" 
							id="sub_elemen" 
							name="sub_elemen" 
							placeholder="Enter Sub Elemen"></textarea>
					</div>
					<div class="error" id="div_error_sub_elemen">
						<span id='error_sub_elemen'></span>
					</div>
				</div> --> 
				<!-- Semester -->
				<!-- <div class="form-group" id="semester" >
					<label class="label" for="semester">Semester</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="semester" name="semester">
							<option disabled selected>Choose semester</option>
							<?php foreach($semester as $s) { ?>
								<option value="<?= $s->semester_id ?>">
									<?= $s->semester_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error" id="div_error_semester">
						<span id='error_semester'></span>
					</div>
				</div> -->
				<!-- Term -->
				<div class="form-group" id="term" >
					<label class="label" for="term">Term & Semester</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="term" name="term" >
							<option disabled selected>Choose term</option>
							<?php $temp = 0; for($i = 0; $i < count($term); $i++) { ?>
								<option value="<?= $term[$i]->term_id ?>">
									<?= $term[$i]->term_name ?> ( <?= $term[$i]->semester_name ?> )
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error" id="div_error_term">
						<span id='error_term'></span>
					</div>
				</div>
				<!-- Curicullum -->
				<div class="form-group">
					<label class="label" for="curicullum">Curriculum</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control"  id="curicullum" name="curicullum">
							<option disabled selected>Choose curriculum</option>
							<?php foreach($curicullum as $c) { ?>
								<option value="<?= $c->curicullum_id ?>">
									<?= $c->name ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error" id="div_error_curicullum">
						<span id='error_curicullum'></span>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<!-- SCHOOL NAME -->
				<div class="form-group">
					<label class="label" for="school_name">School Name</label>
					<div class="input-group">
						<input
							type="text" 
							class="form-control input"
							id="school_name" 
							name="school_name" 
							placeholder="Enter School Name" />
					</div>
					<div class="error" id="div_error_school_name">
						<span id='error_school_name'></span>
					</div>
				</div>
				<!-- ACADEMY YEAR -->
				<div class="form-group" >
					<label class="label" for="academy_year">Academic Year</label>
					<div class="input-group">
						<select class="browser-default custom-select input form-control" id="academy_year" name="academy_year">
							<option disabled selected>Choose academic year</option>
							<?php foreach($academy_year as $ay) { ?>
								<option value="<?= $ay->academy_year_id ?>">
									<?= $ay->academy_year_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="error" id="div_error_academy_year">
						<span id='error_academy_year'></span>
					</div>
				</div>
				<!-- Thumbnail -->
				<div class="form-group">
					<label class="label" for="class_name">Thumbnail</label>
				</div>
				<div class="form-group file-upload-wrapper" style="margin-top:-20px;">
					<label for="thumbnail"><img src="<?= base_url() ?>assets/img/icon/thumbnail2.png" class="img-fluid" id="thumbnail_preview_image" name="preview_image" alt="Responsive image" >
					</label>
					<input 	
						type="file" 
						class="custom-file-input form-control file-upload" 
						style="visibility: hidden;"
						id="thumbnail"
						name="thumbnail" />
					<div class="error" id="div_error_thumbnail" style="margin-top:-35px;">
						<span id='error_thumbnail'></span>
					</div>
				</div>
				<!--<div class="form-group" style="margin-top:-20px;">
					<div class="" id="content">
						<div><input type="text" id="mission0" value="1"><input type="text" name="desc"></div>
					</div>
				</div>
				<input type="text" name="desc" onclick="addRow()"> -->
			</div>
			
		</div>
		<div class="d-flex justify-content-end align-items-center">
			<p class="m-0">
				<button type="submit" id="save_changes" name="save_changes">Add Class</button>
			</p>
		</div>
		<?= form_close() ?>
	</div>
</div>
</section>
<!--/.Section: Personal Profile-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	var teacher_specialty = <?= json_encode($teacher_specialty) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/add_class.js?v=002"></script>
</main>
<!--Main layout-->