<!--Main layout-->
<main>
<style>
    .profile{
        font-weight: 500;
        font-size: 32px;
        color: #1E3243;
    }
    .div_class{
		background: #FFFFFF;
		border-radius: 16px;
		margin:0;
		padding:32px 36px 32px 36px;
	}
    .full_name{
        font-weight: 500;
        font-size: 24px;
        color: #1E3243;
    }
    .label{
        font-weight: 500;
        font-size: 14px;
        color: #3D6586;
    }
    .content{
        font-weight: 400;
        font-size: 18px;
        color: #1E3243;
    }
    .div_btn_edit_profile{
        justify-content:end;
        align-items:end;
    }
/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
    .div_btn_edit_profile{
        justify-content:end;
    }
}
</style>
<div id="content" class="p-4 p-md-5 pt-3">
    <div class="d-flex justify-content-between align-items-center mt-3">
        <p class="profile">Profile</p>
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
			<?php if ($this->session->flashdata('category_success')) { ?>
                <div class="col-md-12">
				<div class="alert alert-success hide text-center"><p> <?= $this->session->flashdata('category_success') ?></p></div>
                </div>
			<?php } ?>
			<?php if ($this->session->flashdata('category_error')) { ?>
                <div class="col-md-12">
				<div class="alert alert-danger hide text-center"><p> <?= $this->session->flashdata('category_error') ?></p> </div>
                </div>
			<?php } ?>
        </div>
        <div class="row">
			<div class="col-2 col-md-2 text-center p-0">
                <?php if($this->session->userdata('user_image') != NULL) { ?>
                    <img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="100" height="100" class="rounded-circle">
                <?php } else { ?>
                    <img src="<?= base_url() ?>assets/img/navbar/dp.png" width="100" height="100" class="rounded-circle">
                <?php } ?>
			</div>
			<div class="col-10 col-md-7">
                <p class="full_name"><?= $user_detail->full_name ?></p>
                <p class="label m-0">Profile Overview</p>
                <p class="content"><?= $user_detail->short_profile ?></p>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="label m-0">Email</p>
                        <p class="content"><?= $user_detail->email ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="label m-0">Institution</p>
                        <p class="content">
                            <?php if($user_detail->institution_id != NULL) {?>
							<?= $user_detail->institution_name ?>
						    <?php }?>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <p class="label m-0">Phone number</p>
                        <p class="content">+<?= $user_detail->country_code ?>&nbsp;<?= $user_detail->phone_number ?></p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="label m-0">Date of birth</p>
                        <p class="content"><?= $user_detail->date_of_birth ?></p>
                    </div>
                </div>
			</div>
			<div class="col-12 col-md-3 d-flex div_btn_edit_profile">
                <a href="<?= base_url() ?>user/edit_profile"><button type="button">Edit profile</button></a>
			</div>
		</div>
    </div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
	console.log(<?= json_encode($user_detail) ?>);
</script>
<script src="<?= base_url(); ?>assets/js/profile.js"></script>
</main>
<!--Main layout-->