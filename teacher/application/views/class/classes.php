<!--Main layout-->
<main>
<style>
.class{
	font-weight: 500;
	font-size: 32px;
	color: #1E3243;
	margin: 0;
}
.my_class{
	font-weight: 500;
	font-size: 20px;
	color: #000000;
}
.dont_have_class{
	font-weight: 600;
	font-size: 20px;
	color: #000000;
}
.div_class{
	background: #FFFFFF;
	border-radius: 16px;
	margin:0;
	padding:32px 36px 32px 36px;
}
#class_search{
	border:none;
	width:100%;
	background:transparent;
}
#class_search:focus{
	outline: none;
}
.div_search {
	display: flex;
	align-items:center;
	color: #1E3243 !important;
	font-weight: 500;
	font-size: 16px;
	z-index: 1;
	border-radius: 8px;
	border: 1px solid #BECCD7;
	padding: 6px 12px;
}
.div_search:hover, .div_search:focus{
	box-shadow: none;
	border: 2px solid #3D6586;
	color:#1E3243 !important;
	cursor:pointer;
}
.card_class{
	height: 200px;
	cursor: pointer;
	border-radius:16px;
	border: 1px solid #dee2e6!important;
}
.grade_subject{
	font-size: 20px;
	color: #1E3243;
}
.term_academy_year{
	font-size: 14px;
	color: #3D6586;
}
.btn_create_class{
	padding: 8px 16px;
}
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
}
</style>
<div id="loading-overlay">
	<div class="loading-icon"></div>
</div>
<div id="content" class="p-4 p-md-5 pt-3">
	<div class="d-flex justify-content-between align-items-center mt-3">
		<div class="d-flex">
			<p class="class">Class</p>
			<div class="div_search ml-3">
				<i class="fa fa-search"></i>&nbsp;&nbsp;<input type="text" placeholder="Search" id="class_search">
			</div>
		</div>
		<a href="<?= base_url(); ?>user/">
			<?php if($this->session->userdata('user_image') != NULL) { ?>
				<img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="35" height="35" class="rounded-circle">
			<?php } else { ?>
				<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="35" height="35" class="rounded-circle">
			<?php } ?>
			
		</a>
	</div>
	<div class="div_class mt-3">
		<div class="d-flex justify-content-between align-items-center">
			<p class="my_class m-0">My Classes</p>
			<div class="d-flex">
				<select id="filter_academy_year" class="browser-default custom-select input form-control" onchange="getFilterAcademyYear(this);" style="width:180px;height:40px;">
					<option value="all">All</option>
					<?php foreach($academy_year as $ay) { ?>
						<option value="<?= $ay->academy_year_name ?>">
							<?= $ay->academy_year_name ?>
						</option>
					<?php } ?>
				</select>
				<a href="<?= base_url() ?>classes/add_class"><button class="btn_create_class ml-2" style="width:180px;height:40px;">Create New Class</button></a>
			</div>
		</div>
		<div class="row" style="margin-top:32px;">
			<?php if($class != null){
				foreach($class as $c) { ?>
				<div class="col-md-4 mb-3 class_content <?=$c->academy_year_name?>" class="hide" data-filter-type="<?= $c->class_id ?>">
						<a href="<?=base_url()?>classes/details/<?=$c->class_id?>/1">
							<div id="outline_hover" class="card_class">
								<div style="background-image: url('<?=base_url()?>assets/img/uploads/user/<?=$c->class_image?>');-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;height:50%">
								</div>
								<div class="px-3 py-2">
									<p class="grade_subject m-0">
										<?=$c->grade_name?> - <?=$c->subject_name?> (<?=$c->subject_parent_name?>)
									</p>
									<p class="term_academy_year m-0">
										<?=$c->term_name?> - <?=$c->academy_year_name?>
									</p>
								</div>
							</div>
						</a>
				</div>
				<?php }
			}else{ ?>
				<div class="col-12 col-md-12 d-flex justify-content-center p-5">
					<p class="dont_have_class">You don't have any classes yet.</p>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	var base_url = "<?= base_url() ?>";
</script>
<script src="<?= base_url(); ?>assets/js/classes.js?v=001"></script>
</main>
<!--Main layout-->