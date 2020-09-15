 
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	<section>
		<div class="container-fluid" >
				<div>
              	<h5 class="pb_particpating2 text-center">DISPLAYED FOR ALL <span class="pb_ogden2">BUSINESS ACCOUNTS </span>AND THEIR <span class="pb_ogden2">PARTICIPATING DEALS</span></h5>
				</div>
				<hr>
			<div>
				<h5 class="header3">TOTAL # OF CURRENT, <span class="pb_ogden3">ACTIVE EMAILS </span>SIGN-UPS <span class="pb_ogden3"><?php echo $totalemails; ?></span> </h5>
			</div>
				<div class="row mt-5">
					<div class="col-sm-6">
						<div class="totalPosted mt-3">
							<div class="header2">
								<label><b>Total # of Deals Posted :</b> <span class="pb_ogden3"> </span> </label>
							</div>
							<table  class="table9" name="Email_signUp">
								<tr>
									<td style="color: red">Please Select Date Range</td>
									<td width="50%"></td>
								</tr>


							</table>
						</div>
					</div>
		<div class="col-sm-6 ab_sg">
			<form action = "<?php echo base_url().'admin/com_matrics' ?>"  method="post">
				<div class="mt-5">
                   <?php if($_SESSION['admin_role'] == 'davemoss')
						{ ?>
                        <input type="hidden" name="comunity_id" value="<?php echo $_GET['id']; ?>">						
						<?php } if($_SESSION['admin_role'] == 'communityadmin'){?>
                        <input type="hidden" name="comunity_id" value="<?php echo $_SESSION['admin_session']; ?>">		


						<?php }

						?>

					<label> Date Range</label>

				</div>
				<div class="row">

					<div class="col-sm-5">  
						<input type="date" name="startdate" value="<?php echo  $_SESSION['cfrom'];?>" class="form-control" required>
					</div>
					<div class="col-sm-1" class="form-control">
						to
					</div>
					<div class="col-sm-5">  
						<input type="date" class="calender form-control"  value="<?php echo  $_SESSION['cto'];?>" name="enddate" required>
					</div>
				</div>
				<div class="mt-2">
					<input type="submit" name="submit" value="submit" class="btn text-white blue_color2 mt-1">
				</div>
			</form>
		</div>
	</div>

<section style="margin-top: 100px;">
	<div class="totalPosted ">
		<div class="header2">
			<label><b>Total # of Deals Clicked/Viewed :</b> <span class="pb_ogden3">  </label>
			</div>
			<div class="row ">
				<div class="col-sm-6">
					<div class="">
						<table  class="table9" name="Email_signUp">


							<tr>
								<td style="color: red">Please Select Date Range</td>
								<td width="50%"></td>
							</tr>


						</table>
					</div>


				</div>
			</div>
		</div>
	</section>
</div>
</body>
</html>

