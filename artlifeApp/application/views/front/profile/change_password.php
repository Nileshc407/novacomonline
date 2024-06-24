<?php $this->load->view('front/header/header'); ?>
	<div class="custom-body body-wrapper">
		<div class="custom-form ptb-30"><br>
			<?php
				if(@$this->session->flashdata('error_code'))
				{
				?>
					<div id="msgBox" class="alert bg-warning alert-dismissible" role="alert" style="background-color: #158071 !important;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h6 class="form-label" style="color: white;"><?php echo $this->session->flashdata('error_code'); ?></h6>
					</div>
				<?php
				}
			?>
			
			 <?php 
			 $data = array('onsubmit' => "return Change_password()");  
			 echo form_open_multipart('Cust_home/changepassword', $data); ?>
				<div class="row">
					<div class="form-group col-12">
						<div class="inputpasseye">
							<input type="password" name="old_Password" id="old_Password" class="form-control" required>
							<label class="form-control-placeholder" for="old_Password">Old Password</label>
							<div class="input-group-addon">	<i toggle="#old_Password" class="fa fa-eye-slash visiblepass" aria-hidden="true" style="margin-right: 15px;"></i>
							<div class="help-block" style="float:center;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12">
						<div class="inputpasseye">
							<input type="password"  name="new_Password"  id="new_Password" class="form-control" required>
							<label class="form-control-placeholder" for="new_Password">New Password</label>
							<div class="input-group-addon"> <i toggle="#new_Password" class="fa fa-eye-slash visiblepass" aria-hidden="true" style="margin-right: 15px;"></i>							
							<div class="help-block2" style="float:center;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12">
						<div class="inputpasseye">
							<input type="password"  name="confirm_Password"   id="confirm_Password" class="form-control" required>
							<label class="form-control-placeholder" for="confirm_Password">Confirm Password</label>
							<div class="input-group-addon"> <i toggle="#confirm_Password" class="fa fa-eye-slash visiblepass" aria-hidden="true" style="margin-right: 15px;"></i>
							<div class="help-block1" style="float:center;"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-12">	<small class="instruction">Password should be minimum of 6 characters with one number, one special, one upper and one lower case letter</small>
					</div>
				</div>
				<div class="row">
					<div class="form-group mt-3 col-12">
						<button type="submit" class="btn btn-primary btn-block" value="submit" name="submit" style="color: #fff; background-color: #321E04; border-color: #321E04;">Submit</button>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
<?php $this->load->view('front/header/footer');  ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css">
	<!--Click to Show/Hide Input Password JS-->
	<script type="text/javascript">
		$(".visiblepass").click(function() {
		  $(this).toggleClass("fa-eye fa-eye-slash");
		  var input = $($(this).attr("toggle"));
		  if (input.attr("type") == "password") {
		    input.attr("type", "text");
		  } else {
		    input.attr("type", "password");
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
			
			/* console.log($('#new_Password').val().indexOf('#'));
			console.log($('#new_Password').val().indexOf('%'));
			console.log($('#new_Password').val().indexOf('&'));
			console.log($('#new_Password').val().indexOf('+'));
			console.log($('#new_Password').val().indexOf('='));
			return false; */
			
			
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
					var msg1 = "The specified password doesn't match with the new password";
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
					var msg2 = "The entered password doesn't match the provided guidelines";
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
				var msg = 'Please enter correct old password';
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
							var msg1 = 'Please enter correct old password';
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
		
		
		
		/*------------15-06-2020-----------*/
		 /* $('#new_Password').bind('keypress', function(e) {
			if($('#new_Password').val().length >= 0){
				alert('new_Password');
				if (e.which == 35 || e.which == 37 || e.which == 38 || e.which == 43 || e.which == 61){//space bar
					// e.preventDefault();
					
					var msg = 'Can not use # % & + and = characters for security purpose.';
					$('.help-block2').show();
					$('.help-block2').css("color","red");
					$('.help-block2').css("font-size","10px");
					$('.help-block2').css("line-height","20px");
					$('.help-block2').html(msg);
					setTimeout(function(){ $('.help-block2').hide(); }, 3000);
					return false;			
				} else {
					// alert('False');
				}
			}
		});  */
		
		

		/*------------15-06-2020-----------*/
	$(document).ready(function() {
 setTimeout(function(){ $('#msgBox').hide(); }, 3000);
});

</script>
<style>
.inputpasseye .input-group-addon .fa-eye-slash {
    color: var(--dark);
    opacity: 0.6;
}
.inputpasseye .input-group-addon {
    position: absolute;
    top: 0;
    right: 0;
    line-height: 40px;
    font-size: 20px;
    cursor: pointer;
}
</style>