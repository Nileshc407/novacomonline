<?php $this->load->view('header/header'); ?>
<div class="content-i">
	<div class="content-box">
		<div class="row">
		  <div class="col-lg-12">
			<div class="element-wrapper">
			  <h6 class="element-header">
			   LOYALTY RULE
			  </h6>
			  <div class="element-box">
			
					<!-----------------------------------Flash Messege-------------------------------->

					<?php
						if(@$this->session->flashdata('success_code'))
						{ ?>	
							<div class="alert alert-success alert-dismissible fade show" role="alert">
							  <button aria-label="Close" class="close" data-dismiss="alert" type="button">
							  <span aria-hidden="true"> &times;</span></button>
							  <?php echo $this->session->flashdata('success_code')."<br>".$this->session->flashdata('data_code'); ?>
							</div>
					<?php 	} ?>
					<?php
						if(@$this->session->flashdata('error_code'))
						{ ?>	
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <button aria-label="Close" class="close" data-dismiss="alert" type="button">
							  <span aria-hidden="true"> &times;</span></button>
							  <?php echo $this->session->flashdata('error_code')."<br>".$this->session->flashdata('data_code'); ?>
							</div>
					<?php 	} ?>
					<!-----------------------------------Flash Messege-------------------------------->
				
				<?php foreach($results as $rows)
				{
					$lp_name = $rows['Loyalty_name'];
					$Loyalty_id = $rows['Loyalty_id'];
					$Tier_id = $rows['Tier_id'];
					/* $From_date = date("Y-m-d",strtotime($rows['From_date']));
					$Till_date = date("Y-m-d",strtotime($rows['Till_date'])); */
					$From_date = date("m/d/Y",strtotime($rows['From_date']));
					$Till_date = date("m/d/Y",strtotime($rows['Till_date']));
					$PABA_val = substr($rows['Loyalty_name'],0,2);
					
					$Loyalty_at_transaction = $rows['Loyalty_at_transaction'];
					$Loyalty_at_value = $rows['Loyalty_at_value'];
					$discount = $rows['discount'];
					$SellerID = $rows['Seller'];
					$Company_id = $rows['Company_id'];
					$Flat_file_flag = $rows['Flat_file_flag'];
					$Category_flag = $rows['Category_flag'];
					$Segment_flag = $rows['Segment_flag'];
					$Category_id = $rows['Category_id'];				
					$Category_name = $rows['Merchandize_category_name'];				
					$Segment_id = $rows['Segment_id'];
					$Segment_code = $rows['Segment_code'];
					$Segment_name = $rows['Segment_name'];
					$Channel_flag = $rows['Channel_flag'];
					$Payment_flag = $rows['Payment_flag'];
					$Trans_Channel = $rows['Trans_Channel'];
					$Payment_Type_id = $rows['Payment_Type_id'];
				} 
			
			$attributes = array('id' => 'formValidate');
				echo form_open('Administration/update_loyalty_rule',$attributes); ?>	
				<div class="row">
										<div class="col-sm-6">
				  <div class="form-group">
					<label for="">Company Name</label>
					<select class="form-control" name="Company_id"  required="required">
						<option value="<?php echo $Company_details->Company_id; ?>"><?php echo $Company_details->Company_name; ?></option> 
					</select>
				  </div>  
				  
				  <div class="form-group">
					<label for=""><span class="required_info" style="color:red;">* </span>Brand Name</label>
					<select class="form-control" name="seller_id" ID="seller_id"   required="required">
						<?php
					
								foreach($Seller_array as $seller_val)
								{
									if($SellerID == $seller_val->Enrollement_id)
									{
										echo "<option value=".$seller_val->Enrollement_id.">".$seller_val->First_name." ".$seller_val->Last_name."</option>";
									}
								}
								
								if($SellerID == $enroll && $Super_seller == 1)
								{
									echo '<option value="'.$enroll.'">'.$LogginUserName.'</option>';
								}
							?>
					</select>
				  </div>  
				  
				 <div class="form-group">
					<label for=""><span class="required_info" style="color:red;">* </span>Loyalty Program Name</label><input class="form-control" placeholder="Enter Loyalty Program Name" type="text" name="LPName" id="LPName" required="required"  onkeypress="return isAlphanumeric(event)" onblur="lp_name_validation(this.value,loyalty_rule_setup.value);"  value="<?php echo substr(strrchr($lp_name,"-"),1); ?>"   data-error="Please Enter Loyalty Program Name"  >
					<div class="help-block form-text with-errors form-control-feedback" id="LPName2" ></div>
				  </div>
				 
				 	
					<div class="form-group">
						<label for="">
							<span class="required_info" style="color:red;">*</span> Valid From <span class="required_info" style="color:red;font-size:10px;">(click inside textbox)</span>
						</label>
						<div class="input-group">
							<input type="text" name="start_date" id="datepicker1" class="single-daterange form-control" placeholder="Rule Start Date" required  value="<?php echo $From_date; ?>"/>			
							<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="">
							<span class="required_info" style="color:red;">*</span> Valid Till <span class="required_info" style="color:red;font-size:10px;">(click inside textbox)</span>
						</label>
						<div class="input-group">
							<input type="text" name="end_date" id="datepicker2" class="single-daterange form-control" placeholder="Rule End Date" required  value="<?php echo $Till_date; ?>"/>			
							<span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
						</div>
					</div>
						
				 
					<div class="form-group">
						<label for=""> <span class="required_info" style="color:red;">*</span> Select Tier</label> 
						<select class="form-control" name="member_tier_id"  id="member_tier_id" required >
							<option value="0">All Tiers</option>						
							<?php
							foreach($Tier_list as $Tier)
							{
							?>
								<option value="<?php echo $Tier->Tier_id; ?>" 
								<?php if($Tier_id == $Tier->Tier_id){echo 'selected="selected"';} ?> ><?php echo $Tier->Tier_name; ?></option>
							<?php
							}
							?>
						</select>						
					</div>
				 
					 </div>
				    
					
				<div class="col-sm-6">
					
					
				 
				 <div class="form-group">
					<label for=""><span class="required_info" style="color:red;">* </span>Loyalty Rule Setup</label>
					<div class="col-sm-8" >
					  
					  
					   
					  
					   <?php if($PABA_val == "PA"){ ?> 
							<div class="form-check" >
								<label class="form-check-label">
								<input class="form-check-input" name="loyalty_rule_setup" type="radio"   value="PA" required checked>On 'Purchase' Amount</label>
							  </div>	 
							<?php }else
							{
							?> 
							<div class="form-check" >
								<label class="form-check-label">
								<input class="form-check-input" name="loyalty_rule_setup" type="radio"  value="BA" required checked>On 'Balance To Pay'</label>
							  </div>
							<?php } ?>
							
					</div>
				  </div>
				 
					
					<div class="form-group">
					  <label for=""><span class="required_info" style="color:red;">* </span>Member Gain <?php echo $Company_details->Currency_name; ?> </label>
					  
					<div class="col-sm-8" >
					  <div class="form-check" >
						<label class="form-check-label">
						<input class="form-check-input" name="customer_gain" id="inlineRadio3"  type="radio"   value="1"  required >Based On Every Transaction</label>
					  </div>
					  
					  <div class="form-check" >
						<label class="form-check-label">
						<input class="form-check-input" name="customer_gain" id="inlineRadio4"  type="radio"  value="2" required >Based On Value of Transaction</label>
					  </div> 
						
							
							<!-- Modal -->
								<div id="myModal1" class="modal fade" role="dialog">
								
								  <div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
									<div align="right"><button type="button" class="close"  data-dismiss="modal"><span aria-hidden="true"> &times;</span></button>
									</div>
									  <div class="modal-header">
										
										<h6 class="element-header">
									   Member Gain <?php echo $Company_details->Currency_name; ?> Based On Value of Transaction 
									  </h6>
									  </div>
									  
									  <div class="modal-body">
										<p>
											<div class="table-responsive">
											<table  id="options-table" class="table table-bordered table-hover">
												<thead>
												<tr>
													<th class="text-center">On Purchase Above</th>
													<th class="text-center">Gain <?php echo $Company_details->Currency_name; ?> (in Percentage)</th>
													<th class="text-center">
														<button type="button" id="addrows" class="btn btn-info" >Add Rule</button>
													</th>
												</tr>
												
												<tr id="Row_1"><td><input type="text" name="Purchase_value"  onblur="CheckDuplicateVals(this.value,this.id);" onkeypress="return isNumberKey(event)" value="0" id="Purchase_1"/></td>
												<td><input type="text"  onblur="checkVal(this.value,this.id);" onkeypress="return isNumberKey(event)" value="" name="Issue_points" id="Points_1"/></td>
												<td>
												
												<a class="danger" id="Rmv_1" href="javascript:RemoveRow('1');"  title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
												
												
												
												</td></tr>
            
            
												</thead>
											</table>
	
											</div>
										</p>
									  </div>

										<div class="form-group has-feedback" id="has-feedback4">
											<div class="help-block" id="help-block4"></div>
										</div>

						
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
									  </div>
									</div>

								  </div>
								</div>
					  
					</div>
					  
					</div>
					
					<?php if($Loyalty_at_transaction  > 0){ ?>		
						
						
						<div class="form-group"  id="has-feedback5">
						<span id="if_every_transaction">
						<label for=""> <span class="required_info" style="color:red;">* </span>Gain <?php echo $Company_details->Currency_name; ?>  <span class="required_info">(Please Enter Percentage(%) between 1 to 100)</span></label>
						<input class="form-control" type="text" name="gained_points" id="gained_points" onblur="checkVal(this.value,this.id);"  name="gained_points" class="form-control" placeholder="Enter Gain <?php echo $Company_details->Currency_name; ?> (In Percentage)"  value="<?php if($Loyalty_at_transaction > 0){ echo $Loyalty_at_transaction; }?>"  onkeyup="this.value=this.value.replace(/\D/g,'')" >
						</span>
						<div class="help-block form-text with-errors form-control-feedback"  id="Gain" ></div>
						</div>
						
						<?php } if($Loyalty_at_value > 0){ ?>	
	
						<div  class="form-group has-feedback" id="has-feedback7">
							<span id="if_every_transaction" >
							<label for="exampleInputEmail1"><span class="required_info"  style="color:red;">*</span> On Above Amount</label>
							<input type="text" required onblur="CheckDuplicateVals(this.value,this.id);" name="Purchase_value" value="<?php if($Loyalty_at_value > 0){ echo $Loyalty_at_value; }?>" id="Purchase_0" class="form-control"    onkeyup="this.value=this.value.replace(/\D/g,'')" >
							
								<span class="glyphicon" id="glyphicon7" aria-hidden="true"></span>
								<div class="help-block" id="help-block7"></div>
							</span>
						</div>
						
						<div class="form-group"  id="has-feedback5">
						<span id="if_every_transaction">
						<label for=""> <span class="required_info" style="color:red;">* </span>Gain <?php echo $Company_details->Currency_name; ?>  <span class="required_info">(Please Enter Percentage(%) between 1 to 100)</span></label>
						<input class="form-control" type="text"  name="Issue_points" onblur="checkVal(this.value,this.id)"  value="<?php if($discount > 0){ echo $discount; }?>" id="Points_0"    onkeyup="this.value=this.value.replace(/\D/g,'')" >
						</span>
						<div class="help-block form-text with-errors form-control-feedback"  id="Gain" ></div>
						</div>
						
						<?php } ?>	
					
					
						
					<div class="form-group">
					  <label for=""><span class="required_info" style="color:red;">* </span>Loyalty Rule For</label>
					  
						<div class="col-sm-8" >
						  <div class="form-check" >
							<label class="form-check-label">
							
								
							
							<?php if($Category_flag==1)
								{ ?>
								<input type="radio" name="Rule_for" class="form-check-input" id="r1" value="1" checked>Menu Group
								<br> <?php } 
								else if($Segment_flag==1)
								{ ?>
								<input type="radio" name="Rule_for" class="form-check-input" id="r2" value="2" checked>Segment
								<br>
						 <?php 	}else if($Channel_flag==1)
								{ ?>
								<input type="radio" name="Rule_for" class="form-check-input" id="r4" value="4" checked>Transaction Channel
								<br>
						 <?php 	}else if($Payment_flag==1)
								{ ?>
								<input type="radio" name="Rule_for" class="form-check-input" id="r5" value="5" checked>Payment Type
								<br>
						 <?php 	}
								else
								{ ?>
								<input type="radio" name="Rule_for" class="form-check-input" id="r3" value="3" checked><label for="r3">None (Normal Rule)</label>
					<?php		}
								?>
								
							</label>
						  </div>
						  	
						</div>
					  
					</div>
					
					
					
					<?php 	if($Channel_flag==1)
							{ ?>
							<div  class="form-group"  >
									<label for=""><span class="required_info">* </span>Select Transaction Channel </label>
									<select class="form-control" name="Trans_Channel" id="Trans_Channel"   >
										<option value="0" <?php if($Trans_Channel==0){echo 'selected';}?>>All</option>
										<option value="2" <?php if($Trans_Channel==2){echo 'selected';}?>>POS</option>
										<option value="12" <?php if($Trans_Channel==12){echo 'selected';}?>>Online</option>
										<option value="29" <?php if($Trans_Channel==29){echo 'selected';}?>>3rd Party Online Order</option>
									</select>
						</div>	
					<?php 	} 	
					
					
					 	if($Payment_flag==1)
							{ ?>
							<div  class="form-group" id="Payment" >
									<label for=""><span class="required_info">* </span> Select Payment Type </label>
									<select class="form-control" name="Payment_Type_id" id="Payment_Type_id"   >
										<?php										
										foreach($get_payement_type as $rec)
										{
											if($Payment_Type_id==$rec->Payment_type_id)
											{
												echo '<option value="'.$rec->Payment_type_id.'" selected>'.$rec->Payment_type.'</option>';
											}
											else
											{
												echo '<option value="'.$rec->Payment_type_id.'">'.$rec->Payment_type.'</option>';
											}
											
										}
										?>
									</select>
						</div>	
					<?php 	} 	
					
					
					 	if($Category_flag==1)
							{ ?>
					<div class="form-group"  id="Category" >
							<label for=""><span class="required_info" style="color:red;">* </span> Menu Group Name</label>
							<div class="col-sm-12" >
							<select class="form-control select2" name="Category_id" id="Category_id" >
							  <option value="<?php echo $Category_id; ?>"><?php echo $Category_name; ?></option>
							</select>
						</div> 
					</div> 
					<?php 	} 	
					
					
					if($Segment_flag==1)
							{ ?>
					
					
					
					
					
					<div  class="form-group" id="Segment" style="display:none;">
								<label for=""><span class="required_info" style="color:red;">* </span> Segment  Name</label>
								<select class="form-control" name="Segment_id" id="Segment_id"   onchange="Show_criteria(this.value);">
									<option value="<?php echo $Segment_code; ?>"><?php echo $Segment_name; ?>
								</select>
					</div>	
					
					
					
					<div class="form-group" id="Segment_Criteria" >
								<label for="">&nbsp;Segment Criteria</label>
								<?php
										$lv_Segment_code=$Segment_code;
										$ci_object = &get_instance();
										$ci_object->load->model('Segment/Segment_model');
										$Get_segments = $ci_object->Segment_model->edit_segment_code($Company_details->Company_id,$lv_Segment_code);
										$Segment_operation=array();
										foreach($Get_segments as $Get_segments)
										{
											
											if($Get_segments->Operator=='Between')
											{
												$Segment_operation[]=$Get_segments->Segment_type_name." ".$Get_segments->Operator." (".$Get_segments->Value1.",".$Get_segments->Value2.")";
											}
											else
											{
												$Segment_operation[]=$Get_segments->Segment_type_name." ".$Get_segments->Operator." '".$Get_segments->Value."'";
											}
											
										}
										$lv_Segment_operation=implode(" AND ",$Segment_operation); 
										echo $lv_Segment_operation;
									?>
					</div>
				  
				  <?php	} ?>

					<input type="hidden" name="Loyalty_id" value="<?php echo $Loyalty_id; ?>" class="form-control" />	
				</div>	
					
				
				  
				</div>
			  </div>
			  
				  
				  
				  <div class="form-buttons-w"  align="center">
					<button class="btn btn-primary" name="submit" id="Register"  type="submit">Submit</button>
					<button class="btn btn-primary" type="reset">Reset</button>
				  </div>
				  
				<?php echo form_close(); ?>		  
			  </div>
			  
			</div>
		  </div>
		</div>
		
	</div>


	<!--------------Table------------->
	<div class="content-panel">             
		<div class="element-wrapper">											
			<div class="element-box">
			  <h5 class="form-header">
			   Loyalty Rules
			  </h5>                  
			  <div class="table-responsive">
				<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
					<thead>
						<tr>
							<th>Action</th>
							<th>Brand Name</th>
							<th>Loyalty Program Name</th>
							<!--<th class="text-center">Flat File Yes/No</th>-->							
							<th>Menu Group Name</th>						
							<th>Validity</th>
							<!--<th>Tier Name</th>-->
							<!--
							<th colspan="2" >Validity Of Transaction</th>
							<th>Loyalty @ Transaction</th>
							<th colspan="2">Loyalty @ Value</th>-->
						</tr>
						<!--
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							
							<td>From Date</td>
							<td>Till Date</td>
							<td> % <?php echo $Company_details->Currency_name; ?>  Gained</td>
							<td>Value</td>
							<td> % <?php echo $Company_details->Currency_name; ?>  Gained</td>
							
						</tr>-->
					</thead>						
					
					<tbody>
				<?php
						$todays = date("Y-m-d");
						
						if($results2 != NULL)
						{
							foreach($results2 as $row)
							{
									if( ($todays >= $row->From_date) && ($todays <= $row->Till_date) )
									{
										$class = 'style="color:#00b300;"';
									}
									else
									{
										$class = "";
									}
							?>
						<tr>
									<td class="row-actions">
										<a href="<?php echo base_url()?>index.php/Administration/edit_loyalty_rule/?Loyalty_id=<?php echo $row->Loyalty_id;?>" title="Edit">
											<i class="os-icon os-icon-ui-49"></i>
										</a>
										
										<a href="javascript:void(0);" class="danger"  onclick="delete_me('<?php echo $row->Loyalty_id;?>','<?php echo $row->Loyalty_name;?>','','Administration/delete_loyalty_rule/?Loyalty_id');" title="Delete"  data-target="#deleteModal" data-toggle="modal" >
											<i class="os-icon os-icon-ui-15"></i>
										</a>
									</td>
									
									<td class="text-center"><?php echo $row->First_name." ".$row->Last_name;?></td>
									
									<td><?php echo $row->Loyalty_name;?></td>
									<?php /* 
									<td class="text-center"><?php if($row->Flat_file_flag==1){ echo "Yes"; } else { echo "No"; }?></td>  */ ?>
									
									<td class="text-center"><?php if($row->Merchandize_category_name !="") { echo $row->Merchandize_category_name; } else { echo "-"; }?></td>
									<?php 
										
										$ci_object = &get_instance();
										$ci_object->load->model('administration/Administration_model');
										
										$Segment_name = $ci_object->Administration_model->Get_Segment_Name($row->Segment_id,$Company_id);
										
										if($Segment_name!=NULL)
										{
											$Segmentname=$Segment_name->Segment_name;		
										} 
									?>
									<!--
									<td class="text-center"><?php if($Segment_name !="") { echo $Segmentname; } else { echo "-"; } ?></td>-->
									<td <?php echo $class; ?>><?php echo  $row->From_date." <b>To</b> ".$row->Till_date; ?> </td>
									<!--
									<td class="text-center"><?php if($row->Tier_id !="") { echo $row->Tier_name; } else { echo "All Tier"; } ?></td>-->
									
									
									<!--
									<td><?php echo  $row->From_date; ?> </td>
									<td><?php echo $row->Till_date; ?> </td>
										
									<td><?php echo $row->Loyalty_at_transaction;?></td>
									<td><?php echo $row->Loyalty_at_value;?></td>
									<td><?php echo $row->discount;?></td>
										-->
								</tr>
							<?php
							}
						}
						?>
					</tbody>
				</table>
			  </div>
			</div>
		</div>
	</div> 
	<!--------------Table--------------->
	
</div>			
<?php $this->load->view('header/footer'); ?>
<script>
$('#Register').click(function()
{
	//alert();
	if( $('#seller_id').val() != "" && $('#LPName').val() != "" && $('#datepicker1').val() != "" && $('#datepicker2').val() != "" && $("input[name=customer_gain]:checked").val() > 0)
	{
		show_loader();
		
	}
});
</script>
<script type="text/javascript">

	function lp_name_validation(lpname,rule_type)
	{
		// var rule_type = $("input[name=loyalty_rule_setup]:checked").val();

		// var Lp_Name = rule_type+"-"+lpname;
	
		var Company_id = '<?php echo $Company_id; ?>';
		
		 // if( lpname == "" )
		// {
			// $("#LPName").val("");
			// has_error(".has-feedback","#glyphicon","#help-block6","Please Enter Valid Loyalty Program Name..!!");
		// }
		// else if(rule_type == "PA" || rule_type == "BA")
		// {
		$.ajax({
				type:"POST",
				data:{lpname:lpname, Company_id:Company_id},
				url: "<?php echo base_url()?>index.php/Administration/loyalty_program_name_validation",
				success : function(data)
				{ 
					// alert(data);
					if(data == 0)
					{
						$("#LPName").val("");
						//has_error(".has-feedback","#glyphicon","#help-block6","Already Exist");
						$("#LPName2").html("Already exist");
						$("#LPName").addClass("form-control has-error");
					}
					else
					{
						$("#LPName2").html("");
						$("#LPName").removeClass("has-error");
					}
					
				}
			});
		// }
		// else
		// {
			// $("#LPName").val("");
			// has_error(".has-feedback","#glyphicon","#help-block6","Please Select Any One Loyalty Rule Setup..!!");
		// }
		
		
	}
	
/******calender *********/
$(function() 
{
	$( "#datepicker1" ).datepicker({
		changeMonth: true,
		yearRange: "-80:+2",
		changeYear: true
	});
	
	$( "#datepicker2" ).datepicker({
		changeMonth: true,
		yearRange: "-80:+2",
		changeYear: true
	});
		
});

/******calender *********/
hide_gained_points(1);
function hide_gained_points(input_val)
{
	if(input_val == 2)
	{
		$("#if_every_transaction").hide();
		$("#gained_points").removeAttr("required");	
	}
	else
	{
		$("#if_every_transaction").show();
		$("#gained_points").attr("required","required");
	}
}



function checkVal(percent_val,field_id)
{
	if(percent_val > 100)
	{
		$("#"+field_id).val("");
		
		if(field_id == "gained_points")
		{
			// has_error("#has-feedback5","#glyphicon5","#help-block5","Enter between 1 to 100 percentage(%).");
			$("#Gain").html("Please Enter Percentage(%) between 1 to 100");
			$("#gained_points").addClass("form-control has-error");
		}
		else
		{
			// has_error("#has-feedback4","#glyphicon4","#help-block4","Enter between 1 to 100 percentage(%).");
		}
	}
	else 
	{
		if(percent_val == 0)
		{
			$("#"+field_id).val("");
			
			if(field_id == "gained_points")
			{
				// has_error("#has-feedback5","#glyphicon5","#help-block5","Enter between 1 to 100 percentage(%).");
				$("#Gain").html("Please Enter Percentage(%) between 1 to 100");
				$("#gained_points").addClass("form-control has-error");
			}
			else
			{
				// has_error("#has-feedback4","#glyphicon4","#help-block4","Enter between 1 to 100 percentage(%).");
				$("#Gain").html("Please Enter Percentage(%) between 1 to 100");
			}
		}
	}
	
	if(field_id == "gained_points")
	{
		if(percent_val != 0 && percent_val <= 100)
		{
			$("#gained_points").removeClass("has-error");
			$("#Gain").html("");
		}
	}
	
	/*else
	{
		if(field_id == "gained_points")
		{
			has_success("#has-feedback5","#glyphicon5","#help-block5","");
		}
		else
		{
			
			has_success("#has-feedback4","#glyphicon4","#help-block4","");
		}
		
	}*/
}
	var allVals = new Array();
	function CheckDuplicateVals(percent_val,field_id)
	{
		
		if($.inArray(percent_val, allVals) == '-1')
		{
			allVals.push(percent_val);
		}
		else
		{
			has_error("#has-feedback4","#glyphicon4","#help-block4","Do not enter Duplicate entry");
			
			$("#"+field_id).val("");
		}
			
	}
	//onkeyup="this.value=this.value.replace(/\D/g,'')"
/******** add row ********/ 
jQuery(function(){
    var counter = 2;
    jQuery('#addrows').click(function(event){
        event.preventDefault();
        counter++;
        var newRow = jQuery('<tr id="Row_'+counter+'"><td><input  class="form-control"  type="text" name="Purchase_value[]"  onblur="CheckDuplicateVals(this.value,this.id);"      onkeypress="return isNumberKey(event)" value="0"    id="Purchase_' +
            counter + '"/></td><td><input type="text"  onblur="checkVal(this.value,this.id);"  onkeypress="return isNumberKey(event)" value="" name="Issue_points[]"  class="form-control"    id="Points_' +
            counter + '"/></td><td><a id="Rmv_' +
            counter + '" href="javascript:RemoveRow('+counter+');"><i class="os-icon os-icon-ui-15"></i></a></td></tr>');
        jQuery('#options-table').append(newRow);
    });
});

function RemoveRow(rowID)
{
	jQuery('#Row_'+rowID).remove();
}	

function RemoveAllRows()
{
	$("#options-table").find("tr:gt(0)").remove();

}

$(document).ready(function(){
	var lp1 = '<?php echo $Loyalty_at_transaction; ?>';
	var lp2 = '<?php echo $Loyalty_at_value; ?>';
	
	//alert(lp1);
	
		if(lp1 > 0)
		{
			$("#inlineRadio3").attr('checked', 'checked');
			//$("#if_every_transaction").show();
			
			$("#inlineRadio4").attr('disabled', 'disabled');
		}
		
		if(lp2 > 0)
		{
			$("#inlineRadio4").attr('checked', 'checked');
			//$("#if_every_transaction").show();
                        $("#inlineRadio3").attr('disabled', 'disabled');
		}
		
	});	
	
function delete_loyalty_rule(Loyalty_id,Loyalty_name)
{	
			var url = '<?php echo base_url()?>index.php/Administration/delete_loyalty_rule/?Loyalty_id='+Loyalty_id;
			window.location = url;
			return true;
			
/* 	BootstrapDialog.confirm("Are you sure to Delete the Loyalty Rule "+Loyalty_name+" ?", function(result) 
	{
		var url = '<?php echo base_url()?>index.php/Administration/delete_loyalty_rule/?Loyalty_id='+Loyalty_id;
		alert(url);
		if (result == true)
		{
			show_loader();
			window.location = url;
			return true;
		}
		else
		{
			return false;
		}
	}); */
}
/*****************Show Hide*****************/
	$('#r1').click(function()
	{
		 $("#Category").show();	
		//document.getElementById("Category").style.display="";
		$("#Category_id").attr("required","required");
		$("#Segment").hide();
		$("#Segment_Criteria").hide();
		$("#Segment_id").removeAttr("required");
		
		/*$.ajax({
			type:"POST",
			data:{Company_id:'<?php echo $Company_id; ?>'},
			url: "<?php echo base_url(); ?>index.php/Administration/Get_Merchandize_category",
			success: function(data)
			{ 
				$("#Category_id").html(data.Category_data);	
			}				
		});*/
		
	});		
	$('#r2').click(function()
	{
		$("#Category").hide();
		$("#Segment_Criteria").hide();
		$("#Category_id").removeAttr("required"); 	 
		$("#Segment").show();
		$("#Segment_id").attr("required","required");
		
		$.ajax({
			type:"POST",
			data:{Company_id:'<?php echo $Company_id; ?>'},
			url: "<?php echo base_url(); ?>index.php/Administration/Get_Segment",
			success: function(data)
			{ 
				$("#Segment_id").html(data.Segment_data);	
			}				
		});
	});		
	$('#r3').click(function()
	{
		$("#Category").hide();
		$("#Segment_Criteria").hide();
		// $("#Category_id").removeAttr("required");
		$("#Segment").hide();
		// $("#Segment_id").removeAttr("required");
	});
	
	function Show_criteria(Segment_id)
	{
		if(Segment_id !=0)
		{
			$.ajax({
				type: "POST",
				data: {Segment_id: Segment_id,Company_id:'<?php echo $Company_id; ?>'},
				url: "<?php echo base_url()?>index.php/Administration/Get_Segment_Criteria",
				success: function(data)
				{ 
					$("#Segment_Criteria").show();
					$("#S_Criteria").html(data.Criteria_data);			
				}
			});
		}
		else
		{
			$("#Segment_Criteria").hide();
		}
	}
/**************Show Hide**********************/
</script>
