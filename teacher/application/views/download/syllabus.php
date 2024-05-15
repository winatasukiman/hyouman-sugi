<!--Main layout-->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/download_pdf/download_pdf.css?v=002">
<style>
    @media print{@page {size: landscape}}
</style>
<table class="whole-table">
<thead><th><td></td></th></thead>
<tbody>
	<tr>
		<td>
			<div class="row" style="margin-right:0px;">
				<div class="col-md-1 col-1 d-flex align-items-center">
					<img src="<?= base_url(); ?>assets/img/document-converter/merlion-school-no-logo.png" class="img_kop img-fluid" alt="Responsive image">
				</div>
				<div class="col-md-10 col-10 d-flex align-items-center" style="background-color:#D4B275;">
					<p class="label title_document">SYLLABUS</p>
				</div>
				<div class="col-md-1 col-1 d-flex" style="background-color:#D4B275;padding-right:10px;">
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
								<p style="margin-top:3px;"><?=$detail[0]->teacher_name?></p>
							</div>
						</div>
					</div>
				
				</div>
				<?php }?>
				
				<?php foreach($detail as $c) { ?>
				<p style="font-size:20px;margin:0;"><b><?= $c->term_name ?></b></p>
				<?php $i = 1;
					foreach($c->class_mission as $cm){ ?>
					<div class="border_class_mission" style="background-color:#FFFFFF;">
						<div class="row div_begin div_cm_1">
							<div class="col-md-1 col-1 d-flex justify-content-center align-items-center" style="background-color: rgb(240, 235, 225);border-top-left-radius:5px;border-right: 4px solid #fff;border-bottom:1px solid #fff;">
								<p class="label" style="margin:0;"><?= $i ?></p>
							</div>
							<div class="col-md-5 col-5">
								<p class="label bg_ivory" style="margin:0px -15px 0px -15px !important;border-right: 4px solid #fff;">Topic</p>
								<p style="padding-top: 0.5%;margin: 0;"><?=$cm->mission_title?></p>
							</div>
							<div class="col-md-6 col-6">
								<p class="label bg_ivory" style="margin:0px -15.5px 0px -15px !important;border-top-right-radius:5px;">Time Allocation</p>
								<p style="padding-top: 0.5%;margin: 0;"><?=$cm->time_allocation_a?>Period</p>
							</div>
						</div>
						<div class="row div_begin div_cm_2">
							<?php if($detail[0]->curicullum_id == 2){ ?>
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="">Phase</p>
								<div class="boc" style="margin-top:1%;margin-bottom:1%;"><?= $cm->phase->name?></div>
							</div>
							<?php }?>
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="">
									<?php if($detail[0]->curicullum_id == 1){ ?>
										Competencies 
									<?php }else if($detail[0]->curicullum_id == 2){ ?>
										Learning Achievement
									<?php }?>
								</p>
								<div class="boc" style="margin-top:1%;margin-bottom:1%;"><?=$cm->bank_of_competencies?></div>
								<!-- competencies cambridge -->
								<?php $subject_id = "";
										foreach ($cm->class_mission_competencies_cambridge as $res) {
											if($res->subject_id != $subject_id){ ?>
											<b><?= $res->subject_name ?></b>
												<ul class="detail_meeting m-0">
												<?php $level_1 = "";
												foreach ($cm->class_mission_competencies_cambridge as $res2) { // echo lv1
													if($res2->subject_id == $res->subject_id){
														if($res2->level_1 != $level_1){ ?>
															<li><?= $res2->level_1 ?></li>
															<ul class="detail_meeting m-0">
															<?php $level_2 = "";
															foreach ($cm->class_mission_competencies_cambridge as $res3) { // echo lv 2
																if($res3->level_1 == $res2->level_1 && $res3->subject_id == $res2->subject_id){
																if($res3->level_2 != $level_2){?>
																	<li><?= $res3->level_2 ?></li>
																	<ul class="detail_meeting m-0">
																	<?php foreach($cm->class_mission_competencies_cambridge as $res4){
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
										foreach ($cm->class_mission_competencies_k13 as $res) {
											if($res->subject_id != $subject_id){ ?>
											<b><?= $res->subject_name ?></b>
												<ul class="detail_meeting m-0">
												<?php $core_competencies = "";
												foreach ($cm->class_mission_competencies_k13 as $res2) { // echo lv1
													if($res2->subject_id == $res->subject_id){
														if($res2->core_competencies != $core_competencies){ ?>
															<li><?= $res2->core_competencies ?></li>
															<ul class="detail_meeting m-0">
															<?php $capaian_pembelajaran = "";
															foreach ($cm->class_mission_competencies_k13 as $res3) { // echo lv 2
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
										foreach ($cm->class_mission_competencies_merdeka as $res) {
											if($res->subject_id != $subject_id){ ?>
											<b><?= $res->subject_name ?></b>
												<ul class="detail_meeting m-0">
												<?php $elemen = "";
												foreach ($cm->class_mission_competencies_merdeka as $res2) { // echo lv1
													if($res2->subject_id == $res->subject_id){
														if($res2->elemen != $elemen){ ?>
															<li><?= $res2->elemen ?></li>
															<ul class="detail_meeting m-0">
															<?php $capaian_pembelajaran = "";
															foreach ($cm->class_mission_competencies_merdeka as $res3) { // echo lv 2
																if($res3->elemen == $res2->elemen && $res3->subject_id == $res2->subject_id){
																if($res3->capaian_pembelajaran != $capaian_pembelajaran){?>
																	<li><?= $res3->capaian_pembelajaran ?></li>
																	<?php if($res3->tujuan_pembelajaran != " "){ ?>
																	<ul class="detail_meeting m-0">
																	<?php foreach($cm->class_mission_competencies_merdeka as $res4){
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
							<?php }?>
							</div>
						</div>
						<?php if($detail[0]->curicullum_id == 1){ ?>
						<!-- Assessment & Resource -->
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr class="bg_ivory">
										<th scope="col">Assessment</th>
										<th scope="col">Resources</th>
									</tr>
								</thead>
								<tbody>
									<tr class="align-top">
										<td>
											<ul class="ul_sdg content_res">
												<p class="content_assessment">
													<?=nl2br($cm->task_description)?><br>
													<?php foreach($cm->class_mission_link as $res){  ?>
														<?=$res->name?><br>
													<?php } ?>
												</p>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php } ?>
						<?php if($detail[0]->curicullum_id == 2){ ?>
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr class="bg_ivory">
											<th scope="col">Profil Pelajar Pancasila ( Student Character Development According to the Pancasila )</th>
										</tr>
									</thead>
									<tbody>
										<tr class="align-top">
											<td>
												<p><?= htmlspecialchars($cm->profil_pembelajaran_pancasila) ?></p>
												<ul class="m-0">
												<?php foreach($cm->profil_pembelajaran_pancasila_arr as $res){ ?>
													<li><?= $res->name ?> (<?= $res->english_name ?>)</li>
												<?php } ?>
												</ul>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						<?php } ?>
						<!-- Lesson activity / learning objectives & materi esensial / tujuan pembelajaran -->
						<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr class="bg_ivory">
										<th scope="col">Lesson Activities</th>
										<th scope="col">Learning Objectives</th>
									</tr>
								</thead>
								<tbody>
									<tr class="align-top">
										<td>
											<?php foreach($cm->class_mission_lesson_activities as $res){ ?>
													<p class="ul_boc"><?php echo nl2br($res->description); ?></p>
											<?php } ?>
										</td>
										<td>
											<?php if (! empty($cm->class_mission_learning_objectives)) { ?>
												<br>
												<ul class="ul_sdg">
													<?php foreach ($cm->class_mission_learning_objectives as $cmlo) {
														if($cmlo->name != ""){
													?>
														<li><?=$cmlo->name?></li>
													<?php }
													}
													?>
												</ul>
											<?php } ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<?php $i++;} ?>
				<?php } ?>
				
				<!-- <div class="page-footer">
					<p>Copyright&copy; 2022 The Hyouman. All Rights Reserved</p>
				</div> -->
			</div>
		</td>
	</tr>
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

<tfoot><tr><td><div class="empty-footer"></div></tr></td></tfoot>
</table>
<div class="header"></div>
<!-- <div class="footer">Copyright&copy; 2022 The Hyouman. All Rights Reserved</div> -->
<script src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script>