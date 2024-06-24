<?php 

    $this->load->view('front/header/header'); 

    $Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);

	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}

	$total_gain_points=$total_gain_points->Total_gained_points;
	if($total_gain_points){
		$TotalGainPoints=$total_gain_points; 
	}else{
		$TotalGainPoints=0;
	}	
	$Total_Transfer_points=$Total_transfer->Total_Transfer_points;
	
	if($Total_Transfer_points){
		$Total_Transfer_points=$Total_transfer->Total_Transfer_points;
	}else{
		$Total_Transfer_points=0;
	}

    $Photograph=$Enroll_details->Photograph;
	
	
	//echo "----Photograph-----".$Photograph."---<br>";
	
	if($Photograph=="")
	{
		$Photograph=base_url()."assets/img/profile.png";
		
	} else {
		
		$Photograph=$this->config->item('base_url2').$Photograph;
		
	}
	$session_data = $this->session->userdata('cust_logged_in');
	$smartphone_flag = $session_data['smartphone_flag'];

?>
        <?php 
            /* echo"--brndID-----".$_SESSION['brndID']."----<br>"; 
            echo"--brndname-----".$_SESSION['brndname']."----<br>"; */
        ?>       
		<div class="custom-body">
			<div class="slider owl-carousel owl-theme">
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-1.jpg"/>
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-2.jpg"/>
				</div>
				<div class="item">
					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/banner-3.jpg"/>
				</div>
			</div>
			<div class="view-wrap brand-details">
			
				<!--<?php //echo base_url(); ?>index.php/Cust_home/brand_offers-->
				
				
					<?php
					
						// echo"<br>---Brand_phone-----".$Brand_phone;
						$Brand_phone="254709828282";
						$bandPhoneNo = sprintf("%s-%s-%s-%s",substr($Brand_phone, 0, 3),substr($Brand_phone, 3, 3),substr($Brand_phone, 6, 3),substr($Brand_phone, 9, 3));
						// echo"<br>---bandPhoneNo-----".$bandPhoneNo;
						// echo"<br>---smartphone_flag-----".$smartphone_flag;

					?>
				
				<?php if($smartphone_flag==2) { /*iOS*/ ?>
					<a href="tel://<?php echo $Brand_phone; ?>">
						<div class="item item-odd">
							Call to Order
							<div class="icon">
								<img src="<?php echo base_url(); ?>assets/brand-0/images/call-order.png"/>
							</div>
						</div>
					</a>
				<?php } else { ?>
						
						<input type="hidden" name="phoneno" id="phoneno" value="+<?php echo $bandPhoneNo; ?>">

							<script>
								function getValues() {
									document.getElementById("btnOK").value = document.getElementById("phoneno").value;
								}
							</script>
					
							<a href="JavaScript:void(0)" id="btnOK" onclick="getValues();ok.performClick(this.value);">
								<div class="item item-odd">
									Call to Order
									<div class="icon">
										<img src="<?php echo base_url(); ?>assets/brand-0/images/call-order.png"/>
									</div>
								</div>
							</a>
				<?php }  ?>
				
				<?php if($_SESSION['brndID']== 121){ ?>
					<a href="https://artcaffe.dpo.store/store">
						<div class="item">
							Shop Now &nbsp;&nbsp;
							<div class="icon">
								&nbsp;<img src="<?php echo base_url(); ?>assets/brand-0/images/order-online.png"/>
							</div>
						</div>
					</a>
				<?php } else {
				?>
				<!--<a href="<?php echo base_url(); ?>index.php/Cust_home/brand_menu">-->
				
				<?php
							
					if($_SESSION['brndID'] == 11 ) {
						$OrderOnlineUrl="https://www.artcaffe.co.ke/order";
					} else if($_SESSION['brndID'] == 123 ) {
						$OrderOnlineUrl="https://www.urbanburgers.co.ke/urban-order";
					} else if($_SESSION['brndID'] == 125 ) {
						$OrderOnlineUrl="https://www.ohcha.co.ke/ohcha-order";
					} else if($_SESSION['brndID'] == 127 ) {
						$OrderOnlineUrl="http://tapas.co.ke/index.php/menu/";
					} else if($_SESSION['brndID'] == 121 ) {
						$OrderOnlineUrl="https://artcaffe.dpo.store/store";
					}
					
				?>
				
				<a href="<?php echo $OrderOnlineUrl; ?>" onclick="return goTourl('<?php echo $OrderOnlineUrl; ?>');">
					<div class="item">
						Order Online
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-0/images/order-online.png"/>
						</div>
					</div>
				</a>
				<?php }  ?>
				
				
				
				
				<!--<?php //echo base_url(); ?>index.php/Cust_home/brand_new-->
				<?php 
					if($_SESSION['brndID']== 11){
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					}  else if($_SESSION['brndID']== 121){
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					} else if($_SESSION['brndID']== 125){
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					} else if($_SESSION['brndID']== 127){
						$Buy_Gift_Cards_url="JavaScript:void(0);"; 
					} else  {
						$Buy_Gift_Cards_url="JavaScript:void(0);";
					}
				?>
				<!--<a href="<?php echo $Buy_Gift_Cards_url; ?>">
					<div class="item">
						Buy Gift Cards
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/menu-icon-3.svg"/>
						</div>
					</div>
				</a>-->
			</div>
		</div>
	<?php $this->load->view('front/header/footer');  ?>
	<script>
		function goTourl(url){
			window.location.href = url;
		}
	</script>
        