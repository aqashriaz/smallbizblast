   <?php error_reporting(E_ALL & ~E_NOTICE); ?>
   
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	 <div ><h5 class="pb_particpating2 text-center">Deals Details &nbsp;<span class="pb_ogden2">DETAILS</span></h5>
</div>
<br>
<br>
 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>
	<form action="<?php echo base_url().'admin/add_community' ?>" method="post" accept-charset="utf-8">

<h5 class=" text-center">Total Deals : &nbsp;&nbsp;<span class="pb_ogden2"><?php echo $totaldeals; ?></span></h5>

	<table class="table">
		<thead>
			<tr>
				<th class="header3">Deail Detail</th>
 			</tr>
		</thead>
		<tbody>
<?php 
   if($info){


 foreach($info as $row)
		{?>

			<tr>
				<td><?php echo $row->detail1; ?></td>

				 <!-- <td>
					<a href="<?php echo $row->facebook; ?>" class="fa fa-facebook"></a>&nbsp;
					<a href="<?php echo $row->twitter; ?>" class="fa fa-twitter"></a> &nbsp;
					<a href="<?php echo $row->twitter; ?>" class="fa fa-google"></a> &nbsp;
					<a href="<?php echo $row->youtube; ?>" class="fa fa-youtube"></a> &nbsp;
					<a href="<?php echo $row->instagram; ?>" class="fa fa-instagram"></a> &nbsp;


				</td> -->
			</tr>

       <?php }

   }
   else{ ?>
          
        <tr>
          
          <h4>No Deal in this Business.</h4>	

        </tr>  
        

   <?php }
			  
	
			 
		?>			
		</tbody>
	</table>


<div><br>
						<a href="<?php echo base_url()?>/Admin/index">
								<input class="btn text-white blue_color2" type="button" name="submit" value="back">
							
						</a>
	<!-- 	<input class="btn btn-danger" type="button" name="cancel" value="cancel"> -->
</div>
</form>
</div>
</div>
</body>
</html>