   

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
				<div class="container-fluid">
						<div>
							<h5 class="pb_particpating2 text-center"><?php echo $comunity_info->community_name ;?> &nbsp;<span class="pb_ogden2">  <?php echo $comunity_info->state ;?></span> </h5>
						</div>
              <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>
					
					<form action="<?php echo base_url().'Admin/updateData' ?>" method="post" accept-charset="utf-8">
					<input type="hidden" name="id" value="<?php echo $comunity_info->id ?>">
						<input type="hidden" name="adminid" value="<?php echo $admin_info->id ?>">
                   
                       


						<div class="row mt-5">
							<div class="col-lg-3 col-md-3 col-sm-12">
								<div class="row">

									<div class="col-sm-4 header2">
										<label>Admin Name</label>
									</div>
									<div class="col-sm-8">
										<input type="text" name="username" value="<?php echo $admin_info->username ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12">
								<div class="row">

									<div class="col-sm-4 header2">
										<label>Admin Password</label>
									</div>
									<div class="col-sm-8">
										<input type="text" name="password" value="<?php echo $admin_info->password ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12">
								<div class="row">
									
									<div class="col-sm-4 header2">
										<label>Admin Phone</label>
										
									</div>
									<div class="col-sm-8">
										
										<input type="number" name="admin_phone" value="<?php echo $comunity_info->admin_phone ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12">
								<div class="row">
									
									<div class="col-sm-4 header2">
										<label>Admin Email</label>
										
									</div>
									<div class="col-sm-8">
										
										<input type="email" name="email"  value="<?php echo $comunity_info->email ?>"  class="form-control">
									</div>
								</div>
							</div>
						</div>	
						<div class="header2 mt-3">
							<label> Welcome Text:</label>
						<i class="fa fa-question-circle" style="font-size:18px" title="This text goes just above the list of deals on your community’s Small Biz Blast home page.  You can use it to welcome residents, to make it clear that your promotion of the business community is not “vouching” for the participating businesses or for whatever message you’d like to share."  ></i>
						<p id="demo"></p>

						</div>				
						<div>

							<input type="text" name="welcome_text" placeholder="Goes to Page 1(use the text there as default)" class="form-control" value="<?php echo $comunity_info->welcome_text ;?>"  >
						</div>

						<div class="header2 mt-1">

							<label>Disclaimer Text :</label>
						<i class="fa fa-question-circle" style="font-size:18px" title="This text show up on the individual “Deal Details” page and gives your community the chance to make it clear that residents should conduct their own due diligence and not take the posting of any particular deal as a municipal endorsement"></i>
						</div>
						<div>

							<input type="text" name="disclaimer_text" class="form-control" placeholder="Goes to Page 2"  value="<?php echo $comunity_info->disclaimer_text ;?>">
						</div>
						<div class="header2 mt-1">
							<label>Administrative Notice:</label>
						<i class="fa fa-question-circle" style="font-size:18px" title="This text appears in the business admin portal, so each business will see this message.  You can use it to tell businesses they can only post so many deals or to make the businesses aware of anything else you like"></i>
						</div>
						<div>
							<input type="text" name="administrative_notice" value="<?php echo $comunity_info->administrative_notice ;?>" class="form-control">
						</div>
						<div class="header2 mt-1">
							<label>Eligibility Text:</label>
						<i class="fa fa-question-circle" style="font-size:18px" title="This text describes the eligibility criteria that a business would read when they click on the “Add My Business” link on your community deals page.  You may require the business have an active business license, have annual revenues of less than a certain amount, must have a physical storefront, be a retail business, etc.  You decide which businesses are eligible for this program." ></i>
						</div>

						<div>
							<input type="text" name="eligibility_text" class="form-control" value="<?php echo $comunity_info->eligibility_text ;?>">
						</div>

						 
                         <br>
                           <h4>Social Media</h4>
                          <br>
						<div class="header2 mt-1">
							<label>Facebook</label>
						<!-- <i class="fa fa-question-circle" style="font-size:18px" > </i>-->
						</div>
						
						<div>
							<input type="text" name="facebook" class="form-control" value="<?php echo $comunity_info->facebook ;?>">
						</div>

						<div class="header2 mt-1">
							<label>Instagram</label>
						<!-- <i class="fa fa-question-circle" style="font-size:18px" > </i>-->
						</div>
						
						<div>
							<input type="text" name="instagram" class="form-control" value="<?php echo $comunity_info->instagram ;?>">
						</div>


						<div class="header2 mt-1">
							<label>Twitter</label>
						<!-- <i class="fa fa-question-circle" style="font-size:18px" > </i>-->
						</div>
						
						<div>
							<input type="text" name="twitter" class="form-control" value="<?php echo $comunity_info->twitter ;?>">
						</div>




						<div class="header2 mt-3">
							<input type="submit" class="btn text-white blue_color2 mt-1" name="" value="Save Changes/Update">

							<input type="submit" class="btn btn-danger mt-1" name="cancel" value="Cancel/Revert To Previous">

						</div>
					</form>
				</div>
			</div>
	
	</body>
	</html>


 
