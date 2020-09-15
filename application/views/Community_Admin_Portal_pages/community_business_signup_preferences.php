     <?php error_reporting(E_ALL & ~E_NOTICE); ?>
   


<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	<div class="container-fluid">
		<form action="<?php echo base_url().'admin/updateprefrence' ?>" method="post" accept-charset="utf-8">
		    <input type="hidden" name="id"  value="<?php echo $_GET['id']; ?>">
			<div class="">
				<h5 class="pb_particpating1 text-center"><span class="pb_ogden1">BUSINESS SIGN-UP</span> PREFERENCES</h5>
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

			</div>
			<div class="container">
				
				<div class="header2 mt-5">
					<input type="checkbox" name="licence" value="1" <?php echo ($signup->licence ==1 ? 'checked' : '');?>>
					<label>
						 Require business license field
					</label>
					<i class="fa fa-question-circle" style="font-size:18px" title="If you choose to make an active business license in your community a requirement, clicking this box creates a “business license” field on the “Add My Business” form."></i>
				</div>
				<div class="header2">
					<input type="checkbox" name="prefill" value="1" <?php echo ($signup->prefill ==1 ? 'checked' : '');?>>
					<label>
						Pre-fill city/state in address:
					</label>
					<i class="fa fa-question-circle" style="font-size:18px" title="If you want to ensure that only businesses with a physical address within a specific city or town can participate, clicking this box will pre-fill the city in the address field."></i>
				</div>
				<div class="row">
					<div class="col-sm-1">
						<div class="header2 text-center mt-1">
							<label>City name:</label>
						</div>
					</div>
					<div class="col-sm-3">
						
						<input type="text" class="form-control"  value="<?php echo $signup->cityname ?>" name="cityname">
					</div>
					<div class="col-sm-1">
						
						<div class="header2 text-center mt-1">
							<label>State:</label>
						</div>
					</div>
					<div class="col-sm-3">
						
						 <select name="state"   id="drop_option" class="form-control" value="Choose Option">
      <option value = "0">Change State</option>
         <option value = "Alabama"<?php if($signup->state=="Alabama") echo 'selected="selected"'; ?> >Alabama</option>
      <option value = "Alaska" <?php if($signup->state=="Alaska") echo 'selected="selected"'; ?>>Alaska</option>
      <option value = "Arizona" <?php if($signup->state=="Arizona") echo 'selected="selected"'; ?>>Arizona</option>
      <option value = "Arkansas" <?php if($signup->state=="Arkansas") echo 'selected="selected"'; ?>>Arkansas</option>
      <option value = "California"<?php if($signup->state=="California") echo 'selected="selected"'; ?>>California</option>
      <option value = "Connecticut"<?php if($signup->state=="Connecticut") echo 'selected="selected"'; ?>>Connecticut</option>
      <option value = "Colorado"<?php if($signup->state=="Colorado") echo 'selected="selected"'; ?>>Colorado</option>
      <option value = "Delaware"<?php if($signup->state=="Delaware") echo 'selected="selected"'; ?>>Delaware</option>
      <option value = "District of Columbia"<?php if($signup->state=="District of Columbia") echo 'selected="selected"'; ?>>District of Columbia</option>
      <option value = "Florida"<?php if($signup->state=="Florida") echo 'selected="selected"'; ?>>Florida</option>
      <option value = "Georgia"<?php if($signup->state=="Georgia") echo 'selected="selected"'; ?>>Georgia</option>
      <option value = "Hawaii"<?php if($signup->state=="Hawaii") echo 'selected="selected"'; ?>>Hawaii</option>
      <option value = "Illinois"<?php if($signup->state=="Illinois") echo 'selected="selected"'; ?>>Illinois</option>
      <option value = "Indiana"<?php if($signup->state=="Indiana") echo 'selected="selected"'; ?>>Indiana</option>
      <option value = "Iowa"<?php if($signup->state=="Iowa") echo 'selected="selected"'; ?>>Iowa</option>
      <option value = "Idaho"<?php if($signup->state=="Idaho") echo 'selected="selected"'; ?>>Idaho</option>
      <option value = "Kentucky"<?php if($signup->state=="Kentucky") echo 'selected="selected"'; ?>>Kentucky</option>
      <option value = "Kansas"<?php if($signup->state=="Kansas") echo 'selected="selected"'; ?>>Kansas</option>
      <option value = "Louisiana"<?php if($signup->state=="Louisiana") echo 'selected="selected"'; ?>>Louisiana</option>
      <option value = "Massachusetts"<?php if($signup->state=="Massachusetts") echo 'selected="selected"'; ?>> Massachusetts</option>
      <option value = "Michigan"<?php if($signup->state=="Michigan") echo 'selected="selected"'; ?>>Michigan</option>
      <option value = "Maine"<?php if($signup->state=="Maine") echo 'selected="selected"'; ?>>Maine</option>
      <option value = "Maryland"<?php if($signup->state=="Maryland") echo 'selected="selected"'; ?>>Maryland </option>
      <option value = "Minnesota"<?php if($signup->state=="Minnesota") echo 'selected="selected"'; ?>>Minnesota</option>
      <option value = "Mississippi"<?php if($signup->state=="Mississippi") echo 'selected="selected"'; ?>>Mississippi</option>
      <option value = "Missouri"<?php if($signup->state=="Missouri") echo 'selected="selected"'; ?>>Missouri</option>
      <option value = "Montana"<?php if($signup->state=="Montana") echo 'selected="selected"'; ?>>Montana</option>
      <option value = "Nevada"<?php if($signup->state=="Nevada") echo 'selected="selected"'; ?>>Nevada</option>
      <option value = "Nebraska"<?php if($signup->state=="Nebraska") echo 'selected="selected"'; ?>>Nebraska</option>
      <option value = "New York"<?php if($signup->state=="New York") echo 'selected="selected"'; ?>>New York</option>
      <option value = "New Mexico"<?php if($signup->state=="New Mexico") echo 'selected="selected"'; ?>>New Mexico</option>
      <option value = "New Jersey"<?php if($signup->state=="New Jersey") echo 'selected="selected"'; ?>>New Jersey</option>
      <option value = "North Carolina"<?php if($signup->state=="North Carolina") echo 'selected="selected"'; ?>>North Carolina</option>
      <option value = "New Hampshire"<?php if($signup->state=="New Hampshire") echo 'selected="selected"'; ?>>New Hampshire</option>
      <option value = "North Dakota"<?php if($signup->state=="North Dakota") echo 'selected="selected"'; ?>>North Dakota</option>
      <option value = "Oregon"<?php if($signup->state=="Oregon") echo 'selected="selected"'; ?>>Oregon</option>
      <option value = "Ohio"<?php if($signup->state=="Ohio") echo 'selected="selected"'; ?>>Ohio</option>
      <option value = "Oklahoma"<?php if($signup->state=="Oklahoma") echo 'selected="selected"'; ?>>Oklahoma</option>
      <option value = "Pennsylvania"<?php if($signup->state=="Pennsylvania") echo 'selected="selected"'; ?>>Pennsylvania</option>
      <option value = "Puerto Rico"<?php if($signup->state=="Puerto Rico") echo 'selected="selected"'; ?>>Puerto Rico</option>
      <option value = "Rhode Island"<?php if($signup->state=="Rhode Island") echo 'selected="selected"'; ?>>Rhode Island</option>
      <option value = "South Carolina"<?php if($signup->state=="South Carolina") echo 'selected="selected"'; ?>>South Carolina</option>
      <option value = "South Dakota"<?php if($signup->state=="South Dakota") echo 'selected="selected"'; ?>>South Dakota</option>
      <option value = "Texas"<?php if($signup->state=="Texas") echo 'selected="selected"'; ?>>Texas</option>
      <option value = "Tennessee"<?php if($signup->state=="Tennessee") echo 'selected="selected"'; ?>>Tennessee</option>
      <option value = "Utah"<?php if($signup->state=="Utah") echo 'selected="selected"'; ?>>Utah</option>
      <option value = "Virginia"<?php if($signup->state=="Virginia") echo 'selected="selected"'; ?>>Virginia</option>
      <option value = "Wisconsin"<?php if($signup->state=="Wisconsin") echo 'selected="selected"'; ?>>Wisconsin</option>
      <option value = "Washington"<?php if($signup->state=="Washington") echo 'selected="selected"'; ?>>Washington</option>
      <option value = "West Virginia"<?php if($signup->state=="West Virginia") echo 'selected="selected"'; ?>>West Virginia</option>
      <option value = "Wyoming"<?php if($signup->state=="Wyoming") echo 'selected="selected"'; ?>>Wyoming</option>
            </select>
					</div>
				</div>

				
				<div class="mt-3">
					
					<input type="submit" class="btn btn-primary blue_color2" name="" value="Update">
					
					<input type="submit" class="btn btn-danger" name="cancel" value="cancel">
				</div>
			</div>
		</form>					
		
		
	</div>
</div>
</body>
</html>