<?php $this->load->view('front/header/header'); ?>
		<div class="custom-body">
			<!--<div class="slider owl-carousel owl-theme">
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
				</div>
			</div>-->
			
			<div class="view-wrap contact">
				<div class="item">
					<h4>Connect with us</h4>
					
					<a href="mailto:<?php echo $User_email_id;  ?>"><?php echo $User_email_id;  ?></a>
					<?php if($BrandDetails->Enrollement_id != 127) { ?>
					<br><br>
					<div class="call d-flex"><span class="mr-2">Call</span> <a href="tel:<?php echo $Phone_no;  ?>"><?php echo '0'.substr($Phone_no, 0, 3).' '.substr($Phone_no, 3, 2).' '.substr($Phone_no,5,2).' '.substr($Phone_no,7,2).' '.substr($Phone_no,9,2);  ?></a></div>
					<?php } ?>
				</div>
			<?php echo form_open_multipart('Cust_home/contact'); 	?>
				<div class="item item-odd" style="background: #fff;">
					<?php
					if(@$this->session->flashdata('error_code'))
					{
					?>
						<div id="msgBox" class="alert bg-warning alert-dismissible" role="alert" style="background-color: #158071 !important;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h6 class="form-label" style="color: white;"><?php echo $this->session->flashdata('error_code'); ?></h6>
						</div> <br>
					<?php
					} ?>
					<br><div class="custom-form ptb-30">
						<div class="row">
							<div class="form-group col-12">
								<!--<label id="selectBoxLable">Marital Status</label>-->
								 <select class="form-control" id="Sub_line" name="contact_subject">
									<option value="" >Subject</option>
									<option value="1">Feedback</option>
									<option value="2">Request</option>
									<option value="3">Suggestion</option>
								</select>
							</div>
						  </div>
						<div class="row">
							<div class="form-group col-12">
							 <textarea class="form-control" rows="10" cols="50" name="offerdetails" id="message_detail" placeholder="Message" style="height: 90px;"></textarea>
							</div>
						</div>
			
						<div class="row">
							<div class="form-group mt-3 col-12">
								<button type="submit" class="btn btn-primary btn-block" value="submit" name="submit">Submit</button>
							</div>
					  </div>
					</div>	
				</div>	
			<?php echo form_close(); ?>
				<div class="item item-odd" style="background: var(--primary);">
					<ul class="social-icon">
						<li><a href="https://facebook.com"><img src="<?php echo base_url(); ?>assets/brand-0/images/facebook.svg"></a></li>
						<li><a href="https://twitter.com"><img src="<?php echo base_url(); ?>assets/brand-0/images/twitter.svg"></a></li>
						<li><a href="https://instagram.com"><img src="<?php echo base_url(); ?>assets/brand-0/images/instagram.svg"></a></li>

					</ul>
				</div>
				
				
			</div>
		</div>
	<?php $this->load->view('front/header/footer');  ?>
<style>
#selectBoxLable
{
	 // text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); 
	transform: translate3d(0, -100%, 0); 
	color: var(--dark); opacity: 0.6;
	margin-bottom: -1px;
}
</style>