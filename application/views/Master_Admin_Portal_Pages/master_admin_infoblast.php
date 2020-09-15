  
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	<div class="container-fluid"> 
		<div >
			<h5 class="pb_particpating2">SEND EMAIL TO ACTIVE <span class="pb_ogden2">COMMUNITIES</span> OR <span class="pb_ogden2">ACTIVE BUSINESS</span></h5>
		</div>

 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>

		<form action="<?php echo base_url().'admin/sendemail'?>" method="post" accept-charset="utf-8">
			<div class="container">
				<div class="row mt-5">



					<div class="col-sm-2">
						<label> Send to:</label>
					</div>
					<div class="col-sm-4">
		<!-- 	 <input type="text"  name="email" class="form-control">	 
		-->	 	 <select name="active" id="drop_option" class="form-control" value="Choose Option">
			<option value="communities">Active Communities</option>
			<option value="business" selected>Active Businesses</option>
		</select> 	
	</div>
</div>
<div class="row mt-2">

	<div class="col-sm-2 header2">
		<label> Cc:</label>
	</div>
	<div class="col-sm-4">
		<input type="email"  name="cc" class="form-control" >	 	
	</div>
</div>
<div class="row mt-2 ">

	<div class="col-sm-2 header2">
		<label> Bcc:</label>
	</div>
	<div class="col-sm-4">
		<input type="email"  name="bcc" class="form-control" >	 	
	</div>
</div>
<div class="row mt-2">

	<div class="col-sm-2 header2">
		<label> Subject Line:</label>
	</div>
	<div class="col-sm-4">
		<input type="text"  name="subjectline" class="form-control" required>	 	
	</div>
</div>
<div class="row mt-2 ">

	<div class="col-sm-2 header2">
		<label></label>
	</div>
	<div class="col-sm-6">
		<textarea name="message"  rows="15" cols="90" class="textarea1 text_area4" ></textarea>	 
	</div>
</div>
<div class="row mt-2">

	<div class="col-sm-2">
		<label></label>
	</div>
	<div class="col-sm-4 header2">
		<input type="submit" value="Send Mail" class="btn text-white blue_color2 mt-1">
	</div>
</div>
</div>
</form>
</div>	
</div>
</div>
</body>
</html>