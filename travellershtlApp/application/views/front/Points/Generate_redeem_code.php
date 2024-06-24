<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
?>
<main class="qrCodeWrapper">
	<div class="container">
		<div class="row">
			<div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url().'index.php/Cust_home/redeem_history'; ?>"><img src="<?php echo base_url(); ?>assets/img/close-icon1.svg"></a></div>
                <div class="qrCodeHldr">
                    <div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/logo.png"></div>
                    <h2><?php echo ($Enroll_details->First_name.' '.$Enroll_details->Last_name); ?></h2>
                    <div class="pointMain"><?php echo $Current_point_balance; ?> <span class="txt"><?php echo $Currency_name; ?></div>
                    <div class="qrCodeMain flex-column">
					<form class="perDetailForm" id="Generate_code" method="post" action="<?php echo base_url();?>index.php/Cust_home/Generate_code?flag=2">
						<div class="form-group">
							<label class="font-weight-bold">How many points do you want to Redeem ?</label>
							<input type="text" class="form-control" name="Redeem_points" id="Redeem_points"  placeholder="Enter Points" onkeyup="this.value=this.value.replace(/\D/g,'')" onblur="check_bal(this.value);" required>
						</div>
							<div class="sucessfully"></div>
							<div class="Redeem_msg" style="float: center;"></div><br/>
							<button type="submit" name="submit" class="redBtn w-100 text-center">Generate Code</button>
						</div>
					</form>
                </div>
			</div>
		</div>
	</div>
</main>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
function check_bal(points)
{
	var current_points_balance = "<?php echo $Current_point_balance; ?>";
	var points = parseInt(document.getElementById("Redeem_points").value);
	if(points<=0)
	{
		$("#Redeem_points").val("");					
			var msg1 = 'Please Enter Valid Points';
			$('.Redeem_msg').show();
			$('.Redeem_msg').css("color","red");
			$('.Redeem_msg').html(msg1);
			setTimeout(function(){ $('.Redeem_msg').hide(); }, 4000);
			return false;
	}
	if(points > current_points_balance)
	{
		$("#Redeem_points").val("");					
			var msg1 = 'Insufficient Points Balance';
			$('.Redeem_msg').show();
			$('.Redeem_msg').css("color","red");
			$('.Redeem_msg').html(msg1);
			setTimeout(function(){ $('.Redeem_msg').hide(); }, 4000);
			return false;
	}
}
</script>