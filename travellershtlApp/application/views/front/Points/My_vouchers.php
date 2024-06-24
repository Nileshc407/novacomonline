<?php 
$this->load->view('front/header/header'); 
$this->load->view('front/header/menu');   
$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
$ci_object = &get_instance(); 
$ci_object->load->model('Igain_model');
?>

<header>
<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
				<div class="leftRight"><button onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Redeem_history';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Vouchers</h1></div>
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/Vouchers_history';" ><img src="<?php echo base_url(); ?>assets/img/history-icon.svg"></button></div>
			</div>
		</div>
	</div>
</header>

<main class="padTop padBottom">
	<div class="container vouchersWrapper">
		<?php 
		if($Unused_stamp_voucher !=Null){ 
		?>
		<div class="row">
		<?php
			foreach($Unused_stamp_voucher as $row){ 
			
					if($row->Card_value > 0){
						$Voucher_Amount = $row->Card_value;
						$Currency = $Currency_Symbol;
					}
					else if($row->Discount_percentage > 0){
						$Voucher_Amount = $row->Discount_percentage;
						$Currency = "%";
					}
					else{
						$Voucher_Amount = 0;
						$Currency = "%";
					}
					
					/* $SellerDetails1= $ci_object->Igain_model->get_enrollment_details($row->Seller_id);
				
					$SellerDetails= $ci_object->Igain_model->get_enrollment_details($SellerDetails1->Sub_seller_Enrollement_id);
					
					$Lastname= substr($SellerDetails->Last_name,0,8);
					$Photograph=$SellerDetails->Photograph; */
					?>
			<div class="col-6 pr-2">
				<div class="vouchersHldr">
                    <div class="logoMain"><img src="<?php echo base_url(); ?>assets/img/logo.png"></div>
                    <h2><?php echo $row->Gift_card_id; ?></h2>
                    <div class="dateMain">&nbsp;&nbsp;&nbsp;&nbsp;Valid Till <?php echo date('d-M-Y',strtotime($row->Valid_till)); ?></div>
					 <div class="usedTxt greenTxt">ISSUED</div>
                    <div class="discountHldr bgGreen">
                        <span><?php echo $Voucher_Amount.' '.$Currency; ?></span>Discount
                    </div>
                </div>
			</div>
        <?php } ?>
		</div>
      <?php
			} else { ?>
			
				<div class="row">
							<div class="col-12 pr-2">
								<h6 class="text-center dark-bg p-2"><b>No records found</b></h6>
							</div>
						</div>
			<?php }?>
	</div>
</main>
<?php $this->load->view('front/header/footer');  ?>