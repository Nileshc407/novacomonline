
		<?php $this->load->view('header/header');?>
		<?php echo form_open_multipart('Cust_home/auctionbidding'); 

		$Login_Enroll=$Enroll_details->Enrollement_id; 
		
		?>
        <section class="content-header">
          <h1>
            Auction Bidding
            <small></small>
          </h1>
          
        </section>

        <!-- Main content -->
        <section class="content">
         <div class="row">
		 
			<?php if($this->session->flashdata('msg')): ?>
			<p><?php echo $this->session->flashdata('msg'); ?></p>
			<?php endif; ?>
			<script>
			function countdown(days,hour,min,sec,auction_id,i) 
			{
				//alert(count);
					// alert("---days---"+days+"---hour--"+hour+"--min--"+min+"---I---"+i);
					
					// return false;
				if(sec <= 0 && min > 0) {
					sec = 59;
					min -= 1;
				}
				else if(min <= 0 && sec <= 0) {
					min = 0;
					sec = 0;
				}
				else {
					sec -= 1;
				}

				if(min <= 0 && hour > 0) {
					min = 59;
					hour -= 1;
				}
				 
				var pat = /^[0-9]{1}$/;
				sec = (pat.test(sec) == true) ? '0'+sec : sec;
				min = (pat.test(min) == true) ? '0'+min : min;
				hour = (pat.test(hour) == true) ? '0'+hour : hour;
				days = (pat.test(days) == true) ? '0'+days : days;
				
				var auctiondiv = 'strclock_'+i;
				// alert(auctiondiv);
				document.getElementById(auctiondiv).innerHTML = days+" : Days, "+hour+" : Hrs, "+min+" : Min, "+sec+" : Sec";
				setTimeout(
					function()
					{ 
						countdown(days,hour,min,sec,auction_id,i);
					}, 
				1000
				);
		 }
		</script>
	<?php	
	
		
	
	foreach($Seller_details as $seller)
	{
		 $timezone= $seller["timezone_entry"];
	}	
	$i=1;
	$today=date('Y-m-d');
	$count=count($CompanyAuction);
	if($count > '0' )
	{
		foreach($CompanyAuction as $auction)
		{
			$base_url=base_url();
			$str=str_replace('Company_'.$auction['Company_id'], "", $base_url);
			$filepath=substr($str, 0, -1);	
			$Auction_id= $auction['Auction_id'];
			if($today >= date('Y-m-d',strtotime($auction['From_date'])) && $today <= date('Y-m-d',strtotime($auction['To_date'])))
			{
			?>
			
			
			
			<?php
			
										$datetime2 = $auction['To_date'];
										$datetime3 = $auction['End_time'];						
										$combinedDT = date('Y-m-d H:i:s', strtotime("$datetime2 $datetime3"));
										$datetime3 = new DateTime(); //Current Date time						
										$datetime3->setTimezone(new DateTimeZone('Asia/Kolkata'));
										$datetime4 = new DateTime($combinedDT); // Combined Date Time						
										$interval = $datetime3->diff($datetime4);
										
										$Auction_id = $auction['Auction_id'];						
										$days = $interval->format('%a');
										$hours = $interval->format('%h');
										$minutes = $interval->format('%i');
										$seconds = $interval->format('%S');
										
			
			foreach($Auction_Max_Bid_val[$auction['Auction_id']] as $bid)
			{
										
				?>
									
										
				<div class="col-md-3">
				<div class="box box-primary direct-chat direct-chat-primary">
					<div class="box-header with-border">
					  <h3 class="box-title"><?php echo $auction['Auction_name']; ?></h3>
					 </div>
					<div class="box-body">
					 <div class="direct-chat-messages">
					   <div class="direct-chat-msg">                      
						  <div class="direct-chat-info clearfix">
						  
						  <?php
							if($Top5_Auction_Bidder[$auction['Auction_id']] != "")
							{	
								$j = 0;
								$len = count($Top5_Auction_Bidder[$auction['Auction_id']]);
								
								foreach($Top5_Auction_Bidder[$auction['Auction_id']] as $Top5)
								{
									
									 if ($j == 0) {
									 
										$highest_bidder= $Top5['Enrollment_id'];
										
										if($Login_Enroll==$highest_bidder)
										{ 
											// $button_flag='0';
										?>
										
												<span class="label label-success"> You are Highest Bidder	</span>	
												
										<?php } 
										else 
										{
											// $button_flag='1';
												
										?>
										<span class="label label-warning"> You are No Longer Highest Bidder	</span>	
										<?php
										}
									} 
									else if ($j == $len - 1) 
									{
										// $button_flag='1';
									}								
									$j++;
								}
							}
							else
							{
								// $button_flag='1';							
								?>
								<span class="label label-info"> Become First Bidder	</span>	
								<?php
							}
							?>			
						  </div>
						  <br>
						  <h5  class="label label-danger" id="strclock_<?php echo $i; ?>" ></h5>
						  <br>
			
										<script>
											var days = '<?php echo $days; ?>';
											var hour = '<?php echo $hours-1; ?>';
											var min = '<?php echo $minutes; ?>';
											var sec = '<?php echo $seconds; ?>';
											var auction_id = '<?php echo $Auction_id; ?>';						
											var count = '<?php echo $count; ?>';
											var i = '<?php echo $i; ?>';
										
											countdown(days,hour,min,sec,auction_id,i);
										</script>
						  <br>
							<span class="direct-chat-name pull-left">Minium Bid Value:&nbsp;&nbsp; </span> <span class="label label-danger"> <b><?php 						
								if($bid['Bid_value']=='')
								{
									echo $Min_BId_Value = $auction['Min_bid_value'] ; 
								}
								else
								{
									echo $Min_BId_Value = $bid['Bid_value'] + $auction['Min_increment']; 
								}
								
							
							?></b></span>					  
						  <img class="direct-chat-img" src="<?php echo $filepath; ?><?php echo $auction['Prize_image'];?>" alt="message user image">
						  <div class="box-header with-border">
							<h3 class="box-title"><?php echo $auction['Prize_description']; ?></h3>
						 </div>
						 </div>
					  </div>
					  <div class="direct-chat-contacts">
						<ul class="contacts-list">
						<?php 
							 
							
								
								// echo $Top5_BIdder=count($Top5_Auction_Bidder[$auction['Auction_id']]);
								// print_r($Top5_Auction_Bidder[$auction['Auction_id']]);
								
						
							if($Top5_Auction_Bidder[$auction['Auction_id']] != "")
							{
								
								foreach($Top5_Auction_Bidder[$auction['Auction_id']] as $Top5)
								{
									// echo "---Enrollment_id-----".$Top5['Enrollment_id']."<br>";
									if( $Top5['Photograph']== "")
									{
										$phptograph='memberprofiles/no_image.jpeg';
									}
									else
									{
										$phptograph= $Top5['Photograph'];
									}							
									?>
									
									<li>
									<a href="#">
									  <img class="contacts-list-img" src="<?php echo base_url()?><?php echo $phptograph; ?>">
									  <div class="contacts-list-info">
										<span class="contacts-list-name">
										   
										  <small class="contacts-list-date pull-right">Bid Value: <?php echo $Top5['Bid_value']; ?></small>
										</span>
										<span class="contacts-list-msg"><?php echo $Top5['First_name'].' '.$Top5['Last_name']; ?></span>
									  </div>
									</a>
								  </li>	
									
									<?php
									// $j++;
								} 
							}
							else						
							{
							?>
								  <li>
									<a href="#">								  
									  <div class="contacts-list-info">									
										<span class="contacts-list-msg">Become a First Bidder</span>
									  </div>
									</a>
								  </li>
							<?php
							
							}
							
						
						?>
									  
						</ul>
					  </div>
					</div>
					<?php //if( $button_flag =='1' ) {
					?>
					<div class="box-footer">
					  <form action="" method="post">
						<div class="input-group  has-feedback" >
						  <input  value="" type="text" name="Bid_val" id="<?php echo $i.'Bid_val'; ?>" onchange="Validate_bid_value(this.value,'<?php echo $i.'Bid_val'; ?>')" placeholder="Bid Now ..." class="form-control" onkeyup="this.value=this.value.replace(/\D/g,'')">
						  <span class="input-group-btn">
							<button type="button" class="btn btn-primary btn-flat"  Onclick="insert_bidding('<?php echo $i; ?>','<?php echo $auction['Auction_id'];?>','<?php echo $Min_BId_Value; ?>','<?php echo $bid['Bid_value']; ?>','<?php echo $auction['Prize']; ?>','<?php echo $auction['Auction_name']; ?>');"   >Bid Now</button>
						  </span>
						</div>	
					  </form>
					</div>
					<?php 
					// }
					?>
				  </div>
				</div>
				<?php
				}
				
				$i++;
				}
			}
	}
	else
	{ 
	?>		
					<div class="box-footer text-center">
					<a href="#" class="uppercase">Currently No Auction</a>
					</div>
	<?php }	?>
    </div>
	
    </section>
	 <?php echo form_close(); ?>
	 <?php $this->load->view('header/loader');?> 
     <?php $this->load->view('header/footer');?>
	<style> 
	.direct-chat-img 
	{
		border-radius: 50%;
		float: left;
		height: 90%;
		width: 100%;
	}
	</style>
	
	<script>
		function Validate_bid_value(bidVal,inputID)
		{
			var current_bal='<?php echo $Current_balance=$Enroll_details->Total_balance; ?>';
			if( Math.round(bidVal) > Math.round(current_bal))
			{
				// alert('Insufficient Balance to Bid this Auction');
				var msg = "Insufficient Balance to Bid this Auction!";
				// var msg = "You don't have sufficient balance to Bid!";
				var Title = "In-appropriate Data";
				document.getElementById(inputID).value='';
				runjs(Title,msg);
				return false;
				
											
			}
			
		}
	</script>
	<script>
		
		
		function insert_bidding(iseries,auctionID,min_value,Max_Bid_value,Prize,Auction_name)
		{	
			
					var custEnrollId ='<?php echo $Enroll_details->Enrollement_id; ?>';
					var compid = '<?php echo $Enroll_details->Company_id; ?>';					
					var Current_balance = '<?php echo $Enroll_details->Current_balance; ?>';		
					var bidval = document.getElementById(iseries+"Bid_val").value;			
					var min_value1 = min_value;	
					var Title = "In-appropriate Data";
					if(bidval == "0" || bidval == "")
					{
						// alert('----1111------');
						var msg = "Please Enter Bid Value Greater Than 0!";
						// var msg = "You don't have sufficient balance to Bid!";
						runjs(Title,msg);
						return false;
					}
					else if(Math.round(bidval * 100) < Math.round(min_value1 * 100))
					{
						// alert('Please Enter Bid Value Greater Than Min Amount Value');
						var msg='Please Enter Bid Value Greater Than Min Amount Value';
						runjs(Title,msg);
						return false;
					}
					else if(Math.round(bidval * 100) >= Math.round(min_value1 * 100))
					{
					
						$.ajax({
						type: "POST",
						data: {custEnrollId: custEnrollId,compid:compid,auctionID:auctionID,bidval:bidval,Current_balance:Current_balance,Prize:Prize},
						dataType: 'json',
						url: "<?php echo base_url()?>index.php/Cust_home/insertauctionbidding",
						// alert(data.length),
						success: function(data)
						{
							// alert(data.res);
							 if(data.res == '1') 
							 {
								
									BootstrapDialog.show({
										closable: false,
										title: 'Congrats! Your Bid For Auction is Successful!',
										message: 'Do you wish to place another Bid?',
										buttons: [{
											label: 'Yes',
											action: function(dialog) {
												window.location='<?php echo base_url()?>index.php/Cust_home/auctionbidding';
											}
										},{
											label: 'Home',
											action: function(dialog) {
												window.location='<?php echo base_url()?>index.php/Cust_home/home';
											}								
										}]
									});
							}
							else
							{
								BootstrapDialog.show({
										closable: false,
										title: 'Your Bid For Auction is Un-Successful!',
										message: 'Do you wish to place another Bid?',
										buttons: [{
											label: 'Yes',
											action: function(dialog) {
												window.location='<?php echo base_url()?>index.php/Cust_home/auctionbidding';
											}
										},{
											label: 'Home',
											action: function(dialog) {
												window.location='<?php echo base_url()?>index.php/Cust_home/home';
											}								
										}]
									});
							}
							
						}
						});
						return true;
					}
		}
	</script>
	<style>
	.direct-chat-img {
    
    height: 45%;
    width: 60%;
}

 .direct-chat-messages{
min-height: 300px;
} 
.label
{
	font-size:100%;
}
	</style>
	