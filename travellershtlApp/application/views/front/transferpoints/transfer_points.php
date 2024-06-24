<?php
$this->load->view('front/header/header'); 

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
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Redeem_history';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Transfer Points</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
	
<main class="padTop padBottom">
	<div class="container">
		<div class="row">
            <div class="col-12 transferPointWrapper">
				<form class="transferPointForm" id="TransferPoint" method="POST" action="<?php echo base_url()?>index.php/Cust_home/transferpointsApp" onsubmit="return form_submit();">	
                    <div class="form-group">
                        <label class="font-weight-bold">Transfer Point to (Phone Number)</label>
                        <input type="text" class="form-control" id="Membership_id" name="Membership_id" onblur="Get_member();" required>
                        <div class="formSubtxt redTxt"><span class="greyTxt">Example 7XX XXX XXX </span> (Enter to membership id/Phone no. without country code)</div>
						<div class="help-block" style="float:center;"></div>
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold">Point to Transfer</label>
                        <input type="text" class="form-control" id="Transfer_Points" name="Transfer_Points" onblur="Check_current_balance(this.value)" onkeyup="this.value=this.value.replace(/\D/g,'')" required>
						<div class="help-block1" style="float:center;"></div>
                    </div>
					<button class="redBtn w-100 text-center mt-5" type="submit">Initiate Transfer</button>
                   
					<input type="hidden" readonly id="Member_Enrollement_id" name="Member_Enrollement_id" >
					<input type="hidden" readonly  id="Member_Current_balance" name="Member_Current_balance" >
					<input type="hidden" readonly  id="Member_Membership_id" name="Member_Membership_id" >				 
					<input type="hidden" readonly id="Login_Enrollement_id" name="Login_Enrollement_id" value="<?php echo $Enroll_details->Enrollement_id; ?>">
					<input type="hidden" readonly  id="Login_Current_balance" name="Login_Current_balance" value="<?php echo $Enroll_details->Current_balance; ?>">
					<input type="hidden" readonly  id="Company_id" name="Company_id" value="<?php echo $Enroll_details->Company_id; ?>">
					<input type="hidden" readonly  id="Login_Membership_id" name="Login_Membership_id" value="<?php echo $Enroll_details->Card_id; ?>">
                </form>
            </div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
<script>
function Get_member()
{	
	var Login_Enrollement_id = '<?php echo $enroll; ?>';
	var Membership_id = $('#Membership_id').val();
	var Company_id = '<?php echo $Company_id; ?>';	

	if(Membership_id != "" && Company_id != "")
	{
		$.ajax({
			type: "POST",			 
			data: {Membership_id: Membership_id, Company_id:Company_id, Login_Enrollement_id:Login_Enrollement_id},
			url: "<?php echo base_url()?>index.php/Cust_home/get_member_details",
			success: function(data)
			{
				if(data == 0)
				{
					// $('#ToMemberDetails').hide();
					$('#Membership_id').val("");
					/* $('#Member_name').html("&nbsp;");
					$('#Member_email_id').html("&nbsp;");
					$('#Member_phone').html("&nbsp;"); */
					
					var msg1 = 'Please enter valid membership id/phone no.';
					$('.help-block').show();
					$('.help-block').css("color","red");
					$('.help-block').html(msg1);
					setTimeout(function(){ $('.help-block').hide(); }, 3000);
				}
				else
				{
					var Space = '&nbsp;';
					json = eval("(" + data + ")");
					if( (json[0].Enrollement_id) != 0 )
					{
						/*$('#ToMemberDetails').show();
						$('#Member_name').html(Space+' '+json[0].First_name+' '+json[0].Last_name);
						$('#Member_email_id').html(Space+' '+json[0].User_email_id);
						$('#Member_phone').html(Space+' '+json[0].Phone_no);
						document.getElementById("Member_Enrollement_id").value=(json[0].Enrollement_id);
						document.getElementById("Member_Current_balance").value=(json[0].Current_balance);
						document.getElementById("Member_Membership_id").value=(json[0].Card_id); */
					}
					else 
					{
						// $('#ToMemberDetails').hide();
						$('#Membership_id').val("");
						/*$('#Member_name').html("&nbsp;");
						$('#Member_email_id').html("&nbsp;");
						$('#Member_phone').html("&nbsp;");*/
					}
				}
			}
		});
	}
	else
	{
		// $('#ToMemberDetails').hide();
		$('#Membership_id').val("");
		/*$('#Member_name').html("&nbsp;");
		$('#Member_email_id').html("&nbsp;");
		$('#Member_phone').html("&nbsp;");*/
		
		var msg1 = 'Please enter valid membership id/phone no.';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
}

function Check_current_balance(transPoints)
{
	var login_curr_bal='<?php echo $Current_point_balance; ?>';
	if(parseFloat(transPoints) > parseFloat(login_curr_bal))
	{		
		document.getElementById('Transfer_Points').value='';
		var msg2 = 'Insufficient <?php echo $Company_Details->Currency_name; ?> Balance.';
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