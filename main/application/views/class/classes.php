<!--Main layout-->
<main>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/classes/classes.css">
<div class="main" style="padding-top: 2%;">
	<div class="sidenav row text-center">
		<div class="col-md-1"></div>
		<!-- <a class="col-md-1 col-1 sn-item" id="all_class"><p style="margin-top:15px;">All Class</p></a> -->
		<a class="col-md-1 col-1 sn-item active" id="my_class"><p style="margin-top:15px;">My Class</p></a>
		<a class="col-md-1 col-1 sn-item" id="task"><p style="margin-top:15px;">Task</p></a>
		<a class="col-md-1 col-1 sn-item" id="strength"><p style="margin-top:15px;">STRENGTH</p></a>
		<a class="col-md-6 col-6" id="search_class"><p style="margin-top:15px;"><input type="text" placeholder="Search" id="class_search" style="width:70%;border:none;border-bottom: 1px solid grey;"><i class="fa fa-search"></i></p></a>
		<a class="col-md-6 col-6" id="add_strength" style="text-align:right;" href="<?= base_url() ?>strength/add_strength"><p style="margin-top:15px;" >Add STRENGTH&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/addbiru.png" class="img-fluid" alt="Responsive image"></p>
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
	<div id="div_all_class">
		<div class="row div_after_topnav">
				<div class="col-md-12" style="margin-left:-5%;">
					<p class="text_bold text-center" style="font-size: 18pt;"><?= $grade_name_user ?></p>
				</div>
				<?php 
				if($all_class != null){
					foreach($all_class as $ac) {
						if($ac->status == 0){?>
						<div class="column_card class_content" class="hide" data-filter-type="<?= $ac->class_id ?>" style="color:black;margin:20px;">
							<a href="<?=base_url()?>classes/details/<?=$ac->class_id?>/0/0">
								<div id="outline_hover" class="card border border-5" style="width: 250px; height: 300px;cursor: pointer;">

									<div class="row" style="background-image: url('<?= $this->config->item('teacher_url') ?>/assets/img/uploads/user/<?=$ac->class_image?>');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;padding:10px 5px 10px 25px;">
										<div class="layer">
										</div>
										<div class="col-md-12" style="color:white;">
											<p class="label mb-1">
												<?php if(strlen($ac->class_name)>25){
													$result = substr($ac->class_name, 0, 17);
													echo $result." ...";
												}else{
													echo $ac->class_name;
												}?>
											</p>
											<p class="isi mb-1"><?=$ac->full_name?></p>
											<p class="isi2 mb-1"><?=$ac->grade_name?></p>
											<p class="isi2 mb-1"><?=$ac->subject_name?></p>
										</div>
									</div>
									<div class="row text-right">
										<div class="col-md-12">
											<?php if($ac->my_class == 0){?>
											<p class="harga"><img src="<?= base_url() ?>assets/img/icon/pricetag.png" class="img-fluid" alt="Responsive image" style="width: 35%;margin-right: 5%;">&nbsp;<p style="margin-top:-48px;margin-right:35px;"><?=$ac->class_points?></p></p>
											<?php }else if($ac->my_class == 1){ ?>
											<p class="harga"><img src="<?= base_url() ?>assets/img/icon/centangputih.png" class="img-fluid" alt="Responsive image" style="width: 35%;margin-right: 5%;">&nbsp;<p style="margin-top:-48px;margin-right:35px;">&nbsp;</p></p>
											<?php } ?>
										</div>
									</div>
									<div class="card-body" style="margin-top: -5%;">
										<div class="row">
											<div class="col-md-12">
												<p class="label2">Description</p>
												<p class="isi3">
												<?php if(strlen($ac->class_description)>175){
													$result = substr($ac->class_description, 0, 5);
													echo $result." ...";
												}else{
													echo $ac->class_description;
												}?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
			<?php 		}
					}
				}?>
		</div>
	</div>
	<div id="div_my_class">
		<div class="row div_after_topnav">
				<?php 
				if($class != null){
					for($i=0;$i<count($class);$i++) {
					if($i==0){	?>
						<div class="column_card class_content" class="hide" data-filter-type="<?= $class[$i]->class_id ?>" style="color:black;margin:0px 20px 40px 20px;">
							<a href="<?=base_url()?>classes/details/<?=$class[$i]->class_id?>/1/0">
								<div id="outline_hover" class="card border border-5" style="width: 250px; height: 300px;cursor: pointer;">

									<div class="row" style="background-image: url('<?= $this->config->item('teacher_url') ?>/assets/img/uploads/user/<?=$class[$i]->class_image?>');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;padding:10px 5px 10px 25px;">
										<div class="layer">
										</div>
										<div class="col-md-12">
											<p class="isi mb-1"><?=$class[$i]->full_name?></p>
											<p class="isi2 mb-1"><?=$class[$i]->grade_name?></p>
											<p class="isi2 mb-1"><?=$class[$i]->subject_name?></p>
											<p class="label mb-1">
												<?php if(strlen($class[$i]->class_name)>25){
													$result = substr($class[$i]->class_name, 0, 17);
													echo $result." ...";
												}else{
													echo $class[$i]->class_name;
												}?>
											</p>
										</div>
									</div>
									
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<p class="label2">Description</p>
												<p class="isi3">
												<?= $class[$i]->class_name ?>
												<?php if(strlen($class[$i]->class_description)>175){
													$result = substr($class[$i]->class_description, 0, 150);
													echo $result." ...";
												}else{
													echo $class[$i]->class_description;
												}?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php }
						else{
							if($class[$i]->class_id != $class[$i-1]->class_id){?>
							<div class="column_card class_content" class="hide" data-filter-type="<?= $class[$i]->class_id ?>" style="color:black;margin:0px 20px 40px 20px;">
								<a href="<?=base_url()?>classes/details/<?=$class[$i]->class_id?>/1/0">
									<div id="outline_hover" class="card border border-5" style="width: 250px; height: 300px;cursor: pointer;">
										<div class="layer">
										</div>
										<div class="row" style="background-image: url('<?= $this->config->item('teacher_url') ?>/assets/img/uploads/user/<?=$class[$i]->class_image?>');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;padding:10px 5px 10px 25px;">
											<div class="col-md-12" style="color:white;">
												<p class="isi mb-1"><?=$class[$i]->full_name?></p>
												<p class="isi2 mb-1"><?=$class[$i]->grade_name?></p>
												<p class="isi2 mb-1"><?=$class[$i]->subject_name?></p>
												<p class="label mb-1">
													<?php if(strlen($class[$i]->class_name)>25){
														$result = substr($class[$i]->class_name, 0, 17);
														echo $result." ...";
													}else{
														echo $class[$i]->class_name;
													}?>
												</p>
											</div>
										</div>
										
										<div class="card-body">
											<div class="row">
												<div class="col-md-12">
													<p class="label2">Description</p>
													<p class="isi3">
													<?php if(strlen($class[$i]->class_description)>175){
														$result = substr($class[$i]->class_description, 0, 150);
														echo $result." ...";
													}else{
														echo $class[$i]->class_description;
													}?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</a>
							</div>
				<?php 		}
						}
					}
				}?>
		</div>
	</div>

	<div id="div_task">
		<div class="row div_after_topnav" style="margin-right:7%;">
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
				<p>Upload</p>
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
					<div class="col-md-4 col-4 div_mission" style="padding-top:1.8%; padding-left: 3%;padding-bottom: 1%;">
						<p class="judul"><?php if(strlen($cm->class_name)>25){
													$result = substr($cm->class_name, 0, 20);
													echo $result." ...";
												}else{
													echo $cm->class_name;
												}?></p>
						<p><?= $cm->grade_name?>, <?= $cm->term_name?> - <?= $cm->subject_name?></p>
					</div>
					<div class="col-md-4 col-4 div_mission" style="padding-top:1.5%; padding-left: 3%;">
						<p>Join Class&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="input"><?php if($cm->attendance_date != ""){ echo $cm->attendance_date.",&nbsp;".$cm->attendance_time;}?></span></p>
						<p>Task Deadline&nbsp;&nbsp;<span class="input"><?php if($cm->deadline_date != ""){ echo $cm->deadline_date.",&nbsp;".$cm->deadline_time;}?></span></p>
					</div>
					<div class="col-md-2 col-2 div_upload d-flex justify-content-center" style="padding-top:1.5%; padding-left: 1%;">
						<p style="margin-top:15px;"><a
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
						style="background-color:white;width: 130px;"
						href="<?=base_url()?>classes/details/<?=$cm->class_id?>/1/0">Check Task</a></p>
					</div>
		<?php 	$i++;}else{ $i = 1; ?>
					<div class="col-md-2 col-2 div_mission text-center">
						<p style="margin-top:15px;"><p><img src="<?= base_url() ?>assets/img/icon/<?=$i?>aktif.png" class="imgangka" alt="Responsive image"></p></p>
					</div>
					<div class="col-md-4 col-4 div_mission" style="padding-top:1.8%; padding-left: 3%;padding-bottom: 1%;">
						<p class="judul"><?php if(strlen($cm->class_name)>25){
													$result = substr($cm->class_name, 0, 20);
													echo $result." ...";
												}else{
													echo $cm->class_name;
												}?></p>
						<p><?= $cm->grade_name?>, <?= $cm->term_name?> - <?= $cm->subject_name?></p>
					</div>
					<div class="col-md-4 col-4 div_mission" style="padding-top:1.5%; padding-left: 3%;">
						<p>Join Class&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="input"><?php if($cm->attendance_date != ""){ echo $cm->attendance_date.",&nbsp;".$cm->attendance_time;}?></span></p>
						<p>Task Deadline&nbsp;&nbsp;<span class="input"><?php if($cm->deadline_date != ""){ echo $cm->deadline_date.",&nbsp;".$cm->deadline_time;}?></span></p>
					</div>
					<div class="col-md-2 col-2 div_upload d-flex justify-content-center" style="padding-top:1.5%; padding-left: 1%;">
						<p style="margin-top:15px;"><a
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
						style="background-color:white;width: 130px;"
						href="<?=base_url()?>classes/details/<?=$cm->class_id?>/1/0">Check Task</a></p>
					</div>
		<?php	$i++;}
				$class_id = $cm->class_id;
			}
		}?>
		</div>
	</div>
	<div id="div_strength">
		<div class="row div_after_topnav">
			<?php if($strength_student != null ){
			foreach($strength_student as $ss){ ?>
			<div class="column_card class_content" class="hide" data-filter-type="<?= $ss->strength_student_id ?>" style="color:black;margin:0px 20px 40px 20px;">
				<a href="<?=base_url()?>strength/details/<?=$ss->strength_student_id?>">
					<div id="outline_hover" class="card border border-5" style="width: 250px; height: 300px;cursor: pointer;">

						<div class="row" style="background-image: url('<?= base_url() ?><?= $ss->strength_student_file[0]->file_path?>');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;padding:80px 5px 10px 25px;">
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
			}else{?>
			<div class="col-md-12 d-flex justify-content-center" style="margin-left:-30px;">
				<img src="<?= base_url()?>assets/img/icon/create.png" class="img-fluid img_create" alt="Responsive image"/>
			</div>
			<div class="col-md-12 text-center" style="margin-left:-30px;margin-top:2%;">
				<p>Let's create STRENGTH list !</p>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	console.log(<?= json_encode($all_class) ?>);
</script>
<script src="<?= base_url(); ?>assets/js/classes.js"></script>
</main>
<!--Main layout -->