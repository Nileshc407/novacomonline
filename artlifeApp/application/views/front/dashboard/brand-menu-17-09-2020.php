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

?>

        <?php 
            /* echo"--brndID-----".$_SESSION['brndID']."----<br>"; 
            echo"--brndname-----".$_SESSION['brndname']."----<br>"; */
        ?>
		<div class="custom-body">
			<div class="container">
				
				<?php 
				if($_SESSION['brndID']==146 || $_SESSION['brndID']==144 || $_SESSION['brndID']==127 ){ ?>
					<br>					
					<br>
				<?php } ?>
				<br>


				<a href="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf" class="download-pdf-link" download>

					<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/d-icon.svg"/></a>
					
				<ul class="menu_topbar_tab nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" aria-selected="true">Food Menu</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-selected="false">Drinks Menu</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					 <div class="tab-pane fade show active" id="home">
						<div class="irame-box">

							<iframe src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/food-menu.pdf"></iframe>

							


						</div>
					 </div>
					 <div class="tab-pane fade" id="profile">
						<div class="irame-box">
							<iframe src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/menu/drink-menu.pdf"></iframe>
						</div>
					</div>
				</div>
			
				<div class="ordernow-link">
					<a href="#">
						Order Now
						<div class="icon">
							<img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/images/menu-icon-4.svg"/>
						</div>
					</a>
				</div>
			</div>
		</div>
		
	
	<?php $this->load->view('front/header/footer');  ?>
        
        