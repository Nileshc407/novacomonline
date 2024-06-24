<?php $this->load->view('front/header/header'); 
$Photograph = $Enroll_details->Photograph;

if($Photograph=="")
{
	$Photograph=base_url()."assets/img/user.jpg";
} else {
	$Photograph=$this->config->item('base_url2').$Photograph;
}	
?>
<body class="bodyBg">
<header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/myprofile';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Personal Details</h1></div>
				<div class="leftRight"><button><img src="<?php echo base_url(); ?>assets/img/edit-icon.svg"></button></div>
			</div>
		</div>
	</div>
</header>
<main class="padTop perDetailsWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="photoEdit d-flex flex-column mb-4">
				<form  class="perDetailForm" name="Update_profile" id="myForm" method="POST" action="<?php echo base_url()?>index.php/Cust_home/Update_img" enctype="multipart/form-data" onsubmit="return form_submit();">	
                    <div class="userImg" id="profile_pic">
						<img class="cameraIcon" src="<?php echo base_url(); ?>assets/img/camera-icon.svg">
						<label class="cameraIcon" for="image1"><b>&nbsp;&nbsp;</b></label>
						<input name="image1" id="image1" style="visibility:hidden;float: right;position: absolute;" type="file" onchange="readImage(this,'#image2');">
						<img id="image2" src="<?php echo $Photograph; ?>">
                    </div>
					
                    <div class="nameTxt">
                        <?php echo ucwords($Enroll_details->First_name).' '.ucwords($Enroll_details->Last_name); ?>
                    </div>
				</form>
                </div>
            </div>

        </div>
    </div>
    
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
						<h6 class="form-label"><?php echo $this->session->flashdata('error_code'); ?></h6>
					</div>
				<?php
				}
			?>
                <div class="col-12">
					<form class="perDetailForm" id="Updateprofile" method="post" action="<?php echo base_url();?>index.php/Cust_home/profile">
                        <div class="group w-100">
                            <input type="text" name="firstName" id="firstName" value="<?php echo ucwords($Enroll_details->First_name); ?>" onblur="allLetter(this.value);" required>
                            <span class="bar"></span>
                            <label>First Name</label>
                        </div>
                        <div class="group w-100 mt-5">
                            <input type="text" name="middleName" id="middleName" value="<?php echo ucwords($Enroll_details->Middle_name); ?>" onblur="allLetter1(this.value);">
                            <span class="bar"></span>
                            <label>Middle Name</label>
                        </div>
						<div class="group w-100 mt-5">
                            <input type="text" name="lastName" id="lastName" value="<?php echo ucwords($Enroll_details->Last_name); ?>" onblur="allLetter1(this.value);" required>
                            <span class="bar"></span>
                            <label>Last Name</label>
                        </div>
						
						<div class="group w-100 mt-5">
                           <textarea name="currentAddress" id="currentAddress"><?php if($Enroll_details->Current_address !=Null){ echo App_string_decrypt($Enroll_details->Current_address); } ?></textarea>
                            <span class="bar"></span>
                            <label>Postal Address</label>
                        </div>
						<div class="group w-100 mt-5">
                            <input type="text" name="Zip" id="Zip" value="<?php echo $Enroll_details->Zipcode; ?>">
                            <span class="bar"></span>
                            <label>Zip Code</label>
                        </div>
						<div class="group w-100 mt-5">
						   <label>Country</label><br><br>
							<select name="Country" class="form-control" onchange="Get_states(this.value);" required >				
								<?php 
								foreach($Country_array as $rec)
								{?>
									<option value="<?php echo $rec['id'];?>" <?php if($Enroll_details->Country == $rec['id']){echo "selected";} ?>><?php echo $rec['name'];?></option>
								<?php } ?>	
							</select>
                        </div>
						<div class="group w-100 mt-5" id="Show_States">
							<label>State</label><br><br>
							<select name="State" class="form-control" onchange="Get_cities(this.value);">		
							<option value="">Select country first</option>	
							<?php
								foreach($States_array as $rec)
								{ ?>
									<option value="<?php echo $rec->id;?>" <?php if($Enroll_details->State == $rec->id){echo "selected";} ?>><?php echo $rec->name;?></option>
						<?php   } ?>								
							</select>
                        </div>
						<div class="group w-100 mt-5" id="Show_Cities">
							<label>City</label><br><br>
							<select name="City" class="form-control">		
						    <option value="">Select state first</option>	
							<?php
								foreach($City_array as $rec)
								{ ?>
									<option value="<?php echo $rec->id;?>" <?php if($Enroll_details->City == $rec->id){echo "selected";} ?>><?php echo $rec->name;?></option>
						<?php 	}
								?>							
							</select>
                        </div>
						
						<div class="group w-100 mt-5">
                            <input type="text"  name="userEmailId" id="userEmailId" value="<?php echo $User_email_id; ?>" onblur="checkemail();" required>
							<?php  if($Enroll_details->Email_verified == 1){ ?>
							<span class="form-ver text-success">Verified</span>
							<?php } else { ?>
								<a href="<?php echo base_url(); ?>index.php/Cust_home/Verify_email"><span class="form-ver unver text-danger">Unverified</span></a>
							<?php } ?>
                            <span class="bar"></span>
                            <label>Email (Work)</label>
							<div class="help-block" style="float: center;"></div>
                        </div>
						<div class="group w-100 mt-5">
                            <input type="text"  name="homeEmailId" id="homeEmailId" value="<?php  if($Enroll_details->User_email_id1 != Null){ echo App_string_decrypt($Enroll_details->User_email_id1); } ?>" onblur="checkemail1();">
                            <span class="bar"></span>
                            <label>Email (Home)</label>
							<div class="help-block0" style="float: center;"></div>
                        </div>
						
						<div class="group w-100 mt-5">
                            <input type="number" name="phno" id="phone" value="<?php echo $phnumber; ?>" maxlength="10" required>
                            <span class="bar"></span>
                            <label class="w-100 pb-2" style="top:-16px;">Mobile Number 1 (Without Dial Code)</label>
							<div class="help-block1" style="float: center;"></div>
                        </div> 
						<div class="group w-100 mt-5">
                            <input type="number" name="phno1" id="phone1" value="<?php if($Enroll_details->Phone_no1 != Null){ echo  App_string_decrypt($Enroll_details->Phone_no1); } ?>" maxlength="10">
                            <span class="bar"></span>
                            <label class="w-100 pb-3" style="top:-16px;">Mobile Number 2 (Without Dial Code)</label>
							<div class="help-block2" style="float: center;"></div>
                        </div>
						
						<div id="BirthDate" class="group w-100 mt-5">
                            <input type="text" name="dob" id="datepicker" value="<?php echo date('Y-m-d', strtotime($Enroll_details->Date_of_birth)); ?>">
                            <span class="bar"></span>
                            <label>Date of Birth</label>
                        </div>
						
						<div class="group w-100 mt-5">
							<label>Nationality 1</label><br><br>
							<select name="Nationality" class="form-control">	
							<option value="">Please Select</option>
								<?php 
								foreach($Country_array as $rec)
								{?>
									<option value="<?php echo $rec['name'];?>" <?php if($Enroll_details->Nationality == $rec['name']){echo "selected";} ?>><?php echo $rec['name'];?></option>
								<?php } ?>	
							</select>
                        </div>
						<div class="group w-100 mt-5">
							<label>Nationality 2</label><br><br>
							<select name="Nationality1" class="form-control">
							<option value="">Please Select</option>							
								<?php 
								foreach($Country_array as $rec)
								{?>
									<option value="<?php echo $rec['name'];?>" <?php if($Enroll_details->Nationality1 == $rec['name']){echo "selected";} ?>><?php echo $rec['name'];?></option>
								<?php } ?>	
							</select>
                        </div>
						
						<div class="group w-100 mt-5">
                            <input type="text" name="Occupation" id="Occupation" value="<?php echo $Enroll_details->Occupation; ?>">
                            <span class="bar"></span>
                            <label>Occupation</label>
                        </div>
						<div class="group w-100 mt-5">
                            <input type="text" name="Employer" id="Employer" value="<?php echo $Enroll_details->Employer; ?>">
                            <span class="bar"></span>
                            <label>Employer</label>
                        </div>
						<div class="group w-100 mt-5">
                            <input type="text" name="Blood_group" id="Blood_group" value="<?php echo $Enroll_details->Blood_group; ?>">
                            <span class="bar"></span>
                            <label>Blood Group</label>
                        </div>
                        <div class="group w-100 mt-5" style="margin-bottom: 100px;">
							<input type="hidden" name="Enrollment_id" value="<?php echo $Enroll_details->Enrollement_id; ?>">
							<input type="hidden" name="Company_id" value="<?php echo $Enroll_details->Company_id; ?>">
							<input type="hidden" name="User_id" value="<?php echo $Enroll_details->User_id; ?>">
							<input type="hidden" name="membership_id" value="<?php echo $Enroll_details->Card_id; ?>">
							<input type="hidden" name="Password" value="<?php echo $Enroll_details->User_pwd; ?>">
							
							<button type="Submit" class="MainBtn w-100 text-center">Submit</button><br/><br/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<!--Select DorpDown custom JS-->
  <script type="text/javascript">
  function hide_anniversary(InputVal){
		console.log('---InputVal----'+InputVal);
		if(InputVal=='Single'){
			
			$('#annversary_div').css('display','none');
			
		} else{
			$('#annversary_div').css('display','block');
		}
	}
function Change_anniversary_date(dobDate){
	
	console.log(dobDate);	
	var DOBarr = dobDate.split('/');	
	console.log(DOBarr[2]);
	var Anniversary =parseInt(DOBarr[2]) + parseInt(18);
	console.log(Anniversary);
	var Year= new Date().getFullYear();	
	$( "#datepicker2" ).datepicker({      
		changeMonth: true,	   
		yearRange: ''+Anniversary+':'+Year+'',
		changeYear: true
    });
}
function ValidateEmail(mail) 
{
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
	{
		return true;
	}
    //alert("You have entered an invalid email address!");
	
	var msg1 = 'Please enter valid email id';
	$('.help-block').show();
	$('.help-block').css("color","red");
	$('.help-block').html(msg1);
	setTimeout(function(){ $('.help-block').hide(); }, 3000);
    return false;
}
function ValidateEmail1(mail) 
{
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
	{
		return true;
	}
    //alert("You have entered an invalid email address!");
	
	var msg1 = 'Please enter valid email id';
	$('.help-block0').show();
	$('.help-block0').css("color","red");
	$('.help-block0').html(msg1);
	setTimeout(function(){ $('.help-block0').hide(); }, 3000);
    return false;
}

$('#phone').change(function()
{	
	var Country = '<?php echo $Enroll_details->Country; ?>';
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var phno = $('#phone').val();
	
	if( $("#phone").val() == "" )
	{		
		var msg1 = 'Please Enter Mobile Number';
		$('.help-block1').show();
		$('.help-block1').css("color","red");
		$('.help-block1').html(msg1);
		setTimeout(function(){ $('.help-block1').hide(); }, 3000);
	}
	else
	{
		$.ajax({
			type: "POST",
			data: { phno: phno,Company_id:Company_id, Country:Country},
			url: "<?php echo base_url()?>index.php/Cust_home/check_phone_number",
			success: function(data)
			{				
			
				console.log(data);
				if(data >0)
				{
					$("#phone").val('')
					
					var msg1 = 'Mobile Number Already Exist!';
					$('.help-block1').show();
					$('.help-block1').css("color","red");
					$('.help-block1').html(msg1);
					setTimeout(function(){ $('.help-block1').hide(); }, 3000);
				}
				else
				{					
				}
			}
		});
	}
});
$('#phone1').change(function()
{	
	var Country = '<?php echo $Enroll_details->Country; ?>';
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var Phone1 = '<?php echo App_string_decrypt($Enroll_details->Phone_no1); ?>';
	
	var phno = $('#phone1').val();
	
	if( $("#phone1").val() == "" )
	{		
		var msg1 = 'Please Enter Mobile Number';
		$('.help-block2').show();
		$('.help-block2').css("color","red");
		$('.help-block2').html(msg1);
		setTimeout(function(){ $('.help-block2').hide(); }, 3000);
	}
	else
	{
		if(phno != Phone1)
		{
			$.ajax({
				type: "POST",
				data: { phno1: phno,Company_id:Company_id, Country:Country},
				url: "<?php echo base_url()?>index.php/Cust_home/check_phone_number1",
				success: function(data)
				{				
				
					console.log(data);
					if(data >0)
					{
						$("#phone1").val('')
						
						var msg1 = 'Mobile Number Already Exist!';
						$('.help-block2').show();
						$('.help-block2').css("color","red");
						$('.help-block2').html(msg1);
						setTimeout(function(){ $('.help-block2').hide(); }, 3000);
					}
					else
					{					
					}
				}
			});
		}
	}
});

$('#userEmailId').change(function()
{		
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var User_email_id = '<?php echo App_string_decrypt($Enroll_details->User_email_id); ?>'; 
	var userEmailId = $('#userEmailId').val();
	
	var validEmailId=ValidateEmail(userEmailId);
	// alert(validEmailId);
	// return false;
	if( $("#userEmailId").val() == "" || validEmailId == false)
	{	
		// alert(validEmailId);
		var msg1 = 'Please Enter Email Id';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
	else
	{
		if(User_email_id != userEmailId )
		{
			$.ajax({
				type: "POST",
				data: { userEmailId: userEmailId, Company_id:Company_id},
				url: "<?php echo base_url()?>index.php/Cust_home/check_email_id",
				success: function(data)
				{				
					if(data >0)
					{
						$("#userEmailId").val("");					
						var msg1 = 'Email Id Already Exist!';
						$('.help-block').show();
						$('.help-block').css("color","red");
						$('.help-block').html(msg1);
						setTimeout(function(){ $('.help-block').hide(); }, 3000);
					}
					else
					{
						
					}
				}
			});
		}
	}
});

function allLetter(uname)
{
	if(uname !="")
	{
		var letters = /^[A-Za-z]+$/;
		if(uname.match(letters))
		{
			return true;
		}
		else
		{
			$("#firstName").val("");					
			var msg1 = 'Name must have alphabet characters only';
			$('.firstName').show();
			$('.firstName').css("color","red");
			$('.firstName').html(msg1);
			setTimeout(function(){ $('.firstName').hide(); }, 3000);
			// uname.focus();
			return false;
		}
	}
}
function allLetter1(uname)
{ 
	if(uname !="")
	{
		var letters = /^[A-Za-z]+$/;
		if(uname.match(letters))
		{
			return true;
		}
		else
		{
			$("#lastName").val("");					
			var msg1 = 'Name must have alphabet characters only';
			$('.lastName').show();
			$('.lastName').css("color","red");
			$('.lastName').html(msg1);
			setTimeout(function(){ $('.lastName').hide(); }, 3000);
			// uname.focus();
			return false;
		}
	}
}
$(document).ready(function() 
{
	setTimeout(function(){ $('#msgBox').hide(); }, 3000);
});
function readImage(input,div_id) 
{	
	document.getElementById('profile_pic').style.display="";
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function (e) {
			$(div_id)
				.attr('src', e.target.result)
				.height(100);
		};

		reader.readAsDataURL(input.files[0]);
	}
	document.getElementById("myForm").submit();
}
function checkemail()
{		
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var User_email_id = '<?php echo App_string_decrypt($Enroll_details->User_email_id); ?>';
	var userEmailId = $('#userEmailId').val();
	
	var validEmailId=ValidateEmail(userEmailId);
	// alert(validEmailId);
	// return false;
	if( $("#userEmailId").val() == "" || validEmailId == false)
	{	
		// alert(validEmailId);
		$('#userEmailId').val('');
		var msg1 = 'Enter valid email id';
		$('.help-block').show();
		$('.help-block').css("color","red");
		$('.help-block').html(msg1);
		setTimeout(function(){ $('.help-block').hide(); }, 3000);
	}
	else
	{
		if(User_email_id != userEmailId )
		{
			$.ajax({
				type: "POST",
				data: { userEmailId: userEmailId, Company_id:Company_id},
				url: "<?php echo base_url()?>index.php/Cust_home/check_email_id",
				success: function(data)
				{	
					if(data > 0)
					{
						$("#userEmailId").val("");					
						var msg1 = 'Email Already Exist';
						$('.help-block').show();
						$('.help-block').css("color","red");
						$('.help-block').html(msg1);
						setTimeout(function(){ $('.help-block').hide(); }, 3000);
					}
					else
					{
						
					}
				}
			});
		}
	}
}
function checkemail1()
{		
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var User_email_id1 = '<?php echo App_string_decrypt($Enroll_details->User_email_id1); ?>';
	var homeEmailId = $('#homeEmailId').val();
	
	var validEmailId=ValidateEmail1(homeEmailId);

	if( $("#homeEmailId").val() == "" || validEmailId == false)
	{	
		// alert(validEmailId);
		$('#homeEmailId').val('');
		var msg1 = 'Enter valid email id';
		$('.help-block0').show();
		$('.help-block0').css("color","red");
		$('.help-block0').html(msg1);
		setTimeout(function(){ $('.help-block0').hide(); }, 3000);
	}
	else
	{
		if(User_email_id1 != homeEmailId )
		{
			$.ajax({
				type: "POST",
				data: { homeEmailId: homeEmailId, Company_id:Company_id},
				url: "<?php echo base_url()?>index.php/Cust_home/check_email_id1",
				success: function(data)
				{	
					if(data > 0)
					{
						$("#homeEmailId").val("");					
						var msg1 = 'Email Already Exist';
						$('.help-block0').show();
						$('.help-block0').css("color","red");
						$('.help-block0').html(msg1);
						setTimeout(function(){ $('.help-block0').hide(); }, 3000);
					}
					else
					{
						
					}
				}
			});
		}
	}
}
function Get_states(Country_id)
{
	
	$.ajax({
		type: "POST",
		data: {Country_id: Country_id},
		url: "<?php echo base_url()?>index.php/Cust_home/Get_states",
		success: function(data)
		{
			$("#Show_States").html(data.States_data);
		}
	});
}
function Get_cities(State_id)
{	
	$.ajax({
		type: "POST",
		data: {State_id: State_id},
		url: "<?php echo base_url()?>index.php/Cust_home/Get_cities",
		success: function(data)
		{
			$("#Show_Cities").html(data.City_data);
		}
	});
}
</script>
<style>
.perDetailsWrapper .BoxHldr {
   height: 100%
}
</style>