<?php $this->load->view('front/header/header');

	$Cust_current_bal = $Enroll_details -> Current_balance;
	$Cust_Blocked_points = $Enroll_details -> Blocked_points;
	$Cust_Debit_points = $Enroll_details -> Debit_points;

	$Current_point_balance1 = $Cust_current_bal-($Enroll_details->Blocked_points+$Enroll_details->Debit_points);					
	if($Current_point_balance1<0)
	{
		$Current_point_balance1=0;
	} 
	else
	{
		$Current_point_balance1=$Current_point_balance1;
	}
?> 
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Buy_gift_card';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Payment</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom">
	<div class="container giftCardWrapper">
	<form method="post" id="SubmitForm" action="<?php echo base_url()?>index.php/Cust_home/CheckoutGiftCardPayment">
        <div class="accordion" id="accordionExample">
			<input type="hidden" name="Gift_card_amt" id="Gift_card_amt" value="<?php echo $Gift_card_amt; ?>">
			<?php if($Company_Details->Points_used_gift_card == 1){ ?>
            <div class="card">
              <div class="card-head" id="headingOne">
                <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <img class="mr-2" src="<?php echo base_url(); ?>assets/img/redeem-point.svg"> Redeem Points
                </h2>
              </div>
              <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <div class="form-group mb-4">
					<h4 class="point-count"><?php echo $Current_point_balance1.' '.$Company_Details->Currency_name; ?> available</h4><br>
                        <input type="text" class="form-control" id="point_redeem" name="point_redeem" onkeyup="this.value=this.value.replace(/\D/g,'');" placeholder="Enter <?php echo $Company_Details->Currency_name; ?>">
                    </div>
					<button type="button" id="cal_redeem_amt_verify" onclick="cal_redeem_amt(1);" class="redBtn w-100 text-center">VERIFY</button>
                 
					<div id="point_redeem_div" style="width:225px;"> </div>
                </div>
              </div>
            </div>
		<?php } ?>
            <div class="card">
              <div class="card-head" id="headingTwo">
                <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <img class="mr-2" src="<?php echo base_url(); ?>assets/img/mpesa.svg"> MPESA
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <!--<form class="w-100">-->
                    <div class="form-group mb-4">
                        <input type="text" class="form-control" name="Trans_id" id="Trans_id" onkeyup="this.value=this.value.replace(/\D/g,'')" placeholder="Enter your mobile number" maxlength="9">
                    </div>
					
					<p style="color:#322210;font-style: italic;">Enter MPESA Phone No. as 7xxxxxxxx</p>
					<div style="color:red;font-size:12px;" id="Trans_id_error"></div>
					<div style="color:red;font-size:12px;" id="Verify_mpesa_error"></div>
					<div style="color:red;font-size:12px;" id="name"></div>
					<table id="mPesaTable" class="table" align="center" style="width:100%;display:none">
						<tr  id="reenter_block" style="display:none;">
					
						<td colspan="2" align="center">
							<button type="button"  class="redBtn w-100 text-center" onclick="javascript:re_enter();" >
								Re-Enter
							</button>		
						</td>
						</tr>
					</table>
					
					<button class="redBtn w-100 text-center" type="button" onclick="Call_API();" id="verfify_button">VERIFY</button>
                  <!--</form>-->
                </div>
              </div>
            </div>
          </div>
		   <div class="checkout-btn-wrap" id="Enable_paypal1" style="display:none;">
				<input type="hidden" name="Amount_to_Pay" id="Amount_to_Pay" class="form-control">
			</div>
			<div class="row cardPayment total-order mt-3">
				<div class="col-6">Total order</div>
				<div class="col-6 text-right" style="padding-right: 30px;"><?php echo $Symbol_of_currency.' '.number_format($Gift_card_amt,2); ?></div>
			</div>
			<div class="row cardPayment redeem-amount mt-5">
				<div class="col-6">Redeem Amount</div>
				<div class="col-6 text-right"><?php echo $Symbol_of_currency; ?>&nbsp;<input type='text' name='redeem_amt' id='redeem_amt' value="0.00" size='6' style="border:none;"readOnly></div>
			</div>
		  
			<div class="row cardPayment redeem-amount mt-5">
				<div class="col-6">Paid By MPESA</div>
				<div class="col-6 text-right"><?php echo $Symbol_of_currency; ?>&nbsp;
				<input type='text' name='Paid_by_MPESA' id='Paid_by_MPESA' value="0.00" size='6' style="border:none;" readOnly>
				</div>
			</div> 
		  
			<div class="row cardPayment redeem-amount mt-5">
				<div class="col-6">Balance Due</div>
				<div class="col-6 text-right"><?php echo $Symbol_of_currency; ?>&nbsp;
				<input type='text' id='total_bill_amount' name='total_bill_amount' value="<?php echo $Gift_card_amt; ?>"size='6' value="" style="border:none;" readOnly>
				</div>
			</div>
          <div class="row mt-5">
			<p style="color:red;text-align:center;display:none;margin-left: 7rem;" id="total_bill_amount_error"></p>
			<input type="hidden" name="BillAmount" id="BillAmount" value="0">
			<input type="hidden" name="BillRefNumber" id="BillRefNumber" value="">
			<input type="hidden" name="Mpesa_TransID" id="Mpesa_TransID" value="0">
			<input type="hidden" name="VoucherDiscountAmt" id="VoucherDiscountAmt" value="0">
			<input type="hidden" name="Redeemed_discount_voucher" id="Redeemed_discount_voucher" value="0">
			<input type="hidden" name="redeem_by_voucher" id="redeem_by_voucher" value="1">
			<input type="hidden" name="redeem_voucher" id="redeem_voucher" value="0">
			<input type="hidden" name="discount_voucher_percentage" id="discount_voucher_percentage" value="1">
			<input type="hidden" name="discount_voucher_percentage_value" id="discount_voucher_percentage_value" value="1">
			<input type="hidden" name="PaymentMethodBy" id="PaymentMethodBy" value="0">
            <div class="col-12">
				<button type="button" class="redBtn w-100 text-center" id="Proceed_button" onclick="Validate_form();">Proceed</button>
			</div>
		</form>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">	
	function CommaFormatted(amount) {
		var delimiter = ","; // replace comma if desired
		var a = amount.split('.',2)
		var d = a[1];
		var i = parseInt(a[0]);
		if(isNaN(i)) { return ''; }
		var minus = '';
		if(i < 0) { minus = '-'; }
		i = Math.abs(i);
		var n = new String(i);
		var a = [];
		while(n.length > 3) {
			var nn = n.substr(n.length-3);
			a.unshift(nn);
			n = n.substr(0,n.length-3);
		}
		if(n.length > 0) { a.unshift(n); }
		n = a.join(delimiter);
		if(d.length < 1) { amount = n; }
		else { amount = n + '.' + d; }
		amount = minus + amount;
		return amount;
	}

	function cal_redeem_amt(redeemBY)
	{	
		var bal = '<?php echo $Current_point_balance1; ?>';
		var ratio_value = '<?php echo $Redemptionratio;?>';
		var reedem = $("#point_redeem").val();
		var grand_total = $("#Gift_card_amt").val();
		
		var Tot_purAmt=0
		var redeem_voucher_amt=0
		
		Tot_purAmt = grand_total;
		
		if(reedem)
		{
			reedem=reedem;
		} 
		else 
		{
			reedem=0;
		}
		if(reedem > 0)
		{
			$.ajax({
					type: "POST",
					data: {Current_balance:bal,grand_total:grand_total,redeem_voucher_amt: redeem_voucher_amt,Redeem_points: reedem,ratio_value: ratio_value,redeemBY: redeemBY
					},
					url: "<?php echo base_url()?>index.php/Cust_home/cal_redeem_amt_contrl/",
					datatype: "json",
				success: function(data) 
				{
				   $("#PaymentMethodBy").val(0);
				   
					if (data.Error_flag == 0) {
						var redAmt = CommaFormatted(parseFloat(data.EquiRedeem).toFixed(2));
						var BillAmt = CommaFormatted(parseFloat(data.Grand_total).toFixed(2));
						  $('#redeem_amt').val(redAmt);
						  $("#point_redeem").attr("readonly", true);
							$('#total_bill_amount').val(BillAmt);
					}
					if (data.Error_flag == 1) 
					{
						  var msg = 'Equivalent Redeem Amount is Greater than Gift Card Amount';
						  $('#point_redeem_div').show();
						  $('#point_redeem_div').css("color", "red");
						  $('#point_redeem_div').html(msg);
						  setTimeout(function() {
								$('#point_redeem_div').hide();
						  }, 3000);
						  
						  $("#point_redeem").focus();

						  $('#redeem_amt').val(0);
						  $('#point_redeem').val(0);
						  $('#total_bill_amount').val(parseFloat(Tot_purAmt).toFixed(2));
					}
					if (data.Error_flag == 2) {
						  var msg = 'Insufficient Point Balance';
						  $('#point_redeem_div').show();
						  $('#point_redeem_div').css("color", "red");
						  $('#point_redeem_div').html(msg);
							setTimeout(function() {
								$('#point_redeem_div').hide();
						  }, 3000);
						  
						  $("#point_redeem").focus();

						  $('#redeem_amt').val(0);
						  $('#point_redeem').val(0);
						  $('#total_bill_amount').val(parseFloat(Tot_purAmt).toFixed(2));
					}

					if (data.Error_flag == 3) {
						  $('#redeem_amt').val(0);
						  $('#point_redeem').val(0);
						  $('#total_bill_amount').val(parseFloat(grand_total).toFixed(2));
					}
					if (data.Error_flag == 4) {
						 var msg = 'Your Point balance is less than Redeemtion limit ( '+ data.Redeemtion_limit +' ) . ';
						  $('#point_redeem_div').show();
						  $('#point_redeem_div').css("color", "red");
						  $('#point_redeem_div').html(msg);
						  setTimeout(function() {
								$('#point_redeem_div').hide();
						  }, 3000);
						 
						 $("#point_redeem").focus();
						
						  $('#redeem_amt').val(0);
						  $('#point_redeem').val(0);
						  $('#total_bill_amount').val(parseFloat(grand_total).toFixed(2));
					}
					if (data.Error_flag == 5) {
						 var msg = 'You can not redeem more than '+ data.Redeemtion_limit +' . ';
						  $('#point_redeem_div').show();
						  $('#point_redeem_div').css("color", "red");
						  $('#point_redeem_div').html(msg);
						  setTimeout(function() {
								$('#point_redeem_div').hide();
						  }, 3000);
						 
						 $("#point_redeem").focus();
						
						  $('#redeem_amt').val(0);
						  $('#point_redeem').val(0);
						  // $('#total_bill_amount').val(grand_total);
						  $('#total_bill_amount').val(parseFloat(grand_total).toFixed(2));
					}
				}
			});	
		}
		else
		{
			var msg = 'Please Enter Points';
			$('#point_redeem_div').show();
			$('#point_redeem_div').css("color", "red");
			$('#point_redeem_div').html(msg);
			setTimeout(function() {
				$('#point_redeem_div').hide();
			  }, 3000);
		}
	}
	
	function Call_API()
	{
		var goods_till_number= '<?php echo $goods_till_number; ?>';
		var payment_auth_key = '<?php echo $Mpesa_auth_key; ?>';
		var dial_code = '<?php echo $dial_code; ?>';
		
		var Final_Grand_total=$("#total_bill_amount").val();
		Final_Grand_total = Final_Grand_total.split(',').join('');
		
		var Seller_api_url2= "<?php echo $Seller_api_url2; ?>Validateb2bPayment";
		var Seller_mpesastkpush_api_url= "<?php echo $Seller_api_url2; ?>mpesastkpush";
		var Trans_id=$("#Trans_id").val();
		
		$("#mPesaTable").css("display","");
		$("#Trans_id_error").html('');
		
		var TopUp_amount = $("#Gift_card_amt").val();	
		
		if(TopUp_amount == '' )
		{
			var msg = 'Please Enter Amount !!';
			  $('#total_bill_amount_error').show();
			  $('#total_bill_amount_error').css("color", "red");
			  $('#total_bill_amount_error').html(msg);
				setTimeout(function() {
					$('#total_bill_amount_error').hide();
			  }, 8000);			 
			return false;				
		}
		if(Trans_id=="" || Trans_id==0)
		{
			$("#Trans_id_error").html('Enter MPESA Phone No. as 7xxxxxxxx');
			var msg = 'Please pay Balance Due!!';
		    $('#total_bill_amount_error').show();
		    $('#total_bill_amount_error').css("color", "red");
		    $('#total_bill_amount_error').html(msg);
			setTimeout(function() {
				$('#total_bill_amount_error').hide();
		    }, 8000);
						 
			return false;
		}
		$("#verfify_button").html('<font color="green">Verifying...</font>');
		$("#verfify_button").attr("disabled", true);
		$("#Proceed_button").attr("disabled", true);
		
		$.ajax({
			type: "POST",
			data: {Final_Grand_total: Final_Grand_total, goods_till_number:goods_till_number,Trans_id:Trans_id,Seller_api_url2:Seller_api_url2,payment_auth_key:payment_auth_key,dial_code:dial_code,Seller_mpesastkpush_api_url:Seller_mpesastkpush_api_url},
			url: "<?php echo base_url()?>index.php/Shopping/Verify_mpesa",
			success: function(data)
			{
				console.log(data.response);			
			
				var response2 = JSON.parse(data.response);
				
				console.log(response2);
				
				$("#BillAmount").val(response2.PaidAmount); 
				$("#BillRefNumber").val(response2.BillRefNumber); 
				$("#Paid_by_MPESA").val(response2.PaidAmount); 
				$("#Mpesa_TransID").val(response2.TransID); 
				
				var h = response2.BalanceDue;
				
				$("#BillAmount2").html(h); //response2.MpesaPaidAmount 
				if(response2.ResultCode == '9999' || data.response == false)
				{
					$("#name").html(response2.ResultDesc); 
				} 
				else 
				{
					$("#name").html(response2.ResultDesc); 
				}
				
				var new_purchase_amt11 = parseInt(Final_Grand_total) - h;
			
				$("#reenter_block").show();					
				if(response2.ResultCode =='9999' || data.response == false)
				{
					$("#verfify_button").html('<font color="red">FAILED..</font>');
					$("#reenter_block").show();						
					$("#total_bill_amount").val(Final_Grand_total);
				}
				else if(response2.ResultCode =='0000')
				{
					$("#PaidByMPESA").css("display","");     
					$("#reenter_block").hide();
					$("#verfify_button").html('<font color="green">Successfull..</font>');						
					$("#total_bill_amount").val(0);
					
					$("#PaymentMethodBy").val(1);
					if(response2.PaidAmount == Final_Grand_total)
					{
						$("#Proceed_button").attr("disabled", false);
						// Validate_form();  //auto form submit
					}
					else
					{
						$("#Proceed_button").attr("disabled", true);
						$("#verfify_button").html('<font color="red">FAILED..</font>');
						$("#reenter_block").show();						
						$("#total_bill_amount").val(Final_Grand_total);
					}
					// ApplyPaymentRule(5);	
				}
				
				var MpesaPaidAmount = response2.PaidAmount;				
								
				if(parseFloat(Final_Grand_total) < parseFloat(MpesaPaidAmount))
				{
					$("#reenter_block").show();
					$("#compa_block").html('<font color="red">MPesa Paid Amount is Greater than Amount due!<br></font>'); 						
					$("#total_bill_amount").val(Final_Grand_total);
				}
				if(parseFloat(Final_Grand_total) > parseFloat(MpesaPaidAmount))
				{
					$("#reenter_block").show();
					if(response2.ResultCode =='9999' || data.response == false)
					{
						$("#compa_block").html('<font color="red"></font>'); 
					}
					else 
					{
						$("#compa_block").html('<font color="red">MPesa Paid Amount is not equal to Enter Amount due!</font>'); 
					}
					
					$("#total_bill_amount").val(Final_Grand_total);							
				}
			}
		});
	}
	function re_enter()
	{
		$("#Trans_id").val("");
		$("#name_block").hide();
		$("#amt_block").hide();
		$("#reenter_block").hide();	
		$("#verfify_button").html('VERIFY');
		$("#verfify_button").attr("disabled", false);
		$("#Proceed_button").attr("disabled", false);
		$('#compa_block').html('<font></font>');
					
	}
	function Validate_form()
	{
		var total_bill_amount = $("#total_bill_amount").val();				
		if(parseFloat(total_bill_amount) > 0 ){
			
			var msg = 'Please pay Balance Due!!';
			  $('#total_bill_amount_error').show();
			  $('#total_bill_amount_error').css("color", "red");
			  $('#total_bill_amount_error').html(msg);
				setTimeout(function() {
					$('#total_bill_amount_error').hide();
			  }, 8000);
						 
			return false;				
		}
		else
		{
			document.getElementById("SubmitForm").submit();
		}
		//return true;
	}	
	function setLocalStorage()
	{
		var redPts = $("#point_redeem").val();
		var redAmt = $("#redeem_amt").val();
		var BillAmount = $("#BillAmount").val();
		var Mpesa_TransID = $("#Mpesa_TransID").val();
		var Trans_id = $("#Trans_id").val();		
		var name = $("#name").text();
		var BillAmount2 = $("#BillAmount2").text();
		var total_bill_amount = $("#total_bill_amount").val();
		var Gift_card_amt = $("#Gift_card_amt").val();
	
		var LocalArr = new Array();	
		LocalArr.push({redPts: redPts, redAmt:redAmt, BillAmount:BillAmount, Mpesa_TransID:Mpesa_TransID, Trans_id:Trans_id, name:name, BillAmount2:BillAmount2,total_bill_amount:total_bill_amount,Gift_card_amt:Gift_card_amt});
		console.log(LocalArr);
		localStorage.setItem("LocalArtcaffeData", JSON.stringify(LocalArr));
	}
	/* -----------setLocalStorage----------------- */
	
	$( document ).ready(function() 
	{
		var retrievedObject = JSON.parse(localStorage.getItem('LocalArtcaffeData'));
		if(retrievedObject)
		{
			console.log(retrievedObject);
			console.log(retrievedObject[0].redPts);
			
			$("#point_redeem").val(retrievedObject[0].redPts);
			$("#redeem_amt").val(retrievedObject[0].redAmt);
			$("#BillAmount").val(retrievedObject[0].BillAmount);
			$("#BillAmount2").text(retrievedObject[0].BillAmount2);
			$("#total_bill_amount").val(retrievedObject[0].total_bill_amount);
			$("#Gift_card_amt").val(retrievedObject[0].Gift_card_amt);
			
			if(retrievedObject[0].Mpesa_TransID !=0)
			{
				$("#mPesaTable").css("display","block");
				$("#name_block").css("display","block");
				$("#amt_block").css("display","block");
				$("#verfify_button").attr("disabled",true); 
				$("#verfify_button").html('<font color="green">Successfull..</font>');
				$("#Mpesa_TransID").val(retrievedObject[0].Mpesa_TransID);
				$("#Trans_id").val(retrievedObject[0].Trans_id);
				$("#name").text(retrievedObject[0].name);
			}
		} 
	}); 
	
	function Apply_due_amt(Amt)
	{
		var Min_amt = '<?php echo $Min_amount; ?>';
		var Min_amt = parseInt(Min_amt);
		
		if(Amt < Min_amt)
		{
			$('#Gift_card_amt').val("");
			$('#total_bill_amount').val("");
			var msg = 'Minimum Gift Card Amount should Be ' + Min_amt;
			$('#Gift_card_amt_div').show();
			$('#Gift_card_amt_div').css("color", "red");
			$('#Gift_card_amt_div').html(msg);
			setTimeout(function() {
					$('#Gift_card_amt_div').hide();
			  }, 3000);  
		}
		else
		{
			$("#total_bill_amount").val(Amt);
		}
	}
  </script>