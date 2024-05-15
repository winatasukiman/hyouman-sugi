<!--Main layout-->
<main>
<style>
	.judul, .label{
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
	}
	.main{
		margin-top: -40px;
	}
	.judul {
		font-size: 30px;
		font-weight: 700;
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
	.detail_info_kanan{
		font-size: 10pt;
		color: #A5A3A3;
	}
	.isian_kanan{
		margin-top: -2px;
	}
	.label {
		font-size: 15px;
		font-weight: 700;
	}
	.imgkiri{
		width: 50%;
		margin-right: 10%;
		float: right;
	}
	.imgkanan{
		width: 9%;
	}
	#div_kanan{
		padding:35px 10px 10px 80px;
	}
	#student_search{
		width: 85%;
		margin-bottom: 5%;
	}
	.participant{
		font-size: 12pt;
		font-family: 'Quicksand' , sans-serif;
		color: #28557B;
		margin-top: 3%;
	}
	.participant:hover{
		cursor:pointer;
	}
	.active{
		font-weight: 700;
	}
	#div_cmp{
		display:none;
	}
	.star{
		color:orange;
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
	input[type="text"] { 
	    outline: none;
	}
	.vertical-center {
	  margin-top:2vw;
	}
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 34px;
	}

	.switch input { 
	  opacity: 0;
	  width: 0;
	  height: 0;
	}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 26px;
	  width: 26px;
	  left: 4px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #2196F3;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
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
	.view_less, .div_boc{
		display:none;
	}
	.view_less {
		color: #28557B;
	}
	.view_less:hover{
		color: #28557B;
		font-weight: 700;
		cursor:pointer
	}
	.view_details:hover{
		color: #28557B;
		font-weight: 700;
		cursor:pointer
	}
	@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
	@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
	@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
	/* medium screen - for TABLET 991px or less */
	@media screen and (max-width: 991px) {
		#div_kanan{
			padding:35px 40px 10px 65px;
		}
	}
	/* medium screen - for TABLET 767px or less */
	@media screen and (max-width: 767px) {
		#div_kanan{
			padding:35px 40px 10px 65px;
		}
	}
	/* small screen - for MOBILE 414px or less  */
	@media screen and (max-width: 414px) {
		#div_kanan{
			padding:35px 40px 10px 60px;
		}
	}
</style>
<div class="main">
	<div id="loading-overlay">
		<div class="loading-icon"></div>
	</div>
	<div class="row" style="margin-top:-2px;">
		<!-- Left Side -->
		<div class="col-md-3" style="background-color:#e8e8e8;padding:35px 10px 10px 50px;">
			<p class="text_bold"><a href="<?=base_url()?>classes/details/<?=$detail->class_id?>/1"><img src="<?= base_url() ?>assets/img/icon/previous.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;&nbsp;&nbsp;<?= $detail->class_name ?></a></p><br>
			<p><input type="text" placeholder="Search" id="student_search" style="border:none;border-bottom: 1px solid grey;background-color:#e8e8e8;color:#28557B;">&nbsp;<i class="fa fa-search"></i></p>
			<?php
				$i = 1;
				if(!empty($class_mission_participants)){
				foreach ($class_mission_participants as $cmp) {
					if($cmp->status_task == 0){
			?>
			<div class="row">
				<div class="col-md-12 col-12">
					<p class="participant" id="participant<?=$cmp->class_mission_participants_id?>" onclick="participant(<?=$cmp->class_mission_participants_id?>)"><?=$cmp->full_name?><img src="<?= base_url() ?>assets/img/icon/alert.png" class="imgkiri" style="max-width:25px;max-height:25x;" alt="Responsive image"></p>
				</div>
			</div>
			<?php 	$i++; } else if($cmp->status_task == 2){?>
			<div class="row">
				<div class="col-md-12 col-12">
					<p class="participant" id="participant<?=$cmp->class_mission_participants_id?>" onclick="participant(<?=$cmp->class_mission_participants_id?>)"><?=$cmp->full_name?><img src="<?= base_url() ?>assets/img/icon/assessed.png" class="imgkiri" style="max-width:25px;max-height:25x;" alt="Responsive image"></p>
				</div>
			</div>
			<?php	$i++;}else if($cmp->status_task == 3){?>
			<div class="row">
				<div class="col-md-12 col-12">
					<p class="participant" id="participant<?=$cmp->class_mission_participants_id?>" onclick="participant(<?=$cmp->class_mission_participants_id?>)"><?=$cmp->full_name?><img src="<?= base_url() ?>assets/img/icon/check.png" class="imgkiri" style="max-width:25px;max-height:25x;" alt="Responsive image"></p>
				</div>
			</div>
			<?php	$i++;}
				}
				} ?>
		</div>

		<!-- Right Side -->
		<!--Task-->
		<div class="col-md-9" id="div_kanan">
			<div class="row">
				<div class="row">
					<div class="col-md-12 col-12">
						<p class="judul_kanan"><?= $detail->class_name?></p>
						<p class="subtitle"><?= $detail->grade_name?>, <?= $detail->term_name?> - <?= $detail->subject_name?></p>
					</div>
				</div>
			</div>
			<div class="row mt-3" id="div_cmp">
			<?php
				$i=1;
				if (! empty($class_mission_participants)) {
					foreach ($class_mission_participants as $cmp) {
			?>
			<div id="cmp<?=$cmp->class_mission_participants_id?>">
				<div class="row">
					<div class="col-md-11">
						<p class="judul_kanan"><?=$mission_index?></p>
						<p class="detail_info_kanan">Task Description</p>
						<p style="margin-bottom: 3%;padding-right: 15px;"><?=$class_mission->task_description?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<p class="detail_info_kanan">Due Date</p>
					</div>
					<div class="isian_kanan col-md-3">
						<p><?=$class_mission->deadline_date?>, <?=$class_mission->deadline_time?></p>
					</div>
					<div class="col-md-2">
						<p class="detail_info_kanan">Date Submitted</p>
					</div>
					<div class="isian_kanan col-md-3">
						<?php if($cmp->status_task2 != 0){?>
						<p><?=$cmp->status_date2?>,<?=$cmp->status_time2?></p>
						<?php } else {?>
						<p>-</p>
						<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<p class="detail_info_kanan">Status</p>
					</div>
					<div class="isian_kanan col-md-3">
						<?php
						if($cmp->status_task == 0) {
						?>
							<p>Not Upload Yet&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/alert.png" class="imgkanan" alt="Responsive image"></p>
						<?php
							}else if($cmp->status_task == 2) {
						?>
							<p>Not Checked Yet&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/alert.png" class="imgkanan" alt="Responsive image"></p>
						<?php
							}else if($cmp->status_task == 3) {
						?>
							<p>Assessed&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/assessed.png" class="imgkanan" alt="Responsive image"></p>
						<?php
							}
						?>
					</div>
					<div class="col-md-2">
						<p class="detail_info_kanan">Date Assessed</p>
					</div>
					<div class="isian_kanan col-md-3">
						<?php if($cmp->status_task3 != 0){?>
						<p><?=$cmp->status_date3?>,<?=$cmp->status_time3?></p>
						<?php } else {?>
						<p>-</p>
						<?php }?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11 col-11">
						<p class="text_bold" style="margin-top: 2%;">Task</p>
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="task"
							name="task" 
							rows="4"
							placeholder="Enter Your Task Here"
							readonly="true"><?=$cmp->task?></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-6">
						<ul class="list-group" id="task_file_list_<?=$cmp->class_mission_participants_id?>">
						<?php foreach($cmp->file_details as $file) { ?>
							<li class="list-group-item" id="file_task_<?= $file->class_mission_participants_detail_id?>"><a class="link-secondary" href="<?= $this->config->item('student_url') ?><?= $file->task_content?>" download><?= $file->file_name?></a></li>
						<?php } ?>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7" style="margin-top: 2%;margin-bottom: 1%;">
						<p>Student's Excitement &nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size: 15pt; font-weight: 700;"><?=$cmp->rating?></span>&nbsp;&nbsp;<span class="star fa fa-star"></span></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11 col-11">
						<?php if($cmp->task_review == ""){ ?>
						<p class="text_bold" style="margin-top: 2%;">Teacher Review</p>
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="task_review<?=$cmp->class_mission_participants_id?>"
							name="task_review<?=$cmp->class_mission_participants_id?>" 
							rows="4"
							placeholder="Input Teacher Review"><?=$cmp->task_review?></textarea>
						<?php } else {?>
							<textarea 
							class="form-control input" 
							style="color: black;" 
							id="task_review<?=$cmp->class_mission_participants_id?>"
							name="task_review<?=$cmp->class_mission_participants_id?>" 
							rows="4"
							placeholder="Input Teacher Review"
							readonly="true"><?=$cmp->task_review?></textarea>
						<?php } ?>
						
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-12" style="margin-top: 2%; margin-bottom: 6%;">
						<?php if($cmp->task_review == ""){ ?>
							<button
							type="button"
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width:200px;height:50px;margin-left:0px;"
							onclick="submit_task_review(<?=$cmp->class_mission_participants_id?>)">Submit Review</button>
						<?php } ?>
					</div>
				</div>
				<!-- <div class="row mt-3">
					<div class="col-md-6 col-6">
						<p class="detail_info_kanan2 mt-3">Bank of Competencies</p>
					</div>
					<div class="col-md-6 col-6 mt-3">
						<p class="view_details" id="view_details_boc<?=$cmp->class_mission_participants_id?>" onclick="view_detail_boc(<?=$cmp->class_mission_participants_id?>)">View Details&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p><p class="view_less" id="view_less_boc<?=$cmp->class_mission_participants_id?>" onclick="view_less_boc(<?=$cmp->class_mission_participants_id?>)">View Less&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
					</div>
				</div>
				<div class="row div_boc" id="div_boc<?=$cmp->class_mission_participants_id?>">
					<div class="card col-md-11 col-11" style="padding-top:20px;">
						<?php
						foreach ($bank_of_competencies as $boc) { ?>
						<p><?= $boc->name ?></p>
						<?php foreach ($boc->bank_of_competencies_detail as $bocd) { ?>
						<p>
							<input 
							class="form-check-input"
							style="margin-left:1%;"                                    
							type="checkbox"
							id="checkbox_cmpboc<?=$cmp->class_mission_participants_id?><?= $bocd->bank_of_competencies_detail_id ?>"
							onclick="check_cmpboc(<?=$cmp->class_mission_participants_id?>,<?= $bocd->bank_of_competencies_detail_id ?>)"
							<?php if(!empty($cmp->class_mission_participants_bank_of_competencies)){ foreach($cmp->class_mission_participants_bank_of_competencies as $cmpboc) if($cmpboc->bank_of_competencies_detail_id == $bocd->bank_of_competencies_detail_id && $cmpboc->is_true == 1){ echo "checked";}}?>
							>&nbsp;
							<label class="form-check-label labelsk" for="invalidCheck" style="margin-left:3%;">
							<?= $bocd->no?> - <?= $bocd->indicator?>                               
							</label>
						</p>
						<?php }
						} ?>
					</div>
				</div> -->
			</div>
			<?php
					}
				}
			?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	var student_url = "<?= $this->config->item('student_url') ?>";
	var class_mission_participants = <?= json_encode($class_mission_participants) ?>;
	var class_mission_participants_first_row = <?= json_encode($class_mission_participants_first_row) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/task.js"></script>
</main>
<!--Main layout -->