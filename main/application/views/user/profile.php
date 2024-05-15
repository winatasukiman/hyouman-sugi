<!--Main layout-->
<main>
<style>
/* Navbar */
/* Left Navbar*/
.sidenav {
	height: 100%;
	position: fixed;
	z-index: 1;
	left: 0;
	top:0;
	overflow-x: hidden;
	padding-top: 107px;
	padding-right:10px;
	background-image: none;
	/*border-right: 2px solid grey;*/
	background:#e8e8e8;
}
.grade {
	font-size: 15px;
	font-weight: 700;
}
.isi{
	font-size: 14px;
	font-weight: 300;
	text-align: left;
}
.label{ color:grey; }
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
}
.edit_profile {
	font-weight: 400;
	font-size: 15px;
	font-family: Quicksand;
}
.edit_profile:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer;
}
.inviteform{
	margin-left: -55%;
}
.invitebutton{
	margin-left: -55%;
	color:#28557B;
	margin-bottom: 10%;
	margin-top: -3%;
}
.view_detail_summary:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.view_less_summary:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.view_detail_history:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.view_less_history:hover {
	color: #28557B;
	font-weight: 700;
	cursor:pointer
}
.sn-item{
	margin-bottom: 15%;
	cursor: pointer;
}
.summary,.summary2,.summary3{
	display:none;
}

@-webkit-keyframes slide-down {
      0% { opacity: 0; -webkit-transform: translateY(-100%); }   
    100% { opacity: 1; -webkit-transform: translateY(0); }
}
@-moz-keyframes slide-down {
      0% { opacity: 0; -moz-transform: translateY(-100%); }   
    100% { opacity: 1; -moz-transform: translateY(0); }
}
.sn-item.active {
	position: relative;
	/*color: #ffb24a !important;*/
	/*background-color: white !important;*/
	/*background-image: url("../img/turnamen/linekategori.svg") !important;*/
	background-repeat: no-repeat;
	background-size: 100% 100%;
	background-position: -83px 0;
	/*margin-left: -5px;*/
	/*position: absolute;*/
	/*z-index: -1;*/
	color: #28557B;
	font-weight: 700;
}
#div_profile,#div_report,#div_wallet{
	margin-left:190px;
}
#div_report,.view_less_summary,.view_less_history,#div_wallet{
	display:none;
}
.text_judul{
	font-family: Quicksand;
	font-weight: 700;
	font-size: 20px;
}
.dp{
	width:70px;
	height:70px;
}
.dpanak{
	width:60px; 
	height:60px; 
}
#help{
    position: absolute; 
	bottom: 60px; 
}
#logout{
    position: absolute; 
	bottom: 0px; 
}
input[type="text"] { 
    outline: none;
}
.layer{
    background-color: rgba(25, 40, 52, 0.8);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 39%;
}
/* medium screen - for TABLET 991px or less */
@media screen and (max-width: 991px) {
	.name_id{
		margin-left:17px;
	}
	.dp{
		width:50px;
		height:50px;
	}
	.dpanak{
		width:40px; 
		height:40px; 
	}
	.text_judul{
		font-family: Quicksand;
		font-weight: 700;
		font-size: 18px;
	}
	.edit_profile {
		font-weight: 400;
		font-size: 14px;
		font-family: Quicksand;
	}
}

/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
	/* Left Navbar*/
	.sidenav{
		display:none;
	}
	.sn-item.active {
		background-position: -79px 0;
	}
	.name_id{
		margin-left:0%;
	}
	#div_profile{
		margin-left: 13%;
		margin-right: 12%;
	}
	.inviteform{
		margin-left: -37%;
	}
	.invitebutton{
		margin-left: -36%;
	}
	.dp{
		width:50px;
		height:50px;
	}
	.dpanak{
		width:40px; 
		height:40px; 
	}
	.text_judul{
		font-family: Quicksand;
		font-weight: 700;
		font-size: 18px;
	}
	.edit_profile {
		font-weight: 400;
		font-size: 14px;
		font-family: Quicksand;
	}
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) { 
	/* Left navbar */
	.sidenav{
		display:none;
	}
	#div_profile,#div_report,#div_wallet{
		margin-left:25px;
	}
	.dp{
		width:40px;
		height:40px;
	}
	.dpanak{
		width:30px; 
		height:30px; 
	}
	.name_id{
		margin-left:3%;
	}
	.inviteform{
		margin-left: -20%;
	}
	.invitebutton{
		margin-left: -20%;
		margin-bottom: 15%;
	}
	.dpanak{
		width:32px;
		height:32px;
	}
	.text_judul{
		font-family: Quicksand;
		font-weight: 700;
		font-size: 18px;
	}
	.edit_profile {
		font-weight: 400;
		font-size: 14px;
		font-family: Quicksand;
	}
}
</style>
<div class="main">
	<div class="sidenav">
		<a class="sn-item active" id="profile"><img src="<?= base_url() ?>assets/img/profile/profile.png" class="img-fluid" alt="Responsive image">&nbsp;Profile</a>
<!-- 		<a class="sn-item" id="report"><img src="<?= base_url() ?>assets/img/profile/report.png" class="img-fluid" alt="Responsive image">&nbsp;Report</a>
		<a class="sn-item" id="theme"><img src="<?= base_url() ?>assets/img/profile/theme.png" class="img-fluid" alt="Responsive image">&nbsp;Theme</a> -->
		<a class="sn-item" id="wallet"><img src="<?= base_url() ?>assets/img/profile/wallet.png" class="img-fluid" alt="Responsive image">&nbsp;Wallet</a>
		<a class="sn-item" id="help"><img src="<?= base_url() ?>assets/img/profile/help.png" class="img-fluid" alt="Responsive image">&nbsp;Help</a>
		<a class="sn-item" id="logout" href="<?= base_url()?>login/logout"><img src="<?= base_url() ?>assets/img/profile/logout.png" class="img-fluid" alt="Responsive image">&nbsp;Logout</a>
	</div>
	<div id="div_profile">
		<div class="row">
			<div class="col-md-11">
				<?php if ($this->session->flashdata('category_success')) { ?>
					<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
				<?php } ?>
				<?php if ($this->session->flashdata('category_error')) { ?>
					<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
				<?php } ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-12" style="margin-bottom: 25px;">
				<div class="row">
					<div class="col-3 col-md-4" style="padding-top:5px;margin-right: -25px;">
						<?php 
							if($user_detail->user_image != NULL) {
						?>
							<img src="<?= base_url() ?>assets/img/uploads/user/<?= $user_detail->user_image ?>" class="dp rounded-circle">
						<?php 	
							} else {
						?>
							<img src="<?= base_url() ?>assets/img/navbar/dp.png" class="dp rounded-circle">
						<?php 	
							}
						?>
					</div>
					<div class="col-8 col-md-7 name_id">
						<p class="text_judul" style="width: 350px;"><?= $user_detail->full_name ?></p>
						<p class="label" style="margin-top: -15px;">User ID : <?= $user_detail->user_id ?></p>
						<p class="text_judul2" style="margin-top: -12px; margin-bottom: 20%"><a class="edit_profile" href="<?= base_url() ?>user/edit_profile">Edit Profile</a></p>
						<?php if ($user_detail->user_type_id == 2){ ?>
						<p class="inviteform">
							<input 
							class="form-control input" 
							style="color: black;" 
							type="text" 
							value="Invite Link" id="myInput"
							readonly=true>
						</p>
						<button class="invitebutton btn remove_outline edit_profile text_bold" id="copypy">Invite Link</button>
						<?php } ?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 12px;">
						Short Profile
					</div>
					<div class="col-md-10">
						<?= $user_detail->short_profile ?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 12px;">
						Phone Number
					</div>
					<div class="col-md-12">
						+<?= $user_detail->country_code ?>&nbsp;<?= $user_detail->phone_number ?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 12px;">
						Email
					</div>
					<div class="col-md-12">
						<?= $user_detail->email ?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label" style="margin-bottom: 12px;">
						Institution
					</div>
					<div class="col-md-12">
						<?php 
							if($user_detail->institution_id != NULL) {
						?>
							<?= $user_detail->institution_name ?>
						<?php 	
							}
						?>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-12 label">
						Address
					</div>
					<div class="col-md-12">
						<?= $user_detail->address ?>
					</div>
				</div>
			</div>
			<div class="col-md-8 col-12">
				<div class="row">
					<div class="col-md-12 col-12">
					

						<!-- Parent Profile View -->
						<?php 
						if($user_detail->user_type_id == 2){
							if($children != null){
								for($i = 0; $i < count($children); $i++) { ?>
									<div class="row mb-3">
										<div class="col-2 col-md-1" style="margin-right: 2%;">
											<?php if($children[$i]->user_image != null){ ?>
													<img src="<?= base_url() ?>assets/img/uploads/user/<?= $children[$i]->user_image ?>" class="dpanak rounded-circle">
											<?php }else{ 
												if($children[$i]->gender == "Male"){?>
													<img src="<?= base_url() ?>assets/img/icon/laki.png" class="dpanak rounded-circle">
											<?php } else if($children[$i]->gender == "Female"){?>
													<img src="<?= base_url() ?>assets/img/icon/cewek.png" width="60" height="60" class="rounded-circle">
											<?php } else { ?>
													<img src="<?= base_url() ?>assets/img/navbar/dp.png" class="dpanak rounded-circle">
												<?php } 
											}?>
										</div>
										<div class="col-5 col-md-4 name_id">
											<p class="text_bold"><?= $children[$i]->full_name ?></p>
											<p class="label" style="margin-bottom: 10%;">Student&nbsp;<?php if( $children[$i]->grade != null){ echo $children[$i]->grade; }?></p>
										</div>
										<div class="col-4 col-md-6 mt-3">
											<p class="view_detail_summary" id="view_detail_summary<?=$i?>" onclick="view_detail_summary(<?=$i?>)">View Summary&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p>
											<p class="view_less_summary" id="view_less_summary<?=$i?>" onclick="view_less_detail_summary(<?=$i?>)">View Summary&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
										</div>
									</div>
									<div class="row mb-3 summary" id="summary<?=$i?>">
										<div class="col-md-12">
											Current Class
										</div>
										<div class="row" style="padding-left:20px;">
											<?php
											if(!empty ($children_class_arr)){
												foreach($children_class_arr as $cca){
													foreach($cca as $res){
														if($res->participant_id == $children[$i]->user_id){
											?>
											
												<!-- <div class="card col-md-3 col-3 text-center" style="margin:5px;padding:15px 0px 0px 10px;">
													<a href="<?=base_url()?>classes/details/<?=$res->class_id?>/1/<?=$children[$i]->user_id?>">
														<img src="<?= base_url()?>assets/img/icon/class.png" class="img-fluid" alt="Responsive image" style="width:50px;height:50px;margin:auto;">
														<p style="margin-top:10px;"><?=$res->class_name?></p>
													</a>
												</div>-->
												<div class="column_card class_content" class="hide"  style="color:black;margin:0px 20px 40px 10px;">
													<a href="<?=base_url()?>classes/details/<?=$res->class_id?>/1/<?=$children[$i]->user_id?>">
														<div id="outline_hover" class="card border border-5" style="width: 250px; height: 150px;cursor: pointer;padding-top:20px;">

																<div class="row">
																	<img src="<?= base_url()?>assets/img/icon/class.png" class="img-fluid" alt="Responsive image" style="width:50px;height:50px;margin:auto;" >
																</div>
																
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-12">
																			<p class="isi3">
																				<?php if(strlen($res->class_name)>25){
																					$result = substr($res->class_name, 0, 17);
																					echo $result." ...";
																				}else{
																					echo $res->class_name;
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
											}
											?>
										</div>
									</div>
									<div class="row mb-3 summary2" id="summary2<?=$i?>">
										<div class="col-md-4">
											Current Achievement
										</div>
										<div class="col-md-4">
											
										</div>
									</div>
									<div class="row mb-3 summary3" id="summary3<?=$i?>">
										<div class="col-md-12">
											STRENGTH
										</div>
										<div class="row" style="padding-left:20px;">
											<?php if($strength_student != null ){
												
												foreach($strength_student as $ss){ 
												if($children[$i]->user_id == $ss->user_id){?>
												<div class="column_card class_content" class="hide" data-filter-type="<?= $ss->strength_student_id ?>" style="color:black;margin:0px 20px 40px 10px;">
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
												}
												}?>
										</div>
									</div>
						<?php 	}
							}
						}//End of Parent View
						else if($user_detail->user_type_id == 3){ //Child View?>
							<div class="text_judul row mb-3" id="">
								<div class="col-md-4">
									Current Achievement
								</div>
								<div class="col-md-4">
									
								</div>
							</div>
						<?php } //End Of Child View?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="div_report">
		Report
	</div>
	<div id="div_wallet">
		<div class="row mt-2">
			<?php if($user_detail->user_type_id == 3){ ?>
			<div class="col-md-11 col-11">
				<p>Coin History</p>
			</div>
			<?php } else if($user_detail->user_type_id == 2){ ?>
			<div class="col-md-6 col-6">
				<p>Coin History</p>
			</div>
			<div class="col-md-5 col-5">
				<p><input type="text" placeholder="Search" id="children_search" style="width:70%;border:none;border-bottom: 1px solid grey;"><i class="fa fa-search"></i></p>
			</div>
			<?php }  ?>
		</div>
		<?php if($user_detail->user_type_id == 3){ ?>
		<div class="row mt-2">
			<div class="col-md-11 col-11">
				<table id="user_points_history" class="table table-bordered table-responsive-md">
					<thead>
						<tr>
							<th class="text15 text_bold">Date/Time</th>
							<th class="text15 text_bold">Purchase</th>
							<th class="text15 text_bold">Price</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(! empty ($user_history)){
								foreach($user_history as $res){ ?>
									<tr id="<?= $res->user_points_history_id; ?>">
										<td class="text15 text_light"><?= $res->date ?><br><?= $res->time ?> WIB</td>
										<td class="text15 text_light"><?=$res->class_name?> by <?=$res->full_name?><br><?=$res->grade_name?>,<?=$res->term_name?>-<?=$res->subject_name?></td>
										<td class="text15 text_light"><?=$res->points?></td>
									</tr>
						<?php }
							} ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php } else if($user_detail->user_type_id == 2) {
			if($children != null){
				for($i = 0; $i < count($children); $i++) { ?>
					<div class="row mb-3 children_hist_content">
						<div class="col-3 col-md-2">
							<?php if($children[$i]->user_image != null){ ?>
									<img src="<?= base_url() ?>assets/img/uploads/user/<?= $children[$i]->user_image ?>" width="90" height="90" class="rounded-circle">
							<?php }else{ 
								if($children[$i]->gender == "Male"){?>
									<img src="<?= base_url() ?>assets/img/icon/laki.png" width="90" height="90" class="rounded-circle">
							<?php } else if($children[$i]->gender == "Female"){?>
									<img src="<?= base_url() ?>assets/img/icon/cewek.png" width="90" height="90" class="rounded-circle">
							<?php } else { ?>
									<img src="<?= base_url() ?>assets/img/navbar/dp.png" width="90" height="90" class="rounded-circle">
								<?php } 
							}?>
						</div>
						<div class="col-4 col-md-3 name_id">
							<p class="text_bold"><?= $children[$i]->full_name ?></p>
							<p class="label">Student&nbsp;<?php if( $children[$i]->grade != null){ echo $children[$i]->grade; }?></p>
						</div>
						<div class="col-4 col-md-6 mt-3">
							<p class="view_detail_history" id="view_detail_history<?=$i?>" onclick="view_detail_history(<?=$i?>)">View Summary&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahbawah.png" class="img-fluid" alt="Responsive image"></p>
							<p class="view_less_history" id="view_less_history<?=$i?>" onclick="view_less_history(<?=$i?>)">View Summary&nbsp;&nbsp;<img src="<?= base_url() ?>assets/img/icon/panahatas.png" class="img-fluid" alt="Responsive image"></p>
						</div>
					</div>
					<div class="row mb-3 summary" id="history<?=$i?>">
						<div class="col-md-12">
							Current Class 
						</div>
						<div class="row" style="padding-left:20px;">
							<div class="col-md-11 col-11">
								<table id="user_points_history<?=$i?>" class="table table-bordered table-responsive-md">
									<thead>
										<tr>
											<th class="text15 text_bold">Date/Time</th>
											<th class="text15 text_bold">Purchase</th>
											<th class="text15 text_bold">Price</th>
										</tr>
									</thead>
									<tbody>
										<?php
											if(! empty ($user_history_all)){
												foreach($user_history_all as $res){ 
													if($res->user_id == $children[$i]->user_id){?>
														<tr id="<?= $res->user_points_history_id; ?>">
															<td class="text15 text_light"><?= $res->date ?><br><?= $res->time ?> WIB</td>
															<td class="text15 text_light"><?=$res->class_name?> by <?=$res->teacher_name?><br><?=$res->grade_name?>,<?=$res->term_name?>-<?=$res->subject_name?></td>
															<td class="text15 text_light"><?=$res->points?></td>
														</tr>
										<?php 		}
												}
											} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
		<?php 	}
			}
		} ?>
	</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	console.log(<?= json_encode($user_detail) ?>);
	console.log("children");
	console.log(<?= json_encode($children) ?>);
	var children = <?= json_encode($children) ?>;
	console.log("u h a");
	console.log(<?= json_encode($user_history_all) ?>);
</script>
<script src="<?= base_url(); ?>assets/js/profile.js"></script>
</main>
<!--Main layout -->