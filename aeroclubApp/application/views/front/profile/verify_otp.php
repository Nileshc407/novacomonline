<?php $this->load->view('front/header/header'); ?>
<body class="bodyBg">
<header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/Verify_email';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>OTP</h1></div>
				<div class="leftRight"><button></div>
			</div>
		</div>
	</div>
</header>
<main class="padTop perDetailsWrapper">
	<div class="BoxHldr">
		<div class="container">
			<div class="row">
			<?php
				if(@$this->session->flashdata('error_code'))
				{
				?>
					<div class="alert alert-info alert-dismissible" id="msgBox" role="alert" style="margin-left: 50px;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h6 class="form-label text-white"><?php echo $this->session->flashdata('error_code'); ?></h6>
					</div>
				<?php
					}
				?>
				<div class="col-12">
					<?php echo form_open_multipart('Cust_home/Verifiy_pin'); ?>
								 <div class="group w-100">
									<input type="text" name="Pin" id="Pin" maxlength="5" required onkeyup="this.value=this.value.replace(/\D/g,'')">
									<span class="bar"></span>
									<label>Enter OTP</label>
									<div class="help-block" style="float: center;"></div>
								</div>
								<div class="group w-100 mt-5">
									<button type="Submit" class="MainBtn w-100 text-center">Submit</button>
								</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</main>		
<?php echo $Enroll_details->Enrollement_id; ?>
<?php $this->load->view('front/header/footer'); ?> 
<script type="text/javascript">
	
/* function Verifiy_pin()
{	
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var Enrollement_id = '<?php echo $Enroll_details->Enrollement_id; ?>';
	var Pin = $('#Pin').val();
	var Pin_length = Pin.length;
	if(Pin_length !=4)
	{
		var msg1 = 'Enter 4 digit code';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
	$.ajax({
		type: "POST",
		data: { Enrollement_id: Enrollement_id, Company_id:Company_id, Pin:Pin},
		url: "<?php echo base_url()?>index.php/Cust_home/Verifiy_pin",
		success: function(data)
		{				
			if(data == 0)
			{
				$("#Pin").val("");						
				var msg1 = 'Enter Valid Code';
				$('.help-block').show();
				$('.help-block').css("color","red");
				$('.help-block').html(msg1);
				setTimeout(function(){ $('.help-block').hide(); }, 3000);
			}
			else
			{
				window.location.href = "<?php echo base_url(); ?>index.php/Cust_home/profile?Verifiy=1";
			}
		}
	});
} */
   </script>