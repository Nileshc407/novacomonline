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
            /* echo"--url---1111--".$url."----<br>"; 
            echo"--brndID-----".$_SESSION['brndID']."----<br>"; 
            echo"--brndname-----".$_SESSION['brndname']."----<br>";  */
        ?>
		<div class="custom-body">
			<div class="container">
				<br>
				<iframe src="https://www.artcaffe.co.ke/" name="iframe_a" title="Iframe Example" http-equiv="Content-Security-Policy"
      content="default-src 'self'; img-src https://*; child-src 'none';"></iframe>

						<!--<object type="text/html" data="<?php echo $url; ?>" style="width:400px;height:500px" />-->

				
			</div>
		</div>
		
		
		 
	

	<?php $this->load->view('front/header/footer');  ?>
        
	<style>	
		body {
    margin: 0;            /* Reset default margin */
}
iframe {
    display: block;       /* iframes are inline by default */

    border: none;         /* Reset default border */
    height: 100vh;        /* Viewport-relative units */
    width: 100vw;
}
.container{
	padding: 0 !IMPORTANT;
}
</style>
        