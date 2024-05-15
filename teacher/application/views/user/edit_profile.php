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
    .label{
        font-weight: 500;
        font-size: 14px;
        color: #3D6586;
    }
    .optional{
        font-weight: 500;
        font-size: 12px;
        color: #DC3545;
        margin: 0;
        margin-left: 5px;
    }
    .change_password{
        font-weight: 600;
        font-size: 32px;
        color: #1E3243;
    }
    .create_new_class{
        font-weight: 500;
        font-size: 20px;
        color: #1E3243;
    }
    .create_new_class:hover{
        font-weight: 500;
        font-size: 20px;
        color: #1E3243;
    }
    .wrapperz {
	position: relative;
}
.wrapper .span-left {
	position: absolute;
	left: 10px;
	top: 0px;
	display:flex;
	align-items:center;
	height:100%;
}
.wrapper .span-right {
	position: absolute;
	right: 10px;
	top: 0px;
	display:flex;
	align-items:center;
	height:100%;
}
    .countryCode {
        color: #1E3243 !important;
        font-weight: 500;
        font-size: 16px;
        width:170px;
        height:38px;
        border: 1px solid #BECCD7;
        border-top-left-radius:8px;
        border-top-right-radius:0px;
        border-bottom-right-radius:0px;
        border-bottom-left-radius:8px;
        border-right:0px solid transparent !important;
    }
    .countryCode:hover, .countryCode:focus{
        box-shadow: none;
        border: 2px solid #3D6586 !important;
        color:#1E3243 !important;
        cursor:pointer;
    }
    .phone_number{
        height:39px;
        border: 1px solid #BECCD7;
        border-top-left-radius:0px;
        border-top-right-radius:8px;
        border-bottom-right-radius:8px;
        border-bottom-left-radius:0px;
        border-left:0px solid transparent !important;
    }
    .close_modal{
        border: 2px solid #DC3545;
        border-radius: 8px;
        color: #1E3243;
        padding: 7px 16px;
        cursor: pointer;
        text-align:center;
    }
    .close_modal:hover{
        background-color: #DC3545;
        color: #FFFFFF;
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
/* medium screen - for TABLET 767px or less */
@media screen and (max-width: 767px) {
}
/* small screen - for MOBILE 414px or less  */
@media screen and (max-width: 414px) {
    .countryCode {
        width:100px;
    }
}
</style>
<div id="content" class="p-4 p-md-5 pt-3">
    <div class="d-flex justify-content-between align-items-center mt-3 mb-2">
        <p class="profile">Profile</p>
        <a href="<?= base_url(); ?>user/">
            <?php if($this->session->userdata('user_image') != NULL) { ?>
                <img src="<?= base_url() ?>assets/img/uploads/user/<?= $this->session->userdata('user_image')?>" width="35" height="35" class="rounded-circle">
            <?php } else { ?>
                <img src="<?= base_url() ?>assets/img/navbar/dp.png" width="35" height="35" class="rounded-circle">
            <?php } ?>
        </a>
    </div>
    <p class="d-flex align-items-center mt-3"><a class="create_new_class" href="<?=base_url()?>user"><img src="<?=base_url()?>assets/img/icon/icon_back.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Profile</a></p>
    <div class="div_class mt-3">
        <?= form_open_multipart('user/add_user', 'id="form_user"') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <!-- User Image -->
                        <label class="label">Click Picture to Edit Profile Picture</label>
                        <div class="form-group">
                            <label for="user_input_image" class="">
                                <?php if ($data_array->user_image == null) { ?> 
                                    <img src="<?= base_url() ?>assets/img/navbar/dp.png" id="user_preview_image" name="preview_image" width="35" height="35" class="rounded-circle">
                                <?php } else { ?>
                                    <img src="<?= base_url() ?>assets/img/uploads/user/<?= $data_array->user_image ?>" id="user_preview_image" width="35" height="35" class="rounded-circle">
                                    <input type="hidden" name="old_image" value="<?= $data_array->user_image?>"/>
                                <?php } ?>
                            </label>
                            <input 	
                                type="file" 
                                class="custom-file-input form-control" 
                                style="visibility: hidden;margin-top:-35px;" 
                                id="user_input_image"
                                name="user_input_image" />
                            <div class="text-center error" id="div_error_user_image">
                                <span id='error_user_image'></span>
                            </div>
                        </div>
                        <!--Full Name -->
                        <div class="form-group">
                            <label class="label" for="user_name">Full Name</label>
                            <input 
                                type="text" 
                                class="form-control input" 
                                id="full_name" 
                                name="full_name" 
                                placeholder="Enter Your Full Name" 
                                value="<?= $data_array->full_name ?>"/>
                            <div class="text-center error" id="div_error_full_name" >
                                <span id='error_full_name'></span>
                            </div>
                        </div>
                        <!-- Phone Number -->
                        <div class="form-group mb-3up">
                            <label class="label" for="phone_number">Phone Number (Without +)</label>
                            <div class="input-group">
                                <div style="font-size: 13px;font-weight: 400;">
                                    <?php $ccd = $data_array->country_code;?>
                                    <select class="input-block-level countryCode" id="countryCode" name="countryCode" >
                                        <option data-countryCode="AF" value="93" <?php if($ccd == 93) {echo "selected";}?>>&#x1F1E6&#x1F1EB Afghanistan (+93)</option>
                                        <option data-countryCode="AL" value="355" <?php if($ccd == 355) {echo "selected";}?>>&#x1F1E6&#x1F1FD Albania (+355)</option>
                                        <option data-countryCode="DZ" value="213" <?php if($ccd == 213) {echo "selected";}?>>&#x1F1E9&#x1F1FF Algeria (+213)</option>
                                        <option data-countryCode="AD" value="376" <?php if($ccd == 376) {echo "selected";}?>>&#x1F1E6&#x1F1E9 Andorra (+376)</option>
                                        <option data-countryCode="AO" value="244" <?php if($ccd == 244) {echo "selected";}?>>&#x1F1E6&#x1F1F4 Angola (+244)</option>
                                        <option data-countryCode="AI" value="1264" <?php if($ccd == 1264) {echo "selected";}?>>&#x1F1E6&#x1F1EE Anguilla (+1264)</option>
                                        <option data-countryCode="AG" value="1268" <?php if($ccd == 1268) {echo "selected";}?>>&#x1F1E6&#x1F1EC Antigua &amp; Barbuda (+1268)</option>
                                        <option data-countryCode="AR" value="54" <?php if($ccd == 54) {echo "selected";}?>>&#x1F1E6&#x1F1F7 Argentina (+54)</option>
                                        <option data-countryCode="AM" value="374" <?php if($ccd == 374) {echo "selected";}?>>&#x1F1E6&#x1F1F2 Armenia (+374)</option>
                                        <option data-countryCode="AW" value="297" <?php if($ccd == 297) {echo "selected";}?>>&#x1F1E6&#x1F1FC Aruba (+297)</option>
                                        <option data-countryCode="AC" value="247" <?php if($ccd == 247) {echo "selected";}?>>&#x1F1E6&#x1F1E8 Ascension Island (+247)</option>
                                        <option data-countryCode="AU" value="61" <?php if($ccd == 61) {echo "selected";}?>>&#x1F1E6&#x1F1FA Australia (+61)</option>
                                        <option data-countryCode="AT" value="43" <?php if($ccd == 43) {echo "selected";}?>>&#x1F1E6&#x1F1F9 Austria (+43)</option>
                                        <option data-countryCode="AZ" value="994" <?php if($ccd == 994) {echo "selected";}?>>&#x1F1E6&#x1F1FF Azerbaijan (+994)</option>
                                        <option data-countryCode="BS" value="1242" <?php if($ccd == 1242) {echo "selected";}?>>&#x1F1E7&#x1F1F8 Bahamas (+1242)</option>
                                        <option data-countryCode="BH" value="973" <?php if($ccd == 973) {echo "selected";}?>>&#x1F1E7&#x1F1ED Bahrain (+973)</option>
                                        <option data-countryCode="BD" value="880" <?php if($ccd == 880) {echo "selected";}?>>&#x1F1E7&#x1F1E9 Bangladesh (+880)</option>
                                        <option data-countryCode="BB" value="1246" <?php if($ccd == 1246) {echo "selected";}?>>&#x1F1E7&#x1F1E7 Barbados (+1246)</option>
                                        <option data-countryCode="BY" value="375" <?php if($ccd == 375) {echo "selected";}?>>&#x1F1E7&#x1F1FE Belarus (+375)</option>
                                        <option data-countryCode="BE" value="32" <?php if($ccd == 32) {echo "selected";}?>>&#x1F1E7&#x1F1EA Belgium (+32)</option>
                                        <option data-countryCode="BZ" value="501" <?php if($ccd == 501) {echo "selected";}?>>&#x1F1E7&#x1F1FF Belize (+501)</option>
                                        <option data-countryCode="BJ" value="229" <?php if($ccd == 229) {echo "selected";}?>>&#x1F1E7&#x1F1EF Benin (+229)</option>
                                        <option data-countryCode="BM" value="1441" <?php if($ccd == 1441) {echo "selected";}?>>&#x1F1E7&#x1F1F2 Bermuda (+1441)</option>
                                        <option data-countryCode="BT" value="975" <?php if($ccd == 975) {echo "selected";}?>>&#x1F1E7&#x1F1F9 Bhutan (+975)</option>
                                        <option data-countryCode="BO" value="591" <?php if($ccd == 591) {echo "selected";}?>>&#x1F1E7&#x1F1F4 Bolivia (+591)</option>
                                        <option data-countryCode="BQ" value="599" <?php if($ccd == 599) {echo "selected";}?>>&#x1F1E7&#x1F1F6 Bonaire, Saba and Sint Eustatius (+599)</option>
                                        <option data-countryCode="BA" value="387" <?php if($ccd == 387) {echo "selected";}?>>&#x1F1E7&#x1F1E6 Bosnia Herzegovina (+387)</option>
                                        <option data-countryCode="BW" value="267" <?php if($ccd == 267) {echo "selected";}?>>&#x1F1E7&#x1F1FC Botswana (+267)</option>
                                        <option data-countryCode="BR" value="55" <?php if($ccd == 55) {echo "selected";}?>>&#x1F1E7&#x1F1F7 Brazil (+55)</option>
                                        <option data-countryCode="IO" value="246" <?php if($ccd == 246) {echo "selected";}?>>&#x1F1EE&#x1F1F4 British Indian Ocean Territory (+246)</option>
                                        <option data-countryCode="BN" value="673" <?php if($ccd == 673) {echo "selected";}?>>&#x1F1E7&#x1F1F3 Brunei (+673)</option>
                                        <option data-countryCode="BG" value="359" <?php if($ccd == 359) {echo "selected";}?>>&#x1F1E7&#x1F1EC Bulgaria (+359)</option>
                                        <option data-countryCode="BF" value="226" <?php if($ccd == 226) {echo "selected";}?>>&#x1F1E7&#x1F1EB Burkina Faso (+226)</option>
                                        <option data-countryCode="BI" value="257" <?php if($ccd == 257) {echo "selected";}?>>&#x1F1E7&#x1F1EE Burundi (+257)</option>
                                        <option data-countryCode="KH" value="855" <?php if($ccd == 855) {echo "selected";}?>>&#x1F1F0&#x1F1ED Cambodia (+855)</option>
                                        <option data-countryCode="CM" value="237" <?php if($ccd == 237) {echo "selected";}?>>&#x1F1E8&#x1F1F2 Cameroon (+237)</option>
                                        <option data-countryCode="CA" value="1" <?php if($ccd == 1) {echo "selected";}?>>&#x1F1E8&#x1F1E6 Canada (+1)</option>
                                        <option data-countryCode="CV" value="238" <?php if($ccd == 238) {echo "selected";}?>>&#x1F1E8&#x1F1FB Cape Verde Islands (+238)</option>
                                        <option data-countryCode="KY" value="1345" <?php if($ccd == 1345) {echo "selected";}?>>&#x1F1F0&#x1F1FE Cayman Islands (+1345)</option>
                                        <option data-countryCode="CF" value="236" <?php if($ccd == 236) {echo "selected";}?>>&#x1F1E8&#x1F1EB Central African Republic (+236)</option>
                                        <option data-countryCode="TD" value="235" <?php if($ccd == 235) {echo "selected";}?>>&#x1F1F9&#x1F1E9 Chad (+235)</option>
                                        <option data-countryCode="CL" value="56" <?php if($ccd == 56) {echo "selected";}?>>&#x1F1E8&#x1F1F1 Chile (+56)</option>
                                        <option data-countryCode="CN" value="86" <?php if($ccd == 86) {echo "selected";}?>>&#x1F1E8&#x1F1F3 China (+86)</option>
                                        <option data-countryCode="CO" value="57" <?php if($ccd == 57) {echo "selected";}?>>&#x1F1E8&#x1F1F4 Colombia (+57)</option>
                                        <option data-countryCode="KM" value="269" <?php if($ccd == 269) {echo "selected";}?>>&#x1F1F0&#x1F1F2 Comoros (+269)</option>
                                        <option data-countryCode="CG" value="242" <?php if($ccd == 242) {echo "selected";}?>>&#x1F1E8&#x1F1EC Congo (+242)</option>
                                        <option data-countryCode="CD" value="243" <?php if($ccd == 243) {echo "selected";}?>>&#x1F1E8&#x1F1E9 Congo, Democratic Republic of the (+243)</option>
                                        <option data-countryCode="CK" value="682" <?php if($ccd == 682) {echo "selected";}?>>&#x1F1E8&#x1F1F0 Cook Islands (+682)</option>
                                        <option data-countryCode="CR" value="506" <?php if($ccd == 506) {echo "selected";}?>>&#x1F1E8&#x1F1F7 Costa Rica (+506)</option>
                                        <option data-countryCode="HR" value="385" <?php if($ccd == 385) {echo "selected";}?>>&#x1F1ED&#x1F1F7 Croatia (+385)</option>
                                        <option data-countryCode="CU" value="53" <?php if($ccd == 53) {echo "selected";}?>>&#x1F1E8&#x1F1FA Cuba (+53)</option>
                                        <option data-countryCode="CW" value="5999" <?php if($ccd == 5999) {echo "selected";}?>>&#x1F1E8&#x1F1FC Curaçao (+5999)</option>
                                        <option data-countryCode="CY" value="357" <?php if($ccd == 357) {echo "selected";}?>>&#x1F1E8&#x1F1FE Cyprus (+357)</option>
                                        <option data-countryCode="CZ" value="420" <?php if($ccd == 420) {echo "selected";}?>>&#x1F1E8&#x1F1FF Czech Republic (+420)</option>
                                        <option data-countryCode="DK" value="45" <?php if($ccd == 45) {echo "selected";}?>>&#x1F1E9&#x1F1F0 Denmark (+45)</option>
                                        <option data-countryCode="DJ" value="253" <?php if($ccd == 253) {echo "selected";}?>>&#x1F1E9&#x1F1EF Djibouti (+253)</option>
                                        <option data-countryCode="DM" value="1767" <?php if($ccd == 1767) {echo "selected";}?>>&#x1F1E9&#x1F1F2 Dominica (+1767)</option>
                                        <option data-countryCode="DO" value="1809" <?php if($ccd == 1809) {echo "selected";}?>>&#x1F1E9&#x1F1F4 Dominican Republic (+1809)</option>
                                        <option data-countryCode="TL" value="670" <?php if($ccd == 670) {echo "selected";}?>>&#x1F1F9&#x1F1F1 East Timor (+670)</option>
                                        <option data-countryCode="EC" value="593" <?php if($ccd == 593) {echo "selected";}?>>&#x1F1EA&#x1F1E8 Ecuador (+593)</option>
                                        <option data-countryCode="EG" value="20" <?php if($ccd == 20) {echo "selected";}?>>&#x1F1EA&#x1F1EC Egypt (+20)</option>
                                        <option data-countryCode="SV" value="503" <?php if($ccd == 503) {echo "selected";}?>>&#x1F1F8&#x1F1FB El Salvador (+503)</option>
                                        <option data-countryCode="GQ" value="240" <?php if($ccd == 240) {echo "selected";}?>>&#x1F1EC&#x1F1F6 Equatorial Guinea (+240)</option>
                                        <option data-countryCode="ER" value="291" <?php if($ccd == 291) {echo "selected";}?>>&#x1F1EA&#x1F1F7 Eritrea (+291)</option>
                                        <option data-countryCode="EE" value="372" <?php if($ccd == 372) {echo "selected";}?>>&#x1F1EA&#x1F1EA Estonia (+372)</option>
                                        <option data-countryCode="SZ" value="268" <?php if($ccd == 268) {echo "selected";}?>>&#x1F1F8&#x1F1FF Eswatini (+268)</option>
                                        <option data-countryCode="ET" value="251" <?php if($ccd == 251) {echo "selected";}?>>&#x1F1EA&#x1F1F9 Ethiopia (+251)</option>
                                        <option data-countryCode="FK" value="500" <?php if($ccd == 500) {echo "selected";}?>>&#x1F1EB&#x1F1F0 Falkland Islands (+500)</option>
                                        <option data-countryCode="FO" value="298" <?php if($ccd == 298) {echo "selected";}?>>&#x1F1EB&#x1F1F4 Faroe Islands (+298)</option>
                                        <option data-countryCode="FJ" value="679" <?php if($ccd == 679) {echo "selected";}?>>&#x1F1EB&#x1F1EF Fiji (+679)</option>
                                        <option data-countryCode="FI" value="358" <?php if($ccd == 358) {echo "selected";}?>>&#x1F1EB&#x1F1EE Finland (+358)</option>
                                        <option data-countryCode="FR" value="33" <?php if($ccd == 33) {echo "selected";}?>>&#x1F1EB&#x1F1F7 France (+33)</option>
                                        <option data-countryCode="GF" value="594" <?php if($ccd == 594) {echo "selected";}?>>&#x1F1EC&#x1F1EB French Guiana (+594)</option>
                                        <option data-countryCode="PF" value="689" <?php if($ccd == 689) {echo "selected";}?>>&#x1F1F5&#x1F1EB French Polynesia (+689)</option>
                                        <option data-countryCode="GA" value="241" <?php if($ccd == 241) {echo "selected";}?>>&#x1F1EC&#x1F1E6 Gabon (+241)</option>
                                        <option data-countryCode="GM" value="220" <?php if($ccd == 220) {echo "selected";}?>>&#x1F1EC&#x1F1F2 Gambia (+220)</option>
                                        <option data-countryCode="GE" value="995" <?php if($ccd == 995) {echo "selected";}?>>&#x1F1EC&#x1F1EA Georgia (+995)</option>
                                        <option data-countryCode="DE" value="49" <?php if($ccd == 49) {echo "selected";}?>>&#x1F1E9&#x1F1EA Germany (+49)</option>
                                        <option data-countryCode="GH" value="233" <?php if($ccd == 233) {echo "selected";}?>>&#x1F1EC&#x1F1ED Ghana (+233)</option>
                                        <option data-countryCode="GI" value="350" <?php if($ccd == 350) {echo "selected";}?>>&#x1F1EC&#x1F1EE Gibraltar (+350)</option>
                                        <option data-countryCode="GR" value="30" <?php if($ccd == 30) {echo "selected";}?>>&#x1F1EC&#x1F1F7 Greece (+30)</option>
                                        <option data-countryCode="GL" value="299" <?php if($ccd == 299) {echo "selected";}?>>&#x1F1EC&#x1F1F1 Greenland (+299)</option>
                                        <option data-countryCode="GD" value="1473" <?php if($ccd == 1473) {echo "selected";}?>>&#x1F1EC&#x1F1E9 Grenada (+1473)</option>
                                        <option data-countryCode="GP" value="590" <?php if($ccd == 590) {echo "selected";}?>>&#x1F1EC&#x1F1F5 Guadeloupe (+590)</option>
                                        <option data-countryCode="GU" value="1671" <?php if($ccd == 1671) {echo "selected";}?>>&#x1F1EC&#x1F1FA Guam (+1671)</option>
                                        <option data-countryCode="GT" value="502" <?php if($ccd == 502) {echo "selected";}?>>&#x1F1EC&#x1F1F9 Guatemala (+502)</option>
                                        <option data-countryCode="GN" value="224" <?php if($ccd == 224) {echo "selected";}?>>&#x1F1EC&#x1F1F3 Guinea (+224)</option>
                                        <option data-countryCode="GW" value="245" <?php if($ccd == 245) {echo "selected";}?>>&#x1F1EC&#x1F1FC Guinea - Bissau (+245)</option>
                                        <option data-countryCode="GY" value="592" <?php if($ccd == 592) {echo "selected";}?>>&#x1F1EC&#x1F1FE Guyana (+592)</option>
                                        <option data-countryCode="HT" value="509" <?php if($ccd == 509) {echo "selected";}?>>&#x1F1ED&#x1F1F9 Haiti (+509)</option>
                                        <option data-countryCode="HN" value="504" <?php if($ccd == 504) {echo "selected";}?>>&#x1F1ED&#x1F1F3 Honduras (+504)</option>
                                        <option data-countryCode="HK" value="852" <?php if($ccd == 852) {echo "selected";}?>>&#x1F1ED&#x1F1F0 Hong Kong (+852)</option>
                                        <option data-countryCode="HU" value="36" <?php if($ccd == 36) {echo "selected";}?>>&#x1F1ED&#x1F1FA Hungary (+36)</option>
                                        <option data-countryCode="IS" value="354" <?php if($ccd == 354) {echo "selected";}?>>&#x1F1EE&#x1F1F8 Iceland (+354)</option>
                                        <option data-countryCode="IN" value="91" <?php if($ccd == 91) {echo "selected";}?>>&#x1F1EE&#x1F1F3 India (+91)</option>
                                        <option data-countryCode="ID" value="62" <?php if($ccd == 62) {echo "selected";} ?> >&#x1F1EE&#x1F1E9 Indonesia (+62)</option>
                                        <option data-countryCode="IR" value="98" <?php if($ccd == 98) {echo "selected";}?>>&#x1F1EE&#x1F1F7 Iran (+98)</option>
                                        <option data-countryCode="IQ" value="964" <?php if($ccd == 964) {echo "selected";}?>>&#x1F1EE&#x1F1F6 Iraq (+964)</option>
                                        <option data-countryCode="IE" value="353" <?php if($ccd == 353) {echo "selected";}?>>&#x1F1EE&#x1F1EA Ireland (+353)</option>
                                        <option data-countryCode="IL" value="972" <?php if($ccd == 972) {echo "selected";}?>>&#x1F1EE&#x1F1F1 Israel (+972)</option>
                                        <option data-countryCode="IT" value="39" <?php if($ccd == 39) {echo "selected";}?>>&#x1F1EE&#x1F1F9 Italy (+39)</option>
                                        <option data-countryCode="CI" value="225" <?php if($ccd == 225) {echo "selected";}?>>&#x1F1E8&#x1F1EE Ivory Coast (+225)</option>
                                        <option data-countryCode="JM" value="1876" <?php if($ccd == 1876) {echo "selected";}?>>&#x1F1EF&#x1F1F2 Jamaica (+1876)</option>
                                        <option data-countryCode="JP" value="81" <?php if($ccd == 81) {echo "selected";}?>>&#x1F1EF&#x1F1F5 Japan (+81)</option>
                                        <option data-countryCode="JO" value="962" <?php if($ccd == 962) {echo "selected";}?>>&#x1F1EF&#x1F1F4 Jordan (+962)</option>
                                        <option data-countryCode="KZ" value="7" <?php if($ccd == 7) {echo "selected";}?>>&#x1F1F0&#x1F1FF Kazakhstan (+7)</option>
                                        <option data-countryCode="KE" value="254" <?php if($ccd == 254) {echo "selected";}?>>&#x1F1F0&#x1F1EA Kenya (+254)</option>
                                        <option data-countryCode="KI" value="686" <?php if($ccd == 686) {echo "selected";}?>>&#x1F1F0&#x1F1EE Kiribati (+686)</option>
                                        <option data-countryCode="KP" value="850" <?php if($ccd == 850) {echo "selected";}?>>&#x1F1F0&#x1F1F5 Korea, North (+850)</option>
                                        <option data-countryCode="KR" value="82" <?php if($ccd == 82) {echo "selected";}?>>&#x1F1F0&#x1F1F7 Korea, South (+82)</option>
                                        <option data-countryCode="XK" value="383" <?php if($ccd == 382) {echo "selected";}?>>&#x1F1FD&#x1F1F0 Kosovo (+383)</option>
                                        <option data-countryCode="KW" value="965" <?php if($ccd == 965) {echo "selected";}?>>&#x1F1F0&#x1F1FC Kuwait (+965)</option>
                                        <option data-countryCode="KG" value="996" <?php if($ccd == 996) {echo "selected";}?>>&#x1F1F0&#x1F1EC Kyrgyzstan (+996)</option>
                                        <option data-countryCode="LA" value="856" <?php if($ccd == 856) {echo "selected";}?>>&#x1F1F1&#x1F1E6 Laos (+856)</option>
                                        <option data-countryCode="LV" value="371" <?php if($ccd == 371) {echo "selected";}?>>&#x1F1F1&#x1F1FB Latvia (+371)</option>
                                        <option data-countryCode="LB" value="961" <?php if($ccd == 961) {echo "selected";}?>>&#x1F1F1&#x1F1E7 Lebanon (+961)</option>
                                        <option data-countryCode="LS" value="266" <?php if($ccd == 266) {echo "selected";}?>>&#x1F1F1&#x1F1F8 Lesotho (+266)</option>
                                        <option data-countryCode="LR" value="231" <?php if($ccd == 231) {echo "selected";}?>>&#x1F1F1&#x1F1F7 Liberia (+231)</option>
                                        <option data-countryCode="LY" value="218" <?php if($ccd == 218) {echo "selected";}?>>&#x1F1F1&#x1F1FE Libya (+218)</option>
                                        <option data-countryCode="LI" value="423" <?php if($ccd == 423) {echo "selected";}?>>&#x1F1F1&#x1F1EE Liechtenstein (+423)</option>
                                        <option data-countryCode="LT" value="370" <?php if($ccd == 370) {echo "selected";}?>>&#x1F1F1&#x1F1F9 Lithuania (+370)</option>
                                        <option data-countryCode="LU" value="352" <?php if($ccd == 352) {echo "selected";}?>>&#x1F1F1&#x1F1FA Luxembourg (+352)</option>
                                        <option data-countryCode="MO" value="853" <?php if($ccd == 853) {echo "selected";}?>>&#x1F1F2&#x1F1F4 Macao (+853)</option>
                                        <option data-countryCode="MK" value="389" <?php if($ccd == 389) {echo "selected";}?>>&#x1F1F2&#x1F1F0 Macedonia (+389)</option>
                                        <option data-countryCode="MG" value="261" <?php if($ccd == 261) {echo "selected";}?>>&#x1F1F2&#x1F1EC Madagascar (+261)</option>
                                        <option data-countryCode="MW" value="265" <?php if($ccd == 265) {echo "selected";}?>>&#x1F1F2&#x1F1FC Malawi (+265)</option>
                                        <option data-countryCode="MY" value="60" <?php if($ccd == 60) {echo "selected";}?>>&#x1F1F2&#x1F1FE Malaysia (+60)</option>
                                        <option data-countryCode="MV" value="960" <?php if($ccd == 960) {echo "selected";}?>>&#x1F1F2&#x1F1FB Maldives (+960)</option>
                                        <option data-countryCode="ML" value="223" <?php if($ccd == 22) {echo "selected";}?>>&#x1F1F2&#x1F1F1 Mali (+223)</option>
                                        <option data-countryCode="MT" value="356" <?php if($ccd == 356) {echo "selected";}?>>&#x1F1F2&#x1F1F9 Malta (+356)</option>
                                        <option d9ata-countryCode="MH" value="692" <?php if($ccd == 692) {echo "selected";}?>>&#x1F1F2&#x1F1ED Marshall Islands (+692)</option>
                                        <option data-countryCode="MQ" value="596" <?php if($ccd == 596) {echo "selected";}?>>&#x1F1F2&#x1F1F6 Martinique (+596)</option>
                                        <option data-countryCode="MR" value="222" <?php if($ccd == 222) {echo "selected";}?>>&#x1F1F2&#x1F1F7 Mauritania (+222)</option>
                                        <option data-countryCode="MU" value="230" <?php if($ccd == 230) {echo "selected";}?>>&#x1F1F2&#x1F1FA Mauritius (+230)</option>
                                        <option data-countryCode="YT" value="262" <?php if($ccd == 262) {echo "selected";}?>>&#x1F1FE&#x1F1F9 Mayotte (+262)</option>
                                        <option data-countryCode="MX" value="52" <?php if($ccd == 52) {echo "selected";}?>>&#x1F1F2&#x1F1FD Mexico (+52)</option>
                                        <option data-countryCode="FM" value="691" <?php if($ccd == 691) {echo "selected";}?>>&#x1F1EB&#x1F1F2 Micronesia (+691)</option>
                                        <option data-countryCode="MD" value="373" <?php if($ccd == 373) {echo "selected";}?>>&#x1F1F2&#x1F1E9 Moldova (+373)</option>
                                        <option data-countryCode="MC" value="377" <?php if($ccd == 377) {echo "selected";}?>>&#x1F1F2&#x1F1E8 Monaco (+377)</option>
                                        <option data-countryCode="MN" value="976" <?php if($ccd == 976) {echo "selected";}?>>&#x1F1F2&#x1F1F3 Mongolia (+976)</option>
                                        <option data-countryCode="ME" value="382" <?php if($ccd == 382) {echo "selected";}?>>&#x1F1F2&#x1F1EA Montenegro (+382)</option>
                                        <option data-countryCode="MS" value="1664" <?php if($ccd == 1664) {echo "selected";}?>>&#x1F1F2&#x1F1F8 Montserrat (+1664)</option>
                                        <option data-countryCode="MA" value="212" <?php if($ccd == 212) {echo "selected";}?>>&#x1F1F2&#x1F1E6 Morocco (+212)</option>
                                        <option data-countryCode="MZ" value="258" <?php if($ccd == 258) {echo "selected";}?>>&#x1F1F2&#x1F1FF Mozambique (+258)</option>
                                        <option data-countryCode="MN" value="95" <?php if($ccd == 95) {echo "selected";}?>>&#x1F1F2&#x1F1F2 Myanmar (+95)</option>
                                        <option data-countryCode="NA" value="264" <?php if($ccd == 264) {echo "selected";}?>>&#x1F1F3&#x1F1E6 Namibia (+264)</option>
                                        <option data-countryCode="NR" value="674" <?php if($ccd == 674) {echo "selected";}?>>&#x1F1F3&#x1F1F7 Nauru (+674)</option>
                                        <option data-countryCode="NP" value="977" <?php if($ccd == 977) {echo "selected";}?>>&#x1F1F3&#x1F1F5 Nepal (+977)</option>
                                        <option data-countryCode="NL" value="31" <?php if($ccd == 31) {echo "selected";}?>>&#x1F1F3&#x1F1F1 Netherlands (+31)</option>
                                        <option data-countryCode="NC" value="687" <?php if($ccd == 687) {echo "selected";}?>>&#x1F1F3&#x1F1E8 New Caledonia (+687)</option>
                                        <option data-countryCode="NZ" value="64" <?php if($ccd == 64) {echo "selected";}?>>&#x1F1F3&#x1F1FF New Zealand (+64)</option>
                                        <option data-countryCode="NI" value="505" <?php if($ccd == 505) {echo "selected";}?>>&#x1F1F3&#x1F1EE Nicaragua (+505)</option>
                                        <option data-countryCode="NE" value="227" <?php if($ccd == 227) {echo "selected";}?>>&#x1F1F3&#x1F1EA Niger (+227)</option>
                                        <option data-countryCode="NG" value="234" <?php if($ccd == 234) {echo "selected";}?>>&#x1F1F3&#x1F1EC Nigeria (+234)</option>
                                        <option data-countryCode="NU" value="683" <?php if($ccd == 683) {echo "selected";}?>>&#x1F1F3&#x1F1FA Niue (+683)</option>
                                        <option data-countryCode="NF" value="672" <?php if($ccd == 672) {echo "selected";}?>>&#x1F1F3&#x1F1EB Norfolk Islands (+672)</option>
                                        <option data-countryCode="NP" value="1670" <?php if($ccd == 1670) {echo "selected";}?>>&#x1F1F2&#x1F1F5 Northern Mariana Islands (+1670)</option>
                                        <option data-countryCode="NO" value="47" <?php if($ccd == 47) {echo "selected";}?>>&#x1F1F3&#x1F1F4 Norway (+47)</option>
                                        <option data-countryCode="OM" value="968" <?php if($ccd == 968) {echo "selected";}?>>&#x1F1F4&#x1F1F2 Oman (+968)</option>
                                        <option data-countryCode="PK" value="92" <?php if($ccd == 92) {echo "selected";}?>>&#x1F1F5&#x1F1F0 Pakistan (+92)</option>
                                        <option data-countryCode="PW" value="680" <?php if($ccd == 680) {echo "selected";}?>>&#x1F1F5&#x1F1FC Palau (+680)</option>
                                        <option data-countryCode="PS" value="970" <?php if($ccd == 970) {echo "selected";}?>>&#x1F1F5&#x1F1F8 Palestine (+970)</option>
                                        <option data-countryCode="PA" value="507" <?php if($ccd == 507) {echo "selected";}?>>&#x1F1F5&#x1F1E6 Panama (+507)</option>
                                        <option data-countryCode="PG" value="675" <?php if($ccd == 675) {echo "selected";}?>>&#x1F1F5&#x1F1EC Papua New Guinea (+675)</option>
                                        <option data-countryCode="PY" value="595" <?php if($ccd == 595) {echo "selected";}?>>&#x1F1F5&#x1F1FE Paraguay (+595)</option>
                                        <option data-countryCode="PE" value="51" <?php if($ccd == 51) {echo "selected";}?>>&#x1F1F5&#x1F1EA Peru (+51)</option>
                                        <option data-countryCode="PH" value="63" <?php if($ccd == 63) {echo "selected";}?>>&#x1F1F5&#x1F1ED Philippines (+63)</option>
                                        <option data-countryCode="PL" value="48" <?php if($ccd == 48) {echo "selected";}?>>&#x1F1F5&#x1F1F1 Poland (+48)</option>
                                        <option data-countryCode="PT" value="351" <?php if($ccd == 351) {echo "selected";}?>>&#x1F1F5&#x1F1F9 Portugal (+351)</option>
                                        <option data-countryCode="PR" value="1787" <?php if($ccd == 1787) {echo "selected";}?>>&#x1F1F5&#x1F1F7 Puerto Rico (+1787)</option>
                                        <option data-countryCode="QA" value="974" <?php if($ccd == 974) {echo "selected";}?>>&#x1F1F6&#x1F1E6 Qatar (+974)</option>
                                        <option data-countryCode="RE" value="262" <?php if($ccd == 262) {echo "selected";}?>>&#x1F1F7&#x1F1EA Réunion (+262)</option>
                                        <option data-countryCode="RO" value="40" <?php if($ccd == 40) {echo "selected";}?>>&#x1F1F7&#x1F1F4 Romania (+40)</option>
                                        <option data-countryCode="RU" value="7" <?php if($ccd == 7) {echo "selected";}?>>&#x1F1F7&#x1F1FA Russia (+7)</option>
                                        <option data-countryCode="RW" value="250" <?php if($ccd == 250) {echo "selected";}?>>&#x1F1F7&#x1F1FC Rwanda (+250)</option>
                                        <option data-countryCode="WS" value="685" <?php if($ccd == 685) {echo "selected";}?>>&#x1F1FC&#x1F1F8 Samoa (+685)</option>
                                        <option data-countryCode="SM" value="378" <?php if($ccd == 378) {echo "selected";}?>>&#x1F1F8&#x1F1F2 San Marino (+378)</option>
                                        <option data-countryCode="ST" value="239" <?php if($ccd == 239) {echo "selected";}?>>&#x1F1F8&#x1F1F9 São Tomé &amp; Principe (+239)</option>
                                        <option data-countryCode="SA" value="966" <?php if($ccd == 966) {echo "selected";}?>>&#x1F1F8&#x1F1E6 Saudi Arabia (+966)</option>
                                        <option data-countryCode="SN" value="221" <?php if($ccd == 221) {echo "selected";}?>>&#x1F1F8&#x1F1F3 Senegal (+221)</option>
                                        <option data-countryCode="CS" value="381" <?php if($ccd == 381) {echo "selected";}?>>&#x1F1F7&#x1F1F8 Serbia (+381)</option>
                                        <option data-countryCode="SC" value="248" <?php if($ccd == 248) {echo "selected";}?>>&#x1F1F8&#x1F1E8 Seychelles (+248)</option>
                                        <option data-countryCode="SL" value="232" <?php if($ccd == 232) {echo "selected";}?>>&#x1F1F8&#x1F1F1 Sierra Leone (+232)</option>
                                        <option data-countryCode="SG" value="65" <?php if($ccd == 65) {echo "selected";}?>>&#x1F1F8&#x1F1EC Singapore (+65)</option>
                                        <option data-countryCode="SK" value="421" <?php if($ccd == 421) {echo "selected";}?>>&#x1F1F8&#x1F1F0 Slovakia (+421)</option>
                                        <option data-countryCode="SI" value="386" <?php if($ccd == 386) {echo "selected";}?>>&#x1F1F8&#x1F1EE Slovenia (+386)</option>
                                        <option data-countryCode="SB" value="677" <?php if($ccd == 677) {echo "selected";}?>>&#x1F1F8&#x1F1E7 Solomon Islands (+677)</option>
                                        <option data-countryCode="SO" value="252" <?php if($ccd == 252) {echo "selected";}?>>&#x1F1F8&#x1F1F4 Somalia (+252)</option>
                                        <option data-countryCode="ZA" value="27" <?php if($ccd == 27) {echo "selected";}?>>&#x1F1FF&#x1F1E6 South Africa (+27)</option>
                                        <option data-countryCode="SS" value="211" <?php if($ccd == 211) {echo "selected";}?>>&#x1F1F8&#x1F1F8 South Sudan (+211)</option>
                                        <option data-countryCode="ES" value="34" <?php if($ccd == 34) {echo "selected";}?>>&#x1F1EA&#x1F1F8 Spain (+34)</option>
                                        <option data-countryCode="LK" value="94" <?php if($ccd == 94) {echo "selected";}?>>&#x1F1F1&#x1F1F0 Sri Lanka (+94)</option>
                                        <option data-countryCode="SH" value="290" <?php if($ccd == 290) {echo "selected";}?>>&#x1F1F8&#x1F1ED St. Helena (+290)</option>
                                        <option data-countryCode="KN" value="1869" <?php if($ccd == 1869) {echo "selected";}?>>&#x1F1F0&#x1F1F3 St. Kitts and Nevis (+1869)</option>
                                        <option data-countryCode="SC" value="1758" <?php if($ccd == 1758) {echo "selected";}?>>&#x1F1F1&#x1F1E8 St. Lucia (+1758)</option>
                                        <option data-countryCode="PM" value="508" <?php if($ccd == 508) {echo "selected";}?>>&#x1F1F5&#x1F1F2 St. Pierre and Miquelon (+508)</option>
                                        <option data-countryCode="SD" value="249" <?php if($ccd == 249) {echo "selected";}?>>&#x1F1F8&#x1F1E9 Sudan (+249)</option>
                                        <option data-countryCode="SR" value="597" <?php if($ccd == 597) {echo "selected";}?>>&#x1F1F8&#x1F1F7 Suriname (+597)</option>
                                        <option data-countryCode="SE" value="46" <?php if($ccd == 46) {echo "selected";}?>>&#x1F1F8&#x1F1EA Sweden (+46)</option>
                                        <option data-countryCode="CH" value="41" <?php if($ccd == 41) {echo "selected";}?>>&#x1F1E8&#x1F1ED Switzerland (+41)</option>
                                        <option data-countryCode="SI" value="963" <?php if($ccd == 963) {echo "selected";}?>>&#x1F1F8&#x1F1FE Syria (+963)</option>
                                        <option data-countryCode="TW" value="886" <?php if($ccd == 886) {echo "selected";}?>>&#x1F1F9&#x1F1FC Taiwan (+886)</option>
                                        <option data-countryCode="TJ" value="992" <?php if($ccd == 992) {echo "selected";}?>>&#x1F1F9&#x1F1EF Tajikstan (+992)</option>
                                        <option data-countryCode="TZ" value="255" <?php if($ccd == 255) {echo "selected";}?>>&#x1F1F9&#x1F1FF Tanzania (+255)</option>
                                        <option data-countryCode="TH" value="66" <?php if($ccd == 66) {echo "selected";}?>>&#x1F1F9&#x1F1ED Thailand (+66)</option>
                                        <option data-countryCode="TG" value="228" <?php if($ccd == 228) {echo "selected";}?>>&#x1F1F9&#x1F1EC Togo (+228)</option>
                                        <option data-countryCode="TK" value="690" <?php if($ccd == 690) {echo "selected";}?>>&#x1F1F9&#x1F1F0 Tokelau (+690)</option>
                                        <option data-countryCode="TO" value="676" <?php if($ccd == 676) {echo "selected";}?>>&#x1F1F9&#x1F1F4 Tonga (+676)</option>
                                        <option data-countryCode="TT" value="1868" <?php if($ccd == 1868) {echo "selected";}?>>&#x1F1F9&#x1F1F9 Trinidad &amp; Tobago (+1868)</option>
                                        <option data-countryCode="TN" value="216" <?php if($ccd == 216) {echo "selected";}?>>&#x1F1F9&#x1F1F3 Tunisia (+216)</option>
                                        <option data-countryCode="TR" value="90" <?php if($ccd == 90) {echo "selected";}?>>&#x1F1F9&#x1F1F7 Turkey (+90)</option>
                                        <option data-countryCode="TM" value="993" <?php if($ccd == 993) {echo "selected";}?>>&#x1F1F9&#x1F1F2 Turkmenistan (+993)</option>
                                        <option data-countryCode="TC" value="1649" <?php if($ccd == 1649) {echo "selected";}?>>&#x1F1F9&#x1F1E8 Turks &amp; Caicos Islands (+1649)</option>
                                        <option data-countryCode="TV" value="688" <?php if($ccd == 688) {echo "selected";}?>>&#x1F1F9&#x1F1FB Tuvalu (+688)</option>
                                        <option data-countryCode="UG" value="256" <?php if($ccd == 256) {echo "selected";}?>>&#x1F1FA&#x1F1EC Uganda (+256)</option>
                                        <option data-countryCode="UA" value="380" <?php if($ccd == 380) {echo "selected";}?>>&#x1F1FA&#x1F1E6 Ukraine (+380)</option>
                                        <option data-countryCode="AE" value="971" <?php if($ccd == 971) {echo "selected";}?>>&#x1F1E6&#x1F1EA United Arab Emirates (+971)</option>
                                        <option data-countryCode="GB" value="44" <?php if($ccd == 44) {echo "selected";}?>>&#x1F1EC&#x1F1E7 United Kingdom (+44)</option>
                                        <option data-countryCode="US" value="1" <?php if($ccd == 1) {echo "selected";}?>>&#x1F1FA&#x1F1F8 United States of America (+1)</option>
                                        <option data-countryCode="UY" value="598" <?php if($ccd == 598) {echo "selected";}?>>&#x1F1FA&#x1F1FE Uruguay (+598)</option>
                                        <option data-countryCode="UZ" value="998" <?php if($ccd == 998) {echo "selected";}?>>&#x1F1FA&#x1F1FF Uzbekistan (+998)</option>
                                        <option data-countryCode="VU" value="678" <?php if($ccd == 678) {echo "selected";}?>>&#x1F1FB&#x1F1FA Vanuatu (+678)</option>
                                        <option data-countryCode="VA" value="39" <?php if($ccd == 39) {echo "selected";}?>>&#x1F1FB&#x1F1E6 Vatican City (+39)</option>
                                        <option data-countryCode="VE" value="58" <?php if($ccd == 58) {echo "selected";}?>>&#x1F1FB&#x1F1EA Venezuela (+58)</option>
                                        <option data-countryCode="VN" value="84" <?php if($ccd == 84) {echo "selected";}?>>&#x1F1FB&#x1F1F3 Vietnam (+84)</option>
                                        <option data-countryCode="VG" value="1284" <?php if($ccd == 1284) {echo "selected";}?>>&#x1F1FB&#x1F1EC Virgin Islands - British (+1284)</option>
                                        <option data-countryCode="VI" value="1340" <?php if($ccd == 1340) {echo "selected";}?>>&#x1F1FB&#x1F1EE Virgin Islands - US (+1340)</option>
                                        <option data-countryCode="WF" value="681" <?php if($ccd == 681) {echo "selected";}?>>&#x1F1FC&#x1F1EB Wallis &amp; Futuna (+681)</option>
                                        <option data-countryCode="EH" value="212" <?php if($ccd == 212) {echo "selected";}?>>&#x1F1EA&#x1F1ED Western Sahara (+212)</option>
                                        <option data-countryCode="YE" value="967" <?php if($ccd == 967) {echo "selected";}?>>&#x1F1FE&#x1F1EA Yemen (+967)</option>
                                        <option data-countryCode="ZM" value="260" <?php if($ccd == 260) {echo "selected";}?>>&#x1F1FF&#x1F1F2 Zambia (+260)</option>
                                        <option data-countryCode="ZW" value="263" <?php if($ccd == 263) {echo "selected";}?>>&#x1F1FF&#x1F1FC Zimbabwe (+263)</option>
                                    </select>
                                </div>
                                <input
                                    type="number" 
                                    class="form-control input"
                                    id="phone_number"
                                    class="phone_number" 
                                    name="phone_number" 
                                    placeholder="Enter Your Phone Number" 
                                    value="<?= $data_array->phone_number ?>" />
                            </div>

                            <div class="text-center error" id="div_error_phone_number">
                                <span id='error_phone_number'></span>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="label" for="password">Password</label>
                            <a type="button" 
                                class="btn btn_remove_outline btn_outline_blue text15 text_medium"
                                data-toggle="modal" data-target="#modal_edit_password"
                                style="font-weight:600!important;padding: 8px 16px">Change Password</a>
                        </div>
                        <!-- Email -->
                        <div class="form-group mt-3">
                            <label class="label" for="email">Email</label>
                            <?php if($this->session->userdata('is_verified') == 0) { ?>
                                <span class="badge badge-pill badge-danger" id="email_status">Unverified</span>
                            <?php } else { ?>
                                <span class="badge badge-pill badge-success" id="email_status">Verified</span>
                            <?php } ?>
                            <div class="input-group">
                                <input
                                    type="text" 
                                    class="form-control input"
                                    id="email" 
                                    name="email" 
                                    placeholder="Enter Your Email" 
                                    value="<?= $data_array->email ?>" />
                            </div>
                            <?php if($this->session->userdata('is_verified') == 0) { ?>
                            <div class="mb-3up">
                                <button type="button" class="btn_remove_outline btn_outline_blue text15 text_medium" id="resend_email" name="resend_email">Resend verification email</button>

                                <div class="alert alert-danger alert-dismissible" id="resend_fail" role="alert" style="display:none;">
                                    <strong>Failed!</strong>
                                </div>

                                <div class="alert alert-success alert-dismissible" id="resend_success" role="alert" style="display:none;">
                                    <strong>Sent!</strong>
                                </div>
                            </div>
                            <?php } ?>
                            <input type="hidden" name="email_changed" id="email_changed" value=false />
                            <div class="text-center error" id="div_error_email">
                                <span id='error_email'></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Institution -->
                        <div class="form-group mb-3up">
                            <label class="label" for="instituion">Institution</label>
                            <div class="input-group">
                                <select class="browser-default custom-select input form-control" id="institution" name="institution">
                                    <option disabled selected>Choose Institution</option>
                                    <?php foreach ($data_institution as $res) { ?>
                                        <option
                                            value="<?= $res->institution_id ?>" <?php if($data_array->institution_id == $res->institution_id) echo 'selected="selected"'; ?>>
                                            <?= $res->institution_name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center error" id="div_error_institution">
                                <span id='error_institution'></span>
                            </div>
                        </div>
                        <!-- Date of Birth -->
                        <div class="form-group ">
                        <label class="label" for="date_of_birth">Date of Birth</label>
                            <div class="wrapperz">
                                <?php if ($data_array->date_of_birth == NULL) { ?>
                                <input 
                                    type="text"
                                    class="form-control input_date_of_birth input"
                                    id="date_of_birth" 
                                    name="date_of_birth" 
                                    size="16" 
                                    placeholder="Enter Your Date of Birth"
                                    style="padding-left:32px;"
                                    readonly="true" />
                                <?php } else { ?>
                                <input 
                                    type="text"
                                    class="form-control input_date_of_birth input"
                                    id="date_of_birth" 
                                    name="date_of_birth" 
                                    size="16" 
                                    placeholder="Enter Your Date of Birth" 
                                    style="padding-left:32px;"
                                    value="<?= $data_array->date_of_birth ?>"
                                    readonly="true"/>
                                <?php } ?>
								<span class="span-left"><i class="fa fa-calendar"></i></span>
                                <span class="span-right"><img src="<?=base_url()?>assets/img/icon/icon_arrow_down.png" class="img-fluid"></span>
							</div>
                           
                            <!-- <div class="input-group date" data-provide="datepicker">
                                <?php if ($data_array->date_of_birth == NULL) { ?>
                                <input 
                                    type="text"
                                    class="form-control input_date_of_birth input"
                                    id="date_of_birth" 
                                    name="date_of_birth" 
                                    size="16" 
                                    placeholder="Enter Your Date of Birth"
                                    readonly="true" />
                                <?php } else { ?>
                                <input 
                                    type="text"
                                    class="form-control input_date_of_birth input"
                                    id="date_of_birth" 
                                    name="date_of_birth" 
                                    size="16" 
                                    placeholder="Enter Your Date of Birth" 
                                    value="<?= $data_array->date_of_birth ?>"
                                    readonly="true"/>
                                <?php } ?>
                                <div class="input-group-append text-center">
                                    <span class="input-group-text">
                                        <img src="<?= base_url(); ?>assets/img/icon/iconcalendar.svg" 
                                            style="width:20px;"/>
                                    </span>
                                </div>
                            </div> -->
                            <div class="text-center error" id="div_error_date_of_birth" >
                                <span id='error_date_of_birth'></span>
                            </div>
                        </div>
                        <!-- Short Profile -->
                        <div class="form-group">
                            <label class="label d-flex align-items-center">Profile Overview<p class="optional">*Max. 140 Characters</p></label>
                            <div class="input-group">
                                <textarea 
                                class="form-control input"
                                id="short_profile"
                                name="short_profile" 
                                rows="4"
                                placeholder="Enter Your Short Profile"><?= $data_array->short_profile?></textarea>
                            </div>
                            <div class="text-center error" id="div_error_short_profile">
                                <span id='error_short_profile'></span>
                            </div>
                        </div>
                        <!-- Gender -->
                        <div class="form-group mb-3up">
                            
                                <label class="label" for="custom-control-label label">Gender</label>
                                <div class="input-group">
                                <select class="browser-default custom-select input form-control" id="user_gender" name="user_gender">
                                    <option disabled selected>Choose Gender</option>
                                    <option value="Male" <?php if($data_array->gender == 'Male') echo 'selected="selected"'; ?>>Male
                                    </option>
                                    <option value="Female" <?php if($data_array->gender == 'Female') echo 'selected="selected"'; ?>>female
                                    </option>
                                </select>
                            </div>
                            <div class="text-center error" id="div_error_user_gender">
                                <span id='error_user_gender'></span>
                            </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-md-12 col-12 d-flex align-items-center justify-content-end">
                <p class="m-0">
                    <button 
                        type="submit" 
                        id="save_changes" 
                        name="save_changes">Save Changes</button>
                </p>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
<!-- Modal Edit Password -->
<div class="modal fade" id="modal_edit_password" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<div class="md-form mx-auto text-left px-3up">
                    <p class="change_password">Change Password</p>
					<!-- Password -->
					<div class="form-group">
						<label class="label" for="user_change_password">New Password</label>
						<div class="input-group">
							<input 
								type="password" 
								class="form-control input"
								id="user_change_password"
								name="user_change_password" 
								placeholder="Enter new password"
                                maxlength="6"/>
						</div>

						<div class="text-center error" id="div_error_user_password">
							<span id='error_user_password'></span>
						</div>
					</div>
					<!-- Ulang Password -->
					<div class="form-group">
						<label class="label" for="confirm_password">Confirm Password</label>
						<div class="input-group">
							<input 
								type="password" 
								placeholder="Confirm your password"
								name="confirm_password"
								id="confirm_password" 
								class="form-control input"
                                maxlength="6"/>
						</div>
						
						<div class="text-center error" id="div_error_confirm_password">
						<span id='error_confirm_password'></span>
						</div>
					</div>
                    <div class="row mt-3 d-flex align-items-center" style="padding-top:20px;margin:0;">
                        <div class="col-4 col-md-4 pl-0">
                            <p class="close_modal m-0" data-dismiss="modal">Cancel</p>
                        </div>
                        <div class="col-8 col-md-8 pr-0">
                            <button type="button" class="btn_create_class" id="save_change_password">Save Changes</button>
                        </div>
                    </div>
				</div>

				

			</div>
		</div>
	</div>
</div>
<!--Modal Edit Password-->
<script type="text/javascript">
    var base_url = "<?= base_url() ?>";
</script>
<script src="<?= base_url(); ?>assets/js/edit_profile/edit_profile.js"></script>
<script src="<?= base_url(); ?>assets/js/edit_profile.js"></script>
</main>
<!--Main layout-->