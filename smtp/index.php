<?php
//https://www.youtube.com/watch?v=9YTy7V5AYdA&list=PLWCLxMult9xfY_dsYicKGcCLhlZ6YXFMh&index=3
?>
<form method="post" action="#" align="center">
<div class="first_box">
	<br><label>Email Address </label><input type="text" id="email" name="email" placeholder="Email" required><br><br>
	<span class="error_msg_email"></span><br>
	<button type="submit" onclick="send_otp()">Send otp</button>
</div>
<div class="second_box">
	<br><label>Otp </label><input type="text" id="otp" name="otp" placeholder="Enter Otp" required><br><br>
	<span class="error_msg_otp"></span><br>
	<button type="submit" onclick="submit_otp()">Submit otp</button>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function send_otp()
{
	var email = jQuery('#email').val();	
	jQuery.ajax({
		url:'login.php',
		type:'post',
		data:{email:email},
		success:function(result)
		{
			if(result=="exist")
			{
				jQuery('.first_box').hide();
				jQuery('.second_box').show();
			}
			else if(result == "not exist")
			{
				jQuery('.error_msg_email').html('Record not found in system!')
				setTimeout(function(){
					jQuery('.error_msg_email').hide();
				},3000);
			}
		}
	});
}
function submit_otp()
{
	var otp = jQuery('#otp').val();
	jQuery.ajax({
		url:'otp_validation.php',
		type:'post',
		data:{otp:otp},
		success:function(result)
		{
			if(result == 1)
			{
				window.location='welcome.php';
			}
			else if(result == 0)
			{
				// jQuery('.first_box').hide();
				// jQuery('.second_box').show();
				jQuery('.error_msg_otp').html('Please enter valid otp!')
				setTimeout(function(){
					jQuery('.error_msg_otp').hide();
				},3000);
			}
		}
	});
}
</script>
<style>
.second_box{
	display:none;
}
.error_msg_email,.error_msg_otp{
	color:red;
}
</style>