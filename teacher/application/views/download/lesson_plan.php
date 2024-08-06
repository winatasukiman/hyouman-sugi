<!--Main layout-->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/download_pdf/download_pdf.css?v=003">
<!-- <div id="action-area">
	<div id="navbar-wrapper" style="padding: 12px 16px;font-size: 0;line-height: 1.4; box-shadow: 0 -1px 7px 0 rgba(0, 0, 0, 0.15); position: fixed; top: 0; left: 0; width: 100%; background-color: #FFF; z-index: 100;">
		<div style="width: 50%; display: inline-block; vertical-align: middle; font-size: 12px;">
			<div class="btn-back" onclick="window.close();">
				<span style="display: inline-block; vertical-align: middle; margin-left: 16px; font-size: 16px; font-weight: bold; color: rgba(49, 53, 59, 0.96);">Download</span>
			</div>
		</div>
		<div style="width: 50%; display: inline-block; vertical-align: middle; font-size: 12px; text-align: right;">
			<a class="btn-download" href="javascript:window.print()" style="display: inline-block; vertical-align: middle;">
				<img src="<?= base_url(); ?>assets/img/icon/download.png" alt="Download" width="30px">
			</a>
		</div>
	</div>
</div> -->
<table class="whole-table">
<thead><th><td></td></th></thead>
<tbody>
	<tr>
		<td>
			<!-- <div class="row" style="margin-right:0px;">
				<div class="col-md-1 col-1 d-flex align-items-center">
					<img src="<?= base_url(); ?>assets/img/document-converter/merlion-school-no-logo.png" class="img_kop img-fluid" alt="Responsive image">
				</div>
				<div class="col-md-10 col-10 d-flex align-items-center" style="background-color:#FDC6AE;">
					<p class="label title_document">
						<?php if($detail->curicullum_id == 1){ ?>
							Lesson Plan
						<?php }else if($detail->curicullum_id == 2){ ?>
							Modul Ajar
						<?php }?>
					</p>
				</div>
				<div class="col-md-1 col-1 d-flex" style="background-color:#FDC6AE;padding-right:10px;">
					<img src="<?= base_url(); ?>assets/img/document-converter/the-hyouman-word-logo.png" class="img_kop img-fluid" alt="Responsive image" style="padding-top:45%;padding-bottom:15%;">
				</div>
			</div> -->
			<div style="background-color:#FDC6AE;">
				<p class="label title_document" style="padding-left:10px;">
					<?php if($detail->curicullum_id == 1){ ?>
						Lesson Plan
					<?php }else if($detail->curicullum_id == 2){ ?>
						Modul Ajar
					<?php }?>
				</p>
			</div>
			
			<div class="content">
				<div class="row div_begin div_detail">
					<?php if($detail->subject_parent_id != 4){ ?>
						<div class="col-md-4 col-4 d-flex align-items-start" style="padding-left: 0px;">
							<p class="label title_document"></p>
						</div>
						<div class="col-md-8 col-8">
					<?php }else{?>
						<div class="col-md-2 col-2 d-flex align-items-start" style="padding-left: 0px;">
							<p class="label title_document"></p>
						</div>
						<div class="col-md-12 col-12" style="padding-left: 0px;">
					<?php }?>
					
						<div class="row mt-2">
							<div class="col-md-3 col-3" style="margin-top:0.2%;">
								<p class="label">School name</p>
								<?php if($detail->subject_parent_id == 4){ ?>
								<p class="label">Term / Session</p>
								<?php }else{ ?>
								<p class="label">Term / Week</p>
								<?php } ?>
								<p class="label">Day / Date</p>
								<p class="label">Time Allocation</p>
							</div>
							<div class="col-md-3 col-3" style="margin-top:0.2%;padding-left: 0px;">
								<p style="margin:0;"><?= $detail->school_name ?></p>
								<p style="margin:0;padding-top:4px;visibility:hidden"><?=$detail->term_name?> / <?=$cm->week?></p>
								<p style="margin:0;padding-top:3px;visibility:hidden"><?=$cm->day?> / <?=$cm->publish_date?>, <?=$cm->publish_time?></p>
								<p style="margin:0;padding-top:3px;"><?=$cm->time_allocation_a?>x<?=$cm->time_allocation_b?> Minutes</p>
							</div>
							<?php if($detail->subject_parent_id != 4){ ?>
								<div class="col-md-3 col-3" style="margin-top:0.2%;">
							<?php }else{?>
								<div class="col-md-2 col-2" style="margin-top:0.2%;">
							<?php }?>
								<p class="label">Subject</p>
								<p class="label">Academic year</p>
								<p class="label">Teacher's Name</p>
							</div>
							<?php if($detail->subject_parent_id != 4){ ?>
								<div class="col-md-3 col-3" style="margin-top:0.2%;">
							<?php }else{?>
								<div class="col-md-4 col-4" style="margin-top:0.2%;padding-left: 0px;">
							<?php }?>
								<?php if($detail->subject_parent_id == 4){ ?>
									<p style="margin:0;"><?=$detail->subject_parent_name?> : <?=$detail->subject_name?> <?=$detail->grade_name?></p>
								<?php }else{ ?>
									<p style="margin:0;"><?=$detail->subject_name?> <?=$detail->grade_name?></p>
								<?php } ?>
								<p style="margin:0;margin-top:4px;"><?=$detail->academy_year_name?></p>
								<p style="margin:0;margin-top:3px;">
									<?=$detail->teacher_name?>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="border_class_mission">
					<div class="row" style="margin:0;">
						<div class="col-md-12 col-12">
						<?php if($detail->subject_parent_id != 4){ ?>
							<p class="label bg_ivory" style="margin:0;">Topic</p>
						<?php }else{ ?>
							<p class="label bg_ivory" style="margin:0;">Module</p>
						<?php } ?>
						</div>
						<div class="col-md-12 col-12">
							<p><?=$cm->mission_title?></p>
						</div>
					</div>
					<!-- lesson activity / materi esensial / kegiatan pembelajaran -->
					<div class="row" style="margin:0;padding-top:2%;">
						<div class="col-md-12 col-12">
							<p class="label bg_ivory" style="margin:0;">Lesson activities</p>
						</div>
						<?php
						foreach($class_mission_lesson_activities as $cmla){
							foreach($cmla as $res){
								if($res->class_mission_id == $cm->class_mission_id){
									if($res->title != ""){
						?>
							<div class="col-md-12 col-12">
								<!-- <div class="card" style="padding: 5px;border:1px solid #dee2e6;"> -->
								<div>
									<p>Opening :</p>
									<p class="ul_boc"><?php echo nl2br($res->title); ?></p>
									<p>Main :</p>
									<p class="ul_boc"><?php echo nl2br($res->description); ?></p>
									<p>Closing :</p>
									<p class="ul_boc"><?php echo nl2br($res->description_2); ?></p>
								</div>
							</div>
						<?php }
								}
							}
						}
						?>
					</div>					
					<?php if($detail->curicullum_id == 1){ // K13?>
					<!-- learning objectives / tujuan pembelajaran -->
					<div class="row" style="margin:0;padding-top:2%;">
						<div class="col-md-12 col-12">
							<p class="label bg_ivory" style="margin:0;">
								Learning objectives
							</p>
						</div>
						<div class="col-md-12 col-12">
							<?php if (! empty($cm->class_mission_learning_objectives)) { ?>
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
						</div>
					</div>
					<!-- competencies  -->
					<div class="row" style="margin:0;page-break-inside: avoid;">
						<div class="col-md-12 col-12">
							<p class="label bg_ivory" style="margin:0;">
								Competencies
							</p>
						</div>
						<div class="col-md-12 col-12">
							<div class="boc" style="padding:0;"><?=$cm->bank_of_competencies?></div>
							<!-- competencies cambridge -->
							<?php $subject_id = "";
									foreach ($class_mission_competencies_cambridge as $res) {
										if($res->subject_id != $subject_id){ ?>
										<b><?= $res->subject_name ?></b>
											<ul class="detail_meeting m-0">
											<?php $level_1 = "";
											foreach ($class_mission_competencies_cambridge as $res2) { // echo lv1
												if($res2->subject_id == $res->subject_id){
													if($res2->level_1 != $level_1){ ?>
														<li><?= $res2->level_1 ?></li>
														<ul class="detail_meeting m-0">
														<?php $level_2 = "";
														foreach ($class_mission_competencies_cambridge as $res3) { // echo lv 2
															if($res3->level_1 == $res2->level_1 && $res3->subject_id == $res2->subject_id){
															if($res3->level_2 != $level_2){?>
																<li><?= $res3->level_2 ?></li>
																<ul class="detail_meeting m-0">
																<?php foreach($class_mission_competencies_cambridge as $res4){
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
							<!-- competencies k13 -->
							<?php $subject_id = "";
									foreach ($class_mission_competencies_k13 as $res) {
										if($res->subject_id != $subject_id){ ?>
										<b><?= $res->subject_name ?></b>
											<ul class="detail_meeting m-0">
											<?php $core_competencies = "";
											foreach ($class_mission_competencies_k13 as $res2) { // echo lv1
												if($res2->subject_id == $res->subject_id){
													if($res2->core_competencies != $core_competencies){ ?>
														<li><?= $res2->core_competencies ?></li>
														<ul class="detail_meeting m-0">
														<?php $capaian_pembelajaran = "";
														foreach ($class_mission_competencies_k13 as $res3) { // echo lv 2
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
						</div>
					</div>
					<!-- assessment -->
					<?php if(!empty($class_mission_link)){?>
					<div class="row" style="margin:0;padding-top:2%;">
						<div class="col-md-12 col-12">
							<p class="label bg_ivory" style="margin:0;">Assessment</p>
						</div>
						<div class="col-md-12 col-12">
						<?php
						foreach($class_mission_link as $cml){
							foreach($cml as $res){
								if($res->class_mission_id == $cm->class_mission_id){
						?>
						<div class="row">
							<div class="col-md-3 col-6">
								<p class=""><?=$res->name?></p>
							</div>
							<div class="col-md-9 col-6">
								<p class=""><?=$res->link?></p>
							</div>
						</div>
						<?php }
							}
						}
						?>
						</div>
					</div>
					<?php } ?>
					<!-- assessment desc / materi dan bahan ajar -->
					<div class="row"style="margin:0;padding-top:2%;">
						<div class="col-md-12 col-12">
							<p class="label bg_ivory" style="margin:0;">Assessment description</p>
						</div>
						<div class="col-md-12 col-12">
							<?=nl2br($cm->task_description)?>
						</div>
					</div>
					<!-- Class Activities -->
					<div class="row" style="margin:0;">
						<div class="col-md-12 col-12">
							<p class="label bg_ivory" style="margin:0;">Class Activities</p>
						</div>
						<div class="col-md-12 col-12">
							<ul class="detail_meeting m-0">
								<?php foreach ($class_mission_class_activity as $cmca) { ?>
									<li><?= $cmca->name ?></li>
								<?php } ?>
							</ul>
						</div>
					</div>
					<?php } else if($detail->curicullum_id == 2){ // Merdeka?>
						<!-- capaian pembelajaran -->
						<div class="row" style="margin:0;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">
									Learning Achievement
								</p>
							</div>
							<div class="col-md-12 col-12">
								<div class="boc" style="padding:0;"><?=$cm->bank_of_competencies?></div>
								<!-- competencies cambridge -->
								<?php $subject_id = "";
										foreach ($class_mission_competencies_cambridge as $res) {
											if($res->subject_id != $subject_id){ ?>
											<b><?= $res->subject_name ?></b>
												<ul class="detail_meeting m-0">
												<?php $level_1 = "";
												foreach ($class_mission_competencies_cambridge as $res2) { // echo lv1
													if($res2->subject_id == $res->subject_id){
														if($res2->level_1 != $level_1){ ?>
															<li><?= $res2->level_1 ?></li>
															<ul class="detail_meeting m-0">
															<?php $level_2 = "";
															foreach ($class_mission_competencies_cambridge as $res3) { // echo lv 2
																if($res3->level_1 == $res2->level_1 && $res3->subject_id == $res2->subject_id){
																if($res3->level_2 != $level_2){?>
																	<li><?= $res3->level_2 ?></li>
																	<ul class="detail_meeting m-0">
																	<?php foreach($class_mission_competencies_cambridge as $res4){
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
								<!-- competencies merdeka -->
								<?php $subject_id = "";
										foreach ($class_mission_competencies_merdeka as $res) {
											if($res->subject_id != $subject_id){ ?>
											<b><?= $res->subject_name ?></b>
												<ul class="detail_meeting m-0">
												<?php $elemen = "";
												foreach ($class_mission_competencies_merdeka as $res2) { // echo lv1
													if($res2->subject_id == $res->subject_id){
														if($res2->elemen != $elemen){ ?>
															<li><?= $res2->elemen ?></li>
															<ul class="detail_meeting m-0">
															<?php $capaian_pembelajaran = "";
															foreach ($class_mission_competencies_merdeka as $res3) { // echo lv 2
																if($res3->elemen == $res2->elemen && $res3->subject_id == $res2->subject_id){
																if($res3->capaian_pembelajaran != $capaian_pembelajaran){?>
																	<li><?= $res3->capaian_pembelajaran ?></li>
																	<?php if($res3->tujuan_pembelajaran != " "){ ?>
																	<ul class="detail_meeting m-0">
																	<?php foreach($class_mission_competencies_merdeka as $res4){
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
										} 
								?>
							</div>
						</div>
						<!-- phase -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Phase</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= $detail->phase_name ?></p>
							</div>
						</div>
						<!-- kata kunci -->
						<?php if($cm->kata_kunci != NULL){?>
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Keywords</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= htmlspecialchars($cm->kata_kunci) ?></p>
							</div>
						</div>
						<?php } ?>
						<!-- keterampilan -->
						<?php if($cm->keterampilan != NULL){?>
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Skills</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= htmlspecialchars($cm->keterampilan) ?></p>
							</div>
						</div>
						<?php } ?>
						<!-- pertanyaan esensial -->
						<?php if($cm->pertanyaan_esensial != NULL){?>
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Trigger Questions</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= htmlspecialchars($cm->pertanyaan_esensial) ?></p>
							</div>
						</div>
						<?php } ?>
						<!-- Profil Pelajar Pancasila -->
						<div class="row" style="margin:0;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Profil Pelajar Pancasila ( Student Character Development According to the Pancasila )</p>
							</div>
							<div class="col-md-12 col-12">
								<ul class="m-0">
								<?php if ($cm->profil_pembelajaran_pancasila != "") {?>
								<li><?= htmlspecialchars($cm->profil_pembelajaran_pancasila) ?></li>
								<?php } ?> 
								<?php foreach($class_mission_profil_pembelajaran_pancasila as $res){ ?>
									<li><?= $res->name ?> (<?= $res->english_name ?>)</li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<!-- sarana prasarana  -->
						<div class="row" style="margin:0;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Facilities and Infrastructure</p>
							</div>
							<div class="col-md-12 col-12">
								<p>
									<!-- if off site, show the link meeting -->
									<?php if($cm->face_to_face == 0){?>
										<?=$cm->google_meet_link?>
									<?php } ?>
									<!-- if on site, show the site -->
									<?php if($cm->face_to_face == 1){?>
										<?=$cm->meeting_location?>
									<?php } ?>
								</p>
							</div>
						</div>
						<!-- Class Activities -->
						<div class="row" style="margin:0;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Class Activities</p>
							</div>
							<div class="col-md-12 col-12">
								<ul class="detail_meeting m-0">
									<?php foreach ($class_mission_class_activity as $cmca) { ?>
										<li><?= $cmca->name ?></li>
									<?php } ?>
								</ul>
							</div>
						</div>
						<!-- target peserta didik -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Student Target</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= $cm->target_peserta_didik->name?></p>
							</div>
						</div>
						<!-- jumlah peserta didik -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Amount of Students</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= $cm->jumlah_peserta_didik?></p>
							</div>
						</div>
						<!-- metode pembelajaran -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Learning Method</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= $cm->metode_pembelajaran->name?></p>
							</div>
						</div>
						<!-- assessment -->
						<?php if(!empty($class_mission_link)){?>
						<div class="row" style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Assessment</p>
							</div>
							<?php
							foreach($class_mission_link as $cml){
								foreach($cml as $res){
									if($res->class_mission_id == $cm->class_mission_id){
							?>
							<div class="row">
								<div class="col-md-3 col-6">
									<p class=""><?=$res->name?></p>
								</div>
								<div class="col-md-9 col-6">
									<p class=""><?=$res->link?></p>
								</div>
							</div>
							<?php }
								}
							}
							?>
						</div>
						<?php } ?>
						<!-- assessment desc / materi dan bahan ajar -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Assessment description</p>
							</div>
							<div class="col-md-12 col-12">
								<?=nl2br($cm->task_description)?>
							</div>
						</div>
						<!-- refleksi guru -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Teacher's Reflection</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?php if($cm->refleksi_guru == ""){ echo "<br>";}else{ echo nl2br($cm->refleksi_guru); } ?></p>
							</div>
						</div>
						<!-- ketercapaian tujuan pembelajaran -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Learning Goals</p>
							</div>
							<div class="col-md-12 col-12">
								<ul class="m-0">
								<?php foreach($class_mission_pencapaian_tujuan_pembelajaran as $res){ ?>
									<li><?= $res->name ?></li>
								<?php } ?>
								</ul>
							</div>
						</div>
						<!-- daftar pustaka -->
						<div class="row"style="margin:0;padding-top:2%;">
							<div class="col-md-12 col-12">
								<p class="label bg_ivory" style="margin:0;">Bibliography</p>
							</div>
							<div class="col-md-12 col-12">
								<p><?= htmlspecialchars($cm->daftar_pustaka) ?></p>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</td>
	</tr>
	<tr class="signature-row">
		<td>
			<div class="row border_class_mission signature-space">
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
<!-- <div class="divFooter">Copyright&copy; 2023 The Hyouman Indonesia. All rights reserved.
(Used with permission under MoU Merlion School)</div> -->
<script src="<?= base_url(); ?>assets/js/download_pdf/download_pdf.js"></script>
<script src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script>
<!--Main layout -->