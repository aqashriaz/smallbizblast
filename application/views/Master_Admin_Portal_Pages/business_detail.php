 
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	 <div ><h5 class="pb_particpating2 text-center">BUSINESSES<span class="pb_ogden2">DETAILS</span></h5>
</div>
 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>
	<form action="<?php echo base_url().'admin/add_community' ?>" method="post" accept-charset="utf-8">
		
	<table class="table">
		<thead>
			<tr>
				<th class="header3">Business Name</th>
				<th class="header3">View Details</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>abc</td>
				<td><a href="" title="">view detail</a></td>
			</tr>
		</tbody>
	</table>


<div>
		<input class="btn text-white blue_color2" type="submit" name="submit" value="submit">
		<input class="btn btn-danger" type="button" name="cancel" value="cancel">
</div>
</form>
</div>
</div>
</body>
</html>