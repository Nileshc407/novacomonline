<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
	if($icon_src=="green") { $foot_icon="white"; } else { $foot_icon=$icon_src; }
    //echo"---Beneficiary_company_id---Done-beneficiary----". $Beneficiary_company_id."--<br>";
   //echo"---From_Beneficiary_company_id---Done---beneficiary----". $From_Beneficiary_company_id."--<br>";
   //var_dump($Beneficiary_Company);
	// echo "Publisher_Redemptionratio----".$Publisher_Redemptionratio;
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Buy Miles</title>
    <?php $this->load->view('header/header'); ?>   
   <?php /* echo form_open_multipart('Beneficiary/Beneficiary_Points_Transfer', array('onsubmit' =>'return Validate_form();'));	?>
    <div id="application_theme" class="section pricing-section" style="min-height: 550px;">
		<div class="container">
			<div class="section-header">
				<p><a href="<?php echo base_url(); ?>index.php/Beneficiary/Load_beneficiary" style="color:#ffffff;"><img src="<?php echo base_url(); ?>assets/icons/<?php echo $icon_src; ?>/left.png" id="arrow"></a></p>
				<p id="Extra_large_font">Buy <?php echo $Get_Beneficiary_members->Currency; ?> </p> 	
			</div>
		
			<div class="row pricing-tables">
				<div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -31px;">                                                
					<div class="pricing-table wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s" id="front_head">
						<div class="pricing-details">
							<div class="row">
								<div class="col-md-12">
									<div class="row ">
										<div class="col-xs-12 " style="width: 100%;">
											<address>                                                               
												<div class="col-xs-12">
													  <img src="<?php echo $this->config->item('base_url2');?><?php echo $Get_Beneficiary_members->Company_logo; ?>" alt="" class="img-rounded img-responsive" width="20%;">
												</div>
													<span id="Small_font"></span><strong id="Value_font"><?php echo $Get_Beneficiary_members->Beneficiary_name; ?></strong><br>
											   <!-- <span id="Small_font"></span><strong id="Value_font">400 Miles</strong><br>
											</address>
											<span id="Small_font"></span> <span id="Value_font"><strong>( Equivalent: 40 Joy Coins)</strong></span>-->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<!-- 3rd Card -->
					<div class="pricing-table wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s" id="front_head">
						<div class="pricing-details">
							<div class="row ">
								<div class="col-xs-12 " style="width: 100%;">
									<address >
										<div class="col-xs-12" > 
											<strong class="Joy_points"><?php echo $Company_Details->Alise_name; ?> Wallet Balance = <?php echo $Login_Current_balance; ?> ~ <?php echo round($Login_Current_balance/$Publisher_Redemptionratio); ?> <?php echo $Get_Beneficiary_members->Currency; ?></strong>
										</div>
									</address>								
									
										<div class="col-xs-12" style="margin-top:5px;"> 
											<strong id="Value_font"> (<?php echo round($Publisher_Redemptionratio); ?> <?php echo $Company_Details->Currency_name; ?> = 1 <?php echo $Get_Beneficiary_members->Currency; ?>)</strong>
										</div>
									
									
									<ul>
									   <li id="Small_font" class="text-left">
											<input type="tel"  name="Purchase_miles" id="Purchase_miles" onchange="Get_Equi_points(this.value);" onkeyup="this.value=this.value.replace(/\D/g,'')"  placeholder="Enter Purchase <?php echo $Get_Beneficiary_members->Currency; ?>" class="txt" style="text-align:center;" autocomplete="off">
											<div id="Purchase_miles_div" ></div>
										</li>						 
										<li id="Small_font" class="text-left"> 				
										<input type="text" name="Equivalent" id="Equivalent" placeholder="Equivalent <?php echo $Company_Details->Currency_name; ?>" class="txt" readonly style="text-align:center;"> 
										   <div id="Equivalent_div"></div>
										</li>
									</ul>
									<address> 
									   <input type="hidden" name="Igain_company_id" value="<?php echo $Get_Beneficiary_members->Igain_company_id; ?>">
									   <input type="hidden" name="Beneficiary_company_id" value="<?php echo $Get_Beneficiary_members->Register_beneficiary_id; ?>">
									   <input type="hidden" name="Beneficiary_company_name" value="<?php echo $Get_Beneficiary_members->Beneficiary_company_name; ?>">
									   <input type="hidden" name="Beneficiary_name" value="<?php echo $Get_Beneficiary_members->Beneficiary_name; ?>">
									   <input type="hidden" name="Beneficiary_membership_id" value="<?php echo $Get_Beneficiary_members->Beneficiary_membership_id; ?>"> 
									   <input type="hidden" name="Publisher_Redemptionratio" value="<?php echo $Publisher_Redemptionratio; ?>">
									   <button  type="submit" id="button1" >Submit</button><br>

									   <br>
									</address>
									<br />
							   </div>
							</div>
						</div>                                            
					</div>
					
				</div>

			</div>
		</div>
    </div>
   
	
<?php echo form_close(); */ ?>


<section class="content-header">
		<h1> Purchase <?php echo $Get_Beneficiary_members->Currency; ?></h1>         
	</section>

	<?php  echo form_open_multipart('Beneficiary/Beneficiary_Points_Transfer', array('onsubmit' =>'return Validate_form();'));	?>
    
	<section class="content">
        <section class="content">
        <div class="row">
			
			<div class="login-box">
			  <div class="login-box-body">
				<p class="login-box-msg"> </p>
				<div class="col-xs-12">
					  <img src="<?php echo $this->config->item('base_url2');?><?php echo $Get_Beneficiary_members->Company_logo; ?>" alt="" class="img-rounded img-responsive text-center" width="100%;">
				</div>
				
				<div class="col-xs-12">
					<br>					 
					<div class="form-group has-feedback text-center">
						<label for="exampleInputEmail1"> <?php echo $Get_Beneficiary_members->Beneficiary_name; ?></label>
					<br>
						<label for="exampleInputEmail1"> <?php echo $Get_Beneficiary_members->Beneficiary_membership_id; ?></label>
					</div>
				</div>
				<div class="row" > 
					<div class="col-xs-12 btn btn-primary">
						<?php echo $Company_Details->Alise_name; ?> Wallet Balance = <?php echo $Login_Current_balance; ?> ~ <?php echo round($Login_Current_balance/$Publisher_Redemptionratio); ?> <?php echo $Get_Beneficiary_members->Currency; ?>
					</div>
					
				</div>
				<br>
				<br>
				
								
					<div class="form-group has-feedback">
						<label for="exampleInputEmail1"> Enter Purchase <?php echo $Get_Beneficiary_members->Currency; ?></label>
						<input type="tel"  name="Purchase_miles" id="Purchase_miles" onchange="Get_Equi_points(this.value);" onkeyup="this.value=this.value.replace(/\D/g,'')"  placeholder="Enter Purchase <?php echo $Get_Beneficiary_members->Currency; ?>" class="form-control" autocomplete="off" required>
						<div id="Purchase_miles_div" ></div>
					</div>
					<div class="form-group has-feedback">
						<label for="exampleInputEmail1"> Equivalent to <?php echo $Company_Details->Currency_name; ?></label>
						<input type="text" name="Equivalent" id="Equivalent" placeholder="Equivalent <?php echo $Company_Details->Currency_name; ?>" class="form-control" readonly > 
					   <div id="Equivalent_div"></div>
					</div>
				 
					<div class="row">					
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
							<input type="hidden" name="Enrollment_id" value="<?php echo $Enroll_details->Enrollement_id; ?>" class="form-control" />
							
							<input type="hidden" name="Igain_company_id" value="<?php echo $Get_Beneficiary_members->Igain_company_id; ?>">
							   <input type="hidden" name="Beneficiary_company_id" value="<?php echo $Get_Beneficiary_members->Register_beneficiary_id; ?>">
							   <input type="hidden" name="Beneficiary_company_name" value="<?php echo $Get_Beneficiary_members->Beneficiary_company_name; ?>">
							   <input type="hidden" name="Beneficiary_name" value="<?php echo $Get_Beneficiary_members->Beneficiary_name; ?>">
							   <input type="hidden" name="Beneficiary_membership_id" value="<?php echo $Get_Beneficiary_members->Beneficiary_membership_id; ?>"> 
							   <input type="hidden" name="Publisher_Redemptionratio" value="<?php echo $Publisher_Redemptionratio; ?>">


							
						</div><!-- /.col -->
					</div>
				
			  </div><!-- /.login-box-body -->
			</div><!-- /.login-box -->			
         </div><!-- /.row -->
		<?php echo form_close(); ?>
        </section><!-- /.content -->
		
	</section><!-- /.content -->
	<!-- /.content -->
		
		
		
		
<?php $this->load->view('header/footer');?>
<?php $this->load->view('header/loader');?>
<style>
	.pricing-table .pricing-details ul li {
		padding: 10px;
		font-size: 12px;
		border-bottom: 1px solid #eee;
		color: #ffffff;
		font-weight: 600;
	}	
	.pricing-table
	{
		padding: 12px 12px 0 12px;
		margin-bottom: 0 !important;
		background: #fff;
	}
	
	address{
		margin-bottom: 0px;
	}	
	body{background: linear-gradient(to bottom right, #41c5a2, #c1c2e7);background-repeat: no-repeat;}	
	.card-span {
		color: #1fa07f !important;
		font-size: 12px !important;
		display: inline;
        }
	.main-xs-3
	{
		width: 26%;
		padding: 10px 10px 0 10px;
	}
	
	.main-xs-6
	{
		width: 48%;
		padding: 10px 10px 0 10px;
	}
	#search{
		font-size:20px;
		margin-left: 6%;
		color: #1fa07f;
		
	}	
        
        .txt {
       
        border-left-color: -moz-use-text-color;
        border-left-style: none;
        border-left-width: medium;
        border-top-color: -moz-use-text-color;
       
        border-top-style: none;
        border-top-width: medium;
        margin-left: 0;
        outline-color: -moz-use-text-color;
        outline-style: none;
        outline-width: medium;
        padding-bottom: 2%;
        padding-left: 1%;
        padding-right: 1%;
        padding-top: 4%;
        width: 100%;
    }
	
	   .Joy_points{ 
		color: #008080;
		font-family: ;
		font-size: 12px;
		background: #fafafa;
		border-radius: 7px;
		margin: 0px;
		border: 1px solid #008080;
		width: 115px;
		padding: 5px;
	   }
</style>
<script>
    function Check_current_balance(transPoints)
    {      
		alert(transPoints);	
        var login_curr_bal='<?php echo $Login_Current_balance; ?>';
        if(parseFloat(transPoints) > parseFloat(login_curr_bal))
        {		
            document.getElementById('Purchase_miles').value='';
            document.getElementById('Equivalent').value='';
            var msg1 = 'Insufficient <?php echo $Company_Details->Currency_name; ?>.';            
            $('#Purchase_miles_div').show();
            $('#Purchase_miles_div').css("color","red");
            $('#Purchase_miles_div').html(msg1);
            setTimeout(function(){ $('#Purchase_miles_div').hide(); }, 3000);
            $("#Purchase_miles").focus();
            return false;
        }
    }
    function Get_Equi_points(Points)
    {
        var login_curr_bal='<?php echo $Login_Current_balance; ?>';
        var Company_id = <?php echo $Company_id; ?>;
        var Beneficiary_company_id=<?php echo $Get_Beneficiary_members->Register_beneficiary_id; ?>;
        var Beneficiary_membership_id='<?php echo $Get_Beneficiary_members->Beneficiary_membership_id; ?>';
        var Igain_company_id=<?php echo $Get_Beneficiary_members->Igain_company_id; ?>;
        // alert('Company_id'+Company_id+'---Beneficiary_company_id--'+Beneficiary_company_id+'--Igain_company_id---'+Igain_company_id+'---Beneficiary_membership_id--'+Beneficiary_membership_id);           
        $.ajax({
            type: "POST",
            data: { Company_id: Company_id ,Purchase_miles: Points,Beneficiary_company_id: Beneficiary_company_id,Beneficiary_membership_id: Beneficiary_membership_id,Igain_company_id: Igain_company_id},
            url: "<?php echo base_url()?>index.php/Beneficiary/Get_Equivalent_beneficiary_points",
            success: function(data)
            {               
                // alert(data);
                if( parseInt(data) <= login_curr_bal ) {
                    document.getElementById("Equivalent").value=data;
                } else {
                    document.getElementById('Purchase_miles').value='';
                    document.getElementById("Equivalent").value='';
                    // var msg1 = 'Please Buy Miles more than 0.'; 
					var msg1 = 'Insufficient <?php echo $Company_Details->Alise_name; ?> Wallet Balance.';       					
                    $('#Equivalent_div').show();
                    $('#Equivalent_div').css("color","red");
                    $('#Equivalent_div').html(msg1);
                    setTimeout(function(){ $('#Equivalent_div').hide(); }, 3000);
                    $("#Purchase_miles").focus();
                    return false;
                }               
            }
        });
    }    
    function Validate_form()
    {
        if($("#Purchase_miles" ).val() == 0 || $("#Purchase_miles" ).val() == "")
        {
            var msg1 = 'Please enter <?php echo $Get_Beneficiary_members->Currency; ?> greater than 0 .';            
            $('#Purchase_miles_div').show();
            $('#Purchase_miles_div').css("color","red");
            $('#Purchase_miles_div').html(msg1);
            setTimeout(function(){ $('#Purchase_miles_div').hide(); }, 3000);
            $( "#Purchase_miles" ).focus();
            return false;
        }
       else if($("#Equivalent" ).val() == parseInt(0))
        {
            var msg2 = 'Equivalent <?php echo $Company_Details->Currency_name; ?> should be greater than 0.';            
            $('#Equivalent_div').show();
            $('#Equivalent_div').html(msg2);
            $('#Equivalent_div').css("color","red");
            setTimeout(function(){ $('#Equivalent_div').hide(); }, 3000);
            $( "#Purchase_miles" ).focus();
            return false;
        }
		else
		{
			
			show_loader();
		}
    }
</script>