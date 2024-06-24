<?php $this->load->view('front/header/header'); ?>
<body style="background-image:url('<?php echo base_url(); ?>assets/img/personal-bg.jpg')">
  <div id="wrapper">
    <div class="custom-header">
      <div class="container">
        <div class="heading-wrap">
          <div class="icon back-icon">
            <a href="<?php echo base_url();?>index.php/Cust_home/myprofile?page=1"></a>
          </div>
          <h2>Personal Details</h2>
        </div>
      </div>
    </div>
    <div class="custom-body">
      <div class="box custom-form ptb-30">
		<?php
			if(@$this->session->flashdata('error_code'))
			{
			?>
				<div class="alert bg-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h6 class="form-label"><?php echo $this->session->flashdata('error_code'); ?></h6>
				</div>
			<?php
			}
		?>
        <?php
			// $data = array('onsubmit' => "return Validate_form()");  , $data
			echo form_open_multipart('Cust_home/profile'); ?>
          <div class="row">
            <div class="form-group col-12">
              <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $Enroll_details->First_name ?>" required>
              <label class="form-control-placeholder" for="firstName">First Name</label>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12">
              <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $Enroll_details->Last_name ?>" required>
              <label class="form-control-placeholder" for="lastName">Last Name</label>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12">
              <input type="text" id="datepicker1" name="dob" class="form-control" value="<?php echo date('d/m/Y', strtotime($Enroll_details->Date_of_birth)); ?>" required>
              <label class="form-control-placeholder" for="datepicker1">Date of Birth (dd/mm/yyyy)</label>
            </div>
          </div>
          <div class="row">		  
            <div class="form-group col-12">
              <select class="form-control" name="Sex" id="Sex" >               
                <?php if($Enroll_details->Sex=='Male') 
				{ 
				?>	
					<option selected value="Male">Male</option> 
					<option value="Female" >Female</option>
				<?php  
				} 										
				else if($Enroll_details->Sex=='Female') 
				{
				?>										
					<option  value="Male">Male</option> 
					<option value="Female" selected >Female</option>
				<?php 
				}
				else 
				{
				?>
					<option  value="">Gender</option> 
					<option  value="Male">Male</option> 
					<option value="Female" >Female</option>
				<?php 
				}											
				?>	
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12">
              <input type="text" name="phno" id="phno" class="form-control" value="<?php echo $phnumber; ?>"  required maxlength="9">
              <label class="form-control-placeholder" for="phno">Mobile Number (Without Dial Code)</label>
			  <div class="help-block1" style="float: center;"></div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12">
				<input type="text" name="userEmailId" id="userEmailId" value="<?php echo $User_email_id; ?>" class="form-control" required>
				<label class="form-control-placeholder" for="userEmailId">Email</label>
				<div class="help-block" style="float: center;"></div>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-12">
              <select class="form-control" name="Marital_status" id="Marital_status" onchange="hide_anniversary('this.value');" required>
						
				<?php if($Enroll_details->Married=='Single') 
				{ 
				?>	
					<option selected value="Single">Single</option> 
					<option value="Married" >Married</option>
				<?php  
				} 										
				else if($Enroll_details->Married=='Married') 
				{
				?>										
					<option value="Married" selected>Married</option>
					<option value="Single">Single</option> 
				<?php 
				}
				else 
				{
				?>
					<option value="Married" >Married</option>
					<option value="Single">Single</option> 
				<?php 
				}											
				?>						
			</select>
			
			  
            </div>
          </div>
          <div class="row" id="annversary_div">
            <div class="form-group col-12">
              	  
			  <?php 
								
					if($Enroll_details->Wedding_annversary_date != "" ) {
					?>
						<input  class="form-control"id="datepicker2" name="Wedding_annversary_date" value="<?php echo date('d/m/Y', strtotime( $Enroll_details->Wedding_annversary_date)); ?>" placeholder="Anniversary Date" required>
						
					<?php	} else {
					?>										
						<input  class="form-control" id="datepicker2" name="Wedding_annversary_date" placeholder="Anniversary Date">							
					<?php }									
						//echo"---Date_of_birth----".$Date_of_birth."--<br>";

					?>
              <label class="form-control-placeholder" for="datepicker2">Anniversary Date</label>
            </div>
          </div>
          <div class="row">
            <div class="form-group mt-3 col-12">
				<input type="hidden" name="Enrollment_id" value="<?php echo $Enroll_details->Enrollement_id; ?>">
				<input type="hidden" name="Company_id" value="<?php echo $Enroll_details->Company_id; ?>">
				<input type="hidden" name="User_id" value="<?php echo $Enroll_details->User_id; ?>">
				<input type="hidden" name="membership_id" value="<?php echo $Enroll_details->Card_id; ?>">
				<input type="hidden" name="Password" value="<?php echo $Enroll_details->User_pwd; ?>">
				<button type="submit" class="btn btn-light dark" value="submit" name="submit">Submit</button>
            </div>
          </div>
       <?php echo form_close(); ?>
      </div>
    </div>
	
	<?php 				
		$Cust_min_age=$Company_Details->Cust_min_age;
		if($Cust_min_age != ""){
			$Cust_min_age= $Cust_min_age;
		} else {
			$Cust_min_age=18;
		}
	
		
		if($Enroll_details->Date_of_birth != ""){
			$Date_of_birth= date('Y', strtotime($Enroll_details->Date_of_birth));
			$today_DOB = date('Y');
			$yearDiff= $today_DOB - $Date_of_birth;
			$yearDiff_1 = $yearDiff - $Cust_min_age;
			$time = strtotime("-$yearDiff_1 year", time());
			$dateYear = date("Y", $time);
		}
		
	?>
	
    <?php $this->load->view('front/header/footer');  ?>
   <!--Select DorpDown custom JS-->
  <script type="text/javascript">
    $('select').each(function(){
      var $this = $(this), numberOfOptions = $(this).children('option').length;
    
      $this.addClass('select-hidden'); 
      $this.wrap('<div class="select"></div>');
      $this.after('<div class="select-styled"></div>');
  
      var $styledSelect = $this.next('div.select-styled');
      $styledSelect.text($this.children('option').eq(0).text());
    
      var $list = $('<ul />', {
          'class': 'select-options'
      }).insertAfter($styledSelect);
    
      for (var i = 0; i < numberOfOptions; i++) {
          $('<li />', {
              text: $this.children('option').eq(i).text(),
              rel: $this.children('option').eq(i).val()
          }).appendTo($list);
      }
    
      var $listItems = $list.children('li');
    
      $styledSelect.click(function(e) {
          e.stopPropagation();
          $('div.select-styled.active').not(this).each(function(){
              $(this).removeClass('active').next('ul.select-options').hide();
          });
          $(this).toggleClass('active').next('ul.select-options').toggle();
      });
    
      $listItems.click(function(e) {
          e.stopPropagation();
          $styledSelect.text($(this).text()).removeClass('active');
          $this.val($(this).attr('rel'));
          $list.hide();
          //console.log($this.val());
      });
    
      $(document).click(function() {
          $styledSelect.removeClass('active');
          $list.hide();
      });
  
  });
  
  
  
  function hide_anniversary(InputVal){
		console.log('---InputVal----'+InputVal);
		if(InputVal=='Single'){
			
			$('#annversary_div').css('display','none');
			
		} else{
			$('#annversary_div').css('display','block');
		}
	}
	
	
	
  </script>
  
  
  
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script type="text/javascript">
	



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

		


	$(function() {
  
    $( "#datepicker1" ).datepicker({
      changeMonth: true,
	   // yearRange: "-90:-16",
	   yearRange: "-70:-<?php echo $Company_Details->Cust_min_age; ?>",
      changeYear: true
    });
	
	
	/* $( "#datepicker2" ).datepicker({
      changeMonth: true,	   
	   yearRange: '<?php echo $dateYear; ?>:<?php echo $today_DOB; ?>',
      changeYear: true
    }); */
	
	var DOB='<?php echo $Date_of_birth; ?>';	
	if(DOB) {
		
		var AnniversaryYear =parseInt(DOB) + parseInt(18);	
		var Year= new Date().getFullYear();
		
		$( "#datepicker2" ).datepicker({		  
			changeMonth: true,	   
			yearRange: ''+AnniversaryYear+':'+Year+'',
			changeYear: true
		});
	}
	
	});
  
	
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



$('#phno').change(function()
{	
	var Country = '<?php echo $Enroll_details->Country; ?>';
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
	var phno = $('#phno').val();
	
	if( $("#phno").val() == "" )
	{		
		var msg1 = 'Please Enter Phone Number';
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
				if(data == 1)
				{
					$("#phno").val('')
					
					var msg1 = 'Phone Number Already Exist!';
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




$('#userEmailId').change(function()
{	
	
	var Company_id = '<?php echo $Enroll_details->Company_id; ?>';
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
		$.ajax({
			type: "POST",
			data: { userEmailId: userEmailId, Company_id:Company_id},
			url: "<?php echo base_url()?>index.php/Cust_home/check_email_id",
			success: function(data)
			{				
				if(data == 0)
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
});
</script>
