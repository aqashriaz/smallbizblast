<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SmallBizBlast</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor-stylesd4d5.css?1584026454"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/combined-styles-v3d4d5.css?1584026454"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common-stylesd4d5.css?1584026454"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/community_deal_page.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/sidebar_responsive.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/fontawesome.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <div id="responsiveWrapper_main">
      <div id="responsiveWrapper_sub">
        <nav class="j-navigation-wrapper" ></nav>
        <main role="application" class="j-body-wrapper">
          <div class="body-content">
         
            <!-- SBS Header -->
            <div class="global-header">
                    
              <div id="sbo-header">
 <div class="" style="margin-left:88%;">
                  <a class=" header2  " href="<?php echo base_url() ?>/Admin/Login" title="enroll community">Login</a>  
</div>
               <!--<div id="main">
                <button class="openbtn float-right mt-3" onclick="openNav()">
                  <div class="bar1">☰</div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                </button>  
              </div>-->
               
             <div class="sbo-header-inner" >
                <a class="logo shopsmall-icon" href="<?php echo base_url()?><?php echo $community->slug;?>" title="Link to Homepage"><img src="<?php echo base_url()?>assets/images/smallbizblast-logo-main-web.png" alt="smallbizblast">
                </a>          
                 
              </div>

             <!-- <div id="mySidebar" class="sidebar1">
                <a class="logo shopsmall-icon" style="margin-left: 30%" href="<?php echo base_url() ?>/Front/index" title="Link to Homepage"><img src="<?php echo base_url()?>assets/images/smallbizblast-logo-main-web.png" alt="smallbizblast">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a class="link mt-5" href="<?php echo base_url() ?>/Front/aboutus" title="How Does it Work">How Does it Work?</a>
                <a class="link" href="<?php echo base_url() ?>/Front/contact_us" title="pricing">Pricing</a>
                <a class="link" href="<?php echo base_url() ?>/Front/cum_signup" title="enroll community">Enroll Community</a>   
                <a class="" style="margin-top: 120%" href="" title="enroll community">Contact Us</a>    
                <a class="link" href="<?php echo base_url() ?>/Front/cum_signup" title="enroll community">info@smallbizblast.com</a>    
              </div>-->

            </div>
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


