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
<body>
	<div id="wrapper">	
	<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url();?>index.php/Cust_home/front_home"></a>
					</div>
					<h2>Add Balance</h2>
				</div>
			</div>
		</div>
		<div class="custom-body payment-body">
		<form id="SubmitForm" method="post" action="<?php echo base_url()?>index.php/Cust_home/CheckoutWalletBalancePayment">
		<div class="box h-100 custom-form ptb-30">
			<div class="row">
				<div class="form-group col-12">
					<input type="text" class="form-control" id="Gift_card_amt" name="Gift_card_amt" onkeyup="this.value=this.value.replace(/\D/g,'');" onblur="Apply_due_amt(this.value);" required >
					<label class="form-control-placeholder" for="Gift_card_amt">Enter Amount (<?php echo $Symbol_of_currency; ?>)</label>
					<div id="Gift_card_amt_div" style="width:225px;"> </div>
				</div>  
			</div>
		</div>
		<input type="hidden" name="Amount_to_Pay" id="Amount_to_Pay">
		<input type="hidden" name="RedirectTransactionToken" id="RedirectTransactionToken">
		<input type="hidden" name="RedirectCCDapproval" id="RedirectCCDapproval">
		<input type="hidden" name="DPOCreditAmt" id="DPOCreditAmt" value="0">
		<input type="hidden" name="BillAmount" id="BillAmount" value="0">
		<input type="hidden" name="BillRefNumber" id="BillRefNumber" value="">
		<input type="hidden" name="Mpesa_TransID" id="Mpesa_TransID" value="0">
		<input type="hidden" name="Paid_by_MPESA_Amount" id="Paid_by_MPESA_Amount">
		<input type="hidden" name="PaymentMethodBy" id="PaymentMethodBy" value="0">
		<input type='hidden' class="txt" id='total_bill_amount' name='total_bill_amount' value="">
		<input type='hidden' name='Paid_by_MPESA' id='Paid_by_MPESA' value="0.00">
		<?php if($DPOCreditAmt > 0 && $DPOCreditAmt != Null && $RedirectCCDapproval != Null && $RedirectTransactionToken != "") { ?>
		<input type='hidden' name='Paid_by_credit_card' id='Paid_by_credit_card' value="<?php echo $DPOCreditAmt; ?>">
		<?php } ?>
		<div class="accordion" id="accordion">
				<div class="item">			
					<div class="accordion-header">
						<button type="button" class="btn" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" id="rdm_mpesa">
							MPESA
						</button>
					</div>
					<div id="collapse3" class="collapse" data-parent="#accordion">
						<div class="card-body">
							<div class="point-field">
								<input type="text" class="form-control" placeholder="Enter MPESA Phone No. as 7xxxxxxxx" maxlength="9" name="Trans_id" id="Trans_id" onkeyup="this.value=this.value.replace(/\D/g,'')">
							</div>
								<p style="color:#322210;font-style: italic;">Enter MPESA Phone No. as 7xxxxxxxx</p>
								<div style="color:red;font-size:12px;" id="Trans_id_error"></div>
								<div style="color:red;font-size:12px;" id="Verify_mpesa_error"></div>
								<div style="color:red;font-size:12px;" id="name"></div>
								<table id="mPesaTable" class="table" align="center" style="width:100%;display:none">
									<tr  id="reenter_block" style="display:none;">
								
									<td colspan="2" align="center">
										<button type="button"  class="btn btn-light" onclick="javascript:re_enter();" >
											Re-Enter
										</button>		
									</td>
									</tr>
								</table>
						</div>
					</div>
				</div>
		</div>				
		
		<div class="checkout-total">			
				Total Due: <span class="float-right"><?php echo $Symbol_of_currency; ?>&nbsp;
				<span id='total_bill_amount1'></span>
			</div>
		<!----------------Nilesh 09-07-2020--------------------->
			<input type="hidden" name="RedirectTransactionToken" id="RedirectTransactionToken">
			<input type="hidden" name="RedirectCCDapproval" id="RedirectCCDapproval">
			<input type="hidden" name="DPOCreditAmt" id="DPOCreditAmt" value="0">
		<!----------------Nilesh 09-07-2020--------------------->
		<div class="checkout-btn-wrap">
				<p style="color:red;text-align:center;display:none" id="total_bill_amount_error"></p>
				<button type="button" class="cust-btn btn-block btn-green" onclick="Call_API();" id="verfify_button">Top-Up</button>
			</div>
	</form>
	
	<!-- Loader Modal -->
		<div class="modal fade" id="loader-modal" data-keyboard="false" data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="loaderlabel">
			<div class="vertical-alignment-helper">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content" style="height: 180px;">
						<div class="modal-header custom">
							<div class="modal-body">
								<div class="loadingSpinner">
									<div class="spinner-wave">
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
									</div>
									<span class="text-center"><b>Please, wait...</b></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- /Loader Modal -->
	
<?php $this->load->view('front/header/footer');  ?>
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/validation.js"></script>
<script type="text/javascript">	
	function CommaFormatted(amount) 
	{
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
		$("#verfify_button").html('<font color="green">Verifying..</font>');
		$("#verfify_button").attr("disabled", true);
		
		$.ajax({
			type: "POST",
			data: {Final_Grand_total: Final_Grand_total, goods_till_number:goods_till_number,Trans_id:Trans_id,Seller_api_url2:Seller_api_url2,payment_auth_key:payment_auth_key,dial_code:dial_code,Seller_mpesastkpush_api_url:Seller_mpesastkpush_api_url},
			url: "<?php echo base_url()?>index.php/Shopping/Verify_mpesa",
			success: function(data)
			{
				console.log(data.response);			
			
				var response2 = JSON.parse(data.response);
				
				console.log(response2);
				// alert(response2.ResultCode);
				// alert(response2.ResultDesc);
				
				$("#BillAmount").val(response2.PaidAmount); 
				$("#BillRefNumber").val(response2.BillRefNumber); 
				$("#Paid_by_MPESA").val(response2.PaidAmount); 
				$("#Paid_by_MPESA1").html(response2.PaidAmount);
				$("#Paid_by_MPESA_Amount").val(response2.PaidAmount);
				$("#Mpesa_TransID").val(response2.TransID); 
				
				var h = response2.BalanceDue;
				
				$("#BillAmount2").html(h); //response2.MpesaPaidAmount 
				if(response2.ResultCode == '9999' || data.response == false)
				{
					// $("#name").html('Incorrect MPesa Code');
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
					$("#verfify_button").html('<font color="red">Failed..</font>');
					$("#reenter_block").show();						
					$("#total_bill_amount").val(Final_Grand_total);
					$("#total_bill_amount1").html(Final_Grand_total);
				}
				else if(response2.ResultCode =='0000')
				{
					$("#PaidByMPESA").css("display","");   
					$("#CreateToken_button").css("display","none");  
					$("#reenter_block").hide();
					$("#verfify_button").html('<font color="green">Successfull..</font>');						
					$("#total_bill_amount").val(0);
					$("#total_bill_amount1").html(0);
					
					$("#PaymentMethodBy").val(1);
					if(response2.PaidAmount == Final_Grand_total)
					{
						Validate_form();  //auto form submit
					}
					else
					{
						$("#verfify_button").html('<font color="red">Failed..</font>');
						$("#reenter_block").show();						
						$("#total_bill_amount").val(Final_Grand_total);
						$("#total_bill_amount1").html(Final_Grand_total);
					}
					// ApplyPaymentRule(5);	
				}
				
				var MpesaPaidAmount = response2.PaidAmount;				
								
				if(parseFloat(Final_Grand_total) < parseFloat(MpesaPaidAmount))
				{
					$("#reenter_block").show();
					$("#CardSubmit").css("display","none");
					$("#compa_block").html('<font color="red">MPesa Paid Amount is Greater than Enter Amount due!<br></font>'); 						
					$("#total_bill_amount").val(Final_Grand_total);
					$("#total_bill_amount1").html(Final_Grand_total);
				}
				if(parseFloat(Final_Grand_total) > parseFloat(MpesaPaidAmount))
				{
					$("#reenter_block").show();
					$("#CardSubmit").css("display","none");
					if(response2.ResultCode =='9999' || data.response == false)
					{
						$("#compa_block").html('<font color="red"></font>'); 
					}
					else 
					{
						$("#compa_block").html('<font color="red">MPesa Paid Amount is not equal to Enter Amount due!</font>'); 
					}
					
					$("#total_bill_amount").val(Final_Grand_total);
					$("#total_bill_amount1").html(Final_Grand_total);								
				}
			}
		});
	}	
	function re_enter()
	{
		$("#Trans_id").val(""); 
		$("#name").html('');
		// $("#CardSubmit").hide();
		$("#CardSubmit").css("display","none");
		$("#name_block").hide();
		$("#amt_block").hide();
		$("#reenter_block").hide();
		
		$("#verfify_button").html('Top-Up');
		$("#verfify_button").attr("disabled", false);
		$('#compa_block').html('<font></font>');
						
	}
	function Validate_form()
	{	
		var total_bill_amount = $("#total_bill_amount").val();				
		var TopUp_amount = $("#Gift_card_amt").val();	
		
		if(parseFloat(total_bill_amount) > 0 ){
			
			var msg = 'Please pay Balance Due!';
			  $('#total_bill_amount_error').show();
			  $('#total_bill_amount_error').css("color", "red");
			  $('#total_bill_amount_error').html(msg);
				setTimeout(function() 
				{
					$('#total_bill_amount_error').hide();
			    }, 8000);
						 
			return false;				
		}
		if(TopUp_amount == '' )
		{
			var msg = 'Please Enter Amount!';
			  $('#total_bill_amount_error').show();
			  $('#total_bill_amount_error').css("color", "red");
			  $('#total_bill_amount_error').html(msg);
				setTimeout(function() 
				{
					$('#total_bill_amount_error').hide();
			    }, 8000);
						 
			return false;				
		}
		else
		{
			document.getElementById("SubmitForm").submit();
		}
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
			$("#total_bill_amount1").html(retrievedObject[0].total_bill_amount);
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
			$("#total_bill_amount1").html(0);
			$("#RedirectTransactionToken").val(TransactionToken);
			$("#RedirectCCDapproval").val(CCDapproval);
			$("#DPOCreditAmt").val(DPOCreditAmt);
			// $("#point_redeem").attr("readOnly","readOnly");
			$("#cal_redeem_amt_verify").css("display","none");
			$("#Trans_id").attr("readOnly","readOnly");
			$("#verfify_button").css("display","none");
			$("#CreateToken_button").css("display","none"); 
		}
	//**************Nilesh*****************
	}); 
	function Apply_due_amt(Amt)
	{
		var Min_amt = 1;
		var Min_amt = parseInt(Min_amt);
		
		if(Amt < Min_amt)
		{
			$('#Gift_card_amt').val("");
			$('#total_bill_amount').val("");
			$('#total_bill_amount1').html("");
			// var msg = 'Minimum Amount should Be ' + Min_amt;
			var msg = 'Enter Valid Amount';
			$('#Gift_card_amt_div').show();
			$('#Gift_card_amt_div').css("color", "red");
			$('#Gift_card_amt_div').html(msg);
			setTimeout(function() 
			{
				$('#Gift_card_amt_div').hide();
			}, 3000);  
		}
		else
		{
			$("#total_bill_amount").val(Amt);
			$("#total_bill_amount1").html(Amt);
		}
	}
  </script>