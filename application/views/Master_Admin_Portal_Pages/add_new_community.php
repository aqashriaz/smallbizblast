
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	 <div ><h5 class="pb_particpating2 text-center">ADD NEW <span class="pb_ogden2">COMMUNITIES</span></h5>
</div>
<br><br>

<script type="text/javascript">


<?php if($this->session->flashdata('success')){ ?>
    toastr.success("<?php echo $this->session->flashdata('success'); ?>");
<?php }else if($this->session->flashdata('error')){  ?>
    toastr.error("<?php echo $this->session->flashdata('error'); ?>");
<?php }else if($this->session->flashdata('warning')){  ?>
    toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
<?php }else if($this->session->flashdata('info')){  ?>
    toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>


</script>
 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>
	<form action="<?php echo base_url().'admin/add_community' ?>" method="post" accept-charset="utf-8">
		<div class="row mt-5">
			<div class="col-lg-6 col-md-6 col-sm-12 header2">
				<div class="row mt-2">
					<div class="col-sm-4">									
						<label>Community Name</label>
					</div>
					<div class="col-sm-8">

						<input type="text" name="community_name"  pattern="[^'\x22]+" class="form-control" id="" required>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">

						<label>Admin Name</label>
					</div>
					<div class="col-sm-8">

						<input type="text" name="admin_name" class="form-control" id="" required>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">

						<label>Admin Phone</label>
					</div>
					<div class="col-sm-8">

						<input type="number" name="admin_phone" class="form-control" id="" required>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">

						<label>Admin Username</label>
					</div>
					<div class="col-sm-8">

						<input type="text" name="admin_username" class="form-control" id="" required> 
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-12 header2">
				<div class="row mt-2">
					<div class="col-sm-4">

						<label>State</label>
					</div>
					<div class="col-sm-8">
						<select id="inputState" class="form-control" name="state">
						<option value = "Alabama" selected>Alabama</option>
			<option value = "Alaska">Alaska</option>
			<option value = "Arizona">Arizona</option>
			<option value = "Arkansas">Arkansas</option>
			<option value = "California">California</option>
			<option value = "Connecticut">Connecticut</option>
			<option value = "Colorado">Colorado</option>
			<option value = "Delaware">Delaware</option>
			<option value = "District of Columbia">District of Columbia</option>
			<option value = "Florida">Florida</option>
			<option value = "Georgia">Georgia</option>
			<option value = "Hawaii">Hawaii</option>
			<option value = "Illinois">Illinois</option>
			<option value = "Indiana">Indiana</option>
			<option value = "Iowa">Iowa</option>
			<option value = "Idaho">Idaho</option>
			<option value = "Kentucky">Kentucky</option>
			<option value = "Kansas">Kansas</option>
			<option value = "Louisiana">Louisiana</option>
			<option value = "Massachusetts"> Massachusetts</option>
			<option value = "Michigan">Michigan</option>
			<option value = "Maine">Maine</option>
			<option value = "Maryland">Maryland	</option>
			<option value = "Minnesota">Minnesota</option>
			<option value = "Mississippi">Mississippi</option>
			<option value = "Missouri">Missouri</option>
			<option value = "Montana">Montana</option>
			<option value = "Nevada">Nevada</option>
			<option value = "Nebraska">Nebraska</option>
			<option value = "New York">New York</option>
			<option value = "New Mexico">New Mexico</option>
			<option value = "New Jersey">New Jersey</option>
			<option value = "North Carolina">North Carolina</option>
			<option value = "New Hampshire">New Hampshire</option>
			<option value = "North Dakota">North Dakota</option>
			<option value = "Oregon">Oregon</option>
			<option value = "Ohio">Ohio</option>
			<option value = "Oklahoma">Oklahoma</option>
			<option value = "Pennsylvania">Pennsylvania</option>
			<option value = "Puerto Rico">Puerto Rico</option>
			<option value = "Rhode Island">Rhode Island</option>
			<option value = "South Carolina">South Carolina</option>
			<option value = "South Dakota">South Dakota</option>
			<option value = "Texas">Texas</option>
			<option value = "Tennessee">Tennessee</option>
			<option value = "Utah">Utah</option>
			<option value = "Virginia">Virginia</option>
			<option value = "Wisconsin">Wisconsin</option>
			<option value = "Washington">Washington</option>
			<option value = "West Virginia">West Virginia</option>
			<option value = "Wyoming">Wyoming</option>
				</select>
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">

						<label>Admin Email</label>
					</div>
					<div class="col-sm-8">

						<input type="email" name="email" class="form-control" id="" required>
					</div>
				</div>

			 <div class="row mt-2">
					<div class="col-sm-4">

						<label>Password</label>
					</div>
					<div class="col-sm-8">

						<input type="password" name="password" class="form-control" id="">
					</div>
				</div> 
			</div>
		</div>
		<div class="mt-5">
			<input class="btn text-white blue_color2" type="submit" name="submit" value="submit">
			<input class="btn btn-danger" type="button" name="cancel" value="cancel">

		</div>
	</div>

</div>
</form>
</div>
</div>
</body>
</html>