<?php $this->load->view('front/header/header'); ?>

<?php
	$Current_point_balance = ($Enroll_details->Total_balance-$Enroll_details->Debit_points);
	if($Current_point_balance<0){
		$Current_point_balance=0;
	}else{
		$Current_point_balance=$Current_point_balance;
	}
	
?>
	
		
<header>
	<div class="container">
		<div class="row">
			<div class="col-12" style="height: 22px;">
			<!--<img style="height: 44px;" src="<?php echo base_url(); ?>assets/img/default-black-top.png">-->
			</div>
			<div class="col-12 d-flex justify-content-between align-items-center hedMain">
			
				<div class="leftRight"><button id="sidebarCollapse" onclick="location.href = '<?php echo base_url(); ?>index.php/Cust_home/set_brand?brndID=<?php echo $_SESSION['brndID']; ?>';" ><img src="<?php echo base_url(); ?>assets/img/back-icon.svg"></button></div>
				<div><h1>Special Offers</h1></div>
				<div class="leftRight">&nbsp;</div>
			</div>
		</div>
	</div>
</header>
			
				
<main class="padTop padBottom">
	<div class="container">
		<div class="row">
			<div class="col-12 specialOfferWrapper">
				<ul class="offerHldr">
					<?php 
						$dir = base_url()."assets/brand-".$_SESSION['brndID']."/offer/";
						
						
						function str_replace_first($content)
						{
							$from = '/'.preg_quote($from, '/').'/';
							
							

							// return preg_replace($from, $to, $content, 1);
							return $from;
						}

						
						
						// $d = base_url()."assets/brand-".$_SESSION['brndID']."/offer";
						
						// $dir = glob(APPPATH."/assets/brand-".$_SESSION['brndID']."/offer/*");
						
						// $dir1 = APPPATH."assets\brand-".$_SESSION['brndID']."\offer";
						// echo "dir1---".$dir1."------<br>";
						// $str = str_replace('\\', '//', $dir1);
						// echo "str---".$str."------<br>";
						// $dir = "C://xampp/htdocs/novacomonline_local/javanewdesign/assets/brand-374/offer";
						// echo "dir---".$dir."------<br><br>";						
						// echo "DOCUMENT_ROOT---".$_SERVER["DOCUMENT_ROOT"]."------<br>";
						// echo "base_url2_folder---".$this->config->item('base_url2_folder')."------<br>";
						// echo "base_url_folder---".$this->config->item('base_url_folder')."------<br>";
						// echo "APPPATH---".APPPATH."------<br>";
						
						$DOCUMENT_ROOT= explode('/', $_SERVER["DOCUMENT_ROOT"]);
						// print_r($DOCUMENT_ROOT);
						foreach($DOCUMENT_ROOT as $root){
							
						}
						
						// $remove_slash =  str_replace("\'", "//", $DOCUMENT_ROOT);
						$remove_slash =  str_replace("\'", "//", $DOCUMENT_ROOT);  
						// echo "-new---remove_slash--".$remove_slash."------<br><br>";
						$i=0;
						$str;
						foreach($remove_slash as $slah){
							// echo "-slah--".$slah."------<br><br>";
							if($i==0){
								$str .=$slah."//";
							} else {
								$str .=$slah."/";
							}
							$i++;
						}
						// echo "----str--".$str."------<br><br>";
						
						$dir1 = $str.''.$this->config->item('base_url2_folder').'/'.$this->config->item('base_url_folder').'/assets/brand-'.$_SESSION['brndID'].'/offer/';
						// echo "----dir1--".$dir1."------<br><br>";
						
						// $dir1 = preg_replace("-C:\", "-C://", $dir1, 1);
						// $remove_slash =  str_replace("\\","","it\'s Tuesday!");
						// echo "-new---remove_slash--".$remove_slash."------<br><br>";
						// print_r(implode('/', $dir1));
						
						// $dir1= str_replace_first($dir1); 
						
						
						
						
						
						
						
						
						
						$file_display = array('jpg', 'jpeg', 'png', 'gif');

						if ( file_exists( $dir1 ) == false ) {
						   // echo 'Directory \'', $dir, '\' not found!';
						} else {
						   $dir_contents = scandir( $dir1 );

							foreach ( $dir_contents as $file ) {
							   $file_type = strtolower( end( explode('.', $file ) ) );
							   // echo "dir---".$dir."---- file---".$file."----- file_type---".$file_type."------<br>";
							   if ( ($file !== '.') && ($file !== '..') && (in_array( $file_type, $file_display)) ) {
								  echo '<li><img src="'.$dir . '/' . $file, '" alt="', $file, '"/></li>';
							   // break;
							   }
							}
						}
						
						
						

						
						
						?>
                    <!--<li><a href="#"><img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/img/offer1.jpg"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/img/offer2.jpg"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/img/offer3.jpg"></a></li>
                    <li><a href="#"><img src="<?php echo base_url(); ?>assets/brand-<?php echo $_SESSION['brndID']; ?>/img/offer4.jpg"></a></li>-->
                    
                </ul>
			</div>
		</div>
	</div>
</main>				
					
				
				
					
		

<?php $this->load->view('front/header/footer');  ?>