
	<section class="studio-block custom-materials stayHome top-margin" id="stayHome">
<div class="container">
	<div class="mt-5">
		
	</div>

				<div class="business_deal1">
					<h5 class="text-white mt-3 header2">
					(Eligibility text comes from City Admin Home Page)
					</h5>
				</div>
				<div class="lineheightheader">
					<p class="header2">if your business meets the eligibility criteria above complete the form below then click submit. if your request is approved, you will recieve an email(to the email address you list below) notifying you can now log in and begin posting deals for your fellow residents</p>
				</div>

			</div>
</section>
<section>
	<div class="container">
		        <?php echo form_open_multipart('front/uploadPic');?>

		<form action=" <?php echo base_url().'front/insertsignup'?>"  enctype="multipart/form_data"   method="post" accept-charset="utf-8">
			<div class="row">				
				<div class="col-sm-3 header2">
				<label>Business Name:</label>
				</div>
				<div class="col-sm-3 ">
				<input type="text" name="name" class="form-control" required>
				</div>
				<div class="col-sm-2 header2">
				<label>Email:</label>
				</div>
				<div class="col-sm-4">
				<input type="email" name="email" class="form-control" required>
				</div>
	        </div>
			<div class="row mt-3">				
				<div class="col-sm-3 header2">
					<label>South Ogden City business licence #:</label>
				</div>
				<div class="col-sm-3">
					<input type="text" name="license" class="form-control" required>
				</div>
				<div class="col-sm-2 header2">
					<label>Phone:</label>
				</div>
				<div class="col-sm-4">
					<input type="number" name="phone" placeholder="" class="form-control" required>
				</div>
		   </div>
			<div class="row mt-1">				
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
				
		<div class="col-sm-3 header2">
			<label>City:</label>
		</div>
		<div class="col-sm-2">
			<input type="text" name="city" placeholder="South Ogden City" class="form-control" required>
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
<div class="lineheightheader mt-2">
	<p>(Note: If you leave the social media fields above blank, the social media icons will not appear on your page)</p>
</div>
<div>
	<input type="submit" class="btn btn-primary btn_bob1 text-white" value="SUBMIT">
</div>
		</form>
	</div>
</section>

</body>
</html>