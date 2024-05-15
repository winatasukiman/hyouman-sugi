<!--Main layout-->
<script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js" type="text/javascript"></script>
<main>
<style>
.main{
	margin-top: -40px;
}
.judul_kanan{
	font-weight: 700;
	font-family: 'Quicksand' , sans-serif;
	font-size: 18pt;
	color: #28557B;
	margin-bottom: 8%;
}
.judul_kanan2{
	font-weight: 400;
	font-family: 'Quicksand' , sans-serif;
	font-size: 12pt;
	color: #28557B;
	text-align: center;
}
.view_details{
	color: #28557B;
	margin-top: 2%;
}
.view_details:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer;
}
.active{
	font-weight: 700;
}
#div_mission,#div_overall_task_view,#div_boc{
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
			<p class="view_details active" id="overall_attendance_view">Overall Attendance View</p>
            <p class="view_details" id="overall_task_view">Overall Task View</p>
            <!-- <p class="view_details" id="boc">Bank of Competencies</p> -->
		</div>

		<!-- Overall Attendance View -->
		<div class="col-md-9" id="div_overall_attendance_view" style="padding:35px 10px 10px 50px;">
			<div class="row">
				<div class="col-md-5 col-6" style="text-align:left;">
					<p class="judul_kanan">Overall Attendance View</p>
				</div>
			</div>
			<div class="row">
			<div class="col-md-11 col-11">
			<table class="table table-bordered table-responsive-md">
			<tr>
			<td class="judul_kanan2">Student</td>
			<?php
			$k=1;
			foreach($class_mission as $cm){
			?>
				<td class="judul_kanan2">Mission <?=$k?></td>
			<?php
			$k++;}
			?>
			</tr>
			
			<?php
			$curr_part = "";
			if(! empty ($class_mission_participants)){
			for($x=0;$x<count($class_mission_participants);$x++){
				if($curr_part != $class_mission_participants[$x]->full_name){
					$curr_part = $class_mission_participants[$x]->full_name;
			?>
			<tr>
			<td>
				<?php if($class_mission_participants[$x]->user_image != null){ ?>
						<img src="http://localhost/hyouman/main/assets/img/uploads/user/<?= $class_mission_participants[$x]->user_image ?>" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
				<?php }else{ 
					if($class_mission_participants[$x]->gender == "Male"){?>
						<img src="<?= base_url() ?>assets/img/icon/laki.png" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
				<?php } else if($class_mission_participants[$x]->gender == "Female"){?>
						<img src="<?= base_url() ?>assets/img/icon/cewek.png" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
				<?php } else { ?>
						<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
					<?php } 
				}?>&nbsp;&nbsp;<span class="text_bold">
				<?=$class_mission_participants[$x]->full_name?></span>
			</td>
			<?php } ?>
			<td class="text-center">
				<?php if($class_mission_participants[$x]->attendance == 1){ 
					echo "<img src='".base_url()."assets/img/icon/check.png' class='img-fluid' alt='Responsive image'>";}
				else{ 
					echo ""; 
				}?>
			</td>
			<?php }
			}?>
			</tr>
			</table>
			</div>
			</div>
		</div>

        <!-- Overall Task View -->
		<div class="col-md-9" id="div_overall_task_view" style="padding:35px 10px 10px 50px;">
			<div class="row">
				<div class="col-md-5 col-6" style="text-align:left;"><p class="judul_kanan">Overall Task View</p></div>
			</div>
			<div class="row">
				<div class="col-md-11 col-11">
					<table class="table table-bordered table-responsive-md">
					<tr>
					<td class="judul_kanan2">Student</td>
					<?php
					$k=1;
					foreach($class_mission as $cm){
					?>
						<td class="judul_kanan2">Mission <?=$k?></td>
					<?php
					$k++;}
					?>
					</tr>
					
					<?php
					$curr_part = "";
					if(! empty ($class_mission_participants)){
					for($x=0;$x<count($class_mission_participants);$x++){
						if($curr_part != $class_mission_participants[$x]->full_name){
							$curr_part = $class_mission_participants[$x]->full_name;
					?>
					<tr>
					<td>
						<?php if($class_mission_participants[$x]->user_image != null){ ?>
								<img src="http://localhost/hyouman/main/assets/img/uploads/user/<?= $class_mission_participants[$x]->user_image ?>" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
						<?php }else{ 
							if($class_mission_participants[$x]->gender == "Male"){?>
								<img src="<?= base_url() ?>assets/img/icon/laki.png" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
						<?php } else if($class_mission_participants[$x]->gender == "Female"){?>
								<img src="<?= base_url() ?>assets/img/icon/cewek.png" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
						<?php } else { ?>
								<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="50vw" height="50vw" class="rounded-circle" style="margin-left: 1%;">
							<?php } 
						}?>&nbsp;&nbsp;&nbsp;<span class="text_bold"><?=$class_mission_participants[$x]->full_name?></span>
					</td>
					<?php } ?>
					<td class="text-center">
						<?php if($class_mission_participants[$x]->status_task == 0){ 
							echo "<img src='".base_url()."assets/img/icon/alert.png' class='img-fluid' alt='Responsive image'>";
						}else if($class_mission_participants[$x]->status_task == 2){ 
							echo "<img src='".base_url()."assets/img/icon/check.png' class='img-fluid' alt='Responsive image'>";
						}else if($class_mission_participants[$x]->status_task == 3){ 
							echo "<img src='".base_url()."assets/img/icon/assessed.png' class='img-fluid' alt='Responsive image'>";
						} ?>
					</td>
					<?php } 
					}?>
					</tr>
					</table>
				</div>
			</div>
		</div>
		
		<!-- Overall Task View -->
		<div class="col-md-9" id="div_boc" style="padding:35px 10px 10px 50px;">
			<div class="row">
				<div class="col-md-5 col-6" style="text-align:left;"><p class="judul_kanan">Graphic</p></div>
			</div>
			<div class="row">
				<div class="col-md-11 col-11">
					<?php if(!empty($participants)){
						foreach($participants as $p){ ?>
						<?= $p->full_name ?>
						<div id="container<?= $p->user_id ?>"></div>
					<?php }
					}?>
				</div>
			</div>
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
	var bank_of_competencies_detail = <?= json_encode($bank_of_competencies_detail) ?>;
	var participants = <?= json_encode($participants) ?>;
</script>
<script src="<?= base_url(); ?>assets/js/overall_view.js"></script>
</main>
<!--Main layout -->