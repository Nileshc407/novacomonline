<?php 
$this->load->view('front/header/header');?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
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
                <!--<img src="<?php echo base_url(); ?>assets/img/contact.jpg">-->
				  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d306.75980829290927!2d36.78937997607082!3d-1.2614695242658964!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f17d2a6180bab%3A0xb436f41dcc300fd8!2sLevel%2024%20Eatery!5e1!3m2!1sen!2sin!4v1708515321735!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
			<div class="col-12 contactWrapper">
                <div class="row">
                    <div class="col-6 pr-2">
						<?php //echo $Phone_no;  ?>
                        <a class="cf w-100" href="tel://+254111053220">
                            <div class="cardMain text-center">
                                <i class="icon"><img src="<?php echo base_url(); ?>assets/img/call-us-icon.svg"></i>
                                <h2 class="titleTxt orangeTxt">Call Us</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 pl-2">
                        <a class="cf w-100" href="mailto://test@test.com">
                            <div class="cardMain text-center">
                                <i class="icon"><img src="<?php echo base_url(); ?>assets/img/email-us-icon.svg"></i>
                                <h2 class="titleTxt greenTxt">Email Us</h2>
                            </div>
                        </a>
                    </div>
                </div>
			</div>
            <div class="col-12 contactWrapper">
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
								 <h6 class="form-label text-dange" style="margin-top:8px;"> <?php echo $this->session->flashdata('error_code'); ?></h6><button type="button" class="close" data-dismiss="alert" aria-label="Close">
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
                    <li><a href="https://www.facebook.com/"><img src="<?php echo base_url(); ?>assets/img/facebook.svg"></a></li>
                    <li><a href="https://www.facebook.com/"><img src="<?php echo base_url(); ?>assets/img/twitter.svg"></a></li>
                    <li><a href="https://www.facebook.com/"><img src="<?php echo base_url(); ?>assets/img/instagram.svg"></a></li>
                </ul>
            </div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>	
