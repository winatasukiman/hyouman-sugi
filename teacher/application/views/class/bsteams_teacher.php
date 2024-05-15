<!--Main layout-->
<main>
<style>
.main{
	margin-top: -40px;
}
input[type="text"] { 
    outline: none;
}
.participant:hover{
	cursor:pointer;
}
.active2{
	font-weight: 700;
}
#div_bsteams_from_student{
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
	background-position: center 12vh;
	/*margin-left: -5px;*/
	/*position: absolute;*/
	/*z-index: -1;*/
	color: #28557B;
	font-weight: 700;
}
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
/* medium screen - for TABLET 991px or less */
@media screen and (max-width: 991px) {
}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
	.sn-item.active {
		background-position: 70px 100px;
	}
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
	.sn-item.active {
		background-position: 70px 100px;
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
				if(!empty($class_strength_capture)){
				foreach ($class_strength_capture as $csc) {
			?>
			<div class="row">
				<div class="col-md-6 col-6">
					<p class="participant" id="participant<?=$csc->class_strength_capture_student_id?>" onclick="participant(<?=$csc->class_strength_capture_student_id?>)"><?=$csc->full_name?></p>
				</div>
				<div class="col-md-6 col-6">
					<img src="<?= base_url() ?>assets/img/icon/alert.png" class="img-fluid" alt="Responsive image">
				</div>
			</div>
			<?php 	$i++; }
				}?>
		</div>

		<!-- Right Side -->
		<!--Strength Capture / Progress report-->
		<div class="col-md-9" style="padding:35px 10px 10px 50px;">
			<div class="sidenav row text-center">
				<a class="col-md-6 col-6 sn-item active" id="strength_capture_from_student"><p style="margin-top:15px;">Strength Capture from Student</p></a>
				<a class="col-md-6 col-6 sn-item" id="bsteams_from_student"><p style="margin-top:15px;">BSTEAMS from Student</p></a>
			</div>
			<div class="row" id="div_bsteams_from_student" style="padding-left:25px;float: left; clear: left;">
				<?php
					if(!empty($class_strength_capture)){
					foreach ($class_strength_capture as $csc) {
				?>
				<div id="bsteams<?=$csc->class_strength_capture_student_id?>">
					<div class="row">
						<div class="col-md-12">
							<p><?=$csc->full_name?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>B</p>
						</div>
						<div class="col-md-11">
							<p>Lorem Ipsum</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_b"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->b_reflection?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->b_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>S</p>
						</div>
						<div class="col-md-11">
							<p>Lorem Ipsum</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_s1"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->s1_reflection?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->s1_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>T</p>
						</div>
						<div class="col-md-11">
							<p>Lorem Ipsum</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_t"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->t_reflection?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->t_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>E</p>
						</div>
						<div class="col-md-11">
							<p>Lorem Ipsum</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_e"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->e_reflection?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->e_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>A</p>
						</div>
						<div class="col-md-11">
							<p>Lorem Ipsum</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_a"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->a_reflection?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->a_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>M</p>
						</div>
						<div class="col-md-11">
							<p>Lorem Ipsum</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_m"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->m_reflection?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->m_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>S</p>
						</div>
						<div class="col-md-11">
							<p>Lorem Ipsum</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_s2"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->s2_reflection?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->s2_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
				</div>
				<?php
					}
					}
				?>
			</div>
			<div class="row" id="div_strength_capture_from_student" style="padding-left:25px;float: left; clear: left;">
				<?php
					if(!empty($class_strength_capture)){
					foreach ($class_strength_capture as $csc) {
				?>
				<div id="strength_capture<?=$csc->class_strength_capture_student_id?>">
					<div class="row">
						<div class="col-md-12">
							<p><?=$csc->full_name?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>S</p>
						</div>
						<div class="col-md-11">
							<p>Servicing</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_b"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->s_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->s_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>T</p>
						</div>
						<div class="col-md-11">
							<p>Thinking</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_s1"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->t1_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->t1_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>R</p>
						</div>
						<div class="col-md-11">
							<p>Reasoning</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_t"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->r_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->r_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>E</p>
						</div>
						<div class="col-md-11">
							<p>Elementary</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_e"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->e_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->e_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>N</p>
						</div>
						<div class="col-md-11">
							<p>Networking</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_a"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->n_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->n_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>G</p>
						</div>
						<div class="col-md-11">
							<p>Generating Idea</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_m"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->g_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->g_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>T</p>
						</div>
						<div class="col-md-11">
							<p>Techincal</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_s2"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->t2_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->t2_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>H</p>
						</div>
						<div class="col-md-11">
							<p>Headman</p>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<textarea 
								class="form-control input" 
								style="color: black;" 
								id="reflection_s2"
								rows="2"
								placeholder="Reflection"
								readonly="true"><?=$csc->h_strength?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-11">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?=$csc->h_strength_rating?><span class="star fa fa-star"></span></p>
						</div>
					</div>
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
	console.log(<?= json_encode($detail) ?>);
	console.log(<?= json_encode($class_strength_capture) ?>);
	var class_strength_capture = <?= json_encode($class_strength_capture) ?>;
	var class_strength_capture_first_row = <?= json_encode($class_strength_capture_first_row) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/bsteams_teacher.js"></script>
</main>
<!--Main layout -->