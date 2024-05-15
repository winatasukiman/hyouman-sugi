Main layout-->
<main>
<style>
.judul, .label, .input{
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
}
.judul {
	font-size: 30px;
	font-weight: 700;
	text-align: left;
}
.label {
	font-size: 15px;
	font-weight: 700;
}
.isi{
	font-size: 14px;
	font-weight: 300;
	text-align: left;
}
.input {
	font-size: 16px;
	font-weight: 500;

}
.editprofil1 {
	background-color: white;
}
p{
	color:#28557B;
}
#grade_subject_after{
	display:none;
}
#loading-overlay {
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
.silang{
	margin-left: 25%;
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
	<div class="container">
		<div class="row">
			<a href="<?= base_url() ?>user/" style="color:black;"><img src="<?= base_url() ?>assets/img/icon/iconback.svg" width="50" height="50" class="rounded-circle"></a>&nbsp;&nbsp;&nbsp;<p class="judul" style="margin-top:2px;"><?= $title ?></p>
		</div>
		<div class="row">
			<div class="col-sm-6 text-center">
				<p class="isi">Please choose programme and grade subject, click add item and save changes</p>
			</div>
		</div>
		<div class="row editprofil1" style="text-align: left;">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('category_success')) { ?>
					<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
				<?php } ?>
				<?php if ($this->session->flashdata('category_error')) { ?>
					<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
				<?php } ?>
			</div>
			<div class="col-md-12 text-left">
				<div class="row">
					<div class="col-md-3 col-12">
						<!-- Subject Parent-->
						<div class="form-group" style="padding-top:10px;">
							<label class="label" for="subject_parent">Programme</label>
							<div class="input-group">
								<select class="browser-default custom-select input" style="color: black;"
									id="subject_parent" name="subject_parent">
									<option disabled selected>Choose Programme</option>
									<?php foreach ($subject_parent as $res) {
									?>
										<option value="<?= $res->subject_parent_id ?>">
											<?= $res->subject_parent_name ?>
										</option>
									<?php
									} ?>
								</select>
							</div>
							<div class="text-center error" id="div_error_subject_parent" style="margin-top: 10px;text-align:center;">
								<span id='error_subject_parent'></span>
							</div>
						</div>
						<!-- Grade Subject-->
						<div class="form-group mb-5" id="grade_subject_before" style="padding-top:10px;">
							<label class="label" for="grade">Grade Subject</label>
							<div class="input-group">
								<select class="browser-default custom-select input" style="color: black;">
									<option disabled selected>Choose Grade Subject</option>
								</select>
							</div>
						</div>
						<!-- Grade Subject -->
						<div class="form-group mb-3up" id="grade_subject_after" style="padding-top:10px;">
							<label class="label" for="instituion">Grade Subject</label>
							<div class="input-group" id="grade_subject_dropdown">
								
							</div>
							<div class="text-center error" id="div_error_grade_subject" style="margin-top: 10px;text-align:center;">
								<span id='error_grade_subject'></span>
							</div>
						</div>
						<!-- Button Add Item -->
						<div class="form-group">
							<div class="input-group mb-5up">
								<button 
									type="submit" 
									class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center"
									id="add_subject" 
									name="add_subject"
									style="background-color: white;width: 150px;margin:auto;">Add Item</button>
							</div>
						</div>
					</div>
					<div class="col-md-8 col-11">
						<div class="row mb-3up d-flex justify-content-center" id="subject-list">
						</div>
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
</div>
</section>
<!--/.Section: Personal Profile-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
</script>
<script src="<?= base_url(); ?>assets/js/subject.js"></script>
</main>
<!--Main layout-->