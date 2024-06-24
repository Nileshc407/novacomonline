<?php $this->load->view('front/header/header'); ?>
<?php 
	$Photograph=$Enroll_details->Photograph;

	if($Photograph=="")
	{
		$Photograph=base_url()."assets/brand-0/images/user2.svg";
	} else {

		$Photograph=$this->config->item('base_url2').$Photograph;
	}
?>
<div class="custom-body body-wrapper">
	<div class="accout-user" id="thumbnail">
			<img src="<?php echo $Photograph; ?>" class="user_img" id="profile_pic1"/>
			<p><br/><b><?php echo ucwords($Enroll_details->First_name).' '.ucwords($Enroll_details->Last_name); ?></b></p>
		</div>
    <div class="custom-form ptb-30"> <br>
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
		}
		?>
          <form  name="Update_profile" method="POST" action="<?php echo base_url()?>index.php/Cust_home/Update_img" enctype="multipart/form-data" onsubmit="return form_submit();">	
          <!--<div class="row">
            <div class="form-group col-12">
				<input type="file" name="image1" id="image1" class="form-control" required>
				<div class="upload-btn-wrapper">
					<button class="file-btn"><i class="fa fa-cloud-upload"></i></button>
					<input type="file" name="image1" id="image1" onchange="readImage(this,'#image1');" required />
				</div>
				<div class="thumbnail" id="profile_pic" style="width:100px; display:none;">
					<img src="" id="image1" class="img-responsive">
				</div>
				<div class="help-block" style="float: center;"></div>
            </div>
          </div>-->
		  <div class="row">
			   <div class="form-group col-12">
				<label for="">Photograph<br><font color="RED" align="center" size="0.8em"><i>You can upload profile photo upto 500kb  </i></font> </label>
					<div class="upload-btn-wrapper">
						<button class="file-btn"><i class="fa fa-cloud-upload"></i></button>
						<input type="file" name="image1" id="image1" onchange="readImage(this,'#image2');" required>
					</div>
					<div class="thumbnail" id="profile_pic" style="width:100px; display:none;">
						<img src="" id="image2" class="img-responsive">
					</div>
			  </div>
		  </div>
          <div class="row">
            <div class="form-group mt-3 col-12">
				<input type="hidden" name="Enrollment_id" value="<?php echo $Enroll_details->Enrollement_id; ?>">
				<input type="hidden" name="Company_id" value="<?php echo $Enroll_details->Company_id; ?>">
				<input type="hidden" name="User_id" value="<?php echo $Enroll_details->User_id; ?>">
				<input type="hidden" name="membership_id" value="<?php echo $Enroll_details->Card_id; ?>">
				<input type="hidden" name="Password" value="<?php echo $Enroll_details->User_pwd; ?>">
				<button type="submit" class="btn btn-primary btn-block" value="submit" name="submit">Submit</button>
            </div>
          </div>
	   </form>
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
}
</script>
<style>
.thumbnail {
    display: block;
    padding: 4px;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-transition: border .2s ease-in-out;
    -o-transition: border .2s ease-in-out;
    transition: border .2s ease-in-out;
	margin-left: 100px;
    margin-top: -49px;
}
.thumbnail>img 
{
    margin-right: auto;
    margin-left: auto;
}
.img-responsive, .thumbnail>img {
    display: block;
    max-width: 100%;
    height: auto;
}
.file-btn {
    border: none;
    color: white;
    background-color: #158071;
    padding: 5px 15px;
    border-radius: 8px;
    font-size: 24px;
    font-weight: bold;
}
.upload-btn-wrapper input[type=file] {
    font-size: 100px;
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
}
</style>