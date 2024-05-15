<!--Main layout-->
<main>
<style>
.title{
	font-weight: 500;
	font-size: 32px;
	color: #1E3243;
	margin: 0;
}
.div_class{
	background: #FFFFFF;
	border-radius: 16px;
	margin:0;
	padding:32px 36px 32px 36px;
}
.form-control{
    border-radius:8px !important;
    overflow:hidden;
}
#navbarNavDropdown{
	border-bottom-left-radius: 8px;
	border-bottom-right-radius: 8px;
    border: 1px solid #BECCD7;
	border-top: 0px!important;
	margin-top:-15px;
	padding: 1.375rem 1.75rem 0.375rem 0.75rem;
}
#navbarDropdownMenuLink{
	color: #1E3243;
    font-weight: 500;
    font-size: 16px;
}
#prota,#promes,#syllabus,#learning_guide{ display:none;}
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
/* custom alert */
.slit-in-vertical {
	-webkit-animation: slit-in-vertical 0.45s ease-out both;
	        animation: slit-in-vertical 0.45s ease-out both;
}
@-webkit-keyframes slit-in-vertical {
  0% {
    -webkit-transform: translateZ(-800px) rotateY(90deg);
            transform: translateZ(-800px) rotateY(90deg);
    opacity: 0;
  }
  54% {
    -webkit-transform: translateZ(-160px) rotateY(87deg);
            transform: translateZ(-160px) rotateY(87deg);
    opacity: 1;
  }
  100% {
    -webkit-transform: translateZ(0) rotateY(0);
            transform: translateZ(0) rotateY(0);
  }
}
@keyframes slit-in-vertical {
  0% {
    -webkit-transform: translateZ(-800px) rotateY(90deg);
            transform: translateZ(-800px) rotateY(90deg);
    opacity: 0;
  }
  54% {
    -webkit-transform: translateZ(-160px) rotateY(87deg);
            transform: translateZ(-160px) rotateY(87deg);
    opacity: 1;
  }
  100% {
    -webkit-transform: translateZ(0) rotateY(0);
            transform: translateZ(0) rotateY(0);
  }
}

/*---------------#region Alert--------------- */
#dialogoverlay{
  opacity: .8;
  position: fixed;
  top: 0px;
  left: 0px;
  background: #707070;
  width: 100%;
  height:100%;
  z-index: 10000;
}

#dialogbox{
  position: fixed;
  transition: 0.3s;
  width: 40%;
  height:100%;
  z-index: 10000;
  top:0;
  left: 0;
  right: 0;
  margin: auto;
}

#dialogbox > div:hover {
  box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.911);
}

#dialogbox > div{ 
  background: #FDEDC8;
  border-radius:7px;
  margin:8px; 
}

#dialogbox > div > #dialogboxhead{ 
  font-weight: 600;
  font-size:18px; 
  padding:10px; 
  color: #1E3243;
}

#dialogbox > div > #dialogboxbody{ 
  font-weight: 400;
  font-size:16px; 
  padding:20px; 
  color: #1E3243;
}

#dialogbox > div > #dialogboxfoot{ 
  padding:10px; 
  text-align:right; 
}
/*#endregion Alert*/
/* end of custom alert */
/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
}
</style>
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div id="content" class="p-4 p-md-5 pt-3">
	<div class="d-flex justify-content-between align-items-center mt-3">
		<p class="title">Document Converter</p>
		<a href="<?= base_url(); ?>user/">
			<?php if($this->session->userdata('user_image') != NULL) { ?>
				<img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="35" height="35" class="rounded-circle">
			<?php } else { ?>
				<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="35" height="35" class="rounded-circle">
			<?php } ?>
		</a>
	</div>
	<div class="div_class mt-3">
        <div class="row">
            <div class="col-md-6">
                <select id="doc_conv" class="form-control browser-default custom-select input">
                    <option disabled selected>Choose Document</option>
                    <option value="prota">Yearly Plan</option>
                    <option value="promes">Semestral Plan</option>
                    <option value="syllabus">Syllabus</option>
                    <option value="learning_guide">Learning Guide</option>
                </select>
            </div>
        </div>
        <div id="prota">
            <!-- line grey -->
            <div class="m-0 mt-4 mb-4" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
            <!-- <?= form_open('download_pdf/prota', 'id="form_convert_prota"') ?> -->
            <div class="row">
                <div class="col-md-6">
                    <label class="label" for="academy_year_prota">Academic Year</label>
                    <div class="input-group">
                        <select class="browser-default custom-select input form-control" id="academy_year_prota" name="academy_year_prota" style="">
                            <option disabled selected>Choose Academic Year</option>
                            <?php foreach($academy_year as $ay) { ?>
                                <option
                                    value="<?= $ay->academy_year_id ?>">
                                    <?= $ay->academy_year_name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="error" id="div_error_academy_year_prota">
                        <span id='error_academy_year_prota'></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="label" for="grade_subject_prota">Subject and Level</label>
                    <div class="input-group">
                    <input type="hidden" id="grade_subject_prota" name="grade_subject"/>
					<div id=subject_level_prota class="browser-default custom-select input form-control" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						Choose Subject and Level
					</div>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						<li class="nav-item dropdown">
						<?php $subject_parent = "";$grade = "";
						foreach($teacher_specialty as $gs) { 
							if($gs->subject_parent_name != $subject_parent){ ?>
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $gs->subject_parent_name ?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<?php $grade = "";foreach($teacher_specialty as $gs2) {
									if($gs2->subject_parent_name == $gs->subject_parent_name){
										if($gs2->grade_name != $grade){?>
									<li class="dropdown-submenu">
										<a class="dropdown-item dropdown-toggle" href="#"><?= $gs2->grade_name ?></a>
										<ul class="dropdown-menu">
										<?php foreach($teacher_specialty as $gs3) {
											if($gs3->subject_parent_name == $gs->subject_parent_name && $gs3->grade_name == $gs2->grade_name) { ?>
											<li><a class="dropdown-item" href="#" onclick="setSubjectLevel(<?= $gs3->grade_subject_id ?>,'prota')" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><?= $gs3->subject_name?></a></li>
										<?php }
										}?>
										</ul>
									</li>
								<?php }$grade = $gs2->grade_name;
									}
								}?>
								</ul>
						<?php }$subject_parent = $gs->subject_parent_name;
						}?>
						</li>
						</ul>
					</div>
                    </div>
                    <div class="error" id="div_error_grade_subject_prota">
                        <span id='error_grade_subject_prota'></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 d-flex align-items-center justify-content-end">
                    <!-- <a href="<?=base_url()?>"><p class="preview d-flex align-items-center m-0 mr-3"><img src="<?=base_url()?>assets/img/icon/icon_polygon.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Preview</p></a> -->
                    <p class="m-0" style="margin-top:32px !important;"><button id="convert_prota">Download</button></p>
                </div>
            </div>
            <!-- <?= form_close() ?> -->
        </div>
        <div id="promes">
            <!-- line grey -->
            <div class="m-0 mt-4 mb-4" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
            <!-- <?= form_open('download_pdf/promes', 'id="form_convert_promes"') ?> -->
            <div class="row">
                <div class="col-6 col-md-6">
                    <label class="label" for="academy_year_promes">Academic Year</label>
                    <div class="input-group">
                        <select class="browser-default custom-select input form-control" id="academy_year_promes" name="academy_year_promes" style="">
                            <option disabled selected>Choose Academic Year</option>
                            <?php foreach($academy_year as $ay) { ?>
                                <option
                                    value="<?= $ay->academy_year_id ?>">
                                    <?= $ay->academy_year_name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="error" id="div_error_academy_year_promes">
                        <span id='error_academy_year_promes'></span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <label class="label" for="grade_subject_promes">Subject and Level</label>
                    <div class="input-group">
                    <input type="hidden" id="grade_subject_promes" name="grade_subject"/>
					<div id=subject_level_promes class="browser-default custom-select input form-control" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						Choose Subject and Level
					</div>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						<li class="nav-item dropdown">
						<?php $subject_parent = "";$grade = "";
						foreach($teacher_specialty as $gs) { 
							if($gs->subject_parent_name != $subject_parent){ ?>
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $gs->subject_parent_name ?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<?php $grade = "";foreach($teacher_specialty as $gs2) {
									if($gs2->subject_parent_name == $gs->subject_parent_name){
										if($gs2->grade_name != $grade){?>
									<li class="dropdown-submenu">
										<a class="dropdown-item dropdown-toggle" href="#"><?= $gs2->grade_name ?></a>
										<ul class="dropdown-menu">
										<?php foreach($teacher_specialty as $gs3) {
											if($gs3->subject_parent_name == $gs->subject_parent_name && $gs3->grade_name == $gs2->grade_name) { ?>
											<li><a class="dropdown-item" href="#" onclick="setSubjectLevel(<?= $gs3->grade_subject_id ?>,'promes')" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><?= $gs3->subject_name?></a></li>
										<?php }
										}?>
										</ul>
									</li>
								<?php }$grade = $gs2->grade_name;
									}
								}?>
								</ul>
						<?php }$subject_parent = $gs->subject_parent_name;
						}?>
						</li>
						</ul>
					</div>
                    </div>
                    <div class="error" id="div_error_grade_subject_promes">
                        <span id='error_grade_subject_promes'></span>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 col-md-6">
                    <label class="label" for="semester_promes">Semester</label>
                    <div class="input-group">
                    <select class="browser-default custom-select input form-control" id="semester_promes" name="semester_promes" style="">
                        <option disabled selected>Choose semester</option>
                        <?php foreach($semester as $s) { ?>
                            <option
                                value="<?= $s->semester_id ?>">
                                <?= $s->semester_name ?>
                            </option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="error" id="div_error_semester_promes">
                        <span id='error_semester_promes'></span>
                    </div>
                </div>
                <div class="col-6 col-md-6 d-flex align-items-end justify-content-end">
                    <!-- <a href="<?=base_url()?>"><p class="preview d-flex align-items-center m-0 mr-3"><img src="<?=base_url()?>assets/img/icon/icon_polygon.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Preview</p></a> -->
                    <p class="m-0" ><button id="convert_promes">Download</button></p>
                </div>
            </div>
            <!-- <?= form_close() ?> -->
        </div>
        <div id="syllabus">
            <!-- line grey -->
            <div class="m-0 mt-4 mb-4" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
            <!-- <?= form_open('download_pdf/syllabus', 'id="form_convert_syllabus"') ?> -->
            <div class="row">
                <div class="col-6 col-md-6">
                    <label class="label" for="academy_year_syllabus">Academic Year</label>
                    <div class="input-group">
                        <select class="browser-default custom-select input form-control" id="academy_year_syllabus" name="academy_year_syllabus" style="">
                            <option disabled selected>Choose Academic Year</option>
                            <?php foreach($academy_year as $ay) { ?>
                                <option value="<?= $ay->academy_year_id ?>">
                                    <?= $ay->academy_year_name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="error" id="div_error_academy_year_syllabus">
                        <span id='error_academy_year_syllabus'></span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <label class="label" for="grade_subject_syllabus">Subject and Level</label>
                    <div class="input-group">
                    <input type="hidden" id="grade_subject_syllabus" name="grade_subject"/>
					<div id=subject_level_syllabus class="browser-default custom-select input form-control" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						Choose Subject and Level
					</div>
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
						<li class="nav-item dropdown">
						<?php $subject_parent = "";$grade = "";
						foreach($teacher_specialty as $gs) { 
							if($gs->subject_parent_name != $subject_parent){ ?>
								<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $gs->subject_parent_name ?>
								</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<?php $grade = "";foreach($teacher_specialty as $gs2) {
									if($gs2->subject_parent_name == $gs->subject_parent_name){
										if($gs2->grade_name != $grade){?>
									<li class="dropdown-submenu">
										<a class="dropdown-item dropdown-toggle" href="#"><?= $gs2->grade_name ?></a>
										<ul class="dropdown-menu">
										<?php foreach($teacher_specialty as $gs3) {
											if($gs3->subject_parent_name == $gs->subject_parent_name && $gs3->grade_name == $gs2->grade_name) { ?>
											<li><a class="dropdown-item" href="#" onclick="setSubjectLevel(<?= $gs3->grade_subject_id ?>,'syllabus')" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><?= $gs3->subject_name?></a></li>
										<?php }
										}?>
										</ul>
									</li>
								<?php }$grade = $gs2->grade_name;
									}
								}?>
								</ul>
						<?php }$subject_parent = $gs->subject_parent_name;
						}?>
						</li>
						</ul>
					</div>
                    </div>
                    <div class="error" id="div_error_grade_subject_syllabus">
                        <span id='error_grade_subject_syllabus'></span>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 col-md-6">
                    <label class="label" for="semester_syllabus">Semester</label>
                    <div class="input-group">
                    <select class="browser-default custom-select input form-control" id="semester_syllabus" name="semester_syllabus" style="">
                        <option disabled selected>Choose semester</option>
                        <?php foreach($semester as $s) { ?>
                            <option
                                value="<?= $s->semester_id ?>">
                                <?= $s->semester_name ?>
                            </option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="error" id="div_error_semester_syllabus">
                        <span id='error_semester_syllabus'></span>
                    </div>
                </div>
                <div class="col-6 col-md-6 d-flex align-items-end justify-content-end">
                    <!-- <a href="<?=base_url()?>"><p class="preview d-flex align-items-center m-0 mr-3"><img src="<?=base_url()?>assets/img/icon/icon_polygon.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Preview</p></a> -->
                    <p class="m-0"><button id="convert_syllabus">Download</button></p>
                </div>
            </div>
            <!-- <?= form_close() ?> -->
        </div>
        <div id="learning_guide">
            <!-- line grey -->
            <div class="m-0 mt-4 mb-4" style="width:100%;border-bottom: 1px solid #E8E8E8;"></div>
            <!-- <?= form_open('download_pdf/learning_guide', 'id="form_convert_learning_guide"') ?> -->
            <div class="row">
                <div class="col-md-6 col-6">
                    <label class="label" for="academy_year_learning_guide">Academic Year</label>
                    <div class="input-group">
                        <select class="browser-default custom-select input form-control" id="academy_year_learning_guide" name="academy_year_learning_guide" style="">
                            <option disabled selected>Choose Academic Year</option>
                            <?php foreach($academy_year as $ay) { ?>
                                <option
                                    value="<?= $ay->academy_year_id ?>">
                                    <?= $ay->academy_year_name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="error" id="div_error_academy_year_learning_guide">
                        <span id='error_academy_year_learning_guide'></span>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <label class="label" for="grade_learning_guide">Level</label>
                    <div class="input-group">
                    <select class="browser-default custom-select input form-control" id="grade_learning_guide" name="grade_learning_guide" style="">
                        <option disabled selected>Choose grade</option>
                            <?php foreach($grade_ori as $gr) { ?>
                                <option
                                    value="<?= $gr->grade_id ?>">
                                    <?= $gr->grade_name ?>
                                </option>
                            <?php } ?>
                    </select>
                    </div>
                    <div class="error" id="div_error_grade_learning_guide">
                        <span id='error_grade_learning_guide'></span>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 col-6">
                    <label class="label" for="week_learning_guide">Week</label>
                    <div class="input-group">
                    <select class="browser-default custom-select input form-control" id="week_learning_guide" name="week_learning_guide" style="">
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
                    <div class="error" id="div_error_week_learning_guide">
                        <span id='error_week_learning_guide'></span>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <label class="label" for="term_learning_guide">Term</label>
                    <div class="input-group">
                    <select class="browser-default custom-select input form-control" id="term_learning_guide" name="term_learning_guide" style="">
                        <option disabled selected>Choose term</option>
                        <?php foreach($term as $t) { ?>
                            <option value="<?= $t->term_id ?>">
                                <?= $t->term_name ?>
                            </option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="error" id="div_error_term_learning_guide">
                        <span id='error_term_learning_guide'></span>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-12 d-flex align-items-center justify-content-end">
                    <!-- <a href="<?=base_url()?>"><p class="preview d-flex align-items-center m-0 mr-3"><img src="<?=base_url()?>assets/img/icon/icon_polygon.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Preview</p></a> -->
                    <p class="m-0" style="margin-top:32px !important;"><button id="convert_learning_guide">Download</button></p>
                </div>
            </div>
            <!-- <?= form_close() ?> -->
        </div>
    </div>
</div>
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";
    var teacher_specialty = <?= json_encode($teacher_specialty) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/document_converter/index.js?v=003"></script>
</main>
<!--Main layout-->