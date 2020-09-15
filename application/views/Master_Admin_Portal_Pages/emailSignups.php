
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	 <div ><h5 class="pb_particpating2 text-center"><?php echo $info->community_name;  ?>  &nbsp;&nbsp;<span class="pb_ogden2">DETAILS</span></h5>
</div>
<br>
<br>
 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>
	<form action="<?php echo base_url().'admin/metrics' ?>" method="post" accept-charset="utf-8">

 <h5 class=" text-center">Total Emails: &nbsp;&nbsp;<span class="pb_ogden2"><?php echo $totalemails; ?></span></h5>

		
	<table class="table">
		<thead>
			<tr>
				<th class="header3">Email Address</th>
				<th class="header3">Status</th>
				 
			</tr>
		</thead>
		<tbody>
<?php 
			  
	 foreach($emails as $row)
		{?>

			<tr>
				<td><?php echo $row->email; ?></td>

				<td><?php echo $row->email_status; ?></td>

				<!-- <td>
					<a href="<?php echo $row->facebook; ?>" class="fa fa-facebook"></a>&nbsp;
					<a href="<?php echo $row->twitter; ?>" class="fa fa-twitter"></a> &nbsp;
					<a href="<?php echo $row->twitter; ?>" class="fa fa-google"></a> &nbsp;
					<a href="<?php echo $row->youtube; ?>" class="fa fa-youtube"></a> &nbsp;
					<a href="<?php echo $row->instagram; ?>" class="fa fa-instagram"></a> &nbsp;


				</td> -->
			</tr>

       <?php }
			 
		?>			
		</tbody>
	</table>


<!-- <div>
	<<button type=""><br><a href="<?php echo base_url()?>/Admin/index">
		<input class="btn text-white blue_color2" type="submit" name="submit" value="back">
		</a>
		
	 
</div> -->
	<input class="btn text-white blue_color2" type="submit" name="submit" value="back">
</form>
</div>
</div>
</body>
</html>