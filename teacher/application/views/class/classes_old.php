	<!--Main layout-->
	<main>
	<style>
	/* Navbar */
	.judul, .label, .label2, .input, .isi, .isi2, .isi3{
		font-family: 'Quicksand' , sans-serif;
	}
	.m_wrap{
		width:100%;
	}
	.sidenav {
		background-color: white !important;
		background:#e8e8e8;
		width:100%;
		overflow:scroll;
    	white-space: nowrap;
	}
	/* Hide scrollbar for Chrome, Safari and Opera */
	.sidenav::-webkit-scrollbar {
		display: none;
	}

	/* Hide scrollbar for IE, Edge and Firefox */
	.sidenav {
	-ms-overflow-style: none;  /* IE and Edge */
	scrollbar-width: none;  /* Firefox */
	}
	.sn-item{
		cursor: pointer;
		display:inline-block;
		margin:10px;
	}
	.sn-item.active {
		background-image: url("<?= base_url() ?>assets/img/navbar/gariskecil.png") !important;
		background-repeat: no-repeat;
		background-position: center 75%;
		color: #28557B;
		font-weight: 700;
	}
	.layer {
		background-color: rgba(25, 40, 52, 0.8);
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 48%;
	}
	.judul{
		font-weight: 700;
		font-size: 16pt;
		color: #28557B;
		margin-bottom: 2%;
	}
	.label {
		font-size: 15px;
		font-weight: 700;
		color: white;
	}
	.label2 {
		font-size: 14px;
		font-weight: 700;
		color: #28557B;
		margin-top: -5px;
	}
	.isi{
		font-size: 14px;
		font-weight: 500;
		color: white;
	}
	.isi2{
		font-size: 12px;
		font-weight: 600;
		color: white;
	}
	.isi3{
		font-size: 13px;
		font-weight: 400;
		color: #28557B;
		margin-top: -7px;
	}
	.input {
		font-size: 18px;
		font-weight: 700;
	}
	input[type="text"] { 
		outline: none;
	}
	.imgangka{
		width: 34%;
		margin-top: 4%;
	}
	#div_task,#div_strength,#div_converter{
		display:none;
	}
	.div_after_topnav{
		margin-left:90px;
	}
	.div_mission{
		border-right: 1px solid grey;
		border-bottom: 1px solid grey;
	}
	.div_upload{
		border-bottom: 1px solid grey;
	}
	#promes,#syllabus,#learning_guide{ display:none;}
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
	/* medium screen - for TABLET 767px or less */
	@media screen and (max-width: 767px) {
	}
	/* small screen - for MOBILE 414px or less  */
	@media screen and (max-width: 414px) { 
		.div_after_topnav{
			margin-left:30px;
		}
	}
	</style>
	<div id="loading-overlay">
		<div class="loading-icon"></div>
	</div>
	<div class="main">
		<div class="m_wrap">
			<div class="sidenav text-center">
				<div class="sn-item active" onclick="select_tab('div_my_class')"><p>My Class</p></div>
				<!-- <div class="sn-item" onclick="select_tab('div_tas')"><p>Task</p></div>
				<div class="sn-item" onclick="select_tab('div_strength')"><p>STRENGTH</p></div> -->
				<div class="sn-item" onclick="select_tab('div_converter')"><p>Document Converter</p></div>
				<div class="sn-item" id="find_class"><p><input type="text" placeholder="Search" id="class_search" style="border:none;border-bottom: 1px solid grey;width:100%;"><i class="fa fa-search"></i></p></div>
				<div class="sn-item" id="add_class"><a href="<?= base_url() ?>classes/add_class"><p>Add Class&nbsp;<i class="fa fa-plus"></i></p></a></div>
			</div>
		</div>
		<div class="row d-flex justify-content-center">
			<div class="col-md-10">
				<?php if ($this->session->flashdata('category_success')) { ?>
					<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
				<?php } ?>
				<?php if ($this->session->flashdata('category_error')) { ?>
					<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
				<?php } ?>
			</div>
		</div>
		<div id="div_my_class">
			<div class="row d-flex justify-content-center">
				<?php if($class != null){
					foreach($class as $c) { ?>
						<div class="column_card class_content" class="hide" data-filter-type="<?= $c->class_id ?>" style="color:black;margin:0px 20px 40px 20px;">
							<a href="<?=base_url()?>classes/details/<?=$c->class_id?>/1">
								<div id="outline_hover" class="card border border-5" style="width: 250px; height: 300px;cursor: pointer;">
									<div style="background-image: url('<?=base_url()?>assets/img/uploads/user/<?=$c->class_image?>');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;padding:10px 5px 10px 10px;height:48%">
										<div class="layer">
										</div>
										<div class="col-md-12">
											<p class="label mb-1"><?=$c->full_name?></p>
											<p class="label mb-1"><?=$c->grade_name?>, <?=$c->subject_name?> (<?=$c->subject_parent_name?>)</p>
											<p class="label mb-1"><?=$c->academy_year_name?></p>
											<p class="label mb-1"><?=$c->term_name?></p>
										</div>
									</div>
									
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<p class="label2">Description</p>
												<p class="isi3">
												<?php if(strlen($c->class_description)>175){
													$result = substr($c->class_description, 0, 150);
													echo $result." ...";
												}else{
													echo $c->class_description;
												}?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
						<?php
					}
				}?>
			</div>
		</div>
		<div id="div_task">
			<div class="row d-flex justify-content-center">
				<div class="input col-md-2 col-2 div_mission text-center">
					<p>Mission</p>
				</div>
				<div class="input col-md-4 col-4 div_mission text-center">
					<p>Class</p>
				</div>
				<div class="input col-md-4 col-4 div_mission text-center">
					<p>Date</p>
				</div>
				<div class="input col-md-2 col-2 div_upload text-center">
					<p>Check Task</p>
				</div>
			<?php 
			if($class_mission != null){
				$i = 1;
				$class_id = 0;
				foreach($class_mission as $cm) {
					if($cm->class_id == $class_id){?>
						
						<div class="col-md-2 col-2 div_mission text-center">
							<p style="margin-top:15px;"><img src="<?= base_url() ?>assets/img/icon/<?=$i?>aktif.png" class="imgangka" alt="Responsive image"></p>
						</div>
						<div class="col-md-4 col-4 div_mission" style="padding-top:1.5%; padding-left: 3%;padding-bottom: 1%;">
							<p><?= $cm->grade_name?>, <?= $cm->term_name?> - <?= $cm->subject_name?></p>
							<p class="judul">
								<?php if(strlen($cm->class_name)>25){
									$result = substr($cm->class_name, 0, 20);
									echo $result." ...";
								}else{
									echo $cm->class_name;
								}?>
							</p>
						</div>
						<div class="col-md-4 col-4 div_mission" style="padding-top:1.5%; padding-left: 3%;">
							<p>Publish Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="input"><?=$cm->publish_date?>,&nbsp;<?=$cm->publish_time?></span></p>
							<p>Task Deadline&nbsp;&nbsp;
							<span class="input"><?=$cm->deadline_date?>,&nbsp;<?=$cm->deadline_time?></span></p>
						</div>
						<div class="col-md-2 col-2 div_upload d-flex justify-content-center" style="padding-top:1%; padding-left: 1%;">
							<p style="margin-top:15px;"><a
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width: 130px;"
							href="<?=base_url()?>classes/task/<?=$cm->class_id?>/<?=$cm->class_mission_id?>/Mission/<?=$i?>">Check Task</a></p>
						</div>
			<?php 	$i++;}else{ $i = 1; ?>
						<div class="col-md-2 col-2 div_mission text-center">
							<p style="margin-top:15px;"><p><img src="<?= base_url() ?>assets/img/icon/<?=$i?>aktif.png" class="imgangka" alt="Responsive image" ></p></p>
						</div>
						<div class="col-md-4 col-4 div_mission" style="padding-top:1.5%; padding-left: 3%;padding-bottom: 1%;">
							<p><?= $cm->grade_name?>, <?= $cm->term_name?> - <?= $cm->subject_name?></p>
							<p class="judul">
								<?php if(strlen($cm->class_name)>25){
									$result = substr($cm->class_name, 0, 20);
									echo $result." ...";
								}else{
									echo $cm->class_name;
								}?>
							</p>
						</div>
						<div class="col-md-4 col-4 div_mission" style="padding-top:1.5%; padding-left: 3%;">
							<p>Publish Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="input"><?=$cm->publish_date?>,&nbsp;<?=$cm->publish_time?></span></p>
							<p>Task Deadline&nbsp;&nbsp;
							<span class="input"><?=$cm->deadline_date?>,&nbsp;<?=$cm->deadline_time?></span></p>
						</div>
						<div class="col-md-2 col-2 div_upload d-flex justify-content-center" style="padding-top:1%; padding-left: 1%;">
							<p style="margin-top:15px;"><a
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width: 130px;"
							href="<?=base_url()?>classes/task/<?=$cm->class_id?>/<?=$cm->class_mission_id?>/Mission/<?=$i?>">Check Task</a></p>
						</div>
			<?php	$i++;}
					$class_id = $cm->class_id;
				}
			}?>
			</div>
		</div>
		<div id="div_strength">
			<div class="row d-flex justify-content-center">
				<?php if($strength_student != null ){
				foreach($strength_student as $ss2){
				foreach($ss2 as $ss){ ?>
				<div class="column_card class_content" class="hide" data-filter-type="<?= $ss->strength_student_id ?>" style="color:black;margin:0px 20px 40px 20px;">
					<a href="<?=base_url()?>strength/details/<?=$ss->strength_student_id?>">
						<div id="outline_hover" class="card border border-5" style="width: 250px; height: 300px;cursor: pointer;">

							<div class="row" style="background-image: url('<?= $this->config->item('student_url') ?><?= $ss->strength_student_file[0]->file_path?>');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;padding:50px 5px 10px 25px;">
								<div class="layer">
								</div>
								<div class="col-md-12">
									<p class="label mb-1">
										<?php if(strlen($ss->activity_title)>25){
											$result = substr($ss->activity_title, 0, 17);
											echo $result." ...";
										}else{
											echo $ss->activity_title;
										}?>
									</p>
									<p class="isi mb-1"><?=$ss->student_name?></p>
								</div>
							</div>
							
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<p class="label2">Description</p>
										<p class="isi3">
											<?php if(strlen($ss->general_description)>25){
												$result = substr($ss->general_description, 0, 17);
												echo $result." ...";
											}else{
												echo $ss->general_description;
											}?>
										</p>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
				<?php }
				}
				}else{?>
				<div class="col-md-12 text-center" style="margin-left:-30px;margin-top:2%;">
					<p>Empty</p>
				</div>
				<?php }?>
			</div>
		</div>
		<div id="div_converter">
			<div class="div_after_topnav">
				<!-- <div class="row">
					<h3>Convert document into</h3>
				</div> -->
				<div class="row">
					<!-- <label>
						<input type="checkbox" class="radio" value="prota" name="converter" onclick="getValueChecked('prota')" checked />&nbsp;&nbsp;Prota</label>&nbsp;&nbsp;
					<label>
						<input type="checkbox" class="radio" value="promes" name="converter" onclick="getValueChecked('promes')" />&nbsp;&nbsp;Promes</label>&nbsp;&nbsp;
					<label>
						<input type="checkbox" class="radio" value="syllabus" name="converter" onclick="getValueChecked('syllabus')" />&nbsp;&nbsp;syllabus</label> -->
					<h3>Convert document into &nbsp;</h3>
					<select id="doc_conv" class="browser-default custom-select input" style="width:200px;">
						<option value="prota" selected>Yearly Plan</option>
						<option value="promes">Semestral Plan</option>
						<option value="syllabus">Syllabus</option>
						<option value="learning_guide">Learning Guide</option>
					</select>
				</div>
				<div id="prota">
					<!-- <?= form_open('download_pdf/prota', 'id="form_convert_prota"') ?> -->
					<div class="row">
						<div class="col-md-4">
							<label class="label" for="academy_year_prota">Academic Year</label>
							<div class="input-group">
								<select class="browser-default custom-select input" id="academy_year_prota" name="academy_year_prota" style="">
									<option disabled selected>Choose academic year</option>
									<?php foreach($academy_year as $ay) { ?>
										<option
											value="<?= $ay->academy_year_id ?>">
											<?= $ay->academy_year_name ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="text-center error" id="div_error_academy_year_prota" style="margin-top: 10px;">
								<span id='error_academy_year_prota'></span>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-4">
							<label class="label" for="grade_subject_prota">Grade subject</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="grade_subject_prota" name="grade_subject_prota" style="">
								<option disabled selected>Choose grade subject</option>
								<?php foreach($teacher_specialty as $gs) { ?>
									<option value="<?= $gs->grade_subject_id ?>">
										<?= $gs->grade_name ?>&nbsp;<?= $gs->subject_name ?>&nbsp;<?= $gs->subject_parent_name ?>
									</option>
								<?php } ?>
							</select>
							</div>
							<div class="text-center error" id="div_error_grade_subject_prota" style="margin-top: 10px;">
								<span id='error_grade_subject_prota'></span>
							</div>
						</div>
					</div>
					<button class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" id="convert_prota" style="width:200px;margin:0;" type="button">Download</button>
					<!-- <?= form_close() ?> -->
				</div>
				<div id="promes">
					<!-- <?= form_open('download_pdf/promes', 'id="form_convert_promes"') ?> -->
					<div class="row">
						<div class="col-md-4">
							<label class="label" for="academy_year_promes">Academic Year</label>
							<div class="input-group">
								<select class="browser-default custom-select input" id="academy_year_promes" name="academy_year_promes" style="">
									<option disabled selected>Choose academic year</option>
									<?php foreach($academy_year as $ay) { ?>
										<option
											value="<?= $ay->academy_year_id ?>">
											<?= $ay->academy_year_name ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="text-center error" id="div_error_academy_year_promes" style="margin-top: 10px;">
								<span id='error_academy_year_promes'></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label class="label" for="grade_subject_promes">Grade subject</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="grade_subject_promes" name="grade_subject_promes" style="">
								<option disabled selected>Choose grade subject</option>
								<?php foreach($teacher_specialty as $gs) { ?>
									<option value="<?= $gs->grade_subject_id ?>">
										<?= $gs->grade_name ?>&nbsp;<?= $gs->subject_name ?>&nbsp;<?= $gs->subject_parent_name ?>
									</option>
								<?php } ?>
							</select>
							</div>
							<div class="text-center error" id="div_error_grade_subject_promes" style="margin-top: 10px;">
								<span id='error_grade_subject_promes'></span>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-4">
							<label class="label" for="semester_promes">Semester</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="semester_promes" name="semester_promes" style="">
								<option disabled selected>Choose semester</option>
								<?php foreach($semester as $s) { ?>
									<option
										value="<?= $s->semester_id ?>">
										<?= $s->semester_name ?>
									</option>
								<?php } ?>
							</select>
							</div>
							<div class="text-center error" id="div_error_semester_promes" style="margin-top: 10px;">
								<span id='error_semester_promes'></span>
							</div>
						</div>
					</div>
					<button class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" style="width:200px;margin:0;" type="button" id="convert_promes">Download</button>
					<!-- <?= form_close() ?> -->
				</div>
				<div id="syllabus">
					<!-- <?= form_open('download_pdf/syllabus', 'id="form_convert_syllabus"') ?> -->
					<div class="row">
						<div class="col-md-4">
							<label class="label" for="academy_year_syllabus">Academic Year</label>
							<div class="input-group">
								<select class="browser-default custom-select input" id="academy_year_syllabus" name="academy_year_syllabus" style="">
									<option disabled selected>Choose academic year</option>
									<?php foreach($academy_year as $ay) { ?>
										<option
											value="<?= $ay->academy_year_id ?>">
											<?= $ay->academy_year_name ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="text-center error" id="div_error_academy_year_syllabus" style="margin-top: 10px;">
								<span id='error_academy_year_syllabus'></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label class="label" for="grade_subject_syllabus">Grade subject</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="grade_subject_syllabus" name="grade_subject_syllabus" style="">
								<option disabled selected>Choose grade subject</option>
								<?php foreach($teacher_specialty as $gs) { ?>
									<option value="<?= $gs->grade_subject_id ?>">
										<?= $gs->grade_name ?>&nbsp;<?= $gs->subject_name ?>&nbsp;<?= $gs->subject_parent_name ?>
									</option>
								<?php } ?>
							</select>
							</div>
							<div class="text-center error" id="div_error_grade_subject_syllabus" style="margin-top: 10px;">
								<span id='error_grade_subject_syllabus'></span>
							</div>
						</div>
					</div>
					<div class="row mb-4">
						<div class="col-md-4">
							<label class="label" for="semester_syllabus">Semester</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="semester_syllabus" name="semester_syllabus" style="">
								<option disabled selected>Choose semester</option>
								<?php foreach($semester as $s) { ?>
									<option
										value="<?= $s->semester_id ?>">
										<?= $s->semester_name ?>
									</option>
								<?php } ?>
							</select>
							</div>
							<div class="text-center error" id="div_error_semester_syllabus" style="margin-top: 10px;">
								<span id='error_semester_syllabus'></span>
							</div>
						</div>
					</div>
					<div clas="row">
						<div class="col-md-4">
							<button class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="width:200px;margin:0;" type="button" id="convert_syllabus">Download</button>
						</div>
					</div>
					<!-- <?= form_close() ?> -->
				</div>
				<div id="learning_guide">
					<!-- <?= form_open('download_pdf/learning_guide', 'id="form_convert_learning_guide"') ?> -->
					<div class="row">
						<div class="col-md-4 col-6">
							<label class="label" for="academy_year_learning_guide">Academic Year</label>
							<div class="input-group">
								<select class="browser-default custom-select input" id="academy_year_learning_guide" name="academy_year_learning_guide" style="">
									<option disabled selected>Choose academic year</option>
									<?php foreach($academy_year as $ay) { ?>
										<option
											value="<?= $ay->academy_year_id ?>">
											<?= $ay->academy_year_name ?>
										</option>
									<?php } ?>
								</select>
							</div>
							<div class="text-center error" id="div_error_academy_year_learning_guide" style="margin-top: 10px;">
								<span id='error_academy_year_learning_guide'></span>
							</div>
						</div>
						<div class="col-md-4 col-6">
							<label class="label" for="grade_learning_guide">Grade</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="grade_learning_guide" name="grade_learning_guide" style="">
								<option disabled selected>Choose grade</option>
									<?php foreach($grade as $g) { ?>
										<option
											value="<?= $g->grade_id ?>">
											<?= $g->grade_name ?>
										</option>
									<?php } ?>
							</select>
							</div>
							<div class="text-center error" id="div_error_grade_learning_guide" style="margin-top: 10px;">
								<span id='error_grade_learning_guide'></span>
							</div>
						</div>
						<div class="col-md-4 col-6">
							
						</div>
					</div>
					<div class="row mb-4">
					<div class="col-md-4 col-6">
							<label class="label" for="week_learning_guide">Week</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="week_learning_guide" name="week_learning_guide" style="">
								<option disabled selected>Choose week</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
							</div>
							<div class="text-center error" id="div_error_week_learning_guide" style="margin-top: 10px;">
								<span id='error_week_learning_guide'></span>
							</div>
						</div>
						<div class="col-md-4 col-6">
							<label class="label" for="term_learning_guide">Term</label>
							<div class="input-group">
							<select class="browser-default custom-select input" id="term_learning_guide" name="term_learning_guide" style="">
								<option disabled selected>Choose term</option>
								<?php foreach($term as $t) { ?>
									<option
										value="<?= $t->term_id ?>">
										<?= $t->term_name ?>
									</option>
								<?php } ?>
							</select>
							</div>
							<div class="text-center error" id="div_error_term_learning_guide" style="margin-top: 10px;">
								<span id='error_term_learning_guide'></span>
							</div>
						</div>
					</div>
					<button class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium" style="width:200px;margin:0;" id="convert_learning_guide">Download</button>
					<!-- <?= form_close() ?> -->
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		var base_url = "<?= base_url() ?>";
	</script>
	<script src="<?= base_url(); ?>assets/js/classes.js?v=007"></script>
	</main>
	<!--Main layout 