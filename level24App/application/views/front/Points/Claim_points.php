<?php $this->load->view('front/header/header'); ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/redeem_history';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Earn Points</h1></div>
				<div class="leftRight"><button><!--<img src="<?php echo base_url(); ?>assets/img/edit-icon.svg">--></button></div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom">
	<div class="container">
		<div class="row">
			<?php
				if(@$this->session->flashdata('error_code'))
				{
				?>
					<div class="alert bg-danger alert-dismissible" id="msgBox" role="alert" style="margin-left: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h6 class="form-label"><?php echo $this->session->flashdata('error_code'); ?></h6>
					</div>
				<?php
				}
			?>
            <div class="col-12 perDetailsWrapper">
                <form class="perDetailForm" action="<?php echo base_url();?>index.php/Cust_home/Post_transaction" method="post">
                    <div class="form-group">
                        <label class="font-weight-bold"> Enter the Code on your Receipt to earn Points</label>
                        <input type="text" class="form-control" name="Claim_code" id="Claim_code" onblur="Validate_bill(this.value);" placeholder="Enter 6 Digit Code" maxlength="6" required>
						<div class="help-block" style="float: center;"></div>
                    </div>
					<button type="button" id="Validate_Click" class="redBtn w-100 text-center" onclick="Validate_bill();">Validate Code</button>
					<button type="submit" id="Submit_Click" class="redBtn w-100 text-center" style="display:none">Submit</button>
			   </form>
            </div>
		</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script>
function Validate_bill(Claim_code)
{	
	var Claim_code = $('#Claim_code').val();
	if( $("#Claim_code").val() == "")
	{	
		var msg1 = 'Please Enter 6 Digit Code';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
	else
	{
		$.ajax({
			type: "POST",
			data: {Claim_code: Claim_code},
			url: "<?php echo base_url()?>index.php/Cust_home/Validate_bill",
			success: function(data)
			{		
				if(data == 2)
				{
					$("#Claim_code").val("");					
					var msg1 = 'Code is Invalid! Please Enter Correct Code';
					$('.help-block').show();
					$('.help-block').css("color","red");
					$('.help-block').html(msg1);
					setTimeout(function(){ $('.help-block').hide(); }, 3000);
					// uname.focus();
					return false;
				}
				else if(data == 3)
				{
					$("#Claim_code").val("");					
					var msg1 = 'Earn period Expired!';
					$('.help-block').show();
					$('.help-block').css("color","red");
					$('.help-block').html(msg1);
					setTimeout(function(){ $('.help-block').hide(); }, 3000);
					return false;
				}
				else if(data == 4)
				{
					$("#Claim_code").val("");					
					var msg1 = 'Points of this Bill already Claimed!';
					$('.help-block').show();
					$('.help-block').css("color","red");
					$('.help-block').html(msg1);
					setTimeout(function(){ $('.help-block').hide(); }, 3000);
					return false;
				}
				else if(data == 1)
				{
					$('#Claim_code').attr('readonly', true);
					var msg1 = 'Code is Valid! Please Click on Submit Button to Earn Points';
					$('.help-block').show();
					$('.help-block').css("color","green");
					$('.help-block').html(msg1);
					$("#Validate_Click").css("display","none"); 
					$("#Submit_Click").css("display","");  
					return true;
				}
			}
		});
	}
}
</script>