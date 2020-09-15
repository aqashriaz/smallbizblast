
<!-- Page Content  -->


<div id="content" class="p-4 p-md-5 pt-5">
	 <div ><h5 class="pb_particpating2 text-center">CHANGE <span class="pb_ogden2">PASSWORD</span></h5>
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

	<form action="<?php echo base_url().'Admin/change_password' ?>" name="change_password" method="post" accept-charset="utf-8">
		<div class="row mt-5">
			<div class="col-lg-3 col-md-3 col-sm-12 header2">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 header2">
				<div class="row mt-2">
					<div class="col-sm-4">

						<label>Old Password</label>
					</div>
					<div class="col-sm-8">

						<input type="password" name="oldpassword" value="" class="form-control" id="">
					</div>
				</div>
				<div class="row mt-2">
					<div class="col-sm-4">

						<label>New Password</label>
					</div>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control" id="">
					</div>
				</div>
			
			
		<div class="mt-5">
			<input class="btn text-white blue_color2" type="submit" name="submit" value="submit">
			<input class="btn btn-danger" type="button" name="cancel" value="cancel">

		</div>
			</div>
					<div class="col-lg-3 col-md-3 col-sm-12 header2">
	</div>
</div>
</form>
</div>
</div>
</body>
</html>

