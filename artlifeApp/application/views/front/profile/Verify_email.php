<?php $this->load->view('front/header/header'); ?>
	<div class="login-page">	
		<div class="login-box">
			<?php echo form_open_multipart('Cust_home/Verified_email'); ?>
				<div class="form-group">
					<label>Confirm your email address</label>
					<input type="email" name="userEmailId" id="userEmailId" class="form-control" placeholder="EMAIL" value="<?php echo $User_email_id; ?>" required />
					<div class="line"></div>
					<div class="help-block" style="float: center;"></div>
				</div>
				<div class="submit-field">
					<button type="submit" class="submit-btn btn btn-primary btn-block" style="color: #fff; background-color: #321E04; border-color: #321E04;">Save</button>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
<?php $this->load->view('front/header/footer'); ?> 
<script>
$('#userEmailId').change(function()
{	
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var userEmailId = $('#userEmailId').val();
	
	var validEmailId=ValidateEmail(userEmailId);
	
	if( $("#userEmailId").val() == "" || validEmailId == false)
	{	
		// alert(validEmailId);
		var msg1 = 'Please Enter Valid Email Id';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
	else
	{
		$.ajax({
			type: "POST",
			data: { userEmailId: userEmailId, Company_id:Company_id},
			url: "<?php echo base_url()?>index.php/Cust_home/check_email_id",
			success: function(data)
			{			
				if(data == 0)
				{
					$("#userEmailId").val("");					
					var msg1 = 'Email Id Already Exist!';
					$('.help-block').show();
					$('.help-block').css("color","red");
					$('.help-block').html(msg1);
					setTimeout(function(){ $('.help-block').hide(); }, 3000);
				}
				else
				{		
				}
			}
		});
	}
});
function ValidateEmail(mail) 
{
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
	{
		return true;
	}
    //alert("You have entered an invalid email address!");
	
	var msg1 = 'Please enter valid email id';
	$('.help-block').show();
	$('.help-block').css("color","red");
	$('.help-block').html(msg1);
	setTimeout(function(){ $('.help-block').hide(); }, 3000);
    return false;
}
</script>