   	 
	<!-- Page Content  -->
	<div id="content" class="p-4 p-md-5 pt-5 container">
		<div class="container-fluid">
			<div>
				<h5 class="pb_particpating2 text-center">ADD NEW <span class="pb_ogden2">BUSINESS DEALS</span> </h5>
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


			<?php echo form_open_multipart('admin/uploadPic');?>
			<form action="<?php echo base_url().'admin/addDeal' ?>" class="form-group" method="post" enctype="multipart/form_data"  accept-charset="utf-8">
				<input type="hidden" name="business_id" value="<?php echo $business_info->id;  ?>">
				<input type="hidden" name="business_name" value="<?php echo $business_info->name;  ?>">
				<input type="hidden" name="business_logo" value="<?php echo $business_info->image;  ?>">

				<input type="hidden" name="cityname" value="<?php echo $comunity_info->community_name;  ?>">
				<input type="hidden" name="city_id" value="<?php echo $comunity_info->id;  ?>">

				<div class="row mt-5">
					<div class="col-lg-8 col-md-8 col-sm-12">
						<!-- <?php if($comunity_info->welcome_text){ ?>

							<div class="box adminsitrative_notice1">
								<div class="box-title1">
									<h5 class="text-white">Deal Guidelines /Requirements:</h5>
									<p class=""><?php echo $comunity_info->welcome_text; ?></p>
								</div>
							</div>

						<?php }?>	 -->

						<div class="row mt-3">
							<div class="col-sm-4 header2">
								<label for="">Deal Title(40 characters):</label>

							</div>
							<div class="col-sm-8">
								<input type="text" placeholder="example : 35% off all Pens" name="detail1" class="form-control" maxlength="40" required>
							
							</div>
						</div><div class="row mt-3">
							<div class="col-sm-4 header2">
								<label for="">Deal Details(150 characters):</label>

							</div>
							<div class="col-sm-8">
								<input type="text" placeholder="" name="detail2" class="form-control"  maxlength="150" required>
								<i class="fa fa-question-circle" style="font-size:18px" title="Because the Deal Title only allows 40 characters, this is where you can offer additional detail about the deal your giving."></i>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-4 header2">
								<label for="">Limitations/Exclusions:(150 characters):</label>
							</div>
							<div class="col-sm-8">
								<input type="text" placeholder="" maxlength="150" name="limitation" class="form-control" required>
								<i class="fa fa-question-circle" style="font-size:18px" title="This is where you can tell customers that they need to mention this ad or that the deal only lasts while supplies last or perhaps limiting the number of deal products per customer. "></i>
							</div>
						</div>
					</div>

					<?php if($comunity_info->administrative_notice){ ?>

						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="box adminsitrative_notice1">
								<div class="box-title1 table8 text-white">
									<h5 class="text-white" >Administrative Notice:</h5>
									<p class="box-title1"><?php echo $comunity_info->administrative_notice; ?></p>
								</div>
							</div>
						</div>
					<?php }?>	

				</div>
				<hr>

				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="row mt-1">
							<div class="col-sm-6">
								<label class="header2">Deal Image:</label>
							</div>
							<div class="col-sm-6 form-control"> 
								<?php echo form_upload(['name'=>'userfile']);?>
								<i class="fa fa-question-circle mt-1" style="font-size:18px" title="Please upload images in png or gif formats ONLY."></i>
							</div>
							 <br>
							
						</div>
						<div class="mt-4 header2">
							<p>
								Note: if you choose not to upload a deal specific image , your business logo will display in its place.
							</p>
						</div>
					</div>
					<div class="col-lg-5 col-md-6 col-sm-12">
						<div><p class="header2" >
						This deal will remain in ‘pending’ status until the next website update/weekly email and will be active for one week from that day.  New deals are posted/emailed each (day of the week chosen by <?php echo $comunity_info->community_name; ?>  admin) morning
							<!--<a href="#" title="">WEB</a>-->
						</p>

					</div>
					<div class="margin_btn5">

						<input type="submit" class="btn btn-primary blue_color2" name="" value="Submit">
						<input type="button" class="btn btn-danger" name="Cancel" value="Cancel">
					</div>
				</div>

			</div>
		</form>
	</div>

	</div>
	</div>

	</body>
	</html>

