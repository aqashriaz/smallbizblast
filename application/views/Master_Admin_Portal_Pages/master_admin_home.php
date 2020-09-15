 
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">

	<div >
		<div class="mt-5" ><h5 class="pb_particpating2 text-center mt-2">WELCOME <span class="pb_ogden2">DAVEMOSS </span>TO <span class="pb_ogden2">MASTER ADMIN </span></h5>
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

	<div class="row mt-5">
		
		<div class="col-lg-2 col-md-2 col-sm-12"></div>
		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="box adminsitrative_notice1">
				<div class="box-title1 text-white">

					<h6 class="header3"><span class="fa fa-user mr-3"> Total Communities:</span></h6>
					<p><?php echo  $com_active1; ?></p>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-12">
			<div class="box adminsitrative_notice1">
				<div class="box-title1 text-white">
					<h6 class="header3"><span class="fa fa-user mr-3"> Total Businesses:</span></h6>
					<p><?php echo  $bus_active1; ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class=" container ">

		<form action="<?php echo base_url().'admin/updateAdmin'?>" method="post" accept-charset="utf-8" class="status_update" id="status">
			<table class=" table header2 form-group mt-5">
				<thead class="">
					<tr>
						<th>Communites</th>
						<th>State</th>
						<th>Status</th>
						<th style="width: 100px;">Action</th>
						<th>&nbsp;</th>

					</tr>
				</thead>
				<tbody class="card-body">
					<?php 
					if ($communities->num_rows()>0)

					{
						foreach($communities->result() as $row)
						{
							?>
							<tr>
								<td><?php echo anchor('admin/adminhome?id='.$row->id, $row->community_name , 'id="$row->id"'); ?></td>
								<td><?php echo $row->state; ?></td>
								<td><?=(($row->status==0)?'Pending':(($row->status==1)?'Active':'Rejected'))?></td>
								
								<td>
									<?php echo anchor('admin/viewComunity?id='.$row->id, '<i class="nav-icon fa fa-edit"></i>', 'id="$row->id"'); ?>
								</td>			
								

								<td>
									<?php echo anchor('admin/deleteComunity?id='.$row->id, '<i class="nav-icon fa fa-trash"></i>', 'id="$row->id"'); ?>
								</td>
								
							</tr>
							<?php
						}
					}
					else{
						?>
						<tr>
							<td colspan="6"> <div class="alert alert-primary" role="alert">
								No Community is registered yet. !
							</div></td> 
							<tr>
								<?php
							}

							?> 
						</tr>
					</tr>
				</tbody>	
				
			</table>

		</form>



	</body>
	</html>





