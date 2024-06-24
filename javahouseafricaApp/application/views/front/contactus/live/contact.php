<?php 
$this->load->view('front/header/header');
// $this->load->view('front/header/menu'); 
$session_data = $this->session->userdata('cust_logged_in');
$smartphone_flag = $session_data['smartphone_flag'];
?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
			<!--<img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-black-top.png">-->
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
			
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/front_home';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Contact Us</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop1 padBottom">
	<div class="container">
		<div class="row">
            <div class="col-12 contactImg px-0">
                <img src="<?php echo base_url(); ?>assets/img/contact.jpg">
            </div>
			<div class="col-12 contactWrapper">
                <div class="row">
                    <div class="col-6 pr-2">
                        <a class="cf w-100" href="tel://+254719547940">
                            <div class="cardMain text-center">
                                <i class="icon"><img src="<?php echo base_url(); ?>assets/img/call-us-icon.svg"></i>
                                <h2 class="titleTxt orangeTxt">Call Us</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 pl-2">
                        <a class="cf w-100" href="mailto://guest.relations@javahouseafrica.com">
                            <div class="cardMain text-center">
                                <i class="icon"><img src="<?php echo base_url(); ?>assets/img/email-us-icon.svg"></i>
                                <h2 class="titleTxt greenTxt">Email Us</h2>
                            </div>
                        </a>
                    </div>
                </div>
			</div>
            <div class="col-12 contactWrapper">
                <div class="cardMain mb-4 p-3">
                    <p>
						<i class="mr-2">
						<a href="tel://+254719547940">
							<img src="<?php echo base_url(); ?>assets/img/phone-icon.svg">
						</a>
						</i> +254 719 547940
					</p>
                    <p>
						<i class="mr-2">
						<a href="tel://+254792763247">
							<img src="<?php echo base_url(); ?>assets/img/phone-icon.svg">
						</a>
						</i>  +254 792 763247
					</p>
                    <p>
					 
					<i class="mr-2">
					<a href="mailto://guest.relations@javahouseafrica.com">
						<img src="<?php echo base_url(); ?>assets/img/email-icon.svg">
					</a>
					</i> guest.relations@javahouseafrica.com</p>
                </div>
				
                <h2>Quick Contact</h2>
                <form  name="TransferPoint" method="POST" action="<?php echo base_url()?>index.php/Cust_home/contactus" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label class="font-weight-bold">Message</label>
                        <textarea class="form-control" rows="3" name="offerdetails" id="message_detail"placeholder="Enter message" required></textarea>
                    </div>
                    <!--<a href="#" class="redBtn w-100 text-center">Submit</a>-->
					<input type="hidden" name="contact_subject" value="1">	
					
					<button type="submit" class="redBtn w-100 text-center" value="submit" name="submit">Submit</button>
					
					<br>
						<br>
					<?php	
					if(@$this->session->flashdata('error_code'))
					{
					?>
						<div class="alert bg-white alert-dismissible " style="padding-right: 1rem;box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 10%);" role="alert">							
							<div class="row">
									 <img src="<?php echo base_url(); ?>assets/img/java-group-icon.svg"> &nbsp;&nbsp;&nbsp;&nbsp;<h6 class="form-label text-dange" style="margin-top:8px;"> <?php echo $this->session->flashdata('error_code'); ?></h6><button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								
																
							</div>	
						</div>
					<?php
					}
					?>
                </form>
            </div>
            <div class="col-12 contactWrapper text-center">
                <ul class="socialIcon">
                    <li><a href="https://www.facebook.com/javahouseafrica" target="_blank"><img src="<?php echo base_url(); ?>assets/img/facebook.svg"></a></li>
                    <li><a href="https://twitter.com/javahouseafrica" target="_blank"><img src="<?php echo base_url(); ?>assets/img/twitter.svg"></a></li>
                    <li><a href="https://www.instagram.com/javahouseafrica" target="_blank"><img src="<?php echo base_url(); ?>assets/img/instagram.svg"></a></li>
                </ul>
            </div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>	
