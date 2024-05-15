<!--Main layout-->
<main>
<style>
input[type="text"] { 
    outline: none;
}
.main{
	margin-top: -40px;
}
.participant:hover{
	cursor:pointer;
}
.active2{
	font-weight: 700;
}
#div_progress_report,#div_bsteams_from_student{
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
.star{
	color:orange;
}

.star-rating s,.star-rating-b s,.star-rating-s1 s,.star-rating-t s ,.star-rating-e s ,.star-rating-a s ,.star-rating-m s ,.star-rating-s2 s,.star-rating-s-strength s,.star-rating-t1-strength s,.star-rating-r-strength s,.star-rating-e-strength s,.star-rating-n-strength s,.star-rating-g-strength s,.star-rating-t2-strength s,.star-rating-h-strength s {
    color: grey;
    font-size: 30px;
    cursor: default;
    text-decoration: none;
    line-height: 50px;
}

.star-rating,.star-rating-b,.star-rating-s1,.star-rating-t,.star-rating-e ,.star-rating-a,.star-rating-m ,.star-rating-s2,.star-rating-s-strength,.star-rating-t1-strength,.star-rating-r-strength,.star-rating-e-strength,.star-rating-n-strength,.star-rating-g-strength,.star-rating-t2-strength,.star-rating-h-strength {
    padding: 2px;
}
.star-rating s:hover:before,
.star-rating s.rated:before,
.star-rating s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-b s:hover:before,
.star-rating-b s.rated:before,
.star-rating-b s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-s1 s:hover:before,
.star-rating-s1 s.rated:before,
.star-rating-s1 s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-t s:hover:before,
.star-rating-t s.rated:before,
.star-rating-t s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-e s:hover:before,
.star-rating-e s.rated:before,
.star-rating-e s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-a s:hover:before,
.star-rating-a s.rated:before,
.star-rating-a s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-m s:hover:before,
.star-rating-m s.rated:before,
.star-rating-m s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-s2 s:hover:before,
.star-rating-s2 s.rated:before,
.star-rating-s2 s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-s-strength s:hover:before,
.star-rating-s-strength s.rated:before,
.star-rating-s-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-t1-strength s:hover:before,
.star-rating-t1-strength s.rated:before,
.star-rating-t1-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-r-strength s:hover:before,
.star-rating-r-strength s.rated:before,
.star-rating-r-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-e-strength s:hover:before,
.star-rating-e-strength s.rated:before,
.star-rating-e-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-n-strength s:hover:before,
.star-rating-n-strength s.rated:before,
.star-rating-n-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-g-strength s:hover:before,
.star-rating-g-strength s.rated:before,
.star-rating-g-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-t2-strength s:hover:before,
.star-rating-t2-strength s.rated:before,
.star-rating-t2-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating-h-strength s:hover:before,
.star-rating-h-strength s.rated:before,
.star-rating-h-strength s.active:before {
    content: "\2605";
	color:orange;
}
.star-rating s:before ,.star-rating-b s:before ,.star-rating-s1 s:before ,.star-rating-t s:before ,.star-rating-e s:before ,.star-rating-a s:before ,.star-rating-m s:before ,.star-rating-s2 s:before,.star-rating-s-strength s:before,.star-rating-t1-strength s:before,.star-rating-r-strength s:before,.star-rating-e-strength s:before,.star-rating-n-strength s:before,.star-rating-g-strength s:before,.star-rating-t2-strength s:before,.star-rating-h-strength s:before {
    content: "\2606";
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
				if(!empty($class_strength_capture_teacher)){
				foreach ($class_strength_capture_teacher as $csc) {
			?>
			<div class="row">
				<div class="col-md-6 col-6">
					<p class="participant" id="participant<?=$csc->class_strength_capture_teacher_id?>" onclick="participant(<?=$csc->class_strength_capture_teacher_id?>)"><?=$csc->full_name?></p>
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
				<a class="col-md-4 col-4 sn-item active" id="strength_capture_from_student"><p style="margin-top:15px;">Strength Capture</p></a>
				<a class="col-md-4 col-4 sn-item" id="bsteams_from_student"><p style="margin-top:15px;">BSTEAMS</p></a>
				<a class="col-md-4 col-4 sn-item" id="progress_report"><p style="margin-top:15px;">Progress Report</p></a>
			</div>
			<div class="row" id="div_bsteams_from_student" style="padding-left:25px;float: left; clear: left;">
				<?php
					if(!empty($class_strength_capture_teacher)){
					foreach ($class_strength_capture_teacher as $csc) {
				?>
				<div id="bsteams<?=$csc->class_strength_capture_teacher_id?>">
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
							<p>Business</p>
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
								placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->b_reflection;}?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-2">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->b_rating;}?><span class="star fa fa-star"></span></p>
						</div>
						<div class="col-md-9">
							<div class="star-rating-b"><s><s><s><s><s></s></s></s></s></s></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>S</p>
						</div>
						<div class="col-md-11">
							<p>Sciences</p>
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
								placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->s1_reflection;}?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-2">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->s1_rating;}?><span class="star fa fa-star"></span></p>
						</div>
						<div class="col-md-9">
							<div class="star-rating-s1"><s><s><s><s><s></s></s></s></s></s></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>T</p>
						</div>
						<div class="col-md-11">
							<p>Technology</p>
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
								placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->t_reflection;}?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-2">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->t_rating;}?><span class="star fa fa-star"></span></p>
						</div>
						<div class="col-md-9">
							<div class="star-rating-t"><s><s><s><s><s></s></s></s></s></s></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>E</p>
						</div>
						<div class="col-md-11">
							<p>Engineering</p>
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
								placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->e_reflection;}?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-2">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->e_rating;}?><span class="star fa fa-star"></span></p>
						</div>
						<div class="col-md-9">
							<div class="star-rating-e"><s><s><s><s><s></s></s></s></s></s></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>A</p>
						</div>
						<div class="col-md-11">
							<p>Arts</p>
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
								placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->a_reflection;}?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-2">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->a_rating;}?><span class="star fa fa-star"></span></p>
						</div>
						<div class="col-md-9">
							<div class="star-rating-a"><s><s><s><s><s></s></s></s></s></s></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>M</p>
						</div>
						<div class="col-md-11">
							<p>Mathematics</p>
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
								placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->m_reflection;}?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-2">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->m_rating;}?><span class="star fa fa-star"></span></p>
						</div>
						<div class="col-md-9">
							<div class="star-rating-m"><s><s><s><s><s></s></s></s></s></s></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
							<p>S</p>
						</div>
						<div class="col-md-11">
							<p>Social Awareness</p>
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
								placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->s2_reflection;}?></textarea>
						</div>
						<div class="col-md-1">
							<p></p>
						</div>
						<div class="col-md-2">
							<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->s2_rating;}?><span class="star fa fa-star"></span></p>
						</div>
						<div class="col-md-9">
							<div class="star-rating-s2"><s><s><s><s><s></s></s></s></s></s></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button
							type="button"
							class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
							style="background-color:white;width:150px"
							onclick="submit_bsteams(<?=$detail->class_id?>,<?=$csc->user_id?>)">Submit BSTEAMS</button>
						</div>
						<div class="col-md-1">
						</div>
						<div class="col-md-11">
						</div>
						<div class="col-md-1">
						</div>
						<div class="col-md-11">
						</div>
						<div class="col-md-1">
						</div>
						<div class="col-md-2">
						</div>
						<div class="col-md-9">
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
					if(!empty($class_strength_capture_teacher)){
					foreach ($class_strength_capture_teacher as $csc) {
				?>
				<div id="strength_capture<?=$csc->class_strength_capture_teacher_id?>">
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
						<p>Lorem Ipsum</p>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-11">
						<textarea 
							class="form-control input" 
							style="color: black;" 
							id="s_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->s_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->s_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-s-strength"><s><s><s><s><s></s></s></s></s></s></div>
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
							id="t1_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->t1_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->t1_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-t1-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
						<p>R</p>
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
							id="r_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->r_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->r_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-r-strength"><s><s><s><s><s></s></s></s></s></s></div>
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
							id="e_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->e_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->e_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-e-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
						<p>N</p>
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
							id="n_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->n_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->n_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-n-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
						<p>G</p>
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
							id="g_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->g_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->g_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-g-strength"><s><s><s><s><s></s></s></s></s></s></div>
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
							id="t2_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->t2_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->t2_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-t2-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1">
						<p>H</p>
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
							id="h_strength"
							rows="2"
							placeholder="Insert Reflection"><?php if($class_strength_capture_teacher!=null){ echo $csc->h_strength;}?></textarea>
					</div>
					<div class="col-md-1">
						<p></p>
					</div>
					<div class="col-md-2">
						<p style="margin-top:15px;">Excitement&nbsp;&nbsp;<?php if($class_strength_capture_teacher!=null){ echo $csc->h_strength_rating;}?><span class="star fa fa-star"></span></p>
					</div>
					<div class="col-md-9">
						<div class="star-rating-h-strength"><s><s><s><s><s></s></s></s></s></s></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button
						type="button"
						class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
						style="background-color:white;width:150px"
						onclick="submit_strength(<?=$detail->class_id?>,<?=$csc->user_id?>)">Submit Strength Capture</button>
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-11">
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-11">
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-2">
					</div>
					<div class="col-md-9">
					</div>
				</div>
				</div>
				<?php
					}
					}
				?>
			</div>
			<div class="row" id="div_progress_report" style="padding-left:10px;">
				<?php
					if(!empty($class_strength_capture_teacher)){
					foreach ($class_strength_capture_teacher as $csc) {
				?>
				<div id="progress_report_content<?=$csc->class_strength_capture_teacher_id?>">
					<div class="row">
						<div class="col-md-11 col-11">
						<textarea 
						class="form-control input" 
						style="color: black;" 
						id="progress_report<?=$csc->class_strength_capture_teacher_id?>"
						rows="2"
						placeholder="Insert Progress Report"
						><?=$csc->progress_report?></textarea>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-7">
						</div>
						<div class="col-md-5">
							<button
								type="button"
								class="btn btn-block btn_remove_outline btn_outline_blue text15 text_medium"
								style="background-color:white;width:150px;margin-left:0px;"
								onclick="submit_progress_report(<?=$csc->class_strength_capture_teacher_id?>)">Submit Task</button>
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
	var class_strength_capture_teacher = <?= json_encode($class_strength_capture_teacher) ?>;
	var class_strength_capture_teacher_first_row = <?= json_encode($class_strength_capture_teacher_first_row) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/progressreport.js"></script>
</main>
<!--Main layout -->