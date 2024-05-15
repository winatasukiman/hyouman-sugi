<!--Main layout-->
<main>
<style>
input[type="text"] { 
    outline: none;
}
.main{
	margin-top: -40px;
}
.judul_kanan{
	font-weight: 700;
	font-size: 18pt;
	font-family: 'Quicksand' , sans-serif;
	color: #28557B;
	margin-bottom: 8%;
}
.view_details{
	color: #28557B;
}
.view_details:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer;
}
#add_mission:hover{
	cursor:pointer;
}
#goal_checklist:hover{
	cursor:pointer;
}
#class_introduction:hover{
	cursor:pointer;
}
.mission:hover{
	cursor:pointer;
}
.active{
	font-weight: 700;
}
#div_mission,#div_overall_view{
	display:none;
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
.vertical-center {
  margin-top:2vw;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
/* medium screen - for TABLET 991px or less */
@media screen and (max-width: 991px) {
}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
}
</style>
<div class="main">
	<div id="loading-overlay">
		<div class="loading-icon"></div>
	</div>
	<div class="row" style="margin-top:-2px;">

		<!-- Left Side -->
		<div class="col-md-3" style="background-color:#e8e8e8;padding:35px 10px 10px 50px;height:100vh">
			<p class="text_bold"><a href="<?=base_url()?>classes/details/<?=$detail->class_id?>/1"><img src="<?= base_url() ?>assets/img/icon/previous.png" class="img-fluid" alt="Responsive image">&nbsp;&nbsp;&nbsp;&nbsp;<?= $detail->class_name ?></a></p><br>
			<?php
				$i = 1;
				foreach ($class_mission as $cm) {
					if($cm->class_mission_id == $cmi){
			?>
			<p class="mission active" id="mission<?=$cm->mission_id?>" onclick="mission(<?=$cm->mission_id?>)">Mission&nbsp;<?=$i?></p>
			<?php  }
				$i++;}			?>
		</div>

		<!-- Right Side -->
		<!--Mission-->
		<div class="col-md-9" id="div_mission" style="padding:35px 10px 10px 50px;">
			<div class="row">
				<div class="col-md-5 col-6" style="text-align:left;"><p class="judul_kanan">Class Attendance</p></div>
				<div class="col-md-6 col-5" style="text-align:right;"><p><input type="text" placeholder="Search" id="student_search" style="border:none;border-bottom: 1px solid grey;color:black;"><i class="fa fa-search"></i></p></div>
			</div>
			<?php
			    $j = 1;
				foreach ($class_mission as $cm) {
					if($cm->class_mission_id == $cmi){
			?>
				<div id="div_mission<?=$cm->mission_id?>">
					<p class="text_bold">Mission&nbsp;<?=$j?></p>
					<?php
					foreach($class_mission_participants_arr as $cmp){
						foreach($cmp as $res){
							if($res->class_mission_id == $cm->class_mission_id){
								$checked = "";
								if($res->attendance == 1){
									$checked = "checked";
								}
					?>
					<div class="row mt-2 div_student">
						<div class="col-md-2 col-4">
							<?php if($res->user_image != null){ ?>
									<img src="http://localhost/hyouman/main/assets/img/uploads/user/<?= $res->user_image ?>" width="90vw" height="90vw" class="rounded-circle">
							<?php }else{ 
								if($res->gender == "Male"){?>
									<img src="<?= base_url() ?>assets/img/icon/laki.png" width="90vw" height="90vw" class="rounded-circle">
							<?php } else if($res->gender == "Female"){?>
									<img src="<?= base_url() ?>assets/img/icon/cewek.png" width="90vw" height="90vw" class="rounded-circle">
							<?php } else { ?>
									<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="90vw" height="90vw" class="rounded-circle">
								<?php } 
							}?>
						</div>
						<div class="col-md-4 col-4 vertical-center">
							<p><?=$res->full_name?></p>
						</div>
						<div class="col-md-6 col-4 vertical-center">
							<p>
								<label class="switch">
									<input type="checkbox" onclick='handleClick(<?=$res->class_mission_participants_id?>,this);' <?php echo $checked;?>>
									<span class="slider round"></span>
								</label>
							</p>
						</div>
					</div>
					<div class="row mt-2 div_student">
						<div class="col-md-10 col-10 mt-2" style="border-bottom: 2px solid grey">
						</div>
					</div>
					<?php }
						}
					}
					?>
				</div>
			<?php }
				 $j++;}			?>
		</div>
	</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	console.log(<?= json_encode($detail) ?>);
	console.log(<?= json_encode($class_mission) ?>);
	console.log(<?= json_encode($class_mission_participants) ?>);
	var class_mission = <?= json_encode($class_mission) ?>;
	var class_mission_first_row = <?= json_encode($class_mission_first_row) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/attendance.js"></script>
</main>
<!--Main layout -->