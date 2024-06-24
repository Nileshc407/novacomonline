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
$delivery_type=$_SESSION['delivery_type'];
?> 
<body style="background-image:url('<?php echo base_url(); ?>assets/img/menu-smoothies.jpg')">
	<div id="wrapper">
		<div class="custom-header">
			<div class="container">
				<div class="heading-wrap">
					<div class="icon back-icon">
						<a href="<?php echo base_url();?>index.php/Cust_home/front_home"></a>
					</div>
					<h2>Gift Card</h2>
				</div>
			</div>
		</div>
		<div class="custom-body payment-body">
		<form method="post" action="<?php echo base_url()?>index.php/Cust_home/CheckoutGiftCardPayment">
		<div class="box h-100 custom-form ptb-30">
			<div class="row">
				<div class="form-group col-12">
					<input type="text" id="Gift_card_amt" name="Gift_card_amt"  class="form-control" required onkeyup="this.value=this.value.replace(/\D/g,'')" onblur="Apply_due_amt(this.value);">
					<label class="form-control-placeholder" for="Gift_card_amt">Gift Card Amount (<?php echo $Symbol_of_currency; ?>)</label>
					<!--<small class="instruction">Example 7xx xxx xxx</small>-->
					<div class="help-block" style="float:center;"></div>
				</div>  
			</div>
		</div>
						
		<div class="accordion" id="accordion">
			<div class="item">
				<div class="accordion-header">
					<button type="button" class="btn" data-toggle="collapse" data-target="#collapse3" aria-expanded="false">
						MEPSA Transition
					</button>
				</div>
				<div id="collapse3" class="collapse" data-parent="#accordion">
					<div class="card-body">
						<div class="point-field">
							<input type="text" name="Trans_id" id="Trans_id" class="form-control"/>
							<button type="button" onclick="Call_API();" id="verfify_button" >VERIFY</button>
						</div>
						<div style="color:red;font-size:12px;" id="Trans_id_error"></div>
						<div style="color:red;font-size:12px;" id="Verify_mpesa_error"></div>
						<table id="mPesaTable" class="table" align="center" style="width:100%;display:none">		
							<tr id="name_block" style="display:none;">
								<th><strong id="Medium_font">Name:</strong></th>
								<td id="name"></td>
							</tr>
							<tr id="amt_block" style="display:none;">
								<th><strong id="Medium_font">Transaction Amount:</strong></th>
								<td id="BillAmount2"></td>
							</tr>
							<tr>
							<th colspan="2" id="compa_block"></th>
								
							</tr>
							<tr  id="reenter_block" style="display:none;">
						
							<td colspan="2" align="center">
								<button type="button"  class="btn btn-light" onclick="javascript:re_enter();" >
									Re-Enter
								</button>		
							</td>
							</tr>
						</table>
						<div class="lipa-wrap">
							<div class="lipa-img">
								<img src="<?php echo base_url(); ?>assets/img/lipa.png" alt=""/>
							</div>
							<div class="buy-good">
								<p>Buy goods</p>
								<h3><?php echo $goods_till_number; ?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
		 
		<!--<div class="checkout-total">
			Total Due: <span class="float-right"><?php //echo $Symbol_of_currency; ?>&nbsp;
			<input type='text' id='total_bill_amount' class="txt" name='total_bill_amount' size='6' value="0.00" readOnly></span>
			<!--<p>Total Due: <span class="float-right">360.00</span> -->
		<!--</div>-->
		<div class="checkout-btn-wrap" id="Enable_paypal1" style="display:none;">
			<input type="submit" id="Payment" class="cust-btn btn-block btn-green" value="PROCEED" />
			<input type="hidden" name="Amount_to_Pay" id="Amount_to_Pay" class="form-control">
		</div>
			
	</form>
<?php $this->load->view('front/header/footer');  ?>
<style>
.point-field input.form-control{
	background: white !IMPORTANT;
	color: #7E746B !IMPORTANT;
}
.txt{
	width: 70px;
	border: none;
	background: transparent;
	color: #fff;
	text-align: right;
}
</style>
<script type="text/javascript">
function Apply_due_amt(Due_amt)
{
	// $("#total_bill_amount").val(Due_amt);
}
/* -----------CommaFormatted------29-05-2020--------------- */
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
/* -----------CommaFormatted------29-05-2020--------------- */
/* -----------Call_API------29-05-2020--------------- */
	function Call_API()
	{
		var goods_till_number= '<?php echo $goods_till_number; ?>';
		
		var Final_Grand_total=$("#Gift_card_amt").val();
		
		var Seller_api_url2= "<?php echo $Seller_api_url2; ?>ValidateB2BPayment";
		var Trans_id=$("#Trans_id").val();
		
		$("#mPesaTable").css("display","");
		$("#Trans_id_error").html('');
		
		if(Trans_id=="" || Trans_id==0)
		{
			$("#Trans_id_error").html('Please Enter M-PESA Transaction ID');
			return false;
		}
		$("#verfify_button").html('<font color="green">Verifying</font>');
		$("#verfify_button").attr("disabled", true);
		
		$.ajax({
			type: "POST",
			data: {Final_Grand_total: Final_Grand_total, goods_till_number:goods_till_number,Trans_id:Trans_id,Seller_api_url2:Seller_api_url2},
			url: "<?php echo base_url()?>index.php/Shopping/Verify_mpesa",
			success: function(data)
			{
				console.log(data.response);	
				var response2 = JSON.parse(data.response);
				var h = CommaFormatted(parseFloat(response2.MpesaPaidAmount).toFixed(2));
				$("#BillAmount2").html(h); //response2.MpesaPaidAmount 
				// $("#Amount_to_Pay").val(h); 
				$("#Amount_to_Pay").val(response2.MpesaPaidAmount); 
				// $("#name").html(response2.ResultDesc); 
				
				if(response2.ResultCode =='9999' || data.response == false){
					$("#name").html('Incorrect MPesa Code');
				} else {
					$("#name").html(response2.ResultDesc); 
				}
				/* 28-05-2020 */
					var new_purchase_amt11 = parseInt(Final_Grand_total) - h;
					// $("#total_bill_amount").val(new_purchase_amt11);
				/* 28-05-2020 */
				
				$("#Payment").css("display","");					
				$("#name_block").show();
				$("#amt_block").show();
				$("#reenter_block").show();			
				
				if(response2.ResultCode =='9999' || data.response == false)
				{
					$("#verfify_button").html('<font color="red">Failed..</font>');
					$("#Payment").css("display","none");
					$("#reenter_block").show();						
					// $("#total_bill_amount").val(Final_Grand_total);
					// $("#Gift_card_amt").attr("readOnly","");
				}
				else
				{
					$("#reenter_block").hide();
					$("#verfify_button").html('<font color="green">Successfull..</font>');		
					$("#Enable_paypal1").css("display","");					
					// $("#Gift_card_amt").attr("readOnly","readOnly");
					// $("#ContinuetoCart").attr("disabled", true);
				}
				
				var MpesaPaidAmount = response2.MpesaPaidAmount;		
				
				 /* console.log(parseFloat(MpesaPaidAmount));
				 console.log(parseFloat(Final_Grand_total)); */			
				if(parseFloat(Final_Grand_total) < parseFloat(MpesaPaidAmount))
				{
					$("#reenter_block").show();
					$("#Payment").css("display","none");
					$("#compa_block").html('<font color="red">MPesa Paid Amount is Greater than Gift Card Amount due!<br>You may need to Purchase more amount of Gift Card to match Paid amount</font>'); 						
					// $("#total_bill_amount").val(Final_Grand_total);
					
					// $("#Gift_card_amt").attr("readOnly","");
					// $("#ContinuetoCart").attr("disabled", false);
				}
				if(parseFloat(Final_Grand_total) > parseFloat(MpesaPaidAmount))
				{
					$("#reenter_block").show();
					$("#Payment").css("display","none");
					if(response2.ResultCode =='9999' || data.response == false)
					{
						$("#compa_block").html('<font color="red"></font>'); 
					}else {
						$("#compa_block").html('<font color="red">MPesa Paid Amount is not equal to Gift Card Amount!</font>'); 
					}
					
					// $("#total_bill_amount").val(Final_Grand_total);
					
					$("#Gift_card_amt").attr("readOnly","");
					// $("#ContinuetoCart").attr("disabled", false);
				} 
			}
		});
	}
/* -----------Call_API------29-05-2020--------------- */
/* -----------Re-Enter------30-05-2020--------------- */	
	function re_enter()
	{
		// $("#Payment").hide();
		$("#Payment").css("display","none");
		$("#name_block").hide();
		$("#amt_block").hide();
		$("#reenter_block").hide();
		
		$("#verfify_button").html('Verify');
		$("#verfify_button").attr("disabled", false);
		$('#compa_block').html('<font></font>');
	}
	/* -----------Re-Enter------30-05-2020--------------- */
  </script>