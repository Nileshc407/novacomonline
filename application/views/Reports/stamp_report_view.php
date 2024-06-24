<?php $this->load->view('header/header'); ?>
<div class="content-i">
	<div class="content-box">
		<div class="row">
			<div class="col-sm-12">
			<?php $attributes = array('id' => 'formValidate');
				echo form_open_multipart('Reportc/stamp_report',$attributes); ?>
				<div class="element-wrapper">
					<h6 class="element-header">Member Stamp Report</h6>  
					<div class="element-box">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
								   <label for=""><span class="required_info">* </span>From Date </label>
									<input class="single-daterange form-control" placeholder="Start Date" type="text"  name="start_date" id="datepicker1"  required="required" data-error="Please select from date"/>
									<div class="help-block form-text with-errors form-control-feedback"></div>
								  </div>

								  <div class="form-group">
								   <label for=""><span class="required_info">* </span>Till Date </label>
									<input class="single-daterange form-control" placeholder="End Date" type="text"  name="end_date" id="datepicker2" required="required" data-error="Please select till date"/>
									<div class="help-block form-text with-errors form-control-feedback"></div>
								  </div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="exampleInputEmail1"> Select Member &nbsp;&nbsp;</label>		<br>
									<label class="radio-inline">
										<input type="radio"  name="select_cust" id="select_cust" onclick="toggel_cust(this.value)" value="1" checked >All Members		
										<input type="radio" name="select_cust" id="select_cust" onclick="toggel_cust(this.value)" value="2" >Single Member
									</label>
								</div>
						
								<div class="form-group" id="cust_block_tier">
									<label for=""><span class="required_info">* </span>Select Tier</label>
									<select class="form-control" name="Tier_id" id="Tier_id" required="required" data-error="Please select tier">
									<option value="0">All Tier</option>
										<?php								
										foreach($tier_details as $tier)
										{							
											?>
											<option value="<?php echo $tier['Tier_id']; ?>"><?php echo $tier['Tier_name']; ?></option>
											<?php							
										}
										?>
									</select>
									<div class="help-block form-text with-errors form-control-feedback"></div>
								</div>
								<div class="form-group" style="display:none;" id="cust_block">
									<label for=""><span class="required_info">*</span> Membership ID/ Member Name</label>
									<input type="text" id="Single_cust_membership_id" name="Single_cust_membership_id" class="form-control" placeholder="Enter Membership ID"  data-error="Please enter membership id" />									
									<div class="help-block form-text with-errors form-control-feedback" id="memberErr"></div>
								</div>
								<div class="form-group" id="Member_details" style="display:none;">
									<label for=""><b>Enrolled Member Details:</b></label>
								
									<div class="form-group">
										<label for="">Member Name</label>
										<input type="text" name="mailtoone" id="mailtoone" class="form-control" readonly />	
									</div>
									
									<div class="form-group">
										<label for="">Member Email ID</label>
										<input type="text" id="member_email" name="member_email" class="form-control" readonly />	
									</div>
									
									<div class="form-group">
										<label for="">Member Phone No.</label>
										<input type="text" name="mailtoone_phnno" id="mailtoone_phnno" class="form-control"  readonly />	
									</div>
									
									<div class="form-group">
										<input type="hidden" name="Enrollment_id" id="MemberEnrollmentId" value=""/>
									</div>
								</div>
							</div>
						</div>
					  <div class="form-buttons-w" align="center">
						<button class="btn btn-primary" name="submit" type="submit" id="Register" value="Register">Submit</button>
						<button class="btn btn-primary" type="reset">Reset</button>
					  </div>
				
		<?php echo form_close(); ?>
			</div>
		</div>
	<?php 

	$To_date=date("Y-m-d",strtotime($_REQUEST["end_date"]));
	$From_date=date("Y-m-d",strtotime($_REQUEST["start_date"]));
	?>
				<!---------Table--------->	 
				<div class="element-wrapper">											
				<div class="element-box">
				  <h6 class="form-header">
				<?php echo 'Member Stamp Report';
				?>
				  </h6>                  
				  <div class="table-responsive">
					<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
						<thead>
						<tr>
						<th>Trans Date</th>
						<th>Membership Id</th>
						<th>Member Name</th>
						<th>Bill No.</th>
						<th>Purchase Amount<?php echo '('.$Symbol_of_currency.')';?></th>
						<th>Stamps Collected</th>
						<th>Outlet</th>
						</tr>
						</thead>						
						<tfoot>
						<tr>
						<th>Trans Date</th>
						<th>Membership Id</th>
						<th>Member Name</th>
						<th>Bill No.</th>
						<th>Purchase Amount<?php echo '('.$Symbol_of_currency.')';?></th>
						<th>Stamps Collected</th>
						<th>Outlet</th>
						</tr>
						</tfoot>
						<tbody>
					<?php
					$todays = date("Y-m-d");
		 
					if(count($Trans_Records) > 0)
					{
						foreach($Trans_Records as $row)
						{
							echo "<tr>";
							echo "<td>".date('Y-m-d',strtotime($row->Trans_date))."</td>";
							echo "<td>".$row->Card_id."</td>";
							echo "<td>".$row->Member_name."</td>";
							echo "<td>".$row->Bill_no."</td>";
							echo "<td>".number_format(round($row->Purchase_amt),2)."</td>";
							echo "<td>".$row->Stamp_collected."</td>";
							echo "<td>".$row->Outlet."</td>";
							echo "</tr>";	
						}
					}
					?>
						</tbody>
					</table>
					<?php 
					if($Trans_Records != NULL)
					{ 
					
					?>
						<a href="<?php echo base_url()?>index.php/Reportc/stamp_report/?pdf_excel_flag=1">
						<button class="btn btn-success" type="button"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
						</a>
					
						<a href="<?php echo base_url()?>index.php/Reportc/stamp_report/?pdf_excel_flag=2">
						<button class="btn btn-danger" type="button"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Pdf</button>
						</a>
				<?php 
					} 
					
					?>
				  </div>
				</div>
			</div>
				<!-----------Table------------>
				
			</div>
		</div>	
	</div>
</div>
<?php $this->load->view('header/footer'); ?>
<script>
$('#Register').click(function()
{
	 if($('#datepicker2').val() != ""  && $('#datepicker1').val() != "")
		{
			show_loader();
		} 

});
$('#seller_id').change(function()
{
	var seller_id = $("#seller_id").val();
	var Company_id = '<?php echo $Company_id; ?>';
	
	$.ajax({
		type:"POST",
		data:{seller_id:seller_id,Company_id:Company_id},
		url:'<?php echo base_url()?>index.php/Reportc/get_outlet_by_subadmin',
		success:function(opData4){
		
			$('#Outlet_id').html(opData4);
		}
	});
		
});
function MembershipID_validation(MembershipID)
{	
	var Company_id = '<?php echo $Company_id; ?>';
	
	if( MembershipID != "" )
	{

	$.ajax({
			type:"POST",
			data:{MembershipID:MembershipID, Company_id:Company_id},
			url: "<?php echo base_url()?>index.php/Reportc/MembershipID_validation",
			success : function(data)
			{ 
				// alert(data.length);
				if(data.length == 14)
				{
					$("#Single_cust_membership_id").val("");
					
					has_error(".has-feedback","#glyphicon",".help-block","Membership ID not Exist.!!");
				}
				else
				{
					has_success(".has-feedback","#glyphicon",".help-block",data);
				}
			}
		});
	}
}
$(function() 
{
	$( "#datepicker1" ).datepicker({
		changeMonth: true,
		yearRange: "-80:+0",
		changeYear: true
	});
	
	$( "#datepicker2" ).datepicker({
		changeMonth: true,
		yearRange: "-80:+0",
		changeYear: true
	});
		
});

function toggel_cust(flag)
{
	if(flag==1)//All
	{
		// document.getElementById("cust_block").style.display="none";
		$("#Tier_id").attr("required","required");
		$("#cust_block").hide();
		$("#Member_details").hide();
		$("#cust_block_tier").show();
		$("#Single_cust_membership_id").removeAttr("required");			
	}
	else
	{
		// document.getElementById("cust_block").style.display="";
		$("#Tier_id").removeAttr("required");
		$("#Single_cust_membership_id").attr("required","required");
		
		$("#cust_block").show();
		$("#cust_block_tier").hide();
		
	}	
}

/*********************************Autocomplete***************************************/
	$("#Single_cust_membership_id").autocomplete({
		source: "<?php echo base_url()?>index.php/Administration/autocomplete_customer_names" // path to the get_birds method
	});
/*********************************Autocomplete***************************************/
	
$('#Single_cust_membership_id').blur(function()
	{
		$('#Member_details').show();
		var cardId = $("#Single_cust_membership_id").val();
		var Company_id = '<?php echo $Company_id; ?>';
		// alert(cardId);
		var alphaNumericRegex = /^[a-zA-Z0-9]+$/;
		var result = alphaNumericRegex.test(cardId);
		
		if(result == false)
		{
			$.ajax({
				type: "POST",
				data: {Cust_name: cardId, Company_id: Company_id},
				dataType: "json",
				url: "<?php echo base_url()?>index.php/Reportc/get_cust_info",
				success: function(json)
				{
					if( (json == "" || json == null) )
					{
						$("#mailtoone").val("");	
						$("#member_email").val("");	
						$("#mailtoone_phnno").val("");	
						$("#Single_cust_membership_id").val("");		
						$("#MemberEnrollmentId").val("");	
					}
					else
					{
						$("#mailtoone").val(json['Member_name']);	
						$("#member_email").val(json['User_email_id']);	
						$("#mailtoone_phnno").val(json['Phone_no']);				
						$("#Single_cust_membership_id").val(json['Card_id']);				
						$("#MemberEnrollmentId").val(json['Enrollement_id']);				
									
					}
				}
			});
		}
		else
		{
			if( $("#Single_cust_membership_id").val() == "" || $("#Single_cust_membership_id").val() == 0 )
			{
				$('#Single_cust_membership_id').val('');
				// has_error(".has-feedback","#glyphicon1",".help-block1","Please Enter Membership Card ID..!!");
				has_error("#block1","#glyphicon1","#Membership_help","Please Enter Membership Card ID..!!");
				
				$("#mailtoone").val("");
				$("#member_email").val("");
				$("#mailtoone_phnno").val("");
				$("#MemberEnrollmentId").val("");
			}
			else
			{
				var cardId = $("#Single_cust_membership_id").val();
				var Company_id = '<?php echo $Company_id; ?>';
				
				$.ajax({
					  type: "POST",
					  data: {cardid: cardId, Company_id: Company_id},
					  dataType: "json",
					  url: "<?php echo base_url()?>index.php/Administration/validate_member",
					  success: function(json)
					  {  
						if(json['Card_id'] == 0)
						{
							$('#Single_cust_membership_id').val('');
							has_error(".has-feedback","#glyphicon1",".help-block1","Invalid Membership Card ID!");	
							// has_error("#block1","#glyphicon1","#Membership_help","Invalid Membership Card ID..!!");
							
							$("#mailtoone").val("");
							$("#member_email").val("");
							$("#mailtoone_phnno").val("");
							$("#MemberEnrollmentId").val(""); 
							
						}
						else
						{
							// has_success(".has-feedback","#glyphicon1",".help-block1",data);	
							//has_success("#block1","#glyphicon1","#Membership_help"," ");
							
							var Member_name = json['First_name']+" "+json['Last_name'];
							var Member_email = json['User_email_id'];
							var Member_phn = json['Phone_no'];
							var Member_Enrollement_id = json['Enrollement_id'];
							
							$("#mailtoone").val(Member_name);
							$("#member_email").val(Member_email);
							$("#mailtoone_phnno").val(Member_phn);
							$("#MemberEnrollmentId").val(Member_Enrollement_id);
						}
					  }
				});
			}
		}
	});	
</script>