<!DOCTYPE html>
<html>
<head>
	<!-- Google Tag Manager -->
	<!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-T7TX4GV');</script>-->
	<!-- End Google Tag Manager -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-182157725-1"></script>-->
	<!--<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-182157725-1');
	</script>-->

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/icon/iconwebsite.png" type="image/x-icon"/>
	<title><?php if(!empty($title)){ echo $title;}else{ echo "SUGI";} ?></title>
	<!-- OPEN GRAPH -->
	<meta property="og:image" content="<?php if(!empty($og_img)){ echo "". base_url()."".$og_img."";}else{ echo "". base_url()."assets/img/icon/sugi.png";} ?>">
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<meta property="og:description" content="<?php if(!empty($description)){ echo $description;}else{ echo "Empower Your Passion, Leave Your Plans to Us";} ?>">
	<!--END of OPEN GRAPH -->

<!-- ----------CSS ---------- -->

	<!-- Google Font -->

	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/f8eb04634c.js" crossorigin="anonymous"></script> -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

	<!-- Datetimepicker -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">

	<!-- Bootstrap Select -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap-select.min.css">

	<!-- MDBootstrap Datatables  -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/addons/datatables.min.css">

    <!-- Slick CSS (Scrollable div) -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/slick.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/slick-slider.css">

	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/main.css">

	<!-- JQuery -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.5.1.min.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/js/additional-methods.min.js"></script>

	<!-- Custom JS -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/main.js"></script>

	<!-- Bootstrap tooltips - POPPER.JS -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/popper.min.js"></script>

	<!-- Datetimepicker -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>

	<!-- MDBootstrap Datatables  -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/addons/datatables.min.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/js/ColReorderWithResize.js"></script>

	<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstable.js"></script>

	<!-- Bootstrap -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

	<!-- Bootstrap Select -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/bootstrap-select.min.js"></script>

	<!-- Clipboard JS (Copy to clipboard) -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/clipboard.min.js"></script>

	<!-- Slick JS (Scrollable div) -->
	<script type="text/javascript" src="<?= base_url() ?>assets/js/slick.min.js"></script>
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href='https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap' rel='stylesheet'>
	
</head>