<!--Main layout-->
<main>
<div class="main">
	<div class="sidenav row text-center">
		<div class="col-md-1"></div>
			<a class="col-md-1 col-1 pl-0 pr-0 sn-item active" id="payment"><p style="margin-top:15px;">Payment</p></a>
			<a class="col-md-1 col-1 pl-0 pr-0 sn-item" id="nisn"><p style="margin-top:15px;">NISN</p></a>
			<a class="col-md-1 col-1 pl-0 pr-0 sn-item" id="add_students"><p style="margin-top:15px;">Add Students</p></a>
	</div>
	<div id="div_payment">
		<div class="row div_after_topnav">
			<div class="col-md-11 col-11">
				<table id="user_payment" class="table table-bordered table-responsive-md">
					<thead>
						<tr>
							<th class="text15 text_bold">Check</th>
							<th class="text15 text_bold">User ID</th>
							<th class="text15 text_bold">Parent Name</th>
							<th class="text15 text_bold">Student Name</th>
							<th class="text15 text_bold">Term</th>
							<th class="text15 text_bold">Update</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(! empty ($user_payment)){
								foreach($user_payment as $res){ 
									if($res->user_id_check_1 == null){?>
									<tr id="<?= $res->user_payment_id ?>">
										<td class="text15 text_light"><input id="chk_user_payment_id_1" type="checkbox" name="chk_user_payment_id_1" value="<?=$res->user_payment_id?>" ></td>
										<td class="text15 text_light"><?=$res->user_id?></td>
										<td class="text15 text_light"><?=$res->parent_name?></td>
										<td class="text15 text_light"><?=$res->full_name?></td>
										<td class="text15 text_light"><?=$res->term_name?></td>
										<td class="text15 text_light"><a class="btn update_nisn" id="show_modal_update_payment_1">Update Payment</a></td>
									</tr>
						<?php 		}
								}
							} ?>
					</tbody>
				</table>
				<button class="btn btn-secondary btn_remove_outline btn_outline_blue mt-3 mb-5" type="button" data-toggle="modal" data-target="#modal_update_payment_multiple_1" style="margin:auto;">Edit Multiple</button>
			</div>
		</div>
		<div class="row div_after_topnav">
			<div class="col-md-11 col-11">
				<table id="user_payment_2" class="table table-bordered table-responsive-md">
					<thead>
						<tr>
							<th class="text15 text_bold">Check</th>
							<th class="text15 text_bold">User ID</th>
							<th class="text15 text_bold">Parent Name</th>
							<th class="text15 text_bold">Student Name</th>
							<th class="text15 text_bold">Term</th>
							<th class="text15 text_bold">Payment Date Time</th>
							<th class="text15 text_bold">Update</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(! empty ($user_payment)){
								foreach($user_payment as $res){
									if($res->user_id_check_1 != null){?>
									<tr id="<?= $res->user_payment_id ?>">
										<td class="text15 text_light"><input id="chk_user_payment_id_2" type="checkbox" name="chk_user_payment_id_2" value="<?=$res->user_payment_id?>" ></td>
										<td class="text15 text_light"><?=$res->user_id?></td>
										<td class="text15 text_light"><?=$res->parent_name?></td>
										<td class="text15 text_light"><?=$res->full_name?></td>
										<td class="text15 text_light"><?=$res->term_name?></td>
										<td class="text15 text_light"><?=$res->date_check_1?> - <?=$res->time_check_1?></td>
										<td class="text15 text_light"><a class="btn update_nisn" id="show_modal_update_payment_2">Update Payment</a></td>
									</tr>
						<?php 		}
								}
							} ?>
					</tbody>
				</table>
				<button class="btn btn-secondary btn_remove_outline btn_outline_blue mt-3 mb-5" type="button" data-toggle="modal" data-target="#modal_update_payment_multiple_2" style="margin:auto;">Edit Multiple</button>
			</div>
		</div>
	</div>
	<div id="div_nisn">
		<div class="row div_after_topnav" id="div_user_table">
			<div class="col-md-11 col-11">
				<table id="user_table" class="table table-bordered table-responsive-md">
					<thead>
						<tr>
							<th class="text15 text_bold">User ID</th>
							<th class="text15 text_bold">Full Name</th>
							<th class="text15 text_bold">NISN</th>
							<th class="text15 text_bold">Update NISN</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(! empty ($student)){
								foreach($student as $res){
									if($res->status_payment == 1){?>
									<tr id="<?= $res->user_id ?>">
										<td class="text15 text_light"><?=$res->user_id?></td>
										<td class="text15 text_light"><?=$res->full_name?></td>
										<td class="text15 text_light"><?=$res->nisn?></td>
										<td class="text15 text_light"><a class="btn update_nisn" id="show_modal_update_nisn">Update NISN</a></td>
									</tr>
						<?php		}
								}
							} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div id="div_add_students">
		<div class="row div_after_topnav">
			<div class="col-md-11 col-11">
				<button class="btn btn-secondary btn_remove_outline btn_outline_blue mt-3 mb-5" type="button" data-toggle="modal" data-target="#modal_upload_file_new_students" style="margin:auto;">Upload Batch Student File</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal Update NISN -->
<?= form_open_multipart('', 'id="form_update_nisn"') ?>
<div class="modal fade" id="modal_update_nisn" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body mx-3">
				<div class="p-4">
					<p class="text30 text_bold mb-0">Update NISN Student</p>
				</div>
				<div class="md-form mx-auto text-left px-3up">
					<!-- User ID -->
					<input 
						type="hidden" 
						class="form-control input"
						style="color: black;"  
						id="user_id"
						placeholder="******"
						readonly="true"/>
					<!-- Date & Time -->
					<div class="form-group">
						<p for="nisn" class="control-label label mb-1">
							NISN
						</p>

						<div class="input-group">
							<input type="text" class="form-control input"
								id="nisn_numb"
								name="nisn_numb"
								placeholder="12345678" />
						</div>

						<div class="error" id="div_error_nisn">
							<span id='error_nisn'></span>
						</div>
					</div>
				</div>

				<div class="modal-footer d-flex justify-content-center mt-3">
					<button type="button" class="btn btnbatalhapus" data-dismiss="modal">Close</button>
					<button type="submit" class="btn remove_outline btn_outline_blue text15 text_medium">Save changes</button>
				</div>

			</div>
		</div>
	</div>
</div>
<?= form_close() ?>
<!--/.Modal Update NISN-->
<!--Modal Update Payment 1-->
<?= form_open_multipart('', 'id="form_update_payment_1"') ?>
<div class="modal fade" id="modal_update_payment_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mx-3">
				<div class="p-4">
					<p class="text30 text_bold mb-0">Update Payment</p>
				</div>
				<div class="md-form mx-auto text-left px-3up">
					<!-- USER PAYMENT ID -->
					<input 
						type="hidden" 
						class="form-control input"
						style="color: black;"  
						id="user_payment_id_1"
						name="user_payment_id_1"
						readonly="true"/>
					<!-- Date & Time -->
					<div class="form-group">
						<p for="tourn_date_filter_end" class="control-label label mb-1">
							Date Time Payment
						</p>
						<div class="input-group date" data-provide="datepicker">
							<input 
								type="text" 
								class="form-control input"
								style="padding-left: 12px; color: black;" 
								id="payment_date_time_1"
								name="payment_date_time_1" 
								size="16"
								placeholder="26 March 2021"
								readonly="true"/>
							<div class="input-group-append">
								<span class="input-group-text">
									<img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg"
										style="width:20px;" />
								</span>
							</div>
						</div>
						<div class="error" id="div_error_payment_date_time_1">
							<span id='error_payment_date_time_1'></span>
						</div>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center mt-3">
					<button type="button" class="btn btnbatalhapus" data-dismiss="modal">Close</button>
					<button type="submit" class="btn remove_outline btn_outline_blue text15 text_medium">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close() ?>
<!--/.Modal Update Payment 1-->
<!--Modal Update Payment 2-->
<?= form_open_multipart('', 'id="form_update_payment_2"') ?>
<div class="modal fade" id="modal_update_payment_2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body mx-3">
				<div class="p-4">
					<p class="text30 text_bold mb-0">Update Payment</p>
				</div>
				<div class="md-form mx-auto text-left px-3up">
					<!-- USER PAYMENT ID -->
					<input 
						type="hidden" 
						class="form-control input"
						style="color: black;"  
						id="user_payment_id_2"
						name="user_payment_id_2"
						readonly="true"/>
					<!-- Date & Time -->
					<div class="form-group">
						<div class="input-group date" data-provide="datepicker">
							<input 
								type="text" 
								class="form-control input_datetime input"
								style="padding-left: 12px; color: black;" 
								id="payment_date_time_2"
								name="payment_date_time_2" 
								size="16"
								placeholder="28 March 2021"
								readonly="true"/>
							<div class="input-group-append">
								<span class="input-group-text">
									<img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg"
										style="width:20px;" />
								</span>
							</div>
						</div>
						<div class="error" id="div_error_payment_date_time_2">
							<span id='error_payment_date_time_2'></span>
						</div>
					</div>
				</div>
				<div class="modal-footer d-flex justify-content-center mt-3">
					<button type="button" class="btn btnbatalhapus" data-dismiss="modal">Close</button>
					<button type="submit" class="btn remove_outline btn_outline_blue text15 text_medium">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?= form_close() ?>
<!--/.Modal Update Payment 2-->
<!-- Modal Update Payment Multiple 1-->
<?= form_open_multipart('', 'id="form_update_payment_multiple_1"') ?>
<div class="modal fade" id="modal_update_payment_multiple_1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body mx-3">
				<div class="p-4">
					<p class="text30 text_bold mb-0">Update Payment Multiple</p>
				</div>
				<div class="md-form mx-auto text-left px-3up">
					<!-- Date & Time -->
					<div class="form-group">
						<p for="tourn_date_filter_end" class="control-label label mb-1">
							Tanggal Jam Pembayaran
						</p>

						<div class="input-group date" data-provide="datepicker">

							<input type="text" class="form-control input_datetime input"
								style="padding-left: 12px; color: black;" id="payment_date_time_multiple_1"
								name="payment_date_time_multiple_1" size="16"
								placeholder="20 Desember 2020" />

							<div class="input-group-append">
								<span class="input-group-text">
									<img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg"
										style="width:20px;" />
								</span>
							</div>
						</div>
						<div class="error" id="div_error_payment_date_time_multiple_1">
							<span id='error_payment_date_time_multiple_1'></span>
						</div>
					</div>
				</div>

				<div class="modal-footer d-flex justify-content-center mt-3">
					<button type="button" class="btn btnbatalhapus" data-dismiss="modal">Close</button>
					<button type="submit" class="btn remove_outline btn_outline_blue text15 text_medium">Save changes</button>
				</div>

			</div>
		</div>
	</div>
</div>
<?= form_close() ?>
<!--/.Modal Update Payment Multiple 1-->
<!-- Modal Update Payment Multiple 2-->
<?= form_open_multipart('', 'id="form_update_payment_multiple_2"') ?>
<div class="modal fade" id="modal_update_payment_multiple_2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body mx-3">
				<div class="p-4">
					<p class="text30 text_bold mb-0">Update Payment Multiple</p>
				</div>
				<div class="md-form mx-auto text-left px-3up">
					<!-- Date & Time -->
					<div class="form-group">
						<p for="tourn_date_filter_end" class="control-label label mb-1">
							Tanggal Jam Pembayaran
						</p>

						<div class="input-group date" data-provide="datepicker">

							<input type="text" class="form-control input_datetime input"
								style="padding-left: 12px; color: black;" id="payment_date_time_multiple_2"
								name="payment_date_time_multiple_2" size="16"
								placeholder="22 Desember 2020" />

							<div class="input-group-append">
								<span class="input-group-text">
									<img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg"
										style="width:20px;" />
								</span>
							</div>
						</div>
						<div class="error" id="div_error_payment_date_time_multiple_2">
							<span id='error_payment_date_time_multiple_2'></span>
						</div>
					</div>
				</div>

				<div class="modal-footer d-flex justify-content-center mt-3">
					<button type="button" class="btn btnbatalhapus" data-dismiss="modal">Close</button>
					<button type="submit" class="btn remove_outline btn_outline_blue text15 text_medium">Save changes</button>
				</div>

			</div>
		</div>
	</div>
</div>
<?= form_close() ?>
<!--/.Modal Update Payment Multiple 2-->
<!-- Modal Upload File New Students-->
<div class="modal fade" id="modal_upload_file_new_students" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text30 text_bold mb-0">Upload File Here</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<?= form_open_multipart('user/add_batch_student/', 'id="form_modal_upload_file_new_students" class="dragdrop" method="post" enctype="multipart/form-data"') ?>
				<div class="md-form mx-auto px-3up">
					<div class="form-group">
						<div class="box__input">
							<svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z" /></svg>
							<input type="file" name="files" id="file" class="box__file"/>
							<label for="file"><strong>Choose a file</strong><span class="box__dragndrop"> or drag it here</span>.</label>
						</div>
						<div class="box__uploading">Uploading&hellip;</div>
						<div class="box__success">Done! <a href="#" class="box__restart" role="button">Upload more?</a></div>
						<div class="box__error">Error! <span></span>. <a href="#" class="box__restart" role="button">Try again!</a></div>
					</div>
				</div>
				<?= form_close() ?>						
			</div>
		</div>
	</div>
</div>
<!--/.Modal Upload File New Students-->
<!--/.Modal Update Payment Multiple 2-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
    console.log(<?= json_encode($student) ?>);
</script>
<script src="<?= base_url(); ?>assets/js/admin.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/admin.css">
<script src="<?= base_url(); ?>assets/js/dragdrop.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/dragdrop.css">
</main>
<!--Main layout -->