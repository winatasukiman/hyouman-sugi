Main layout-->
<main>
<style>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;700&display=swap" rel="stylesheet">
.judul, .label, .input{
	font-family: 'Montserrat' , sans-serif;
}
.judul {
	font-size: 30px;
	font-weight: 700;
}
.label {
	font-size: 12px;
	font-weight: 200;
}
.input {
	font-size: 13px;
	font-weight: 300;
}
.editprofil1 {
	background-color: white;
}
.pp{
	margin: 15px;
}
#grade_after,#subject_list{
	display:none;
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
<div class="main">
	<?= form_open_multipart('classes/save_class', 'id="form_add_class"') ?>
	<div class="container">
		<!--<div class="row">
			<a href="<?= base_url() ?>user/" style="color:black;"><img src="<?= base_url() ?>assets/img/icon/iconback.svg" width="50" height="50" class="rounded-circle" style="margin-left:45px;"></a>&nbsp;&nbsp;&nbsp;<p class="judul" style="margin-top:4px;"><?= $title ?></p>
		</div>-->
		<div class="row">
		<div class="col-md-12 text-center">
			<p class="judul" style="margin-top:4px;"><?= $title ?></p>
		</div>
		</div>
		<div class="row pp editprofil1" style="padding: 15px;margin-left:30px;margin-right:30px;">
		
		<div class="col-md-12">
			<?php if ($this->session->flashdata('category_success')) { ?>
				<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
			<?php } ?>
			<?php if ($this->session->flashdata('category_error')) { ?>
				<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
			<?php } ?>
		</div>
			<div class="col-md-12 text-left">
			<p>Grade and Subject</p>
				<div class="row">
					<div class="col-md-6">
						<!-- Subject -->
						<div class="form-group mb-3up" style="padding-top:10px;">
							<label class="label" for="subject">Subject</label>
							<div class="input-group">
								<select class="browser-default custom-select input" style="color: black;" id="subject" name="subject">
									<option disabled selected>Choose Subject</option>
									<?php
									$temp = 0;
									for($i = 0; $i < count($teacher_specialty); $i++) {
										if( $teacher_specialty[$i]->subject_id != $teacher_specialty[$i-1]->subject_id ){
									?>
										<option
											value="<?= $teacher_specialty[$i]->subject_id ?>">
											<?= $teacher_specialty[$i]->subject_name ?>
										</option>
									<?php }
									} ?>
								</select>
							</div>
							<div class="text-center error" id="div_error_subject" style="margin-top: 10px;text-align:center;">
								<span id='error_subject'></span>
							</div>
						</div>
						<!-- Grade -->
						<div class="form-group mb-3up" id="grade_before" style="padding-top:10px;">
							<label class="label" for="grade">Grade</label>
							<div class="input-group">
								<select class="browser-default custom-select input" style="color: black;">
									<option disabled selected>Choose Subject First</option>
								</select>
							</div>
						</div>
						<!-- Grade After Choose Subject -->
						<div class="form-group mb-3up" id="grade_after" style="padding-top:10px;">
							<label class="label" for="instituion">Grade</label>
							<div class="input-group" id="grade_dropdown">
								
							</div>
							<div class="text-center error" id="div_error_grade" style="margin-top: 10px;text-align:center;">
								<span id='error_grade'></span>
							</div>
						</div>
						<!-- Term -->
						<div class="form-group mb-3up" id="term" style="padding-top:10px;">
							<label class="label" for="term">Term</label>
							<div class="input-group">
								<select class="browser-default custom-select input" style="color: black;" id="term" name="term">
									<option disabled selected>Choose Term</option>
									<?php
									$temp = 0;
									for($i = 0; $i < count($term); $i++) {
									?>
										<option
											value="<?= $term[$i]->term_id ?>">
											<?= $term[$i]->term_name ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="text-center error" id="div_error_term" style="margin-top: 10px;text-align:center;">
								<span id='error_term'></span>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group mb-3up" style="padding-top:10px;">
							<label class="label" for="class_name">Class Name</label>
							<div class="input-group mb-3up">
								<input
									type="text" 
									class="form-control input" 
									style="color: black;" 
									id="class_name" 
									name="class_name" 
									placeholder="Enter Class Name" />
							</div>
							<div class="text-center error" id="div_error_class_name" style="margin-top: 10px;">
								<span id='error_class_name'></span>
							</div>
						</div>
						<div class="form-group mb-3up" style="padding-top:10px;">
							<label class="label" for="class_name">Thumbnail</label>
						</div>
						<div class="form-group" style="margin-top:-20px;">
							<label for="thumbnail"><img src="<?= base_url() ?>assets/img/icon/thumbnail.png" class="img-fluid" id="thumbnail_preview_image" name="preview_image" alt="Responsive image" >
							</label>
							<input 	
								type="file" 
								class="custom-file-input form-control" 
								style="visibility: hidden;" 
								id="thumbnail"
								name="thumbnail" />
							<div class="text-center error" id="div_error_thumbnail" style="margin-top: -35px;">
								<span id='error_thumbnail'></span>
							</div>
						</div>
						<!--<div class="form-group" style="margin-top:-20px;">
							<div class="" id="content">
								<div><input type="text" id="mission0" value="1"><input type="text" name="desc"></div>
							</div>
						</div>
						<input type="text" name="desc" onclick="addRow()"> -->
						<div class="form-group">
							<div class="input-group mb-3up">
								<button 
									type="submit" 
									class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center"
									id="save_changes"
									name="save_changes"
									style="background-color: white;width: 150px;margin:auto;">Save Changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>
	<?= form_close() ?>
</div>
</section>
<!--/.Section: Personal Profile-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
</script>
<script src="<?= base_url(); ?>assets/js/add_class.js"></script>
</main>
<!--Main layout-->