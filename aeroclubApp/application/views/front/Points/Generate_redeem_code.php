<?php 
$this->load->view('front/header/header');  
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points); ?>

<main class="qrCodeWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url(); ?>index.php/Cust_home/front_home"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg"></a></div>
                <div class="text-center mt-4 mb-3"><img src="<?php echo base_url(); ?>assets/img/logo.png"></div>
                <h2><?php echo ($Enroll_details->First_name.' '.$Enroll_details->Last_name); ?></h2>
                <div class="pointMain"><?php echo $Current_point_balance; ?> <?php echo $Currency_name; ?></div>
            </div>
        </div>
    </div>
    <div class="BoxHldr" style="height: 70vh; !important">
	 <div class="container">
        <div class="row">
			<div class="col-12">
				<form class="perDetailForm" id="Generate_code" method="post" action="<?php echo base_url();?>index.php/Cust_home/Generate_code?flag=2">
					<label class="font-weight-bold">How much do you want to Pay?</label><br><br>
					<div class="group w-100">
						<input type="text" name="Redeem_points" id="Redeem_points"  onkeyup="this.value=this.value.replace(/\D/g,'')" onblur="check_bal(this.value);" required>
						<span class="bar"></span>
						<label>Enter Amount</label>
					</div>
						<div class="sucessfully"></div>
						<div class="Redeem_msg" style="float: center;"></div><br/>
						<button type="Submit" class="MainBtn w-100 text-center">Generate Code</button>
				</form>
			</div>
		</div>
    </div>
   </div>
</main>
<?php 
$this->load->view('front/header/header'); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
function check_bal(points)
{
	var current_points_balance = "<?php echo $Current_point_balance; ?>";
	var points = parseInt(document.getElementById("Redeem_points").value);
	if(points<=0)
	{
		$("#Redeem_points").val("");					
			var msg1 = 'Please Enter Valid Amount';
			$('.Redeem_msg').show();
			$('.Redeem_msg').css("color","red");
			$('.Redeem_msg').html(msg1);
			setTimeout(function(){ $('.Redeem_msg').hide(); }, 4000);
			return false;
	}
	if(points > current_points_balance)
	{
		$("#Redeem_points").val("");					
			var msg1 = 'Insufficient Balance';
			$('.Redeem_msg').show();
			$('.Redeem_msg').css("color","red");
			$('.Redeem_msg').html(msg1);
			setTimeout(function(){ $('.Redeem_msg').hide(); }, 4000);
			return false;
	}
}
</script>