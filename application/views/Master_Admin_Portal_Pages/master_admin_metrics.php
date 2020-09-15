   <?php error_reporting(E_ALL & ~E_NOTICE); ?>
  
		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			 <div class="container-fluid" >
			 	<div>
              	<h5 class="pb_particpating2 text-center">DISPLAYED FOR ALL <span class="pb_ogden2">CCC ACCOUNTS </span>AND THEIR <span class="pb_ogden2">PARTICIPATING BUSINESS</span></h5>
				</div>
<section  style="">
		<div class="totalemail">
		  <label class="header2"><b>Total Email Sign-Ups:</b>  <span class="pb_ogden3"><?php echo  $totalemails;  ?></span></label>
		</div>
		<div class="row ">
			<div class="col-sm-6">
				<div class="">
						<table  class="table9" name="Email_signUp">
							<?php 
							if ($reg)
						{		 
							foreach($reg as $row)
							{
							?>
								<tr>
									 <!--  <td><?php echo $row['community_name']; ?></td>  -->
								                          
								<td width="40%"><?php echo anchor('admin/emailSignups?id='.$row['community_id'], $row['community_name'] , 'id="$row->community_id"'); ?>   
								 <td width="40%"><?php echo $row['s']; ?></td> 				                 
								 <td width="40%"><?=(($row['status']==0)?'Pending':(($row['status']==1)?'Active':'In Active'))?> </td>   
								</tr>
								
							 <?php
							}
						}
						else{ ?>
								<tr>
								<td colspan="6">
									<div class="alert alert-primary" role="alert">
									No Record Found. !
									</div>
								</td> 
								</tr>
								<?php
								}						 

							?> 
						</table>
				
					</div>
				</div>
		<div class="col-sm-6 ab_sg">
				<form action = "<?php echo base_url().'admin/addmatrices' ?>"  method="post">
						<div>
							<?php if($from) {?>
								<h5> Showing Result</h5>                        
							 <p><?php  echo $from; ?>  <strong>to</strong>   <?php echo $to; ?> </p>
							<?php }
							 ?><br>
							 <label>Date Range</label>					
						</div>

						<div class="row">
							<div class="col-sm-5">  
							<input type="date" name="startdate" class="form-control">
							</div>
							<div class="col-sm-1" class="form-control">
							to
							</div>
							<div class="col-sm-5">  
							<input type="date" class="calender form-control" name="enddate" required>
							</div>
				    	</div>
						<div class="mt-2">
							<input type="submit" name="submit" value="submit" class="btn text-white blue_color2 mt-1" required>
						</div>
						</form>
						</div>
					</div>
</section>
			
		<section class="mt-5" style="height: 180px" >
				<div class="totalClicked mt-3 " >
					<div class="">
					<label><b>Total # of Deals Posted :</b> <span class="pb_ogden3"><?php echo $dealnumber; ?></span> </label>
					</div> 
					<div class="row">
						<div class="col-md-6">
							<table  class="table9" name="Email_signUp">
		                 <?php 
                             if($reg){
		                    foreach($reg as $row)
							{?>
							<tr>

							<td width="40%"><?php echo anchor('admin/business?id='.$row['city_id'], $row['city_name'] , 'id="$row->id"'); ?></td> 
							 
								 <td width="40%"><?php echo $row['num']; ?></td>
							</tr>

							<?php }
                          }
                          else{ ?>
								<tr>
								<td colspan="6">
								<div class="alert alert-primary" role="alert">
								No Record Found. !
								</div>
								</td> 
								</tr>
								<?php
			                    }

		                 ?>			
							 
	                      </table>
    					</div>

					</div>
				<div>

				</div>

				</div>
			</section>

			<section  style="height: 180px">
			<div class="totalPosted mt-3">
				<div class="header2">
						<label><b>Total # of Deals Clicked/Viewed :</b> <span class="pb_ogden3"> <?php echo  $sumClicks; ?></span></label>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="">
	<table  class="table9" name="Email_signUp">
	
							<?php 
							if ($reg)
							{
							foreach($reg as $row)
							{
							?>
								<tr>

							<td width="40%"><?php echo anchor('admin/masterDeals?id='.$row['city_id'], $row['city_name'] , 'id="$row->id"'); ?></td> 
								<!-- <td width="90%"><?php echo $row['city_name']; ?> </td> -->
								 <td width="40%"><?php echo $row['num2']; ?></td> 
 
 								</tr>
			
							 <?php
							}
							}
							else{
							?>
							<tr>
							<td colspan="6">
							<div class="alert alert-primary" role="alert">
							No Record Found. !
							</div>
							</td> 
							</tr>
							<?php
							}

							?> 
	
	</table>
					</div>
				
						
					</div>
				</div>
			</div>
		</section>
			</div>
		</body>
		</html>
