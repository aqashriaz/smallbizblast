   
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	 <div class="mb-5">
	 <div class="header2" ><h5 class="pb_particpating2 text-center"><span class="pb_ogden2">Business </span>Status Update</h5>
</div>
</div>
	<form action="<?php echo base_url()?>/admin/business_status" method="post" accept-charset="utf-8">
		<input type="hidden" name="id" value="<?php echo $admin_info->id ?>">
		<input type="hidden" name="id2" value="<?php echo $_GET['id']; ?>">
 
		<div class="row mt-2">
					<div class="col-sm-6">
						
					<div class="row">
					<div class="col-sm-4">									
						<label>Business Name</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="name" value="<?php echo $admin_info->name ?>"  class="form-control" readonly>
					</div>
			</div>
		</div>
			<div class="col-sm-6">
					
					<div class="row">
					<div class="col-sm-4">									
						<label>Username</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="username" value="<?php echo $admin_info->username  ?>"  class="form-control" readonly>
					</div>
				</div>
			</div>
		</div>
					<div class="row mt-2">
						<div class="col-sm-6">
								<div class="row">
		
					<div class="col-sm-4">									
						<label>Address</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="address" value="<?php echo  $admin_info->address ?>"  class="form-control" readonly>
					</div>
				</div>
				</div>
			
				 <div class="col-sm-6">
									<div class="row">
	
					<div class="col-sm-4">									
						<label>Password</label>
					</div>
					<div class="col-sm-8">
						<input type="password" name="password" value="<?php echo  $admin_info->password ?>"  class="form-control">
					</div>
				</div> 
			</div>
			</div>
					<div class="row mt-2">
						<div class="col-sm-6">
										<div class="row">

					<div class="col-sm-4">									
						<label>Email</label>
					</div>
					<div class="col-sm-8">
						<input type="email" name="email" value="<?php echo $admin_info->email  ?>"  class="form-control" readonly>
					</div>
					</div>
				</div>
					<div class="col-sm-6">
										<div class="row">

					 <div class="col-sm-4">									
						<label>Phone</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="phone" value="<?php echo $admin_info->phone  ?>"  class="form-control" readonly>
					</div>
			</div>
</div>
				</div>
			

				<div class="row mt-2">

					<div class="col-sm-6">
										<div class="row">

					 <div class="col-sm-4">									
						<label>Business license #</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="website" value="<?php echo $admin_info->license  ?>"  class="form-control" readonly>
					</div>
</div>
			</div>
					<div class="col-sm-6">
					<div class="row">
					
					<div class="col-sm-4">
						<label>Current Status</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="status" value="<?=(($admin_info->status==0)?'Pending':(($admin_info->status==1)?'Approved':'Inactive'))?>" class="form-control" readonly>
					</div>
				</div>
</div>	
</div>		
						<div class="row mt-2">
		          <div class="col-sm-6"> 
	
						<div class="row">
					<div class="col-sm-4">

						<label for="donationinput3" >Status</label>
						</div>
						<div class="col-sm-8">

						<select class="form-control" name="status">
						<option>Choose Status</option>}
						option
						<option value="1">Active</option>
						<option value="0">Pending</option>
						<option value="2">Inactive</option>
						</select>
						</div>
		             </div>
</div>                 
                    </div> 
		<div class="mt-5">
		  <input class="btn text-white blue_color2" type="submit" name="submit"  value="update">
			<input class="btn btn-danger" type="button" name="cancel" value="cancel">
		</div>
	</div>

</div>
</form>
</div>
</div>
</body>
</html>
<!-- 
<script> 
var el_down = document.getElementById("password"); 


/* Function to generate combination of password */ 
function generateP() { 
	var pass = ''; 
	var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +  
	'abcdefghijklmnopqrstuvwxyz0123456789@#$'; 

	for (i = 1; i <= 8; i++) { 
	var char = Math.floor(Math.random() 
	* str.length + 1); 

	pass += str.charAt(char) 
	} 

	return pass; 
} 

function gfg_Run() { 
el_down.innerHTML = generateP(); 
} 
</script>  -->