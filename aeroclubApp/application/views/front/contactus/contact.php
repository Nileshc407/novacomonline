<?php $this->load->view('front/header/header'); ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/more';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Contact Us</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop2 padBottom">
    <div class="container">
		<div class="row">
            <div class="col-12 contactImg px-0">
                <img src="<?php echo base_url(); ?>assets/img/contact.jpg">
            </div>
			<div class="col-12 contactWrapper">
                <div class="row">
                    <div class="col-6 pr-2">
                        <a class="cf w-100" href="tel://+254718114411">
                            <div class="cardMain text-center">
                                <i class="icon"><img src="<?php echo base_url(); ?>assets/img/call-us-icon.svg"></i>
                                <h2 class="titleTxt orangeTxt">Call Us</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 pl-2">
                        <a class="cf w-100" href="mailto://kunal@level24.life">
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
                    <p><i class="mr-2"><img src="<?php echo base_url(); ?>assets/img/smartphone-icon.svg"></i> +254 111 053 220</p>
                    <p><i class="mr-2"><img src="<?php echo base_url(); ?>assets/img/globe-icon.svg"></i>
					<a href="https://www.aeroclubea.com/" target="_blank" style="color:#000000 !important;"> www.aeroclubea.com</a></p>
                    <p><i class="mr-2"><img src="<?php echo base_url(); ?>assets/img/mail-icon.svg"></i> feedback@aeroclubea.com</p>
                </div>
                <h2>Quick Contact</h2>
                <form  name="contactus" method="POST" action="<?php echo base_url()?>index.php/Cust_home/contactus" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label class="font-weight-bold">Message</label>
                        <textarea class="form-control" rows="3" name="offerdetails" id="message_detail" placeholder="Enter message" required></textarea>
                    </div>
					<input type="hidden" name="contact_subject" value="1">	
					<button type="submit" class="MainBtn w-100 text-center" value="submit" name="submit">Submit</button>
					<?php	
					if(@$this->session->flashdata('error_code'))
					{ ?><br><br>	
						<div class="alert alert-info alert-dismissible" id="msgBox" role="alert">				
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							<h6 class="form-label"><?php echo $this->session->flashdata('error_code'); ?></h6>
						</div>
			<?php   }  ?>
                </form>
            </div>
            <div class="col-12 contactWrapper text-center">
                <ul class="socialIcon">
                    <li><a href="https://www.facebook.com/AeroClubOfEastAfrica/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/facebook.svg"></a></li>
					
                    <li><a href="https://www.linkedin.com/company/96055213/admin/feed/posts/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/linkedin-round-color-icon.svg"></a></li>
					
                    <li><a href="https://www.instagram.com/aeroclubeastafrica/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/instagram.svg"></a></li>
					
                    <li><a href="https://www.tripadvisor.com/UserReviewEdit-g294207-d2282275-Aero_Club_of_East_Africa-Nairobi.html" target="_blank"><img src="<?php echo base_url(); ?>assets/img/tripadvisor-icon.svg"></a></li>
                </ul>
            </div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>	
<script>
$(document).ready(function() 
{
	setTimeout(function(){ $('#msgBox').hide(); }, 3000);
});
</script>
<style>
 .padTop2 {
    padding-top: 44px;
}
</style>