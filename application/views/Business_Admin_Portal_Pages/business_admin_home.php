       <?php error_reporting(E_ALL & ~E_NOTICE); ?>
     <script>
     	function myFunction() {
     		var checkBox = document.getElementById("myCheck");
     		var text = document.getElementById("text");
     		if (checkBox.checked == false){
     			text.style.display = "block";
     		} else {
     			text.style.display = "none";
     		}
     	}
     </script>
     <!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5 container">
<div class="container-fluid">
<div>
	<h5 class="pb_particpating2 text-center">Business &nbsp;<span class="pb_ogden2">Admin Home</span> </h5>
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
<form action="<?php echo base_url().'admin/updateBusinessAdmin' ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<section class="mn_n8">
<div class="row mt-5">
<div class="col-lg-9 col-md-9 col-sm-12">
<input type="hidden" name="image" value="<?php echo $business_info->image ;?>">
<input type="hidden" name="id" value="<?php echo $business_info->id ;?>">
	<div class=" mt-3">
		<h5 class="header2"><?php echo $comunity_info->community_name; ?> &nbsp;<span class="pb_ogden3">  <?php echo $business_info->name ;?></span></h5>
	</div>
	<div class="row mt-3">
		<div class="col-sm-2 header2">
			<label for="">Physical Address:</label>
		</div>
		<div class="col-sm-4"  >
		     
			<input type="text" id="text" value="<?php echo $business_info->address ;?>" name="address" class="form-control" required>
		</div>
		<div class="col-sm-3 header2">
			<label for="">Hide Physical Address:</label>

		</div>
		<div class="col-sm-2">
			<input type="checkbox"id="myCheck"   placeholder="" name="hide" value="1" <?php echo ($business_info->hide ==1 ? 'checked' : '');?>  > 
			<i class="fa fa-question-circle" style="font-size:18px" title="If your business is home-based and you have no need (or desire) for your home address to be public, click this box and your address will not be displayed."></i>
		</div>
		<?php 
		if($_SESSION['admin_role'] != 'businessadmin'){ ?>
		<div class="col-sm-2 header2">
						<label>State:</label>
		</div>
		<div class="col-sm-6 header2">
		<label><?php echo $business_info->state ;?></label>
		</div>
		<div class="col-sm-4 header2">
	        <select name="state"   id="drop_option" class="form-control" value="Choose Option">
			<option value = "0">Change State</option>
		     <option value = "Alabama"<?php if($business_info->state=="Alabama") echo 'selected="selected"'; ?> >Alabama</option>
			<option value = "Alaska" <?php if($business_info->state=="Alaska") echo 'selected="selected"'; ?>>Alaska</option>
			<option value = "Arizona" <?php if($business_info->state=="Arizona") echo 'selected="selected"'; ?>>Arizona</option>
			<option value = "Arkansas" <?php if($business_info->state=="Arkansas") echo 'selected="selected"'; ?>>Arkansas</option>
			<option value = "California"<?php if($business_info->state=="California") echo 'selected="selected"'; ?>>California</option>
			<option value = "Connecticut"<?php if($business_info->state=="Connecticut") echo 'selected="selected"'; ?>>Connecticut</option>
			<option value = "Colorado"<?php if($business_info->state=="Colorado") echo 'selected="selected"'; ?>>Colorado</option>
			<option value = "Delaware"<?php if($business_info->state=="Delaware") echo 'selected="selected"'; ?>>Delaware</option>
			<option value = "District of Columbia"<?php if($business_info->state=="District of Columbia") echo 'selected="selected"'; ?>>District of Columbia</option>
			<option value = "Florida"<?php if($business_info->state=="Florida") echo 'selected="selected"'; ?>>Florida</option>
			<option value = "Georgia"<?php if($business_info->state=="Georgia") echo 'selected="selected"'; ?>>Georgia</option>
			<option value = "Hawaii"<?php if($business_info->state=="Hawaii") echo 'selected="selected"'; ?>>Hawaii</option>
			<option value = "Illinois"<?php if($business_info->state=="Illinois") echo 'selected="selected"'; ?>>Illinois</option>
			<option value = "Indiana"<?php if($business_info->state=="Indiana") echo 'selected="selected"'; ?>>Indiana</option>
			<option value = "Iowa"<?php if($business_info->state=="Iowa") echo 'selected="selected"'; ?>>Iowa</option>
			<option value = "Idaho"<?php if($business_info->state=="Idaho") echo 'selected="selected"'; ?>>Idaho</option>
			<option value = "Kentucky"<?php if($business_info->state=="Kentucky") echo 'selected="selected"'; ?>>Kentucky</option>
			<option value = "Kansas"<?php if($business_info->state=="Kansas") echo 'selected="selected"'; ?>>Kansas</option>
			<option value = "Louisiana"<?php if($business_info->state=="Louisiana") echo 'selected="selected"'; ?>>Louisiana</option>
			<option value = "Massachusetts"<?php if($business_info->state=="Massachusetts") echo 'selected="selected"'; ?>> Massachusetts</option>
			<option value = "Michigan"<?php if($business_info->state=="Michigan") echo 'selected="selected"'; ?>>Michigan</option>
			<option value = "Maine"<?php if($business_info->state=="Maine") echo 'selected="selected"'; ?>>Maine</option>
			<option value = "Maryland"<?php if($business_info->state=="Maryland") echo 'selected="selected"'; ?>>Maryland	</option>
			<option value = "Minnesota"<?php if($business_info->state=="Minnesota") echo 'selected="selected"'; ?>>Minnesota</option>
			<option value = "Mississippi"<?php if($business_info->state=="Mississippi") echo 'selected="selected"'; ?>>Mississippi</option>
			<option value = "Missouri"<?php if($business_info->state=="Missouri") echo 'selected="selected"'; ?>>Missouri</option>
			<option value = "Montana"<?php if($business_info->state=="Montana") echo 'selected="selected"'; ?>>Montana</option>
			<option value = "Nevada"<?php if($business_info->state=="Nevada") echo 'selected="selected"'; ?>>Nevada</option>
			<option value = "Nebraska"<?php if($business_info->state=="Nebraska") echo 'selected="selected"'; ?>>Nebraska</option>
			<option value = "New York"<?php if($business_info->state=="New York") echo 'selected="selected"'; ?>>New York</option>
			<option value = "New Mexico"<?php if($business_info->state=="New Mexico") echo 'selected="selected"'; ?>>New Mexico</option>
			<option value = "New Jersey"<?php if($business_info->state=="New Jersey") echo 'selected="selected"'; ?>>New Jersey</option>
			<option value = "North Carolina"<?php if($business_info->state=="North Carolina") echo 'selected="selected"'; ?>>North Carolina</option>
			<option value = "New Hampshire"<?php if($business_info->state=="New Hampshire") echo 'selected="selected"'; ?>>New Hampshire</option>
			<option value = "North Dakota"<?php if($business_info->state=="North Dakota") echo 'selected="selected"'; ?>>North Dakota</option>
			<option value = "Oregon"<?php if($business_info->state=="Oregon") echo 'selected="selected"'; ?>>Oregon</option>
			<option value = "Ohio"<?php if($business_info->state=="Ohio") echo 'selected="selected"'; ?>>Ohio</option>
			<option value = "Oklahoma"<?php if($business_info->state=="Oklahoma") echo 'selected="selected"'; ?>>Oklahoma</option>
			<option value = "Pennsylvania"<?php if($business_info->state=="Pennsylvania") echo 'selected="selected"'; ?>>Pennsylvania</option>
			<option value = "Puerto Rico"<?php if($business_info->state=="Puerto Rico") echo 'selected="selected"'; ?>>Puerto Rico</option>
			<option value = "Rhode Island"<?php if($business_info->state=="Rhode Island") echo 'selected="selected"'; ?>>Rhode Island</option>
			<option value = "South Carolina"<?php if($business_info->state=="South Carolina") echo 'selected="selected"'; ?>>South Carolina</option>
			<option value = "South Dakota"<?php if($business_info->state=="South Dakota") echo 'selected="selected"'; ?>>South Dakota</option>
			<option value = "Texas"<?php if($business_info->state=="Texas") echo 'selected="selected"'; ?>>Texas</option>
			<option value = "Tennessee"<?php if($business_info->state=="Tennessee") echo 'selected="selected"'; ?>>Tennessee</option>
			<option value = "Utah"<?php if($business_info->state=="Utah") echo 'selected="selected"'; ?>>Utah</option>
			<option value = "Virginia"<?php if($business_info->state=="Virginia") echo 'selected="selected"'; ?>>Virginia</option>
			<option value = "Wisconsin"<?php if($business_info->state=="Wisconsin") echo 'selected="selected"'; ?>>Wisconsin</option>
			<option value = "Washington"<?php if($business_info->state=="Washington") echo 'selected="selected"'; ?>>Washington</option>
			<option value = "West Virginia"<?php if($business_info->state=="West Virginia") echo 'selected="selected"'; ?>>West Virginia</option>
			<option value = "Wyoming"<?php if($business_info->state=="Wyoming") echo 'selected="selected"'; ?>>Wyoming</option>
						</select>
					</div>
			<?php }
			?>
		
	</div>

	<div class="row mt-3">
		<div class="col-sm-2 header2">
			<label for="">Phone:</label>

		</div>
		<div class="col-sm-4">
			<input type="Number" value="<?php echo $business_info->phone ;?>"  name="phone" class="form-control" required>
		</div>
		<div class="col-sm-2 header2">
			<label for="">Public Email:</label>

		</div>
		<div class="col-sm-4">
			<input type="Email" value="<?php echo $business_info->email ;?>" name="email" class="form-control" required>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">

			<div class="row mt-3">
				<div class="col-sm-4 header2">
					<label for="">Username:</label>
				</div>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $business_info->username ;?>"  name="username" required class="form-control">
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-sm-4 header2">
					<label for="">Password:</label>

				</div>
				<div class="col-sm-8">
					<input type="text" value="<?php echo $business_info->password ;?>" name="password" required class="form-control">
				</div>
			</div>
			<?php if($business_info->license){?>
				<div class="row mt-3">
					<div class="col-sm-4 header2">
						<label for="">Business license</label>

					</div>
					<div class="col-sm-8">
						<input type="text" value="<?php echo $business_info->license ;?>" name="license" required class="form-control">
					</div>
				</div>
			<?php }
			?>
		</div>
<div class="col-sm-6">
<div class="row mt-3">
	<div class="col-sm-4 header2" >
		<label for="">Business logo:</label>
		<br>
	</div>
	<div class="col-sm-8">
		<img src="<?php echo $business_info->image;?>" height="100px" >
	</div>
</div>
	<div class="row">
		<input type="file" name="image">
		<p class="header2" align="justify">Please upload images in png or gif formats ONLY</p>
	</div>
</div>
	</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12">
	<?php if($comunity_info->administrative_notice){ ?>
		<div class="box adminsitrative_notice1">
			<div class="box-title1 table8 text-white">
				<h6 class="text-white"><u>Administrative Notice:</u></h6>
				<p  class="box-title1"><?php echo $comunity_info->administrative_notice; ?></p>
			</div>
		</div>
	<?php }?>	
</div>
</div>	
</section>
<hr>
<section class="mt-4">
<div class="row ">
<div class="col-lg-8 col-md-8 col-sm-12">
	<div class="row mt-3">

		<div class="col-sm-2">

			<label class="header2">website:</label>
		</div>
		<div class="col-sm-5">
			<input type="text" name="website"  value="<?php echo $business_info->website ;?>" class="form-control">
		</div>
	</div>
	<div class="row mt-2">

		<div class="col-sm-2">

			<label class="header2">Facebook:</label>
		</div>
		<div class="col-sm-5">
			<input type="text" name="facebook"  value="<?php echo $business_info->facebook ;?>" class="form-control">
		</div>
	</div>
	<div class="row mt-2">

		<div class="col-sm-2">

			<label class="header2">Instagram:</label>
		</div>
		<div class="col-sm-5">
			<input type="text" name="instagram"  value="<?php echo $business_info->instagram ;?>" class="form-control">
		</div>
	</div>
	<div class="row mt-2">

		<div class="col-sm-2">

			<label class="header2">Twitter:</label>
		</div>
		<div class="col-sm-5">
			<input type="text" name="twitter"  value="<?php echo $business_info->twitter ;?>" class="form-control">
		</div>
	</div>
	<div class="row mt-2">

		<div class="col-sm-2">

			<label class="header2">Youtube:</label>
		</div>
		<div class="col-sm-5">
			<input type="text" name="youtube"  value="<?php echo $business_info->youtube ;?>" class="form-control">
		</div>
	</div>


	</div>
	<div class="col-lg-4 col-md-4 col-sm-12">

		<div class="margin_btn8 box">
			<div class="header3  rounded">
				<p class="header2 ml-1">Physical Distancing Adjustment or Precautions Your Business is Making:
					<i class="fa fa-question-circle" style="font-size:18px" title="This is where you can post any adjustments your business is making to accommodate the physical distancing guidance being offered. Any assurances you may offer potential customers can be posted here."  ></i></p>
				</div>
				<div class="text-white float-right textarea2" cols="50" >
					<textarea class="textarea3 " name="covid"> 
						<?php echo $business_info->covid;  ?>
					</textarea>
				</div>
			</div>
		</div>
		<div class="row mt-5">
		<input type="submit" class="btn btn-primary blue_color2" name="" value="Update">
	&nbsp;&nbsp;&nbsp;
			<input type="button" class="btn btn-danger" name="cancel" value="cancel">						
	</div>
</section>
</form>

</div>
</div>

		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     </body>
     </html>

     <script type="text/javascript">
     	$(document).ready(function(){
    var maxField = 5000; //Input fields increment limitation
    var addButton = $('.add_number_field'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
  var fieldHTML += '<input type="file" name="change_image" value=""/>'; //choose image 
    var x = 1; //Initial field counter is 1
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

});
     	for(var targets = document.querySelectorAll('[data-draggable="target"]'), 
     		len = targets.length, 
     		i = 0; i < len; i ++)
     	{
     		targets[i].setAttribute('aria-dropeffect', 'none');
     	}
     </script>


