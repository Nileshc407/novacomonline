<?php $this->load->view('front/header/header'); ?>
	<div class="login-page">
		<div class="login-box">
			<label class="mt-4">Enter the 4-digit code sent to you at <?php echo $User_email_id; ?></label>
			<form method="post" class="digit-group otp-form mb-5" data-group-name="digits" data-autosubmit="false" autocomplete="off">
				<input type="tel" class="form-control" maxlength="1" id="digit-1" name="digit-1" data-next="digit-2" />
				<input type="tel" class="form-control" maxlength="1" id="digit-2" name="digit-2"  data-next="digit-3" data-previous="digit-1" />
				<input type="tel" class="form-control" maxlength="1" id="digit-3" name="digit-3"  data-next="digit-4" data-previous="digit-2" />
				<input type="tel" class="form-control" maxlength="1" id="digit-4" name="digit-4"  data-next="digit-5" data-previous="digit-3" onblur="Verifiy_pin();"/>
			</form>
			<div class="help-block" style="float: center;"></div>
			<div class="row">
				<div class="form-group mt-3 col-12">
					<button type="button" class="btn btn-primary btn-block" value="submit" name="submit" onclick="Verifiy_pin();" style="color: #fff; background-color: #321E04; border-color: #321E04;">Submit</button>
				</div>
			<!--<a href="<?php echo base_url(); ?>index.php/Cust_home/profile">I'm having trouble</a>-->
		</div>
	</div>
<?php $this->load->view('front/header/footer'); ?> 
<script type="text/javascript">
	$('.digit-group').find('input').each(function() {
		$(this).attr('maxlength', 1);
		$(this).on('keyup', function(e) {
			var parent = $($(this).parent());
			
			if(e.keyCode === 8 || e.keyCode === 37) {
				var prev = parent.find('input#' + $(this).data('previous'));
				
				if(prev.length) {
					$(prev).select();
				}
			} else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
				var next = parent.find('input#' + $(this).data('next'));
				
				if(next.length) {
					$(next).select();
				} else {
					if(parent.data('autosubmit')) {
						parent.submit();
					}
				}
			}
		});
	});
	
function Verifiy_pin()
{	
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var Enrollement_id = '<?php echo $Enroll_details->Enrollement_id; ?>';
	var digit1 = $('#digit-1').val();
	var digit2 = $('#digit-2').val();
	var digit3 = $('#digit-3').val();
	var digit4 = $('#digit-4').val();
	var Pin = digit1+digit2+digit3+digit4;
	var Pin_length = Pin.length;
	if(Pin_length !=4)
	{
		var msg1 = 'Enter 4 digit code';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
	$.ajax({
		type: "POST",
		data: { Enrollement_id: Enrollement_id, Company_id:Company_id, Pin:Pin},
		url: "<?php echo base_url()?>index.php/Cust_home/Verifiy_pin",
		success: function(data)
		{				
			if(data == 0)
			{
				$("#digit-1").val("");					
				$("#digit-2").val("");					
				$("#digit-3").val("");					
				$("#digit-4").val("");					
				var msg1 = 'Enter Valid Code';
				$('.help-block').show();
				$('.help-block').css("color","red");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000);
			}
			else
			{
				window.location.href = "<?php echo base_url(); ?>index.php/Cust_home/profile?Verifiy=1";
			}
		}
	});
}
   </script>