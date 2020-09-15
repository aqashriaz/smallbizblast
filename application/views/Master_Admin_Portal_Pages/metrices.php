  
		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			 <div class="container-fluid" >
			 	<div>
              	<h5 class="pb_particpating2 text-center">DISPLAYED FOR ALL <span class="pb_ogden2">CCC ACCOUNTS </span>AND THEIR <span class="pb_ogden2">PARTICIPATING BUSINESS</span></h5>
				</div>
				<section>
			<div class="totalemail">
					<label class="header2"><b>Total Email Sign-Ups:</b>  <span class="pb_ogden3"> </span></label>
				</div>
				<div class="row ">
					<div class="col-sm-6">
						<div class="">
	<table  class="table9" name="Email_signUp">
		 
			<tr>
				<td style="color: red">Please Select Date Range   </td>
				<td width="50%"> </td>
				<!-- <td width="60%"><?=(($row->status==0)?'Pending':(($row->status==1)?'Active':'Rejected'))?> </td> -->
			</tr>
			
							 
	</table>
					</div>
				</div>
					<div class="col-sm-6 ab_sg">
					<form action = "<?php echo base_url().'admin/addmatrices' ?>"  method="post">
						<div>
							<label> Date Range</label>

						</div>
						<div class="row">
							
						<div class="col-sm-5">  
							<input type="date" name="startdate" value="<?php echo  $_SESSION['from']; ?>" class="form-control"  required>
						</div>
						<div class="col-sm-1" class="form-control">
						to
						</div>
						<div class="col-sm-5">  
							<input type="date" class="calender form-control"  value="<?php echo  $_SESSION['to']; ?>" name="enddate" required>
						</div>
					</div>
						<div class="mt-2">
							<input type="submit" name="submit" value="submit" class="btn text-white blue_color2 mt-1">
						</div>
						</form>
						</div>
					</div>
				
			</section>
			
		<section class="mt-5" >
				<div class="totalClicked mt-3">


					<div class="">
					<label><b>Total # of Deals Posted :</b>  <span class="pb_ogden3"> </span></label>
					</div> 
					<div class="row">
						<div class="col-md-6">
							<table  class="table9" name="Email_signUp">
	
							 
			<tr>
				<td style="color: red">Please Select Date Range </td>
				<td width="20%"></td>
			</tr>
			
							 

							 
	
	</table>
    					</div>

					</div>


<div>

</div>

				</div>
			</section>
			<section style="margin-top: 150px;">
			<div class="totalPosted mt-3">
				<div class="header2">
						<label><b>Total # of Deals Clicked/Viewed :</b> <span class="pb_ogden3">  </label>
				</div>
				<div class="row">
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
