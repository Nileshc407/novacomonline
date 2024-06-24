<?php 
$this->load->view('header/header');
$cart_check = $this->cart->contents();
$ci_object = &get_instance();
$ci_object->load->model('shopping/Shopping_model');
$ci_object->load->model('Igain_model');

?> <?php /*
<link href="<?php echo $this->config->item('base_url2')?>assets/shopping2/css/animate.css" rel="stylesheet">
<link href="<?php echo $this->config->item('base_url2')?>assets/shopping2/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
<link href="<?php echo $this->config->item('base_url2')?>assets/shopping2/css/custom.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'> */ ?>

<section class="content-header" style="border-bottom: 2px solid #d0112b !IMPORTANT;">
	<h1>order online </h1>	 
</section>
	<section class="content">
        <div class="row">
			<div class="col-md-12 clearfix" id="basket">
				<div class="box">
					<?php 
						$delivery_session_data = $this->session->userdata('delivery_session');
						$delivery_type=$delivery_session_data['delivery_type'];
						$delivery_outlet=$delivery_session_data['delivery_outlet'];
					?>
					<div class="modal-content">
						 <div class="modal-body">
							<form id="jsform" action="<?php echo base_url()?>index.php/Shopping/checkout" method="POST" onsubmit="return Validate_form();" >
								<div class="row">
								<div class="col-xs-12 col-md-3">
								</div>
								<div class="col-xs-12 col-md-6">
								<div class="panel panel-default" style="text-align: center;">	
									<div class="panel-heading"><label for="">Select Order Type</label></div>
									<div class="form-group">
										<label class="checkbox-inline"><input type="radio" name="delivery_type"  value="2" <?php if( $delivery_type == 2){echo 'checked=checked'; } ?> onclick="hide_table_no_block(this.value)">In-Store</label>
										
										<?php /*<label class="checkbox-inline"><input type="radio" name="delivery_type" <?php if($delivery_type == 0){echo 'checked=checked'; } ?> value="0" onclick="hide_table_no_block(this.value)">Delivery</label> */ ?>
										
										<?php /*<label class="checkbox-inline"><input type="radio" name="delivery_type" checked value="1">Take Away</label>*/ ?>
										
										<label class="checkbox-inline"><input type="radio" name="delivery_type" value="1" <?php if($delivery_type=="" || $delivery_type == 1){echo 'checked=checked'; } ?> onclick="hide_table_no_block(this.value)">Pick-Up</label>
									</div> 	
								</div> <br>		
								<div class="panel panel-default" style="text-align: center;">	
									<div class="panel-heading"><label for="">Select Outlet</label></div>
									<div class="form-group" id="Take_away_div"><br/>
										<!--<label for="delivery_outlet">Select Outlet</label>-->
									
										<select class="form-control select2" id="delivery_outlet" name="delivery_outlet" onchange="check_outlet_status(this.value); show_table_no_block(this.value);">
											<?php 
												$Current_time = date("H:i:s");
												$Current_day = date("l");
												$day_of_week = date('N', strtotime($Current_day));
												
												if($delivery_outlet == "")
												{
													echo '<option value="">Select Outlet </option>';
												}
												
												foreach($Sellerdetails as $row)
												{
?>
												<!--<option value="<?php echo $row['Enrollement_id']; ?>"> <?php echo $row['First_name'].' '.$row['Last_name']; ?>  <?php echo $Outlet_status; ?></option>-->
												<?php 
													$Get_city_name = $ci_object->Igain_model->Get_cities($row['State']);
													/*******AMIT KAMBLE 01-10-2019******Get Working Hours******/
													$Get_outlet_working_hours = $ci_object->Shopping_model->Get_merchant_working_hours($row['Enrollement_id'],$day_of_week);
													
													if($Get_outlet_working_hours != NULL)
													{
														if(!($Current_time >= $Get_outlet_working_hours->Open_time && $Current_time <= $Get_outlet_working_hours->Close_time))
														{
															$Outlet_status = " :- Closed";
														}
														else
														{
															$Outlet_status = " :- Open";
														}
													}
													/**********************************************************/
													foreach($Get_city_name as $City)
													{
														if($City->id==$row['City'])
														{
															$City_name=$City->name;
														}
													} 
													
													if($To_City==$row['City']){
												?>
												   <option value="<?php echo $row['Enrollement_id']; ?>" <?php if($delivery_outlet == $row['Enrollement_id']){echo 'selected=selected'; } ?>> <?php echo "<b style=\"color:red\">".$row['First_name'].' '.$row['Last_name'].'</b> - '.App_string_decrypt($row['Current_address']).'('.$City_name.')'; ?>  <?php echo $Outlet_status; ?></option>
												<?php 
												} }
											?>
											<?php 
												/*
												foreach($Sellerdetails as $row)
												{
													$Get_outlet_working_hours = $ci_object->Shopping_model->Get_merchant_working_hours($row['Enrollement_id'],$day_of_week);
													
													if($Get_outlet_working_hours != NULL)
													{
														if(!($Current_time >= $Get_outlet_working_hours->Open_time && $Current_time <= $Get_outlet_working_hours->Close_time))
														{
															$Outlet_status2 = " :- Closed";
														}
														else
														{
															$Outlet_status2 = " :- Open";
														}
													}
												
													
													if($To_City!=$row['City']){
												?>
												   <option value="<?php echo $row['Enrollement_id']; ?>"  <?php if($delivery_outlet == $row['Enrollement_id']){echo 'selected=selected'; } ?>> <?php echo "<b style=\"color:red\">".$row['First_name'].' '.$row['Last_name'].'</b> - '.App_string_decrypt($row['Current_address']).'('.$City_name.')'; ?>  <?php echo $Outlet_status2; ?></option>
												<?php 
												}} */
											?>
										</select>
										<label class="checkbox-inline text-danger" id="delivery_sms"></label>
									</div>
								</div>
								
								<div class="form-group" id="outlet_status2"></div>
								
								<div class="form-group" id="outlet_status" style="display:none;">
									<font color="red">No Orders Can be Placed at Selected Outlet !!!</font>
								</div>
								
								<div class="form-group" id="Table_no_block" style="text-align:center; display:none;">
									<label for="">Table No.</label>
									<div style="margin:0 auto; width:230px;">
									<input class="form-control" type="text" name="Table_no" id="Table_no" placeholder="Enter Table Number" maxlength="10" style="width: 210px; text-align:center;">
									</div>
								</div>
								
								<div class="form-group" style="text-align:center;">
									<button type="submit" name="Checkout" value="Checkout" id="Checkout" class="btn btn-primary">Checkout&nbsp;<i class="fa fa-forward" aria-hidden="true"></i></button>
								</div> <br>
								
								<div class="panel panel-default" id="Instore_confirm_block" style="text-align:center; display:none;">	
									<div class="panel-heading"><label for="">In-Store Order</label></div>
									<div class="form-group">
										<br/>You are placing a In-Store Order<br/><br/>
										Please confirm you are at<br/>
										<span id="Outlet_name_block"></span><br/>
										<span id="Table_block" style="display:none;">Table Number : <span id="Entered_table"></span></span><br/>
										<span id="Outlet_address_block"></span><br/><br/>
										<div class="form-group">
											<button type="button" name="Process_order" value="00" id="Process_order" class="btn btn-primary">I am at the Restaurant&nbsp;<i class="fa fa-forward" aria-hidden="true"></i></button>
											<button type="button" name="Cancel_order" value="11" id="Cancel_order" class="btn btn-primary"><i class="fa fa-backward" aria-hidden="true"></i>&nbsp;Cancel In-Store Order</button>
										</div>
									</div> 	
								</div><br>
								</div>
								<div class="col-xs-12 col-md-3">
								</div>
								</div>
							</form>
					   </div> 
					</div> 
				</div>
			</div>
		</div>
	</section>
	<!-- Main content -->
<?php $this->load->view('header/loader');?> 
<?php $this->load->view('header/footer');?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $('.select2').select2();
</script>
<style>
.select2{
	width: 98% !IMPORTANT;
}
#popup 
{
    display:none;
}
#popup2 
{
    display:none;
}
</style>
<script type="text/javascript" charset="utf-8">
$( document ).ready(function() 
{ 
	//$("#myModal1").modal("show");
	var delivery_type = '<?php echo $delivery_type ?>';
	var delivery_outlet = '<?php echo $delivery_outlet ?>';
	if(delivery_type == 2)
	{
		if(delivery_outlet !="")
		{
			$.ajax(
			{
				type: "POST",
				data: {Outlet_id:delivery_outlet},
				url: "<?php echo base_url() ?>index.php/Cust_home/Get_outlet_details",
				dataType: "json",
				success: function (json)
				{
					if(json['Table_no_flag'] == 1)
					{
						$('#Table_no_block').css("display","");  
						$("#Table_no").attr("required","required");
					}
					else
					{
						$('#Table_no_block').css("display","none");  
						$("#Table_no").removeAttr("required");	
						$('#Instore_confirm_block').css("display","none"); 
					}
				}
			}); 
		}
		else
		{
			$('#Table_no_block').css("display","");  
			$("#Table_no").attr("required","required");
		}
		
		// $('#Table_no_block').css("display","");
		// $("#Table_no").attr("required","required");		 
	}
	else
	{
		$('#Table_no_block').css("display","none");  
		$("#Table_no").removeAttr("required");
	}
});
function Validate_form()
{
	if ($('input[name="delivery_type"]:checked').length == 0) 
	{      
		return false; 
	} 
	else 
	{
		// console.log($('input[name="delivery_type"]:checked').val());
		
		var delivery_type = $("input[name=delivery_type]:checked").val();
		
		if($('#delivery_outlet').val()=="")
		{	
			setTimeout(function()
			{	
				$('#delivery_sms').html('Please select outlet');
			}, 0);
			
			setTimeout(function(){
				
				$('#delivery_sms').css('color:red');
				$('#delivery_sms').html('');
				
			}, 3000);
			
			return false;
		}
		else if(delivery_type == 2)
		{
			// alert('In-Store');
			var TableNumber = $("#Table_no").val();
			var Outlet_id = $("#delivery_outlet").val();
			
			$('#Instore_confirm_block').css("display",""); 
			
			$.ajax(
			{
				type: "POST",
				data: {Outlet_id:Outlet_id},
				url: "<?php echo base_url() ?>index.php/Cust_home/Get_outlet_details",
				dataType: "json",
				success: function (json)
				{
					$('#Outlet_name_block').html(json['Outlet_name']);
					$('#Outlet_address_block').html(json['Outlet_address']);
					if(json['Table_no_flag'] == 1)
					{
						$('#Table_block').css("display",""); 
						$("#Entered_table").html(TableNumber);		
					}
				}
			}); 
					
			return false;
		}
		else
		{
			$('#Instore_confirm_block').css("display","none"); 
		}
			show_loader();
		return true;
	}
	// return true;
}
$('#Process_order').click(function()
{
	document.getElementById('jsform').submit();
	show_loader();
	return true;
});
$('#Cancel_order').click(function()
{
	location.reload();
	show_loader();
	return true;
});

function show_table_no_block(Outlet_id)
{
	var show_flag = $("input[name=delivery_type]:checked").val();
	// var Outlet_id = $("#delivery_outlet").val();
	
	if(show_flag == 2)
    {	
		$.ajax(
		{
			type: "POST",
			data: {Outlet_id:Outlet_id},
			url: "<?php echo base_url() ?>index.php/Cust_home/Get_outlet_details",
			dataType: "json",
			success: function (json)
			{
				if(json['Table_no_flag'] == 1)
				{
					$('#Table_no_block').css("display","");  
					$("#Table_no").attr("required","required");
				}
				else
				{
					$('#Table_no_block').css("display","none");  
					$("#Table_no").removeAttr("required");	
					$('#Instore_confirm_block').css("display","none"); 
				}
			}
		});
    }
    else
    {
        $('#Table_no_block').css("display","none");  
		$("#Table_no").removeAttr("required");	
		$('#Instore_confirm_block').css("display","none"); 
    }
}
function hide_table_no_block(show_flag)
{
	var Outlet_id = $("#delivery_outlet").val();
	
	if(show_flag != 2)
    {	
		$('#Table_no_block').css("display","none");  
		$("#Table_no").removeAttr("required");	
		$('#Instore_confirm_block').css("display","none"); 
    }
    else
    {
		if(Outlet_id !="")
		{
			$.ajax(
			{
				type: "POST",
				data: {Outlet_id:Outlet_id},
				url: "<?php echo base_url() ?>index.php/Cust_home/Get_outlet_details",
				dataType: "json",
				success: function (json)
				{
					if(json['Table_no_flag'] == 1)
					{
						$('#Table_no_block').css("display","");  
						$("#Table_no").attr("required","required");
					}
					else
					{
						$('#Table_no_block').css("display","none");  
						$("#Table_no").removeAttr("required");	
						$('#Instore_confirm_block').css("display","none"); 
					}
				}
			}); 
		}
		else
		{
			$('#Table_no_block').css("display","");  
			$("#Table_no").attr("required","required");
		}
    }
}
function check_outlet_status(Enroll_id)
{
	$("#Checkout").hide();

	var Outlet = delivery_outlet.options[delivery_outlet.selectedIndex].text;
	var res = Outlet.split("-");
	var Outlet2 = res[0];
	 $.ajax(
    {
        type: "POST",
        data: { Enroll_id:Enroll_id },
        url: "<?php echo base_url()?>index.php/Shopping/Get_outlet_working_hours",
        success: function(data)
        {
           if(data==0)//close
		   {
			  // $("#Checkout").attr("disabled", true);
			   
			   $("#outlet_status").show();
			   $("#outlet_status2").show();
			   $("#outlet_status2").html('<font color="red">'+Outlet2+' is Currently Closed</font>');
		   }
		   else if(data==2)//close
		   {
			 //  $("#Checkout").attr("disabled", true);

			   $("#outlet_status2").show();
			   $("#outlet_status2").html('<font color="red">'+Outlet2+' is Currently not processing online Orders</font>');
		   }
		   else
		   {
			 //  $("#Checkout").attr("disabled", false);
			   $("#Checkout").show();
			   $("#outlet_status").hide();
			   $("#outlet_status2").hide();
		   }
			
        }
    });
	
}
/* function hide_show_type(type){
	
	// console.log(type);
	if(type ==0){
		$('#Take_away_div').css('display','none');
	}
	else {
		$('#Take_away_div').css('display','block');
	}
	
} */


$("[type='number']").keypress(function (evt) 
{
    evt.preventDefault();
});

function remove_item(rowid)
{
	$.ajax({
		type: "POST",
		data: { id:serial, name:name, price:price, picture:picture },
		url: "<?php echo base_url()?>index.php/Shopping/remove",
		success: function(data)
		{
			if(data == 1)
			{
				$('#myModal').hide();
				$("#myModal").removeClass( "in" );
				$('.modal-backdrop').remove();
		
				var Title = "Successful";
				var msg = 'Product '+name+' is added to Cart Successfuly..!!';
				runjs(Title,msg);
			}
			else
			{
				$('#myModal').hide();
				$("#myModal").removeClass( "in" );
				$('.modal-backdrop').remove();
				
				var Title = "Invalid Data Information";
				var msg = 'Error adding Product '+name+' to Cart. Please try again..!!';
				runjs(Title,msg);
			}
		}
	});
}

function Show_updatelink(RowId)
{
    $('#Update_div_'+RowId).show();
}

function Hide_updatelink(RowId)
{
    $('#Update_div_'+RowId).hide();
}

function Update_item_cart(RowId,id,type)
{
	show_loader();
    // var Quantity = $('#qty_'+RowId).val();
	var Quantity = $('#qty_'+id).val();
	if(type==0)
	{
		Quantity=parseInt(Quantity) - 1;
	}
	else if(type==1)
	{
		Quantity=parseInt(Quantity) + 1;
	}
	
    var Symbol_of_currency = '<?php echo $Symbol_of_currency; ?>';
    
    $.ajax(
    {
        type: "POST",
        data: { Quantity:Quantity, RowId:RowId },
        url: "<?php echo base_url()?>index.php/Shopping/Update_item_quantity",
        success: function(data)
        {
            if(data.Error_flag == 0)
            {
               /* $('#Item_unitprice_'+RowId).html('<b>' + Symbol_of_currency +'</b> ' + data.Item_unitprice);
                $('#Item_subtotal_'+RowId).html('<b>' + Symbol_of_currency +'</b> ' + data.Item_subtotal);
                $('#Cart_grandTotal').html('<b>' + Symbol_of_currency +'</b> ' + data.grand_total);
                */
                // ShowPopup('Quantity Updated Successfuly..!!');
                $('#Update_div_'+RowId).hide();
            }
            else if(data.Error_flag == -2)
            {
               // ShowPopup('Error Updataing Quantity. Quantity should be greater than 0. Please Tray Again.');
                $('#Update_div_'+RowId).hide();
            }
            else
            {
                //ShowPopup('Error Updataing Quantity. Please Tray Again.');
                $('#Update_div_'+RowId).hide();
            }
			location.reload(); 
        }
    });
}    

function ShowPopup(x)
{
    $('#popup_info').html(x);
    $('#popup').show();
    setTimeout('HidePopup()', 9000);
}

function HidePopup()
{
    $('#popup').hide();
}
</script>