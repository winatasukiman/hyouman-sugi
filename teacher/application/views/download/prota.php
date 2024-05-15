<!--Main layout-->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/download_pdf/download_pdf.css?v=001">
<table class="whole-table">
<thead><th><td></td></th></thead>
<tbody>
	<div class="row" style="margin-right:0px;">
		<div class="col-md-1 col-1 d-flex align-items-center">
			<img src="<?= base_url(); ?>assets/img/document-converter/merlion-school-no-logo.png" class="img_kop img-fluid" alt="Responsive image">
		</div>
		<div class="col-md-10 col-10 d-flex align-items-center" style="background-color:#FFE47B;">
			<p class="label title_document">YEARLY PLAN</p>
		</div>
		<div class="col-md-1 col-1 d-flex" style="background-color:#FFE47B;padding-right:10px;">
			<!-- <img src="<?= base_url(); ?>assets/img/document-converter/the-hyouman-word-logo.png" class="img_kop img-fluid" alt="Responsive image" style="padding-top:45%;padding-bottom:15%;"> -->
		</div>
	</div>
	<div class="content">
		<?php if(!empty($class_detail)){ ?>
		<div class="row div_begin div_detail">
			<div class="col-md-5 col-5 d-flex align-items-start" style="padding-left: 0px;">
				<p class="label title_document"></p>
			</div>
			<div class="col-md-7 col-7">
				<div class="row mt-2">
					<div class="col-md-3 col-3" style="margin-top:0.2%;">
						<p class="label">School name</p>
						<p class="label">Class</p>
					</div>
					<div class="col-md-3 col-3" style="margin-top:0.2%;padding-left: 0px;">
						<p style="margin:0;"><?= $class_detail[0]->school_name ?></p>
						<p style="margin:0;padding-top:5px;"><?=$class_detail[0]->grade_name?></p>
					</div>
					<div class="col-md-3 col-3" style="margin-top:0.2%;">
						<p class="label">Subject</p>
						<p class="label">Academic year</p>
						<p class="label">Teacher's Name</p>
					</div>
					<div class="col-md-3 col-3" style="margin-top:0.2%;padding-left: 0px;">
						<p style="margin:0;"><?=$class_detail[0]->subject_name?></p>
						<p style="margin:0;margin-top:6px;"><?=$class_detail[0]->academy_year_name?></p>
						<p style="margin-top:3px;"><?=$class_detail[0]->teacher_name?></p>
					</div>
				</div>
			</div>
		</div>
		<?php }?>
		<table class="table table-bordered" style="color:black;">
			<thead>
				<tr>
				<th scope="col">Semester</th>
				<th scope="col" style="width:65%;">Topic</th>
				<th scope="col">Time Allocation</th>
				</tr>
			</thead>
			<tbody>
				<?php $smt = "";$topic = "null";
				foreach($detail as $cm){ ?>
					<tr id="<?= $cm->class_mission_id ?>">
						<td><?= $cm->semester_name ?></td>
						<td><?=strtoupper($cm->mission_title_trim_lwr)?></td>
						<td><?=$cm->time_allocation_a?> <?php if($cm->time_allocation_a == 1){echo "Period";}else{echo "Periods";} ?></td>
					</tr>
				<?php $smt = $cm->semester_name;} ?>
			</tbody>
		</table>
	</div>
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
<!-- <div class="footer">Copyright&copy; 2022 The Hyouman. All Rights Reserved</div> -->
<script type="text/javascript">
</script>
<script src="<?= base_url(); ?>assets/js/download_pdf/download_pdf.js"></script>
<script src="https://unpkg.com/pagedjs/dist/paged.polyfill.js"></script>
<!--Main layout -->