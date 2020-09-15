 <?php error_reporting(E_ALL & ~E_NOTICE); ?>
   

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	<div class="container-fluid">

		<div>
			<h5 class="pb_particpating2 text-center">ADD NEW <span class="pb_ogden2">BUSINESS </span></h5>
		</div>
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
		<br>
		<p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>

		<!-- <div class="business_deal1 mt-3 mb-2">
			<h5 class="header3 text-white mb-5">
				<?php echo $info->eligibility_text; ?>
			</h5>
		</div> -->

		<form action=" <?php echo base_url().'Admin/insertsignup'?>"  enctype="multipart/form_data"   method="post" accept-charset="utf-8">
		<input type="hidden" name="comunity_id" value="<?php echo $info->id; ?>">

			<div class="row">				
				<div class="col-sm-3 header2">
					<label>Business Name:</label>
				</div>
				<div class="col-sm-3 ">
					<input type="text" name="name" class="form-control">
				</div>
				<div class="col-sm-3 header2">
					<label>Email:</label>
				</div>
				<div class="col-sm-3">
					<input type="email" name="email" class="form-control" required>
				</div>
			</div>
			<div class="row mt-3">	
				<?php  if($signupInfo->licence == 1){ ?>
					<div class="col-sm-3 header2">
						<label>Business license #:</label>
					</div>
					<div class="col-sm-3">
						<input type="text" name="license" class="form-control" required>
					</div>

				<?php }

				?>			

				<div class="col-sm-3 header2">
					<label>Phone:</label>
				</div>
				<div class="col-sm-3">
					<input type="number" name="phone" placeholder="" class="form-control" required>
				</div>
			</div>
			<div class="row mt-3">				
				<div class="col-sm-3 header2">
					<label>Address:</label>
				</div>
				<div class="col-sm-9">
					<input type="text" name="address" class="form-control" required>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-3 header2">
					<label>Address 2:</label>
				</div>
				<div class="col-sm-9">
					<input type="text" name="address2" class="form-control" required>
				</div>
			</div>
			<div class="row mt-3">
				<?php  if($signupInfo->prefill == 1){ ?>	

					<div class="col-sm-3 header2">
						<label>City:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="city" placeholder="" value="<?php echo $signupInfo->cityname ?>" class="form-control" readonly>
					</div>
					<div class="col-sm-1 header2">
						<label>State:</label>
					</div>
					<div class="col-sm-2 header2">
						<select name="state"   id="drop_option" class="form-control" value="Choose Option">
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

				<?php } else { ?>

					<div class="col-sm-3 header2">
						<label>City:</label>
					</div>
					<div class="col-sm-2">
						<input type="text" name="city"  class="form-control" required >
					</div>

					<div class="col-sm-1 header2">
						<label>State:</label>
					</div>
					<div class="col-sm-2 header2">
						<select name="state"   id="drop_option" class="form-control" value="Choose Option">
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



				<?php	}

				?>		



				<div class="col-sm-1 header2">
					<label>Zip:</label>
				</div>
				<div class="col-sm-3">
					<input type="text" name="zip" placeholder="" class="form-control" required>
				</div>
			</div>
			<div class="row mt-3">

				<div class="col-sm-3 header2">
					<label>Username:</label>
				</div>
				<div class="col-sm-3">
					<input type="text" placeholder="" name="username" class="form-control" required>
				</div>
				<div class="col-sm-3 header2">
					<label>Password:</label>
				</div>
				<div class="col-sm-3">
					<input type="password" name="password" class="form-control" required>
				</div>

			</div>

			<div class="row mt-5">
				<div class="col-sm-3 header2">
					<label>Business Facebook:</label>
				</div>
				<div class="col-sm-3">
					<input type="text" placeholder="" name="facebook" class="form-control">
				</div>
				<div class="col-sm-3 header2">
					<label>Business Photo or Logo:</label>
				</div>
				<div class="col-sm-3">
					<?php echo form_upload(['name'=>'userfile']);?>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-3 header2">
					<label>Business Twitter:</label>
				</div>
				<div class="col-sm-3">
					<input type="text" placeholder="" name="twitter" class="form-control">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-3 header2">
					<label>Business Instagram:</label>
				</div>
				<div class="col-sm-3">
					<input type="text" placeholder="" name="instagram" class="form-control">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-3 header2">
					<label>Business Website:</label>
				</div>
				<div class="col-sm-3">
					<input type="text" placeholder="" name="website" class="form-control">
				</div>
			</div>
			<div class="lineheightheader mt-2">
				<p>(Note: If you leave the social media fields above blank, the social media icons will not appear on your page)</p>
			</div>
			<div>
				<input type="submit" class="btn btn-primary btn_bob1 text-white" value="SUBMIT">
			</div>
		</form>


	</div>
</div>

</body>
</html>