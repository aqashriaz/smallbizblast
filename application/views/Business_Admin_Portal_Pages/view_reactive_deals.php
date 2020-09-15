    <?php error_reporting(E_ALL & ~E_NOTICE); ?>
 
	<!-- Page Content  -->
	
	<?php   
$id	= $_GET['id'];
?>
	
 
	<div id="content" class="p-4 p-md-5 pt-5 container">
		<div class="container-fluid">

				<div class="">
						<h5 class="pb_particpating1 text-center"><span class="pb_ogden1">REACTIVE</span> DEALS</h5>
					</div>
					
			<form action="<?php echo base_url().'admin/updateDeal' ?>" class="form-group" method="post" accept-charset="utf-8">
				<?php 
				if($_SEESION['admin_role'] !='businessadmin'){?>
				<input type="hidden" name="business_id"  value="<?php echo $_GET['id'] ?>">	
				<?php }
				 			 				?>
 				
				<input type="hidden" name="city_id"  value="<?php echo $deal->city_id ?>">
				<input type="hidden" name="image"  value="<?php echo $deal->image ?>">
				<input type="hidden" name="cityname"  value="<?php echo $deal->cityname ?>">
				<input type="hidden" name="business_logo"  value="<?php echo $deal->business_logo ?>">
				<input type="hidden" name="business_name"  value="<?php echo $deal->business_name ?>">

 
				<div class="row mt-5">
					<div class="col-lg-8 col-md-8 col-sm-12">
						<div class="header2">
							<label>Deal Title:</label>
				<input type="text" class="form-control" name="detail1" value="<?php echo $deal->detail1 ?>" readonly>
								</div>
                               

								<div class="header2">
									
									<label>Deal Details:</label>
							<input type="Text" class="form-control" name="detail2" value="<?php echo $deal->detail2 ?>" >
								</div>
							<div class="header2">
									<label>Deal Limitations/Exclusions:</label>
									<input type="Text" class="form-control" name="limitation" value="<?php echo $deal->limitation ?>" >
								</div>
                                 <div class="header2 mt-2">
									<?php if(empty($deal->image)){?>
									<label>Business Logo:</label><br>

									<img src="<?php echo $business_info->image ?>" height="100px">
	

								  <?php } else{ ?>
									<label>Deal Image:</label><br>

									<img src="<?php echo $deal->image ?>" height="100px">
								  <?php }

								   ?>

								</div>

								<?php if($deal->status !=0 ){ ?>
									<div class="header2 mt-5 ">
									<input class="btn btn-primary blue_color2" type="submit" name="" value="Reactive deal">
									
								</div>
								<div class="header2">
									<p>Note:Clicking 'reactive deal' will place this deal in pending status, until the next weekly post day. it will be active for one week</p>
								</div>
								<?php } else{?>

									<div class="header2 mt-5 ">
									    <a href="<?php base_url() ?>/Admin/business_deal_list?id=<?php echo $id; ?>" class="btn btn-primary blue_color2">Back</a>
									
								</div>
								<?php }

								 ?>

								


								
							</div>
					

                  <?php if($comunity_info->administrative_notice){ ?>

					<div class="col-lg-4 col-md-4 col-sm-12">
						<div class="box adminsitrative_notice1">
							<div class="box-title table8 text-white">
								<h5 class="text-white">Administrative Notice:</h5>
								<p><?php echo $comunity_info->administrative_notice; ?></p>
							</div>
						</div>
					</div>

					<?php }?>	

				</div>		
			</form>

		</div>

	</div>
</div>

</body>
</html>

 

