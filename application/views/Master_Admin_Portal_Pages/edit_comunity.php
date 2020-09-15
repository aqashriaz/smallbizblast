 
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	 <div class="mb-5">
	 <div class="header2" ><h5 class="pb_particpating2 text-center"><span class="pb_ogden2">COMMUNITY </span>DETAILS</h5>
</div>
</div>
	<form action="<?php echo base_url().'admin/updateComunity' ?>" method="post" accept-charset="utf-8">
		<input type="hidden" name="id" value="<?php echo $comunity->id ?>">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 header2">
				<div class="row mt-2">
					<div class="col-sm-4">									
						<label>Community Name</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="community_name"  pattern="[^'\x22]+" value="<?php echo $comunity->community_name ?>"  class="form-control" readonly>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">
						<label>Admin Name</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="admin_name" value="<?php echo $comunity->admin_name ?>"  class="form-control" readonly>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">
						<label>Admin Phone</label>
					</div>
					<div class="col-sm-8">
						<input type="number" name="admin_phone" value="<?php echo $comunity->admin_phone ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">
						<label>Admin Username</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="username" value="<?php echo $comunity->admin_username ?>" class="form-control" required>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-sm-4">
						<label>Current Status</label>
					</div>
					<div class="col-sm-8">
						<input type="text" name="status" value="<?=(($comunity->status==0)?'Pending':(($comunity->status==1)?'Approved':'Rejected'))?>" class="form-control" readonly>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 header2">
				<div class="row mt-2">
					<div class="col-sm-4">
						<label>State</label>
					</div>
					<div class="col-sm-8">
						 <input type="text" name="state" value="<?php echo $comunity->state ?>" class="form-control" readonly>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">
						<label>Admin Email</label>
					</div>
					<div class="col-sm-8">
						<input type="email"   name="email" value="<?php echo $comunity->email ?>" class="form-control" readonly>
					</div>
				</div>

				<div class="row mt-2">
					<div class="col-sm-4">
						<label>Password</label>
					</div>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control" required>
					</div>
				</div>


			</div>

		          <div class="col-md-6"> 
						<div class="row mt-2">
						<div class="col-sm-4">

						<label for="donationinput3" >Update Status</label>
						</div>
						<div class="col-sm-8">

						<select class="form-control" name="status" required >
						<option>Choose Status</option>}
						option
						<option value="1">Active</option>
						<option value="0">Pending</option>
						<option value="2">In Active</option>
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

<script> 
/*var el_down = document.getElementById("password"); 


Function to generate combination of password 
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
} */
</script> 