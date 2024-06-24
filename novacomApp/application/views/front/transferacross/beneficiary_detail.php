<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
  if($icon_src=="green") { $foot_icon="white"; } else { $foot_icon=$icon_src; } 
    //echo"---Company_name-----".$Company_details->Company_name;
    //echo"---Sms_enabled-----".$Sms_enabled;
?>
<!DOCTYPE html>
<html lang="en">
<head>  

<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />

    <title>Add Loyalty Program</title>
    <?php $this->load->view('front/header/header'); ?>   
    <?php //echo form_open_multipart('Beneficiary/Add_Beneficiary',array('onsubmit' => 'return confirm();')); ?>
    <div id="application_theme" class="section pricing-section" style="min-height: 550px;">
        <div class="container">
            <div class="section-header">
                <p><a href="<?php echo base_url(); ?>index.php/Beneficiary/Add_Beneficiary_Category" style="color:#ffffff;"><img src="<?php echo base_url(); ?>assets/icons/<?php echo $icon_src; ?>/cross.png" id="arrow"></a></p>
                <p id="Extra_large_font">Member Detail</p>
            </div>
            <div class="row pricing-tables">
                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: -31px;">
                    <!-- 1st Card -->
                    <div class="pricing-table wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s" id="front_head">
                        <div class="pricing-details">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row ">
                                        <div class="col-xs-12 " style="width: 100%;">
                                            <address>
                                                <div class="col-xs-12" style="padding: 10px;">
                                              
                                                    <img src="<?php echo $this->config->item('base_url2');?><?php echo $Company_logo; ?>" alt="" class="img-rounded img-responsive" width="50%;">
                                                </div>
                                            </address>
                                        </div>
                                        <div class="col-xs-12 " style="width: 100%;">
                                            <address>
                                                <strong id="Medium_font"><?php echo $Company_name; ?></strong><br>
                                                <input type="hidden" name="Igain_company_id" id="Igain_company_id" value="<?php echo $Igain_company_id; ?>" >
                                                <input type="hidden" name="Beneficiary_company_id" id="Beneficiary_company_id" value="<?php echo $lv_Beneficiary_company_id; ?>">
                                            </address>
                                            <!--<span style="color: #ff3399;margin-bottom: 0; font-size: 12px;"><strong>1350 Points</strong></span>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- 2nd Card -->
                    <div class="pricing-table wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s" id="front_head">
                        <div class="pricing-details">
                            <ul>
                               <li id="Small_font" class="text-left">
                                   
                                    <strong id="Value_font"> 
                                        <input type="text"  name="Beneficiary_name" id="Beneficiary_name" placeholder=" Enter member name" class="txt" onkeyup="this.value=this.value.replace(/[0-9]+/g, '')" autocomplete="off"> 
                                    </strong>
                                    <div id="Beneficiary_name_div" ></div>
                                </li>						 
                                <li id="Small_font" class="text-left">
                                    <strong id="Value_font"> 
                                        <?php if($Sms_enabled==1) { ?>
                                        <input type="text" name="Beneficiary_membership_id" id="Beneficiary_membership_id" onchange="return Send_OPT();" placeholder="Enter member identifier" class="txt"  > 
                                        <?php } else { ?>
                                        <input type="text" name="Beneficiary_membership_id" id="Beneficiary_membership_id" placeholder="Enter member identifier" class="txt" autocomplete="off"> 
                                        <?php } ?>
                                    </strong> 
                                   <div id="Identifier_div" ></div>
                                </li>
                                <?php 
							
								if($Sms_enabled==1) { ?>
                                <li id="OTP_font" class="text-left"> <font id="Small_font"> Enter OTP </font> <br>
                                    <strong id="Value_font">  
                                        <input type="text" name="Enter_OPT" id="Enter_OPT" onchange="return Submit_OPT();" placeholder="Enter OTP" class="txt"> 
                                    </strong> 
									<div id="Enter_OPT_div" ></div> <br>                                  
                                     <button  type="button" id="button1" onclick="return Submit_OPT();">Submit OTP</button>   
                                     <button  type="button" id="button1" onclick="return Send_OPT();">Resend OTP</button>   
                                </li>
                                <?php } ?>
                            </ul>
                            <address>
                                <div id="Beneficiary_div" ></div><br>
                                <button  type="button" id="button1" onclick="return confirm();">Submit</button>                               
                            </address>
                            <br />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
<!-- Loader --> 
    <div class="container" >
		 <div class="modal fade" id="myModal" role="dialog" align="center" data-backdrop="static" data-keyboard="false">
			  <div class="modal-dialog modal-sm" style="margin-top: 65%;">
				<!-- Modal content-->
				<div class="modal-content" id="loader_model">
				   <div class="modal-body" style="padding: 10px 0px;;">
					 <img src="<?php echo base_url(); ?>assets/icons/<?php echo $icon_src; ?>/loading.gif" alt="" class="img-rounded img-responsive" width="80">
				   </div>       
				</div>    
				<!-- Modal content-->
			  </div>
		 </div>       
    </div>
    <!-- Loader -->
    
    <?php
    if(@$this->session->flashdata('success')) {
    ?>
        <script>
                 var msg1 = '<?php //echo $this->session->flashdata('success'); ?>';
                // alert(msg);
                // var msg1 = 'Please enter all details..!!';
                $('#Beneficiary_div').show();
                $('#Beneficiary_div').css("color","red");
                
                $('#Beneficiary_div').html(msg1);
                setTimeout(function(){ $('#Beneficiary_div').hide(); }, 3000);
         
        </script>
    <?php
    }
?>
<?php echo form_close(); ?>
<?php $this->load->view('front/header/footer');?> 
<script>
    
    function Send_OPT(){
        
        
        var Igain_company_id=<?php echo $Igain_company_id; ?>;
        
        var Beneficiary_company_id='<?php echo $lv_Beneficiary_company_id; ?>';
        var Beneficiary_name=$('#Beneficiary_name').val();
        var Beneficiary_membership_id=$('#Beneficiary_membership_id').val();
        
        var Sms_enabled=<?php echo $Sms_enabled; ?>;
           
            if(Sms_enabled == 1) {
                
                if($('#Beneficiary_name').val() == "" ){
                     
                    var msg1 = 'Please enter name.';
                    $('#Beneficiary_name_div').show();
                    $('#Beneficiary_name_div').css('color','red');
                    $('#Beneficiary_name_div').html(msg1);
                    setTimeout(function(){ $('#Beneficiary_name_div').hide(); }, 3000);
                    $( "#Beneficiary_name").focus();
                    return false;
                }
                if($('#Beneficiary_membership_id').val() == "" ){
                    
                    var msg1 = 'Please Enter Identifier.';
                    $('#Identifier_div').show();
                    $('#Identifier_div').css('color','red');
                    $('#Identifier_div').html(msg1);
                    setTimeout(function(){ $('#Identifier_div').hide(); }, 3000);
                    $( "#Beneficiary_membership_id").focus();
                    return false;
                }
                
                $('#OTP_font').show();
                    //var data1 = ;
                 // var data = { Beneficiary_company_id:2,Beneficiary_name:'sagar', Beneficiary_membership_id:1234 };
                   $.ajax({
                        type: "POST",
                        data:{ Beneficiary_company_id:Beneficiary_company_id , Igain_company_id:Igain_company_id, Beneficiary_name:Beneficiary_name, Beneficiary_membership_id:Beneficiary_membership_id},
                        url: "<?php echo base_url()?>index.php/Beneficiary/Send_otp",
                        dataType: "json", 
                        success: function(json)
                        {       
                           
                            var error = json['status'];
                             alert(error);
                            if(error == 2011){
                                var msg1 = 'OTP Sent your registered mobile.';
                                $('#Enter_OPT_div').show();
                                $('#Enter_OPT_div').css('color','green');
                                $('#Enter_OPT_div').html(msg1);
                                setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
                               // $( "#Payment_card_no").focus();
                                return false;
                            }
                            if(error == 2012){
                                var msg1 = 'Unable send OTP on registered mobile';
                                $('#Enter_OPT_div').show();
                                $('#Enter_OPT_div').css('color','red');
                                $('#Enter_OPT_div').html(msg1);
                                setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
                               // $( "#Payment_card_no").focus();
                                return false;
                            }
                            if(error == 2013){
                                var msg1 = 'Please check registered mobile';
                                $('#Enter_OPT_div').show();
                                $('#Enter_OPT_div').css('color','red');
                                $('#Enter_OPT_div').html(msg1);
                                setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
                               // $( "#Payment_card_no").focus();
                                return false;
                            }
                        }
                    });
            } else {
                $('#OTP_font').hide();
            }
    }
    function Submit_OPT(){
        
        
        var Igain_company_id=<?php echo $Igain_company_id; ?>;
        
        var Beneficiary_company_id='<?php echo $lv_Beneficiary_company_id; ?>';
        var Beneficiary_name=$('#Beneficiary_name').val();
        var Beneficiary_membership_id=$('#Beneficiary_membership_id').val();
        
        var Sms_enabled=<?php echo $Sms_enabled; ?>;
           
            if(Sms_enabled == 1) {
                
                if($('#Enter_OPT').val() == "" ){
                     
                      var Enter_OPT=$('#Enter_OPT').val();
                   
                   var msg1 = 'Please enter OTP which Sent your registered mobile';
                   $('#Enter_OPT_div').show();
                   $('#Enter_OPT_div').css('color','red');
                   $('#Enter_OPT_div').html(msg1);
                   setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
                   $( "#Enter_OPT").focus();
                   return false;
                }
                
                $('#OTP_font').show();
                    //var data1 = ;
                 // var data = { Beneficiary_company_id:2,Beneficiary_name:'sagar', Beneficiary_membership_id:1234 };
                   $.ajax({
                        type: "POST",
                        data:{ Beneficiary_company_id:Beneficiary_company_id , Igain_company_id:Igain_company_id, Beneficiary_name:Beneficiary_name, Beneficiary_membership_id:Beneficiary_membership_id,Enter_OPT:Enter_OPT},
                        url: "<?php echo base_url()?>index.php/Beneficiary/Submit_OPT",
                        dataType: "json", 
                        success: function(json)
                        {       
                           
                            var error = json['status'];
                             // alert(json);
                            if(error == 2011){
                                var msg1 = 'OTP Sent your registered mobile.';
                                $('#Enter_OPT_div').show();
                                $('#Enter_OPT_div').css('color','green');
                                $('#Enter_OPT_div').html(msg1);
                                setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
                               // $( "#Payment_card_no").focus();
                                return false;
                            }
                            if(error == 2012){
                                var msg1 = 'Unable send OTP on registered mobile';
                                $('#Enter_OPT_div').show();
                                $('#Enter_OPT_div').css('color','red');
                                $('#Enter_OPT_div').html(msg1);
                                setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
                               // $( "#Payment_card_no").focus();
                                return false;
                            }
                            if(error == 2013){
                                var msg1 = 'Please check registered mobile';
                                $('#Enter_OPT_div').show();
                                $('#Enter_OPT_div').css('color','red');
                                $('#Enter_OPT_div').html(msg1);
                                setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
                               // $( "#Payment_card_no").focus();
                                return false;
                            }
                        }
                    });
            } else {
                $('#OTP_font').hide();
            }
    }
    function confirm()
    {
		
        var Igain_company_id=<?php echo $Igain_company_id; ?>;
        
        var Beneficiary_company_id='<?php echo $lv_Beneficiary_company_id; ?>';
        var Beneficiary_name=$('#Beneficiary_name').val();
        var Beneficiary_membership_id=$('#Beneficiary_membership_id').val();
        if($('#Beneficiary_company_id').val()!="" && $('#Beneficiary_name').val()!="" && $('#Beneficiary_membership_id').val()!="" )
        {
           
                 
            var Sms_enabled=<?php echo $Sms_enabled; ?>; 
            if(Sms_enabled ==1){
                var Enter_OPT=$('#Enter_OPT').val();
                var msg1 = 'Please enter OTP which Sent your registered mobile';
               $('#Enter_OPT_div').show();
               $('#Enter_OPT_div').css('color','green');
               $('#Enter_OPT_div').html(msg1);
               setTimeout(function(){ $('#Enter_OPT_div').hide(); }, 5000);
               $( "#Enter_OPT").focus();
               return false;
            }
            setTimeout(function() 
            {
                $('#myModal').modal('show');                
                 $.ajax({
                        type: "POST",
                        data: { Beneficiary_company_id:Beneficiary_company_id , Igain_company_id:Igain_company_id, Beneficiary_name:Beneficiary_name, Beneficiary_membership_id:Beneficiary_membership_id},
                        url:"<?php echo base_url()?>index.php/Beneficiary/Add_Beneficiary",
                       dataType: "json", 
                        success: function(data)
                        {
							// alert(data);
                            var error = data['status'];
                            var msg1 =data.Error_message;
                           // alert(msg1);
                            
                            var msg1 =data.Error_message;
                            $('#Beneficiary_div').show();
                            if(data.Error_flag==4 || data.Error_flag==1001){
                              $('#Beneficiary_div').css('color','green'); 
                           } else {
                               $('#Beneficiary_div').css('color','red'); 
                           }                     
                            $('#Beneficiary_div').html(msg1);
                            setTimeout(function(){ $('#Beneficiary_div').hide(); },
                            5000);
                            
                            $('#Beneficiary_name').val("");
                            $('#Beneficiary_membership_id').val("");
                            
                        } 
                    });
                
                 }, 0);
                setTimeout(function() 
                { 
                    $('#myModal').modal('hide'); 
                },2000);
        }
        else
        {
            if($('#Beneficiary_company_id').val() =="" ){
                
                var msg1 = 'Invalid Company.';
                $('#Beneficiary_div').show();
                $('#Beneficiary_div').css('color','red');
                $('#Beneficiary_div').html(msg1);
                setTimeout(function(){ $('#Beneficiary_div').hide(); }, 3000);
               // $( "#Payment_card_no").focus();
                return false;
            } else if($('#Beneficiary_name').val() == "" ){
                
                var msg1 = 'Please Enter Member name.';
                $('#Beneficiary_name_div').show();
                $('#Beneficiary_name_div').css('color','red');
                $('#Beneficiary_name_div').html(msg1);
                setTimeout(function(){ $('#Beneficiary_name_div').hide(); }, 3000);
                $( "#Beneficiary_name").focus();
                return false;
            } else if($('#Beneficiary_membership_id').val() == "" ){
                
                var msg1 = 'Please Enter Identifier.';
                $('#Identifier_div').show();
                $('#Identifier_div').css('color','red');
                $('#Identifier_div').html(msg1);
                setTimeout(function(){ $('#Identifier_div').hide(); }, 3000);
                $( "#Beneficiary_membership_id").focus();
                return false;
            }
        }
        
    }
</script>
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
	
	#action{
		margin-bottom: 5px; 
		width: 235%;
		color: #ff3399;
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

</style>