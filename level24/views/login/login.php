<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
	<link href="<?php echo $this->config->item('base_url2')?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $this->config->item('base_url2')?>assets/css/slider.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo $this->config->item('base_url2')?>assets/js/jquery.min.js"></script>		
	<link href="<?php echo $this->config->item('base_url2')?>css/login.css" rel="stylesheet">
	<script src="<?php echo $this->config->item('base_url2')?>assets/js/bootstrap.js"></script>
	<script src="<?php echo $this->config->item('base_url2')?>assets/js/common.js"></script>
	<link href="<?php echo $this->config->item('base_url2')?>assets/bootstrap-dialog/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />	
	<script src="<?php echo $this->config->item('base_url2')?>assets/bootstrap-dialog/js/bootstrap-dialog.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('base_url2')?>assets/bootstrap-dialog/js/alert_function.js"></script>	
</head>
<body style="">
<?php
if (isset($_REQUEST['error'])) {
?>
	<script>
	  var Title = "Application Information";
	  var msg = 'Invalid username or password..!!';
	  runjs(Title, msg);
	</script>
<?php
} ?>
<?php
if (@$this->session->flashdata('messege')) {
?>
	<script>
	  var Title = "Application Information";
	  var msg = '<?php echo $this->session->flashdata('messege'); ?>';
	  runjs(Title, msg);
	</script>
<?php
} ?>
    <div class="container">
        <div class="card card-container" style="padding: 5px 40px;background-color:rgba(16, 3, 0, 0.7);color: #fff;">	
            <img id="profile-img" class="profile-img-card" src="<?php echo $this->config->item('base_url2')?>images/level24/logo.png" />			
            <p id="profile-name" class="profile-name-card" style="font-size:20px;text-align:left;margin-bottom: 10px;">You are Home <?php if((isset($_REQUEST['Member_login'])) || ($Member_flag==1)){ ?><?php } else { ?> <!--Business (DEMO) --> <?php } ?> </p>	
			<p style="color: #fff;font-size:12px;">Sign with your user email address and password</p>			
			<?php 
			if((isset($_REQUEST['Member_login'])) || ($Member_flag==1))
			{ 
				$Forgot_flag=1; 
			?>
            <form class="form-signin" action="<?php echo base_url();?>index.php/login" method="post">
				<input type="email" name="email" id="email" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Email address" required autofocus>
				<br><span><?php echo form_error('username'); ?></span>
				
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
				<br><span><?php echo form_error('password'); ?></span>
				
                <!--<button class="btn btn-default" type="submit" value="Login">Sign in</button>-->
				<input type="hidden" name="flag" value="2">
				<div id="m"></div>
            </form><!-- /form -->
			<?php echo form_close(); ?>
			<!--<p>Are you a Member? <a href="#lost" data-dismiss="modal" data-toggle="modal" data-target="#myModal3" style="color:#fff;text-decoration: underline;">Sign up</a>
			</p>-->
			
			
<!-- sIGN uP -->
		<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" style="color:#fff;opacity: 1;">&times;</button>
					</div>
					<div class="modal-body modal-body-sub_agile">
						<div class="col-md-12 modal_body_left modal_body_left1">
							 <img id="profile-img" class="profile-img-card" src="<?php echo $this->config->item('base_url2')?>images/javahouseafrica/javahouse_logo.png" style="width:40%"/>	
							<p id="profile-name" class="profile-name-card" style="font-size:20px;text-align:left;margin-bottom: 10px;">Sign Up Now</p>	
							<div class="wrap-box"></div>
							<form action="<?php echo base_url()?>index.php/Cust_home/enroll_new_member_website" method="post" >
								<div class="styled-input agile-styled-input-top">
								<label for="inputName"><span class="required_info" style="font-size: 12px; font-style: italic; color: red;">*</span>&nbsp;First Name
									</label>
									<input type="text" name="first_name" required="" class="form-control" placeholder="Enter First Name">
									<br>
								</div>

								<div class="styled-input agile-styled-input-top">
									
									<label for="inputName"><span class="required_info" style="font-size: 12px; font-style: italic; color: red;">*</span>&nbsp;Last Name
									</label>
									
									<input type="text" name="last_name" required="" class="form-control" placeholder="Enter Last Name">
									<br>
								</div>

								<div class="styled-input agile-styled-input-top">
									<label for="inputName"><span class="required_info" style="font-size: 12px; font-style: italic; color: red;">*</span>&nbsp;Mobile No.
										&nbsp;&nbsp;<span style="font-size: 9px; font-style: italic; color: red;">(* Enter without Dial Code)</span>
									</label>
									<input type="text" name="phno" id="phno" required="" class="form-control"  placeholder="Enter Mobile no." onkeyup="this.value=this.value.replace(/\D/g,'')" maxlength="9">
									<br>
								</div>

								<div class="styled-input">
									
									<label for="inputName"><span class="required_info" style="font-size: 12px; font-style: italic; color: red;">*</span>&nbsp;Email ID
									</label>
									
									<input type="email" name="email"   id="userEmailId" required="" class="form-control" placeholder="Enter Email ID">
									<br>
								</div>

								<input type="submit" value="Register" class="btn btn-default">
								
								
								<input type="hidden" class="form-control"  name="Country" id="Country" value="<?php echo $Country; ?>" >
								<input type="hidden"  name="Company_id" id="Company_id" value="<?php echo $Company_id; ?>" >
								<br>
								<span style="font-size: 12px; font-style: italic; color: red;float: right;">(* Required Fields)</span>
							</form>
	
							<div class="clearfix"></div>
						</div>

						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->
			</div>
		</div>
<!-- //Modal3 -->
			
			
			<?php } else {  
			$Forgot_flag=2; ?>
			
			<form class="form-signin" action="<?php echo $this->config->item('base_url2')?>index.php/login" method="post">
				<input type="email" name="username" id="username" value="<?php echo set_value('username'); ?>" class="form-control" placeholder="Email address" required autofocus>
				<br><span><?php echo form_error('username'); ?></span>
				
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
				<br><span><?php echo form_error('password'); ?></span>
				<input type="hidden" name="Outlet_Website" id="Outlet_Website" value="<?php  echo $Outlet_Website; ?>" >
                <button class="btn btn-default" type="submit" value="Login" onclick="javascript:loding();">Sign in</button>
				<input type="hidden" name="flag" value="2">
				<div id="m"></div>
            </form><!-- /form -->
			<?php echo form_close(); ?>
						
			
		
        
		<a href="#myModal14" data-toggle="modal" data-target="#myModal14" class="forgot-password success">Forgot password?</a>		
		<?php } ?>	
			<!-----------------Member Forgot Password Modal--------------------------------------->
			
		<form action="<?php echo base_url()?>index.php/Cust_home/forgot/?Forgot_flag=<?php echo $Forgot_flag;?>" method="post"  class="login-form">
		<div id="myModal14" class="modal fade" role="dialog" >
					<div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						
						  <div class="modal-header">
							<h4 class="modal-title" style="color:#fff;text-align:center">Forgot Password</h4>
						  </div>
						  <div class="modal-body">
							  <div class="form-group has-feedback1" id="has-feedback1">
							  <label for="exampleInputEmail1"><font>Email Address</font></label>
							  <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address">
							  <span class="glyphicon" id="glyphicon1" aria-hidden="true"></span>						
							  <div class="help-block1" id="help-block1" ></div>
						   
						  </div>
							
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
							<input type="hidden" name="Company_id" id="Company_id" value="<?php  echo $Company_id; ?>" >
								<input type="hidden" class="form-control"  name="flag"  value="2" >
								
								<input type="submit" value="Submit" class="btn btn-default" >
						  </div>
						</div>

					</div>
				</div>
		</form>		
			<!----------------------------------------------------------->
			<?php
			if(@$message)
			{
				echo "<p class='text-center' style='margin: 10px auto; color: red;'>".$message."</p>";
			}
			?>
			
			<?php
			if(@$this->session->flashdata('error_code'))
			{
			?>
				<script>
					var Title = "Application Information";
					var msg = '<?php echo $this->session->flashdata('error_code'); ?>';
					runjs(Title,msg);
				</script>
			<?php
			}
			?>
			
        </div>
		<div id="loadingDiv" style="display:none;">
			<div>
				<h7>Please wait...</h7>
			</div>
		</div>	
    </div>
	
		
	
<script>
function loding()
{
	var username = $('#username').val();
	var password = $('#password').val();
	if(username !="" && password!="")
	{
		document.getElementById("loadingDiv").style.display = "";
	}
}
$('#email_id').blur(function()
{
	var email_id = $('#email_id').val();
	if( email_id == "" )
	{
		document.getElementById("email_id").placeholder="Please Enter Email Address !!!";
	}
	else
	{
		$.ajax({
			type: "POST",
			data: { email_id: email_id},
			url: "<?php echo $this->config->item('base_url2')?>index.php/Login/check_email_address",
			success: function(data)
			{
				if(data.length == 7)
				{
					$("#email_id").val("");					
					document.getElementById("email_id").placeholder="Please Enter Correct Email Address";					
				}
			}
		});
	}
});
		
function Send_password(Email_id)
{		
	
	var email_id = $('#email_id').val();
	if( email_id == "" )
	{
		document.getElementById("email_id").placeholder="Please Enter Email Address !!!";
	}
	else
	{
		show_loader();
		$.ajax(
		{
			type: "POST",
			data:{ Email_id:Email_id,flag:'2'},
			url: "<?php echo $this->config->item('base_url2')?>index.php/Login/Send_password",
			success: function(data)
			{
				
				if(data.length == 25)
				{					
					BootstrapDialog.show({
						closable: false,
						title: 'Valid Data Operation',
						message: 'Password sent to your Email Address Successfuly !!!',
						buttons: [{
							label: 'OK',
							action: function(dialog) 
							{
								location.reload(); 
							}
						}]
					});					
				} 
				else
				{
					BootstrapDialog.show({
						closable: false,
						title: 'In-Valid Data Operation',
						message: 'Password Not Sent!!!',
						buttons: [{
							label: 'OK',
							action: function(dialog) 
							{
								location.reload(); 
							}
						}]
					});
				}
			}
		});	
	}	
}

$( document ).ready( function() {
	$('.carousel').carousel();
});
</script>

</body>
</html>
<style>
.bootstrap-dialog-message{
	color: #fff !IMPORTANT;
}
.forgot-password{
	    color: #fff !IMPORTANT;
}

.modal-content{
	    background-color: rgba(16, 3, 0, 0.7) !IMPORTANT;
}

body {
	<?php if((isset($_REQUEST['Member_login'])) || ($Member_flag==1)){ ?>
 background-image: url("<?php echo $this->config->item('base_url2')?>images/level24/background.jpg"); 
	<?php }else{ ?>
 background-image: url("<?php echo $this->config->item('base_url2')?>images/level24/background.jpg"); 
 <?php } ?>
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
   background-repeat: no-repeat;
   
   
   
 
}
.card{
	background-color: #fff;
}
#loadingDiv{
	position:fixed;
	top:0px;
	right:0px;
	width:100%;
	height:100%;
	background-color:#666;
	background-image:url('<?php echo $this->config->item('base_url2') ?>images/loading.gif');
	background-repeat:no-repeat;
	background-position:center;
	z-index:10000000;
	opacity: 0.4;
	filter: alpha(opacity=40); /* For IE8 and earlier */ 
}
.profile-img-card {
    width: 60% !IMPORTANT;
}
</style>