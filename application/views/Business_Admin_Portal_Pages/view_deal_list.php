
<?php error_reporting(E_ALL & ~E_NOTICE); ?>

<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5 container">
	<div class="container-fluid">
		<form action="" class="form-group" method="get" accept-charset="utf-8">
			<div class="">
				<h5 class="pb_particpating1 text-center">VIEW <span class="pb_ogden1">DEALS</span> LIST</h5>
			</div><br>

			<p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>



			<div class="row mt-5">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<table class=" table header2 form-group mt-5">
						<thead class="">
							<tr>
								<th>Deal Details</th>
								<th>Date Posted</th>
								<th>Status</th>
								<th style="width: 100px;">Action</th>
								<th>&nbsp;</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody class="card-body">
							<?php 
							if ($deal_info)
							{
								foreach($deal_info as $row)
								{
									?>
									<tr>
										<td><?php echo $row->detail1; ?></td>
										<td><?php echo $row->dateposted; ?></td>
										<td><?=(($row->status==0)?'Pending':(($row->status==1)?'Active':'inactive'))?></td>


										<td>
											<?php  
											if($_SESSION['admin_role'] == 'businessadmin'){
												echo anchor('admin/business_reactive_deals?id='.$row->id, 'View', 'id="$row->id"');
											} else{ ?> 
												<a href="<?php echo site_url("admin/business_reactive_deals?id2=".$row->id."&id=".$_GET["id"]);?>" />View</a>
											<?php }


											?>
										</td>
										<!--<td>
											<a href="<?php echo site_url("admin/editDeal?id2=".$row->id."&id=".$_GET["id"]);?>" />Edit</a>
										</td>-->
										<td>
											<?php echo anchor('admin/cancelDeal?id='.$row->id, 'Cancel', 'id="$row->id"'); ?>
										</td>



									</tr>
									<?php
								}
							}
							else{
								?>
								<tr>
									<td colspan="6"> <div class="alert alert-primary" role="alert">
										No deal found. !
									</div></td> 
									<tr>
										<?php
									}

									?> 
								</tr>
							</tr>
						</tbody>	
					</table>

				</div>
				<div class="col-lg-4 col-md-4 col-sm-12">
					<?php if($comunity_info->administrative_notice){ ?>
						<div class="box adminsitrative_notice1">
							<div class="box-title1 table8 text-white">
								<h5 class="text-white">Administrative Notice:</h5>
								<p class="header2"><?php echo $comunity_info->administrative_notice; ?></p>
							</div>
						</div>
					<?php }?>	
				</div>

			</div>		
		</form>
	</div>
</div>

</body>
</html>

