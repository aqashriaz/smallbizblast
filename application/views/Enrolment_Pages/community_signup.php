 
<section class="studio-block custom-materials stayHome top-margin" id="stayHome">
<div class="container">
<div class="signupheader1 header2">
<div>
<br>
<div class="mt-5">
</div>
<p class="pb_ogden3">Enrolling your community in the SmallBizBlast program is Easy!</p>

<p class="header2"> Whether you represent a municipality, a chamber of commerce or other community focused organization, you'll be playing a critical role in helping residents support your community's small businesses.</p>
<p class="header2">Once you submit the form below, we will verify your organization. If approved, an invoice will be sent to the email address listed below. Once payment is confirmed, your account will be activated and an automated “welcome” email will be sent to you kicking off your community's SmallBizBlast program.  A “Quick-Start Guide” will be included.</b></p>
</div>

 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>


</div>
</section>
<section>
<div class="container">
<form action="<?php echo base_url().'Front/comunity_insert' ?>" method="post" accept-charset="utf-8">
<div class="bg-light">
<p class="header2"><b>Organization Type & Name:</b></p>
</div>

<div class="row mt-3">
<div class="col-sm-3">
<label class="header2">City, Town or Chamber Name:</label>
</div>
<div class="col-sm-3">
<input type="text" name="community_name"  pattern="[^'\x22]+" class="form-control" required>
</div>
<div class="col-sm-3">
<label class="header2">Which best describes your organization:</label>
</div>
<div class="col-sm-2">
	<select name="og_city" class="form-control">
		<option value="City/Town">City/Town</option>
		<option value="county">County</option>
		<option value="chamber">Chamber of commerce</option>
		<option value="other">Other</option>
	</select>

</div>
</div>
<div class="row mt-3">
<div class="col-sm-3 ">
<label class="header2">(If ‘Other’ is selected, please describe):</label>
</div>
<div class="col-sm-3">
<input type="text" placeholder="" name="other_description" class="form-control">
</div>
</div>
<div class="mt-5 bg-light">
<p class="header2"><b>Administrative Contact Information:</b></p>
</div>
<div class="row mt-3">
<div class="col-sm-3">
<label class="header2">Name:</label>
</div>
<div class="col-sm-3">
<input type="text" name="admin_name" class="form-control" required>
</div>
<div class="col-sm-3">
<label class="header2">Phone:</label>
</div>
<div class="col-sm-2">
<input type="number" name="admin_phone" placeholder="" class="form-control" required>
</div>
</div>
<div class="row mt-3">

<div class="col-sm-3">
<label class="header2">Email:</label>
</div>
<div class="col-sm-3">
<input type="email" name="email" class="form-control" required>
</div>

<div class="col-sm-3">
<label class="header2">Organization Website:</label>
</div>
<div class="col-sm-2">
<input type="text" name="og_website" class="form-control" required>
</div>
</div>
<div class="mt-5 bg-light">
<p class="header2"><strong>Organization Information:</strong></p>
</div>
<div class="row mt-3">

<div class="col-sm-3">
<label class="header2">Address:</label>
</div>
<div class="col-sm-3">
<input type="text" name="og_address" class="form-control" required>
</div>
<div class="col-sm-3">
<label class="header2">City:</label>
</div>
<div class="col-sm-2">
<input type="text" placeholder="" name="city" class="form-control" required>
</div>
</div>

<div class="row mt-3">

<div class="col-sm-3">
<label class="header2">State:</label>
</div>
<div class="col-sm-3">
<select name="state"   id="drop_option" class="form-control" value="Choose Option">
				<option value = "Alabama">Alabama</option>
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
<div class="col-sm-3">
<label class="header2">Zip:</label>
</div>
<div class="col-sm-2">
<input type="text" name="zip" placeholder="" class="form-control" required>
</div>
</div>

<div class="row mt-3">
<div class="col-sm-3 header2 ">
<div class="lineheightheader">
<p class="header2">Population Size of Your Service Area:</p>
</div>
</div>
<div class="col-sm-3 header2">
<select name="population_size" id="drop_option" class="form-control" value="Choose Option">
<option value="less_than_10000" selected>Less than 10,000 residents</option>
<option value="less_than_60000">Less than 60,000 residents</option>
<option value = "60000 or more">60,000 or more residents</option>
</select>
</div>

</div>
<div class="row mt-3">
<div class="col-sm-6 bg-light">
	
<div class="col-sm-6 mt-3">
<label class="header2">Enrollment Code(if any):</label>
</div>
<div class="col-sm-4 bg-light">
<input type="text" name="enrolment_code" class="form-control">
</div>

</div>
</div>
<div class="mb-5 mt-5">
<input type="submit" class="btn btn-primary text-white blue_color2" value="SUBMIT">
</div>
</div>
</div>

</form>
</div>
</section>

</body>
</html>