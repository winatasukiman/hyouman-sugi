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
.view_detail {
	color: #28557B;
}
.view_detail:hover{
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
.more_detail {
	color: #28557B;
}
.more_detail:hover{
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
#view_less,.view_less{
	display:none;
}
#div_bsteams,#div_summary,.div_content{
	display:none;
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
.div_content_ss{
	background-color:#f0ebe1;
	border-radius:5px;
	margin-right:15%;
}
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
			<p class="text_bold"><a href="<?=base_url()?>classes/"><img src="<?= base_url() ?>assets/img/icon/previous.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;&nbsp;&nbsp;Strength</a></p><br>

			<p class="judul_kiri"><?= $strength_student->activity_title ?></p>

			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/description.png" class="imgsamping" alt="Responsive image">&nbsp;&nbsp;General Description</p>

			<div class="detail_info_samping"><p><?= $strength_student->general_description ?></p></div>
			
			<p style="font-size: 10pt; margin-bottom: 0%; color: #A5A3A3;"><img src="<?= base_url() ?>assets/img/icon/meetingtime.png" class="imgsamping2" alt="Responsive image">&nbsp;&nbsp;Date</p>
			<div class="detail_info_samping"><p><?= $strength_student->new_date?>, <?= $strength_student->new_time?></p></div>
		</div>
	<div class="col-md-9" id="" style="padding:13px 10px 10px 50px;">
		<div class="sidenav row text-center">
			<a class="col-md-3 col-6 sn-item active" id="strength_capture"style="padding:0;"><p style="margin-top:15px;">Strength Capture</p></a>
			<a class="col-md-3 col-6 sn-item" id="bsteams" style="padding:0;"><p style="margin-top:15px;">BSTEAMS</p></a>
			<a class="col-md-3 col-6 sn-item" id="summary" style="padding:0;"><p style="margin-top:15px;">Summary</p></a>
		</div>
		<div class="row mt-5 hide" style="width: 60%;height: auto;margin: 0 auto;">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('category_success')) { ?>
					<div class="alert alert-success text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
				<?php } ?>
				<?php if ($this->session->flashdata('category_error')) { ?>
					<div class="alert alert-danger text-center"><p> <?= $this->session->flashdata('category_error') ?></p></div>
				<?php } ?>
			</div>
		</div>
		<div id="div_strength_capture" style="padding-left:25px;">
			<?php foreach($strength_student_detail as $ssd){ ?>
			<div class="row mt-4">
				<div class="col-md-6 col-12">
					<p><b><?= $ssd->strength_capture_inisial?></b>&nbsp;&nbsp;<?= $ssd->strength_capture_name?>&nbsp;&nbsp;&nbsp;
						<?php if($ssd->strength_capture_detail_id != null){
							if($ssd->strength_student_detail_review == null){?>
							<img src="<?= base_url()?>assets/img/icon/alert.png" class="img-fluid">
						<?php }else{ ?>
							<img src="<?= base_url()?>assets/img/icon/check.png" class="img-fluid">
						<?php }
						}?>
					<p>
				</div>
				<div class="col-md-3 col-6">
					<?php if($ssd->strength_capture_detail_id != null){ ?>
						<button 
						type="button" 
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium text-center"
						onclick="open_capture_activites(<?= $ssd->strength_student_detail_id?>,<?= $ssd->strength_capture_id?>,<?= $ssd->strength_student_id?>)"
						style="color: white;width: 100%;margin:auto;">Input review</button>
					<?php } ?>
					
				</div>
				<div class="col-md-3 col-6">
					<p class="view_detail" id="view_detail<?= $ssd->strength_student_detail_id?>" onclick="view_detail(<?= $ssd->strength_student_detail_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less<?= $ssd->strength_student_detail_id?>" onclick="view_less(<?= $ssd->strength_student_detail_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
				</div>
			</div>
			<div id="div_content<?= $ssd->strength_student_detail_id?>" class="div_content">
				<div class="row mt-5">
					<div class="col-md-12">
						<?php foreach($ssd->strength_capture_detail as $scd){ ?>
							<p><?= $scd->strength_capture_detail_name ?><p>
						<?php } ?>
					</div>
				</div>
				<?php if($ssd->strength_capture_detail_id != null){ ?>
				<div class="row mt-5 div_content_ss">
					<div class="col-md-2" style="padding:0;">
						<?php if(! empty($ssd->strength_student_detail_file[0]->file_path)){ ?>
						<img src="<?= $this->config->item('student_url') ?><?= $ssd->strength_student_detail_file[0]->file_path ?>" class="img-fluid" alt="Responsive image">
						<?php } ?>
					</div>
					<div class="col-md-7">
						<p><?= $ssd->strength_student_detail_name ?><p>
					</div>
					<div class="col-md-3 text-right">
						<p class="more_detail" data-toggle="modal" data-target="#modal_more_detail<?= $ssd->strength_student_detail_id?>">More detail<p>
					</div>
				</div>
				<?php }?>
				<?php if($ssd->strength_student_detail_review != null){
					foreach($ssd->strength_student_detail_review as $ssdr){?>
				<div class="row mt-5 div_content_ss">
					<div class="col-md-2" style="padding:0;">
						<?php if(! empty($ssdr->strength_student_detail_review_file)){ ?>
						<img src="<?= base_url() ?><?= $ssdr->strength_student_detail_review_file[0]->file_path ?>" class="img-fluid" alt="Responsive image">
						<?php } ?>
					</div>
					<div class="col-md-7">
						<p><?= $ssdr->strength_capture_detail_name ?><p>
					</div>
					<div class="col-md-3 text-right">
						<p class="more_detail" data-toggle="modal" data-target="#modal_more_detail_review<?= $ssdr->strength_student_detail_review_id ?>">More detail<p>
					</div>
				</div>
				<?php }
				}?>
			</div>
			<div class="row mt-3">
				<div class="col-md-11 col-11 mt-2" style="border-bottom: 2px solid #EAEDED">
				</div>
			</div>
			<?php } ?>
		</div>
		<div id="div_bsteams" style="padding-left:25px;">
		bsteams
		</div>
		<div id="div_summary" style="padding-left:25px;">
			<div id="container"></div>
		</div>
	</div>
</div>
<!-- Modal Modal Capture Acitivites-->
<div class="modal fade" id="modal_capture_activities" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text30 text_bold mb-0"><?= $strength_student->activity_title ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open_multipart('strength/save_strength_student_detail', 'id="form_add_strength_student_detail"') ?>
				<input type="hidden" id="strength_student_detail_id" name="strength_student_detail_id" value="">
				<input type="hidden" id="strength_student_id" name="strength_student_id" value="">
				<div class="form-group mb-3up">
					<label class="label" for="instituion">Servicing item</label>
					<div class="input-group" id="servicing_item">
						
					</div>
					<div class="text-center error" id="div_error_servicing_item" style="margin-top: 10px;text-align:center;">
						<span id='error_servicing_item'></span>
					</div>
				</div>
				<div class="form-group mb-3up">
					<label class="label">Description of Servicing Item</label>
					<textarea 
					class="form-control input"
					id="servicing_item_description"
					name="servicing_item_description" 
					rows="3"
					placeholder="Insert description of servicing item"></textarea>
					<div class="text-center error" id="div_error_servicing_item_description" style="margin-top: 10px;text-align:center;">
						<span id='error_servicing_item_description'></span>
					</div>
				</div>
				<div class="form-group mb-3up">
					<label class="label">Link File</label>
					<textarea 
					class="form-control input"
					id="link_file"
					name="link_file" 
					rows="3"
					placeholder="Insert link file"></textarea>
					<div class="text-center error" id="div_error_link_file" style="margin-top: 10px;text-align:center;">
						<span id='error_link_file'></span>
					</div>
				</div>
				<div class="form-group mb-3up">
					<label class="label">Observation Result</label>
					<div class="input-group">
						<select class="browser-default custom-select input" style="color: black;"
							id="observation_result" name="observation_result">
							<option disabled selected>Choose observation result</option>
							<?php
							foreach ($observation_result as $res) {
							?>
								<option
									value="<?= $res->observation_result_id ?>">
									<?= $res->observation_result_name ?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="text-center error" id="div_error_observation_result" style="margin-top: 10px;text-align:center;">
						<span id='error_observation_result'></span>
					</div>
				</div>
				<div class="form-group mb-3up" style="padding-top:10px;">
					<label class="label">Reference</label><br>
					<input type="file" id="reference" name="reference[]" multiple/>
					<div class="text-center error" id="div_error_reference" style="margin-top: 10px;">
						<span id='error_reference'></span>
					</div>
				</div>
				<div class="row">
				<div class="col-md-12">
					<div id="gallery" class="gallery"></div>
				</div>
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
				<?= form_close() ?>						
			</div>
		</div>
	</div>
</div>
<!--/.Modal Capture Acitivites-->
<!-- Modal Detail-->
<?php foreach($strength_student_detail as $ssd){ ?>
<div class="modal fade" id="modal_more_detail<?= $ssd->strength_student_detail_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $strength_student->activity_title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-3 col-3">
				<p style="color:grey;">Servicing item</p>
			</div>
			<div class="col-md-9 col-9">
				<p><?= $ssd->strength_student_detail_name ?><p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-3">
				<p style="color:grey;">Observation result</p>
			</div>
			<div class="col-md-9 col-9">
				<p><?= $ssd->observation_result_name ?><p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-12">
				<p style="color:grey;">Description of activity</p>
				<p><?= $ssd->servicing_item_description ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-12">
				<p style="color:grey;">Link File</p>
				<a href="<?= $ssd->link_file ?>"><?= $ssd->link_file ?></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-12">
				<p style="color:grey;">Reference</p>
			</div>
			<?php foreach($ssd->strength_student_detail_file as $ssdf){?>
			<div class="col-md-4 col-4">
				<img src="<?= $this->config->item('student_url') ?><?= $ssdf->file_path ?>" class="img-fluid" alt="Responsive image">
			</div>
			<?php }?>
		</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!--/.Modal Detail-->
<!-- Modal Detail Review-->
<?php foreach($strength_student_detail as $ssd){ 
foreach($ssd->strength_student_detail_review as $ssdr){ ?>
<div class="modal fade" id="modal_more_detail_review<?= $ssdr->strength_student_detail_review_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?= $strength_student->activity_title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-md-3 col-3">
				<p style="color:grey;">Servicing item</p>
			</div>
			<div class="col-md-9 col-9">
				<p><?= $ssdr->strength_capture_detail_name ?><p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-3">
				<p style="color:grey;">Observation result</p>
			</div>
			<div class="col-md-9 col-9">
				<p><?= $ssdr->observation_result_name ?><p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-12">
				<p style="color:grey;">Description of activity</p>
				<p><?= $ssdr->servicing_item_description ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-12">
				<p style="color:grey;">Link File</p>
				<a href="<?= $ssdr->link_file ?>"><?= $ssdr->link_file ?></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-12">
				<p style="color:grey;">Reference</p>
			</div>
			<?php foreach($ssdr->strength_student_detail_review_file as $ssdrf){?>
			<div class="col-md-4 col-4">
				<img src="<?= base_url() ?><?= $ssdrf->file_path ?>" class="img-fluid" alt="Responsive image">
			</div>
			<?php }?>
		</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php }
} ?>
<!--/.Modal Detail Review-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	var student_strength_detail = <?= json_encode($strength_student_detail) ?>;
	var strength_capture_detail = <?= json_encode($strength_capture_detail) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/strength/detail_strength.js"></script>
</main>
<!--Main layout -->
