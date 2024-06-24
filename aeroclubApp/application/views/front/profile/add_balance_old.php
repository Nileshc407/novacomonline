<?php 
$this->load->view('front/header/header'); 

$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
if($Current_point_balance<0){
	$Current_point_balance=0;
}else{
	$Current_point_balance=$Current_point_balance;
}

$ci_object = &get_instance();
$ci_object->load->model('Igain_model');
?>
 <header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/myprofile';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Add Balance</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom addBalanceWrapper">
    <div class="container">
        <div class="row">
		<form method="post" class="w-100" id="SubmitForm" action="<?php echo base_url()?>index.php/Cust_home/CheckoutBalancePayment" onsubmit="return Validate_form();">
            <div class="col-12">
                <div class="cardMain d-flex align-items-center mb-4 p-3">
					<div class="form-group mb-4">
						<input type="text" class="form-control" id="Gift_card_amt" name="Gift_card_amt" placeholder="Enter Amount (<?php echo $Symbol_of_currency; ?>)" onkeyup="this.value=this.value.replace(/\D/g,'')" onblur="Apply_due_amt(this.value);" required>
					</div>
                </div>
            </div>

            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                      <div class="card-head" id="headingOne">
                        <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <img class="mr-2" src="<?php echo base_url(); ?>assets/img/mpesa-icon.svg"> MPESA
                        </h2>
                      </div>
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                          <form class="w-100">
                            <div class="form-group mb-4">
                                <input type="text" name="Trans_id" id="Trans_id" onkeyup="this.value=this.value.replace(/\D/g,'')" class="form-control" placeholder="Enter MPESA Phone No. as 7xxxxxxxx" maxlength="9">
                            </div>
							<!--<p style="color:#322210;font-style: italic;">Enter MPESA Phone No. as 7xxxxxxxx</p>-->
							<div style="color:red;font-size:12px;" id="Trans_id_error"></div>
							<div style="color:red;font-size:12px;" id="Verify_mpesa_error"></div>
							<table id="mPesaTable" class="table" align="center" style="width:100%;display:none">
								<tr  id="reenter_block" style="display:none;">
							
								<td colspan="2" align="center">
									<button type="button"  class="btn btn-light" onclick="javascript:re_enter();" >
										Re-Enter
									</button>		
								</td>
								</tr>
							</table>
                            <button type="button" class="MainBtn w-100 text-center" onclick="Call_API();" id="verfify_button">Buy Now</button>
                          </form>
                        </div>
                      </div>
                    </div>
        
                    <div class="card">
                      <div class="card-head" id="headingTwo">
                        <h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <img class="mr-2" src="<?php echo base_url(); ?>assets/img/credit-card-icon.svg"> Credit Card
                        </h2>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
							<div>
								<div class="help-block" style="float: center;"></div>
							</div>
						  <button type="button" class="MainBtn w-100 text-center" onclick="CreateToken(); setLocalStorage();" id="CreateToken_button">Buy Now</button> 
                        </div>
                      </div>
                    </div>
        
                  </div>
            </div>
		<div lass="row cardPayment redeem-amount mt-5" id="Enable_paypal1" style="display:none;"> 
		  <div class="col-6">
			<button type="submit" id="Payment" class="MainBtn w-100 text-center">Proceed</button>
			<input type="hidden" name="Amount_to_Pay" id="Amount_to_Pay" class="form-control">
			</div>
		</div>
        <div class="row cardPayment redeem-amount mt-5">
            <div class="col-6">
				<p id="PaidByMPESA" style="display:none">Paid By MPESA <span class="float-right"><?php echo $Symbol_of_currency; ?>&nbsp;
					<input type='text' name='Paid_by_MPESA' id='Paid_by_MPESA' value="0.00" class="txt" size='6'readOnly></span></p>
					
				<?php //if($DPOCreditAmt > 0 && $DPOCreditAmt != Null) { ?>
				<?php /* if($DPOCreditAmt > 0 && $DPOCreditAmt != Null && $RedirectCCDapproval != Null && $RedirectTransactionToken != "") { ?>
				<p>Paid By Credit Card <span class="float-right"><?php echo $Symbol_of_currency; ?>&nbsp;
				<input type='text' name='Paid_by_credit_card' id='Paid_by_credit_card' value="<?php echo $DPOCreditAmt; ?>" class="txt" size='6'readOnly></span></p>
				<?php } */ ?>	
			</div>
        </div>
		<?php if($DPOCreditAmt > 0 && $DPOCreditAmt != Null && $RedirectCCDapproval != Null && $RedirectTransactionToken != "") { ?>
		<div class="row cardPayment redeem-amount mt-5">
            <div class="col-6">Paid By Credit Card : </div>
            <div class="col-6 text-right"><?php echo $Symbol_of_currency; ?>&nbsp; 
				<input type='text' name='Paid_by_credit_card' id='Paid_by_credit_card' value="<?php echo $DPOCreditAmt; ?>" class="txt" size='6' readOnly>
			</div>
        </div>
		<?php } ?>	
        <div class="row cardPayment total-order mt-3">
            <div class="col-6">Total order:</div>
            <div class="col-6 text-right">
				<input type='text' id='total_bill_amount' class="txt" name='total_bill_amount' size='6' value="" readOnly></span>
			</div>
        </div>
		<!--<div class="row mt-5" id="Enable_paypal1" style="display:none;">
			<div class="col-12">
				<input type="submit" id="Payment" class="MainBtn w-100 text-center" value="PROCEED" />
				<input type="hidden" name="Amount_to_Pay" id="Amount_to_Pay" class="form-control">
			</div>
		</div>-->
        <div class="row mt-5">
            <div class="col-12">
				<p style="color:red;text-align:center;display:none" id="total_bill_amount_error"></p>
				
				<input type="hidden" name="RedirectTransactionToken" id="RedirectTransactionToken">
				<input type="hidden" name="RedirectCCDapproval" id="RedirectCCDapproval">
				<input type="hidden" name="DPOCreditAmt" id="DPOCreditAmt" value="0">
			
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
				<button type="submit" id="Payment" class="MainBtn w-100 text-center">Proceed</button>
			</div>
        </div>
	</form>
    </div>
</main>		
<?php $this->load->view('front/header/footer');  ?>
<script type="text/javascript">	
	/*-----------CommaFormatted------29-05-2020---------------*/
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
	/*-----------CommaFormatted------29-05-2020---------------*/
	/*-----------Cart_redeem_amt------29-05-2020---------------*/
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
            $.ajax({
					type: "POST",
					data: {Current_balance:bal,grand_total:grand_total,redeem_voucher_amt: redeem_voucher_amt,Redeem_points: reedem,ratio_value: ratio_value,redeemBY: redeemBY
					},
					url: "<?php echo base_url()?>index.php/Express_checkout/cal_redeem_amt_contrl/",
					datatype: "json",
				success: function(data) 
				{
				   // alert("---Error_flag-----"+data.Error_flag);
				   // alert("---Grand_total-----"+data.Grand_total);
				   
				   $("#PaymentMethodBy").val(0);
				   
					if (data.Error_flag == 0) {
						var redAmt = CommaFormatted(parseFloat(data.EquiRedeem).toFixed(2));
						var BillAmt = CommaFormatted(parseFloat(data.Grand_total).toFixed(2));
						  $('#redeem_amt').val(redAmt);
						 
						   if(BillAmt == '0' || BillAmt =='0.00' ){
							   $("#CreateToken_button").css("display","none");
							   $("#verfify_button").css("display","none");
						   } else {
							   
							   $("#CreateToken_button").css("display","");
							   $("#verfify_button").css("display","");
						   }
						  
							$('#total_bill_amount').val(BillAmt);
						  
							if(BillAmt <= 0 ){
								
								$("#ContinuetoCart").attr("disabled", true);
								
							} else {
								
								$("#ContinuetoCart").attr("disabled", false);
							}
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
						  // $('#total_bill_amount').val(grand_total);
						  // $('#total_bill_amount').val(parseFloat(grand_total).toFixed(2));
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
						  // $('#total_bill_amount').val(grand_total);
						  // $('#total_bill_amount').val(parseFloat(grand_total).toFixed(2));
						  $('#total_bill_amount').val(parseFloat(Tot_purAmt).toFixed(2));
					}

					if (data.Error_flag == 3) {
						  $('#redeem_amt').val(0);
						  $('#point_redeem').val(0);
						  // $('#total_bill_amount').val(grand_total);
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
						  // $('#total_bill_amount').val(grand_total);
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
	/* -----------Cart_redeem_amt------29-05-2020--------------- */
	
	/* -----------Call_API------29-05-2020--------------- */
		function Call_API()
		{
			var goods_till_number= '<?php echo $goods_till_number; ?>';
			var payment_auth_key = '<?php echo $Mpesa_auth_key; ?>';
			var dial_code = '<?php echo $dial_code; ?>';
			// var Final_Grand_total= "<?php echo $_SESSION['Final_Grand_total']; ?>"; 
			// var Final_Grand_total= "<?php echo $total_bill_amount; ?>";
			var Final_Grand_total=$("#total_bill_amount").val();
			Final_Grand_total = Final_Grand_total.split(',').join('');
			
			var Seller_api_url2= "<?php echo $Seller_api_url2; ?>ValidateB2BPayment";
			var Seller_mpesastkpush_api_url= "<?php echo $Seller_api_url2; ?>mpesastkpush";
			var Trans_id=$("#Trans_id").val();
			
			/*	alert(Final_Grand_total);
				/*alert(goods_till_number);
				alert(Seller_api_url2);
				alert(Trans_id);
				return false;  */
			
			$("#mPesaTable").css("display","");
			$("#Trans_id_error").html('');
			
			if(Trans_id=="" || Trans_id==0)
			{
				$("#Trans_id_error").html('Enter MPESA Phone No. as 7xxxxxxxx');
				return false;
			}
			$("#verfify_button").html('<font color="green">Verifying</font>');
			$("#verfify_button").attr("disabled", true);
			
			var loaderModal = $('#loader-modal');
				loaderModal.find('.modal-body').html('<div class="loadingSpinner"><div class="spinner-wave"><div></div><div></div><div></div><div></div><div></div></div><span class="text-center"><b>Please, wait...</b></span></div>');
				
				loaderModal.modal('show');
			
			$.ajax({
				type: "POST",
				data: {Final_Grand_total: Final_Grand_total, goods_till_number:goods_till_number,Trans_id:Trans_id,Seller_api_url2:Seller_api_url2,payment_auth_key:payment_auth_key,dial_code:dial_code,Seller_mpesastkpush_api_url:Seller_mpesastkpush_api_url},
				url: "<?php echo base_url()?>index.php/Shopping/Verify_mpesa",
				success: function(data)
				{
					console.log(data.response);			
					// console.log(data.BalanceDue);
					loaderModal.modal('hide');	
					var response2 = JSON.parse(data.response);
					// var response2 = JSON.parse(JSON.stringify(data));
					console.log(response2);
					//response2.MpesaPaidAmount = 1190;
					$("#BillAmount").val(response2.PaidAmount); 
					$("#BillRefNumber").val(response2.BillRefNumber); 
					$("#Paid_by_MPESA").val(response2.PaidAmount); // Nilesh 04-7-2020
					$("#Mpesa_TransID").val(response2.TransID); 
					// var h = CommaFormatted(parseFloat(response2.MpesaPaidAmount).toFixed(2));
					var h = response2.BalanceDue;
					//console.log(h);
					$("#BillAmount2").html(h); //response2.MpesaPaidAmount 
					if(response2.ResultCode =='9999' || data.response == false){
						$("#name").html('Incorrect MPesa Code');
					} else {
						$("#name").html(response2.ResultDesc); 
					}
					
				//	console.log(response2.BalanceDue);	
					
					/* 28-05-2020 */
					
						var new_purchase_amt11 = parseInt(Final_Grand_total) - h;
						// $("#total_bill_amount").val(new_purchase_amt11);
						
					
					/* 28-05-2020 */
					
					
					//$("#CardSubmit").show();
					
					$("#CardSubmit").css("display","");					
					$("#name_block").show();
					$("#amt_block").show();
					$("#reenter_block").show();					
					if(response2.ResultCode =='9999' || data.response == false)
					{
						$("#verfify_button").html('<font color="red">Failed..</font>');
						$("#CardSubmit").css("display","none");
						$("#reenter_block").show();						
						$("#total_bill_amount").val(Final_Grand_total);
						$("#point_redeem").attr("readOnly","");
						
					}
					else
					{
						$("#PaidByMPESA").css("display","");   // Nilesh 9-7-2020
						$("#CreateToken_button").css("display","none");  // Nilesh 9-7-2020
						$("#reenter_block").hide();
						$("#verfify_button").html('<font color="green">Successfull..</font>');						
						$("#point_redeem").attr("readOnly","readOnly");
						// $("#ContinuetoCart").attr("disabled", true);
						$("#Discount_vouchers").attr("disabled", true);
						$("#cal_redeem_amt_verify").css("display","none");
						$("#total_bill_amount").val(0);
						
						$("#PaymentMethodBy").val(1);
						
						// ApplyPaymentRule(5);	
					}
					 
					/*  alert('Final_Grand_total '+parseFloat(Final_Grand_total));
					 alert('MpesaPaidAmount '+parseFloat(MpesaPaidAmount)); */
					 
					var MpesaPaidAmount = response2.PaidAmount;				
						
				//	 console.log("MpesaPaidAmount--"+parseFloat(MpesaPaidAmount));
				//	 console.log("Final_Grand_total--"+parseFloat(Final_Grand_total));			
					if(parseFloat(Final_Grand_total) < parseFloat(MpesaPaidAmount))
					{
						$("#reenter_block").show();
						$("#CardSubmit").css("display","none");
						$("#compa_block").html('<font color="red">MPesa Paid Amount is Greater than Ordered Amount due!<br>You may need to order more Items to match Paid amount</font>'); 						
						$("#total_bill_amount").val(Final_Grand_total);
						
						$("#point_redeem").attr("readOnly","");
						// $("#ContinuetoCart").attr("disabled", false);
						$("#Discount_vouchers").attr("disabled", false);
						$("#cal_redeem_amt_verify").css("display","");
						
					}
					if(parseFloat(Final_Grand_total) > parseFloat(MpesaPaidAmount))
					{
						$("#reenter_block").show();
						$("#CardSubmit").css("display","none");
						if(response2.ResultCode =='9999' || data.response == false)
						{
							$("#compa_block").html('<font color="red"></font>'); 
						}else {
							$("#compa_block").html('<font color="red">MPesa Paid Amount is not equal to Ordered Amount due!</font>'); 
						}
						
						$("#total_bill_amount").val(Final_Grand_total);
						
						$("#point_redeem").attr("readOnly","");
						// $("#ContinuetoCart").attr("disabled", false);
						$("#Discount_vouchers").attr("disabled", false);								
					}
				}
			});
		}
	
	/* -----------Call_API------29-05-2020--------------- */
	
		/* -----------Re-Enter------30-05-2020--------------- */	
		function re_enter()
		{
			// $("#CardSubmit").hide();
			$("#CardSubmit").css("display","none");
			$("#name_block").hide();
			$("#amt_block").hide();
			$("#reenter_block").hide();
			
			$("#verfify_button").html('Verify');
			$("#verfify_button").attr("disabled", false);
			$('#compa_block').html('<font></font>');
						
		}
	/* -----------Re-Enter------30-05-2020--------------- */
	
		function Validate_form()
		{
		//	LocalArtData = JSON.parse(localStorage.getItem("LocalArtcaffeData")); 
		//	console.log(LocalArtData);
			
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
			
			return true;
			
			
			/* setTimeout(function() 
			{
				$('#myModal').modal('show'); 
			}, 0);
			setTimeout(function() 
			{ 
				$('#myModal').modal('hide'); 
			},20000000000); */
		}	
		$("#SubmitForm").on("submit", function()
		{		
			var Validate= Validate_form();
			console.log(Validate);
			
			// return false;
			
			if( Validate == true){
				
				/* var loaderModal = $('#loader-modal');
				loaderModal.find('.modal-body').html('<div class="loadingSpinner"><div class="spinner-wave"><div></div><div></div><div></div><div></div><div></div></div><span class="text-center"><b>Please, wait...</b></span></div>');
				
				loaderModal.modal('show');
				
				setTimeout(function() {
					loaderModal.modal('hide');	
					
				},20000000000); */
				
			} else{
				
				return false;
			}
		  });//submit
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
	function CreateToken()
	{
		var Final_Grand_total=$("#total_bill_amount").val();
		
		$("#CreateToken_button").html('<font color="green">Pay now</font>');
		$("#CreateToken_button").attr("disabled", true);
	
		$.ajax({
			type: "POST",
			data: {Final_Grand_total: Final_Grand_total},
			url: "<?php echo base_url()?>index.php/Cust_home/CreateToken",
			success: function(data)
			{
				json = eval("(" + data + ")");
				// alert(json['Result'][0]);
				if((json['Result'][0]) == 000)
				{
					// ApplyPaymentRule(3);
					
					$("#point_redeem").attr("readOnly","readOnly");
					// $("#Discount_vouchers").attr("disabled", true);
					$("#Trans_id").attr("readOnly","readOnly");
					// var loaderModal = $('#loader-modal');
					
					// loaderModal.find('.modal-body').html('<div class="loadingSpinner"><div class="spinner-wave"><div></div><div></div><div></div><div></div><div></div></div><span class="text-center"><b>Loading DPO Page...</b></span></div>');
					// loaderModal.modal('show');
					
					$("#PaymentMethodBy").val(1);					
					
					var TransToken = json['TransToken'][0];
					window.location.href = '<?php echo $Company_Details->Payment_url; ?>'+TransToken;	
				}
				else 
				{
					$("#PaymentMethodBy").val(0);
					// if((json['Result']) == 0)
					$("#CreateToken_button").html('<font color="red">Failed..</font>');
					$("#CreateToken_button").attr("disabled", false);
					$("#CreateToken_button").html('Pay now</font>');
					// $("#CreateToken_button").html('<font color="red">Failed..</font>');
					var msg1 = 'Unable to Process, Try again Later';
					$('.help-block').show();
					$('.help-block').css("color","red");
					$('.help-block').html(msg1);
					setTimeout(function(){ $('.help-block').hide(); }, 6000);
					// $("#CreateToken_button").attr("disabled", false);
				}	
			}
		});
	}
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
	//**************Nilesh*****************
		var TransactionToken = '<?php echo $RedirectTransactionToken; ?>';
		var CCDapproval = '<?php echo $RedirectCCDapproval; ?>';
		var DPOCreditAmt = '<?php echo $DPOCreditAmt; ?>';
		if(TransactionToken != "" && CCDapproval !="")
		{
			$("#total_bill_amount").val(0);
			$("#RedirectTransactionToken").val(TransactionToken);
			$("#RedirectCCDapproval").val(CCDapproval);
			$("#DPOCreditAmt").val(DPOCreditAmt);
			$("#point_redeem").attr("readOnly","readOnly");
			$("#cal_redeem_amt_verify").css("display","none");
			$("#Trans_id").attr("readOnly","readOnly");
			$("#verfify_button").css("display","none");
			$("#CreateToken_button").css("display","none"); 
		}
	//**************Nilesh*****************
	}); 
/**********************Nilesh 09-07-2020***********************/
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
