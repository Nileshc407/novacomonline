<?php $this->load->view('header/header'); ?>
<div class="content-i">
	<div class="content-box">
		<div class="row">
			<div class="col-sm-12">
				<div class="element-wrapper">											
					<div class="element-box">
					  <h6 class="form-header">
					   Enrollments
					  </h6>                  
					  <div class="table-responsive">
						<table id="dataTable1" width="100%" class="table table-striped table-lightfont">
							<thead>
								<tr>
									<th>Action</th>
									<th>User Type</th>
									<th>Name</th>
									<th>Membership ID</th>
									<th>Phone Number</th>
									<th>Email ID</th>
									<th>Current <?php echo 	$Company_details->Currency_name; ?> Balance</th>
								</tr>
							</thead>						
							<tfoot>
								<tr>
									<th>Action</th>
									<th>User Type</th>
									<th>Name</th>
									<th>Membership ID</th>
									<th>Phone Number</th>
									<th>Email ID</th>
									<th>Current <?php echo 	$Company_details->Currency_name; ?> Balance</th>
								</tr>
							</tfoot>
							<tbody>
						<?php
							if($results != NULL)
							{
								foreach($results as $row)
								{
									if($row->User_id==1)
									{
										$User_type="Member";
									}
									else if($row->User_id==5) 
									{
										$User_type="Merchandize Partner";
									}
									else if($row->User_id==6) 
									{
										$User_type="Call Center User";
									}
									else if($row->User_id==7)
									{
										$User_type="Staff User";
									}
									else
									{
										$User_type="Outlet";
									}
									if($row->Card_id=='0')
									{
										$Card_id="-";
									}
									else
									{
										$Card_id=$row->Card_id;
									}
									if($Company_details-> Seller_topup_access==0 && $row->User_id!=1)
									{
										$Current_balance="-";
									}
									else
									{
										$Current_balance=($row->Current_balance-$row->Blocked_points);
									}
									/***********encrypt value*******************/
									// $Encrypt_Enrollement_id = urlencode($this->encrypt->encode($row->Enrollement_id));
							?>
								<tr>
									<td class="row-actions">
										<a href="<?php echo base_url()?>index.php/Enrollmentc/edit_enrollment/?Enrollement_id=<?php echo $row->Enrollement_id;?>" title="Edit"><i class="os-icon os-icon-ui-49"></i></a>
						
										<a class="danger" href="javascript:void(0);" onclick="delete_me('<?php echo $row->Enrollement_id;?>','<?php echo $row->First_name.' '.$row->Last_name; ?>','','Enrollmentc/delete_enrollment/?Enrollement_id');" data-target="#deleteModal" data-toggle="modal" title="Delete"><i class="os-icon os-icon-ui-15"></i></a>
									</td>
									<td><?php echo $User_type;?></td>
									<td><?php echo $row->First_name.' '.$row->Last_name;?></td>
									<td><?php echo $Card_id;?></td>
									<td><?php echo App_string_decrypt($row->Phone_no);?></td>
									<td><?php echo App_string_decrypt($row->User_email_id);?></td>
									<td><?php echo $row->Current_balance;?></td>
								</tr>
					<?php 		}
							}	?>
							</tbody>
						</table>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('header/footer'); ?>