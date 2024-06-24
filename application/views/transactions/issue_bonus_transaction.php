<?php $this->load->view('header/header'); ?>
<div class="content-i">
    <div class="content-box">
        <div class="row">
            <div class="col-sm-7">
                <div class="element-wrapper">
                    <h6 class="element-header"><?php if($Daily_points_consumption_flag==1 || $Enable_company_meal_flag==1){echo 'Meal Topup';}else{echo "Topup";} ?></h6>
                    <div class="element-box">
                       
                        <?php
                          $attributes = array('id' => 'formValidate');
                          echo form_open('Transactionc/issue_bonus_transaction', $attributes);
                        ?>
                        <h5 class="form-header">

                        </h5>					  
                        <div class="form-group">
                            <label for=""> Membership ID / Phone No.</label>
                            <input class="form-control" data-error="Enter Membership ID or phone no" placeholder="Enter Membership ID or phone no" required="required" type="text" id="cardId" name="cardId" value="<?php echo $get_card; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for=""> Bill No.</label>
                            <input class="form-control" data-error="Enter bill no" required="required" placeholder="Bill No" type="text" id="manual_bill_no" name="manual_bill_no" class="form-control" placeholder="Bill No">
                            <div class="help-block form-text with-errors form-control-feedback" id="BillNO"></div>
                        </div>
                        <?php if($fix_bonus_points) { ?>
                        <div class="form-group">
                            <label for=""> <span class="required_info">*</span><?php if($Daily_points_consumption_flag==1 || $Enable_company_meal_flag==1){echo 'Meal Topup Points';}else{echo "Topup";} ?>  For</label>
                            <select class="form-control" data-error="Select fix bonus for" name="bonus_points_for" id="bonus_points_for" required  >
                            <?php
                              foreach ($fix_bonus_points as $bonus_pts) {
                                echo "<option value=".$bonus_pts['Id'].">".$bonus_pts['Bonus_points_for']."</option>";
                              }
                            ?>
                            </select>
                            <div class="help-block form-text with-errors form-control-feedback" id="BonusPointsFor"></div>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for=""> <span class="required_info">*</span><?php if($Daily_points_consumption_flag==1 || $Enable_company_meal_flag==1){echo 'Meal Topup Points';}else{echo "Topup";} ?></label>
                            
                            <input class="form-control" data-error="Enter Topup" required="required" placeholder="<?php if($Daily_points_consumption_flag==1 || $Enable_company_meal_flag==1){echo 'Enter Meal Topup Points';}else{echo "Enter Topup";} ?>" type="text" id="topup_amt" name="topup_amt"  onkeyup="this.value=this.value.replace(/\D/g,'')" class="form-control" >
                            
                            <div class="help-block form-text with-errors form-control-feedback" id="BonusIssued"></div>
                        </div>
						 <div class="form-group">
                            <label for=""> <span class="required_info">*</span> Payment by </label>
                            <select class="form-control" name="Payment_type" id="Payment_type" data-error="Select Payment by" onchange="show_payment(this.value)" required>
								<option value="">Select Payment by</option>
								<option value="1">Cash</option>
								<option value="3">Credit/Debit Card</option>
								<option value="5">Mobile Money</option>
								<option value="2">Cheque</option>
								<option value="9">Bank Transfer</option>
								<?php if($Enable_company_meal_flag == 1) {?>
								<option value="7">Meal Points</option>
								<?php }?>
                            </select>
							  <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
						<div id="cheque_block" style="display:none;">
                            <div class="panel-heading"><label for="exampleInputEmail1"  id="labelME2">Cheque Details</label></div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Bank Name</label>
                                <input type="text" name="Bank_name" id="Bank_name" class="form-control" placeholder="Enter Bank Name"  />
                                <div class="help-block form-text with-errors form-control-feedback" id="BankName"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Branch Name of Bank</label>
                                <input type="text" name="Branch_name" id="Branch_name" class="form-control" placeholder="Enter branch Name of Bank"  />
                                <div class="help-block form-text with-errors form-control-feedback" id="BranchName"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" id="labelME">Cheque/Card Number</label>
                                <input type="text" name="Credit_Cheque_number" id="Credit_Cheque_number" class="form-control" placeholder="Enter number"  />
                                <div class="help-block form-text with-errors form-control-feedback" id="CardNumber"></div>
                            </div>
                        </div>
						<div id="bank_block" style="display:none;">
                            <div class="panel-heading"><label for="exampleInputEmail1">Bank Details</label></div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Bank Name</label>
                                <input type="text" name="Bank_name1" id="Bank_name1" class="form-control" placeholder="Enter Bank Name"  required="required" />
                                <div class="help-block form-text with-errors form-control-feedback" id="BankName1"></div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Bank Code</label>
                                <input type="text" name="Bank_code" id="Bank_code" class="form-control" placeholder="Enter Bank Code" required="required" />
                                <div class="help-block form-text with-errors form-control-feedback" id="BankCode"></div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Swift Code</label>
                                <input type="text" name="Swift_code" id="Swift_code" class="form-control" placeholder="Swift code" required="required" />
                                <div class="help-block form-text with-errors form-control-feedback" id="SwiftCode"></div>
                            </div>
							<div class="form-group">
                                <label for="exampleInputEmail1">Account Number</label>
                                <input type="text" name="Account_no" id="Account_no" class="form-control" placeholder="Account number" required="required" />
                                <div class="help-block form-text with-errors form-control-feedback" id="AccountNumber"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""> Remarks</label>
                            <input type="text" name="remark" class="form-control" placeholder="Enter Payment Remarks" required="required" />
							 <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                          <?php if ($Pin_no_applicable == 1) { ?>
                            <div class="form-group" id="pin_feedback">
                                <label for=""> Customer Pin</label>
                                <input type="text" name="cust_pin" name="cust_pin" class="form-control"  placeholder="Customer Pin" data-error="Enter customer pin" required="required"/>
                                <div class="help-block form-text with-errors form-control-feedback" id="CustomerPin"></div>
                            </div>
                          <?php } ?>
                        <div class="form-buttons-w">
                            <input type="hidden" name="Balance" id="Balance" class="form-control"  />
                            <button class="btn btn-primary" type="submit"  id="submit"> Submit</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="element-wrapper">
                    <h6 class="element-header">Member Details</h6>
                    <div class="element-box">



                        <div class="profile-tile">
                            <a class="profile-tile-box" href="javascript:void(0);"  style="margin-top:-137px">
                                <div class="pt-avatar-w">									  
                                      <?php if ($Photograph == "") { ?>
                                        <img src="<?php echo base_url(); ?>images/no_image.jpeg" alt="<?php echo $Full_name; ?> Photograph" style="width:60px;height:60px">
                                      <?php } else { ?>
                                        <img src="<?php echo base_url() . $Photograph; ?>" alt="<?php echo $Full_name; ?> Photograph" style="width:60px;height:60px">
                                      <?php } ?>										
                                </div>
                                <div class="pt-user-name">
                                    <?php echo $Full_name; ?>
                                </div>

                            </a>
                            <div class="profile-tile-meta">
                                <ul>
                                    <li>
                                        Member Tier:<strong><?php echo $Tier_name; ?></strong>
                                    </li>
                                    <li>
                                        Membership Id:<strong><?php echo $MembershipID; ?></strong>
                                    </li>
                                    <br>
                                    <li>
                                        <?php echo $Company_details->Currency_name; ?> Balance:<strong><?php echo $Current_balance; ?></strong>
                                    </li>
                                    <li>
                                        <?php echo $Company_details->Currency_name; ?> Earned:<strong><?php echo $Gained_points; ?></strong>
                                    </li>
                                    <hr>
                                    <strong class="p-3">No. of Times :</strong>
                                    <hr>
                                    <li>
                                        <?php if($Daily_points_consumption_flag==1 || $Enable_company_meal_flag==1){echo 'Meal Topup Points';}else{echo "Topup";} ?>:<strong><?php echo $Topup_count; ?></strong>
                                    </li>
                                    <li>
                                        Loyalty Transactions: <strong><?php echo $Purchase_count; ?></strong>
                                    </li>
                                    <li> 
                                        <br>
                                        <div class="pt-btn">
                                            <a class="btn btn-success btn-sm" href="javascript:void(0);" id="details" >Details</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
        		
    </div>	

</div>	


<!-- Modal  aria-labelledby="myLargeModalLabel" class="modal fade bd-example-modal-lg show" role="dialog" tabindex="-1" style="padding-right: 17px; display: block;"-->
<div id="detail_myModal" aria-labelledby="myLargeModalLabel" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 100%;margin-top:170px;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="close_modal" class="close"  data-dismiss="modal">&times;</button>					
            </div>
            <div class="modal-body">
                <div id="show_transaction_details"></div>
            </div>					
        </div>

    </div>
</div>	


<?php $this->load->view('header/footer'); ?>

<style>	


    /* Important part */
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        height: 500px;
        overflow-y: auto;
    }
    .modal-content{
        width:119%;
    }
</style>
<script>
function show_payment(flag)
{
  console.log(flag);

  if (flag == 2 || flag == 3)
  {
	  $("#bank_block").hide();
	  $("#cheque_block").show();
	  
	  $("#Bank_name1").removeAttr("required");
	  $("#Bank_code").removeAttr("required");
	  $("#Swift_code").removeAttr("required");
	  $("#Account_no").removeAttr("required"); 
  }
  else if (flag == 9)
  {
	  $("#bank_block").show();
	  $("#cheque_block").hide();
	  
	  $("#Bank_name1").attr("required","required");
	  $("#Bank_code").attr("required","required");
	  $("#Swift_code").attr("required","required");
	  $("#Account_no").attr("required","required");
  }   
  else
  {
	  $("#bank_block").hide();
	  $("#cheque_block").hide();
	  
	  $("#Bank_name1").removeAttr("required");
	  $("#Bank_code").removeAttr("required");
	  $("#Swift_code").removeAttr("required");
	  $("#Account_no").removeAttr("required"); 
  }
  
  if (flag == 2)
  {
	  document.getElementById("labelME").innerHTML = "Cheque Number";
	  document.getElementById("labelME2").innerHTML = "Cheque Details";

	  // $("#BankName").html("Enter bank number");
	  // $("#BranchName").html("Enter branch number");
	  // $("#CardNumber").html("Enter card number");
  } 
  else if (flag == 3)
  {
	  document.getElementById("labelME").innerHTML = "Card Number";
	  document.getElementById("labelME2").innerHTML = "Card Details";
  } 
  else
  {
	  //document.getElementById("labelME").innerHTML = "Number";
	 /*  $("#Bank_name").removeAttr("required");
	  $("#Branch_name").removeAttr("required");
	  $("#Credit_Cheque_number").removeAttr("required"); */
  }
}
  $('#submit').click(function ()
  {
      var Bill_no = $('#manual_bill_no').val();
      var Customer_pin = '<?php echo $Customer_pin; ?>';
      var Entered_pin = $('#cust_pin').val();
      var bonus_points = $("#topup_amt").val();
      var Payment_type = $("#Payment_type").val();
        
      if(Bill_no != ""  &&  bonus_points != "" &&  Payment_type != "")
      {
       // show_loader();
      }
    
  })     
  $('#details').click(function ()
  {      
      var Seller_id = '<?php echo $enroll; ?>';
      var Enrollment_id = '<?php echo $Cust_enrollment_id; ?>';
      var Membership_id = '<?php echo $get_card; ?>';

      $.ajax({
          type: "POST",
          data: {Seller_id: Seller_id, Enrollment_id: Enrollment_id, Membership_id: Membership_id},
          url: "<?php echo base_url() ?>index.php/Transactionc/show_transaction_details",
          success: function (data)
          {
              $("#show_transaction_details").html(data.transactionDetailHtml);
              $('#detail_myModal').show();
              $("#detail_myModal").addClass("in");
              $("body").append('<div class="modal-backdrop fade in"></div>');
          }
      });
  });
  
  
  
//***** bill no validation **********/
  

  $('#manual_bill_no').blur(function ()
  {
      var Company_id = '<?php echo $Company_id; ?>';
      var Bill_no = $('#manual_bill_no').val();

      if ($("#manual_bill_no").val() == "" || (Bill_no.length < 3))
      {
          $("#manual_bill_no").val("");
          $("#BillNO").html("Please enter valid bill number");
      } else
      {
          $.ajax({
              type: "POST",
              data: {Bill_no: Bill_no, Company_id: Company_id},
              url: "<?php echo base_url() ?>index.php/Transactionc/check_bill_no",
              success: function (data)
              {
                  if (data == 1)
                  {
                      $("#manual_bill_no").val("");
                      $("#BillNO").html("Already exist");
                      $("#manual_bill_no").addClass("form-control has-error");
                  } else
                  {
                      // $("#BillNO").html("Bill Number Available");
                      $("#manual_bill_no").removeClass("has-error");
                      $("#BillNO").html("");
                  }
              }
          });
      }
  });
//***** bill no validation **********/
  

  
  
  

   $('#cust_pin').change(function ()
  {
      var Customer_pin = '<?php echo $Customer_pin; ?>';
      var Entered_pin = $('#cust_pin').val();

      if ((Entered_pin != Customer_pin) || (Entered_pin == ""))
      {
          $('#cust_pin').val("");
          // has_error("#pin_feedback","#pin_glyphicon","#pin_help","Please Enter Valid Pin Number...!!!");
         
          
          $('#CustomerPin').html("Please Enter Valid Pin Number");
          $("#cust_pin").addClass("form-control has-error");

      } 
      else
      {
          $('#CustomerPin').html("");
          $("#cust_pin").addClass("has-error");
      }
  });


$('#topup_amt').blur(function()
{	
      var Seller_balance = '<?php echo $Seller_balance; ?>';

      Seller_balance = parseInt(Seller_balance);
      var bonus_points = $("#topup_amt").val();
      bonus_points = parseInt(bonus_points);

      if( $("#topup_amt").val() == "" || $("#topup_amt").val() == 0 )
      {
        
          $("#topup_amt").val("");
          $('#BonusIssued').html("Please enter valid bonus points");
          $("#topup_amt").addClass("form-control has-error");
            
      } else {        
        $('#BonusIssued').html("");
        $("#topup_amt").removeClass("has-error");
      }

      var Seller_topup_access = '<?php echo $Seller_topup_access; ?>';
      if( Seller_topup_access == 1 && $("#topup_amt").val() > Seller_balance)
      {
            $("#topup_amt").val("");
            /*var Title2 = "Invalid Data Information";
            var msg2 = 'Please Enter Valid Bonus Points. Seller is not having Enough Balance to do Issue Bonus Points...!!!';
            runjs(Title2,msg2);  */
            
            $('#BonusIssued').html("Please nter valid bonus points. seller is not having enough balance to do issue bonus points");
            $("#topup_amt").addClass("form-control has-error");
            
      } else {        
        $('#BonusIssued').html("");
        $("#topup_amt").removeClass("has-error");
      }
});


$('#bonus_points_for').change(function()
{	
        var Company_id = '<?php echo $Company_id; ?>';
        var bonus_points_for = $('#bonus_points_for').val();

        if($("#bonus_points_for").val() == "" )
        {
            $("#bonus_points_for").val("");
            // has_error(".has-feedback","#glyphicon",".help-block","Please Enter Valid Bill Number!!");
        }
        else if($("#bonus_points_for").val() == 0 )
        {
            $("#remark").removeAttr("readonly");					
            $("#topup_amt").removeAttr("readonly");	
            $("#remark").val("");
            $("#topup_amt").val("");
        }
        else
        {
          $.ajax({
                  type: "POST",
                  dataType:"json",
                  data: {bonus_points_for:bonus_points_for, Company_id:Company_id},
                  url: "<?php echo base_url()?>index.php/Transactionc/get_bonus_points_for",
                  success: function(json)
                  {
                      if(json['Bonus_points'] !=0)
                      {

                          $("#topup_amt").attr("readonly","readonly");					
                          $("#remark").val(json['Bonus_points_for']);
                          $("#topup_amt").val(json['Bonus_points']);
                      }
                      else
                      {					
                          $("#remark").removeAttr("readonly");					
                          $("#topup_amt").removeAttr("readonly");	
                          $("#remark").val("");
                          $("#topup_amt").val("");

                      }
                  }
          });
        }
});
</script>