<?php $this->load->view('front/header/header'); ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight">
				<!--<button onclick="location.href = 'verify-phone-number.html';">
					<img src="img/back-icon.svg">
				</button>-->
				</div>
				<div>&nbsp;</div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
			
<main class="padTop loginWrapper">
    <div class="logoMain text-center">
        <img src="<?php echo base_url(); ?>assets/img/logo.png">
    </div>

    <div class="titleMain">Enter your 4-Digit Code</div>
    <div class="BoxHldr">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">Please type the verification code sent <br/>to +<?php echo $Phone_no; ?></div>
                    <from>
					
                        <div class="group w-100 mt-5">
                            <input type="text" id="digit-1" name="digit-1" maxlength="4" required="" onchange="Verifiy_pin();">
                            <span class="bar"></span>
							<div class="help-block" style="float: center;"></div>
                            <label>Code</label>
                        </div>
                        <div class="group w-100 mt-5 text-center">
                            <a href="JavaScript:void(0);" onclick="Resend_opt();" id="myLink">Resend Code</a>
                        </div>
                        <div class="group w-100 mt-5">
                            <!--<a href="home.html" class="MainBtn w-100 text-center">Confirm</a>  -->
							<button type="button" class="MainBtn w-100 text-center" value="submit" name="submit" onclick="Submit_form();">Confirm</button>
                        </div>
                    </from>
                </div>
            </div>
        </div>
    </div>

</main>	
<div class="overlay"></div>	
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<style>
	body{
		background-color: #2F296D;
	}
	</style>
<script type="text/javascript">
function Verifiy_pin()
{	

	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var Enrollement_id = '<?php echo $Enroll_details->Enrollement_id; ?>';
	// alert("Company_id---"+Company_id);
	// alert("Enrollement_id---"+Enrollement_id);
	var digit = $('#digit-1').val();
	// alert("digit1---"+digit1+"--digit2---"+digit2+"--digit3---"+digit3+"--digit4---"+digit4);
	var Pin = digit;
	// alert("Pin---"+Pin);
	var Pin_length = Pin.length;
	// alert("Pin_length---"+Pin_length);
	if(Pin_length !=4)
	{
		var msg1 = 'Enter 4 digit code';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
		return;
	}
	$.ajax({
		type: "POST",
		data: { Enrollement_id: Enrollement_id, Company_id:Company_id, Pin:Pin},
		url: "<?php echo base_url()?>index.php/Cust_home/Verifiy_otp",
		success: function(data)
		{		

			// alert("data---"+data);
			if(data == 0)
			{
				$("#digit-1").val("");				
				var msg1 = 'Enter valid OTP code';
				$('.help-block').show();
				$('.help-block').css("color","red");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000);
			}
			else if(data == 1)
			{
				var msg1 = 'Success';
				$('.help-block').show();
				$('.help-block').css("color","green");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000);
				
				// window.location.href = "<?php echo base_url(); ?>index.php/Cust_home/validate_opt?otp="+Pin;
			}
		}
	});
}

function Submit_form()
{	

	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var Enrollement_id = '<?php echo $Enroll_details->Enrollement_id; ?>';
	// alert("Company_id---"+Company_id);
	// alert("Enrollement_id---"+Enrollement_id);
	var digit = $('#digit-1').val();
	// alert("digit1---"+digit1+"--digit2---"+digit2+"--digit3---"+digit3+"--digit4---"+digit4);
	var Pin = digit;
	// alert("Pin---"+Pin);
	var Pin_length = Pin.length;
	// alert("Pin_length---"+Pin_length);
	if(Pin_length !=4)
	{
		var msg1 = 'Enter 4 digit code';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
		return;
	}
	$.ajax({
		type: "POST",
		data: { Enrollement_id: Enrollement_id, Company_id:Company_id, Pin:Pin},
		url: "<?php echo base_url()?>index.php/Cust_home/Verifiy_otp",
		success: function(data)
		{		

			// alert("data---"+data);
			if(data == 0)
			{
				$("#digit-1").val("");				
				var msg1 = 'Enter valid OTP code';
				$('.help-block').show();
				$('.help-block').css("color","red");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000);
			}
			else if(data == 1)
			{
				/* var msg1 = 'Success';
				$('.help-block').show();
				$('.help-block').css("color","green");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000); */
				
				window.location.href = "<?php echo base_url(); ?>index.php/Cust_home/validate_opt?Pin="+Pin;
			}
		}
	});
}
function Resend_opt()
{	

	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var Enrollement_id = '<?php echo $Enroll_details->Enrollement_id; ?>';
	
	$.ajax({
		type: "POST",
		data: { Enrollement_id: Enrollement_id, Company_id:Company_id},
		url: "<?php echo base_url()?>index.php/Cust_home/resend_opt",
		success: function(data)
		{		

			// alert("data---"+data);
			if(data == 0)
			{
				$("#digit-1").val("");					
				var msg1 = 'Unable to send OTP code. Please try again later';
				$('.help-block').show();
				$('.help-block').css("color","red");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000);
			}
			else if(data == 1)
			{
				 var msg1 = 'Mobile verification OTP code is sent on registered mobile number.';
				$('.help-block').show();
				$('.help-block').css("color","green");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000); 
				
				// window.location.href = "<?php echo base_url(); ?>index.php/Cust_home/validate_opt?Pin="+Pin;
			}
		}
	});
}
// Get the hyperlink element
var link = document.getElementById('myLink');

// Add a click event listener to the hyperlink
link.addEventListener('click', function(e) {
  // Prevent the default behavior of the hyperlink
 // e.preventDefault();

  // Disable the hyperlink
 // link.style.pointerEvents = 'none';

	$('#myLink').hide();
  // Enable the hyperlink after 5 minutes (300000 milliseconds)
  setTimeout(function() {
  //  link.style.pointerEvents = 'auto';
	$('#myLink').show();
  }, 300000);
});
</script>