<?php $this->load->view('header/header'); ?>
<div class="content-i">
	<div class="content-box">
		<div class="row">
			<div class="col-sm-12">
			<?php $attributes = array('id' => 'formValidate');
				echo form_open_multipart('Reportc/Unclaimed_points_report',$attributes); ?>
				<div class="element-wrapper">
					<h6 class="element-header">Unclaimed Bill Report</h6>  
					<div class="element-box">
						<div class="row">
							<div class="col-sm-6">	
							
								<div class="form-group">
								<label for=""><span class="required_info">* </span>Brand Name</label>
								<select class="form-control" name="seller_id" ID="seller_id" required>
									<option value="">Select Brand</option>
									<?php
									
										echo '<option value="0">All Brands</option>';
									if($Logged_user_id > 2 || $Super_seller == 1)
										{
											echo '<option value="'.$enroll.'">'.$LogginUserName.'</option>';
										}							
											foreach($Seller_array as $seller_val)
											{
												echo "<option value=".$seller_val->Enrollement_id.">".$seller_val->First_name." ".$seller_val->Last_name."</option>";
											}
									
									?> 
								</select>
								<div class="help-block form-text with-errors form-control-feedback"></div>
							  </div>
							 
							 <div class="form-group">
								<label for="">Linked Outlet Name</label>
								<select class="form-control" multiple name="Outlet_id[]" ID="Outlet_id" required>
									<option value="0">Select Brand First</option>

								</select>
								<div class="help-block form-text with-errors form-control-feedback"></div>
							  </div>
								<div class="form-group">
								<label for="exampleInputEmail1"><span class="required_info">*</span> Report Type </label>
								<select class="form-control" name="report_type" ID="report_type" onchange="toggleRptType(this.value);" required>
									<option value="1">Detail</option>
									<option value="2">Summary</option>
								</select>							
								</div>
								
							</div>
							<div class="col-sm-6">

								<div class="form-group">
								<label for=""><span class="required_info">* </span>From Date</label>
								<input class="single-daterange form-control" placeholder="Start Date" type="text"  name="start_date" id="datepicker1"  required="required" data-error="Please select from date"/>
								<div class="help-block form-text with-errors form-control-feedback"></div>
								</div>
							  
								  <div class="form-group">
								   <label for=""><span class="required_info">* </span>Till Date </label>
									<input class="single-daterange form-control" placeholder="End Date" type="text"  name="end_date" id="datepicker2" required="required" data-error="Please select till date"/>
									<div class="help-block form-text with-errors form-control-feedback"></div>
								  </div>
								 
								
								<div class="form-group" id="channelgroup">
								<label for=""> Transaction Type </label>
								<select class="form-control " name="transaction_from" id="channel_id" required="required" data-error="Please select source">
									<option value="0">All</option>
									<option value="12">Online</option>
									<option value="2">POS</option>
									<option value="29">3rd Party Online</option>

								</select>
								
								<div class="help-block form-text with-errors form-control-feedback"></div>
							</div>
							
								<div class="form-group" id="Third" style="display:none;">
								<label for=""> <span class="required_info">* </span>Channel Company </label>
								<select class="form-control" name="Channel_id[]" id="Channel_id" multiple>
									<?php
									if($Channel_partner != NULL){
									foreach($Channel_partner as $Channel_partner)
									{ ?>
										<option value="<?php echo $Channel_partner->Register_beneficiary_id; ?>" selected><?php echo $Channel_partner->Beneficiary_company_name; ?></option>
										<?php		
									}
									}
								?>
									</select>
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
		
				<!---------Table--------->	 
				<div class="element-wrapper">											
					<div class="element-box">
					  <h6 class="form-header">
					  <?php if($report_type==1){ echo '<h6 class="form-header">Unclaimed Bill Report details</h6>'; }
							else if($report_type==2){echo '<h6 class="form-header">Unclaimed Bill Report Summary</h6>'; }
					?>
					  </h6>                  
					  <div class="table-responsive">
						<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
							<thead>
							<?php if($report_type==1){ //Details?>
								<tr>
									
								<!--	<th>Sequence No</th>-->
									<th>Transaction Date</th>
									<th>Transaction Type</th>
									<th>POS Bill No.</th>
									
									<th>Outlet</th>
									<th>Item Name</th>
									<th>Quantity</th>
									<th>Item Rate <?php echo '('.$Symbol_of_currency.')';?></th>
									<th>Purchase amt <?php echo '('.$Symbol_of_currency.')';?></th>
								
							

								</tr>
								<?php }
								if($report_type==2){ //summary?>
								<tr>

								
									<th>Transaction Date</th>
									<th>Transaction Type</th>
									<th>POS Bill No.</th>
									
									<th>Outlet</th>
									
									<th>Total Bill Amt <?php echo '('.$Symbol_of_currency.')';?></th>
									<th>Total Discount <?php echo '('.$Symbol_of_currency.')';?></th>
									</th>

								</tr>
								<?php } ?>
								</thead>
								<tfoot>
								<?php if($report_type==1){ //Details?>
								<tr>
									<th>Transaction Date</th>
									<th>Transaction Type</th>
									<th>POS Bill No.</th>
									
									<th>Outlet</th>
									<th>Item Name</th>
									<th>Quantity</th>
									
									<th>Item Rate <?php echo '('.$Symbol_of_currency.')';?></th>
									<th>Purchase amt <?php echo '('.$Symbol_of_currency.')';?></th>
									
								</tr>
								<?php } 
								if($report_type==2){ //summary?>
								<tr>
									<th>Transaction Date</th>
									<th>Transaction Type</th>
									<th>POS Bill No.</th>
									
									<th>Outlet</th>
									
									<th>Total Bill Amt <?php echo '('.$Symbol_of_currency.')';?></th>
									<th>Total Discount <?php echo '('.$Symbol_of_currency.')';?></th>
									</th>
								</tr>
								<?php } ?>
								</tfoot>
							<tbody>
						<?php
						$ci_object = &get_instance(); 
							$todays = date("Y-m-d");
						  $lv_Company_id = $_REQUEST["Company_id"];
						  $start_date = $_REQUEST["start_date"];
						  $end_date = $_REQUEST["end_date"];
						  $report_type = $_REQUEST["report_type"];
						  $Outlet_id = $_REQUEST["Outlet_id"];
						 
						if(count($Trans_Records) > 0)
						{
							
							foreach($Trans_Records as $row)
							{
								
								if($report_type==1)//Details
								{
									
									echo "<tr>";
									echo "<td>".$row->Trans_date."</td>";
									echo "<td>".$row->Trans_NAME."</td>";
									echo "<td>".$row->Bill_no."</td>";
									echo "<td>".$row->Outlet_name."</td>";
									echo "<td>".$row->Item_name."</td>";
									echo "<td>".$row->Quantity."</td>";
									echo "<td>".number_format(round($row->Item_rate),2)."</td>";
									echo "<td>".number_format(round($row->Purchase_amount),2)."</td>";
									echo "</tr>";
								}
								else
								{ 
									echo "<tr>";
									echo "<td>".$row->Trans_date."</td>";
									echo "<td>".$row->Trans_NAME."</td>";
									echo "<td>".$row->Bill_no."</td>";
									echo "<td>".$row->Outlet_name."</td>";
									echo "<td>".number_format(round($row->Bill_total),2)."</td>";
									echo "<td>".number_format(round($row->Pos_discount),2)."</td>";
									echo "</tr>";
								}
								
							}
						}
						?>
						
							</tbody>
						</table>
				<?php 
					if($Trans_Records != NULL)
						{ 
						
						?>
							<a href="<?php echo base_url()?>index.php/Reportc/Unclaimed_points_report/?report_type=<?php echo $report_type; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&transaction_from=<?php echo $transaction_from; ?>&pdf_excel_flag=1">
							<button class="btn btn-success" type="button"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
							</a>
						
							<a href="<?php echo base_url()?>index.php/Reportc/Unclaimed_points_report/?report_type=<?php echo $report_type; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&membership_id=<?php echo $membership_id; ?>&transaction_from=<?php echo $transaction_from; ?>&pdf_excel_flag=2">
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
	 if($('#datepicker2').val() != ""  && $('#datepicker1').val() != "" && $('#seller_id').val() != "" )
		{
			show_loader();
		} 

});

$('#channel_id').change(function()
	{
		var channel_id = $("#channel_id").val();
		if(channel_id == 29){
		$("#Third").show();
		}
		else{
			$("#Third").hide();
		}
			
	});
function show_status(value15)
{
	if(value15 == 2){
		$("#OrderStatus").hide();
	}
	else{
		$("#OrderStatus").show();
	}
}

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
	
function toggleRptType(ch)
{
	if(ch == 2)
	{
		$("#channelgroup").hide();
	}
	else{
		
		$("#channelgroup").show();
	
	}
}

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
	
/******calender *********/
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
/******calender *********/

</script>