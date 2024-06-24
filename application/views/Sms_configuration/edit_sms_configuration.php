<?php 
$this->load->view('header/header');
$todays = date("Y-m-d");
 ?>

<div class="content-i">
	<div class="content-box">
		<div class="row">
		  <div class="col-sm-12">
			<div class="element-wrapper">
			  <h6 class="element-header">
			   SMS Configuration
			  </h6>
			  <div class="element-box">
			  <?php
					if(@$this->session->flashdata('success_code'))
					{ ?>	
						<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <button aria-label="Close" class="close" data-dismiss="alert" type="button">
						  <span aria-hidden="true"> &times;</span></button>
						  <?php echo $this->session->flashdata('success_code')."<br>".$this->session->flashdata('data_code'); ?>
						</div>
				<?php $this->session->unset_userdata('success_code'); $this->session->unset_userdata('data_code');
				} ?>
				<?php
					if(@$this->session->flashdata('error_code'))
					{ ?>	
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <button aria-label="Close" class="close" data-dismiss="alert" type="button">
						  <span aria-hidden="true"> &times;</span></button>
						  <?php echo $this->session->flashdata('error_code')."<br>".$this->session->flashdata('data_code'); ?>
						</div>
				<?php $this->session->unset_userdata('error_code');
						$this->session->unset_userdata('data_code');
				} ?>
				
				<?php $attributes = array('id' => 'formValidate');
				echo form_open('Sms_configuration/update_sms_configuration',$attributes); ?>
					<div class="row">
						<div class="col-sm-6">
							  <div class="form-group">
								<label for=""> <span class="required_info">*</span> SMS Provider Name </label>								
								<input class="form-control"  name="Provider_name" id="Provider_name"  type="text" placeholder="Enter SMS provider Name" value="<?php echo $SMS_configuration->Provider_name; ?>" required="required" data-error="Please enter SMS provider Name" >
								<div class="help-block form-text with-errors form-control-feedback" id="Provider_name"></div>
							  </div> 
							  <div class="form-group">
								<label for="">  Parameter1 (Username)</label>								
								<input class="form-control"  name="Parameter1" id="Parameter1"  type="text" placeholder="Enter Username" value="<?php echo $SMS_configuration->Parameter1; ?>"  data-error="Please enter Username" >
								<div class="help-block form-text with-errors form-control-feedback" id="Parameter1"></div>
							  </div> 
							  <div class="form-group">
								<label for="">  Parameter3 (Sender ID) </label>								
								<input class="form-control"  name="Parameter3" id="Parameter3"  type="text" placeholder="Enter Sender ID"  value="<?php echo $SMS_configuration->Parameter3; ?>" data-error="Please enter Sender ID" >
								<div class="help-block form-text with-errors form-control-feedback" id="Parameter3"></div>
							  </div> 
							  <div class="form-group">
								<label for="">  Parameter5 (Extra Parameter)</label>								
								<input class="form-control"  name="Parameter5" id="Parameter5"  type="text" placeholder="Enter enter extra  Parameter 1"  value="<?php echo $SMS_configuration->Parameter5; ?>"  >
								<div class="help-block form-text with-errors form-control-feedback" id="Parameter5"></div>
							  </div>						  
							</div> 
							<div class="col-sm-6">
							  
								<div class="form-group">
									<label for=""> <span class="required_info">*</span> SMS URL</label>								
									<input class="form-control"  name="SMS_main_url" id="SMS_main_url"  type="text" placeholder="Enter SMS URL"  value="<?php echo $SMS_configuration->SMS_main_url; ?>" required="required" data-error="Please enter SMS URL" >
									<div class="help-block form-text with-errors form-control-feedback" id="SMS_main_url"></div>
								</div> 
								<div class="form-group">
									<label for="">  Parameter2 (Password)</label>								
									<input class="form-control"  name="Parameter2" id="Parameter2"  type="text" placeholder="Enter Password"  value="<?php echo $SMS_configuration->Parameter2; ?>"  data-error="Please enter Password" >
									<div class="help-block form-text with-errors form-control-feedback" id="Provider_name"></div>
								</div>
								<div class="form-group">
									<label for="">  Parameter4 (Auth Key) </label>								
									<input class="form-control"  name="Parameter4" id="Parameter4"  type="text" placeholder="Enter Auth Key"  value="<?php echo $SMS_configuration->Parameter4; ?>"  data-error="Please enter Auth Key" >
									<div class="help-block form-text with-errors form-control-feedback" id="Parameter4"></div>
								</div> 
								<div class="form-group">
									<label for="">  Parameter6  (Extra Parameter 2)</label>								
									<input class="form-control"  name="Parameter6" id="Parameter6"  type="text" placeholder="Enter extra Parameter 6"  value="<?php echo $SMS_configuration->Parameter6; ?>" >
									<div class="help-block form-text with-errors form-control-feedback" id="Parameter6"></div>
								</div> 						  
							</div> 
						
					</div>
					<div class="form-buttons-w text-center">
					<input class="form-control"  name="SMS_configuration_id" id="SMS_configuration_id"  type="hidden" placeholder="Enter extra Parameter 6"  value="<?php echo $SMS_configuration->SMS_configuration_id; ?>" required="required" data-error="Please enter extra Parameter 2" >
						<button class="btn btn-primary" type="submit" id="Register">Submit</button>
						<button class="btn btn-primary" type="reset">Reset</button>
					</div>
				<?php echo form_close(); ?>		  
						
			</div>
			</div>
			<!-------------------- START - Data Table -------------------->		
				
			  <div class="element-wrapper">											
					<div class="element-box">
					  <h6 class="form-header">
					   SMS configuration Details
					  </h6>                  
					  <div class="table-responsive">
						<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
							<thead>
								<tr>
									<th class="text-center">Action</th>
									<th class="text-center">Provider Name</th>
									<th class="text-center">Username</th>
									<th class="text-center">Password</th>
									<th class="text-center">Sender ID </th>
									<th class="text-center">Auth Kay </th>
									<th class="text-center">Parameter Extra 1 </th>
									<th class="text-center">Parameter Extra 2 </th>
								</tr>
							</thead>						
							<tfoot>
								<tr>
									<th class="text-center">Action</th>
									<th class="text-center">Provider Name</th>
									<th class="text-center">Username</th>
									<th class="text-center">Password</th>
									<th class="text-center">Sender ID </th>
									<th class="text-center">Auth Kay </th>
									<th class="text-center">Parameter Extra 1 </th>
									<th class="text-center">Parameter Extra 2 </th>
								</tr>
							</tfoot>
							<tbody>
						
									<?php
										$todays = date("Y-m-d");										
										if($sms_results != NULL)
										{
											foreach($sms_results as $row)
											{
					
												if($row->Active_flag==1){
													$css="green";
												} else {
													$css="";
												}
											?>	

												<tr style="color:<?php echo $css; ?>">
													<td class="row-actions">
													<a href="javascript:void(0);" onclick="Active_me('<?php echo $row->SMS_configuration_id;?>','<?php echo $row->Provider_name; ?>','Sms_configuration/activate_sms/?SMS_configuration_id');" data-target="#MakeActive" data-toggle="modal" title="Make-Active"><i class="fa fa-check-square-o"></i></a>
														|<a href="<?php echo base_url()?>index.php/Sms_configuration/edit_sms_confoguration/?SMS_configuration_id=<?php echo $row->SMS_configuration_id;?>" title="Edit">
															<i class="os-icon os-icon-ui-49"></i>
														</a>
														|
														<a class="danger" href="javascript:void(0);" onclick="delete_me('<?php echo $row->SMS_configuration_id;?>','<?php echo $row->Provider_name; ?>','','Sms_configuration/delete_sms_notifiation/?SMS_configuration_id');" data-target="#deleteModal" data-toggle="modal"  title="Delete">
															<i class="os-icon os-icon-ui-15"></i>
														</a>
													</td>
													<td><?php echo $row->Provider_name; ?></td>
													<td><?php echo substr($row->Parameter1,0,20).'...'; ?></td>
													<td><?php echo substr($row->Parameter2,0,20).'...'; ?></td>
													<td><?php echo $row->Parameter3; ?></td>
													<td><?php echo $row->Parameter4; ?></td>
													<td><?php echo $row->Parameter5; ?></td>
													<td><?php echo $row->Parameter6; ?></td>
									
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
	
<!--------------------  END - Data Table  -------------------->

		  </div>
		</div>
		
			
	</div>
</div>			

<?php $this->load->view('header/footer'); ?>


<!-------------Activate modal start------------->	
<div aria-hidden="true" aria-labelledby="mySmallModalLabel" class="modal fade bd-example-modal-sm show" id="MakeActive" role="dialog" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Confirmation
                </h5>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true"> &times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="arg111" id="arg111" value=""/>
                <input type="hidden" name="arg222" id="arg222" value=""/>
                <input type="hidden" name="arg333" id="arg333" value=""/>
                <input type="hidden" name="argUrl11" id="argUrl11" value=""/>
                Are you sure you want to Active this SMS <b id="arg333"></b> ? <br></span>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button" onclick="confirmed_active(arg111.value, arg222.value, argUrl11.value)">OK</button>
            </div>
        </div>
    </div>
</div>
<!---------------Activate modal end---------------->
<script>
function Active_me(arg1, arg2,  argUrl) 
{
    $(".modal-body #arg111").val(arg1);
    $(".modal-body #arg111").html(arg1);

    $(".modal-body #arg222").val(arg2);
    $(".modal-body #arg222").html(arg2);

    $(".modal-body #arg333").val(arg2);
    $(".modal-body #arg333").html(arg2);

    $(".modal-body #argUrl11").val(argUrl);
}
function confirmed_active(arg1, arg2, argUrl) 
{
	// alert(arg1+"------"+arg2+"-----"+argUrl);
    if (argUrl)
    {
       /*  var url = '<?php echo base_url(); ?>index.php/' + argUrl + '=' + arg1;
		alert("--url----"+url);
        $('#MakeActive').modal('hide');
        // show_loader();
        setTimeout(function () {
            // window.location = '<?php echo base_url(); ?>index.php/Sms_configuration/sms_setting';
        }, 3000)
        return true; */
		
		
		
		
			$.ajax({
				type:"REQUEST",
				// data:{search_data:search_data, Company_id:Company_id},
				url:'<?php echo base_url(); ?>index.php/' + argUrl + '=' + arg1,
				success : function(data)
				{
					
					 $('#MakeActive').modal('hide');
					show_loader();
					setTimeout(function () {
						var msg = '<?php $this->session->set_flashdata("success_code","SMS Activated Successfully"); ?>';
						window.location = '<?php echo base_url(); ?>index.php/Sms_configuration/sms_setting';
						
					}, 1000)
					return true;
					
				}
			});
		
    } 
	else
    {
        return false;
    }
}
</script>
<style>
#grid-container {
  display: grid;
  grid-template-columns: auto auto;
}
.grid-item {
  padding:0px 2px;
  text-align: left;
}
#grid-container {
  display: grid;
  grid-template-columns: auto auto;
}
.grid-item {
  padding:0px 2px;
  text-align: left;
}

</style>