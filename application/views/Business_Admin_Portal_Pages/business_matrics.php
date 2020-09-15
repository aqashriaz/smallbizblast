   <?php error_reporting(E_ALL & ~E_NOTICE); ?>
   
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	<div class="container-fluid" >
		<div>
			<h5 class="pb_particpating2 text-center">DISPLAYED FOR ALL <span class="pb_ogden2">DEALS DETAILS </span></h5>
		</div>
		<hr>
		<div class="row mt-3">
			<div class="col-lg-8 col-md-8 col-sm-12 m-auto">		
				<div class="totalemail">
					<label class="header2"><b>Total Deals Clicks/Views:</b>  <span class="pb_ogden3"> </span></label>
					<div class="">
						<table  class="table9" name="Email_signUp">

							<tr>
								<td style="color: red">Please Select Date Range</td>
								<td width="50%"> </td>
								<!-- <td width="60%"><?=(($row->status==0)?'Pending':(($row->status==1)?'Active':'Rejected'))?> </td> -->
							</tr>


						</table>
					</div>
				</div>
				<div class="" style="margin-top: 150px;">
					<form action = "<?php echo base_url().'admin/bus_matrics' ?>"  method="post">
							
							   <?php if($_SESSION['admin_role'] != 'businessadmin')
						{ ?>
                        <input type="hidden" name="comunity_id" value="<?php echo $_GET['id']; ?>">						
						<?php } if($_SESSION['admin_role'] == 'businessadmin'){?>
                        <input type="hidden" name="comunity_id" value="<?php echo $_SESSION['admin_session']; ?>">		


						<?php }

						?>

						<div>
							<label> Date Range</label>

						</div>
						<div class="row">

							<div class="col-sm-5">  
								<input type="date" name="startdate"  value="<?php echo  $_SESSION['bfrom'];?>" class="form-control">
							</div>
							<div class="col-sm-1" class="form-control">
								to
							</div>
							<div class="col-sm-5">  
								<input type="date" class="calender form-control" value="<?php echo  $_SESSION['bto'];?>" name="enddate">
							</div>
						</div>
						<div class="mt-2">
							<input type="submit" name="submit" value="submit" class="btn text-white blue_color2 mt-1">
						</div>
					</form>
				</div>
			</div>
			
			<?php if($comunity_info->administrative_notice){ ?>

				<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
					<div class="box adminsitrative_notice1">
						<div class="box-title1 text-white">
							<h6 class="header3"><u>Administrative Notice:</u></h6>
							<p class="header2"><?php echo $comunity_info->administrative_notice; ?></p>
						</div>
					</div>
				</div>
			<?php }?>
			
		</div>
	</div>
</body>
</html>
