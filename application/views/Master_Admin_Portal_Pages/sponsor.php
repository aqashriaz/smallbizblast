  
		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			 <div class="container-fluid" >
			 	<div>
              	<h5 class="pb_particpating2 text-center">INPUT <span class="pb_ogden2">SPONSOR </span>LOGOS</h5>
				</div>

         	<?php echo form_open_multipart('admin/multiple_files');?>
					<form action="<?php echo base_url().'admin/left_sponsor'?>" method="post" accept-charset="utf-8" enctype="multipart/form_data" >
				<div class="row">
					<div class="col-sm-4 mt-5">
					<div class="">
					<label class="header3"><b>Select</b>  <span class="pb_ogden3">Communities</span></label>
					</div>
					<?php 
					if ($communities->num_rows()>0)

					{
						foreach($communities->result() as $row)
						{
							?>
					 <div class="header2" >
					 	          
					 	        <!-- <input type="text" name="community_name" value="<?php echo $row->community_name; ?>" > -->
								<input type="radio" name="community_id" value="<?php echo $row->id; ?>" required >
								<span><?php echo $row->community_name; ?></span>

 
							</div>
					 <?php
						}
					}
					else{
						?>
						<tr>
							<td colspan="6">
								<div class="alert alert-primary" role="alert">
                             No Community is yet. !
                             </div>
                         </td> 
						</tr>
								<?php
							}

							?> 
					</div>
					<div class="col-sm-6 mt-5">
				<div class="header2 ">
					<label><b>Upload </b><span class="pb_ogden3">Logos</span></label>
					<i class="fa fa-question-circle" style="font-size:18px" title="Please upload images in png or gif formats ONLY."></i>
				</div>
				<div class="row">
					<div class="col-sm-6">
                   <input type="file" multiple="multiple" name="image[]" class="form-control" required />					<span><b>Left Banner</b></span>
				</div>
				<div class="col-sm-6">
           <input type="file" multiple="multiple" name="image[]" class="form-control" required />                     
                 <span><b>Right Banner</b></span>
				</div>
				
						<div class="mt-3">
							<input type="submit" name="submit" value="Submit" class="btn text-white blue_color2 mt-1">
						</div>

				</div>
					</div>
			</div>
		</form>
		</div>

  
	<hr>

		<div class="container-fluid mt-5">
		<div>
 	      	<h5 class="pb_particpating2 text-center">List of <span class="pb_ogden2">Sponsor </span>Images</h5>
     	</div>
     	         		<?php echo form_open_multipart('admin/multiple_files');?>
				<form action="" method="post" accept-charset="utf-8" enctype="multipart/form_data">
     	<table class="table">
     		<thead class="">
     			<tr>
     				<th>Community name</th>
     				<th>Left Image</th>
     				<th>Right Image</th>
     				<th>Delete </th>
     				
     				

     			</tr>
     		</thead>
     			<?php 
					if ($sponsor_img->num_rows()>0)

					{
						foreach($sponsor_img->result() as $row)
						{
							?>
     		<tbody>
     			<tr>
     				<td><?php echo $row->community_name; ?></td>
					   <td class="" style="height: 100px;"><img src="<?php echo $row->image ?>"  height="100px" width="100px"></td>
					   <td class="" style="height: 100px;"><img src="<?php echo $row->image1 ?>"  height="100px" width="100px"></td>
					   
					   <td>
					   	<?php echo anchor('admin/deleteSponser?id='.$row->id, '<i class="nav-icon fa fa-trash"></i>', 'id="$row->id"'); ?>
					   </td>

					 
     			</tr>
     		</tbody>
     			 <?php
						}
					}
					else{
						?>
						<tr>
							<td colspan="6">
								<div class="alert alert-primary" role="alert">
                             No sponsor image is uploaded yet. !
                             </div>
                         </td> 
						</tr>
								<?php
							}

							?> 
     	</table>


</form>
		</div>
	</div>
</div>

		</body>
		</html>
