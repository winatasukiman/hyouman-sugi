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
.div_content{
	width: 60%; /* Can be in percentage also. */
    height: auto;
    margin: 0 auto;
    padding: 10px;
    position: relative;
	margin-top:3%;
}
</style>
<!--Section: User-->
<section id="user">
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div class="main">
	<?= form_open_multipart('strength/save_strength', 'id="form_add_strength"') ?>
	<div class="container">
		<div class="row">
			<a href="<?= base_url() ?>user/" style="color:black;"><img src="<?= base_url() ?>assets/img/icon/iconback.svg" width="50" height="50" class="rounded-circle" style="margin-left:45px;"></a>&nbsp;&nbsp;&nbsp;<p class="judul" style="margin-top:4px;">Strength</p>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="judul" style="margin-top:4px;">Create Strength</p>
			</div>
		</div>
		<div class="div_content">
			<div class="row">
				<div class="col-md-8 col-12">
					<div class="form-group mb-3up" style="padding-top:10px;">
						<label class="label">Activity Title</label>
						<div class="input-group mb-3up">
							<input
								type="text" 
								class="form-control input" 
								style="color: black;" 
								id="activity_title" 
								name="activity_title" 
								placeholder="Insert Activity Title" />
						</div>
						<div class="text-center error" id="div_error_activity_title" style="margin-top: 10px;">
							<span id='error_activity_title'></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<div class="form-group mb-3up" style="padding-top:10px;">
						<label class="label">Date</label>
						<div class="input-group date" data-provide="datepicker">
							<input 
							type="text" 
							class="form-control input"
							id="date" 
							name="date" 
							placeholder="Date"
							readonly="true"/>
							<div class="input-group-append text-center">
								<span class="input-group-text">
									<img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg" 
										style="width:20px;"/>
								</span>
							</div>
						</div>
						<div class="text-center error" id="div_error_date" style="margin-top: 10px;">
								<span id='error_date'></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12">
					<div class="form-group mb-3up" style="padding-top:10px;">
						<label class="label">General Description</label>
						<textarea 
						class="form-control input"
						id="general_description"
						name="general_description" 
						rows="3"
						placeholder="Insert General Description"></textarea>
						<div class="text-center error" id="div_error_general_description" style="margin-top: 10px;">
							<span id='error_general_description'></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12">
					<div class="form-group mb-3up" style="padding-top:10px;">
						<label class="label">Reference</label><br>
						<input type="file" id="reference" name="reference[]" multiple/>
						<div class="text-center error" id="div_error_reference" style="margin-top: 10px;">
							<span id='error_reference'></span>
						</div>
					</div>
					<div id="gallery" class="gallery"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-12">
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
	<?= form_close() ?>
</div>
</section>
<!--/.Section: Personal Profile-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
</script>
<script src="<?= base_url(); ?>assets/js/strength/add_strength.js"></script>
<script src="<?= base_url(); ?>assets/js/dragdrop.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/dragdrop.css">
</main>
<!--Main layout-->