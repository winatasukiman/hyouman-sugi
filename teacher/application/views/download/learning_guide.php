<!--Main layout-->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/download_pdf/download_pdf.css">
<style>
	@media print {
		.footer {
			display:block;
		}
	}
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
				<div class="col-md-10 col-10 d-flex align-items-center" style="background-color:#FDC6AE;">
					<p class="label title_document">
                        Learning Guide
					</p>
				</div>
				<div class="col-md-1 col-1 d-flex" style="background-color:#FDC6AE;padding-right:10px;">
					<!-- <img src="<?= base_url(); ?>assets/img/document-converter/the-hyouman-word-logo.png" class="img_kop img-fluid" alt="Responsive image" style="padding-top:45%;padding-bottom:15%;"> -->
				</div>
			</div>
			<?php if(!empty($detail)){ ?>
			<div class="row div_begin div_cm_1">
				<div class="col-md-6 col-6 d-flex align-items-start" style="padding-left: 0px;">
					<p class="label title_document"></p>
				</div>
				<div class="col-md-6 col-6">
					<div class="row mt-2 mb-2">
						<div class="col-md-9 col-9" style="text-align:right;">
							<p class="label">School name</p>
							<p class="label">Grade</p>
							<p class="label">Term / Week</p>
						</div>
						<div class="col-md-3 col-3">
							<p class="label" style="font-weight:300;">Merlion School</p>
							<p class="label" style="font-weight:300;"><?=$detail["1"]->grade_name?></p>
							<p class="label" style="font-weight:300;"><?=$detail["1"]->term_name?> / <?=$week?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="border_class_mission">
				<div class="row div_begin div_cm_1" style="margin-bottom:0px;">
					<div class="col-md-1 col-1" style="border-right:1px solid #dee2e6;">
						<p class="label bg_ivory">Subject</p>
					</div>
					<div class="col-md-4 col-4" style="border-right:1px solid #dee2e6;">
						<p class="label bg_ivory">Core Skills</p>
					</div>
					<div class="col-md-4 col-4" style="border-right:1px solid #dee2e6;">
						<p class="label bg_ivory">Core Concepts</p>
					</div>
					<div class="col-md-3 col-3">
						<p class="label bg_ivory">Class Activities</p>
					</div>
				</div>
				<?php $length = count($detail);$i = 0;
				foreach ($detail as $res){ ?>
					<div class="row div_cm_2" style="border-bottom:1px solid #dee2e6;border-radius:5px;">
						<div class="col-md-1 col-1" style="border-right:1px solid #dee2e6;">
							<p class="label"><?=$res->subject_name?></p>
						</div>
						<div class="col-md-4 col-4" style="border-right:1px solid #dee2e6;">
								<ul>
									<?php foreach ($res->core_skill as $cs){ 
										foreach($cs as $cmcs){?>
										<li><?= $cmcs->name ?></li>
									<?php }
									} ?>
								</ul>
						</div>
						<div class="col-md-4 col-4" style="border-right:1px solid #dee2e6;">
								<ul>
									<?php foreach ($res->core_concept as $cc){
										foreach($cc as $cmcc){ 
											if($cmcc->content != ""){?>
												<li><?= $cmcc->content ?></li>
									<?php }
										}
									} ?>
								</ul>
						</div>
						<div class="col-md-3 col-3">
								<ul>
									<?php foreach ($res->class_activity as $ca){ 
										foreach($ca as $cmca){ ?>
										<li><?= $cmca->name ?></li>
									<?php }
									} ?>
								</ul>
						</div>
					</div>
				<?php $i++;} ?>
			</div>
			<!-- jika pakai paged js -->
			<!-- <table class="table table-bordered" style="color:black;">
				<thead>
					<tr>
						<th scope="col">Subject</th>
						<th scope="col">Learning Activities</th>
						<th scope="col">Task</th>
						<th scope="col">Suggested Exposure</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($detail as $res){ ?>
						<tr>
							<td><?=$res->subject_name?></td>
							<td>
								<ul>
									<?php foreach ($res->lesson_activities as $la){ ?>
										<li><?php echo nl2br($la); ?></li>
									<?php } ?>
								</ul>
							</td>
							<td>
								<ul>
									<?php foreach ($res->task_description as $td){ ?>
										<li><?= $td ?></li>
									<?php } ?>
								</ul>
							</td>
							<td>
								<ul>
									<?php foreach ($res->suggested_exposure as $se){ ?>
										<li><?= $se ?></li>
									<?php } ?>
								</ul>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table> -->
			<?php } ?>
		</td>
	</tr>
</tbody>

<tfoot><tr><td><div class="empty-footer"></div></tr></td></tfoot>
</table>
<div class="header"></div>
<!-- <div class="footer">
	<p>Copyright&copy; 2022 The Hyouman. All Rights Reserved</p>
</div> -->
<div class="divFooter">Copyright&copy; 2023 The Hyouman Indonesia. All rights reserved.
(Used with permission under MoU Merlion School)</div>
<script src="<?= base_url(); ?>assets/js/download_pdf/download_pdf.js"></script>
<!-- <script src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script> -->
<!--Main layout -->