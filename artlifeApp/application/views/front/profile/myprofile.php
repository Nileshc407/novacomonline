<?php $this->load->view('front/header/header'); ?>
    <?php 
        $Photograph=$Enroll_details->Photograph;
	
	
	   //echo "----Photograph-----".$Photograph."---<br>";

        if($Photograph=="")
        {
            $Photograph=base_url()."assets/brand-0/images/user2.svg";

        } else {

            $Photograph=$this->config->item('base_url2').$Photograph;

        }
    ?>
    <div class="custom-body"><br>
		<form  name="Update_profile" id="myForm" method="POST" action="<?php echo base_url()?>index.php/Cust_home/Update_img" enctype="multipart/form-data" onsubmit="return form_submit();">	
			<div class="accout-user" id="profile_pic">
			<!--<a href="<?php echo base_url();?>index.php/Cust_home/Upload_img">-->
				<img src="<?php echo $Photograph; ?>" id="image2" class="user_img"/>
			<!--</a>-->
			<div class="upload_btn_set">
				<div class="upload_btn">
				<i class="fa fa-pencil-square-o" aria-hidden="true">
					<input type="file" name="image1" id="image1" onchange="readImage(this,'#image2');" required />
				</i>
					<!--<span class="btn btn-primary">Upload Photo</span>-->
				</div>
			</div>
				<p><b><?php echo ucwords($Enroll_details->First_name).' '.ucwords($Enroll_details->Last_name); ?></b></p>
			</div>
		</form>
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
			<div class="user_detail_link">
				<ul>
					<li>
						<a href="<?php echo base_url();?>index.php/Cust_home/account">
							<span class="icon"><img src="<?php echo base_url(); ?>assets/brand-0/images/corg.svg"/></span>
							Account Settings
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php/Cust_home/statement">
							<span class="icon"><img src="<?php echo base_url(); ?>assets/brand-0/images/form.svg"/></span>
							Points History
						</a>
					</li>
					<li>
						<a href="<?php echo base_url();?>index.php/Cust_home/mailbox">
							<span class="icon"><img src="<?php echo base_url(); ?>assets/brand-0/images/bell.svg"/></span>
							Notifications
						</a>
					</li>
				</ul>
			</div>
		</div>
		
<?php $this->load->view('front/header/footer');  ?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<script>
$(document).ready(function() 
{
	setTimeout(function(){ $('#msgBox').hide(); }, 3000);
});
function readImage(input,div_id) 
{
	document.getElementById('profile_pic').style.display="";
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$(div_id)
				.attr('src', e.target.result)
				.height(100);
		};

		reader.readAsDataURL(input.files[0]);
	}
	document.getElementById("myForm").submit();
}
</script>
<style>
.upload_btn_set
{
	position: fixed;
    right: 0px;
	padding-right: 60px;
	margin-top: -40px;
	margin-bottom: 15px;
}
@media (max-width: 767px)
.upload_btn_set .upload_btn {
    margin-right: 5px;
}
.upload_btn_set .upload_btn {
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin-right: 10px;
}
.upload_btn input[type="file"] {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
}
button, input {
    overflow: visible;
}
</style>