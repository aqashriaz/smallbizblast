    <?php error_reporting(E_ALL & ~E_NOTICE); ?>

	<section class="studio-block custom-materials stayHome top-margin" id="stayHome">
<div class="container mt-5 ">
    <br>
	<div class="mt-5">
		
	</div>

				<div class="signupheader1 header2">
					<p class="pb_ogden3"><b>Residents want to support local businesses you just need to give them a reason to do so!</b>
					</p>
						<p class="header2">In order to participate in your community's Small Biz Blast program, you must meet the eligibility criteria below:</p>
				</div>
 <p class="text-danger text-center"><?php echo $this->session->flashdata('success'); ?></p>
                 <?php if($community->eligibility_text){?>
                  <div class="business_deal1">
					<h5 class="text-white mt-3 header2">
					<?php echo $community->eligibility_text; ?>
					</h5>
				</div> 
			<?php }
                 ?>
				
				<div class="lineheightheader">
					<p class="header2">If your business meets the eligibility criteria above, please complete the form below then click submit.  If your request is approved, you will receive an email to the address you list below notifying you that you can now log in and begin posting deals for your fellow residents.</p>
				</div>

			</div>
</section>
<section>
	<div class="container">
		        <?php echo form_open_multipart('front/uploadPic');?>

		<form action=" <?php echo base_url().'front/insertsignup'?>"  enctype="multipart/form_data"   method="post" accept-charset="utf-8">
			<input type="hidden" name="comunity_id" value="<?php echo $_GET['id']; ?>">
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
				<input type="email" name="email" class="form-control">
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
					<input type="number" name="phone" placeholder="" class="form-control">
				</div>
		   </div>
			<div class="row mt-3">				
				<div class="col-sm-3 header2">
					<label>Address:</label>
				</div>
				<div class="col-sm-8">
					<input type="text" name="address" class="form-control">
				</div>
			</div>
	        <div class="row mt-3">
		    <div class="col-sm-3 header2">
			<label>Address 2:</label>
		    </div>
			<div class="col-sm-8">
				<input type="text" name="address2" class="form-control">
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
      <option value = "0">Change State</option>
         <option value = "Alabama"<?php if($signupInfo->state=="Alabama") echo 'selected="selected"'; ?> >Alabama</option>
      <option value = "Alaska" <?php if($signupInfo->state=="Alaska") echo 'selected="selected"'; ?>>Alaska</option>
      <option value = "Arizona" <?php if($signupInfo->state=="Arizona") echo 'selected="selected"'; ?>>Arizona</option>
      <option value = "Arkansas" <?php if($signupInfo->state=="Arkansas") echo 'selected="selected"'; ?>>Arkansas</option>
      <option value = "California"<?php if($signupInfo->state=="California") echo 'selected="selected"'; ?>>California</option>
      <option value = "Connecticut"<?php if($signupInfo->state=="Connecticut") echo 'selected="selected"'; ?>>Connecticut</option>
      <option value = "Colorado"<?php if($signupInfo->state=="Colorado") echo 'selected="selected"'; ?>>Colorado</option>
      <option value = "Delaware"<?php if($signupInfo->state=="Delaware") echo 'selected="selected"'; ?>>Delaware</option>
      <option value = "District of Columbia"<?php if($signupInfo->state=="District of Columbia") echo 'selected="selected"'; ?>>District of Columbia</option>
      <option value = "Florida"<?php if($signupInfo->state=="Florida") echo 'selected="selected"'; ?>>Florida</option>
      <option value = "Georgia"<?php if($signupInfo->state=="Georgia") echo 'selected="selected"'; ?>>Georgia</option>
      <option value = "Hawaii"<?php if($signupInfo->state=="Hawaii") echo 'selected="selected"'; ?>>Hawaii</option>
      <option value = "Illinois"<?php if($signupInfo->state=="Illinois") echo 'selected="selected"'; ?>>Illinois</option>
      <option value = "Indiana"<?php if($signupInfo->state=="Indiana") echo 'selected="selected"'; ?>>Indiana</option>
      <option value = "Iowa"<?php if($signupInfo->state=="Iowa") echo 'selected="selected"'; ?>>Iowa</option>
      <option value = "Idaho"<?php if($signupInfo->state=="Idaho") echo 'selected="selected"'; ?>>Idaho</option>
      <option value = "Kentucky"<?php if($signupInfo->state=="Kentucky") echo 'selected="selected"'; ?>>Kentucky</option>
      <option value = "Kansas"<?php if($signupInfo->state=="Kansas") echo 'selected="selected"'; ?>>Kansas</option>
      <option value = "Louisiana"<?php if($signupInfo->state=="Louisiana") echo 'selected="selected"'; ?>>Louisiana</option>
      <option value = "Massachusetts"<?php if($signupInfo->state=="Massachusetts") echo 'selected="selected"'; ?>> Massachusetts</option>
      <option value = "Michigan"<?php if($signupInfo->state=="Michigan") echo 'selected="selected"'; ?>>Michigan</option>
      <option value = "Maine"<?php if($signupInfo->state=="Maine") echo 'selected="selected"'; ?>>Maine</option>
      <option value = "Maryland"<?php if($signupInfo->state=="Maryland") echo 'selected="selected"'; ?>>Maryland </option>
      <option value = "Minnesota"<?php if($signupInfo->state=="Minnesota") echo 'selected="selected"'; ?>>Minnesota</option>
      <option value = "Mississippi"<?php if($signupInfo->state=="Mississippi") echo 'selected="selected"'; ?>>Mississippi</option>
      <option value = "Missouri"<?php if($signupInfo->state=="Missouri") echo 'selected="selected"'; ?>>Missouri</option>
      <option value = "Montana"<?php if($signupInfo->state=="Montana") echo 'selected="selected"'; ?>>Montana</option>
      <option value = "Nevada"<?php if($signupInfo->state=="Nevada") echo 'selected="selected"'; ?>>Nevada</option>
      <option value = "Nebraska"<?php if($signupInfo->state=="Nebraska") echo 'selected="selected"'; ?>>Nebraska</option>
      <option value = "New York"<?php if($signupInfo->state=="New York") echo 'selected="selected"'; ?>>New York</option>
      <option value = "New Mexico"<?php if($signupInfo->state=="New Mexico") echo 'selected="selected"'; ?>>New Mexico</option>
      <option value = "New Jersey"<?php if($signupInfo->state=="New Jersey") echo 'selected="selected"'; ?>>New Jersey</option>
      <option value = "North Carolina"<?php if($signupInfo->state=="North Carolina") echo 'selected="selected"'; ?>>North Carolina</option>
      <option value = "New Hampshire"<?php if($signupInfo->state=="New Hampshire") echo 'selected="selected"'; ?>>New Hampshire</option>
      <option value = "North Dakota"<?php if($signupInfo->state=="North Dakota") echo 'selected="selected"'; ?>>North Dakota</option>
      <option value = "Oregon"<?php if($signupInfo->state=="Oregon") echo 'selected="selected"'; ?>>Oregon</option>
      <option value = "Ohio"<?php if($signupInfo->state=="Ohio") echo 'selected="selected"'; ?>>Ohio</option>
      <option value = "Oklahoma"<?php if($signupInfo->state=="Oklahoma") echo 'selected="selected"'; ?>>Oklahoma</option>
      <option value = "Pennsylvania"<?php if($signupInfo->state=="Pennsylvania") echo 'selected="selected"'; ?>>Pennsylvania</option>
      <option value = "Puerto Rico"<?php if($signupInfo->state=="Puerto Rico") echo 'selected="selected"'; ?>>Puerto Rico</option>
      <option value = "Rhode Island"<?php if($signupInfo->state=="Rhode Island") echo 'selected="selected"'; ?>>Rhode Island</option>
      <option value = "South Carolina"<?php if($signupInfo->state=="South Carolina") echo 'selected="selected"'; ?>>South Carolina</option>
      <option value = "South Dakota"<?php if($signupInfo->state=="South Dakota") echo 'selected="selected"'; ?>>South Dakota</option>
      <option value = "Texas"<?php if($signupInfo->state=="Texas") echo 'selected="selected"'; ?>>Texas</option>
      <option value = "Tennessee"<?php if($signupInfo->state=="Tennessee") echo 'selected="selected"'; ?>>Tennessee</option>
      <option value = "Utah"<?php if($signupInfo->state=="Utah") echo 'selected="selected"'; ?>>Utah</option>
      <option value = "Virginia"<?php if($signupInfo->state=="Virginia") echo 'selected="selected"'; ?>>Virginia</option>
      <option value = "Wisconsin"<?php if($signupInfo->state=="Wisconsin") echo 'selected="selected"'; ?>>Wisconsin</option>
      <option value = "Washington"<?php if($signupInfo->state=="Washington") echo 'selected="selected"'; ?>>Washington</option>
      <option value = "West Virginia"<?php if($signupInfo->state=="West Virginia") echo 'selected="selected"'; ?>>West Virginia</option>
      <option value = "Wyoming"<?php if($signupInfo->state=="Wyoming") echo 'selected="selected"'; ?>>Wyoming</option>
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
		<div class="col-sm-2">
			<input type="text" name="zip" placeholder="" class="form-control">
		</div>
	</div>
	<div class="row mt-3">
		
		<div class="col-sm-3 header2">
			<label>Username:</label>
		</div>
		<div class="col-sm-3">
			<input type="text" placeholder="" name="username" class="form-control">
		</div>
		<div class="col-sm-2 header2">
			<label>Password:</label>
		</div>
		<div class="col-sm-3">
			<input type="password" name="password" class="form-control">
		</div>
		
	</div>

<div class="row mt-5">
	<div class="col-sm-3 header2">
			<label>Business Facebook:</label>
		</div>
		<div class="col-sm-3">
			<input type="text" placeholder="" name="facebook" class="form-control">
		</div>
		<div class="col-sm-2 header2">
			<label>Business Photo or Logo:</label>
		</div>
		<div class="col-sm-2">
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
						<label>Business Website</label>
					</div>
					<div class="col-sm-3">
						<input type="text" name="website" value=""  class="form-control">
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
</section>
<footer>
	<div class="container">
		<ul class="navbar navbar-items timer_count2">
			<li>
				<a href="<?php echo base_url() ?>/Front/aboutus_cdp" title="" class="timer_count2">About Small Biz Blast</a>
			</li>
			<li>

				<a href="<?php echo base_url() ?><?php echo  $community->slug ?>" title="" class="timer_count2">Community Deals Page</a>
			</li>
			<li> 
                       

                 <?php echo anchor('Front/bus_signup?id='.$info->id, '<span class="timer_count2"></span> Add My Business', 'id="$info->id"'); ?>

				<!-- <a href="<?php echo base_url() ?>/Front/bus_signup" title="" class="timer_count2">Add My Business</a> -->
			</li>
			<!-- <li>
				<a href="<?php echo base_url() ?>/Front/contact_us" title="" class="timer_count2">Pricing</a>
			</li>
 -->
		</ul>     
		
	</div>
</footer>

</body>
</html>