<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
?>
<main class="qrCodeWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="closeBtn"><a href="<?php echo base_url().'index.php/Cust_home/front_home'; ?>"><img src="<?php echo base_url(); ?>assets/img/close-icon.svg"></a></div>
            </div>
            <div class="col-12">
                <div class="BoxHldr">
                    <div class="text-center mb-3"><img src="<?php echo base_url(); ?>assets/img/logo.svg"></div>
                    <div class="pointMain"><?php echo $Current_point_balance; ?> <?php echo $Currency_name; ?></div>
                    <!--<div class="pointMain mb-4">8068 KES</div>-->
                    <hr>
					<form class="perDetailForm" id="Generate_code" method="post" action="<?php echo base_url();?>index.php/Cust_home/Generate_code?flag=2">
						<div class="titleTxt">How many point do you want to Redeem?</div>
						<div><input type="text" class="form-control" name="Redeem_points" id="Redeem_points"  placeholder="Enter Points" onkeyup="this.value=this.value.replace(/\D/g,'')" onblur="check_bal(this.value);" required></div>
						<div class="mt-3">
							<div class="Redeem_msg" style="float: center;"></div><br/>
							<button type="submit" name="submit" class="MainBtn w-100 text-center">Generate Code</button>
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
