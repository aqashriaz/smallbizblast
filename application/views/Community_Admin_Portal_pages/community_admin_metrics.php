    
		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			 <div class="container-fluid" >
			 	<div>
              	<h5 class="pb_particpating2 text-center">DISPLAYED FOR ALL <span class="pb_ogden2">BUSINESS ACCOUNTS </span>AND THEIR <span class="pb_ogden2">PARTICIPATING DEALS</span></h5>
				</div>
				<hr>
			<div class="totalemail">
					<label class="header3"><b>TOTAL # OF CURRENT, ACTIVE EMAILS SIGN-UPS:</b>  <span class="pb_ogden3"><?php	 echo  $totalemails; ?></span></label>
				</div>
			
				<div class="totalClicked mt-3">
					<label><b>Total # of Deals Posted :</b> <span class="pb_ogden3"><?php echo $dealnumber; ?></span> </label>
					</div> 
					<div class="row">
						<div class="col-md-6">
							<table  class="table9" name="Email_signUp">
		                 <?php /*
		                 	var_dump($deals_info);
*/
                             if($reg){
                             	 foreach($reg as $row)
							{?>
							<tr>

							 <td width="90%"><?php echo $row['business_name']; ?> </td>
								 <td><?php echo $row['num3']; ?></td> 
                             <!-- <td><?php echo anchor('admin/metricBusiness?id='.$row->id, $row->name , 'id="$row->id"'); ?></td>  -->

			             	<!-- <td width="60%"><?=(($row->status==0)?'Pending':(($row->status==1)?'Active':'Rejected'))?> </td>   -->
                               
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

		
					<div class="col-sm-6 ab_sg">
					<form action = "<?php echo base_url().'admin/com_metrics?id='?><?php echo $_SESSION['id']; ?>"  method="post">
						<div>
							<?php if($from) {?>

								<h5> Showing Result</h5>
                           

							 <p><?php  echo $from; ?>  <strong>to</strong>   <?php echo $to; ?> </p>
							<?php }
							 ?><br>
							  
							

						</div>

						 
						<div class="mt-2">
							<input type="submit" name="submit" value="Back" class="btn text-white blue_color2 mt-1" required>
						</div>
						</form>
						</div>
					</div>
			
	
			<section>
			<div class="totalPosted mt-5">
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
								 <td width="90%"><?php echo $row['business_name']; ?> </td>
<!-- 
								 <td><?php echo anchor('admin/masterDeals?id2='.$row['city_id'], $row['business_name'] , 'id="$row->id"'); ?></td>  -->
								 <td><?php echo $row['num4']; ?></td> 

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
