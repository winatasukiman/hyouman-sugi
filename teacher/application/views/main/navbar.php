<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
<style>
  .hidden{ 
    display:none; 
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
  }

  #content {
    max-width: 100vw;
    padding: 0;
    min-height: 100vh;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
    margin-left:250px;
  }
  
  .navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    -webkit-box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
  }

  .navbar-btn {
      -webkit-box-shadow: none;
      box-shadow: none;
      outline: none !important;
      border: none;
  }

  .wrapper {
      width: 100%;
  }

  /* a{
    color:#1E3243 !important;
  }

  a:hover {
    background: #D8E0E7;
    border-radius: 8px;
    padding:10px 5px 10px 5px;
  } */

  #sidebar {
      height: 100vh;
      min-width: 250px;
      max-width: 250px;
      background: #FFFFFF;
      -webkit-transition: all 0.3s;
      -o-transition: all 0.3s;
      transition: all 0.3s;
      position: fixed;
      margin-left: -250px;
  }

  #sidebar .h6 {
      color: #fff;
  }

  #sidebar.active{
      margin-left: 0px;
  }

  #sidebar.active .custom-menu {
      margin-right: -50px;
  }

  .list_menu_sidebar li{
    padding:10px 14px;
  }

  .list_menu_sidebar li:hover{
    background: #D8E0E7;
    border-radius: 8px;
  }

  .active_navbar{
    background: #D8E0E7;
    border-radius: 8px;
  }

  @media (max-width: 991.98px) {
      #sidebar {
          margin-left: -250px;
      }

      #sidebar.active {
          margin-left: 0;
      }
      #content {
          margin-left: 0;
      }

      #sidebar .custom-menu {
          margin-right: -60px !important;
          top: 10px !important;
      }
  }

  #sidebar .custom-menu {
      display: inline-block;
      position: absolute;
      top: 20px;
      right: 0;
      margin-right: -70px;
      -webkit-transition: 0.3s;
      -o-transition: 0.3s;
      transition: 0.3s;
  }

  @media (prefers-reduced-motion: reduce) {
      #sidebar .custom-menu {
          -webkit-transition: none;
          -o-transition: none;
          transition: none;
      }
  }

  @media (max-width: 991.98px) {
    #sidebarCollapse span {
        display: none;
    }
  }

  #sidebar .custom-menu .btn {
      width: 40px;
      height: 40px;
      border-radius: 50%;
  }

  #sidebar .custom-menu .btn.btn-primary {
      background: #3D6586;
      border-color: #3D6586;
  }

  #sidebar .custom-menu .btn.btn-primary:hover,
  #sidebar .custom-menu .btn.btn-primary:focus {
      background: #3D6586 !important;
      border-color: #3D6586 !important;
  }
</style>
<div class="wrapper d-flex align-items-stretch">
  <nav id="sidebar" class="active">
      <div class="custom-menu">
          <!-- <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
          </button> -->
          <button type="button" id="openNav" onclick="openNav()" class="hidden btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only" >Toggle Menu</span>
          </button>
      </div>
      <div class="p-3" style="height:100%;">
          <div class="d-flex justify-content-between">
            <a class="navbar-brand mr-auto text-uppercase" href="<?= base_url()?>classes"><img src="<?= base_url(); ?>assets/img/icon/logo_hyouman_sidebar.png" class="logo"></a>
            <a href="javascript:void(0)" id="closeNav" onclick="closeNav()"><i class="fa fa-times" aria-hidden="true"></i></a>
          </div>
          
          <ul class="list-unstyled components mt-3 mb-5 list_menu_sidebar">
              <li class="<?= ($this->router->fetch_class() == "classes")? "active_navbar" : ""; ?>">
                <!-- <a class="d-flex align-items-center  <?= (strpos($_SERVER['PHP_SELF'], 'classes') || strpos($_SERVER['PHP_SELF'], 'classes') == true)? "active_navbar" : ""; ?>" href="<?= base_url() ?>classes/">
                  <img src="<?= base_url() ?>assets/img/icon/icon_class_sidebar.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Classes
                </a> -->
                <a class="d-flex align-items-center  " href="<?= base_url() ?>classes/">
                  <img src="<?= base_url() ?>assets/img/icon/icon_class_sidebar.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Class
                </a>
              </li>
              <li class="mt-3 <?= ($this->router->fetch_class() == "document_converter")? "active_navbar" : ""; ?>">
                <a class="d-flex align-items-center " href="<?= base_url() ?>document_converter/">
                  <img src="<?= base_url() ?>assets/img/icon/icon_document_converter_sidebar.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Document Converter
                </a>
              </li>
          </ul>
          <div class="mb-3" style="position:absolute;bottom:0;">
              <?php if($this->session->userdata('logged_in') == 1) { ?>
                <a href="<?= base_url(); ?>login/logout" class="d-flex align-items-center">
                  <img src="<?= base_url() ?>assets/img/icon/icon_sign_out_sidebar.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Sign out
                </a>
              <?php } else { ?>
                <a class="nav-link" href="<?= base_url(); ?>login/" class="d-flex align-items-center">
                  <img src="<?= base_url() ?>assets/img/icon/icon_sign_out_sidebar.png" style="max-width:100%;height:auto;">&nbsp;&nbsp;Sign in
                </a>
              <?php } ?>
          </div>
      </div>
  </nav>
<script type='text/javascript'>
  (function($) {

  "use strict";

  var fullHeight = function() {

  $('.js-fullheight').css('height', $(window).height());
  $(window).resize(function(){
  $('.js-fullheight').css('height', $(window).height());
  });

  };
  fullHeight();

  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
  });

  })(jQuery);
  const mediaQuery991 = window.matchMedia("(max-width: 991.98px)");
	
	if(mediaQuery991.matches){
		document.getElementById("sidebar").classList.remove("active");
    document.getElementById("openNav").classList.remove("hidden");
	}else{
    document.getElementById("sidebar").classList.add("active");
    document.getElementById("openNav").classList.add("hidden");
  }
  function openNav() {
    document.getElementById("sidebar").classList.add("active");
    document.getElementById("content").style.marginLeft = "250px";
    document.getElementById("openNav").classList.add("hidden");
  }

  function closeNav() {
    document.getElementById("sidebar").classList.remove("active");
    document.getElementById("content").style.marginLeft = "0px";
    document.getElementById("openNav").classList.remove("hidden"); 
  }
</script>