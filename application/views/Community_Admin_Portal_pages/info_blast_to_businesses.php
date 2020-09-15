
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	<div class="container-fluid">
		<div >
			<h5 class="pb_particpating2 text-center">SEND EMAIL TO <span class="pb_ogden2">PARTICIPATING BUSINESSES</span></h5>
		</div>
		              <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>

		<form action="<?php echo base_url().'admin/communityEmails'?>" method="post" accept-charset="utf-8">
			<div class="container">
				<div class="row mt-5">

					<div class="col-sm-2 header2">
						<label><b>Select Recipient :</b></label>
					</div>
					<div class="col-sm-4">
		<!-- 	 <input type="text"  name="email" class="form-control">	 
		-->	 	  <select name="active" id="drop_option" class="form-control" value="Choose Option">
			<option value="all">ALL</option>
			<option value="active">ACTIVE ONLY</option>
			<option value="inactive">INACTIVE ONLY</option>
		</select> 	
	</div>
</div>
 
<div class="row mt-2">

	<div class="col-sm-2 header2">
		<label><b>Subject Line:</b></label>
	</div>
	<div class="col-sm-4">
		<input type="text"  name="subjectline" class="form-control" required>	 	
	</div>
</div>
<div class="row mt-2 ">

	<div class="col-sm-2 header2">
		<label class="header2"><b>Message :</b></label>
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