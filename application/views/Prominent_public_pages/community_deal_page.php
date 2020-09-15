  <?php error_reporting(E_ALL & ~E_NOTICE); ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo  $info->community_name ?> Deals Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor-stylesd4d5.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/combined-styles-v3d4d5.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common-stylesd4d5.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/community_deal_page.css">
</head>
<body>
<header id="header" class="header2">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12">
				
				<div class="row signin2">
					<div class="nav">
						<span class="header3 mt-1 "> Follow Us:</span>
						<a href="<?php echo $info->facebook; ?>" title="" class="btn">
							<i class="fa fa-facebook-square icon_social"></i>
						</a>
						<a href="<?php echo $info->instagram; ?>" title="" class="btn">
							<i class="fa fa-instagram  icon_social"></i>
						</a>
						<a href="<?php echo $info->youtube; ?>" title="" class="btn">
							<i class="fa fa-twitter-square icon_social"></i>
						</a>
						
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="row signin3">

					<a href="<?php echo base_url()?>/Admin/login" type="btn" class="btn signin1 ">City logIn</a>
					<span class="mt-1">/</span>
					<a href="<?php echo base_url()?>/Admin/login" type="btn" class="btn signin1 ">Business LogIn</a>

				</div>
			</div>
		</div>	
	</div>

</header>
<!-- /header -->
<section>
	<div class="container-fluid bg-light cont_header_2">

		<div class="text-center container">
			<div class="row">
			<div class="col-lg-4 col-md-12 col-sm-12">
					<?php if($info->day_frequency){?>

					<div class="float-left timer9">
					<h6 class="header2">These Local Deals Expire in <br>
						<span class="text-danger" id="demo"></span></h6>	
					</div>
				<?php }
					?>
			</div>
			<div class="col-lg-3 col-md-12 col-sm-12">
			<div class="company1">
				<div>
					
				<span class="header3">Service Provided By:</span><br>
				</div>
				<div>
				<span class="south_ogden1"><?php echo  $info->community_name ?></span> <br>
				</div>
				<div>
				<span class="header3">For its small, local businesses</span>
					
				</div>
			</div>
	
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12">
				<form action="<?php echo base_url()?>/Admin/email_subscription" method="post" accept-charset="utf-8">
<input type="hidden" name="community_name"  value="<?php echo  $info->community_name;  ?>">
				<input type="hidden" name="community_id"  value="<?php echo  $info->id;  ?>">	

				<div class="mt-2 sub_mail">
					<label class="float-left">Receive Local Deals Weekly</label>
					<div class="input-group">
						<input type="email" class=" form-control" name="email" placeholder="Enter Email Address" required>
						<div class="input-group-append">
						<input type="submit" class="btn btn_bob1 text-white" value="Subscribe" name="email_subscription">
						</div>
					</div>
					<a href="<?php echo base_url()?>/Front/privacy_policy" title=""><span class="float-right header2">privacy policy</span> </a>	
				</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-12"></div>
			<div class="col-lg-8 col-md-8 col-12">
				<div class="row">
                   <?php if($sponserimg->image){ ?>  
                      <div class="col-sm-3">
							<div class="supported_img1">
								<span class="header2">Supported by: </span>
								<img src="<?php echo $sponserimg->image;?>" alt="sponser logo" width="180px" height="180px" class="img-fluid img-rounded">
							</div>
					</div>
					<?php } else {?>
                      <div class="col-sm-3" style=>
							<div class="supported_img1">
								<img src="<?php echo base_url()?>assets/images/bg123.jpg" alt="businesslogo" class="img-fluid sb_logo5">
							</div>
                      </div>
					<?php }

					 ?>					
                      <div class="col-lg-5 col-md-5 col-sm-6">
						<div class="mainlogo6">	
							<a href="#" title="">
								<center><img src="<?php echo base_url()?>assets/images/smallbizblast-logo-main-web.png" class="img-rounded" width="180px" height="180px"></center>
							</a>
						</div>
					</div>
					<?php if($sponserimg->image1){ ?>  

                       <div class="col-sm-3">
							<div class="supported_img1">
								<div class="supported_img1">
								<span class="header2">Supported by: </span>
								<img src="<?php echo $sponserimg->image1;?>" alt="sponser logo" width="180px" height="180px" class="img-fluid img-rounded">
							</div>
							</div>
					</div>

					<?php } else {?>
 						 <div class="col-sm-3">
							<div class="supported_img1" >
								<img src="<?php echo base_url()?>assets/images/bg123.jpg" alt="businesslogo" class="img-fluid sb_logo5">
							</div>
                      </div>

					<?php } ?>

</div>
			
				<div class="mt-1 ">
					<p class="about_description1" align="justify">
						<?php echo $info->welcome_text; ?> <br>
						<!-- <br><b>NOTE:</b>
						Any adjustments made by our businesses in response to the physical distances requirements due to conid -19(cornoa virus) will be found in red test throughout the website.

					</p> -->
				</div>
				<div class="mt-2 about_description1">
					<div class="business_deal1">
						<h5 class="text-white">
						These local, small business deals are good through <?php  
						if($info->day_frequency) {
							$date=$info->day_frequency;
							$newDate = date("l jS \of F", strtotime($date)); 
							echo $newDate;
						}else{
						echo "---";
						}
?> </h5>
					</div>
					<?php
                      
                      shuffle($dealinfo);
              

					foreach($dealinfo as $row)
                      {
                     ?> 
               
                <div class="bg-light mt-2 table">
					<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3">
                                  <?php if($row->image){ ?>
                          <center><img class="rounded-circle img-fluid" src="<?php echo $row->image; ?>" alt="deal" style="width: 80%;"></center>
                                <?php } else { ?>
                                   <center><img src="<?php echo $row->business_logo; ?>" alt="Smallbizblast" class="rounded-circle main_logo_center1"></center>
                               <?php }
                                   ?>
						</div>
							<div class="col-lg-5 col-md-4 col-sm-6 mt-2">
								<div class="mt-5"><center><span class="header3 "><b><?php echo $row->detail1; ?></b></span></center>
									</div>
							</div>
							<div class="col-lg-3 col-md-4 col-sm-3 text-center mt-2">
							<div class="">
								<p class="header2"><b><?php echo $row->business_name; ?></b></p>
 								<?php echo anchor('Front/dealpage?id='.$row->id, '<input type="submit" name="view_deal_details" value="View Deals Details" class="btn text-white mt-2 btn_design1" onclick="clickCounter()" >', 'id="$dealinfo->id  "'); ?> 
							</div>
						</div>
							
						</div>
				</div>
					 <?php
              }
        
           ?>
			  </div>
					
				</div>	
				
		</div>
	</div>
</div>
</section>
 <footer>
	<div class="container">
		<ul class="navbar navbar-items timer_count2">
			<li>
				<a href="<?php echo base_url() ?>/Front/aboutus_cdp" title="" class="timer_count2">About Small Biz Blast</a>
			</li>
			<li>

				<a href="<?php echo base_url() ?><?php echo  $info->slug ?>" title="" class="timer_count2">Community Deals Page</a>
			</li>
			<li> 
                       

                 <?php echo anchor('Front/bus_signup?id='.$info->id, '<span class="timer_count2"></span> Add My Business', 'id="$info->id"'); ?>

				<!-- <a href="<?php echo base_url() ?>/Front/bus_signup" title="" class="timer_count2">Add My Business</a> -->
			</li>
			<!-- <li>
				<a href="<?php echo base_url() ?>/Front/contact_us" title="" class="timer_count2">Pricing</a>
			</li>
 -->
		</ul>     
		
	</div>
</footer>
</body>
</html>

<!-- <script>
function clickCounter() {
  if (typeof(Storage) !== "undefined") {
    if (localStorage.clickcount) {
      localStorage.clickcount = Number(localStorage.clickcount)+1;
    } else {
      localStorage.clickcount = 1;
    }
    document.getElementById("result").innerHTML = localStorage.clickcount ;
  } else {
    document.getElementById("result").innerHTML = "0";
  }
}
</script> -->




<?php 
$b = $info->day_frequency;
 date_default_timezone_set('America/Los_Angeles'); 

//echo $b;


$rightnow = date('Y-m-d');
//echo $rightnow;
$add7days = date('Y-m-d', strtotime('+7 days'));
//echo "$add7days";
?>


<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $b; ?>").getTime();

var countDownDate1 = new Date("<?php echo $add7days; ?>").getTime();


// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  var distance1 = countDownDate1 - now;

    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    

 var days1 = Math.floor(distance1 / (1000 * 60 * 60 * 24));
  var hours1 = Math.floor((distance1 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes1 = Math.floor((distance1 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds1 = Math.floor((distance1 % (1000 * 60)) / 1000);


  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "days " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    
   document.getElementById("demo").innerHTML = days1 + "days " + hours1 + "h "
  + minutes1 + "m " + seconds1 + "s ";
  }
}, 1000);
</script>
