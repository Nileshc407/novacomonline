<?php 
$this->load->view('front/header/header'); 

$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
if($Current_point_balance<0){
	$Current_point_balance=0;
}else{
	$Current_point_balance=$Current_point_balance;
}

$ci_object = &get_instance();
$ci_object->load->model('Igain_model');
?>
 <header>
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url();?>index.php/Cust_home/myprofile';"><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Transactions</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
<main class="padTop padBottom transactionsWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mainBox mb-5">
			<?php 	if($Trans_details !=Null)
					{ 
						$LVDatetoPrint = '0';
						foreach($Trans_details as $row)
						{ 
							$Trans_date = date('d-M-Y', strtotime($row->Trans_date));
							
							$date1 = date('Y-m-d',strtotime($row->Trans_date));
							$date2 = date('Y-m-d');
							$diff = abs(strtotime($date2) - strtotime($date1));
							$years = floor($diff / (365*60*60*24));
							$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
							$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
							if($years=='0')	
							{ 
								$years=""; 
							}
							else
							{	
								$years=$years.' Year-'; 
							}
							if($months=='0')
							{ 
								$months=""; 
							}
							else
							{
								$months=$months.' Months-';
							}
							if($days=='0')
							{
								$days="";
							}
							else
							{
								$days=$days.' Days ago';
							}
							if( $years=="" && $months =="" &&  $days== "")
							{
								$DatetoPrint = "Today";
								$Trans_date = date('H:i:s A',strtotime($row->Trans_date));
							}
							else if($months == "")
							{
								$DatetoPrint = "Earlier";
							}
							else
							{
								 // $DatetoPrint = "$years $months $days";
								 $DatetoPrint = date('F',strtotime($row->Trans_date));
							}
							$Loyalty_pts = round($row->Loyalty_pts);
							$Redeem_pts = round($row->Redeem_pts);
							$Purchase_amt = number_format($row->Purchase_amt,2);
							
							if($row->TransType == 2){
								$TransType = "POS";
								$Amount = $row->Purchase_amt;
								$Referance = $row->Manual_billno;
							}
							else if($row->TransType == 1){
								$TransType = "Top-Up";
								$Amount = $row->Topup_amount;
								
								// $Referance = $row->Manual_billno;
								if($row->Mpesa_TransID !="")
								{
									$Referance = $row->Mpesa_TransID;
								}
								else
								{
									$Referance = $row->Remarks;
								}
								
							}
							$Outlet_logo = $row->Outlet_logo;
							$Outlet_logo = $this->config->item('base_url2').$Outlet_logo;	

							$brandID=$ci_object->Igain_model->get_enrollment_details($row->Seller);
						?>
                    <ul class="transactionsHldr">
					<?php if($DatetoPrint != $LVDatetoPrint){?>
                        <li class="greyTxt"><?php echo $DatetoPrint ;?></li>
						<?php } ?>
                        <li>
                            <div class="d-flex align-items-center w-100">
                                <div class="titleTxtMain d-flex flex-column">
                                    <div class="cf d-flex align-items-center">
                                        <div class="flex-grow-1"><h2><?php echo $TransType; ?></h2></div>
                                        <div class="greyTxt"><?php echo $Trans_date; ?></div>
                                    </div>
                                    <div class="cf d-flex align-items-center">
                                        <div class="flex-grow-1">&nbsp;</div>
                                        <div><span class="greyTxt">Amount </span><?php echo number_format($Amount, 2); ?></div>
                                    </div>
                                    <div class="cf d-flex align-items-center">
										<div class="flex-grow-1">Ref </span> <b class="blueTxt"><?php echo $Referance; ?></b></div>
                                        <div><span class="greyTxt">Balance </span> <b class="blueTxt"><?php echo $row->Available_balance; ?></b></div>
                                    </div>
                                </div> 
                            </div>
                        </li>
                    </ul><hr>
					<?php $LVDatetoPrint = $DatetoPrint;
						}
					} ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('front/header/footer');  ?>
<style>
 .padTop {
    padding-top: 60px;
}
</style>