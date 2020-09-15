   <?php error_reporting(E_ALL & ~E_NOTICE); ?>
 
	<!-- Page Content  -->
	<div id="content" class="p-4 p-md-5 pt-5 container">
		<div class="container-fluid">

				<div class="">
						<h5 class="pb_particpating1 text-center"><span class="pb_ogden1">Change Status</span> DEALS</h5>
					</div>
					
			<form action="<?php echo base_url().'admin/dealStatus' ?>" class="form-group" method="post" accept-charset="utf-8">
				<input type="hidden" name="id" value="<?php echo $deal->id ?>">
				<input type="hidden" name="business_id"  value="<?php echo $_GET['id'] ?>">
				<div class="row mt-5">
					<div class="col-lg-8 col-md-8 col-sm-12">
						<div class="header2">
							<label>Deal Title:</label>
				<input type="text" class="form-control" name="detail1" value="<?php echo $deal->detail1 ?>" readonly>
								</div>
                               <div class="header2" style="display: none;">
									
									<label>Click</label>
 		                     		<textarea id="result"  name="count" class="form-control" >  </textarea>
							 
								</div>

								<div class="header2">
									
									<label>Deal Details:</label>
							<input type="Text" class="form-control" name="detail2" value="<?php echo $deal->detail2 ?>" >
								</div>
							<div class="header2">
									<label>Deal Limitations/Exclusions:</label>
									<input type="Text" class="form-control" name="limitation" value="<?php echo $deal->limitation ?>" >
								</div>
								<div class="header2">
									<label>Change Status</label>

                                 <select class="form-control" name="status" required >
										<option>Choose Status</option>
										<option value="1">Active</option>
										<option value="0">Pending</option>
										<option value="2">In Active</option>
						       </select>
						   </div>

								 
				        
                             <div class="header2 mt-5 ">
									<input class="btn btn-primary blue_color2" type="submit"  onclick="clickCounter()" name="" value="Update Status">
									
								</div>
								


								
							</div>
					

                   

				</div>		
			</form>

		</div>

	</div>
</div>

</body>
</html>

<script>
function clickCounter() {
  if (typeof(Storage) !== "undefined") {
    if (localStorage.clickcount) {
      localStorage.clickcount = Number(localStorage.clickcount)+1;
    } else {
      localStorage.clickcount = 1;
    }
    document.getElementById("result").innerHTML = localStorage.clickcount ;
  } else {
    document.getElementById("result").innerHTML = "0";
  }
}
</script>

