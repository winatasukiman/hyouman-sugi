<!--Main layout-->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/download_pdf/download_pdf.css?v=001">
<style>
.signature-row {
    page-break-inside: auto !important;
}
</style>
<table class="whole-table">
<thead><th><td></td></th></thead>
<tbody>
	<div class="row">
		<div class="col-md-1 col-1 d-flex align-items-center">
			<img src="<?= base_url(); ?>assets/img/document-converter/merlion-school-no-logo.png" class="img_kop img-fluid" alt="Responsive image">
		</div>
		<div class="col-md-10 col-10 d-flex align-items-center" style="background-color:#ED9772;margin-right:-15px">
			<p class="label title_document">SEMESTRAL PLAN</p>
		</div>
		<div class="col-md-1 col-1 d-flex" style="background-color:#ED9772;padding-right:10px;">
			<!-- <img src="<?= base_url(); ?>assets/img/document-converter/the-hyouman-word-logo.png" class="img_kop img-fluid" alt="Responsive image" style="padding-top:45%;padding-bottom:15%;"> -->
		</div>
	</div>
	<div class="content">
		<?php if(!empty($detail)){ ?>
		<div class="row div_begin div_detail">
			<div class="col-md-5 col-5 d-flex align-items-start" style="padding-left: 0px;">
				<p class="label title_document"></p>
			</div>
			<div class="col-md-7 col-7">
				<div class="row mt-2">
					<div class="col-md-3 col-3" style="margin-top:0.2%;">
						<p class="label">School name</p>
						<p class="label">Class</p>
						<p class="label">Semester</p>
					</div>
					<div class="col-md-3 col-3" style="margin-top:0.2%;padding-left: 0px;">
						<p style="margin:0;"><?= $detail[0]->school_name ?></p>
						<p style="margin:0;padding-top:5px;"><?=$detail[0]->grade_name?></p>
						<p style="margin:0;padding-top:5px;"><?=$detail[0]->semester_id?></p>
					</div>
					<div class="col-md-3 col-3" style="margin-top:0.2%;">
						<p class="label">Subject</p>
						<p class="label">Academic year</p>
						<p class="label">Teacher's Name</p>
					</div>
					<div class="col-md-3 col-3" style="margin-top:0.2%;padding-left: 0px;">
						<p style="margin:0;"><?=$detail[0]->subject_name?></p>
						<p style="margin:0;margin-top:6px;"><?=$detail[0]->academy_year_name?></p>
						<p style="margin-top:6px;"><?=$detail[0]->teacher_name?></p>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
		
		<?php foreach($detail as $class){ 
			$mission_month = "";
			foreach($class->class_mission as $cm){ 
				if($mission_month != $cm->mission_month){ ?>
				<p class="label month" style="margin-top:30px;"><?=strtoupper($cm->mission_month)?></p>
				<?php foreach($detail as $c2){ 
					foreach($c2->class_mission as $cm2){
						if($cm2->mission_month == $cm->mission_month && $cm2->mission_title == $cm->mission_title){ ?>
						<div class="row" style="margin-top:30px;">
							<div class="col-md-12 col-12">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr class="bg_ivory">
												<th scope="col">Topic</th>
												<th scope="col">Time Allocation</th>
											</tr>
										</thead>
										<tbody>
											<tr class="align-top">
												<td>
												<p><?=$cm2->mission_title?></p>
												</td>
												<td>
												<p><?=$cm2->time_allocation_a?> x <?=$cm2->time_allocation_b?> minutes</p>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- competencies / capaian pembelajaran -->
						<div class="row">
							<div class="col-md-12 col-12">
								<div class="table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr class="bg_ivory">
												<th scope="col">
													<?php if($detail[0]->curicullum_id == 1){ ?>
														Competencies
													<?php }else if($detail[0]->curicullum_id == 2){ ?>
														Learning Achievement
													<?php } ?>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr class="align-top">
												<td>
													<div class="boc" style="padding:0;"><?=$cm2->bank_of_competencies?></div>
													<!-- competencies cambridge -->
													<?php $subject_id = "";
															foreach ($cm2->class_mission_competencies_cambridge as $res) {echo json_encode($res);
																if($res->subject_id != $subject_id){ ?>
																<li><?= $res->subject_name ?></li>
																	<ul class="detail_meeting m-0">
																	<?php $level_1 = "";
																	foreach ($cm2->class_mission_competencies_cambridge as $res2) { // echo lv1
																		if($res2->subject_id == $res->subject_id){
																			if($res2->level_1 != $level_1){ ?>
																				<li><?= $res2->level_1 ?></li>
																				<ul class="detail_meeting m-0">
																				<?php $level_2 = "";
																				foreach ($cm2->class_mission_competencies_cambridge as $res3) { // echo lv 2
																					if($res3->level_1 == $res2->level_1 && $res3->subject_id == $res2->subject_id){
																					if($res3->level_2 != $level_2){?>
																						<li><?= $res3->level_2 ?></li>
																						<ul class="detail_meeting m-0">
																						<?php foreach($cm2->class_mission_competencies_cambridge as $res4){
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
															} ?>
													<?php if($detail[0]->curicullum_id == 1){ ?>
													<!-- competencies k13 -->
													<?php $subject_id = "";
															foreach ($cm2->class_mission_competencies_k13 as $res) {
																if($res->subject_id != $subject_id){ ?>
																<li><?= $res->subject_name ?></li>
																	<ul class="detail_meeting m-0">
																	<?php $core_competencies = "";
																	foreach ($cm2->class_mission_competencies_k13 as $res2) { // echo lv1
																		if($res2->subject_id == $res->subject_id){
																			if($res2->core_competencies != $core_competencies){ ?>
																				<li><?= $res2->core_competencies ?></li>
																				<ul class="detail_meeting m-0">
																				<?php $capaian_pembelajaran = "";
																				foreach ($cm2->class_mission_competencies_k13 as $res3) { // echo lv 2
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
													<?php }else if($detail[0]->curicullum_id == 2){ ?>
													<!-- competencies merdeka -->
													<?php $subject_id = "";
															foreach ($cm2->class_mission_competencies_merdeka as $res) {
																if($res->subject_id != $subject_id){ ?>
																<li><?= $res->subject_name ?></li>
																	<ul class="detail_meeting m-0">
																	<?php $elemen = "";
																	foreach ($cm2->class_mission_competencies_merdeka as $res2) { // echo lv1
																		if($res2->subject_id == $res->subject_id){
																			if($res2->elemen != $elemen){ ?>
																				<li><?= $res2->elemen ?></li>
																				<ul class="detail_meeting m-0">
																				<?php $capaian_pembelajaran = "";
																				foreach ($cm2->class_mission_competencies_merdeka as $res3) { // echo lv 2
																					if($res3->elemen == $res2->elemen && $res3->subject_id == $res2->subject_id){
																					if($res3->capaian_pembelajaran != $capaian_pembelajaran){?>
																						<li><?= $res3->capaian_pembelajaran ?></li>
																						<?php if($res3->tujuan_pembelajaran != " "){ ?>
																						<ul class="detail_meeting m-0">
																						<?php foreach($cm2->class_mission_competencies_merdeka as $res4){
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
													<?php } ?>
													
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
				<?php }
					}
				} ?>
		<?php }$mission_month = $cm->mission_month;
			}
		} ?>
	</div>
	<tr class="signature-row">
		<td>
			<div class="row border_class_mission signature-space col-md-12 col-12">
				<div class="col-md-6 col-6">
					<p class="label">(Teacher's Signature)</p>
				</div>
				<div class="col-md-6 col-6" style="text-align:right;">
					<p class="label">(Kepala Sekolah's Signature)</p>
				</div>
			</div>
		</td>
	</tr>
</tbody>
</table>
<div class="header"></div>
<!-- <div class="footer">Copyright&copy; 2022 The Hyouman. All Rights Reserved</div> -->
<script type="text/javascript">
</script>
<script src="<?= base_url(); ?>assets/js/download_pdf/download_pdf.js"></script>
<script src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script>
<!--Main layout -->