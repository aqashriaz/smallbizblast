  <!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Deal Page</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/vendor-stylesd4d5.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/combined-styles-v3d4d5.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/common-stylesd4d5.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/community_deal_page.css">
  
  <meta property="li:fb_description"        content="I found this great local business deal on SmallBizBlast!" />
  <meta name="description1" content="Have some Fun this Fall with Tomato Gardens!">
<meta property="og:description" content="Have some Fun this Fall with Tomato Gardens!" />


</head>
<body>
    <header id="header" class="">
        <div class="container-fluid">
           <div class="row mt-2">
            <div class="col-lg-3 col-md-3 col-3 ">
              <a href="<?php echo base_url()?><?php echo $communityinfo->slug;?>" title=""><img src="<?php echo base_url()?>assets/images/smallbizblast-logo-main-web.png" alt="smallbizblast.png" class="img_head_logo2"></a>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-6">
            <div class="view-shopsmall hidden-xs1 text-center mt-3 text-black service2">
             <center><p class="pb_particpating2">Service Provided By</p>
              <p class="pb_ogden2"><?php echo $communityinfo->community_name; ?></p></center>
          </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3"> 
        <div class="float-right">
           <a href="<?php echo base_url()?>/Admin/login" type="btn" class="btn">City logIn / Business LogIn</a>
       </div>
   </div>
</div>
</div>
</header>
<!-- /header -->   
<section>
   <div class="container">
       <div class="row mt-2">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <img src="<?php echo base_url()?>assets/images/shop-shed-300.png" alt="logo.png" class="img-fluid rounded" >
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6"></div>
            </div>
            <div class="row mt-2" >
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="box bg-light">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-8 mt-2 card_bobs1">
                               <h5>&nbsp;<?php echo $bussinessinfo->name ?></h5>
                           </div>
                          <?php if($bussinessinfo->website){ ?> 
                           <div class="col-lg-4 col-md-4 col-sm-4 mt-2">
                                
                            <a href="https://<?php echo $bussinessinfo->website;    ?>" target="_blank">
                            <input type="button" name="website" class="btn text-white btn_bob1 form-control" value="Website">
                            </a>
                        </div>
                     <?php }
                     ?>

                    </div>
                    <div class="row">
                     <?php if($bussinessinfo->image){ ?>

                      <div class="col-lg-3 col-md-3 col-sm-3"> 
                       <center> <img src="<?php echo $bussinessinfo->image; ?>" alt="logo" class="img-fluid img-circle" style="width:100%" ></center>
                    </div>

                   <?php } else { ?>

                      <div class="col-lg-3 col-md-3 col-sm-3"> 
                        <center><img src="<?php echo base_url()?>assets/images/businesslogo.jpg" alt="logo" class="img-circle img-fluid" style="width:100%" ></center>
                    </div>

                  <?php }
                  ?>
                    <div class="col-lg-4 col-md-4 col-sm-5 mb-2 body_bob2">
                        <div class="header2">
                        <?php echo $bussinessinfo->phone ?> <br>
                        
                       <?php if($bussinessinfo->hide){
                             echo "";
                            }else{
                                echo $bussinessinfo->address; 
                            }  
                            
                       ?><br>
                       <span><?php echo $communityinfo->community_name;?></span>
                     </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 mt-2" >
                      <?php if($bussinessinfo->facebook){ ?>
                        <a href="<?php echo $bussinessinfo->facebook ?>" title="facebook" ><i class="fa fa-facebook-square icon_social"></i></a>&nbsp;
                     <?php }
                      if($bussinessinfo->instagram){ ?>
                        <a href="<?php echo $bussinessinfo->instagram ?>" title="instagram" ><i class="fa fa-instagram icon_social"></i></a>&nbsp;
                     <?php }
                     if($bussinessinfo->twitter){ ?>
                       <a href="<?php echo $bussinessinfo->twitter ?>" title="twitter" ><i class="fa fa-twitter-square icon_social"></i></a>
                     <?php }
                      ?>
                  </div>
              </div>
          </div>
      </div>
 <div class="col-lg-5 col-md-5 col-sm-6 float-right">

      <?php if($bussinessinfo->covid){ ?>

        <div >
            <p class="card_bobs1">Notice:</p>
            <p class="about_description1">
               <?php echo $bussinessinfo->covid; ?>
            </p>
        </div>

      <?php } 
      ?>
    </div>
</div>

<div class="row table text-white mt-3 ml-1 email_card1">
    <div class=" col-lg-4 col-md-4 col-sm-4">
      <?php if($dealinfo->image){ ?>
     <center><img src="<?php echo $dealinfo->image; ?>" alt="Deal Image" class="img-circle img-fluid" style="width: 90%; margin-top: 10%;"></center>
   <?php } else{ ?>
     <center><img src="<?php echo $dealinfo->business_logo; ?>" alt="Deal Image" class="rounded-circle mt-2 img-fluid" style="width: 90%; margin-top: 10%;" ></center>
   <?php }
     ?>
 </div>
 <div class=" col-lg-7 col-md-7 col-sm-8 mt-3">
    <p class="footer1 "><h4 class="text-white"><?php echo $dealinfo->detail1; ?></h4></p>
    <p class="footer1"><b> Details:</b>&nbsp;&nbsp;<?php echo $dealinfo->detail2; ?></p>
    <p class="footer1"><b>Limitations/Exclusions:</b>&nbsp;&nbsp;<?php echo $dealinfo->limitation; ?></p>
</div>
<div>
      <ul class="nav">
        <li class="mt-4 ml-5 footer1">
            Share This Deal:&nbsp;&nbsp;&nbsp;
        </li>
            <li>
                <a href="https://www.instagram.com/?url=https://smallbizblast.gyzw.cc/index.php/Front/dealpage?id=<?php echo $_GET['id']; ?>" title="" ><i class="fa  fa-instagram font_btn3"></i></a>
            </li>
            <li>
                <a href="mailto:info@smallbizblast?&subject=Small Biz Blast&body=I found this great local business deal on SmallBizBlast!  Here’s the link? https://smallbizblast.gyzw.cc/index.php/Front/dealpage?id=<?php echo $_GET['id']; ?>" title="" ><i class="fa fa-envelope-square font_btn3"></i></a>
            </li>
       
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://smallbizblast.gyzw.cc/index.php/Front/dealpage?id=<?php echo $_GET['id']; ?>" name="description1"><i class="fa fa-facebook-square font_btn3"></i></a>
            </li>
            <li>
                <a href="https://twitter.com/home?status=https://smallbizblast.gyzw.cc/index.php/Front/dealpage?id=<?php echo $_GET['id']; ?>" title=""><i  class="fa fa-twitter-square font_btn3"></i></a>
            </li>

        </ul>

    </div>
</div>
<div class="footer1">
  <?php if($communityinfo->disclaimer_text)
  { ?>
 <p><b>NOTICE</b> from <a href="<?php echo base_url()?><?php echo $communityinfo->slug;?>" class="color2"><?php echo $communityinfo->community_name; ?></a> <?php echo $communityinfo->disclaimer_text; ?></p>
 <?php }
   ?>
   
</div>
<div class="text-white text-center" style="text-align:center;">

    <h5 class="text-white business_deal1">OTHER CURRENT DEALS FROM THIS BIZ:</h5>
    
</div>
<?php 
 
shuffle($deals);

            foreach($deals as $deal)
            {
              ?>

              <div class="table table_box2">
                  <div class="row bg-light m-auto">
                      <div class="col-lg-3 col-md-3 col-sm-3 ">
                <?php if($deal->image){ ?>                        
                          <center><img class="img-circle img-fluid" src="<?php echo $deal->image; ?>" alt="deal" style="width: 90%;"></center>
             <?php } else{ ?>
                          <center><img class="img-circle img-fluid" src="<?php echo $deal->business_logo; ?>" alt="deal" style="width: 90%;"></center>
                        <?php }
                       ?>
                      </div>
                      <div class="col-lg-6 col-md-5 col-sm-5 text-center mt-3 header3">
                          <p><b><?php echo $deal->detail1; ?></b></p>
                      </div>

                      <?php echo anchor('Front/dealpage?id='.$deal->id, ' <div class="col-lg-3 col-md-3 col-sm-3 mt-5">
                          <input type="submit" name="" value="View Deals Details" class="btn text-white blue_color">
                      </div>', 'id="$deal->id"'); ?>
                  </div>
              </div>
               <?php
            }
  ?> 


</div>
</section> 

<footer class="" style="
    position: relative;
    margin-top: 10%;" >
  <div class="container">
  <ul class="navbar navbar-items timer_count2">
      <li>
        <a href="<?php echo base_url() ?>/Front/aboutus_cdp" title="" class="timer_count2">About Small Biz Blast</a>
      </li>
      <li>

        <a href="<?php echo base_url() ?><?php echo  $communityinfo->slug ?>" title="" class="timer_count2">Community Deals Page</a>
      </li>
      <li>
     <?php echo anchor('Front/bus_signup?id='.$communityinfo->id, '<span class="timer_count2"></span> Add My Business', 'id="$communityinfo->id"'); ?>        
      </li>
    </ul>   
  </div>
</footer>
</body>
</html>



<script>
document.getElementById('fb_description').onclick = function() {
  FB.ui({method: 'apprequests',
      message: 'This is a test message for the requests dialog.'
  }, function(data) {
    Log.info('App Requests Response', data);
  });
}
</script>
