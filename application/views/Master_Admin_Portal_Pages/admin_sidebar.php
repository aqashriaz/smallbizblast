 <?php error_reporting(E_ALL & ~E_NOTICE); ?>
   
<!doctype html>
<html lang="en">
<head>
	<title>Master Admin Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/admin_pages.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/sidebar_responsive.css">

</head>
<body>
	<div class="wrapper d-flex align-items-stretch ">
		<div id="main">
			<button class="openbtn mt-3 float-left" onclick="openNav()">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</button>  
		</div>
		<nav id="sidebar" class="order-last img rightsidebar1">
			<div class="mt-5">
				<div class="logo">
					<a href="<?php echo base_url()?>/Admin/index" class="navbar-brand box-title2 text-white">
						<center class="ml-5 mt-3">
							<img src="<?php echo base_url()?>assets/images/smallbizblast-logo-main-web.png" height="70" alt="">
							<br>
							SmallBizBlast
						</center>
					</a>
				</div>
				<ul class="list-unstyled components  mt-3 header2 navi">
					<li class="">
						<a href="<?php echo base_url()?>/Admin/index"><span class="fa fa-home mr-3"></span> Home</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>/Admin/addnewcommunity"><span class="fa fa-user mr-3"></span> Add Communities</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>/Admin/infoblast"><span class="fa fa-tasks mr-3"></span> Info Blast</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>/Admin/metrics"><span class="fa fa-cogs mr-3"></span> Metrics</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>/Admin/sponsor"><span class="fa fa-paper-plane mr-3"></span> Sponsors</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>/Admin/setting"><span class="fa fa-cog mr-3"></span>Setting</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>/Admin/contactus"><span class="fa fa-cog mr-3"></span>Contact Us</a>
					</li>
					<li>
						<a href="<?php echo base_url()?>/Admin/logout"><span class="fa fa-user mr-3"></span> Logout</a>
					</li>
				</ul>
			</div>
		</nav>

		<div id="mySidebar" class="sidebar1">
			<a href="<?php echo base_url()?>/Admin/index" class="navbar-brand box-title2 mt-2 text-white">
				<img src="<?php echo base_url()?>assets/images/smallbizblast-logo-main-web.png" height="70" alt="">
			</a>
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
			<a href="<?php echo base_url()?>/Admin/index"><span class="fa fa-home mt-2"></span> Home</a>
			<a href="<?php echo base_url()?>/Admin/addnewcommunity"><span class="fa fa-user"></span> Add Communities</a>
			<a href="<?php echo base_url()?>/Admin/infoblast"><span class="fa fa-tasks"></span> Info Blast</a>
			<a href="<?php echo base_url()?>/Admin/metrics"><span class="fa fa-cogs"></span> Metrics</a>

			<a href="<?php echo base_url()?>/Admin/sponsor"><span class="fa fa-paper-plane"></span> Sponsors</a>

			<a href="<?php echo base_url()?>/Admin/setting"><span class="fa fa-cog"></span>Setting</a>
			<a href="<?php echo base_url()?>/Admin/contactus"><span class="fa fa-cog "></span>Contact Us</a>
			<a href="<?php echo base_url()?>/Admin/logout"><span class="fa fa-user"></span> Logout</a>
		</div>



		<script>
			function openNav() {
				document.getElementById("mySidebar").style.width = "250px";
				document.getElementById("main").style.marginLeft = "250px";
			}

			function closeNav() {
				document.getElementById("mySidebar").style.width = "0";
				document.getElementById("main").style.marginLeft= "0";
			}
		</script>


