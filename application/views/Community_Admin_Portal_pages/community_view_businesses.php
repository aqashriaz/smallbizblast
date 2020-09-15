      <?php error_reporting(E_ALL & ~E_NOTICE); ?>
  

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			<div class="container-fluid">
						<h5 class="pb_particpating2 text-center">Participating Businesses</h5>
						<h5 class="pb_ogden2 text-center"><?php echo $community_name; ?></h5>
					</div>
				 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>

				<div class="container-fluid">
					<form action="" method="post" class="view_business" accept-charset="utf-8">
					
					<table class="table header2">
						<thead>
							<tr class="card_bobs1">
								<td>Business Name</td>
								<td> Status</td>
								<td>Activated</td>
								<td>Deactivated</td>
							</tr>
						</thead>
						<tbody class="table">
 	 	<?php 
 
					if ($admin_info)

					{
						foreach($admin_info as $admin_info)
						{
							?>
							<tr>
								<!-- <td><?php echo  $admin_info->name; ?></td> -->
                                       
                               <?php if($_SESSION['admin_role'] != 'businessadmin')  { ?>
                                    
                                    <td><?php echo anchor('admin/adminbusiness?id='.$admin_info->id, $admin_info->name , 'id="$admin_info->id"'); ?></td>
                           
                               <?php } else { ?>
                                  <td><?php echo $admin_info->name;  ?></td>
                                    
                              <?php }
                                 ?>
								
								<td>
									<?=(($admin_info->status==0)?'Pending':(($admin_info->status==1)?'Active':'Inactive'))?> 
								</td>
								<td><?php echo  $admin_info->activated; ?></td>
								<td><?php echo  $admin_info->deactivated; ?></td>
							   <td>
					            	<!-- <?php echo anchor('admin/editbusiness?id='.$admin_info->id,  '<i class="nav-icon fa fa-edit"></i>', 'id="$admin_info->id"'); ?> -->

					            	<a href="<?php echo site_url("admin/editbusiness?id2=".$admin_info->id."&id=".$_GET["id"]);?>" / class="btn btn-primary blue_color2" >Info/Status</i></a>

					            </td>			
                   

								<!-- <td>
								 <?php echo anchor('admin/deletebusiness?id='.$admin_info->id, '<i class="nav-icon fa fa-trash"></i>', 'id="$admin_info->id"'); ?>
								</td>-->
							</tr>
 
					 		<?php
						}
					}
					else{
						?>
						<tr>
							<td colspan="6"> <div class="alert alert-primary" role="alert">
                             No business is registered yet. !
                             </div></td> 
							<tr>
								<?php
							}

							?> 
						</tbody>
					</table>
				</form>
				</div>
			</div>
		</div>

	</body>
	</html>
