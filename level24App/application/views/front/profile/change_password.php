<?php $this->load->view('front/header/header'); ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;"></div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/settings';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Change password</h1></div>
				<div class="leftRight"><button></button></div>
			</div>
		</div>
	</div>
</header>

<main class="padTop loginWrapper changeWrapper">
	<div class="logoMain text-center">
		<img src="<?php echo base_url(); ?>assets/img/logo.png">
	</div>
	<div class="BoxHldr">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="titleMain">Change password</div>
				<div class="subtxt">Enter your old password below and enter new password to change your password</div>
			</div>
			<div class="col-12">
				 <?php 
				 $data = array('onsubmit' => "return Change_password()");  
					echo form_open_multipart('Cust_home/changepassword', $data);?>
                    <div class="form-group">
                        <input type="password" class="form-control" required="" name="old_Password" id="old_Password" required placeholder="Old Password">
						<div class="help-block" style="float:center;"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="new_Password"  id="new_Password" required placeholder="New Password">
						<div class="help-block2" style="float:center;"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_Password" id="confirm_Password" required placeholder="Confirm Password">
                    </div>
					<button type="submit" class="redBtn w-100 text-center mt-5">Submit</button><br><br><br><br><br>
					<?php
					if(@$this->session->flashdata('error_code'))
					{
					?>
						<div class="alert bg-white alert-dismissible " style="padding-right: 1rem;box-shadow: 0px 0px 15px 0px rgb(0 0 0 / 10%);" role="alert">
							<div class="row">
							 <img src="<?php echo base_url(); ?>assets/img/java-group-icon.svg"> &nbsp;&nbsp;&nbsp;&nbsp;<h6 class="form-label text-dange" style="margin-top:8px;"> <?php echo $this->session->flashdata('error_code'); ?></h6><button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>							
							</div>	
						</div>
					<?php
					}
				?>
			  <?php echo form_close(); ?>
			</div>
		</div>
	</div>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>	
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<!--Click to Show/Hide Input Password JS-->
	<script type="text/javascript">
		$(".visiblepass").click(function()
		{
		  $(this).toggleClass("fa-eye fa-eye-slash");
		  var input = $($(this).attr("toggle"));
		  if (input.attr("type") == "password") 
		  {
		    input.prop("type", "text");
		  } 
		  else 
		  {
		    input.prop("type", "password");
		  }
		});
		
		function Change_password()
		{ 
			var ucase = new RegExp("[A-Z]+");
			var lcase = new RegExp("[a-z]+");
			var special = new RegExp("[#-z]+");
			var num = new RegExp("[0-9]+");
			var old_Password=$("#old_Password").val();
			var new_password=$("#new_Password").val();
			var Confirm_Password=$("#confirm_Password").val();
			var Error_count=0;
			
			if($('#new_Password').val().indexOf('#') !== -1)
			{
				Error_count++;
				
				var msg = 'Can not use # % & + and = characters for security purpose.';
				$('.help-block2').show();
				$('.help-block2').css("color","red");
				$('.help-block2').css("font-size","10px");
				$('.help-block2').css("line-height","20px");
				$('.help-block2').html(msg);
				setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				return false;
				
			} else {	
			}
			if($('#new_Password').val().indexOf('%') !== -1)
			{
				Error_count++;
				
				var msg = 'Can not use # % & + and = characters for security purpose.';
				$('.help-block2').show();
				$('.help-block2').css("color","red");
				$('.help-block2').css("font-size","10px");
				$('.help-block2').css("line-height","20px");
				$('.help-block2').html(msg);
				setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				return false;
				
			} else {
			}
			if($('#new_Password').val().indexOf('&') !== -1)
			{
				Error_count++;
				
				var msg = 'Can not use # % & + and = characters for security purpose.';
				$('.help-block2').show();
				$('.help-block2').css("color","red");
				$('.help-block2').css("font-size","10px");
				$('.help-block2').css("line-height","20px");
				$('.help-block2').html(msg);
				setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				return false;
				
			} else {
				
				
				
			}
			if($('#new_Password').val().indexOf('+') !== -1)
			{
				Error_count++;
				
				var msg = 'Can not use # % & + and = characters for security purpose.';
				$('.help-block2').show();
				$('.help-block2').css("color","red");
				$('.help-block2').css("font-size","10px");
				$('.help-block2').css("line-height","20px");
				$('.help-block2').html(msg);
				setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				return false;
				
			} else {		
			}
			if($('#new_Password').val().indexOf('=') !== -1)
			{
				Error_count++;
				
				var msg = 'Can not use # % & + and = characters for security purpose.';
				$('.help-block2').show();
				$('.help-block2').css("color","red");
				$('.help-block2').css("font-size","10px");
				$('.help-block2').css("line-height","20px");
				$('.help-block2').html(msg);
				setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				return false;
				
			} else {
				
			}
				if( $('#old_Password').val() == "" || $('#old_Password').val() == null )
				{
					var msg = 'Please Fill Out Field.';
					$('.help-block').show();
					$('.help-block').css("color","red");
					$('.help-block').css("font-size","10px");
					$('.help-block').css("line-height","20px");
					$('.help-block').html(msg);
					setTimeout(function(){ $('.help-block').hide(); }, 3000);
					return false;
				}
				else if($('#new_Password').val() == "" && $('#confirm_Password').val() == "")
				{
					var msg2 = 'Please Fill Out Field.';
					$('.help-block2').show();
					$('.help-block2').css("color","red");
					$('.help-block2').css("font-size","10px");
					$('.help-block2').css("line-height","20px");
					$('.help-block2').html(msg2);
					
					setTimeout(function(){ $('.help-block2').hide(); }, 3000);
					return false;
				}
				else if( $('#new_Password').val() !=  $('#confirm_Password').val())
				{
					$("#confirm_Password").val("");	
					var msg1 = 'Confirm Password should be same as New Password.';
					$('.help-block1').show();
					$('.help-block1').css("color","red");
					$('.help-block1').css("font-size","10px");
					$('.help-block1').css("line-height","20px");
					$('.help-block1').html(msg1);
					setTimeout(function(){ $('.help-block1').hide(); }, 3000);
					return false;
				}


								
				if(new_password.length >= 6 )
				{}
				else
				{				
					Error_count++;
					// $("#new_Password").val("");	
					// $("#confirm_Password").val("");		
					var msg2 = 'Password should be greater than 6 digit.';
					$('.help-block2').show();
					$('.help-block2').css("color","red");
					$('.help-block2').css("font-size","10px");
					$('.help-block2').css("line-height","20px");
					$('.help-block2').html(msg2);
					setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				}
				if(num.test(new_password) == true )
				{}
				else
				{											
					Error_count++;
					// $("#new_Password").val("");	
					// $("#confirm_Password").val("");		
					var msg2 = 'Password should be at least 1 number.';
					$('.help-block2').show();
					$('.help-block2').css("color","red");
					$('.help-block2').css("font-size","10px");
					$('.help-block2').css("line-height","20px");
					$('.help-block2').html(msg2);
					setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				}
				if(ucase.test(new_password) == true )
				{}
				else
				{	
					Error_count++;
					// $("#new_Password").val("");	
					// $("#confirm_Password").val("");		
					var msg2 ='Password should be at least 1 uppercase.';
					$('.help-block2').show();
					$('.help-block2').css("color","red");
					$('.help-block2').css("font-size","10px");
					$('.help-block2').css("line-height","20px");
					$('.help-block2').html(msg2);
					setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				}		
				if (/^[a-zA-Z0-9- ]*$/.test(new_password) == false) 
				{}
				else
				{	
					Error_count++;
					// $("#new_Password").val("");	
					// $("#confirm_Password").val("");		
					var msg2 ='Password should match critria.';
					$('.help-block2').show();
					$('.help-block2').css("color","red");
					$('.help-block2').css("font-size","10px");
					$('.help-block2').css("line-height","20px");
					$('.help-block2').html(msg2);
					setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				}
				if(lcase.test(new_password) == true  )
				{}
				else
				{	
					Error_count++;
					// $("#new_Password").val("");	
					// $("#confirm_Password").val("");		
					var msg2 ='Password should be at least 1 lowercase.';
					$('.help-block2').show();
					$('.help-block2').css("color","red");
					$('.help-block2').css("font-size","10px");
					$('.help-block2').css("line-height","20px");
					$('.help-block2').html(msg2);
					setTimeout(function(){ $('.help-block2').hide(); }, 3000);
				}	
			if(Error_count == 0)
			{	
				var n = Confirm_Password.localeCompare(new_password);
				if( n == 0 )
				{
					/* setTimeout(function() 
					{
						$('#myModal').modal('show'); 
					}, 0);
					setTimeout(function() 
					{ 
						$('#myModal').modal('hide'); 
					},2000); */
					
					// document.Change_Pswd.submit();
					
					return true;	
				}
				else
				{
					return false;
				}
				return true;
			}
			else
			{
				return false;
			}
		}
		
		
		$('#old_Password').blur(function()
		{	
			var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
			var Enrollment_id = '<?php echo $Enroll_details->Enrollement_id; ?>';
			var old_Password = $('#old_Password').val();
			
			if( $("#old_Password").val() == "" )
			{
				var msg = 'Old Password does not Match.';
				$('.help-block').show();
				$('.help-block').css("color","red");
				$('.help-block').css("font-size","10px");
				$('.help-block').css("line-height","20px");
				$('.help-block').html(msg);
				setTimeout(function(){ $('.help-block').hide(); }, 3000);
			}
			else
			{
				$.ajax({
					type: "POST",
					data: { old_Password: old_Password, Company_id:Company_id,Enrollment_id: Enrollment_id},
					url: "<?php echo base_url()?>index.php/Cust_home/checkoldpassword",
					success: function(data)
					{				
						if(data == 0)
						{ 
							$("#old_Password").val("");	
							var msg1 = 'Please Enter Correct Password.';
							$('.help-block').show();
							$('.help-block').css("color","red");
							$('.help-block').css("font-size","10px");
							$('.help-block').css("line-height","20px");
							$('.help-block').html(msg1);
							setTimeout(function(){ $('.help-block').hide(); }, 3000);
						}
						else
						{
						}
					}
				});
			}
		});
	</script>