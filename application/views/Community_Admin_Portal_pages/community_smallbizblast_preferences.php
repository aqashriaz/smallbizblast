   <!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5">
			<div class="container-fluid">
				<div class="container-fluid">
						<h5 class="pb_particpating1">SMALL <span class="pb_ogden1">BIZ BLAST </span>PREFERENCES</h5>
					</div><br>
					<p class="text-primary text-center"><?php echo $this->session->flashdata('success'); ?></p>
					<form action="<?php echo base_url().'admin/updatePrefrences' ?>" method="post" accept-charset="utf-8">
						<?php if($_SESSION['admin_role'] == 'davemoss')
						{ ?>
                        <input type="hidden" name="comunity_id" value="<?php echo $_GET['id']; ?>">						
						<?php }
						?>
						<div class="header2 mt-5">
							<strong>
									Frequencey of Email to Residents:
								</strong>
						</div>
						<div class="row header2 mt-2">
							<div class="col-sm-1">
								
									<input type="checkbox" name="email_frequency" value="1"<?php echo ($info->email_frequency == '1' ? 'checked' : '');?>>   
							</div>
							<div class="col-sm-6">
								
							<label>Email once per week(Standard)</label>
							</div>
						</div>
						<div class="row header2 mt-2">
							<div class="col-sm-1">
								
									<input type="checkbox" name="email_frequency" value="twice"  <?php echo ($info->email_frequency =='twice' ? 'checked' : '');?> >   
							</div>
							<div class="col-sm-6 header2">
								
							<label>Email twice per week(the website only updates once per week so the same email/deals is sent twice)</label>
							</div>
						</div>
						<div class="header2">
							<strong>Select day when new deals are posted:</strong>
						</div>
						<div class="row header2 mt-2">
							<div class="col-sm-2 mt-5">
								
								<select name="day_frequency" id="drop_option" class="form-control" value="Choose Option">
										<option value="0" selected>Select Day</option>
										<option value="Thursday" <?php if($info->day=="Thursday") echo 'selected="selected"'; ?> >Thursday</option>
										<option value="Friday" <?php if($info->day=="Friday") echo 'selected="selected"'; ?> >Friday</option>
										<option value = "Saturday" <?php if($info->day=="Saturday") echo 'selected="selected"'; ?> >Saturday</option>
										<option value = "Sunday" <?php if($info->day=="Sunday") echo 'selected="selected"'; ?> >Sunday</option>
										<option value = "Monday" <?php if($info->day=="Monday") echo 'selected="selected"'; ?> >Monday</option>
										<option value = "Tuesday" <?php if($info->day=="Tuesday") echo 'selected="selected"'; ?>>Tuesday</option>
										<option value = "Wednesday" <?php if($info->day=="Wednesday") echo 'selected="selected"'; ?>>Wednesday</option>
									</select>							</div>
							<div class="col-sm-6 header2">
								
							<label>-New Deals are Posted on website at 1 am of chosen day.</label>
							<label>	-Email is sent at 7 am of day selected.
							<label>-If "email twice per week " is selected the second email will go out the third day following the initial email.</label>
							<label>For example, if you selected “Email twice per week” above then selected Monday in the drop-down menu to the left, the second email would go out on Thursday (the third day following the selected day of the week).  The 2nd email contains the exact same deals as the 1st email.  It just serves as one more reminder to your residents of the great local deals currently being offered by your small businesses.</label>

</label>




							</div>
			
						</div>
			<div class="">
				
			<input type="submit" class="btn btn-primary" name="" value="Update">
			<input type="submit" class="btn btn-danger" name="cancel" value="Cancel / Revert To Previous">
			</div>
					</form>
			</div>
				</div>
			</div>
		</div>
	</body>
	</html>