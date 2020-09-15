   <?php error_reporting(E_ALL & ~E_NOTICE); ?>
   
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
	<div class="container-fluid" >
		<div>
			<h5 class="pb_particpating2 text-center">DISPLAYED FOR ALL <span class="pb_ogden2">DEALS DETAILS </span></h5>
		</div>
		<hr>
				<div class="row mt-5">
					<div class="col-lg-8 col-md-8 col-sm-12 m-auto">
						<div class="">
						<label><b>Total # of Deals Clicked/Viewed :</b> <span class="pb_ogden3">  <?php echo  $sumClicks; ?></span></label>
				</div>
						<div class="">
	<table  class="table9" name="Email_signUp">
	
							<?php 
							if ($deals_info)
							{
							foreach($deals_info as $row)
							{
							?>
								<tr>
								<td width="90%"><?php echo $row->detail1; ?> </td>
								<td width="90%"><?php echo $row->count; ?> </td>

 								</tr>
			
							 <?php
							}
							}
							else{
							?>
							<tr>
							<td colspan="6">
							<div class="alert alert-primary" role="alert">
							No Record Found. !
							</div>
							</td> 
							</tr>
							<?php
							}

							?> 
	
	</table>
					</div>
				
						<div style="margin-top: 150px;">
							<form action = "<?php echo base_url().'admin/business_metrics?id='?><?php echo $_SESSION['businessid']; ?>"  method="post">
								<div>
							<?php if($from) {?>

								<h5> Showing Result</h5>
                           

							 <p><?php  echo $from; ?>  <strong>to</strong>   <?php echo $to; ?> </p>
							<?php }
							 ?><br>
							

						</div>

					     
						 
					 
					 

                     <div class=" col-sm-1 mt-2">
					    <a  class="nav-link"  href="<?php echo base_url()?>/Admin/index" class="">
							<input type="submit" name="index" value="Back" class="btn text-white bg-danger">
						</a>
						</div>
</div>
					 
						
						</form>
					</div>
					</div>


				<?php if($comunity_info->administrative_notice){ ?>

					<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
						<div class="box adminsitrative_notice1">
							<div class="box-title1 table8 text-white">
								<h6 class="header3"><u>Administrative Notice:</u></h6>
								<p class="header2"><?php echo $comunity_info->administrative_notice; ?></p>
							</div>
						</div>
					</div>
<?php }?>
				</div>		
			</form>

		</div>

	</div>
</div>

</body>
</html>
<!-- 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> 
<script src="/javascripts/application.js" type="text/javascript" charset="utf-8" async defer>
$("#date1").val("");
$("#date2").val("");
$('submit').click(function() {
	var x=1;
	var date1=$('#date1').val();
	var date2=$('#date2').val();
	var key=$('#key').val();
	if (key=="" && date1=="" &&date2="") {

		$("#key").attr("placeholder","#product was incorrect").val("").focus().blur();
		$("#date1").val("");
		$("#date2").val("");
		$("#submit").attr("disabled",true);
		$('#message1').append("<tr><td> colspan='4'><b>not found</b></td></tr>");
		setTimeout(function(){
		$("#submit").attr("disabled",false);
		$('message1 tbody').empty();
		$("input").focus();
	},1000);
}else {
	$.ajax({
		type:"POST",
		url:"search",
		data:{
			"key"
		}

	})
}

	}
});	
</script>
<script>
	$('#date1').datepicker({
		format:"mm/dd/yyyy",
		autoclose:true;
		todayHighlight:true
	});
	$('#date2').datepicker({
		format:"mm/dd/yyyy",
		autoclose:true;
		todayHighlight:true
	});

</script> -->