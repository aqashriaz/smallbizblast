
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="PIXINVENT">
    <title>Small Biz Blast</title>
   <link rel="icon" href="<?php echo base_url()?>/assets/admin/oldapp-assets/images/smallbizblast.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/oldapp-assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/oldapp-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/oldapp-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/oldapp-assets/css/app.min.css">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/oldapp-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/oldapp-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/admin/oldapp-assets/css/pages/login-register.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/admin/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image menu-expanded blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                   <!-- <div class="card-title text-center">
                        <img src="<?php echo base_url()?>assets/admin/app-assets/images/logo/logo.png" alt="branding logo">
                    </div>-->
                    <h4 class="text-center"><img src="<?php echo base_url()?>/assets/admin/oldapp-assets/images/ico/SmallBizBlast.png"  height="100px" width="100px"></h4>

                </div>
                <div class="card-content">
                   <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>LOGIN</span></p>
					                     <div class="card-body">
                        <form class="form-horizontal" action="<?php echo base_url().'index.php/Admin/login' ?>" novalidate method="POST">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" id="user-name" placeholder="Your Username"  value="<?php echo $admin_info->username; ?>" required name="username">
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control" id="user-password" placeholder="Enter Password" required value="<?php echo $admin_info->password; ?>" name="password">
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            <br>
                            <!--
                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">
                                    <fieldset>
                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                        <label for="remember-me"> Remember Me</label>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="#" class="card-link">Forgot Password?</a></div>
                            </div>-->
							<p class="text-danger text-center"><?php echo $this->session->flashdata('error'); ?></p>
                            <button type="submit" class="btn btn-outline-dark btn-block" name="submit"><i class="ft-unlock"></i> Login</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
     </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url()?>assets/admin/app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url()?>assets/admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/admin/app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="<?php echo base_url()?>assets/admin/app-assets/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/admin/app-assets/js/core/app.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/admin/app-assets/js/scripts/customizer.min.js" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url()?>assets/admin/app-assets/js/scripts/forms/form-login-register.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>