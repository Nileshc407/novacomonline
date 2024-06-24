<?php $this->load->view('front/header/header'); ?>
<body style="background-image:url('<?php echo base_url(); ?>assets/img/statement-bg.jpg')">
	<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url();?>index.php/Cust_home/myprofile?page=2"></a>
					</div>
					<h2>Address Details</h2>
				</div>
			</div>
		</div>
		<div class="custom-body">
			<div class="box custom-form ptb-30">
				<?php
					if(@$this->session->flashdata('error_code'))
					{
					?>
						<div class="alert bg-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h6 class="form-label"><?php echo $this->session->flashdata('error_code'); ?></h6>
						</div>
					<?php
					}
				?>
				 <?php // $data = array('onsubmit' => "return Validate_form()");  , $data
						echo form_open_multipart('Cust_home/profile_address'); ?>
					<div class="row">
						<div class="form-group col-12">
							<input type="text" onkeyup="validate(1);"  name="currentAddress1" id="currentAddress1"value="<?php echo $str_arr0; ?>" class="form-control" required>
							<label class="form-control-placeholder" for="currentAddress1">Building / Estate</label>
							<div class="help-block_currentAddress1" style="float: center;"></div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12">
							<input type="text" value="<?php echo $str_arr1; ?>" class="form-control" onkeyup="validate(2);" name="currentAddress2" id="currentAddress2" required>
							<label class="form-control-placeholder" for="currentAddress2">House Number / Floor</label>
							<div class="help-block_currentAddress2" style="float: center;"></div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12">
							<input type="text"  value="<?php echo $str_arr2; ?>" class="form-control" onkeyup="validate(3);" name="currentAddress3" id="currentAddress3" required>
							<label class="form-control-placeholder" for="currentAddress3">Street / Road</label>
							<div class="help-block_currentAddress3" style="float: center;"></div>
						</div>
					</div>
					<div class="row">
					
						<div class="form-group col-12">
							<label class="labelin" for="adddetail">Additional Details</label>
							<textarea class="form-control textarea" onkeyup="validate(4);" name="currentAddress4" id="currentAddress4"><?php echo $str_arr3; ?></textarea>
						</div>
					</div>
					
					<div class="row">
						<div class="form-group col-12">
							<select name="city" class="form-control" required >				
								<?php 
								foreach($City_array as $rec)
								{?>
									<option value="<?php echo $rec->id;?>" <?php if($Enroll_details->City == $rec->id){echo "selected";} ?>><?php echo $rec->name;?></option>
								<?php } ?>	
							</select>
							
						</div>
					</div>
					<div class="row">
						<div class="form-group mt-3 col-12">
							<input type="hidden" name="Enrollment_id" value="<?php echo $Enroll_details->Enrollement_id; ?>">
							<input type="hidden" name="Company_id" value="<?php echo $Enroll_details->Company_id; ?>">
							<input type="hidden" name="User_id" value="<?php echo $Enroll_details->User_id; ?>">
							<input type="hidden" name="membership_id" value="<?php echo $Enroll_details->Card_id; ?>">
							<input type="hidden" name="Password" value="<?php echo $Enroll_details->User_pwd; ?>">
						
							<button type="submit" class="btn btn-light dark" value="submit" name="submit">Submit</button>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		 <?php $this->load->view('front/header/footer');  ?>