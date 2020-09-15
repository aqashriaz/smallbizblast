
	<section class="studio-block custom-materials stayHome top-margin" id="stayHome">
<div class="container">
		<div class="Pricingheader1 mt-3">
			<center>
			<h5 class="pb_ogden2"> PRICING</h5>
		</center>
		</div>
	<div class=" text-center">

		<p class=" signupheader1 header2 mt-5">
			It's really quite simple . The lower the number of residents in your community, the lower the annual cost. All 3 levels include "community supporter" banner spots.
</p>

</div>
 <div class="container" >
            <div class="row mt-4">
                <div class="col-lg-1 col-md-1"></div>
                <div class="col-lg-3 col-md-4 col-12">

                    <div class="p11">

                       <img src="<?php echo base_url()?>assets/images/p1.png" alt="" class="privacy_img1 ml-5">
                        </div>
              </div>
              <div class="col-lg-3 col-md-3 col-12">

                    <div class="p22">
                      
                       <img src="<?php echo base_url()?>assets/images/p2.png" alt="" class="privacy_img2 mr-5">
                        </div>
              </div>
              <div class="col-lg-4 col-md-4 col-12">

                    <div class="p33">
                       <img src="<?php echo base_url()?>assets/images/p3.png" alt="" class="privacy_img3">
                        </div>
              </div>
        </div>
    </div>

<div class="container" >
            <div class="row mt-5">
                <div class="col-lg-5 col-md-5 col-12">

                    <div class="">
                    	<span class="pr-pg2">
                    		* No multi-year contract
                    	</span>
                    	<br>
                    	<br>
                    	<span class="pr-pg2">
   		                 		* Quick start guide for both city/town & businesses
                    	</span>
                        </div>
              </div>
              <div class="col-lg-6 col-md-6 col-12">

                    <div class="">
                    	<span class="pr-pg2">
                    		* No setup or enrollment fee
                    	</span>
                    	<br>
                    	<br>
                    	<span class="pr-pg2">
                    		* Includes 2 "supporter" banner spots (to offset program cost if you like )
                    	</span>
                        </div>
              </div>
             
        </div>
    </div>

</div>
	
</section>
<hr>
<section class="bg-light">
	<form action="<?php echo base_url().'Front/send_contactus'?>" method="POST">
<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12">
	<div class="mt-3">
		<center>
		<span class="pb_part3">Other Questions?</span>
	</center>
	</div>
					<div class="row mt-2">			
				<div class="col-sm-3 header2">
				<label>Email:</label>
				</div>
				<div class="col-sm-7">
				<input type="email" name="email" class="form-control" required>
				</div>
			</div>
					<div class="row mt-2">			
				<div class="col-sm-3 header2">
				<label>First Name:</label>
				</div>
				<div class="col-sm-7 ">
				<input type="text" name="firstname" class="form-control">
				</div>
	        </div>

	        <div class="row mt-2">			
				<div class="col-sm-3 header2">
				<label>Last Name:</label>
				</div>
				<div class="col-sm-7 ">
				<input type="text" name="lastname" class="form-control">
				</div>
	        </div>
	        <div class="row mt-2">			
				<div class="col-sm-3 header2">
				<label>Comment:</label>
				</div>
				<div class="col-sm-7 ">
					<textarea class="form-control" name="comment">
						
					</textarea>
				</div>
	        </div>
	          <div class="row mt-2">			
				<div class="col-sm-3 header2">
				<label>Recaptcha:</label>
				</div>
				<div class="col-sm-7 header2">
           <div class="g-recaptcha" data-sitekey="6LeMa6MZAAAAAHYVDUnRy3oxy_t6dF2qFYeF2I_2"></div>
            </div>
	        </div>
	          <div class="row mt-4">			
				<div class="col-sm-3 header2">
				
				</div>
				<div class="col-sm-2  ">
				<input type="submit" name="submit" value="submit" class="btn btn-primary text-white blue_color2">
				</div>
	        </div>
    </form>
	        
	        


		</div>	
		<div class="col-lg-5 col-md-5 col-sm-12">
			<center>
		<div class="mt-3">
			<center>
				<span class="pb_part3">Ready to Enroll?</span>
			</center>
			</div>
<div class="mt-5">
	<center>
		<a href="<?php echo base_url() ?>/Front/cum_signup" title="">
				<input type="button" name="" value="Enroll Now" class="btn btn-primary text-white blue_color2">
			</a>
			</center>
				</div>
			</center>
	</div>
</body>
</html>

  <script src="https://www.google.com/recaptcha/api.js"></script>
