   
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	 <div ><h5 class="pb_particpating2 text-center">BUSINESSES &nbsp;<span class="pb_ogden2">DETAILS</span></h5>
</div>
<br>
<br>
 <p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>
	<form action="<?php echo base_url().'admin/metrics' ?>" method="post" accept-charset="utf-8">
		<div class="totalemail">
		    <!-- <center><label class="header2"><b>Deals Posted :</b>  <span class="pb_ogden3"><?php	echo  $total; ?></span></label></center> -->
					
				</div>
	<table class="table">
		<thead>
			<tr>
				<th class="header3">Business Name</th>
				 <th class="header3">Number of deals</th>
			</tr>
		</thead>
		<tbody>
<?php 
   if($reg){ 

 foreach($reg as $row)
		{?>

			<tr>
				<td><?php echo $row['name']; ?></td>

				 <td>
					 
                    <?php echo $row['s']; ?>

				</td>
			</tr>

       <?php }

   }
   else{ ?>
          
        <tr>
          
          <h4>No business in this comunity.</h4>	

        </tr>  
        

   <?php }
			  
	
			 
		?>			
		</tbody>
	</table>


<div><br>
		<input class="btn text-white blue_color2" type="submit" name="submit" value="back">
	<!-- 	<input class="btn btn-danger" type="button" name="cancel" value="cancel"> -->
</div>
</form>
</div>
</div>
</body>
</html>