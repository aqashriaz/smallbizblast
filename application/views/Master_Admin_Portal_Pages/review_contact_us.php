 
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

	<div >
		<div class="mt-5" ><h5 class="pb_particpating2 text-center mt-2">USER <span class="pb_ogden2">REVIEW </span></h5>
		</div> 

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

	<div class=" container ">

		<form action="<?php echo base_url().'Front/'?>" method="post" accept-charset="utf-8" class="status_update" id="status">
			<table class=" table header2 form-group mt-5">
				<thead class="">
					<tr>
						<th style="width: 20%;">Email</th>
						<th style="width: 15%;">First Name</th>
						<th style="width: 15%;">Last Name</th>
						<th style="width: 30%;">Comment</th>
						<th style="width: 20%;">Time</th>


					</tr>
				</thead>
				<tbody class="card-body">
					<?php 
					if ($contactus->num_rows()>0)

					{
						foreach($contactus->result() as $row)
						{
							?>
							<tr>
								<td><?php echo $row->email; ?></td>
								<td><?php echo $row->firstname; ?></td>
								<td><?php echo $row->lastname; ?></td>
								<td><?php echo $row->comment; ?></td>
								<td><?php echo $row->time; ?></td>

							
							</tr>
							<?php
						}
					}
					else{
						?>
						<tr>
							<td colspan="6"> <div class="alert alert-primary" role="alert">
								No one user comment yet. !
							</div></td> 
							<tr>
								<?php
							}

							?> 
						</tr>
					</tr>
				</tbody>	
			</tbody>
		</table>

	</form>



</body>
</html>





