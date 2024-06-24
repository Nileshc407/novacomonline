<?php $this->load->view('front/header/header'); 
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);		
if($Current_point_balance<0)
{
	$Current_point_balance=0;
}
else
{
	$Current_point_balance=$Current_point_balance;
}		
?> 
<body style="background-image:url('<?php echo base_url(); ?>assets/img/statement-bg.jpg')">
	<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a   href="<?php echo base_url();?>index.php/Cust_home/Vouchers_giftcard/#Gift_card_view" ></a>
					</div>
					<h2>Send Gift Card</h2>
				</div>
			</div>
		</div>
		<div class="custom-body">
			<div class="box h-100 custom-form ptb-30">
				<form  name="TransferPoint" method="POST" action="<?php echo base_url()?>index.php/Cust_home/Send_gift_card" enctype="multipart/form-data" onsubmit="return Get_validation();">	
					<div class="row">
						<div class="form-group col-12">
							Gift Card No. <input type="text" id="Gift_card" name="Gift_card"  class="form-control" readonly value="<?php echo $_REQUEST['Gift_card_id'];?>">
							
						</div>
					</div>
					<div class="row">
						<div class="form-group col-12">
							Send to Email ID <input type="email" id="input_email" name="input_email"  class="form-control" onblur="Get_member();"  onchange="Get_member();"  required placeholder="Enter Email ID">
							<div class="help-block" style="float:center;"></div>
						</div>
					</div>
					
					<div class="row" id="send_to_block" >
						<div class="form-group col-12">
							Full Name<input type="text" id="Send_member" name="Send_member" readonly class="form-control" placeholder="Enter Full Name" required>
							
						</div>
							

					</div>
					
					<div class="form-group mt-auto">
						<button type="submit" class="btn btn-light dark" value="submit" name="submit"  id="submit"  onsubmit="return Get_validation();">Send Gift Card</button>
					</div>
					<input type="hidden" readonly id="input_Enrollement_id" name="input_Enrollement_id" value="">
					<input type="hidden" readonly id="Login_Enrollement_id" name="Login_Enrollement_id" value="<?php echo $Enroll_details->Enrollement_id; ?>">
					<input type="hidden" readonly  id="Login_Membership_id" name="Login_Membership_id" value="<?php echo $Enroll_details->Card_id; ?>">
					<input type="hidden" readonly  id="Phone_no" name="Phone_no" value="">
					<input type="hidden" id="Send_CARD" name="Send_CARD" readonly class="form-control" value="">
						
				</form>
			</div>
		</div>
<?php $this->load->view('front/header/footer');  ?>		
<script>
// $('#Gift_card').val('<?php echo "Gift Card No. : ".$_REQUEST['Gift_card_id']; ?>');
// $( "#Gift_card" ).focus();
function Get_validation()
{
	// alert();
	Get_member();
		var Send_member = $('#Send_member').val();
	if (Send_member == '')
	{
			$( "#input_email" ).focus();
			return false;
	}
}
function Get_member()
{
	var Login_Enrollement_id = '<?php echo $enroll; ?>';
	var input_email = $('#input_email').val();
	var Company_id = '<?php echo $Company_id; ?>';	
	/* alert('Login_Enrollement_id '+Login_Enrollement_id);
	alert('input_email '+input_email);
	alert('Company_id '+Company_id); */
	var validEmailId=ValidateEmail(input_email);
	
	if(input_email != "" && Company_id != "")
	{
		
		if(validEmailId == false)
		{	
			var msg1 = 'Please Enter Valid Email Id';
			$('.help-block').show();
			$('.help-block').css("color","red");
			$('.help-block').html(msg1);
			setTimeout(function(){ $('.help-block').hide(); }, 3000);
			$( "#input_email" ).focus();
			$('#input_email').val("");
			return false;
		}
		else
		{
		$.ajax({
			type: "POST",			 
			data: {input_email: input_email, Company_id:Company_id, Login_Enrollement_id:Login_Enrollement_id},
			url: "<?php echo base_url()?>index.php/Cust_home/Check_email_giftcard",
			success: function(data)
			{
				// alert(data);
				$('#send_to_block').show();
				
				if(data == 0)
				{
					$('#Send_member').val('');
					$('#Phone_no').val('-');
					$('#enter').html('Enter Full Name :');
					 $("#Send_member").attr("required","required");
					$("#Send_member").removeAttr("readonly");
					$('#Send_CARD').val('9999');
					$('#cardblck').hide();
					$('#input_Enrollement_id').val(0);
				}
				else
				{
					
					$("#Send_member").removeAttr("required");
					$('#cardblck').show();
					
					$('#enter').html('');
					var Space = '&nbsp;';
					json = eval("(" + data + ")");
					$('#Send_member').val(json[0].First_name+' '+json[0].Last_name);
					$('#Send_CARD').val(json[0].Card_id);
					$('#Phone_no').val(json[0].Phone_no);
					$('#input_Enrollement_id').val(json[0].Enrollement_id);
				}
					$("#submit").removeAttr("disabled");
					/* if( (json[0].Enrollement_id) != 0 )
					{
						/*$('#ToMemberDetails').show();
						$('#Member_name').html(Space+' '+json[0].First_name+' '+json[0].Last_name);
						$('#Member_email_id').html(Space+' '+json[0].User_email_id);
						$('#Member_phone').html(Space+' '+json[0].Phone_no);
						document.getElementById("Member_Enrollement_id").value=(json[0].Enrollement_id);
						document.getElementById("Member_Current_balance").value=(json[0].Current_balance);
						document.getElementById("Member_Membership_id").value=(json[0].Card_id); */
					
						
			}
		});
		}
	}
	else
	{
		// $('#ToMemberDetails').hide();
		$('#input_email').val("");
		/*$('#Member_name').html("&nbsp;");
		$('#Member_email_id').html("&nbsp;");
		$('#Member_phone').html("&nbsp;");*/
		
		var msg1 = 'Please enter valid Email ID';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
}
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
function Check_current_balance(transPoints)
{
	var login_curr_bal='<?php echo $Current_point_balance; ?>';
	if(parseFloat(transPoints) > parseFloat(login_curr_bal))
	{		
		document.getElementById('Transfer_Points').value='';
		var msg2 = 'Insufficient <?php echo $Company_Details->Alise_name; ?> Wallet Balance.';
		$('.help-block1').show();
		$('.help-block1').css("color","red");
		$('.help-block1').html(msg2);
		setTimeout(function(){ $('.help-block1').hide(); }, 3000);
		return false;
	}
}
function form_submit()
{
	if($('#Membership_id').val() == "" || $('#Transfer_Points').val() == "")
	{
		if($('#Membership_id').val() == "")
		{
			var msg1 = 'Please enter valid membership id';
			$('.help-block').show();
			$('.help-block').css("color","red");
			$('.help-block').html(msg1);
			setTimeout(function(){ $('.help-block').hide(); }, 3000);
			return false;
		}
		else if($('#Transfer_Points').val() == "")
		{
			var msg1 = 'Please enter transfer <?php echo $Company_Details->Currency_name; ?>';
			$('.help-block1').show();
			$('.help-block1').css("color","red");
			$('.help-block1').html(msg1);
			setTimeout(function(){ $('.help-block1').hide(); }, 3000);
			return false;
		}
	}
	else
	{  	
		/*setTimeout(function() 
		{
			$('#myModal').modal('show'); 
		}, 0);
		setTimeout(function() 
		{ 
			$('#myModal').modal('hide'); 
		},2000); */
	} 		
}
</script>	